<?php

final class RPCNValue
{
    public static function int(mixed $value, int $default = 0): int
    {
        if (is_int($value)) return $value;
        if (is_float($value)) return (int)$value;
        if (is_string($value) && is_numeric($value)) return (int)$value;
        return $default;
    }


    public static function string(mixed $value, string $default = ''): string
    {
        if (is_string($value)) return $value;
        if (is_int($value) || is_float($value)) return (string)$value;
        return $default;
    }

    public static function bool(mixed $value, bool $default = false): bool
    {
        return is_bool($value) ? $value : $default;
    }

}


final class RPCNParserConfig
{
    /** @var list<string> */
    public array $gameIds;

    /**
     * @param string|list<string> $gameIds
     * @param list<int> $scoreBoards
     * @param list<int> $timeBoards
     * @param array<int, string> $names
     * @param string|array<int|string, string> $columnNames
     */
    public function __construct(
        public string $icon = '',
        string|array $gameIds = [],
        public array $scoreBoards = [],
        public array $timeBoards = [],
        public array $names = [],
        public string|array $columnNames = 'Score'
    ) {
        $this->gameIds = is_string($gameIds) ? [$gameIds] : $gameIds;
    }
}

final class RPCNParser
{
    /** @param Closure(int, int, RPCNParserConfig, string, string): string $formatter */
    public function __construct(
        public string $title,
        public RPCNParserConfig $config,
        public Closure $formatter
    ) {
    }

    public function format(int $score, int $boardId, string $info = '', string $comment = ''): string
    {
        return ($this->formatter)($score, $boardId, $this->config, $info, $comment);
    }
}

final class RPCNRaritySetting
{
    public function __construct(
        public float $maxPct,
        public string $name,
        public string $color
    ) {
    }
}

final class RPCNChartPoint
{
    public function __construct(
        public string $x,
        public int $y
    ) {
    }
}

final class RPCNChartCoordinate
{
    public function __construct(
        public float $x,
        public float $y,
        public string $sourceX,
        public int $value
    ) {
    }
}

final class RPCNTrophy
{
    public function __construct(
        public int $id,
        public bool $hidden,
        public string $type,
        public string $name,
        public string $detail,
        public int $earnerCount,
        public float $percentage,
        public string $rarity,
        public string $rarityColor,
        public string $icon
    ) {
    }
}

final class RPCNTopGame
{
    public function __construct(
        public string $commId,
        public string $gameTitle,
        public int $peak,
        public ?string $icon,
        public string $timeAgo = ''
    ) {
    }
}



final class RPCNGameDefinition
{
    /** @param list<string> $ids */
    public function __construct(
        public string $title,
        public array $ids
    ) {
    }
}

final class RPCNPlayerCountEntry
{
    public function __construct(
        public string $commId,
        public string $gameTitle,
        public int $playerCount
    ) {
    }
}

final class RPCNSearchGame
{
    /** @param list<string> $regions */
    public function __construct(
        public string $id,
        public string $title,
        public string $icon,
        public array $regions
    ) {
    }
}

final class RPCNLeaderboardGroup
{
    /** @param array<int, string> $boards */
    public function __construct(
        public ?string $title,
        public array $boards = []
    ) {
    }

    public function addBoard(int $boardId, string $name): void
    {
        $this->boards[$boardId] = $name;
    }
}

final class RPCNLeaderboardRow
{
    public function __construct(
        public string $user,
        public float|int $sort,
        public string $value
    ) {
    }
}

final class RPCNPeakRecord
{
    public function __construct(
        public int $peak,
        public string $date
    ) {
    }
}

final class RPCNGamePageContext
{
    /**
     * @param list<string> $regions
     * @param array<int, string> $boards
     * @param list<RPCNChartPoint> $chartDataHourly
     * @param list<RPCNChartPoint> $chartDataDaily
     */
    public function __construct(
        public RPCNGame $rpcnGame,
        public string $commId,
        public string $gameTitle,
        public string $gameIcon,
        public string $gamePic1,
        public string $defaultIcon,
        public int $currentPlayers,
        public array $regions,
        public bool $hasLeaderboard,
        public array $boards,
        public int $peak24h,
        public int $peakAllTime,
        public string $timeAgoStr,
        public array $chartDataHourly,
        public array $chartDataDaily
    ) {
    }
}

final class RPCNConfig
{
    /** @param list<RPCNRaritySetting> $trophiesRaritySettings */
    public function __construct(
        public string $dbHost,
        public string $dbUser,
        public string $dbPass,
        public string $dbName,
        public string $dbPort,
        public string $apiUrl,
        public string $gamesJson,
        public string $iconsJson,
        public string $logFile,
        public string $badwords,
        public string $blacklist,
        public string $violationLog,
        public string $parsersPath,
        public string $cache,
        public int $cacheTime,
        public int $maxDisplayRows,
        public int $gameApiTimeout,
        public int $gameApiConnectTimeout,
        public int $dbConnectTimeout,
        public string $iconBasePath,
        public string $defaultIcon,
        public string $pic1Json,
        public string $pic1BasePath,
        public string $backLinkUrl,
        public string $gamePageUrl,
        public string $trophiesJson,
        public string $trophiesIconBasePath,
        public string $trophiesSetsPath,
        public int $trophiesCacheTime,
        public bool $trophiesEnabled,
        public array $trophiesRaritySettings
    ) {
    }
}
