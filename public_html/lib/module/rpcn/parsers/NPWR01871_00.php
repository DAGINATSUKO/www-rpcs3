<?php
$names = [
    1 => "No Restrictions | All Time",
    2 => "Weapon Restricted | All Time",
];
$columnNames = array_fill_keys(array_keys($names), "Time");
return new RPCNParser(
    title: "Resident Evil Code: Veronica X",
    config: new RPCNParserConfig(
        gameIds: ["NPUB30467"],
        timeBoards: [1,2],
        names: $names,
        columnNames: $columnNames,
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        $totalSeconds = (int)$score;

        $h = floor($totalSeconds / 3600);
        $m = floor(($totalSeconds % 3600) / 60);
        $s = $totalSeconds % 60;

        return sprintf("%02d:%02d:%02d", $h, $m, $s);
    }
);
?>