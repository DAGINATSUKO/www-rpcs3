<?php
$names = [
    0 => "Night Warriors | Online Rank",
    1 => "Darkstalkers 3 | Online Rank",
];

return [
    "title" => "Darkstalkers Resurrection",
    "config" => [
        "game_id" => ["BLJM60567", "NPEB00870"],
        "names" => $names,
        "time_boards" => [],
        "column_names" => [
            0 => "Rank Points | Wins | Losses | Disconnects",
            1 => "Rank Points | Wins | Losses | Disconnects",
        ]
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        $rankPoints = 2500 + (int)$score;

        if ($info && strlen($info) >= 40) {
            $wins   = hexdec(substr($info, 8, 2));
            $losses = hexdec(substr($info, 18, 2));

            $total = $wins + $losses;

            if ($total > 0) {
                $dcPercent = floor(($losses / $total) * 100);
            } else {
                $dcPercent = 0;
            }

            if ($boardId == 1 && $dcPercent < 10) {
                $dcPercent = 0;
            }

            return sprintf(
                "%d|%d|%d|%d%%",
                $rankPoints,
                $wins,
                $losses,
                $dcPercent
            );
        }

        return number_format($rankPoints, 0, '.', ' ');
    }
];
?>