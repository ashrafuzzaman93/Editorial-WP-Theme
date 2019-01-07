<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="gallery-post-slider">
		<?php 
		if ( class_exists( 'Attachments' ) ) {
			$attachments = new Attachments( 'editorial_galler_images' );
			if ( $attachments->exist() ) {
				while ( $attachment = $attachments->get() ) {
					echo '<img src="'. esc_attr( $attachments->src( 'editorial_gallery' ) ) .'" alt="'. esc_attr( $attachments->field( 'title' ) ) .'" />';
				}
			} else {
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'full', ['alt' => esc_attr( get_the_title() ) ] );
				} else{
					echo '<img src="'. esc_attr( get_theme_file_uri('/images/pic01.jpg') ) .'" alt="'. esc_attr( get_the_title() ) .'" />';
				}
			}
		}else{
			echo '<img src="'. esc_attr( get_theme_file_uri('/images/pic01.jpg') ) .'" alt="'. esc_attr( get_the_title() ) .'" />';
		}
		?>
	</div>
	<h3><?php the_title(); ?></h3>
	<p><?php the_excerpt(); ?></p>
	<ul class="actions">
		<li><a href="<?php the_permalink(); ?>" class="button"><?php _e( 'More', 'editorial' ); ?></a></li>
	</ul>
</article>