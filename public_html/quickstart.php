<!doctype html>
<html lang="en-US">
<head>
<title>RPCS3 - Quickstart</title>
<meta charset="utf-8">
<meta name="description" content="RPCS3 is an open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows and Linux.">
<meta name="keywords" content="rpcs3, ps3, playstation 3, emulator, nekotekina, quickstart">
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
	<div class="header-con-head">
		<div class="header-img-head">
		</div>
		<div class="header-con-overlay darkmode-header">
		</div>
		<div class="header-con-diffuse">
		</div>
		<div class='header-con-body fade-up-onstart'>
			<div class='header-tx1-body fade-up-onstart'>
				<span>Quickstart</span>
			</div>
			<div class="header-tx2-body fade-up-onstart">
				<p>
					 Get RPCS3 up and running on Windows or Linux
				</p>
			</div>
		</div>
	</div>
	<div class="page-con-container">
		<div class="page-in-container">
			<div class="container-tx1-heading div-css-heading darkmode-txt">
				<h2>Quickstart Guide</h2>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchorpoint" id="requirements">
				</div>
				<div class="container-con-wrapper">
					<div class="container-tx1-block darkmode-txt">
						<h2>System Requirements</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 The system requirements for running the emulator vary depending on your hardware configuration. We have listed the minimum and recommend system requirements below. For the best experience, users should be running within the recommended system requirements. We cannot guarantee the performance of system specifications below the minimum requirements but you're always welcome to experiment.
						</p>
					</div>
				</div>
			</div>
			<?php include 'lib/module/ui-main-specs.php';?>
			<div class="container-tx1-heading div-css-heading darkmode-txt">
				<h2>Updating RPCS3</h2>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class="anchorpoint" id="updating">
				</div>
				<div class='guide-ico-container darkmode-invert' style="background: url('/img/icons/list/windows.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 For Windows users, download the latest build and drag and drop all files into your RPCS3 root directory, replacing all files when prompted.
					</p>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-ico-container darkmode-invert' style="background: url('/img/icons/list/linux.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 For Linux users, download the latest AppImage and make it executable with the command <span class="highlight darkmode-highlight">chmod a+x ./rpcs3-*_linux64.AppImage && ./rpcs3-*_linux64.AppImage</span>
					</p>
				</div>
			</div>
			<div class="container-tx1-heading div-css-heading darkmode-txt">
				<h2>Firmware Files</h2>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchorpoint" id="firmware">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>Installing PlayStation 3 firmware files</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 Due to legal reasons, we cannot distribute official PlayStation 3 firmware files. You must download the latest PlayStation 3 firmware update file from <a href="https://www.playstation.com/en-us/support/system-updates/ps3/">PlayStation.com</a> for use with RPCS3. Once downloaded, you must install the firmware using RPCS3's built in firmware installer found under <span class="highlight darkmode-highlight">File &gt; Install Firmware.</span><br>
							<br>
							 By default, firmware modules are loaded automatically based on the PlayStation 3 title that is loaded. You can still override automatic module loading and choose which firmware modules you want to use manually. This is not recommended.
						</p>
					</div>
				</div>
			</div>
			<div class="container-tx1-heading div-css-heading darkmode-txt">
				<h2>Game Saves</h2>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class="anchorpoint" id="manage_saves">
				</div>
				<div class='guide-ico-container darkmode-invert' style="background: url('/img/icons/list/windows.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 For Windows users, save data files can be managed in <span class="highlight darkmode-highlight">\dev_hdd0\home\00000001\savedata\</span>
					</p>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-ico-container darkmode-invert' style="background: url('/img/icons/list/linux.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 For Linux users, save data files can be managed in <span class="highlight darkmode-highlight">~/.config/rpcs3/</span>
					</p>
				</div>
			</div>
			<div class="container-tx1-heading div-css-heading darkmode-txt">
				<h2>File Management</h2>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchorpoint" id="manage_files">
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
							 Both Blu-ray and PlayStation Network titles (PSN) must be placed into a single folder with their respective files and the folder name must correspond to the title's ID. If you are not sure what your dumped title's region ID is, you can find your region ID on the bottom side-edge of your game case. If you are no longer in possession of your title's game case or your title is only accessible through PSN, you can do an internet search for <span class="highlight darkmode-highlight">"Your game name here</span> + <span class="highlight darkmode-highlight">region ID"</span>. Please note that it is very important that you use the correct region ID.
						</p>
					</div>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-ico-container darkmode-invert' style="background: url('/img/icons/list/disc.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 Typical layout of a Blu-ray disc title's directory: <span class="highlight darkmode-highlight">PS3_GAME folder, PS3_DISC.sfb, PS3_UPDATE folder (not required)</span>
					</p>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-ico-container darkmode-invert' style="background: url('/img/icons/list/ps.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 Typical layout of a PSN title's directory: <span class="highlight darkmode-highlight">TROPDIR folder, USRDIR folder, ICON0.png, PARAM.sfo, etc</span>
					</p>
				</div>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchorpoint" id="manage_formats">
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
			<div class="container-tx1-heading div-css-heading darkmode-txt">
				<h2>Installing and Updating</h2>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchorpoint" id="install_games">
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
						<br>
						<p>
							 Blu-ray disc title data can be placed in <span class="highlight darkmode-highlight">\dev_hdd0\disc\</span> or anywhere else except for <span class="highlight darkmode-highlight">\dev_hdd0\game\</span> and can be booted from <span class="highlight darkmode-highlight">File &gt; Boot Game</span> if not present on the game list.
						</p>
						<br>
						<p>
							 PSN title data must be placed in <span class="highlight darkmode-highlight">\dev_hdd0\game\</span>
						</p>
						<p>
							 PSN .rap files must be placed in <span class="highlight darkmode-highlight">\dev_hdd0\home\00000001\exdata\</span> (or simply drag and drop them to the main emulator window)
						</p>
						<br>
						<p>
							<i>Note: If you're on Linux, RPCS3 folders are located in <span class="highlight darkmode-highlight">~/.config/rpcs3/</span></i>
						</p>
					</div>
				</div>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchorpoint" id="install_updates">
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
			<div class="container-tx1-heading div-css-heading darkmode-txt">
				<h2>Obtaining PlayStation 3 Format Software</h2>
			</div>
			<div class="container-con-block darkmode-block" style="background: #ff4d4d !important;">
				<div class="anchorpoint" id="software_distribution">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block">
						<h2 style="color: #fff !important;">Software Distribution laws in your country</h2>
					</div>
					<div class="container-tx2-block">
						<p style="color: #fff !important;">
							 When dumping video game software, users are subject to country-specific software distribution laws. RPCS3 is not designed to enable illegal activity. We do not promote piracy nor do we allow it under any circumstances. Please take the time to review copyright and video game software dumping laws and/or policies for your country before proceeding.<br>
							<br>
							 By following these instructions, you will do so at your own discretion. Should you follow these instructions against your local law, we shall not be held responsible for your actions.
						</p>
					</div>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class="anchorpoint" id="dumping_methods">
				</div>
				<div class='guide-ico-container darkmode-invert' style="background: url('/img/icons/list/ps3.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						<b>Method A:</b> We recommend that you dump your own PlayStation 3 titles from your own console. This is the most compatible way to migrate your disc-based titles and the only way to dump digital titles to your PC. To do this, you will need a PlayStation 3 system with custom firmware.<br>
						<br>
						For dumping disc-based games, you need to use multiMAN homebrew software in order to dump your disc files. You can transfer those files over to a computer through an external drive or using a FTP connection between your PlayStation 3 and your computer.<br>
						<br>
						<i>Note: The PlayStation 3 has a maximum file size of 4GB. When dumping games which contain files bigger than 4GB, multiMAN will split those files. When you have your dump over on your computer, you must rejoin the split files back together with part merging software such as <a href="http://karmian.org/projects/ps3merge">ps3merge</a>, otherwise the dump won't work. </i><br>
						<br>
						 For dumping digital games, you must copy the game folder from <span class="highlight darkmode-highlight">dev_hdd0/game/GameID</span> on your console over to the same path on your RPCS3 folder. You also need to get your console's IDPS, the game's RIF and ACT.DAT, in order to generate a .RAP license file to be used in the emulator.<br>
						 It is also possible to dump digital content and licenses on <i>any</i> PS3 even without custom firmware, by the way of creating a system backup, and then extracting it with ps3xport software.
					</p>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-ico-container darkmode-invert' style="background: url('/img/icons/list/pc.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						<b>Method B:</b> You can dump titles using your computer by using select compatible Blu-ray drives. Please note that you can only use this method if an <span class="highlight darkmode-highlight">.ird</span> file is available online for the decryption of the disc. Not every Blu-ray drive will recognize PlayStation 3 titles due to how PlayStation 3 format discs are designed. Requirements for a Blu-Ray drive to be able to fully read PlayStation 3 discs are: Mediatek chipset and a +6 read offset.
					</p>
				</div>
			</div>
			<div class="container-tx1-heading div-css-heading darkmode-txt">
				<h2>Compatible Disc Drives</h2>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchorpoint" id="compatible_drives">
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
			<div class="guide-con-container darkmode-panel">
				<div class='guide-ico-container darkmode-invert' style="background: url('/img/icons/list/drive.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 LG <span class="highlight darkmode-highlight">BU20N</span>
					</p>
					<p>
						 LG <span class="highlight darkmode-highlight">BH26NS40</span>
					</p>
					<p>
						 LG <span class="highlight darkmode-highlight">UH12NS30</span>
					</p>
					<p>
						 LG <span class="highlight darkmode-highlight">BH16NS40</span>
					</p>
					<p>
						 LG <span class="highlight darkmode-highlight">BH16NS48</span>
					</p>
					<p>
						 LG <span class="highlight darkmode-highlight">BH14NS40</span>
					</p>
					<p>
						 LG <span class="highlight darkmode-highlight">WH24NS40</span>
					</p>
					<p>
						 LG <span class="highlight darkmode-highlight">WH12LS30</span>
					</p>
					<p>
						 LG <span class="highlight darkmode-highlight">WH24LS30</span>
					</p>
					<p>
						 LG <span class="highlight darkmode-highlight">WH26NS40</span>
					</p>
					<p>
						 LG <span class="highlight darkmode-highlight">WH16NS40</span>
					</p>
					<p>
						 LG <span class="highlight darkmode-highlight">WH14NS40</span>
					</p>
					<p>
						 LG <span class="highlight darkmode-highlight">WH16NS48</span>
					</p>
					<p>
						 LG <span class="highlight darkmode-highlight">BP50NB40</span>
					</p>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-ico-container darkmode-invert' style="background: url('/img/icons/list/drive.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 ASUS <span class="highlight darkmode-highlight">BC-08B1LT</span>
					</p>
					<p>
						 ASUS <span class="highlight darkmode-highlight">BC-16D1HT</span>
					</p>
					<p>
						 ASUS <span class="highlight darkmode-highlight">BC-12B1ST</span>
					</p>
					<p>
						 ASUS <span class="highlight darkmode-highlight">BC-12D2HT</span>
					</p>
					<p>
						 ASUS <span class="highlight darkmode-highlight">BW-12B1ST</span>
					</p>
					<p>
						 ASUS <span class="highlight darkmode-highlight">BW-16D1HT</span>
					</p>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-ico-container darkmode-invert' style="background: url('/img/icons/list/drive.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 LITE-ON <span class="highlight darkmode-highlight">DH-4O1S</span>
					</p>
					<p>
						 LITE-ON <span class="highlight darkmode-highlight">IHBS112</span>
					</p>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-ico-container darkmode-invert' style="background: url('/img/icons/list/drive.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 Samsung <span class="highlight darkmode-highlight">SH-B083L</span>
					</p>
					<p>
						 Samsung <span class="highlight darkmode-highlight">SH-B123L</span>
					</p>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-ico-container darkmode-invert' style="background: url('/img/icons/list/drive.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 Sony Optiarc <span class="highlight darkmode-highlight">5300S</span>
					</p>
					<p>
						 Sony PlayStation stock drive <span class="highlight darkmode-highlight">with proprietary adapter</span>
					</p>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-ico-container darkmode-invert' style="background: url('/img/icons/list/drive.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 BENQ <span class="highlight darkmode-highlight">BR1000</span>
					</p>
				</div>
			</div>
			<div class="container-tx1-heading div-css-heading darkmode-txt">
				<h2>Disc Dumping Setup</h2>
			</div>
			<div class="container-con-block darkmode-block">
				<div class="anchorpoint" id="dumping_procedure">
				</div>
				<div class='container-con-wrapper'>
					<div class="container-tx1-block darkmode-txt">
						<h2>Step-by-step disc dumping procedure</h2>
					</div>
					<div class="container-tx2-block darkmode-txt">
						<p>
							 Here's a compiled list of the step-by-step instructions we use for dumping disc-based PlayStation 3 format titles. You must possess one of the aforementioned compatible disc drives to complete the disc dumping procedure. Again, this method will not work with standard Blu-ray drives.
						</p>
					</div>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-ico-container darkmode-invert' style="background: url('/img/icons/list/download.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 Download <a href='/cdn/tools/patcher.zip'>PS3 ISO Patcher</a> by BlackDaemon.
					</p>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-ico-container darkmode-invert' style="background: url('/img/icons/list/download.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 Download <a href='/cdn/tools/3k3y.zip'>3k3y IsoTools</a> by the 3k3y team.
					</p>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-ico-container darkmode-invert' style="background: url('/img/icons/list/download.png') no-repeat center;">
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						 Download any form of .iso dumping software such as <a href="http://www.imgburn.com" target="_blank" rel="noopener noreferrer">ImgBurn</a> or similar.
					</p>
				</div>
			</div>
			<div class="container-tx1-heading div-css-heading darkmode-txt">
				<h2>Disc Dumping Procedure</h2>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-tx1-container darkmode-invert'>
					<span>1</span>
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						Insert a PlayStation 3 format disc title of your choice into your compatible BD Drive.
					</p>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-tx1-container darkmode-invert'>
					<span>2</span>
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						Create the <span class="highlight darkmode-highlight">.iso</span> image using an .iso dumping program of your choosing, e.g. ImgBurn or IsoBuster.
					</p>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-tx1-container darkmode-invert'>
					<span>3</span>
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						Use <a href="http://jonnysp.bplaced.net" target="_blank" rel="noopener noreferrer">jonnysp.bplaced.net</a> to download the appropriate <span class="highlight darkmode-highlight">.ird</span> file that matches your title ID. If there isn't an .ird file that matches your title ID, you cannot use this method to dump your selected PlayStation 3 disc at this time.
					</p>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-tx1-container darkmode-invert'>
					<span>4</span>
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						Be sure to check the title ID in case there is a different edition of that title. e.g. Uncharted 2 Game of the Year Edition. You must use the correct .ird with the same title ID, otherwise it won't work. (<i>Example: .ird file for Demon's Souls US disc doesn't work with Demon's Souls EU disc</i>).
					</p>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-tx1-container darkmode-invert'>
					<span>5</span>
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						Using PS3 ISO Patcher, select the matching .iso and .ird files, then press <span class="highlight darkmode-highlight">Patch</span> to apply the decryption keys to the .iso file.
					</p>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-tx1-container darkmode-invert'>
					<span>6</span>
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						Using 3k3y IsoTools press <span class="highlight darkmode-highlight">Decrypt</span> button and select the .iso with patched-in decryption keys. This will produce decrypted <span class="highlight darkmode-highlight">.dec.iso</span> file.<br>
						If IsoTools complains about "Not valid PS3 ISO file" or missing decryption keys, please repeat from step 2 using another tool to dump original .iso image.
					</p>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-tx1-container darkmode-invert'>
					<span>7</span>
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						Optionally, validate that you have successfully obtained the correct copy of your game.<br>
						You will need to install PS3 ISO Rebuilder tool from <a href="http://jonnysp.bplaced.net" target="_blank" rel="noopener noreferrer">jonnysp.bplaced.net</a><br>
						Load your .dec.iso file and your .ird file in the program and let it verify the dump. All of your files must be either Valid or Not required.
					</p>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-tx1-container darkmode-invert'>
					<span>8</span>
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						In 3k3y ISO Tools, use the Tools drop-down menu to select <span class="highlight darkmode-highlight">ISO > Extract ISO</span> and then select the decrypted .iso file to extract its files.<br>
						Another option is to use 7-zip or any other software that is capable of extracting .iso images.
					</p>
				</div>
			</div>
			<div class="guide-con-container darkmode-panel">
				<div class='guide-tx1-container darkmode-invert'>
					<span>9</span>
				</div>
				<div class="guide-tx1-heading darkmode-txt">
					<p>
						You are now able to use the extracted .iso files with RPCS3. <span class="highlight darkmode-highlight">File &gt; Boot Game</span>
					</p>
				</div>
			</div>
		</div>
	</div>
	<?php include 'lib/module/ui-main-footer.php';?>
</div>
</body>
</html>
