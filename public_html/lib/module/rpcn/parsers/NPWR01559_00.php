<?php
$names = [
    0 => "Survival Endless",
];

return new RPCNParser(
    title: "Plants vs. Zombies",
    config: new RPCNParserConfig(
        gameIds: ["BLUS30852", "NPEA00271"],
        timeBoards: [],
        names: $names,
        columnNames: [
                    0 => "Flags"
                ],
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        $flags = 0;

        if ($info && strlen($info) >= 40) {
            $flagsHex = substr($info, 36, 4);
            $flags = (int)hexdec($flagsHex);
        }
        return $flags > 0 ? (string)$flags : "0";
    }
);
?>