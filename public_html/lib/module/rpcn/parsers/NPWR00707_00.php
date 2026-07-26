<?php
return [
    "title" => "UNO",
    "config" => [
        "icon" => "",
        "game_id" => ["NPEB00105"],
        "score_boards" => [0],
        "names" => [
            0 => "Top 100"
        ]
    ],
    "formatter" => function($score, $boardId, $config) {
        return number_format($score, 0, ".", " ");
    }
];
?>