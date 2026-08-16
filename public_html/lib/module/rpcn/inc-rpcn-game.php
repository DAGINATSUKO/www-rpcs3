<?php

require_once __DIR__ . '/inc-rpcn-stats.php';

/** @var array{
 *   db_host: string, db_user: string, db_pass: string, db_name: string, db_port: string,
 *   api_url: string, games_json: string, icons_json: string, log_file: string,
 *   badwords: string, blacklist: string, violation_log: string, parsers_path: string,
 *   cache: string, cache_time: int, max_display_rows: int,
 *   game_api_timeout: int, game_api_connect_timeout: int, db_connect_timeout: int, icon_base_path: string,
 *   default_icon: string, pic1_json: string, pic1_base_path: string, back_link_url: string,
 *   trophies_json: string, trophies_icon_base_path: string, trophies_sets_path: string,
 *   trophies_cache_time: int, trophies_enabled: bool,
 *   trophies_rarity_settings: list<array{max_pct: float, name: string, color: string}>
 * } $rpcnConfig
 */
$rpcnConfig = require __DIR__ . '/config.php';

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

    /** @var list<array{max_pct: float, name: string, color: string}> */
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

    /** @var list<array{x: string, y: int}> */
    public array $chartDataHourly = [];

    /** @var list<array{x: string, y: int}> */
    public array $chartDataDaily = [];

    /** @var list<array{x: string, y: int}> */
    public array $chartDataAllTime = [];

    public bool $hasTrophies = false;
    public int $totalTrophies = 0;

    /** @var list<array{id: int, hidden: bool, type: string, name: string, detail: string, earnerCount: int, percentage: float, rarity: string, rarityColor: string, icon: string}> */
    public array $trophies = [];

    /** @param list<array{max_pct: float, name: string, color: string}> $raritySettings */
    public function __construct(
        string $cacheDir,
        int    $cacheTime,
        int    $maxDisplayRows,
        string $badwordsFile,
        string $blacklistFile,
        string $violationLog,
        string $apiBase,
        string $parsersPath,
        string $logFile,
        string $iconBasePath,
        string $defaultIcon,
        string $pic1JsonPath,
        string $pic1BasePath,
        string $trophiesJsonPath,
        string $trophiesIconBasePath,
        string $trophiesSetsPath,
        int    $trophiesCacheTime,
        bool   $trophiesEnabled,
        array  $raritySettings,
        int    $apiTimeout,
        int    $apiConnectTimeout
    ) {
        $this->cacheDir             = rtrim($cacheDir, '/') . '/';
        $this->cacheTime            = $cacheTime;
        $this->maxDisplayRows       = $maxDisplayRows;
        $this->apiTimeout            = $apiTimeout;
        $this->apiConnectTimeout     = $apiConnectTimeout;
        $this->badwordsFile         = $badwordsFile;
        $this->blacklistFile        = $blacklistFile;
        $this->violationLog         = $violationLog;
        $this->apiBase              = rtrim($apiBase, '/');
        $this->parsersPath          = rtrim($parsersPath, '/') . '/';
        $this->logFile              = $logFile;
        $this->iconBasePath         = rtrim($iconBasePath, '/') . '/';
        $this->defaultIcon          = $defaultIcon;
        $this->pic1JsonPath         = $pic1JsonPath;
        $this->pic1BasePath         = rtrim($pic1BasePath, '/') . '/';
        $this->trophiesJsonPath     = $trophiesJsonPath;
        $this->trophiesIconBasePath = rtrim($trophiesIconBasePath, '/') . '/';
        $this->trophiesSetsPath     = rtrim($trophiesSetsPath, '/') . '/';
        $this->trophiesCacheTime    = $trophiesCacheTime;
        $this->trophiesEnabled       = $trophiesEnabled;
        $this->raritySettings       = $raritySettings;
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

    private function loadTrophies(string $commId, bool $loadDetails): void
    {
        $localFile = $this->trophiesSetsPath . $commId . '.json';
        if (!file_exists($localFile)) return;

        $localRaw = @file_get_contents($localFile);
        if ($localRaw === false) return;
        $localData = json_decode($localRaw, true);
        if (!is_array($localData) || !isset($localData['trophies']) || !is_array($localData['trophies']) || $localData['trophies'] === []) return;

        $this->hasTrophies   = true;
        $this->totalTrophies = (int)($localData['totalItemCount'] ?? count($localData['trophies']));

        if (!$loadDetails) return;

        $cacheFile = $this->cacheDir . "trophies_{$commId}.json";
        $url       = $this->apiBase . "/trophy/" . rawurlencode($commId);
        $json      = $this->fetch_api($url, $cacheFile, $this->trophiesCacheTime);
        if ($json === '') return;

        $apiData = json_decode($json, true);
        if (!is_array($apiData)) return;

        $uniquePlayers = (int)($apiData['uniquePlayers'] ?? 0);
        /** @var array<int, int> $earnerMap */
        $earnerMap = [];
        $apiTrophies = $apiData['trophies'] ?? [];
        if (is_array($apiTrophies))
        {
            foreach ($apiTrophies as $t)
            {
                if (!is_array($t)) continue;
                $trophyId = (int)($t['trophyId'] ?? -1);
                if ($trophyId < 0) continue;
                $earnerMap[$trophyId] = (int)($t['earnerCount'] ?? 0);
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

        foreach ($localData['trophies'] as $t)
        {
            if (!is_array($t)) continue;
            $trophyId = (int)($t['trophyId'] ?? -1);
            if ($trophyId < 0) continue;

            $iconHash = $iconMap[$trophyId] ?? '';
            $iconUrl  = $iconHash !== '' ? $this->trophiesIconBasePath . $iconHash . '.png' : $this->defaultIcon;

            $earnerCount = $earnerMap[$trophyId] ?? 0;
            $pct = ($uniquePlayers > 0)
                ? round($earnerCount / $uniquePlayers * 100, 2)
                : 0.0;

            $rarity      = 'Common';
            $rarityColor = '#a0aec0';
            foreach ($this->raritySettings as $setting)
            {
                if (($pct == 0.0 && $setting['max_pct'] == 0.0) || ($pct > 0.0 && $pct <= $setting['max_pct']))
                {
                    $rarity      = $setting['name'];
                    $rarityColor = $setting['color'];
                    break;
                }
            }

            $this->trophies[] = [
                'id'          => $trophyId,
                'hidden'      => (bool)($t['trophyHidden'] ?? false),
                'type'        => (string)($t['trophyType'] ?? 'unknown'),
                'name'        => (string)($t['trophyName'] ?? 'Unknown'),
                'detail'      => (string)($t['trophyDetail'] ?? ''),
                'earnerCount' => $earnerCount,
                'percentage'  => $pct,
                'rarity'      => $rarity,
                'rarityColor' => $rarityColor,
                'icon'        => $iconUrl,
            ];
        }
    }

    // Leaderboard ajax
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
        if (!is_array($loaded) || !isset($loaded['config']) || !is_array($loaded['config']) || !isset($loaded['formatter']) || !is_callable($loaded['formatter']))
        {
            $this->log_error("Invalid parser structure for comm_id '{$commId}'.");
            echo "<p class='rpcn-error'>An error occurred. Please try again later.</p>";
            return;
        }

        $parser = $loaded;
        $pConfig = $parser['config'];
        $formatter = $parser['formatter'];

        /** @var array<int, string> $names */
        $names = [];
        $rawNames = $pConfig['names'] ?? [];
        if (is_array($rawNames))
        {
            foreach ($rawNames as $id => $name)
            {
                if ((is_int($id) || ctype_digit((string)$id)) && is_string($name))
                {
                    $names[(int)$id] = $name;
                }
            }
        }

        // Resolve board ID
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

        // Fetch scores
        $cacheFile = $this->cacheDir . "{$commId}_{$boardId}.json";
        $apiUrl    = $this->apiBase . "/score/" . rawurlencode($commId) . "/" . $boardId;
        $json      = $this->fetch_api($apiUrl, $cacheFile);

        if ($json === '')
        {
            echo "<p class='rpcn-error'>No scores for this board found.</p>"; // not actual error
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

        $timeBoardsRaw = $pConfig['time_boards'] ?? [];
        $timeBoards = is_array($timeBoardsRaw) ? array_map('intval', $timeBoardsRaw) : [];
        $isTimeBoard = in_array($boardId, $timeBoards, true);

        /** @var list<array{user: string, sort: float|int, val: string}> $displayRows */
        $displayRows = [];
        foreach ($scores as $row)
        {
            if (!is_array($row)) continue;
            $userName = (string)($row['online_name'] ?? 'Unknown');
            if (in_array($userName, $blacklist, true)) continue;

            $comment = (string)($row['comment'] ?? '');
            if ($this->check_content($userName, $comment, $commId, $boardId)) continue;

            $rawScore = (float)($row['score'] ?? 0);
            if ($rawScore == 0) continue;

            $formattedValue = (string)$formatter($rawScore, $boardId, $pConfig, $row['info'] ?? null, $comment);
            $sortValue      = $rawScore;

            if ($isTimeBoard && preg_match('/(\d+):(\d+)\.(\d+)/', $formattedValue, $m))
            {
                $sortValue = ((int)$m[1] * 60000) + ((int)$m[2] * 1000) + (int)$m[3];
            }

            $displayRows[] = ['user' => $userName, 'sort' => $sortValue, 'val' => $formattedValue];
        }

        usort($displayRows, static function ($a, $b) use ($isTimeBoard): int
        {
            return $isTimeBoard ? ($a['sort'] <=> $b['sort']) : ($b['sort'] <=> $a['sort']);
        });
        $displayRows = array_slice($displayRows, 0, $this->maxDisplayRows);

        // Render board name
        $boardName = htmlspecialchars($names[$boardId] ?? 'Leaderboard');
        echo "<div class='rpcn-lb-board-name'>{$boardName}</div>";

        if (empty($displayRows))
        {
            echo "<p class='rpcn-no-scores'>No scores found.</p>";
            return;
        }

        // Resolve column headers
        $rawCols = $pConfig['column_names'] ?? 'Score';
        $colDef = is_array($rawCols) ? ($rawCols[$boardId] ?? 'Score') : $rawCols;
        $colDef = is_string($colDef) ? $colDef : 'Score';
        $cols = array_map('trim', explode('|', $colDef));

        // Render table
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
            echo "<td class='rpcn-lb-player'>" . htmlspecialchars($row['user']) . "</td>";
            foreach (explode('|', $row['val']) as $v)
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

    /** @return list<array{x: string, y: int}> */
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
            $out[] = ['x' => $x, 'y' => (int)$y];
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

        $this->peak24h = (int)($pg['peak24h'] ?? 0);
        $this->peakAllTime = (int)($pg['peakAllTime'] ?? 0);
        $this->peakAllTimeDate = (string)($pg['peakAllTimeDate'] ?? '');
        $this->timeAgoStr = (string)($pg['timeAgoStr'] ?? '');
        $this->chartDataHourly = self::parseChartData($pg['chartDataHourly'] ?? []);
        $this->chartDataDaily = self::parseChartData($pg['chartDataDaily'] ?? []);
        $this->chartDataAllTime = self::parseChartData($pg['chartDataAllTime'] ?? []);
        return true;
    }

    public function load_page_data(string $commId, RPCNStats $stats, ?mysqli $db, bool $loadTrophyDetails = false): void
    {
        // Basic game info from the stats object
        $this->gameTitle    = $stats->app_title[$commId] ?? 'Unknown Game';
        $this->regions      = $stats->title_regions[$commId] ?? [];
        $this->currentPlayers = $stats->title_player_counts[$commId] ?? 0;

        // Player count fallback
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

        // Resolve game icon
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

        // Resolve PIC1 background
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

        // Leaderboard presence
        $parserPath           = $this->parsersPath . "{$commId}.php";
        $this->hasLeaderboard = file_exists($parserPath);
        if ($this->hasLeaderboard)
        {
            $loaded = include $parserPath;
            if (is_array($loaded) && isset($loaded['config']) && is_array($loaded['config']))
            {
                $rawNames = $loaded['config']['names'] ?? [];
                if (is_array($rawNames))
                {
                    foreach ($rawNames as $boardId => $name)
                    {
                        if ((is_int($boardId) || ctype_digit((string)$boardId)) && is_string($name))
                        {
                            $this->boards[(int)$boardId] = $name;
                        }
                    }
                }
            }
        }

        if ($this->trophiesEnabled)
        {
            $this->loadTrophies($commId, $loadTrophyDetails);
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

    /** @return array<string, mixed>|null */
    private static function stmtFetchAssoc(mysqli_stmt $stmt): ?array
    {
        $result = $stmt->get_result();
        if (!$result instanceof mysqli_result) return null;
        $row = $result->fetch_assoc();
        return is_array($row) ? $row : null;
    }

    private function loadDbStats(mysqli $db, string $commId, RPCNStats $stats): void
    {
        $titleIds = $stats->title_ids[$commId] ?? [];

        // Peak 24h (PSN Games)
        $stmt = $db->prepare("SELECT MAX(players) AS peak
                              FROM   np_psn_games
                              WHERE  comm_id = ? AND timestamp >= NOW() - INTERVAL 24 HOUR;");
        $peak24h_psn = 0;
        if ($stmt)
        {
            $stmt->bind_param('s', $commId);
            $stmt->execute();
            $row = self::stmtFetchAssoc($stmt);
            $peak24h_psn = (int)($row['peak'] ?? 0);
            $stmt->close();
        }

        // Peak 24h (Ticket Games)
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
                $peak24h_tkt = (int)($row['peak'] ?? 0);
                $stmt->close();
            }
        }

        $this->peak24h = max($peak24h_psn, $peak24h_tkt);

        // All-time peak
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
            $peakAllTime_psn = (int)    ($rowAt['peak']      ?? 0);
            $peakDate_psn    = (string) ($rowAt['timestamp'] ?? '');
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
                $peakAllTime_tkt = (int)($rowTkt['peak']      ?? 0);
                $peakDate_tkt    = (string)($rowTkt['peak_date'] ?? '');
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

        // Hourly chart data (last 7 days)
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
                    $date = isset($row['date']) ? (string)$row['date'] : '';
                    if ($date !== '') $hourly[$date] = max($hourly[$date] ?? 0, (int)($row['peak'] ?? 0));
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
                        $date = isset($row['date']) ? (string)$row['date'] : '';
                        if ($date !== '') $hourly[$date] = max($hourly[$date] ?? 0, (int)($row['peak'] ?? 0));
                    }
                }
                $stmt->close();
            }
        }

        ksort($hourly);
        foreach ($hourly as $date => $peak)
        {
            $this->chartDataHourly[] = ['x' => $date, 'y' => $peak];
        }

        // All-time daily chart data (no date limit)
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
                    $date = isset($row['date']) ? (string)$row['date'] : '';
                    if ($date !== '') $alltime[$date] = max($alltime[$date] ?? 0, (int)($row['peak'] ?? 0));
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
                        $date = isset($row['date']) ? (string)$row['date'] : '';
                        if ($date !== '') $alltime[$date] = max($alltime[$date] ?? 0, (int)($row['peak'] ?? 0));
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
            $point = ['x' => $date, 'y' => $peak];
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
    header('Location: ' . $rpcnConfig['back_link_url']);
    exit;
}

$trophiesEnabled = $rpcnConfig['trophies_enabled'];

$rpcnGame = new RPCNGame(
    $rpcnConfig['cache'],
    $rpcnConfig['cache_time'],
    $rpcnConfig['max_display_rows'],
    $rpcnConfig['badwords'],
    $rpcnConfig['blacklist'],
    $rpcnConfig['violation_log'],
    $rpcnConfig['api_url'],
    $rpcnConfig['parsers_path'],
    $rpcnConfig['log_file'],
    $rpcnConfig['icon_base_path'],
    $rpcnConfig['default_icon'],
    $rpcnConfig['pic1_json'],
    $rpcnConfig['pic1_base_path'],
    $rpcnConfig['trophies_json'],
    $rpcnConfig['trophies_icon_base_path'],
    $rpcnConfig['trophies_sets_path'],
    $rpcnConfig['trophies_cache_time'],
    $trophiesEnabled,
    $rpcnConfig['trophies_rarity_settings'],
    $rpcnConfig['game_api_timeout'],
    $rpcnConfig['game_api_connect_timeout']
);

if ($isAjax)
{
    $boardIdParam = $_GET['board_id'] ?? null;
    $rpcnGame->handle_ajax($commId, is_string($boardIdParam) ? $boardIdParam : null);
    exit;
}

$rpcnStats = new RPCNStats(
    $rpcnConfig['games_json'],
    $rpcnConfig['log_file'],
    $rpcnConfig['api_url'],
    $rpcnConfig['icons_json'],
    $rpcnConfig['cache'] . 'usage.json',
    $rpcnConfig['cache_time'],
    $commId,
    false
);

$tabParam = $_GET['tab'] ?? '';
$loadTrophyDetails = $trophiesEnabled && is_string($tabParam) && $tabParam === 'trophies';

mysqli_report(MYSQLI_REPORT_OFF);
$mysqli = null;
$db = mysqli_init();
if ($db instanceof mysqli)
{
    mysqli_options($db, MYSQLI_OPT_CONNECT_TIMEOUT, $rpcnConfig['db_connect_timeout']);
    if (@mysqli_real_connect(
        $db,
        $rpcnConfig['db_host'],
        $rpcnConfig['db_user'],
        $rpcnConfig['db_pass'],
        $rpcnConfig['db_name'],
        (int)$rpcnConfig['db_port']
    ))
    {
        $mysqli = $db;
        @$mysqli->query("SET SESSION time_zone = '+00:00'");
    }
}

$rpcnGame->load_page_data($commId, $rpcnStats, $mysqli, $loadTrophyDetails);
if ($mysqli instanceof mysqli) $mysqli->close();

/** @var array{
 *   rpcn_game: RPCNGame, commId: string, gameTitle: string, gameIcon: string, gamePic1: string,
 *   defaultIcon: string, default_icon: string, currentPlayers: int, regions: list<string>,
 *   hasLeaderboard: bool, boards: array<int, string>, peak24h: int, peakAllTime: int,
 *   timeAgoStr: string, chartDataHourly: list<array{x: string, y: int}>,
 *   chartDataDaily: list<array{x: string, y: int}>
 * } $pageContext */
$pageContext = [
    'rpcn_game' => $rpcnGame,
    'commId' => $commId,
    'gameTitle' => $rpcnGame->gameTitle,
    'gameIcon' => $rpcnGame->gameIcon,
    'gamePic1' => $rpcnGame->gamePic1,
    'defaultIcon' => $rpcnConfig['default_icon'],
    'default_icon' => $rpcnConfig['default_icon'],
    'currentPlayers' => $rpcnGame->currentPlayers,
    'regions' => $rpcnGame->regions,
    'hasLeaderboard' => $rpcnGame->hasLeaderboard,
    'boards' => $rpcnGame->boards,
    'peak24h' => $rpcnGame->peak24h,
    'peakAllTime' => $rpcnGame->peakAllTime,
    'timeAgoStr' => $rpcnGame->timeAgoStr,
    'chartDataHourly' => $rpcnGame->chartDataHourly,
    'chartDataDaily' => $rpcnGame->chartDataDaily,
];

return $pageContext;
