<?php
return new RPCNParser(
    title: "Rampage World Tour",
    config: new RPCNParserConfig(
        icon: "",
        gameIds: "NPUB30003",
        scoreBoards: [0],
        names: [
                    0 => "Top 100"
                ],
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        return number_format($score, 0, ".", " ");
    }
);
?>