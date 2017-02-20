<?php
Redux::setSection( $opt_name, array(
	'id' => 'sec_shop',
	'title' => esc_html__('Shop', 'melinda'),
	'desc' => esc_html__('Change shop templates and configurations.', 'melinda'),
	'icon' => 'el el-shopping-cart',
	'fields' => array(
		array(
			'id' => 'products--layout--sidebars',
			'type' => 'image_select',
			'title' => esc_html__( 'Sidebars in shop', 'melinda' ),
			'subtitle' => esc_html__( 'Select the layout to be used in shop.', 'melinda' ),
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
			'id' => 'products--layout--content_width',
			'type' => 'select',
			'title' => esc_html__('Content container type', 'melinda'),
			'subtitle' => esc_html__('Define container configuration to be used, it can be normal, expanded or compact.', 'melinda'),
			'options' => array(
				'expanded' => esc_html__('Expanded', 'melinda'),
				'normal' => esc_html__('Normal', 'melinda'),
				'compact' => esc_html__('Compact', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'products--per_page',
			'type' => 'text',
			'title' => esc_html__('Products per page', 'melinda'),
			'subtitle' => esc_html__('Define the number of products displayed per page.', 'melinda'),
			'default' => '8',
			'validate' => 'numeric',
		),

		array(
			'id' => 'products--columns',
			'type' => 'slider',
			'title' => esc_html__('Columns', 'melinda'),
			'subtitle' => esc_html__('Define columns number at shop.', 'melinda'),
			'default' => '3',
			'min' => '1',
			'step' => '1',
			'max' => '4',
		),

		array(
			'id' => 'products--catalog_mode',
			'type' => 'switch',
			'title' => esc_html__('Catalog mode', 'melinda'),
			'subtitle' => esc_html__('If on, Add to Cart buttons will not be displayed to users.', 'melinda'),
			'default' => 0,
		),

			array(
				'id' => 'products--catalog_mode_text',
				'type' => 'textarea',
				'title' => esc_html__('Catalog mode text', 'melinda'),
				'subtitle' => esc_html__('What will be displayed instead default Add to Cart button.', 'melinda'),
				'default' => 'Get in <a href="#">touch</a> to more details.',
				'required' => array('products--catalog_mode', '=', 1),
			),

		array(
			'id' => 'products--sorting',
			'type' => 'switch',
			'title' => esc_html__('Sorting options', 'melinda'),
			'subtitle' => esc_html__('If on, the sorting options will be displayed in the shop, this way users can order by price or others.', 'melinda'),
			'default' => 1,
		),

		array(
			'id' => 'products--quick_view',
			'type' => 'switch',
			'title' => esc_html__('Quick view feature', 'melinda'),
			'subtitle' => esc_html__('If on, the quick view feature will be avaliable in shop listing.', 'melinda'),
			'default' => 1,
		),

		array(
			'id' => 'products--top_header_section',
			'type' => 'section',
			'title' => esc_html__('Top header settings at shop', 'melinda'),
			'indent' => true,
		),

			array(
				'id' => 'products--top_header',
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
			'id' => 'products--top_header_section__end',
			'type' => 'section',
			'indent' => false,
		),

		array(
			'id' => 'products--header_section',
			'type' => 'section',
			'title' => esc_html__('Header settings at shop', 'melinda'),
			'indent' => true,
		),

			array(
				'id' => 'products--header--negative_height',
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
				'id' => 'products--header--color_scheme',
				'type' => 'select',
				'title' => esc_html__('Color scheme for header', 'melinda'),
				'options' => array(
					'light' => esc_html__('Light text', 'melinda'),
					'dark' => esc_html__('Dark text', 'melinda'),
				),
				'default' => '',
			),

		array(
			'id' => 'products--header_section__end',
			'type' => 'section',
			'indent' => false,
		),

		array(
			'id' => 'products--title_wrapper_section',
			'type' => 'section',
			'title' => esc_html__('Title wrapper settings at shop', 'melinda'),
			'indent' => true,
		),

			array(
				'id' => 'products--title_wrapper',
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
				'id' => 'products--title_wrapper--desc',
				'type' => 'button_set',
				'title' => esc_html__('Enable description after title?', 'melinda'),
				'options' => array(
					'1' => esc_html__('On', 'melinda'),
					'' => esc_html__('Default', 'melinda'),
					'0' => esc_html__('Off', 'melinda'),
				),
				'default' => '',
			),

			array(
				'id' => 'products--title_wrapper_styles--align',
				'type' => 'button_set',
				'title' => esc_html__('Text align', 'melinda'),
				'options' => array(
					'' => esc_html__('Default', 'melinda'),
					'left' => esc_html__('Left', 'melinda'),
					'center' => esc_html__('Center', 'melinda'),
					'right' => esc_html__('Right', 'melinda'),
				),
				'default' => '',
			),

			array(
				'id' => 'products--title_wrapper_styles--font_breadcrumb',
				'type' => 'typography',
				'title' => esc_html__('Breadcrumb typography', 'melinda'),
				'google' => false,
				'font-family' => false,
				'font-style' => false,
				'font-weight' => false,
				'font-size' => false,
				'line-height' => false,
				'subsets' => true,
				'text-align' => false,
			),

			array(
				'id' => 'products--title_wrapper_styles--font_title',
				'type' => 'typography',
				'title' => esc_html__('Title typography', 'melinda'),
				'google' => false,
				'font-family' => false,
				'font-style' => false,
				'font-weight' => false,
				'font-size' => false,
				'line-height' => false,
				'subsets' => true,
				'text-align' => false,
			),

			array(
				'id' => 'products--title_wrapper_styles--font_desc',
				'type' => 'typography',
				'title' => esc_html__('Description typography', 'melinda'),
				'subtitle' => esc_html__('Typography to optional description used in pages.', 'melinda'),
				'google' => false,
				'font-family' => false,
				'font-style' => false,
				'font-weight' => false,
				'font-size' => false,
				'line-height' => false,
				'subsets' => true,
				'text-align' => false,
			),

			array(
				'id' => 'products--title_wrapper_styles--bg',
				'type' => 'background',
				'title' => esc_html__('Title wrapper background', 'melinda'),
				'subtitle' => esc_html__('Overwrite title wrapper at shop. Background image will be replaced on background pattern if you chose pattern in the next option.', 'melinda'),
			),

			array(
				'id' => 'products--title_wrapper_styles--bg_overlay',
				'type' => 'color_rgba',
				'title' => esc_html__('Title wrapper background overlay', 'melinda'),
				'default' => array(
					'alpha' => 0,
				),
			),

			array(
				'id' => 'products--title_wrapper--category_image_on_bg',
				'type' => 'switch',
				'title' => esc_html__('Category image as title wrapper background', 'melinda'),
				'default' => 0,
			),

		array(
			'id' => 'products--title_wrapper_section__end',
			'type' => 'section',
			'indent' => false,
		),

		array(
			'id' => 'products--content_section',
			'type' => 'section',
			'title' => esc_html__('Content settings at shop', 'melinda'),
			'indent' => true,
		),

			array(
				'id'=>'products--content--dynamic_area__before',
				'type' => 'select',
				'title' => esc_html__('Dynamic area before products', 'melinda'),
				'subtitle' => esc_html__('Select the page which content will be loaded and displayed before products.', 'melinda'),
				'data' => 'pages',
				'default' => '',
			),

			array(
				'id'=>'products--content--dynamic_area__after',
				'type' => 'select',
				'title' => esc_html__('Dynamic area after products', 'melinda'),
				'subtitle' => esc_html__('Select the page which content will be loaded and displayed after products.', 'melinda'),
				'data' => 'pages',
				'default' => '',
			),

			array(
				'id' => 'products--content_styles--padding',
				'type' => 'spacing',
				'mode' => 'padding',
				'title' => esc_html__('Content padding', 'melinda'),
				'right' => false,
				'left' => false,
				'units' => 'px',
			),

		array(
			'id' => 'products--content_section__end',
			'type' => 'section',
			'indent' => false,
		),
	)
) );
