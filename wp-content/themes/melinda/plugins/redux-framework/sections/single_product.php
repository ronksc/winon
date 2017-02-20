<?php
Redux::setSection( $opt_name, array(
	'id' => 'sec_single_product',
	'title' => esc_html__('Single product', 'melinda'),
	'desc' => esc_html__('Change single product templates and configurations.', 'melinda'),
	'icon' => 'el el-shopping-cart-sign',
	'fields' => array(
		array(
			'id' => 'single_product--layout--sidebars',
			'type' => 'image_select',
			'title' => esc_html__( 'Sidebars in single product', 'melinda' ),
			'subtitle' => esc_html__( 'Select the layout to be used in single products.', 'melinda' ),
			'options' => array(
				'' => array(
					'alt' => 'default',
					'img' => get_template_directory_uri() . '/images/sidebars/def.png'
				),
				'without' => array(
					'alt' => 'without sidebar',
					'img' => get_template_directory_uri() . '/images/sidebars/1c.png'
				),
				'left' => array(
					'alt' => 'sidebar at left',
					'img' => get_template_directory_uri() . '/images/sidebars/2cl.png'
				),
				'right' => array(
					'alt' => 'sidebar at right',
					'img' => get_template_directory_uri() . '/images/sidebars/2cr.png'
				),
				'both' => array(
					'alt' => 'both sidebars',
					'img' => get_template_directory_uri() . '/images/sidebars/3cm.png'
				),
				'both_left' => array(
					'alt' => 'both sidebars at left',
					'img' => get_template_directory_uri() . '/images/sidebars/3cl.png'
				),
				'both_right' => array(
					'alt' => 'both sidebars at right',
					'img' => get_template_directory_uri() . '/images/sidebars/3cr.png'
				)
			),
			'default' => '',
		),

		array(
			'id' => 'single_product--breadcrumb',
			'type' => 'switch',
			'title' => esc_html__('Breadcrumb', 'melinda'),
			'subtitle' => esc_html__('If on, breadcrumbs will be displayed at product before title.', 'melinda'),
			'default' => 1,
		),

		array(
			'id' => 'single_product--extra_tab',
			'type' => 'switch',
			'title' => esc_html__('Extra tab', 'melinda'),
			'subtitle' => esc_html__('If on, an additional global tab will be displayed in products tabs.', 'melinda'),
			'default' => 0,
		),

			array(
				'id' => 'single_product--extra_tab_title',
				'type' => 'text',
				'title' => esc_html__('Extra tab title', 'melinda'),
				'subtitle' => esc_html__('Define the extra tab title.', 'melinda'),
				'default' => 'Extra Tab',
				'validate' => 'not_empty',
				'required' => array('single_product--extra_tab', '=', 1),
			),

			array(
				'id' => 'single_product--extra_tab_content',
				'type' => 'editor',
				'title' => esc_html__('Extra tab content', 'melinda'),
				'subtitle' => esc_html__('Define the extra tab content.', 'melinda'),
				'default' => 'Content',
				'validate' => 'not_empty',
				'required' => array('single_product--extra_tab', '=', 1),
			),

		array(
			'id' => 'single_product--share',
			'type' => 'switch',
			'title' => esc_html__('Share', 'melinda'),
			'subtitle' => esc_html__('If on, share icons below product details will be displayed.', 'melinda'),
			'default' => 1,
		),

		array(
			'id' => 'single_product--related_products',
			'type' => 'switch',
			'title' => esc_html__('Related products', 'melinda'),
			'subtitle' => esc_html__('If on, related products will be displayed.', 'melinda'),
			'default' => 1,
		),

			array(
				'id' => 'single_product--related_products_per_page',
				'type' => 'text',
				'title' => esc_html__('Related products per page', 'melinda'),
				'subtitle' => esc_html__('Define the number of related products displayed per page.', 'melinda'),
				'default' => '4',
				'validate' => 'numeric',
				'required' => array('single_product--related_products', '=', 1),
			),

			array(
				'id' => 'single_product--related_products_columns',
				'type' => 'slider',
				'title' => esc_html__('Related products columns', 'melinda'),
				'subtitle' => esc_html__('Define columns number of related products.', 'melinda'),
				'default' => '4',
				'min' => '1',
				'step' => '1',
				'max' => '6',
				'required' => array('single_product--related_products', '=', 1),
			),

		array(
			'id' => 'single_product--header_section',
			'type' => 'section',
			'title' => esc_html__('Header settings at shop', 'melinda'),
			'indent' => true,
		),

			array(
				'id' => 'single_product--header--negative_height',
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
				'id' => 'single_product--header--color_scheme',
				'type' => 'select',
				'title' => esc_html__('Color scheme for header', 'melinda'),
				'options' => array(
					'light' => esc_html__('Light text', 'melinda'),
					'dark' => esc_html__('Dark text', 'melinda'),
				),
				'default' => '',
			),

		array(
			'id' => 'single_product--header_section__end',
			'type' => 'section',
			'indent' => false,
		),
	)
) );
