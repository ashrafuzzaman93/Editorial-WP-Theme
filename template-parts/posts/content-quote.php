<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>" class="image">
		<?php  
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'large', [ 'alt'	=> esc_attr( get_the_title() ) ] );
			} else {
				echo '<img src="'. esc_attr( get_theme_file_uri('/images/pic01.jpg') ) .'" alt="'. esc_attr( get_the_title() ) .'" />';
			}
		?>
		<span class="post-type"><i class="icon fa-quote-left"></i></span>
	</a>
	<h3><?php the_title(); ?></h3>
	<p><?php the_excerpt(); ?></p>
	<ul class="actions">
		<li><a href="<?php the_permalink(); ?>" class="button"><?php _e( 'More', 'editorial' ); ?></a></li>
	</ul>
</article>