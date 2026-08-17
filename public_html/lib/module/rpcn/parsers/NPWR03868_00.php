<?php
return new RPCNParser(
    title: "Fighting Vipers",
    config: new RPCNParserConfig(
        icon: "",
        gameIds: "NPEB01164",
        scoreBoards: [0],
        names: [
                    0 => "Battle Points"
                ],
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        return number_format($score, 0, ".", " ");
    }
);
?>