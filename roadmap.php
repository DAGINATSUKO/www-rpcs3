<!-- 
RPCS3.net website by DAGINATSUKO
https://github.com/daginatsuko
2017.01.22 
-->
<!DOCTYPE html>
<html lang="en-US">
<head>
<!-- Metadata -->
<title>RPCS3 - Roadmap</title>
<meta charset="UTF-8">
<meta name="description" content="RPCS3 is an open-source Sony PlayStation®3 emulator and debugger written in C++ for Windows. It is powered by OpenGL, Vulkan and DirectX 12. RPCS3's development is made possible with our contributors and core developers.">
<meta name="keywords" content="rpcs3, ps3, PlayStation®3, emulator, nekotekina, roadmap">
<meta name="author" content="RPCS3">
<!-- Metadata -->
<link rel="icon" type="image/png" href="/img/icons/meta/favicon.png">
<link rel="apple-touch-icon-precomposed" href="/img/icons/meta/57.png" sizes="57x57"/>
<link rel="apple-touch-icon-precomposed" href="/img/icons/meta/72.png" sizes="72x72"/>
<link rel="apple-touch-icon-precomposed" href="/img/icons/meta/114.png" sizes="114x114"/>
<link rel="apple-touch-icon-precomposed" href="/img/icons/meta/144.png" sizes="144x144"/>
</head>
<?php include 'lib/module/call-sys.php';?>
<?php include 'lib/module/call-php.php';?>
<body>
<!-- Content -->
<div id="page-con-content">
	<div id="header-con-head">
		<div id='header-img-head' class="dynamic-banner fade-onload">
		</div>
		<div id='header-con-overlay'>
		</div>
		<div id='header-con-body-b'>
			<div id='header-tx1-body-b'>
				 <h1>ROADMAP</h1>
			</div>
			<div id='header-tx2-body-b'>
				 <p>Structured roadmap for RPCS3 development</p>
			</div>
		</div>
	</div>
	<div id="page-con-container">
		<div id="page-in-container" class="div-roadmap-git">
			<?php
			$content = file_get_contents("https://github.com/RPCS3/rpcs3/wiki/Roadmap");
			$first_step = explode('<div id="wiki-body" class="wiki-body gollum-markdown-content instapaper_body">', $content);
			$second_step = explode("</div>" , $first_step[1]);
			echo '<div id="wiki-body" class="wiki-body gollum-markdown-content instapaper_body">';
			echo $second_step[0];
			echo "</div></div>";
			?>
		</div>
	</div>
	<!-- Page Footer -->
	<?php include 'lib/module/ui-footer.php';?>
	<!-- Page End -->
</div>
</body>
</html>