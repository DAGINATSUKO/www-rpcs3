<?php
$names = [
    1 => "Difficulty | Easy",
    2 => "Difficulty | Medium",
    3 => "Difficulty | Hard",
    //5 => "Unknown",
];

return new RPCNParser(
    title: "Final Fight: Double Impact",
    config: new RPCNParserConfig(
        gameIds: ["NPEB00168"],
        timeBoards: [],
        names: $names,
        columnNames: [
                    1 => "Lives | Continues | Time | Score",
                    2 => "Lives | Continues | Time | Score",
                    3 => "Lives | Continues | Time | Score",
                ],
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        if ($info && strlen($info) >= 104) {
            $lives = (int)hexdec(substr($info, 24, 8));
            $continues = (int)hexdec(substr($info, 72, 8));
            $totalSeconds = (int)hexdec(substr($info, 96, 8));

            $m = intdiv($totalSeconds, 60);
            $s = $totalSeconds % 60;
            $timeStr = sprintf("%02d:%02d", $m, $s);

            return sprintf(
                "%d|%d|%s|%s",
                $lives,
                $continues,
                $timeStr,
                number_format($score, 0, '.', ' ')
            );
        }
        return number_format($score, 0, '.', ' ');
    }
);