<?php
$names = [
    1 => "All Time | Best Scores",
    2 => "Weekly | Best Scores",
];

return [
    "title" => "Sonic The Hedgehog",
    "config" => [
        "game_id" => ["NPEB00478"],
        "names" => $names,
        "score_boards" => [1,2],
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        return number_format((int)$score, 0, ".", " ");
    }
];
?>