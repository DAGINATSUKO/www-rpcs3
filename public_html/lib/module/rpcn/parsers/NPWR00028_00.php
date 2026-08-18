<?php
$names = [];
$modes = [
    256 => ["name" => "Fun",    "count" => 20],
    512 => ["name" => "Tricky", "count" => 20],
    768 => ["name" => "Tough",  "count" => 20]
];
foreach ($modes as $startId => $modeData) {
    for ($i = 0; $i < $modeData["count"]; $i++) {
        $currentId = $startId + $i;
        $levelName = "Level " . ($i + 1);
        $names[$currentId] = $modeData["name"] . " | " . $levelName;
    }
}

return new RPCNParser(
    title: "Super Rub'a'Dub",
    config: new RPCNParserConfig(
        gameIds: ["NPEA00016", "NPUA80063", "NPJA00013"],
        timeBoards: array_keys($names),
        names: $names,
        columnNames: array_fill_keys(array_keys($names), "Time | Region"),
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
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
);
?>