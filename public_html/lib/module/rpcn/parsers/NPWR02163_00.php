<?php
$names = [
    1 => "Player Kills",
    2 => "Total Playtime",
    3 => "Career XP Earned",
    4 => "Highest Total Campaign XP",
];

return [
    "title" => "Resident Evil: Operation Raccoon City",
    "config" => [
        "game_id" => ["BLES01288", "BLES01417", "BLJM60342", "BLUS30750", "NPEB00985"],
        "names" => $names,
        "time_boards" => [],
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        if ($boardId == 2) {
            $totalSeconds = (int)$score;

            $days = floor($totalSeconds / 86400);
            $hours = floor(($totalSeconds % 86400) / 3600);
            $minutes = floor(($totalSeconds % 3600) / 60);
            $seconds = $totalSeconds % 60;

            return sprintf("%d:%02d:%02d:%02d", $days, $hours, $minutes, $seconds);
        }

        return number_format($score, 0, '.', ' ');
    }
];
?>