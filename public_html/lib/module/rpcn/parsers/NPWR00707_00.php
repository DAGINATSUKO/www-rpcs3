<?php
return new RPCNParser(
    title: "UNO",
    config: new RPCNParserConfig(
        icon: "",
        gameIds: ["NPEB00105"],
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