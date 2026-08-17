<?php
return new RPCNParser(
    title: "Beyond Good & Evil HD",
    config: new RPCNParserConfig(
        icon: "",
        gameIds: ["NPEB00435"],
        scoreBoards: [0],
        names: [
                    0 => "Completion"
                ],
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        return number_format($score, 0, ".", " ") . "%";
    }
);
?>