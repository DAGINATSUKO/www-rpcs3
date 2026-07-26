<?php
$names = [
    1 => "Difficulty | Easy",
    2 => "Difficulty | Medium",
    3 => "Difficulty | Hard",
    //5 => "Unknown",
];

return [
    "title" => "Final Fight: Double Impact",
    "config" => [
        "game_id" => ["NPEB00168"],
        "names" => $names,
        "time_boards" => [],
        "column_names" => [
            1 => "Lives | Continues | Time | Score",
            2 => "Lives | Continues | Time | Score",
            3 => "Lives | Continues | Time | Score",
        ]
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        if ($info && strlen($info) >= 104) {
            $lives = hexdec(substr($info, 24, 8));
            $continues = hexdec(substr($info, 72, 8));
            $totalSeconds = hexdec(substr($info, 96, 8));

            $m = floor($totalSeconds / 60);
            $s = $totalSeconds % 60;
            $timeStr = sprintf("%02d:%02d", $m, $s);

            return sprintf(
                "%d|%d|%s|%s",
                $lives,
                $continues,
                $timeStr,
                number_format($score, 0, '.', ' ')
            );
        }
        return number_format($score, 0, '.', ' ');
    }
];