<!DOCTYPE html>
<html lang="en-US">
<head>
<title>RPCS3 - Download</title>
<meta charset="UTF-8">
<meta name="description" content="RPCS3 is an open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows and Linux.">
<meta name="keywords" content="rpcs3, ps3, PlayStation 3, emulator, nekotekina, download">
<meta name="author" content="RPCS3">
<meta name="copyright" content="RPCS3">
<meta name="google-site-verification" content="cO1o6sx54cvKxhbnYsABWtl4sYFj9uVKV0DxLKZkWv8"/>
<?php include 'lib/module/call-meta.php';?>
<?php include 'lib/module/call-sys.php';?>
</head>
<body>
<?php include 'lib/module/call-php.php';?>
<?php 
if (file_exists('lib/compat/utils.php')) {
	include('lib/compat/utils.php');
	// 0 - Version; 1 - Date
	$win = getLatestWindowsBuild();
	// 0 - Filename; 1 - Date
	$linux = getLatestLinuxBuild();
	
	$win_url = "https://ci.appveyor.com/project/rpcs3/rpcs3/build/{$win[0]}/artifacts";
	$win_name = "v{$win[0]} Alpha [{$win[1]}]";
	$linux_button = ''; // Does not disable Linux button
	$linux_ver = explode("-", substr($linux[0], 6), 2)[0]; // Extract everything after rpcs3- until next - appears for version indicator
	$linux_name = $linux_ver.substr($linux[0], 23)." [{$linux[1]}]"; // Display formatted filename
	$linux_url = "https://rpcs3.net/cdn/builds/{$linux[0]}";
} else {
	$win_url = 'https://ci.appveyor.com/project/rpcs3/rpcs3/branch/master/artifacts';
	$win_name = 'Latest version';
	$linux_button = ' div-button-disabled'; // Disables Linux button
	$linux_name = 'Temporarily unavailable';
	$linux_url = 'https://github.com/RPCS3/rpcs3/releases';
}
?>
<div id="page-con-content">
	<div id="header-con-head">
		<div id='header-img-head' class="dynamic-banner">
		</div>
		<div id='header-con-overlay'>
		</div>
		<div id='header-con-body'>
			<div id='header-tx1-body'>
				<span>DOWNLOAD</span>
			</div>
			<div id='header-tx2-body'>
				<p>
					 Download the latest builds, source code and documentation
				</p>
			</div>
		</div>
	</div>
	<div id="page-con-container">
		<div id="page-in-container">
			<!-- End -->
			<div id="featured-tx1-heading" class="div-heading">
				<h2>Download Binaries</h2>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2 class="download-title">Latest Build</h2>
					</div>
					<div id='featured-tx2-block'>
						<p class="download-desc">
							 Because RPCS3 is still in a very early stage, we only provide nightly builds. Those are compiled using AppVeyor CI while Linux builds are compiled using Travis CI. These CI services allow us to deploy pre-compiled builds as soon as possible to the public. Due to the way these continuous integration services work, only Windows builds can be downloaded from AppVeyor while Linux builds are hosted directly on this site. <br>
							 <br>RPCS3 for Linux uses the AppImage file format. AppImages can be downloaded and ran without an installation or the need for root rights. To run the AppImage file execute, <b class="txt-highlight">chmod a+x ./rpcs3-*_linux64.AppImage</b>
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<a href='<?php echo $win_url; ?>' target="_blank"> 
			<!-- <a href='https://ci.appveyor.com/project/rpcs3/rpcs3/branch/master/artifacts' target="_blank"> -->
			<div id='featured-con-button' class="div-download-left">
				<div id='featured-wrp-button' style="width: 244px; margin: 0 -122px;">
					<div id='featured-ico-button' style="background:url('/img/icons/buttons/windows.png') no-repeat center; background-size: 20px;">
					</div>
					<div id='featured-tx1-button' style="line-height:20px; margin-top:10px;">
						<p>
							 Download for Windows
						</p>
						<p style="font-size:12px;">
							 <?php echo $win_name; ?>
						</p>
					</div>
				</div>
			</div>
			</a>
			<!-- End -->
			<a href='<?php echo $linux_url; ?>' target="_blank">
			<div id='featured-con-button' class="div-download-right<?php echo $linux_button; ?>">
				<div id='featured-wrp-button' style="width: 344px; margin: 0 -178px;">
					<div id='featured-ico-button' style="background:url('/img/icons/buttons/linux.png') no-repeat center; background-size: 20px;">
					</div>
					<div id='featured-tx1-button' style="line-height:20px; margin-top:10px;">
						<p>
							Download for Linux
						</p>
						<p style="font-size:12px;">
							 <?php echo $linux_name; ?>
						</p>
					</div>
				</div>
			</div>
			</a>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>All Builds</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 This is the history of all Windows builds generated per pull request, compiled by AppVeyor. You can also view detailed changes for every build through the GitHub build links. In addition, you can also use our GitHub repository to download and create your own builds for testing, debugging or implementing new features.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<a href='https://rpcs3.net/compatibility?b' target="_blank">
			<div id='featured-con-button'>
				<div id='featured-wrp-button' style="width: 136px; margin: 0 -68px;">
					<div id='featured-ico-button' style="background:url('/img/icons/buttons/history.png') no-repeat center; background-size: 16px;">
					</div>
					<div id='featured-tx1-button'>
						<p>
							 Build History
						</p>
					</div>
				</div>
			</div>
			</a>
			<!-- End -->
			<div id="featured-tx1-heading" class="div-heading">
				<h2>Documentation, Press and Website Source</h2>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>Documentation and Press</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 All information found in this archive was obtained by collecting and reviewing data from various sources on the internet. These sources include but are not limited to Sony Computer Entertainment, IBM Corporation and NVIDIA corporation. This documentation covers hardware and some software aspects of the PlayStation 3. <br>
							<br>
							 This Press Kit is regularly updated and is designed for advertisers and enthusiasts to have full access to high quality assets, icons, fonts and tools. All trademarks and copyright-written material found in this press kit belong to their respective owners.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<a href='/cdn/docs/Docs.7z' download>
			<div id='featured-con-button' class="div-download-left">
				<div id='featured-wrp-button' style="width: 212px; margin: 0 -106px;">
					<div id='featured-ico-button' style="background:url('/img/icons/buttons/documentation.png') no-repeat center; background-size: 16px;">
					</div>
					<div id='featured-tx1-button'>
						<p>
							 Download Documentation
						</p>
					</div>
				</div>
			</div>
			</a>
			<!-- End -->
			<a href='/cdn/press/Press Kit.zip' download>
			<div id='featured-con-button' class="div-download-right">
				<div id='featured-wrp-button' style="width: 172px; margin: 0 -86px;">
					<div id='featured-ico-button' style="background:url('/img/icons/buttons/presskit.png') no-repeat center; background-size: 16px;">
					</div>
					<div id='featured-tx1-button'>
						<p>
							 Download Press Kit
						</p>
					</div>
				</div>
			</div>
			</a>
			<!-- End -->
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>Website Source</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 This website was developed by <a href='https://github.com/DAGINATSUKO' target="_blank">DAGINATSUKO</a>. The compatibility portion of this website is developed independently by <a href='https://github.com/AniLeo' target="_blank">AniLeo</a>. This website displays various trademarks and copy-written content such as videogame logos, company logos, videogame names and company names. These different trademarks and copy-written content do not belong to us and are properties of their respective owners.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<a href='https://github.com/DAGINATSUKO/www-rpcs3' target="_blank">
			<div id='featured-con-button' class="div-download-left">
				<div id='featured-wrp-button' style="width: 150px; margin: 0 -75px;">
					<div id='featured-ico-button' style="background:url('/img/icons/buttons/github.png') no-repeat center; background-size: 16px;">
					</div>
					<div id='featured-tx1-button'>
						<p>
							 Website Source
						</p>
					</div>
				</div>
			</div>
			</a>
			<!-- End -->
			<a href='https://github.com/AniLeo/rpcs3-compatibility' target="_blank">
			<div id='featured-con-button' class="div-download-right">
				<div id='featured-wrp-button' style="width: 180px; margin: 0 -90px;">
					<div id='featured-ico-button' style="background:url('/img/icons/buttons/github.png') no-repeat center; background-size: 16px;">
					</div>
					<div id='featured-tx1-button'>
						<p>
							 Compatibility Source
						</p>
					</div>
				</div>
			</div>
			</a>
			<!-- End -->
		</div>
	</div>
	<!-- End -->
	<?php include 'lib/module/ui-footer.php';?>
	<!-- End -->
</div>
</body>
</html>