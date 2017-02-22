<!-- 
RPCS3.net Compatibility List by AniLeo
https://github.com/AniLeo
2017.01.22 
-->
<?php
$s_sortby 		= '';
$s_pageresults 	= '';
$s_descontainer = '';
$s_charsearch 	= '';
$s_tableheaders = '';
$s_tablecontent = '';
$s_pagescounter = '';
if(!@include("lib/compat/core.php")) throw new Exception("Compat: core is missing. Failed to include core.php");
?>
<!--End -->
<!DOCTYPE html>
<html lang="en-US">
<head>
<!-- Data Metadata -->
<title>RPCS3 - Compatibility List</title>
<meta charset=UTF-8>
<meta name="description" content="RPCS3 is an open-source Sony PlayStation 3 emulator written in C++ for Windows and Linux.">
<meta name="keywords" content="rpcs3, ps3, PlayStation 3, emulator, nekotekina, compatibility list">
<meta name="author" content="RPCS3">
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
		<div id='header-img-head' class="dynamic-banner fade-onload">
		</div>
		<div id='header-con-overlay'>
		</div>
		<div id='header-con-body-b'>
			<div id='header-tx1-body-b'>
				<h1>COMPATIBILITY</h1>
			</div>
			<div id='header-tx2-body-b'>
				<p>There are currently <?php echo $games ?> games listed in our database</p>
			</div>
		</div>
	</div>
	<div id="page-con-container">
		<div id="page-in-container">
			<!--End -->			
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="compat-title">
						<h1>RPCS3 Compatibility List</h1>
					</div>
					<div id='featured-tx2-block' class="compat-desc">
						<p>These are the current compatible games that have been tested with the emulator. This list is subject to change frequently. Be sure to check this page often to follow the latest progressions and possible regressions.</p>
					</div>
				</div>				
<!--End -->
			<div id="compat-hdr-right">
				<p>Sort By - <?php echo $s_sortby; ?></p>
			</div>
			<div id="compat-hdr-left">
				<p>Results per page - <?php echo $s_pageresults; ?></p>
			</div>
<!--End -->
			<div id="compat-con-container">
				<?php echo $s_descontainer; ?>
			</div>
<!--End -->

			<div id='compat-con-searchbox'>
				<form action="" method="get" id="searchbox-field">
					<div id='searchbox'>
						<?php echo '<input id="searchbox-field" name="sf" type="" value="';  if($sf != "" && $scount[0] > 0) {echo $sf;} echo '" placeholder="Game Title / Game ID" />'; ?>
					</div>
					<div id='submit'>
						<button class='div-button' type="submit">
							<div id='submit'></div>
						</button>
					</div>
				</form>
			</div>

<!--End -->
			<table id="compat-con-search">
				<tr> <?php echo $s_charsearch; ?> </tr>
			</table>
<!--End -->	
			</div>
		<table class='compat-con-container'>
			<tr> <?php echo $s_tableheaders; ?> </tr>					
			<?php echo $s_tablecontent; ?>
		</table>
<!--End -->
		<div id="compat-con-pages">
			<p class="div-pagecounter"> <?php echo $s_pagescounter; ?> </p>
		</div>
		<div id="compat-con-author">
			<div id="compat-tx1-author">
				<p>Compatibility list coded by <a href='https://github.com/AniLeo' target="_blank">AniLeo</a>&nbsp; - &nbsp;<?php echo 'Page generated in '.$total_time.' seconds'; ?></p>
			</div>
		</div>
<!--End -->
	</div>
</div>
<!--End -->
<!-- Page Footer -->
<?php include 'lib/module/ui-footer.php';?>
<!-- Page End -->
</body>
</html>