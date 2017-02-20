<?php
$boxSections[] = array(
	'title' => esc_html__('Top header', 'melinda'),
	'desc' => esc_html__('Change the top header section configuration.', 'melinda'),
	'fields' => array(
		array(
			'id' => 'local_top_header',
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
			'id' => 'local_top_header--login_ajax',
			'type' => 'button_set',
			'title' => esc_html__('Login With Ajax', 'melinda'),
			'subtitle' => esc_html__('If on, a Login With Ajax module will be displayed. Requires Login With Ajax plugin activated.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_top_header--wishlist',
			'type' => 'button_set',
			'title' => esc_html__('Wishlist', 'melinda'),
			'subtitle' => esc_html__('If on, a wishlist link will be displayed. Requires YITH Woocommerce Wishlist plugin activated.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_top_header--woo_cart',
			'type' => 'button_set',
			'title' => esc_html__('Woo minicart', 'melinda'),
			'subtitle' => esc_html__('If on, a WooCommerce minicart will be displayed. Requires WooCommerce plugin activated.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_top_header--search',
			'type' => 'button_set',
			'title' => esc_html__('Search', 'melinda'),
			'subtitle' => esc_html__('If on, a search module will be displayed.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_top_header--text',
			'type' => 'button_set',
			'title' => esc_html__('Text module', 'melinda'),
			'subtitle' => esc_html__('If on, a rich text module will be displayed.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

			array(
				'id' => 'local_top_header--text_content',
				'type' => 'editor',
				'title' => esc_html__('Text module content', 'melinda'),
				'subtitle' => esc_html__('Place any text or shortcode to be displayed in top header. Use [iv_separator] to add a separator in the text. Use [iv_icon icon="cogs"] to display Font Awesome icons. Use [iv_flags] to add WPML flags.', 'melinda'),
				'default' => '',
				'required' => array('local_top_header--text', '=', 1),
			),

		array(
			'id' => 'local_top_header--social',
			'type' => 'button_set',
			'title' => esc_html__('Social module', 'melinda'),
			'subtitle' => esc_html__('If on, a social icon module will be displayed.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_top_header_styles--border',
			'type' => 'border',
			'title' => esc_html__('Top header border', 'melinda'),
			'subtitle' => esc_html__('Select a custom border to be applied in the top header.', 'melinda'),
			'all' => false,
			'left' => false,
			'right' => false,
			'style' => false,
			'color' => false,
		),

		array(
			'id' => 'local_top_header_styles--bg',
			'type' => 'background',
			'title' => esc_html__('Top header background', 'melinda'),
			'subtitle' => esc_html__('Background image will be replaced on background pattern if you chose pattern in the next option.', 'melinda'),
		),

		array(
			'id' => 'local_top_header_styles--font',
			'type' => 'typography',
			'title' => esc_html__('Top header typography', 'melinda'),
			'google' => true,
			'font-backup' => true,
			'letter-spacing' => true,
			'text-transform' => true,
			'subsets' => true,
			'text-align' => false,
			'all_styles' => true,
		),

		array(
			'id' => 'local_top_header_styles--font__custom_family',
			'type' => 'text',
			'title' => esc_html__('Top header typography: custom font family', 'melinda'),
			'subtitle' => esc_html__('You can use here your Typekit fonts.', 'melinda'),
			'default' => '',
			'placeholder' => '"proxima-nova", Arial, Helvetica, sans-serif',
			'validate' => 'no_html',
		),
	),
);