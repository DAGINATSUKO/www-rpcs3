<?php
$names = [
    0 => "Night Warriors | Online Rank",
    1 => "Darkstalkers 3 | Online Rank",
];

return new RPCNParser(
    title: "Darkstalkers Resurrection",
    config: new RPCNParserConfig(
        gameIds: ["BLJM60567", "NPEB00870"],
        timeBoards: [],
        names: $names,
        columnNames: [
                    0 => "Rank Points | Wins | Losses | Disconnects",
                    1 => "Rank Points | Wins | Losses | Disconnects",
                ],
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        $rankPoints = 2500 + (int)$score;

        if ($info && strlen($info) >= 40) {
            $wins   = (int)hexdec(substr($info, 8, 2));
            $losses = (int)hexdec(substr($info, 18, 2));

            $total = $wins + $losses;

            if ($total > 0) {
                $dcPercent = floor(($losses / $total) * 100);
            } else {
                $dcPercent = 0;
            }

            if ($boardId == 1 && $dcPercent < 10) {
                $dcPercent = 0;
            }

            return sprintf(
                "%d|%d|%d|%d%%",
                $rankPoints,
                $wins,
                $losses,
                $dcPercent
            );
        }

        return number_format($rankPoints, 0, '.', ' ');
    }
);
?>