<section id="banner">
	<div class="content">
		<?php 
		// Getting ID from customiser options
		$getID = (int) get_theme_mod( 'editorial_banner_section_content' );
		if ( !empty( $getID ) && $getID != 0 ) {

			// Post ID
			$postID = array( $getID );
			$args	= array(
				'post_type'		=> 'banners',
				'numberposts'	=> 1,
				'post__in'		=> $postID,
				'post_status'	=> 'publish'
			);
		} else {
			$args	= array(
				'post_type'		=> 'banners',
				'numberposts'	=> 1,
				'post_status'	=> 'publish'
			);
		}
		$getPost = get_posts( $args );
		if ( !empty($getPost) ) :
			foreach ($getPost as $post) :
				setup_postdata( $post );
		?>
				<header>
					<h1><?php the_title(); ?></h1>
				</header>
				<p><?php echo esc_html( wp_trim_words( get_the_content(), 40, ' ' ) ); ?></p>
				<ul class="actions">
					<li><a href="<?php the_permalink(); ?>" class="button big"><?php _e( 'Learn More', 'editorial' ); ?></a></li>
				</ul>
			</div>
			<span class="image object">
				<?php 
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'full', ['alt' => esc_attr( get_the_title() ) ] );
				} else{
					echo '<img src="'. esc_attr( get_theme_file_uri('/images/pic01.jpg') ) .'" alt="'. esc_attr( get_the_title() ) .'" />';
				}
				?>
			</span>
	<?php 
		endforeach;
		wp_reset_postdata();
		else:
	?>
		<p><?php _e( 'No Posts Found.', 'editorial' ); ?></p>
	<?php endif; ?>
</section>