<?php
include 'lib/module/sys-css.php';
include 'lib/module/sys-js.php';
include 'lib/module/rpcn/inc-rpcn-stats.php';

$games_json = 'lib/module/rpcn/games.json';
$log_file = 'lib/module/rpcn/log.txt';
$api_url = "http://np.rpcs3.net:31333/rpcn_stats";

// Initialize RPCNStats class
$rpcn_stats = new RPCNStats($games_json, $log_file, $api_url);

// Fetch data
$total_users = $rpcn_stats->total_users;
$title_player_counts = $rpcn_stats->title_player_counts;
?>
<!DOCTYPE html>
<head>
<html lang="en-US">
<title>RPCS3 - RPCN</title>
<meta charset="utf-8">
<meta name="description" content="View real-time stats of games currently being played online with RPCN.">
<meta name="keywords" content="rpcs3, playstation, playstation 3, ps3, emulator, debugger, windows, linux, macos, freebsd, open source, nekotekina, kd11, quickstart">
<?php include 'lib/module/sys-meta.php';?>
<meta property="og:title" content="RPCS3 - RPCN"/>
<meta property="og:description" content="View real-time stats of games currently being played online with RPCN."/>
<meta property="og:image" content="/img/meta/mobile/1200.png"/>
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="630"/>
<meta property="og:url" content="https://rpcs3.net"/>
<meta property="og:locale" content="en_US"/>
<meta property="og:type" content="website"/>
<meta property="og:site_name" content="RPCS3"/>
<meta name="twitter:title" content="RPCS3 - RPCN">
<meta name="twitter:description" content="View real-time stats of games currently being played online with RPCN.">
<meta name="twitter:image" content="/img/meta/mobile/1200.png">
<meta name="twitter:site" content="@rpcs3">
<meta name="twitter:creator" content="@rpcs3">
<meta name="twitter:card" content="summary_large_image">
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
                    View real-time stats of games currently being played online with RPCN.
				</p>
			</div>
		</div>
	</div>
    <div class="total-users-container">
    <strong>Total Users</strong>
    <span><?php echo htmlspecialchars($total_users ?? '0'); ?></span>
</div>
<div class="game-info-container">
    <strong>Game Title</strong>: 
    <strong>Current Players</strong>: 
</div>
<div class="rpcn-con-container">
    <table>
        <tbody>
            <?php foreach ($title_player_counts as $game_title => $count): ?>
                <?php if ($count > 0): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($game_title ?? 'Unknown'); ?></td>
                        <td><?php echo htmlspecialchars($count); ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include 'lib/module/inc-footer.php';?>
</body>
</html>