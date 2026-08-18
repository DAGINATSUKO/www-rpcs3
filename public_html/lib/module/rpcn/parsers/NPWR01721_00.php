<?php
$names = [
    0 => "Total XP",
    1 => "Town Square",
    2 => "Police Station",
    3 => "Suburbia",
    4 => "Bridge",
    5 => "Mall",
    6 => "TV Station",
    7 => "Powerplant",
    8 => "The Park",
];

return new RPCNParser(
    title: "All Zombies Must Die!",
    config: new RPCNParserConfig(
        gameIds: ["NPUB30308", "NPEB00316"],
        scoreBoards: [0,1,2,3,4,5,6,7,8],
        names: $names,
        columnNames: [],
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        return number_format((int)$score, 0, ".", " ");
    }
);
?>