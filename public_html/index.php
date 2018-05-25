<!DOCTYPE html>
<html lang="en-US">
<head>
<title>RPCS3 - PlayStation 3 Emulator</title>
<meta charset="UTF-8">
<meta name="description" content="RPCS3 is an open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows and Linux.">
<meta name="keywords" content="rpcs3, ps3, playstation 3, emulator, nekotekina, home">
<meta name="author" content="RPCS3">
<meta name="copyright" content="RPCS3">
<meta name="google-site-verification" content="cO1o6sx54cvKxhbnYsABWtl4sYFj9uVKV0DxLKZkWv8"/>
<?php include 'lib/module/sys-meta.php';?>
<?php include 'lib/module/sys-css.php';?>
<script data-cfasync="false" src='/lib/js/timer.js'></script>
<?php include 'lib/module/sys-js.php';?>
</head>
<body>
<?php include 'lib/module/sys-php.php';?>
<?php include 'lib/module/ui-main-video.php'?>
<?php
	preloadVideo(
	'1',
	'Unused'
	);
	preloadVideo(
	'2',
	'byFrrDgDcYc'
	);
	preloadVideo(
	'3',
	'He2VAVXrFS8'
	);
?>
<?php 
if (file_exists('lib/compat/utils.php')) {
	include('lib/compat/utils.php');
	$linux_button = ''; // Does not disable Linux button
	// 0 - URL, 1 - Version Name, 2 - Author, 3 - PR, 4 - Checksum, 5 - File Size (MB)
	$win = getLatestWindowsBuild();
	// 0 - Filename; 1 - Date
	$linux = getLatestLinuxBuild();
} else {
	$linux_button = ' button-disabled'; // Disables Linux button
	$win[0] = 'https://ci.appveyor.com/project/rpcs3/rpcs3/branch/master/artifacts';
	$win[1] = 'Latest version';
	$linux[0] = 'Temporarily unavailable';
	$linux[1] = 'https://github.com/RPCS3/rpcs3/releases';
}
?>
<div class="page-con-content context-css-override">
	<div class='arrow-ico-scroll'>
	</div>
	<div class="content-con-feature-a" style="background: #000; height: 100%; max-height: unset;">
		<div id="particles-js-1">
		</div>
		<div class="content-con-overlay darkmode-header">
		</div>
		<div class="content-con-outer">
			<div class="content-con-inner">
				<div class='content-con-wrap-left content-expand '>
					<div class="content-txt-wrap scale-content-txt-1 fade-in-onload">
						<div class='content-tx1-wrap'>
							<span>Open-source<br>PlayStation 3 Emulator</span>
						</div>
						<div class='content-tx2-wrap'>
							<span>RPCS3 is an experimental open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows and Linux. RPCS3 began development in May of 2011 by its founders, DH and Hykem.</span>
							<div class='content-btn-container'>
							<a href="/download">
							<div class='content-btn-download'>
								<span>Download</span>
								<span class="content-tx1-download">
								<?php echo $win[1]; ?>
								</span>
							</div>
							</a>
							</div>
						</div>
					</div>
				</div>
				<div class='content-con-wrap-right content-remove '>
					<div class='content-img-wrap' style="display:block; background: url(/img/icons/menu/greeting.png) no-repeat center; background-size: contain;">
					</div>
					<!-- Featured Video -->
					<div class='video-con-container' style="display:none;">
						<div class="video-btn-player-b page-video-1">
						</div>
						<div class="video-con-slideshow">
							<div>
								<img class='video-img-thumb' alt="" src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
							<div>
								<img class='video-img-thumb' alt="" src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
							<div>
								<img class='video-img-thumb' alt="" src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
							<div>
								<img class='video-img-thumb' alt="" src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
							<div>
								<img class='video-img-thumb' alt="" src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
							<div>
								<img class='video-img-thumb' alt="" src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
							<div>
								<img class='video-img-thumb' alt="" src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
							<div>
								<img class='video-img-thumb' alt="" src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
							<div>
								<img class='video-img-thumb' alt="" src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
							<div>
								<img class='video-img-thumb' alt="" src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
						</div>
					</div>
					<script>
					$(".video-con-slideshow > div:gt(0)").hide();
					setInterval(function() {
					  $('.video-con-slideshow > div:first')
						.fadeOut(768)
						.next()
						.fadeIn(768)
						.end()
						.appendTo('.video-con-slideshow');
					}, 5000);
					</script>
					<!-- Timer -->
					<div class='timer-con-container' style="display:none;">
						<div id='timer-tx1-body'>
							 Synchronizing...
						</div>
						<div class='timer-con-separator'>
						</div>
						<div class='timer-con-wrapper'>
							<a class="https://discord.me/RPCS3" target="_blank">
							<div class='timer-ico-body'>
							</div>
							</a>
							<div class='timer-tx2-body'>
								<span>Join the discussion on </span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="content-con-feature-c darkmode-feature" style="background: #212121; height:100px;">
		<div class="search-ovr-container darkmode-header">
		</div>
		<div class='search-con-container'>
			<div class="search-con-outer">
				<div class="search-con-inner">
					<div class="search-inp-search">
						<div class="search-ico-search">
						</div>
						<div class="search-txt-search">
							<span><span class="mobile-titlesearch" style="opacity:0.4;">Compatibility database developed and maintained by </span><span style="background: url(/img/icons/buttons/github-h.png) no-repeat center; background-size: 14px; width: 18px; height: 50px; position: absolute; display: inline-block; opacity:0.4;"></span><span><a style="pointer-events: all; padding-left: 22px;" href="https://github.com/AniLeo" target="_blank" title="View AniLeo on GitHub">AniLeo</a></span></span>
						</div>
						<form action='/compatibility' method='get'>
							<input name="g" placeholder="Game Title / Game ID">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="content-con-feature-b darkmode-feature">
		<div class="content-con-overlay darkmode-header" style=" opacity: 0.9;">
		</div>
		<div class="content-con-outer">
			<div class="content-con-inner">
				<div id='context-con-block' class="context-alg-block darkmode-context override-promote">
					<div class='context-ico-block' style="background: #4c5bd7 url('/img/icons/context/progress-h.png') no-repeat center center !important; background-size: 240px !important;">
					</div>
					<div class='context-tx1-block darkmode-txt'>
						<span>Progress</span>
					</div>
					<div class='context-tx2-block darkmode-txt'>
						<span>
						Each month we aim to publish a technical and visual progress report that showcases our latest progress completed by our developers and talented contributors. Similarly to most emulator projects we want to be as open as possible with our progress. Showcasing performance, graphical and quality-of-life improvements in great detail is our goal. We believe this is the best way to keep our fans and followers interested in the project.</span>
					</div>
					<a href="https://rpcs3.net/blog/2018/05/20/progress-report-april-2018/">
					<div class='context-btn-block'>
						<span>Read Latest</span>
					</div>
					</a>
				</div>
				<div id='context-con-block' class="context-alg-block darkmode-context override-hide">
					<div class='context-ico-block' style="background: #4c5bd7 url('/img/icons/context/discord-h.png') no-repeat center center !important; background-size: 200px !important;">
					</div>
					<div class='context-tx1-block darkmode-txt'>
						<span>Community</span>
					</div>
					<div class='context-tx2-block darkmode-txt'>
						<span>
						Join our Discord community featuring over 28,000 members for project announcements, developer interaction and emulator configuration support. With regular interaction from our team, we aim to create a tight-knit community of emulation hobbyists and PlayStation 3 fans alike. Our server features a custom designed compatibility bot that allows users to request, then fetch the status for over 2800 tested PlayStation 3 titles.</span>
					</div>
					<a href="https://discord.me/RPCS3" target="_blank">
					<div class='context-btn-block'>
						<span>Join</span>
					</div>
					</a>
				</div>
				<div id='context-con-block' class="darkmode-context override-hide">
					<div class='context-ico-block' style="background: #4c5bd7 url('/img/icons/context/git-h.png') no-repeat center center !important; background-size: 200px !important;">
					</div>
					<div class='context-tx1-block darkmode-txt'>
						<span>Code</span>
					</div>
					<div class='context-tx2-block darkmode-txt'>
						<span>RPCS3's GitHub community is always hard at work developing, implementing and deploying new features and ideas for the project. GitHub allows us to keep our project accessible, free and most importantly, open-source. GitHub enables us to review contributions, approve of them and implement seamlessly. Anyone and everyone is able to view the project's source, modify it, compile it locally and distribute under the GNU GPL 2.0</span>
					</div>
					<a href="https://github.com/RPCS3/rpcs3" target="_blank">
					<div class='context-btn-block'>
						<span>Git</span>
					</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="content-con-feature-a darkmode-feature">
		<div class="content-con-outer">
			<div class="content-con-inner">
				<div class="content-con-wrapper">
					<div class='content-con-wrap-left'>
						<div class="content-wrp-tease override-hide" style='left: 180px; top: -115px'>
							<div class='content-con-tease' style="; transform: scale(.5); background: url('/img/thumbs/featured/1.jpg') no-repeat center center !important; background-size: cover !important;">
							</div>
						</div>
						<div class="content-wrp-tease override-hide" style='right: 240px; top: -200px;'>
							<div class='content-con-tease' style=" transform: scale(.85); background: url('/img/thumbs/featured/2.jpg') no-repeat center center !important; background-size: cover !important;">
							</div>
						</div>
						<div class="content-wrp-tease override-hide" style='right: 200px; bottom: -168px;'>
							<div class='content-con-tease' style=" transform: scale(.5); background: url('/img/thumbs/featured/3.jpg') no-repeat center center !important; background-size: cover !important;">
							</div>
						</div>
						<div class="content-wrp-tease override-hide" style='left: 172px; top: 400px;'>
							<div class='content-con-tease' style="transform: scale(.7); background: url('/img/thumbs/featured/4.jpg') no-repeat center center !important; background-size: cover !important;">
							</div>
						</div>
						<div class="content-wrp-tease override-hide" style='right: 390px; top: 104px;'>
							<div class='content-con-tease' style=" transform: scale(.65); background: url('/img/thumbs/featured/5.jpg') no-repeat center center !important; background-size: cover !important;">
							</div>
						</div>
					</div>
				</div>
				<div class='content-con-wrap-left content-expand'>
					<div class='video-con-container'>
						<div class="video-btn-player-b page-video-2">
						</div>
						<div class="video-ico-platform">
						</div>
						<div class='video-img-thumb' style="background: url('/img/thumbs/videos/2.jpg') no-repeat center center !important; background-size: cover !important;">
						</div>
					</div>
				</div>
				<div class='content-con-wrap-right content-remove'>
					<div class="content-txt-wrap scale-content-txt-2">
						<div class="content-tx1-wrap content-txt-wrap-invert darkmode-txt2">
							<span>Here's What We've Been Working On</span>
						</div>
						<div class="content-tx2-wrap content-txt-wrap-invert darkmode-txt2">
							<span>In just a year we've made great strides, thanks to our supporters and contributors. Our core developers have been hard at work bringing some of the biggest and baddest PlayStation 3 titles closer to becoming playable.</span>
							
							<div class='content-btn-container'>
							<a href="https://www.youtube.com/channel/UCz3-0QxNr4S4gK0xaWy7exQ/videos" target="_blank">
							<div class='content-btn-general'>
								<div class='content-btn-icon' style="background: url('/img/icons/context/youtube.png') no-repeat center;"></div>
								<span>Our Channel</span>
							</div>
							</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="content-con-feature-c">
		<div class='content-txt-ad darkmode-txt'>
			<span>ADVERTISEMENT</span>
		</div>
		<div class="content-con-ad darkmode-ad div-css-context-ad">
			<div style="text-align: center; top: 20px; position: relative; z-index:2;">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js">
						</script>
				<ins class="adsbygoogle" data-ad-client="ca-pub-9076246674760451" data-ad-slot="1835527222" style="display:inline-block;width:728px;height:90px"></ins>
				<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
		</div>
	</div>
	<div class="content-con-feature-d darkmode-header-patreon">
		<div class="content-con-outer">
			<div class="content-con-inner">
				<div id='patreon-con-block-a' class="context-alg-block darkmode-context override-hide">
					<div class="patreon-tx1-title">
						<span>&#36;2,000</span>
					</div>
					<div class="patreon-tx1-block darkmode-txt">
						<span>Goal Reached</span>
					</div>
					<div class="patreon-tx2-block darkmode-txt">
						<span>We thank you for your continued support! With this goal reached, our lead developer, Nekotekina will be able to purchase better computer hardware for development and testing. This ensures even faster development and testing times by allowing his workflow to become more efficient and faster than ever before thanks to modern hardware.</span>
					</div>
					<div class="patreon-btn-block noevent">
						<div class="patreon-btn-arrow">
						</div>
					</div>
				</div>
				<div id='patreon-con-block-a' class="context-alg-block darkmode-context override-hide">
					<div class="patreon-tx1-title">
						<span>&#36;3,000</span>
					</div>
					<div class="patreon-tx1-block darkmode-txt">
						<span>Goal Reached</span>
					</div>
					<div class="patreon-tx2-block darkmode-txt">
						<span>We thank you for your continued support! With this goal reached, our core graphics programmer, kd-11 will be able to join our core developer, Nekotekina in working full-time on the emulator. This ensures even faster development and testing for all RSX orientated features for the emulator.</span>
					</div>
					<div class="patreon-btn-block noevent">
						<div class="patreon-btn-arrow">
						</div>
					</div>
				</div>
				<div id='patreon-con-block-a' class="darkmode-context override-promote">
					<div class="patreon-tx1-title">
						<span>&#36;4,000</span>
					</div>
					<div class="patreon-tx1-block darkmode-txt">
						<span>Current Goal</span>
					</div>
					<div class="patreon-tx2-block darkmode-txt">
						<span>Let's shoot for a new high score! With your continued support, our core graphics developer, kd-11 will be able to purchase substantially better computer hardware dedicated to debugging and developing for the GPU related portions of the emulator. This ensures swift development and detailed testing of the features we plan to implement listed on our roadmap.</span>
					</div>
					<a href="https://www.patreon.com/Nekotekina" target="_blank">
					<div class='patreon-btn-block'>
						<span>Become a Patron</span>
					</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="content-con-feature-a darkmode-feature">
		<div class="content-con-outer">
			<div class="content-con-inner">
				<div class='content-con-wrap-left content-remove'>
					<div class="content-txt-wrap scale-content-txt-3">
						<div class="content-tx1-wrap content-txt-wrap-invert darkmode-txt2">
							<span>Featured Community Gameplay Videos</span>
						</div>
						<div class="content-tx2-wrap content-txt-wrap-invert darkmode-txt2">
							<span>Fraudulent console emulators have clouded the public eye in the impossibility of PlayStation 3 emulation and the ability to emulate the console without a high-end computer. RPCS3 stands true as development progresses, system requirements become lower and more games become a playable reality.</span>
							<div class='content-btn-container'>
							<a href="https://discord.gg/Nr6TBes" target="_blank">
							<div class='content-btn-general'>
							<div class='content-btn-icon' style="background: url('/img/icons/context/discord.png') no-repeat center;"></div>
								<span>Submit Yours</span>
							</div>
							</a>
							</div>
						</div>
					</div>
				</div>
				<div class="content-con-wrapper">
					<div class='content-con-wrap-right'>
						<div class="content-wrp-tease override-hide" style='left: 270px; top: -115px'>
							<div class='content-con-tease' style="; transform: scale(.5); background: url('/img/thumbs/videos/4.jpg') no-repeat center center !important; background-size: cover !important;">
								<div class='video-btn-player-b noevent'>
								</div>
							</div>
						</div>
						<div class="content-wrp-tease override-hide" style='right: 140px; top: -98px;'>
							<div class='content-con-tease' style=" transform: scale(.85); background: url('/img/thumbs/videos/5.jpg') no-repeat center center !important; background-size: cover !important;">
								<div class='video-btn-player-b noevent'>
								</div>
							</div>
						</div>
						<div class="content-wrp-tease override-hide" style='left: 200px; bottom: -185px;'>
							<div class='content-con-tease' style=" transform: scale(.8); background: url('/img/thumbs/videos/6.jpg') no-repeat center center !important; background-size: cover !important;">
								<div class='video-btn-player-b noevent'>
								</div>
							</div>
						</div>
						<div class="content-wrp-tease override-hide" style='right: 216px; top: 330px;'>
							<div class='content-con-tease' style="transform: scale(.55); background: url('/img/thumbs/videos/7.jpg') no-repeat center center !important; background-size: cover !important;">
								<div class='video-btn-player-b noevent'>
								</div>
							</div>
						</div>
						<div class="content-wrp-tease override-hide" style='left: 466px; top: 89px;'>
							<div class='content-con-tease' style=" transform: scale(.55); background: url('/img/thumbs/videos/8.jpg') no-repeat center center !important; background-size: cover !important;">
								<div class='video-btn-player-b noevent'>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class='content-con-wrap-right content-expand'>
					<div class='video-con-container'>
						<div class="video-btn-player-b page-video-3">
						</div>
						<div class="video-ico-platform">
						</div>
						<div class='video-img-thumb' style="background: url('/img/thumbs/videos/3.jpg') no-repeat center center !important; background-size: cover !important;">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="content-con-feature-b darkmode-feature">
		<div class="content-con-overlay darkmode-header" style=" opacity: 0.9;">
		</div>
		<div class="content-con-outer">
			<div class="content-con-inner">
				<div id='context-con-block' class="context-alg-block darkmode-context override-promote">
					<div class='context-ico-block' style="background: #4c5bd7 url('/img/icons/context/quickstart-h.png') no-repeat center center !important; background-size: 42px !important;">
					</div>
					<div class='context-tx1-block darkmode-txt'>
						<span>Quickstart</span>
					</div>
					<div class='context-tx2-block darkmode-txt'>
						<span>Ready to give RPCS3 a shot? Before you get started using the emulator, we highly recommend that you read over our Quickstart guide. Please take in account that the requirements for running RPCS3 are still not fully known and are subject to change during its current development stage. We aim to optimize our software as much as possible.</span>
					</div>
					<a href="/quickstart">
					<div class="context-btn-block darkmode-txt">
						<span>Read More</span>
					</div>
					</a>
				</div>
				<div id='context-con-block' class="context-alg-block darkmode-context override-hide">
					<div class='context-ico-block' style="background: #4c5bd7 url('/img/icons/context/faqs-h.png') no-repeat center center !important; background-size: 42px !important;">
					</div>
					<div class='context-tx1-block darkmode-txt'>
						<span>FAQs</span>
					</div>
					<div class='context-tx2-block darkmode-txt'>
						<span>Are you a little hesitant? Have some questions about RPCS3? Look no further; our frequently asked questions page is designed to answer any RPCS3 related questions you may have. The FAQs page covers everything from a little of the project's history, to our licensing plan, to what controllers and input devices are currently compatible with the emulator.</span>
					</div>
					<a href="/faq">
					<div class="context-btn-block darkmode-txt">
						<span>Read More</span>
					</div>
					</a>
				</div>
				<div id='context-con-block' class="darkmode-context override-hide">
					<div class='context-ico-block' style="background: #4c5bd7 url('/img/icons/context/roadmap-h.png') no-repeat center center !important; background-size: 42px !important;">
					</div>
					<div class='context-tx1-block darkmode-txt'>
						<span>Roadmap</span>
					</div>
					<div class='context-tx2-block darkmode-txt'>
						<span>This project is never-ending. RPCS3's development will inevitably go on forever. In the meantime, we've set out a month-to-month roadmap that showcases the goals we wish to reach for that specific month. Keep in mind, anyone and everyone is open to developing an implementation for any listed roadmap feature. See our <a href='https://github.com/RPCS3/rpcs3/wiki' target="_blank">GitHub</a> wiki.</span>
					</div>
					<a href="/roadmap">
					<div class="context-btn-block darkmode-txt">
						<span>Read More</span>
					</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<?php include 'lib/module/ui-main-footer.php';?>
</div>
</body>
</html>