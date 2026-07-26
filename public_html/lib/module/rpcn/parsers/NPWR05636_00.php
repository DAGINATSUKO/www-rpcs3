<?php
return [
    "title" => "Minecraft",
    "config" => [
        "icon" => "",
        "game_id" => ["BLES01976", "BLUS31426", "NPJB00549"],
        "score_boards" => [1,2,3,4],
        "names" => [
            1 => "Travelling Distance | Peaceful",
            2 => "Travelling Distance | Easy",
            3 => "Travelling Distance | Normal",
            4 => "Travelling Distance | Hard",

            #5 => "Mining Blocks | Peaceful",
            #6 => "Mining Blocks | Easy",
            #7 => "Mining Blocks | Normal",
            #8 => "Mining Blocks | Hard",

            #9 => "Farming | Peaceful",
            #10 => "Farming | Easy",
            #11 => "Farming | Normal",
            #12 => "Farming | Hard",

            #13 => "Kills | Easy",
            #14 => "Kills | Normal",
            #15 => "Kills | Hard",
        ]
    ],
    // not completed, only displays distance as total
    "formatter" => function($score, $boardId, $config, $comment = null) {
        if ($score >= 1000) {
            $formattedScore = number_format($score / 1000, 1, ".", " ") . " km";
        } else {
            $formattedScore = number_format($score, 0, ".", " ") . " m";
        }

        return $formattedScore;
    }
];
?>