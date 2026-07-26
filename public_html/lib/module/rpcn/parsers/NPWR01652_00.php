<?php
$names = [
    0 => "Main Game (New Game Only) | Normal",
    1 => "Main Game (New Game Only) | Professional",
    2 => "Main Game (All) | Normal",
    3 => "Main Game (All) | Professional",
    4 => "Separate Ways (New Game Only) | All Time",
    5 => "Separate Ways (All) | All Time",
];
$columnNames = array_fill_keys(array_keys($names), "Time");
return [
    "title" => "Resident Evil 4",
    "config" => [
        "game_id" => ["NPEB00342", "NPJB00084"],
        "names" => $names,
        "time_boards" => [0,1,2,3,4,5],
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