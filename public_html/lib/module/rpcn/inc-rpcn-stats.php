<?php
class RPCNStats {
    private string $games_json;
    private string $log_file;
    private string $api_url;

    public int $total_users = 0;
    /** @var array<string, int> */
    public array $title_player_counts = [];

    public function __construct(string $games_json, string $log_file, string $api_url) {
        $this->games_json = $games_json;
        $this->log_file = $log_file;
        $this->api_url = $api_url;

        $this->processStats();
    }

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

    /*
    private function log_missing_id($id) {
        $timestamp = date('Y-m-d H:i:s');
        $log_entries = file_exists($this->log_file) ? file($this->log_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
        $updated_entries = [];
        $found = false;

        foreach ($log_entries as $entry) {
            // Check if the current entry matches the missing ID
            if (strpos($entry, $id) !== false) {
                $found = true;
                if (preg_match('/x(\d+)$/', $entry, $matches)) {
                    $count = (int)$matches[1] + 1;
                } else {
                    $count = 2; // If there's no count, start from 2
                }
                // Update the entry with the new timestamp and count
                $updated_entries[] = "[$timestamp] UNKNOWN ID: $id x$count";
            } else {
                $updated_entries[] = $entry;
            }
        }
        if (!$found) {
            // Add a new entry if the ID was not found
            $updated_entries[] = "[$timestamp] UNKNOWN ID: $id";
        }
        file_put_contents($this->log_file, implode(PHP_EOL, $updated_entries) . PHP_EOL);
    }
    */

    private function processStats(): void {
        // Load JSON file
        if (!file_exists($this->games_json)) {
            $this->log_error("JSON file not found: {$this->games_json}");
            die("Error: JSON file is missing. Check log for details.");
        }

        // Get file contents and check for failure
        $json_content = file_get_contents($this->games_json);
        if ($json_content === false) {
            $this->log_error("Failed to read JSON file: {$this->games_json}");
            die("Error: Failed to read JSON file. Check log for details.");
        }

        // Decode JSON content
        $game_mappings = json_decode($json_content, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->log_error("Failed to decode JSON file: " . json_last_error_msg());
            die("Error: Failed to parse JSON file. Check log for details.");
        }

        // Fetch API data
        $api_data = @file_get_contents($this->api_url);
        if ($api_data === false) {
            $this->log_error("Failed to fetch API data from {$this->api_url}");
            die("Error: Unable to connect to API. Check log for details.");
        }

        $data = json_decode($api_data, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->log_error("Failed to decode API response: " . json_last_error_msg());
            die("Error: Failed to parse API response. Check log for details.");
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
                                    $comm_id_player_count += (is_numeric($count)) ? (int)$count : 0;
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

        /*
        // Check for IDs in the API data that are not in the JSON file
        foreach ($data['psn_games'] as $api_comm_id => $count) {
            $found = false;
            foreach ($game_mappings as $ids) {
                foreach ($ids['comm_ids'] as $comm_id) {
                    if ($this->normalize_id($api_comm_id) === $this->normalize_id($comm_id)) {
                        $found = true;
                        break 2;
                    }
                }
            }
            if (!$found) {
                $this->log_missing_id($api_comm_id);
            }
        }

        foreach ($data['ticket_games'] as $api_title_id => $count) {
            $found = false;
            foreach ($game_mappings as $ids) {
                foreach ($ids['title_ids'] as $title_id) {
                    if ($this->normalize_id($api_title_id) === $this->normalize_id($title_id)) {
                        $found = true;
                        break 2;
                    }
                }
            }
            if (!$found) {
                $this->log_missing_id($api_title_id);
            }
        }
        */

        arsort($this->title_player_counts); // Sort the results by player count in descending order
    }
}
?>
