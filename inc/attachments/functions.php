<?php 

define( 'ATTACHMENTS_SETTINGS_SCREEN', false ); // disable the Settings screen
add_filter( 'attachments_default_instance', '__return_false' ); // disable the default instance

// Create Custom Instances
function editorial_post_gallery( $attachments ) {
	$fields = array(
		array(
			'name'      => 'title',                         // unique field name
			'type'      => 'text',                          // registered field type
			'label'     => __( 'Title', 'editorial' ),    // label to display
			'default'   => 'title',                         // default value upon selection
		)
	);
	$args = array(

		// title of the meta box (string)
	    'label'         => 'Gallery Images',

	    // all post types to utilize (string|array)
	    'post_type'     => array( 'post' ),

	    // meta box position (string) (normal, side or advanced)
	    'position'      => 'normal',

	    // meta box priority (string) (high, default, low, core)
	    'priority'      => 'high',

	    // allowed file type(s) (array) (image|video|text|audio|application)
	    'filetype'      => array( 'image' ),  // no filetype limit

	    // include a note within the meta box (string)
	    // 'note'          => 'Attach files here!',

	    // by default new Attachments will be appended to the list
	    // but you can have then prepend if you set this to false
	    'append'        => true,

	    // text for 'Attach' button in meta box (string)
	    'button_text'   => __( 'Add Images', 'editorial' ),

	    // text for modal 'Attach' button (string)
	    'modal_text'    => __( 'Add Images', 'editorial' ),

	    // which tab should be the default in the modal (string) (browse|upload)
	    'router'        => 'browse',

	    // whether Attachments should set 'Uploaded to' (if not already set)
		'post_parent'   => false,

	    // fields array
	    'fields'        => $fields,
	);
	$attachments->register( 'editorial_galler_images', $args ); // unique instance name
}
add_action( 'attachments_register', 'editorial_post_gallery' );