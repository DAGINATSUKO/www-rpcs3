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

function rpcn_build_svg(array $data, string $gradId): string
{
    if (empty($data)) {
        return '<p class="rpcn-chart-empty">No data available for this period.</p>';
    }

    $W = 860; $H = 276;
    $pL = 50; $pR = 12; $pT = 12; $pB = 32;
    $iW = $W - $pL - $pR;
    $iH = $H - $pT - $pB;
    $n  = count($data);

    $rawMax = (float)max(array_column($data, 'y'));
    if ($rawMax <= 0) $rawMax = 1;

    // Round ceiling
    $magnitude = pow(10, max(0, floor(log10($rawMax))));
    $niceMax   = (float)(ceil(($rawMax * 1.08) / $magnitude) * $magnitude);
    if ($niceMax <= 0) $niceMax = 1;

    // Pixel coordinates
    $coords = [];
    foreach ($data as $i => $d) {
        $px       = (float)($pL + ($n > 1 ? ($i / ($n - 1)) * $iW : $iW / 2));
        $ratio    = max(0.0, min(1.0, (float)$d['y'] / $niceMax));
        $py       = (float)($pT + $iH - $ratio * $iH);
        $coords[] = [$px, $py, (string)$d['x'], (int)$d['y']];
    }

    // Y grid + labels
    $gridOut = ''; $yLblOut = '';
    for ($t = 0; $t <= 4; $t++) {
        $val  = (int)round($niceMax * $t / 4);
        $cy   = (float)($pT + $iH - ($t / 4) * $iH);
        $gridOut .= sprintf(
            '<line x1="%d" y1="%.0f" x2="%d" y2="%.0f" class="rpcn-sg"/>',
            $pL, $cy, $W - $pR, $cy
        );
        $yLblOut .= sprintf(
            '<text x="%d" y="%.0f" class="rpcn-st rpcn-sty">%s</text>',
            $pL - 5, $cy + 4, number_format($val)
        );
    }

    // X labels
    $xLblOut = '';
    $step    = max(1, (int)round($n / 7));
    for ($i = 0; $i < $n; $i += $step) {
        [$px, , $xs] = $coords[$i];
        $lbl = substr($xs, 0, 10); // YYYY-MM-DD
        $xLblOut .= sprintf(
            '<text x="%.0f" y="%d" class="rpcn-st rpcn-stx">%s</text>',
            $px, $H - 6, htmlspecialchars($lbl)
        );
    }

    // Polyline & fill polygon
    $ptStr   = implode(' ', array_map(static fn($c) => sprintf('%.1f,%.1f', $c[0], $c[1]), $coords));
    $fillStr = sprintf('%.1f,%.0f ', $coords[0][0], $pT + $iH)
             . $ptStr
             . sprintf(' %.1f,%.0f', $coords[$n - 1][0], $pT + $iH);

    // Data-point circles with native tooltips
    $dotsOut = '';
    if ($n <= 150) {
        foreach ($coords as [$px, $py, $xs, $yv]) {
            $dotsOut .= sprintf(
                '<g class="rpcn-dp"><circle cx="%.1f" cy="%.1f" r="3.5"/>' .
                '<title>%s: %s players</title></g>',
                $px, $py,
                htmlspecialchars(substr($xs, 0, 16)),
                number_format($yv)
            );
        }
    }

    $gid  = htmlspecialchars($gradId);
    $out  = '<svg viewBox="0 0 ' . $W . ' ' . $H . '" class="rpcn-svg-chart"'
          . ' xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Player count chart">';
    $out .= '<defs><linearGradient id="' . $gid . '" x1="0" y1="0" x2="0" y2="1">'
          . '<stop offset="0%"   stop-color="rgba(102,252,241,.28)"/>'
          . '<stop offset="100%" stop-color="rgba(102,252,241,.01)"/>'
          . '</linearGradient></defs>';
    $out .= $gridOut;
    $out .= '<polygon points="' . $fillStr . '" fill="url(#' . $gid . ')"/>';
    $out .= '<polyline points="' . $ptStr . '" class="rpcn-sl" fill="none"/>';
    $out .= $dotsOut . $xLblOut . $yLblOut;
    $out .= '</svg>';
    return $out;
}

//  Pre-compute all chart ranges 
$chartPeriodsMeta = ['48h' => '48H', '1w' => '1W', '1m' => '1M', '3m' => '3M', '6m' => '6M', '1y' => '1Y'];
$chartSvgs        = [];
foreach ($chartPeriodsMeta as $key => $label) {
    $isHourly        = in_array($key, ['48h', '1w'], true);
    $source          = $isHourly ? $chartDataHourly : $chartDataDaily;
    $filtered        = rpcn_filter_range($source, $key);
    $chartSvgs[$key] = rpcn_build_svg($filtered, 'rpcn-grad-' . $key);
}

//  Pre-render leaderboard boards server-side 
$boardContents  = [];
$autoShowBoard  = null;
if ($hasLeaderboard && !empty($boards)) {
    foreach ($boards as $boardId => $boardName) {
        ob_start();
        $rpcn_game->handle_ajax($commId, (string)$boardId);
        $boardContents[(int)$boardId] = ob_get_clean();
    }
    if (count($boards) === 1) {
        $autoShowBoard = (int)array_key_first($boards);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($gameTitle) ?> – RPCN Stats</title>
    <style>
        :root {
            --rpcn-bg:              #0d0f14;
            --rpcn-text:            #c5c6c7;
            --rpcn-text-strong:     #e2e8f0;
            --rpcn-accent:          #66fcf1;
            --rpcn-accent-dim:      #45a29e;
            --rpcn-accent-bg:       rgba(102, 252, 241, .08);
            --rpcn-accent-bg-hover: rgba(102, 252, 241, .12);
            --rpcn-accent-border:   rgba(102, 252, 241, .2);
            --rpcn-muted:           #69707a;
            --rpcn-subtle:          #4a5568;
            --rpcn-border:          rgba(255, 255, 255, .08);
            --rpcn-border-faint:    rgba(255, 255, 255, .04);
            --rpcn-surface:         rgba(255, 255, 255, .04);
            --rpcn-surface-dark:    rgba(0, 0, 0, .2);
            --rpcn-online:          #4cffb3;
            --rpcn-gold:            #ffd166;
            --rpcn-silver:          #b0bec5;
            --rpcn-bronze:          #cd7f32;
            --rpcn-error-bg:        rgba(230, 57, 70, .1);
            --rpcn-error-border:    rgba(230, 57, 70, .4);
            --rpcn-error-text:      #ffaaaa;
            --rpcn-radius-sm:   4px;
            --rpcn-radius:      8px;
            --rpcn-radius-lg:   10px;
            --rpcn-page-width:  980px;
            --rpcn-font:        'Segoe UI', 'Roboto', sans-serif;
            --rpcn-font-mono:   'Consolas', monospace;
            --rpcn-font-size:   14px;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background:  var(--rpcn-bg);
            color:       var(--rpcn-text);
            font-family: var(--rpcn-font);
            font-size:   var(--rpcn-font-size);
            line-height: 1.6;
            min-height:  100vh;
        }

        .rpcn-page-wrap {
            max-width: var(--rpcn-page-width);
            margin:    0 auto;
            padding:   30px 16px 60px;
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
            width:         280px;
            height:        154px;
            object-fit:    cover;
            border-radius: var(--rpcn-radius);
            box-shadow:    0 4px 20px rgba(0,0,0,.6);
            background:    var(--rpcn-surface);
            display:       block;
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
            display:       none;
            background:    rgba(255,255,255,.02);
            border:        1px solid rgba(255,255,255,.07);
            border-top:    none;
            border-radius: 0 0 var(--rpcn-radius-lg) var(--rpcn-radius-lg);
            padding:       22px;
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
            height:   256px;
            display:  block;
            overflow: visible;
        }
        .rpcn-sg { stroke: rgba(255,255,255,.05); stroke-width: 1; fill: none; }
        .rpcn-sl { stroke: #66fcf1; stroke-width: 2; }
        .rpcn-st {
            fill:        #4a5568;
            font-size:   10px;
            font-family: 'Consolas', monospace;
        }
        .rpcn-sty { text-anchor: end;    dominant-baseline: middle; }
        .rpcn-stx { text-anchor: middle; dominant-baseline: auto; }
        /* Hover dots */
        .rpcn-dp > circle {
            fill:         #66fcf1;
            stroke:       var(--rpcn-bg);
            stroke-width: 2;
            opacity:      0;
            transition:   opacity .12s;
        }
        .rpcn-dp:hover > circle { opacity: 1; }
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
        }
        .rpcn-board-btn:hover {
            background:   var(--rpcn-accent-bg);
            border-color: var(--rpcn-accent);
            color:        var(--rpcn-accent);
            transform:    translateY(-1px);
        }

        /* Board selection & views */
        #rpcn-board-selection { display: none; }
        .rpcn-board-view      { display: none; }
        #board-list:checked ~ #rpcn-board-selection { display: block; }
        <?php foreach (array_keys($boardContents) as $bid): ?>
        #board-<?= (int)$bid ?>:checked ~ #board-view-<?= (int)$bid ?> { display: block; }
        <?php endforeach; ?>

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
                 onerror="this.src='/cdn/rpcn/icon0/default.png'">
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

    <input type="radio" name="rpcn-tab" id="tab-charts" class="rpcn-sr" checked>
    <?php if ($hasLeaderboard): ?>
    <input type="radio" name="rpcn-tab" id="tab-lb" class="rpcn-sr">
    <?php endif; ?>

    <div class="rpcn-tabs-nav">
        <label for="tab-charts" class="rpcn-tab-btn">Player Charts</label>
        <?php if ($hasLeaderboard): ?>
            <label for="tab-lb" class="rpcn-tab-btn">Leaderboards</label>
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

        <!--  Leaderboards tab  -->
        <?php if ($hasLeaderboard && !empty($boardContents)): ?>
        <div id="panel-lb" class="rpcn-tab-panel">

            <input type="radio" name="rpcn-board" id="board-list" class="rpcn-sr"
                   <?= $autoShowBoard === null ? 'checked' : '' ?>>
            <?php foreach (array_keys($boardContents) as $bid): ?>
            <input type="radio" name="rpcn-board" id="board-<?= (int)$bid ?>" class="rpcn-sr"
                   <?= $autoShowBoard === (int)$bid ? 'checked' : '' ?>>
            <?php endforeach; ?>

            <!-- Board selection grid -->
            <div id="rpcn-board-selection">
                <p class="rpcn-lb-section-title">Choose Scoreboard</p>
                <div class="rpcn-board-grid">
                    <?php foreach ($boards as $boardId => $boardName): ?>
                    <label for="board-<?= (int)$boardId ?>" class="rpcn-board-btn">
                        <?= htmlspecialchars($boardName) ?>
                    </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php foreach ($boardContents as $bid => $content): ?>
            <div id="board-view-<?= (int)$bid ?>" class="rpcn-board-view">
                <?php if ($autoShowBoard === null): ?>
                    <label for="board-list" class="rpcn-btn-back-lb">Back to boards</label>
                <?php endif; ?>
                <?= $content ?>
            </div>
            <?php endforeach; ?>

        </div><!-- /#panel-lb -->
        <?php endif; ?>

    </div><!-- /.rpcn-tab-panels -->

</div><!-- /.rpcn-page-wrap -->
</body>
</html>