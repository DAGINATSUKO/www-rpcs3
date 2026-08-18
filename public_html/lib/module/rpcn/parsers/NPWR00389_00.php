<?php
$names = [
    0 => "Local",
    1 => "Online Battle",
    2 => "Online Tournament",
    3 => "Online Zombie",
    4 => "Online Paint Bomb",
    5 => "Online Bombing Run",
    6 => "Online Friendly Fire",
];

return new RPCNParser(
    title: "Bomberman ULTRA",
    config: new RPCNParserConfig(
        gameIds: ["NPEB00076", "NPUB30051", "NPJB00018"],
        timeBoards: [],
        names: $names,
        columnNames: [
                    0 => "Wins | Losses",
                    1 => "Wins | Losses",
                    2 => "Wins | Losses",
                    3 => "Wins | Losses",
                    4 => "Wins | Losses",
                    5 => "Wins | Losses",
                    6 => "Wins | Losses",
                ],
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        if ($info && strlen($info) >= 16) {

            $winsHex = substr($info, 0, 8);
            $wins = (int)hexdec($winsHex);

            $lossesHex = substr($info, 8, 8);
            $losses = (int)hexdec($lossesHex);

            return sprintf(
                "%d|%d",
                $wins,
                $losses
            );
        }

        return '';
    }
);
?>