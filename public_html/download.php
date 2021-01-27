<!doctype html>
<html lang="en-US">
<head>
<title>RPCS3 - Download</title>
<meta charset="utf-8">
<meta name="description" content="RPCS3 is a multi-platform open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows, Linux and BSD.">
<meta name="keywords" content="rpcs3, playstation, playstation 3, ps3, emulator, debugger, windows, linux, bsd, open source, nekotekina, kd11, download">
<meta name="author" content="RPCS3">
<meta name="copyright" content="RPCS3">
<?php include 'lib/module/sys-meta.php';?>
<?php include 'lib/module/sys-css.php';?>
<?php include 'lib/module/sys-js.php';?>
</head>
<body>
<?php include 'lib/module/sys-php.php';?>
<?php
// Compatibility utils must exist for this page to work at the moment
// TODO: Handle behavior when compatibility plugin is not present?
include 'lib/compat/objects/Build.php';
$build = Build::get_latest();
?>
<div class="page-con-content">
	<div class="banner-con-container darkmode-header">
		<div id="object-particles">
		</div>
		<div class="wavebar-con-container">
			<div class="wavebar-con-wrap">
			  <div class="wavebar-svg-object"></div>
			  <div class="wavebar-svg-object"></div>
			</div>
		</div>
		<div class='banner-con-title fade-up-onstart'>
			<div class='banner-tx1-title fade-up-onstart pulsate'>
				<h1>Download</h1>
			</div>
			<div class='banner-tx2-title fade-up-onstart'>
				<p>
					 Download the latest binaries, source code and public docs
				</p>
			</div>
		</div>
	</div>
	<div class="page-con-container">
		<div class="page-in-container">
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<h2>Latest Builds</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p class="download-desc">
							 RPCS3 is under steady development and the binaries we produce are highly experimental. System requirements may vary depending on your hardware configuration. For the best experience, users should be running within the recommended system requirements. We cannot guarantee the performance of system specifications below the minimum requirements, but you're always welcome to experiment. Do not expect stable performance or consistent compatibility as changes are always being made to the codebase.<br>
							 <br>
							 If you come across any regressions upon a new release, please be sure to report your findings on our forum. See <a href="/quickstart">Quickstart</a> for more information.

						</p>
					</div>
				</div>
			</div>
			<div class='button-con-container'>
				<a href='<?php echo $build->get_url_windows(); ?>' download>
				<div class="button-con-wrapper button-left darkmode-panel">
					<div class='button-ico-container' style="background: url('/img/icons/buttons/windows-h.png') no-repeat center;">
					</div>
					<div class="button-tx1-text pulsate darkmode-txt">
						<span>
						Download for Windows </span>
					</div>
				</div>
				</a>
				<a href='<?php echo $build->get_url_linux(); ?>' download>
				<div class="button-con-wrapper button-right darkmode-panel">
					<div class='button-ico-container' style="background: url('/img/icons/buttons/linux-h.png') no-repeat center;">
					</div>
					<div class="button-tx1-text pulsate darkmode-txt">
						<span>
						Download for Linux </span>
					</div>
				</div>
				</a>
			</div>
			<div class='label-con-container'>
				<div class="label-con-wrapper label-left darkmode-panel">
					<div class="label-tx1-title darkmode-txt">
						<span>SHA-256</span>
					</div>
					<div class='label-ico-container' style="background: url('/img/icons/buttons/sha.png') no-repeat center;">
					</div>
					<div class="label-tx1-text darkmode-txt" style="top: 8px;">
						<span>
						<?php echo $build->checksum_win; ?> </span>
					</div>
				</div>
				<div class="label-con-wrapper label-right darkmode-panel">
					<div class="label-tx1-title darkmode-txt">
						<span>SHA-256</span>
					</div>
					<div class='label-ico-container' style="background: url('/img/icons/buttons/sha.png') no-repeat center;">
					</div>
					<div class="label-tx1-text darkmode-txt" style="top: 8px;">
						<span>
						<?php echo $build->checksum_linux; ?> </span>
					</div>
				</div>
			</div>
			<div class="binary-con-container">
				<div class="binary-con-wrapper">
					<div class='binary-tx1-content'>
						<div class='binary-img-content' style="background: url('/img/icons/buttons/history.png') no-repeat center; background-size:20px;">
						</div>
						<span class="darkmode-txt">
						Version </span>
					</div>
					<div class="binary-tx2-content">
						<span class="darkmode-txt">
						<?php echo "v{$build->version} Alpha [{$build->fulldate}]"; ?> </span>
					</div>
				</div>
				<div class="binary-con-wrapper">
					<div class='binary-tx1-content'>
						<div class='binary-img-content' style="background: url('/img/icons/buttons/pull.png') no-repeat center; background-size:20px;">
						</div>
						<span class="darkmode-txt">
						Pull Request</span>
					</div>
					<div class="binary-tx2-content">
						<span class="darkmode-txt">
						<a href="<?php echo $build->get_url_pr(); ?>">#<?php echo $build->pr; ?></a>
						(<a href="<?php echo $build->get_url_commit(); ?>"><?php echo $build->get_commit_short(); ?></a>)
						by <a href="<?php echo $build->get_url_author(); ?>"><?php echo $build->author; ?></a>
						</span>
					</div>
				</div>
				<div class="binary-con-wrapper">
					<div class='binary-tx1-content'>
						<div class='binary-img-content' style="background: url('/img/icons/buttons/size.png') no-repeat center; background-size:20px;">
						</div>
						<span class="darkmode-txt">
						File Size</span>
					</div>
					<div class="binary-tx2-content">
						<span class="darkmode-txt">
						Windows: <?php echo $build->get_size_mb_windows(); ?> MB, Linux: <?php echo $build->get_size_mb_linux(); ?> MB </span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-con-content darkmode-slimbar" style="background:#f7f7f7">
	<div class="page-con-container">
		<div class="page-in-container">
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<h2>Previous Builds</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p>
							 With every new compiled binary RPCS3.net saves a record and stores it in our build catalog. The build catalog allows you browse and download every compiled build recorded by our system as well as view useful metadata for each build such as file size, SHA, author and the commit it was compiled from.
						</p>
					</div>
				</div>
			</div>
			<div class='button-con-container'>
				<a href='https://rpcs3.net/compatibility?b'>
				<div class="button-con-wrapper button-left darkmode-panel">
					<div class='button-ico-container' style="background: url('/img/icons/buttons/history-h.png') no-repeat center;">
					</div>
					<div class="button-tx1-text darkmode-txt">
						<span>
						Download Previous Builds </span>
					</div>
				</div>
				</a>
				<div class="label-con-wrapper label-right darkmode-panel">
					<div class='label-ico-container' style="background: url('/img/icons/buttons/commit.png') no-repeat center;">
					</div>
					<div class="label-tx1-text darkmode-txt">
						<span>
						For detailed changes, see <a href="https://github.com/RPCS3/rpcs3/commits/master" target="_blank">commits</a> via GitHub. </span>
					</div>
				</div>
			</div>
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<h2>For Linux Users</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p class="download-desc">
							 For Linux users, RPCS3 is packaged using the AppImage format. To run, execute <span class="highlight darkmode-highlight">chmod a+x ./rpcs3-*_linux64.AppImage &amp;&amp; ./rpcs3-*_linux64.AppImage</span>
							<br>
							<br>
							<b>Download AppImage using CLI </b><span class="highlight darkmode-highlight">wget --content-disposition https://rpcs3.net/latest-appimage</span> or <span class="highlight darkmode-highlight">curl -JLO https://rpcs3.net/latest-appimage</span>
							<br>
							<b>Compile on arch using AUR </b><span class="highlight darkmode-highlight">git clone https://aur.archlinux.org/rpcs3-git.git && cd rpcs3-git && makepkg -sri</span>
						</p>
					</div>
					</div>
					</div>
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<h2>For BSD Users</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p class="download-desc">
							 For BSD users, RPCS3 supports active FreeBSD 13 and FreeBSD 12 versions.
							 <br>
							 <br>
							 <b>Install as a package </b><span class="highlight darkmode-highlight">pkg install rpcs3</span>
							 <br>
							 <b>Compile using ports </b><span class="highlight darkmode-highlight">cd /usr/ports/emulators/rpcs3/ && make install clean</span>
						 </p>
						</p>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-con-content">
	<div class="page-con-container">
		<div class="page-in-container">
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<h2>Website Source Code</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p>
							 Downloading the website source allows you to clone, fork or contribute any enhancements via GitHub. RPCS3.net is licensed under the GNU General Public License v2.0. Its core developed and maintained by <a href='https://github.com/DAGINATSUKO' target="_blank">DAGINATSUKO</a>, while the compatibility database is developed and maintained by <a href='https://github.com/AniLeo' target="_blank">Ani</a>.
						</p>
					</div>
				</div>
			</div>
			<div class='button-con-container'>
				<a href='https://github.com/DAGINATSUKO/www-rpcs3' target="_blank">
				<div class="button-con-wrapper button-left darkmode-panel">
					<div class='button-ico-container' style="background: url('/img/icons/buttons/website-h.png') no-repeat center;">
					</div>
					<div class="button-tx1-text darkmode-txt">
						<span>
						Website Repository </span>
					</div>
				</div>
				</a>
				<a href='https://github.com/AniLeo/rpcs3-compatibility' target="_blank">
				<div class="button-con-wrapper button-right darkmode-panel">
					<div class='button-ico-container' style="background: url('/img/icons/buttons/compat-h.png') no-repeat center;">
					</div>
					<div class="button-tx1-text darkmode-txt">
						<span>
						Compatibility Repository </span>
					</div>
				</div>
				</a>
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
			<div class='button-con-container'>
				<a href='/cdn/press/Press%20Kit.zip' download>
				<div class="button-con-wrapper button-left darkmode-panel">
					<div class='button-ico-container' style="background: url('/img/icons/buttons/presskit-h.png') no-repeat center;">
					</div>
					<div class="button-tx1-text darkmode-txt">
						<span>
						Download Press Kit </span>
					</div>
				</div>
				</a>
				<a href='/cdn/docs/Docs.zip' download>
				<div class="button-con-wrapper button-right darkmode-panel">
					<div class='button-ico-container' style="background: url('/img/icons/buttons/docs-h.png') no-repeat center;">
					</div>
					<div class="button-tx1-text darkmode-txt">
						<span>
						Download Docs </span>
					</div>
				</div>
				</a>
			</div>
		</div>
	</div>
	<?php include 'lib/module/ui-main-footer.php';?>
</div>
</body>
</html>
