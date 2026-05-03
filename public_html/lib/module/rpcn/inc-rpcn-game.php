<?php
class RPCNGame
{
    private string $cacheDir;
    private int    $cacheTime;
    private int    $maxDisplayRows;
    private string $badwordsFile;
    private string $blacklistFile;
    private string $violationLog;
    private string $apiBase;
    private string $parsersPath;
    private string $logFile;
    private string $iconBasePath;
    private string $defaultIcon;

    public bool   $has_error        = false;
    public string $gameTitle        = 'Unknown Game';
    public string $gameIcon         = '';
    public int    $currentPlayers   = 0;
    public array  $regions          = [];
    public bool   $hasLeaderboard   = false;
    public array  $boards           = [];
    public int    $peak24h          = 0;
    public int    $peakAllTime      = 0;
    public string $peakAllTimeDate  = '';
    public string $timeAgoStr       = '';
    public array  $chartDataHourly  = [];
    public array  $chartDataDaily   = [];

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
        string $defaultIcon
    ) {
        $this->cacheDir       = rtrim($cacheDir, '/') . '/';
        $this->cacheTime      = $cacheTime;
        $this->maxDisplayRows = $maxDisplayRows;
        $this->badwordsFile   = $badwordsFile;
        $this->blacklistFile  = $blacklistFile;
        $this->violationLog   = $violationLog;
        $this->apiBase        = rtrim($apiBase, '/');
        $this->parsersPath    = rtrim($parsersPath, '/') . '/';
        $this->logFile        = $logFile;
        $this->iconBasePath   = rtrim($iconBasePath, '/') . '/';
        $this->defaultIcon    = $defaultIcon;
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

    private function is_cache_valid(string $path): bool
    {
        return file_exists($path) && (time() - filemtime($path) < $this->cacheTime);
    }

    private function fetch_api(string $url, string $cacheFile): string
    {
        if ($this->is_cache_valid($cacheFile))
        {
            return $this->read_cache($cacheFile);
        }

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 5,
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

        // Fall back to stale cache if available
        if (file_exists($cacheFile))
        {
            $this->log_error("API returned HTTP {$httpCode} for {$url}, using stale cache.");
            return $this->read_cache($cacheFile);
        }

        $this->log_error("API returned HTTP {$httpCode} for {$url} and no cache exists.");
        return '';
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
        if (!is_array($loaded) || !isset($loaded['config']))
        {
            $this->log_error("Invalid parser structure for comm_id '{$commId}'.");
            echo "<p class='rpcn-error'>An error occurred. Please try again later.</p>";
            return;
        }

        $parser  = $loaded;
        $pConfig = $parser['config'];
        $names   = $pConfig['names'] ?? [];

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

        $blacklist = file_exists($this->blacklistFile) ? include $this->blacklistFile : [];
        if (!is_array($blacklist)) $blacklist = [];

        $apiData     = json_decode($json, true);
        $scores      = $apiData['scores'] ?? ($apiData[0]['scores'] ?? []);
        $timeBoards  = $pConfig['time_boards'] ?? [];
        $isTimeBoard = in_array($boardId, $timeBoards, true);

        $displayRows = [];
        foreach ($scores as $row)
        {
            $userName = $row['online_name'] ?? 'Unknown';
            if (in_array($userName, $blacklist, true)) continue;

            $comment = $row['comment'] ?? '';
            if ($this->check_content($userName, $comment, $commId, $boardId)) continue;

            $rawScore = (float)($row['score'] ?? 0);
            if ($rawScore == 0) continue;

            $formattedValue = $parser['formatter']($rawScore, $boardId, $pConfig, $row['info'] ?? null, $comment);
            $sortValue      = $rawScore;

            if ($isTimeBoard && preg_match('/(\d+):(\d+)\.(\d+)/', $formattedValue, $m))
            {
                $sortValue = ((int)$m[1] * 60000) + ((int)$m[2] * 1000) + (int)$m[3];
            }

            $displayRows[] = ['user' => $userName, 'sort' => $sortValue, 'val' => $formattedValue];
        }

        usort($displayRows, static function ($a, $b) use ($isTimeBoard)
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
        $colDef  = is_array($rawCols) ? ($rawCols[$boardId] ?? 'Score') : $rawCols;
        $cols    = array_map('trim', explode('|', $colDef));

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

    public function load_page_data(string $commId, RPCNStats $stats, ?mysqli $db): void
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
                    $this->gameIcon = $this->iconBasePath . $stats->icons_db[$search] . '.png';
                    break;
                }
            }
        }

        // Leaderboard presence
        $parserPath           = $this->parsersPath . "{$commId}.php";
        $this->hasLeaderboard = file_exists($parserPath);
        if ($this->hasLeaderboard)
        {
            $loaded       = include $parserPath;
            $this->boards = is_array($loaded) ? ($loaded['config']['names'] ?? []) : [];
        }

        // Database stats
        if ($db === null) return;

        $titleIds = $stats->title_ids[$commId] ?? [];
        $queryTicketMax = function(string $extraWhere = '') use ($db, $titleIds): int
        {
            if (empty($titleIds)) return 0;

            $placeholders = implode(',', array_fill(0, count($titleIds), '?'));
            $types        = str_repeat('s', count($titleIds));

            $sql = "
                SELECT MAX(players) AS peak
                FROM   np_ticket_games
                WHERE  SUBSTRING_INDEX(SUBSTRING_INDEX(content_id, '-', -1), '_', 1) IN ($placeholders)
                $extraWhere
            ";
            $stmt = $db->prepare($sql);
            if (!$stmt) return 0;

            $stmt->bind_param($types, ...$titleIds);
            $stmt->execute();
            $val = (int)($stmt->get_result()->fetch_assoc()['peak'] ?? 0);
            $stmt->close();
            return $val;
        };

        // Peak 24 h 
        $stmt = $db->prepare("
            SELECT MAX(players) AS peak
            FROM   np_psn_games
            WHERE  comm_id = ? AND timestamp >= NOW() - INTERVAL 24 HOUR
        ");
        $peak24h_psn = 0;
        if ($stmt)
        {
            $stmt->bind_param('s', $commId);
            $stmt->execute();
            $peak24h_psn = (int)($stmt->get_result()->fetch_assoc()['peak'] ?? 0);
            $stmt->close();
        }
        $peak24h_tkt    = $queryTicketMax("AND timestamp >= NOW() - INTERVAL 24 HOUR");
        $this->peak24h  = max($peak24h_psn, $peak24h_tkt);

        // All-time peak 
        $stmt = $db->prepare("
            SELECT players AS peak, timestamp
            FROM   np_psn_games
            WHERE  comm_id = ?
            ORDER  BY players DESC, timestamp DESC
            LIMIT  1
        ");
        $peakAllTime_psn  = 0;
        $peakDate_psn     = '';
        if ($stmt)
        {
            $stmt->bind_param('s', $commId);
            $stmt->execute();
            $rowAt            = $stmt->get_result()->fetch_assoc();
            $peakAllTime_psn  = (int)($rowAt['peak']      ?? 0);
            $peakDate_psn     = (string)($rowAt['timestamp'] ?? '');
            $stmt->close();
        }

        $peakAllTime_tkt = 0;
        $peakDate_tkt    = '';
        if (!empty($titleIds))
        {
            $placeholders = implode(',', array_fill(0, count($titleIds), '?'));
            $types        = str_repeat('s', count($titleIds));
            $stmt = $db->prepare("
                SELECT MAX(players) AS peak, MAX(timestamp) AS peak_date
                FROM   np_ticket_games
                WHERE  SUBSTRING_INDEX(SUBSTRING_INDEX(content_id, '-', -1), '_', 1) IN ($placeholders)
            ");
            if ($stmt)
            {
                $stmt->bind_param($types, ...$titleIds);
                $stmt->execute();
                $rowTkt          = $stmt->get_result()->fetch_assoc();
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
        $hourly = [];

        $stmt = $db->prepare("
            SELECT DATE_FORMAT(timestamp, '%Y-%m-%d %H:00:00') AS date, MAX(players) AS peak
            FROM   np_psn_games
            WHERE  comm_id = ? AND timestamp >= NOW() - INTERVAL 7 DAY
            GROUP  BY date
            ORDER  BY date ASC
        ");
        if ($stmt)
        {
            $stmt->bind_param('s', $commId);
            $stmt->execute();
            $res = $stmt->get_result();
            while ($row = $res->fetch_assoc())
            {
                $hourly[$row['date']] = max($hourly[$row['date']] ?? 0, (int)$row['peak']);
            }
            $stmt->close();
        }

        if (!empty($titleIds))
        {
            $placeholders = implode(',', array_fill(0, count($titleIds), '?'));
            $types        = str_repeat('s', count($titleIds));
            $stmt = $db->prepare("
                SELECT DATE_FORMAT(timestamp, '%Y-%m-%d %H:00:00') AS date, MAX(players) AS peak
                FROM   np_ticket_games
                WHERE  SUBSTRING_INDEX(SUBSTRING_INDEX(content_id, '-', -1), '_', 1) IN ($placeholders)
                  AND  timestamp >= NOW() - INTERVAL 7 DAY
                GROUP  BY date
                ORDER  BY date ASC
            ");
            if ($stmt)
            {
                $stmt->bind_param($types, ...$titleIds);
                $stmt->execute();
                $res = $stmt->get_result();
                while ($row = $res->fetch_assoc())
                {
                    $hourly[$row['date']] = max($hourly[$row['date']] ?? 0, (int)$row['peak']);
                }
                $stmt->close();
            }
        }

        ksort($hourly);
        foreach ($hourly as $date => $peak)
        {
            $this->chartDataHourly[] = ['x' => $date, 'y' => $peak];
        }

        // Daily chart data (last 1 year) 
        $daily = [];

        $stmt = $db->prepare("
            SELECT DATE(timestamp) AS date, MAX(players) AS peak
            FROM   np_psn_games
            WHERE  comm_id = ? AND timestamp >= NOW() - INTERVAL 1 YEAR
            GROUP  BY DATE(timestamp)
            ORDER  BY date ASC
        ");
        if ($stmt)
        {
            $stmt->bind_param('s', $commId);
            $stmt->execute();
            $res = $stmt->get_result();
            while ($row = $res->fetch_assoc())
            {
                $daily[$row['date']] = max($daily[$row['date']] ?? 0, (int)$row['peak']);
            }
            $stmt->close();
        }

        if (!empty($titleIds))
        {
            $placeholders = implode(',', array_fill(0, count($titleIds), '?'));
            $types        = str_repeat('s', count($titleIds));
            $stmt = $db->prepare("
                SELECT DATE(timestamp) AS date, MAX(players) AS peak
                FROM   np_ticket_games
                WHERE  SUBSTRING_INDEX(SUBSTRING_INDEX(content_id, '-', -1), '_', 1) IN ($placeholders)
                  AND  timestamp >= NOW() - INTERVAL 1 YEAR
                GROUP  BY DATE(timestamp)
                ORDER  BY date ASC
            ");
            if ($stmt)
            {
                $stmt->bind_param($types, ...$titleIds);
                $stmt->execute();
                $res = $stmt->get_result();
                while ($row = $res->fetch_assoc())
                {
                    $daily[$row['date']] = max($daily[$row['date']] ?? 0, (int)$row['peak']);
                }
                $stmt->close();
            }
        }

        ksort($daily);
        foreach ($daily as $date => $peak)
        {
            $this->chartDataDaily[] = ['x' => $date, 'y' => $peak];
        }

        if ($this->peakAllTimeDate !== '')
        {
            $diff = (new DateTime())->diff(new DateTime($this->peakAllTimeDate));
            if ($diff->y > 0)     $this->timeAgoStr = $diff->y . ' year'  . ($diff->y > 1 ? 's' : '') . ' ago';
            elseif ($diff->m > 0) $this->timeAgoStr = $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
            elseif ($diff->d > 0) $this->timeAgoStr = $diff->d . ' day'   . ($diff->d > 1 ? 's' : '') . ' ago';
            else                  $this->timeAgoStr = 'today';
        }
    }
}

$commId = trim($_GET['comm_id'] ?? '');
$isAjax = isset($_GET['ajax']) && $_GET['ajax'] === '1';

if ($commId === '' || !preg_match('/^[A-Z0-9]{4}\d{5}_\d{2}$/', $commId))
{
    if ($isAjax)
    {
        http_response_code(400);
        echo "<p class='rpcn-error'>An error occurred. Please try again later.</p>";
        exit;
    }
    header('Location: ' . $back_link_url);
    exit;
}

$rpcn_game = new RPCNGame(
    $cache,
    (int)$cache_time,
    (int)$max_display_rows,
    $badwords,
    $blacklist,
    $violation_log,
    $api_url,
    $parsers_path,
    $log_file,
    $icon_base_path,
    $default_icon
);

if ($isAjax)
{
    $rpcn_game->handle_ajax($commId, $_GET['board_id'] ?? null);
    exit;
}

$rpcn_stats = new RPCNStats(
    $games_json,
    $log_file,
    $api_url,
    $icons_json,
    $cache . 'usage.json'
);

$mysqli = @mysqli_connect($db_host, $db_user, $db_pass, $db_name, (int)$db_port);
if ($mysqli && $mysqli->connect_error) $mysqli = null;

$rpcn_game->load_page_data($commId, $rpcn_stats, $mysqli ?: null);

if ($mysqli) $mysqli->close();

$gameTitle       = $rpcn_game->gameTitle;
$gameIcon        = $rpcn_game->gameIcon;
$currentPlayers  = $rpcn_game->currentPlayers;
$regions         = $rpcn_game->regions;
$hasLeaderboard  = $rpcn_game->hasLeaderboard;
$boards          = $rpcn_game->boards;
$peak24h         = $rpcn_game->peak24h;
$peakAllTime     = $rpcn_game->peakAllTime;
$timeAgoStr      = $rpcn_game->timeAgoStr;
$chartDataHourly = $rpcn_game->chartDataHourly;
$chartDataDaily  = $rpcn_game->chartDataDaily;