<?php
$names = [
    0 => "Total XP",
    1 => "Town Square",
    2 => "Police Station",
    3 => "Suburbia",
    4 => "Bridge",
    5 => "Mall",
    6 => "TV Station",
    7 => "Powerplant",
    8 => "The Park",
];

return [
    "title" => "All Zombies Must Die!",
    "config" => [
        "game_id" => ["NPUB30308", "NPEB00316"],
        "names" => $names,
        "column_names" => [],
        "score_boards" => [0,1,2,3,4,5,6,7,8]
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        return number_format((int)$score, 0, ".", " ");
    }
];
?>