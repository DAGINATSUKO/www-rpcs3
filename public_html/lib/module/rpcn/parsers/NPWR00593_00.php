<?php
return new RPCNParser(
    title: "Gunstar Heroes",
    config: new RPCNParserConfig(
        icon: "",
        gameIds: ["NPEB00096"],
        scoreBoards: [0,1,2,3],
        names: [
                    0 => "Easy",
                    1 => "Normal",
                    2 => "Hard",
                    3 => "Hardest"
                ],
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        return number_format($score, 0, ".", " ");
    }
);
?>