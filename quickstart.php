<!-- 
RPCS3.net website by DAGINATSUKO
https://github.com/daginatsuko
2017.01.22 
-->
<!DOCTYPE html>
<html lang="en-US">
<head>
<!-- Metadata -->
<title>RPCS3 - Quickstart</title>
<meta charset="UTF-8">
<meta name="description" content="RPCS3 is an open-source Sony PlayStation®3 emulator and debugger written in C++ for Windows. It is powered by OpenGL, Vulkan and DirectX 12. RPCS3's development is made possible with our contributors and core developers.">
<meta name="keywords" content="rpcs3, ps3, PlayStation®3, emulator, nekotekina, quickstart">
<meta name="author" content="RPCS3">
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
		<div id='header-img-head' class="dynamic-banner fade-onload">
		</div>
		<div id='header-con-overlay'>
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
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h1>What are the system requirements?</h1>
					</div>
					<div id='featured-lst-block'>
						<div id='featured-ico-block' style="background:url('/img/icons/list/os.png') no-repeat center; background-size: 20px;">
						</div>
						<div id='featured-tx3-block'>
							<p class="reqs-os">
								 Requirement Here
							</p>
						</div>
					</div>
					<div id='featured-lst-block'>
						<div id='featured-ico-block' style="background:url('/img/icons/list/cpu.png') no-repeat center; background-size: 20px;">
						</div>
						<div id='featured-tx3-block'>
							<p class="reqs-cpu">
								 Requirement Here
							</p>
						</div>
					</div>
					<div id='featured-lst-block'>
						<div id='featured-ico-block' style="background:url('/img/icons/list/ins.png') no-repeat center; background-size: 20px;">
						</div>
						<div id='featured-tx3-block'>
							<p class="reqs-ins">
								 Requirement Here
							</p>
						</div>
					</div>
					<div id='featured-lst-block'>
						<div id='featured-ico-block' style="background:url('/img/icons/list/gpu.png') no-repeat center; background-size: 20px;">
						</div>
						<div id='featured-tx3-block'>
							<p class="reqs-gpu">
								 Requirement Here
							</p>
						</div>
					</div>
					<div id='featured-lst-block'>
						<div id='featured-ico-block' style="background:url('/img/icons/list/ram.png') no-repeat center; background-size: 20px;">
						</div>
						<div id='featured-tx3-block'>
							<p class="reqs-ram">
								 Requirement Here
							</p>
						</div>
					</div>
					<div id='featured-lst-block'>
						<div id='featured-ico-block' style="background:url('/img/icons/list/redist.png') no-repeat center; background-size: 20px;">
						</div>
						<div id='featured-tx3-block'>
							<p class="reqs-files">
								 Requirement Here
							</p>
						</div>
					</div>
					<div id='featured-lst-block'>
						<div id='featured-ico-block' style="background:url('/img/icons/list/lle.png') no-repeat center; background-size: 20px;">
						</div>
						<div id='featured-tx3-block'>
							<p class="reqs-lle">
								 Requirement Here
							</p>
						</div>
					</div>
					<div id='featured-lst-block'>
						<div id='featured-ico-block' style="background:url('/img/icons/list/disc.png') no-repeat center; background-size: 20px;">
						</div>
						<div id='featured-tx3-block'>
							<p class="reqs-rom">
								 Requirement Here
							</p>
						</div>
					</div>
					<div id='featured-lst-block'>
						<div id='featured-ico-block' style="background:url('/img/icons/list/hdd.png') no-repeat center; background-size: 20px;">
						</div>
						<div id='featured-tx3-block'>
							<p class="reqs-hdd">
								 Requirement Here
							</p>
						</div>
					</div>
					<div id='featured-lst-block'>
						<div id='featured-ico-block' style="background:url('/img/icons/list/piracy.png') no-repeat center; background-size: 20px;">
						</div>
						<div id='featured-tx3-block'>
							<p class="reqs-piracy">
								 Requirement Here
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h1>How can I obtain PlayStation®3 firmware files?</h1>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 Due to copyright, these files cannot be distributed by us and must be self-dumped from your own PlayStation®3 system. Alternatively you can download the latest PlayStation®3 firmware update file from <a class="txt-link" href="https://www.playstation.com/en-us/support/system-updates/ps3/">PlayStation.com</a> if you are legally allowed to do so. Once downloaded, you can install the firmware using RPCS3's built in Firmware Installer found under <b>Tools</b> > <b>Install Firmware</b>. The files will then be installed and then correctly placed in their appropriate directories.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h1>Where do I manually place my PlayStation®3 firmware files?</h1>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 In the rare instance that you may want to manually dump your own encrypted or decrypted firmware files from your own PlayStation®3 system, they must be placed in the following locations:
						</p>
						<br>
						<p>
							 • .prx files must be placed in: <b>\dev_flash\sys\external\</b>
						</p>
						<p>
							 • .pic files must be placed in: <b>\dev_flash\sys\external\</b>
						</p>
						<p>
							 • .ttf files (Fonts) must be placed in: <b>\dev_flash\data\font\</b>
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						</h1>
						 How do I know which firmware modules to use?</h1>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 We are currently working on making module selection <b>automatic</b>, thus making this step completely non-existent in the future. Until then, users must select and <b>enable</b> their modules manually for use with RPCS3. These are the minimum set of modules that must be enabled at all times for games to boot and function as intended.
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
						<br>
						<p>
							 In some cases, games will need more than just the minimum set of modules enabled to boot. Looking at the log, you can get an idea of what modules you need to enable to run the game properly. If the log outputs something like:
						</p>
						<br>
						<p>
							 • cellResc TODO: <b>cellResc</b>SetConvertAndFlip(cntxt=*0x270000, idx=0x0)
						</p>
						<br>
						<p>
							 Then you need to enable <b>libResc</b>.sprx in the 'Load Libraries' list under 'Settings'. While this is true for most modules, notable exceptions are anything with '<b>sys</b>' in the module name along with <b>libgcm</b>. These modules will most certainly crash the emulator if you try to enable them because the emulation is not yet accurate enough at the moment.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h1>Where do I manage my PlayStation®3 save data?</h1>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 • PlayStation®3 save data files can be managed in: <b>\dev_hdd0\home\00000001\savedata\</b>
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
						<h1>Managing PlayStation®3 games and software</h1>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 Again, due to copyright and obvious <b>legal</b> reasons, PlayStation®3 games and software cannot be distributed online and must be self-dumped from your own PlayStation®3 console. Once these games are dumped from your console, they can be in either Package format (.pkg), Blu-Ray Disc format or PlayStation® Network format.
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
							 The typical layout of a <b>PlayStation® Network </b> game's root directory:
						</p>
						<p>
							 • TROPDIR folder, USRDIR folder, ICON0.png, PARAM.sfo, etc
						</p>
						<br>
						<p>
							 Both Blu-ray and PlayStation® Network games must be placed in a single folder with their respective files and the folder name must correspond to the game's ID. If you are not sure what your dumped game's region ID is, you can find your region ID on the bottom side-edge of your game case. If you are no longer in possession of your game case or your game is a PlayStation® Network game, you can do an internet search for your "Your Game Name Here + Region ID". Please note that it is very important you use the correct region ID.
						</p>
						<br>
						<p>
							 • For example: <b>BCUS00000</b> is a USA <b>Blu-ray Disc</b> game
						</p>
						<p>
							 • For example: <b>NPUA00000</b> is a USA <b>PlayStation® Network</b> game
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
							 • For example: <b>NPUA80472</b> is a USA PlayStation® Network copy of <b>LittleBigPlanet</b>
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h1>Where do I place PlayStation®3 game and software files</h1>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 • .pkg files must be extracted using RPCS3's built in 'Install PKG' option.
						</p>
						<p>
							 • .pkg files will be automatically installed to: <b>\dev_hdd0\game\</b>
						</p>
						<p>
							 • Blu-ray Disc game data can be placed <b>anywhere</b> and must be booted with 'Boot Game'.
						</p>
						<p>
							 • PlayStation® Network game data must be placed in: <b>\dev_hdd0\game\</b>
						</p>
						<p>
							 • PlayStation® Network .rap files must be placed in: <b>\dev_hdd0\home\00000001\exdata\</b>
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h1>Where do I get PlayStation®3 games and software?</h1>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 Typically, you want to dump your own PlayStation®3 games and software from your own console. We believe that this is the most efficient and safest way to migrate your disc-based games and digital games from your console to your PC. To do this, you will need a PlayStation®3 system with a custom firmware and various software tools that are used to rip/dump games from your system's Blu-ray drive or internal storage.
						</p>
						<br>
						<p>
							 You can also dump games using select compatible Blu-ray drives. Not every Blu-ray drive will recognize PlayStation®3 games due to how data is formatted on the disc. Here's a compiled list of the known compatible Blu-ray drives that are capable of reading PlayStation game discs:
						</p>
						<br>
						<p>
							 • ASUS <b>BC-12B1ST</b>
						</p>
						<p>
							 • BENQ <b>BR1000</b>
						</p>
						<p>
							 • Lite-ON <b>DH-401S</b>
						</p>
						<p>
							 • LG BD <b>BH14NS40</b>
						</p>
						<p>
							 • LG BD <b>BH16NS40</b>
						</p>
						<p>
							 • LG BD <b>UH12NS30</b>
						</p>
						<p>
							 • LG BD-RE <b>WH16NS40</b>
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
						<h1>How do I dump PlayStation®3 games and software?</h1>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 You will need two different tools for dumping PlayStation®3 game discs from a Blu-ray drive:
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
							 1 - Insert a PlayStation®3 <b>Blu-ray disc game</b> of your choice.
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
			<div id='featured-con-block'>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h1>RPCS3 Core settings</h1>
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
						<h1>RPCS3 Graphics settings</h1>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 You should always test your games with all the rendering beck-ends (<b>OpenGL</b>, <b>DirectX12</b>, <b>Vulkan</b>) to see in which one gives you the best performance and to see if other back-ends suffer from issues that could be potentially fixed.
						</p>
						<br>
						<p>
							 Optimal resolutions for testing are <b>1920x1080</b> (1080p) and <b>1280x720</b> (720p). Not all games will render at 1080p because the real PlayStation®3 doesn't support this resolution on all games. If you run into any issues, try lowering the resolution of the game.
						</p>
						<br>
						<p>
							<b>Frame-limit</b> should be set to <b>'Auto'</b>, otherwise some games may surpass their 60FPS target causing issues such as sped-up gameplay. Games are only intended to run up to 60FPS on a real PlayStation®3.
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
						<h1>RPCS3 Audio settings</h1>
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
						<h1>Want to give us some feedback? Or just hang out?</h1>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 That's cool, we're all open ears. Feel free to join our Discord server where you can interact with developers and contributors by asking questions, submitting feedback and even posting screenshots of your findings. Any feedback is greatly appreciated and we hope to see PlayStation®3 emulation hit the mainstream really soon.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<a href='https://discord.me/RPCS3' target="_blank">
			<div id='featured-con-button'>
				<div id='featured-wrp-button' style="width: 166px; margin: 0 -83px;">
					<div id='featured-ico-button' style="background:url('/img/icons/buttons/discord.png') no-repeat center; background-size: 20px;">
					</div>
					<div id='featured-tx1-button'>
						<p>
							 Join us on Discord
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