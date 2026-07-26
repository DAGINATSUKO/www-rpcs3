<?php
$time_boards = [
    0,1,2,3,4,5,6,7,
    8,9,10,11,12,13,14,15,
    16,17,18,19,20,21,22,23,
    24,25,26,27,28,29,30,31,
    32,33,34,35,36,37,38,39,
    40,41,42,43,44,45,46,47,
    48,49,50,51,52,53,54,55,
    56,57,58,59,60,61,62,63,
    64,65,66,67,68,69,70,71,
    72,73,74,75,76,77,78,79,
    80,81,82,83,84,85,86,87,
    88,89,90,91,92,93,94,95,
    96,97,98,99,100,101,102,103,
    104,105,106,107,108,109,110,111,
    112,113,114,115,116,117,118,119,
    120,121,122,123,124,125,126,127,
    128,129,130,131,132,133,134,135,
    136,137,138,139,140,141,142,143,
    144,145,146,147,148,149,150,151,
    152,153,154,155,156,157,158,159,
    160,161,162,163,164,165,166,167
];
$tracks = [
    "Lakeshore Drive"       => 0,
    "Highland Cliffs"       => 8,
    "Laketop Parkway"       => 16,
    "Harborline 765"        => 24,
    "Midtown Parkway"       => 32,
    "Island Cricle"         => 40,
    "Southbay Docks"        => 48,
    "Aviator Loop"          => 56,
    "Airport Lap"           => 64,
    "Rave City Riverfront"  => 72,
    "Downton Rave City"     => 80,
    "Crossbay Tunnel"       => 88,
    "Seacrest District"     => 96,
    "Surfside Resort"       => 104,
    "Sunset Heights"        => 112,
    "Mist Falls"            => 120,
    "Lost Ruins"            => 128,
    "Shadow Caves"          => 136,
    "Old Central"           => 144,
    "Industrial Drive"      => 152,
    "Bayside Freeway"       => 160,
];
$names = [];
foreach ($tracks as $trackName => $startId) {
    for ($i = 0; $i < 8; $i++) {
        $currentId = $startId + $i;
        $direction = ($i < 4) ? "Normal" : "Reverse";
        $category = ($i % 4) + 1;
        $names[$currentId] = "$trackName | Cat $category ($direction)";
    }
}

return [
    "title" => "Ridge Racer 7",
    "config" => [
        "icon" => "",
        "game_id" => ["BCES00009", "BLUS30001"],
        "time_boards"  => $time_boards,
        "score_boards" => [],
        "names" => $names,
        "column_names" => "Time"
    ],
    "formatter" => function($score, $boardId, $config) {
        if (in_array($boardId, $config["time_boards"])) {
            // RR7 Logic: Score = TimeInMS * 3
            // To get time, we divide score by 3
            $timeMs = floor($score / 3);

            $min = floor($timeMs / 60000);
            $sec = floor(($timeMs % 60000) / 1000);
            $ms  = $timeMs % 1000;

            return sprintf("%02d:%02d.%03d", $min, $sec, $ms);
        }
        return number_format($score, 0, ".", " ");
    }
];
?>