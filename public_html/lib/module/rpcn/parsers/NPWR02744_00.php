<?php
$names = [
    0 => "All Time",
];

return [
    "title" => "Rayman 3 HD",
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