<?php
$names = [
    28 => "Clash in the Clouds",
    // 33,34,35,36 => unknown
];

return new RPCNParser(
    title: "BioShock Infinite",
    config: new RPCNParserConfig(
        gameIds: ["BLES01705", "BLJS10207", "BLUS30629", "BLUS31177"],
        timeBoards: [],
        names: $names,
        columnNames: [
                    28 => "Score | Blue Ribbons"
                ],
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        $points = number_format((int)$score, 0, ".", " ");
        // assumption, no data for this yet
        $ribbons = 0;
        if (!empty($info) && $info !== str_repeat("0", 128)) {
            $ribbons = (int)hexdec(substr($info, 0, 2));
        }

        return sprintf(
            "%s|%d",
            $points,
            $ribbons
        );
    }
);
?>