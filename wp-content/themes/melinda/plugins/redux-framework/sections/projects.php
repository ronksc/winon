<?php
Redux::setSection( $opt_name, array(
	'id' => 'sec_projects',
	'title' => esc_html__('Projects', 'melinda'),
	'desc' => esc_html__('Change projects templates.', 'melinda'),
	'icon' => 'el el-idea',
	'fields' => array(
		array(
			'id' => 'projects--title',
			'type' => 'text',
			'title' => esc_html__('Projects title', 'melinda'),
			'default' => 'Projects',
		),

		array(
			'id' => 'projects--layout--sidebars',
			'type' => 'image_select',
			'title' => esc_html__('Sidebars in projects', 'melinda'),
			'subtitle' => esc_html__('Select the layout to be used in projects.', 'melinda'),
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
			'id' => 'projects--layout--content_width',
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
			'id' => 'projects--categories_align',
			'type' => 'button_set',
			'title' => esc_html__('Categories filter align', 'melinda'),
			'options' => array(
				'left' => esc_html__('Left', 'melinda'),
				'center' => esc_html__('Center', 'melinda'),
				'right' => esc_html__('Right', 'melinda'),
			),
			'default' => 'center',
		),

		array(
			'id' => 'projects--columns',
			'type' => 'slider',
			'title' => esc_html__('Columns', 'melinda'),
			'subtitle' => esc_html__('Define the columns numbers to be used in the projects.', 'melinda'),
			'default' => '3',
			'min' => '1',
			'step' => '1',
			'max' => '4',
		),

		array(
			'id' => 'projects--closely',
			'type' => 'switch',
			'title' => esc_html__('Show projects closely?', 'melinda'),
			'subtitle' => esc_html__('If on, projects will be shown without margins.', 'melinda'),
			'default' => 0,
		),

		array(
			'id' => 'projects--img_size',
			'type' => 'select',
			'title' => esc_html__('Image size', 'melinda'),
			'options' => get_image_size_names(),
			'default' => 'rectangle_medium__crop',
			'validate' => 'not_empty',
		),

		array(
			'id' => 'projects--font_size',
			'type' => 'button_set',
			'title' => esc_html__('Font size', 'melinda'),
			'options' => array(
				'medium' => esc_html__('Medium', 'melinda'),
				'large' => esc_html__('Large', 'melinda'),
			),
			'default' => 'medium',
		),

		array(
			'id' => 'projects--bg_overlay',
			'type' => 'color_rgba',
			'title' => esc_html__('Color to overlay image on hover', 'melinda'),
			'default' => array(
				'alpha' => 0,
			),
		),

		array(
			'id' => 'projects--align',
			'type' => 'button_set',
			'title' => esc_html__('Title align', 'melinda'),
			'options' => array(
				'left' => esc_html__('Left', 'melinda'),
				'center' => esc_html__('Center', 'melinda'),
				'right' => esc_html__('Right', 'melinda'),
			),
			'default' => 'center',
		),

		array(
			'id' => 'projects--animation',
			'type' => 'select',
			'title' => esc_html__('Animation on hover', 'melinda'),
			'options' => array(
				'1' => esc_html__('Simple', 'melinda'),
				'2' => esc_html__('Simple (reverse)', 'melinda'),
				'3' => esc_html__('Blur', 'melinda'),
				'4' => esc_html__('Colorful', 'melinda'),
				'5' => esc_html__('Bordered', 'melinda'),
				'6' => esc_html__('Slice', 'melinda'),
				'7' => esc_html__('Grayscale', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'projects--nav',
			'type' => 'switch',
			'title' => esc_html__('Projects navigation', 'melinda'),
			'subtitle' => esc_html__('If on, navigation will be displayed below projects.', 'melinda'),
			'default' => 1,
		),
	)
) );