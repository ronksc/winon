<?php
$boxSections[] = array(
	'title' => esc_html__('Footer', 'melinda'),
	'desc' => esc_html__('Change the footer section configuration.', 'melinda'),
	'fields' => array(
		array(
			'id' => 'local_footer',
			'type' => 'button_set',
			'title' => esc_html__('Enable this layout part?', 'melinda'),
			'subtitle' => esc_html__('If on, this layout part will be displayed.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_footer--fixed',
			'type' => 'button_set',
			'title' => esc_html__('Fixed footer', 'melinda'),
			'subtitle' => esc_html__('If on, footer and bottom footer will be fixed at screen bottom on page scroll.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),
	),
);