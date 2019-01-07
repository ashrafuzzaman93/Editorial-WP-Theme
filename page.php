<?php get_header(); ?>
		<?php  
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				// Getting Post
				the_content();

				if ( !post_password_required() ) {
					$defaults = array(
						'before'		=> '<div class="pageslink">' . __( 'Pages:', 'editorial' ),
						'after'			=> '</div>',
						'link_before'	=> '<span>',
						'link_after'	=> '</span>'
					);
					wp_link_pages( $defaults ); 
				}
			endwhile;
		endif;
		?>
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