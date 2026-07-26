<?php
$names = [
    0 => "All Time",
];

return [
    "title" => "Jetpack Joyride",
    "config" => [
        "game_id" => ["NPEB01240"],
        "names" => $names,
        "column_names" => [
            0 => "Distance"
        ],
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        return number_format($score, 0, '.', '') . "m";
    }
];
?>