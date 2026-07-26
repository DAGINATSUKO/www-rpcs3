<?php
return [
    "title" => "Rampage World Tour",
    "config" => [
        "icon" => "",
        "game_id" => "NPUB30003",
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