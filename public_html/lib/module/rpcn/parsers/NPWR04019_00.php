<?php
$names = [
    0 => "Overall",
];

return new RPCNParser(
    title: "Far Cry Classic",
    config: new RPCNParserConfig(
        gameIds: ["NPEB00989"],
        timeBoards: [],
        names: $names,
        columnNames: [
                    0 => "Score | Kills | K/D | Playtime"
                ],
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        if ($info && strlen($info) >= 48) {
            $deathsHex = substr($info, 0, 8);
            $deaths = (int)hexdec($deathsHex);

            $killsHex = substr($info, 8, 8);
            $kills = (int)hexdec($killsHex);

            $timeHex = substr($info, 40, 8);
            $totalSeconds = (int)hexdec($timeHex);

            $kd = ($deaths > 0) ? ($kills / $deaths) : (float)$kills;

            $h = intdiv($totalSeconds, 3600);
            $m = intdiv($totalSeconds % 3600, 60);
            $s = $totalSeconds % 60;
            $timeStr = sprintf("%02d:%02d:%02d", $h, $m, $s);

            return sprintf(
                "%s|%d|%.2f|%s",
                number_format($score, 0, '.', ' '),
                $kills,
                $kd,
                $timeStr
            );
        }

        return number_format($score, 0, '.', ' ');
    }
);
?>