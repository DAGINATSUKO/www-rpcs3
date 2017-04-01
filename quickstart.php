<!-- 
RPCS3.net website by DAGINATSUKO
https://github.com/daginatsuko
01.22.2017
-->
<!DOCTYPE html>
<html lang="en-US">
<head>
<!-- Metadata -->
<title>RPCS3 - Quickstart</title>
<meta charset="UTF-8">
<meta name="description" content="RPCS3 is an open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows and Linux. It is powered by OpenGL, Vulkan and DirectX 12. All development is made possible with our contributors and core developers.">
<meta name="keywords" content="rpcs3, ps3, PlayStation 3, emulator, nekotekina, quickstart">
<meta name="author" content="RPCS3">
<meta name="google-site-verification" content="cO1o6sx54cvKxhbnYsABWtl4sYFj9uVKV0DxLKZkWv8"/>
<!-- Metadata -->
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
		<div id='header-con-body-b'>
			<div id='header-tx1-body-b'>
				<h1>QUICKSTART</h1>
			</div>
			<div id='header-tx2-body-b'>
				<p>
					 Get started using RPCS3 on your PC
				</p>
			</div>
		</div>
	</div>
	<div id="page-con-container">
		<div id="page-in-container">
			<!-- End -->
			<?php include 'lib/module/el-requirements.php';?>
			<!-- End -->
			<div id="featured-tx1-heading" class="div-heading">
				<h2>Updating RPCS3</h2>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>How do I update RPCS3 when a new build is released?</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 To update RPCS3, all you need to do is drag and drop the <b>executable</b> to the root directory of your RPCS3 installation. Moving over additional files and folders is not necessary and may overwrite your user settings.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id="featured-tx1-heading" class="div-heading">
				<h2>Firmware Files</h2>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>How can I obtain and install PlayStation 3 firmware files?</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 Due to copyright, these files cannot be distributed by us and must be self-dumped from your own PlayStation 3 system. Alternatively you can download the latest PlayStation 3 firmware update file from <a class="txt-link" href="https://www.playstation.com/en-us/support/system-updates/ps3/">PlayStation.com</a> if you are legally allowed to do so. Once downloaded, you can install the firmware using RPCS3's built in Firmware Installer found under <b>Tools</b> > <b>Install Firmware</b>. The files will then be installed and then correctly placed in their appropriate directories.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						</h2>
						 How do I know which firmware modules to use?</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 Firmware modules are selected <b>automatically</b> based on the PlayStation 3 game or software that is loaded. You can still <b>override</b> automatic module selection and chose which firmware modules you want to use manually, but it is not recommended to do so.
							 <br>
							 <br>
							 These are the minimum set of modules that must be enabled if you chose  <b>not</b> to  use the <b>Load Required Libraries</b> setting:
						</p>
						<br>
						<p>
							 • <b>libsre</b>.sprx
						</p>
						<p>
							 • <b>libspurs_jq</b>.sprx
						</p>
						<p>
							 • <b>libresc</b>.sprx
						</p>
						<p>
							 • <b>librtc</b>.sprx
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id="featured-tx1-heading" class="div-heading">
				<h2>Game Files</h2>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>Where do I manage my PlayStation 3 save data?</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 • PlayStation 3 save data files can be managed in: <b>\dev_hdd0\home\00000001\savedata\</b>
						</p>
						<p>
							 • Please note that save data is stored in folders that correspond to your game's region ID.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>Managing PlayStation 3 games and software</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 Again, due to copyright and obvious <b>legal</b> reasons, PlayStation 3 games and software cannot be distributed online and must be self-dumped from your own PlayStation 3 console. Once these games are dumped from your console, they can be in either Package format (.pkg), Blu-Ray Disc format or PlayStation Network format.
						</p>
						<br>
						<p>
							 The typical layout of a <b>Blu-ray Disc</b> game's root directory:
						</p>
						<p>
							 • PS3_GAME folder, PS3_DISC.sfb
						</p>
						<br>
						<p>
							 The typical layout of a <b>PlayStation Network </b> game's root directory:
						</p>
						<p>
							 • TROPDIR folder, USRDIR folder, ICON0.png, PARAM.sfo, etc
						</p>
						<br>
						<p>
							 Both Blu-ray and PlayStation Network games must be placed in a single folder with their respective files and the folder name must correspond to the game's ID. If you are not sure what your dumped game's region ID is, you can find your region ID on the bottom side-edge of your game case. If you are no longer in possession of your game case or your game is a PlayStation Network game, you can do an internet search for your "Your Game Name Here + Region ID". Please note that it is very important you use the correct region ID.
						</p>
						<br>
						<p>
							 • For example: <b>BCUS00000</b> is a USA <b>Blu-ray Disc</b> game
						</p>
						<p>
							 • For example: <b>NPUA00000</b> is a USA <b>PlayStation Network</b> game
						</p>
						<br>
						<p>
							 When working with actual game region IDs, the game's region ID will look something similar to this:
						</p>
						<br>
						<p>
							 • For example: <b>BCUS98233</b> is a USA Blu-ray Disc copy of <b>Uncharted 3</b>
						</p>
						<p>
							 • For example: <b>NPUA80472</b> is a USA PlayStation Network copy of <b>LittleBigPlanet</b>
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>Where do I place PlayStation 3 game and software files</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 • .pkg files must be extracted using RPCS3's built in 'Install PKG' option.
						</p>
						<p>
							 • .pkg files will be automatically installed to: <b>\dev_hdd0\game\</b>
						</p>
						<p>
							 • Blu-ray Disc game data can be placed anywhere except for <b>\dev_hdd0\game\</b> and must be booted with 'Boot Game'.
						</p>
						<p>
							 • PlayStation Network game data must be placed in: <b>\dev_hdd0\game\</b>
						</p>
						<p>
							 • PlayStation Network .rap files must be placed in: <b>\dev_hdd0\home\00000001\exdata\</b>
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>How do I apply PlayStation 3 game and software updates?</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 Game and software updates are handled the exact same way that PlayStation Network .pkg files are. The. pkg update file must be installed using RPCS3's built in 'Install PKG' option. The update will be placed in the game or software folder that corresponds to the correct region ID. Please note that game and software updates <b>must be the same region in order to work</b>. Cross-mixing game or  software regions may create irreversible damage to the game or software.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id="featured-tx1-heading" class="div-heading">
				<h2>Obtaining Games</h2>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>Where do I get PlayStation 3 games and software?</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 Typically, you want to dump your own PlayStation 3 games and software from your own console. We believe that this is the most efficient and safest way to migrate your disc-based games and digital games from your console to your PC. To do this, you will need a PlayStation 3 system with a custom firmware and various software tools that are used to rip/dump games from your system's Blu-ray drive or internal storage.
						</p>
						<br>
						<p>
							 You can also dump games using select compatible Blu-ray drives. Not every Blu-ray drive will recognize PlayStation 3 games due to how data is formatted on the disc. Here's a compiled list of the known compatible Blu-ray drives that are capable of reading PlayStation game discs:
						</p>
						<br>
						<p>
							 • ASUS <b>BC-12B1ST</b>
						</p>
						<p>
							 • ASUS <b>BW-16D1HT</b>
						</p>
						<p>
							 • BENQ <b>BR1000</b>
						</p>
						<p>
							 • Lite-ON <b>DH-401S</b>
						</p>
						<p>
							 • LG BD <b>Bh24NS40</b>
						</p>
						<p>
							 • LG BD <b>Bh26NS40</b>
						</p>
						<p>
							 • LG BD <b>Uh12NS30</b>
						</p>
						<p>
							 • LG BD <b>Wh24NS40</b>
						</p>
						<p>
							 • LG BD-RE <b>Wh26NS40</b>
						</p>
						<p>
							 • Sony Optiarc BD <b>5300S</b>
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>How do I dump PlayStation 3 games and software?</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 You will need two different tools for dumping PlayStation 3 game discs from a Blu-ray drive:
						</p>
						<br>
						<p>
							 • <a class='txt-link' href='/cdn/tools/patcher.zip' download>PS3 ISO Patcher</a> - By BlackDaemon
						</p>
						<p>
							 • <a class='txt-link' href='/cdn/tools/3k3y.zip' download>3k3y ISO Tools</a> - By the 3k3y team
						</p>
						<br>
						<p>
							 1 - Insert a PlayStation 3 <b>Blu-ray disc game</b> of your choice.
						</p>
						<p>
							 2 - Dump the <b>.iso</b> image using a program like <b>Alcohol 120%</b>.
						</p>
						<p>
							 3 - Use <a class="txt-link" href="http://jonnysp.bplaced.net">jonnysp.bplaced.net</a> to locate the appropriate .ird file that matches your game.
						</p>
						<p>
							 4 - Be sure to check discID in case of different game editions and the game's firmware version in param.sfo
							<p>
								 5 - Open <b>PS3 ISO Patcher</b> and select your dumped .iso file and its appropriate .ird file.
							</p>
							<p>
								 6 - Press <b>Patch</b> to apply the patch to the .iso file.
							</p>
							<p>
								 7 - Open <b>3k3y ISO Tools</b> and decrypt the .iso file.
							</p>
							 8 - Your game should now be properly decrypted.
						</p>
						<p>
							 9 - You must now extract your decrypted .iso file for use with RPCS3.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id="featured-tx1-heading" class="div-heading">
				<h2>Configuring RPCS3</h2>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>RPCS3 Core settings</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 • <b>PPU Interpreter (Precise)</b> and <b>SPU Interpreter (Precise)</b> provide more accurate emulation, but they're slower.
						</p>
						<p>
							 • <b>PPU Interpreter (Fast)</b> and <b>SPU Interpreter (Fast)</b> are faster than their 'Precise' counterparts. They are the most commonly used modes and tend to be a lot faster.
						</p>
						<br>
						<p>
							 • Both the <b>PPU</b> and <b>SPU</b> recompilers should only be used if the game already runs decently on the PPU and SPU interpreters to gain a boost in performance.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>RPCS3 Graphics settings</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 You should always test your games with all the rendering beck-ends (<b>OpenGL</b>, <b>DirectX12</b>, <b>Vulkan</b>) to see in which one gives you the best performance and to see if other back-ends suffer from issues that could be potentially fixed.
						</p>
						<br>
						<p>
							 Optimal resolutions for testing are <b>1920x1080</b> (1080p) and <b>1280x720</b> (720p). Not all games will render at 1080p because the real PlayStation 3 doesn't support this resolution on all games. If you run into any issues, try lowering the resolution of the game.
						</p>
						<br>
						<p>
							<b>Frame-limit</b> should be set to <b>'Auto'</b>, otherwise some games may surpass their 60FPS target causing issues such as sped-up gameplay. Games are only intended to run up to 60FPS on a real PlayStation 3.
						</p>
						<br>
						<p>
							<b>D3D Adapter</b> should be set to your current GPU and is only required when using <b>D3D12</b> (DirectX 12).
						</p>
						<br>
						<p>
							<b>Read / Write</b> and <b>Color / Depth</b> buffers should be disabled for now as they're not working properly with any of the rendering back-ends. These buffers are only required for bigger AAA games which don't run yet.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>RPCS3 Audio settings</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 Audio implementation isn't really a priority for now, so it only has basic implementations. RPCS3 currently supports <b>OpenAL</b> and <b>XAudio2</b>. XAudio2 should always be used on Windows for proper audio playback.
						</p>
						<br>
						<p>
							 If you run into any issues with either audio back-ends, set the output to <b>'Null'</b>. This will disable all audio for the emulator.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>Want to give us some feedback? Or just hang out?</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 That's cool, we're all open ears. Feel free to join our Discord server where you can interact with developers and contributors by asking questions, submitting feedback and even posting screenshots of your findings. Any feedback is greatly appreciated and we hope to see PlayStation 3 emulation hit the mainstream really soon.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<a href='https://discord.me/RPCS3' target="_blank">
			<div id='featured-con-button'>
				<div id='featured-wrp-button' style="width: 166px; margin: 0 -83px;">
					<div id='featured-ico-button' style="background:url('/img/icons/buttons/discord.png') no-repeat center; background-size: 16px;">
					</div>
					<div id='featured-tx1-button'>
						<p>
							 Join Us on Discord
						</p>
					</div>
				</div>
			</div>
			</a>
			<!-- End -->
		</div>
	</div>
	<!-- Page Footer -->
	<?php include 'lib/module/ui-footer.php';?>
	<!-- Page End -->
</div>
</body>
</html>