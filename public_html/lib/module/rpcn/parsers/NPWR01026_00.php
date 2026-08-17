<?php
$names = [
    0 => "Most Wanted | Experience",
    1 => "Most Wanted | Kills",
    2 => "Most Wanted | Deaths",
];

return new RPCNParser(
    title: "Lead and Gold: Gangs of the Wild West",
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