<!DOCTYPE html>
<html lang="en-US">
<head>
<title>RPCS3 - Roadmap</title>
<meta charset="UTF-8">
<meta name="description" content="RPCS3 is an open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows and Linux. It is powered by OpenGL, Vulkan and DirectX 12. All development is made possible with our contributors and core developers.">
<meta name="keywords" content="rpcs3, ps3, PlayStation 3, emulator, nekotekina, roadmap">
<meta name="author" content="RPCS3">
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
		<div id='header-con-overlay-a'>
		</div>
		<div id='header-con-overlay-b'>
		</div>
		<div id='header-con-body'>
			<div id='header-tx1-body'>
				<h1>ROADMAP</h1>
			</div>
			<div id='header-tx2-body'>
				<p>
					Structured roadmap for RPCS3 development
				</p>
			</div>
		</div>
	</div>
	<div id="page-con-container">
		<div id="page-in-container" class="div-roadmap-git">
			<?php
			$content = file_get_contents("https://github.com/RPCS3/rpcs3/wiki/Roadmap");
			// Check for error fetching the page: if (!$content) { echo "something"; }
			$first_step = explode("<div id=\"wiki-body\" class=\"wiki-body gollum-markdown-content instapaper_body\">", $content); 
			$second_step = explode("</div>" , $first_step[1]); 
			echo "<div id=\"wiki-body\" class=\"wiki-body gollum-markdown-content instapaper_body\">"; 
			echo $second_step[0]; echo "</div></div>"; 
			?>
	</div>
</div>
<!-- End -->
<?php include 'lib/module/ui-footer.php';?>
<!-- End -->
</div>
</body>
</html>