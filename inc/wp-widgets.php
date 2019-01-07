<?php

	/*----------------------------------------*/
	/* Editorial widgets register */
	/*----------------------------------------*/
	if ( !function_exists( 'editorial_register_widgets' ) ) {
		function editorial_register_widgets() {

			register_widget( 'editorial_mini_posts_widget' );
			register_widget( 'editorial_contat_widget' );
		}

		add_action( 'widgets_init', 'editorial_register_widgets' );
	}

	/*----------------------------------------*/
	/* Editorial mini posts widget */
	/*----------------------------------------*/
	class editorial_mini_posts_widget extends WP_Widget {
		function __construct() {
			parent::__construct( 'editorial_mini_post', __( 'Editorial &mdash; Recent Posts', 'editorial' ), array(
				'description'	=> __( 'You can use theme default mini posts sidebar.', 'editorial' )
			) );
		}

		function form( $instance ) {
			// Title Field 
			$field_id 	= $this->get_field_id( 'title' );
			$name 		= $this->get_field_name( 'title' );
			$value 		= !empty( $instance['title'] ) ? $instance['title'] : '';
	?>

		<p>
			<label for="<?php echo esc_attr( $field_id ); ?>"><?php _e( 'Title:', 'editorial' ); ?></label>
			<input type="text" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $field_id ); ?>"  class="widefat"  value="<?php echo esc_attr( $value ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('editorial_ctg') ); ?>"><?php _e( 'Category:', 'editorial' ); ?></label>
			<select class="widefat" name="<?php echo esc_attr( $this->get_field_name('editorial_ctg') ); ?>" id="<?php echo esc_attr( $this->get_field_id('editorial_ctg') ); ?>">
				<option value=""><?php esc_html_e( 'Select Category', 'editorial' ); ?></option>
				<?php

					$terms = get_terms( 'category' );
					foreach ( $terms as $term ) :
						$selected = ( $instance['editorial_ctg'] == $term->slug ) ? 'selected=selected': ''; 

						?>
						<option value="<?php echo esc_attr( $term->slug ) ?>" <?php echo esc_attr( $selected ) ?>><?php echo esc_html( $term->name ) ?></option>
						<?php
					endforeach;
				?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'posts_count' ) ); ?>"><?php _e( 'Number of posts to show:', 'editorial' ); ?></label>
			<input type="number" class="tiny-text" name="<?php echo esc_attr( $this->get_field_name( 'posts_count' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'posts_count' ) ); ?>" min="1" value="<?php echo !empty( $instance[ 'posts_count' ] ) ? esc_attr( $instance[ 'posts_count' ] ) : '3'; ?>">
		</p>
	<?php
		}

		function widget( $args, $instance ) {

			$title 			= !empty( $instance[ 'title' ] ) ?  $instance[ 'title' ] : 'Latest Posts';
			$get_ctg_name	= !empty( $instance[ 'editorial_ctg' ] ) ? $instance[ 'editorial_ctg' ] : '';
			$no_of_posts	= !empty( $instance[ 'posts_count' ] ) ? $instance[ 'posts_count' ] : 3;
	?>

		<section>
			<header class="major">
				<h2><?php echo esc_html( $title ); ?></h2>
			</header>
			<div class="mini-posts">

				<?php  
					// WP_Query arguments
					$args = array(
						'post_type'				=> array( 'post' ),
						'post_status'           => array( 'publish' ),
						'posts_per_page'        => $no_of_posts,
						'post__not_in'			=> array( get_the_ID() ),
						'category_name'			=> $get_ctg_name
					);
					// The Query
					$query = new WP_Query( $args );

					// The Loop
					if ( $query->have_posts() ) :
						while ( $query->have_posts() ) :
							$query->the_post();
				?>
					<article>
						<a href="<?php the_permalink(); ?>" class="image">
							<?php  
								if ( has_post_thumbnail() ) {
									the_post_thumbnail( 'large', [ 'alt'	=> esc_attr( get_the_title() ) ] );
								} else {
									echo '<img src="'. esc_attr( get_theme_file_uri('/images/pic01.jpg') ) .'" alt="'. esc_attr( get_the_title() ) .'" />';
								}
							?>
						</a>
						<p><?php echo esc_html( wp_trim_words( get_the_content(), 12, null ) ); ?></p>
					</article>
				<?php
						endwhile;
					else :
				?>
					<p><?php _e( 'No Posts Found!!', 'editorial' ); ?></p>
				<?php
					endif;
					// Restore original Post Data
					wp_reset_postdata();
				?>
			</div>
		</section>
	<?php
		}
	}

	/*----------------------------------------*/
	/* Editorial contact widget */
	/*----------------------------------------*/
	class editorial_contat_widget extends WP_Widget {

		function __construct() {
			parent::__construct( 'editorial-contact', __( 'Editorial &mdash; Contact', 'editorial' ), array(
				'description'	=> __( 'You can use theme default mini posts sidebar.', 'editorial' )
			) );
		}

		function form( $instance ) {

			// Title Field 
			$field_id 	= $this->get_field_id( 'title' );
			$name 		= $this->get_field_name( 'title' );
			$value 		= !empty( $instance['title'] ) ? $instance['title'] : '';
	?>

		<p>
			<label for="<?php echo esc_attr( $field_id ); ?>"><?php _e( 'Title:', 'editorial' ); ?></label>
			<input type="text" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $field_id ); ?>"  class="widefat"  value="<?php echo esc_attr( $value ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'editorial_contact_widget_desc' ) ); ?>"><?php _e( 'Address Description:', 'editorial' ); ?></label>
			<textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'editorial_contact_widget_desc' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'editorial_contact_widget_desc' ) ); ?>" rows="3"><?php echo !empty( $instance[ 'editorial_contact_widget_desc' ] ) ? esc_textarea( $instance[ 'editorial_contact_widget_desc' ] ) : ''; ?></textarea>
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'editorial_contact_widget_email' ) ); ?>"><?php _e( 'Email:', 'editorial' ); ?></label>
			<input type="email" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'editorial_contact_widget_email' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'editorial_contact_widget_email' ) ); ?>" value="<?php echo !empty( $instance[ 'editorial_contact_widget_email' ] ) ? esc_attr( $instance[ 'editorial_contact_widget_email' ] ) : ''; ?>">	
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'editorial_contact_widget_phone' ) ); ?>"><?php _e( 'Phone:', 'editorial' ); ?></label>
			<input type="text" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'editorial_contact_widget_phone' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'editorial_contact_widget_phone' ) ); ?>" value="<?php echo !empty( $instance[ 'editorial_contact_widget_phone' ] ) ? esc_attr( $instance[ 'editorial_contact_widget_phone' ] ) : ''; ?>">	
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'editorial_contact_widget_address' ) ); ?>"><?php _e( 'Address:', 'editorial' ); ?></label>
			<input type="text" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'editorial_contact_widget_address' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'editorial_contact_widget_address' ) ); ?>" value="<?php echo !empty( $instance[ 'editorial_contact_widget_address' ] ) ? esc_attr( $instance[ 'editorial_contact_widget_address' ] ) : ''; ?>">	
		</p>
	<?php
		}

		function widget( $args, $instance ) {

			$title 			= !empty( $instance[ 'title' ] ) ?  $instance[ 'title' ] : 'Get in touch';

			$desc 		= !empty( $instance[ 'editorial_contact_widget_desc' ] ) ? $instance[ 'editorial_contact_widget_desc' ] : '';
			$email 		= !empty( $instance[ 'editorial_contact_widget_email' ] ) ? $instance[ 'editorial_contact_widget_email' ] : '';
			$phone 		= !empty( $instance[ 'editorial_contact_widget_phone' ] ) ? $instance[ 'editorial_contact_widget_phone' ] : '';
			$address 	= !empty( $instance[ 'editorial_contact_widget_address' ] ) ? $instance[ 'editorial_contact_widget_address' ] : '';
	?>
		<section>
			<header class="major">
				<h2><?php echo esc_html( $title ); ?></h2>
			</header>
			<p><?php echo esc_html( $desc ); ?></p>
			<ul class="contact">
				<li class="fa-envelope-o"><a href="mailto:"><?php echo esc_html( $email ); ?></a></li>
				<li class="fa-phone"><?php echo esc_html( $phone ); ?></li>
				<li class="fa-home"><?php echo esc_html( $address ); ?></li>
			</ul>
		</section>
	<?php
		}

	}