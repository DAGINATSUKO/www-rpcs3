<?php

$symbols = [
    ' ', '!', '"', '#', '$', '%', '&', "'", '(', ')',
    '*', '+', '`', '-', '.', '/', ':', ';', '<', '=',
    '>', '?', '[', '\\', ']', '^', '_', '{', '|', '}',
    '~', '@',
];

$symbolValues = array_flip($symbols);

$decodeMinecraftStats = static function (string $comment) use ($symbolValues): ?string {
    // Minecraft PS3 stores 63 custom-base32 symbols
    // The decoder used by the game writes those bits into a 40-byte buffer.
    if (strlen($comment) < 63) {
        return null;
    }

    $bytes = array_fill(0, 40, 0);

    for ($i = 0; $i < 63; $i++) {
        $char = $comment[$i];

        if (!isset($symbolValues[$char])) {
            return null;
        }

        $fiveBits = ($symbolValues[$char] << 3) & 0xff;
        $startByte = intdiv($i * 5, 8);
        $endByte = intdiv(5 + ($i * 5), 8);
        $dataIndex = ($i * 5) % 8;

        $bytes[$startByte] |= $fiveBits >> $dataIndex;

        if ($endByte !== $startByte) {
            $bytes[$endByte] = ($fiveBits << (8 - $dataIndex)) & 0xff;
        }
    }

    return pack('C*', ...$bytes);
};

$readU16BE = static function (string $data, int $offset): int {
    return (ord($data[$offset]) << 8)
        | ord($data[$offset + 1]);
};

$readU32BE = static function (string $data, int $offset): int {
    return (ord($data[$offset]) << 24)
        | (ord($data[$offset + 1]) << 16)
        | (ord($data[$offset + 2]) << 8)
        | ord($data[$offset + 3]);
};

$formatDistance = static function (int $meters): string {
    if ($meters >= 1000)
    {
        return (string) round($meters / 1000) . 'km';
    }

    return $meters . 'm';
};

$columnNames = [];

foreach (range(1, 4) as $id)
{
    $columnNames[$id] = 'Walked | Fallen | Minecart | Boat';
}

foreach (range(5, 8) as $id)
{
    $columnNames[$id] = 'Dirt | Cobblestone | Sand | Stone | Gravel | Clay | Obsidian';
}

foreach (range(9, 12) as $id)
{
    $columnNames[$id] = 'Egg | Wheat | Mushroom | Sugar Cane | Milk | Pumpkin';
}

foreach (range(13, 15) as $id)
{
    $columnNames[$id] = 'Zombie | Skeleton | Creeper | Spider | Spider Jockey | Zombie Pigman | Slime';
}

return new RPCNParser(
    title: 'Minecraft',
    config: new RPCNParserConfig(
        icon: '',
        gameIds: ['BLES01976', 'BLUS31426', 'NPJB00549'],
        scoreBoards: range(1, 15),
        names: [
            1 => 'Travelling Distance | Peaceful',
            2 => 'Travelling Distance | Easy',
            3 => 'Travelling Distance | Normal',
            4 => 'Travelling Distance | Hard',

            5 => 'Mining Blocks | Peaceful',
            6 => 'Mining Blocks | Easy',
            7 => 'Mining Blocks | Normal',
            8 => 'Mining Blocks | Hard',

            9 => 'Farming | Peaceful',
            10 => 'Farming | Easy',
            11 => 'Farming | Normal',
            12 => 'Farming | Hard',

            13 => 'Kills | Easy',
            14 => 'Kills | Normal',
            15 => 'Kills | Hard',
        ],
        columnNames: $columnNames,
    ),
    formatter: static function (
        int $score,
        int $boardId,
        RPCNParserConfig $config,
        string $info,
        string $comment,
    ) use ($decodeMinecraftStats, $readU16BE, $readU32BE, $formatDistance): string {
        $data = $decodeMinecraftStats($comment);

        if ($data === null) {
            return (string) $score;
        }

        $statsType = $readU32BE($data, 0);

        if ($boardId >= 1 && $boardId <= 4 && $statsType === 0) {
            $walked = $readU32BE($data, 4);
            $fallen = $readU32BE($data, 8);
            $minecart = $readU32BE($data, 12);
            $boat = $readU32BE($data, 16);

            return sprintf(
                '%s | %s | %s | %s',
                $formatDistance($walked),
                $formatDistance($fallen),
                $formatDistance($minecart),
                $formatDistance($boat),
            );
        }

        if ($boardId >= 5 && $boardId <= 8 && $statsType === 1) {
            $dirt = $readU16BE($data, 4);
            $stone = $readU16BE($data, 6);
            $sand = $readU16BE($data, 8);
            $cobblestone = $readU16BE($data, 10);
            $gravel = $readU16BE($data, 12);
            $clay = $readU16BE($data, 14);
            $obsidian = $readU16BE($data, 16);

            return sprintf(
                '%d | %d | %d | %d | %d | %d | %d',
                $dirt,
                $cobblestone,
                $sand,
                $stone,
                $gravel,
                $clay,
                $obsidian,
            );
        }

        if ($boardId >= 9 && $boardId <= 12 && $statsType === 2) {
            $eggs = $readU16BE($data, 4);
            $wheat = $readU16BE($data, 6);
            $mushroom = $readU16BE($data, 8);
            $sugarcane = $readU16BE($data, 10);
            $milk = $readU16BE($data, 12);
            $pumpkin = $readU16BE($data, 14);

            return sprintf(
                '%d | %d | %d | %d | %d | %d',
                $eggs,
                $wheat,
                $mushroom,
                $sugarcane,
                $milk,
                $pumpkin,
            );
        }

        if ($boardId >= 13 && $boardId <= 15 && $statsType === 3) {
            $zombie = $readU16BE($data, 4);
            $skeleton = $readU16BE($data, 6);
            $creeper = $readU16BE($data, 8);
            $spider = $readU16BE($data, 10);
            $spiderJockey = $readU16BE($data, 12);
            $pigman = $readU16BE($data, 14);
            $slime = $readU16BE($data, 16);

            return sprintf(
                '%d | %d | %d | %d | %d | %d | %d',
                $zombie,
                $skeleton,
                $creeper,
                $spider,
                $spiderJockey,
                $pigman,
                $slime,
            );
        }

        return (string) $score;
    },
);
?>