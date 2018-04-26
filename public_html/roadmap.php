<!DOCTYPE html>
<html lang="en-US">
<head>
<title>RPCS3 - Roadmap</title>
<meta charset="UTF-8">
<meta name="description" content="RPCS3 is an open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows and Linux.">
<meta name="keywords" content="rpcs3, ps3, PlayStation 3, emulator, nekotekina, roadmap">
<meta name="author" content="RPCS3">
<meta name="copyright" content="RPCS3">
<meta name="google-site-verification" content="cO1o6sx54cvKxhbnYsABWtl4sYFj9uVKV0DxLKZkWv8"/>
<?php include 'lib/module/call-meta.php';?>
<?php include 'lib/module/call-sys.php';?>
<link rel="stylesheet" href="/lib/css/external/roadmap.css"/>
</head>
<body>
<?php include 'lib/module/call-php.php';?>
<div class="page-con-content">
	<div class="header-con-head">
		<div class="header-img-head">
		</div>
		<div class="header-con-overlay darkmode-header">
		</div>
		<div class='header-con-body fade-up-onstart'>
			<div class='header-tx1-body fade-up-onstart'>
				<span>Roadmap</span>
			</div>
			<div class='header-tx2-body fade-up-onstart'>
				<p>
					 Structured roadmap for RPCS3 development
				</p>
			</div>
		</div>
	</div>
	<div class="page-con-container">
		<div class="page-in-container div-css-roadmap-git darkmode-block">
			<?php
				if (file_exists('cache/roadmap_cached.php')) {
					include 'cache/roadmap_cached.php';
				} else {
					$content = file_get_contents("https://github.com/RPCS3/rpcs3/wiki/Roadmap");
					if ($content) {
						$start = "<div id=\"wiki-body\" class=\"wiki-body gollum-markdown-content instapaper_body\">
			"; $end = "
		</div>
		"; echo explode($end, explode($start, $content)[1])[0]; } } ?>
	</div>
</div>
</div>
<?php include 'lib/module/ui-footer.php';?>
</body>
</html>