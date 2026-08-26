<?php

require_once __DIR__ . '/inc-rpcn-stats.php';

$rpcnConfig = require dirname(__DIR__, 4) . '/configs/rpcn.php';
if (!$rpcnConfig instanceof RPCNConfig)
{
    throw new RuntimeException('Invalid RPCN configuration.');
}

class RPCNGame
{
    private string $cacheDir;
    private int    $cacheTime;
    private int    $maxDisplayRows;
    private int    $apiTimeout;
    private int    $apiConnectTimeout;
    private string $badwordsFile;
    private string $blacklistFile;
    private string $violationLog;
    private string $apiBase;
    private string $parsersPath;
    private string $logFile;
    private string $iconBasePath;
    private string $defaultIcon;
    private string $pic1JsonPath;
    private string $pic1BasePath;
    private string $trophiesJsonPath;
    private string $trophiesIconBasePath;
    private string $trophiesSetsPath;
    private int $trophiesCacheTime;
    private bool $trophiesEnabled;

    /** @var list<RPCNRaritySetting> */
    private array $raritySettings;

    public bool $has_error = false;
    public string $gameTitle = 'Unknown Game';
    public string $gameIcon = '';
    public string $gamePic1 = '';
    public int $currentPlayers = 0;

    /** @var list<string> */
    public array $regions = [];

    public bool $hasLeaderboard = false;

    /** @var array<int, string> */
    public array $boards = [];

    public int $peak24h = 0;
    public int $peakAllTime = 0;
    public string $peakAllTimeDate = '';
    public string $timeAgoStr = '';

    /** @var list<RPCNChartPoint> */
    public array $chartDataHourly = [];

    /** @var list<RPCNChartPoint> */
    public array $chartDataDaily = [];

    /** @var list<RPCNChartPoint> */
    public array $chartDataAllTime = [];

    public bool $hasTrophies = false;
    public int $totalTrophies = 0;

    /** @var list<RPCNTrophy> */
    public array $trophies = [];

    /** @var list<string> */
    public array $trophyLanguages = ['en'];

    /** @var array<string, RPCNTrophyGroupDefinition> */
    public array $trophyGroups = [];

    public RPCNTrophyBreakdown $definedTrophies;
    public string $trophyLanguage = 'en';

    public function __construct(RPCNConfig $config)
    {
        $this->cacheDir = rtrim($config->cache, '/') . '/';
        $this->cacheTime = $config->cacheTime;
        $this->maxDisplayRows = $config->maxDisplayRows;
        $this->apiTimeout = $config->gameApiTimeout;
        $this->apiConnectTimeout = $config->gameApiConnectTimeout;
        $this->badwordsFile = $config->badwords;
        $this->blacklistFile = $config->blacklist;
        $this->violationLog = $config->violationLog;
        $this->apiBase = rtrim($config->apiUrl, '/');
        $this->parsersPath = rtrim($config->parsersPath, '/') . '/';
        $this->logFile = $config->logFile;
        $this->iconBasePath = rtrim($config->iconBasePath, '/') . '/';
        $this->defaultIcon = $config->defaultIcon;
        $this->pic1JsonPath = $config->pic1Json;
        $this->pic1BasePath = rtrim($config->pic1BasePath, '/') . '/';
        $this->trophiesJsonPath = $config->trophiesJson;
        $this->trophiesIconBasePath = rtrim($config->trophiesIconBasePath, '/') . '/';
        $this->trophiesSetsPath = rtrim($config->trophiesSetsPath, '/') . '/';
        $this->trophiesCacheTime = $config->trophiesCacheTime;
        $this->trophiesEnabled = $config->trophiesEnabled;
        $this->raritySettings = $config->trophiesRaritySettings;
        $this->definedTrophies = new RPCNTrophyBreakdown();
    }

    private function log_error(string $message): void
    {
        $timestamp = date('Y-m-d H:i:s');
        @file_put_contents($this->logFile, "[$timestamp] GAME ERROR: $message" . PHP_EOL, FILE_APPEND);
    }

    private function log_violation(string $userName, string $comment, string $commId, int $boardId, string $pattern): void
    {
        $entry = sprintf(
            "[%s] AUTO-FILTER | User: %s | Game: %s | Board: %d | Comment: %s | Match: %s\n",
            date('Y-m-d H:i:s'), $userName, $commId, $boardId, $comment, $pattern
        );
        if (@file_put_contents($this->violationLog, $entry, FILE_APPEND) === false)
        {
            $this->log_error("Failed to write to violation log: {$this->violationLog}");
        }
    }

    private function check_content(string $userName, string $comment, string $commId, int $boardId): bool
    {
        if (!file_exists($this->badwordsFile)) return false;
        $badWords = include $this->badwordsFile;
        if (!is_array($badWords) || empty($badWords)) return false;

        foreach ($badWords as $pattern)
        {
            if (!is_string($pattern)) continue;
            if (preg_match($pattern, $userName) || preg_match($pattern, $comment))
            {
                $this->log_violation($userName, $comment, $commId, $boardId, $pattern);
                return true;
            }
        }
        return false;
    }

    private function read_cache(string $path): string
    {
        $data = @file_get_contents($path);
        if ($data === false)
        {
            $this->log_error("Failed to read cache file: {$path}");
            return '';
        }
        return $data;
    }

    private function write_cache(string $path, string $data): void
    {
        if (@file_put_contents($path, $data) === false)
        {
            $this->log_error("Failed to write cache file: {$path}");
        }
    }

    private function is_cache_valid(string $path, ?int $cacheTime = null): bool
    {
        $cacheTime ??= $this->cacheTime;

        if (!file_exists($path)) return false;
        $mtime = filemtime($path);
        return $mtime !== false && (time() - $mtime < $cacheTime);
    }

    private function fetch_api(string $url, string $cacheFile, ?int $cacheTime = null): string
    {
        if ($this->is_cache_valid($cacheFile, $cacheTime))
        {
            return $this->read_cache($cacheFile);
        }

        $ch = curl_init($url);
        if ($ch === false)
        {
            $this->log_error("Unable to initialize cURL for {$url}.");
            return file_exists($cacheFile) ? $this->read_cache($cacheFile) : '';
        }
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => $this->apiTimeout,
            CURLOPT_CONNECTTIMEOUT => $this->apiConnectTimeout,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if (is_string($response) && $httpCode === 200)
        {
            $this->write_cache($cacheFile, $response);
            return $response;
        }

        if (file_exists($cacheFile))
        {
            $this->log_error("API returned HTTP {$httpCode} for {$url}, using stale cache.");
            return $this->read_cache($cacheFile);
        }

        $this->log_error("API returned HTTP {$httpCode} for {$url} and no cache exists.");
        return '';
    }

    private function loadTrophies(string $commId, bool $loadDetails, string $language): void
    {
        $localFile = $this->trophiesSetsPath . $commId . '.json';
        if (!file_exists($localFile)) return;

        $localRaw = @file_get_contents($localFile);
        if ($localRaw === false) return;

        try
        {
            $localData = json_decode($localRaw, true, 512, JSON_THROW_ON_ERROR);
        }
        catch (JsonException $e)
        {
            $this->log_error("Invalid trophy set {$commId}: " . $e->getMessage());
            return;
        }

        $language = RPCNLanguage::normalize($language);
        $trophySet = RPCNTrophySetParser::parse($localData, $language);
        if ($trophySet === null || $trophySet->trophies === []) return;

        $this->hasTrophies = true;
        $this->totalTrophies = $trophySet->totalItemCount;
        $this->definedTrophies = $trophySet->definedTrophies;
        $this->trophyLanguages = $trophySet->languages;
        $this->trophyGroups = $trophySet->groups;
        $this->trophyLanguage = RPCNLanguage::select($trophySet->languages, $language);

        if (!$loadDetails) return;

        $cacheFile = $this->cacheDir . "trophies_{$commId}.json";
        $url = $this->apiBase . "/trophy/" . rawurlencode($commId);
        $json = $this->fetch_api($url, $cacheFile, $this->trophiesCacheTime);
        if ($json === '') return;

        $apiData = json_decode($json, true);
        if (!is_array($apiData)) return;

        $uniquePlayers = RPCNValue::int($apiData['uniquePlayers'] ?? null);
        /** @var array<int, int> $earnerMap */
        $earnerMap = [];
        $apiTrophies = $apiData['trophies'] ?? [];
        if (is_array($apiTrophies))
        {
            foreach ($apiTrophies as $t)
            {
                if (!is_array($t)) continue;
                $trophyId = RPCNValue::int($t['trophyId'] ?? null, -1);
                if ($trophyId < 0) continue;
                $earnerMap[$trophyId] = RPCNValue::int($t['earnerCount'] ?? null);
            }
        }

        /** @var array<int, string> $iconMap */
        $iconMap = [];
        if ($this->trophiesJsonPath !== '' && file_exists($this->trophiesJsonPath))
        {
            $mapRaw = @file_get_contents($this->trophiesJsonPath);
            if ($mapRaw !== false)
            {
                $mapData = json_decode($mapRaw, true);
                if (is_array($mapData) && isset($mapData[$commId]) && is_array($mapData[$commId]))
                {
                    foreach ($mapData[$commId] as $trophyId => $hash)
                    {
                        if (!is_string($hash)) continue;

                        if (is_int($trophyId))
                        {
                            $iconMap[$trophyId] = $hash;
                        }
                        elseif (ctype_digit($trophyId))
                        {
                            $iconMap[(int)$trophyId] = $hash;
                        }
                    }
                }
            }
        }

        foreach ($trophySet->trophies as $trophy)
        {
            $iconHash = $iconMap[$trophy->id] ?? '';
            $iconUrl = $iconHash !== '' ? $this->trophiesIconBasePath . $iconHash . '.png' : $this->defaultIcon;

            $earnerCount = $earnerMap[$trophy->id] ?? 0;
            $pct = ($uniquePlayers > 0)
                ? round($earnerCount / $uniquePlayers * 100, 2)
                : 0.0;

            $rarity = 'Common';
            $rarityColor = '#a0aec0';
            foreach ($this->raritySettings as $setting)
            {
                if (($pct == 0.0 && $setting->maxPct == 0.0) || ($pct > 0.0 && $pct <= $setting->maxPct))
                {
                    $rarity = $setting->name;
                    $rarityColor = $setting->color;
                    break;
                }
            }

            $this->trophies[] = new RPCNTrophy(
                $trophy->id,
                $trophy->hidden,
                $trophy->type,
                $trophy->name,
                $trophy->detail,
                $earnerCount,
                $pct,
                $rarity,
                $rarityColor,
                $iconUrl,
                $trophy->groupId,
                $trophy->onlineOnly
            );
        }
    }

    public function handle_ajax(string $commId, ?string $boardIdParam): void
    {
        $parserPath = $this->parsersPath . "{$commId}.php";

        if (!file_exists($parserPath))
        {
            $this->log_error("Parser not found: {$parserPath}");
            echo "<p class='rpcn-error'>An error occurred. Please try again later.</p>";
            return;
        }

        $loaded = include $parserPath;
        if (!$loaded instanceof RPCNParser)
        {
            $this->log_error("Invalid parser structure for comm_id '{$commId}'.");
            echo "<p class='rpcn-error'>An error occurred. Please try again later.</p>";
            return;
        }

        $parser = $loaded;
        $pConfig = $parser->config;
        $names = $pConfig->names;

        $boardId = null;
        if ($boardIdParam !== null)
        {
            $requestedId = is_numeric($boardIdParam) ? (int)$boardIdParam : null;
            if ($requestedId !== null && array_key_exists($requestedId, $names))
            {
                $boardId = $requestedId;
            }
            else
            {
                $this->log_error("Invalid board_id '{$boardIdParam}' for comm_id '{$commId}'.");
                echo "<p class='rpcn-error'>An error occurred. Please try again later.</p>";
                return;
            }
        }
        elseif (count($names) === 1)
        {
            $boardId = (int)array_key_first($names);
        }
        else
        {
            $this->log_error("No board_id provided for multi-board game '{$commId}'.");
            echo "<p class='rpcn-error'>An error occurred. Please try again later.</p>";
            return;
        }

        $cacheFile = $this->cacheDir . "{$commId}_{$boardId}.json";
        $apiUrl    = $this->apiBase . "/score/" . rawurlencode($commId) . "/" . $boardId;
        $json      = $this->fetch_api($apiUrl, $cacheFile);

        if ($json === '')
        {
            echo "<p class='rpcn-error'>No scores for this board found.</p>";
            return;
        }

        $blacklistRaw = file_exists($this->blacklistFile) ? include $this->blacklistFile : [];
        $blacklist = is_array($blacklistRaw) ? array_values(array_filter($blacklistRaw, 'is_string')) : [];

        $apiData = json_decode($json, true);
        if (!is_array($apiData))
        {
            $this->log_error("Invalid score JSON for comm_id '{$commId}'.");
            return;
        }

        $scores = [];
        if (isset($apiData['scores']) && is_array($apiData['scores']))
        {
            $scores = $apiData['scores'];
        }
        elseif (isset($apiData[0]) && is_array($apiData[0]) && isset($apiData[0]['scores']) && is_array($apiData[0]['scores']))
        {
            $scores = $apiData[0]['scores'];
        }

        $isTimeBoard = in_array($boardId, $pConfig->timeBoards, true);

        /** @var list<RPCNLeaderboardRow> $displayRows */
        $displayRows = [];
        foreach ($scores as $row)
        {
            if (!is_array($row)) continue;
            $userName = RPCNValue::string($row['online_name'] ?? null, 'Unknown');
            if (in_array($userName, $blacklist, true)) continue;

            $comment = RPCNValue::string($row['comment'] ?? null);
            if ($this->check_content($userName, $comment, $commId, $boardId)) continue;

            $rawScore = RPCNValue::int($row['score'] ?? null);
            if ($rawScore == 0) continue;

            $info = RPCNValue::string($row['info'] ?? null);
            $formattedValue = $parser->format($rawScore, $boardId, $info, $comment);
            $sortValue      = $rawScore;

            if ($isTimeBoard && preg_match('/(\d+):(\d+)\.(\d+)/', $formattedValue, $m))
            {
                $sortValue = ((int)$m[1] * 60000) + ((int)$m[2] * 1000) + (int)$m[3];
            }

            $displayRows[] = new RPCNLeaderboardRow($userName, $sortValue, $formattedValue);
        }

        usort($displayRows, static function (RPCNLeaderboardRow $a, RPCNLeaderboardRow $b) use ($isTimeBoard): int
        {
            return $isTimeBoard ? ($a->sort <=> $b->sort) : ($b->sort <=> $a->sort);
        });
        $displayRows = array_slice($displayRows, 0, $this->maxDisplayRows);

        $boardName = htmlspecialchars($names[$boardId] ?? 'Leaderboard');
        echo "<div class='rpcn-lb-board-name'>{$boardName}</div>";

        if (empty($displayRows))
        {
            echo "<p class='rpcn-no-scores'>No scores found.</p>";
            return;
        }

        $colDef = $pConfig->columnNames[$boardId] ?? 'Score';
        $cols = array_map('trim', explode('|', $colDef));

        echo "<div class='rpcn-lb-table-wrap'><table class='rpcn-lb-table'>";
        echo "<thead><tr>";
        echo "<th class='rpcn-lb-th rpcn-lb-th-rank'>Rank</th>";
        echo "<th class='rpcn-lb-th'>Player</th>";
        foreach ($cols as $c)
        {
            echo "<th class='rpcn-lb-th rpcn-lb-th-score'>" . htmlspecialchars($c) . "</th>";
        }
        echo "</tr></thead><tbody>";

        foreach ($displayRows as $idx => $row)
        {
            $rank     = $idx + 1;
            $rowClass = match($rank) {
                1       => 'rpcn-lb-row-gold',
                2       => 'rpcn-lb-row-silver',
                3       => 'rpcn-lb-row-bronze',
                default => '',
            };
            echo "<tr class='{$rowClass}'>";
            echo "<td class='rpcn-lb-rank'>{$rank}.</td>";
            echo "<td class='rpcn-lb-player'>" . htmlspecialchars($row->user) . "</td>";
            foreach (explode('|', $row->value) as $v)
            {
                echo "<td class='rpcn-lb-score'>" . htmlspecialchars(trim($v)) . "</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table></div>";
    }

    public function get_board_html(string $commId, int $boardId): string
    {
        ob_start();
        $this->handle_ajax($commId, (string)$boardId);
        return ob_get_clean() ?: '';
    }

    /** @return list<RPCNChartPoint> */
    private static function parseChartData(mixed $value): array
    {
        if (!is_array($value)) return [];

        $out = [];
        foreach ($value as $point)
        {
            if (!is_array($point)) continue;

            $x = $point['x'] ?? null;
            $y = $point['y'] ?? null;
            if (!is_string($x) || !is_numeric($y)) continue;

            $out[] = new RPCNChartPoint($x, (int)$y);
        }

        return $out;
    }

    private function pageStatsCacheFile(string $commId): string
    {
        $safeCommId = preg_replace('/[^A-Za-z0-9_]/', '_', $commId) ?? $commId;
        return $this->cacheDir . $safeCommId . '_pgstats_v2.json';
    }

    private function loadPageStatsCache(string $commId): bool
    {
        $path = $this->pageStatsCacheFile($commId);
        if (!file_exists($path)) return false;

        $mtime = filemtime($path);
        if ($mtime === false || (time() - $mtime) >= $this->cacheTime) return false;

        $raw = @file_get_contents($path);
        if ($raw === false) return false;

        $pg = json_decode($raw, true);
        if (!is_array($pg)) return false;

        $this->peak24h = RPCNValue::int($pg['peak24h'] ?? null);
        $this->peakAllTime = RPCNValue::int($pg['peakAllTime'] ?? null);
        $this->peakAllTimeDate = RPCNValue::string($pg['peakAllTimeDate'] ?? null);
        $this->timeAgoStr = RPCNValue::string($pg['timeAgoStr'] ?? null);
        $this->chartDataHourly = self::parseChartData($pg['chartDataHourly'] ?? []);
        $this->chartDataDaily = self::parseChartData($pg['chartDataDaily'] ?? []);
        $this->chartDataAllTime = self::parseChartData($pg['chartDataAllTime'] ?? []);
        return true;
    }

    public function load_page_data(string $commId, RPCNStats $stats, ?mysqli $db, bool $loadTrophyDetails = false, string $trophyLanguage = 'en'): void
    {
        $this->gameTitle    = $stats->app_title[$commId] ?? 'Unknown Game';
        $this->regions      = $stats->title_regions[$commId] ?? [];
        $this->currentPlayers = $stats->title_player_counts[$commId] ?? 0;

        if ($this->currentPlayers === 0)
        {
            foreach ($stats->title_player_counts as $apiCommId => $count)
            {
                if (stripos($apiCommId, $commId) !== false || stripos($commId, $apiCommId) !== false)
                {
                    $this->currentPlayers = $count;
                    break;
                }
            }
        }

        $this->gameIcon = $this->defaultIcon;
        if (isset($stats->title_icons[$commId]))
        {
            $this->gameIcon = $stats->title_icons[$commId];
        }
        elseif (isset($stats->title_ids[$commId]))
        {
            foreach ($stats->title_ids[$commId] as $id)
            {
                $search = $stats->icon_alias[$id] ?? $id;
                if (isset($stats->icons_db[$search]))
                {
                    $file_name = $stats->icons_db[$search] . '.png';
                    $temp_url  = $this->iconBasePath . $file_name;

                    if (file_exists($temp_url))
                    {
                        $this->gameIcon = $temp_url;
                        break;
                    }
                }
            }
        }

        $this->gamePic1 = ''; 
        if ($this->pic1JsonPath !== '' && file_exists($this->pic1JsonPath))
        {
            $pic1Raw = file_get_contents($this->pic1JsonPath);
            $pic1Db = $pic1Raw !== false ? json_decode($pic1Raw, true) : [];
            if (!is_array($pic1Db)) $pic1Db = [];
            foreach ($stats->title_ids[$commId] ?? [] as $id)
            {
                $search = $stats->icon_alias[$id] ?? $id;
                if (isset($pic1Db[$search]) && is_string($pic1Db[$search]))
                {
                    $file_name = $pic1Db[$search] . '.png';
                    $temp_url  = $this->pic1BasePath . $file_name;

                    if (file_exists($temp_url))
                    {
                        $this->gamePic1 = $temp_url;
                        break;
                    }
                }
            }
        }

        $parserPath           = $this->parsersPath . "{$commId}.php";
        $this->hasLeaderboard = file_exists($parserPath);
        if ($this->hasLeaderboard)
        {
            $loaded = include $parserPath;
            if ($loaded instanceof RPCNParser)
            {
                $this->boards = $loaded->config->names;
            }
            else
            {
                $this->hasLeaderboard = false;
            }
        }

        if ($this->trophiesEnabled)
        {
            $this->loadTrophies($commId, $loadTrophyDetails, $trophyLanguage);
        }

        if ($this->loadPageStatsCache($commId)) return;
        if ($db === null) return;

        $this->loadDbStats($db, $commId, $stats);
        $pgCacheFile = $this->pageStatsCacheFile($commId);

        $cachePayload = json_encode([
            'peak24h' => $this->peak24h,
            'peakAllTime' => $this->peakAllTime,
            'peakAllTimeDate' => $this->peakAllTimeDate,
            'timeAgoStr' => $this->timeAgoStr,
            'chartDataHourly' => $this->chartDataHourly,
            'chartDataDaily' => $this->chartDataDaily,
            'chartDataAllTime' => $this->chartDataAllTime,
        ]);
        if ($cachePayload !== false) @file_put_contents($pgCacheFile, $cachePayload);
    }

    /** @return array<string, mixed> */
    private static function stmtFetchAssoc(mysqli_stmt $stmt): array
    {
        $result = $stmt->get_result();
        if (!$result instanceof mysqli_result) return [];
        $row = $result->fetch_assoc();
        return is_array($row) ? $row : [];
    }

    private function loadDbStats(mysqli $db, string $commId, RPCNStats $stats): void
    {
        $titleIds = $stats->title_ids[$commId] ?? [];

        $stmt = $db->prepare("SELECT MAX(players) AS peak
                              FROM   np_psn_games
                              WHERE  comm_id = ? AND timestamp >= NOW() - INTERVAL 24 HOUR;");
        $peak24h_psn = 0;
        if ($stmt)
        {
            $stmt->bind_param('s', $commId);
            $stmt->execute();
            $row = self::stmtFetchAssoc($stmt);
            $peak24h_psn = RPCNValue::int($row['peak'] ?? null);
            $stmt->close();
        }

        $peak24h_tkt = 0;
        if ($titleIds !== [])
        {
            $placeholders = implode(',', array_fill(0, count($titleIds), '?'));
            $types = str_repeat('s', count($titleIds));
            $stmt = $db->prepare("SELECT MAX(players) AS peak
                                  FROM np_ticket_games
                                  WHERE SUBSTRING_INDEX(SUBSTRING_INDEX(content_id, '-', -1), '_', 1) IN ($placeholders)
                                    AND timestamp >= NOW() - INTERVAL 24 HOUR;");
            if ($stmt)
            {
                $stmt->bind_param($types, ...$titleIds);
                $stmt->execute();
                $row = self::stmtFetchAssoc($stmt);
                $peak24h_tkt = RPCNValue::int($row['peak'] ?? null);
                $stmt->close();
            }
        }

        $this->peak24h = max($peak24h_psn, $peak24h_tkt);

        $stmt = $db->prepare("SELECT players AS peak, timestamp
                              FROM   np_psn_games_peak
                              WHERE  comm_id = ?;");
        $peakAllTime_psn = 0;
        $peakDate_psn    = '';
        if ($stmt)
        {
            $stmt->bind_param('s', $commId);
            $stmt->execute();
            $rowAt = self::stmtFetchAssoc($stmt);
            $peakAllTime_psn = RPCNValue::int($rowAt['peak'] ?? null);
            $peakDate_psn    = RPCNValue::string($rowAt['timestamp'] ?? null);
            $stmt->close();
        }

        $peakAllTime_tkt = 0;
        $peakDate_tkt    = '';
        if (!empty($titleIds))
        {
            $placeholders = implode(',', array_fill(0, count($titleIds), '?'));
            $types        = str_repeat('s', count($titleIds));
            $stmt = $db->prepare("SELECT players AS peak, timestamp AS peak_date
                                  FROM   np_ticket_games_peak
                                  WHERE  SUBSTRING_INDEX(SUBSTRING_INDEX(content_id, '-', -1), '_', 1) IN ($placeholders)
                                  ORDER BY players DESC, timestamp ASC
                                  LIMIT 1;");
            if ($stmt)
            {
                $stmt->bind_param($types, ...$titleIds);
                $stmt->execute();
                $rowTkt = self::stmtFetchAssoc($stmt);
                $peakAllTime_tkt = RPCNValue::int($rowTkt['peak'] ?? null);
                $peakDate_tkt    = RPCNValue::string($rowTkt['peak_date'] ?? null);
                $stmt->close();
            }
        }

        if ($peakAllTime_psn >= $peakAllTime_tkt)
        {
            $this->peakAllTime     = $peakAllTime_psn;
            $this->peakAllTimeDate = $peakDate_psn;
        }
        else
        {
            $this->peakAllTime     = $peakAllTime_tkt;
            $this->peakAllTimeDate = $peakDate_tkt;
        }

        /** @var array<string, int> $hourly */
        $hourly = [];

        $stmt = $db->prepare("SELECT DATE_FORMAT(timestamp, '%Y-%m-%d %H:00:00') AS date, MAX(players) AS peak
                              FROM   np_psn_games
                              WHERE  comm_id = ? AND timestamp >= NOW() - INTERVAL 7 DAY
                              GROUP  BY date
                              ORDER  BY date ASC;");
        if ($stmt)
        {
            $stmt->bind_param('s', $commId);
            $stmt->execute();
            $res = $stmt->get_result();
            if ($res instanceof mysqli_result)
            {
                while ($row = $res->fetch_assoc())
                {
                    $date = RPCNValue::string($row['date'] ?? null);
                    if ($date !== '') $hourly[$date] = max($hourly[$date] ?? 0, RPCNValue::int($row['peak'] ?? null));
                }
            }
            $stmt->close();
        }

        if (!empty($titleIds))
        {
            $placeholders = implode(',', array_fill(0, count($titleIds), '?'));
            $types        = str_repeat('s', count($titleIds));
            $stmt = $db->prepare("SELECT DATE_FORMAT(timestamp, '%Y-%m-%d %H:00:00') AS date, MAX(players) AS peak
                                  FROM   np_ticket_games
                                  WHERE  SUBSTRING_INDEX(SUBSTRING_INDEX(content_id, '-', -1), '_', 1) IN ($placeholders)
                                    AND  timestamp >= NOW() - INTERVAL 7 DAY
                                  GROUP  BY date
                                  ORDER  BY date ASC;");
            if ($stmt)
            {
                $stmt->bind_param($types, ...$titleIds);
                $stmt->execute();
                $res = $stmt->get_result();
                if ($res instanceof mysqli_result)
                {
                    while ($row = $res->fetch_assoc())
                    {
                        $date = RPCNValue::string($row['date'] ?? null);
                        if ($date !== '') $hourly[$date] = max($hourly[$date] ?? 0, RPCNValue::int($row['peak'] ?? null));
                    }
                }
                $stmt->close();
            }
        }

        ksort($hourly);
        foreach ($hourly as $date => $peak)
        {
            $this->chartDataHourly[] = new RPCNChartPoint($date, $peak);
        }

        /** @var array<string, int> $alltime */
        $alltime = [];

        $stmt = $db->prepare("SELECT DATE(timestamp) AS date, MAX(players) AS peak
                              FROM   np_psn_games
                              WHERE  comm_id = ?
                              GROUP  BY DATE(timestamp)
                              ORDER  BY date ASC;");
        if ($stmt)
        {
            $stmt->bind_param('s', $commId);
            $stmt->execute();
            $res = $stmt->get_result();
            if ($res instanceof mysqli_result)
            {
                while ($row = $res->fetch_assoc())
                {
                    $date = RPCNValue::string($row['date'] ?? null);
                    if ($date !== '') $alltime[$date] = max($alltime[$date] ?? 0, RPCNValue::int($row['peak'] ?? null));
                }
            }
            $stmt->close();
        }

        if (!empty($titleIds))
        {
            $placeholders = implode(',', array_fill(0, count($titleIds), '?'));
            $types        = str_repeat('s', count($titleIds));
            $stmt = $db->prepare("SELECT DATE(timestamp) AS date, MAX(players) AS peak
                                  FROM   np_ticket_games
                                  WHERE  SUBSTRING_INDEX(SUBSTRING_INDEX(content_id, '-', -1), '_', 1) IN ($placeholders)
                                  GROUP  BY DATE(timestamp)
                                  ORDER  BY date ASC;");
            if ($stmt)
            {
                $stmt->bind_param($types, ...$titleIds);
                $stmt->execute();
                $res = $stmt->get_result();
                if ($res instanceof mysqli_result)
                {
                    while ($row = $res->fetch_assoc())
                    {
                        $date = RPCNValue::string($row['date'] ?? null);
                        if ($date !== '') $alltime[$date] = max($alltime[$date] ?? 0, RPCNValue::int($row['peak'] ?? null));
                    }
                }
                $stmt->close();
            }
        }

        ksort($alltime);
        $oneYearCutoff = (new DateTimeImmutable('now', new DateTimeZone('UTC')))
            ->modify('-1 year')
            ->format('Y-m-d');
        foreach ($alltime as $date => $peak)
        {
            $point = new RPCNChartPoint($date, $peak);
            $this->chartDataAllTime[] = $point;
            if ($date >= $oneYearCutoff)
            {
                $this->chartDataDaily[] = $point;
            }
        }

        if ($this->peakAllTimeDate !== '')
        {
            $diff        = (new DateTime())->diff(new DateTime($this->peakAllTimeDate));
            $totalMonths = $diff->y * 12 + $diff->m;
            if ($totalMonths >= 12)
            {
                $years   = $totalMonths / 12;
                $rounded = round($years * 2) / 2;
                if ($rounded == (int)$rounded)
                    $this->timeAgoStr = (int)$rounded . ' year' . ($rounded != 1 ? 's' : '') . ' ago';
                else
                    $this->timeAgoStr = number_format($rounded, 1) . ' years ago';
            }
            elseif ($diff->m > 0) $this->timeAgoStr = $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
            elseif ($diff->d > 0) $this->timeAgoStr = $diff->d . ' day'   . ($diff->d > 1 ? 's' : '') . ' ago';
            else                  $this->timeAgoStr = 'today';
        }
    }
}

$commIdParam = $_GET['comm_id'] ?? '';
$commId = is_string($commIdParam) ? trim($commIdParam) : '';
$isAjax = isset($_GET['ajax']) && $_GET['ajax'] === '1';

if ($commId === '' || preg_match('/^[A-Z0-9]{4}\d{5}_\d{2}$/', $commId) !== 1)
{
    if ($isAjax)
    {
        http_response_code(400);
        echo "<p class='rpcn-error'>An error occurred. Please try again later.</p>";
        exit;
    }
    header('Location: ' . $rpcnConfig->backLinkUrl);
    exit;
}

$rpcnGame = new RPCNGame($rpcnConfig);

if ($isAjax)
{
    $boardIdParam = $_GET['board_id'] ?? null;
    $rpcnGame->handle_ajax($commId, is_string($boardIdParam) ? $boardIdParam : null);
    exit;
}

$rpcnStats = new RPCNStats(
    $rpcnConfig,
    $commId,
    true
);

$tabParam = $_GET['tab'] ?? '';
$loadTrophyDetails = $rpcnConfig->trophiesEnabled && is_string($tabParam) && $tabParam === 'trophies';

$trophyLanguage = RPCNLanguage::normalize($_GET['lang'] ?? 'en');

mysqli_report(MYSQLI_REPORT_OFF);
$mysqli = null;
$db = mysqli_init();
if ($db instanceof mysqli)
{
    mysqli_options($db, MYSQLI_OPT_CONNECT_TIMEOUT, $rpcnConfig->dbConnectTimeout);
    if (@mysqli_real_connect(
        $db,
        $rpcnConfig->dbHost,
        $rpcnConfig->dbUser,
        $rpcnConfig->dbPass,
        $rpcnConfig->dbName,
        (int)$rpcnConfig->dbPort
    ))
    {
        $mysqli = $db;
        @$mysqli->query("SET SESSION time_zone = '+00:00'");
    }
}

$rpcnGame->load_page_data($commId, $rpcnStats, $mysqli, $loadTrophyDetails, $trophyLanguage);
if ($mysqli instanceof mysqli) $mysqli->close();

$pageContext = new RPCNGamePageContext(
    $rpcnGame,
    $commId,
    $rpcnGame->gameTitle,
    $rpcnGame->gameIcon,
    $rpcnGame->gamePic1,
    $rpcnConfig->defaultIcon,
    $rpcnGame->currentPlayers,
    $rpcnGame->regions,
    $rpcnGame->hasLeaderboard,
    $rpcnGame->boards,
    $rpcnGame->peak24h,
    $rpcnGame->peakAllTime,
    $rpcnGame->timeAgoStr,
    $rpcnGame->chartDataHourly,
    $rpcnGame->chartDataDaily
);

return $pageContext;
