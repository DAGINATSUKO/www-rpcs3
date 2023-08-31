<div class='downloadable-con-container'>
	<div class='downloadable-con-outer'>
		<div class='downloadable-con-inner-a'>
			<div class='downloadable-con-graphic' style="background: url(/img/graphics/download/windows.png) center top no-repeat; right: -52px; bottom: -38px;">
			</div>
			<div class='downloadable-con-image darkmode-invert' style="background: url(/img/icons/buttons/windows.png) center left / 42px no-repeat;">
			</div>
			<div class='downloadable-tx1-title darkmode-txt'>
				<span>Windows</span>
			</div>
			<div class='downloadable-tx2-desc darkmode-txt'>
				<span>Users can expect to run RPCS3 on a wide range of hardware setups on both laptops and desktops with support for Windows 10 and 11.</span>
			</div>
			<div class='sha2-tx1-title darkmode-txt'>
				<span>SHA-256</span>
			</div>
			<div class='sha2-tx2-desc'>
				<span>
				<?php
				if (isset($build) && !is_null($build->checksum_win))
					printf("%s", $build->checksum_win);
				else
					printf("Unavailable");
				?>
				</span>
			</div>
			<div class='package-tx1-title darkmode-txt'>
				<span>Size</span>
			</div>
			<div class='package-tx2-desc darkmode-txt'>
				<span>
				<?php
				if (isset($build) && !is_null($build->get_size_mb_windows()))
					printf("%s MB", $build->get_size_mb_windows());
				else
					printf("Unavailable");
				?>
				</span>
			</div>
			<?php
			if (isset($build) && !is_null($build->get_url_windows()))
				printf("<a href=\"%s\" download>", $build->get_url_windows());
			?>
			<div class='package-con-button'>
				<div class='package-ico-button' style="background: url(/img/icons/buttons/windows-h.png) center / 22px no-repeat;">
				</div>
				<div class='package-tx1-button'>
					<span>
					<?php
					if (isset($build) && !is_null($build->get_url_windows()))
						printf("Download");
					else
						printf("Unavailable");
					?>
					</span>
				</div>
			</div>
			<?php
			if (isset($build) && !is_null($build->get_url_windows()))
				printf("</a>");
			?>
		</div>
	</div>
	<div class='downloadable-con-outer'>
		<div class='downloadable-con-inner-a'>
			<div class='downloadable-con-graphic' style="background: url(/img/graphics/download/linux.png) center top no-repeat; right: -52px; bottom: -38px;">
			</div>
			<div class='downloadable-con-image darkmode-invert' style="background: url(/img/icons/buttons/linux.png) center left / 42px no-repeat;">
			</div>
			<div class='downloadable-tx1-title darkmode-txt'>
				<span>Linux</span>
			</div>
			<div class='downloadable-tx2-desc darkmode-txt'>
				<span>Users can expect to run RPCS3 at the best possible performance on a wide range of hardware setups with support for most common distros.</span>
			</div>
			<div class='sha2-tx1-title darkmode-txt'>
				<span>SHA-256</span>
			</div>
			<div class='sha2-tx2-desc'>
				<span>
				<?php
				if (isset($build) && !is_null($build->checksum_linux))
					printf("%s", $build->checksum_linux);
				else
					printf("Unavailable");
				?>
				</span>
			</div>
			<div class='package-tx1-title darkmode-txt'>
				<span>Size</span>
			</div>
			<div class='package-tx2-desc darkmode-txt'>
				<span>
				<?php
				if (isset($build) && !is_null($build->get_size_mb_linux()))
					printf("%s MB", $build->get_size_mb_linux());
				else
					printf("Unavailable");
				?>
				</span>
			</div>
			<?php
			if (isset($build) && !is_null($build->get_url_linux()))
				printf("<a href=\"%s\" download>", $build->get_url_linux());
			?>
			<div class='package-con-button'>
				<div class='package-ico-button' style="background: url(/img/icons/buttons/linux-h.png) center / 22px no-repeat;">
				</div>
				<div class='package-tx1-button'>
					<span>
					<?php
					if (isset($build) && !is_null($build->get_url_linux()))
						printf("Download");
					else
						printf("Unavailable");
					?>
					</span>
				</div>
			</div>
			<?php
			if (isset($build) && !is_null($build->get_url_linux()))
				printf("</a>");
			?>
		</div>
	</div>
	<div class='downloadable-con-outer'>
		<div class='downloadable-con-inner-a'>
			<div class="downloadable-con-graphic" style="background: url(/img/graphics/download/macos.png) center top no-repeat;right: -74px;bottom: -128px;width: 246px;height: 272px;">
			</div>
			<div class='downloadable-con-image darkmode-invert' style="background: url(/img/icons/buttons/macos.png) center left / 42px no-repeat;">
			</div>
			<div class='downloadable-tx1-title darkmode-txt'>
				<span>macOS</span>
			</div>
			<div class='downloadable-tx2-desc darkmode-txt'>
				<span>Users can expect to run RPCS3 on the latest performance Macs with support for M1 and Intel Macs with dedicated graphics on macOS 12.0 or later.</span>
			</div>
			<div class='sha2-tx1-title darkmode-txt'>
				<span>SHA-256</span>
			</div>
			<div class='sha2-tx2-desc'>
				<span>
				<?php
				if (isset($build) && !is_null($build->checksum_mac))
					printf("%s", $build->checksum_mac);
				else
					printf("Unavailable");
				?>
				</span>
			</div>
			<div class='package-tx1-title darkmode-txt'>
				<span>Size</span>
			</div>
			<div class='package-tx2-desc darkmode-txt'>
				<span>
				<?php
				if (isset($build) && !is_null($build->get_size_mb_mac()))
					printf("%s MB", $build->get_size_mb_mac());
				else
					printf("Unavailable");
				?>
				</span>
			</div>
			<?php
			if (isset($build) && !is_null($build->get_url_mac()))
				printf("<a href=\"%s\" download>", $build->get_url_mac());
			?>
			<div class='package-con-button'>
				<div class='package-ico-button' style="background: url(/img/icons/buttons/macos-h.png) center / 22px no-repeat;">
				</div>
				<div class='package-tx1-button'>
					<span>
					<?php
					if (isset($build) && !is_null($build->get_url_mac()))
						printf("Download");
					else
						printf("Unavailable");
					?>
					</span>
				</div>
			</div>
			<?php
			if (isset($build) && !is_null($build->get_url_mac()))
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
			<div class='downloadable-con-image darkmode-invert' style="background: url(/img/icons/buttons/bsd.png) center left / 42px no-repeat;">
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
				</span>
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