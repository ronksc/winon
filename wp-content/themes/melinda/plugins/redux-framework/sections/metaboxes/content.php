<?php
$boxSections[] = array(
	'title' => esc_html__('Content', 'melinda'),
	'desc' => esc_html__('Change the content section configuration.', 'melinda'),
	'fields' => array(
		array(
			'id' => 'local_content_styles--padding',
			'type' => 'spacing',
			'mode' => 'padding',
			'title' => esc_html__('Content padding', 'melinda'),
			'right' => false,
			'left' => false,
			'units' => 'px',
		),

		array(
			'id'=>'local_content--dynamic_area__before',
			'type' => 'select',
			'title' => esc_html__('Dynamic area before content', 'melinda'),
			'subtitle' => esc_html__('Select the page which content will be loaded and displayed before content.', 'melinda'),
			'data' => 'pages',
			'default' => '',
		),

		array(
			'id'=>'local_content--dynamic_area__after',
			'type' => 'select',
			'title' => esc_html__('Dynamic area after content', 'melinda'),
			'subtitle' => esc_html__('Select the page which content will be loaded and displayed after content.', 'melinda'),
			'data' => 'pages',
			'default' => '',
		),
	),
);