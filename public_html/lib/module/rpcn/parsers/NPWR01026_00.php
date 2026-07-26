<?php
$names = [
    0 => "Most Wanted | Experience",
    1 => "Most Wanted | Kills",
    2 => "Most Wanted | Deaths",
];

return [
    "title" => "Lead and Gold: Gangs of the Wild West",
    "config" => [
        "game_id" => ["NPEB00201", "NPJB00088"],
        "names" => $names,
        "column_names" => [],
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        return number_format($score, 0, '.', ' ');
    }
];
?>