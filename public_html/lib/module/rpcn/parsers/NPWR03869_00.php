<?php
return [
    "title" => "Sonic Fighters",
    "config" => [
        "icon" => "",
        "game_id" => ["NPJB00250"],
        "score_boards" => [0],
        "names" => [
            0 => "Battle Points"
        ]
    ],
    "formatter" => function($score, $boardId, $config) {
        return number_format($score, 0, ".", " ");
    }
];
?>