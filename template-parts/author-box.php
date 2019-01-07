<div class="author-box">
	<h2 class="lined"><?php _e( 'About the Author', 'editorial' ); ?></h2>
	<div class="author-details">
		<div class="author-link">
			<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
		</div>
		<div class="author-bio">
			<h4>
				<a href="<?php echo esc_attr( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_login' ) ) ); ?>"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></a>
			</h4>
			<p><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
		</div>
	</div>
</div>