<?php
Redux::setSection( $opt_name, array(
	'id' => 'sec_single_post',
	'title' => esc_html__('Single post', 'melinda'),
	'desc' => esc_html__('Change single post templates.', 'melinda'),
	'icon' => 'el el-pencil-alt',
	'fields' => array(
		array(
			'id' => 'single_post--layout--sidebars',
			'type' => 'image_select',
			'title' => esc_html__( 'Sidebars in single post', 'melinda' ),
			'subtitle' => esc_html__( 'Select the layout to be used in single post.', 'melinda' ),
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
			'id' => 'single_post--layout--content_width',
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
			'id' => 'single_post--featured_image',
			'type' => 'switch',
			'title' => esc_html__('Featured image', 'melinda'),
			'subtitle' => esc_html__('If on, featured image will be displayed at single post before content.', 'melinda'),
			'default' => 1,
		),

		array(
			'id' => 'single_post--categories',
			'type' => 'switch',
			'title' => esc_html__('Categories', 'melinda'),
			'subtitle' => esc_html__('If on, categories will be displayed.', 'melinda'),
			'default' => 1,
		),

		array(
			'id' => 'single_post--author',
			'type' => 'switch',
			'title' => esc_html__('Author', 'melinda'),
			'subtitle' => esc_html__('If on, the author will be displayed.', 'melinda'),
			'default' => 0,
		),

		array(
			'id' => 'single_post--share',
			'type' => 'switch',
			'title' => esc_html__('Social share', 'melinda'),
			'subtitle' => esc_html__('If on, social share icons will be displayed.', 'melinda'),
			'default' => 1,
		),

		array(
			'id' => 'single_post--tags',
			'type' => 'switch',
			'title' => esc_html__('Tags after content', 'melinda'),
			'subtitle' => esc_html__('If on, the tags will be displayed after post content.', 'melinda'),
			'default' => 1,
		),

		array(
			'id' => 'single_post--nav',
			'type' => 'switch',
			'title' => esc_html__('Post navigation', 'melinda'),
			'subtitle' => esc_html__('If on, navigation will be displayed below content.', 'melinda'),
			'default' => 1,
		),

		array(
			'id' => 'single_post--nav__fixed',
			'type' => 'switch',
			'title' => esc_html__('Fixed post navigation', 'melinda'),
			'subtitle' => esc_html__('If on, navigation will be fixed in the middle of browser window.', 'melinda'),
			'default' => 0,
			'required' => array('single_post--nav', '=', 1),
		),

		array(
			'id' => 'single_post--header_section',
			'type' => 'section',
			'title' => esc_html__('Header settings at single post', 'melinda'),
			'indent' => true,
		),

			array(
				'id' => 'single_post--header--negative_height',
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
				'id' => 'single_post--header--color_scheme',
				'type' => 'select',
				'title' => esc_html__('Color scheme for header', 'melinda'),
				'options' => array(
					'light' => esc_html__('Light text', 'melinda'),
					'dark' => esc_html__('Dark text', 'melinda'),
				),
				'default' => '',
			),

		array(
			'id' => 'single_post--header_section__end',
			'type' => 'section',
			'indent' => false,
		),

		array(
			'id' => 'single_post--title_wrapper_section',
			'type' => 'section',
			'title' => esc_html__('Title wrapper settings at single post', 'melinda'),
			'indent' => true,
		),

			array(
				'id' => 'single_post--title_wrapper',
				'type' => 'button_set',
				'title' => esc_html__('Title wrapper at single post', 'melinda'),
				'subtitle' => esc_html__('If on, title wrapper will be displayed at single post.', 'melinda'),
				'options' => array(
					'1' => esc_html__('On', 'melinda'),
					'' => esc_html__('Default', 'melinda'),
					'0' => esc_html__('Off', 'melinda'),
				),
				'default' => '',
			),

			array(
				'id' => 'single_post--title_wrapper--full_height',
				'type' => 'button_set',
				'title' => esc_html__('Full viewport height at single post', 'melinda'),
				'subtitle' => esc_html__('If on, title wrapper will have same height than viewport/window at single post.', 'melinda'),
				'options' => array(
					'1' => esc_html__('On', 'melinda'),
					'' => esc_html__('Default', 'melinda'),
					'0' => esc_html__('Off', 'melinda'),
				),
				'default' => '',
			),

			array(
				'id' => 'single_post--title_wrapper--parallax',
				'type' => 'button_set',
				'title' => esc_html__('Title wrapper parallax at single post', 'melinda'),
				'options' => array(
					'1' => esc_html__('On', 'melinda'),
					'' => esc_html__('Default', 'melinda'),
					'0' => esc_html__('Off', 'melinda'),
				),
				'default' => '',
			),

			array(
				'id' => 'single_post--title_wrapper--featured_image_on_bg',
				'type' => 'switch',
				'title' => esc_html__('Featured image as title wrapper background', 'melinda'),
				'default' => 0,
			),

			array(
				'id' => 'single_post--title_wrapper_styles--align',
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
				'id' => 'single_post--title_wrapper_styles--font_breadcrumb',
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
				'id' => 'single_post--title_wrapper_styles--font_title',
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
				'id' => 'single_post--title_wrapper_styles--font_desc',
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
				'id' => 'single_post--title_wrapper_styles--bg_overlay',
				'type' => 'color_rgba',
				'title' => esc_html__('Title wrapper background overlay', 'melinda'),
				'default' => array(
					'alpha' => 0,
				),
			),

		array(
			'id' => 'single_post--title_wrapper_section__end',
			'type' => 'section',
			'indent' => false,
		),
	)
) );
