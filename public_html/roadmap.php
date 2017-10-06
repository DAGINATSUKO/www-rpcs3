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
</head>
<body>
<?php include 'lib/module/call-php.php';?>
<div id="page-con-content">
	<div id="header-con-head">
		<div id='header-img-head' class="dynamic-banner">
		</div>
		<div id='header-con-overlay' class="darkmode-header">
		</div>
		<div id='header-con-body'>
			<div id='header-tx1-body'>
				<span>ROADMAP</span>
			</div>
			<div id='header-tx2-body'>
				<p>
					 Structured roadmap for RPCS3 development
				</p>
			</div>
		</div>
	</div>
	<div id="page-con-container">
		<div id="page-in-container" class="div-roadmap-git darkmode-block">
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