<?php
// IMPORTANT! Each game requires its own parser! (per comm_id)
// Batman: Arkham Asylum Score Parser
// Returns a configuration array that defines the layout and data formatting for the leaderboard.

$time_boards = [1,3,5,7,9,11,13,15,17,19,21,23];
$raw_names = [
    8 => "Intensive Treatment",
    9 => "Silent Knight",
    10 => "Sewer Bat",
    11 => "Record Breaker",
    12 => "Shock and Awe",
    13 => "Survival Tactics",
    14 => "Rumble in The Jungle",
    15 => "Invisible Predator",
    16 => "Intensive Treatment (Extreme)",
    17 => "Silent Knight (Extreme)",
    18 => "Sewer Bat (Extreme)",
    19 => "Record Breaker (Extreme)",
    20 => "Shock and Awe (Extreme)",
    21 => "Survival Tactics (Extreme)",
    22 => "Rumble in The Jungle (Extreme)",
    23 => "Invisible Predator (Extreme)",
    // Joker DLC challenges
    0 => "Maximum Punishment",
    1 => "Paging Dr. Joker",
    2 => "Gutter Tactics",
    3 => "Administered Pain",
    4 => "Caged Fighter",
    5 => "Hell's Hacienda",
    6 => "Giggles in The Gardens",
    7 => "Cavern of Love",
];

$names = [];
foreach ($raw_names as $id => $name) {
    $prefix = in_array($id, $time_boards) ? "Predator Challenges" : "Combat Challenges";
    $names[$id] = $prefix . " | " . $name;
}

return new RPCNParser(
    title: "Batman: Arkham Asylum",
    config: new RPCNParserConfig(
        icon: "",
        gameIds: ["BLES00503", "BLES00827", "BLUS30279", "BLUS30515", "NPEB01156"],
        scoreBoards: [0,2,4,6,8,10,12,14,16,18,20,22],
        timeBoards: $time_boards,
        names: $names,
    ),
    formatter: function(int $score, int $boardId, RPCNParserConfig $config, string $info, string $comment): string {
        $timeBoards = $config->timeBoards;
        if (in_array($boardId, $timeBoards, true)) {
            $base = 536870912; // 2^29
            $timeMs = $base - ($score % $base);

            $min = floor($timeMs / 60000);
            $sec = floor(($timeMs % 60000) / 1000);
            $cs  = floor(($timeMs % 1000) / 10);

            return sprintf("%02d:%02d.%02d", $min, $sec, $cs);
        }

        // format score for combat challenges
        return number_format($score, 0, ".", " ");
    }
);
?>