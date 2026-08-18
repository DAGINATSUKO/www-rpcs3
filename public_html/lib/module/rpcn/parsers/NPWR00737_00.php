<?php
$names = [
    0 => "All Time | Rescue Princess",
    1 => "All Time | Snatch 'N Grab",
    2 => "All Time | Team Deathmatch",
    3 => "All Time | Invasion",
    4 => "Monthly | Rescue Princess",
    5 => "Monthly | Snatch 'N Grab",
    6 => "Monthly | Team Deathmatch",
    7 => "Monthly | Invasion",
    8 => "Best Scores | Total Score",
    9 => "Best Scores | Worker Gladiate",
    10 => "Best Scores | Warrior Gladiate",
    11 => "Best Scores | Ranger Gladiate",
    12 => "Best Scores | Mage Gladiate",
    13 => "Best Scores | Priest Gladiate",
];

$columnNames = array_fill_keys(array_keys($names), "Score");

return new RPCNParser(
    title: "Fat Princess",
    config: new RPCNParserConfig(
        gameIds: ["NPEA00111"],
        timeBoards: [],
        names: $names,
        columnNames: $columnNames,
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        return number_format((int)$score, 0, ".", " ");
    }
);
?>