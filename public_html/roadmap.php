<!doctype html>
<html lang="en-US">
<head>
<title>RPCS3 - Roadmap</title>
<meta charset="utf-8">
<meta name="description" content="RPCS3 is an open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows and Linux.">
<meta name="keywords" content="rpcs3, ps3, playstation 3, emulator, nekotekina, roadmap">
<meta name="author" content="RPCS3">
<meta name="copyright" content="RPCS3">
<?php include 'lib/module/sys-meta.php';?>
<?php include 'lib/module/sys-css.php';?>
<?php include 'lib/module/sys-js.php';?>
</head>
<body>
<?php include 'lib/module/sys-php.php';?>
<div class="page-con-content">
	<div class="header-con-head darkmode-header">
		<div id="particles-js-1">
		</div>
		<div class="wavebar-con-container">
			<div class="wavebar-con-wrap">
			  <div class="wavebar-svg-object"></div>
			  <div class="wavebar-svg-object"></div>
			</div>
		</div>
		<div class="header-con-overlay darkmode-header">
		</div>
		<div class='header-con-body fade-up-onstart'>
			<div class='header-tx1-body fade-up-onstart pulsate'>
				<h1>Roadmap</h1>
			</div>
			<div class='header-tx2-body fade-up-onstart'>
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
				if (file_exists('cache/roadmap_cached.php')) {
					include 'cache/roadmap_cached.php';
				} else {
					$content = file_get_contents("https://github.com/RPCS3/rpcs3/wiki/Roadmap");
					if ($content) {
						$start = "<div id=\"wiki-body\" class=\"mt-4 flex-auto min-width-0 gollum-markdown-content instapaper_body\">
				"; $end = "
			</div>
			"; echo explode($end, explode($start, $content)[1])[0]; } } ?>
		</div>
	</div>
</div>
</div>
<?php include 'lib/module/ui-main-footer.php';?>
</body>
</html>