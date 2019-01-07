<?php get_header(); ?>
		<!-- Content -->
		<section>
			<?php 
				while ( have_posts() ) : the_post(); 
			?>
				<header class="main"> <h1><?php the_title(); ?></h1> </header>
				<span class="image main">
					<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'full', array( 'alt' => esc_attr( get_the_title() ) ) );
						}
					?>
				</span>

				<?php 
					the_content();
				endwhile; ?>
		</section>
	</div>
</div>
<!-- Sidebar -->
<?php get_sidebar(); ?>

</div>
<?php get_footer(); ?>