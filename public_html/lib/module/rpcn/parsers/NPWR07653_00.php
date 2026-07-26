<?php
$names = [
    0 => "All Time",
];

return [
    "title" => "Jetpack Joyride Deluxe",
    "config" => [
        "game_id" => ["NPUB31615", "NPEB02158"],
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