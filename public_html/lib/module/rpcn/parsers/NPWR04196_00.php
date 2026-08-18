<?php
$names = [
    0 => "All Time",
];

return new RPCNParser(
    title: "Jetpack Joyride",
    config: new RPCNParserConfig(
        gameIds: ["NPEB01240"],
        names: $names,
        columnNames: [
                    0 => "Distance"
                ],
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        return number_format($score, 0, '.', '') . "m";
    }
);
?>