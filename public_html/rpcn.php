<?php
include 'lib/module/rpcn/inc-rpcn-stats.php';

$games_json = 'lib/module/rpcn/games.json';
$log_file = 'lib/module/rpcn/log.txt';
$api_url = "http://np.rpcs3.net:31333/rpcn_stats";

// Initialize RPCNStats class
$rpcn_stats = new RPCNStats($games_json, $log_file, $api_url);

// Fetch data and check for errors
$has_error = $rpcn_stats->has_error;
$total_users = $rpcn_stats->total_users;
$title_player_counts = $rpcn_stats->title_player_counts;
?>
<!DOCTYPE html>
<head>
<html lang="en-US">
<title>RPCS3 - RPCN Browser</title>
<meta charset="utf-8">
<meta name="description" content="Real-time stats for games currently being played online via RPCN.">
<meta name="keywords" content="rpcs3, playstation, playstation 3, ps3, emulator, debugger, windows, linux, macos, freebsd, open source, nekotekina, kd11, rpcn">
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
</head>
<body>
<?php include 'lib/module/sys-global.php';?>
<div class="page-con-content">
	<div class="banner-con-container darkmode-header">
		<div id="object-particles">
		</div>
		<div class="wavebar-con-container">
			<div class="wavebar-con-wrap">
				<div class="wavebar-svg-object">
				</div>
				<div class="wavebar-svg-object">
				</div>
			</div>
		</div>
		<div class='banner-con-title fade-up-onstart'>
			<div class='banner-tx1-title fade-up-onstart pulsate'>
				<h1>RPCN</h1>
			</div>
			<div class='banner-con-divider'>
			</div>
			<div class="banner-tx2-title fade-up-onstart">
				<p>
                    Real-time stats for games being played via RPCN
				</p>
			</div>
		</div>
	</div>
	<div class="page-con-container">
		<div class="page-in-container">
		<div class='container-con-block darkmode-block'>
			<div class='container-con-wrapper'>
				<div class='container-tx1-block darkmode-txt'>
					<div class='container-emp-block'>
					</div>
					<h2>RPCN Browser</h2>
				</div>
				<div class='container-tx2-block darkmode-txt'>
					<p>
						 RPCN is a netplay service that allows you to play revived PlayStation 3 games. See real-time statistics of currently active players, popular games, and ongoing multiplayer sessions.
					</p>
				</div>
			</div>
		</div>
		<?php include 'lib/module/rpcn/inc-rpcn-playerbase.php';?>
		<div class='rpcn-infopane-con-container'>
			<div class='rpcn-infopane-con-outer'>
				<div class='rpcn-infopane-con-inner-a'>
					<div class='rpcn-infopane-con-graphic' style="background: url(/img/graphics/rpcn/get-started.png) center top no-repeat; right: -52px; bottom: -38px;">
					</div>
					<div class='rpcn-infopane-con-image' style="background: url(/img/icons/rpcn/psn.png) center left / 42px no-repeat;">
					</div>
					<div class='rpcn-infopane-tx1-title darkmode-txt'>
						<span>Get Started</span>
					</div>
					<div class='rpcn-infopane-tx2-desc darkmode-txt'>
						<span>Get started by reading our comprehensive setup guide to learn how to connect your RPCS3 installation.<br><br><br><br></span>
					</div>
					<a href="https://wiki.rpcs3.net/index.php?title=Help:Netplay" target="_blank">
					<div class='package-con-button'>
						<div class='package-ico-button' style="background: url(/img/icons/buttons/docs-h.png) center / 22px no-repeat;">
						</div>
						<div class='package-tx1-button'>
							<span>Read More</span>
						</div>
					</div>
					</a>
				</div>
			</div>
			<div class='rpcn-infopane-con-outer' style="width: 66.6666666666%;">
				<div class='rpcn-infopane-con-inner-a'>
					<div class='rpcn-infopane-con-graphic' style="background: url(/img/graphics/rpcn/compat.png) right bottom no-repeat; right: -52px; bottom: 0; height: 150px; width: 420px;">
					</div>
					<div class='rpcn-infopane-con-image darkmode-invert' style="background: url(/img/icons/buttons/compat.png) center left / 42px no-repeat;">
					</div>
					<div class='rpcn-infopane-tx1-title darkmode-txt'>
						<span>Netplay Compatibility</span>
					</div>
					<div class='rpcn-infopane-tx2-desc darkmode-txt'>
						<span>Check games that support netplay with our compatibility list. From beloved fighting games to racing and cooperative adventures, explore a growing collection of PlayStation 3 games revived with netplay.<br><br>For game compatibility, see the <a href="http://localhost/compatibility" target="_blank">compatibility list</a>.</span>
						<br><br>
					</div>
					<a href="https://wiki.rpcs3.net/index.php?title=RPCN_Compatibility_List" target="_blank">
						<div class='package-con-button' style="width: 225px;">
							<div class='package-ico-button' style="background: url(/img/icons/buttons/compat-h.png) center / 22px no-repeat;">
							</div>
							<div class='package-tx1-button'>
								<span>
									View Compatibility List
								</span>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class='container-tx1-block darkmode-txt'>
			<div class='container-emp-block'>
			</div>
			<h2>Active Games</h2>
		</div>
		<?php if ($has_error): ?>
    		<div class="error-message">
        		RPCN stats are currently unavailable. Please check later.
    		</div>
		<?php endif; ?>
		<div class="rpcn-list-con-container">
		<?php if (!$has_error): ?>
			<table>
				<tbody>
					<?php foreach ($title_player_counts as $game_title => $count): ?>
						<?php if ($count > 0): ?>
							<tr class='darkmode-txt'>
								<td><div class='rpcn-list-ico-status'></div><?php echo htmlspecialchars($game_title ?? 'Unknown'); ?></td>
								<td><div class='rpcn-list-ico-player' style="background: url(/img/icons/rpcn/user.png) center / 18px no-repeat;">
					</div><?php echo htmlspecialchars($count); ?>&nbspOnline</td>
							</tr>
						<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<?php endif; ?>
	</div>
</div>
<?php include 'lib/module/inc-footer.php';?>
</body>
</html>