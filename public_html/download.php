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
	$linux_button = ' div-css-button-disabled'; // Disables Linux button
	$win[0] = 'https://ci.appveyor.com/project/rpcs3/rpcs3/branch/master/artifacts';
	$win[1] = 'Latest version';
	$linux[0] = 'Temporarily unavailable';
	$linux[1] = 'https://github.com/RPCS3/rpcs3/releases';
}
?>
<div class="page-con-content">
	<div class="header-con-head">
		<div class="header-img-head">
		</div>
		<div class="header-con-overlay darkmode-header">
		</div>
		<div class='header-con-body'>
			<div class='header-tx1-body'>
				<span>Download</span>
			</div>
			<div class='header-tx2-body'>
				<p>
					 Download the latest builds, source code and documentation
				</p>
			</div>
		</div>
	</div>
	<div class="page-con-container">
		<div class="page-in-container">
			<div class="container-tx1-heading div-css-heading darkmode-txt">
				<h2>Download Information</h2>
			</div>
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<h2>Latest Build</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p class="download-desc">
							 Because RPCS3 is still in a very early stage, we only provide nightly builds. Those are compiled using AppVeyor CI while Linux builds are compiled using Travis CI. These CI services allow us to deploy pre-compiled builds as soon as possible to the public. Due to the way these continuous integration services work, only Windows builds can be downloaded from AppVeyor while Linux builds are hosted on our web server. <br>
							<br>
							 For Linux users, RPCS3 is packaged using the AppImage format. To run, execute <span class="txt-highlight darkmode-highlight">chmod a+x ./rpcs3-*_linux64.AppImage && ./rpcs3-*_linux64.AppImage</span>
						</p>
					</div>
				</div>
			</div>
			<div class="container-tx1-heading div-css-heading darkmode-txt">
				<h2>Download Binaries</h2>
			</div>
			<a href='<?php echo $win[0]; ?>' target="_blank">
			<div class="download-con-container darkmode-panel">
				<div class='download-ico-container' style="background: url('/img/icons/buttons/windows-h.png') no-repeat center;">
				</div>
				<div class='download-tx1-heading'>
					<span>
					<span class="darkmode-txt">
					Download for Windows </span>
					<span class="download-define-build darkmode-txt">
					<?php echo $win[1]; ?>
					</span>
					</span>
				</div>
			</div>
			</a>
			<div class="build-con-container">
				<div class="build-con-wrapper">
					<div class='build-tx1-spec darkmode-contribute'>
						<div class='build-img-spec' style="background: url('/img/icons/buttons/sha-h.png') no-repeat center; background-size:16px;">
						</div>
						<span>SHA-256</span>
					</div>
					<div class="build-tx2-spec darkmode-contribute">
						<span>
						<?php echo $win[4];?>
						</span>
					</div>
				</div>
				<div class="build-con-wrapper">
					<div class='build-tx1-spec darkmode-contribute'>
						<div class='build-img-spec' style="background: url('/img/icons/buttons/github-h.png') no-repeat center; background-size:16px;">
						</div>
						<span>
						Pull Request</span>
					</div>
					<div class="build-tx2-spec darkmode-contribute">
						<span>
						#<?php echo $win[3];?>
						 by <?php echo $win[2];?>
						</span>
					</div>
				</div>
				<div class="build-con-wrapper">
					<div class='build-tx1-spec darkmode-contribute'>
						<div class='build-img-spec' style="background: url('/img/icons/buttons/size-h.png') no-repeat center; background-size:16px;">
						</div>
						<span>
						File Size</span>
					</div>
					<div class="build-tx2-spec darkmode-contribute">
						<span>
						<?php echo $win[5];?>
						 MB </span>
					</div>
				</div>
			</div>
			<a href='<?php echo $linux[0]; ?>' download target="_blank">
			<div class="download-con-container download-con-imp darkmode-panel <?php echo $linux_button; ?>
				 ">
				<div class='download-ico-container' style="background: url('/img/icons/buttons/linux-h.png') no-repeat center;">
				</div>
				<div class='download-tx1-heading'>
					<span>
					<span class="darkmode-txt">
					Download for Linux </span>
					<span class="download-define-build darkmode-txt">
					<?php echo $linux[1]; ?>
					</span>
					</span>
				</div>
			</div>
			</a>
			<div class="container-tx1-heading div-css-heading darkmode-txt">
				<h2>Build History</h2>
			</div>
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<h2>Previous Builds</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p>
							 When a newer build a released it is replaced and the previous build is archived in our build history database. This database records all previous builds which can be individually downloaded or compiled locally with their respective pull request ID links. We also archive useful metrics for previous builds such as the pull request ID, pull request author, lines of code added and deleted and sha256 signatures.
						</p>
					</div>
				</div>
			</div>
			<a href='https://rpcs3.net/compatibility?b'>
			<div class='download-con-container darkmode-panel'>
				<div class='download-ico-container' style="background: url('/img/icons/buttons/history-h.png') no-repeat center;">
				</div>
				<div class='download-tx1-heading'>
					<span class="darkmode-txt">
					All Builds</span>
				</div>
			</div>
			</a>
			<div class="container-tx1-heading div-css-heading darkmode-txt">
				<h2>Website Source</h2>
			</div>
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<h2>Website Source</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p>
							 This website was developed by <a href='https://github.com/DAGINATSUKO' target="_blank">DAGINATSUKO</a>. The compatibility list portion of this website is developed independently by <a href='https://github.com/AniLeo' target="_blank">AniLeo</a>. This website displays various trademarks and copy-written content such as videogame logos, company logos, videogame names and company names. These different trademarks and copy-written content do not belong to us and are properties of their respective owners.
						</p>
					</div>
				</div>
			</div>
			<a href='https://github.com/DAGINATSUKO/www-rpcs3' target="_blank">
			<div class='download-con-container darkmode-panel'>
				<div class='download-ico-container' style="background: url('/img/icons/buttons/website-h.png') no-repeat center;">
				</div>
				<div class='download-tx1-heading'>
					<span class="darkmode-txt">
					Download Core</span>
				</div>
			</div>
			</a>
			<a href='https://github.com/AniLeo/rpcs3-compatibility' target="_blank">
			<div class='download-con-container darkmode-panel'>
				<div class='download-ico-container' style="background: url('/img/icons/buttons/compat-h.png') no-repeat center;">
				</div>
				<div class='download-tx1-heading'>
					<span class="darkmode-txt">
					Download Compatibility List</span>
				</div>
			</div>
			</a>
			<div class="container-tx1-heading div-css-heading darkmode-txt">
				<h2>Press Kit</h2>
			</div>
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<h2>Press Kit and Documentation</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p>
							 This Press Kit is regularly updated and is designed for advertisers and enthusiasts to have full access to high quality assets, icons, fonts and tools. All trademarks and copyright-written material found in this press kit belong to their respective owners. <br>
							<br>
							 All information found in this archive was obtained by collecting and reviewing data from various sources on the internet. These sources include but are not limited to Sony Computer Entertainment, IBM Corporation and NVIDIA corporation. This documentation covers hardware and some software aspects of the PlayStation 3.
						</p>
					</div>
				</div>
			</div>
			<a href='/cdn/press/Press%20Kit.zip' download>
			<div class='download-con-container darkmode-panel'>
				<div class='download-ico-container' style="background: url('/img/icons/buttons/presskit-h.png') no-repeat center;">
				</div>
				<div class='download-tx1-heading'>
					<span class="darkmode-txt">
					Download Press Kit </span>
				</div>
			</div>
			</a>
			<a href='/cdn/docs/Docs.zip' download>
			<div class='download-con-container darkmode-panel'>
				<div class='download-ico-container' style="background: url('/img/icons/buttons/docs-h.png') no-repeat center;">
				</div>
				<div class='download-tx1-heading'>
					<span class="darkmode-txt">
					Download Documentation </span>
				</div>
			</div>
			</a>
		</div>
	</div>
	<?php include 'lib/module/ui-footer.php';?>
</div>
</body>
</html>