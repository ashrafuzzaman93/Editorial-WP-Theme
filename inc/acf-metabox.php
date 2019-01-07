<?php
	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => 'group_5baef52ccc473',
			'title' => 'Menu Information',
			'fields' => array(
				array(
					'key' => 'field_5baef558dd5ba',
					'label' => 'Icon Name',
					'name' => 'icon_name',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'nav_menu_item',
						'operator' => '==',
						'value' => 'all',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'left',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',
		));

		acf_add_local_field_group(array(
			'key' => 'group_5baf0fb9d3ea3',
			'title' => 'Services Posts Meta',
			'fields' => array(
				array(
					'key' => 'field_5baf0fcf9652c',
					'label' => 'Service Icon Name',
					'name' => 'editorial_service_icon_name',
					'type' => 'text',
					'instructions' => 'This field is only for the service post\'s icon. And you must use the Icon name before the "icon" text. And of course use the Font Awesome v4.7.0 icon.
		<br>ex: <code>fa-diamond, fa-bullseye</code>',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'Icon name',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'services',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'left',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',
		));

		endif;

?>