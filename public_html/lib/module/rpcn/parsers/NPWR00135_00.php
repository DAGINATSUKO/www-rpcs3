<?php
$names = [];
$ballFrenzyLevels = [
    32 => "Ball Mania",
    33 => "Stir Crazy",
    34 => "Ball Karma",
    35 => "Twisted Star",
    36 => "Tic Tac Toe",
    37 => "Crazy Island",
    38 => "Sunshine",
    39 => "Gridlock",
    40 => "Rush Hour",
    41 => "Beam Me Up",
];

foreach ($ballFrenzyLevels as $id => $levelName) {

    $levelNumber = $id - 31;
    $names[$id] = "Ball Frenzy | " . $levelName . " (Level " . $levelNumber . ")";
}

return [
    "title" => "Snakeline",
    "config" => [
        "game_id" => ["NPHA80027"],
        "names" => $names,
        "time_boards" => [],
        "column_names" => array_fill_keys(array_keys($names), "Score | Time")
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        $score = (float)$score;
        $points = floor($score / 1099511627776);
        $timePart = fmod($score, 1099511627776);
        $timeMs = (1099511627776 - $timePart) / 256;

        $ms = (int)$timeMs;
        $h = floor($ms / 3600000);
        $m = floor(($ms % 3600000) / 60000);
        $s = floor(($ms % 60000) / 1000);
        $cc = floor(($ms % 1000) / 10);
        $timeStr = sprintf("%02d:%02d:%02d.%02d", $h, $m, $s, $cc);

        return sprintf(
            "%s|%s",
            number_format($points, 0, ".", " "),
            $timeStr
        );
    }
];
?>