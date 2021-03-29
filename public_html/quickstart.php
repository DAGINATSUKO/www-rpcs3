<!doctype html>
<html lang="en-US">
<head>
<title>RPCS3 - Quickstart</title>
<meta charset="utf-8">
<meta name="description" content="RPCS3 is a multi-platform open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows, Linux and BSD.">
<meta name="keywords" content="rpcs3, playstation, playstation 3, ps3, emulator, debugger, windows, linux, bsd, open source, nekotekina, kd11, quickstart">
<meta name="author" content="RPCS3">
<meta name="copyright" content="RPCS3">
<?php include 'lib/module/sys-meta.php';?>
<?php include 'lib/module/sys-css.php';?>
<?php include 'lib/module/sys-js.php';?>
</head>
<body>
<?php include 'lib/module/sys-php.php';?>
<?php include 'lib/module/ui-sidebar-quickstart.php';?>
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
			<div class="banner-tx2-title fade-up-onstart">
				<p>
					 Get up and running on Windows, Linux or BSD
				</p>
			</div>
		</div>
	</div>
	<div class="page-con-container">
		<div class="page-in-container">
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="requirements">
				</div>
				<div class="container-con-wrapper">
					<div class="container-tx1-block darkmode-txt">
						<h2>Hardware Requirements</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						 The hardware requirements for running the emulator vary depending on your current configuration. We have listed the minimum and recommend hardware requirements below. For the best experience, users should be running within the recommended requirements. We cannot guarantee the performance of system specifications below the recommended requirements but you're always welcome to experiment.
					</div>
				</div>
			</div>
			<div class='reqs-con-container'>
				<div class='reqs-con-group'>
					<div class="reqs-con-item reqs-left reqs-head" style="background:#27ae60 !important; color:#fff;">
						<div class='reqs-ico-item' style="background: url('/img/icons/list/recommended.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item">
							<b>Recommended Requirements</b><br>
							 For running playable games, playable performance
						</div>
					</div>
					<div class="reqs-con-item reqs-right reqs-head" style="background:#f39c12 !important; color:#fff">
						<div class='reqs-ico-item' style="background: url('/img/icons/list/minimum.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item">
							<b>Minimum Requirements</b><br>
							 For being able to run any games at all, unplayable performance
						</div>
					</div>
				</div>
				<div class='reqs-con-group'>
					<div class="reqs-con-item reqs-left">
						<div class='reqs-ico-item darkmode-invert' style="background: url('/img/icons/list/cpu.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item darkmode-txt">
							<b>Processor -</b> Intel 4-core with HT or 6-cores and up (Haswell and above)<br>
							<b>Processor -</b> AMD 6-core with SMT or 8-cores and up (Ryzen only)
						</div>
					</div>
					<div class="reqs-con-item reqs-right">
						<div class='reqs-ico-item darkmode-invert' style="background: url('/img/icons/list/cpu.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item darkmode-txt">
							<b>Processor -</b> Any 64-bit capable processor<br>
							<b>Processor -</b> 32-bit processors are <b>not</b> supported
						</div>
					</div>
				</div>
				<div class='reqs-con-group'>
					<div class="reqs-con-item reqs-left">
						<div class='reqs-ico-item darkmode-invert' style="background: url('/img/icons/list/gpu.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item darkmode-txt">
							<b>Graphics Card -</b> A Modern AMD or NVIDIA Vulkan compatible GPU
						</div>
					</div>
					<div class="reqs-con-item reqs-right">
						<div class='reqs-ico-item darkmode-invert' style="background: url('/img/icons/list/gpu.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item darkmode-txt">
							<b>Graphics Card -</b> Any OpenGL 4.3 compatible GPU or greater
						</div>
					</div>
				</div>
				<div class='reqs-con-group'>
					<div class="reqs-con-item reqs-left">
						<div class='reqs-ico-item darkmode-invert' style="background: url('/img/icons/list/ram.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item darkmode-txt">
							<b>Memory -</b> 8GB of RAM or more
						</div>
					</div>
					<div class="reqs-con-item reqs-right">
						<div class='reqs-ico-item darkmode-invert' style="background: url('/img/icons/list/ram.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item darkmode-txt">
							<b>Memory -</b> 4GB of RAM at minimum
						</div>
					</div>
				</div>
				<div class='reqs-con-group'>
					<div class="reqs-con-item reqs-left">
						<div class='reqs-ico-item darkmode-invert' style="background: url('/img/icons/list/storage.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item darkmode-txt">
							<b>Storage -</b> Capacity depends per-game size requirements
						</div>
					</div>
					<div class="reqs-con-item reqs-right">
						<div class='reqs-ico-item darkmode-invert' style="background: url('/img/icons/list/storage.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item darkmode-txt">
							<b>Storage -</b> Capacity depends per-game size requirements
						</div>
					</div>
				</div>
			</div>
			<div class='reqs-con-container-mobile'>
				<div class='reqs-con-group-mobile'>
					<div class="reqs-con-container-mobile" style="background: #27ae60 !Important; color: #fff; webkit-box-shadow: 0px 10px 32px 0 rgba(39, 174, 96, .5); box-shadow: 0px 10px 32px 0 rgba(39, 174, 96, .5);">
						<div class='reqs-ico-item' style="background: url('/img/icons/list/recommended.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item-mobile">
							<b>Recommended Requirements</b><br>
							 For running playable games, playable performance
						</div>
					</div>
				</div>
				<div class='reqs-con-group-mobile'>
					<div class="reqs-con-container-mobile">
						<div class='reqs-ico-item darkmode-invert-mobile darkmode-invert' style="background: url('/img/icons/list/cpu.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item-mobile darkmode-txt">
							<b>CPU -</b> Intel 4-core with HT or 6-cores and up (Haswell and above)<br>
							<b>CPU -</b> AMD 6-core with SMT or 8-cores and up (Ryzen only)
						</div>
					</div>
				</div>
				<div class='reqs-con-group-mobile'>
					<div class="reqs-con-container-mobile">
						<div class='reqs-ico-item darkmode-invert-mobile darkmode-invert' style="background: url('/img/icons/list/gpu.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item-mobile darkmode-txt">
							<b>Graphics Card -</b> A Modern AMD or NVIDIA Vulkan compatible GPU
						</div>
					</div>
				</div>
				<div class='reqs-con-group-mobile'>
					<div class="reqs-con-container-mobile">
						<div class='reqs-ico-item darkmode-invert-mobile darkmode-invert' style="background: url('/img/icons/list/ram.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item-mobile darkmode-txt">
							<b>RAM -</b> 8GB of system memory or greater
						</div>
					</div>
				</div>
				<div class='reqs-con-group-mobile'>
					<div class="reqs-con-container-mobile">
						<div class='reqs-ico-item darkmode-invert-mobile darkmode-invert' style="background: url('/img/icons/list/storage.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item-mobile darkmode-txt">
							<b>Storage -</b> Capacity depends per-game size requirements
						</div>
					</div>
				</div>
				<div class="reqs-con-divider">
				</div>
				<div class='reqs-con-group-mobile'>
					<div class="reqs-con-container-mobile" style="background: #f39c12; color: #fff; webkit-box-shadow: 0px 10px 32px 0 rgba(243, 156, 18, .5); box-shadow: 0px 10px 32px 0 rgba(243, 156, 18, .5)">
						<div class='reqs-ico-item' style="background: url('/img/icons/list/minimum.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item-mobile">
							<b>Minimum Requirements</b><br>
							 For being able to run any games at all, unplayable performance
						</div>
					</div>
				</div>
				<div class='reqs-con-group-mobile'>
					<div class="reqs-con-container-mobile">
						<div class='reqs-ico-item darkmode-invert-mobile darkmode-invert' style="background: url('/img/icons/list/cpu.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item-mobile darkmode-txt">
							<b>CPU -</b> Any modern 64-bit capable processor<br>
							<b>CPU -</b> 32-bit processors are <b>not</b> supported
						</div>
					</div>
				</div>
				<div class='reqs-con-group-mobile'>
					<div class="reqs-con-container-mobile">
						<div class='reqs-ico-item darkmode-invert-mobile darkmode-invert' style="background: url('/img/icons/list/gpu.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item-mobile darkmode-txt">
							<b>Graphics Card -</b> Any OpenGL 4.3 compatible GPU or greater
						</div>
					</div>
				</div>
				<div class='reqs-con-group-mobile'>
					<div class="reqs-con-container-mobile">
						<div class='reqs-ico-item darkmode-invert-mobile darkmode-invert' style="background: url('/img/icons/list/ram.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item-mobile darkmode-txt">
							<b>RAM -</b> 4GB of system memory at minimum
						</div>
					</div>
				</div>
				<div class='reqs-con-group-mobile'>
					<div class="reqs-con-container-mobile">
						<div class='reqs-ico-item darkmode-invert-mobile darkmode-invert' style="background: url('/img/icons/list/storage.png') no-repeat center;">
						</div>
						<div class="reqs-tx1-item-mobile darkmode-txt">
							<b>Storage -</b> Capacity depends per-game size requirements
						</div>
					</div>
				</div>
			</div>
			<div class="container-con-wrapper">
				<div class="container-tx1-block darkmode-txt">
					<h2>Laptop Requirements</h2>
				</div>
				<div class="container-tx2-block darkmode-txt">
					 We recommend using a laptop equipped with an <span class="highlight darkmode-highlight">8-core/16-thread</span> 35W+ H-series CPU such as an Intel Core i7-10870H or an AMD Ryzen 7 5800H, as well as having a compatible <span class="highlight darkmode-highlight">dedicated GPU (dGPU)</span> with Vulkan compatibility. While being a tall order, this is the ideal spec and we cannot guarantee even remotely good performance with laptops equipped with as little as 4-cores.<br>
					 <br>
					 We strongly recommend using RPCS3 with a desktop PC over a laptop. Should you want to use a laptop, these are the hardware requirements for an optimal experience.
				</div>
			</div>
			<div class="container-con-wrapper">
				<div class="container-tx1-block darkmode-txt">
					<h2>Software Requirements</h2>
				</div>
				<div class="container-tx2-block darkmode-txt">
					 The software requirements for running the emulator must be met in order for the software to function at all. The PlayStation 3 system software is required because it is utilized to load system files for the emulator such as the PlayStation 3's proprietary system libraries. Linux and BSD based operating systems do not require the Microsoft Visual C++ 2019 redistributable.<br>
					<br>
					<span class="context-important">Please note - </span> A 64-bit operating system is required. Windows 7, 8 and 10 are supported as well as Linux and BSD. <br>
					<br>
				</div>
			</div>
			<div class="button-con-container">
				<div class='reqs-con-group'>
					<a href='https://www.playstation.com/en-us/support/hardware/ps3/system-software/' target="_blank">
					<div class="reqs-con-container button-left button-enabled darkmode-panel">
						<div class='button-ico-container' style="background: url('/img/icons/list/ps-h.png') no-repeat center;">
						</div>
						<div class="button-tx1-text darkmode-txt">
							 PlayStation 3 System Software
						</div>
					</div>
					</a>
					<a href='https://aka.ms/vs/16/release/VC_redist.x64.exe' target="_blank">
					<div class="reqs-con-container button-right button-enabled darkmode-panel">
						<div class='button-ico-container' style="background: url('/img/icons/list/redist.png') no-repeat center;">
						</div>
						<div class="button-tx1-text darkmode-txt">
							 Visual C++ 2019 Redistributable (Windows Only)
						</div>
					</div>
					</a>
				</div>
			</div>
			<div class="guide-con-content context-windows darkmode-panel">
				<div class="anchor-point" id="updating">
				</div>
				<div class='guide-ico-content' style="background: url('/img/icons/list/windows.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 For Windows users, download the latest build and drag and drop all files into your RPCS3 root directory, replacing all files when prompted.
					</p>
				</div>
			</div>
			<div class="guide-con-content context-linux darkmode-panel">
				<div class='guide-ico-content' style="background: url('/img/icons/list/linux.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 For Linux users, download the latest AppImage and make it executable with the command <span class="linux-highlight darkmode-highlight">chmod a+x ./rpcs3-*_linux64.AppImage && ./rpcs3-*_linux64.AppImage</span>
					</p>
				</div>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="firmware">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>Installing PlayStation 3 firmware files</h2>
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
			<div class="guide-con-content context-windows darkmode-panel">
				<div class="anchor-point" id="manage_saves">
				</div>
				<div class='guide-ico-content' style="background: url('/img/icons/list/windows.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 For Windows users, save data files can be managed in <span class="highlight darkmode-highlight">\dev_hdd0\home\00000001\savedata\</span>
					</p>
				</div>
			</div>
			<div class="guide-con-content context-linux darkmode-panel">
				<div class='guide-ico-content' style="background: url('/img/icons/list/linux.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 For Linux users, save data files can be managed in <span class="linux-highlight darkmode-highlight">~/.config/rpcs3/dev_hdd0/</span>
					</p>
				</div>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="manage_files">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>Managing PlayStation 3 titles</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 Due to legal reasons, PlayStation 3 titles cannot be distributed online and must be self-dumped from your own PlayStation 3 console or from your computer using a compatible Blu-ray drive.
						</p>
						<br>
						<p>
							 Both Blu-ray and PlayStation Network titles (PSN) must be placed into a single folder with their respective files and the folder name must correspond to the title's ID. If you are not sure what your dumped title's region ID is, you can find your region ID on the bottom side-edge of your game case. If you are no longer in possession of your title's game case or your title is only accessible through PSN, you can do an internet search for <span class="highlight darkmode-highlight">"Your game name here</span> + <span class="highlight darkmode-highlight">region ID"</span>. Please note that it is very important that you use the correct region ID. <br>
							<br>
							<p>
								 Typical layout of a Blu-ray disc title's directory: <span class="highlight darkmode-highlight">PS3_GAME folder, PS3_DISC.sfb, PS3_UPDATE folder (not required)</span>
							</p>
							<p>
								 Typical layout of a PSN title's directory: <span class="highlight darkmode-highlight">TROPDIR folder, USRDIR folder, ICON0.png, PARAM.sfo, etc</span>
							</p>
						</p>
					</div>
				</div>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="manage_formats">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>PlayStation 3 title formats</h2>
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
				<div class="anchor-point" id="install_games">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>Installing PlayStation 3 titles</h2>
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
				<div class="anchor-point" id="install_updates">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>Installing PlayStation 3 title updates</h2>
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
						<h2 style="color: #ff4d4d !important;">Software Distribution laws in your country</h2>
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
					<div class="container-tx1-block">
						<h2>Dumping with a Blu-ray drive</h2>
					</div>
					<div class="container-tx2-block">
						<p>
							 You can dump titles using your computer by using select compatible Blu-ray drives. Please note that you can only use this method if a .ird file is available online for the decryption of the disc. Not every Blu-ray drive will recognize PlayStation 3 titles due to how PlayStation 3 format discs are designed. Requirements for a Blu-Ray drive to be able to fully read PlayStation 3 discs are: Mediatek chipset and a +6 read offset.
						</p>
					</div>
				</div>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="compatible_drives">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>Compatible Blu-ray disc drives</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 Here's a compiled list of the known compatible Blu-ray drives that are capable of reading PlayStation format discs for use with your computer.
						</p>
					</div>
				</div>
			</div>
			<div class="drives-con-container">
				<div class="container-tx3-block darkmode-txt">
					<span>
					LG Drives </span>
				</div>
				<div class="drives-con-outer darkmode-txt">
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 BE16NU50 <span class="drives-txt-revisions">*External Drive</span>
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 BH14NS40
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 BH16NS40
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 BH16NS48
					</div>
				</div>
				<div class="drives-con-outer darkmode-txt">
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 BH16NS55
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 BH26NS40
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 BP50NB40 <span class="drives-txt-revisions">*External Drive</span>
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 BU20N
					</div>
				</div>
				<div class="drives-con-outer darkmode-txt">
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 BU40N
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 CH12NS30
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 UH12NS30
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 WH12LS30 <span class="drives-txt-revisions">*Some revisions</span>
					</div>
				</div>
				<div class="drives-con-outer darkmode-txt">
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 WH14NS40
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 WH16NS40
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 WH16NS48
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 WH24LS30
					</div>
				</div>
				<div class="drives-con-outer darkmode-txt">
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 WH24NS40
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 WH26NS40
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 BH16NS60
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 BE14NU40
					</div>
				</div>
			</div>
			<div class="drives-con-container">
				<div class="container-tx3-block darkmode-txt">
					<span>
					ASUS Drives </span>
				</div>
				<div class="drives-con-outer darkmode-txt">
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 BC-08B1LT
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 BC-12B1ST <span class="drives-txt-revisions">*Some revisions</span>
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 BC-12D2HT
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 BC-16D1HT
					</div>
				</div>
				<div class="drives-con-outer darkmode-txt">
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 BW-12B1ST
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 BW-16D1HT
					</div>
					<div class="drives-con-inner drives-txt-hidden">
						 XX-XXXXXX
					</div>
					<div class="drives-con-inner drives-txt-hidden">
						 XX-XXXXXX
					</div>
				</div>
				<div class="drives-con-outer darkmode-txt" style="display:none">
					<div class="drives-con-inner drives-txt-hidden">
						 XX-XXXXXX
					</div>
					<div class="drives-con-inner drives-txt-hidden">
						 XX-XXXXXX
					</div>
					<div class="drives-con-inner drives-txt-hidden">
						 XX-XXXXXX
					</div>
					<div class="drives-con-inner drives-txt-hidden">
						 XX-XXXXXX
					</div>
				</div>
			</div>
			<div class="drives-con-container">
				<div class="container-tx3-block darkmode-txt">
					<span>
					Samsung Drives </span>
				</div>
				<div class="drives-con-outer darkmode-txt">
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 SH-B083L
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 SH-B123L
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 SE-506
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 SE-406
					</div>
				</div>
			</div>
			<div class="drives-con-container">
				<div class="container-tx3-block darkmode-txt">
					<span>
					LITE-ON Drives </span>
				</div>
				<div class="drives-con-outer darkmode-txt">
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 DH-4O1S
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 IHBS112
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 IHBS312
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 DS-6E2SH <span class="drives-txt-revisions">*19C revision</span>
					</div>
				</div>
			</div>
			<div class="drives-con-container">
				<div class="container-tx3-block darkmode-txt">
					<span>
					Sony Drives </span>
				</div>
				<div class="drives-con-outer darkmode-txt">
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 Optiarc 5300S
					</div>
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 PS3 BDD with proprietary adapter
					</div>
					<div class="drives-con-inner drives-txt-hidden">
						 XX-XXXXXX
					</div>
					<div class="drives-con-inner drives-txt-hidden">
						 XX-XXXXXX
					</div>
				</div>
			</div>
			<div class="drives-con-container">
				<div class="container-tx3-block darkmode-txt">
					<span>
					BenQ Drives </span>
				</div>
				<div class="drives-con-outer darkmode-txt">
					<div class="drives-con-inner darkmode-txt">
						<div class="drives-ico-bluray">
						</div>
						 BR1000
					</div>
					<div class="drives-con-inner drives-txt-hidden">
						 XX-XXXXXX
					</div>
					<div class="drives-con-inner drives-txt-hidden">
						 XX-XXXXXX
					</div>
					<div class="drives-con-inner drives-txt-hidden">
						 XX-XXXXXX
					</div>
				</div>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="dumping_linux">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>A command-line option for Linux users</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 If you're comfortable with the Linux command-line and you have a compatible BluRay drive, you can try ripping PlayStation 3 discs using a Python program called <a href="https://notabug.org/necklace/libray" target="_blank" rel="noopener noreferrer">LibRay</a>.
						</p>
						<p>
							 Do note that this method requires an .ird file that matches your title ID to be available on <a href="http://jonnysp.bplaced.net" target="_blank" rel="noopener noreferrer">jonnysp.bplaced.net</a>. (libray will automatically attempt to download the correct .ird file, if it exists, so you do not need to do so manually.) If a matching .ird file is not present, please try the PS3 Disc Dumper mentioned below.
						</p>
					</div>
				</div>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchor-point" id="dumping_procedure">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>One-click easy solution</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 This is an automated &amp; user-friendly way of getting a decrypted copy of your PlayStation 3 discs. You must possess one of the aforementioned compatible disc drives to complete the disc dumping procedure. Again, this method will not work with standard Blu-ray drives.
						</p>
					</div>
				</div>
			</div>
			<a href='https://github.com/13xforever/ps3-disc-dumper/releases/latest' target="_blank">
			<div class="guide-con-content button-enabled darkmode-panel">
				<div class='guide-ico-content' style="background: url('/img/icons/list/dumper.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt pulsate">
					<p>
						 PS3 Disc Dumper by 13xforever
					</p>
				</div>
			</div>
			</a>
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
				<div class="anchor-point" id="dumping_procedure_manual">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>Step-by-step disc dumping</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 In case the easy way didn't work for you, here's a compiled list of the step-by-step instructions we used for dumping disc-based PlayStation 3 titles.
						</p>
					</div>
				</div>
			</div>
			<div class="button-con-container">
				<div class='reqs-con-group'>
					<a href='/cdn/tools/patcher.zip' download>
					<div class="reqs-con-container button-left button-enabled darkmode-panel">
						<div class='button-ico-container' style="background: url('/img/icons/list/patcher.png') no-repeat center;">
						</div>
						<div class="button-tx1-text darkmode-txt pulsate">
							 PS3 ISO Patcher by BlackDaemon
						</div>
					</div>
					</a>
					<a href='/cdn/tools/3k3y.zip' download>
					<div class="reqs-con-container button-right button-enabled darkmode-panel">
						<div class='button-ico-container' style="background: url('/img/icons/list/3k3y.png') no-repeat center;">
						</div>
						<div class="button-tx1-text darkmode-txt pulsate">
							 3K3Y ISO Tools by 3K3Y
						</div>
					</div>
					</a>
				</div>
			</div>
			<a href="https://www.imgburn.com" target="_blank" rel="noopener noreferrer">
			<div class="guide-con-content button-enabled darkmode-panel">
				<div class='guide-ico-content' style="background: url('/img/icons/list/imgburn.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt pulsate">
					<p>
						 ImgBurn
					</p>
				</div>
			</div>
			</a>
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
<?php include 'lib/module/ui-main-footer.php';?>
</div>
</body>
</html>
