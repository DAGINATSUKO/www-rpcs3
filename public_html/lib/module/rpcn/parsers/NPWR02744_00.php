<?php
$names = [
    0 => "All Time",
];

return new RPCNParser(
    title: "Rayman 3 HD",
    config: new RPCNParserConfig(
        gameIds: ["NPEB00201", "NPJB00088"],
        names: $names,
        columnNames: [],
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        return number_format($score, 0, '.', ' ');
    }
);
?>