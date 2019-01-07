<section>
	<header class="major">
		<h2><?php _e( 'Services', 'editorial' ); ?></h2>
	</header>
	<div class="features">
		<?php  
		$query = new WP_Query( array(
			'post_type'		=> 'services'
		) );

		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
		?>
			<article>
				<?php  
					if ( class_exists('ACF') && function_exists('the_field') ) {
						$editorial_get_services_icon = get_field( 'editorial_service_icon_name' );
						if ( $editorial_get_services_icon ) {
							echo '<i class="icon '. esc_attr( $editorial_get_services_icon ) .'"></i>';
						} else {
							echo '<span class="icon fa-diamond"></span>';
						}
					} else {
						echo '<span class="icon fa-diamond"></span>';
					}
				?>
				<div class="content">
					<h3><?php the_title(); ?></h3>
					<p><?php echo wp_trim_words( get_the_content(), 22, null ) ?></p>
				</div>
			</article>
		<?php 
			endwhile; 
			wp_reset_postdata();
		endif; 
		?>
	</div>
</section>
