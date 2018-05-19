<!DOCTYPE html>
<html lang="en-US">
<head>
<title>RPCS3 - Download</title>
<meta charset="UTF-8">
<meta name="description" content="RPCS3 is an open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows and Linux.">
<meta name="keywords" content="rpcs3, ps3, playstation 3, emulator, nekotekina, download">
<meta name="author" content="RPCS3">
<meta name="copyright" content="RPCS3">
<?php include 'lib/module/sys-meta.php';?>
<?php include 'lib/module/sys-css.php';?>
<?php include 'lib/module/sys-js.php';?>
</head>
<body>
<?php include 'lib/module/sys-php.php';?>
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
		<div class="header-con-diffuse">
		</div>
		<div class='header-con-body fade-up-onstart'>
			<div class='header-tx1-body fade-up-onstart'>
				<span>Download</span>
			</div>
			<div class='header-tx2-body fade-up-onstart'>
				<p>
					 Download the latest binaries, source code and public docs
				</p>
			</div>
		</div>
	</div>
	<div class="page-con-container">
		<div class="page-in-container">
			<div class="container-tx1-heading div-css-heading darkmode-txt">
				<h2>Important Information</h2>
			</div>
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<h2>Experimental Binaries</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p class="download-desc">
							 RPCS3 is still in its early stages of development and the binaries we produce are highly experimental. Do not expect stable performance or consistent compatibility as changes are always being made to the codebase. If you come across any regressions upon a new release, please be sure to report your findings on our forum. <br>
							<br>
							 If you're a Linux user, please note that RPCS3 is packaged using the AppImage format. To run, execute<span class="txt-highlight darkmode-highlight">chmod a+x ./rpcs3-*_linux64.AppImage && ./rpcs3-*_linux64.AppImage</span>
						</p>
					</div>
				</div>
			</div>
			<div class='panel-con-wrapper'>
				<a href='/quickstart'>
				<div class="panel-con-container div-css-panel-center div-css-button-enabled darkmode-panel">
					<div class='panel-ico-container darkmode-invert' style="background: url('/img/icons/list/faq.png') no-repeat center;">
					</div>
					<div class="panel-tx1-heading darkmode-txt">
						<p>
							 See the Quickstart guide for system requirements
						</p>
					</div>
				</div>
				</a>
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
					<div class='build-tx1-spec'>
						<div class='build-img-spec darkmode-invert' style="background: url('/img/icons/buttons/sha.png') no-repeat center; background-size:16px;">
						</div>
						<span class="darkmode-txt">SHA-256</span>
					</div>
					<div class="build-tx2-spec">
						<span class="darkmode-txt">
						<?php echo $win[4];?>
						</span>
					</div>
				</div>
				<div class="build-con-wrapper">
					<div class='build-tx1-spec'>
						<div class='build-img-spec darkmode-invert' style="background: url('/img/icons/buttons/github.png') no-repeat center; background-size:16px;">
						</div>
						<span class="darkmode-txt">
						Pull Request</span>
					</div>
					<div class="build-tx2-spec">
						<span class="darkmode-txt">
						#<?php echo $win[3];?>
						 by <?php echo $win[2];?>
						</span>
					</div>
				</div>
				<div class="build-con-wrapper">
					<div class='build-tx1-spec'>
						<div class='build-img-spec darkmode-invert' style="background: url('/img/icons/buttons/size.png') no-repeat center; background-size:16px;">
						</div>
						<span class="darkmode-txt">
						File Size</span>
					</div>
					<div class="build-tx2-spec">
						<span class="darkmode-txt">
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
				<h2>Build Catalog</h2>
			</div>
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<h2>Complete Build Catalog</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p>
							 With every new compiled binary RPCS3.net saves a record and stores it in our build catalog. The build catalog allows you browse and download every compiled build recorded by our system as well as view useful metadata for each build such as file size, SHA, author and the commit it was compiled from.
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
					Browse Build Catalog</span>
				</div>
			</div>
			</a>
			<div class="container-tx1-heading div-css-heading darkmode-txt">
				<h2>Download Website</h2>
			</div>
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<h2>Website Source Code</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p>
							 Downloading the website source allows you to clone, fork or contribute any enhancements via GitHub. RPCS3.net is licensed under the GNU General Public License v2.0. Its core developed and maintained by <a href='https://github.com/DAGINATSUKO'>DAGINATSUKO</a>, while the compatibility database is developed and maintained by <a href='https://github.com/AniLeo'>AniLeo</a>.
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
					View Core Repository</span>
				</div>
			</div>
			</a>
			<a href='https://github.com/AniLeo/rpcs3-compatibility' target="_blank">
			<div class='download-con-container darkmode-panel'>
				<div class='download-ico-container' style="background: url('/img/icons/buttons/compat-h.png') no-repeat center;">
				</div>
				<div class='download-tx1-heading'>
					<span class="darkmode-txt">
					View Compatibility List Repository</span>
				</div>
			</div>
			</a>
			<div class="container-tx1-heading div-css-heading darkmode-txt">
				<h2>Download Press Kit</h2>
			</div>
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<h2>Press Kit and Documentation</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p>
							 Our press kit enables those who wish to promote the project and its development through digital media. We provide high resolution assets that include objects such as our official logo, major PC platforms and public hardware documentation. All information found in the press kit was obtained by collecting and reviewing data from various sources around the web.
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
	<?php include 'lib/module/ui-main-footer.php';?>
</div>
</body>
</html>