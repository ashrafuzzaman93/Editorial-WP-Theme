<?php get_header(); ?>

			<!-- Section -->
			<section>
				<header class="major">
					<h2><?php _e( 'Your Serach Query: ', 'editorial' ); echo '"' . esc_html( get_search_query( false ) ) . '"'; ?></h2>
				</header>
				<div class="posts">
					<?php  
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								// Getting Post
								get_template_part( 'template-parts/posts/content', get_post_format() );
							endwhile;
						else: 
					?>
						<article>
							<p><?php _e( 'Couldn\'t find what you\'re looking for!', 'editorial' ); ?></p>
							<br>
							<h4><?php _e( 'Try Again', 'editorial' ); ?></h4>
							<p><?php _e( 'If you want to rephrase your query, here is your chance:', 'editorial' ); ?></p>
							<?php get_search_form(); ?>
						</article>

					<?php endif; ?>
				</div>
			</section>
		</div>
	</div>
</div>

<?php get_footer(); ?>