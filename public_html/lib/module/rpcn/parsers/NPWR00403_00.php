<?php
$names = [
    0 => "Adventure Game | Hard",
    1 => "Adventure Game | Hardest",
    2 => "Adventure Game | Easy",

    3 => "Challenges | Pod",
    4 => "Challenges | Chopper",
    5 => "Challenges | Flypod",
    6 => "Challenges | Cube",
];

return new RPCNParser(
    title: "Astro Tripper",
    config: new RPCNParserConfig(
        gameIds: ["NPEB00065"],
        timeBoards: [],
        names: $names,
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        return number_format($score, 0, '.', ' ');
    }
);
?>