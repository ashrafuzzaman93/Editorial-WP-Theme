<?php get_header(); ?>
		<!-- Content -->
		<section>
			<?php 
				while ( have_posts() ) : the_post(); 
			?>
				<header class="main"> <h1><?php the_title(); ?></h1> </header>
				<div class="post-ctg"> <?php the_category(' '); ?> </div>
				<?php
					if ( get_post_format() == 'gallery' ) : ?>
						<div class="gallery-post-slider">
							<?php 
								if ( class_exists( 'Attachments' ) ) {
									$attachments = new Attachments( 'editorial_galler_images' );
									if ( $attachments->exist() ) {
										while ( $attachment = $attachments->get() ) {
											echo '<img src="'. esc_attr( $attachments->src( 'full' ) ) .'" alt="'. esc_attr( $attachments->field( 'title' ) ) .'" />';
										}
									} else {
										if ( has_post_thumbnail() ) {
											the_post_thumbnail( 'full', ['alt' => esc_attr( get_the_title() ) ] );
										} else{
											echo '<img src="'. esc_attr( get_theme_file_uri('/images/pic01.jpg') ) .'" alt="'. esc_attr( get_the_title() ) .'" />';
										}
									}
								} else{
									echo '<img src="'. esc_attr( get_theme_file_uri('/images/pic01.jpg') ) .'" alt="'. esc_attr( get_the_title() ) .'" />';
								}
							?>
						</div>
				<?php else: ?>
						<span class="image main">
							<?php 
								if ( has_post_thumbnail() ) {
									the_post_thumbnail( 'full', array( 'alt' => esc_attr( get_the_title() ) ) );
								}
							?>
						</span>
				<?php endif; ?>
				<?php the_content(); ?>
				<div class="post-tag"> <?php the_tags( null, ' '); ?> </div>			
				<?php 
					// Single page content pagination
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
				
				// Include related posts section
				get_template_part( 'template-parts/related-post' );
				// Include author details section
				get_template_part( 'template-parts/author-box' );
			?>
			<?php if( comments_open() || get_comments_number() ) { comments_template(); } ?>
		</section>
	</div>
</div>
<!-- Sidebar -->
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>