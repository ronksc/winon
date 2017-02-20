<?php
$boxSections[] = array(
	'title' => esc_html__('Bottom footer', 'melinda'),
	'desc' => esc_html__('Change the bottom footer section configuration.', 'melinda'),
	'fields' => array(
		array(
			'id' => 'local_bottom_footer',
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
	),
);