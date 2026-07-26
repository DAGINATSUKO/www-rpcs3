<?php
$names = [
    0 => "Single-Player | Easy",
    1 => "Single-Player | Medium",
    2 => "Single-Player | Hard",

    3 => "Local Co-Op | Easy",
    4 => "Local Co-Op | Medium",
    5 => "Local Co-Op | Hard",

    6 => "Online Co-Op | Easy",
    7 => "Online Co-Op | Medium",
    8 => "Online Co-Op | Hard",
    //9 => "Unknown",
    //18 => "Unknown",

    27 => "Single-Player Monthly | Easy",
    28 => "Single-Player Monthly | Medium",
    29 => "Single-Player Monthly | Hard",

    30 => "Local Co-Op Monthly | Easy",
    31 => "Local Co-Op Monthly | Medium",
    32 => "Local Co-Op Monthly | Hard",

    33 => "Online Co-Op Monthly | Easy",
    34 => "Online Co-Op Monthly | Medium",
    35 => "Online Co-Op Monthly | Hard",

    36 => "Single-Player Weekly | Easy",
    37 => "Single-Player Weekly | Medium",
    38 => "Single-Player Weekly | Hard",

    39 => "Local Co-Op Weekly | Easy",
    40 => "Local Co-Op Weekly | Medium",
    41 => "Local Co-Op Weekly | Hard",

    42 => "Online Co-Op Weekly | Easy",
    43 => "Online Co-Op Weekly | Medium",
    44 => "Online Co-Op Weekly | Hard",
];

return [
    "title" => "Assault Heroes",
    "config" => [
        "game_id" => ["NPUB30028"],
        "names" => $names,
        "time_boards" => [],
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        return number_format($score, 0, '.', ' ');
    }
];
?>