<?php
$pageContext = require __DIR__ . '/lib/module/rpcn/inc-rpcn-profile.php';
if (!$pageContext instanceof RPCNProfilePageContext)
{
    throw new RuntimeException('Invalid RPCN profile page context.');
}

if ($pageContext->username === '')
{
    header('Location: rpcn.php');
    exit;
}

/** @param array<string, string> $params */
function rpcn_profile_url(string $username, array $params = [], string $fragment = ''): string
{
    $query = ['username' => $username];
    foreach ($params as $key => $value)
    {
        $query[$key] = $value;
    }

    $url = 'rpcn-profile.php?' . http_build_query($query, '', '&', PHP_QUERY_RFC3986);
    return $fragment !== '' ? $url . '#' . rawurlencode($fragment) : $url;
}

/**
 * @param array<string, string> $params
 * @return array<string, string>
 */
function rpcn_profile_with_language(RPCNProfilePageContext $context, array $params): array
{
    if ($context->language !== 'en') $params['lang'] = $context->language;
    return $params;
}

function rpcn_profile_grade_icon(string $type): string
{
    $safeType = in_array($type, ['bronze', 'silver', 'gold', 'platinum'], true) ? $type : 'unknown';
    $iconPath = '/img/icons/rpcn/' . $safeType . '.png';

    return '<span class="rpcn-profile-grade rpcn-profile-grade-' . $safeType . '" aria-hidden="true">'
        . '<img src="' . $iconPath . '" alt="">'
        . '</span>';
}


/** @param array<string, RPCNTrophyGroupDefinition> $groups */
function rpcn_profile_trophy_group_label(string $groupId, array $groups): string
{
    if ($groupId === '' || $groupId === 'default') return 'Base Game';

    $group = $groups[$groupId] ?? null;
    if ($group !== null && $group->name !== '') return $group->name;

    $number = (int)$groupId;
    return $number > 0 ? 'DLC Pack ' . $number : 'DLC Pack';
}

/**
 * @param list<RPCNProfileTrophy> $trophies
 * @return array<string, list<RPCNProfileTrophy>>
 */
function rpcn_profile_group_trophies(array $trophies): array
{
    $groups = [];
    foreach ($trophies as $trophy)
    {
        $groupId = $trophy->groupId === '' ? 'default' : $trophy->groupId;
        if (!isset($groups[$groupId])) $groups[$groupId] = [];
        $groups[$groupId][] = $trophy;
    }

    uksort($groups, static function (string $a, string $b): int {
        if ($a === 'default') return $b === 'default' ? 0 : -1;
        if ($b === 'default') return 1;
        return strnatcasecmp($a, $b);
    });

    return $groups;
}

function rpcn_profile_sort_url(RPCNProfilePageContext $context, string $sort): string
{
    $defaultDirection = $sort === 'name' ? 'asc' : 'desc';
    $direction = $context->sort === $sort
        ? ($context->direction === 'asc' ? 'desc' : 'asc')
        : $defaultDirection;

    $params = ['sort' => $sort, 'dir' => $direction];
    if ($context->completedOnly) $params['completed'] = '1';
    $params = rpcn_profile_with_language($context, $params);
    return rpcn_profile_url($context->username, $params, 'games');
}

/** @return array<string, string> */
function rpcn_profile_list_params(RPCNProfilePageContext $context): array
{
    $params = [
        'sort' => $context->sort,
        'dir' => $context->direction,
    ];
    if ($context->completedOnly) $params['completed'] = '1';
    if ($context->gamePage > 1) $params['page'] = (string)$context->gamePage;
    return rpcn_profile_with_language($context, $params);
}

function rpcn_profile_game_url(RPCNProfilePageContext $context, string $commId): string
{
    $params = rpcn_profile_list_params($context);
    $params['game'] = $commId;
    return rpcn_profile_url($context->username, $params);
}

function rpcn_profile_page_url(RPCNProfilePageContext $context, int $page): string
{
    $params = [
        'sort' => $context->sort,
        'dir' => $context->direction,
        'page' => (string)max(1, $page),
    ];
    if ($context->completedOnly) $params['completed'] = '1';
    $params = rpcn_profile_with_language($context, $params);
    return rpcn_profile_url($context->username, $params, 'games');
}

/** @return array<string, string> */
function rpcn_profile_trophy_params(RPCNProfilePageContext $context): array
{
    return rpcn_profile_with_language($context, [
        'trophies' => 'earned',
        'grade' => $context->trophyGrade,
        'tsort' => $context->trophySort,
        'tdir' => $context->trophyDirection,
    ]);
}

function rpcn_profile_trophy_grade_url(RPCNProfilePageContext $context, string $grade): string
{
    $params = rpcn_profile_trophy_params($context);
    $params['grade'] = $grade;
    $params['tpage'] = '1';
    return rpcn_profile_url($context->username, $params);
}

function rpcn_profile_trophy_sort_url(RPCNProfilePageContext $context, string $sort): string
{
    $defaultDirection = in_array($sort, ['date', 'points'], true) ? 'desc' : 'asc';
    $direction = $context->trophySort === $sort
        ? ($context->trophyDirection === 'asc' ? 'desc' : 'asc')
        : $defaultDirection;

    $params = rpcn_profile_trophy_params($context);
    $params['tsort'] = $sort;
    $params['tdir'] = $direction;
    $params['tpage'] = '1';
    return rpcn_profile_url($context->username, $params);
}

function rpcn_profile_trophy_page_url(RPCNProfilePageContext $context, int $page): string
{
    $params = rpcn_profile_trophy_params($context);
    $params['tpage'] = (string)max(1, $page);
    return rpcn_profile_url($context->username, $params);
}

function rpcn_profile_reveal_hidden(): bool
{
    $value = $_GET['reveal_hidden'] ?? null;
    return is_string($value) && $value === '1';
}

/** @return array<string, string> */
function rpcn_profile_game_trophy_params(RPCNProfilePageContext $context, string $commId): array
{
    $params = rpcn_profile_list_params($context);
    $params['game'] = $commId;

    if ($context->gameTrophyFilter !== 'all') $params['gstatus'] = $context->gameTrophyFilter;
    if ($context->gameTrophyGrade !== 'all') $params['ggrade'] = $context->gameTrophyGrade;
    if ($context->gameTrophySort !== 'default') $params['gsort'] = $context->gameTrophySort;
    if ($context->gameTrophySort !== 'default') $params['gdir'] = $context->gameTrophyDirection;
    if (rpcn_profile_reveal_hidden()) $params['reveal_hidden'] = '1';

    return $params;
}

function rpcn_profile_game_hidden_toggle_url(RPCNProfilePageContext $context, string $commId): string
{
    $params = rpcn_profile_game_trophy_params($context, $commId);
    if (rpcn_profile_reveal_hidden()) unset($params['reveal_hidden']);
    else $params['reveal_hidden'] = '1';
    return rpcn_profile_url($context->username, $params);
}

function rpcn_profile_game_trophy_filter_url(RPCNProfilePageContext $context, string $commId, string $filter): string
{
    $params = rpcn_profile_game_trophy_params($context, $commId);
    if ($filter === 'all') unset($params['gstatus']);
    else $params['gstatus'] = $filter;
    return rpcn_profile_url($context->username, $params);
}

function rpcn_profile_game_trophy_grade_url(RPCNProfilePageContext $context, string $commId, string $grade): string
{
    $params = rpcn_profile_game_trophy_params($context, $commId);
    if ($grade === 'all') unset($params['ggrade']);
    else $params['ggrade'] = $grade;
    return rpcn_profile_url($context->username, $params);
}

function rpcn_profile_game_trophy_sort_url(RPCNProfilePageContext $context, string $commId, string $sort): string
{
    $defaultDirection = in_array($sort, ['default', 'name', 'rarity'], true) ? 'asc' : 'desc';
    $direction = $context->gameTrophySort === $sort
        ? ($context->gameTrophyDirection === 'asc' ? 'desc' : 'asc')
        : $defaultDirection;

    $params = rpcn_profile_game_trophy_params($context, $commId);
    if ($sort === 'default')
    {
        unset($params['gsort'], $params['gdir']);
    }
    else
    {
        $params['gsort'] = $sort;
        $params['gdir'] = $direction;
    }
    return rpcn_profile_url($context->username, $params);
}

$username = $pageContext->username;
$summary = $pageContext->summary;
$selectedGame = $pageContext->selectedGame;
$showTrophyList = $pageContext->trophyFilter !== '';
$showGames = $selectedGame === null && !$showTrophyList;
$revealHidden = rpcn_profile_reveal_hidden();
$profileCompletion = $summary->totalTrophies > 0
    ? min(100.0, ($summary->earnedTrophies / $summary->totalTrophies) * 100.0)
    : 0.0;
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<title>RPCS3 - <?= htmlspecialchars($username) ?> RPCN Profile</title>
<meta charset="utf-8">
<meta name="description" content="RPCN trophy profile for <?= htmlspecialchars($username) ?>.">
<meta name="keywords" content="rpcs3, rpcn, trophies, profile, playstation 3, ps3">
<?php include 'lib/module/sys-meta.php';?>
<meta property="og:title" content="RPCS3 - RPCN Profile"/>
<meta property="og:description" content="View RPCN game and trophy progress."/>
<meta property="og:image" content="/img/meta/mobile/1200.png"/>
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="630"/>
<meta property="og:url" content="https://rpcs3.net"/>
<meta property="og:locale" content="en_US"/>
<meta property="og:type" content="website"/>
<meta property="og:site_name" content="RPCS3"/>
<meta name="twitter:card" content="summary_large_image">
<?php include 'lib/module/sys-css.php';?>
<?php include 'lib/module/sys-js.php';?>
</head>
<body>
<?php if ($pageContext->backgroundPic1 !== ''): ?>
<div class="rpcn-profile-background" aria-hidden="true">
    <img src="<?= htmlspecialchars($pageContext->backgroundPic1) ?>" alt="" decoding="async">
</div>
<?php endif; ?>
<?php include 'lib/module/sys-global.php';?>
<div class="rpcn-page-wrap rpcn-profile-page">
    <?php if ($pageContext->notFound): ?>
        <div class="rpcn-profile-message rpcn-profile-message-error">
            <h1>Player not found</h1>
            <p>No RPCN profile could be found for <strong><?= htmlspecialchars($username) ?></strong>.</p>
            <a class="rpcn-profile-back" href="rpcn.php">Back to RPCN Browser</a>
        </div>
    <?php elseif ($pageContext->hasError): ?>
        <div class="rpcn-profile-message rpcn-profile-message-error">
            <h1>Profile unavailable</h1>
            <p><?= htmlspecialchars($pageContext->errorMessage) ?></p>
            <a class="rpcn-profile-back" href="rpcn.php">Back to RPCN Browser</a>
        </div>
    <?php else: ?>
        <section class="rpcn-profile-header darkmode-txt">
            <div class="rpcn-profile-identity">
                <div class="rpcn-profile-avatar" aria-hidden="true"></div>
                <div class="rpcn-profile-name-wrap">
                    <span class="rpcn-profile-kicker">RPCN Profile</span>
                    <h1 class="rpcn-profile-name pulsate"><?= htmlspecialchars($username) ?></h1>
                    <div class="rpcn-profile-progress-label">
                        <?= number_format($summary->earnedTrophies) ?> of <?= number_format($summary->totalTrophies) ?> trophies earned
                    </div>
                    <progress class="rpcn-profile-progress" max="100" value="<?= number_format($profileCompletion, 2, '.', '') ?>" aria-label="Overall trophy completion"></progress>
                </div>
                <div class="rpcn-profile-score">
                    <span class="rpcn-profile-score-label">Trophy Points</span>
                    <strong><?= number_format($summary->earnedPoints) ?></strong>
                    <span><?= number_format($summary->maxPoints) ?> available</span>
                </div>
            </div>

            <div class="rpcn-profile-stats">
                <a class="rpcn-profile-stat" href="<?= htmlspecialchars(rpcn_profile_url($username, rpcn_profile_with_language($pageContext, []), 'games')) ?>">
                    <span class="rpcn-profile-stat-label">Games</span>
                    <strong><?= number_format($summary->games) ?></strong>
                </a>
                <a class="rpcn-profile-stat" href="<?= htmlspecialchars(rpcn_profile_url($username, rpcn_profile_with_language($pageContext, ['trophies' => 'earned']))) ?>">
                    <span class="rpcn-profile-stat-label">Trophies Earned</span>
                    <strong><?= number_format($summary->earnedTrophies) ?></strong>
                </a>
                <a class="rpcn-profile-stat" href="<?= htmlspecialchars(rpcn_profile_url($username, rpcn_profile_with_language($pageContext, ['completed' => '1']), 'games')) ?>">
                    <span class="rpcn-profile-stat-label">Completed Games</span>
                    <strong><?= number_format($summary->completedGames) ?></strong>
                </a>
                <div class="rpcn-profile-stat">
                    <span class="rpcn-profile-stat-label">Completion</span>
                    <strong><?= number_format($profileCompletion, 1) ?>%</strong>
                </div>
            </div>

            <div class="rpcn-profile-grades">
                <?php foreach (['platinum', 'gold', 'silver', 'bronze'] as $grade): ?>
                    <?php $gradeCount = $summary->earnedByType->get($grade); ?>
                    <a class="rpcn-profile-grade-stat" href="<?= htmlspecialchars(rpcn_profile_url($username, rpcn_profile_with_language($pageContext, ['trophies' => 'earned', 'grade' => $grade]))) ?>">
                        <?= rpcn_profile_grade_icon($grade) ?>
                        <span>
                            <strong><?= number_format($gradeCount) ?></strong>
                            <?= ucfirst($grade) ?>
                        </span>
                        <small><?= number_format($gradeCount * $pageContext->trophyPoints->get($grade)) ?> pts</small>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>

        <?php if ($selectedGame !== null): ?>
            <section class="rpcn-profile-section">
                <div class="rpcn-profile-section-heading">
                    <div>
                        <a class="rpcn-profile-back" href="<?= htmlspecialchars(rpcn_profile_url($username, rpcn_profile_list_params($pageContext))) ?>">Back to games</a>
                        <div class="rpcn-profile-game-heading">
                            <h2><?= htmlspecialchars($selectedGame->game->title) ?></h2>
                            <?php if ($selectedGame->regions !== []): ?>
                                <div class="rpcn-profile-game-regions" aria-label="Game regions">
                                    <?php foreach ($selectedGame->regions as $region): ?>
                                        <span class="rpcn-profile-region-flag" title="<?= htmlspecialchars($region) ?>">
                                            <img src="/img/icons/compat/<?= strtoupper(htmlspecialchars($region)) ?>.png" alt="<?= htmlspecialchars($region) ?>">
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="rpcn-profile-game-overview">
                    <img class="rpcn-profile-game-cover" src="<?= htmlspecialchars($selectedGame->game->icon) ?>" alt="<?= htmlspecialchars($selectedGame->game->title) ?> icon" loading="lazy" decoding="async">
                    <div class="rpcn-profile-game-overview-stats">
                        <div><span>Earned</span><strong><?= number_format($selectedGame->game->earnedCount) ?> / <?= number_format($selectedGame->game->totalCount) ?></strong></div>
                        <div><span>Completion</span><strong><?= number_format($selectedGame->game->completion, 1) ?>%</strong></div>
                        <div><span>Points</span><strong><?= number_format($selectedGame->game->earnedPoints) ?> / <?= number_format($selectedGame->game->maxPoints) ?></strong></div>
                        <div><span>Tracked Players</span><strong><?= number_format($selectedGame->uniquePlayers) ?></strong></div>
                        <?php if ($selectedGame->game->completionTimeLabel !== ''): ?>
                            <div><span>100% Time</span><strong><?= htmlspecialchars($selectedGame->game->completionTimeLabel) ?></strong></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="rpcn-profile-trophy-controls" aria-label="Filter and sort game trophies">
                    <form class="rpcn-profile-language-form" method="get" action="rpcn-profile.php">
                        <?php foreach (rpcn_profile_game_trophy_params($pageContext, $selectedGame->game->commId) as $key => $value): ?>
                            <?php if ($key !== 'lang'): ?><input type="hidden" name="<?= htmlspecialchars($key) ?>" value="<?= htmlspecialchars($value) ?>"><?php endif; ?>
                        <?php endforeach; ?>
                        <input type="hidden" name="username" value="<?= htmlspecialchars($username) ?>">
                        <label for="rpcn-profile-game-language">Language</label>
                        <select id="rpcn-profile-game-language" name="lang">
                            <?php foreach ($selectedGame->languages as $language): ?>
                                <option value="<?= htmlspecialchars($language) ?>"<?= $pageContext->language === $language ? ' selected' : '' ?>><?= htmlspecialchars(RPCNLanguage::label($language)) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit">Apply</button>
                    </form>
                    <div class="rpcn-profile-trophy-control-group">
                        <span class="rpcn-profile-trophy-control-label">Hidden</span>
                        <div class="rpcn-profile-trophy-control-options">
                            <a class="<?= $revealHidden ? 'rpcn-profile-sort-active' : '' ?>" href="<?= htmlspecialchars(rpcn_profile_game_hidden_toggle_url($pageContext, $selectedGame->game->commId)) ?>">
                                <?= $revealHidden ? 'Hide all' : 'Reveal all' ?>
                            </a>
                        </div>
                    </div>
                    <div class="rpcn-profile-trophy-control-group">
                        <span class="rpcn-profile-trophy-control-label">Show</span>
                        <div class="rpcn-profile-trophy-control-options">
                            <?php foreach (['all' => 'All', 'earned' => 'Earned', 'unearned' => 'Unearned', 'hidden' => 'Hidden'] as $filterKey => $filterLabel): ?>
                                <a class="<?= $pageContext->gameTrophyFilter === $filterKey ? 'rpcn-profile-sort-active' : '' ?>" href="<?= htmlspecialchars(rpcn_profile_game_trophy_filter_url($pageContext, $selectedGame->game->commId, $filterKey)) ?>">
                                    <?= htmlspecialchars($filterLabel) ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="rpcn-profile-trophy-control-group">
                        <span class="rpcn-profile-trophy-control-label">Grade</span>
                        <div class="rpcn-profile-trophy-control-options">
                            <?php foreach (['all' => 'All', 'platinum' => 'Platinum', 'gold' => 'Gold', 'silver' => 'Silver', 'bronze' => 'Bronze'] as $gradeKey => $gradeLabel): ?>
                                <a class="<?= $pageContext->gameTrophyGrade === $gradeKey ? 'rpcn-profile-sort-active' : '' ?>" href="<?= htmlspecialchars(rpcn_profile_game_trophy_grade_url($pageContext, $selectedGame->game->commId, $gradeKey)) ?>">
                                    <?= htmlspecialchars($gradeLabel) ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="rpcn-profile-trophy-control-group rpcn-profile-trophy-control-sort">
                        <span class="rpcn-profile-trophy-control-label">Sort by</span>
                        <div class="rpcn-profile-trophy-control-options">
                            <?php foreach (['default' => 'Default', 'rarity' => 'Rarity', 'date' => 'Earned date', 'grade' => 'Grade', 'points' => 'Points', 'name' => 'Name', 'status' => 'Status'] as $sortKey => $sortLabel): ?>
                                <a class="<?= $pageContext->gameTrophySort === $sortKey ? 'rpcn-profile-sort-active' : '' ?>" href="<?= htmlspecialchars(rpcn_profile_game_trophy_sort_url($pageContext, $selectedGame->game->commId, $sortKey)) ?>">
                                    <?= htmlspecialchars($sortLabel) ?><?= $pageContext->gameTrophySort === $sortKey && $sortKey !== 'default' ? ($pageContext->gameTrophyDirection === 'asc' ? ' ↑' : ' ↓') : '' ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <span class="rpcn-profile-trophy-control-count"><?= number_format(count($selectedGame->trophies)) ?> shown</span>
                    </div>
                </div>

                <?php if ($selectedGame->trophies === []): ?>
                    <div class="rpcn-profile-empty">No trophies found for these filters.</div>
                <?php else: ?>
                <?php $gameTrophyGroups = rpcn_profile_group_trophies($selectedGame->trophies); ?>
                <div class="rpcn-profile-trophy-groups">
                    <?php foreach ($gameTrophyGroups as $groupId => $groupTrophies): ?>
                        <?php
                        $groupEarned = 0;
                        foreach ($groupTrophies as $groupTrophy)
                        {
                            if ($groupTrophy->earned) $groupEarned++;
                        }
                        ?>
                        <section class="rpcn-profile-trophy-group">
                            <div class="rpcn-profile-trophy-group-heading">
                                <h3><?= htmlspecialchars(rpcn_profile_trophy_group_label($groupId, $selectedGame->groups)) ?></h3>
                                <?php if ($pageContext->gameTrophyFilter === 'all' && $pageContext->gameTrophyGrade === 'all'): ?>
                                    <?php $groupDefinition = $selectedGame->groups[$groupId] ?? null; $groupTotal = $groupDefinition !== null ? $groupDefinition->definedTrophies->total() : count($groupTrophies); ?>
                                    <span><?= number_format($groupEarned) ?> / <?= number_format($groupTotal) ?> earned</span>
                                <?php else: ?>
                                    <span><?= number_format(count($groupTrophies)) ?> shown</span>
                                <?php endif; ?>
                            </div>
                            <div class="rpcn-profile-trophy-list">
                    <?php foreach ($groupTrophies as $trophy): ?>
                        <?php if ($trophy->hidden): ?>
                            <details class="rpcn-profile-trophy rpcn-profile-trophy-hidden<?= $trophy->earned ? ' rpcn-profile-trophy-earned' : '' ?>"<?= $revealHidden ? ' open' : '' ?>>
                                <summary>
                                    <span class="rpcn-profile-hidden-mark"><?= rpcn_profile_grade_icon('unknown') ?></span>
                                    <span class="rpcn-profile-hidden-copy">
                                        <strong class="rpcn-profile-hidden-closed">Hidden trophy. Click to reveal.</strong>
                                        <strong class="rpcn-profile-hidden-open">Hide trophy details</strong>
                                        <small><?= $trophy->earned ? 'Earned' : 'Not earned' ?><?= $trophy->earnedAtLabel !== '' ? ' · ' . htmlspecialchars($trophy->earnedAtLabel) : '' ?></small>
                                    </span>
                                </summary>
                                <div class="rpcn-profile-hidden-content">
                                    <?php if ($trophy->icon !== ''): ?>
                                        <img class="rpcn-profile-trophy-icon" src="<?= htmlspecialchars($trophy->icon) ?>" alt="Trophy icon" loading="lazy" decoding="async">
                                    <?php else: ?>
                                        <span class="rpcn-profile-trophy-icon rpcn-profile-trophy-icon-fallback"><?= rpcn_profile_grade_icon($trophy->type) ?></span>
                                    <?php endif; ?>
                                    <div class="rpcn-profile-trophy-copy">
                                        <div class="rpcn-profile-trophy-title-row">
                                            <strong><?= htmlspecialchars($trophy->name) ?></strong>
                                            <?php if ($trophy->onlineOnly): ?>
                                                <span class="rpcn-profile-online-only" title="Online-only trophy" aria-label="Online-only trophy">
                                                    <img src="/img/icons/compat/online.png" alt="" aria-hidden="true">
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <p><?= htmlspecialchars($trophy->detail) ?></p>
                                        <div class="rpcn-profile-trophy-meta">
                                            <span><?= $trophy->earned ? 'Earned' : 'Not earned' ?><?= $trophy->earnedAtLabel !== '' ? ' · ' . htmlspecialchars($trophy->earnedAtLabel) : '' ?></span>
                                        </div>
                                    </div>
                                    <aside class="rpcn-profile-trophy-rarity <?= $trophy->percentage !== null ? 'rpcn-profile-rarity-tier-' . max(0, min(4, $trophy->rarityTier)) : 'rpcn-profile-rarity-unavailable' ?>" aria-label="Trophy rarity">
                                        <?php if ($trophy->percentage !== null): ?>
                                            <span class="rpcn-profile-trophy-rarity-percent"><?= number_format($trophy->percentage, 1) ?>%</span>
                                            <strong><?= htmlspecialchars($trophy->rarity) ?></strong>
                                            <small><?= number_format($trophy->earnerCount) ?> of <?= number_format($selectedGame->uniquePlayers) ?> players</small>
                                        <?php else: ?>
                                            <span class="rpcn-profile-trophy-rarity-percent">—</span>
                                            <strong>Rarity unavailable</strong>
                                            <small>No player statistics</small>
                                        <?php endif; ?>
                                        <span class="rpcn-profile-trophy-grade-info"><?= rpcn_profile_grade_icon($trophy->type) ?><span><?= ucfirst(htmlspecialchars($trophy->type)) ?> · <?= number_format($trophy->points) ?> pts</span></span>
                                    </aside>
                                </div>
                            </details>
                        <?php else: ?>
                            <article class="rpcn-profile-trophy<?= $trophy->earned ? ' rpcn-profile-trophy-earned' : '' ?>">
                                <?php if ($trophy->icon !== ''): ?>
                                        <img class="rpcn-profile-trophy-icon" src="<?= htmlspecialchars($trophy->icon) ?>" alt="Trophy icon" loading="lazy" decoding="async">
                                    <?php else: ?>
                                        <span class="rpcn-profile-trophy-icon rpcn-profile-trophy-icon-fallback"><?= rpcn_profile_grade_icon($trophy->type) ?></span>
                                    <?php endif; ?>
                                <div class="rpcn-profile-trophy-copy">
                                    <div class="rpcn-profile-trophy-title-row">
                                        <strong><?= htmlspecialchars($trophy->name) ?></strong>
                                            <?php if ($trophy->onlineOnly): ?>
                                                <span class="rpcn-profile-online-only" title="Online-only trophy" aria-label="Online-only trophy">
                                                    <img src="/img/icons/compat/online.png" alt="" aria-hidden="true">
                                                </span>
                                            <?php endif; ?>
                                    </div>
                                    <p><?= htmlspecialchars($trophy->detail) ?></p>
                                    <div class="rpcn-profile-trophy-meta">
                                        <span><?= $trophy->earned ? 'Earned' : 'Not earned' ?><?= $trophy->earnedAtLabel !== '' ? ' · ' . htmlspecialchars($trophy->earnedAtLabel) : '' ?></span>
                                    </div>
                                </div>
                                <aside class="rpcn-profile-trophy-rarity <?= $trophy->percentage !== null ? 'rpcn-profile-rarity-tier-' . max(0, min(4, $trophy->rarityTier)) : 'rpcn-profile-rarity-unavailable' ?>" aria-label="Trophy rarity">
                                    <?php if ($trophy->percentage !== null): ?>
                                        <span class="rpcn-profile-trophy-rarity-percent"><?= number_format($trophy->percentage, 1) ?>%</span>
                                        <strong><?= htmlspecialchars($trophy->rarity) ?></strong>
                                        <small><?= number_format($trophy->earnerCount) ?> of <?= number_format($selectedGame->uniquePlayers) ?> players</small>
                                    <?php else: ?>
                                        <span class="rpcn-profile-trophy-rarity-percent">—</span>
                                        <strong>Rarity unavailable</strong>
                                        <small>No player statistics</small>
                                    <?php endif; ?>
                                    <span class="rpcn-profile-trophy-grade-info"><?= rpcn_profile_grade_icon($trophy->type) ?><span><?= ucfirst(htmlspecialchars($trophy->type)) ?> · <?= number_format($trophy->points) ?> pts</span></span>
                                </aside>
                            </article>
                        <?php endif; ?>
                    <?php endforeach; ?>
                            </div>
                        </section>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </section>
        <?php elseif ($showTrophyList): ?>
            <section class="rpcn-profile-section">
                <div class="rpcn-profile-section-heading">
                    <div>
                        <a class="rpcn-profile-back" href="<?= htmlspecialchars(rpcn_profile_url($username)) ?>">Back to games</a>
                        <h2>Trophies Earned</h2>
                        <?php if ($pageContext->filteredTrophyCount > 0): ?>
                            <?php
                            $firstTrophy = (($pageContext->trophyPage - 1) * $pageContext->trophiesPerPage) + 1;
                            $lastTrophy = min($pageContext->filteredTrophyCount, $pageContext->trophyPage * $pageContext->trophiesPerPage);
                            ?>
                            <span class="rpcn-profile-list-count">Showing <?= number_format($firstTrophy) ?>-<?= number_format($lastTrophy) ?> of <?= number_format($pageContext->filteredTrophyCount) ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="rpcn-profile-trophy-controls rpcn-profile-trophy-controls-global" aria-label="Filter and sort earned trophies">
                    <form class="rpcn-profile-language-form" method="get" action="rpcn-profile.php">
                        <?php foreach (rpcn_profile_trophy_params($pageContext) as $key => $value): ?>
                            <?php if ($key !== 'lang'): ?><input type="hidden" name="<?= htmlspecialchars($key) ?>" value="<?= htmlspecialchars($value) ?>"><?php endif; ?>
                        <?php endforeach; ?>
                        <input type="hidden" name="username" value="<?= htmlspecialchars($username) ?>">
                        <label for="rpcn-profile-trophy-language">Language</label>
                        <select id="rpcn-profile-trophy-language" name="lang">
                            <?php foreach ($pageContext->availableLanguages as $language): ?>
                                <option value="<?= htmlspecialchars($language) ?>"<?= $pageContext->language === $language ? ' selected' : '' ?>><?= htmlspecialchars(RPCNLanguage::label($language)) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit">Apply</button>
                    </form>
                    <div class="rpcn-profile-trophy-control-group">
                        <span class="rpcn-profile-trophy-control-label">Grade</span>
                        <div class="rpcn-profile-trophy-control-options">
                            <?php foreach (['all' => 'All', 'platinum' => 'Platinum', 'gold' => 'Gold', 'silver' => 'Silver', 'bronze' => 'Bronze'] as $gradeKey => $gradeLabel): ?>
                                <a class="<?= $pageContext->trophyGrade === $gradeKey ? 'rpcn-profile-sort-active' : '' ?>" href="<?= htmlspecialchars(rpcn_profile_trophy_grade_url($pageContext, $gradeKey)) ?>">
                                    <?= htmlspecialchars($gradeLabel) ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="rpcn-profile-trophy-control-group rpcn-profile-trophy-control-sort">
                        <span class="rpcn-profile-trophy-control-label">Sort by</span>
                        <div class="rpcn-profile-trophy-control-options">
                            <?php foreach (['date' => 'Earned date', 'game' => 'Game', 'name' => 'Name', 'grade' => 'Grade', 'points' => 'Points'] as $sortKey => $sortLabel): ?>
                                <a class="<?= $pageContext->trophySort === $sortKey ? 'rpcn-profile-sort-active' : '' ?>" href="<?= htmlspecialchars(rpcn_profile_trophy_sort_url($pageContext, $sortKey)) ?>">
                                    <?= htmlspecialchars($sortLabel) ?><?= $pageContext->trophySort === $sortKey ? ($pageContext->trophyDirection === 'asc' ? ' ↑' : ' ↓') : '' ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <?php if ($pageContext->trophies === []): ?>
                    <div class="rpcn-profile-empty">No trophies found for these filters.</div>
                <?php else: ?>
                    <div class="rpcn-profile-trophy-list">
                        <?php foreach ($pageContext->trophies as $trophy): ?>
                            <?php if ($trophy->hidden): ?>
                                <details class="rpcn-profile-trophy rpcn-profile-trophy-hidden<?= $trophy->earned ? ' rpcn-profile-trophy-earned' : '' ?>">
                                    <summary>
                                        <span class="rpcn-profile-hidden-mark"><?= rpcn_profile_grade_icon('unknown') ?></span>
                                        <span class="rpcn-profile-hidden-copy">
                                            <strong class="rpcn-profile-hidden-closed">Hidden trophy. Click to reveal.</strong>
                                            <strong class="rpcn-profile-hidden-open">Hide trophy details</strong>
                                            <small><?= $trophy->earned ? 'Earned' : 'Not earned' ?> · <?= htmlspecialchars($trophy->gameTitle) ?><?= $trophy->earnedAtLabel !== '' ? ' · ' . htmlspecialchars($trophy->earnedAtLabel) : '' ?></small>
                                        </span>
                                    </summary>
                                    <div class="rpcn-profile-hidden-content">
                                        <?php if ($trophy->icon !== ''): ?>
                                            <img class="rpcn-profile-trophy-icon" src="<?= htmlspecialchars($trophy->icon) ?>" alt="Trophy icon" loading="lazy" decoding="async">
                                        <?php else: ?>
                                            <span class="rpcn-profile-trophy-icon rpcn-profile-trophy-icon-fallback"><?= rpcn_profile_grade_icon($trophy->type) ?></span>
                                        <?php endif; ?>
                                        <div class="rpcn-profile-trophy-copy">
                                            <div class="rpcn-profile-trophy-title-row">
                                                <?= rpcn_profile_grade_icon($trophy->type) ?>
                                                <strong><?= htmlspecialchars($trophy->name) ?></strong>
                                            <?php if ($trophy->onlineOnly): ?>
                                                <span class="rpcn-profile-online-only" title="Online-only trophy" aria-label="Online-only trophy">
                                                    <img src="/img/icons/compat/online.png" alt="" aria-hidden="true">
                                                </span>
                                            <?php endif; ?>
                                            </div>
                                            <p><?= htmlspecialchars($trophy->detail) ?></p>
                                            <div class="rpcn-profile-trophy-meta">
                                                <span><?= htmlspecialchars($trophy->gameTitle) ?></span>
                                                <span><?= $trophy->earned ? 'Earned' : 'Not earned' ?></span>
                                                <span><?= ucfirst(htmlspecialchars($trophy->type)) ?> · <?= number_format($trophy->points) ?> pts</span>
                                                <?php if ($trophy->earnedAtLabel !== ''): ?><span><?= htmlspecialchars($trophy->earnedAtLabel) ?></span><?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </details>
                            <?php else: ?>
                                <article class="rpcn-profile-trophy<?= $trophy->earned ? ' rpcn-profile-trophy-earned' : '' ?>">
                                    <?php if ($trophy->icon !== ''): ?>
                                        <img class="rpcn-profile-trophy-icon" src="<?= htmlspecialchars($trophy->icon) ?>" alt="Trophy icon" loading="lazy" decoding="async">
                                    <?php else: ?>
                                        <span class="rpcn-profile-trophy-icon rpcn-profile-trophy-icon-fallback"><?= rpcn_profile_grade_icon($trophy->type) ?></span>
                                    <?php endif; ?>
                                    <div class="rpcn-profile-trophy-copy">
                                        <div class="rpcn-profile-trophy-title-row">
                                            <?= rpcn_profile_grade_icon($trophy->type) ?>
                                            <strong><?= htmlspecialchars($trophy->name) ?></strong>
                                            <?php if ($trophy->onlineOnly): ?>
                                                <span class="rpcn-profile-online-only" title="Online-only trophy" aria-label="Online-only trophy">
                                                    <img src="/img/icons/compat/online.png" alt="" aria-hidden="true">
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <p><?= htmlspecialchars($trophy->detail) ?></p>
                                        <div class="rpcn-profile-trophy-meta">
                                            <span><?= htmlspecialchars($trophy->gameTitle) ?></span>
                                            <span><?= $trophy->earned ? 'Earned' : 'Not earned' ?></span>
                                            <span><?= ucfirst(htmlspecialchars($trophy->type)) ?> · <?= number_format($trophy->points) ?> pts</span>
                                            <?php if ($trophy->earnedAtLabel !== ''): ?><span><?= htmlspecialchars($trophy->earnedAtLabel) ?></span><?php endif; ?>
                                        </div>
                                    </div>
                                </article>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <?php if ($pageContext->trophyPageCount > 1): ?>
                        <nav class="rpcn-profile-pagination" aria-label="Trophy list pages">
                            <div>
                                <?php if ($pageContext->trophyPage > 1): ?>
                                    <a href="<?= htmlspecialchars(rpcn_profile_trophy_page_url($pageContext, $pageContext->trophyPage - 1)) ?>">Previous <?= number_format($pageContext->trophiesPerPage) ?></a>
                                <?php endif; ?>
                            </div>
                            <span>Page <?= number_format($pageContext->trophyPage) ?> of <?= number_format($pageContext->trophyPageCount) ?></span>
                            <div>
                                <?php if ($pageContext->trophyPage < $pageContext->trophyPageCount): ?>
                                    <a href="<?= htmlspecialchars(rpcn_profile_trophy_page_url($pageContext, $pageContext->trophyPage + 1)) ?>">Next <?= number_format($pageContext->trophiesPerPage) ?> trophies</a>
                                <?php endif; ?>
                            </div>
                        </nav>
                    <?php endif; ?>
                <?php endif; ?>
            </section>
        <?php elseif ($showGames): ?>
            <section class="rpcn-profile-section" id="games">
                <div class="rpcn-profile-section-heading">
                    <div>
                        <span class="rpcn-profile-kicker"><?= $pageContext->completedOnly ? 'Completed' : 'Library' ?></span>
                        <h2><?= $pageContext->completedOnly ? 'Completed Games' : 'Games' ?></h2>
                        <?php if ($pageContext->filteredGameCount > 0): ?>
                            <?php
                            $firstGame = (($pageContext->gamePage - 1) * $pageContext->gamesPerPage) + 1;
                            $lastGame = min($pageContext->filteredGameCount, $pageContext->gamePage * $pageContext->gamesPerPage);
                            ?>
                            <span class="rpcn-profile-list-count">Showing <?= number_format($firstGame) ?>-<?= number_format($lastGame) ?> of <?= number_format($pageContext->filteredGameCount) ?></span>
                        <?php endif; ?>
                    </div>
                    <?php if ($pageContext->completedOnly): ?>
                        <a class="rpcn-profile-back" href="<?= htmlspecialchars(rpcn_profile_url($username, rpcn_profile_with_language($pageContext, []), 'games')) ?>">Show all games</a>
                    <?php endif; ?>
                </div>

                <div class="rpcn-profile-sortbar" aria-label="Sort games">
                    <span>Sort by</span>
                    <?php foreach (['name' => 'Name', 'earned' => 'Earned', 'total' => 'Total trophies', 'completion' => 'Completion', 'points' => 'Points'] as $sortKey => $sortLabel): ?>
                        <a class="<?= $pageContext->sort === $sortKey ? 'rpcn-profile-sort-active' : '' ?>" href="<?= htmlspecialchars(rpcn_profile_sort_url($pageContext, $sortKey)) ?>">
                            <?= htmlspecialchars($sortLabel) ?><?= $pageContext->sort === $sortKey ? ($pageContext->direction === 'asc' ? ' (ascending)' : ' (descending)') : '' ?>
                        </a>
                    <?php endforeach; ?>
                </div>

                <?php if ($pageContext->games === []): ?>
                    <div class="rpcn-profile-empty">No games found for this filter.</div>
                <?php else: ?>
                    <div class="rpcn-profile-game-list">
                        <?php foreach ($pageContext->games as $game): ?>
                            <a class="rpcn-profile-game-row" href="<?= htmlspecialchars(rpcn_profile_game_url($pageContext, $game->commId)) ?>">
                                <img class="rpcn-profile-game-icon" src="<?= htmlspecialchars($game->icon) ?>" alt="<?= htmlspecialchars($game->title) ?> icon" loading="lazy" decoding="async">
                                <div class="rpcn-profile-game-copy">
                                    <strong><?= htmlspecialchars($game->title) ?></strong>
                                    <?php if ($game->hasMetadata): ?>
                                        <progress class="rpcn-profile-game-progress" max="100" value="<?= number_format($game->completion, 2, '.', '') ?>" aria-label="<?= htmlspecialchars($game->title) ?> completion"></progress>
                                    <?php else: ?>
                                        <small>Trophy metadata unavailable</small>
                                    <?php endif; ?>
                                </div>
                                <div class="rpcn-profile-game-numbers">
                                    <span><strong><?= number_format($game->earnedCount) ?></strong> / <?= number_format($game->totalCount) ?> trophies</span>
                                    <span><strong><?= number_format($game->earnedPoints) ?></strong> / <?= number_format($game->maxPoints) ?> pts</span>
                                    <span><?= number_format($game->completion, 1) ?>%</span>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <?php if ($pageContext->gamePageCount > 1): ?>
                        <nav class="rpcn-profile-pagination" aria-label="Game list pages">
                            <div>
                                <?php if ($pageContext->gamePage > 1): ?>
                                    <a href="<?= htmlspecialchars(rpcn_profile_page_url($pageContext, $pageContext->gamePage - 1)) ?>">Previous</a>
                                <?php endif; ?>
                            </div>
                            <span>Page <?= number_format($pageContext->gamePage) ?> of <?= number_format($pageContext->gamePageCount) ?></span>
                            <div>
                                <?php if ($pageContext->gamePage < $pageContext->gamePageCount): ?>
                                    <a href="<?= htmlspecialchars(rpcn_profile_page_url($pageContext, $pageContext->gamePage + 1)) ?>">Next</a>
                                <?php endif; ?>
                            </div>
                        </nav>
                    <?php endif; ?>
                <?php endif; ?>
            </section>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php include 'lib/module/inc-footer.php';?>

</body>
</html>
