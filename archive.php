<?php get_header(); ?>

		<!-- Section -->
		<section>
			<header class="major">
				<h2>
					<?php  
					if ( is_tag() ) {
						single_tag_title( __( 'Tag: ', 'editorial' ), true );
					} elseif ( is_category() ) {
						single_cat_title( __( 'Category: ', 'editorial' ), true );
					} elseif ( is_author() ) {
						echo __( 'About: ', 'editorial' ) . esc_html( get_the_author_meta( 'display_name' ) );
					} elseif ( is_month() ) {
						single_month_title( ' ', true );
					} elseif( is_year() ) {
						echo __( 'Post In: ', 'editorial' ) . esc_html( get_query_var('year') );
					} elseif( is_day() ) {
						$day = esc_html( get_query_var('day') );
						$month = esc_html( get_query_var('monthnum') );
						$year = esc_html( get_query_var('year') );
						printf( 'Post in: %s/%s/%s', $day, $month, $year );
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

</div>
<?php get_footer(); ?>