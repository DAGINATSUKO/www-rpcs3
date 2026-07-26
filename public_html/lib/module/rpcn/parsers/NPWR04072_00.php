<?php
$names = [
    0 => "Beneath The Streets",
    1 => "The Watching Sentinel",
    2 => "Great White News HQ",
    3 => "Magneto's Prison",
    4 => "Catacombs of Genosha",
    5 => "Office Spaces",
    6 => "Citadel Courtyard",
    9 => "Deadpool's Carnivale",
];

$columnNames = array_fill_keys(array_keys($names), "Score | Time | Waves | Combo | Kills");

return [
    "title" => "Deadpool",
    "config" => [
        "game_id" => ["BLES01789", "BLUS31146", "NPUB31069"],
        "names" => $names,
        "column_names" => $columnNames
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        $formattedScore = number_format((float)$score, 0, ".", " ");

        $timeStr = "0h 0m 0s";
        $waves = 0;
        $combo = 0;
        $kills = 0;

        // format player data
        if ($info && strlen($info) >= 32) {
            $timeRaw  = hexdec(substr($info, 0, 8)); // 00000137 => 311
            $waves    = hexdec(substr($info, 8, 8)); // 00000001 => 1
            $combo    = hexdec(substr($info, 16, 8)); // 00000035 => 53
            $kills    = hexdec(substr($info, 24, 8)); // 000000f4 => 244

            $h = floor($timeRaw / 3600);
            $m = floor(($timeRaw % 3600) / 60);
            $s = $timeRaw % 60;
            $timeStr = sprintf("%dh %dm %ds", $h, $m, $s);
        }

        return sprintf(
            "%s|%s|%d|%d|%d",
            $formattedScore,
            $timeStr,
            $waves,
            $combo,
            $kills
        );
    }
];
?>