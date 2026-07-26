<?php
$names = [
    0 => "Adventure | Best Scores",
    1 => "Challenge | Best Scores",
    2 => "Survival | Best Scores",
    3 => "Offline Co-Op | Best Scores",
    4 => "Online Co-Op | Best Scores",
    5 => "Online Versus | Best Scores",
];

return [
    "title" => "Critter Crunch",
    "config" => [
        "game_id" => ["NPEB00165"],
        "names" => $names,
        "time_boards" => [],
        "score_boards" => [0,1,2,3,4,5],
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        return number_format((int)$score, 0, ".", " ");
    }
];
?>