<section id="search" class="alt">
	<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" name="s" id="query" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Search', 'editorial' ); ?>" />
	</form>
</section>