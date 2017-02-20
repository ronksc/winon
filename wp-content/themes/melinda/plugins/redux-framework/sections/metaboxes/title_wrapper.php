<?php
$boxSections[] = array(
	'title' => esc_html__('Title wrapper', 'melinda'),
	'desc' => esc_html__('Change the title wrapper section configuration.', 'melinda'),
	'fields' => array(
		array(
			'id' => 'local_title_wrapper',
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
			'id' => 'local_title_wrapper--full_height',
			'type' => 'button_set',
			'title' => esc_html__('Full viewport height', 'melinda'),
			'subtitle' => esc_html__('If on, title wrapper will have same height than viewport/window.', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_title_wrapper--parallax',
			'type' => 'button_set',
			'title' => esc_html__('Parallax', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_title_wrapper--breadcrumb',
			'type' => 'button_set',
			'title' => esc_html__('Breadcrumb', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_title_wrapper--desc',
			'type' => 'button_set',
			'title' => esc_html__('Description after title', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'' => esc_html__('Default', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '',
		),

		array(
			'id' => 'local_title_wrapper--sub_title',
			'type' => 'text',
			'title' => esc_html__('Subtitle', 'melinda'),
			'subtitle' => esc_html__('Subtitle will be displayed above the title.', 'melinda'),
		),

		array(
			'id' => 'local_title_wrapper--desc_text',
			'type' => 'textarea',
			'title' => esc_html__('Description', 'melinda'),
			'subtitle' => esc_html__('You can use a, strong, br, em and strong HTML tags. Use this field to display an optional text below main page title.', 'melinda'),
			'validate' => 'html_custom',
			'allowed_html' => array(
				'a' => array(
					'href' => array(),
					'title' => array(),
					'target' => array(),
				),
				'br' => array(),
				'em' => array(),
				'strong' => array()
			),
		),

		array(
			'id' => 'local_title_wrapper_styles--padding',
			'type' => 'spacing',
			'mode' => 'padding',
			'title' => esc_html__('Title wrapper padding', 'melinda'),
			'right' => false,
			'left' => false,
			'units' => 'px',
		),

		array(
			'id' => 'local_title_wrapper_styles--align',
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
			'id' => 'local_title_wrapper_styles--font_breadcrumb',
			'type' => 'typography',
			'title' => esc_html__('Breadcrumb typography', 'melinda'),
			'google' => true,
			'font-backup' => true,
			'letter-spacing' => true,
			'text-transform' => true,
			'subsets' => true,
			'text-align' => false,
			'all_styles' => true,
		),

		array(
			'id' => 'local_title_wrapper_styles--font_breadcrumb__custom_family',
			'type' => 'text',
			'title' => esc_html__('Breadcrumb typography: custom font family', 'melinda'),
			'subtitle' => esc_html__('You can use here your Typekit fonts.', 'melinda'),
			'default' => '',
			'placeholder' => '"proxima-nova", Arial, Helvetica, sans-serif',
			'validate' => 'no_html',
		),

		array(
			'id' => 'local_title_wrapper_styles--font_title',
			'type' => 'typography',
			'title' => esc_html__('Title typography', 'melinda'),
			'google' => true,
			'font-backup' => true,
			'letter-spacing' => true,
			'text-transform' => true,
			'subsets' => true,
			'text-align' => false,
			'all_styles' => true,
		),

		array(
			'id' => 'local_title_wrapper_styles--font_title__custom_family',
			'type' => 'text',
			'title' => esc_html__('Title typography: custom font family', 'melinda'),
			'subtitle' => esc_html__('You can use here your Typekit fonts.', 'melinda'),
			'default' => '',
			'placeholder' => '"proxima-nova", Arial, Helvetica, sans-serif',
			'validate' => 'no_html',
		),

		array(
			'id' => 'local_title_wrapper_styles--font_desc',
			'type' => 'typography',
			'title' => esc_html__('Description typography', 'melinda'),
			'subtitle' => esc_html__('Typography to optional description used in pages.', 'melinda'),
			'google' => true,
			'font-backup' => true,
			'letter-spacing' => true,
			'text-transform' => true,
			'subsets' => true,
			'text-align' => false,
			'all_styles' => true,
		),

		array(
			'id' => 'local_title_wrapper_styles--font_desc__custom_family',
			'type' => 'text',
			'title' => esc_html__('Description typography: custom font family', 'melinda'),
			'subtitle' => esc_html__('You can use here your Typekit fonts.', 'melinda'),
			'default' => '',
			'placeholder' => '"proxima-nova", Arial, Helvetica, sans-serif',
			'validate' => 'no_html',
		),

		array(
			'id' => 'local_title_wrapper_styles--bg',
			'type' => 'background',
			'title' => esc_html__('Title wrapper background', 'melinda'),
			'subtitle' => esc_html__('Background image will be replaced on background pattern if you chose pattern in the next option.', 'melinda'),
		),

		array(
			'id' => 'local_title_wrapper_styles--bg_overlay',
			'type' => 'color_rgba',
			'title' => esc_html__('Title wrapper background ovarlay', 'melinda'),
			'default' => array(
				'alpha' => 0,
			),
		),

		array(
			'id' => 'local_title_wrapper_styles--bg_overlay_pattern',
			'type' => 'button_set',
			'title' => esc_html__('Enable dotted overlay pattern?', 'melinda'),
			'options' => array(
				'1' => esc_html__('On', 'melinda'),
				'0' => esc_html__('Off', 'melinda'),
			),
			'default' => '0',
		),
	),
);