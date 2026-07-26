<?php
$names = [
    1 => "All Time | Best Scores",
    2 => "Weekly | Best Scores",
    // 5 => "Unknown",
    // 6 => "Unknown",
];

return [
    "title" => "Sonic The Hedgehog 2",
    "config" => [
        "game_id" => ["NPEB00477"],
        "names" => $names,
        "time_boards" => [],
        "score_boards" => [1,2],
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        return number_format((int)$score, 0, ".", " ");
    }
];
?>