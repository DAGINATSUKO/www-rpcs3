<!doctype html>
<html lang="en-US">
<head>
<title>RPCS3 - Roadmap</title>
<meta charset="utf-8">
<meta name="description" content="RPCS3 is a multi-platform open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows, Linux and BSD.">
<meta name="keywords" content="rpcs3, playstation, playstation 3, ps3, emulator, debugger, windows, linux, bsd, open source, nekotekina, kd11, roadmap">
<meta name="author" content="RPCS3">
<meta name="copyright" content="RPCS3">
<?php include 'lib/module/sys-meta.php';?>
<?php include 'lib/module/sys-css.php';?>
<?php include 'lib/module/sys-js.php';?>
</head>
<body>
<?php include 'lib/module/sys-php.php';?>
<div class="page-con-content">
	<div class="banner-con-container darkmode-header">
		<div id="object-particles">
		</div>
		<div class="wavebar-con-container">
			<div class="wavebar-con-wrap">
			  <div class="wavebar-svg-object"></div>
			  <div class="wavebar-svg-object"></div>
			</div>
		</div>
		<div class="banner-con-backdrop darkmode-header">
		</div>
		<div class='banner-con-title fade-up-onstart'>
			<div class='banner-tx1-title fade-up-onstart pulsate'>
				<h1>Roadmap</h1>
			</div>
			<div class='banner-tx2-title fade-up-onstart'>
				<p>
					 A structured roadmap for continuous development
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
<?php include 'lib/module/ui-main-footer.php';?>
</body>
</html>
