<?php

function editorial_customizer_theme_options( $wp_customizer ) {
// Getting Custom Posts
$getPosts = array();

// Default option show
$getPosts['default'] = '-- Select Post --';

$args = array( 'post_type' => 'banners' );
$posts = get_posts( $args );
foreach($posts as $post) {
    $getPosts[$post->ID] = $post->post_title;
}

//  =================================
//  = Editorial Theme Options       = 
//  =================================
$wp_customizer->add_panel( 'editorial_options', array(
	'priority'		=> 20,
	'capability'	=> 'edit_theme_options',
	'title'			=> __( 'Editorial Theme Options', 'editorial' ),
	'description'	=> __( 'You can customize according to your needs', 'editorial' )
) ); 

/*-----------------------------------*/
/* Banner Options */
/*-----------------------------------*/
$wp_customizer->add_section( 'editorial_theme_banner_options', array(
	'priority'	=> 10,
	'title'		=> __( 'Banner', 'editorial' ),
	'panel'		=> 'editorial_options'
) );

$wp_customizer->add_setting( 'editorial_banner_section_content', array(
	'default'	=> 'default',
	'transport'	=> 'refresh'
) );
$wp_customizer->add_control( 'editorial_banner_section_content', array(
	'label'		=> __( 'Select Post', 'editorial' ),
	'section'	=> 'editorial_theme_banner_options',
	'setting'	=> 'editorial_banner_section_content',
	'type'		=> 'select',
	'choices'  	=> $getPosts,
) );

/*-----------------------------------*/
/* Social Networks */
/*-----------------------------------*/
$wp_customizer->add_section( 'editorial_social_network_options', array(
	'priority'		=> 20,
	'title'			=> __( 'Social Networks', 'editorial'),
	'description'	=> __( 'Hi, This is a <b>practice</b> theme, so more link options are not included, you can add manually if you want.', 'editorial' ),
	'panel'			=> 'editorial_options'
) );


$wp_customizer->add_setting( 'tw_link', array(
	'default'	=> '',
	'transport'	=> 'refresh'
) );
$wp_customizer->add_control( 'tw_link', array(
	'label'		=> __( 'Twitter', 'editorial' ),
	'section'	=> 'editorial_social_network_options',
	'setting'	=> 'tw_link',
	'type'		=> 'url'
) );

$wp_customizer->add_setting( 'fb_link', array(
	'default'	=> '',
	'transport'	=> 'refresh'
) );
$wp_customizer->add_control( 'fb_link', array(
	'label'		=> __( 'Facebook', 'editorial' ),
	'section'	=> 'editorial_social_network_options',
	'setting'	=> 'fb_link',
	'type'		=> 'url'
) );

$wp_customizer->add_setting( 'snapchat_link', array(
	'default'	=> '',
	'transport'	=> 'refresh'
) );
$wp_customizer->add_control( 'snapchat_link', array(
	'label'		=> __( 'Snapchat', 'editorial' ),
	'section'	=> 'editorial_social_network_options',
	'setting'	=> 'snapchat_link',
	'type'		=> 'url'
) );

$wp_customizer->add_setting( 'ins_link', array(
	'default'	=> '',
	'transport'	=> 'refresh'
) );
$wp_customizer->add_control( 'ins_link', array(
	'label'		=> __( 'Instagram', 'editorial' ),
	'section'	=> 'editorial_social_network_options',
	'setting'	=> 'ins_link',
	'type'		=> 'url'
) );

$wp_customizer->add_setting( 'med_link', array(
	'default'	=> '',
	'transport'	=> 'refresh'
) );
$wp_customizer->add_control( 'med_link', array(
	'label'		=> __( 'Medium', 'editorial' ),
	'section'	=> 'editorial_social_network_options',
	'setting'	=> 'med_link',
	'type'		=> 'url'
) );

}
add_action( 'customize_register', 'editorial_customizer_theme_options' );
?>