<?php
$pageContext = require __DIR__ . '/lib/module/rpcn/inc-rpcn-game.php';
if (!$pageContext instanceof RPCNGamePageContext)
{
    throw new RuntimeException('Invalid RPCN game page context.');
}

$rpcn_game = $pageContext->rpcnGame;
$commId = $pageContext->commId;
$gameTitle = $pageContext->gameTitle;
$gameIcon = $pageContext->gameIcon;
$gamePic1 = $pageContext->gamePic1;
$defaultIcon = $pageContext->defaultIcon;
$currentPlayers = $pageContext->currentPlayers;
$regions = $pageContext->regions;
$hasLeaderboard = $pageContext->hasLeaderboard;
$boards = $pageContext->boards;
$peak24h = $pageContext->peak24h;
$peakAllTime = $pageContext->peakAllTime;
$timeAgoStr = $pageContext->timeAgoStr;
$chartDataHourly = $pageContext->chartDataHourly;
$chartDataDaily = $pageContext->chartDataDaily;

/**
 * @param array<int, string> $boards
 * @return list<RPCNLeaderboardGroup>
 */
function rpcn_group_leaderboard_boards(array $boards): array
{
    /** @var array<string, RPCNLeaderboardGroup> $groups */
    $groups = [];

    foreach ($boards as $boardId => $boardName)
    {
        $parts = explode('|', $boardName, 2);
        $section = null;
        $label = $boardName;

        if (count($parts) === 2)
        {
            $candidateSection = trim($parts[0]);
            $candidateLabel = trim($parts[1]);

            if ($candidateSection !== '' && $candidateLabel !== '')
            {
                $section = $candidateSection;
                $label = $candidateLabel;
            }
        }

        $groupKey = $section === null ? '__ungrouped__' : 'section:' . $section;

        if (!isset($groups[$groupKey]))
        {
            $groups[$groupKey] = new RPCNLeaderboardGroup($section);
        }

        $groups[$groupKey]->addBoard($boardId, $label);
    }

    return array_values($groups);
}

/** @param array<string, RPCNTrophyGroupDefinition> $groups */
function rpcn_trophy_group_label(string $groupId, array $groups): string
{
    if ($groupId === '' || $groupId === 'default') return 'Base Game';

    $group = $groups[$groupId] ?? null;
    if ($group !== null && $group->name !== '') return $group->name;

    $number = (int)$groupId;
    return $number > 0 ? 'DLC Pack ' . $number : 'DLC Pack';
}

/**
 * @param list<RPCNTrophy> $trophies
 * @return array<string, list<RPCNTrophy>>
 */
function rpcn_group_trophies(array $trophies): array
{
    /** @var array<string, list<RPCNTrophy>> $groups */
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

function rpcn_trophy_grade(string $type): string
{
    return in_array($type, ['bronze', 'silver', 'gold', 'platinum'], true) ? $type : 'unknown';
}

function rpcn_chart_timestamp(string $value): ?int
{
    $timestamp = strtotime($value . ' UTC');
    return $timestamp === false ? null : $timestamp;
}

/**
 * @param list<RPCNChartPoint> $data
 * @return list<RPCNChartPoint>
 */
function rpcn_filter_range(array $data, string $period): array
{
    if ($period === '1y') return $data;
    $hoursMap = ['48h' => 48, '1w' => 168, '1m' => 720, '3m' => 2160, '6m' => 4320];
    $hours    = $hoursMap[$period] ?? 0;
    if ($hours === 0) return $data;
    $cutoff   = time() - $hours * 3600;
    return array_values(array_filter($data, static function ($d) use ($cutoff): bool {
        $timestamp = rpcn_chart_timestamp($d->x);
        return $timestamp !== null && $timestamp >= $cutoff;
    }));
}

/**
 * @param list<RPCNChartPoint> $data
 * @return list<RPCNChartPoint>
 */
function rpcn_fill_hourly_gaps(array $data, int $gapThresholdHours = 2): array
{
    if (count($data) < 2) return $data;

    $out = [];
    for ($i = 0; $i < count($data); $i++)
    {
        $cur = $data[$i];
        $out[] = $cur;

        if ($i + 1 >= count($data)) break;

        $next        = $data[$i + 1];
        $curTs = rpcn_chart_timestamp($cur->x);
        $nextTs = rpcn_chart_timestamp($next->x);
        if ($curTs === null || $nextTs === null) continue;
        $gapHours = ($nextTs - $curTs) / 3600;

        if ($gapHours > $gapThresholdHours)
        {
            $out[] = new RPCNChartPoint(gmdate('Y-m-d H:i:s', $curTs + 3600), 0);
            $beforeNext = $nextTs - 3600;
            if ($beforeNext > $curTs + 3600)
            {
                $out[] = new RPCNChartPoint(gmdate('Y-m-d H:i:s', $beforeNext), 0);
            }
        }
    }
    return $out;
}

/**
 * @param list<RPCNChartPoint> $data
 * @return list<RPCNChartPoint>
 */
function rpcn_fill_daily_gaps(array $data, int $gapDays = 2): array
{
    if (count($data) < 2) return $data;

    $out = [];
    for ($i = 0; $i < count($data); $i++)
    {
        $cur = $data[$i];
        $out[] = $cur;

        if ($i + 1 >= count($data)) break;

        $next     = $data[$i + 1];
        $curTs = rpcn_chart_timestamp($cur->x);
        $nextTs = rpcn_chart_timestamp($next->x);
        if ($curTs === null || $nextTs === null) continue;
        $gapDaysN = ($nextTs - $curTs) / 86400;

        if ($gapDaysN > $gapDays)
        {
            $out[] = new RPCNChartPoint(gmdate('Y-m-d', $curTs + 86400), 0);
            $beforeNext = $nextTs - 86400;
            if ($beforeNext > $curTs + 86400)
            {
                $out[] = new RPCNChartPoint(gmdate('Y-m-d', $beforeNext), 0);
            }
        }
    }
    return $out;
}

/**
 * @param list<RPCNChartPoint> $data
 * @return list<RPCNChartPoint>
 */
function rpcn_aggregate_monthly(array $data): array
{
    $months = [];
    foreach ($data as $d)
    {
        $key = substr($d->x, 0, 7);
        if (!isset($months[$key]) || (int)$d->y > $months[$key])
            $months[$key] = (int)$d->y;
    }
    ksort($months);
    $out = [];
    foreach ($months as $k => $v) $out[] = new RPCNChartPoint($k, $v);
    return $out;
}

function rpcn_month_name(int $month): string
{
    return match ($month) {
        1 => 'Jan',
        2 => 'Feb',
        3 => 'Mar',
        4 => 'Apr',
        5 => 'May',
        6 => 'Jun',
        7 => 'Jul',
        8 => 'Aug',
        9 => 'Sep',
        10 => 'Oct',
        11 => 'Nov',
        12 => 'Dec',
        default => '',
    };
}

function rpcn_x_label(string $xStr, string $period): string
{
    if ($period === 'max')
    {
        $parts = explode('-', $xStr);
        $y = $parts[0];
        $m = max(1, min(12, (int)($parts[1] ?? 1)));
        return rpcn_month_name($m) . ' ' . $y;
    }
    $ts = rpcn_chart_timestamp($xStr);
    if ($ts === null) return $xStr;
    $lbl = rpcn_month_name((int)gmdate('n', $ts)) . ' ' . (int)gmdate('j', $ts);
    if ($period === '48h') $lbl .= ' ' . gmdate('H:i', $ts);
    return $lbl;
}

function rpcn_tooltip_date(string $xStr, string $period): string
{
    if ($period === 'max')
    {
        $parts = explode('-', $xStr);
        $y = $parts[0];
        $m = max(1, min(12, (int)($parts[1] ?? 1)));
        return rpcn_month_name($m) . ' ' . $y . ' UTC';
    }
    $ts = rpcn_chart_timestamp($xStr);
    if ($ts === null) return $xStr;
    $base = rpcn_month_name((int)gmdate('n', $ts)) . ' ' . (int)gmdate('j', $ts) . ', ' . gmdate('Y', $ts);
    if ($period === '48h' || $period === '1w') $base .= ' ' . gmdate('H:i', $ts);
    return $base . ' UTC';
}

/** @param list<RPCNChartPoint> $data */
function rpcn_build_svg(array $data, string $gradId, string $period = '1m'): string
{
    if (empty($data))
        return '<p class="rpcn-chart-empty">No data available for this period.</p>';

    $W = 1120; $H = 300;
    $pL = 46; $pR = 8; $pT = 18; $pB = 42;
    $iW = $W - $pL - $pR;
    $iH = $H - $pT - $pB;
    $n  = count($data);

    $rawMax = 0.0;
    foreach ($data as $point)
    {
        $rawMax = max($rawMax, (float)$point->y);
    }
    if ($rawMax <= 0) $rawMax = 1;
    $magnitude = pow(10, max(0, floor(log10($rawMax))));
    $niceMax   = (float)(ceil(($rawMax * 1.08) / $magnitude) * $magnitude);
    if ($niceMax <= 0) $niceMax = 1;

    /** @var list<RPCNChartCoordinate> $coords */
    $coords = [];
    foreach ($data as $i => $d)
    {
        $px = (float)($pL + ($n > 1 ? ($i / ($n - 1)) * $iW : $iW / 2));
        $ratio = max(0.0, min(1.0, (float)$d->y / $niceMax));
        $py = (float)($pT + $iH - $ratio * $iH);
        $coords[] = new RPCNChartCoordinate($px, $py, $d->x, $d->y);
    }

    $gridOut = ''; $yLblOut = '';
    for ($t = 0; $t <= 5; $t++)
    {
        $val = (int)round($niceMax * $t / 5);
        $cy  = (float)($pT + $iH - ($t / 5) * $iH);
        $gridOut  .= sprintf('<line x1="%d" y1="%.1f" x2="%d" y2="%.1f" class="rpcn-sg"/>',
            $pL, $cy, $W - $pR, $cy);
        $yLblOut  .= sprintf('<text x="%d" y="%.1f" class="rpcn-st rpcn-sty">%s</text>',
            $pL - 6, $cy + 4, number_format($val));
    }

    $labelWidthPx = match($period) {
        '48h'       => 82, // "Jan 1 04:00"
        '1w'        => 82,
        'max'       => 72, // "Jan 2025"
        default     => 48, // "Jan 1"
    };
    $minSpacingPx = $labelWidthPx + 6;
    $pxPerPoint   = ($n > 1) ? $iW / ($n - 1) : $iW;
    $step = max(1, (int)ceil($minSpacingPx / max(1, $pxPerPoint)));

    $xLblOut = '';
    for ($i = 0; $i < $n; $i += $step)
    {
        $coordinate = $coords[$i];
        $xLblOut .= sprintf('<text x="%.1f" y="%d" class="rpcn-st rpcn-stx">%s</text>',
            $coordinate->x, $H - 8, htmlspecialchars(rpcn_x_label($coordinate->sourceX, $period)));
    }

    $ptStr   = implode(' ', array_map(static fn(RPCNChartCoordinate $c): string => sprintf('%.1f,%.1f', $c->x, $c->y), $coords));
    $fillStr = sprintf('%.1f,%.1f ', $coords[0]->x, $pT + $iH) . $ptStr
             . sprintf(' %.1f,%.1f', $coords[$n - 1]->x, $pT + $iH);

    $hitW    = (int)max(6, $n > 1 ? ceil($iW / ($n - 1)) : $iW);
    $ttW     = 172; $ttH = 46;
    $dotsOut = '';

    foreach ($coords as $coordinate)
    {
        $px = $coordinate->x;
        $py = $coordinate->y;
        $xs = $coordinate->sourceX;
        $yv = $coordinate->value;
        $tipDate = rpcn_tooltip_date($xs, $period);
        $tipVal  = number_format($yv) . ' player' . ($yv !== 1 ? 's' : '');

        $ttX = max((float)$pL, min($px - $ttW / 2, (float)($W - $pR - $ttW)));
        $ttY = ($py - 12 - $ttH >= $pT) ? $py - 12 - $ttH : $py + 12;

        $dotsOut .=
            '<g class="rpcn-dp">'
            . sprintf('<rect x="%.1f" y="%d" width="%d" height="%d" class="rpcn-dp-hit"/>',
                $px - $hitW / 2, $pT, $hitW, $iH + 4)
            . sprintf('<line x1="%.1f" y1="%d" x2="%.1f" y2="%d" class="rpcn-dp-vline"/>',
                $px, $pT, $px, $pT + $iH)
            . sprintf('<circle cx="%.1f" cy="%.1f" r="4" class="rpcn-dp-dot"/>', $px, $py)
            . sprintf('<g class="rpcn-dp-tt" transform="translate(%.1f,%.1f)">', $ttX, $ttY)
            .   sprintf('<rect x="0" y="0" width="%d" height="%d" rx="5" class="rpcn-tt-bg"/>', $ttW, $ttH)
            .   sprintf('<text x="%d" y="16" class="rpcn-tt-date">%s</text>', $ttW / 2, htmlspecialchars($tipDate))
            .   sprintf('<text x="%d" y="34" class="rpcn-tt-val">%s</text>',  $ttW / 2, htmlspecialchars($tipVal))
            . '</g>'
            . '</g>';
    }

    $gid = htmlspecialchars($gradId);
    $out  = '<svg viewBox="0 0 ' . $W . ' ' . $H . '" class="rpcn-svg-chart"'
          . ' xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" role="img" aria-label="Player count chart in UTC">';
    $out .= '<defs><linearGradient id="' . $gid . '" x1="0" y1="0" x2="0" y2="1">'
          . '<stop offset="0%" stop-color="rgba(104,109,224,.30)"/>'
          . '<stop offset="100%" stop-color="rgba(104,109,224,.02)"/>'
          . '</linearGradient></defs>';
    $out .= $gridOut;
    $out .= '<polygon points="' . $fillStr . '" fill="url(#' . $gid . ')"/>';
    $out .= '<polyline points="' . $ptStr . '" class="rpcn-sl" fill="none"/>';
    $out .= $dotsOut . $xLblOut . $yLblOut;
    $out .= '</svg>';

    $latest = $data[$n - 1];
    $peakValue = 0;
    foreach ($data as $point)
    {
        $peakValue = max($peakValue, $point->y);
    }

    $summary = '<div class="rpcn-chart-summary">'
        . '<span>Peak <strong>' . number_format($peakValue) . '</strong></span>'
        . '<span>Latest <strong>' . number_format($latest->y) . '</strong></span>'
        . '<span>' . htmlspecialchars(rpcn_tooltip_date($latest->x, $period)) . '</span>'
        . '</div>';

    return $summary . $out;
}

$chartPeriodsMeta = ['48h' => '48H', '1w' => '1W', '1m' => '1M', '3m' => '3M', '6m' => '6M', '1y' => '1Y', 'max' => 'MAX'];
$chartSvgs        = [];
$chartDataAllTime = $rpcn_game->chartDataAllTime;
foreach ($chartPeriodsMeta as $key => $label)
{
    if ($key === 'max')
    {
        $source = rpcn_aggregate_monthly($chartDataAllTime);
    }
    else
    {
        $isHourly = in_array($key, ['48h', '1w'], true);
        $source   = rpcn_filter_range($isHourly ? $chartDataHourly : $chartDataDaily, $key);
        if ($isHourly)
        {
            $source = rpcn_fill_hourly_gaps($source, 2);
        }
        else
        {
            $source = rpcn_fill_daily_gaps($source, 2);
        }
    }
    $chartSvgs[$key] = rpcn_build_svg($source, 'rpcn-grad-' . $key, $key);
}

$boardGroups = rpcn_group_leaderboard_boards($boards);
$autoShowBoard = ($hasLeaderboard && !empty($boards) && count($boards) === 1)
    ? (int)array_key_first($boards)
    : null;

$lb_back_url   = 'rpcn-game.php?comm_id=' . urlencode($commId) . '&tab=lb';
$nojsBoardId   = null;
$nojsBoardHtml = '';

$show_trophies_tab = $rpcn_game->hasTrophies && ($_GET['tab'] ?? '') === 'trophies';
$show_lb_tab = $hasLeaderboard && (isset($_GET['board_id']) || ($_GET['tab'] ?? '') === 'lb');
if ($hasLeaderboard && !empty($boards) && isset($_GET['board_id']))
{
    $boardIdParam = $_GET['board_id'];
    $bid = is_numeric($boardIdParam) ? (int)$boardIdParam : -1;
    if (array_key_exists($bid, $boards))
    {
        $nojsBoardId   = $bid;
        $nojsBoardHtml = $rpcn_game->get_board_html($commId, $bid);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'lib/module/sys-css.php';?>
<?php include 'lib/module/sys-js.php';?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RPCS3 - <?= htmlspecialchars($gameTitle) ?> RPCN Statistics</title>
    <link rel="stylesheet" href="rpcn-game.css">
    <style>
        /* Dynamic values that must be set server-side */
        :root {
            --rpcn-pic1-url: <?= $gamePic1 !== '' ? 'url(' . htmlspecialchars($gamePic1, ENT_QUOTES) . ')' : 'none' ?>;
        }

        /* Active range-button highlight — generated from $chartPeriodsMeta keys */
        <?php foreach (array_keys($chartPeriodsMeta) as $key): ?>
        #r-<?= $key ?>:checked ~ .rpcn-chart-header label[for="r-<?= $key ?>"] {
            background:   var(--rpcn-accent-bg-hover);
            border-color: var(--rpcn-accent);
            color:        var(--rpcn-accent);
        }
        <?php endforeach; ?>

        /* Chart period visibility — generated from $chartPeriodsMeta keys */
        <?php foreach (array_keys($chartPeriodsMeta) as $key): ?>
        #r-<?= $key ?>:checked ~ .rpcn-chart-wrap #cp-<?= $key ?> { display: block; }
        <?php endforeach; ?>
    </style>
</head>
<body>
<?php include 'lib/module/sys-global.php';?>
<div class="rpcn-page-wrap">

<div class="rpcn-game">
        <div class="rpcn-game-icon-wrap">
            <img src="<?= htmlspecialchars($gameIcon) ?>"
                 alt="Game Icon"
                 class="rpcn-game-icon"
                 onerror="this.src='<?= htmlspecialchars($defaultIcon) ?>'">
        </div>

        <div class="rpcn-game-info">
            <div class="rpcn-game-title pulsate"><?= htmlspecialchars($gameTitle) ?></div>

            <div class="rpcn-game-meta">
                <?php foreach ($regions as $r): ?>
                    <span class="rpcn-region-badge">
                        <img src="/img/icons/compat/<?= strtoupper(htmlspecialchars($r)) ?>.png"
                             alt="<?= htmlspecialchars($r) ?>"
                             style="height:30px; vertical-align:middle">
                    </span>
                <?php endforeach; ?>
            </div>

            <div class="rpcn-stats-grid">
                <div class="rpcn-stat-card">
                    <div class="rpcn-stat-label">Online Now</div>
                    <span class="rpcn-stat-value rpcn-stat-online"><?= number_format($currentPlayers) ?></span>
                </div>
                <div class="rpcn-stat-card">
                    <div class="rpcn-stat-label">Peak 24h</div>
                    <span class="rpcn-stat-value"><?= number_format($peak24h) ?></span>
                </div>
                <div class="rpcn-stat-card">
                    <div class="rpcn-stat-label">Peak All-time</div>
                    <span class="rpcn-stat-value"><?= number_format($peakAllTime) ?></span>
                    <?php if ($timeAgoStr): ?>
                        <div class="rpcn-stat-sub"><?= htmlspecialchars($timeAgoStr) ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <input type="radio" name="rpcn-tab" id="tab-charts" class="rpcn-sr" <?= (!$show_lb_tab && !$show_trophies_tab) ? 'checked' : '' ?>>
    <?php if ($hasLeaderboard): ?>
    <input type="radio" name="rpcn-tab" id="tab-lb" class="rpcn-sr" <?= $show_lb_tab ? 'checked' : '' ?>>
    <?php endif; ?>
    <?php if ($rpcn_game->hasTrophies): ?>
    <input type="radio" name="rpcn-tab" id="tab-trophies" class="rpcn-sr" <?= $show_trophies_tab ? 'checked' : '' ?>>
    <?php endif; ?>

    <div class="rpcn-tabs-nav">
        <label for="tab-charts" class="rpcn-tab-btn">Player Charts</label>
        <?php if ($hasLeaderboard): ?>
            <label for="tab-lb" class="rpcn-tab-btn">Leaderboards</label>
        <?php endif; ?>
        <?php if ($rpcn_game->hasTrophies): ?>
            <a href="rpcn-game.php?comm_id=<?= urlencode($commId) ?>&amp;tab=trophies<?= $rpcn_game->trophyLanguage !== 'en' ? '&amp;lang=' . urlencode($rpcn_game->trophyLanguage) : '' ?>"
               class="rpcn-tab-btn rpcn-tab-link<?= $show_trophies_tab ? ' rpcn-tab-link-active' : '' ?>">Trophies (<?= $rpcn_game->totalTrophies ?>)</a>
        <?php endif; ?>
    </div>

    <div class="rpcn-tab-panels">

<div id="panel-charts" class="rpcn-tab-panel">

            <?php foreach (array_keys($chartPeriodsMeta) as $key): ?>
            <input type="radio" name="rpcn-range" id="r-<?= $key ?>" class="rpcn-sr"
                   <?= $key === '1m' ? 'checked' : '' ?>>
            <?php endforeach; ?>

            <div class="rpcn-chart-header">
                <div class="rpcn-chart-heading">
                    <span class="rpcn-chart-title">Player Count History</span>
                    <span class="rpcn-chart-timezone" title="All chart timestamps are UTC">UTC</span>
                </div>
                <div class="rpcn-range-btns">
                    <?php foreach ($chartPeriodsMeta as $key => $label): ?>
                    <label for="r-<?= $key ?>" class="rpcn-range-btn"><?= $label ?></label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="rpcn-chart-wrap">
                <?php foreach ($chartSvgs as $key => $svgHtml): ?>
                <div class="rpcn-chart-period" id="cp-<?= $key ?>"><?= $svgHtml ?></div>
                <?php endforeach; ?>
            </div>

        </div><!-- /#panel-charts -->

<?php if ($hasLeaderboard && !empty($boards)): ?>
        <div id="panel-lb" class="rpcn-tab-panel">

<div id="rpcn-board-selection" <?= $nojsBoardId !== null ? 'style="display:none"' : '' ?>>
                <?php if (count($boards) > 1): ?>
                <p class="rpcn-lb-section-title">Choose Scoreboard</p>
                <?php endif; ?>
                <?php foreach ($boardGroups as $group): ?>
                    <?php if ($group->title !== null): ?>
                    <p class="rpcn-lb-section-title"><?= htmlspecialchars($group->title) ?></p>
                    <?php endif; ?>

                    <div class="rpcn-board-grid">
                        <?php foreach ($group->boards as $boardId => $boardName): ?>
                        <a  href="rpcn-game.php?comm_id=<?= urlencode($commId) ?>&amp;board_id=<?= (int)$boardId ?>"
                            class="rpcn-board-btn"
                            data-board-id="<?= (int)$boardId ?>"
                            data-board-name="<?= htmlspecialchars($boardName) ?>">
                            <?= htmlspecialchars($boardName) ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>

<div id="rpcn-board-view" <?= $nojsBoardId !== null ? 'style="display:block"' : '' ?>>
                <?php if (count($boards) > 1): ?>
                <a href="<?= htmlspecialchars($lb_back_url) ?>" class="rpcn-btn-back-lb" id="rpcn-back-lb">&#8592; Back to boards</a>
                <?php endif; ?>
                <div id="rpcn-board-content"><?= $nojsBoardHtml ?></div>
            </div>

        </div><!-- /#panel-lb -->
        <?php endif; ?>
        <?php if ($rpcn_game->hasTrophies): ?>
        <div id="panel-trophies" class="rpcn-tab-panel">
            <form class="rpcn-trophy-language-form" method="get" action="rpcn-game.php">
                <input type="hidden" name="comm_id" value="<?= htmlspecialchars($commId) ?>">
                <input type="hidden" name="tab" value="trophies">
                <label for="rpcn-trophy-language">Language</label>
                <select id="rpcn-trophy-language" name="lang">
                    <?php foreach ($rpcn_game->trophyLanguages as $language): ?>
                        <option value="<?= htmlspecialchars($language) ?>"<?= $rpcn_game->trophyLanguage === $language ? ' selected' : '' ?>><?= htmlspecialchars(RPCNLanguage::label($language)) ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Apply</button>
            </form>
            <?php $trophyGroups = rpcn_group_trophies($rpcn_game->trophies); ?>
            <div class="rpcn-trophy-groups">
                <?php foreach ($trophyGroups as $groupId => $groupTrophies): ?>
                <section class="rpcn-trophy-group">
                    <div class="rpcn-trophy-group-heading">
                        <h3><?= htmlspecialchars(rpcn_trophy_group_label($groupId, $rpcn_game->trophyGroups)) ?></h3>
                        <?php $groupDefinition = $rpcn_game->trophyGroups[$groupId] ?? null; $groupTotal = $groupDefinition !== null ? $groupDefinition->definedTrophies->total() : count($groupTrophies); ?>
                        <span><?= number_format($groupTotal) ?> trophies</span>
                    </div>
                    <div class="rpcn-trophy-list">
                        <?php foreach ($groupTrophies as $t): ?>
                            <?php
                            $trophyGrade = rpcn_trophy_grade($t->type);
                            $trophyGradeIcon = '/img/icons/rpcn/' . $trophyGrade . '.png';
                            ?>
                            <?php if ($t->hidden): ?>
                            <details class="rpcn-trophy-item rpcn-trophy-item-hidden">
                                <summary class="rpcn-trophy-hidden-summary">
                                    <span class="rpcn-trophy-hidden-placeholder" aria-hidden="true">
                                        <img src="/img/icons/rpcn/unknown.png" alt="">
                                    </span>
                                    <span class="rpcn-trophy-hidden-copy">
                                        <strong class="rpcn-trophy-hidden-closed">Hidden trophy. Click to reveal.</strong>
                                        <strong class="rpcn-trophy-hidden-open">Hide trophy details</strong>
                                    </span>
                                </summary>
                                <div class="rpcn-trophy-hidden-content">
                                    <img class="rpcn-trophy-icon" src="<?= htmlspecialchars($t->icon) ?>" alt="Trophy Icon" loading="lazy" decoding="async" onerror="this.src='<?= htmlspecialchars($defaultIcon) ?>'">
                                    <div class="rpcn-trophy-info">
                                        <div class="rpcn-trophy-name">
                                            <?= htmlspecialchars($t->name) ?>
                                            <?php if ($t->onlineOnly): ?>
                                                <span class="rpcn-trophy-online-only" title="Online-only trophy" aria-label="Online-only trophy">
                                                    <img src="/img/icons/compat/online.png" alt="" aria-hidden="true">
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="rpcn-trophy-desc"><?= htmlspecialchars($t->detail) ?></div>
                                        <div class="rpcn-trophy-stats">
                                            <span style="color: <?= htmlspecialchars($t->rarityColor) ?>"><?= htmlspecialchars($t->rarity) ?></span>
                                            <span style="color: var(--rpcn-subtle)"><?= number_format($t->percentage, 1) ?>%</span>
                                        </div>
                                    </div>
                                    <div class="rpcn-trophy-type rpcn-type-<?= htmlspecialchars($trophyGrade) ?>" title="<?= ucfirst(htmlspecialchars($trophyGrade)) ?>">
                                        <img class="rpcn-trophy-grade-icon" src="<?= htmlspecialchars($trophyGradeIcon) ?>" alt="" loading="lazy" decoding="async">
                                    </div>
                                </div>
                            </details>
                            <?php else: ?>
                            <div class="rpcn-trophy-item">
                                <img class="rpcn-trophy-icon" src="<?= htmlspecialchars($t->icon) ?>" alt="Trophy Icon" loading="lazy" decoding="async" onerror="this.src='<?= htmlspecialchars($defaultIcon) ?>'">
                                <div class="rpcn-trophy-info">
                                    <div class="rpcn-trophy-name">
                                        <?= htmlspecialchars($t->name) ?>
                                        <?php if ($t->onlineOnly): ?>
                                            <span class="rpcn-trophy-online-only" title="Online-only trophy" aria-label="Online-only trophy">
                                                <img src="/img/icons/compat/online.png" alt="" aria-hidden="true">
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="rpcn-trophy-desc"><?= htmlspecialchars($t->detail) ?></div>
                                    <div class="rpcn-trophy-stats">
                                        <span style="color: <?= htmlspecialchars($t->rarityColor) ?>"><?= htmlspecialchars($t->rarity) ?></span>
                                        <span style="color: var(--rpcn-subtle)"><?= number_format($t->percentage, 1) ?>%</span>
                                    </div>
                                </div>
                                <div class="rpcn-trophy-type rpcn-type-<?= htmlspecialchars($trophyGrade) ?>" title="<?= ucfirst(htmlspecialchars($trophyGrade)) ?>">
                                    <img class="rpcn-trophy-grade-icon" src="<?= htmlspecialchars($trophyGradeIcon) ?>" alt="" loading="lazy" decoding="async">
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </section>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div><!-- /.rpcn-tab-panels -->

</div><!-- /.rpcn-page-wrap -->

<script>
(function ()
{
    document.documentElement.classList.add('js-ready');

    const commId    = <?= json_encode($commId) ?>;
    const autoBoard = <?= json_encode($autoShowBoard) ?>;
    const selection = document.getElementById('rpcn-board-selection');
    const view      = document.getElementById('rpcn-board-view');
    const content   = document.getElementById('rpcn-board-content');
    const backBtn   = document.getElementById('rpcn-back-lb');

    if (!selection || !view || !content) return;

    function loadBoard(boardId)
    {
        selection.style.display = 'none';
        view.style.display      = 'block';
        content.innerHTML       = '<div class="rpcn-lb-loading">Loading scores</div>';

        var phpUrl = 'rpcn-game.php?comm_id=' + encodeURIComponent(commId) + '&board_id=' + encodeURIComponent(boardId);

        fetch('rpcn-game.php?comm_id=' + encodeURIComponent(commId) + '&ajax=1&board_id=' + encodeURIComponent(boardId))
            .then(function (r)
            {
                if (!r.ok) throw new Error('HTTP ' + r.status);
                return r.text();
            })
            .then(function (html)
            {
                content.innerHTML = html;
                if (history.replaceState)
                {
                    history.replaceState(null, '', phpUrl);
                }
            })
            .catch(function ()
            {
                window.location.href = phpUrl;
            });
    }

    document.querySelectorAll('.rpcn-board-btn').forEach(function (btn)
    {
        btn.addEventListener('click', function (e)
        {
            e.preventDefault();
            loadBoard(btn.dataset.boardId);
        });
    });

    if (backBtn) {
        backBtn.addEventListener('click', function (e)
        {
            e.preventDefault();
            if (history.replaceState)
            {
                history.replaceState(null, '', 'rpcn-game.php?comm_id=' + encodeURIComponent(commId) + '&tab=lb');
            }
            view.style.display      = 'none';
            content.innerHTML       = '';
            selection.style.display = 'block';
        });
    }

    if (autoBoard !== null)
    {
        var tabLb = document.getElementById('tab-lb');
        if (tabLb)
        {
            var loaded = content.innerHTML.trim() !== '';
            tabLb.addEventListener('change', function ()
            {
                if (!loaded) { loaded = true; loadBoard(autoBoard); }
            });
        }
    }
})();
</script>
</body>
</html>