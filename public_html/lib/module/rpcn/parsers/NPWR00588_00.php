<?php
$names = [
    1 => "All Time | Best Scores",
    2 => "Weekly | Best Scores",
];

return new RPCNParser(
    title: "Sonic The Hedgehog",
    config: new RPCNParserConfig(
        gameIds: ["NPEB00478"],
        scoreBoards: [1,2],
        names: $names,
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        return number_format((int)$score, 0, ".", " ");
    }
);
?>