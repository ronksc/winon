<?php
$boxSections[] = array(
	'title' => esc_html__('Menus', 'melinda'),
	'desc' => esc_html__('Replace the menus to be displayed in the avaliable areas.', 'melinda'),
	'fields' => array(
		array(
			'id' => 'local_menu--top_header',
			'type' => 'select',
			'title' => esc_html__('Top header menu', 'melinda'),
			'desc' => esc_html__('Select a menu to overwrite the top header menu location.', 'melinda'),
			'data' => 'menus',
			'default' => '',
		),

		array(
			'id' => 'local_menu--main',
			'type' => 'select',
			'title' => esc_html__('Main menu', 'melinda'),
			'desc' => esc_html__('Select a menu to overwrite the header menu location.', 'melinda'),
			'data' => 'menus',
			'default' => '',
		),

		array(
			'id' => 'local_menu--additional',
			'type' => 'select',
			'title' => esc_html__('Additional header menu', 'melinda'),
			'desc' => esc_html__('Select a menu to overwrite the additional header menu location.', 'melinda'),
			'data' => 'menus',
			'default' => '',
		),

		array(
			'id' => 'local_menu--popup',
			'type' => 'select',
			'title' => esc_html__('Popup/Mobile menu', 'melinda'),
			'desc' => esc_html__('Select a menu to overwrite the popup menu location.', 'melinda'),
			'data' => 'menus',
			'default' => '',
		),

		array(
			'id' => 'local_menu--bottom_footer',
			'type' => 'select',
			'title' => esc_html__('Bottom footer menu', 'melinda'),
			'desc' => esc_html__('Select a menu to overwrite the bottom footer menu location.', 'melinda'),
			'data' => 'menus',
			'default' => '',
		),
	),
);