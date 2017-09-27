<!DOCTYPE html>
<html lang="en-US">
<head>
<title>RPCS3 - Quickstart</title>
<meta charset="UTF-8">
<meta name="description" content="RPCS3 is an open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows and Linux.">
<meta name="keywords" content="rpcs3, ps3, PlayStation 3, emulator, nekotekina, quickstart">
<meta name="author" content="RPCS3">
<meta name="copyright" content="RPCS3">
<meta name="google-site-verification" content="cO1o6sx54cvKxhbnYsABWtl4sYFj9uVKV0DxLKZkWv8"/>
<?php include 'lib/module/call-meta.php';?>
<?php include 'lib/module/call-sys.php';?>
</head>
<body>
<?php include 'lib/module/call-php.php';?>
<?php include 'lib/module/ui-sidebar-quickstart.php';?>
<div id="page-con-content">
	<div id="header-con-head">
		<div id='header-img-head' class="dynamic-banner">
		</div>
		<div id='header-con-overlay' class="darkmode-header">
		</div>
		<div id='header-con-body'>
			<div id='header-tx1-body'>
				<span>QUICKSTART</span>
			</div>
			<div id="header-tx2-body">
				<p>
					 Get started using the emulator on your PC
				</p>
			</div>
		</div>
	</div>
	<!-- End -->
	<div id="page-con-container">
		<div id="page-in-container">
			<!-- End -->
			<div id="featured-tx1-heading" class="div-heading darkmode-txt">
				<h2>System Requirements</h2>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="darkmode-block">
				<div class="div-anchor" id="requirements">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="darkmode-txt">
						<h2>System Requirements</h2>
					</div>
					<div id='featured-tx2-block' class="darkmode-txt">
						<p>
							 The system requirements for running the emulator have not been finalized and are subject to change during development. We do however have a set of minimum system requirements that must be met for the emulator to function properly on any system. Please note that these are the bare minimum system specifications and the emulator will not function otherwise.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<?php include 'lib/module/block-requirements.php';?>
			<!-- End -->
			<div id="featured-tx1-heading" class="div-heading darkmode-txt">
				<h2>Updating RPCS3</h2>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="darkmode-block">
				<div class="div-anchor" id="updating">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="darkmode-txt">
						<h2>Updating RPCS3</h2>
					</div>
					<div id='featured-tx2-block' class="darkmode-txt">
						<p>
							 For Windows users, you must drag and drop the updated <b class="txt-highlight darkmode-highlight">executable</b> to the root directory of your RPCS3 folder. Note that from time to time new DLLs may be added or modified, so make sure you copy any new ones to your existing installation. <br>
							<br>
							 For Linux users, you must download the updated <b class="txt-highlight darkmode-highlight">AppImage</b> and make it executable with the command <b class="txt-highlight darkmode-highlight">chmod a+x ./rpcs3-*_linux64.AppImage</b>
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id="featured-tx1-heading" class="div-heading darkmode-txt">
				<h2>Firmware Files</h2>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="darkmode-block">
				<div class="div-anchor" id="firmware">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="darkmode-txt">
						<h2>Installing PlayStation 3 firmware files</h2>
					</div>
					<div id='featured-tx2-block' class="darkmode-txt">
						<p>
							 Due to legal reasons, we cannot distribute official PlayStation 3 firmware files. You must download the latest PlayStation 3 firmware update file from <a href="https://www.playstation.com/en-us/support/system-updates/ps3/">PlayStation.com</a> for use with RPCS3. Once downloaded, you must install the firmware using RPCS3's built in firmware installer found under <b class="txt-highlight darkmode-highlight">File > Install Firmware.</b>
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="darkmode-block">
				<div class="div-anchor" id="module_selection">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="darkmode-txt">
						<h2>Firmware module selection</h2>
					</div>
					<div id='featured-tx2-block' class="darkmode-txt">
						<p>
							 By default, firmware modules are selected automatically based on the PlayStation 3 game or software that is loaded. You can still override automatic module selection and choose which firmware modules you want to use manually, but it is not recommended to do so unless you know what you're doing.
						</p>
						<br>
						<p>
							<b class="txt-highlight darkmode-highlight">Automatically load required libraries:</b> Automatically loads all required modules in game executable.
						</p>
						<p>
							<b class="txt-highlight darkmode-highlight">Manually load selected libraries:</b> Allows the user to manually load selected firmware modules.
						</p>
						<p>
							<b class="txt-highlight darkmode-highlight">Load automatic and manual libraries:</b> Automatically loads all required modules and manually selected firmware modules at the same time.
						</p>
						<p>
							<b class="txt-highlight darkmode-highlight">Load liblv2.sprx only:</b> Loads modules dynamically, more closely to what a real PlayStation 3 would do. Some games may not work properly with this option yet.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id="featured-tx1-heading" class="div-heading darkmode-txt">
				<h2>Game Files</h2>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="darkmode-block">
				<div class="div-anchor" id="manage_files">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="darkmode-txt">
						<h2>Managing Save Data</h2>
					</div>
					<div id='featured-tx2-block' class="darkmode-txt">
						<p>
							 • PlayStation 3 save data files can be managed in: <b class="txt-highlight darkmode-highlight">\dev_hdd0\home\00000001\savedata\</b>
						</p>
						<p>
							 • Please note that save data is stored in folders that correspond to your game's ID.
						</p>
						<p>
							<i>Note: If you're on linux, RPCS3 folders are located in: <b class="txt-highlight darkmode-highlight">~/.config/rpcs3/</b></i>
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="darkmode-block">
				<div class="div-anchor" id="manage_games">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="darkmode-txt">
						<h2>Managing games and software</h2>
					</div>
					<div id='featured-tx2-block' class="darkmode-txt">
						<p>
							 Due to legal reasons, PlayStation 3 games and software cannot be distributed online and must be self-dumped from your own PlayStation 3 console (Both Blu-ray and PSN games) or from your computer using a compatible Blu-ray drive (Disc games only).
						</p>
						<br>
						<p>
							 The typical layout of a <b class="txt-highlight darkmode-highlight">Blu-ray Disc</b> game's root directory:
						</p>
						<p>
							 • PS3_GAME folder (required), PS3_DISC.sfb (required), PS3_UPDATE folder (not required)
						</p>
						<br>
						<p>
							 The typical layout of a <b class="txt-highlight darkmode-highlight">PlayStation Network</b> game's root directory:
						</p>
						<p>
							 • TROPDIR folder, USRDIR folder, ICON0.png, PARAM.sfo, etc
						</p>
						<br>
						<p>
							 Both Blu-ray and PlayStation Network games must be placed in a single folder with their respective files and the folder name must correspond to the game's ID. If you are not sure what your dumped game's region ID is, you can find your region ID on the bottom side-edge of your game case. If you are no longer in possession of your game case or your game is a PlayStation Network game, you can do an internet search for <b class="txt-highlight darkmode-highlight">"Your Game Name Here</b> + <b class="txt-highlight darkmode-highlight">Region ID"</b>. Please note that it is very important you use the correct region ID.
						</p>
						<br>
						<p>
							 • Game IDs that start with a <b class="txt-highlight darkmode-highlight">B</b> are <b class="txt-highlight darkmode-highlight">Blu-Ray Disc</b> games
						</p>
						<p>
							 • Game IDs that start with a <b class="txt-highlight darkmode-highlight">N</b> are <b class="txt-highlight darkmode-highlight">PlayStation Network</b> games
						</p>
						<br>
						<p>
							 When working with actual game region IDs, the game's region ID will look something similar to this:
						</p>
						<br>
						<p>
							 • For example: <b class="txt-highlight darkmode-highlight">BLUS30443</b> is an USA <b class="txt-highlight darkmode-highlight">Blu-Ray Disc</b> copy of <b class="txt-highlight darkmode-highlight">Demon's Souls</b>
						</p>
						<p>
							 • For example: <b class="txt-highlight darkmode-highlight">NPEB01393</b> is an Europe <b class="txt-highlight darkmode-highlight">PlayStation Network</b> copy of <b class="txt-highlight darkmode-highlight">Hatsune Miku: Project DIVA F</b>
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id="featured-tx1-heading" class="div-heading darkmode-txt">
				<h2>Updating and Placement</h2>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="darkmode-block">
				<div class="div-anchor" id="install_games">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="darkmode-txt">
						<h2>Installing games and software</h2>
					</div>
					<div id='featured-tx2-block' class="darkmode-txt">
						<p>
							 • .pkg files must be extracted using RPCS3's built-in package installer found under <b class="txt-highlight darkmode-highlight">File > Install .pkg</b>
						</p>
						<p>
							 • .pkg files will be automatically installed to: <b class="txt-highlight darkmode-highlight">\dev_hdd0\game\</b>
						</p>
						<p>
							 • Blu-ray Disc game data can be placed in <b class="txt-highlight darkmode-highlight">\dev_hdd0\disc\</b> or anywhere <b class="txt-highlight darkmode-highlight">except</b> for <b class="txt-highlight darkmode-highlight">\dev_hdd0\game\</b> and can be booted from <b class="txt-highlight darkmode-highlight">File > Boot Game</b> if not present on game list
						</p>
						<p>
							 • PlayStation Network game data must be placed in: <b class="txt-highlight darkmode-highlight">\dev_hdd0\game\</b>
						</p>
						<p>
							 • PlayStation Network .rap files must be placed in: <b class="txt-highlight darkmode-highlight">\dev_hdd0\home\00000001\exdata\</b>
						</p>
						<p>
							<i>Note: If you're on linux, RPCS3 folders are located in: <b class="txt-highlight darkmode-highlight">~/.config/rpcs3/</b></i>
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="darkmode-block">
				<div class="div-anchor" id="install_updates">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="darkmode-txt">
						<h2>Installing games and software updates</h2>
					</div>
					<div id='featured-tx2-block' class="darkmode-txt">
						<p>
							 Game and software updates are handled the exact same way that PlayStation Network .pkg files are. The. pkg update file must be installed using RPCS3's built-in package installer found under <b class="txt-highlight darkmode-highlight">File > Install .pkg</b> The update will be placed in the game or software folder that corresponds to the correct region ID. Please note that game and software updates must be the same region in order to work. Cross-mixing game or software regions may create irreversible damage to the game or software.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id="featured-tx1-heading" class="div-heading ">
				<h2>Obtaining Games</h2>
			</div>
			<div id='featured-con-block' class="darkmode-block">
				<div class="div-anchor" id="install_updates">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="darkmode-txt">
						<h2>Software Distribution laws in your country</h2>
					</div>
					<div id='featured-tx2-block' class="darkmode-txt">
						<p>
						When dumping video game software, users are subject to country-specific software distribution laws. RPCS3 is not designed to enable illegal activity. We do not promote piracy nor do we allow it under any circumstances. Please take the time to review copyright and video game software dumping laws and/or policies for your country before proceeding.<br>
						<br>
						By following these instructions, you will do so at your own discretion. Should you follow these instructions against your local law, we shall not be held responsible for your actions.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<!-- End -->
			<div id='featured-con-block' class="darkmode-block">
				<div class="div-anchor" id="obtaining_games">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="darkmode-txt">
						<h2>Obtaining games and software</h2>
					</div>
					<div id='featured-tx2-block' class="darkmode-txt">
						<p>
							<b>Method A:</b> We recommend that you dump your own PlayStation 3 games and software from your own console. We believe that this is the most efficient and safest way to migrate your disc-based games and digital games from your console to your PC without the hassle of repairing bad game dumps found on the internet or possible legal repercussions. To do this, you will need a PlayStation 3 system with a custom firmware and various software tools that are used to rip/dump games from your system's Blu-ray drive or internal storage.
						</p>
						<br>
						<p>
							<b>Method B:</b> You can dump games using only a computer by using select compatible Blu-ray drives. Please note that you can only use this method if an <b class="txt-highlight darkmode-highlight">.ird</b> file is available online for the decryption of the disc. See <b class="txt-highlight darkmode-highlight">Dumping games and software with a Blu-ray drive</b> below. Not every Blu-ray drive will recognize PlayStation 3 games due to how PlayStation 3 format discs are designed. Here's a compiled list of the known compatible Blu-ray drives that are capable of reading PlayStation game discs:
						</p>
						<br>
						<p>
							 • ASUS <b class="txt-highlight darkmode-highlight">BC-08B1LT</b>
						</p>
						<p>
							 • ASUS <b class="txt-highlight darkmode-highlight">BC-16D1HT</b>
						</p>
						<p>
							 • ASUS <b class="txt-highlight darkmode-highlight">BC-12B1ST</b>
						</p>
						<p>
							 • ASUS <b class="txt-highlight darkmode-highlight">BC-12D2HT</b>
						</p>
						<p>
							 • ASUS <b class="txt-highlight darkmode-highlight">BW-12B1ST</b>
						</p>
						<p>
							 • ASUS <b class="txt-highlight darkmode-highlight">BW-16D1HT</b>
						</p>
						<p>
							 • LG <b class="txt-highlight darkmode-highlight">BH26NS40</b>
						</p>
						<p>
							 • LG <b class="txt-highlight darkmode-highlight">UH12NS30</b>
						</p>
						<p>
							 • LG <b class="txt-highlight darkmode-highlight">BH16NS40</b>
						</p>
						<p>
							 • LG <b class="txt-highlight darkmode-highlight">BH16NS48</b>
						</p>
						<p>
							 • LG <b class="txt-highlight darkmode-highlight">BH14NS40</b>
						</p>
						<p>
							 • LG <b class="txt-highlight darkmode-highlight">WH24NS40</b>
						</p>
						<p>
							 • LG <b class="txt-highlight darkmode-highlight">WH12LS30</b>
						</p>
						<p>
							 • LG <b class="txt-highlight darkmode-highlight">WH24LS30</b>
						</p>
						<p>
							 • LG <b class="txt-highlight darkmode-highlight">WH26NS40</b>
						</p>
						<p>
							 • LG <b class="txt-highlight darkmode-highlight">WH16NS40</b>
						</p>
						<p>
							 • LG <b class="txt-highlight darkmode-highlight">WH14NS40</b>
						</p>
						<p>
							 • LG <b class="txt-highlight darkmode-highlight">WH16NS48</b>
						</p>
						<p>
							 • Lite-On <b class="txt-highlight darkmode-highlight">DH-4O1S</b>
						</p>
						<p>
							 • Lite-On <b class="txt-highlight darkmode-highlight">iHBS112</b>
						</p>
						<p>
							 • BENQ <b class="txt-highlight darkmode-highlight">BR1000</b>
						</p>
						<p>
							 • Samsung <b class="txt-highlight darkmode-highlight">DVDWBD SH-B083L</b>
						</p>
						<p>
							 • Sony Optiarc <b class="txt-highlight darkmode-highlight">5300S</b>
						</p>
						<p>
							 • Sony PlayStation stock drive <b class="txt-highlight darkmode-highlight">with proprietary adapter</b>
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="darkmode-block">
				<div class="div-anchor" id="dumping_games">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="darkmode-txt">
						<h2>Dumping games and software with a Blu-ray drive</h2>
					</div>
					<div id='featured-tx2-block' class="darkmode-txt">
						<p>
							 You will need three different tools for dumping PlayStation 3 game discs from a computer using a Blu-ray drive:
						</p>
						<br>
						<p>
							 • <a href='/cdn/tools/patcher.zip' download>PS3 ISO Patcher</a> - By BlackDaemon
						</p>
						<p>
							 • <a href='/cdn/tools/3k3y.zip' download>3k3y ISO Tools</a> - By the 3k3y team
						</p>
						<p>
							 • <b class="txt-highlight darkmode-highlight">ISO Dumping Software</b>, such as <a href="http://www.imgburn.com/">ImgBurn</a>, for example.
						</p>
						<br>
						<p>
							 1. Insert a PlayStation 3 Blu-ray disc game of your choice.
						</p>
						<p>
							 2. Dump the <b class="txt-highlight darkmode-highlight">.iso</b> image using an ISO Dumping program such as ImgBurn.
						</p>
						<p>
							 3. Use <a href="http://jonnysp.bplaced.net">jonnysp.bplaced.net</a> to locate the appropriate <b class="txt-highlight darkmode-highlight">.ird</b> file that matches your game ID. If there isn't any .ird file that matches your game ID this unfortunately means you can't dump your disc using this method.
						</p>
						<p>
							 4. Be sure to check game ID in case of different game editions. You need to use the file for the exact game ID, otherwise it won't work (<i>for example: .ird file for Demon's Souls US disc doesn't work with Demon's Souls EU disc</i>).
							<p>
								 5. Open <b class="txt-highlight darkmode-highlight">PS3 ISO Patcher</b> and select your dumped <b class="txt-highlight darkmode-highlight">.iso</b> file and its appropriate <b class="txt-highlight darkmode-highlight">.ird</b> file.
							</p>
							<p>
								 6. Press <b class="txt-highlight darkmode-highlight">Patch</b> to apply the patch to the .iso file.
							</p>
							<p>
								 7. Open <b class="txt-highlight darkmode-highlight">3k3y ISO Tools</b>. Click the <b class="txt-highlight darkmode-highlight">ISO Crypto</b> option and select the dumped .iso file to decrypt it. Make sure the .iso file extension is in lower-case letters (.iso not .ISO), or the decryption will not work.
							</p>
							<p>
								 8. Your game should now be properly decrypted.
							</p>
							<p>
								 9. While in 3k3y ISO Tools, in the Tools drop-down menu, select <b class="txt-highlight darkmode-highlight">ISO -> Extract ISO</b> and select the decrypted iso file to extract the game files (the decrypted iso file will have a .dec.iso file extension).
							</p>
							<p>
								 10. You are now able to use your successfully dumped disc-based game with RPCS3.
							</p>
						</div>
					</div>
				</div>
				<!-- End -->
				<div id="featured-tx1-heading" class="div-heading darkmode-txt">
					<h2>Configuring RPCS3</h2>
				</div>
				<!-- End -->
				<div id='featured-con-block' class="darkmode-block">
					<div class="div-anchor" id="cpu_settings">
					</div>
					<div id='featured-wrp-block'>
						<div id='featured-tx1-block' class="darkmode-txt">
							<h2>CPU settings</h2>
						</div>
						<div id='featured-tx2-block' class="darkmode-txt">
							<p>
								<b>PPU Interpreter (Precise)</b><br>
								 Currently not finished. Will provide more accurate real-time PPU emulation, at the cost of speed.
							</p>
							<br>
							<p>
								<b>PPU Interpreter (Fast)</b><br>
								 Provides fast real-time PPU emulation but is less accurate.
							</p>
							<br>
							<p>
								<b>PPU Recompiler (LLVM)</b><br>
								 LLVM is an AOT recompiler. It pre-caches the ELF/SELF executable and provides the fastest PPU emulation.
							</p>
							<br>
							<p>
								<b>SPU Interpreter (Precise)</b><br>
								 Provides more accurate real-time emulation for SPU cores, but is a lot slower.
							</p>
							<br>
							<p>
								<b>SPU Interpreter (Fast)</b><br>
								 Provides fast real-time SPU emulation, but is less accurate.
							</p>
							<br>
							<p>
								<b>SPU Recompiler (ASMJIT)</b><br>
								 Provides faster real-time SPU emulation with balanced speed and accuracy.
							</p>
						</div>
					</div>
				</div>
				<!-- End -->
				<div id='featured-con-block' class="darkmode-block">
					<div class="div-anchor" id="gpu_settings">
					</div>
					<div id='featured-wrp-block'>
						<div id='featured-tx1-block' class="darkmode-txt">
							<h2>GPU settings</h2>
						</div>
						<div id='featured-tx2-block' class="darkmode-txt">
							<p>
								<b>Renderer</b><br>
								 Allows you to select OpenGL, Vulkan and D3D12 renderers. Vulkan will always be the fastest renderer, followed by OpenGL, the most accurate renderer. This is due to OpenGL receiving bug fixes and implementations ahead of the other renderers.
								 <i>Note that D3D12 (Direct3D 12) is only compatible with Windows 10 and its usage is not recommended as it's unmantained.</i>
							</p>
							<br>
							<p>
								<b>Resolution</b><br>
								 Allows you to set the native rendering resolution for the emulated console. See the supported resolutions for the game you're testing on the Game List and pick any of those. 
								 <i>Note that not all games render at 1080p because a real PlayStation 3 doesn't support this resolution on all games</i>
							</p>
							<br>
							<p>
								<b>Graphics Device</b><br>
								 Allows you to select your preferred GPU for usage in the Vulkan and D3D12 renderers.
							</p>
							<br>
							<p>
								<b>Aspect Ratio</b><br>
								 Defines the aspect ratio of the the emulated console.
							</p>
							<br>
							<p>
								<b>Frame Limit</b><br>
								 In most cases, this setting should be set to either Off if the game has internal framelocking or Auto if the game doesn't and goes above 60fps. Otherwise, some games may surpass their 30/60FPS target causing issues such as sped-up gameplay or physics glitches. Games are only intended to run up to 60FPS on a real PlayStation 3. 
								 <i>Using Frame Limit will slow down your game if it doesn't run fast enough, so use it only if needed.</i>
							</p>
							<br>
							<p>
								<b>Write Color Buffers</b><br>
								 These buffers are only required for some bigger AAA games. Demon's Souls requires the use of the Write Color buffers option.
							</p>
							<br>
							<p>
								<b>Invalidate Cache Every Frame</b><br>
								 Improves the way shadows are handled. Use this only if your game displays broken shadows.
							</p>
							<br>
							<p>
								<b>Use GPU texture scaling</b><br>
								 Improves performance by offloading some texture scaling over to the GPU. In rare cases, this option may cause texture corruption.
							</p>
							<br>
							<p>
								<b>Strict Rendering Mode</b><br>
								 Enforces strict compliance to the graphical API specification. Might result in degraded performance in some games. Can resolve rare cases of missing graphics and flickering. 
							</p>
							<br>
							<p>
								<b>VSync</b><br>
								 Improves image quality by keeping framerate consistent. Disabling may cause screen tearing but may also improve performance in some cases.
							</p>
							<br>
							<p>
								<b>Stretch to display area</b><br>
								 Overrides aspect ratio and stretches the image to full display area.
							</p>
						</div>
					</div>
				</div>
				<!-- End -->
				<div id='featured-con-block' class="darkmode-block">
					<div class="div-anchor" id="audio_settings">
					</div>
					<div id='featured-wrp-block'>
						<div id='featured-tx1-block' class="darkmode-txt">
							<h2>Audio settings</h2>
						</div>
						<div id='featured-tx2-block' class="darkmode-txt">
							<p>
								<b>Audio Out</b><br>
								 Allows you to select your preferred audio driver for the emulated console. The emulator currently supports OpenAL, XAudio2 (Windows only), ALSA (Linux only) and PulseAudio (Linux and BSD only). XAudio2 should always be used on Windows operating systems for proper audio playback, and ALSA/PulseAudio should always be used on Linux systems.
							</p>
							<br>
							<p>
								 If you run into any issues with either audio backends, set the output to Null. This will disable all audio for the emulator.
							</p>
						</div>
					</div>
				</div>
				<!-- End -->
				<div id='featured-con-block' class="darkmode-block">
					<div class="div-anchor" id="input_settings">
					</div>
					<div id='featured-wrp-block'>
						<div id='featured-tx1-block' class="darkmode-txt">
							<h2>Input/Output settings</h2>
						</div>
						<div id='featured-tx2-block' class="darkmode-txt">
							<p>
								<b>Keyboard Handler</b><br>
								 Allows you to select which device you want to register emulated console keyboard inputs.
							</p>
							<br>
							<p>
								<b>Mouse Handler</b><br>
								 Allows you to select which device you want to register emulated console mouse inputs and movement.
							</p>
							<br>
							<p>
								<b>Camera Input</b><br>
								 Allows you to spoof or disable PlayStation 3 compatible cameras.
							</p>
							<br>
							<p>
								<b>Camera Settings</b><br>
								 Allows you to select which device you want to input emulated console camera video/audio.
							</p>
						</div>
					</div>
				</div>
				<!-- End -->
				<div id='featured-con-block' class="darkmode-block">
					<div class="div-anchor" id="network_settings">
					</div>
					<div id='featured-wrp-block'>
						<div id='featured-tx1-block' class="darkmode-txt">
							<h2>Networking settings</h2>
						</div>
						<div id='featured-tx2-block' class="darkmode-txt">
							<p>
								<b>Connection status</b><br>
								 Allows you to try spoofing an internet connection. Online connectivity is something we're thinking about, but we may not focus on it until RPCS3 is as stable and as accurate as possible.
							</p>
						</div>
					</div>
				</div>
				<!-- End -->
				<div id='featured-con-block' class="darkmode-block">
					<div class="div-anchor" id="system_settings">
					</div>
					<div id='featured-wrp-block'>
						<div id='featured-tx1-block' class="darkmode-txt">
							<h2>System settings</h2>
						</div>
						<div id='featured-tx2-block' class="darkmode-txt">
							<p>
								<b>Language</b><br>
								 Allows you to change the internal system language of the emulated console. In some very rare cases games may fail to go ingame if the system language being used is from a different region than the one of the game.
							</p>
						</div>
					</div>
				</div>
				<!-- End -->
				<a href='/download'>
				<div id='featured-con-button' class="darkmode-buttons">
					<div id='featured-wrp-button' style="width: 190px; margin: 0 -95px;">
						<div id='featured-ico-button' style="background:url('/img/icons/buttons/download.png') no-repeat center; background-size: 16px;">
						</div>
						<div id='featured-tx1-button'>
							<p>
								 Download Latest Build
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