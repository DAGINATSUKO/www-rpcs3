<?php
$names = [
    1 => "Time Trial | Beginner",
    2 => "Time Trial | Advanced",
    3 => "Time Trial | Expert",
    4 => "Survival | Beginner",
    5 => "Survival | Advanced",
    6 => "Survival | Expert",
];

$timeBoards = [1,2,3];
$columnNames = [];
foreach ($names as $id => $name) {
    $columnNames[$id] = in_array($id, $timeBoards) ? "Transmission | Time" : "Total Score";
}

return [
    "title" => "Daytona USA",
    "config" => [
        "game_id" => ["NPEB00630"],
        "names" => $names,
        "time_boards" => $timeBoards,
        "column_names" => $columnNames
    ],
    "formatter" => function($score, $boardId, $config, $info) use ($timeBoards) {
        if (!in_array($boardId, $timeBoards)) {
            return number_format($score, 0, '.', ' ');
        }

        $totalCentiseconds = (int) floor($score * 100 / 64);

        $m = intdiv($totalCentiseconds, 6000);
        $remainder = $totalCentiseconds % 6000;
        $s = intdiv($remainder, 100);
        $c = $remainder % 100;

        $timeStr = sprintf("%02d' %02d\" %02d", $m, $s, $c);

        $transmission = "AT";
        if ($info && strlen($info) >= 2) {
            $transCode = substr($info, 0, 2);
            if ($transCode === "01") {
                $transmission = "MT";
            }
        }

        return sprintf("%s|%s", $transmission, $timeStr);
    }
];
?>