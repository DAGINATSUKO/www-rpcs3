<!doctype html>
<html lang="en-US">
<head>
<title>RPCS3 - Roadmap</title>
<meta charset="utf-8">
<meta name="description" content="Our Roadmap is a non-exhaustive list of the current goals we aim to achieve through new developments and continuous integration, made possible with the support of our generous patrons.">
<meta name="keywords" content="rpcs3, playstation, playstation 3, ps3, emulator, debugger, windows, linux, macos, freebsd, open source, nekotekina, kd11, roadmap">
<?php include 'lib/module/sys-meta.php';?>
<meta property="og:title" content="RPCS3 - Roadmap" />
<meta property="og:description" content="Our Roadmap is a non-exhaustive list of the current goals we aim to achieve through new developments and continuous integration, made possible with the support of our generous patrons." />
<meta property="og:image" content="https://rpcs3.net/img/meta/mobile/1200.png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta property="og:url" content="https://rpcs3.net" />
<meta property="og:locale" content="en_US"/>
<meta property="og:type" content="website" />
<meta property="og:site_name" content="RPCS3" />

<meta name="twitter:title" content="RPCS3 - Roadmap">
<meta name="twitter:description" content="Our Roadmap is a non-exhaustive list of the current goals we aim to achieve through new developments and continuous integration, made possible with the support of our generous patrons.">
<meta name="twitter:image" content="https://rpcs3.net/img/meta/mobile/1200.png">
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
		<div class="banner-con-backdrop darkmode-header">
		</div>
		<div class='banner-con-title fade-up-onstart'>
			<div class='banner-tx1-title fade-up-onstart pulsate'>
				<h1>Roadmap</h1>
			</div>
			<div class='banner-con-divider'>
			</div>
			<div class='banner-tx2-title fade-up-onstart'>
				<p>
					 Goals that have been set for the project
				</p>
			</div>
		</div>
	</div>
	<div class="page-con-container">
		<div class="page-in-container">
			<div class="markdown darkmode-block">
				<?php
				if (file_exists('cache/roadmap_cached.php'))
				{
					include 'cache/roadmap_cached.php';
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php include 'lib/module/inc-footer.php';?>
</body>
</html>