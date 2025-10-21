<?php
class RPCNStats {
    private string $games_json;
    private string $log_file;
    private string $api_url;

    public int $total_users = 0;

    /** @var array<string, array<int, string>> */
    public array $title_regions = [];

    /** @var array<string, int> */
    public array $title_player_counts = [];

    /** @var array<string, array<string>> */
    public array $title_ids = [];

    public bool $has_error = false;

    public function __construct(string $games_json, string $log_file, string $api_url) {
        $this->games_json = $games_json;
        $this->log_file = $log_file;
        $this->api_url = $api_url;

        try {
            $this->processStats();
        } catch (Exception $e) {
            $this->log_error($e->getMessage());
            $this->has_error = true;
        }
    }

    // Log errors to the log file
    private function log_error(string $message): void {
        $timestamp = date('Y-m-d H:i:s');
        file_put_contents($this->log_file, "[$timestamp] ERROR: $message" . PHP_EOL, FILE_APPEND);
    }

    // Function to normalize IDs
    private function normalize_id(string $id): string {
        if (preg_match('/[A-Z0-9]+-[A-Z0-9]+/', $id, $matches)) {
            return substr($matches[0], strpos($matches[0], '-') + 1);
        }
        $normalized = preg_replace('/_\d+$/', '', $id); // Remove _XX suffix
        return $normalized ?: $id;
    }

    private function get_region_from_id(string $id): string {
        $third_letter = strtoupper($id[2] ?? ''); // Third character, fallback to empty
        switch ($third_letter) {
            case 'E': return 'EU';   // Europe
            case 'U': return 'US';   // USA
            case 'A': return 'AS';   // Asia
            case 'J': return 'JP';   // Japan
            case 'H': return 'HK';   // Hong Kong
            case 'K': return 'KR';   // South Korea
            case 'I': return 'IN';   // International
            case 'T': return 'IN';   // MRTC
            default:  return 'unknown';
        }
    }

    private function processStats(): void {
        // Load JSON file
        if (!file_exists($this->games_json)) {
            throw new Exception("Games JSON file not found: " . $this->games_json);
        }

        $json_content = file_get_contents($this->games_json);
        if ($json_content === false) {
            throw new Exception("Unable to read {$this->games_json}");
        }
        $game_mappings = json_decode($json_content, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception(json_last_error_msg());
        }

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

        if ($response === false) {
            $error_message = 'cURL error: ' . curl_error($ch);
            $this->log_error($error_message);
            throw new Exception($error_message);
        }

        // Get HTTP status code
        $http_code   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

        if ($http_code !== 200) {
            $error_message = "HTTP $http_code";
            $this->log_error($error_message);
            throw new Exception($error_message);
        }

        /** @var string $response */
        $api_data = substr($response, $header_size);

        curl_close($ch);

        $data = json_decode($api_data, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $error_message = json_last_error_msg();
            $this->log_error($error_message);
            throw new Exception($error_message);
        }

        $this->total_users = isset($data['num_users']) && is_int($data['num_users']) ? $data['num_users'] : 0;

        // Merge Player Counts from API Data
        foreach ($game_mappings as $comm_id => $info) {
            $titles = $info['title'] ?? ["Unknown Game"];
            $game_title = $titles[0] ?? 'Unknown Game';

            // Initialize counts and ID array if not already set
            if (!isset($this->title_player_counts[$game_title])) {
                $this->title_player_counts[$game_title] = 0;
                $this->title_ids[$game_title] = [];
            }

            $ids = $info['id'] ?? [$comm_id];

            // Collect regions for display
            if (!isset($this->title_regions[$game_title])) {
                $this->title_regions[$game_title] = [];
            }

            foreach ($ids as $entry_id) {
                $region = $this->get_region_from_id($entry_id);
                if (!array_key_exists($game_title, $this->title_regions)) {
                    $this->title_regions[$game_title] = [];
                }
                if (!in_array($region, $this->title_regions[$game_title], true)) {
                    $this->title_regions[$game_title][] = $region;
                }
            }

            if (!empty($this->title_regions[$game_title])) {
                sort($this->title_regions[$game_title], SORT_STRING);
            }
            $comm_id_player_count = 0;

            // First try psn_games (comm_id)
            $normalized_entry_id = $this->normalize_id($comm_id);
            if (isset($data['psn_games']) && is_array($data['psn_games'])) {
                foreach ($data['psn_games'] as $api_title_id => $value) {
                    if ($this->normalize_id($api_title_id) === $normalized_entry_id) {
                        if (is_array($value) && isset($value[0])) {
                            $comm_id_player_count += (int) $value[0];
                        } elseif (is_int($value)) {
                            $comm_id_player_count += $value;
                        }
                    }
                }
            }

            // If we got a comm_id match, skip ticket_games
            if ($comm_id_player_count > 0) {
                $this->title_player_counts[$game_title] += $comm_id_player_count;
            } else {
                // Otherwise, check ticket_games
                if (isset($data['ticket_games']) && is_array($data['ticket_games'])) {
                    foreach ($ids as $entry_id) {
                        $normalized_entry_id = $this->normalize_id($entry_id);
                        foreach ($data['ticket_games'] as $api_title_id => $count) {
                            if ($this->normalize_id($api_title_id) === $normalized_entry_id) {
                                $this->title_player_counts[$game_title] += is_numeric($count) ? (int)$count : 0;
                            }
                        }
                    }
                }
            }
        }
        // Sort results
        $temp_array = array_map(
            fn($game_title, $player_count) => ['game_title' => $game_title, 'player_count' => $player_count],
            array_keys($this->title_player_counts),
            $this->title_player_counts
        );

        usort($temp_array, function ($a, $b) {
            // Sort by player_count descending
            $diff = $b['player_count'] <=> $a['player_count'];
            if ($diff !== 0) return $diff;
            
            // If player_count is equal, sort by game_title ascending
            return strcmp($a['game_title'], $b['game_title']);
        });

        $this->title_player_counts = [];
        foreach ($temp_array as $item) {
            $this->title_player_counts[$item['game_title']] = $item['player_count'];
        }
    }
}
?>