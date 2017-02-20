<?php
Redux::setSection( $opt_name, array(
	'id' => 'main_sec_footer',
	'title' => esc_html__('Footer', 'melinda'),
	'icon' => 'el el-caret-down',
) );

Redux::setSection( $opt_name, array(
	'id' => 'sec_footer',
	'title' => esc_html__('Footer settings', 'melinda'),
	'subsection' => true,
	'fields' => array(
		array(
			'id' => 'footer',
			'type' => 'switch',
			'title' => esc_html__('Enable this layout part?', 'melinda'),
			'subtitle' => esc_html__('If on, this layout part will be displayed.', 'melinda'),
			'default' => 0,
		),

		array(
			'id' => 'footer--fixed',
			'type' => 'switch',
			'title' => esc_html__('Fixed footer', 'melinda'),
			'subtitle' => esc_html__('If on, footer and bottom footer will be fixed at screen bottom on page scroll.', 'melinda'),
			'default' => 0,
		),

		array(
			'id' => 'footer--col_1',
			'type' => 'slider',
			'title' => esc_html__('#1 column width', 'melinda'),
			'subtitle' => esc_html__('Define column width, max is 12 parts, set as 0 to disable this area.', 'melinda'),
			'default' => '3',
			'min' => '0',
			'step' => '1',
			'max' => '12',
		),

		array(
			'id' => 'footer--col_2',
			'type' => 'slider',
			'title' => esc_html__('#2 column width', 'melinda'),
			'subtitle' => esc_html__('Define column width, max is 12 parts, set as 0 to disable this area.', 'melinda'),
			'default' => '3',
			'min' => '0',
			'step' => '1',
			'max' => '12',
		),

		array(
			'id' => 'footer--col_3',
			'type' => 'slider',
			'title' => esc_html__('#3 column width', 'melinda'),
			'subtitle' => esc_html__('Define column width, max is 12 parts, set as 0 to disable this area.', 'melinda'),
			'default' => '3',
			'min' => '0',
			'step' => '1',
			'max' => '12',
		),

		array(
			'id' => 'footer--col_4',
			'type' => 'slider',
			'title' => esc_html__('#4 column width', 'melinda'),
			'subtitle' => esc_html__('Define column width, max is 12 parts, set as 0 to disable this area.', 'melinda'),
			'default' => '3',
			'min' => '0',
			'step' => '1',
			'max' => '12',
		),

		array(
			'id' => 'footer--col_5',
			'type' => 'slider',
			'title' => esc_html__('#5 column width', 'melinda'),
			'subtitle' => esc_html__('Define column width, max is 12 parts, set as 0 to disable this area.', 'melinda'),
			'default' => '0',
			'min' => '0',
			'step' => '1',
			'max' => '12',
		),

		array(
			'id' => 'footer--col_6',
			'type' => 'slider',
			'title' => esc_html__('#6 column width', 'melinda'),
			'subtitle' => esc_html__('Define column width, max is 12 parts, set as 0 to disable this area.', 'melinda'),
			'default' => '0',
			'min' => '0',
			'step' => '1',
			'max' => '12',
		),
	)
) );

Redux::setSection( $opt_name, array(
	'id' => 'sec_footer_styles',
	'title' => esc_html__('Footer styles', 'melinda'),
	'subsection' => true,
	'fields' => array(
		array(
			'id' => 'footer_styles--border',
			'type' => 'border',
			'title' => esc_html__('Footer border', 'melinda'),
			'subtitle' => esc_html__('Select a custom border to be applied in the footer.', 'melinda'),
			'all' => false,
			'left' => false,
			'right' => false,
		),

		array(
			'id' => 'footer_styles--padding',
			'type' => 'spacing',
			'mode' => 'padding',
			'title' => esc_html__('Footer padding', 'melinda'),
			'right' => false,
			'left' => false,
			'units' => 'px',
		),

		array(
			'id' => 'footer_styles--bg',
			'type' => 'background',
			'title' => esc_html__('Footer background', 'melinda'),
			'subtitle' => esc_html__('Background image will be replaced on background pattern if you chose pattern in the next option.', 'melinda'),
		),

		array(
			'id' => 'footer_styles--patterns',
			'type' => 'select_image',
			'title' => esc_html__('Footer background pattern', 'melinda'),
			'subtitle' => esc_html__('Select a predefined background pattern. It will replace background image in previous option.', 'melinda'),
			'options' => $background_patterns,
			'default' => '',
		),

		array(
			'id' => 'footer_styles--font',
			'type' => 'typography',
			'title' => esc_html__('Footer typography', 'melinda'),
			'google' => true,
			'font-backup' => true,
			'letter-spacing' => true,
			'text-transform' => true,
			'subsets' => true,
			'text-align' => false,
			'all_styles' => true,
		),

		array(
			'id' => 'footer_styles--font__custom_family',
			'type' => 'text',
			'title' => esc_html__('Footer typography: custom font family', 'melinda'),
			'subtitle' => esc_html__('You can use here your Typekit fonts.', 'melinda'),
			'default' => '',
			'placeholder' => '"proxima-nova", Arial, Helvetica, sans-serif',
			'validate' => 'no_html',
		),

		array(
			'id' => 'footer_styles--font_widget',
			'type' => 'typography',
			'title' => esc_html__('Footer widget title typography', 'melinda'),
			'google' => true,
			'font-backup' => true,
			'letter-spacing' => true,
			'text-transform' => true,
			'subsets' => true,
			'text-align' => false,
			'all_styles' => true,
		),

		array(
			'id' => 'footer_styles--font_widget__custom_family',
			'type' => 'text',
			'title' => esc_html__('Footer widget title typography: custom font family', 'melinda'),
			'subtitle' => esc_html__('You can use here your Typekit fonts.', 'melinda'),
			'default' => '',
			'placeholder' => '"proxima-nova", Arial, Helvetica, sans-serif',
			'validate' => 'no_html',
		),
	)
) );