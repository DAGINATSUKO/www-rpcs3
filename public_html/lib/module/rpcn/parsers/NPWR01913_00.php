<?php
$names = [
    0 => "All Chapters",
    1 => "Chapter 1 | Forest Assault",
    2 => "Chapter 2 | Enemy Below",
    3 => "Chapter 3 | Into the Attic",
    4 => "Chapter 4 | Sea of Blood",
    5 => "Chapter 5 | Traps and Towers",
    6 => "Chapter 6 | Enter Raven",
    7 => "Chapter 7 | The Gathering",
    8 => "Chapter 8 | Into the Ballroom",
    9 => "Chapter 9 | Solar Flair",
    10 => "Chapter 10 | Legions of Lasers",
    11 => "Chapter 11 | Kagan's Keep",
    12 => "Chapter 12 | The Sacrifice",
    13 => "Chapter 13 | Cluster Fun",
    14 => "Chapter 14 | Demon Rising",
    15 => "Chapter 15 | Escape",
];

return new RPCNParser(
    title: "BloodRayne: Betrayal",
    config: new RPCNParserConfig(
        gameIds: ["NPEB00716", "NPJB00609", "NPUB30377"],
        names: $names,
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        return number_format($score, 0, '.', '');
    }
);
?>