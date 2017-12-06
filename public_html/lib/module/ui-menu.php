<div id='menu-con-menubar' class="darkmode-menubar">
	<div id="menu-und-l1" class="darkmode-menubar-l1">
	</div>
	<div id="menu-und-l2" class="darkmode-menubar-l2">
	</div>
	<div id="menu-btn-darkmode" class="toggle-darkmode darkmode-icon" title="Dark Mode">
	</div>
	<div id='menu-btn-debug' class='toggle-debug' title="Debug">
	</div>
	<div id="menu-con-container">
		<div id="menu-in-container">
			<div id="menu-con-logo" title="Home">
				<a href='/'>
				<div id="menu-ico-logo" title="Home">
				</div>
				</a>
			</div>
			<a href='/blog'>
			<div id="menu-btn-select" title="Blog">
				<span>Blog</span>
			</div>
			</a>
			<a href='/about'>
			<div id="menu-btn-select" title="About">
				<span>About</span>
			</div>
			</a>
			<a href='/compatibility'>
			<div id="menu-btn-select" title="Compatibility">
				<span>Compatibility</span>
			</div>
			</a>
			<a href='/screenshots'>
			<div id="menu-btn-select" title="Screenshots">
				<span>Screenshots</span>
			</div>
			</a>
			<a href='/download'>
			<div id="menu-btn-select" title="Download">
				<span>Download</span>
			</div>
			</a>
			<a href='/quickstart'>
			<div id="menu-btn-select" title="Quickstart">
				<span>Quickstart</span>
			</div>
			</a>
			<a href='/roadmap'>
			<div id="menu-btn-select" title="Roadmap">
				<span>Roadmap</span>
			</div>
			</a>
			<a href='/faq'>
			<div id="menu-btn-select" title="FAQ">
				<span>FAQ</span>
			</div>
			</a>
			<div id="menu-btn-select" style="pointer-events: none;">
				<span>|</span>
			</div>
			<a href='https://github.com/RPCS3/rpcs3' target="_blank">
			<div id="menu-btn-select" title="GitHub">
				<span>GitHub</span>
			</div>
			<a href='https://discord.me/RPCS3' target="_blank">
			<div id="menu-btn-select" class="menu-btn-remove" title="Discord">
				<span>Discord</span>
			</div>
			</a>
			<a href='https://forums.rpcs3.net' target="_blank">
			<div id="menu-btn-select" title="Forum">
				<span>Forum</span>
			</div>
			</a>
			<a href='https://wiki.rpcs3.net' target="_blank">
			<div id="menu-btn-select" title="Wiki" style="display:none;">
				<span>Wiki</span>
			</div>
			</a>
			<div class="support-subtrigger" id="menu-con-support">
				<div id="menu-tx1-support" title="Support Us">
					<span>Support Us</span>
				</div>
				<div id="menu-ico-support">
				</div>
				<div class="support-submenu" id="submenu-con-container">
					<div id="submenu-ico-lip">
					</div>
					<a href="https://www.patreon.com/Nekotekina" target="_blank">
					<div id="submenu-con-wrapper">
						<div id="submenu-ico-patreon">
						</div>
						<div id="submenu-btn-button">
							<span>Support with Patreon</span>
						</div>
					</div>
					</a>
					<a href="/alipay">
					<div class='trigger-alipay' id="submenu-con-wrapper" style="border-top: solid 1px rgba(0,0,0,.02);">
						<div id="submenu-ico-alipay">
						</div>
						<div id="submenu-btn-button">
							<span>Support with Alipay</span>
						</div>
					</div>
					</a>
					<a href="https://github.com/RPCS3/rpcs3/wiki/Coding-Style" target="_blank">
					<div id="submenu-con-wrapper">
						<div id="submenu-ico-github">
						</div>
						<div id="submenu-btn-button">
							<span>Contribute with GitHub</span>
						</div>
					</div>
					</a>
					<a href="https://forums.rpcs3.net/" target="_blank">
					<div id="submenu-con-wrapper">
						<div id="submenu-ico-testing">
						</div>
						<div id="submenu-btn-button">
							<span>Contribute with Testing</span>
						</div>
					</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div id='popup-con-dim' class='popup-debug gpu-d gpu-m' style="display:none;">
<div id="menu-und-l3"></div>
	<div id='page-con-scroller'>
		<div id="page-con-container">
			<div id="page-in-container" style="overflow: hidden !important;">
				<div id='debug-con-title'>
					<span>DEBUGGER</span>
				</div>
				<div id='debug-con-category'>
					<div id='debug-con-button' style='-webkit-animation-duration: .1s;'>
						<div id='debug-ico-button' style="background:url('/img/icons/debug/language.png') center no-repeat !important; background-size: 20px !important;">
						</div>
						<div id='debug-tx1-button'>
							<span>Language</span>
						</div>
						<div class='debug-language' id='debug-tgl-button'>
							<span>N/A</span>
						</div>
					</div>
					<div id='debug-con-button' style='-webkit-animation-duration: .2s;'>
						<div id='debug-ico-button' style="background:url('/img/icons/debug/resolution.png') center no-repeat !important; background-size: 20px !important;">
						</div>
						<div id='debug-tx1-button'>
							<span>Resolution</span>
						</div>
						<div class='debug-resolution' id='debug-tgl-button'>
							<span>N/A</span>
						</div>
					</div>
					<div id='debug-con-button' style='-webkit-animation-duration: .3s;'>
						<div id='debug-ico-button' style="background:url('/img/icons/debug/canvas.png') center no-repeat !important; background-size: 20px !important;">
						</div>
						<div id='debug-tx1-button'>
							<span>Canvas</span>
						</div>
						<div class='debug-canvas' id='debug-tgl-button'>
							<span>N/A</span>
						</div>
					</div>
					<div id='debug-con-button' style='-webkit-animation-duration: .4s;'>
						<div id='debug-ico-button' style="background:url('/img/icons/debug/gpu.png') center no-repeat !important; background-size: 20px !important;">
						</div>
						<div id='debug-tx1-button'>
							<span>Hardware</span>
						</div>
						<div id='debug-tgl-button'>
							<span>GPU Accelerated</span>
						</div>
					</div>
					<div id='debug-con-button' style='-webkit-animation-duration: .5s;'>
						<div id='debug-ico-button' style="background:url('/img/icons/debug/browser.png') center no-repeat !important; background-size: 20px !important;">
						</div>
						<div id='debug-tx1-button'>
							<span>Browser</span>
						</div>
						<div class='debug-browser' id='debug-tgl-button'>
							<span>N/A</span>
						</div>
					</div>
					<div id='debug-con-button' style='-webkit-animation-duration: .6s;'>
						<div id='debug-ico-button' style="background:url('/img/icons/debug/version.png') center no-repeat !important; background-size: 20px !important;">
						</div>
						<div id='debug-tx1-button'>
							<span>Version</span>
						</div>
						<div class='debug-version' id='debug-tgl-button'>
							<span>N/A</span>
						</div>
					</div>
					<div id='debug-con-button' style='-webkit-animation-duration: .7s;'>
						<div id='debug-ico-button' style="background:url('/img/icons/debug/platform.png') center no-repeat !important; background-size: 20px !important;">
						</div>
						<div id='debug-tx1-button'>
							<span>Platform</span>
						</div>
						<div class='debug-platform' id='debug-tgl-button'>
							<span>N/A</span>
						</div>
					</div>
					<div id='debug-con-button' style='-webkit-animation-duration: .8s;'>
						<div id='debug-ico-button' style="background:url('/img/icons/debug/mobile.png') center no-repeat !important; background-size: 20px !important;">
						</div>
						<div id='debug-tx1-button'>
							<span>Mobile</span>
						</div>
						<div class='debug-mobile' id='debug-tgl-button'>
							<span>N/A</span>
						</div>
					</div>
					<div id='debug-con-button' style='-webkit-animation-duration: .9s;'>
						<div id='debug-ico-button' style="background:url('/img/icons/debug/webkit.png') center no-repeat !important; background-size: 20px !important;">
						</div>
						<div id='debug-tx1-button'>
							<span>WebKit</span>
						</div>
						<div class='debug-webkit' id='debug-tgl-button'>
							<span>N/A</span>
						</div>
					</div>
					<div id='debug-con-button' style='-webkit-animation-duration: 1.0s;'>
						<div id='debug-ico-button' style="background:url('/img/icons/debug/cookies.png') center no-repeat !important; background-size: 20px !important;">
						</div>
						<div id='debug-tx1-button'>
							<span>Cookies</span>
						</div>
						<div class='debug-cookies' id='debug-tgl-button'>
							<span>N/A</span>
						</div>
					</div>
					<div id='debug-con-button' style='-webkit-animation-duration: 1.1s;'>
						<div id='debug-ico-button' style="background:url('/img/icons/debug/online.png') center no-repeat !important; background-size: 20px !important;">
						</div>
						<div id='debug-tx1-button'>
							<span>Online</span>
						</div>
						<div class='debug-online' id='debug-tgl-button'>
							<span>N/A</span>
						</div>
					</div>
					<div id='debug-con-button' style='-webkit-animation-duration: 1.2s;'>
						<div id='debug-ico-button' style="background:url('/img/icons/debug/server.png') center no-repeat !important; background-size: 20px !important;">
						</div>
						<div id='debug-tx1-button'>
							<span>Server</span>
						</div>
						<div id='debug-tgl-button'>
							<span>Linux</span>
						</div>
					</div>
					<div id='debug-con-button' style='-webkit-animation-duration: 1.3s;'>
						<div id='debug-ico-button' style="background:url('/img/icons/debug/security.png') center no-repeat !important; background-size: 20px !important;">
						</div>
						<div id='debug-tx1-button'>
							<span>Security</span>
						</div>
						<div id='debug-tgl-button'>
							<span>SSL AES 256</span>
						</div>
					</div>
					<div id='debug-con-button' style='-webkit-animation-duration: 1.4s;'>
						<div id='debug-ico-button' style="background:url('/img/icons/debug/milk.png') center no-repeat !important; background-size: 20px !important;">
						</div>
						<div id='debug-tx1-button'>
							<span>Milk UX</span>
						</div>
						<div id='debug-tgl-button'>
							<span>Version 1.00</span>
						</div>
					</div>
					<div id='debug-con-button' style='-webkit-animation-duration: 1.5s;'>
						<div id='debug-ico-button' style="background:url('/img/icons/debug/html.png') center no-repeat !important; background-size: 20px !important;">
						</div>
						<div id='debug-tx1-button'>
							<span>HTML</span>
						</div>
						<div id='debug-tgl-button'>
							<span>Version 5.00</span>
						</div>
					</div>
					<div id='debug-con-button' style='-webkit-animation-duration: 1.6s;'>
						<div id='debug-ico-button' style="background:url('/img/icons/debug/css.png') center no-repeat !important; background-size: 20px !important;">
						</div>
						<div id='debug-tx1-button'>
							<span>CSS</span>
						</div>
						<div id='debug-tgl-button'>
							<span>Version 3.00</span>
						</div>
					</div>
					<div id='debug-con-button' style='-webkit-animation-duration: 1.7s;'>
						<div id='debug-ico-button' style="background:url('/img/icons/debug/php.png') center no-repeat !important; background-size: 20px !important;">
						</div>
						<div id='debug-tx1-button'>
							<span>PHP</span>
						</div>
						<div id='debug-tgl-button'>
							<span>Version 5.50</span>
						</div>
					</div>
					<div id='debug-con-button' style='-webkit-animation-duration: 1.8s;'>
						<div id='debug-ico-button' style="background:url('/img/icons/debug/jquery.png') center no-repeat !important; background-size: 20px !important;">
						</div>
						<div id='debug-tx1-button'>
							<span>JQuery</span>
						</div>
						<div id='debug-tgl-button'>
							<span>Version 3.2.1</span>
						</div>
					</div>
					<div id='debug-con-button' style='-webkit-animation-duration: 1.9s; margin-bottom: 200px;'>
						<div id='debug-ico-button' style="background:url('/img/icons/debug/hdr.png') center no-repeat !important; background-size: 20px !important;">
						</div>
						<div id='debug-tx1-button'>
							<span>HDR</span>
						</div>
						<div id='debug-tgl-button'>
							<span>Version 10+</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>