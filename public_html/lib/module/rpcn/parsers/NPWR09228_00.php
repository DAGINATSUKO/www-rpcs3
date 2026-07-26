<?php
$names = [
    1 => "Biggest Combo",
    2 => "Steamworld Goat",
    3 => "Flappy Goat",
    4 => "Time Trial",
    5 => "Total Score",
];

$columnNames = array_fill_keys(array_keys($names), "Score");

return [
    "title" => "Goat Simulator",
    "config" => [
        "game_id" => ["NPJB00759", "NPEB02321"],
        "names" => $names,
        "time_boards" => [],
        "column_names" => $columnNames
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        return number_format((int)$score, 0, ".", " ");
    }
];
?>