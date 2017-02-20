<?php
$boxSections[] = array(
	'title' => esc_html__('Posts', 'melinda'),
	'desc' => esc_html__('Change posts templates and configurations.', 'melinda'),
	'fields' => array(
		array(
			'id' => 'local_single_post--double_width',
			'type' => 'switch',
			'title' => esc_html__('Double width on posts list', 'melinda'),
			'default' => 0,
		),

		array(
			'id' => 'local_single_post--featured_image',
			'type' => 'button_set',
			'title' => esc_html__('Featured image', 'melinda'),
			'subtitle' => esc_html__('If on, featured image will be displayed at single post before content.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_single_post--categories',
			'type' => 'button_set',
			'title' => esc_html__('Categories', 'melinda'),
			'subtitle' => esc_html__('If on, categories will be displayed.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_single_post--author',
			'type' => 'button_set',
			'title' => esc_html__('Author', 'melinda'),
			'subtitle' => esc_html__('If on, the author will be displayed in title wrapper.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_single_post--share',
			'type' => 'button_set',
			'title' => esc_html__('Social share', 'melinda'),
			'subtitle' => esc_html__('If on, social share icons will be displayed in title wrapper.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_single_post--tags',
			'type' => 'button_set',
			'title' => esc_html__('Tags after content', 'melinda'),
			'subtitle' => esc_html__('If on, the tags will be displayed after post content.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_single_post--nav',
			'type' => 'button_set',
			'title' => esc_html__('Post navigation', 'melinda'),
			'subtitle' => esc_html__('If on, navigation will be displayed below content.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_single_post--nav__fixed',
			'type' => 'button_set',
			'title' => esc_html__('Fixed post navigation', 'melinda'),
			'subtitle' => esc_html__('If on, navigation will be fixed in the middle of browser window.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),
	)
);