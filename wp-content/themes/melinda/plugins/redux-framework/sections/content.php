<?php
Redux::setSection( $opt_name, array(
	'id' => 'main_sec_content',
	'title' => esc_html__('Content', 'melinda'),
	'icon' => 'el el-align-left',
) );

Redux::setSection( $opt_name, array(
	'id' => 'sec_content',
	'title' => esc_html__('Content settings', 'melinda'),
	'subsection' => true,
	'fields' => array(
		array(
			'id'=>'content--dynamic_area__before',
			'type' => 'select',
			'title' => esc_html__('Dynamic area before content', 'melinda'),
			'subtitle' => esc_html__('Select the page which content will be loaded and displayed before content.', 'melinda'),
			'data' => 'pages',
			'default' => '',
		),

		array(
			'id'=>'content--dynamic_area__after',
			'type' => 'select',
			'title' => esc_html__('Dynamic area after content', 'melinda'),
			'subtitle' => esc_html__('Select the page which content will be loaded and displayed after content.', 'melinda'),
			'data' => 'pages',
			'default' => '',
		),
	)
) );

Redux::setSection( $opt_name, array(
	'id' => 'sec_content_styles',
	'title' => esc_html__('Content styles', 'melinda'),
	'subsection' => true,
	'fields' => array(
		array(
			'id' => 'content_styles--border',
			'type' => 'border',
			'title' => esc_html__('Content border', 'melinda'),
			'subtitle' => esc_html__('Select a custom border to be applied in the content.', 'melinda'),
			'all' => false,
			'left' => false,
			'right' => false,
		),

		array(
			'id' => 'content_styles--padding',
			'type' => 'spacing',
			'mode' => 'padding',
			'title' => esc_html__('Content padding', 'melinda'),
			'right' => false,
			'left' => false,
			'units' => 'px',
		),
	)
) );