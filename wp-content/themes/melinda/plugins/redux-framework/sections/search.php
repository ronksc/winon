<?php
Redux::setSection( $opt_name, array(
	'id' => 'sec_search',
	'title' => esc_html__('Search', 'melinda'),
	'desc' => esc_html__('Change search results template and configurations.', 'melinda'),
	'icon' => 'el el-search',
	'fields' => array(
		array(
			'id' => 'search--post_type',
			'type' => 'button_set',
			'title' => esc_html__('Search in post types', 'melinda'),
			'options' => array(
				'all' => esc_html__('All', 'melinda'),
				'post' => esc_html__('Only in posts', 'melinda'),
				'product' => esc_html__('Only in products', 'melinda'),
				'project' => esc_html__('Only in projects', 'melinda'),
			),
			'default' => 'all',
		),

		array(
			'id' => 'search--layout--sidebars',
			'type' => 'image_select',
			'title' => esc_html__( 'Sidebars in search results', 'melinda' ),
			'subtitle' => esc_html__( 'Select the layout to be used in search results.', 'melinda' ),
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
			'id' => 'search--layout--content_width',
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
			'id' => 'search--columns',
			'type' => 'slider',
			'title' => esc_html__('Columns', 'melinda'),
			'subtitle' => esc_html__('Define columns number at shop.', 'melinda'),
			'default' => '3',
			'min' => '1',
			'step' => '1',
			'max' => '4',
		),

		array(
			'id' => 'search--title_wrapper_section',
			'type' => 'section',
			'title' => esc_html__('Title wrapper settings at search results', 'melinda'),
			'indent' => true,
		),


			array(
				'id' => 'search--title_wrapper_styles--padding',
				'type' => 'spacing',
				'mode' => 'padding',
				'title' => esc_html__('Title wrapper padding', 'melinda'),
				'right' => false,
				'left' => false,
				'units' => 'px',
			),

			array(
				'id' => 'search--title_wrapper_styles--align',
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
			'id' => 'search--title_wrapper_section__end',
			'type' => 'section',
			'indent' => false,
		),
	)
) );