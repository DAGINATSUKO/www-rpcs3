<?php
return [
    "title" => "Beyond Good & Evil HD",
    "config" => [
        "icon" => "",
        "game_id" => ["NPEB00435"],
        "score_boards" => [0],
        "names" => [
            0 => "Completion"
        ]
    ],
    "formatter" => function($score, $boardId, $config) {
        return number_format($score, 0, ".", " ") . "%";
    }
];
?>