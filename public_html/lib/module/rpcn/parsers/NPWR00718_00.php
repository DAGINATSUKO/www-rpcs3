<?php
$names = [
    0 => "All Time | Campaign",
    1 => "All Time | Co-op Campaign",

    2 => "Campaign | Chapter 1",
    3 => "Campaign | Chapter 2",
    4 => "Campaign | Chapter 3",
    5 => "Campaign | Chapter 4",
    6 => "Campaign | Chapter 5",
    7 => "Campaign | Chapter 6",
    8 => "Campaign | Chapter 7",
    9 => "Campaign | Chapter 8",
    10 => "Campaign | Chapter 9",
    11 => "Campaign | Chapter 10",

    12 => "Campaign (Co-op) | Chapter 1",
    13 => "Campaign (Co-op) | Chapter 2",
    14 => "Campaign (Co-op) | Chapter 3",
    15 => "Campaign (Co-op) | Chapter 4",
    16 => "Campaign (Co-op) | Chapter 5",
    17 => "Campaign (Co-op) | Chapter 6",
    18 => "Campaign (Co-op) | Chapter 7",
    19 => "Campaign (Co-op) | Chapter 8",
    20 => "Campaign (Co-op) | Chapter 9",
    21 => "Campaign (Co-op) | Chapter 10",
];

return new RPCNParser(
    title: "Tank Battles",
    config: new RPCNParserConfig(
        gameIds: ["NPUB30108"],
        names: $names,
        columnNames: [],
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        return number_format((int)$score, 0, ".", " ");
    }
);
?>