<?php
if(!@include_once("lib/compat/inc.history.php")) throw new Exception("Compat: inc.history.php is missing. Failed to include inc.history.php");

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
<title>RPCS3 - Compatibility List</title>
<meta charset=UTF-8>
<meta name="description" content="RPCS3 is an open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows and Linux.">
<meta name="keywords" content="rpcs3, ps3, PlayStation 3, emulator, nekotekina, compatibility list">
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
		<div id='header-con-overlay'>
		</div>
		<div id='header-con-body'>
			<div id='header-tx1-body'>
				<h1>
				<?php 
					$get = obtainGet();
					if (isset($_GET['h']))     { echo "HISTORY"; } 
					elseif (isset($_GET['b'])) { echo "BUILDS"; } 
					elseif (isset($get['a']))  { echo "DEBUG PANEL"; }
					else                       { echo "COMPATIBILITY"; }
				?>
				</h1>
			</div>
			<div id='header-tx2-body'>
				<p>
					<?php 
					if (isset($_GET['h']))     { echo "History of the updates made to the compatibility list"; } 
					elseif (isset($_GET['b'])) { echo "History of RPCS3 Windows builds per merged pull request"; }
					elseif (isset($get['a']))  { echo "Super cool compatibility list debug control panel"; }
					else                       { echo "There are currently ".countGames('all', 0)." games listed in our database"; } 
					?>
					
				</p>
			</div>
		</div>
	</div>
	<?php 
	if (isset($_GET['h']))     { include 'lib/compat/pages/history.php'; }
	elseif (isset($_GET['b'])) { include 'lib/compat/pages/builds.php'; }
	elseif (isset($get['a']))  { include 'lib/compat/pages/panel.php'; }
	else                       { include 'lib/compat/pages/compatibility.php'; }
	?>
	<!-- End -->
	<?php include 'lib/module/ui-footer.php';?>
	<!-- End -->
	</body>
	</html>
<?php } ?>