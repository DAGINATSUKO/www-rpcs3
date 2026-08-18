<?php
return new RPCNParser(
    title: "1942: Joint Strike",
    config: new RPCNParserConfig(
        icon: "",
        gameIds: ["NPEB00026"],
        scoreBoards: [0,1,2,3],
        names: [
                    0 => "Penguin",
                    1 => "Slick Sleeve",
                    2 => "Dragon Fly",
                    3 => "Wing King"
                ],
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        return number_format($score, 0, ".", " ");
    }
);
?>