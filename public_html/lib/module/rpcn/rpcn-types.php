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

    public static function localizedString(mixed $value, string $language, string $default = ''): string
    {
        if (is_string($value)) return $value;
        if (!is_array($value)) return $default;

        $localized = $value[$language] ?? null;
        if (is_string($localized) && $localized !== '') return $localized;

        $english = $value['en'] ?? null;
        if (is_string($english) && $english !== '') return $english;

        foreach ($value as $candidate)
        {
            if (is_string($candidate) && $candidate !== '') return $candidate;
        }

        return $default;
    }

    /** @return list<string> */
    public static function stringList(mixed $value): array
    {
        if (!is_array($value)) return [];

        $result = [];
        foreach ($value as $entry)
        {
            if (!is_string($entry) || $entry === '' || in_array($entry, $result, true)) continue;
            $result[] = $entry;
        }
        return $result;
    }

    public static function bool(mixed $value, bool $default = false): bool
    {
        return is_bool($value) ? $value : $default;
    }

}


final class RPCNLanguage
{
    /** @var array<string, string> */
    private const LABELS = [
        'en' => 'English',
        'en-gb' => 'English (UK)',
        'jp' => 'Japanese',
        'pl' => 'Polish',
        'de' => 'German',
        'fr' => 'French',
        'es' => 'Spanish',
        'it' => 'Italian',
        'nl' => 'Dutch',
        'pt' => 'Portuguese',
        'pt-br' => 'Portuguese (Brazil)',
        'ru' => 'Russian',
        'ko' => 'Korean',
        'sv' => 'Swedish',
        'da' => 'Danish',
        'no' => 'Norwegian',
        'fi' => 'Finnish',
        'ar' => 'Arabic',
        'tr' => 'Turkish',
    ];

    public static function normalize(mixed $value): string
    {
        if (!is_string($value)) return 'en';
        $value = strtolower(trim($value));
        return preg_match('/^[a-z]{2}(?:-[a-z]{2})?$/', $value) === 1 ? $value : 'en';
    }

    public static function label(string $language): string
    {
        return self::LABELS[$language] ?? strtoupper($language);
    }

    /**
     * @param list<string> $languages
     * @return list<string>
     */
    public static function ordered(array $languages): array
    {
        $unique = [];
        foreach ($languages as $language)
        {
            $language = self::normalize($language);
            $unique[$language] = true;
        }
        $unique['en'] = true;
        $result = array_keys($unique);
        usort($result, static function (string $a, string $b): int {
            if ($a === 'en') return $b === 'en' ? 0 : -1;
            if ($b === 'en') return 1;
            return strnatcasecmp(self::label($a), self::label($b));
        });
        return $result;
    }
}

final class RPCNParserConfig
{
    /**
     * @param list<string> $gameIds
     * @param list<int> $scoreBoards
     * @param list<int> $timeBoards
     * @param array<int, string> $names
     * @param array<int, string> $columnNames
     */
    public function __construct(
        public string $icon = '',
        public array $gameIds = [],
        public array $scoreBoards = [],
        public array $timeBoards = [],
        public array $names = [],
        public array $columnNames = []
    ) {
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

final class RPCNTrophyPoints
{
    public function __construct(
        public int $bronze,
        public int $silver,
        public int $gold,
        public int $platinum
    ) {
    }

    public function get(string $type): int
    {
        return match (strtolower($type)) {
            'bronze' => $this->bronze,
            'silver' => $this->silver,
            'gold' => $this->gold,
            'platinum' => $this->platinum,
            default => 0,
        };
    }
}

final class RPCNTrophyStats
{
    /** @param array<int, int> $earnerCounts */
    public function __construct(
        public int $uniquePlayers,
        public array $earnerCounts
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
        public string $icon,
        public string $groupId,
        public bool $onlineOnly
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
        public int $sort,
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


final class RPCNTrophyBreakdown
{
    public function __construct(
        public int $bronze = 0,
        public int $silver = 0,
        public int $gold = 0,
        public int $platinum = 0
    ) {
    }

    public static function fromDefinedTrophies(mixed $value): ?self
    {
        if (!is_array($value)) return null;
        if (!array_key_exists('bronze', $value)
            && !array_key_exists('silver', $value)
            && !array_key_exists('gold', $value)
            && !array_key_exists('platinum', $value))
        {
            return null;
        }

        return new self(
            max(0, RPCNValue::int($value['bronze'] ?? null)),
            max(0, RPCNValue::int($value['silver'] ?? null)),
            max(0, RPCNValue::int($value['gold'] ?? null)),
            max(0, RPCNValue::int($value['platinum'] ?? null))
        );
    }

    public function total(): int
    {
        return $this->bronze + $this->silver + $this->gold + $this->platinum;
    }

    public function points(RPCNTrophyPoints $points): int
    {
        return ($this->bronze * $points->bronze)
            + ($this->silver * $points->silver)
            + ($this->gold * $points->gold)
            + ($this->platinum * $points->platinum);
    }

    public function add(string $type): void
    {
        switch (strtolower($type))
        {
            case 'bronze':
                $this->bronze++;
                break;
            case 'silver':
                $this->silver++;
                break;
            case 'gold':
                $this->gold++;
                break;
            case 'platinum':
                $this->platinum++;
                break;
        }
    }

    public function get(string $type): int
    {
        return match (strtolower($type)) {
            'bronze' => $this->bronze,
            'silver' => $this->silver,
            'gold' => $this->gold,
            'platinum' => $this->platinum,
            default => 0,
        };
    }
}

final class RPCNProfileSummary
{
    public function __construct(
        public int $games,
        public int $earnedTrophies,
        public int $totalTrophies,
        public int $completedGames,
        public int $earnedPoints,
        public int $maxPoints,
        public RPCNTrophyBreakdown $earnedByType
    ) {
    }
}

final class RPCNProfileEarnedTrophy
{
    public function __construct(
        public int $id,
        public int $earnedAt
    ) {
    }
}

final class RPCNProfileApiGame
{
    /** @var array<int, RPCNProfileEarnedTrophy> */
    public array $earned = [];

    public function __construct(public string $commId)
    {
    }

    public function addEarned(RPCNProfileEarnedTrophy $trophy): void
    {
        $this->earned[$trophy->id] = $trophy;
    }
}

final class RPCNLocalTrophy
{
    public function __construct(
        public int $id,
        public bool $hidden,
        public string $type,
        public string $name,
        public string $detail,
        public string $groupId,
        public bool $onlineOnly
    ) {
    }
}

final class RPCNTrophyGroupDefinition
{
    public function __construct(
        public string $id,
        public string $name,
        public RPCNTrophyBreakdown $definedTrophies
    ) {
    }
}

final class RPCNLocalTrophySet
{
    /**
     * @param list<RPCNLocalTrophy> $trophies
     * @param list<string> $languages
     * @param array<string, RPCNTrophyGroupDefinition> $groups
     */
    public function __construct(
        public array $trophies,
        public array $languages,
        public array $groups,
        public RPCNTrophyBreakdown $definedTrophies,
        public int $totalItemCount
    ) {
    }
}

final class RPCNTrophySetParser
{
    public static function parse(mixed $decoded, string $language): ?RPCNLocalTrophySet
    {
        if (!is_array($decoded)) return null;

        $language = RPCNLanguage::normalize($language);
        $languages = RPCNLanguage::ordered(RPCNValue::stringList($decoded['languages'] ?? []));
        $rawTrophies = $decoded['trophies'] ?? null;
        if (!is_array($rawTrophies)) return null;

        $trophies = [];
        $fallbackDefined = new RPCNTrophyBreakdown();
        /** @var array<string, RPCNTrophyBreakdown> $fallbackGroupDefined */
        $fallbackGroupDefined = [];

        foreach ($rawTrophies as $rawTrophy)
        {
            if (!is_array($rawTrophy)) continue;
            $id = RPCNValue::int($rawTrophy['trophyId'] ?? null, -1);
            if ($id < 0) continue;

            $type = strtolower(RPCNValue::string($rawTrophy['trophyType'] ?? null, 'unknown'));
            $groupId = RPCNValue::string($rawTrophy['trophyGroupId'] ?? null, 'default');
            if ($groupId === '') $groupId = 'default';

            $trophies[] = new RPCNLocalTrophy(
                $id,
                RPCNValue::bool($rawTrophy['trophyHidden'] ?? null),
                $type,
                RPCNValue::localizedString($rawTrophy['name'] ?? ($rawTrophy['trophyName'] ?? null), $language, 'Unknown Trophy'),
                RPCNValue::localizedString($rawTrophy['detail'] ?? ($rawTrophy['trophyDetail'] ?? null), $language),
                $groupId,
                RPCNValue::bool($rawTrophy['onlineOnly'] ?? null)
            );

            $fallbackDefined->add($type);
            if (!isset($fallbackGroupDefined[$groupId])) $fallbackGroupDefined[$groupId] = new RPCNTrophyBreakdown();
            $fallbackGroupDefined[$groupId]->add($type);
        }

        $definedTrophies = RPCNTrophyBreakdown::fromDefinedTrophies($decoded['definedTrophies'] ?? null) ?? $fallbackDefined;

        /** @var array<string, RPCNTrophyGroupDefinition> $groups */
        $groups = [];
        $rawGroups = $decoded['trophyGroups'] ?? [];
        if (is_array($rawGroups))
        {
            foreach ($rawGroups as $rawGroup)
            {
                if (!is_array($rawGroup)) continue;
                $groupId = RPCNValue::string($rawGroup['trophyGroupId'] ?? null, 'default');
                if ($groupId === '') $groupId = 'default';
                $fallbackName = $groupId === 'default' ? 'Base Game' : 'DLC Pack ' . max(1, (int)$groupId);
                $groupName = RPCNValue::localizedString($rawGroup['name'] ?? null, $language, $fallbackName);
                $groupDefined = RPCNTrophyBreakdown::fromDefinedTrophies($rawGroup['definedTrophies'] ?? null)
                    ?? ($fallbackGroupDefined[$groupId] ?? new RPCNTrophyBreakdown());
                $groups[$groupId] = new RPCNTrophyGroupDefinition($groupId, $groupName, $groupDefined);
            }
        }

        foreach ($fallbackGroupDefined as $groupId => $groupDefined)
        {
            if (isset($groups[$groupId])) continue;
            $fallbackName = $groupId === 'default' ? 'Base Game' : 'DLC Pack ' . max(1, (int)$groupId);
            $groups[$groupId] = new RPCNTrophyGroupDefinition($groupId, $fallbackName, $groupDefined);
        }

        $totalItemCount = max(0, RPCNValue::int($decoded['totalItemCount'] ?? null, $definedTrophies->total()));
        if ($totalItemCount === 0 && $trophies !== []) $totalItemCount = count($trophies);

        return new RPCNLocalTrophySet($trophies, $languages, $groups, $definedTrophies, $totalItemCount);
    }
}

final class RPCNProfileGame
{
    public function __construct(
        public string $commId,
        public string $title,
        public string $icon,
        public int $earnedCount,
        public int $totalCount,
        public int $earnedPoints,
        public int $maxPoints,
        public float $completion,
        public bool $completed,
        public bool $hasMetadata,
        public RPCNTrophyBreakdown $earnedByType
    ) {
    }
}

final class RPCNProfileRarity
{
    public function __construct(
        public string $name,
        public int $tier
    ) {
    }
}

final class RPCNProfileTrophy
{
    public function __construct(
        public int $id,
        public string $gameTitle,
        public bool $hidden,
        public bool $earned,
        public string $type,
        public string $name,
        public string $detail,
        public string $groupId,
        public bool $onlineOnly,
        public string $icon,
        public int $points,
        public string $earnedAtLabel,
        public int $earnedAtUnix,
        public int $earnerCount,
        public ?float $percentage,
        public string $rarity,
        public int $rarityTier
    ) {
    }
}

final class RPCNProfileGameDetails
{
    /**
     * @param list<RPCNProfileTrophy> $trophies
     * @param list<string> $regions
     * @param array<string, RPCNTrophyGroupDefinition> $groups
     * @param list<string> $languages
     */
    public function __construct(
        public RPCNProfileGame $game,
        public int $uniquePlayers,
        public array $trophies,
        public array $regions,
        public array $groups,
        public array $languages
    ) {
    }
}

final class RPCNProfilePageContext
{
    /**
     * @param list<RPCNProfileGame> $games
     * @param list<RPCNProfileTrophy> $trophies
     * @param list<string> $availableLanguages
     */
    public function __construct(
        public string $username,
        public RPCNProfileSummary $summary,
        public array $games,
        public array $trophies,
        public ?RPCNProfileGameDetails $selectedGame,
        public string $sort,
        public string $direction,
        public bool $completedOnly,
        public string $trophyFilter,
        public string $trophyGrade,
        public string $trophySort,
        public string $trophyDirection,
        public string $gameTrophyFilter,
        public string $gameTrophyGrade,
        public string $gameTrophySort,
        public string $gameTrophyDirection,
        public string $language,
        public array $availableLanguages,
        public bool $notFound,
        public bool $hasError,
        public string $errorMessage,
        public RPCNTrophyPoints $trophyPoints,
        public string $defaultIcon,
        public string $backgroundPic1,
        public int $filteredGameCount,
        public int $gamePage,
        public int $gamePageCount,
        public int $gamesPerPage,
        public int $filteredTrophyCount,
        public int $trophyPage,
        public int $trophyPageCount,
        public int $trophiesPerPage
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
        public string $dbrwUser,
        public string $dbrwPass,
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
        public RPCNTrophyPoints $trophyPoints,
        public int $profileGamesPerPage,
        public int $profileTrophiesPerPage,
        public array $trophiesRaritySettings
    ) {
    }
}
