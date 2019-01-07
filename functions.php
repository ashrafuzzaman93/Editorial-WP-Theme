<?php
	
	/*-----------------------------*/
    /* Theme Initial Setup */
    /*-----------------------------*/
	if ( !function_exists('editorial_theme_setup') ) :
		
		function editorial_theme_setup() {

			/* Register Text Domain for Translation */
			load_theme_textdomain('editorial');

			/* Getting RSS Feed Links */
			add_theme_support( 'automatic-feed-links' );

			/* Getting Title Tag */
			add_theme_support('title-tag');

			/* Getting Post Thumbnail */
			add_theme_support('post-thumbnails');

			// add_theme_support('custom-header');

			/* Getting Background Options */
			add_theme_support('custom-background');

			/* Create custom image size */	
			add_image_size( 'editorial_gallery', 520, 290, true );

			/* Getting Header Options */
			add_theme_support('custom-header');		

			/* Getting Post Formats */ 
			add_theme_support( 'post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'] );

			/*  */
			add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

			// Content width
			if ( ! isset( $content_width ) ) $content_width = 900;

			add_editor_style('assets/css/editor-style.css');

			/* Register Editorial Menu */
			register_nav_menu( 'mainmenu', __( 'Main Menu', 'editorial' ) );

			/* Default menu for editorial */
			function editorial_default_menu() {
				if ( is_user_logged_in() && current_user_can('administrator') ) {
					echo '<div id="menu"><ul><li><a href="'. site_url() .'/wp-admin/nav-menus.php">'. __( 'Create a New Menu', 'editorial' ) .'</a></li></ul></div>';
				} else {
					echo '<div id="menu"><ul><li><a href="'. site_url() .'">'. __( 'Home', 'editorial' ) .'</a></li></ul></div>';
				}
			}
		}
	endif;
	add_action( 'after_setup_theme', 'editorial_theme_setup' );

	/*-----------------------------*/
    /* Register Left Sidebar */
    /*-----------------------------*/
    function editorial_sidebar_register() {

    	$args = array(
    		'name'			=> __( 'Left Sidebar', 'editorial' ),
    		'description'	=> __( 'You may add your widget from widgets area.', 'editorial' ),
    		'id'			=> 'editorial_left_sidebar',
    		'before_widget'	=> '<section>',
    		'after_widget'	=> '</section>',
    		'before_title'	=> '<header class="major"><h2>',
    		'after_title'	=> '</h2></header>',
    	);
    	register_sidebar( $args );
    }
    add_action( 'widgets_init', 'editorial_sidebar_register' );

    /*---------------------------------------------------------*/
	/* Remove default active widgets */
	/*---------------------------------------------------------*/
	if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	    add_action('admin_footer','removed_widgets');
	}
	function removed_widgets(){
	    //get all registered sidebars
	    global $wp_registered_sidebars;
	    //get saved widgets
	    $widgets = get_option('sidebars_widgets');
	    //loop over the sidebars and remove all widgets
	    foreach ($wp_registered_sidebars as $sidebar => $value) {
	        unset($widgets[$sidebar]);
	    }
	    //update with widgets removed
	    update_option('sidebars_widgets',$widgets);
	}

	/* ----------------------------------------------------- */
	/* Register Custom Post Type for Services */
	/* ----------------------------------------------------- */
	function editorial_services_custom_post() {
		$labels = array(
			'name'			=> __( 'Services', 'editorial' ),
			'singular_name'	=> __( 'Service', 'editorial' ),
			'add_new'		=> __( 'Add service', 'editorial' ),
			'add_new_item'	=> __( 'Add New service', 'editorial' ),
			'not_found'		=> __( 'No services Found', 'editorial' ),
			'new_item'		=> __( 'New service', 'editorial' ),
			'view_item'		=> __( 'View service', 'editorial' ),
			'edit_item'		=> __( 'Edit service', 'editorial' ),
			'search_items'	=> __( 'Search Banners', 'editorial' ),
			'not_found_in_trash'	=> __( 'No services found in Trash', 'editorial' ),
			'all_item'		=> __( 'All Services', 'editorial' )
		);

		$args = array(
			'labels'		=> $labels,
			'public'		=> true,
			'menu_position'	=> 22,
			'menu_icon'		=> 'dashicons-admin-generic',
			'supports'		=> [ 'title', 'editor' ] 
		);

		register_post_type( 'services', $args );
	}
	add_action( 'init', 'editorial_services_custom_post' );


	/* ----------------------------------------------------- */
	/* Register Custom Post */
	/* ----------------------------------------------------- */
	function editorial_banner_custom_post() {
		$labels = array(
			'name'				=> __( 'Banners', 'editorial' ),
			'singular_name'		=> __( 'Banner', 'editorial' ),
			'add_new'			=> __( 'Add banner', 'editorial' ),
			'add_new_item'		=> __( 'Add New banner', 'editorial' ),
			'new_item'			=> __( 'New Item', 'editorial' ),
			'view_item'			=> __( 'View banner', 'editorial' ),
			'edit_item'			=> __( 'Edit banner', 'editorial' ),
			'search_items'		=> __( 'Search banners', 'editorial' ),
			'not_found'			=> __( 'No banners Found', 'editorial' ),
			'all_item'			=> __( 'All banners', 'editorial' ),
			'not_found_in_trash'	=> __( 'No banners found in Trash', 'editorial' ),
			'featured_image'		=> __( 'Banner image', 'editorial' ),
			'set_featured_image'	=> __( 'Set banner image', 'editorial' ),
			'remove_featured_image'	=> __( 'Remove banner image', 'editorial' ),
		);

		$args = array(
			'labels'		=> $labels,
			'public'		=> true,
			'menu_position'	=> 20,
			'menu_icon'		=> 'dashicons-align-right',
			'supports'	=> ['title', 'editor', 'thumbnail'],
			// 'taxonomies' => array( 'post_tag', 'category'),
		);

		register_post_type( 'banners', $args );
	}
	add_action( 'init', 'editorial_banner_custom_post' );

	function editorial_internal_custom_css() {
	?>
		<style>
			<?php echo !display_header_text() ? '#header a.logo { display: none; }' : ''; ?>
			<?php echo !empty( get_header_textcolor() ) ? '#header a.logo strong { color: #'. get_header_textcolor() . '; }' : ''; ?>
		</style>		

	<?php
	}
	add_action( 'wp_head', 'editorial_internal_custom_css' );

	/*-----------------------------*/
    /* Enqueue Theme assets */
    /*-----------------------------*/
    function editorial_theme_assets() {

    	$opt = wp_get_theme();
    	$ver = $opt->get( 'Version' );

    	/* Fonts */
    	wp_enqueue_style( 'font-awesome-font', get_theme_file_uri('/assets/css/font-awesome.min.css'), null, $ver );
    	wp_enqueue_style( 'roboto-font', '//fonts.googleapis.com/css?family=Open+Sans:400,600,400italic,600italic|Roboto+Slab:400,700', null, $ver );

    	/* CSS */
    	wp_enqueue_style( 'tns-css', '//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.8.5/tiny-slider.css', null, $ver );
    	wp_enqueue_style( 'main-css', get_theme_file_uri('/assets/css/main.css'), null, $ver );
    	wp_enqueue_style( 'theme-css', get_stylesheet_uri(), null, $ver );

    	/* JavaScripts */
    	wp_enqueue_script( 'jquery' );
    	wp_enqueue_script( 'browser-min-js', get_theme_file_uri( '/assets/js/browser.min.js' ), array(), $ver, true );
    	wp_enqueue_script( 'tns-js', '//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.8.5/min/tiny-slider.js', array(), $ver, true );
    	wp_enqueue_script( 'breakpoints-min-js', get_theme_file_uri( '/assets/js/breakpoints.min.js' ), array(), $ver, true );
    	wp_enqueue_script( 'util-js', get_theme_file_uri( '/assets/js/util.js' ), array(), $ver, true );
    	wp_enqueue_script( 'main-js', get_theme_file_uri( '/assets/js/main.js' ), array(), $ver, true );

    	if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
	        // Load comment-reply.js (into footer)
	        wp_enqueue_script( 'comment-reply', 'wp-includes/js/comment-reply', array(), false, true );
	    }
    }
    add_action( 'wp_enqueue_scripts', 'editorial_theme_assets' );

    // function editorial_body_class( $amarClass ) {
    // 	// unset( $amarClass[array_search('home', $amarClass)] );
    // 	$amarClass[] = 'hello';
    // 	return $amarClass;
    // }
    // add_filter( 'body_class', 'editorial_body_class' );


    /*-----------------------------*/
    /* Menu Icon Name Option Add */
    /*-----------------------------*/
    if ( class_exists( 'ACF' ) && function_exists( 'the_field' ) ) {
    	function editorial_wp_nav_menu_objects( $items, $args ) {

	    	foreach ($items as $item) {

	    		$editorial_menu_icon = get_field( 'icon_name', $item );

	    		if ( $editorial_menu_icon ) {
	    			$item->title = '<i class="'. esc_attr( $editorial_menu_icon ) .'"></i> ' . $item->title;
	    		}
	    	}

	    	return $items;
	    }
	    add_filter( 'wp_nav_menu_objects', 'editorial_wp_nav_menu_objects', 10, 2 );
    }

    /*-----------------------------*/
    /* Search Result Highlight */
    /*-----------------------------*/
    function editorial_highlight_search_result( $text ) {
    	if ( is_search() ) {
    		$pattern = '/('. join( '|', explode(' ', get_search_query() ) ) .')/i';
    		$text = preg_replace( $pattern, '<spen class="search-highlight">\0</spen>', $text);
    	}
    	return $text;
    }

    add_filter( 'the_content', 'editorial_highlight_search_result' );
    add_filter( 'the_excerpt', 'editorial_highlight_search_result' );
    add_filter( 'the_title', 'editorial_highlight_search_result' );

    /* REQUIRED FILES */
    if ( class_exists( 'Attachments' ) ) {
    	require_once( 'inc/attachments/functions.php' );
    }
    require_once( 'inc/wp-widgets.php' );
    require_once( 'inc/wp-customizer.php' );
    require_once( 'inc/tgm.php' );

    /* Add Meta box plugin options */
    if ( class_exists( 'ACF' ) && function_exists( 'the_field' ) ) {
    	require_once( 'inc/acf-metabox.php' );
    }
    
    // Hide ACF Menu
    add_filter( 'acf/settings/show_admin', '__return_false' );





    