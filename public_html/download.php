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
	$linux_button = ''; // Does not disable Linux button
	// 0 - URL, 1 - Version Name, 2 - Author, 3 - PR, 4 - Checksum, 5 - File Size (MB)
	$win = getLatestWindowsBuild();
	// 0 - Filename; 1 - Date
	$linux = getLatestLinuxBuild();
} else {
	$linux_button = ' div-button-disabled'; // Disables Linux button
	$win[0] = 'https://ci.appveyor.com/project/rpcs3/rpcs3/branch/master/artifacts';
	$win[1] = 'Latest version';
	$linux[0] = 'Temporarily unavailable';
	$linux[1] = 'https://github.com/RPCS3/rpcs3/releases';
}
?>
<div id="page-con-content">
	<div id="header-con-head">
		<div id='header-img-head' class="dynamic-banner">
		</div>
		<div id='header-con-overlay' class="darkmode-header">
		</div>
		<div id='header-con-body'>
			<div id='header-tx1-body'>
				<span>Download</span>
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
			<div id="featured-tx1-heading" class="div-heading darkmode-txt">
				<h2>Download Information</h2>
			</div>
			<div id='featured-con-block' class="darkmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="darkmode-txt">
						<h2 class="download-title">Latest Build</h2>
					</div>
					<div id='featured-tx2-block' class="darkmode-txt">
						<p class="download-desc">
							 Because RPCS3 is still in a very early stage, we only provide nightly builds. Those are compiled using AppVeyor CI while Linux builds are compiled using Travis CI. These CI services allow us to deploy pre-compiled builds as soon as possible to the public. Due to the way these continuous integration services work, only Windows builds can be downloaded from AppVeyor while Linux builds are hosted on our web server. <br>
							<br>
							 For Linux users, RPCS3 is packaged using the AppImage format. To run, execute <span class="txt-highlight darkmode-highlight">chmod a+x ./rpcs3-*_linux64.AppImage && ./rpcs3-*_linux64.AppImage</span>
						</p>
					</div>
				</div>
			</div>
			<div id="featured-tx1-heading" class="div-heading darkmode-txt">
				<h2>Download Binaries</h2>
			</div>
			<a href='<?php echo $win[0]; ?>' target="_blank">
			<div id='download-con-container' class="download-con-imp darkmode-panel">
				<div id='download-ico-container' style="background: url('/img/icons/buttons/windows.png') no-repeat center;">
				</div>
				<div id='download-tx1-heading'>
					<span>
					<span class="darkmode-txt">
					Download for Windows x64 </span>
					<span class="download-define-build darkmode-txt">
					<?php echo $win[1]; ?>
					</span>
					</span>
				</div>
			</div>
			</a>
			<div id="sha-con-container">
				<div id="sha-con-wrapper">
					<div id="sha-con-details">
						<span><span class="sha-spec">SHA-256</span><?php echo $win[4];?>
						</span>
					</div>
				</div>
				<div id="sha-con-wrapper">
					<div id="sha-con-details">
						<span><span class="sha-spec">File Size</span><?php echo $win[5];?>
						 MB </span>
					</div>
				</div>
				<div id="sha-con-wrapper">
					<div id="sha-con-details">
						<span><span class="sha-spec">Pull Request</span>#<?php echo $win[3];?>
						 by <?php echo $win[2];?>
						</span>
					</div>
				</div>
				<div id="sha-con-wrapper">
					<div id="sha-con-details">
						<span><span class="sha-spec">Download Mirror</span> Download mirror not available, WIP</span>
					</div>
				</div>
			</div>
			<a href='<?php echo $linux[0]; ?>' download target="_blank">
			<div id='download-con-container' class="download-con-imp darkmode-panel <?php echo $linux_button; ?>
				 ">
				<div id='download-ico-container' style="background: url('/img/icons/buttons/linux.png') no-repeat center;">
				</div>
				<div id='download-tx1-heading'>
					<span>
					<span class="darkmode-txt">
					Download for Linux x64 </span>
					<span class="download-define-build darkmode-txt">
					<?php echo $linux[1]; ?>
					</span>
					</span>
				</div>
			</div>
			</a>
			<div id="sha-con-container">
				<div id="sha-con-wrapper">
					<div id="sha-con-details">
						<span><span class="sha-spec">SHA-256</span> SHA-256 metadata not available, WIP</span>
					</div>
				</div>
				<div id="sha-con-wrapper">
					<div id="sha-con-details">
						<span><span class="sha-spec">File Size</span> File size metadata not available, WIP</span>
					</div>
				</div>
				<div id="sha-con-wrapper">
					<div id="sha-con-details">
						<span><span class="sha-spec">Pull Request</span> Pull Request metadata not available, WIP</span>
					</div>
				</div>
				<div id="sha-con-wrapper">
					<div id="sha-con-details">
						<span><span class="sha-spec">Download Mirror</span> Download mirror not available, WIP</span>
					</div>
				</div>
			</div>
			<a href='https://rpcs3.net/compatibility?b'>
			<div id='download-con-container' class="darkmode-panel">
				<div id='download-ico-container' style="background: url('/img/icons/buttons/history.png') no-repeat center;">
				</div>
				<div id='download-tx1-heading'>
					<span>
					<span class="darkmode-txt">
					Complete Build History</span>
				</div>
			</div>
			</a>
			<div id="featured-tx1-heading" class="div-heading darkmode-txt">
				<h2>Website Source</h2>
			</div>
			<div id='featured-con-block' class="darkmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="darkmode-txt">
						<h2>Website Source</h2>
					</div>
					<div id='featured-tx2-block' class="darkmode-txt">
						<p>
							 This website was developed by <a href='https://github.com/DAGINATSUKO' target="_blank">DAGINATSUKO</a>. The compatibility list portion of this website is developed independently by <a href='https://github.com/AniLeo' target="_blank">AniLeo</a>. This website displays various trademarks and copy-written content such as videogame logos, company logos, videogame names and company names. These different trademarks and copy-written content do not belong to us and are properties of their respective owners.
						</p>
					</div>
				</div>
			</div>
			<a href='https://github.com/DAGINATSUKO/www-rpcs3' target="_blank">
			<div id='download-con-container' class="darkmode-panel">
				<div id='download-ico-container' style="background: url('/img/icons/buttons/website.png') no-repeat center;">
				</div>
				<div id='download-tx1-heading'>
					<span>
					<span class="darkmode-txt">
					Download RPCS3.net source</span>
				</div>
			</div>
			</a>
			<a href='https://github.com/AniLeo/rpcs3-compatibility' target="_blank">
			<div id='download-con-container' class="darkmode-panel">
				<div id='download-ico-container' style="background: url('/img/icons/buttons/compat.png') no-repeat center;">
				</div>
				<div id='download-tx1-heading'>
					<span>
					<span class="darkmode-txt">
					Download RPCS3.net Compatibility List source</span>
				</div>
			</div>
			</a>
			<div id="featured-tx1-heading" class="div-heading darkmode-txt">
				<h2>Press Kit</h2>
			</div>
			<div id='featured-con-block' class="darkmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="darkmode-txt">
						<h2>Press Kit and Documentation</h2>
					</div>
					<div id='featured-tx2-block' class="darkmode-txt">
						<p>
							 This Press Kit is regularly updated and is designed for advertisers and enthusiasts to have full access to high quality assets, icons, fonts and tools. All trademarks and copyright-written material found in this press kit belong to their respective owners. <br>
							<br>
							 All information found in this archive was obtained by collecting and reviewing data from various sources on the internet. These sources include but are not limited to Sony Computer Entertainment, IBM Corporation and NVIDIA corporation. This documentation covers hardware and some software aspects of the PlayStation 3.
						</p>
					</div>
				</div>
			</div>
			<a href='/cdn/press/Press Kit.zip' download>
			<div id='download-con-container' class="darkmode-panel">
				<div id='download-ico-container' style="background: url('/img/icons/buttons/presskit.png') no-repeat center;">
				</div>
				<div id='download-tx1-heading'>
					<span>
					<span class="darkmode-txt">
					Download Press Kit (132 Files)</span>
					</span>
				</div>
			</div>
			</a>
			<a href='/cdn/docs/Docs.zip' download>
			<div id='download-con-container' class="darkmode-panel">
				<div id='download-ico-container' style="background: url('/img/icons/buttons/docs.png') no-repeat center;">
				</div>
				<div id='download-tx1-heading'>
					<span>
					<span class="darkmode-txt">
					Download Documentation (19 Docs)</span>
					</span>
				</div>
			</div>
			</a>
		</div>
	</div>
	<?php include 'lib/module/ui-footer.php';?>
</div>
</body>
</html>