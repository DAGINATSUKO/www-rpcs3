<?php
$names = [
    0 => "Survival Endless",
];

return [
    "title" => "Plants vs. Zombies",
    "config" => [
        "game_id" => ["BLUS30852", "NPEA00271"],
        "names" => $names,
        "time_boards" => [],
        "column_names" => [
            0 => "Flags"
        ]
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        $flags = 0;

        if ($info && strlen($info) >= 40) {
            $flagsHex = substr($info, 36, 4);
            $flags = hexdec($flagsHex);
        }
        return ($flags > 0) ? $flags : "0";
    }
];
?>