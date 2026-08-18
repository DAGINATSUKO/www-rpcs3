<?php
return new RPCNParser(
    title: "Minecraft",
    config: new RPCNParserConfig(
        icon: "",
        gameIds: ["BLES01976", "BLUS31426", "NPJB00549"],
        scoreBoards: [1,2,3,4],
        names: [
                    1 => "Travelling Distance | Peaceful",
                    2 => "Travelling Distance | Easy",
                    3 => "Travelling Distance | Normal",
                    4 => "Travelling Distance | Hard",
        
                    #5 => "Mining Blocks | Peaceful",
                    #6 => "Mining Blocks | Easy",
                    #7 => "Mining Blocks | Normal",
                    #8 => "Mining Blocks | Hard",
        
                    #9 => "Farming | Peaceful",
                    #10 => "Farming | Easy",
                    #11 => "Farming | Normal",
                    #12 => "Farming | Hard",
        
                    #13 => "Kills | Easy",
                    #14 => "Kills | Normal",
                    #15 => "Kills | Hard",
                ],
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        if ($score >= 1000) {
            $formattedScore = number_format($score / 1000, 1, ".", " ") . " km";
        } else {
            $formattedScore = number_format($score, 0, ".", " ") . " m";
        }

        return $formattedScore;
    }
);
?>