<!doctype html>
<html lang="en-US">
<head>
<title>RPCS3 - Download</title>
<meta charset="utf-8">
<meta name="description" content="RPCS3 is under steady development and the binaries we produce are highly experimental. Your system requirements may vary depending on your hardware configuration.">
<meta name="keywords" content="rpcs3, playstation, playstation 3, ps3, emulator, debugger, windows, linux, macos, freebsd, open source, nekotekina, kd11, download">
<?php include 'lib/module/sys-meta.php';?>
<meta property="og:title" content="RPCS3 - Download" />
<meta property="og:description" content="RPCS3 is under steady development and the binaries we produce are highly experimental. Your system requirements may vary depending on your hardware configuration." />
<meta property="og:image" content="https://rpcs3.net/img/meta/mobile/1200.png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta property="og:url" content="https://rpcs3.net" />
<meta property="og:locale" content="en_US"/>
<meta property="og:type" content="website" />
<meta property="og:site_name" content="RPCS3" />

<meta name="twitter:title" content="RPCS3 - Download">
<meta name="twitter:description" content="RPCS3 is under steady development and the binaries we produce are highly experimental. Your system requirements may vary depending on your hardware configuration.">
<meta name="twitter:image" content="https://rpcs3.net/img/meta/mobile/1200.png">
<meta name="twitter:site" content="@rpcs3">
<meta name="twitter:creator" content="@rpcs3">
<meta name="twitter:card" content="summary_large_image">
<?php include 'lib/module/sys-css.php';?>
<?php include 'lib/module/sys-js.php';?>
</head>
<body>
<?php include 'lib/module/sys-php.php';?>
<?php
if (@include_once("lib/compat/objects/Build.php"))
	$build = Build::get_latest();
?>
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
				<h1>Download</h1>
			</div>
			<div class='banner-con-divider'>
			</div>
			<div class='banner-tx2-title fade-up-onstart'>
				<p>
					 Download our latest releases
				</p>
			</div>
		</div>
	</div>
	<div class="page-con-container">
		<div class="page-in-container">
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<div class='container-emp-block'>
						</div>
						<h2>Latest Builds</h2>
					</div>
				</div>
			</div>
		<?php include 'lib/module/download/inc-download-buildbar.php';?>
		<?php include 'lib/module/download/inc-download-platform.php';?>
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<h2>Installing on a legacy OS</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p class="download-desc">
							RPCS3 is only officially supported on modern operating systems such as Windows 10, Windows 11, Linux, macOS and FreeBSD. We offer a final build for legacy operating systems, but please be aware that this will be the final official build that will work on a legacy operating system.
						</p>
					</div>
				</div>
			</div>
			<div class="generic-con-button">
				<a href='https://github.com/RPCS3/rpcs3-binaries-win/releases/download/build-9b3a878c189e4e688b6025de0d0ff659116dcade/rpcs3-v0.0.28-15417-9b3a878c_win64.7z' target="_blank">
				<div class="generic-btn-button">
					<div class="generic-ico-button" style="background: url('/img/icons/buttons/legacy-h.png') no-repeat center">
					</div>
					<div class="generic-tx1-button">
						<span>Download <span class="generic-tx2-label">For Windows 7/8</span></span>
					</div>
				</div>
				</a>
			</div>
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<h2>Installing on Windows</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p class="download-desc">
							 For Windows users, simply extract the compressed file using any decompression software that supports .7z.
							 <br>
							 Once uncompressed, place your RPCS3 folder in a convenient location to start, such as: <span class="highlight darkmode-highlight">C:\Users\Kratos\Desktop\RPCS3\rpcs3.exe</span>
							 <br>
							 <b>Download dependencies </b><span class="highlight darkmode-highlight"><a href="https://aka.ms/vs/17/release/vc_redist.x64.exe" target="_blank">Microsoft Visual C++ 2019 Redistributable</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<h2>Installing on Linux</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p class="download-desc">
							 For Linux users, RPCS3 is packaged using the AppImage format. To run, execute <span class="highlight darkmode-highlight">chmod a+x ./rpcs3-*_linux64.AppImage &amp;&amp; ./rpcs3-*_linux64.AppImage</span>
							<br>
							<b>Download AppImage using CLI </b><span class="highlight darkmode-highlight">wget --content-disposition https://rpcs3.net/latest-appimage</span> or <span class="highlight darkmode-highlight">curl -JLO https://rpcs3.net/latest-appimage</span>
							<br>
							<b>Compile on Arch using AUR </b><span class="highlight darkmode-highlight">git clone https://aur.archlinux.org/rpcs3-git.git && cd rpcs3-git && makepkg -sri</span>
							<br>
						</p>
					</div>
				</div>
			</div>
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<h2>Installing on macOS</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p class="download-desc">
							For macOS users, simply open the downloaded .DMG file and drag and drop the RPCS3 app into your applications folder when prompted.
							<br>
							Once installed, your RPCS3 application support directory will be found in: <span class="highlight darkmode-highlight">~/Library/Application Support/rpcs3/</span>
						</p>
					</div>
				</div>
			</div>
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<h2>Installing on FreeBSD</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p class="download-desc">
							 For FreeBSD users, RPCS3 supports active FreeBSD 13 and FreeBSD 12 versions.
							<br>
							<b>Install as a package </b><span class="highlight darkmode-highlight">pkg install rpcs3</span>
							<br>
							<b>Compile using ports </b><span class="highlight darkmode-highlight">cd /usr/ports/emulators/rpcs3/ && make install clean</span>
							<br>
							<br>
						</p>
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
						<div class="container-emp-block"></div>
						<h2>Website Source Code</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p>
							 Downloading the website source allows you to clone, fork or contribute any enhancements via GitHub. RPCS3.net is licensed under the GNU General Public License v2.0. Its core developed and maintained by <a href='https://github.com/DAGINATSUKO' target="_blank">DAGINATSUKO</a>, while the compatibility database is developed and maintained by <a href='https://github.com/AniLeo' target="_blank">Ani</a>.
						</p>
					</div>
				</div>
			</div>
			<div class="generic-con-button ">
				<a href='https://github.com/DAGINATSUKO/www-rpcs3' target="_blank">
				<div class="generic-btn-button">
					<div class="generic-ico-button" style="background: url('/img/icons/buttons/github-h.png') no-repeat center">
					</div>
					<div class="generic-tx1-button">
						<span>Website Repository <span class="generic-tx2-label">/daginatsuko</span></span>
					</div>
				</div>
				</a>
				<a href='https://github.com/AniLeo/rpcs3-compatibility' target="_blank">
				<div class="generic-btn-button">
					<div class="generic-ico-button" style="background: url('/img/icons/buttons/github-h.png') no-repeat center">
					</div>
					<div class="generic-tx1-button">
						<span>Compatibility Repository <span class="generic-tx2-label">/anileo</span></span>
					</div>
				</div>
				</a>
			</div>
			<div class='container-con-block darkmode-block'>
				<div class='container-con-wrapper'>
					<div class='container-tx1-block darkmode-txt'>
						<div class="container-emp-block"></div>
						<h2>Press Kit and Documentation</h2>
					</div>
					<div class='container-tx2-block darkmode-txt'>
						<p>
							 Our press kit is an amalgamation of all of the assets previewed on the <a href='/branding'>branding</a> page and more in a single package. It enables those who wish to promote the project and its development through high-quality digital media. We provide high-resolution assets such as our logo in 3 iterations, our supported operating systems, supported CPU and GPU hardware, rendering backends and much more. <br>
							<br>
							 All information found in the documentation section was obtained by collecting and reviewing data from various sources around the web.
						</p>
					</div>
				</div>
			</div>
			<div class="generic-con-button ">
				<a href='/cdn/press/Press%20Kit.zip' download>
				<div class="generic-btn-button">
					<div class="generic-ico-button" style="background: url('/img/icons/buttons/presskit-h.png') no-repeat center">
					</div>
					<div class="generic-tx1-button">
						<span>Download Press Kit <span class="generic-tx2-label">268 MB</span></span>
					</div>
				</div>
				</a>
				<a href='/cdn/docs/Docs.zip' download>
				<div class="generic-btn-button">
					<div class="generic-ico-button" style="background: url('/img/icons/buttons/docs-h.png') no-repeat center">
					</div>
					<div class="generic-tx1-button">
						<span>Download Documentation <span class="generic-tx2-label">36 MB</span></span>
					</div>
				</div>
				</a>
			</div>
		</div>
	</div>
	<?php include 'lib/module/inc-footer.php';?>
</div>
</body>
</html>
