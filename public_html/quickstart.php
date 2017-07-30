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
		<div id='header-con-overlay'>
		</div>
		<div id='header-con-body'>
			<div id='header-tx1-body'>
				<span>QUICKSTART</span>
			</div>
			<div id='header-tx2-body'>
				<p>
					 Get started using RPCS3 on your PC
				</p>
			</div>
		</div>
	</div>
	<!-- End -->
	<div id="page-con-container">
		<div id="page-in-container">
			<!-- End -->
			<div id="featured-tx1-heading" class="div-heading">
				<h2>System Requirements</h2>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div class="div-anchor" id="requirements">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>System Requirements</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 The system requirements for running the emulator have not been finalized and are subject to change during development. We do however have a set of minimum system requirements that must be met for the emulator to function properly on any system. Please note that these are the bare minimum system specifications and the emulator will not function otherwise.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<?php include 'lib/module/block-requirements.php';?>
			<!-- End -->
			<div id="featured-tx1-heading" class="div-heading">
				<h2>Updating RPCS3</h2>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div class="div-anchor" id="updating">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>Updating RPCS3</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 For Windows users, you must drag and drop the updated<b class="txt-highlight">executable</b> to the root directory of your RPCS3 folder. Moving over other files is not necessary and may overwrite user settings. In some cases, the GUIconfigs folder may need to be deleted and regenerated as new features are added to the user interface.<br>
							 <br>
							  For Linux users, you must download the updated <b class="txt-highlight">AppImage</b> and make it executable with the command <b class="txt-highlight">chmod a+x ./rpcs3-*_linux64.AppImage</b>
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
				<div class="div-anchor" id="firmware">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>Installing PlayStation 3 firmware files</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 Due to legal reasons, we cannot distribute official PlayStation 3 firmware files. You must download the latest PlayStation 3 firmware update file from <a href="https://www.playstation.com/en-us/support/system-updates/ps3/">PlayStation.com</a> for use with RPCS3. Once downloaded, you must install the firmware using RPCS3's built in firmware installer found under <b class="txt-highlight">File > Install Firmware.</b>
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div class="div-anchor" id="module_selection">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>Firmware module selection</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 By default, firmware modules are selected automatically based on the PlayStation 3 game or software that is loaded. You can still override automatic module selection and choose which firmware modules you want to use manually, but it is not recommended to do so unless you know what you're doing.
						</p>
						<br>
						<p>
							<b class="txt-highlight">Automatically load required libraries:</b> Automatically loads all required modules in game executable.
						</p>
						<p>
							<b class="txt-highlight">Manually load selected libraries:</b> Allows the user to manually load selected firmware modules.
						</p>
						<p>
							<b class="txt-highlight">Load automatic and manual libraries:</b> Automatically loads all required modules and manually selected firmware modules at the same time.
						</p>
						<p>
							<b class="txt-highlight">Load liblv2.sprx only:</b> Loads modules dynamically, more closely to what a real PlayStation 3 would do. Some games may not work properly with this option yet.
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
				<div class="div-anchor" id="manage_files">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>Managing Save Data</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 • PlayStation 3 save data files can be managed in: <b class="txt-highlight">\dev_hdd0\home\00000001\savedata\</b>
						</p>
						<p>
							 • Please note that save data is stored in folders that correspond to your game's ID.
						</p>
						<p>
							<i>Note: If you're on linux, RPCS3 folders are located in: <b class="txt-highlight">~/.config/rpcs3/</b></i>
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div class="div-anchor" id="manage_games">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>Managing games and software</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 Due to legal reasons, PlayStation 3 games and software cannot be distributed online and must be self-dumped from your own PlayStation 3 console (Both Blu-ray and PSN games) or from your computer using a compatible Blu-ray drive (Disc games only).
						</p>
						<br>
						<p>
							 The typical layout of a <b class="txt-highlight">Blu-ray Disc</b> game's root directory:
						</p>
						<p>
							 • PS3_GAME folder (required), PS3_DISC.sfb (required), PS3_UPDATE folder (not required)
						</p>
						<br>
						<p>
							 The typical layout of a <b class="txt-highlight">PlayStation Network </b> game's root directory:
						</p>
						<p>
							 • TROPDIR folder, USRDIR folder, ICON0.png, PARAM.sfo, etc
						</p>
						<br>
						<p>
							 Both Blu-ray and PlayStation Network games must be placed in a single folder with their respective files and the folder name must correspond to the game's ID. If you are not sure what your dumped game's region ID is, you can find your region ID on the bottom side-edge of your game case. If you are no longer in possession of your game case or your game is a PlayStation Network game, you can do an internet search for <b class="txt-highlight">"Your Game Name Here</b> + <b class="txt-highlight">Region ID"</b>. Please note that it is very important you use the correct region ID.
						</p>
						<br>
						<p>
							 • Game IDs that start with a <b class="txt-highlight">B</b> are <b class="txt-highlight">Blu-Ray Disc</b> games
						</p>
						<p>
							 • Game IDs that start with a <b class="txt-highlight">N</b> are <b class="txt-highlight">PlayStation Network</b> games
						</p>
						<br>
						<p>
							 When working with actual game region IDs, the game's region ID will look something similar to this:
						</p>
						<br>
						<p>
							 • For example: <b class="txt-highlight">BLUS30443</b> is an USA <b class="txt-highlight">Blu-Ray Disc</b> copy of <b class="txt-highlight">Demon's Souls</b>
						</p>
						<p>
							 • For example: <b class="txt-highlight">NPEB02436</b> is an Europe <b class="txt-highlight">PlayStation Network</b> copy of <b class="txt-highlight">Persona 5</b>
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id="featured-tx1-heading" class="div-heading">
				<h2>Updating and Placement</h2>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div class="div-anchor" id="install_games">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>Installing games and software</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 • .pkg files must be extracted using RPCS3's built-in package installer found under <b class="txt-highlight">File > Install .pkg</b>
						</p>
						<p>
							 • .pkg files will be automatically installed to: <b class="txt-highlight">\dev_hdd0\game\</b>
						</p>
						<p>
							 • Blu-ray Disc game data can be placed in <b class="txt-highlight">\dev_hdd0\disc\</b> or anywhere <b class="txt-highlight">except</b> for <b class="txt-highlight">\dev_hdd0\game\</b> and can be booted from <b class="txt-highlight">File > Boot Game</b> if not present on game list
						</p>
						<p>
							 • PlayStation Network game data must be placed in: <b class="txt-highlight">\dev_hdd0\game\</b>
						</p>
						<p>
							 • PlayStation Network .rap files must be placed in: <b class="txt-highlight">\dev_hdd0\home\00000001\exdata\</b>
						</p>
						<p>
							<i>Note: If you're on linux, RPCS3 folders are located in: <b class="txt-highlight">~/.config/rpcs3/</b></i>
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div class="div-anchor" id="install_updates">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>Installing games and software updates</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 Game and software updates are handled the exact same way that PlayStation Network .pkg files are. The. pkg update file must be installed using RPCS3's built-in package installer found under <b class="txt-highlight">File > Install .pkg</b> The update will be placed in the game or software folder that corresponds to the correct region ID. Please note that game and software updates must be the same region in order to work. Cross-mixing game or software regions may create irreversible damage to the game or software.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id="featured-tx1-heading" class="div-heading ">
				<h2>Obtaining Games</h2>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div class="div-anchor" id="obtaining_games">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>Obtaining games and software</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							<b>Method A:</b> We recommend that you dump your own PlayStation 3 games and software from your own console. We believe that this is the most efficient and safest way to migrate your disc-based games and digital games from your console to your PC without the hassle of repairing bad game dumps found on the internet or possible legal repercussions. To do this, you will need a PlayStation 3 system with a custom firmware and various software tools that are used to rip/dump games from your system's Blu-ray drive or internal storage.
						</p>
						<br>
						<p>
							<b>Method B:</b> You can dump games using only a computer by using select compatible Blu-ray drives. Please note that you can only use this method if an <b class="txt-highlight">.ird</b> file is available online for the decryption of the disc. See <b class="txt-highlight">Dumping games and software with a Blu-ray drive</b> below. Not every Blu-ray drive will recognize PlayStation 3 games due to how PlayStation 3 format discs are designed. Here's a compiled list of the known compatible Blu-ray drives that are capable of reading PlayStation game discs:
						</p>
						<br>
						<p>
							 • ASUS <b class="txt-highlight">BC-08B1LT</b>
						</p>
						<p>
							 • ASUS <b class="txt-highlight">BC-16D1HT</b>
						</p>
						<p>
							 • ASUS <b class="txt-highlight">BC-12B1ST</b>
						</p>
						<p>
							 • ASUS <b class="txt-highlight">BC-12D2HT</b>
						</p>
						<p>
							 • ASUS <b class="txt-highlight">BW-16D1HT</b>
						</p>
						<p>
							 • LG <b class="txt-highlight">BH26NS40</b>
						</p>
						<p>
							 • LG <b class="txt-highlight">UH12NS30</b>
						</p>
						<p>
							 • LG <b class="txt-highlight">BH16NS40</b>
						</p>
						<p>
							 • LG <b class="txt-highlight">BH16NS48</b>
						</p>
						<p>
							 • LG <b class="txt-highlight">BH14NS40</b>
						</p>
						<p>
							 • LG <b class="txt-highlight">WH24NS40</b>
						</p>
						<p>
							 • LG <b class="txt-highlight">WH12LS30</b>
						</p>
						<p>
							 • LG <b class="txt-highlight">WH24LS30</b>
						</p>
						<p>
							 • LG <b class="txt-highlight">WH26NS40</b>
						</p>
						<p>
							 • LG <b class="txt-highlight">WH16NS40</b>
						</p>
						<p>
							 • LG <b class="txt-highlight">WH16NS48</b>
						</p>
						<p>
							 • Lite-On <b class="txt-highlight">DH-4O1S</b>
						</p>
						<p>
							 • Lite-On <b class="txt-highlight">iHBS112</b>
						</p>
						<p>
							 • BENQ <b class="txt-highlight">BR1000</b>
						</p>
						<p>
							 • Samsung <b class="txt-highlight">DVDWBD SH-B083L</b>
						</p>
						<p>
							 • Sony Optiarc <b class="txt-highlight">5300S</b>
						</p>
						<p>
							 • Sony PlayStation stock drive <b class="txt-highlight">with proprietary adapter</b>
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block'>
				<div class="div-anchor" id="dumping_games">
				</div>
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block'>
						<h2>Dumping games and software with a Blu-ray drive</h2>
					</div>
					<div id='featured-tx2-block'>
						<p>
							 You will need two different tools for dumping PlayStation 3 game discs from a computer using a Blu-ray drive:
						</p>
						<br>
						<p>
							 • <a href='/cdn/tools/patcher.zip' download>PS3 ISO Patcher</a> - By BlackDaemon
						</p>
						<p>
							 • <a href='/cdn/tools/3k3y.zip' download>3k3y ISO Tools</a> - By the 3k3y team
						</p>
						<br>
						<p>
							 1. Insert a PlayStation 3 Blu-ray disc game of your choice.
						</p>
						<p>
							 2. Dump the <b class="txt-highlight">.iso</b> image using a program like Alcohol 120%.
						</p>
						<p>
							 3. Use <a href="http://jonnysp.bplaced.net">jonnysp.bplaced.net</a> to locate the appropriate <b class="txt-highlight">.ird</b> file that matches your game ID. If there isn't any .ird file that matches your game ID this unfortunately means you can't dump your disc using this method.
						</p>
						<p>
							 4. Be sure to check game ID in case of different game editions. You need to use the file for the exact game ID, otherwise it won't work (<i>for example: .ird file for Demon's Souls US disc doesn't work with Demon's Souls EU disc</i>).
							<p>
								 5. Open <b class="txt-highlight">PS3 ISO Patcher</b> and select your dumped <b class="txt-highlight">.iso</b> file and its appropriate <b class="txt-highlight">.ird</b> file.
							</p>
							<p>
								 6. Press <b class="txt-highlight">Patch</b> to apply the patch to the .iso file.
							</p>
							<p>
								 7. Open <b class="txt-highlight">3k3y ISO Tools</b> and decrypt the .iso file.
							</p>
							<p>
								 8. Your game should now be properly decrypted.
							</p>
							<p>
								 9. You must now <b class="txt-highlight">extract</b> your decrypted .iso file with an appropriate .iso extraction tool.
							</p>
							<p>
								 10. You are now able to use your successfully dumped disc-based game with RPCS3.
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
					<div class="div-anchor" id="cpu_settings">
					</div>
					<div id='featured-wrp-block'>
						<div id='featured-tx1-block'>
							<h2>CPU settings</h2>
						</div>
						<div id='featured-tx2-block'>
							<p>
								<b>PPU Interpreter (Precise)</b><br>
								 Currently not available. Will provide more accurate real-time PPU emulation, at the cost of speed.
							</p>
							<br>
							<p>
								<b>PPU Interpreter (Fast)</b><br>
								 Provides fast real-time PPU emulation but is less accurate.
							</p>
							<br>
							<p>
								<b>PPU Recompiler (LLVM)</b><br>
								 LLVM is an AOT recompiler. It pre-caches the ELF/SELF executable and provides both the fastest and most accurate PPU emulation.
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
				<div id='featured-con-block'>
					<div class="div-anchor" id="gpu_settings">
					</div>
					<div id='featured-wrp-block'>
						<div id='featured-tx1-block'>
							<h2>GPU settings</h2>
						</div>
						<div id='featured-tx2-block'>
							<p>
								<b>Renderer</b><br>
								 Allows you to select OpenGL, Vulkan and D3D12 renderers. Please note that D3D12 (DirectX 12) is only compatible with Windows 10. OpenGL will always be the most accurate renderer followed by Vulkan and then DirectX 12. This is due to OpenGL receiving bug fixes and implementations ahead of the other renderers.
							</p>
							<br>
							<p>
								<b>Resolution</b><br>
								 Allows you to set the native rendering resolution for the emulated console. Optimal resolutions for testing are 1920x1080 and 1280x720. Not all games will render at 1080p because a real PlayStation 3 doesn't support this resolution on all games.
							</p>
							<br>
							<p>
								<b>Graphics Device</b><br>
								 Allows you to select your preferred D3D12 or VK device when using either the DirectX 12 or Vulkan graphics APIs.
							</p>
							<br>
							<p>
								<b>Aspect Ratio</b><br>
								 Defines the aspect ratio of the the emulated console.
							</p>
							<br>
							<p>
								<b>Frame Limit</b><br>
								 In most cases, this setting should be set to either Off if the game has internal framelocking or Auto if the game doesn't. Otherwise, some games may surpass their 30/60FPS target causing issues such as sped-up gameplay or physics glitches. Games are only intended to run up to 60FPS on a real PlayStation 3.
							</p>
							<br>
							<p>
								<b>Read/Write Color buffers</b><br>
								 These buffers should be disabled for now as they're not working properly with any of the renderers. The buffers are only required for bigger AAA games. Some advanced games like Demon's Souls require the use of the Read Color buffers options.
							</p>
							<br>
							<p>
								<b>Read/Write Depth buffers</b><br>
								 These buffers should be disabled for now as they're not working properly with any of the renderers. The buffers are only required for bigger AAA games. Some advanced games like Demon's Souls require the use of the Read Color buffers options.
							</p>
							<br>
							<p>
								<b>Invalidate cache every frame</b><br>
								 Helps improve the way shadows are handled by very select few games. Only enable this option unless absolutely necessary.
							</p>
							<br>
							<p>
								<b>Use GPU texture scaling</b><br>
								 Improves performance slightly by scaling textures appropriately and works for most games. In rare cases, this option may cause texture corruption.
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
				<div id='featured-con-block'>
					<div class="div-anchor" id="audio_settings">
					</div>
					<div id='featured-wrp-block'>
						<div id='featured-tx1-block'>
							<h2>Audio settings</h2>
						</div>
						<div id='featured-tx2-block'>
							<p>
								<b>Audio Out</b><br>
								 Allows you to select your preferred audio driver for the emulated console. The emulator currently supports OpenAL, XAudio2 (Windows-only) and ALSA (Linux-only). XAudio2 should always be used on Windows operating systems for proper audio playback, and ALSA should always be used on Linux systems.
							</p>
							<br>
							<p>
								 If you run into any issues with either audio backends, set the output to Null. This will disable all audio for the emulator.
							</p>
						</div>
					</div>
				</div>
				<!-- End -->
				<div id='featured-con-block'>
					<div class="div-anchor" id="input_settings">
					</div>
					<div id='featured-wrp-block'>
						<div id='featured-tx1-block'>
							<h2>Input/Output settings</h2>
						</div>
						<div id='featured-tx2-block'>
							<p>
								<b>Controller Handler</b><br>
								 Allows you to select which handler you want to drive your controller's inputs for emulated games and software. For Linux users, you can configure controllers in RPCS3 using the following methods found <a href='https://gist.github.com/kirbyfan64/72f5d7223fcba2e24c4286aea9e4ccc1' target="_blank">here</a>.
							</p>
							<br>
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
				<div id='featured-con-block'>
					<div class="div-anchor" id="network_settings">
					</div>
					<div id='featured-wrp-block'>
						<div id='featured-tx1-block'>
							<h2>Networking settings</h2>
						</div>
						<div id='featured-tx2-block'>
							<p>
								<b>Connection status</b><br>
								 Allows you to spoof an internet connection. Online connectivity is something we're thinking about, but we may not focus on it until RPCS3 is as stable and as accurate as possible.
							</p>
						</div>
					</div>
				</div>
				<!-- End -->
				<div id='featured-con-block'>
					<div class="div-anchor" id="system_settings">
					</div>
					<div id='featured-wrp-block'>
						<div id='featured-tx1-block'>
							<h2>System settings</h2>
						</div>
						<div id='featured-tx2-block'>
							<p>
								<b>Language</b><br>
								 Allows you to change the internal system language of the emulated console. In some rare cases games may fail to go ingame if the system language being used is from a different region than the one of the game.
							</p>
						</div>
					</div>
				</div>
				<!-- End -->
				<a href='/download'>
				<div id='featured-con-button'>
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