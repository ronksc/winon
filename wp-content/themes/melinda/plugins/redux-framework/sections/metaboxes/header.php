<?php
$boxSections[] = array(
	'title' => esc_html__('Header', 'melinda'),
	'desc' => esc_html__('Change the header section configuration.', 'melinda'),
	'fields' => array(
		array(
			'id' => 'local_header',
			'type' => 'button_set',
			'title' => esc_html__('Enable header?', 'melinda'),
			'subtitle' => esc_html__('If on, this layout part will be displayed in website.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_header--fixed',
			'type' => 'button_set',
			'title' => esc_html__('Fixed header', 'melinda'),
			'subtitle' => esc_html__('If on, the header will be fixed at screen top on page scroll.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_header--negative_height',
			'type' => 'button_set',
			'title' => esc_html__('Negative height', 'melinda'),
			'subtitle' => esc_html__('If on, header and top header will not have height and background and title wrapper or content will be showed behind it.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_header--boxed',
			'type' => 'button_set',
			'title' => esc_html__('Boxed', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_header--layout',
			'type' => 'image_select',
			'title' => esc_html__('Header layout', 'melinda'),
			'options' => array(
				'' => array(
					'alt' => 'default',
					'img' => get_template_directory_uri() . '/images/sidebars/def.png'
				),
				'layout1' => array(
					'alt' => 'Logo - Menu and Modules',
					'img' => get_template_directory_uri() . '/images/header-layouts/1.png'
				),
				'layout2' => array(
					'alt' => 'Additional Menu - Logo - Menu and Modules',
					'img' => get_template_directory_uri() . '/images/header-layouts/2.png'
				),
				'layout3' => array(
					'alt' => 'Logo / Menu and Modules',
					'img' => get_template_directory_uri() . '/images/header-layouts/3.png'
				),
				'layout4' => array(
					'alt' => 'Logo - Menu',
					'img' => get_template_directory_uri() . '/images/header-layouts/4.png'
				),
				'layout5' => array(
					'alt' => 'Additional Menu - Logo - Menu',
					'img' => get_template_directory_uri() . '/images/header-layouts/5.png'
				),
				'layout6' => array(
					'alt' => 'Logo / Menu',
					'img' => get_template_directory_uri() . '/images/header-layouts/6.png'
				),
				'layout7' => array(
					'alt' => 'Logo - Modules and Popup Menu',
					'img' => get_template_directory_uri() . '/images/header-layouts/7.png'
				),
				'layout8' => array(
					'alt' => 'Logo - Popup Menu',
					'img' => get_template_directory_uri() . '/images/header-layouts/8.png'
				),
			),
			'default' => '',
		),

		array(
			'id' => 'local_header--color_scheme',
			'type' => 'select',
			'title' => esc_html__('Color scheme for header', 'melinda'),
			'options' => array(
				'light' => esc_html__('Light text', 'melinda'),
				'dark' => esc_html__('Dark text', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_header--separator',
			'type' => 'button_set',
			'title' => esc_html__('Separator between menu and modules', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_header--mobile_menu',
			'type' => 'button_set',
			'title' => esc_html__('Mobile menu', 'melinda'),
			'subtitle' => esc_html__('If on, a mobile menu link will be displayed on mobile devices (smaller than 768px) and main menu will be hided.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_header--text',
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
				'id' => 'local_header--text_content',
				'type' => 'editor',
				'title' => esc_html__('Text module content', 'melinda'),
				'subtitle' => esc_html__('Place any text or shortcode to be displayed in header. Use &lt;i class="melinda-separator"&gt;&lt;/i&gt; to add a separator in the text. Use &lt;i class="fa fa-home"&gt;&lt;/i&gt; to display Font Awesome icons.', 'melinda'),
				'default' => '',
				'required' => array('local_header--text', '=', 1),
			),

		array(
			'id' => 'local_header--login_ajax',
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
			'id' => 'local_header--wishlist',
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
			'id' => 'local_header--woo_cart',
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
			'id' => 'local_header--search',
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
			'id' => 'local_header--social',
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
			'id' => 'local_header_styles--border',
			'type' => 'border',
			'title' => esc_html__('Header border', 'melinda'),
			'subtitle' => esc_html__('Select a custom border to be applied in the header.', 'melinda'),
			'all' => false,
			'left' => false,
			'right' => false,
			'style' => false,
			'color' => false,
		),

		array(
			'id' => 'local_header_styles--padding',
			'type' => 'spacing',
			'mode' => 'padding',
			'title' => esc_html__('Header padding', 'melinda'),
			'left' => false,
			'right' => false,
			'units' => 'px',
		),

		array(
			'id' => 'local_header_styles--logo_padding',
			'type' => 'spacing',
			'mode' => 'padding',
			'title' => esc_html__('Logo padding', 'melinda'),
			'subtitle' => esc_html__('Select a custom padding to be applied in the logo.', 'melinda'),
			'left' => false,
			'right' => false,
			'units' => 'px',
		),

		array(
			'id' => 'local_header_styles--menu_padding',
			'type' => 'spacing',
			'mode' => 'padding',
			'title' => esc_html__('Menu padding', 'melinda'),
			'subtitle' => esc_html__('Select a custom padding to be applied in the menu.', 'melinda'),
			'left' => false,
			'right' => false,
			'units' => 'px',
		),

		array(
			'id' => 'local_header_styles--mods_padding',
			'type' => 'spacing',
			'mode' => 'padding',
			'title' => esc_html__('Modules padding', 'melinda'),
			'subtitle' => esc_html__('Select a custom padding to be applied in the modules.', 'melinda'),
			'left' => false,
			'right' => false,
			'units' => 'px',
		),

		array(
			'id' => 'local_header_styles--additional_menu_padding',
			'type' => 'spacing',
			'mode' => 'padding',
			'title' => esc_html__('Additional menu padding', 'melinda'),
			'subtitle' => esc_html__('Select a custom padding to be applied in the additional menu.', 'melinda'),
			'left' => false,
			'right' => false,
			'units' => 'px',
		),

		array(
			'id' => 'local_header_styles--font',
			'type' => 'typography',
			'title' => esc_html__('Header typography', 'melinda'),
			'google' => true,
			'font-backup' => true,
			'letter-spacing' => true,
			'text-transform' => true,
			'color' => false,
			'subsets' => true,
			'text-align' => false,
			'all_styles' => true,
		),

		array(
			'id' => 'local_header_styles--font__custom_family',
			'type' => 'text',
			'title' => esc_html__('Header typography: custom font family', 'melinda'),
			'subtitle' => esc_html__('You can use here your Typekit fonts.', 'melinda'),
			'default' => '',
			'placeholder' => '"proxima-nova", Arial, Helvetica, sans-serif',
			'validate' => 'no_html',
		),
	),
);