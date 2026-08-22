<?php

require_once __DIR__ . '/inc-rpcn-stats.php';

$rpcnConfig = require dirname(__DIR__, 4) . '/configs/rpcn.php';
if (!$rpcnConfig instanceof RPCNConfig)
{
    throw new RuntimeException('Invalid RPCN configuration.');
}

final class RPCNProfile
{
    private const TROPHY_EPOCH_US = 62135596800000000;

    private string $apiBase;
    private string $cacheDir;
    private int $cacheTime;
    private int $apiTimeout;
    private int $apiConnectTimeout;
    private string $trophiesSetsPath;
    private string $trophiesJsonPath;
    private string $trophiesIconBasePath;
    private string $pic1JsonPath;
    private string $pic1BasePath;
    private string $defaultIcon;
    private string $logFile;
    private int $lastHttpCode = 0;

    /** @var list<RPCNRaritySetting> */
    private array $raritySettings;

    /** @var array<string, array<int, string>> */
    private array $trophyIconMap = [];
    private bool $trophyIconMapLoaded = false;

    /** @var array<string, string> */
    private array $pic1Map = [];
    private bool $pic1MapLoaded = false;

    /** @var array<string, RPCNProfileApiGame> */
    private array $apiGames = [];

    /** @var array<string, RPCNProfileGame> */
    private array $gamesByCommId = [];

    public bool $notFound = false;
    public bool $hasError = false;
    public string $errorMessage = '';

    public function __construct(
        private RPCNConfig $config,
        private RPCNStats $stats,
        public string $username
    ) {
        $this->apiBase = rtrim($config->apiUrl, '/');
        $this->cacheDir = rtrim($config->cache, '/') . '/';
        $this->cacheTime = max(60, $config->cacheTime);
        $this->apiTimeout = $config->gameApiTimeout;
        $this->apiConnectTimeout = $config->gameApiConnectTimeout;
        $this->trophiesSetsPath = rtrim($config->trophiesSetsPath, '/') . '/';
        $this->trophiesJsonPath = $config->trophiesJson;
        $this->trophiesIconBasePath = rtrim($config->trophiesIconBasePath, '/') . '/';
        $this->pic1JsonPath = $config->pic1Json;
        $this->pic1BasePath = rtrim($config->pic1BasePath, '/') . '/';
        $this->defaultIcon = $config->defaultIcon;
        $this->logFile = $config->logFile;
        $this->raritySettings = $config->trophiesRaritySettings;
    }

    private function logError(string $message): void
    {
        $timestamp = date('Y-m-d H:i:s');
        @file_put_contents($this->logFile, "[$timestamp] PROFILE ERROR: $message" . PHP_EOL, FILE_APPEND);
    }

    private function cacheFile(string $prefix, string $key): string
    {
        return $this->cacheDir . $prefix . '_' . hash('sha256', $key) . '.json';
    }

    private function isCacheValid(string $path, int $cacheTime): bool
    {
        if (!is_file($path)) return false;
        $mtime = filemtime($path);
        return $mtime !== false && (time() - $mtime) < $cacheTime;
    }

    private function readFile(string $path): ?string
    {
        $raw = @file_get_contents($path);
        return $raw === false ? null : $raw;
    }

    private function writeCache(string $path, string $data): void
    {
        if (@file_put_contents($path, $data) === false)
        {
            $this->logError("Failed to write cache file: {$path}");
        }
    }

    private function fetchApi(string $url, string $cacheFile, int $cacheTime, bool $allowStale): ?string
    {
        $this->lastHttpCode = 0;
        if ($this->isCacheValid($cacheFile, $cacheTime))
        {
            return $this->readFile($cacheFile);
        }

        $stale = $allowStale && is_file($cacheFile) ? $this->readFile($cacheFile) : null;
        $ch = curl_init($url);
        if ($ch === false)
        {
            $this->logError("Unable to initialize cURL for {$url}.");
            return $stale;
        }

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => ['Accept: application/json'],
            CURLOPT_TIMEOUT => $this->apiTimeout,
            CURLOPT_CONNECTTIMEOUT => $this->apiConnectTimeout,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => '',
        ]);

        $response = curl_exec($ch);
        $httpCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $this->lastHttpCode = $httpCode;

        if (is_string($response) && $httpCode === 200)
        {
            $this->writeCache($cacheFile, $response);
            return $response;
        }

        if ($httpCode === 404)
        {
            return null;
        }

        $error = curl_error($ch);
        $this->logError("API request failed for {$url}: HTTP {$httpCode}" . ($error !== '' ? "; {$error}" : ''));
        return $stale;
    }

    private static function isSafeCommId(string $commId): bool
    {
        return preg_match('/^[A-Z0-9_]{1,32}$/', $commId) === 1;
    }

    private function loadUserApi(): bool
    {
        if ($this->username === '')
        {
            $this->notFound = true;
            return false;
        }

        $url = $this->apiBase . '/user/' . rawurlencode($this->username) . '/trophies';
        $cacheFile = $this->cacheFile('profile', strtolower($this->username));
        $json = $this->fetchApi($url, $cacheFile, $this->cacheTime, true);

        if ($json === null)
        {
            if ($this->lastHttpCode === 404)
            {
                $this->notFound = true;
            }
            else
            {
                $this->hasError = true;
                $this->errorMessage = 'RPCN profile data is currently unavailable.';
            }
            return false;
        }

        try
        {
            $decoded = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        }
        catch (JsonException $e)
        {
            $this->hasError = true;
            $this->errorMessage = 'The RPCN profile service returned invalid data.';
            $this->logError('Invalid user trophy JSON: ' . $e->getMessage());
            return false;
        }

        if (!is_array($decoded))
        {
            $this->hasError = true;
            $this->errorMessage = 'The RPCN profile service returned invalid data.';
            return false;
        }

        foreach ($decoded as $rawGame)
        {
            if (!is_array($rawGame)) continue;

            $commId = RPCNValue::string($rawGame['communicationId'] ?? null);
            if ($commId === '' || !self::isSafeCommId($commId)) continue;

            $apiGame = $this->apiGames[$commId] ?? new RPCNProfileApiGame($commId);
            $rawTrophies = $rawGame['trophies'] ?? [];
            if (is_array($rawTrophies))
            {
                foreach ($rawTrophies as $rawTrophy)
                {
                    if (!is_array($rawTrophy)) continue;
                    $id = RPCNValue::int($rawTrophy['trophyId'] ?? null, -1);
                    $earnedAt = RPCNValue::int($rawTrophy['earnedAt'] ?? null);
                    if ($id < 0) continue;
                    $apiGame->addEarned(new RPCNProfileEarnedTrophy($id, $earnedAt));
                }
            }
            $this->apiGames[$commId] = $apiGame;
        }

        return true;
    }

    /** @return list<RPCNLocalTrophy> */
    private function loadTrophySet(string $commId): array
    {
        if (!self::isSafeCommId($commId)) return [];
        $path = $this->trophiesSetsPath . $commId . '.json';
        $raw = $this->readFile($path);
        if ($raw === null) return [];

        try
        {
            $decoded = json_decode($raw, true, 512, JSON_THROW_ON_ERROR);
        }
        catch (JsonException $e)
        {
            $this->logError("Invalid trophy set {$commId}: " . $e->getMessage());
            return [];
        }

        if (!is_array($decoded)) return [];
        $rawTrophies = $decoded['trophies'] ?? null;
        if (!is_array($rawTrophies)) return [];

        $trophies = [];
        foreach ($rawTrophies as $rawTrophy)
        {
            if (!is_array($rawTrophy)) continue;
            $id = RPCNValue::int($rawTrophy['trophyId'] ?? null, -1);
            if ($id < 0) continue;

            $trophies[] = new RPCNLocalTrophy(
                $id,
                RPCNValue::bool($rawTrophy['trophyHidden'] ?? null),
                strtolower(RPCNValue::string($rawTrophy['trophyType'] ?? null, 'unknown')),
                RPCNValue::string($rawTrophy['trophyName'] ?? null, 'Unknown Trophy'),
                RPCNValue::string($rawTrophy['trophyDetail'] ?? null)
            );
        }

        return $trophies;
    }

    private function loadTrophyIconMap(): void
    {
        if ($this->trophyIconMapLoaded) return;
        $this->trophyIconMapLoaded = true;
        if (!is_file($this->trophiesJsonPath)) return;
        $raw = $this->readFile($this->trophiesJsonPath);
        if ($raw === null) return;

        try
        {
            $decoded = json_decode($raw, true, 512, JSON_THROW_ON_ERROR);
        }
        catch (JsonException $e)
        {
            $this->logError('Invalid trophy icon map: ' . $e->getMessage());
            return;
        }

        if (!is_array($decoded)) return;

        foreach ($decoded as $commId => $rawMap)
        {
            if (!is_string($commId) || !is_array($rawMap)) continue;
            /** @var array<int, string> $map */
            $map = [];
            foreach ($rawMap as $id => $hash)
            {
                if (!is_string($hash)) continue;
                if (is_int($id))
                {
                    $map[$id] = $hash;
                }
                elseif (ctype_digit($id))
                {
                    $map[(int)$id] = $hash;
                }
            }
            if ($map !== []) $this->trophyIconMap[$commId] = $map;
        }
    }

    private function trophyIcon(string $commId, int $trophyId): string
    {
        $this->loadTrophyIconMap();
        $hash = $this->trophyIconMap[$commId][$trophyId] ?? null;
        return $hash !== null ? $this->trophiesIconBasePath . $hash . '.png' : '';
    }

    private function loadPic1Map(): void
    {
        if ($this->pic1MapLoaded) return;
        $this->pic1MapLoaded = true;
        if (!is_file($this->pic1JsonPath)) return;

        $raw = $this->readFile($this->pic1JsonPath);
        if ($raw === null) return;

        try
        {
            $decoded = json_decode($raw, true, 512, JSON_THROW_ON_ERROR);
        }
        catch (JsonException $e)
        {
            $this->logError('Invalid PIC1 map: ' . $e->getMessage());
            return;
        }

        if (!is_array($decoded)) return;
        foreach ($decoded as $titleId => $hash)
        {
            if (is_string($titleId) && is_string($hash) && $titleId !== '' && $hash !== '')
            {
                $this->pic1Map[$titleId] = $hash;
            }
        }
    }

    private function gamePic1(string $commId): string
    {
        $this->loadPic1Map();
        foreach ($this->stats->title_ids[$commId] ?? [] as $titleId)
        {
            $searchId = $this->stats->icon_alias[$titleId] ?? $titleId;
            $hash = $this->pic1Map[$searchId] ?? null;
            if ($hash === null) continue;

            $url = $this->pic1BasePath . $hash . '.png';
            if (is_file($url)) return $url;
        }
        return '';
    }

    /** @param list<RPCNProfileGame> $games */
    private function selectBackgroundPic1(array $games): string
    {
        usort($games, static function (RPCNProfileGame $a, RPCNProfileGame $b): int
        {
            $result = $b->completion <=> $a->completion;
            if ($result === 0) $result = $b->earnedPoints <=> $a->earnedPoints;
            if ($result === 0) $result = $b->earnedCount <=> $a->earnedCount;
            if ($result === 0) $result = strnatcasecmp($a->title, $b->title);
            return $result;
        });

        foreach ($games as $game)
        {
            if ($game->earnedCount <= 0) continue;
            $pic1 = $this->gamePic1($game->commId);
            if ($pic1 !== '') return $pic1;
        }

        return '';
    }

    private function trophyPoints(string $type): int
    {
        return $this->config->trophyPoints->get($type);
    }

    private static function trophyTimestampToUnix(int $value): int
    {
        if ($value <= 0) return 0;
        if ($value > 1000000000000000)
        {
            return intdiv($value - self::TROPHY_EPOCH_US, 1000000);
        }
        if ($value > 1000000000000)
        {
            return intdiv($value, 1000);
        }
        return $value;
    }

    private static function formatEarnedAt(int $value): string
    {
        $timestamp = self::trophyTimestampToUnix($value);
        if ($timestamp <= 0) return '';

        try
        {
            $date = (new DateTimeImmutable('@' . $timestamp))->setTimezone(new DateTimeZone('UTC'));
        }
        catch (Exception)
        {
            return '';
        }

        return $date->format('M j, Y H:i') . ' UTC';
    }

    private function rarity(float $percentage): RPCNProfileRarity
    {
        foreach ($this->raritySettings as $index => $setting)
        {
            if (($percentage === 0.0 && $setting->maxPct === 0.0)
                || ($percentage > 0.0 && $percentage <= $setting->maxPct))
            {
                return new RPCNProfileRarity($setting->name, $index);
            }
        }

        $lastIndex = count($this->raritySettings) - 1;
        if ($lastIndex >= 0)
        {
            return new RPCNProfileRarity($this->raritySettings[$lastIndex]->name, $lastIndex);
        }

        return new RPCNProfileRarity('Common', 0);
    }

    private function loadTrophyStats(string $commId): RPCNTrophyStats
    {
        $url = $this->apiBase . '/trophy/' . rawurlencode($commId);
        $cacheFile = $this->cacheDir . 'trophies_' . $commId . '.json';
        $json = $this->fetchApi($url, $cacheFile, max(60, $this->config->trophiesCacheTime), true);
        if ($json === null) return new RPCNTrophyStats(0, []);

        try
        {
            $decoded = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        }
        catch (JsonException $e)
        {
            $this->logError("Invalid trophy statistics {$commId}: " . $e->getMessage());
            return new RPCNTrophyStats(0, []);
        }

        if (!is_array($decoded)) return new RPCNTrophyStats(0, []);
        $uniquePlayers = max(0, RPCNValue::int($decoded['uniquePlayers'] ?? null));

        $earnerCounts = [];
        $rawTrophies = $decoded['trophies'] ?? [];
        if (!is_array($rawTrophies)) return new RPCNTrophyStats($uniquePlayers, $earnerCounts);

        foreach ($rawTrophies as $rawTrophy)
        {
            if (!is_array($rawTrophy)) continue;
            $id = RPCNValue::int($rawTrophy['trophyId'] ?? null, -1);
            if ($id < 0) continue;
            $earnerCounts[$id] = max(0, RPCNValue::int($rawTrophy['earnerCount'] ?? null));
        }

        return new RPCNTrophyStats($uniquePlayers, $earnerCounts);
    }

    /** @return list<RPCNProfileGame> */
    private function buildGames(): array
    {
        $games = [];
        foreach ($this->apiGames as $commId => $apiGame)
        {
            $localTrophies = $this->loadTrophySet($commId);
            $hasMetadata = $localTrophies !== [];
            $totalCount = count($localTrophies);
            $earnedCount = count($apiGame->earned);
            $earnedPoints = 0;
            $maxPoints = 0;
            $earnedByType = new RPCNTrophyBreakdown();

            foreach ($localTrophies as $localTrophy)
            {
                $points = $this->trophyPoints($localTrophy->type);
                $maxPoints += $points;
                if (isset($apiGame->earned[$localTrophy->id]))
                {
                    $earnedPoints += $points;
                    $earnedByType->add($localTrophy->type);
                }
            }

            $completion = $totalCount > 0 ? min(100.0, ($earnedCount / $totalCount) * 100.0) : 0.0;
            $completed = $totalCount > 0 && $earnedCount >= $totalCount;
            $title = $this->stats->app_title[$commId] ?? 'Unknown Game';

            $game = new RPCNProfileGame(
                $commId,
                $title,
                $this->stats->getGameIcon($commId, $this->defaultIcon),
                $earnedCount,
                $totalCount,
                $earnedPoints,
                $maxPoints,
                $completion,
                $completed,
                $hasMetadata,
                $earnedByType
            );
            $games[] = $game;
            $this->gamesByCommId[$commId] = $game;
        }
        return $games;
    }

    /** @param list<RPCNProfileGame> $games */
    private static function buildSummary(array $games): RPCNProfileSummary
    {
        $earned = 0;
        $total = 0;
        $completed = 0;
        $earnedPoints = 0;
        $maxPoints = 0;
        $breakdown = new RPCNTrophyBreakdown();

        foreach ($games as $game)
        {
            $earned += $game->earnedCount;
            $total += $game->totalCount;
            $earnedPoints += $game->earnedPoints;
            $maxPoints += $game->maxPoints;
            if ($game->completed) $completed++;
            $breakdown->bronze += $game->earnedByType->bronze;
            $breakdown->silver += $game->earnedByType->silver;
            $breakdown->gold += $game->earnedByType->gold;
            $breakdown->platinum += $game->earnedByType->platinum;
        }

        return new RPCNProfileSummary(
            count($games),
            $earned,
            $total,
            $completed,
            $earnedPoints,
            $maxPoints,
            $breakdown
        );
    }

    /**
     * @param list<RPCNProfileGame> $games
     * @return list<RPCNProfileGame>
     */
    private static function sortGames(array $games, string $sort, string $direction, bool $completedOnly): array
    {
        if ($completedOnly)
        {
            $games = array_values(array_filter($games, static fn(RPCNProfileGame $game): bool => $game->completed));
        }

        usort($games, static function (RPCNProfileGame $a, RPCNProfileGame $b) use ($sort, $direction): int
        {
            $result = match ($sort) {
                'earned' => $a->earnedCount <=> $b->earnedCount,
                'total' => $a->totalCount <=> $b->totalCount,
                'completion' => $a->completion <=> $b->completion,
                'points' => $a->earnedPoints <=> $b->earnedPoints,
                default => strnatcasecmp($a->title, $b->title),
            };
            if ($result === 0 && $sort !== 'name') $result = strnatcasecmp($a->title, $b->title);
            return $direction === 'desc' ? -$result : $result;
        });

        return $games;
    }

    private function makeProfileTrophy(
        RPCNProfileGame $game,
        RPCNLocalTrophy $local,
        ?RPCNProfileEarnedTrophy $earned,
        int $earnerCount = 0,
        ?float $percentage = null,
        ?RPCNProfileRarity $rarity = null
    ): RPCNProfileTrophy {
        $earnedAt = $earned !== null ? $earned->earnedAt : 0;
        $rarityName = $rarity !== null ? $rarity->name : '';
        $rarityTier = $rarity !== null ? $rarity->tier : -1;

        return new RPCNProfileTrophy(
            $local->id,
            $game->title,
            $local->hidden,
            $earned !== null,
            $local->type,
            $local->name,
            $local->detail,
            $this->trophyIcon($game->commId, $local->id),
            $this->trophyPoints($local->type),
            self::formatEarnedAt($earnedAt),
            self::trophyTimestampToUnix($earnedAt),
            $earnerCount,
            $percentage,
            $rarityName,
            $rarityTier
        );
    }

    private static function trophyGradeRank(string $type): int
    {
        return match ($type) {
            'bronze' => 0,
            'silver' => 1,
            'gold' => 2,
            'platinum' => 3,
            default => 4,
        };
    }

    /** @return list<RPCNProfileTrophy> */
    private function buildTrophies(string $gradeFilter, string $sort, string $direction): array
    {
        $result = [];
        foreach ($this->gamesByCommId as $game)
        {
            $apiGame = $this->apiGames[$game->commId] ?? null;
            if ($apiGame === null) continue;

            foreach ($this->loadTrophySet($game->commId) as $local)
            {
                $earned = $apiGame->earned[$local->id] ?? null;
                if ($earned === null) continue;
                if ($gradeFilter !== 'all' && $local->type !== $gradeFilter) continue;

                $result[] = $this->makeProfileTrophy($game, $local, $earned);
            }
        }

        usort($result, static function (RPCNProfileTrophy $a, RPCNProfileTrophy $b) use ($sort, $direction): int
        {
            $result = match ($sort) {
                'game' => strnatcasecmp($a->gameTitle, $b->gameTitle),
                'name' => strnatcasecmp($a->name, $b->name),
                'grade' => self::trophyGradeRank($a->type) <=> self::trophyGradeRank($b->type),
                'points' => $a->points <=> $b->points,
                default => $a->earnedAtUnix <=> $b->earnedAtUnix,
            };

            if ($result === 0 && $sort !== 'game') $result = strnatcasecmp($a->gameTitle, $b->gameTitle);
            if ($result === 0 && $sort !== 'name') $result = strnatcasecmp($a->name, $b->name);
            return $direction === 'desc' ? -$result : $result;
        });

        return $result;
    }

    /** @param list<RPCNProfileTrophy> $trophies
     *  @return list<RPCNProfileTrophy>
     */
    private static function filterAndSortGameTrophies(
        array $trophies,
        string $statusFilter,
        string $gradeFilter,
        string $sort,
        string $direction
    ): array {
        $result = array_values(array_filter(
            $trophies,
            static function (RPCNProfileTrophy $trophy) use ($statusFilter, $gradeFilter): bool
            {
                if ($statusFilter === 'earned' && !$trophy->earned) return false;
                if ($statusFilter === 'unearned' && $trophy->earned) return false;
                if ($statusFilter === 'hidden' && !$trophy->hidden) return false;
                if ($gradeFilter !== 'all' && $trophy->type !== $gradeFilter) return false;
                return true;
            }
        ));

        usort($result, static function (RPCNProfileTrophy $a, RPCNProfileTrophy $b) use ($sort, $direction): int
        {
            $result = match ($sort) {
                'name' => strnatcasecmp($a->name, $b->name),
                'grade' => self::trophyGradeRank($a->type) <=> self::trophyGradeRank($b->type),
                'points' => $a->points <=> $b->points,
                'rarity' => ($a->percentage ?? 101.0) <=> ($b->percentage ?? 101.0),
                'status' => (int)$a->earned <=> (int)$b->earned,
                'date' => $a->earnedAtUnix <=> $b->earnedAtUnix,
                default => $a->id <=> $b->id,
            };

            if ($result === 0 && $sort !== 'name') $result = strnatcasecmp($a->name, $b->name);
            if ($result === 0) $result = $a->id <=> $b->id;
            return $direction === 'desc' ? -$result : $result;
        });

        return $result;
    }

    private function buildSelectedGame(
        string $commId,
        string $statusFilter,
        string $gradeFilter,
        string $sort,
        string $direction
    ): ?RPCNProfileGameDetails {
        $game = $this->gamesByCommId[$commId] ?? null;
        if ($game === null) return null;

        $apiGame = $this->apiGames[$game->commId] ?? null;
        if ($apiGame === null) return null;

        $stats = $this->loadTrophyStats($game->commId);
        $trophies = [];

        foreach ($this->loadTrophySet($game->commId) as $local)
        {
            $earnerCount = $stats->earnerCounts[$local->id] ?? 0;
            $percentage = $stats->uniquePlayers > 0
                ? round(($earnerCount / $stats->uniquePlayers) * 100, 2)
                : null;
            $rarity = $percentage !== null ? $this->rarity($percentage) : null;
            $trophies[] = $this->makeProfileTrophy(
                $game,
                $local,
                $apiGame->earned[$local->id] ?? null,
                $earnerCount,
                $percentage,
                $rarity
            );
        }

        $regions = $this->stats->title_regions[$game->commId] ?? [];
        return new RPCNProfileGameDetails(
            $game,
            $stats->uniquePlayers,
            self::filterAndSortGameTrophies($trophies, $statusFilter, $gradeFilter, $sort, $direction),
            $regions
        );
    }

    public function buildContext(
        string $sort,
        string $direction,
        bool $completedOnly,
        string $trophyFilter,
        string $trophyGrade,
        string $trophySort,
        string $trophyDirection,
        string $gameTrophyFilter,
        string $gameTrophyGrade,
        string $gameTrophySort,
        string $gameTrophyDirection,
        string $gameCommId,
        int $gamePage,
        int $trophyPage
    ): RPCNProfilePageContext {
        if (!$this->loadUserApi())
        {
            return new RPCNProfilePageContext(
                $this->username,
                new RPCNProfileSummary(0, 0, 0, 0, 0, 0, new RPCNTrophyBreakdown()),
                [],
                [],
                null,
                $sort,
                $direction,
                $completedOnly,
                $trophyFilter,
                $trophyGrade,
                $trophySort,
                $trophyDirection,
                $gameTrophyFilter,
                $gameTrophyGrade,
                $gameTrophySort,
                $gameTrophyDirection,
                $this->notFound,
                $this->hasError,
                $this->errorMessage,
                $this->config->trophyPoints,
                $this->defaultIcon,
                '',
                0,
                1,
                1,
                max(1, $this->config->profileGamesPerPage),
                0,
                1,
                1,
                max(1, $this->config->profileTrophiesPerPage)
            );
        }

        $games = $this->buildGames();
        $summary = self::buildSummary($games);
        $backgroundPic1 = $this->selectBackgroundPic1($games);
        $selectedGame = $gameCommId !== ''
            ? $this->buildSelectedGame($gameCommId, $gameTrophyFilter, $gameTrophyGrade, $gameTrophySort, $gameTrophyDirection)
            : null;
        $allFilteredTrophies = $trophyFilter !== ''
            ? $this->buildTrophies($trophyGrade, $trophySort, $trophyDirection)
            : [];
        $sortedGames = self::sortGames($games, $sort, $direction, $completedOnly);

        $gamesPerPage = max(1, $this->config->profileGamesPerPage);
        $filteredGameCount = count($sortedGames);
        $gamePageCount = max(1, (int)ceil($filteredGameCount / $gamesPerPage));
        $gamePage = min(max(1, $gamePage), $gamePageCount);
        $gameOffset = ($gamePage - 1) * $gamesPerPage;
        $visibleGames = array_slice($sortedGames, $gameOffset, $gamesPerPage);

        $trophiesPerPage = max(1, $this->config->profileTrophiesPerPage);
        $filteredTrophyCount = count($allFilteredTrophies);
        $trophyPageCount = max(1, (int)ceil($filteredTrophyCount / $trophiesPerPage));
        $trophyPage = min(max(1, $trophyPage), $trophyPageCount);
        $trophyOffset = ($trophyPage - 1) * $trophiesPerPage;
        $visibleTrophies = array_slice($allFilteredTrophies, $trophyOffset, $trophiesPerPage);

        return new RPCNProfilePageContext(
            $this->username,
            $summary,
            $visibleGames,
            $visibleTrophies,
            $selectedGame,
            $sort,
            $direction,
            $completedOnly,
            $trophyFilter,
            $trophyGrade,
            $trophySort,
            $trophyDirection,
            $gameTrophyFilter,
            $gameTrophyGrade,
            $gameTrophySort,
            $gameTrophyDirection,
            false,
            false,
            '',
            $this->config->trophyPoints,
            $this->defaultIcon,
            $backgroundPic1,
            $filteredGameCount,
            $gamePage,
            $gamePageCount,
            $gamesPerPage,
            $filteredTrophyCount,
            $trophyPage,
            $trophyPageCount,
            $trophiesPerPage
        );
    }
}

$usernameParam = $_GET['username'] ?? '';
$username = is_string($usernameParam) ? trim($usernameParam) : '';
if (strlen($username) > 64)
{
    $username = substr($username, 0, 64);
}

$sortParam = $_GET['sort'] ?? 'name';
$sort = is_string($sortParam) && in_array($sortParam, ['name', 'earned', 'total', 'completion', 'points'], true)
    ? $sortParam
    : 'name';

$directionParam = $_GET['dir'] ?? ($sort === 'name' ? 'asc' : 'desc');
$direction = is_string($directionParam) && in_array($directionParam, ['asc', 'desc'], true)
    ? $directionParam
    : ($sort === 'name' ? 'asc' : 'desc');

$completedParam = $_GET['completed'] ?? '';
$completedOnly = is_string($completedParam) && $completedParam === '1';

$trophyParam = $_GET['trophies'] ?? '';
$trophyFilter = is_string($trophyParam) && $trophyParam === 'earned' ? 'earned' : '';

$trophyGradeParam = $_GET['grade'] ?? 'all';
$trophyGrade = is_string($trophyGradeParam) && in_array($trophyGradeParam, ['all', 'bronze', 'silver', 'gold', 'platinum'], true)
    ? $trophyGradeParam
    : 'all';

$trophySortParam = $_GET['tsort'] ?? 'date';
$trophySort = is_string($trophySortParam) && in_array($trophySortParam, ['date', 'game', 'name', 'grade', 'points'], true)
    ? $trophySortParam
    : 'date';

$trophyDirectionParam = $_GET['tdir'] ?? ($trophySort === 'date' || $trophySort === 'points' ? 'desc' : 'asc');
$trophyDirection = is_string($trophyDirectionParam) && in_array($trophyDirectionParam, ['asc', 'desc'], true)
    ? $trophyDirectionParam
    : ($trophySort === 'date' || $trophySort === 'points' ? 'desc' : 'asc');

$gameTrophyFilterParam = $_GET['gstatus'] ?? 'all';
$gameTrophyFilter = is_string($gameTrophyFilterParam) && in_array($gameTrophyFilterParam, ['all', 'earned', 'unearned', 'hidden'], true)
    ? $gameTrophyFilterParam
    : 'all';

$gameTrophyGradeParam = $_GET['ggrade'] ?? 'all';
$gameTrophyGrade = is_string($gameTrophyGradeParam) && in_array($gameTrophyGradeParam, ['all', 'bronze', 'silver', 'gold', 'platinum'], true)
    ? $gameTrophyGradeParam
    : 'all';

$gameTrophySortParam = $_GET['gsort'] ?? 'default';
$gameTrophySort = is_string($gameTrophySortParam) && in_array($gameTrophySortParam, ['default', 'name', 'grade', 'points', 'rarity', 'status', 'date'], true)
    ? $gameTrophySortParam
    : 'default';

$gameTrophyDefaultDirection = in_array($gameTrophySort, ['default', 'name', 'rarity'], true) ? 'asc' : 'desc';
$gameTrophyDirectionParam = $_GET['gdir'] ?? $gameTrophyDefaultDirection;
$gameTrophyDirection = $gameTrophySort === 'default'
    ? 'asc'
    : (is_string($gameTrophyDirectionParam) && in_array($gameTrophyDirectionParam, ['asc', 'desc'], true)
        ? $gameTrophyDirectionParam
        : $gameTrophyDefaultDirection);

$gameParam = $_GET['game'] ?? '';
$gameCommId = is_string($gameParam) && preg_match('/^[A-Z0-9_]{1,32}$/', $gameParam) === 1 ? $gameParam : '';

$gamePage = max(1, RPCNValue::int($_GET['page'] ?? 1, 1));
$trophyPage = max(1, RPCNValue::int($_GET['tpage'] ?? 1, 1));

$stats = new RPCNStats($rpcnConfig, null, false);
$profile = new RPCNProfile($rpcnConfig, $stats, $username);
return $profile->buildContext(
    $sort,
    $direction,
    $completedOnly,
    $trophyFilter,
    $trophyGrade,
    $trophySort,
    $trophyDirection,
    $gameTrophyFilter,
    $gameTrophyGrade,
    $gameTrophySort,
    $gameTrophyDirection,
    $gameCommId,
    $gamePage,
    $trophyPage
);
