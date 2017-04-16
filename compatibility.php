<?php
if(!@include("lib/compat/core.php")) throw new Exception("Compat: core is missing. Failed to include core.php");

if (isset($_GET['h']) & isset($_GET['rss'])) { echo getHistoryRSS(); } 
else {
?>
<!-- 
RPCS3.net Compatibility List by AniLeo
https://github.com/AniLeo
2017.01.22 
-->
<!--End -->
<!DOCTYPE html>
<html lang="en-US">
<head>
<!-- Data Metadata -->
<title>RPCS3 - Compatibility List</title>
<meta charset=UTF-8>
<meta name="description" content="RPCS3 is an open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows and Linux. It is powered by OpenGL, Vulkan and DirectX 12. All development is made possible with our contributors and core developers.">
<meta name="keywords" content="rpcs3, ps3, PlayStation 3, emulator, nekotekina, compatibility list">
<meta name="author" content="RPCS3">
<meta name="google-site-verification" content="cO1o6sx54cvKxhbnYsABWtl4sYFj9uVKV0DxLKZkWv8"/>
<!-- Data Metadata -->
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
		<div id='header-img-head' class="dynamic-banner">
		</div>
		<div id='header-con-overlay-a'>
		</div>
		<div id='header-con-overlay-b'>
		</div>
		<div id='header-con-body'>
			<div id='header-tx1-body'>
				<h1>
				<?php 
					if (isset($_GET['h'])) { echo "HISTORY"; } 
					elseif (isset($_GET['b'])) { echo "BUILDS"; } 
					else { echo "COMPATIBILITY"; }
				?>
				</h1>
			</div>
			<div id='header-tx2-body'>
				<p>
					<?php 
					if (isset($_GET['h']))     { echo "History of the updates made to the compatibility list"; } 
					elseif (isset($_GET['b'])) { echo "History of RPCS3 Windows builds per merged pull request"; }
					else                       { echo "There are currently {$games} games listed in our database"; } 
					?>
					
				</p>
			</div>
		</div>
	</div>
	<?php 
	if (isset($_GET['h'])) { include 'lib/compat/history.php'; }
	elseif (isset($_GET['b'])) { include 'lib/compat/builds.php'; }
	else { include 'lib/compat/compatibility.php'; }
	?>
	<!--End -->
	<!-- Page Footer -->
	<?php include 'lib/module/ui-footer.php';?>
	<!-- Page End -->
	</body>
	</html>
<?php } ?>