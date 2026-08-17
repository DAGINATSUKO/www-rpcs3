<?php
return new RPCNParser(
    title: "Sonic Fighters",
    config: new RPCNParserConfig(
        icon: "",
        gameIds: ["NPJB00250"],
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