<?php
class RPCNStats
{
    private string $games_json;
    private string $log_file;
    private string $api_url;
    private string $icons_json;
    private string $cache;

    public int $total_users = 0;

    public int $peak_24h_users = 0;
    public array $top_10_games_24h = [];

    public int $peak_alltime_users = 0;
    public string $peak_alltime_users_date = '';
    public array $top_10_games_alltime = [];

    /** @var array<string, array<int, string>> */
    public array $title_regions = [];

    /** @var array<string, int> */
    public array $title_player_counts = [];

    /** @var array<string, array<string>> */
    public array $title_ids = [];

    /** @var array<string, string> */
    public array $title_icons = [];

    /** @var array<string, string> */
    public array $app_title = [];

    public bool $has_error = false;

    private array $icons_db = [];

    private array $icon_alias = [
        "BLES00767" => "MRTC00001", "BLUS30462" => "MRTC00001", "BCKS10106" => "MRTC00001", "BLJM60189" => "MRTC00001", "BLJM60338" => "MRTC00001",
        "BLES00710" => "MRTC00002", "BLUS30434" => "MRTC00002", "BLAS50173" => "MRTC00002", "BLJM60177" => "MRTC00002",
        "BLES00783" => "MRTC00003", "BLUS30416" => "MRTC00003",
        "BLES00832" => "MRTC00005", "BLUS30492" => "MRTC00005", "BLAS50250" => "MRTC00005",
        "BLUS30602" => "MRTC00011", "BLES01046" => "MRTC00011",
        "BLES01009" => "MRTC00014", "BLUS30547" => "MRTC00014", "BLJM60272" => "MRTC00014",
        "BLES01112" => "MRTC00016"
    ];

    public function __construct(string $games_json, string $log_file, string $api_url, string $icons_json, string $cache)
    {
        $this->games_json = $games_json;
        $this->log_file = $log_file;
        $this->api_url = $api_url;
        $this->icons_json = $icons_json;
        $this->cache = $cache;

        try
        {
            $this->processStats();
        } 
        catch (Exception $e)
        {
            $this->log_error($e->getMessage());
            $this->has_error = true;
        }
    }

    // Log errors to the log file
    private function log_error(string $message): void
    {
        $timestamp = date('Y-m-d H:i:s');
        file_put_contents($this->log_file, "[$timestamp] ERROR: $message" . PHP_EOL, FILE_APPEND);
    }

    // Function to normalize IDs
    private function normalize_id(string $id): string
    {
        if (preg_match('/[A-Z0-9]+-[A-Z0-9]+/', $id, $matches))
        {
            return substr($matches[0], strpos($matches[0], '-') + 1);
        }
        $normalized = preg_replace('/_\d+$/', '', $id); // Remove _XX suffix
        return $normalized ?: $id;
    }

    private function get_region_from_id(string $id): string
    {
        $third_letter = strtoupper($id[2] ?? ''); // Third character, fallback to empty
        switch ($third_letter)
        {
            case 'E': return 'EU'; // Europe
            case 'U': return 'US'; // USA
            case 'A': return 'AS'; // Asia
            case 'J': return 'JP'; // Japan
            case 'H': return 'HK'; // Hong Kong
            case 'K': return 'KR'; // South Korea
            case 'I': return 'IN'; // International
            case 'T': return 'IN'; // MRTC
            default:  return 'unknown';
        }
    }

    private function time_ago(string $datetime): string
    {
        $now = new DateTime();
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        if ($diff->y > 0) return $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . ' ago';
        if ($diff->m > 0) return $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
        if ($diff->d > 0)
        {
            if ($diff->d >= 14) return floor($diff->d / 7) . ' weeks ago';
            if ($diff->d >= 7) return '1 week ago';
            return $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
        }
        if ($diff->h > 0) return $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
        if ($diff->i > 0) return $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' ago';
        return 'just now';
    }

    private function processStats(): void
    {
        // Load JSON file
        if (!file_exists($this->games_json))
        {
            throw new Exception("Games JSON file not found: " . $this->games_json);
        }

        $json_content = file_get_contents($this->games_json);
        if ($json_content === false)
        {
            throw new Exception("Unable to read {$this->games_json}");
        }
        $game_mappings = json_decode($json_content, true);

        if (json_last_error() !== JSON_ERROR_NONE)
        {
            throw new Exception(json_last_error_msg());
        }

        $this->icons_db = [];
        if (file_exists($this->icons_json))
        {
            $this->icons_db = json_decode(file_get_contents($this->icons_json), true) ?: [];
        }

        $api_data = null;
        $cache_lifetime = 300; // 5 minutes

        // check cache
        if (file_exists($this->cache) && (time() - filemtime($this->cache)) < $cache_lifetime)
        {
            $api_data = file_get_contents($this->cache);
            if ($api_data === false)
            {
                $this->log_error("Failed to read cache: {$this->cache}. Fetching from API.");
                $api_data = null;
            }
        }

        if ($api_data === null)
        {
            // cURL
            $ch = curl_init();
            assert($this->api_url !== '');
            curl_setopt($ch, CURLOPT_URL, $this->api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Accept: application/json',
            ]);

            $response = curl_exec($ch);

            if ($response === false)
            {
                $error_message = 'cURL error: ' . curl_error($ch);
                $this->log_error($error_message);
                throw new Exception($error_message);
            }

            // Get HTTP status code
            $http_code   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

            if ($http_code !== 200)
            {
                $error_message = "HTTP $http_code";
                $this->log_error($error_message);
                throw new Exception($error_message);
            }

            /** @var string $response */
            $api_data = substr($response, $header_size);
            curl_close($ch);

            // save cache
            if (file_put_contents($this->cache, $api_data) === false)
            {
                $this->log_error("Failed to save cache: {$this->cache}");
            }
        }

        $data = json_decode($api_data, true);
        if (json_last_error() !== JSON_ERROR_NONE)
        {
            $error_message = json_last_error_msg();
            $this->log_error($error_message);
            throw new Exception($error_message);
        }

        $this->total_users = isset($data['num_users']) && is_int($data['num_users']) ? $data['num_users'] : 0;

        // Merge Player Counts from API Data
        foreach ($game_mappings as $comm_id => $info) {
            $titles = $info['title'] ?? ["Unknown Game"];
            $game_title = $titles[0] ?? 'Unknown Game';
            $this->app_title[$comm_id] = $game_title;

            // Initialize counts and ID array if not already set
            if (!isset($this->title_player_counts[$comm_id]))
            {
                $this->title_player_counts[$comm_id] = 0;
                $this->title_ids[$comm_id] = [];
            }

            $ids = $info['id'] ?? [$comm_id];

            $this->title_ids[$comm_id] = array_unique(array_merge($this->title_ids[$comm_id], $ids));

            // Collect regions for display
            if (!isset($this->title_regions[$comm_id]))
            {
                $this->title_regions[$comm_id] = [];
            }

            foreach ($ids as $entry_id)
            {
                $region = $this->get_region_from_id($entry_id);
                if (!in_array($region, $this->title_regions[$comm_id], true))
                {
                    $this->title_regions[$comm_id][] = $region;
                }
            }

            if (!empty($this->title_regions[$comm_id]))
            {
                sort($this->title_regions[$comm_id], SORT_STRING);
            }

            $comm_id_player_count = 0;

            // First try psn_games (comm_id)
            $normalized_entry_id = $this->normalize_id($comm_id);
            if (isset($data['psn_games']) && is_array($data['psn_games']))
            {
                foreach ($data['psn_games'] as $api_title_id => $value)
                {
                    if ($this->normalize_id($api_title_id) === $normalized_entry_id)
                    {
                        if (is_array($value) && isset($value[0]))
                        {
                            $comm_id_player_count += (int) $value[0];
                        }
                        elseif (is_int($value))
                        {
                            $comm_id_player_count += $value;
                        }
                    }
                }
            }

            // If we got a comm_id match, skip ticket_games
            if ($comm_id_player_count > 0)
            {
                $this->title_player_counts[$comm_id] += $comm_id_player_count;
            }
            else
            {
                // Otherwise, check ticket_games
                if (isset($data['ticket_games']) && is_array($data['ticket_games']))
                {
                    foreach ($ids as $entry_id)
                    {
                        $normalized_entry_id = $this->normalize_id($entry_id);
                        foreach ($data['ticket_games'] as $api_title_id => $count)
                        {
                            if ($this->normalize_id($api_title_id) === $normalized_entry_id)
                            {
                                $this->title_player_counts[$comm_id] += is_numeric($count) ? (int)$count : 0;
                            }
                        }
                    }
                }
            }
        }

        // Sort results
        $temp_array = array_map(
            fn($comm_id, $player_count) => [
                'comm_id' => $comm_id,
                'game_title' => $this->app_title[$comm_id],
                'player_count' => $player_count
            ],
            array_keys($this->title_player_counts),
            $this->title_player_counts
        );

        usort($temp_array, function ($a, $b)
        {
            // Sort by player_count descending
            $diff = $b['player_count'] <=> $a['player_count'];
            if ($diff !== 0) return $diff;
            // If player_count is equal, sort by game_title ascending
            return strnatcasecmp($a['game_title'], $b['game_title']);
        });

        $this->title_player_counts = [];
        foreach ($temp_array as $item)
        {
            $comm_id = $item['comm_id'];
            $this->title_player_counts[$comm_id] = $item['player_count'];

            if ($item['player_count'] > 0 && !isset($this->title_icons[$comm_id]))
            {
                foreach ($this->title_ids[$comm_id] as $id_to_check)
                {
                    $search_id = $this->icon_alias[$id_to_check] ?? $id_to_check;
                    if (isset($this->icons_db[$search_id]))
                    {
                        $hash = $this->icons_db[$search_id];
                        $this->title_icons[$comm_id] = "/cdn/rpcn/icon0/{$hash}.png";
                        break;
                    }
                }
            }
        }
    }

    public function fetchDatabaseStats(mysqli $db): void
    {
        // 24h peak stats
        $res_global_24 = $db->query("SELECT MAX(players) AS peak FROM np_players WHERE timestamp >= NOW() - INTERVAL 24 HOUR");
        if ($res_global_24 && $row = $res_global_24->fetch_assoc())
        {
            $this->peak_24h_users = (int)$row['peak'];
        }
        $res_games_24 = $db->query
        ("
            SELECT comm_id, MAX(players) AS peak
            FROM np_psn_games
            WHERE timestamp >= NOW() - INTERVAL 24 HOUR
            GROUP BY comm_id
            ORDER BY peak DESC
            LIMIT 10
        ");

        if ($res_games_24)
        {
            while ($row = $res_games_24->fetch_assoc())
            {
                $comm_id = $row['comm_id'];
                $icon_url = null;
                if (isset($this->title_icons[$comm_id]))
                {
                    $icon_url = $this->title_icons[$comm_id];
                }
                elseif (isset($this->title_ids[$comm_id]))
                {
                    foreach ($this->title_ids[$comm_id] as $id_to_check)
                    {
                        $search_id = $this->icon_alias[$id_to_check] ?? $id_to_check;
                        if (isset($this->icons_db[$search_id]))
                        {
                            $hash = $this->icons_db[$search_id];
                            $icon_url = "/cdn/rpcn/icon0/{$hash}.png";
                            $this->title_icons[$comm_id] = $icon_url;
                            break;
                        }
                    }
                }

                $this->top_10_games_24h[] = [
                    'comm_id' => $comm_id,
                    'game_title' => $this->app_title[$comm_id] ?? 'Unknown Game',
                    'peak' => (int)$row['peak'],
                    'icon' => $icon_url
                ];
            }
        }

        // all-time peak stats
        $res_global_all = $db->query("
            SELECT players AS peak, timestamp
            FROM np_players
            ORDER BY players DESC, timestamp DESC
            LIMIT 1
        ");
        if ($res_global_all && $row = $res_global_all->fetch_assoc())
        {
            $this->peak_alltime_users = (int)$row['peak'];
            $this->peak_alltime_users_date = $this->time_ago($row['timestamp']);
        }

        $query_all_games = "
            SELECT m.comm_id, m.peak, MAX(t.timestamp) as peak_date
            FROM (
                SELECT comm_id, MAX(players) AS peak
                FROM np_psn_games
                GROUP BY comm_id
                ORDER BY peak DESC
                LIMIT 10
            ) m
            JOIN np_psn_games t ON t.comm_id = m.comm_id AND t.players = m.peak
            GROUP BY m.comm_id
            ORDER BY m.peak DESC
        ";

        $res_games_all = $db->query($query_all_games);
        if ($res_games_all)
        {
            while ($row = $res_games_all->fetch_assoc())
            {
                $comm_id = $row['comm_id'];
                $icon_url = null;
                if (isset($this->title_icons[$comm_id]))
                {
                    $icon_url = $this->title_icons[$comm_id];
                }
                elseif (isset($this->title_ids[$comm_id]))
                {
                    foreach ($this->title_ids[$comm_id] as $id_to_check)
                    {
                        $search_id = $this->icon_alias[$id_to_check] ?? $id_to_check;
                        if (isset($this->icons_db[$search_id]))
                        {
                            $hash = $this->icons_db[$search_id];
                            $icon_url = "/cdn/rpcn/icon0/{$hash}.png";
                            $this->title_icons[$comm_id] = $icon_url;
                            break;
                        }
                    }
                }

                $this->top_10_games_alltime[] = [
                    'comm_id' => $comm_id,
                    'game_title' => $this->app_title[$comm_id] ?? 'Unknown Game',
                    'peak' => (int)$row['peak'],
                    'time_ago' => $this->time_ago($row['peak_date']),
                    'icon' => $icon_url
                ];
            }
        }
    }
}
?>