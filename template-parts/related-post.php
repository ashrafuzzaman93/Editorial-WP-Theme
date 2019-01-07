
<?php  
$getPosts = get_posts( array(
	'category__in'	=> wp_get_post_categories( $post->ID ),
	'post__not_in'	=> array( get_the_ID() )
) );
if ( !empty( $getPosts ) ) :
?>
	<div class="related">
		<h2 class="lined"><?php _e( 'Related Posts', 'editorial' ); ?></h2>
		<?php

			$related = get_posts( array( 
				'category__in'	=> wp_get_post_categories( $post->ID ),
				'post__not_in'	=> array( $post->ID ),
				'numberposts'	=> 4,
			) );

			if( $related ) foreach( $related as $post ) {
			setup_postdata($post); 
		?>
			<div class="related-post">
				<a href="<?php the_permalink(); ?>">
					<?php  
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'large', [ 'alt'	=> esc_attr( get_the_title() ) ] );
						} else {
							echo '<img src="'. get_theme_file_uri('/images/pic01.jpg') .'" alt="'. esc_attr( get_the_title() ) .'" />';
						}
					?>
				</a>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			</div>
		<?php }
			wp_reset_postdata(); 
		?>
	</div>
<?php endif; ?>
<div class="pn-pagi">
	<!-- Previous Post link -->
	<?php if( !empty( get_previous_post_link() ) ) :  ?>
		<div class="page-link page-previous">
			<h5><?php _e( 'Previous Post', 'editorial' ); ?></h5>
			<?php previous_post_link( '%link', '<span>&leftarrow; </span>%title' ); ?>
		</div>
	<?php endif; ?>

	<!-- Next Post link -->
	<?php if( !empty( get_next_post_link() ) ) :  ?>
		<div class="page-link page-next">
			<h5><?php _e( 'Next Post', 'editorial' ); ?></h5>
			<?php next_post_link( '%link', '%title<span> &rightarrow;</span>' ); ?>
		</div>
	<?php endif; ?>
</div>