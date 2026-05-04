<?php
include 'lib/module/rpcn/config.php';
include 'lib/module/rpcn/inc-rpcn-stats.php';

// Initialize RPCNStats class
$rpcn_stats = new RPCNStats($games_json, $log_file, $api_url, $icons_json, $cache);

$mysqli = mysqli_connect($db_host, $db_user, $db_pass, $db_name, (int) $db_port);
$has_db_error = !$mysqli || (bool)$mysqli->connect_error;

if (!$has_db_error)
{
    $rpcn_stats->fetchDatabaseStats($mysqli);
    $mysqli->close();
}

$search_data = [];
foreach ($rpcn_stats->app_title as $comm_id => $title)
{
    $icon_url = '/cdn/rpcn/icon0/default.png';
    if (isset($rpcn_stats->title_icons[$comm_id]))
    {
        $icon_url = $rpcn_stats->title_icons[$comm_id];
    }
    elseif (isset($rpcn_stats->title_ids[$comm_id]))
    {
        foreach ($rpcn_stats->title_ids[$comm_id] as $id_to_check)
        {
            $search_id = $rpcn_stats->icon_alias[$id_to_check] ?? $id_to_check;
            if (isset($rpcn_stats->icons_db[$search_id]))
            {
                $hash     = $rpcn_stats->icons_db[$search_id];
                $temp_url = "/cdn/rpcn/icon0/{$hash}.png";
                
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $temp_url))
                {
                    $icon_url = $temp_url;
                    break;
                }
            }
        }
    }

    $search_data[] = [
        'id'      => $comm_id,
        'title'   => $title,
        'icon'    => $icon_url,
        'regions' => $rpcn_stats->title_regions[$comm_id] ?? [],
    ];
}

usort($search_data, function($a, $b) {
    return strcasecmp($a['title'], $b['title']);
});

$search_json = json_encode($search_data);

$has_error           = $rpcn_stats->has_error;
$total_users         = $rpcn_stats->total_users;
$title_player_counts = $rpcn_stats->title_player_counts;

// nojs
$search_query   = trim($_GET['q'] ?? '');
$search_results = [];
if ($search_query !== '')
{
    $q_lower = mb_strtolower($search_query);
    foreach ($search_data as $game)
    {
        if (mb_strpos(mb_strtolower($game['title']), $q_lower) !== false)
        {
            $search_results[] = $game;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<title>RPCS3 - RPCN Browser</title>
<meta charset="utf-8">
<meta name="description" content="Real-time stats for games currently being played online via RPCN.">
<meta name="keywords" content="rpcs3, playstation, playstation 3, ps3, emulator, debugger, windows, linux, macos, freebsd, open source, x64, arm64, rpcn">
<?php include 'lib/module/sys-meta.php';?>
<meta property="og:title" content="RPCS3 - RPCN Browser"/>
<meta property="og:description" content="Real-time stats for games currently being played online via RPCN."/>
<meta property="og:image" content="/img/meta/mobile/1200.png"/>
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="630"/>
<meta property="og:url" content="https://rpcs3.net"/>
<meta property="og:locale" content="en_US"/>
<meta property="og:type" content="website"/>
<meta property="og:site_name" content="RPCS3"/>
<meta name="twitter:title" content="RPCS3 - RPCN Browser">
<meta name="twitter:description" content="Real-time stats for games currently being played online via RPCN.">
<meta name="twitter:image" content="/img/meta/mobile/1200.png">
<meta name="twitter:site" content="@rpcs3">
<meta name="twitter:creator" content="@rpcs3">
<meta name="twitter:card" content="summary_large_image">
<?php include 'lib/module/sys-css.php';?>
<?php include 'lib/module/sys-js.php';?>
<style>
.rpcn-list-title-container {
    display: flex;
    align-items: center;
}
.rpcn-game-icon {
    width: 64px;
    height: auto;
    border-radius: 4px;
    margin: 0 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

/* Search form */
.search-container {
    position:   relative;
    max-width:  600px;
    margin:     20px auto;
    z-index:    100;
}
.search-form {
    display: flex;
    gap:     0;
}
.search-input {
    flex:         1;
    padding:      15px;
    border-radius: 4px 0 0 4px;
    border:       1px solid rgba(255,255,255,0.1);
    border-right: none;
    background:   #1b2838;
    color:        #fff;
    font-size:    16px;
    box-sizing:   border-box;
    min-width:    0;
}
.search-input:focus { outline: none; border-color: #66c0f4; }
.search-submit {
    padding:       0 18px;
    background:    #2a475e;
    border:        1px solid rgba(255,255,255,0.1);
    border-left:   none;
    border-radius: 0 4px 4px 0;
    color:         #c7d5e0;
    font-size:     15px;
    cursor:        pointer;
    white-space:   nowrap;
    transition:    background .15s, color .15s;
    line-height:   1;
}
.search-submit:hover { background: #3d6b8a; color: #fff; }

.js-ready .search-submit { display: none; }
.js-ready .search-input  { border-radius: 4px; border-right: 1px solid rgba(255,255,255,0.1); }
.js-ready .search-input:focus { border-color: #66c0f4; }

.search-results {
    position:      absolute;
    top:           100%;
    left:          0;
    right:         0;
    background:    #16202d;
    border:        1px solid #1b2838;
    border-top:    none;
    max-height:    400px;
    overflow-y:    auto;
    display:       none;
    box-shadow:    0 4px 10px rgba(0,0,0,0.5);
    border-radius: 0 0 4px 4px;
}
.search-item { display: flex; align-items: center; padding: 10px; cursor: pointer; border-bottom: 1px solid rgba(255,255,255,0.05); text-decoration: none; color: #d5d6d8; }
.search-item:hover { background: #2a475e; }
.search-icon { width: 40px; border-radius: 2px; margin-right: 15px; flex-shrink: 0; }
.search-title { flex-grow: 1; font-weight: bold; }
.search-flags img { height: 14px; margin-left: 5px; }

.search-results-section {
    margin-top: 30px;
}
.search-results-header {
    display:       flex;
    align-items:   center;
    gap:           12px;
    margin-bottom: 12px;
    flex-wrap:     wrap;
}
.search-results-title {
    font-size:   1.1rem;
    font-weight: 700;
    color:       #c7d5e0;
}
.search-results-count {
    font-size:  0.82rem;
    color:      #69707a;
    background: rgba(255,255,255,0.05);
    padding:    2px 10px;
    border-radius: 20px;
}
.search-clear-link {
    margin-left: auto;
    font-size:   0.82rem;
    color:       #66c0f4;
    text-decoration: none;
    opacity: 0.7;
}
.search-clear-link:hover { opacity: 1; }
.search-no-results {
    color:      #69707a;
    font-style: italic;
    padding:    20px 0;
    text-align: center;
}
.search-result-online-badge {
    display:     inline-flex;
    align-items: center;
    gap:         5px;
    color:       #4cffb3;
    font-size:   0.85rem;
    font-weight: 600;
    white-space: nowrap;
}
.search-result-online-dot {
    width:         7px;
    height:        7px;
    border-radius: 50%;
    background:    #4cffb3;
    flex-shrink:   0;
}

.table-game-link { display: flex; align-items: center; color: inherit; text-decoration: none; transition: 0.15s ease-in-out; }
.table-game-link:hover { color: #66c0f4; }
.rpcn-service-error {
    display:    flex;
    align-items: center;
    gap:        8px;
    color:      #ffaaaa;
    font-size:  14px;
    padding:    6px 0;
}
</style>
</head>
<body>
<?php include 'lib/module/sys-global.php';?>
<div class="page-con-content">
	<div class="banner-con-container darkmode-header">
		<div id="object-particles"></div>
		<div class="wavebar-con-container">
			<div class="wavebar-con-wrap">
				<div class="wavebar-svg-object"></div>
				<div class="wavebar-svg-object"></div>
			</div>
		</div>
		<div class='banner-con-title fade-up-onstart'>
			<div class='banner-tx1-title fade-up-onstart pulsate'>
				<h1>RPCN</h1>
			</div>
			<div class='banner-con-divider'></div>
			<div class="banner-tx2-title fade-up-onstart">
				<p>Real-time stats for games being played via RPCN</p>
			</div>
		</div>
	</div>
	<div class="page-con-container">
		<div class="page-in-container">
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<div class='container-emp-block'></div>
						<h2>RPCN Browser</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p>RPCN is a netplay service that allows you to play revived PlayStation 3 games. See real-time statistics of currently active players, popular games, and ongoing multiplayer sessions.</p>
					</div>

					<div class="search-container">
						<form method="get" action="" class="search-form" id="searchForm">
							<input type="text"
							       name="q"
							       id="gameSearch"
							       class="search-input"
							       value="<?php echo htmlspecialchars($search_query); ?>"
							       placeholder="Search Title..."
							       autocomplete="off"
							       aria-label="Search games">
							<button type="submit" class="search-submit" aria-label="Submit search">&#128269; Search</button>
						</form>
						<div id="searchResults" class="search-results" role="listbox" aria-label="Search suggestions"></div>
					</div>

					<?php if ($search_query !== ''): ?>
					<div class="search-results-section" id="serverSearchResults">
						<div class="search-results-header">
							<span class="search-results-title">
								Results for &ldquo;<?php echo htmlspecialchars($search_query); ?>&rdquo;
							</span>
							<span class="search-results-count">
								<?php echo count($search_results); ?> game<?php echo count($search_results) !== 1 ? 's' : ''; ?>
							</span>
							<a href="rpcn.php" class="search-clear-link">&#10005; Clear search</a>
						</div>

						<?php if (empty($search_results)): ?>
							<p class="search-no-results">No games found matching your search.</p>
						<?php else: ?>
							<div class="rpcn-list-con-container">
								<table>
									<tbody>
										<?php foreach ($search_results as $game):
											$online_count = $title_player_counts[$game['id']] ?? 0;
										?>
										<tr class='darkmode-txt'>
											<td>
												<div class='rpcn-list-title'>
													<div class='rpcn-list-title-container'>
														<?php if ($online_count > 0): ?>
														<div class='rpcn-list-ico-status'></div>
														<?php else: ?>
														<div class='rpcn-list-ico-status' style="background: rgba(255,255,255,0.1);"></div>
														<?php endif; ?>
														<a href="rpcn-game.php?comm_id=<?php echo htmlspecialchars($game['id']); ?>" class="table-game-link" style="display:flex; align-items:center;">
															<img src="<?php echo htmlspecialchars($game['icon']); ?>"
															     alt="Game Icon"
															     class="rpcn-game-icon"
															     onerror="this.src='/cdn/rpcn/icon0/default.png'">
															<?php echo htmlspecialchars($game['title']); ?>
														</a>
													</div>
													<?php if (!empty($game['regions'])): ?>
													<div class='rpcn-list-regions'>
														<?php foreach ($game['regions'] as $region): ?>
														<div class='rpcn-list-flags'>
															<img src="/img/icons/compat/<?php echo strtoupper(htmlspecialchars($region)); ?>.png" alt="<?php echo htmlspecialchars($region); ?>">
														</div>
														<?php endforeach; ?>
													</div>
													<?php endif; ?>
												</div>
											</td>
											<td>
												<?php if ($online_count > 0): ?>
													<div class='rpcn-list-ico-player' style="background: url(/img/icons/rpcn/user.png) center / 20px no-repeat;"></div>
													<span><?php echo htmlspecialchars((string)$online_count); ?>&nbsp;Online</span>
												<?php else: ?>
													<span style="color: #69707a; font-size: 0.85rem;">No players online</span>
												<?php endif; ?>
											</td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>

				</div>
			</div>
			<?php include 'lib/module/rpcn/inc-rpcn-playerbase.php';?>
			<div class='rpcn-infopane-con-container'>
				<div class='rpcn-infopane-con-outer'>
					<div class='rpcn-infopane-con-inner-a'>
						<div class='rpcn-infopane-con-graphic' style="background: url(/img/graphics/rpcn/get-started.png) center top no-repeat; right: -52px; bottom: -38px;"></div>
						<div class='rpcn-infopane-con-image' style="background: url(/img/icons/rpcn/psn.png) center left / 42px no-repeat;"></div>
						<div class='rpcn-infopane-tx1-title darkmode-txt'><span>Get Started</span></div>
						<div class='rpcn-infopane-tx2-desc darkmode-txt'><span>Get started by reading our comprehensive setup guide to learn how to connect your RPCS3 installation.<br><br><br><br></span></div>
						<a href="https://wiki.rpcs3.net/index.php?title=Help:Netplay" target="_blank">
						<div class='package-con-button'>
							<div class='package-ico-button' style="background: url(/img/icons/buttons/docs-h.png) center / 22px no-repeat;"></div>
							<div class='package-tx1-button'><span>Read More</span></div>
						</div>
						</a>
					</div>
				</div>
				<div class='rpcn-infopane-con-outer' style="width: 66.6666666666%;">
					<div class='rpcn-infopane-con-inner-a'>
						<div class='rpcn-infopane-con-graphic' style="background: url(/img/graphics/rpcn/compat.png) right bottom no-repeat; right: -52px; bottom: 0; height: 150px; width: 420px;"></div>
						<div class='rpcn-infopane-con-image darkmode-invert' style="background: url(/img/icons/buttons/compat.png) center left / 42px no-repeat;"></div>
						<div class='rpcn-infopane-tx1-title darkmode-txt'><span>Netplay Compatibility</span></div>
						<div class='rpcn-infopane-tx2-desc darkmode-txt'><span>Check games that support netplay with our compatibility list. From beloved fighting games to racing and cooperative adventures, explore a growing collection of PlayStation 3 games revived with netplay.<br><br>For game compatibility, see the <a href="/compatibility" target="_blank">compatibility list</a>.</span><br><br></div>
						<a href="https://wiki.rpcs3.net/index.php?title=RPCN_Compatibility_List" target="_blank">
							<div class='package-con-button' style="width: 225px;">
								<div class='package-ico-button' style="background: url(/img/icons/buttons/compat-h.png) center / 22px no-repeat;"></div>
								<div class='package-tx1-button'><span>View Compatibility List</span></div>
							</div>
						</a>
					</div>
				</div>
			</div>

            <div class='container-tx1-block darkmode-txt' style="margin-top: 40px;">
                <div class='container-emp-block'></div>
                <h2>Global Users Peak</h2>
            </div>
            <div class='rpcn-infopane-con-container'>
                <div class='rpcn-infopane-con-outer' style="width: 50%;">
                    <div class='rpcn-infopane-con-inner-a'>
                        <div class='rpcn-infopane-tx1-title darkmode-txt'>
                            <span>All-Time Total Users Peak</span>
                        </div>
                        <div class='rpcn-infopane-tx2-desc darkmode-txt' style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100%; margin-top: 20px; padding-bottom: 30px;">
                            <?php if ($has_db_error): ?>
                                <div class="rpcn-service-error">Service unavailable - please try again later</div>
                            <?php else: ?>
                                <span style="font-size: 56px; font-weight: bold;"><?php echo $rpcn_stats->peak_alltime_users; ?></span>
                                <span style="font-size: 18px; opacity: 0.8; margin-top: 20px;">Players Online</span>
                                <span style="font-size: 14px; opacity: 0.6; margin-top: 5px;"><?php echo $rpcn_stats->peak_alltime_users_date; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class='rpcn-infopane-con-outer' style="width: 50%;">
                    <div class='rpcn-infopane-con-inner-a'>
                        <div class='rpcn-infopane-tx1-title darkmode-txt'>
                            <span>Total Users 24H Peak</span>
                        </div>
                        <div class='rpcn-infopane-tx2-desc darkmode-txt' style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100%; margin-top: 20px; padding-bottom: 30px;">
                            <?php if ($has_db_error): ?>
                                <div class="rpcn-service-error">Service unavailable - please try again later</div>
                            <?php else: ?>
                                <span style="font-size: 56px; font-weight: bold;"><?php echo $rpcn_stats->peak_24h_users; ?></span>
                                <span style="font-size: 18px; opacity: 0.8; margin-top: 20px;">Players Online</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class='container-tx1-block darkmode-txt' style="margin-top: 20px;">
                <div class='container-emp-block'></div>
                <h2>Top 10 Games Peak</h2>
            </div>
            <div class='rpcn-infopane-con-container'>
                <div class='rpcn-infopane-con-outer' style="width: 50%;">
                    <div class='rpcn-infopane-con-inner-a'>
                        <div class='rpcn-infopane-tx1-title darkmode-txt'>
                            <span>Top 10 Games (All-Time Peak)</span>
                        </div>
                        <div class='rpcn-infopane-tx2-desc darkmode-txt' style="margin-top: 15px;">
                            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                                <tbody>
                                    <?php if ($has_db_error): ?>
                                        <tr><td style="padding: 10px 0;"><div class="rpcn-service-error">Service unavailable - please try again later</div></td></tr>
                                    <?php elseif (!empty($rpcn_stats->top_10_games_alltime)): ?>
                                        <?php foreach ($rpcn_stats->top_10_games_alltime as $index => $game):
                                            $g_comm_id = $game['comm_id'] ?? array_search($game['game_title'], $rpcn_stats->app_title);
                                            $g_regions = $g_comm_id ? ($rpcn_stats->title_regions[$g_comm_id] ?? []) : [];
                                        ?>
                                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                                            <td style="padding: 8px 0; width: 30px; opacity: 0.7;"><strong>#<?php echo $index + 1; ?></strong></td>
                                            <td style="padding: 8px 0;">
                                                <?php if($g_comm_id): ?>
                                                <a href="rpcn-game.php?comm_id=<?php echo htmlspecialchars($g_comm_id); ?>" class="table-game-link">
                                                <?php else: ?>
                                                <div style="display:flex; align-items:center;">
                                                <?php endif; ?>
                                                    <?php if (!empty($game['icon'])): ?>
                                                        <img src="<?php echo htmlspecialchars($game['icon']); ?>" alt="Icon" style="width: 24px; border-radius: 2px; margin-right: 10px; box-shadow: 0 1px 2px rgba(0,0,0,0.5);">
                                                    <?php endif; ?>
                                                    <span style="margin-right: 6px;"><?php echo htmlspecialchars($game['game_title']); ?></span>
                                                    <?php foreach ($g_regions as $region): ?>
                                                        <img src="/img/icons/compat/<?php echo strtoupper($region); ?>.png" alt="<?php echo $region; ?>" style="height: 12px; margin-right: 2px;">
                                                    <?php endforeach; ?>
                                                <?php if($g_comm_id): ?>
                                                </a>
                                                <?php else: ?>
                                                </div>
                                                <?php endif; ?>
                                            </td>
                                            <td style="padding: 8px 0; text-align: right; white-space: nowrap;">
                                                <strong><?php echo $game['peak']; ?></strong> peak
                                                <span style="display:block; font-size:11px; opacity:0.6;"><?php echo $game['time_ago']; ?></span>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr><td style="padding: 10px 0;">No data available.</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class='rpcn-infopane-con-outer' style="width: 50%;">
                    <div class='rpcn-infopane-con-inner-a'>
                        <div class='rpcn-infopane-tx1-title darkmode-txt'>
                            <span>Top 10 Games (24H Peak)</span>
                        </div>
                        <div class='rpcn-infopane-tx2-desc darkmode-txt' style="margin-top: 15px;">
                            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                                <tbody>
                                    <?php if ($has_db_error): ?>
                                        <tr><td style="padding: 10px 0;"><div class="rpcn-service-error">Service unavailable - please try again later</div></td></tr>
                                    <?php elseif (!empty($rpcn_stats->top_10_games_24h)): ?>
                                        <?php foreach ($rpcn_stats->top_10_games_24h as $index => $game):
                                            $g_comm_id = $game['comm_id'] ?? array_search($game['game_title'], $rpcn_stats->app_title);
                                            $g_regions = $g_comm_id ? ($rpcn_stats->title_regions[$g_comm_id] ?? []) : [];
                                        ?>
                                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                                            <td style="padding: 8px 0; width: 30px; opacity: 0.7;"><strong>#<?php echo $index + 1; ?></strong></td>
                                            <td style="padding: 8px 0;">
                                                <?php if($g_comm_id): ?>
                                                <a href="rpcn-game.php?comm_id=<?php echo htmlspecialchars($g_comm_id); ?>" class="table-game-link">
                                                <?php else: ?>
                                                <div style="display:flex; align-items:center;">
                                                <?php endif; ?>
                                                    <?php if (!empty($game['icon'])): ?>
                                                        <img src="<?php echo htmlspecialchars($game['icon']); ?>" alt="Icon" style="width: 24px; border-radius: 2px; margin-right: 10px; box-shadow: 0 1px 2px rgba(0,0,0,0.5);">
                                                    <?php endif; ?>
                                                    <span style="margin-right: 6px;"><?php echo htmlspecialchars($game['game_title']); ?></span>
                                                    <?php foreach ($g_regions as $region): ?>
                                                        <img src="/img/icons/compat/<?php echo strtoupper($region); ?>.png" alt="<?php echo $region; ?>" style="height: 12px; margin-right: 2px;">
                                                    <?php endforeach; ?>
                                                <?php if($g_comm_id): ?>
                                                </a>
                                                <?php else: ?>
                                                </div>
                                                <?php endif; ?>
                                            </td>
                                            <td style="padding: 8px 0; text-align: right; white-space: nowrap;"><strong><?php echo $game['peak']; ?></strong> peak</td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr><td style="padding: 10px 0;">No data available for the last 24 hours.</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class='container-tx1-block darkmode-txt'>
				<div class='container-emp-block'></div>
				<h2>Active Games</h2>
			</div>
			<?php if ($has_error): ?>
				<div class="error-message">RPCN stats are currently unavailable. Please try again later.</div>
			<?php endif; ?>
			<div class="rpcn-list-con-container">
			<?php if (!$has_error): ?>
				<table>
					<tbody>
						<?php foreach ($title_player_counts as $comm_id => $count): ?>
							<?php if ($count > 0): ?>
                            <?php $game_title = $rpcn_stats->app_title[$comm_id] ?? 'Unknown'; ?>
								<tr class='darkmode-txt'>
									<td>
										<div class='rpcn-list-title'>
											<div class='rpcn-list-title-container'>
												<div class='rpcn-list-ico-status'></div>
                                                <a href="rpcn-game.php?comm_id=<?php echo htmlspecialchars($comm_id); ?>" class="table-game-link" style="display:flex; align-items:center;">
                                                    <?php
                                                        $display_icon = !empty($rpcn_stats->title_icons[$comm_id])
                                                                        ? $rpcn_stats->title_icons[$comm_id]
                                                                        : '/cdn/rpcn/icon0/default.png';
                                                    ?>
                                                    <img src="<?php echo htmlspecialchars($display_icon); ?>" alt="Game Icon" class="rpcn-game-icon">
                                                    <?php echo htmlspecialchars(!empty($game_title) ? $game_title : 'Unknown'); ?>
                                                </a>
											</div>
											<?php if (!empty($rpcn_stats->title_regions[$comm_id])): ?>
											<div class='rpcn-list-regions'>
												<?php foreach ($rpcn_stats->title_regions[$comm_id] as $region): ?>
												<div class='rpcn-list-flags'>
													<img src="/img/icons/compat/<?php echo strtoupper($region); ?>.png" alt="<?php echo $region; ?>">
												</div>
												<?php endforeach; ?>
											</div>
											<?php endif; ?>
										</div>
									</td>
									<td>
										<div class='rpcn-list-ico-player' style="background: url(/img/icons/rpcn/user.png) center / 20px no-repeat;"></div>
									    <span><?php echo htmlspecialchars($count); ?>&nbsp;Online</span>
									</td>
								</tr>
							<?php endif; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php include 'lib/module/inc-footer.php';?>
<script>
(function ()
{
    document.documentElement.classList.add('js-ready');

    const gamesData    = <?php echo $search_json; ?>;
    const searchInput  = document.getElementById('gameSearch');
    const searchDropdown = document.getElementById('searchResults');
    const searchForm   = document.getElementById('searchForm');
    const serverResults = document.getElementById('serverSearchResults');

    if (!searchInput || !searchDropdown) return;

    if (serverResults) {
        serverResults.style.display = 'none';
    }

    function renderDropdown(query)
    {
        searchDropdown.innerHTML = '';

        if (query.length < 2)
        {
            searchDropdown.style.display = 'none';
            return;
        }

        const q        = query.toLowerCase();
        const filtered = gamesData.filter(g => g.title.toLowerCase().includes(q)).slice(0, 10);

        if (filtered.length === 0)
        {
            searchDropdown.style.display = 'none';
            return;
        }

        filtered.forEach(game =>
        {
            const a = document.createElement('a');
            a.className   = 'search-item';
            a.href        = 'rpcn-game.php?comm_id=' + encodeURIComponent(game.id);
            a.setAttribute('role', 'option');

            let flagsHtml = '';
            if (game.regions && game.regions.length > 0)
            {
                game.regions.forEach(r =>
                {
                    flagsHtml += `<img src="/img/icons/compat/${r.toUpperCase()}.png" alt="${r}">`;
                });
            }

            a.innerHTML = `
                <img src="${game.icon}"
                     class="search-icon"
                     alt="icon"
                     onerror="this.src='/cdn/rpcn/icon0/default.png'">
                <span class="search-title">${game.title}</span>
                <div class="search-flags">${flagsHtml}</div>
            `;
            searchDropdown.appendChild(a);
        });

        searchDropdown.style.display = 'block';
    }

    searchInput.addEventListener('input', function ()
    {
        renderDropdown(this.value.trim());
    });

    searchInput.addEventListener('focus', function ()
    {
        if (this.value.trim().length >= 2) renderDropdown(this.value.trim());
    });

    document.addEventListener('click', function (e)
    {
        if (!searchInput.contains(e.target) && !searchDropdown.contains(e.target))
        {
            searchDropdown.style.display = 'none';
        }
    });
})();
</script>
</body>
</html>