<?php
$names = [
    0 => "Local",
    1 => "Online Battle",
    2 => "Online Tournament",
    3 => "Online Zombie",
    4 => "Online Paint Bomb",
    5 => "Online Bombing Run",
    6 => "Online Friendly Fire",
];

return [
    "title" => "Bomberman ULTRA",
    "config" => [
        "game_id" => ["NPEB00076", "NPUB30051", "NPJB00018"],
        "names" => $names,
        "time_boards" => [],
        "column_names" => [
            0 => "Wins | Losses",
            1 => "Wins | Losses",
            2 => "Wins | Losses",
            3 => "Wins | Losses",
            4 => "Wins | Losses",
            5 => "Wins | Losses",
            6 => "Wins | Losses",
        ]
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        if ($info && strlen($info) >= 16) {

            $winsHex = substr($info, 0, 8);
            $wins = hexdec($winsHex);

            $lossesHex = substr($info, 8, 8);
            $losses = hexdec($lossesHex);

            return sprintf(
                "%d|%d",
                $wins,
                $losses
            );
        }
    }
];
?>