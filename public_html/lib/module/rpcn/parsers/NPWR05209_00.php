<?php
$names = [
    0 => "Ranked Match | All Time",
    1 => "Ranked Match | Weekly",
    2 => "Ranked Match | Player Points",
];

return [
    "title" => "SoulCalibur II HD Online",
    "config" => [
        "game_id" => ["NPEB01828"],
        "names" => $names,
        "column_names" => [
            0 => "Total Wins",
            1 => "Total Wins",
            2 => "Player Points",
        ],
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        return number_format((int)$score, 0, ".", " ");
    }
];
?>