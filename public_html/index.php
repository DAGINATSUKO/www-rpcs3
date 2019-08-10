<!doctype html>
<html lang="en-US">
<head>
<title>RPCS3 - PlayStation 3 Emulator</title>
<meta charset="utf-8">
<meta name="description" content="RPCS3 is an open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows and Linux.">
<meta name="keywords" content="rpcs3, ps3, playstation 3, emulator, nekotekina, home">
<meta name="author" content="RPCS3">
<meta name="copyright" content="RPCS3">
<meta name="google-site-verification" content="cO1o6sx54cvKxhbnYsABWtl4sYFj9uVKV0DxLKZkWv8"/>
<?php include 'lib/module/sys-meta.php';?>
<?php include 'lib/module/sys-css.php';?>
<?php include 'lib/module/sys-js.php';?>
<script data-cfasync="false" src='/lib/js/timer.js'></script>
<script data-cfasync="false" src='/lib/js/particles.js'></script>
<script data-cfasync="false" src='/lib/js/particles-sel.js'></script>
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
	'kOBKXcn-yQg'
	);
	preloadVideo(
	'3',
	'BZq3Z3oJHTc'
	);
	if (file_exists('lib/compat/objects/Build.php')) {
		include('lib/compat/objects/Build.php');
		$win = Build::getLast();
		$ver = "v{$win->version} Alpha [{$win->fulldate}]";
	} else {
		$ver = "";
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
						<div class='content-ico-wrap'>
						</div>
						<div class='content-tx1-wrap pulsate'>
							<h1>Open-source<br>
							 PlayStation 3 Emulator</h1>
						</div>
						<div class='content-tx2-wrap'>
							<p>
								 RPCS3 is an experimental open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows and Linux. RPCS3 began development in May of 2011 by its founders, DH and Hykem.
							</p>
							<div class='content-btn-container'>
								<a href="/download">
								<div class='content-btn-download'>
									<span>Download</span>
									<span class="content-tx1-download">
									<?php echo $ver; ?>
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
							<span>
							Synchronizing... </span>
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
							<span><span class="mobile-titlesearch" style="opacity:0.4;">Compatibility database developed and maintained by </span><span style="background: url(/img/icons/buttons/github-h.png) no-repeat center; background-size: 14px; width: 18px; height: 50px; position: absolute; display: inline-block; opacity:0.4;"></span><span><a style="pointer-events: all; padding-left: 22px;" href="https://github.com/AniLeo" target="_blank">AniLeo</a></span></span>
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
						<h3>Progress</h3>
					</div>
					<div class='context-tx2-block darkmode-txt'>
						<p>
							 Each month we aim to publish a technical and visual progress report that showcases our latest progress completed by our developers and talented contributors. Similarly to most emulator projects we want to be as open as possible with our progress. Showcasing performance, graphical and quality-of-life improvements in great detail is our goal. We believe this is the best way to keep our fans and followers interested in the project.
						</p>
					</div>
					<a href="https://rpcs3.net/blog">
					<div class='context-btn-block'>
						<span>Read Latest</span>
					</div>
					</a>
				</div>
				<div id='context-con-block' class="context-alg-block darkmode-context override-hide">
					<div class='context-ico-block' style="background: #4c5bd7 url('/img/icons/context/discord-h.png') no-repeat center center !important; background-size: 200px !important;">
					</div>
					<div class='context-tx1-block darkmode-txt'>
						<h3>Community</h3>
					</div>
					<div class='context-tx2-block darkmode-txt'>
						<p>
							 Join our Discord community featuring over 37,000 members for project announcements, developer interaction and emulator configuration support. With regular interaction from our team, we aim to create a tight-knit community of emulation hobbyists and PlayStation 3 fans alike. Our server features a custom designed compatibility bot that allows users to request, then fetch the status for over 2800 tested PlayStation 3 titles.
						</p>
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
						<h3>Code</h3>
					</div>
					<div class='context-tx2-block darkmode-txt'>
						<p>
							 RPCS3's GitHub community is always hard at work developing, implementing and deploying new features and ideas for the project. GitHub allows us to keep our project accessible, free and most importantly, open-source. GitHub enables us to review contributions, approve of them and implement seamlessly. Anyone and everyone is able to view the project's source, modify it, compile it locally and distribute under the GNU GPL 2.0
						</p>
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
							<h2>Here's What We've Been Working On</h2>
						</div>
						<div class="content-tx2-wrap content-txt-wrap-invert darkmode-txt2">
							<p>
								 While our core developers are hard at work perfecting the emulator, we've had many great developers from all over the world contribute to the codebase, which has lead to astonishing progress in performance, accuracy and quality of life. We thank each and everyone of you.
							</p>
							<div class='content-btn-container'>
								<a href="https://www.youtube.com/channel/UCz3-0QxNr4S4gK0xaWy7exQ/videos" target="_blank">
								<div class='content-btn-general'>
									<div class='content-btn-icon' style="background: url('/img/icons/context/youtube.png') no-repeat center;">
									</div>
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
			<span>Advertisement</span>
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
						<h3>Goal Reached</h3>
					</div>
					<div class="patreon-tx2-block darkmode-txt">
						<p>
							 We thank you for your continued support! With this goal reached, our lead developer, Nekotekina will be able to purchase better computer hardware for development and testing. This ensures even faster development and testing times by allowing his workflow to become more efficient and faster than ever before thanks to modern hardware.
						</p>
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
						<h3>Goal Reached</h3>
					</div>
					<div class="patreon-tx2-block darkmode-txt">
						<p>
							 We thank you for your continued support! With this goal reached, our core graphics programmer, kd-11 will be able to join our core developer, Nekotekina in working full-time on the emulator. This ensures even faster development and testing for all RSX orientated features for the emulator.
						</p>
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
						<h3>Current Goal</h3>
					</div>
					<div class="patreon-tx2-block darkmode-txt">
						<p>
							 Let's shoot for a new high score! With your continued support, our core graphics developer, kd-11 will be able to purchase substantially better computer hardware dedicated to debugging and developing for the GPU related portions of the emulator. This ensures swift development and detailed testing of the features we plan to implement listed on our roadmap.
						</p>
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
							<h2>Featured Community Gameplay Videos</h2>
						</div>
						<div class="content-tx2-wrap content-txt-wrap-invert darkmode-txt2">
							<p>
								 Sometimes things can be too good to be true. We understand. Especially when it comes to emulating a machine as technically complex as the PlayStation 3. If you're not sold on the legitimacy of the project, just check out some of the hundreds of videos captured by our community.
							</p>
							<div class='content-btn-container'>
								<a href="https://discord.gg/Nr6TBes" target="_blank">
								<div class='content-btn-general'>
									<div class='content-btn-icon' style="background: url('/img/icons/context/discord.png') no-repeat center;">
									</div>
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
						<h3>Quickstart</h3>
					</div>
					<div class='context-tx2-block darkmode-txt'>
						<p>
							 Before getting started, we highly recommend that you review our Quickstart guide to get a brief understanding of how the software works and what you need to get it performing optimally on your system. Basic system requirements must be met and performance may vary depending on your systems specifications. Our Quickstart guide also lends users instructions on dumping their own titles from their own consoles.
						</p>
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
						<h3>FAQs</h3>
					</div>
					<div class='context-tx2-block darkmode-txt'>
						<p>
							 If you have any questions about the project, you can visit our frequently asked questions page. This page is designed to answer any common questions relating to the project that you may have. The page covers everything from the emulator's long-term history to what controllers and input devices are currently compatible with the emulator. If you still have any further questions, don't hesitate to reach out to us through <a href="https://discord.me/RPCS3">Discord</a>.
						</p>
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
						<h3>Roadmap</h3>
					</div>
					<div class='context-tx2-block darkmode-txt'>
						<p>
							 RPCS3 is a continuous project that will remain in development for many years to come. In the meantime, our current core developers have devised a structured roadmap that showcases the various goals we wish to complete throughout its development. These goals are categorized into 4 structured groups based on developer priority. These groups are short-term, medium-term, long-term and for developers.
						</p>
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
