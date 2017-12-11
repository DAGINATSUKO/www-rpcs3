<!DOCTYPE html>
<html lang="en-US">
<head>
<title>RPCS3 - PlayStation 3 Emulator</title>
<meta charset="UTF-8">
<meta content="RPCS3 is an open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows and Linux." name="description">
<meta content="rpcs3, ps3, PlayStation 3, emulator, nekotekina, home" name="keywords">
<meta content="RPCS3" name="author">
<meta content="RPCS3" name="copyright">
<meta content="cO1o6sx54cvKxhbnYsABWtl4sYFj9uVKV0DxLKZkWv8" name="google-site-verification">
<?php include 'lib/module/call-meta.php';?>
<script data-cfasync="false" src='/lib/js/external/timer.js'></script>
<?php include 'lib/module/call-sys.php';?>
</head>
<body>
<?php include 'lib/module/call-php.php';?>
<?php include 'lib/module/call-video.php'?>
<?php
	preloadVideo(
	'1',
	'q-ApI7L-Slk'
	);
	preloadVideo(
	'2',
	'q-ApI7L-Slk'
	);
	preloadVideo(
	'3',
	'Y1MaFHQVH3I'
	);
?>
<div id="page-con-content" class="page-content-override">
	<div id='page-ico-scroll' class='fade-in-sc' title="Scroll for more content">
	</div>
	<div id="page-con-feature-a" style="background:#000;">
		<div id="wavebar-con-wrapper" class="dynamic-wavebar">
			<div class="scale-wavebar-hide visual-wavebar">
			</div>
			<div class="scale-wavebar-hide visual-wavebar delayed-fade" style="display:none;">
			</div>
		</div>
		<div id='header-img-head' class="dynamic-banner">
		</div>
		<div class="darkmode-header" id='header-con-overlay'>
		</div>
		<div class="scale-offset-center">
			<div id='feature-con-wrapper' class='feature-con-wrapper-scaler-a'>
				<div id='feature-con-wrap-left' class='feature-con-wrap-left-scaler-a'>
					<div id='feature-txt-wrap'>
						<div id='feature-tx1-wrap'>
							<span>THE WORLD'S FIRST PLAYSTATION 3 EMULATOR</span>
						</div>
						<div id='feature-tx2-wrap'>
							<span>RPCS3 is an experimental open-source Sony PlayStation 3 emulator and debugger written in C++, developed with the LLVM Compiler Infrastructure project for Windows and Linux. Starting development in May of 2011, RPCS3 is capable of running over 1,300 commercial titles on top of its low-level Vulkan, OpenGL and DirectX 12 renderers.</span>
							<a href="/download">
							<div id='feature-btn-download' class="scale-override-hide" title="Download">
								<span>DOWNLOAD</span>
							</div>
							</a>
						</div>
					</div>
				</div>
				<div id='feature-con-wrap-right' class='feature-con-wrap-right-scaler-a'>
					<div id='feature-img-wrap' style="display:block; background: url(/img/icons/menu/greeting.png) no-repeat center; background-size: contain;">
					</div>
					<!-- Featured Video -->
					<div id='video-con-container' style="display:none;">
						<div class="page-video-1" id='video-btn-player-b'>
						</div>
						<div id="video-ovr-player">
						</div>
						<div id="video-con-slideshow">
							<div>
								<img id='video-con-container-thumb' src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
							<div>
								<img id='video-con-container-thumb' src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
							<div>
								<img id='video-con-container-thumb' src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
							<div>
								<img id='video-con-container-thumb' src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
							<div>
								<img id='video-con-container-thumb' src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
							<div>
								<img id='video-con-container-thumb' src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
							<div>
								<img id='video-con-container-thumb' src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
							<div>
								<img id='video-con-container-thumb' src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
							<div>
								<img id='video-con-container-thumb' src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
							<div>
								<img id='video-con-container-thumb' src="/img/thumbs/slideshow/null.jpg" style="object-fit: cover;">
							</div>
						</div>
					</div>
					<script>
					$("#video-con-slideshow > div:gt(0)").hide();
setInterval(function() {
  $('#video-con-slideshow > div:first')
    .fadeOut(768)
    .next()
    .fadeIn(768)
    .end()
    .appendTo('#video-con-slideshow');
}, 5000);
					</script>
					<!-- Timer -->
					<div id='timer-con-container' style="display:none;">
						<div id='timer-tx1-body'>
							 Synchronizing...
						</div>
						<div id='timer-con-separator'>
						</div>
						<div id='timer-con-wrapper'>
							<a href="https://discord.me/RPCS3" target="_blank">
							<div id='timer-ico-body'>
							</div>
							</a>
							<div id='timer-tx2-body'>
								<span>
								Join the discussion on </span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="page-con-feature-c" class="darkmode-feature" style="background: #000; height:120px;">
		<div id="titlesearch-ovr-container" class="darkmode-header">
		</div>
		<div id='titlesearch-con-container'>
			<div id="titlesearch-con-outer">
				<div id="titlesearch-con-inner">
					<div id="titlesearch-inp-search">
						<div id="titlesearch-ico-search">
						</div>
						<div id="titlesearch-txt-search">
							<span><span style="opacity:0.4;">Compatibility database developed and maintained by </span><span style="background: url(/img/icons/menu/code-h.png) no-repeat center; background-size: 14px; width: 18px; height: 50px; position: absolute; display: inline-block; opacity:0.4;"></span><span><a style="pointer-events: all; padding-left: 22px;" href="https://github.com/AniLeo" target="_blank" title="View AniLeo on GitHub">AniLeo</a></span></span>
						</div>
						<form action='/compatibility' method='get'>
							<input name="g" placeholder="Game Title / Game ID">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="page-con-feature-b" class="darkmode-header">
		<div id='feature-tx1-heading' style="color:#fff">
			<span>DIRECTORY</span>
		</div>
		<div id='page-img-feature' class="feature-con-wrap-invert" style="background: #000 url('/img/showcases/directory.jpg') no-repeat center center !important; background-size: cover !important;">
		</div>
		<div id='feature-con-wrapper' class="">
			<div id='content-con-block-a' class="contribute-alg-block darkmode-block scale-content-block-promote">
				<div id='content-img-overlay' class="content-img-overlay-a">
					<div id='content-ico-block' style="background: url('/img/icons/panels/progress.png') no-repeat center center !important; background-size: 240px !important;">
					</div>
					<div id='content-tx1-block'>
						<span>
						Each month we aim to put out a technical and visual progress report that showcases our latest developments and features for the project. RPCS3 has been seen by many as an impossible feat in the eyes of gamers and programmers. Fraudulent console emulators have clouded the public eye in the impossibility of PlayStation 3 emulation and the ability to emulate the console without a high-end computer. RPCS3 stands true as development progresses, system requirements become lower and more games become a playable reality.</span>
					</div>
				</div>
				<a href="https://rpcs3.net/blog/2017/11/03/progress-report-october-2017/">
				<div id='content-btn-block' title="Read Report">
					<span>READ REPORT</span>
				</div>
				</a>
				<div id='content-img-block'>
				</div>
			</div>
			<div id='content-con-block-a' class="contribute-alg-block darkmode-block scale-override-hide">
				<div id='content-img-overlay' class="content-img-overlay-b">
					<div id='content-ico-block' style="background: url('/img/icons/panels/discord.png') no-repeat center center !important; background-size: 240px !important;">
					</div>
					<div id='content-tx1-block'>
						<span>
						Join our Discord community, featuring over 22,000 members and growing for up-to-the-minute news, announcements and support in PlayStation 3 emulation. With regular interaction from our team, we aim to create a tight-knit community of emulation hobbyists and PlayStation 3 fans alike. Our server features a quick-response compatibility bot that allows users to request the status for over 2888 tested original PlayStation 3 titles. These titles include both disc-based titles and PlayStation Network titles. </span>
					</div>
				</div>
				<a href="https://discord.me/RPCS3" target="_blank">
				<div id='content-btn-block' title="Join Discussion">
					<span>JOIN DISCUSSION</span>
				</div>
				</a>
				<div id='content-img-block'>
				</div>
			</div>
			<div id='content-con-block-a' class="scale-override-hide">
				<div id='content-img-overlay' class="content-img-overlay-c">
					<div id='content-ico-block' style="background: url('/img/icons/panels/pulls.png') no-repeat center center !important; background-size: 240px !important;">
					</div>
					<div id='content-tx1-block'>
						<span>RPCS3's GitHub community is always working on developing new features, functions and ideas for the project. GitHub allows us to keep our project open, free and most importantly, accessible to developers. The GitHub platforms enables us the ability to review a contributor's changes and implement them on-the-fly after approval. Anyone and everyone is able to view the project's source, modify it, compile it locally and distribute it while obeying the GNU GPL Version 2.0 License.</span>
					</div>
				</div>
				<a href="https://github.com/RPCS3/rpcs3/pulls" target="_blank">
				<div id='content-btn-block' title="Pull Requests">
					<span>PULL REQUESTS</span>
				</div>
				</a>
				<div id='content-img-block'>
				</div>
			</div>
		</div>
	</div>
	<div id="page-con-feature-a" class="darkmode-feature">
		<div id='feature-tx1-heading' style="color:#fff" class="feature-txt-wrap-invert darkmode-txt2">
			<span>FEATURED</span>
		</div>
		<div id='page-img-feature' class="feature-con-wrap-invert" style="background: url('/img/thumbs/videos/2.jpg') no-repeat center center !important; background-size: cover !important;">
		</div>
		<div class='scale-offset-center'>
			<div id='feature-con-wrapper' class='feature-con-wrapper-scaler-a'>
				<div id='feature-con-wrap-left' class='feature-con-wrap-left-scaler-a'>
					<div class="feature-wrp-tease scale-override-hide" style='left: 213px; top: -115px'>
						<div id='feature-con-tease' style="; transform: scale(.5); background: url('/img/thumbs/games/1.jpg') no-repeat center center !important; background-size: cover !important;">
						</div>
					</div>
					<div class="feature-wrp-tease scale-override-hide" style='right: 202px; top: -178px;'>
						<div id='feature-con-tease' style=" transform: scale(.85); background: url('/img/thumbs/games/2.jpg') no-repeat center center !important; background-size: cover !important;">
						</div>
					</div>
					<div class="feature-wrp-tease scale-override-hide" style='right: 200px; bottom: -168px;'>
						<div id='feature-con-tease' style=" transform: scale(.5); background: url('/img/thumbs/games/3.jpg') no-repeat center center !important; background-size: cover !important;">
						</div>
					</div>
					<div class="feature-wrp-tease scale-override-hide" style='left: 225px; top: 340px;'>
						<div id='feature-con-tease' style="transform: scale(.7); background: url('/img/thumbs/games/4.jpg') no-repeat center center !important; background-size: cover !important;">
						</div>
					</div>
					<div class="feature-wrp-tease scale-override-hide" style='right: 390px; top: 104px;'>
						<div id='feature-con-tease' style=" transform: scale(.65); background: url('/img/thumbs/games/5.jpg') no-repeat center center !important; background-size: cover !important;">
						</div>
					</div>
					<div id='video-con-container'>
						<div class="page-video-2" id='video-btn-player-b'>
						</div>
						<div id="video-ovr-player">
						</div>
						<div id="video-ico-uploader">
						</div>
						<div id="video-txt-uploader">
							<span>By RPCS3</span>
						</div>
						<div id='video-con-container-thumb' style="background: url('/img/thumbs/videos/2.jpg') no-repeat center center !important; background-size: cover !important;">
						</div>
					</div>
				</div>
				<div id='feature-con-wrap-right' class='feature-con-wrap-right-scaler-a'>
					<div id='feature-txt-wrap'>
						<div id='feature-tx1-wrap' class="feature-txt-wrap-invert darkmode-txt2">
							<span>UNVEILING A SLEW OF EXCLUSIVE INGAME TITLES<span>
						</div>
						<div id='feature-tx2-wrap' class="feature-txt-wrap-invert darkmode-txt2">
							<span>In nearly a year we've made great strides, thanks to our supporters and contributors. Our core developers have been hard at work bringing some of the biggest and baddest PlayStation 3 titles closer to becoming playable. Here's what we've accomplished:</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="page-con-feature-c">
		<div id='featured-txt-ad' class="darkmode-txt-txt">
			<span>AD</span>
		</div>
		<div class="darkmode-ad div-content-ad" id='featured-con-ad'>
			<div style="text-align: center; top: 20px; position: relative; z-index:2;">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js">
						</script>
				<!-- Ad -->
				<ins class="adsbygoogle" data-ad-client="ca-pub-9076246674760451" data-ad-slot="1835527222" style="display:inline-block;width:728px;height:90px"></ins>
				<script>
						                  (adsbygoogle = window.adsbygoogle || []).push({});
						</script>
			</div>
		</div>
	</div>
	<div id="page-con-feature-d" class="darkmode-header-patreon">
		<div id='feature-tx1-heading' style="color:#fff">
			<span>PATREON</span>
		</div>
		<div id='page-img-feature' class="feature-con-wrap-invert" style="background: #000 url('/img/showcases/patreon.jpg') no-repeat center center !important; background-size: cover !important;">
		</div>
		<div id='feature-con-wrapper' class="">
			<div id='patreon-con-block-a' class="contribute-alg-block darkmode-block scale-override-hide">
				<div id='patreon-img-overlay' class="patreon-img-overlay-a">
					<div id='patreon-tx1-title' class="darkmode-txt">
						<span>$2,000</span>
					</div>
					<div id='patreon-tx1-block' class="darkmode-txt">
						<span>GOAL REACHED</span>
					</div>
					<div id='patreon-tx2-block' class="darkmode-txt">
						<span>We thank you for your continued support! With this goal reached, our lead developer, Nekotekina will be able to purchase better computer hardware for development and testing. This ensures even faster development and testing times by allowing his workflow to become more efficient and faster than ever before thanks to modern hardware.</span>
					</div>
				</div>
				<div id='patreon-btn-block' class="div-touchless">
					<div id="patreon-btn-arrow">
					</div>
				</div>
			</div>
			<div id='patreon-con-block-a' class="contribute-alg-block darkmode-block scale-override-hide">
				<div id='patreon-img-overlay' class="patreon-img-overlay-b">
					<div id='patreon-tx1-title' class="darkmode-txt">
						<span>$3,000</span>
					</div>
					<div id='patreon-tx1-block' class="darkmode-txt">
						<span>GOAL REACHED</span>
					</div>
					<div id='patreon-tx2-block' class="darkmode-txt">
						<span>We thank you for your continued support! With this goal reached, our core graphics programmer, kd-11 will be able to join our core developer, Nekotekina in working full-time on the emulator. This ensures even faster development and testing for all RSX orientated features for the emulator.</span>
					</div>
				</div>
				<div id='patreon-btn-block' class="div-touchless">
					<div id="patreon-btn-arrow">
					</div>
				</div>
			</div>
			<div id='patreon-con-block-a' class="scale-content-block-promote darkmode-block">
				<div id='patreon-img-overlay' class="patreon-img-overlay-c">
					<div id='patreon-tx1-title' class="darkmode-txt">
						<span>$4,000</span>
					</div>
					<div id='patreon-tx1-block' class="darkmode-txt">
						<span>CURRENT GOAL</span>
					</div>
					<div id='patreon-tx2-block' class="darkmode-txt">
						<span>Let's shoot for a new high score! With your continued support, our core graphics developer, kd-11 will be able to purchase substantially better computer hardware dedicated to debugging and developing for the GPU related portions of the emulator. This ensures swift development and detailed testing of the features we plan to implement listed on our roadmap.</span>
					</div>
				</div>
				<a href="https://www.patreon.com/Nekotekina" target="_blank">
				<div id='patreon-btn-block' title="Become a Patron">
					<span>BECOME A PATRON</span>
				</div>
				</a>
			</div>
		</div>
	</div>
	<div id="page-con-feature-a" class="darkmode-feature">
		<div id='feature-tx1-heading' style="color:#fff" class="feature-txt-wrap-invert darkmode-txt2">
			<span>COMMUNITY</span>
		</div>
		<div id='page-img-feature' class="feature-con-wrap-invert" style="background: url('/img/thumbs/videos/3.jpg') no-repeat center center !important; background-size: cover !important;">
		</div>
		<div class='scale-offset-center'>
			<div id='feature-con-wrapper' class='feature-con-wrapper-scaler-a'>
				<div id='feature-con-wrap-left' class='feature-con-wrap-left-scaler-a scale-offset-txt-a'>
					<div id='feature-txt-wrap' class="scale-offset-txt-b">
						<div id='feature-tx1-wrap' class="feature-txt-wrap-invert darkmode-txt2">
							<span>SHOWCASING TRUE PROGRESS</span>
						</div>
						<div id='feature-tx2-wrap' class="feature-txt-wrap-invert darkmode-txt2">
							<span>Fraudulent console emulators have clouded the public eye in the impossibility of PlayStation 3 emulation and the ability to emulate the console without a high-end computer. RPCS3 stands true as development progresses, system requirements become lower and more games become a playable reality.</span>
							<div id='feature-btn-general' class="darkmode-buttons-general scale-override-hide" title="Coming Soon">
								<span>COMING SOON</span>
							</div>
						</div>
					</div>
				</div>
				<div id='feature-con-wrap-right' class='feature-con-wrap-right-scaler-a'>
					<div class="feature-wrp-tease scale-override-hide" style='left: 213px; top: -115px'>
						<div id='feature-con-tease' style="; transform: scale(.5); background: url('/img/thumbs/videos/4.jpg') no-repeat center center !important; background-size: cover !important;">
							<div id='video-btn-player-b' class="div-touchless">
							</div>
						</div>
					</div>
					<div class="feature-wrp-tease scale-override-hide" style='right: 202px; top: -98px;'>
						<div id='feature-con-tease' style=" transform: scale(.85); background: url('/img/thumbs/videos/5.jpg') no-repeat center center !important; background-size: cover !important;">
							<div id='video-btn-player-b' class="div-touchless">
							</div>
						</div>
					</div>
					<div class="feature-wrp-tease scale-override-hide" style='left: 200px; bottom: -185px;'>
						<div id='feature-con-tease' style=" transform: scale(.8); background: url('/img/thumbs/videos/6.jpg') no-repeat center center !important; background-size: cover !important;">
							<div id='video-btn-player-b' class="div-touchless">
							</div>
						</div>
					</div>
					<div class="feature-wrp-tease scale-override-hide" style='right: 216px; top: 330px;'>
						<div id='feature-con-tease' style="transform: scale(.55); background: url('/img/thumbs/videos/7.jpg') no-repeat center center !important; background-size: cover !important;">
							<div id='video-btn-player-b' class="div-touchless">
							</div>
						</div>
					</div>
					<div class="feature-wrp-tease scale-override-hide" style='left: 466px; top: 89px;'>
						<div id='feature-con-tease' style=" transform: scale(.55); background: url('/img/thumbs/videos/8.jpg') no-repeat center center !important; background-size: cover !important;">
							<div id='video-btn-player-b' class="div-touchless">
							</div>
						</div>
					</div>
					<div id='video-con-container'>
						<div class="page-video-3" id='video-btn-player-b'>
						</div>
						<div id="video-ovr-player">
						</div>
						<div id="video-ico-uploader">
						</div>
						<div id="video-txt-uploader">
							<span>By RPCS3</span>
						</div>
						<div id='video-con-container-thumb' style="background: url('/img/thumbs/videos/3.jpg') no-repeat center center !important; background-size: cover !important;">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="page-con-feature-b" class="darkmode-header">
		<div id='feature-tx1-heading' style="color:#fff">
			<span>CONTRIBUTION</span>
		</div>
		<div id='page-img-feature' class="feature-con-wrap-invert" style="background: #000 url('/img/showcases/contribute.jpg') no-repeat center center !important; background-size: cover !important;">
		</div>
		<div id='feature-con-wrapper' class="">
			<div id='content-con-block-b' class="contribute-alg-block darkmode-block scale-override-hide">
				<div id='contribute-ico-block' style="background: rgba(76, 91, 215, .1) url(/img/icons/menu/patreon.png) no-repeat center center !important; background-size: 56px !important;">
				</div>
				<div id='contribute-tx1-block' class="darkmode-txt">
					<span>PATREON</span>
				</div>
				<div id='contribute-tx2-block' class="darkmode-txt">
					<span>Our core developers and contributors are always working hard to ensure this project can be the best that it can be. The funding received from our patrons will allow our core developers to spend full-time working on the project, obtain hardware for development and testing and allow this website to exist, along with its compatibility database.</span>
				</div>
				<a href="https://www.patreon.com/Nekotekina" target="_blank">
				<div id='contribute-btn-block' class="darkmode-txt" title="Donate">
					<span>DONATE</span>
				</div>
				</a>
			</div>
			<div id='content-con-block-b' class="contribute-alg-block darkmode-block scale-content-block-promote">
				<div id='contribute-ico-block' style="background: rgba(76, 91, 215, .1) url('/img/icons/menu/code.png') no-repeat center center !important; background-size: 56px !important;">
				</div>
				<div id='contribute-tx1-block' class="darkmode-txt">
					<span>GITHUB</span>
				</div>
				<div id='contribute-tx2-block' class="darkmode-txt">
					<span>When developing a complex project, new contributors are always welcome. You can start contributing by forking the project for personal use and then proceed on to reading the wiki, notes, coding style and developer information sections. It's up to you to find something you want to add, improve or implement within the project.</span>
				</div>
				<a href="https://github.com/RPCS3/rpcs3" target="_blank">
				<div id='contribute-btn-block' class="darkmode-txt" title="Code">
					<span>CODE</span>
				</div>
				</a>
			</div>
			<div id='content-con-block-b' class="darkmode-block scale-override-hide">
				<div id='contribute-ico-block' style="background: rgba(76, 91, 215, .1) url('/img/icons/menu/testing.png') no-repeat center center !important; background-size: 56px !important;">
				</div>
				<div id='contribute-tx1-block' class="darkmode-txt">
					<span>TESTING</span>
				</div>
				<div id='contribute-tx2-block' class="darkmode-txt">
					<span>We all want to be able to play our favorite games far into the future. Whether it's for preservation, or for the sake of nostalgia, emulation accuracy ensures that titles will run the same as they do on original hardware. To ensure this, we need to do a lot of testing and a lot of reporting. This is where you come in.</span>
				</div>
				<a href="https://forums.rpcs3.net" target="_blank">
				<div id='contribute-btn-block' class="darkmode-txt" title="Reporting">
					<span>FORUMS</span>
				</div>
				</a>
			</div>
		</div>
	</div>
	<div id="page-con-feature-a" class="darkmode-feature">
		<div id='feature-tx1-heading' style="color:#fff" class="feature-txt-wrap-invert darkmode-txt2">
			<span>DISCLAIMER</span>
		</div>
		<div id='page-img-feature' class="feature-con-wrap-invert" style="background: #000 url('/img/showcases/disclaimer.jpg') no-repeat center center !important; background-size: cover !important;">
		</div>
		<div id='feature-con-wrapper' class='feature-con-wrapper-scaler-c'>
			<div id='feature-con-wrap-right' class='feature-con-wrap-right-scaler-c'>
			</div>
			<div id='feature-con-wrap-left' class='feature-con-wrap-left-scaler-c'>
				<div id='feature-txt-wrap'>
					<div id='feature-tx1-wrap' class="feature-txt-wrap-invert darkmode-txt2">
						<span>THIS IS FOR THE PLAYERS, NOT THE PIRATES</span>
					</div>
					<div id='feature-tx2-wrap' class="feature-txt-wrap-invert darkmode-txt2">
						<span>RPCS3 is not designed to enable illegal activity. When dumping video game software, users are subject to country-specific software distribution laws. Please take the time to review copyright and video game software dumping laws and/or policies for your country before proceeding. Remember, the best way to play PlayStation 3 games is to play them on original hardware, for now.</span>
						<a href="/disclaimer">
						<div id='feature-btn-general' class="darkmode-buttons-general" title="Disclaimer">
							<span>DISCLAIMER</span>
						</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="page-con-feature-b" class="darkmode-header">
		<div id='feature-tx1-heading' style="color:#fff">
			<span>GET STARTED</span>
		</div>
		<div id='page-img-feature' class="feature-con-wrap-invert" style="background: #000 url('/img/showcases/getstarted.jpg') no-repeat center center !important; background-size: cover !important;">
		</div>
		<div id='feature-con-wrapper' class="">
			<div id='content-con-block-b' class="contribute-alg-block darkmode-block scale-content-block-promote">
				<div id='contribute-ico-block' style="background: rgba(76, 91, 215, .1) url('/img/icons/menu/quickstart.png') no-repeat center center !important; background-size: 56px !important;">
				</div>
				<div id='contribute-tx1-block' class="darkmode-txt">
					<span>QUICKSTART</span>
				</div>
				<div id='contribute-tx2-block' class="darkmode-txt">
					<span>Ready to give RPCS3 a shot? Great! Before you get started, we highly recommend that you read over our quickstart guide. Please take in account that the requirements for running RPCS3 are still not fully known and are subject to change during its current development stage. We aim to optimize our software as much as possible.</span>
				</div>
				<a href="/quickstart">
				<div id='contribute-btn-block' class="darkmode-txt" title="Start">
					<span>START</span>
				</div>
				</a>
			</div>
			<div id='content-con-block-b' class="contribute-alg-block darkmode-block scale-override-hide">
				<div id='contribute-ico-block' style="background: rgba(76, 91, 215, .1) url('/img/icons/menu/faqs.png') no-repeat center center !important; background-size: 56px !important;">
				</div>
				<div id='contribute-tx1-block' class="darkmode-txt">
					<span>FAQs</span>
				</div>
				<div id='contribute-tx2-block' class="darkmode-txt">
					<span>Are you a little hesitant? Have some questions about RPCS3? Look no further; our frequently asked questions page is designed to answer any RPCS3 related questions you may have. The FAQs page covers everything from a little of the project's history, to our licensing plan, to what controllers and input devices are currently compatible with the emulator.</span>
				</div>
				<a href="/faq">
				<div id='contribute-btn-block' class="darkmode-txt" title="Get Answers">
					<span>GET ANSWERS</span>
				</div>
				</a>
			</div>
			<div id='content-con-block-b' class="darkmode-block scale-override-hide">
				<div id='contribute-ico-block' style="background: rgba(76, 91, 215, .1) url('/img/icons/menu/roadmap.png') no-repeat center center !important; background-size: 56px !important;">
				</div>
				<div id='contribute-tx1-block' class="darkmode-txt">
					<span>ROADMAP</span>
				</div>
				<div id='contribute-tx2-block' class="darkmode-txt">
					<span>This project is never-ending. RPCS3's development will inevitably go on forever. In the meantime, we've set out a month-to-month roadmap that showcases the goals we wish to reach for that specific month. Keep in mind, anyone and everyone is open to developing an implementation for any listed roadmap feature. See our <a href='https://github.com/RPCS3/rpcs3/wiki' target="_blank">GitHub</a> wiki.</span>
				</div>
				<a href="/roadmap">
				<div id='contribute-btn-block' class="darkmode-txt" title="See Roadmap">
					<span>SEE ROADMAP</span>
				</div>
				</a>
			</div>
		</div>
	</div>
	<?php include 'lib/module/ui-footer.php';?>
</div>
</body>
</html>