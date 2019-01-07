<?php get_header(); ?>
		<!-- Section -->
		<section>
			<header class="major">
				<h2><?php _e( 'Error 404 Page', 'editorial' ) ?></h2>
			</header>
			<div class="oops">
				<?php echo '<img src="'. get_theme_file_uri('/images/404.png') .'" alt="'. __( '404 Not Found', 'editorial' ) .'" />'; ?>
			</div>
			<br>
			<h4><?php _e( 'Search Our Website', 'editorial' ); ?></h4>
			<p><?php _e( 'Can\'t find what you need? Take a moment and do a search below!', 'editorial' ); ?></p>
			<?php get_search_form(); ?>
		</section>
	</div>
</div>
</div>
<?php get_footer(); ?>