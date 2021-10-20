<div class="sidebar-btn-open nav-blog scale-menu-btn-remove">
</div>
<div class='sidebar-con-dimmer toggle-blogbar'>
	<div class='blogbar-con-anim dropin-load darkmode-navsidebar-anim'>
		<div class="blogbar-tx1-title darkmode-navsidebar-title" style='-webkit-animation-duration: .4s;'>
			  <span>Developers Blog </span>
		</div>
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
</div>
