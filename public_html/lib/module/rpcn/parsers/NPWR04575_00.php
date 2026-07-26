<?php
$names = [
    1  => "Grade Points (Single)",
    //2 => "Replay Data"

    3  => "Arcade Solo Match (Rookie)",
    4  => "Arcade Solo Match (Easy)",
    5  => "Arcade Solo Match (Normal)",
    6  => "Arcade Solo Match (Hard)",
    7  => "Arcade Solo Match (Champ)",
    8  => "Arcade Solo Match (True Fighter)",
    9  => "Arcade Solo Match (Master)",
    10  => "Arcade Solo Match (Legend)",

    11  => "Arcade Tag Match (Rookie)",
    12  => "Arcade Tag Match (Easy)",
    13  => "Arcade Tag Match (Normal)",
    14  => "Arcade Tag Match (Hard)",
    15  => "Arcade Tag Match (Champ)",
    16  => "Arcade Tag Match (True Fighter)",
    17  => "Arcade Tag Match (Master)",
    18  => "Arcade Tag Match (Legend)",

    19  => "Time Attack Solo Match (Rookie)",
    20  => "Time Attack Solo Match (Easy)",
    21  => "Time Attack Solo Match (Normal)",
    22  => "Time Attack Solo Match (Hard)",
    23  => "Time Attack Solo Match (Champ)",
    24  => "Time Attack Solo Match (True Fighter)",
    25  => "Time Attack Solo Match (Master)",
    26  => "Time Attack Solo Match (Legend)",

    27  => "Time Attack Tag Match (Rookie)",
    28  => "Time Attack Tag Match (Easy)",
    29  => "Time Attack Tag Match (Normal)",
    30  => "Time Attack Tag Match (Hard)",
    31  => "Time Attack Tag Match (Champ)",
    32  => "Time Attack Tag Match (True Fighter)",
    33  => "Time Attack Tag Match (Master)",
    34  => "Time Attack Tag Match (Legend)",

    35  => "Survival Solo Match (Rookie)",
    36  => "Survival Solo Match (Easy)",
    37  => "Survival Solo Match (Normal)",
    38  => "Survival Solo Match (Hard)",
    39  => "Survival Solo Match (Champ)",
    40  => "Survival Solo Match (True Fighter)",
    41  => "Survival Solo Match (Master)",
    42  => "Survival Solo Match (Legend)",

    43  => "Survival Tag Match (Rookie)",
    44  => "Survival Tag Match (Easy)",
    45  => "Survival Tag Match (Normal)",
    46  => "Survival Tag Match (Hard)",
    47  => "Survival Tag Match (Champ)",
    48  => "Survival Tag Match (True Fighter)",
    49  => "Survival Tag Match (Master)",
    50  => "Survival Tag Match (Legend)",

    51 => "Grade Points (Tag)",

    52 => "Reward",

    53 => "Character Points: Zack",
    54 => "Character Points: Tina",
    55 => "Character Points: Jann Lee",
    56 => "Character Points: Hayabusa",
    57 => "Character Points: Kasumi",
    58 => "Character Points: Gen Fu",
    59 => "Character Points: Helena",
    60 => "Character Points: Bass",
    61 => "Character Points: Kokoro",
    62 => "Character Points: Hayate",
    63 => "Character Points: Leifang",
    64 => "Character Points: Ayane",
    65 => "Character Points: Eliot",
    66 => "Character Points: La Mariposa",
    67 => "Character Points: Alpha-152",
    68 => "Character Points: Brad Wong",
    69 => "Character Points: Christie",
    70 => "Character Points: Hitomi",
    71 => "Character Points: Bayman",
    72 => "Character Points: Rig",
    73 => "Character Points: Mila",
    74 => "Character Points: Akira",
    75 => "Character Points: Sarah",
    76 => "Character Points: Pai",
    77 => "Character Points: Ein",
    78 => "Character Points: Leon",
    79 => "Character Points: Momiji",
    80 => "Character Points: Rachel",
    81 => "Character Points: Jacky",
    82 => "Character Points: Marie Rose",
    83 => "Character Points: Phase 4",
    84 => "Character Points: Nyotengu",
    85 => "Character Points: Honoka",
    86 => "Character Points: Raidou",
];

$boardTypes = [
    'grade'         => [1, 51],
    'arcade_solo'   => range(3, 10),
    'arcade_tag'    => range(11, 18),
    'time_solo'     => range(19, 26),
    'time_tag'      => range(27, 34),
    'survival_solo' => range(35, 42),
    'survival_tag'  => range(43, 50),
    'char_points'   => range(52, 86),
];

$isType = function($id, $type) use ($boardTypes) {
    return in_array($id, $boardTypes[$type]);
};

$columnNames = ["default" => "Score | Region"];
foreach ($boardTypes['grade']         as $id) $columnNames[$id] = "Score | Grade | Region";
foreach ($boardTypes['arcade_solo']    as $id) $columnNames[$id] = "Score | Character | Region";
foreach ($boardTypes['arcade_tag']     as $id) $columnNames[$id] = "Score | Characters | Region";
foreach ($boardTypes['time_solo']      as $id) $columnNames[$id] = "Time | Character | Region";
foreach ($boardTypes['time_tag']       as $id) $columnNames[$id] = "Time | Characters | Region";
foreach ($boardTypes['survival_solo']  as $id) $columnNames[$id] = "Score | Character | Region";
foreach ($boardTypes['survival_tag']   as $id) $columnNames[$id] = "Score | Characters | Region";
foreach ($boardTypes['char_points']    as $id) $columnNames[$id] = "Points | Region";

return
[
    "title" => "Dead or Alive 5 Ultimate",
    "config" => [
        "game_id" => ["BLES01907", "BLJM61085", "BLUS31216", "NPUB31289", "NPJB00411", "NPEB01786"],
        "names" => $names,
        "time_boards" => array_merge($boardTypes['time_solo'], $boardTypes['time_tag']),
        "column_names" => $columnNames
    ],
    "formatter" => function($score, $boardId, $config, $info) use ($boardTypes, $isType)
    {
        $regions =
        [
            '00' => 'OTHER',
            '4d' => 'USA',
            '44' => 'GBR',
            '10' => 'SAU',
            '4f' => 'AUS',
            '2c' => 'RUS',
            '04' => 'KOR',
            '5d' => 'ARG',
            '6e' => 'ZAF',
            '01' => 'JPN',
            '5e' => 'BRA',
            '51' => 'MEX',
            '4e' => 'CAN',
            '28' => 'CZE',
            '19' => 'IDN',
            '3f' => 'PRT',
            '3a' => 'ESP',
            '35' => 'FRA',
            '34' => 'DEU',
            '5f' => 'CHL',
            '31' => 'AUT',
            '0b' => 'ISR',
            '60' => 'COL',
            '3d' => 'ITA',
            '11' => 'TUR',
            '42' => 'DNK',
        ];

        $characters =
        [
            '00' => 'Zack',
            '01' => 'Tina',
            '02' => 'Jann Lee',
            '03' => 'Ein',
            '04' => 'Hayabusa',
            '05' => 'Kasumi',
            '06' => 'Gen Fu',
            '07' => 'Helena',
            '08' => 'Leon',
            '09' => 'Bass',
            '0a' => 'Kokoro',
            '0b' => 'Hayate',
            '0c' => 'Leifang',
            '0d' => 'Ayane',
            '0e' => 'Eliot',
            '0f' => 'Lisa',
            '10' => 'Alpha-152',
            '13' => 'Brad Wong',
            '14' => 'Christie',
            '15' => 'Hitomi',
            '18' => 'Bayman',
            '1d' => 'Rig',
            '1e' => 'Mila',
            '1f' => 'Akira',
            '20' => 'Sarah',
            '21' => 'Pai',
            '27' => 'Momiji',
            '28' => 'Rachel',
            '29' => 'Jacky',
            '2a' => 'Marie Rose',
            '2b' => 'Phase 4',
            '2c' => 'Nyotengu',
            '2d' => 'Honoka',
            '2e' => 'Raidou'
        ];

        $regionCode = substr($info, 0, 2);
        $char1Code  = substr($info, 2, 2);
        $char2Code  = substr($info, 4, 2);
        
        $region = isset($regions[$regionCode]) ? $regions[$regionCode] : "OTHER ($regionCode)";
        $char1  = isset($characters[$char1Code]) ? $characters[$char1Code] : "ID: $char1Code";
        $char2  = isset($characters[$char2Code]) ? $characters[$char2Code] : "ID: $char2Code";

        if ($isType($boardId, 'time_solo') || $isType($boardId, 'time_tag'))
        {
            $totalCentiseconds = (int)($score / 10);
            $centiseconds = $totalCentiseconds % 100;
            $totalSeconds = (int)($totalCentiseconds / 100);
            $minutes = (int)($totalSeconds / 60);
            $seconds = $totalSeconds % 60;
            $formattedTime = sprintf("%d'%02d\"%02d", $minutes, $seconds, $centiseconds);

            return $isType($boardId, 'time_tag') 
                ? sprintf("%s | %s & %s | %s", $formattedTime, $char1, $char2, $region)
                : sprintf("%s | %s | %s", $formattedTime, $char1, $region);
        }

        $formattedScore = number_format((int)$score, 0, ".", " ");

        if ($isType($boardId, 'grade'))
        {
            $grade = "LR";
            $s = (int)$score;
            if ($s >= 1200000) $grade = "Diamond";
            elseif ($s >= 950000) $grade = "Sapphire";
            elseif ($s >= 700000) $grade = "Ruby";
            elseif ($s >= 500000) $grade = "Emerald";
            elseif ($s >= 340000) $grade = "Topaz";
            elseif ($s >= 250000) $grade = "U+";
            elseif ($s >= 180000) $grade = "U";
            elseif ($s >= 130000) $grade = "U-";
            elseif ($s >= 98000)  $grade = "S+";
            elseif ($s >= 78000)  $grade = "S";
            elseif ($s >= 63000)  $grade = "S-";
            elseif ($s >= 51000)  $grade = "A+";
            elseif ($s >= 40000)  $grade = "A";
            elseif ($s >= 34900)  $grade = "A-";
            elseif ($s >= 30000)  $grade = "B+";
            elseif ($s >= 25200)  $grade = "B";
            elseif ($s >= 21200)  $grade = "B-";
            elseif ($s >= 17600)  $grade = "C+";
            elseif ($s >= 14400)  $grade = "C";
            elseif ($s >= 12300)  $grade = "C-";
            elseif ($s >= 10300)  $grade = "D+";
            elseif ($s >= 8400)   $grade = "D";
            elseif ($s >= 6600)   $grade = "D-";
            elseif ($s >= 4900)   $grade = "E+";
            elseif ($s >= 3300)   $grade = "E";
            elseif ($s >= 1800)   $grade = "E-";
            elseif ($s >= 1000)   $grade = "F+";
            elseif ($s >= 400)    $grade = "F";
            
            return sprintf("%s | %s | %s", $formattedScore, $grade, $region);
        }

        if ($isType($boardId, 'arcade_solo') || $isType($boardId, 'survival_solo')) {
            return sprintf("%s | %s | %s", $formattedScore, $char1, $region);
        }

        if ($isType($boardId, 'arcade_tag') || $isType($boardId, 'survival_tag')) {
            return sprintf("%s | %s & %s | %s", $formattedScore, $char1, $char2, $region);
        }

        return sprintf("%s | %s", $formattedScore, $region);
    }
];
?>