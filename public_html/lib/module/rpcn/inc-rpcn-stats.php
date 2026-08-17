<?php

require_once __DIR__ . '/rpcn-types.php';

class RPCNStats
{
    private string $games_json;
    private string $log_file;
    private string $api_url;
    private string $icons_json;
    private string $cache;
    private int $apiCacheLifetime;
    private ?string $onlyCommId;
    private bool $allowLiveApi;

    public int $total_users = 0;
    public int $peak_24h_users = 0;

    /** @var list<RPCNTopGame> */
    public array $top_10_games_24h = [];

    public int $peak_alltime_users = 0;
    public string $peak_alltime_users_date = '';

    /** @var list<RPCNTopGame> */
    public array $top_10_games_alltime = [];

    /** @var array<string, list<string>> */
    public array $title_regions = [];

    /** @var array<string, int> */
    public array $title_player_counts = [];

    /** @var array<string, list<string>> */
    public array $title_ids = [];

    /** @var array<string, string> */
    public array $title_icons = [];

    /** @var array<string, string> */
    public array $app_title = [];

    public bool $has_error = false;
    public bool $has_api_error = false;

    /** @var array<string, string> */
    public array $icons_db = [];

    private string $db_cache_file = '';

    /** @var array<string, string> */
    public array $icon_alias = [
        "BLES00767" => "MRTC00001", "BLUS30462" => "MRTC00001", "BCKS10106" => "MRTC00001", "BLJM60189" => "MRTC00001", "BLJM60338" => "MRTC00001",
        "BLES00710" => "MRTC00002", "BLUS30434" => "MRTC00002", "BLAS50173" => "MRTC00002", "BLJM60177" => "MRTC00002",
        "BLES00783" => "MRTC00003", "BLUS30416" => "MRTC00003",
        "BLES00832" => "MRTC00005", "BLUS30492" => "MRTC00005", "BLAS50250" => "MRTC00005",
        "BLUS30602" => "MRTC00011", "BLES01046" => "MRTC00011",
        "BLES01009" => "MRTC00014", "BLUS30547" => "MRTC00014", "BLJM60272" => "MRTC00014",
        "BLES01112" => "MRTC00016"
    ];

    public function __construct(RPCNConfig $config, ?string $onlyCommId = null, bool $allowLiveApi = true)
    {
        $this->games_json = $config->gamesJson;
        $this->log_file = $config->logFile;
        $this->api_url = rtrim($config->apiUrl, '/') . '/usage';
        $this->icons_json = $config->iconsJson;
        $this->cache = rtrim($config->cache, '/') . '/usage.json';
        $this->apiCacheLifetime = max(60, $config->cacheTime);
        $this->onlyCommId = $onlyCommId;
        $this->allowLiveApi = $allowLiveApi;
        $this->db_cache_file = dirname($this->cache) . '/db_stats.json';

        try
        {
            $this->processStats();
        }
        catch (Throwable $e)
        {
            $this->log_error($e->getMessage());
            $this->has_error = true;
        }
    }

    private function log_error(string $message): void
    {
        $timestamp = date('Y-m-d H:i:s');
        @file_put_contents($this->log_file, "[$timestamp] ERROR: $message" . PHP_EOL, FILE_APPEND);
    }

    private function normalize_id(string $id): string
    {
        if (preg_match('/[A-Z0-9]+-[A-Z0-9]+/', $id, $matches) === 1)
        {
            $dash = strpos($matches[0], '-');
            return $dash === false ? $matches[0] : substr($matches[0], $dash + 1);
        }

        $normalized = preg_replace('/_\d+$/', '', $id); // Remove _XX suffix
        return $normalized !== null && $normalized !== '' ? $normalized : $id;
    }

    private function get_region_from_id(string $id): string
    {
        return match (strtoupper($id[2] ?? '')) {
            'E' => 'EU', // Europe
            'U' => 'US', // America
            'A' => 'AS', // Asia
            'J' => 'JP', // Japan
            'H' => 'HK', // Hong Kong
            'K' => 'KR', // South Korea
            'I', 'T' => 'IN', // International, MRTC
            default => 'unknown',
        };
    }

    private function time_ago(string $datetime): string
    {
        try
        {
            $now = new DateTime();
            $ago = new DateTime($datetime);
        }
        catch (Exception)
        {
            return '';
        }

        $diff = $now->diff($ago);
        $totalMonths = $diff->y * 12 + $diff->m;

        if ($totalMonths >= 12)
        {
            $years = $totalMonths / 12;
            $rounded = round($years * 2) / 2;
            if ($rounded == (int)$rounded)
            {
                return (int)$rounded . ' year' . ($rounded != 1 ? 's' : '') . ' ago';
            }
            return number_format($rounded, 1) . ' years ago';
        }
        if ($diff->m > 0) return $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
        if ($diff->d > 0)
        {
            if ($diff->d >= 14) return (string)floor($diff->d / 7) . ' weeks ago';
            if ($diff->d >= 7) return '1 week ago';
            return $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
        }
        if ($diff->h > 0) return $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
        if ($diff->i > 0) return $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' ago';
        return 'just now';
    }

    /** @return array<string, mixed>|null */
    private static function fetch_assoc(mysqli_result $result): ?array
    {
        $row = $result->fetch_assoc();
        return is_array($row) ? $row : null;
    }

    private function processStats(): void
    {
        if (!file_exists($this->games_json))
        {
            throw new RuntimeException('Games JSON file not found: ' . $this->games_json);
        }

        $jsonContent = file_get_contents($this->games_json);
        if ($jsonContent === false)
        {
            throw new RuntimeException("Unable to read {$this->games_json}");
        }

        $decodedMappings = json_decode($jsonContent, true);
        if (!is_array($decodedMappings))
        {
            throw new RuntimeException(json_last_error_msg());
        }

        if ($this->onlyCommId !== null)
        {
            $selected = $decodedMappings[$this->onlyCommId] ?? null;
            $decodedMappings = is_array($selected)
                ? [$this->onlyCommId => $selected]
                : [];
        }

        /** @var array<string, RPCNGameDefinition> $gameMappings */
        $gameMappings = [];
        foreach ($decodedMappings as $commId => $info)
        {
            if (!is_string($commId) || !is_array($info)) continue;

            $titlesRaw = $info['title'] ?? [];
            $titles = is_array($titlesRaw)
                ? array_values(array_filter($titlesRaw, 'is_string'))
                : [];

            $idsRaw = $info['id'] ?? [$commId];
            $ids = is_array($idsRaw)
                ? array_values(array_filter($idsRaw, 'is_string'))
                : [$commId];
            if ($ids === []) $ids = [$commId];

            $gameMappings[$commId] = new RPCNGameDefinition(
                $titles[0] ?? 'Unknown Game',
                $ids
            );
        }

        $this->icons_db = [];
        if (file_exists($this->icons_json))
        {
            $iconsRaw = file_get_contents($this->icons_json);
            if ($iconsRaw !== false)
            {
                $iconsDecoded = json_decode($iconsRaw, true);
                if (is_array($iconsDecoded))
                {
                    foreach ($iconsDecoded as $titleId => $hash)
                    {
                        if (is_string($titleId) && is_string($hash))
                        {
                            $this->icons_db[$titleId] = $hash;
                        }
                    }
                }
            }
        }

        foreach ($gameMappings as $commId => $info)
        {
            $this->app_title[$commId] = $info->title;
            $this->title_player_counts[$commId] ??= 0;
            $this->title_ids[$commId] ??= [];
            $this->title_regions[$commId] ??= [];

            $this->title_ids[$commId] = array_values(array_unique(array_merge($this->title_ids[$commId], $info->ids)));

            foreach ($info->ids as $entryId)
            {
                $region = $this->get_region_from_id($entryId);
                if (!in_array($region, $this->title_regions[$commId], true))
                {
                    $this->title_regions[$commId][] = $region;
                }
            }

            sort($this->title_regions[$commId], SORT_STRING);
        }

        try
        {
            $this->fetchApiData($gameMappings);
        }
        catch (Throwable $e)
        {
            $this->log_error('API error: ' . $e->getMessage());
            $this->has_error = true;
            $this->has_api_error = true;
        }
    }

    /** @param array<string, RPCNGameDefinition> $gameMappings */
    private function fetchApiData(array $gameMappings): void
    {
        $apiData = null;
        $cacheLifetime = $this->apiCacheLifetime;
        $staleApiData = null;

        if (file_exists($this->cache))
        {
            $cached = file_get_contents($this->cache);
            if ($cached !== false)
            {
                $staleApiData = $cached;
                $mtime = filemtime($this->cache);
                if ($mtime !== false && time() - $mtime < $cacheLifetime)
                {
                    $apiData = $cached;
                }
            }
            else
            {
                $this->log_error("Failed to read cache: {$this->cache}. Fetching from API.");
            }
        }

        if ($apiData === null && !$this->allowLiveApi)
        {
            $apiData = $staleApiData ?? '{"num_users":0,"psn_games":[],"ticket_games":[]}';
        }

        if ($apiData === null)
        {
            $ch = curl_init($this->api_url);
            if ($ch === false)
            {
                throw new RuntimeException('Unable to initialize cURL.');
            }

            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => true,
                CURLOPT_HTTPHEADER => ['Accept: application/json'],
                CURLOPT_TIMEOUT => 3,
                CURLOPT_CONNECTTIMEOUT => 2,
            ]);

            $response = curl_exec($ch);
            if (!is_string($response))
            {
                $error = 'cURL error: ' . curl_error($ch);
                curl_close($ch);
                if ($staleApiData !== null)
                {
                    $this->log_error($error . '; using stale usage cache.');
                    $apiData = $staleApiData;
                }
                else
                {
                    throw new RuntimeException($error);
                }
            }

            if (is_string($response))
            {
                $httpCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
                $headerSize = (int)curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                curl_close($ch);

                if ($httpCode !== 200)
                {
                    if ($staleApiData !== null)
                    {
                        $this->log_error("HTTP $httpCode; using stale usage cache.");
                        $apiData = $staleApiData;
                    }
                    else
                    {
                        throw new RuntimeException("HTTP $httpCode");
                    }
                }
                else
                {
                    $apiData = substr($response, $headerSize);
                    if (@file_put_contents($this->cache, $apiData) === false)
                    {
                        $this->log_error("Failed to save cache: {$this->cache}");
                    }
                }
            }
        }

        $data = json_decode($apiData, true);
        if (!is_array($data))
        {
            throw new RuntimeException(json_last_error_msg());
        }

        $numUsers = $data['num_users'] ?? 0;
        $this->total_users = is_numeric($numUsers) ? (int)$numUsers : 0;

        $psnGames = isset($data['psn_games']) && is_array($data['psn_games']) ? $data['psn_games'] : [];
        $ticketGames = isset($data['ticket_games']) && is_array($data['ticket_games']) ? $data['ticket_games'] : [];

        foreach ($gameMappings as $commId => $info)
        {
            $commIdPlayerCount = 0;
            $normalizedCommId = $this->normalize_id($commId);

            foreach ($psnGames as $apiTitleId => $value)
            {
                if ($this->normalize_id((string)$apiTitleId) !== $normalizedCommId) continue;

                if (is_array($value) && isset($value[0]) && is_numeric($value[0]))
                {
                    $commIdPlayerCount += (int)$value[0];
                }
                elseif (is_numeric($value))
                {
                    $commIdPlayerCount += (int)$value;
                }
            }

            if ($commIdPlayerCount > 0)
            {
                $this->title_player_counts[$commId] = ($this->title_player_counts[$commId] ?? 0) + $commIdPlayerCount;
                continue;
            }

            foreach ($info->ids as $entryId)
            {
                $normalizedEntryId = $this->normalize_id($entryId);
                foreach ($ticketGames as $apiTitleId => $count)
                {
                    if ($this->normalize_id((string)$apiTitleId) === $normalizedEntryId && is_numeric($count))
                    {
                        $this->title_player_counts[$commId] = ($this->title_player_counts[$commId] ?? 0) + (int)$count;
                    }
                }
            }
        }

        /** @var list<RPCNPlayerCountEntry> $tempArray */
        $tempArray = [];
        foreach ($this->title_player_counts as $commId => $playerCount)
        {
            $tempArray[] = new RPCNPlayerCountEntry(
                $commId,
                $this->app_title[$commId] ?? 'Unknown Game',
                $playerCount
            );
        }

        usort($tempArray, static function (RPCNPlayerCountEntry $a, RPCNPlayerCountEntry $b): int {
            $diff = $b->playerCount <=> $a->playerCount;
            return $diff !== 0 ? $diff : strnatcasecmp($a->gameTitle, $b->gameTitle);
        });

        $this->title_player_counts = [];
        foreach ($tempArray as $item)
        {
            $commId = $item->commId;
            $this->title_player_counts[$commId] = $item->playerCount;

            if ($item->playerCount <= 0 || isset($this->title_icons[$commId])) continue;

            foreach ($this->title_ids[$commId] ?? [] as $idToCheck)
            {
                $searchId = $this->icon_alias[$idToCheck] ?? $idToCheck;
                $hash = $this->icons_db[$searchId] ?? null;
                if ($hash === null) continue;

                $tempUrl = "/cdn/rpcn/icon0/{$hash}.png";
                $documentRoot = isset($_SERVER['DOCUMENT_ROOT']) && is_string($_SERVER['DOCUMENT_ROOT'])
                    ? $_SERVER['DOCUMENT_ROOT']
                    : '';
                if ($documentRoot !== '' && file_exists($documentRoot . $tempUrl))
                {
                    $this->title_icons[$commId] = $tempUrl;
                    break;
                }
            }
        }
    }

    /** @return array<string, string> */
    private function buildTitleIdMap(): array
    {
        $map = [];
        foreach ($this->title_ids as $commId => $ids)
        {
            foreach ($ids as $id)
            {
                $map[$id] = $commId;
            }
        }
        return $map;
    }

    public function fetchDatabaseStats(mysqli $db, int $cacheTtl = 300): void
    {
        if ($this->db_cache_file !== '' && file_exists($this->db_cache_file))
        {
            $mtime = filemtime($this->db_cache_file);
            if ($mtime !== false && time() - $mtime < $cacheTtl)
            {
                $cached = @file_get_contents($this->db_cache_file);
                if ($cached !== false)
                {
                    $data = json_decode($cached, true);
                    if (is_array($data))
                    {
                        $this->peak_24h_users = RPCNValue::int($data['peak_24h_users'] ?? null);
                        $this->peak_alltime_users = RPCNValue::int($data['peak_alltime_users'] ?? null);
                        $this->peak_alltime_users_date = RPCNValue::string($data['peak_alltime_users_date'] ?? null);
                        $this->top_10_games_24h = $this->parseTopGames24h($data['top_10_games_24h'] ?? []);
                        $this->top_10_games_alltime = $this->parseTopGamesAlltime($data['top_10_games_alltime'] ?? []);
                        return;
                    }
                }
            }
        }

        $this->fetchDatabaseStatsFromDb($db);

        $payload = json_encode([
            'peak_24h_users' => $this->peak_24h_users,
            'peak_alltime_users' => $this->peak_alltime_users,
            'peak_alltime_users_date' => $this->peak_alltime_users_date,
            'top_10_games_24h' => $this->top_10_games_24h,
            'top_10_games_alltime' => $this->top_10_games_alltime,
        ]);
        if ($payload !== false)
        {
            @file_put_contents($this->db_cache_file, $payload);
        }
    }

    /** @return list<RPCNTopGame> */
    private function parseTopGames24h(mixed $value): array
    {
        if (!is_array($value)) return [];

        $out = [];
        foreach ($value as $row)
        {
            if (!is_array($row)) continue;

            $out[] = new RPCNTopGame(
                RPCNValue::string($row['commId'] ?? $row['comm_id'] ?? null),
                RPCNValue::string($row['gameTitle'] ?? $row['game_title'] ?? null, 'Unknown Game'),
                RPCNValue::int($row['peak'] ?? null),
                isset($row['icon']) && is_string($row['icon']) ? $row['icon'] : null
            );
        }

        return $out;
    }

    /** @return list<RPCNTopGame> */
    private function parseTopGamesAlltime(mixed $value): array
    {
        if (!is_array($value)) return [];

        $out = [];
        foreach ($value as $row)
        {
            if (!is_array($row)) continue;

            $out[] = new RPCNTopGame(
                RPCNValue::string($row['commId'] ?? $row['comm_id'] ?? null),
                RPCNValue::string($row['gameTitle'] ?? $row['game_title'] ?? null, 'Unknown Game'),
                RPCNValue::int($row['peak'] ?? null),
                isset($row['icon']) && is_string($row['icon']) ? $row['icon'] : null,
                RPCNValue::string($row['timeAgo'] ?? $row['time_ago'] ?? null)
            );
        }

        return $out;
    }

    private function fetchDatabaseStatsFromDb(mysqli $db): void
    {
        $titleIdMap = $this->buildTitleIdMap();
        $this->top_10_games_24h = [];
        $this->top_10_games_alltime = [];

        $res = $db->query('SELECT MAX(players) AS peak FROM np_players WHERE timestamp >= NOW() - INTERVAL 24 HOUR;');
        if ($res instanceof mysqli_result)
        {
            $row = self::fetch_assoc($res);
            $this->peak_24h_users = RPCNValue::int($row['peak'] ?? null);
        }

        /** @var array<string, int> $games24h */
        $games24h = [];

        $res24Psn = $db->query("SELECT comm_id, MAX(players) AS peak
                                FROM np_psn_games
                                WHERE timestamp >= NOW() - INTERVAL 24 HOUR
                                GROUP BY comm_id;");
        if ($res24Psn instanceof mysqli_result)
        {
            while (($row = self::fetch_assoc($res24Psn)) !== null)
            {
                $commId = isset($row['comm_id']) ? RPCNValue::string($row['comm_id']) : '';
                if ($commId !== '') $games24h[$commId] = RPCNValue::int($row['peak'] ?? null);
            }
        }

        $res24Tkt = $db->query("SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(content_id, '-', -1), '_', 1) AS title_id,
                                       MAX(players) AS peak
                                FROM np_ticket_games
                                WHERE timestamp >= NOW() - INTERVAL 24 HOUR
                                GROUP BY title_id;");
        if ($res24Tkt instanceof mysqli_result)
        {
            while (($row = self::fetch_assoc($res24Tkt)) !== null)
            {
                $titleId = isset($row['title_id']) ? RPCNValue::string($row['title_id']) : '';
                $commId = $titleId !== '' ? ($titleIdMap[$titleId] ?? null) : null;
                if ($commId === null) continue;

                $peak = RPCNValue::int($row['peak'] ?? null);
                if (!isset($games24h[$commId]) || $peak > $games24h[$commId])
                {
                    $games24h[$commId] = $peak;
                }
            }
        }

        arsort($games24h);
        foreach (array_slice($games24h, 0, 10, true) as $commId => $peak)
        {
            $this->top_10_games_24h[] = new RPCNTopGame(
                $commId,
                $this->app_title[$commId] ?? 'Unknown Game',
                $peak,
                $this->resolveIcon($commId)
            );
        }

        $resAll = $db->query('SELECT players AS peak, timestamp FROM np_players ORDER BY players DESC, timestamp ASC LIMIT 1;');
        if ($resAll instanceof mysqli_result)
        {
            $row = self::fetch_assoc($resAll);
            if ($row !== null)
            {
                $this->peak_alltime_users = RPCNValue::int($row['peak'] ?? null);
                $timestamp = isset($row['timestamp']) ? RPCNValue::string($row['timestamp']) : '';
                $this->peak_alltime_users_date = $timestamp !== '' ? $this->time_ago($timestamp) : '';
            }
        }

        /** @var array<string, RPCNPeakRecord> $gamesAlltime */
        $gamesAlltime = [];

        $resAllPsn = $db->query('SELECT `comm_id`, `timestamp`, `players` FROM np_psn_games_peak;');
        if ($resAllPsn instanceof mysqli_result)
        {
            while (($row = self::fetch_assoc($resAllPsn)) !== null)
            {
                $commId = isset($row['comm_id']) ? RPCNValue::string($row['comm_id']) : '';
                if ($commId === '') continue;
                $gamesAlltime[$commId] = new RPCNPeakRecord(
                    RPCNValue::int($row['players'] ?? null),
                    isset($row['timestamp']) ? RPCNValue::string($row['timestamp']) : ''
                );
            }
        }

        $resAllTkt = $db->query("SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(content_id, '-', -1), '_', 1) AS title_id, timestamp, players
                                 FROM np_ticket_games_peak
                                 GROUP BY title_id");
        if ($resAllTkt instanceof mysqli_result)
        {
            while (($row = self::fetch_assoc($resAllTkt)) !== null)
            {
                $titleId = isset($row['title_id']) ? RPCNValue::string($row['title_id']) : '';
                $commId = $titleId !== '' ? ($titleIdMap[$titleId] ?? null) : null;
                if ($commId === null) continue;

                $peak = RPCNValue::int($row['players'] ?? null);
                if (!isset($gamesAlltime[$commId]) || $peak > $gamesAlltime[$commId]->peak)
                {
                    $gamesAlltime[$commId] = new RPCNPeakRecord(
                        $peak,
                        isset($row['timestamp']) ? RPCNValue::string($row['timestamp']) : ''
                    );
                }
            }
        }

        uasort($gamesAlltime, static fn(RPCNPeakRecord $a, RPCNPeakRecord $b): int => $b->peak <=> $a->peak);
        foreach (array_slice($gamesAlltime, 0, 10, true) as $commId => $data)
        {
            $this->top_10_games_alltime[] = new RPCNTopGame(
                $commId,
                $this->app_title[$commId] ?? 'Unknown Game',
                $data->peak,
                $this->resolveIcon($commId),
                $data->date !== '' ? $this->time_ago($data->date) : ''
            );
        }
    }

    private function resolveIcon(string $commId): ?string
    {
        if (isset($this->title_icons[$commId])) return $this->title_icons[$commId];

        foreach ($this->title_ids[$commId] ?? [] as $idToCheck)
        {
            $searchId = $this->icon_alias[$idToCheck] ?? $idToCheck;
            $hash = $this->icons_db[$searchId] ?? null;
            if ($hash === null) continue;

            $tempUrl = "/cdn/rpcn/icon0/{$hash}.png";
            $documentRoot = isset($_SERVER['DOCUMENT_ROOT']) && is_string($_SERVER['DOCUMENT_ROOT'])
                ? $_SERVER['DOCUMENT_ROOT']
                : '';
            if ($documentRoot !== '' && file_exists($documentRoot . $tempUrl))
            {
                $this->title_icons[$commId] = $tempUrl;
                return $tempUrl;
            }
        }

        return null;
    }
}
