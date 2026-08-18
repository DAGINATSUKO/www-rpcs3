<?php
$names = [
    0 => "Ranked Match | All Time",
    1 => "Ranked Match | Weekly",
    2 => "Ranked Match | Player Points",
];

return new RPCNParser(
    title: "SoulCalibur II HD Online",
    config: new RPCNParserConfig(
        gameIds: ["NPEB01828"],
        names: $names,
        columnNames: [
                    0 => "Total Wins",
                    1 => "Total Wins",
                    2 => "Player Points",
                ],
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        return number_format((int)$score, 0, ".", " ");
    }
);
?>