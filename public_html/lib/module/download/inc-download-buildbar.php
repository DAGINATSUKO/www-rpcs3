<div class='version-con-container'>
	<div class='version-img-container'>
		<div class='version-img-package'>
		</div>
	</div>
	<div class='version-ico-package'>
	</div>
	<div class='version-txt-container'>
		<div class='version-tx1-package darkmode-txt'>
			<span>
				<span class='version-buildversion'>
					<?php
					if (isset($build))
						printf("Build %s", $build->version);
					else
						printf("Unavailable");
					?>
				</span>
			</span>
		</div>
		<div class='version-tx2-package darkmode-txt'>
			<span>
				<span class='version-builddate'>
					<?php
					if (isset($build))
						printf("This build was released on %s", $build->fulldate);
					else
						printf("Unavailable");
					?>
				</span>
			</span>
		</div>
		<div class='package-tx2-desc-wide'>
			<div class='package-pr'>
				<div class='version-ico-git' style="background: url(/img/icons/buttons/pull-h.png) center left / 24px no-repeat;">
				</div>
				<?php
				if (isset($build))
					printf("Pull Request <a href=\"%s\" target=\"_blank\">#%d</a>",
						   $build->get_url_pr(),
						   $build->pr);
				else
					printf("Unavailable");
				?>
			</div>
			<div class='package-commit'>
				<div class='version-ico-git' style="background: url(/img/icons/buttons/commit-h.png) center left / 24px no-repeat;">
				</div>
				<?php
				if (isset($build))
					printf("Commit <a href=\"%s\" target=\"_blank\">%s</a>",
						   $build->get_url_commit(),
						   $build->get_commit_short());
				else
					printf("Unavailable");
				?>
			</div>
			<div class='package-author'>
				<div class='version-ico-git' style="background: url(/img/icons/buttons/github-h.png) center left / 24px no-repeat;">
				</div>
				<?php
				if (isset($build))
					printf("Submitted by <a href=\"%s\" target=\"_blank\">%s</a>",
						   $build->get_url_author(),
						   $build->author);
				else
					printf("Unavailable");
				?>
			</div>
		</div>
	</div>
</div>