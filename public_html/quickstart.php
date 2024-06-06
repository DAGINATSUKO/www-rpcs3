<!doctype html>
<html lang="en-US">
<head>
<title>RPCS3 - Quickstart</title>
<meta charset="utf-8">
<meta name="description" content="Hardware requirements for RPCS3 may vary depending on your system. We cannot guarantee the performance of system specifications below the recommended requirements, but you're welcome to experiment.">
<meta name="keywords" content="rpcs3, playstation, playstation 3, ps3, emulator, debugger, windows, linux, macos, freebsd, open source, nekotekina, kd11, quickstart">
<?php include 'lib/module/sys-meta.php';?>
<meta property="og:title" content="RPCS3 - Quickstart"/>
<meta property="og:description" content="Hardware requirements for RPCS3 may vary depending on your system. We cannot guarantee the performance of system specifications below the recommended requirements, but you're welcome to experiment."/>
<meta property="og:image" content="/img/meta/mobile/1200.png"/>
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="630"/>
<meta property="og:url" content="https://rpcs3.net"/>
<meta property="og:locale" content="en_US"/>
<meta property="og:type" content="website"/>
<meta property="og:site_name" content="RPCS3"/>
<meta name="twitter:title" content="RPCS3 - Quickstart">
<meta name="twitter:description" content="Hardware requirements for RPCS3 may vary depending on your system. We cannot guarantee the performance of system specifications below the recommended requirements, but you're welcome to experiment.">
<meta name="twitter:image" content="/img/meta/mobile/1200.png">
<meta name="twitter:site" content="@rpcs3">
<meta name="twitter:creator" content="@rpcs3">
<meta name="twitter:card" content="summary_large_image">
<?php include 'lib/module/sys-css.php';?>
<?php include 'lib/module/sys-js.php';?>
<?php
if (@include_once("lib/compat/objects/Build.php"))
	$build = Build::get_latest();
?>
</head>
<body>
<?php include 'lib/module/sys-global.php';?>
<?php include 'lib/module/menu/inc-menu-quickstart.php';?>
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
		<div class='banner-con-title fade-up-onstart'>
			<div class='banner-tx1-title fade-up-onstart pulsate'>
				<h1>Quickstart</h1>
			</div>
			<div class='banner-con-divider'>
			</div>
			<div class="banner-tx2-title fade-up-onstart">
				<p>
					 Get RPCS3 up and running on your PC, Mac or handheld
				</p>
			</div>
		</div>
	</div>
	<div class="page-con-container">
		<div class="page-in-container">
			<?php include 'lib/module/quickstart/inc-quickstart-device-inputs.php';?>
		</div>
	</div>
	<div class="page-con-content darkmode-slimbar" style="background:#f7f7f7">
		<div class="page-con-container">
			<div class="page-in-container">
				<?php include 'lib/module/quickstart/inc-quickstart-device-requirement.php';?>
			</div>
		</div>
	</div>
	<div class="page-con-content">
		<div class="page-con-container">
			<div class="page-in-container">
				<?php include 'lib/module/quickstart/inc-quickstart-device-laptop.php';?>
			</div>
		</div>
	</div>
	<div class="page-con-content darkmode-slimbar" style="background:#f7f7f7">
		<div class="page-con-container">
			<div class="page-in-container">
				<?php include 'lib/module/quickstart/inc-quickstart-device-mac.php';?>
			</div>
		</div>
	</div>
	<div class="page-con-content">
		<div class="page-con-container">
			<div class="page-in-container">
				<?php include 'lib/module/quickstart/inc-quickstart-device-handheld.php';?>
			</div>
		</div>
	</div>
	<div class="page-con-content darkmode-slimbar" style="background:#f7f7f7">
		<div class="page-con-container">
			<div class="page-in-container">
				<?php include 'lib/module/quickstart/inc-quickstart-software-download.php';?>
			</div>
		</div>
	</div>
	<div class="page-con-content">
		<div class="page-con-container">
			<div class="page-in-container">
				<?php include 'lib/module/quickstart/inc-quickstart-software-interface.php';?>
			</div>
		</div>
	</div>
	<div class="page-con-content darkmode-slimbar" style="background:#f7f7f7">
		<div class="page-con-container">
			<div class="page-in-container">
				<?php include 'lib/module/quickstart/inc-quickstart-software-setup.php';?>
			</div>
		</div>
	</div>
	<div class="page-con-content">
		<div class="page-con-container">
			<div class="page-in-container">
				<?php include 'lib/module/quickstart/inc-quickstart-software-dirs.php';?>
		</div>
	</div>
	<div class="page-con-content darkmode-slimbar" style="background:#f7f7f7">
		<div class="page-con-container">
			<div class="page-in-container">
				<?php include 'lib/module/quickstart/inc-quickstart-dumping-devices.php';?>				
			</div>
		</div>
	</div>
	<div class="page-con-content">
		<div class="page-con-container">
			<div class="page-in-container">
				<?php include 'lib/module/quickstart/inc-quickstart-dumping-drives.php';?>
			</div>
		</div>
	</div>
	<div class="page-con-content darkmode-slimbar" style="background:#f7f7f7">
		<div class="page-con-container">
			<div class="page-in-container">
				<?php include 'lib/module/quickstart/inc-quickstart-dumping-tools.php';?>
			</div>
		</div>
	</div>
</div>
<?php include 'lib/module/inc-footer.php';?>
</body>
</html>