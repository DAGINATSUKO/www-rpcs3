<?php
$names = [
    1 => "All Time | Best Scores",
    2 => "Weekly | Best Scores",
    // 5 => "Unknown",
    // 6 => "Unknown",
];

return new RPCNParser(
    title: "Sonic The Hedgehog 2",
    config: new RPCNParserConfig(
        gameIds: ["NPEB00477"],
        scoreBoards: [1,2],
        timeBoards: [],
        names: $names,
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        return number_format((int)$score, 0, ".", " ");
    }
);
?>