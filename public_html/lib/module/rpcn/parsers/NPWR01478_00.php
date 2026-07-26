<?php
$names = [
    28 => "Clash in the Clouds",
    // 33,34,35,36 => unknown
];

return [
    "title" => "BioShock Infinite",
    "config" => [
        "game_id" => ["BLES01705", "BLJS10207", "BLUS30629", "BLUS31177"],
        "names" => $names,
        "time_boards" => [],
        "column_names" => [
            28 => "Score | Blue Ribbons"
        ]
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        $points = number_format((int)$score, 0, ".", " ");
        // assumption, no data for this yet
        $ribbons = 0;
        if (!empty($info) && $info !== str_repeat("0", 128)) {
            $ribbons = hexdec(substr($info, 0, 2));
        }

        return sprintf(
            "%s|%d",
            $points,
            $ribbons
        );
    }
];
?>