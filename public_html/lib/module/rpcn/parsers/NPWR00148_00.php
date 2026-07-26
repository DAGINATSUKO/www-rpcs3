<?php
return [
    "title" => "1942: Joint Strike",
    "config" => [
        "icon" => "",
        "game_id" => ["NPEB00026"],
        "score_boards" => [0,1,2,3],
        "names" => [
            0 => "Penguin",
            1 => "Slick Sleeve",
            2 => "Dragon Fly",
            3 => "Wing King"
        ]
    ],
    "formatter" => function($score, $boardId, $config) {
        return number_format($score, 0, ".", " ");
    }
];
?>