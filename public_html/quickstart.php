<!DOCTYPE html>
<html lang="en-US">
<head>
<title>RPCS3 - Quickstart</title>
<meta charset="UTF-8">
<meta content="RPCS3 is an open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows and Linux." name="description">
<meta content="rpcs3, ps3, PlayStation 3, emulator, nekotekina, quickstart" name="keywords">
<meta content="RPCS3" name="author">
<meta content="RPCS3" name="copyright">
<meta content="cO1o6sx54cvKxhbnYsABWtl4sYFj9uVKV0DxLKZkWv8" name="google-site-verification">
<?php include 'lib/module/call-meta.php';?>
<?php include 'lib/module/call-sys.php';?>
</head>
<body>
<?php include 'lib/module/call-php.php';?>
<?php include 'lib/module/ui-sidebar-quickstart.php';?>
<div id="page-con-content">
	<div id="header-con-head">
		<div class="dynamic-banner" id='header-img-head'>
		</div>
		<div class="darkmode-header" id='header-con-overlay'>
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
	<div id="page-con-container">
		<div id="page-in-container">
			<div class="div-heading darkmode-txt" id="featured-tx1-heading">
				<h2>System Requirements</h2>
			</div>
			<div class="darkmode-block" id='featured-con-block'>
				<div class="div-anchor" id="requirements">
				</div>
				<div id='featured-wrp-block'>
					<div class="darkmode-txt" id='featured-tx1-block'>
						<h2>System Requirements</h2>
					</div>
					<div class="darkmode-txt" id='featured-tx2-block'>
						<p>
							 The system requirements for running the emulator have not been finalized and are subject to change during development. We do however have a set of minimum system requirements that must be met for the emulator to function properly on any system. Please note that these are the bare minimum system specifications and the emulator will not function otherwise.
						</p>
					</div>
				</div>
			</div>
			<?php include 'lib/module/in-requirements.php';?>
			<div class="div-heading darkmode-txt" id="featured-tx1-heading">
				<h2>Updating RPCS3</h2>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div class="div-anchor" id="updating">
				</div>
				<div id='guide-ico-container' style="background: url('/img/icons/list/os.png') no-repeat center;">
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 For Windows users, download the latest executable and drag-and-drop it into your RPCS3 root directory.
					</p>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-ico-container' style="background: url('/img/icons/list/linux.png') no-repeat center;">
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 For Linux users, download the latest AppImage and make it executable with the command <span class="txt-highlight darkmode-highlight">chmod a+x ./rpcs3-*_linux64.AppImage</span>
					</p>
				</div>
			</div>
			<div class="div-heading darkmode-txt" id="featured-tx1-heading">
				<h2>Firmware Files</h2>
			</div>
			<div class="darkmode-block" id='featured-con-block'>
				<div class="div-anchor" id="firmware">
				</div>
				<div id='featured-wrp-block'>
					<div class="darkmode-txt" id='featured-tx1-block'>
						<h2>Installing PlayStation 3 firmware files</h2>
					</div>
					<div class="darkmode-txt" id='featured-tx2-block'>
						<p>
							 Due to legal reasons, we cannot distribute official PlayStation 3 firmware files. You must download the latest PlayStation 3 firmware update file from <a href="https://www.playstation.com/en-us/support/system-updates/ps3/">PlayStation.com</a> for use with RPCS3. Once downloaded, you must install the firmware using RPCS3's built in firmware installer found under <span class="txt-highlight darkmode-highlight">File &gt; Install Firmware.</span><br>
							<br>
							 By default, firmware modules are loaded automatically based on the PlayStation 3 title that is loaded. You can still override automatic module loading and choose which firmware modules you want to use manually. This is not recommended.
						</p>
					</div>
				</div>
			</div>
			<div class="div-heading darkmode-txt" id="featured-tx1-heading">
				<h2>Game Saves</h2>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div class="div-anchor" id="manage_saves">
				</div>
				<div id='guide-ico-container' style="background: url('/img/icons/list/os.png') no-repeat center;">
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 For Windows users, save data files can be managed in <span class="txt-highlight darkmode-highlight">\dev_hdd0\home\00000001\savedata\</span>
					</p>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-ico-container' style="background: url('/img/icons/list/linux.png') no-repeat center;">
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 For Linux users, save data files can be managed in <span class="txt-highlight darkmode-highlight">~/.config/rpcs3/</span>
					</p>
				</div>
			</div>
			<div class="div-heading darkmode-txt" id="featured-tx1-heading">
				<h2>File Management</h2>
			</div>
			<div class="darkmode-block" id='featured-con-block'>
				<div class="div-anchor" id="manage_files">
				</div>
				<div id='featured-wrp-block'>
					<div class="darkmode-txt" id='featured-tx1-block'>
						<h2>Managing PlayStation 3 titles</h2>
					</div>
					<div class="darkmode-txt" id='featured-tx2-block'>
						<p>
							 Due to legal reasons, PlayStation 3 titles cannot be distributed online and must be self-dumped from your own PlayStation 3 console or from your computer using a compatible Blu-ray drive.
						</p>
						<br>
						<p>
							 Both Blu-ray and PlayStation Network titles (PSN) must be placed into a single folder with their respective files and the folder name must correspond to the title's ID. If you are not sure what your dumped title's region ID is, you can find your region ID on the bottom side-edge of your game case. If you are no longer in possession of your title's game case or your title is only accessible through PSN, you can do an internet search for <span class="txt-highlight darkmode-highlight">"Your game name here</span> + <span class="txt-highlight darkmode-highlight">region ID"</span>. Please note that it is very important that you use the correct region ID.
						</p>
					</div>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-ico-container' style="background: url('/img/icons/list/disc.png') no-repeat center;">
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 Typical layout of a Blu-ray disc title's directory: <span class="txt-highlight darkmode-highlight">PS3_GAME folder, PS3_DISC.sfb, PS3_UPDATE folder (not required)</span>
					</p>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-ico-container' style="background: url('/img/icons/list/ps.png') no-repeat center;">
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 Typical layout of a PSN title's directory: <span class="txt-highlight darkmode-highlight">TROPDIR folder, USRDIR folder, ICON0.png, PARAM.sfo, etc</span>
					</p>
				</div>
			</div>
			<div class="darkmode-block" id='featured-con-block'>
				<div class="div-anchor" id="manage_formats">
				</div>
				<div id='featured-wrp-block'>
					<div class="darkmode-txt" id='featured-tx1-block'>
						<h2>PlayStation 3 title formats</h2>
					</div>
					<div class="darkmode-txt" id='featured-tx2-block'>
						<p>
							 Title IDs that start with a <span class="txt-highlight darkmode-highlight">B</span> are <span class="txt-highlight darkmode-highlight">Blu-Ray disc</span> titles.
						</p>
						<p>
							 Title IDs that start with a <span class="txt-highlight darkmode-highlight">N</span> are <span class="txt-highlight darkmode-highlight">PSN</span> titles.
						</p>
						<br>
						<p>
							 When working with actual title region IDs, the title's region ID will look something similar to this:
						</p>
						<br>
						<p>
							 Example: <span class="txt-highlight darkmode-highlight">BLUS30443</span> is a <span class="txt-highlight darkmode-highlight">US</span> Blu-Ray disc copy of Demon's Souls.
						</p>
						<p>
							 Example: <span class="txt-highlight darkmode-highlight">NPEB01393</span> is a <span class="txt-highlight darkmode-highlight">EU</span> PSN copy of Hatsune Miku: Project DIVA F.
						</p>
					</div>
				</div>
			</div>
			<div class="div-heading darkmode-txt" id="featured-tx1-heading">
				<h2>Installing and Updating</h2>
			</div>
			<div class="darkmode-block" id='featured-con-block'>
				<div class="div-anchor" id="install_games">
				</div>
				<div id='featured-wrp-block'>
					<div class="darkmode-txt" id='featured-tx1-block'>
						<h2>Installing PlayStation 3 titles</h2>
					</div>
					<div class="darkmode-txt" id='featured-tx2-block'>
						<p>
							 .pkg files must be extracted using RPCS3's built-in package installer found under <span class="txt-highlight darkmode-highlight">File &gt; Install .pkg</span>
						</p>
						<p>
							 .pkg files will be automatically installed to <span class="txt-highlight darkmode-highlight">\dev_hdd0\game\</span>
						</p>
						<br>
						<p>
							 Blu-ray disc title data can be placed in <span class="txt-highlight darkmode-highlight">\dev_hdd0\disc\</span> or anywhere else except for <span class="txt-highlight darkmode-highlight">\dev_hdd0\game\</span> and can be booted from <span class="txt-highlight darkmode-highlight">File &gt; Boot Game</span> if not present on the game list.
						</p>
						<br>
						<p>
							 PSN title data must be placed in <span class="txt-highlight darkmode-highlight">\dev_hdd0\game\</span>
						</p>
						<p>
							 PSN .rap files must be placed in <span class="txt-highlight darkmode-highlight">\dev_hdd0\home\00000001\exdata\</span>
						</p>
						<br>
						<p>
							<i>Note: If you're on Linux, RPCS3 folders are located in <span class="txt-highlight darkmode-highlight">~/.config/rpcs3/</span></i>
						</p>
					</div>
				</div>
			</div>
			<div class="darkmode-block" id='featured-con-block'>
				<div class="div-anchor" id="install_updates">
				</div>
				<div id='featured-wrp-block'>
					<div class="darkmode-txt" id='featured-tx1-block'>
						<h2>Installing PlayStation 3 title updates</h2>
					</div>
					<div class="darkmode-txt" id='featured-tx2-block'>
						<p>
							 Title updates are handled the same as PSN .pkg files. The. pkg update file must be installed using RPCS3's built-in package installer found under <span class="txt-highlight darkmode-highlight">File &gt; Install .pkg</span> The update will be placed in the title folder that corresponds to the correct region ID. Please note that title updates must be the same region in order to work. Cross-mixing title regions may create irreversible damage to the title.
						</p>
					</div>
				</div>
			</div>
			<div class="div-heading" id="featured-tx1-heading">
				<h2>Obtaining PlayStation 3 Format Software</h2>
			</div>
			<div class="darkmode-block" id='featured-con-block' style="background: #ff4d4d !important;">
				<div class="div-anchor" id="software_distribution">
				</div>
				<div id='featured-wrp-block'>
					<div class="darkmode-txt" id='featured-tx1-block'>
						<h2 style="color: #fff;">Software Distribution laws in your country</h2>
					</div>
					<div class="darkmode-txt" id='featured-tx2-block' style="color: #fff;">
						<p>
							 When dumping video game software, users are subject to country-specific software distribution laws. RPCS3 is not designed to enable illegal activity. We do not promote piracy nor do we allow it under any circumstances. Please take the time to review copyright and video game software dumping laws and/or policies for your country before proceeding.<br>
							<br>
							 By following these instructions, you will do so at your own discretion. Should you follow these instructions against your local law, we shall not be held responsible for your actions.
						</p>
					</div>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div class="div-anchor" id="dumping_methods">
				</div>
				<div id='guide-ico-container' style="background: url('/img/icons/list/ps3.png') no-repeat center;">
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						<b>Method A:</b> We recommend that you dump your own PlayStation 3 titles from your own console . We believe that this is the cleanest and ethical way to migrate your disc-based titles and digital titles from your console to your PC without the hassle of repairing bad title dumps found on the internet or possible legal repercussions. To do this, you will need a PlayStation 3 system with a custom firmware and multiMAN. Due to legal reasons, we provide a detailed guide on this method.
					</p>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-ico-container' style="background: url('/img/icons/list/pc.png') no-repeat center;">
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						<b>Method B:</b> You can dump titles using your computer by using select compatible Blu-ray drives. Please note that you can only use this method if an <span class="txt-highlight darkmode-highlight">.ird</span> file is available online for the decryption of the disc. Not every Blu-ray drive will recognize PlayStation 3 titles due to how PlayStation 3 format discs are designed. Requirements for a Blu-Ray drive to be able to fully read PlayStation 3 discs are: Mediatek chipset and a +6 read offset.
					</p>
				</div>
			</div>
			<div class="div-heading" id="featured-tx1-heading">
				<h2>Compatible Disc Drives</h2>
			</div>
			<div class="darkmode-block" id='featured-con-block'>
				<div class="div-anchor" id="compatible_drives">
				</div>
				<div id='featured-wrp-block'>
					<div class="darkmode-txt" id='featured-tx1-block'>
						<h2>Compatible Blu-ray disc drives</h2>
					</div>
					<div class="darkmode-txt" id='featured-tx2-block'>
						<p>
							 Here's a compiled list of the known compatible Blu-ray drives that are capable of reading PlayStation format discs for use with your computer.
						</p>
					</div>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-ico-container' style="background: url('/img/icons/list/drive.png') no-repeat center;">
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 LG <span class="txt-highlight darkmode-highlight">BH26NS40</span>
					</p>
					<p>
						 LG <span class="txt-highlight darkmode-highlight">UH12NS30</span>
					</p>
					<p>
						 LG <span class="txt-highlight darkmode-highlight">BH16NS40</span>
					</p>
					<p>
						 LG <span class="txt-highlight darkmode-highlight">BH16NS48</span>
					</p>
					<p>
						 LG <span class="txt-highlight darkmode-highlight">BH14NS40</span>
					</p>
					<p>
						 LG <span class="txt-highlight darkmode-highlight">WH24NS40</span>
					</p>
					<p>
						 LG <span class="txt-highlight darkmode-highlight">WH12LS30</span>
					</p>
					<p>
						 LG <span class="txt-highlight darkmode-highlight">WH24LS30</span>
					</p>
					<p>
						 LG <span class="txt-highlight darkmode-highlight">WH26NS40</span>
					</p>
					<p>
						 LG <span class="txt-highlight darkmode-highlight">WH16NS40</span>
					</p>
					<p>
						 LG <span class="txt-highlight darkmode-highlight">WH14NS40</span>
					</p>
					<p>
						 LG <span class="txt-highlight darkmode-highlight">WH16NS48</span>
					</p>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-ico-container' style="background: url('/img/icons/list/drive.png') no-repeat center;">
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 ASUS <span class="txt-highlight darkmode-highlight">BC-08B1LT</span>
					</p>
					<p>
						 ASUS <span class="txt-highlight darkmode-highlight">BC-16D1HT</span>
					</p>
					<p>
						 ASUS <span class="txt-highlight darkmode-highlight">BC-12B1ST</span>
					</p>
					<p>
						 ASUS <span class="txt-highlight darkmode-highlight">BC-12D2HT</span>
					</p>
					<p>
						 ASUS <span class="txt-highlight darkmode-highlight">BW-12B1ST</span>
					</p>
					<p>
						 ASUS <span class="txt-highlight darkmode-highlight">BW-16D1HT</span>
					</p>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-ico-container' style="background: url('/img/icons/list/drive.png') no-repeat center;">
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 LITE-ON <span class="txt-highlight darkmode-highlight">DH-4O1S</span>
					</p>
					<p>
						 LITE-ON <span class="txt-highlight darkmode-highlight">IHBS112</span>
					</p>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-ico-container' style="background: url('/img/icons/list/drive.png') no-repeat center;">
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 Samsung <span class="txt-highlight darkmode-highlight">SH-B083L</span>
					</p>
					<p>
						 Samsung <span class="txt-highlight darkmode-highlight">SH-B123L</span>
					</p>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-ico-container' style="background: url('/img/icons/list/drive.png') no-repeat center;">
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 Sony Optiarc <span class="txt-highlight darkmode-highlight">5300S</span>
					</p>
					<p>
						 Sony PlayStation stock drive <span class="txt-highlight darkmode-highlight">with proprietary adapter</span>
					</p>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-ico-container' style="background: url('/img/icons/list/drive.png') no-repeat center;">
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 BENQ <span class="txt-highlight darkmode-highlight">BR1000</span>
					</p>
				</div>
			</div>
			<div class="div-heading" id="featured-tx1-heading">
				<h2>Disc Dumping Setup</h2>
			</div>
			<div class="darkmode-block" id='featured-con-block'>
				<div class="div-anchor" id="dumping_procedure">
				</div>
				<div id='featured-wrp-block'>
					<div class="darkmode-txt" id='featured-tx1-block'>
						<h2>Step-by-step disc dumping procedure</h2>
					</div>
					<div class="darkmode-txt" id='featured-tx2-block'>
						<p>
							 Here's a compiled list of the step-by-step instructions we use for dumping disc-based PlayStation 3 format titles. You must possess one of the aforementioned compatible disc drives to complete the disc dumping procedure. Again, this method will not work with standard Blu-ray drives.
						</p>
					</div>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-ico-container' style="background: url('/img/icons/list/download.png') no-repeat center;">
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 Download PS3 ISO Patcher by BlackDaemon <a href='/cdn/tools/patcher.zip'>here.</a>
					</p>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-ico-container' style="background: url('/img/icons/list/download.png') no-repeat center;">
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 Download 3k3y ISO Tools by the 3k3y team <a href='/cdn/tools/3k3y.zip'>here.</a>
					</p>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-ico-container' style="background: url('/img/icons/list/download.png') no-repeat center;">
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 Download any form of .iso dumping software such as ImgBurn or similar <a href="http://www.imgburn.com" target="_blank">here.</a>
					</p>
				</div>
			</div>
			<div class="div-heading" id="featured-tx1-heading">
				<h2>Disc Dumping Procedure</h2>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-tx1-container'>
					<span>1</span>
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 Insert a PlayStation 3 format disc title of your choice into your compatible BD Drive.
					</p>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-tx1-container'>
					<span>2</span>
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 Dump the <span class="txt-highlight darkmode-highlight">.iso</span> image using an .iso dumping program of your choosing. e.g. ImgBurn.
					</p>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-tx1-container'>
					<span>3</span>
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 Use <a href="http://jonnysp.bplaced.net" target="_blank">jonnysp.bplaced.net</a> to download the appropriate <span class="txt-highlight darkmode-highlight">.ird</span> file that matches your title ID. If there isn't an .ird file that matches your title ID, you cannot use this method to dump your selected PlayStation 3 disc at this time.
					</p>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-tx1-container'>
					<span>4</span>
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 Be sure to check the title ID in case there is a different edition of that title. e.g. Uncharted 2 Game of the Year Edition. You must use the correct .ird with the same title ID, otherwise it won't work. (<i>Example: .ird file for Demon's Souls US disc doesn't work with Demon's Souls EU disc</i>).
					</p>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-tx1-container'>
					<span>5</span>
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 Press <span class="txt-highlight darkmode-highlight">Patch</span> to apply the patch to the .iso file.
					</p>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-tx1-container'>
					<span>6</span>
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 Your title is now decrypted.
					</p>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-tx1-container'>
					<span>7</span>
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 In 3k3y ISO Tools, use the Tools drop-down menu to select <span class="txt-highlight darkmode-highlight">ISO > Extract ISO</span> and then select the decrypted .iso file to extract its files. The decrypted .iso file will have a .dec.iso file extension.
					</p>
				</div>
			</div>
			<div class="darkmode-panel" id='guide-con-container'>
				<div id='guide-tx1-container'>
					<span>8</span>
				</div>
				<div class="darkmode-txt" id='guide-tx1-heading'>
					<p>
						 You are now able to use the extracted .iso files with RPCS3. <span class="txt-highlight darkmode-highlight">File &gt; Boot Game</span>
					</p>
				</div>
			</div>
			<a href='/download'>
			<div class="darkmode-buttons" id='featured-con-button'>
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
		</div>
	</div>
	<?php include 'lib/module/ui-footer.php';?>
</div>
</body>
</html>