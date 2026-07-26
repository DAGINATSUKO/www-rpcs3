<?php
$names = [
    1 => "No Restrictions | All Time",
    2 => "Weapon Restricted | All Time",
];
$columnNames = array_fill_keys(array_keys($names), "Time");
return [
    "title" => "Resident Evil Code: Veronica X",
    "config" => [
        "game_id" => ["NPUB30467"],
        "names" => $names,
        "time_boards" => [1,2],
        "column_names" => $columnNames
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        $totalSeconds = (int)$score;

        $h = floor($totalSeconds / 3600);
        $m = floor(($totalSeconds % 3600) / 60);
        $s = $totalSeconds % 60;

        return sprintf("%02d:%02d:%02d", $h, $m, $s);
    }
];
?>