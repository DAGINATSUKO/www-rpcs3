<!DOCTYPE html>
<html lang="en-US">
<head>
<title>RPCS3 - FAQ</title>
<meta charset="UTF-8">
<meta name="description" content="RPCS3 is an open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows and Linux.">
<meta name="keywords" content="rpcs3, ps3, PlayStation 3, emulator, nekotekina, faq">
<meta name="author" content="RPCS3">
<meta name="copyright" content="RPCS3">
<meta name="google-site-verification" content="cO1o6sx54cvKxhbnYsABWtl4sYFj9uVKV0DxLKZkWv8"/>
<?php include 'lib/module/call-meta.php';?>
<?php include 'lib/module/call-sys.php';?>
</head>
<body>
<?php include 'lib/module/call-php.php';?>
<div id="page-con-content">
	<div id="header-con-head">
		<div id='header-img-head' class="dynamic-banner">
		</div>
		<div id='header-con-overlay' class="lightmode-header">
		</div>
		<div id='header-con-body'>
			<div id='header-tx1-body'>
				<span>FAQ</span>
			</div>
			<div id='header-tx2-body'>
				<p>
					 Frequently asked questions for newcomers
				</p>
			</div>
		</div>
	</div>
	<div id="page-con-container">
		<div id="page-in-container">
			<!-- End -->
			<div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>What is RPCS3 licensed under? </h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 RPCS3 uses the GNU General Public License Version 2 (June 1991). According to the license, you are welcome to use RPCS3 and its source code for any purpose, but distributing RPCS3 requires that the source code be released and attribution given. For more details on how the GNU General Public License system works, please refer to <a href="https://www.gnu.org/">GNU.org</a>
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>What is RPCS3 and where can I get it?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 RPCS3 is an open-source Sony PlayStation 3 emulator and debugger written in C++ for Windows and Linux. The emulator has been in development since early 2011 and currently supports modern Vulkan, OpenGL and Direct3D 12 renderers. The emulator is capable of booting and playing a decent amount of commercial games and many more are becoming playable with future developments. The source code for RPCS3 is hosted publicly on our GitHub. You're welcome to grab the latest compiled revisions from our AppVeyor or compile your own build for personal use.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>Who are the creators behind RPCS3?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 RPCS3 began development in early 2011 by a small team of programmers lead by DH and Hykem. Our current core developer, <a href="https://github.com/Nekotekina">Nekotekina</a>, is hard at work ensuring RPCS3 meets its roadmap goals and that its development is always progressing forward. Since then, RPCS3 has progressed into an open source community-based project. The full list of contributors can be found on our GitHub page.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>Is RPCS3 aiming for complete accuracy or game specific hacks?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 Our goal is to create the most accurate PlayStation 3 emulator possible - we're not including game specific hacks.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<!-- <div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>Is RPCS3 designed for single-core performance or multi-threaded performance?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 RPCS3 is designed to make use of as many threads as possible. This means that processors such as Intel's 8 core, 16 thread 7820X or AMD's 8 core, 16 thread Ryzen 7 1700X will benefit greatly for emulating games at higher speeds. Processors such as the Intel Core i7-7700K will suffice but will not have any headroom for additional tasks running on your computer when the emulator is running.
						</p>
					</div>
				</div>
			</div> -->
			<!-- End -->
			<!-- <div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>Does it matter if I put my games on an SSD, HDD or SSHD?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 This matters to some extent, games will typically load faster from an SSD than on an HDD, but you will not see an increase in game performance except in a few rare situations. RPCS3 emulates the exact same processing speeds of a PlayStation 3 so games must run in accordance with these speeds to function properly.
						</p>
					</div>
				</div>
			</div> -->
			<!-- End -->
			<!-- <div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>I have a processor with more than 8 threads. Will my performance be better?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 Your performance will be relatively the same as the emulator can only utilize up to 8 threads. Any more threads/cores are redundant as the emulator will swap the load between all of them at once, lowering the maximum utilization on the 8 in-use threads. On the plus side, this leaves your processor free to perform other tasks than just run RPCS3 at full speed.
						</p>
					</div>
				</div>
			</div> -->
			<!-- End -->
			<!-- <div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>My processor has 4 threads. What does this mean performance wise if the PlayStation 3 has 8 threads?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 You will still be able to use RPCS3 however, your data throughput will be half the speed of a processor with 8 threads. Your processor will be working twice as hard as 8 threads/8 physical cores are not present, meaning all data must be squeezed through 4 threads. You can make up for this to some extent by having a higher than average clock speed but your mileage may vary.
						</p>
					</div>
				</div>
			</div> -->
			<!-- End -->
			<!-- <div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>My computer's processor is overclocked. Will my games run faster?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 More processing speed is always better but having more threads is even more important. Having a higher CPU clock speed will allow you to process data more quickly while having more threads will allow you to process more data at one time. Having both a high clock speed and a total of 8 threads would be the best combination.
						</p>
					</div>
				</div>
			</div> -->
			<!-- End -->
			<div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>How can I get started using RPCS3 on my PC?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 Please refer to the <a href="/quickstart">Quickstart Guide</a> or visit the newcomers section on the forums for more detailed information on how to get started.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>How stable is RPCS3 in its current state?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 RPCS3 is stable enough to boot into games and play many of them with ease. Stability is more of a per-game factor that may change with new builds as new features get implemented. As emulators progress in accuracy, there may be some regressions that occur and stability is typically one of them. Rest assured, the developers are always hard at work when it comes to keeping RPCS3 as stable as possible for now and into the future.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>What input devices can I use with RPCS3?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 We currently support keyboard / mouse inputs and native DualShock 4 controllers. We also support XInput and MMjoy based controllers. Unfortunately, we currently do not natively support DualShock 3 controllers. You can however use third-party tools like SCP Driver Package to allow your DualShock 3 controller to function like an XInput controller. We plan to add additional input methods in the future as we implement more meaningful features to the emulator.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>What PlayStation 3 peripherals can I use with RPCS3?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 We currently don't have support for additional PlayStation 3 peripherals such as the PlayStation 3 Move controller(s) or the PlayStation Eye Camera. We plan to add support for them in the future once development is farther along or if a contributor implements compatibility for said peripheral beforehand.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>Can I just insert a PlayStation 3 game disc and start playing games?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 In its current state, RPCS3 does not support reading game data directly from PlayStation 3 format discs. PlayStation 3 discs are formatted in a very special way that can only be read with an actual PlayStation 3 system, or a compatible Blu-ray drive from select manufacturers. For more information on what Blu-ray drives are capable of reading games, please refer to the <a href="/quickstart">Quickstart Guide</a>.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>Where do I get PlayStation 3 games and software?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 Typically, you want to dump your own PlayStation 3 games and software from your own console. We believe that this is the most efficient and safest way to migrate your disc-based games and digital games from your console to your PC.
						</p>
						<br>
						<p>
							 You can also dump games using select compatible Blu-ray drives. Not every Blu-ray drive will recognize PlayStation 3 games due to how data is formatted on the disc. For more information on what Blu-ray drives are capable of reading games, please refer to the <a href="/quickstart">Quickstart Guide</a>.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>How do I dump PlayStation 3 games and software?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 You will need two different tools for dumping PlayStation 3 game discs from a Blu-ray drive. For more information on how to get started dumping your own games, please refer to the <a href="/quickstart">Quickstart Guide</a>.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>Can I play multiplayer games online with real consoles or other RPCS3 users?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 Unfortunately, this is not something we're even remotely close to implementing just yet in RPCS3's current stage of development. Online multiplayer is something we're thinking about, but we may not focus on it until RPCS3 is as stable and as accurate as possible. Playing games online with real PlayStation 3 systems would require the user to connect to PlayStation Network which isn't very feasible due to obvious technical and legal limitations.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>Can I play local-multiplayer games with RPCS3?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 We currently do not have support for multiple controllers in RPCS3 just yet, but we plan to in the future once we're farther in development. The foundation for multiple controllers is already there, but it just isn't priority for now. Similarly to how the a PlayStation 3 has support for up to 7 concurrent controllers, we plan to replicate that feature in its entirety.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>Can I at least import my save data from my real PlayStation 3? </h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 Yes, saves can be imported from a real PlayStation 3 system using the standard USB flash drive transfer method. Due to how the user account system works on a real PlayStation 3 system, in some cases, you may need to re-sign your save. For more information on how to manage your save data within RPCS3, please refer to the <a href="/quickstart">Quickstart Guide</a>.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>Will RPCS3 be ported to platform X or include feature Y?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 As long as the platform is powerful enough to emulate the PlayStation 3, probably yes. At the moment we only target Windows and Linux. macOS is not supported at the moment because it only supports up to OpenGL 4.1 and doesn't support Vulkan either. The same applies to additional features. If they are reasonable and are requested by enough people, we will most likely agree and implement it. For now, we consider the emulator itself our biggest priority rather than all the other secondary features such as GUI translations, higher rendering resolutions, PlayStation Move support, etc.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>I'd like to create a patch, contribute, or possibly become a developer. Where do I start?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 That's awesome, contributions are welcome! Check the <a href="https://github.com/RPCS3/rpcs3/wiki/coding-style">Coding Style Guidelines</a>, and <a href="https://github.com/RPCS3/rpcs3/wiki/developer-information">Developer Information</a>. Find something you want to implement or improve (such as broken games, bugs, missing features, Roadmap goals, etc.), work on it, test your changes and send a Pull Request. If you have any questions, hit us up on our <a href="https://discord.me/RPCS3">Discord Server</a> in the #development channel.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<div id='featured-con-block' class="lightmode-block">
				<div id='featured-wrp-block'>
					<div id='featured-tx1-block' class="lightmode-txt">
						<h2>Where can I submit issues, feedback and comments that I want to report?</h2>
					</div>
					<div id='featured-tx2-block' class="lightmode-txt">
						<p>
							 Good, you can do it through the <a href="https://github.com/RPCS3/rpcs3/issues">GitHub Issue Tracker</a> (development-related issues) or the Forums (general questions, support and commercial/homebrew games discussion). Please be sure to follow these guidelines before sending anything:
						</p>
						<br>
						<p>
							 • Check if your system matches all the system minimum requirements;
						</p>
						<p>
							 • Check if the issue is meaningful for the team (e.g. The Last of Us doesn't work is obvious and therefore useless);
						</p>
						<p>
							 • Search older issues/forum threads to see if your issue was already submitted;
						</p>
						<p>
							 • Use understandable English. It doesn't need to be perfect, but clear enough to understand your message;
						</p>
						<p>
							 • While reporting issues, don't forget to include details about your system (OS, CPU, GPU, etc.), as well as the RPCS3.log file.
						</p>
					</div>
				</div>
			</div>
			<!-- End -->
			<a href='/download'>
			<div id='featured-con-button' class="lightmode-buttons">
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