<?php
$names = [
    1 => "Biggest Combo",
    2 => "Steamworld Goat",
    3 => "Flappy Goat",
    4 => "Time Trial",
    5 => "Total Score",
];

$columnNames = array_fill_keys(array_keys($names), "Score");

return new RPCNParser(
    title: "Goat Simulator",
    config: new RPCNParserConfig(
        gameIds: ["NPJB00759", "NPEB02321"],
        timeBoards: [],
        names: $names,
        columnNames: $columnNames,
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        return number_format((int)$score, 0, ".", " ");
    }
);
?>