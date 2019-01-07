<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class( array('is-preload') ); ?>>
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Main -->
					<div id="main">
						<div class="inner">
							<!-- Header -->
								<header id="header">
									<a href="<?php echo esc_url( site_url() ); ?>" class="logo"><strong><?php bloginfo( 'name' ); ?></strong></a>
									<ul class="icons">

										<?php if ( !empty( get_theme_mod( 'tw_link' ) ) ) : ?>
											<li>
												<a href="<?php echo esc_url( get_theme_mod( 'tw_link' ) ); ?>" class="icon fa-twitter">
													<span class="label"><?php _e( 'Twitter', 'editorial' ); ?></span>
												</a>
											</li>
										<?php endif; ?>
										
										<?php if ( !empty( get_theme_mod( 'fb_link' ) ) ) : ?>
											<li><a href="<?php echo esc_url( get_theme_mod( 'fb_link' ) ); ?>" class="icon fa-facebook">
												<span class="label"><?php _e( 'Facebook', 'editorial' ); ?></span></a>
											</li>
										<?php endif; ?>

										<?php if ( !empty( get_theme_mod( 'snapchat_link' ) ) ) : ?>
											<li>
												<a href="<?php echo esc_url( get_theme_mod( 'snapchat_link' ) ); ?>" class="icon fa-snapchat-ghost">
													<span class="label"><?php _e( 'Snapchat', 'editorial' ); ?></span>
												</a>
											</li>
										<?php endif; ?>

										<?php if ( !empty( get_theme_mod( 'ins_link' ) ) ) : ?>
											<li>
												<a href="<?php echo esc_url( get_theme_mod( 'ins_link' ) ); ?>" class="icon fa-instagram">
													<span class="label"><?php _e( 'Instagram', 'editorial' ); ?></span>
												</a>
											</li>
										<?php endif; ?>

										<?php if ( !empty( get_theme_mod( 'med_link' ) ) ) : ?>
											<li>
												<a href="<?php echo esc_url( get_theme_mod( 'med_link' ) ); ?>" class="icon fa-medium">
													<span class="label"><?php _e( 'Medium', 'editorial' ); ?></span>
												</a>
											</li>
										<?php endif; ?>
									</ul>
								</header>