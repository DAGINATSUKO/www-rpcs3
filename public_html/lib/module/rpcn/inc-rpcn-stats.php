<?php
class RPCNStats {
    private string $games_json;
    private string $log_file;
    private string $api_url;

    public int $total_users = 0;
    /** @var array<string, int> */
    public array $title_player_counts = [];
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

    private function processStats(): void {
        // Load JSON file
        if (!file_exists($this->games_json)) {
            throw new Exception("Games JSON file not found: " . $this->games_json);
        }

        $json_content = file_get_contents($this->games_json);
        $game_mappings = json_decode($json_content, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception(json_last_error_msg());
        }

        // cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error_message = 'cURL error: ' . curl_error($ch);
            $this->log_error($error_message);
            throw new Exception($error_message);
        }

        // Get HTTP status code
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code !== 200) {
            $error_message = "HTTP $http_code";
            $this->log_error($error_message);
            throw new Exception($error_message);
        }

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $headers = substr($response, 0, $header_size);
        $api_data = substr($response, $header_size);

        curl_close($ch);

        if ($api_data === false) {
            $last_error = error_get_last();
            $error_message = $last_error ? $last_error['message'] : 'Unknown error occurred while fetching API data';
            $this->log_error($error_message);
            throw new Exception($error_message);
        }

        $data = json_decode($api_data, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $error_message = json_last_error_msg();
            $this->log_error($error_message);
            throw new Exception($error_message);
        }

        $this->total_users = isset($data['num_users']) && is_int($data['num_users']) ? $data['num_users'] : 0;

        // Merge Player Counts from API Data
        foreach ($game_mappings as $game_title => $ids) {
            $this->title_player_counts[$game_title] = 0;
            $comm_id_player_count = 0; // Store player count from comm_ids if found

            if (isset($ids['comm_ids']) && is_array($ids['comm_ids'])) {
                foreach ($ids['comm_ids'] as $comm_id) {
                    if (is_string($comm_id)) {
                        $normalized_comm_id = $this->normalize_id($comm_id);

                        if (isset($data['psn_games']) && is_array($data['psn_games'])) {
                            foreach ($data['psn_games'] as $api_comm_id => $value) {
                                $player_count = is_array($value) ? (int)$value[0] : (int)$value;
                                if ($this->normalize_id($api_comm_id) === $normalized_comm_id) {
                                    $comm_id_player_count += $player_count;
                                }
                            }
                        }
                    }
                }
            }

            // If we have a count from comm_ids, use it and skip counting title_ids
            if ($comm_id_player_count > 0) {
                $this->title_player_counts[$game_title] = $comm_id_player_count;
            } else {
                // If no comm_ids found, count players based on title_ids
                if (isset($ids['title_ids']) && is_array($ids['title_ids'])) {
                    foreach ($ids['title_ids'] as $title_id) {
                        if (is_string($title_id)) {
                            $normalized_title_id = $this->normalize_id($title_id);

                            if (isset($data['ticket_games']) && is_array($data['ticket_games'])) {
                                foreach ($data['ticket_games'] as $api_title_id => $count) {
                                    if ($this->normalize_id($api_title_id) === $normalized_title_id) {
                                        $this->title_player_counts[$game_title] += (is_numeric($count)) ? (int)$count : 0;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $temp_array = [];
        foreach ($this->title_player_counts as $game_title => $player_count) {
        $temp_array[] = ['game_title' => $game_title, 'player_count' => $player_count];
        }

        usort($temp_array, function ($a, $b) {
            if ($a['player_count'] != $b['player_count']) {
                return $b['player_count'] - $a['player_count'];
            }
            return strcmp($a['game_title'], $b['game_title']);
        });

        $this->title_player_counts = [];
        foreach ($temp_array as $item) {
            $this->title_player_counts[$item['game_title']] = $item['player_count'];
        }
    }
}
?>