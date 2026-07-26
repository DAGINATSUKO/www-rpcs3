<?php
$names = [
    0 => "Adventure Game | Hard",
    1 => "Adventure Game | Hardest",
    2 => "Adventure Game | Easy",

    3 => "Challenges | Pod",
    4 => "Challenges | Chopper",
    5 => "Challenges | Flypod",
    6 => "Challenges | Cube",
];

return [
    "title" => "Astro Tripper",
    "config" => [
        "game_id" => ["NPEB00065"],
        "names" => $names,
        "time_boards" => [],
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        return number_format($score, 0, '.', ' ');
    }
];
?>