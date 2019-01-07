<?php get_header(); ?>
			<!-- Banner -->
			<?php 
			$editorial_banner_post_args = array(
				'post_type'	=> 'banners'
			);
			$editorial_banner_post = new WP_Query( $editorial_banner_post_args );

			if( is_front_page() && $editorial_banner_post->found_posts > 0 ) {
				get_template_part( 'template-parts/banner' );
			} 
			?>

			<!-- Services Section -->
			<?php 
			$editorial_service_post_args = array(
				'post_type'	=> 'services'
			);
			$editorial_service_post = new WP_Query( $editorial_service_post_args );

			if( is_front_page() && $editorial_service_post->found_posts > 0 ) {
				get_template_part('template-parts/services'); 
			}
			?>

			<!-- Section -->
			<section>
				<header class="major">
					<h2>
					<?php  
					if ( is_home() && is_front_page() ) {
						_e( 'Blog', 'editorial' );
					} else {
						_e( 'Blog', 'editorial' );
					}
					?>
					</h2>
				</header>
				<div class="posts">
					<?php  
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							// Getting Post
							get_template_part( 'template-parts/posts/content', get_post_format() );
						endwhile;
					else: 
						get_template_part( 'template-parts/posts/content', 'none' ); 
					endif; 
					?>
				</div>
				<?php 
				the_posts_pagination( array(
					'screen_reader_text'	=> ' '
				) ); 
				?>
			</section>
		</div>
	</div>

	<!-- Sidebar -->
	<?php 
		if ( is_active_sidebar( 'editorial_left_sidebar' ) || has_nav_menu( 'mainmenu' ) ) {
			get_sidebar();
		}
	?>
</div>
<?php get_footer(); ?>