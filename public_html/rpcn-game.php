<?php
require_once 'lib/module/rpcn/config.php';
require_once 'lib/module/rpcn/inc-rpcn-stats.php';
require_once 'lib/module/rpcn/inc-rpcn-game.php';

function rpcn_filter_range(array $data, string $period): array
{
    if ($period === '1y') return $data;
    $hoursMap = ['48h' => 48, '1w' => 168, '1m' => 720, '3m' => 2160, '6m' => 4320];
    $hours    = $hoursMap[$period] ?? 0;
    if ($hours === 0) return $data;
    $cutoff   = time() - $hours * 3600;
    return array_values(array_filter($data, static fn($d) => strtotime($d['x']) >= $cutoff));
}

function rpcn_aggregate_monthly(array $data): array
{
    $months = [];
    foreach ($data as $d)
    {
        $key = substr($d['x'], 0, 7); // YYYY-MM
        if (!isset($months[$key]) || (int)$d['y'] > $months[$key])
            $months[$key] = (int)$d['y'];
    }
    ksort($months);
    $out = [];
    foreach ($months as $k => $v) $out[] = ['x' => $k, 'y' => $v];
    return $out;
}

function rpcn_x_label(string $xStr, string $period): string
{
    static $M = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    if ($period === 'max')
    {
        [$y, $m] = explode('-', $xStr);
        return $M[(int)$m - 1] . ' ' . $y;
    }
    $ts = strtotime($xStr);
    $lbl = $M[(int)date('n', $ts) - 1] . ' ' . (int)date('j', $ts);
    if ($period === '48h') $lbl .= ' ' . date('H:i', $ts);
    return $lbl;
}

function rpcn_tooltip_date(string $xStr, string $period): string
{
    static $M = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    if ($period === 'max')
    {
        [$y, $m] = explode('-', $xStr);
        return $M[(int)$m - 1] . ' ' . $y;
    }
    $ts   = strtotime($xStr);
    $base = $M[(int)date('n', $ts) - 1] . ' ' . (int)date('j', $ts) . ', ' . date('Y', $ts);
    if ($period === '48h' || $period === '1w') $base .= ' ' . date('H:i', $ts);
    return $base;
}

function rpcn_build_svg(array $data, string $gradId, string $period = '1m'): string
{
    if (empty($data))
        return '<p class="rpcn-chart-empty">No data available for this period.</p>';

    $W = 860; $H = 280;
    $pL = 54; $pR = 14; $pT = 16; $pB = 38;
    $iW = $W - $pL - $pR;
    $iH = $H - $pT - $pB;
    $n  = count($data);

    $rawMax = (float)max(array_column($data, 'y'));
    if ($rawMax <= 0) $rawMax = 1;
    $magnitude = pow(10, max(0, floor(log10($rawMax))));
    $niceMax   = (float)(ceil(($rawMax * 1.08) / $magnitude) * $magnitude);
    if ($niceMax <= 0) $niceMax = 1;

    // Pixel coordinates
    $coords = [];
    foreach ($data as $i => $d)
    {
        $px       = (float)($pL + ($n > 1 ? ($i / ($n - 1)) * $iW : $iW / 2));
        $ratio    = max(0.0, min(1.0, (float)$d['y'] / $niceMax));
        $py       = (float)($pT + $iH - $ratio * $iH);
        $coords[] = [$px, $py, (string)$d['x'], (int)$d['y']];
    }

    // Y grid + labels
    $gridOut = ''; $yLblOut = '';
    for ($t = 0; $t <= 4; $t++)
    {
        $val = (int)round($niceMax * $t / 4);
        $cy  = (float)($pT + $iH - ($t / 4) * $iH);
        $gridOut  .= sprintf('<line x1="%d" y1="%.1f" x2="%d" y2="%.1f" class="rpcn-sg"/>',
            $pL, $cy, $W - $pR, $cy);
        $yLblOut  .= sprintf('<text x="%d" y="%.1f" class="rpcn-st rpcn-sty">%s</text>',
            $pL - 6, $cy + 4, number_format($val));
    }

    // X labels
    $step = match($period) {
        'max'       => max(1, (int)ceil($n / 9)),
        '1y'        => 7,
        '6m', '3m'  => max(1, (int)ceil($n / 8)),
        default     => max(1, (int)ceil($n / 7)),
    };
    $xLblOut = '';
    for ($i = 0; $i < $n; $i += $step)
    {
        [$px, , $xs] = $coords[$i];
        $xLblOut .= sprintf('<text x="%.1f" y="%d" class="rpcn-st rpcn-stx">%s</text>',
            $px, $H - 8, htmlspecialchars(rpcn_x_label($xs, $period)));
    }

    // Line + fill
    $ptStr   = implode(' ', array_map(static fn($c) => sprintf('%.1f,%.1f', $c[0], $c[1]), $coords));
    $fillStr = sprintf('%.1f,%.1f ', $coords[0][0], $pT + $iH) . $ptStr
             . sprintf(' %.1f,%.1f', $coords[$n - 1][0], $pT + $iH);

    // Interactive data points: wide transparent hit area + vline + dot + tooltip
    $hitW    = (int)max(6, $n > 1 ? ceil($iW / ($n - 1)) : $iW);
    $ttW     = 152; $ttH = 42;
    $dotsOut = '';

    foreach ($coords as [$px, $py, $xs, $yv])
    {
        $tipDate = rpcn_tooltip_date($xs, $period);
        $tipVal  = number_format($yv) . ' player' . ($yv !== 1 ? 's' : '');

        // Clamp tooltip horizontally
        $ttX = max((float)$pL, min($px - $ttW / 2, (float)($W - $pR - $ttW)));
        // Tooltip above dot; flip below if too close to top
        $ttY = ($py - 12 - $ttH >= $pT) ? $py - 12 - $ttH : $py + 12;

        $dotsOut .=
            '<g class="rpcn-dp">'
            // Hit zone: full height at this x
            . sprintf('<rect x="%.1f" y="%d" width="%d" height="%d" class="rpcn-dp-hit"/>',
                $px - $hitW / 2, $pT, $hitW, $iH + 4)
            // Vertical dashed guide
            . sprintf('<line x1="%.1f" y1="%d" x2="%.1f" y2="%d" class="rpcn-dp-vline"/>',
                $px, $pT, $px, $pT + $iH)
            // Dot
            . sprintf('<circle cx="%.1f" cy="%.1f" r="4" class="rpcn-dp-dot"/>', $px, $py)
            // Tooltip
            . sprintf('<g class="rpcn-dp-tt" transform="translate(%.1f,%.1f)">', $ttX, $ttY)
            .   sprintf('<rect x="0" y="0" width="%d" height="%d" rx="5" class="rpcn-tt-bg"/>', $ttW, $ttH)
            .   sprintf('<text x="%d" y="15" class="rpcn-tt-date">%s</text>', $ttW / 2, htmlspecialchars($tipDate))
            .   sprintf('<text x="%d" y="31" class="rpcn-tt-val">%s</text>',  $ttW / 2, htmlspecialchars($tipVal))
            . '</g>'
            . '</g>';
    }

    $gid = htmlspecialchars($gradId);
    $out  = '<svg viewBox="0 0 ' . $W . ' ' . $H . '" class="rpcn-svg-chart"'
          . ' xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Player count chart">';
    $out .= '<defs><linearGradient id="' . $gid . '" x1="0" y1="0" x2="0" y2="1">'
          . '<stop offset="0%" stop-color="rgba(104,109,224,.30)"/>'
          . '<stop offset="100%" stop-color="rgba(104,109,224,.02)"/>'
          . '</linearGradient></defs>';
    $out .= $gridOut;
    $out .= '<polygon points="' . $fillStr . '" fill="url(#' . $gid . ')"/>';
    $out .= '<polyline points="' . $ptStr . '" class="rpcn-sl" fill="none"/>';
    $out .= $dotsOut . $xLblOut . $yLblOut;
    $out .= '</svg>';
    return $out;
}

//  Pre-compute all chart ranges
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
    }
    $chartSvgs[$key] = rpcn_build_svg($source, 'rpcn-grad-' . $key, $key);
}

// Leaderboard boards
$autoShowBoard = ($hasLeaderboard && !empty($boards) && count($boards) === 1)
    ? (int)array_key_first($boards)
    : null;

// nojs leaderboard
$lb_back_url   = 'rpcn-game.php?comm_id=' . urlencode($commId) . '&tab=lb';
$nojsBoardId   = null;
$nojsBoardHtml = '';

$show_trophies_tab = $rpcn_game->hasTrophies && ($_GET['tab'] ?? '') === 'trophies';
$show_lb_tab = $hasLeaderboard && (isset($_GET['board_id']) || ($_GET['tab'] ?? '') === 'lb');
if ($hasLeaderboard && !empty($boards) && isset($_GET['board_id']))
{
    $bid = (int)$_GET['board_id'];
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
    <title><?= htmlspecialchars($gameTitle) ?> – RPCN Stats</title>
    <style>
        :root {
			--rpcn-bg: #111525;
			--rpcn-text: #fff;
			--rpcn-text-strong: #fff;
			--rpcn-accent: #686DE0;
			--rpcn-accent-dim: #686DE0;
			--rpcn-accent-bg: rgb(255 255 255 / 10%);
			--rpcn-accent-bg-hover: rgb(255 255 255 / 10%);
			--rpcn-accent-border: rgb(255 255 255 / 10%);
			--rpcn-muted: #ffffff;
			--rpcn-subtle: rgb(255 255 255 / 50%);
			--rpcn-border: rgb(255 255 255 / 10%);
			--rpcn-border-faint: rgba(255, 255, 255, .04);
			--rpcn-surface: #191f36;
			--rpcn-surface-dark: rgba(0, 0, 0, .2);
			--rpcn-online: #686DE0;
			--rpcn-gold: #ffd166;
			--rpcn-silver: #ffffff;
			--rpcn-bronze: #cd7f32;
			--rpcn-error-bg: rgba(230, 57, 70, .1);
			--rpcn-error-border: rgb(255 0 19);
			--rpcn-error-text: #ff0000;
			--rpcn-radius-sm: 8px;
			--rpcn-radius: 16px;
			--rpcn-radius-lg: 10px;
			--rpcn-page-width: 1200px;
			--rpcn-font: 'Segoe UI', 'Roboto', sans-serif;
			--rpcn-font-mono: 'Consolas', monospace;
			--rpcn-font-size: 14px;
			--rpcn-pic1-url: <?= $gamePic1 !== '' ? 'url(' . htmlspecialchars($gamePic1, ENT_QUOTES) . ')' : 'none' ?>;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body {
    background: var(--rpcn-bg);
    color:       var(--rpcn-text);
    font-family: var(--rpcn-font);
    font-size:   var(--rpcn-font-size);
    line-height: 1.6;
    min-height:  100vh;
    position:    relative;
}

body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: var(--rpcn-pic1-url);
    background-size: cover;
    background-position: center;
    filter: blur(10px);
    z-index: -1;
    pointer-events: none;
    transform: scale(1.1);
}

        .rpcn-page-wrap {
            max-width: var(--rpcn-page-width);
            margin:    0 auto;
            padding:   30px 16px 60px;
			font-family: Roboto-Regular;
        }

        /*  Hide all radio/checkbox helpers  */
        .rpcn-sr { display: none; }

        /* Back link */
        .rpcn-back-link {
            display:         inline-flex;
            align-items:     center;
            gap:             6px;
            color:           var(--rpcn-accent-dim);
            font-size:       .8rem;
            font-weight:     600;
            text-transform:  uppercase;
            letter-spacing:  .5px;
            text-decoration: none;
            margin-bottom:   22px;
        }
        .rpcn-back-link:hover { color: var(--rpcn-accent); }

        /* Game header */
        .rpcn-game {
            display:       flex;
            gap:           24px;
            align-items:   flex-start;
            margin-bottom: 28px;
        }
        .rpcn-game-icon-wrap { flex-shrink: 0; }
        .rpcn-game-icon {
			width: 342px;
			height: 188px;
			object-fit: cover;
			display: block;
			border-radius: 16px;
			box-shadow: rgb(0 0 0 / 10%) 0 10px 32px 0;
			border: solid 1px rgb(255 255 255 / 10%);
        }
        .rpcn-game-icon-fallback {
            width:           280px;
            height:          154px;
            background:      var(--rpcn-surface);
            border:          1px solid var(--rpcn-border);
            border-radius:   var(--rpcn-radius);
            display:         flex;
            align-items:     center;
            justify-content: center;
            color:           var(--rpcn-subtle);
            font-size:       .8rem;
            letter-spacing:  .5px;
        }
        .rpcn-game-info {
            flex:           1;
            min-width:      0;
            display:        flex;
            flex-direction: column;
            gap:            16px;
        }
        .rpcn-game-title {
            font-size:   1.65rem;
            font-weight: 700;
            color:       var(--rpcn-text-strong);
            line-height: 1.3;
        }
        .rpcn-game-meta {
            display:    flex;
            align-items: center;
            gap:        10px;
            flex-wrap:  wrap;
            margin-top: -8px;
        }
        .rpcn-region-badge {
            display:       inline-flex;
            align-items:   center;
            font-size:     11px;
            padding:       2px 8px;
            border-radius: 20px;
            background:    var(--rpcn-accent-bg);
            border:        1px solid var(--rpcn-accent-border);
            color:         #a0e4e0;
            white-space:   nowrap;
        }

        /* Stats grid */
        .rpcn-stats-grid {
            display:               grid;
            grid-template-columns: repeat(3, 1fr);
            gap:                   12px;
        }
        .rpcn-stat-card {
            background:    var(--rpcn-surface);
            border:        1px solid var(--rpcn-border);
            border-radius: var(--rpcn-radius);
            padding:       16px 18px;
            text-align:    center;
            transition:    border-color .2s;
			box-shadow: rgb(0 0 0 / 10%) 0 10px 32px 0;
        }
        .rpcn-stat-card:hover { border-color: var(--rpcn-accent-border); }
        .rpcn-stat-label {
            font-size:      .68rem;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color:          var(--rpcn-muted);
            margin-bottom:  6px;
        }
        .rpcn-stat-value {
            font-size:   2rem;
            font-weight: 800;
            color:       var(--rpcn-accent);
            line-height: 1;
            display:     block;
        }
        .rpcn-stat-value.rpcn-stat-online { color: var(--rpcn-online); }
        .rpcn-stat-sub { font-size: .7rem; color: var(--rpcn-subtle); margin-top: 4px; }

        /* Tabs */
        .rpcn-tabs-nav {
            display:       flex;
            gap:           2px;
            border-bottom: 1px solid var(--rpcn-border);
            margin:        28px 0 0;
        }
        .rpcn-tab-btn {
            background:     transparent;
            border:         none;
            border-bottom:  2px solid transparent;
            color:          var(--rpcn-subtle);
            font-size:      .85rem;
            font-weight:    600;
            text-transform: uppercase;
            letter-spacing: .8px;
            padding:        10px 20px;
            cursor:         pointer;
            transition:     all .15s;
            font-family:    inherit;
            margin-bottom:  -1px;
            user-select:    none;
        }
        .rpcn-tab-btn:hover { color: #a0aec0; }

        /* Active tab state via checked radio */
        #tab-charts:checked ~ .rpcn-tabs-nav label[for="tab-charts"],
        #tab-lb:checked     ~ .rpcn-tabs-nav label[for="tab-lb"] {
            color:              var(--rpcn-accent);
            border-bottom-color: var(--rpcn-accent);
        }

        .rpcn-tab-panels { }
        .rpcn-tab-panel {
			display: none;
			background: rgba(255, 255, 255, .02);
			border: 1px solid rgba(255, 255, 255, .07);
			border-radius: 16px;
			padding: 22px;
			margin-top: 30px;
			box-shadow: rgb(0 0 0 / 10%) 0 10px 32px 0;
        }

        /* Show the correct panel */
        #tab-charts:checked ~ .rpcn-tab-panels #panel-charts { display: block; }
        #tab-lb:checked     ~ .rpcn-tab-panels #panel-lb     { display: block; }

        /* Chart range switcher */
        .rpcn-chart-header {
            display:         flex;
            justify-content: space-between;
            align-items:     center;
            margin-bottom:   16px;
            flex-wrap:       wrap;
            gap:             10px;
        }
        .rpcn-chart-title {
            font-size:      .78rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color:          var(--rpcn-muted);
        }
        .rpcn-range-btns { display: flex; gap: 4px; flex-wrap: wrap; }
        .rpcn-range-btn {
            background:    transparent;
            border:        1px solid var(--rpcn-border);
            color:         var(--rpcn-muted);
            font-size:     .72rem;
            font-weight:   600;
            padding:       4px 10px;
            border-radius: var(--rpcn-radius-sm);
            cursor:        pointer;
            transition:    all .15s;
            font-family:   inherit;
            user-select:   none;
        }
        .rpcn-range-btn:hover { border-color: var(--rpcn-accent); color: var(--rpcn-accent); }

        /* Active range button */
        <?php foreach (array_keys($chartPeriodsMeta) as $key): ?>
        #r-<?= $key ?>:checked ~ .rpcn-chart-header label[for="r-<?= $key ?>"] {
            background:   var(--rpcn-accent-bg-hover);
            border-color: var(--rpcn-accent);
            color:        var(--rpcn-accent);
        }
        <?php endforeach; ?>

        .rpcn-chart-wrap {
            position:      relative;
            background:    var(--rpcn-surface-dark);
            border:        1px solid var(--rpcn-border-faint);
            border-radius: var(--rpcn-radius);
            padding:       12px;
            overflow:      hidden;
        }

        .rpcn-chart-period { display: none; }
        <?php foreach (array_keys($chartPeriodsMeta) as $key): ?>
        #r-<?= $key ?>:checked ~ .rpcn-chart-wrap #cp-<?= $key ?> { display: block; }
        <?php endforeach; ?>

        /*  SVG chart  */
        .rpcn-svg-chart {
            width:    100%;
            height:   260px;
            display:  block;
            overflow: visible;
        }
        .rpcn-sg { stroke: rgba(255,255,255,.05); stroke-width: 1; fill: none; }
        .rpcn-sl { stroke: #686DE0; stroke-width: 2; }
        .rpcn-st {
            fill:        rgba(255,255,255,.38);
            font-size:   10px;
            font-family: 'Consolas', monospace;
        }
        .rpcn-sty { text-anchor: end;    dominant-baseline: middle; }
        .rpcn-stx { text-anchor: middle; dominant-baseline: auto; }

        /* Interactive hover points */
        .rpcn-dp-hit   { fill: transparent; pointer-events: all; cursor: crosshair; }
        .rpcn-dp-vline { stroke: rgba(255,255,255,.18); stroke-width: 1;
                         stroke-dasharray: 3 3; visibility: hidden; }
        .rpcn-dp-dot   { fill: #686DE0; stroke: var(--rpcn-bg); stroke-width: 2;
                         visibility: hidden; }
        .rpcn-dp-tt    { visibility: hidden; pointer-events: none; }
        .rpcn-tt-bg    { fill: #151d3b; stroke: rgba(104,109,224,.65); stroke-width: 1; }
        .rpcn-tt-date  { fill: rgba(255,255,255,.55); font-size: 10px;
                         font-family: 'Consolas', monospace; text-anchor: middle; }
        .rpcn-tt-val   { fill: #a0a8ff; font-size: 11.5px; font-weight: 700;
                         font-family: 'Consolas', monospace; text-anchor: middle; }
        .rpcn-dp:hover .rpcn-dp-vline,
        .rpcn-dp:hover .rpcn-dp-dot,
        .rpcn-dp:hover .rpcn-dp-tt { visibility: visible; }
        .rpcn-chart-empty {
            color:      var(--rpcn-subtle);
            font-size:  .85rem;
            font-style: italic;
            text-align: center;
            padding:    80px 0;
        }

        /*  Leaderboard */
        .rpcn-lb-section-title {
            font-size:      .7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color:          var(--rpcn-subtle);
            margin-bottom:  12px;
            padding-bottom: 5px;
            border-bottom:  1px solid var(--rpcn-border-faint);
        }
        .rpcn-board-grid {
            display:               grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap:                   8px;
            margin-bottom:         20px;
        }
        .rpcn-board-btn {
            background:    var(--rpcn-surface);
            border:        1px solid var(--rpcn-border);
            color:         #a0aec0;
            padding:       12px 14px;
            border-radius: var(--rpcn-radius-sm);
            text-align:    left;
            cursor:        pointer;
            font-size:     .8rem;
            font-family:   inherit;
            font-weight:   600;
            display:       flex;
            align-items:   center;
            gap:           8px;
            transition:    all .15s;
            user-select:   none;
            text-decoration: none;
        }
        .rpcn-board-btn:hover {
            background:   var(--rpcn-accent-bg);
            border-color: var(--rpcn-accent);
            color:        var(--rpcn-accent);
            transform:    translateY(-1px);
        }

        /* Board selection & view panes */
        #rpcn-board-view { display: none; }

        .rpcn-btn-back-lb {
            display:       inline-flex;
            align-items:   center;
            gap:           6px;
            background:    transparent;
            border:        1px solid var(--rpcn-border);
            color:         var(--rpcn-muted);
            padding:       6px 16px;
            border-radius: var(--rpcn-radius-sm);
            font-size:     .8rem;
            cursor:        pointer;
            margin-bottom: 16px;
            transition:    color .2s, border-color .2s;
            font-family:   inherit;
            user-select:   none;
            text-decoration: none;
        }
        .rpcn-btn-back-lb:hover { color: var(--rpcn-accent); border-color: var(--rpcn-accent); }

        /*  Leaderboard table  */
        .rpcn-lb-board-name {
            color:         var(--rpcn-accent);
            font-size:     1.05rem;
            font-weight:   700;
            margin-bottom: 16px;
        }
        .rpcn-lb-table-wrap { overflow-x: auto; border-radius: var(--rpcn-radius-sm); }
        .rpcn-lb-table { width: 100%; border-collapse: collapse; font-size: .88rem; }
        .rpcn-lb-table thead tr { background: var(--rpcn-surface); }
        .rpcn-lb-th {
            text-align:     left;
            padding:        10px 14px;
            font-size:      .68rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color:          var(--rpcn-subtle);
            font-weight:    700;
            border-bottom:  1px solid var(--rpcn-border-faint);
            white-space:    nowrap;
        }
        .rpcn-lb-th-rank  { width: 60px; text-align: center; }
        .rpcn-lb-th-score { text-align: center; }
        .rpcn-lb-table td {
            padding:       11px 14px;
            border-bottom: 1px solid var(--rpcn-border-faint);
            color:         var(--rpcn-text);
        }
        .rpcn-lb-table tbody tr:hover td      { background: rgba(102,252,241,.03); }
        .rpcn-lb-table tbody tr:last-child td { border-bottom: none; }
        .rpcn-lb-rank { color: var(--rpcn-subtle); width: 60px; text-align: center; font-size: .85rem; font-weight: 700; }
        .rpcn-lb-row-gold   .rpcn-lb-rank { color: var(--rpcn-gold); }
        .rpcn-lb-row-silver .rpcn-lb-rank { color: var(--rpcn-silver); }
        .rpcn-lb-row-bronze .rpcn-lb-rank { color: var(--rpcn-bronze); }
        .rpcn-lb-player { font-weight: 600; }
        .rpcn-lb-score  { font-family: var(--rpcn-font-mono); color: var(--rpcn-accent); font-weight: 700; text-align: center; }
        .rpcn-error {
            background:    var(--rpcn-error-bg);
            border:        1px solid var(--rpcn-error-border);
            color:         var(--rpcn-error-text);
            padding:       14px 18px;
            border-radius: var(--rpcn-radius-sm);
            font-size:     .88rem;
        }
        .rpcn-no-scores { color: var(--rpcn-subtle); padding: 20px 0; text-align: center; font-style: italic; }

        /* Loading spinner */
        .rpcn-lb-loading {
            display:         flex;
            align-items:     center;
            justify-content: center;
            gap:             10px;
            padding:         50px 0;
            color:           var(--rpcn-muted);
            font-size:       .88rem;
        }
        .rpcn-lb-loading::before {
            content:      '';
            width:        18px;
            height:       18px;
            border:       2px solid var(--rpcn-border);
            border-top:   2px solid var(--rpcn-accent);
            border-radius: 50%;
            animation:    rpcn-spin .7s linear infinite;
            flex-shrink:  0;
        }
        @keyframes rpcn-spin { to { transform: rotate(360deg); } }

        @media (max-width: 640px) {
            .rpcn-game { flex-direction: column; }
            .rpcn-game-icon,
            .rpcn-game-icon-fallback { width: 100%; height: auto; aspect-ratio: 16 / 9; }
            .rpcn-stat-value { font-size: 1.6rem; }
        }
        @media (max-width: 480px) {
            .rpcn-stats-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
<div class="rpcn-page-wrap">

    <a href="<?= htmlspecialchars($back_link_url) ?>" class="rpcn-back-link">Back to RPCN Browser</a>

    <!--  Game header  -->
    <div class="rpcn-game">
        <div class="rpcn-game-icon-wrap">
            <img src="<?= htmlspecialchars($gameIcon) ?>"
                 alt="Game Icon"
                 class="rpcn-game-icon"
                 onerror="this.src='<?= htmlspecialchars($defaultIcon) ?>'">
        </div>

        <div class="rpcn-game-info">
            <div class="rpcn-game-title"><?= htmlspecialchars($gameTitle) ?></div>

            <div class="rpcn-game-meta">
                <?php foreach ($regions as $r): ?>
                    <span class="rpcn-region-badge">
                        <img src="/img/icons/compat/<?= strtoupper(htmlspecialchars($r)) ?>.png"
                             alt="<?= htmlspecialchars($r) ?>"
                             style="height:12px;margin-right:5px;vertical-align:middle">
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
            <label for="tab-trophies" class="rpcn-tab-btn">Trophies (<?= $rpcn_game->totalTrophies ?>)</label>
        <?php endif; ?>
    </div>

    <div class="rpcn-tab-panels">

        <!--Charts tab-->
        <div id="panel-charts" class="rpcn-tab-panel">

            <?php foreach (array_keys($chartPeriodsMeta) as $key): ?>
            <input type="radio" name="rpcn-range" id="r-<?= $key ?>" class="rpcn-sr"
                   <?= $key === '1m' ? 'checked' : '' ?>>
            <?php endforeach; ?>

            <div class="rpcn-chart-header">
                <span class="rpcn-chart-title">Player Count History</span>
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

        <!-- Leaderboards tab -->
        <?php if ($hasLeaderboard && !empty($boards)): ?>
        <div id="panel-lb" class="rpcn-tab-panel">

            <!-- Board selection grid -->
            <div id="rpcn-board-selection" <?= $nojsBoardId !== null ? 'style="display:none"' : '' ?>>
                <?php if (count($boards) > 1): ?>
                <p class="rpcn-lb-section-title">Choose Scoreboard</p>
                <?php endif; ?>
                <div class="rpcn-board-grid">
                    <?php foreach ($boards as $boardId => $boardName): ?>
                    <a  href="rpcn-game.php?comm_id=<?= urlencode($commId) ?>&amp;board_id=<?= (int)$boardId ?>"
                        class="rpcn-board-btn"
                        data-board-id="<?= (int)$boardId ?>"
                        data-board-name="<?= htmlspecialchars($boardName) ?>">
                        <?= htmlspecialchars($boardName) ?>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Board content pane (shown after a board is selected) -->
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
            <div class="rpcn-trophy-list">
                <?php foreach ($rpcn_game->trophies as $t): ?>
                <div class="rpcn-trophy-item">
                    <img class="rpcn-trophy-icon" src="<?= htmlspecialchars($t['icon']) ?>" alt="Trophy Icon" onerror="this.src='<?= htmlspecialchars($default_icon) ?>'">
                    <div class="rpcn-trophy-info">
                        <div class="rpcn-trophy-name">
                            <?= htmlspecialchars($t['name']) ?>
                            <?php if ($t['hidden']): ?>
                                <span class="rpcn-trophy-hidden">Hidden</span>
                            <?php endif; ?>
                        </div>
                        <div class="rpcn-trophy-desc"><?= htmlspecialchars($t['detail']) ?></div>
                        <div class="rpcn-trophy-stats">
                            <span style="color: <?= $t['rarityColor'] ?>"><?= $t['rarity'] ?></span>
                            <span style="color: var(--rpcn-subtle)"><?= number_format($t['percentage'], 1) ?>%</span>
                        </div>
                    </div>
                    <div class="rpcn-trophy-type rpcn-type-<?= htmlspecialchars($t['type']) ?>" title="<?= ucfirst(htmlspecialchars($t['type'])) ?>">
                        <svg viewBox="0 0 24 24"><path d="M20.2,4.6C19.7,4.2,19.1,4,18.5,4H18V3c0-0.6-0.4-1-1-1H7C6.4,2,6,2.4,6,3v1H5.5C4.9,4,4.3,4.2,3.8,4.6 C3.4,5,3,5.6,3,6.2V8c0,2.3,1.4,4.2,3.5,4.8C7.1,14.6,8.4,16,10,16.8V19H8c-0.6,0-1,0.4-1,1v1c0,0.6,0.4,1,1,1h8c0.6,0,1-0.4,1-1v-1 c0-0.6-0.4-1-1-1h-2v-2.2c1.6-0.8,2.9-2.2,3.5-4C19.6,12.2,21,10.3,21,8V6.2C21,5.6,20.6,5,20.2,4.6z M5,8V6.2C5,6.1,5.1,5.9,5.2,5.9 C5.3,5.8,5.4,5.8,5.5,5.8H6v4.4C5.4,9.9,5,9,5,8z M19,8c0,1-0.4,1.9-1,2.3V5.8h0.5c0.1,0,0.2,0,0.3,0.1C18.9,5.9,19,6.1,19,6.2V8z"/></svg>
                    </div>
                </div>
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

    // Back button
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

    // Autoload when there is only one board
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