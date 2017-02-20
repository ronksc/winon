<?php
$boxSections[] = array(
	'title' => esc_html__('Projects', 'melinda'),
	'desc' => esc_html__('Change projects templates and configurations.', 'melinda'),
	'fields' => array(
		array(
			'id' => 'local_single_project--double_width',
			'type' => 'switch',
			'title' => esc_html__('Double width on projects list', 'melinda'),
			'default' => 0,
		),

		array(
			'id' => 'local_single_project--double_height',
			'type' => 'switch',
			'title' => esc_html__('Double height on projects list', 'melinda'),
			'default' => 0,
		),

		array(
			'id' => 'local_single_project--nav',
			'type' => 'button_set',
			'title' => esc_html__('Single project navigation', 'melinda'),
			'subtitle' => esc_html__('If on, navigation will be displayed below content.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_single_project--nav__fixed',
			'type' => 'button_set',
			'title' => esc_html__('Fixed single project navigation', 'melinda'),
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