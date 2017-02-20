<?php
Redux::setSection( $opt_name, array(
	'id' => 'main_sec_header',
	'title' => esc_html__('Header', 'melinda'),
	'icon' => 'el el-caret-up',
) );

Redux::setSection( $opt_name, array(
	'id' => 'sec_header',
	'title' => esc_html__('Header settings', 'melinda'),
	'subsection' => true,
	'fields' => array(
		array(
			'id' => 'header',
			'type' => 'switch',
			'title' => esc_html__('Enable header?', 'melinda'),
			'subtitle' => esc_html__('If on, this layout part will be displayed in website.', 'melinda'),
			'default' => 1,
		),

		array(
			'id' => 'header--fixed',
			'type' => 'switch',
			'title' => esc_html__('Fixed header', 'melinda'),
			'subtitle' => esc_html__('If on, the header will be fixed at screen top on page scroll.', 'melinda'),
			'default' => 1,
		),

		array(
			'id' => 'header--negative_height',
			'type' => 'switch',
			'title' => esc_html__('Negative height', 'melinda'),
			'subtitle' => esc_html__('If on, header and top header will not have height and background and title wrapper or content will be showed behind it.', 'melinda'),
			'default' => 1,
		),

		array(
			'id' => 'header--boxed',
			'type' => 'switch',
			'title' => esc_html__('Boxed', 'melinda'),
			'default' => 0,
		),

		array(
			'id' => 'header--layout',
			'type' => 'image_select',
			'title' => esc_html__('Header layout', 'melinda'),
			'options' => array(
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
			'default' => 'layout1',
		),

		array(
			'id' => 'header--logo_dark',
			'type' => 'media',
			'title' => esc_html__('Logo (dark)', 'melinda'),
			'subtitle' => esc_html__('Upload a dark version of logo used in light backgrounds in the header.', 'melinda'),
			'url' => true,
		),

			array(
				'id' => 'header--logo_dark_retina',
				'type' => 'media',
				'title' => esc_html__('Logo retina (dark)', 'melinda'),
				'subtitle' => esc_html__('Optional retina version displayed in devices with retina display (high resolution display).', 'melinda'),
				'desc' => esc_html__('The same logo image but with twice dimensions, e.g. your logo is 100x100, then your retina logo must be 200x200.', 'melinda'),
				'url' => true,
				'required' => array('header--logo_dark', '!=', null),
			),

		array(
			'id' => 'header--logo_light',
			'type' => 'media',
			'title' => esc_html__('Logo (light)', 'melinda'),
			'subtitle' => esc_html__('Upload a light version of logo used in dark backgrounds in the header.', 'melinda'),
			'url' => true,
		),

			array(
				'id' => 'header--logo_light_retina',
				'type' => 'media',
				'title' => esc_html__('Logo retina (light)', 'melinda'),
				'subtitle' => esc_html__('Optional retina version displayed in devices with retina display (high resolution display).', 'melinda'),
				'desc' => esc_html__('The same logo image but with twice dimensions, e.g. your logo is 100x100, then your retina logo must be 200x200.', 'melinda'),
				'url' => true,
				'required' => array('header--logo_light', '!=', null),
			),

		array(
			'id' => 'header--color_scheme',
			'type' => 'select',
			'title' => esc_html__('Color scheme for header', 'melinda'),
			'options' => array(
				'light' => esc_html__('Light text', 'melinda'),
				'dark' => esc_html__('Dark text', 'melinda'),
			),
			'default' => 'light',
			'validate' => 'not_empty',
		),

		array(
			'id' => 'header--separator',
			'type' => 'switch',
			'title' => esc_html__('Separator between menu and modules', 'melinda'),
			'default' => 0,
		),

		array(
			'id' => 'header--mobile_menu',
			'type' => 'switch',
			'title' => esc_html__('Mobile menu', 'melinda'),
			'subtitle' => esc_html__('If on, a mobile menu link will be displayed on mobile devices (smaller than 768px) and main menu will be hided.', 'melinda'),
			'default' => 1,
		),

		array(
			'id' => 'header--text',
			'type' => 'switch',
			'title' => esc_html__('Text module', 'melinda'),
			'subtitle' => esc_html__('If on, a rich text module will be displayed.', 'melinda'),
			'default' => 0,
		),

			array(
				'id' => 'header--text_content',
				'type' => 'editor',
				'title' => esc_html__('Text module content', 'melinda'),
				'subtitle' => esc_html__('Place any text or shortcode to be displayed in header. Use &lt;i class="melinda-separator"&gt;&lt;/i&gt; to add a separator in the text. Use &lt;i class="fa fa-home"&gt;&lt;/i&gt; to display Font Awesome icons.', 'melinda'),
				'default' => '9854-888-021, New York, NY',
				'required' => array('header--text', '=', 1),
			),

		array(
			'id' => 'header--login_ajax',
			'type' => 'switch',
			'title' => esc_html__('Login With Ajax module', 'melinda'),
			'subtitle' => esc_html__('If on, a Login With Ajax module will be displayed. Requires Login With Ajax plugin activated.', 'melinda'),
			'default' => 1,
		),

		array(
			'id' => 'header--wishlist',
			'type' => 'switch',
			'title' => esc_html__('Wishlist module', 'melinda'),
			'subtitle' => esc_html__('If on, a wishlist link will be displayed. Requires YITH Woocommerce Wishlist plugin activated.', 'melinda'),
			'default' => 1,
		),

		array(
			'id' => 'header--woo_cart',
			'type' => 'switch',
			'title' => esc_html__('Minicart', 'melinda'),
			'subtitle' => esc_html__('If on, a WooCommerce minicart will be displayed. Requires WooCommerce plugin activated.', 'melinda'),
			'default' => 1,
		),

		array(
			'id' => 'header--search',
			'type' => 'switch',
			'title' => esc_html__('Search module', 'melinda'),
			'subtitle' => esc_html__('If on, a search module will be displayed.', 'melinda'),
			'default' => 1,
		),

		array(
			'id' => 'header--social',
			'type' => 'switch',
			'title' => esc_html__('Social module', 'melinda'),
			'subtitle' => esc_html__('If on, a social icon module will be displayed.', 'melinda'),
			'default' => 0,
		),

			array(
				'id' => 'header--social_links',
				'type' => 'sortable',
				'mode' => 'checkbox',
				'title' => esc_html__('Social links', 'melinda'),
				'subtitle' => esc_html__('Enable social links to be displayed.', 'melinda'),
				'options' => get_social_links(),
				'required' => array('header--social', '=', 1),
			),

		array(
			'id' => 'header--wpml_mods_section',
			'type' => 'section',
			'title' => esc_html__('WPML modules', 'melinda'),
			'indent' => true,
		),

			array(
				'id' => 'header--wpml_lang',
				'type' => 'switch',
				'title' => esc_html__('WPML language flags', 'melinda'),
				'subtitle' => esc_html__('If on, the avaliable languages flags will be displayed. Only works with WPML activated.', 'melinda'),
				'default' => 0,
			),

			array(
				'id' => 'header--wpml_currency',
				'type' => 'switch',
				'title' => esc_html__('WPML shop currencies', 'melinda'),
				'subtitle' => esc_html__('If on, the avaliable currencies flags will be displayed. Only works with WPML + WooCommerce Multilingual activated.', 'melinda'),
				'default' => 0,
			),

		array(
			'id' => 'header--wpml_mods_section__end',
			'type' => 'section',
			'indent' => false,
		),
	)
) );

Redux::setSection( $opt_name, array(
	'id' => 'sec_header_styles',
	'title' => esc_html__('Header styles', 'melinda'),
	'subsection' => true,
	'fields' => array(
		array(
			'id' => 'header_styles--border',
			'type' => 'border',
			'title' => esc_html__('Header border', 'melinda'),
			'subtitle' => esc_html__('Select a custom border to be applied in the header.', 'melinda'),
			'all' => false,
			'left' => false,
			'right' => false,
			'color' => false,
		),

		array(
			'id' => 'header_styles--border_color',
			'type' => 'color_rgba',
			'title' => esc_html__('Header border color', 'melinda'),
			'subtitle' => esc_html__('Select a custom border color to be applied in the header.', 'melinda'),
			'default' => array(
				'alpha' => 0,
			),
		),

		array(
			'id' => 'header_styles--padding',
			'type' => 'spacing',
			'mode' => 'padding',
			'title' => esc_html__('Header padding', 'melinda'),
			'left' => false,
			'right' => false,
			'units' => 'px',
		),

		array(
			'id' => 'header_styles--logo_padding',
			'type' => 'spacing',
			'mode' => 'padding',
			'title' => esc_html__('Logo padding', 'melinda'),
			'subtitle' => esc_html__('Select a custom padding to be applied in the logo.', 'melinda'),
			'left' => false,
			'right' => false,
			'units' => 'px',
		),

		array(
			'id' => 'header_styles--menu_padding',
			'type' => 'spacing',
			'mode' => 'padding',
			'title' => esc_html__('Menu padding', 'melinda'),
			'subtitle' => esc_html__('Select a custom padding to be applied in the menu.', 'melinda'),
			'left' => false,
			'right' => false,
			'units' => 'px',
		),

		array(
			'id' => 'header_styles--mods_padding',
			'type' => 'spacing',
			'mode' => 'padding',
			'title' => esc_html__('Modules padding', 'melinda'),
			'subtitle' => esc_html__('Select a custom padding to be applied in the modules.', 'melinda'),
			'left' => false,
			'right' => false,
			'units' => 'px',
		),

		array(
			'id' => 'header_styles--additional_menu_padding',
			'type' => 'spacing',
			'mode' => 'padding',
			'title' => esc_html__('Additional menu padding', 'melinda'),
			'subtitle' => esc_html__('Select a custom padding to be applied in the additional menu.', 'melinda'),
			'left' => false,
			'right' => false,
			'units' => 'px',
		),

		array(
			'id' => 'header_styles--font',
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
			'id' => 'header_styles--font__custom_family',
			'type' => 'text',
			'title' => esc_html__('Header typography: custom font family', 'melinda'),
			'subtitle' => esc_html__('You can use here your Typekit fonts.', 'melinda'),
			'default' => '',
			'placeholder' => '"proxima-nova", Arial, Helvetica, sans-serif',
			'validate' => 'no_html',
		),
	)
) );
