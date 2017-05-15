<div id='bulletin-con-dim' class='toggle-bulletin'>
	<div id='bulletin-con-anim' class='dropin-load'>
		<div id="bulletin-tx1-title" style='-webkit-animation-duration: .4s;'>
			 BULLITEN MENU
		</div>
			<div id="menu-con-menu">
				<div id="sidebar" class="sidebar" style='-webkit-animation-duration: .4s;'>
				<header id="masthead" class="site-header" role="banner">
					<div class="site-branding">
						<?php
							twentyfifteen_the_custom_logo();
							if ( is_front_page() && is_home() ) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php endif;
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo $description; ?></p>
							<?php endif;
						?>
						<button class="secondary-toggle"><?php _e( 'Menu and widgets', 'RPCS3' ); ?></button>
					</div>
				</header>
				<?php get_sidebar(); ?>
			</div>
		</div>
		<div id='bulletin-con-footer'>
			<div id='bulletin-img-overflow'>
			</div>
			<div id='bulletin-ico-footer'>
			</div>
			<a href="https://github.com/DAGINATSUKO/RPCS3-Website" target="_blank">
			<div id='bulletin-tx1-footer'>
				<div style="color: #002556 !important;" class="txt-link" title="Website designed by DAGINATSUKO">
					 Website source code on GitHub
				</div>
			</div>
		</div>
		</a>
	</div>
</div>