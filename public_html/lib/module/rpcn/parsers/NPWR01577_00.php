<?php
$names = [
    1 => "Agent Hunt | Best of All",

    2 => "The Mercenaries - Solo | Urban Chaos",
    3 => "The Mercenaries - Solo | Steel Beast",
    4 => "The Mercenaries - Solo | Mining the Depths",
    //6 => "Unknown",

    12 => "The Mercenaries - Duo | Urban Chaos",
    13 => "The Mercenaries - Duo | Steel Beast",
    14 => "The Mercenaries - Duo | Mining the Depths",
];

return [
    "title" => "Resident Evil 6",
    "config" => [
        "game_id" => ["BLES01465", "BLES01683", "BLJM60405", "BLUS30855", "NPEB01150"],
        "names" => $names,
        "time_boards" => [],
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        return number_format($score, 0, '.', ' ');
    }
];
?>