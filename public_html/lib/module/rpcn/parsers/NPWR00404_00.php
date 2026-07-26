<?php
$names = [
    0 => "Campaign - Amateur | Chapter 1",
    1 => "Campaign - Amateur | Chapter 2",
    2 => "Campaign - Amateur | Chapter 3",
    3 => "Campaign - Amateur | Chapter 4",
    4 => "Campaign - Amateur | Chapter 5",
    5 => "Campaign - Amateur | Chapter 6",
    6 => "Campaign - Amateur | All Stages",

    7 => "Campaign - Normal | Chapter 1",
    8 => "Campaign - Normal | Chapter 2",
    9 => "Campaign - Normal | Chapter 3",
    10 => "Campaign - Normal | Chapter 4",
    11 => "Campaign - Normal | Chapter 5",
    12 => "Campaign - Normal | Chapter 6",
    13 => "Campaign - Normal | All Stages",

    14 => "Campaign - Veteran | Chapter 1",
    15 => "Campaign - Veteran | Chapter 2",
    16 => "Campaign - Veteran | Chapter 3",
    17 => "Campaign - Veteran | Chapter 4",
    18 => "Campaign - Veteran | Chapter 5",
    19 => "Campaign - Veteran | Chapter 6",
    20 => "Campaign - Veteran | All Stages",

    21 => "Campaign - Professional | Chapter 1",
    22 => "Campaign - Professional | Chapter 2",
    23 => "Campaign - Professional | Chapter 3",
    24 => "Campaign - Professional | Chapter 4",
    25 => "Campaign - Professional | Chapter 5",
    26 => "Campaign - Professional | Chapter 6",
    27 => "Campaign - Professional | All Stages",

    28 => "The Mercenaries - Solo | Public Assembly",
    29 => "The Mercenaries - Solo | The Mines",
    30 => "The Mercenaries - Solo | Village",
    31 => "The Mercenaries - Solo | Ancient Ruins",
    32 => "The Mercenaries - Solo | Experimental Facility",
    33 => "The Mercenaries - Solo | Missile Area",
    34 => "The Mercenaries - Solo | Ship Deck",
    35 => "The Mercenaries - Solo | Prison",

    36 => "The Mercenaries - Duo | Public Assembly",
    37 => "The Mercenaries - Duo | The Mines",
    38 => "The Mercenaries - Duo | Village",
    39 => "The Mercenaries - Duo | Ancient Ruins",
    40 => "The Mercenaries - Duo | Experimental Facility",
    41 => "The Mercenaries - Duo | Missile Area",
    42 => "The Mercenaries - Duo | Ship Deck",
    43 => "The Mercenaries - Duo | Prison",

    44 => "Versus - Slayers | Public Assembly",
    45 => "Versus - Slayers | The Mines",
    46 => "Versus - Slayers | Village",
    47 => "Versus - Slayers | Ancient Ruins",
    48 => "Versus - Slayers | Experimental Facility",
    49 => "Versus - Slayers | Missile Area",
    50 => "Versus - Slayers | Ship Deck",
    51 => "Versus - Slayers | Prison",

    52 => "Versus - Survivors | Public Assembly",
    53 => "Versus - Survivors | The Mines",
    54 => "Versus - Survivors | Village",
    55 => "Versus - Survivors | Ancient Ruins",
    56 => "Versus - Survivors | Experimental Facility",
    57 => "Versus - Survivors | Missile Area",
    58 => "Versus - Survivors | Ship Deck",
    59 => "Versus - Survivors | Prison",

    60 => "Versus - Team Slayers | Public Assembly",
    61 => "Versus - Team Slayers | The Mines",
    62 => "Versus - Team Slayers | Village",
    63 => "Versus - Team Slayers | Ancient Ruins",
    64 => "Versus - Team Slayers | Experimental Facility",
    65 => "Versus - Team Slayers | Missile Area",
    66 => "Versus - Team Slayers | Ship Deck",
    67 => "Versus - Team Slayers | Prison",

    68 => "Versus - Team Survivors | Public Assembly",
    69 => "Versus - Team Survivors | The Mines",
    70 => "Versus - Team Survivors | Village",
    71 => "Versus - Team Survivors | Ancient Ruins",
    72 => "Versus - Team Survivors | Experimental Facility",
    73 => "Versus - Team Survivors | Missile Area",
    74 => "Versus - Team Survivors | Ship Deck",
    75 => "Versus - Team Survivors | Prison",

    76 => "The Mercenaries Reunion - Solo | Public Assembly",
    77 => "The Mercenaries Reunion - Solo | The Mines",
    78 => "The Mercenaries Reunion - Solo | Village",
    79 => "The Mercenaries Reunion - Solo | Ancient Ruins",
    80 => "The Mercenaries Reunion - Solo | Experimental Facility",
    81 => "The Mercenaries Reunion - Solo | Missile Area",
    82 => "The Mercenaries Reunion - Solo | Ship Deck",
    83 => "The Mercenaries Reunion - Solo | Prison",

    84 => "The Mercenaries Reunion - Duo | Public Assembly",
    85 => "The Mercenaries Reunion - Duo | The Mines",
    86 => "The Mercenaries Reunion - Duo | Village",
    87 => "The Mercenaries Reunion - Duo | Ancient Ruins",
    88 => "The Mercenaries Reunion - Duo | Experimental Facility",
    89 => "The Mercenaries Reunion - Duo | Missile Area",
    90 => "The Mercenaries Reunion - Duo | Ship Deck",
    91 => "The Mercenaries Reunion - Duo | Prison",

    92 => "Lost in Nightmares - Single Play | Amateur",
    93 => "Lost in Nightmares - Single Play | Normal",
    94 => "Lost in Nightmares - Single Play | Veteran",
    95 => "Lost in Nightmares - Single Play | Professional",

    96 => "Lost in Nightmares - Co-Op Play | Amateur",
    97 => "Lost in Nightmares - Co-Op Play | Normal",
    98 => "Lost in Nightmares - Co-Op Play | Veteran",
    99 => "Lost in Nightmares - Co-Op Play | Professional",

    100 => "Desperate Escape - Single Play | Amateur",
    101 => "Desperate Escape - Single Play | Normal",
    102 => "Desperate Escape - Single Play | Veteran",
    103 => "Desperate Escape - Single Play | Professional",

    104 => "Desperate Escape - Co-Op Play | Amateur",
    105 => "Desperate Escape - Co-Op Play | Normal",
    106 => "Desperate Escape - Co-Op Play | Veteran",
    107 => "Desperate Escape - Co-Op Play | Professional",
];

$versusBoards = [
28,29,30,31,32,33,34,35,
36,37,38,39,40,41,42,43,
44,45,46,47,48,49,50,51,
52,53,54,55,56,57,58,59,
60,61,62,63,64,65,66,67,
68,69,70,71,72,73,74,75,
76,77,78,79,80,81,82,83,
84,85,86,87,88,89,90,91,
92,93,94,95,96,97,98,99,
100,101,102,103,
104,105,106,107
];
$columnNames = [];
foreach ($names as $id => $name) {
    $columnNames[$id] = in_array($id, $versusBoards) ? "Score" : "Time";
}

return [
    "title" => "Resident Evil 5",
    "config" => [
        "game_id" => ["BLES00485", "BLES00816", "BLJM60199", "BLJM90001", "BLUS30270", "BLUS30491", "NPEB00687"],
        "names" => $names,
        "time_boards" => [],
        "column_names" => $columnNames
    ],
    "formatter" => function($score, $boardId, $config, $info) use ($versusBoards) {
        if (in_array($boardId, $versusBoards)) {
            return number_format($score, 0, '.', ' ');
        }

        $totalMs = abs((int)$score);
        $totalSeconds = floor($totalMs / 1000);
        $h = floor($totalSeconds / 3600);
        $m = floor(($totalSeconds % 3600) / 60);
        $s = $totalSeconds % 60;

        return sprintf("%d:%02d'%02d\"", $h, $m, $s);
    }
];
?>