<div class='downloadable-con-container'>
	<!-- Windows Section -------------------------------------------------------------------------------------------------------------------------------- -->
	<div class='downloadable-con-outer'>
		<div class='downloadable-con-inner-a'>
			<div class='downloadable-con-graphic' style="background: url(/img/graphics/download/windows.png) center top no-repeat; right: -52px; bottom: -38px;">
			</div>
			<div class='downloadable-con-image' style="background: url(/img/icons/list/os-windows-11.png) center left / 42px no-repeat;">
			</div>
			<div class='downloadable-tx1-title darkmode-txt'>
				<span>Windows</span>
			</div>
			<div class='downloadable-tx2-desc darkmode-txt'>
				<span>For a wide range of hardware setups on both laptops and desktops with support for Windows 10 and 11.</span>
			</div>
			<!-- SHA Section -------------------------------------------------------------------------------------------------------------------------------- -->
			<div class='sha2-tx1-title darkmode-txt'>
				<span>SHA-256</span>
			</div>
			<div class='sha2-tx2-desc'>
			<div class='sha2-ico-desc' style="background: url(/img/icons/buttons/sha2-x64.png) center / contain no-repeat;"></div>
				<span>
				<?php
				if (isset($build) && !is_null($build->checksum_win))
					printf("%s", $build->checksum_win);
				else if (isset($build_windows_x64))
					printf("%s", $build_windows_x64->checksum_win);
				else
					printf("Unavailable");
				?>
				</span>
			</div>
			<div class='sha2-tx2-desc'>
			<div class='sha2-ico-desc' style="background: url(/img/icons/buttons/sha2-arm64.png) center / contain no-repeat;"></div>
				<span>
					<?php
					if (false /*isset($build) && !is_null($build->checksum_win_arm64)*/)
						printf("%s", $build->checksum_win_arm64);
					else if (isset($build_windows_arm64))
						printf("%s", $build_windows_arm64->checksum_win_arm64);
					else
						printf("Coming soon...");
					?>
				</span>
			</div>
			<!-- Download Section -------------------------------------------------------------------------------------------------------------------------------- -->
			<div class='package-tx1-title darkmode-txt'>
				<span>Download Packages</span>
			</div>
			<?php
			if (isset($build) && !is_null($build->get_url_windows()))
				printf("<a href=\"%s\" download>", $build->get_url_windows());
			else if (isset($build_windows_x64))
				printf("<a href=\"%s\" download>", $build_windows_x64->get_url_windows());
			?>
			<div class='package-con-button'>
				<div class='package-ico-button' style="background: url(/img/icons/buttons/x64-h.png) center / 30px no-repeat;">
				</div>
				<div class='package-con-metabutton'>
					<span class='package-tx1-metabutton'>
						<?php
						if ((isset($build) && !is_null($build->get_url_windows())) || isset($build_windows_x64))
							printf("Download for x64");
						else
							printf("Unavailable");
						?>
					</span>
					<br>
					<span class='package-tx2-metabutton'>
						<?php
						if (isset($build) && !is_null($build->get_size_mb_windows()))
							printf("%s MB", $build->get_size_mb_windows());
						else if (isset($build_windows_x64))
							printf("%s MB", $build_windows_x64->get_size_mb_windows());
						else
							printf("Unavailable");
						?>
					</span>
				</div>
			</div>
			<?php
			if ((isset($build) && !is_null($build->get_url_windows())) || isset($build_windows_x64))
				printf("</a>");
			?>
			<?php
			if (false /*isset($build) && !is_null($build->get_url_windows_arm64())*/)
				printf("<a href=\"%s\" download>", $build->get_url_windows_arm64());
			else if (isset($build_windows_arm64))
				printf("<a href=\"%s\" download>", $build_windows_arm64->get_url_windows_arm64());
			?>
			<div class='package-con-mini-button'>
				<div class='package-ico-button' style="background: url(/img/icons/buttons/arm64-h.png) center / 30px no-repeat;">
				</div>
				<div class='package-con-metabutton'>
					<span class='package-tx1-metabutton'>
					<?php
					if (false /*isset($build) && !is_null($build->get_url_windows_arm64())*/)
						printf("Download for arm64");
					else
						printf("Coming soon...");
					?>
					</span>
					<br>
					<span class='package-tx2-metabutton'>
						<?php
						if (false /*isset($build) && !is_null($build->get_size_mb_windows_arm64())*/)
							printf("%s MB", $build->get_size_mb_windows_arm64());
						else
							printf("");
						?>
					</span>
				</div>
			</div>
			<?php
			if (false /*isset($build) && !is_null($build->get_url_windows_arm64())*/)
				printf("</a>");
			?>
		</div>
	</div>
	<!-- Linux Section -------------------------------------------------------------------------------------------------------------------------------- -->
	<div class='downloadable-con-outer'>
		<div class='downloadable-con-inner-a'>
			<div class='downloadable-con-graphic' style="background: url(/img/graphics/download/linux.png) center top no-repeat; right: -52px; bottom: -38px;">
			</div>
			<div class='downloadable-con-image' style="background: url(/img/icons/list/os-linux-na.png) center left / 42px no-repeat;">
			</div>
			<div class='downloadable-tx1-title darkmode-txt'>
				<span>Linux</span>
			</div>
			<div class='downloadable-tx2-desc darkmode-txt'>
				<span>For a wide range of hardware setups on both laptops and desktops with support for most common distros.</span>
			</div>
			<!-- SHA Section -------------------------------------------------------------------------------------------------------------------------------- -->
			<div class='sha2-tx1-title darkmode-txt'>
				<span>SHA-256</span>
			</div>
			<div class='sha2-tx2-desc'>
			<div class='sha2-ico-desc' style="background: url(/img/icons/buttons/sha2-x64.png) center / contain no-repeat;"></div>
				<span>
					<?php
					if (isset($build) && !is_null($build->checksum_linux))
						printf("%s", $build->checksum_linux);
					else if (isset($build_linux_x64))
						printf("%s", $build_linux_x64->checksum_linux);
					else
						printf("Unavailable");
					?>
				</span>
			</div>
			<div class='sha2-tx2-desc'>
			<div class='sha2-ico-desc' style="background: url(/img/icons/buttons/sha2-arm64.png) center / contain no-repeat;"></div>
				<span>
				<?php
				if (isset($build) && !is_null($build->checksum_linux_arm64))
					printf("%s", $build->checksum_linux_arm64);
				else if (isset($build_linux_arm64))
					printf("%s", $build_linux_arm64->checksum_linux_arm64);
				else
					printf("Unavailable");
				?>
				</span>
			</div>
		<!-- Download Section -------------------------------------------------------------------------------------------------------------------------------- -->
			<div class='package-tx1-title darkmode-txt'>
				<span>Download Packages</span>
			</div>
			<?php
			if (isset($build) && !is_null($build->get_url_linux()))
				printf("<a href=\"%s\" download>", $build->get_url_linux());
			else if (isset($build_linux_x64))
				printf("<a href=\"%s\" download>", $build_linux_x64->get_url_linux());
			?>
			<div class='package-con-button'>
				<div class='package-ico-button' style="background: url(/img/icons/buttons/x64-h.png) center / 30px no-repeat;">
				</div>
				<div class='package-con-metabutton'>
					<span class='package-tx1-metabutton'>
					<?php
					if ((isset($build) && !is_null($build->get_url_linux())) || isset($build_linux_x64))
						printf("Download for x64");
					else
						printf("Unavailable");
					?>
					</span>
					<br>
					<span class='package-tx2-metabutton'>
						<?php
						if (isset($build) && !is_null($build->get_size_mb_linux()))
							printf("%s MB", $build->get_size_mb_linux());
						else if (isset($build_linux_x64))
							printf("%s MB", $build_linux_x64->get_size_mb_linux());
						else
							printf("Unavailable");
						?>
					</span>
				</div>
			</div>
			<?php
			if ((isset($build) && !is_null($build->get_url_linux())) || isset($build_linux_x64))
				printf("</a>");
			?>
			<?php
			if (isset($build) && !is_null($build->get_url_linux_arm64()))
				printf("<a href=\"%s\" download>", $build->get_url_linux_arm64());
			else if (isset($build_linux_arm64))
				printf("<a href=\"%s\" download>", $build_linux_arm64->get_url_linux_arm64());
			?>
			<div class='package-con-mini-button'>
				<div class='package-ico-button' style="background: url(/img/icons/buttons/arm64-h.png) center / 30px no-repeat;">
				</div>
				<div class='package-con-metabutton'>
					<span class='package-tx1-metabutton'>
					<?php
					if ((isset($build) && !is_null($build->get_url_linux_arm64())) || isset($build_linux_arm64))
						printf("Download for arm64");
					else
						printf("Unavailable");
					?>
					</span>
					<br>
					<span class='package-tx2-metabutton'>
						<?php
						if (isset($build) && !is_null($build->get_size_mb_linux_arm64()))
							printf("%s MB", $build->get_size_mb_linux_arm64());
						else if (isset($build_linux_arm64))
							printf("%s MB", $build_linux_arm64->get_size_mb_linux_arm64());
						else
							printf("Unavailable");
						?>
					</span>
				</div>
			</div>
			<?php
			if (isset($build) && !is_null($build->get_url_linux_arm64()))
				printf("</a>");
			?>
		</div>
	</div>
	<!-- macOS Section -------------------------------------------------------------------------------------------------------------------------------- -->
	<div class='downloadable-con-outer'>
		<div class='downloadable-con-inner-a'>
			<div class="downloadable-con-graphic" style="background: url(/img/graphics/download/macos.png) center top no-repeat;right: -74px;bottom: -128px;width: 246px;height: 272px;">
			</div>
			<div class='downloadable-con-image' style="background: url(/img/icons/list/os-macos.png) center left / 42px no-repeat;">
			</div>
			<div class='downloadable-tx1-title darkmode-txt'>
				<span>macOS</span> <span  class='downloadable-tx3-label'->Experimental</span>
			</div>
			<div class='downloadable-tx2-desc darkmode-txt'>
				<span>For Apple Silicon or Intel hardware with dedicated graphics on macOS 13.0+, 14.3+, 15.0+ or later.</span>
			</div>
			<!-- SHA Section -------------------------------------------------------------------------------------------------------------------------------- -->
			<div class='sha2-tx1-title darkmode-txt'>
				<span>SHA-256</span>
			</div>
			<div class='sha2-tx2-desc'>
			<div class='sha2-ico-desc' style="background: url(/img/icons/buttons/sha2-x64.png) center / contain no-repeat;"></div>
				<span>
					<?php
					if (isset($build) && !is_null($build->checksum_mac))
						printf("%s", $build->checksum_mac);
					else if (isset($build_macos_x64))
						printf("%s", $build_macos_x64->checksum_mac);
					else
						printf("Unavailable");
					?>
				</span>
			</div>
			<div class='sha2-tx2-desc'>
			<div class='sha2-ico-desc' style="background: url(/img/icons/buttons/sha2-arm64.png) center / contain no-repeat;"></div>
				<span>
					<?php
					if (isset($build) && !is_null($build->checksum_mac_arm64))
						printf("%s", $build->checksum_mac_arm64);
					else if (isset($build_macos_arm64))
						printf("%s", $build_macos_arm64->checksum_mac);
					else
						printf("Unavailable");
					?>
				</span>
			</div>
			<!-- Download Section -------------------------------------------------------------------------------------------------------------------------------- -->
			<div class='package-tx1-title darkmode-txt'>
				<span>Download Packages</span>
			</div>
			<?php
			if (isset($build) && !is_null($build->get_url_mac()))
				printf("<a href=\"%s\" download>", $build->get_url_mac());
			else if (isset($build_macos_x64))
				printf("<a href=\"%s\" download>", $build_macos_x64->get_url_mac());
			?>
			<div class='package-con-button'>
				<div class='package-ico-button' style="background: url(/img/icons/buttons/x64-h.png) center / 30px no-repeat;">
				</div>
				<div class='package-con-metabutton'>
					<span class='package-tx1-metabutton'>
					<?php
					if ((isset($build) && !is_null($build->get_url_mac())) || isset($build_macos_x64))
						printf("Download for x64");
					else
						printf("Unavailable");
					?>
					</span>
					<br>
					<span class='package-tx2-metabutton'>
						<?php
						if (isset($build) && !is_null($build->get_size_mb_mac()))
							printf("%s MB", $build->get_size_mb_mac());
						else if (isset($build_macos_x64))
							printf("%s MB", $build_macos_x64->get_size_mb_mac());
						else
							printf("Unavailable");
						?>
					</span>
				</div>
			</div>
			<?php
			if ((isset($build) && !is_null($build->get_url_mac())) || isset($build_macos_x64))
				printf("</a>");
			?>
			<?php
			if (isset($build) && !is_null($build->get_url_mac_arm64()))
				printf("<a href=\"%s\" download>", $build->get_url_mac_arm64());
			else if (isset($build_macos_arm64))
				printf("<a href=\"%s\" download>", $build_macos_arm64->get_url_mac_arm64());
			?>
			<div class='package-con-mini-button'>
				<div class='package-ico-button' style="background: url(/img/icons/buttons/arm64-h.png) center / 30px no-repeat;">
				</div>
				<div class='package-con-metabutton'>
					<span class='package-tx1-metabutton'>
						<?php
						if ((isset($build) && !is_null($build->get_url_mac_arm64())) || isset($build_macos_arm64))
							printf("Download for arm64");
						else
							printf("Unavailable");
						?>
					</span>
					<br>
					<span class='package-tx2-metabutton'>
						<?php
						if (isset($build) && !is_null($build->get_size_mb_mac_arm64()))
							printf("%s MB", $build->get_size_mb_mac_arm64());
						else if (isset($build_macos_arm64))
							printf("%s MB", $build_macos_arm64->get_size_mb_mac_arm64());
						else
							printf("Unavailable");
						?>
					</span>
				</div>
			</div>
			<?php
			if ((isset($build) && !is_null($build->get_url_mac_arm64())) || isset($build_macos_arm64))
				printf("</a>");
			?>
		</div>
	</div>
</div>
<div class='downloadable-con-container'>
	<div class='downloadable-con-outer'>
		<div class='downloadable-con-inner-a'>
			<div class='downloadable-con-graphic' style="background: url(/img/graphics/download/bsd.png) center top no-repeat; right: -52px; bottom: -38px;">
			</div>
			<div class='downloadable-con-image' style="background: url(/img/icons/list/os-bsd.png) center left / 42px no-repeat;">
			</div>
			<div class='downloadable-tx1-title darkmode-txt'>
				<span>FreeBSD</span>
			</div>
			<div class='downloadable-tx2-desc darkmode-txt'>
				<span>Users can expect to run RPCS3 at the best possible performance on a wide range of hardware setups on FreeBSD 12.3 or later.<br><br><br><br></span>
			</div>
			<a href="https://cgit.freebsd.org/ports/log/emulators/rpcs3">
			<div class='package-con-button'>
				<div class='package-ico-button' style="background: url(/img/icons/buttons/bsd-h.png) center / 22px no-repeat;">
				</div>
				<div class='package-tx1-button'>
					<span>BSD Ports</span>
				</div>
			</div>
			</a>
		</div>
	</div>
	<div class='downloadable-con-outer' style="width: 66.6666666666%;">
		<div class='downloadable-con-inner-a'>
			<div class='downloadable-con-graphic' style="background: url(/img/graphics/download/previous.png) center top no-repeat; right: -52px; bottom: -38px;">
			</div>
			<div class='downloadable-con-image darkmode-invert' style="background: url(/img/icons/buttons/history.png) center left / 42px no-repeat;">
			</div>
			<div class='downloadable-tx1-title darkmode-txt'>
				<span>Previous Builds</span>
			</div>
			<div class='downloadable-tx2-desc darkmode-txt'>
				<span>Checking previous builds allows you browse all publicly released official builds. We offer useful metadata for each build such as SHA, OS version, author and the commit it was compiled from. Please be aware that because these are previous builds they may be missing important fixes and additions found in later builds.<br><br>For furthers details see our <a href="https://github.com/RPCS3/rpcs3/commits/master" target="_blank">commits</a> log via GitHub.</span>
				<br><br>
			</div>
			<a href="https://rpcs3.net/compatibility?b">
				<div class='package-con-button' style="width: 225px;">
					<div class='package-ico-button' style="background: url(/img/icons/buttons/history-h.png) center / 22px no-repeat;">
					</div>
					<div class='package-tx1-button'>
						<span>
							All Previous Builds
						</span>
					</div>
				</div>
			</a>
		</div>
	</div>
</div>
