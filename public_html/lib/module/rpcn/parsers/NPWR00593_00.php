<?php
return [
    "title" => "Gunstar Heroes",
    "config" => [
        "icon" => "",
        "game_id" => ["NPEB00096"],
        "score_boards" => [0,1,2,3],
        "names" => [
            0 => "Easy",
            1 => "Normal",
            2 => "Hard",
            3 => "Hardest"
        ]
    ],
    "formatter" => function($score, $boardId, $config) {
        return number_format($score, 0, ".", " ");
    }
];
?>