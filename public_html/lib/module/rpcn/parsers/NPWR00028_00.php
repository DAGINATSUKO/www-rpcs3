<?php
$names = [];
$modes = [
    256 => ["name" => "Fun",    "count" => 20],
    512 => ["name" => "Tricky", "count" => 20],
    768 => ["name" => "Tough",  "count" => 20]
];
$customLevels = []; // for making board_id have specific title

foreach ($modes as $startId => $modeData) {
    for ($i = 0; $i < $modeData["count"]; $i++) {
        $currentId = $startId + $i;
        $levelName = $customLevels[$currentId] ?? ("Level " . ($i + 1));
        $names[$currentId] = $modeData["name"] . " | " . $levelName;
    }
}

return [
    "title" => "Super Rub'a'Dub",
    "config" => [
        "game_id" => ["NPEA00016", "NPUA80063", "NPJA00013"],
        "time_boards" => array_keys($names),
        "names" => $names,
        "column_names" => array_fill_keys(array_keys($names), "Time | Region")
    ],
    "formatter" => function($score, $boardId, $config, $info) {
        $totalSeconds = (float)$score / 60;
        $minutes = floor($totalSeconds / 60);
        $seconds = floor((int)$totalSeconds % 60);
        $miliseconds = round(($totalSeconds - floor($totalSeconds)) * 100);
        $timeStr = sprintf("%02d:%02d.%02d", $minutes, $seconds, $miliseconds);

        $countryCode = "??";
        if (!empty($info) && strlen($info) >= 4) {
            $hexCountry = substr($info, -4);
            $countryCode = strtoupper(pack("H*", $hexCountry));
        }

        return sprintf(
            "%s|%s",
            $timeStr, $countryCode
        );
    }
];
?>