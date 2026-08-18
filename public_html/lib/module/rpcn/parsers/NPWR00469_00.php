<?php
$names = [
    0 => "Adventure | Best Scores",
    1 => "Challenge | Best Scores",
    2 => "Survival | Best Scores",
    3 => "Offline Co-Op | Best Scores",
    4 => "Online Co-Op | Best Scores",
    5 => "Online Versus | Best Scores",
];

return new RPCNParser(
    title: "Critter Crunch",
    config: new RPCNParserConfig(
        gameIds: ["NPEB00165"],
        scoreBoards: [0,1,2,3,4,5],
        timeBoards: [],
        names: $names,
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        return number_format((int)$score, 0, ".", " ");
    }
);
?>