<?php
$names = [
    0 => "Total Score",
    1 => "Palmtree Panic | Zone 1",
    2 => "Palmtree Panic | Zone 2",
    3 => "Palmtree Panic | Zone 3",
    4 => "Collision Chaos | Zone 1",
    5 => "Collision Chaos | Zone 2",
    6 => "Collision Chaos | Zone 3",
    7 => "Tidal Tempest | Zone 1",
    8 => "Tidal Tempest | Zone 2",
    9 => "Tidal Tempest | Zone 3",
    10 => "Quartz Quadrant | Zone 1",
    11 => "Quartz Quadrant | Zone 2",
    12 => "Quartz Quadrant | Zone 3",
    13 => "Wacky Workbench | Zone 1",
    14 => "Wacky Workbench | Zone 2",
    15 => "Wacky Workbench | Zone 3",
    16 => "Stardust Speedway | Zone 1",
    17 => "Stardust Speedway | Zone 2",
    18 => "Stardust Speedway | Zone 3",
    19 => "Metallic Madness | Zone 1",
    20 => "Metallic Madness | Zone 2",
    21 => "Metallic Madness | Zone 3",
];

$timeBoards = range(1, 21);
$columnNames = [0 => "Score"];

foreach ($timeBoards as $boardId) {
    $columnNames[$boardId] = "Time";
}

return new RPCNParser(
    title: "Sonic CD",
    config: new RPCNParserConfig(
        gameIds: ["NPEB00787", "NPUB30624"],
        timeBoards: $timeBoards,
        names: $names,
        columnNames: $columnNames,
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        if ($boardId === 0) {
            return number_format($score, 0, '.', ' ');
        }

        // Game stores time in millisecond
        $totalCentiseconds = intdiv($score, 10);

        $minutes = intdiv($totalCentiseconds, 6000);
        $remainder = $totalCentiseconds % 6000;
        $seconds = intdiv($remainder, 100);
        $centiseconds = $remainder % 100;

        return sprintf("%02d:%02d.%02d", $minutes, $seconds, $centiseconds);
    }
);
?>