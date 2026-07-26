<?php
$names = [
    0 => "Overall",
];

return [
    "title" => "Far Cry Classic",
    "config" => [
        "game_id" => ["NPEB00989"],
        "names" => $names,
        "time_boards" => [],
        "column_names" => [
            0 => "Score | Kills | K/D | Playtime"
        ]
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        if ($info && strlen($info) >= 48) {
            $deathsHex = substr($info, 0, 8);
            $deaths = hexdec($deathsHex);

            $killsHex = substr($info, 8, 8);
            $kills = hexdec($killsHex);

            $timeHex = substr($info, 40, 8);
            $totalSeconds = hexdec($timeHex);

            $kd = ($deaths > 0) ? ($kills / $deaths) : (float)$kills;

            $h = floor($totalSeconds / 3600);
            $m = floor(($totalSeconds % 3600) / 60);
            $s = $totalSeconds % 60;
            $timeStr = sprintf("%02d:%02d:%02d", $h, $m, $s);

            return sprintf(
                "%s|%d|%.2f|%s",
                number_format($score, 0, '.', ' '),
                $kills,
                $kd,
                $timeStr
            );
        }

        return number_format($score, 0, '.', ' ');
    }
];
?>