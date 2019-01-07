<div id="sidebar">
	<div class="inner">

		<!-- Search -->
			<section id="search" class="alt">
				<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="text" name="s" id="query" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Search', 'editorial' ); ?>" />
				</form>
			</section>

		<!-- Menu -->
			<nav id="menu">
				<header class="major">
					<h2><?php _e( 'Menu', 'editorial' ); ?></h2>
				</header>
				<?php  
					wp_nav_menu( array(
						'theme_location'	=> 'mainmenu',
						'container'			=> ' ',
						'fallback_cb'		=> 'editorial_default_menu'
					) );
				?>
			</nav>

			<?php  
				if ( is_active_sidebar( 'editorial_left_sidebar' ) ) {
					dynamic_sidebar( 'editorial_left_sidebar' );
				}
			?>
	</div>
</div>