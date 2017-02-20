<?php
$boxSections[] = array(
	'title' => esc_html__('Single product', 'melinda'),
	'desc' => esc_html__('Change single product templates and configurations.', 'melinda'),
	'fields' => array(
		array(
			'id' => 'local_products--catalog_mode',
			'type' => 'button_set',
			'title' => esc_html__('Enable catalog mode?', 'melinda'),
			'subtitle' => esc_html__('If on, Add to Cart buttons will not be displayed to users.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_single_product--extra_tab',
			'type' => 'button_set',
			'title' => esc_html__('Enable extra tab?', 'melinda'),
			'subtitle' => esc_html__('If on, an additional global tab will be displayed in products tabs.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_single_product--share',
			'type' => 'button_set',
			'title' => esc_html__('Enable share?', 'melinda'),
			'subtitle' => esc_html__('If on, share icons below product details will be displayed.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_single_product--related_products',
			'type' => 'button_set',
			'title' => esc_html__('Enable related products?', 'melinda'),
			'subtitle' => esc_html__('If on, related products will be displayed.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),
	)
);
