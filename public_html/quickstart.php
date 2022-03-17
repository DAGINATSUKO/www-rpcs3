<!doctype html>
<html lang="en-US">
<head>
<title>RPCS3 - Quickstart</title>
<meta charset="utf-8">
<meta name="description" content="RPCS3 is a multi-platform open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows, Linux, macOS and FreeBSD. The purpose of this project is to accurately emulate the PlayStation 3 in its entirety with the power of reverse engineering and community collaboration.">
<meta name="keywords" content="rpcs3, playstation, playstation 3, ps3, emulator, debugger, windows, linux, macos, freebsd, open source, nekotekina, kd11, quickstart">
<?php include 'lib/module/sys-meta.php';?>
<meta property="og:title" content="RPCS3 - The PlayStation 3 Emulator" />
<meta property="og:description" content="RPCS3 is a multi-platform open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows, Linux, macOS and FreeBSD made possible with the power of reverse engineering." />
<meta property="og:image" content="https://rpcs3.net/img/meta/mobile/1200.png" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta property="og:url" content="https://rpcs3.net" />
<meta property="og:locale" content="en_US"/>
<meta property="og:type" content="website" />
<meta property="og:site_name" content="RPCS3" />

<meta name="twitter:title" content="RPCS3 - The PlayStation 3 Emulator">
<meta name="twitter:description" content="RPCS3 is a multi-platform open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows, Linux, macOS and FreeBSD made possible with the power of reverse engineering.">
<meta name="twitter:image" content="https://rpcs3.net/img/meta/mobile/1200.png">
<meta name="twitter:site" content="@rpcs3">
<meta name="twitter:creator" content="@rpcs3">
<meta name="twitter:card" content="summary_large_image">
<?php include 'lib/module/sys-css.php';?>
<?php include 'lib/module/sys-js.php';?>
</head>
<body>
<?php include 'lib/module/sys-php.php';?>
<?php include 'lib/module/inc-sidebar-quickstart.php';?>
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
				<h1>Quickstart</h1>
			</div>
			<div class='banner-con-divider'>
			</div>
			<div class="banner-tx2-title fade-up-onstart">
				<p>
					 Get RPCS3 up and running on your PC
				</p>
			</div>
		</div>
	</div>
	<div class="page-con-container">
		<div class="page-in-container">
			<div class="landing-con-panel" style="background: url('/img/graphics/panels/quickstart.jpg') no-repeat center;">
				<div class='landing-ovr-panel'>
					<div class='landing-tx1-panel'>
						<h2>Hardware Check</h2>
					</div>
				</div>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="requirements_desktop">
				</div>
				<div class="container-con-wrapper">
					<div class="container-tx1-block darkmode-txt">
						<div class='container-emp-block'>
						</div>
						<h2>Desktop PC Requirements</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 The hardware requirements for running the emulator vary depending on your current configuration. We have listed the minimum and recommend hardware requirements below. For the best experience, users should be running within the recommended requirements. We cannot guarantee the performance of system specifications below the recommended requirements but you're always welcome to experiment.
						</p>
					</div>
				</div>
			</div>
			<?php include 'lib/module/inc-specs.php';?>
			<div class="container-con-wrapper">
				<div class="anchor-point" id="requirements_laptop">
				</div>
				<div class="container-tx1-block darkmode-txt">
					<h2>Laptop PC Requirements</h2>
				</div>
				<div class="container-tx2-block darkmode-txt">
					<p>
						 We recommend using a laptop equipped with an <span class="highlight darkmode-highlight">8-core/16-thread</span> 35W+ H-series CPU such as an Intel Core i7-10870H or an AMD Ryzen 7 5800H, as well as having a compatible <span class="highlight darkmode-highlight">dedicated GPU (dGPU)</span> with Vulkan compatibility. While being a tall order, this is the ideal spec and we cannot guarantee even remotely good performance with laptops equipped with as little as 4-cores.<br>
						<br>
						 We strongly recommend using RPCS3 with a desktop PC over a laptop. Should you want to use a laptop, these are the hardware requirements for an optimal experience.
					</p>
				</div>
			</div>
			<div class="container-con-wrapper">
				<div class="anchor-point" id="requirements_software">
				</div>
				<div class="container-tx1-block darkmode-txt">
					<h2>Software Requirements</h2>
				</div>
				<div class="container-tx2-block darkmode-txt">
					<p>
						 The software requirements for running the emulator must be met in order for the software to function at all. The PlayStation 3 system software is required because it is utilized to load system files for the emulator such as the PlayStation 3's proprietary system libraries. Linux and FreeBSD based operating systems do not require the Microsoft Visual C++ 2019 redistributable.<br>
						<br>
						<span class="context-important">Please note - </span> A 64-bit operating system is required. Windows 7, 8, 10 and 11 are supported as well as Linux and FreeBSD. <br>
					</p>
				</div>
			</div>
			<div class="generic-con-button ">
				<a href='https://www.playstation.com/en-us/support/hardware/ps3/system-software/' target="_blank">
				<div class="generic-btn-button">
					<div class="generic-ico-button" style="background: url('/img/icons/buttons/playstation-h.png') no-repeat center">
					</div>
					<div class="generic-tx1-button">
						<span>PlayStation 3 System Software <span class="generic-tx2-label">Required*</span></span>
					</div>
				</div>
				</a>
				<a href='https://aka.ms/vs/16/release/VC_redist.x64.exe' target="_blank">
				<div class="generic-btn-button">
					<div class="generic-ico-button" style="background: url('/img/icons/buttons/redist-h.png') no-repeat center">
					</div>
					<div class="generic-tx1-button">
						<span>Visual C++ 2019 Redistributable <span class="generic-tx2-label">Windows*</span></span>
					</div>
				</div>
				</a>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="update_rpcs3">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>Installing RPCS3 Updates</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 RPCS3 features an auto-updater which will prompt you if you want to update after loading the emulator. You can either accept, deny or disable updates all together if you wish, though it is not recommended due to the volume of fixes that roll out each day. In the instance that you need to update RPCS3 manually, you can follow the following instructions:
						</p>
					</div>
				</div>
			</div>
			<div class="guide-con-content context-windows darkmode-panel">
				<div class='guide-ico-content darkmode-invert' style="background: url('/img/icons/buttons/windows.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 For Windows users, download the latest build and drag and drop all files into your RPCS3 root directory, replacing all files when prompted.
					</p>
				</div>
			</div>
			<div class="guide-con-content context-linux darkmode-panel">
				<div class='guide-ico-content darkmode-invert' style="background: url('/img/icons/buttons/linux.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 For Linux users, download the latest AppImage and make it executable with the command <span class="linux-highlight darkmode-highlight">chmod a+x ./rpcs3-*_linux64.AppImage && ./rpcs3-*_linux64.AppImage</span>
					</p>
				</div>
			</div>
			<div class="guide-con-content context-macos darkmode-panel">
				<div class='guide-ico-content darkmode-invert' style="background: url('/img/icons/buttons/macos.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 For macOS users, download the latest build and drag and drop the RPCS3 app into your applications folder when prompted.
					</p>
				</div>
			</div>
			<div class="guide-con-content context-bsd darkmode-panel">
				<div class='guide-ico-content darkmode-invert' style="background: url('/img/icons/buttons/bsd.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 For FreeBSD users, check your system package manager
					</p>
				</div>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="install_rpcs3_firmware">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>Installing RPCS3 PlayStation 3 Firmware</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 Due to legal reasons, we cannot distribute official PlayStation 3 firmware files. You must download the latest PlayStation 3 firmware update file from <a href="https://www.playstation.com/en-us/support/hardware/ps3/system-software/">PlayStation.com</a> for use with RPCS3. Once downloaded, you must install the firmware using RPCS3's built in firmware installer found under <span class="highlight darkmode-highlight">File &gt; Install Firmware.</span><br>
							<br>
							 By default, firmware modules are loaded automatically based on the PlayStation 3 title that is loaded. You can still override automatic module loading and choose which firmware modules you want to use manually. This is not recommended.
						</p>
					</div>
				</div>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="manage_playstation_3_game_data">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>Managing PlayStation 3 Game Data</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 Due to legal reasons, PlayStation 3 titles cannot be distributed online and must be self-dumped from your own PlayStation 3 console or from your computer using a compatible Blu-ray drive.
						</p>
						<br>
						<p>
							 Both Blu-ray and PlayStation Network titles (PSN) must be placed into a single folder with their respective files and the folder name must correspond to the title's ID. If you are not sure what your dumped title's region ID is, you can find your region ID on the bottom side-edge of your game case. If you are no longer in possession of your title's game case or your title is only accessible through PSN, you can do an internet search for <span class="highlight darkmode-highlight">"Your game name here</span> + <span class="highlight darkmode-highlight">region ID"</span>. Please note that it is very important that you use the correct region ID. <br>
						</p>
						<br>
						<p>
							 Typical layout of a Blu-ray disc title's directory: <span class="highlight darkmode-highlight">PS3_GAME folder, PS3_DISC.sfb, PS3_UPDATE folder (not required)</span>
						</p>
						<p>
							 Typical layout of a PSN title's directory: <span class="highlight darkmode-highlight">TROPDIR folder, USRDIR folder, ICON0.png, PARAM.sfo, etc</span>
						</p>
					</div>
				</div>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="manage_playstation_3_save_data">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>Managing PlayStation 3 Save Data</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 PlayStation 3 save data is specific to each game and saves the progress for your installed games. Should you want to modify, back up or import your own save data from a real PlayStation 3, here are the following locations where save data is stored per operating system:
						</p>
					</div>
				</div>
			</div>
			<div class="guide-con-content context-windows darkmode-panel">
				<div class="anchor-point" id="manage_playstation_3_saves">
				</div>
				<div class='guide-ico-content darkmode-invert' style="background: url('/img/icons/buttons/windows.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 For Windows users, save data files can be managed in <span class="highlight darkmode-highlight">\dev_hdd0\home\00000001\savedata\</span>
					</p>
				</div>
			</div>
			<div class="guide-con-content context-linux darkmode-panel">
				<div class='guide-ico-content darkmode-invert' style="background: url('/img/icons/buttons/linux.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 For Linux users, save data files can be managed in <span class="linux-highlight darkmode-highlight">~/.config/rpcs3/dev_hdd0/</span>
					</p>
				</div>
			</div>
			<div class="guide-con-content context-macos darkmode-panel">
				<div class='guide-ico-content darkmode-invert' style="background: url('/img/icons/buttons/macos.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 For macOS users, save data files can be managed in <span class="macos-highlight darkmode-highlight">/library/application support/rpcs3/dev_hdd0/home/00000001/savedata/</span>
					</p>
				</div>
			</div>
			<div class="guide-con-content context-bsd darkmode-panel">
				<div class='guide-ico-content darkmode-invert' style="background: url('/img/icons/buttons/bsd.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 For FreeBSD users, save data files can be managed in <span class="bsd-highlight darkmode-highlight">~/.config/rpcs3/dev_hdd0/</span>
					</p>
				</div>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="manage_playstation_3_formats">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>Managing PlayStation 3 Game Formats</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 Title IDs that start with a <span class="highlight darkmode-highlight">B</span> are <span class="highlight darkmode-highlight">Blu-Ray disc</span> titles.
						</p>
						<p>
							 Title IDs that start with a <span class="highlight darkmode-highlight">N</span> are <span class="highlight darkmode-highlight">PSN</span> titles.
						</p>
						<br>
						<p>
							 When working with actual title region IDs, the title's region ID will look something similar to this:
						</p>
						<br>
						<p>
							 Example: <span class="highlight darkmode-highlight">BLUS30443</span> is a <span class="highlight darkmode-highlight">US</span> Blu-Ray disc copy of Demon's Souls.
						</p>
						<p>
							 Example: <span class="highlight darkmode-highlight">NPEB01393</span> is a <span class="highlight darkmode-highlight">EU</span> PSN copy of Hatsune Miku: Project DIVA F.
						</p>
					</div>
				</div>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="install_playstation_3_games">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>Installing PlayStation 3 Games</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 .pkg files must be extracted using RPCS3's built-in package installer found under <span class="highlight darkmode-highlight">File &gt; Install .pkg</span> (or simply drag and drop .pkg to the main emulator window)
						</p>
						<p>
							 .pkg files will be automatically installed to <span class="highlight darkmode-highlight">\dev_hdd0\game\</span>
						</p>
						<p>
							 Blu-ray disc title data can be placed in <span class="highlight darkmode-highlight">\dev_hdd0\disc\</span> or anywhere else except for <span class="highlight darkmode-highlight">\dev_hdd0\game\</span> and can be booted from <span class="highlight darkmode-highlight">File &gt; Boot Game</span> if not present on the game list.
						</p>
						<p>
							 PSN title data must be placed in <span class="highlight darkmode-highlight">\dev_hdd0\game\</span>
						</p>
						<p>
							 PSN .rap files must be placed in <span class="highlight darkmode-highlight">\dev_hdd0\home\00000001\exdata\</span> (or simply drag and drop them to the main emulator window)
						</p>
						<br>
						<p>
							<i>Note: If you're on Linux, RPCS3 folders are located in <span class="highlight darkmode-highlight">~/.config/rpcs3/dev_hdd0/</span></i>
						</p>
					</div>
				</div>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="install_playstation_3_updates">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>Installing PlayStation 3 Game Updates</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 Title updates are handled the same as PSN .pkg files. The. pkg update file must be installed using RPCS3's built-in package installer found under <span class="highlight darkmode-highlight">File &gt; Install .pkg</span><br>
							 The update will be placed in the title folder that corresponds to the correct region ID. Please note that title updates must be the same region in order to work. Cross-mixing title regions may create irreversible damage to the title.
						</p>
					</div>
				</div>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="software_distribution">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block">
						<div class='container-emp-block' style="background: #FF3434;">
						</div>
						<h2>Software Distribution laws in your country</h2>
					</div>
					<div class="container-tx2-block">
						<p>
							 When dumping video game software, users are subject to country-specific software distribution laws. RPCS3 is not designed to enable illegal activity. We do not promote piracy nor do we allow it under any circumstances. Please take the time to review copyright and video game software dumping laws and/or policies for your country before proceeding.<br>
							<br>
							 By following these instructions, you will do so at your own discretion. Should you follow these instructions against your local law, we shall not be held responsible for your actions.
						</p>
					</div>
				</div>
				<div class='container-con-wrapper'>
					<div class="anchor-point" id="dumping_with_playstation_3">
					</div>
					<div class="container-tx1-block">
						<h2>Dumping with a PlayStation 3</h2>
					</div>
					<div class="container-tx2-block">
						<p>
							 We recommend that you dump your own PlayStation 3 titles from your own console. This is the most compatible way to migrate your disc-based titles and the only way to dump digital titles to your PC. To do this, you will need a PlayStation 3 system with custom firmware.<br>
							<br>
							 For dumping disc-based games, you need to use multiMAN homebrew software in order to dump your disc files. You can transfer those files over to a computer through an external drive or using a FTP connection between your PlayStation 3 and your computer.<br>
							<br>
							<i>Note: The PlayStation 3 has a maximum file size of 4GB. When dumping games which contain files bigger than 4GB, multiMAN will split those files. When you have your dump over on your computer, you must rejoin the split files back together with part merging software such as <a href="http://karmian.org/projects/ps3merge">ps3merge</a>, otherwise the dump won't work.</i><br>
							<br>
							 For dumping digital games, you must copy the game folder from dev_hdd0/game/GameID on your console over to the same path on your RPCS3 folder. You also need to get your console's IDPS, the game's RIF and ACT.DAT, in order to generate a .RAP license file to be used in the emulator.<br>
							 It is also possible to dump digital content and licenses on <i>any</i> PS3 even without custom firmware, by the way of creating a system backup, and then extracting it with ps3xport software.
						</p>
					</div>
				</div>
				<div class='container-con-wrapper'>
					<div class="anchor-point" id="dumping_with_pc">
					</div>
					<div class="container-tx1-block">
						<h2>Dumping with a Desktop PC</h2>
					</div>
					<div class="container-tx2-block">
						<p>
							 You can dump titles using your computer by using select compatible Blu-ray drives. Please note that you can only use this method if a .ird file is available online for the decryption of the disc. Not every Blu-ray drive will recognize PlayStation 3 titles due to how PlayStation 3 format discs are designed. Requirements for a Blu-Ray drive to be able to fully read PlayStation 3 discs are: Mediatek chipset and a +6 read offset.
						</p>
					</div>
				</div>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="compatible_bd_drives">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>Compatible Desktop PC Blu-ray Drives</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 Here's a compiled list of the known compatible Blu-ray drives that are capable of reading PlayStation format discs for use with your computer.
						</p>
					</div>
				</div>
			</div>
			<?php include 'lib/module/inc-bdds.php';?>
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="dumping_with_linux">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>Dumping with Linux Command Line</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 If you're comfortable with the Linux command-line and you have a compatible Blu-ray drive, you can try ripping PlayStation 3 discs using a Python program called <a href="https://notabug.org/necklace/libray" target="_blank" rel="noopener noreferrer">LibRay</a>.
						</p>
						<p>
							 Do note that this method requires an .ird file that matches your title ID to be available on <a href="http://jonnysp.bplaced.net" target="_blank" rel="noopener noreferrer">jonnysp.bplaced.net</a>. (libray will automatically attempt to download the correct .ird file, if it exists, so you do not need to do so manually.) If a matching .ird file is not present, please try the PS3 Disc Dumper mentioned below.
						</p>
					</div>
				</div>
			</div>
			<div class="generic-con-button ">
				<a href='https://notabug.org/necklace/libray' target="_blank">
				<div class="generic-btn-button">
					<div class="generic-ico-button" style="background: url('/img/icons/buttons/github-h.png') no-repeat center">
					</div>
					<div class="generic-tx1-button">
						<span>LibRay <span class="generic-tx2-label">30KB - Necklace</span></span>
					</div>
				</div>
				</a>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="dumping_with_disc_dumper">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>Dumping with Disc Dumper</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 This is an automated &amp; user-friendly way of getting a decrypted copy of your PlayStation 3 discs. You must possess one of the aforementioned compatible disc drives to complete the disc dumping procedure. Again, this method will not work with standard Blu-ray drives.
						</p>
					</div>
				</div>
			</div>
			<div class="generic-con-button ">
				<a href='https://github.com/13xforever/ps3-disc-dumper/releases/latest' target="_blank">
				<div class="generic-btn-button">
					<div class="generic-ico-button" style="background: url('/img/icons/buttons/discdumper-h.png') no-repeat center">
					</div>
					<div class="generic-tx1-button">
						<span>Disc Dumper <span class="generic-tx2-label">36 MB - 13xforever</span></span>
					</div>
				</div>
				</a>
			</div>
			<div class='list-con-container'>
				<div class='list-tx1-item darkmode-txt'>
					 1
				</div>
				<div class='list-tx2-description darkmode-txt'>
					<p>
						 Insert a PlayStation 3 format disc title of your choice into your compatible Blu-ray drive.
					</p>
				</div>
			</div>
			<div class='list-con-container'>
				<div class='list-tx1-item darkmode-txt'>
					 2
				</div>
				<div class='list-tx2-description darkmode-txt'>
					<p>
						 Run the PS3 Disc Dumper.
					</p>
				</div>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="dumping_step_by_step">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>Dumping Step-by-step</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 In case the easy way didn't work for you, here's a compiled list of the step-by-step instructions we used for dumping disc-based PlayStation 3 titles.
						</p>
					</div>
				</div>
			</div>
			<div class="generic-con-button ">
				<a href='/cdn/tools/patcher.zip' download>
				<div class="generic-btn-button">
					<div class="generic-ico-button" style="background: url('/img/icons/buttons/patcher-h.png') no-repeat center">
					</div>
					<div class="generic-tx1-button">
						<span>.iso Patcher <span class="generic-tx2-label">78 KB - BlackDaemon</span></span>
					</div>
				</div>
				</a>
				<a href='/cdn/tools/3k3y.zip' download>
				<div class="generic-btn-button">
					<div class="generic-ico-button" style="background: url('/img/icons/buttons/3k3y-h.png') no-repeat center">
					</div>
					<div class="generic-tx1-button">
						<span>.iso Tools <span class="generic-tx2-label">3.3 MB - 3K3Y</span></span>
					</div>
				</div>
				</a>
				<a href="https://www.imgburn.com" target="_blank" rel="noopener noreferrer">
				<div class="generic-btn-button">
					<div class="generic-ico-button" style="background: url('/img/icons/buttons/imgburn-h.png') no-repeat center">
					</div>
					<div class="generic-tx1-button">
						<span>ImgBurn <span class="generic-tx2-label">3.8 MB - Lightning UK!</span></span>
					</div>
				</div>
				</a>
			</div>
			<div class='list-con-container'>
				<div class='list-tx1-item darkmode-txt'>
					 1
				</div>
				<div class='list-tx2-description darkmode-txt'>
					<p>
						 Insert a PlayStation 3 format disc title of your choice into your compatible Blu-ray drive.
					</p>
				</div>
			</div>
			<div class='list-con-container'>
				<div class='list-tx1-item darkmode-txt'>
					 2
				</div>
				<div class='list-tx2-description darkmode-txt'>
					<p>
						 Create the .iso image using an .iso dumping program of your choosing, e.g. ImgBurn or IsoBuster.
					</p>
				</div>
			</div>
			<div class='list-con-container'>
				<div class='list-tx1-item darkmode-txt'>
					 3
				</div>
				<div class='list-tx2-description darkmode-txt'>
					<p>
						 Use <a href="http://jonnysp.bplaced.net" target="_blank" rel="noopener noreferrer">jonnysp.bplaced.net</a> to download the appropriate .ird file that matches your title ID. If there isn't an .ird file that matches your title ID, you cannot use this method to dump your selected PlayStation 3 disc at this time.
					</p>
				</div>
			</div>
			<div class='list-con-container'>
				<div class='list-tx1-item darkmode-txt'>
					 4
				</div>
				<div class='list-tx2-description darkmode-txt'>
					<p>
						 Be sure to check the title ID in case there is a different edition of that title. e.g. Uncharted 2 Game of the Year Edition. You must use the correct .ird with the same title ID, otherwise it won't work. (<i>Example: .ird file for Demon's Souls US disc doesn't work with Demon's Souls EU disc</i>).
					</p>
				</div>
			</div>
			<div class='list-con-container'>
				<div class='list-tx1-item darkmode-txt'>
					 5
				</div>
				<div class='list-tx2-description darkmode-txt'>
					<p>
						 Using PS3 ISO Patcher, select the matching .iso and .ird files, then press Patch to apply the decryption keys to the .iso file.
					</p>
				</div>
			</div>
			<div class='list-con-container'>
				<div class='list-tx1-item darkmode-txt'>
					 6
				</div>
				<div class='list-tx2-description darkmode-txt'>
					<p>
						 Using 3K3Y IsoTools press Decrypt button and select the .iso with patched-in decryption keys. This will produce decrypted .dec.iso file.
					</p>
				</div>
			</div>
			<div class='list-con-container'>
				<div class='list-tx1-item darkmode-txt'>
					 7
				</div>
				<div class='list-tx2-description darkmode-txt'>
					<p>
						 Optionally, validate that you have successfully obtained the correct copy of your game. <br>
						 You will need to install PS3 ISO Rebuilder tool from <a href="http://jonnysp.bplaced.net" target="_blank" rel="noopener noreferrer">jonnysp.bplaced.net</a>
						<br>
						 Load your .dec.iso file and your .ird file in the program and let it verify the dump. All of your files must be either Valid or Not required.
					</p>
				</div>
			</div>
			<div class='list-con-container'>
				<div class='list-tx1-item darkmode-txt'>
					 8
				</div>
				<div class='list-tx2-description darkmode-txt'>
					<p>
						 In 3K3Y ISO Tools, use the Tools drop-down menu to select <span class="highlight darkmode-highlight">ISO > Extract ISO</span> and then select the decrypted .iso file to extract its files.<br>
						 Another option is to use 7-zip or any other software that is capable of extracting .iso images.
					</p>
				</div>
			</div>
			<div class='list-con-container'>
				<div class='list-tx1-item darkmode-txt'>
					 9
				</div>
				<div class='list-tx2-description darkmode-txt'>
					<p>
						 You are now able to use the extracted .iso files with RPCS3.
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'lib/module/inc-footer.php';?>
</body>
</html>
