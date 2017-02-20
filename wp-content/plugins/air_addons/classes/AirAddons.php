<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');

class AirAddons {

	/**
	 * Core singleton class
	 * @var self - pattern realization
	 */
	private static $_instance;

	private function __construct()
	{
		// We safely integrate with VC with this hook
		if (!defined('WPB_VC_VERSION')) {
			return;
		}

		add_action( 'init', array( $this, 'integrate_with_vc' ) );

		add_filter( 'vc_autocomplete_air_vc_project_grid_include_callback', array( $this, 'vc_include_field_search' ), 10, 1 );
		add_filter( 'vc_autocomplete_air_vc_project_grid_include_render', array( $this, 'vc_include_field_render' ), 10, 1 );
		add_filter( 'vc_autocomplete_air_vc_project_grid_taxonomies_callback', array( $this, 'vc_autocomplete_projects_categories_field_search' ), 10, 1 );
		add_filter( 'vc_autocomplete_air_vc_project_grid_taxonomies_render', array( $this, 'vc_autocomplete_projects_categories_field_render' ), 10, 1 );

		// Creating a shortcode addon
		add_shortcode( 'air_vc_project_grid', array( $this, 'render_vc_project_grid' ) );
		add_shortcode( 'air_vc_team_member', array( $this, 'render_vc_team_member' ) );
	}

	/**
	 * Get the instane of AirAddons
	 *
	 * @return self
	 */
	public static function getInstance() {
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Cloning disabled
	 */
	private function __clone() {
	}

	/**
	 * Serialization disabled
	 */
	private function __sleep() {
	}

	/**
	 * De-serialization disabled
	 */
	private function __wakeup() {
	}


	public function get_social_links() {
		// don't forget add brand colors
		return array(
			'link'          => '<i class=\'fa fa-lg fa-link\'></i> Custom Link',
			'envelope'      => '<i class=\'fa fa-lg fa-envelope\'></i> Mail',
			'facebook'      => '<i class=\'fa fa-lg fa-facebook\'></i> Facebook',
			'twitter'       => '<i class=\'fa fa-lg fa-twitter\'></i> Twitter',
			'instagram'     => '<i class=\'fa fa-lg fa-instagram\'></i> Instagram',
			'vk'            => '<i class=\'fa fa-lg fa-vk\'></i> VK',
			'pinterest'     => '<i class=\'fa fa-lg fa-pinterest\'></i> Pinterest',
			'linkedin'      => '<i class=\'fa fa-lg fa-linkedin\'></i> LinkedIn',
			'dribbble'      => '<i class=\'fa fa-lg fa-dribbble\'></i> Dribbble',
			'behance'       => '<i class=\'fa fa-lg fa-behance\'></i> Behance',
			'google-plus'   => '<i class=\'fa fa-lg fa-google-plus\'></i> Google+',
			'youtube'       => '<i class=\'fa fa-lg fa-youtube\'></i> YouTube',
			'vimeo-square'  => '<i class=\'fa fa-lg fa-vimeo-square\'></i> Vimeo',
			'flickr'        => '<i class=\'fa fa-lg fa-flickr\'></i> Flickr',
			'tumblr'        => '<i class=\'fa fa-lg fa-tumblr\'></i> Tumblr',
			'foursquare'    => '<i class=\'fa fa-lg fa-foursquare\'></i> FourSquare',
			'wordpress'     => '<i class=\'fa fa-lg fa-wordpress\'></i> WordPress',
			'stumbleupon'   => '<i class=\'fa fa-lg fa-stumbleupon\'></i> StumbleUpon',
			'soundcloud'    => '<i class=\'fa fa-lg fa-soundcloud\'></i> SoundCloud',
			'vine'          => '<i class=\'fa fa-lg fa-vine\'></i> Vine',
			'skype'         => '<i class=\'fa fa-lg fa-skype\'></i> Skype',
			'github'        => '<i class=\'fa fa-lg fa-github\'></i> GitHub',
			'bitbucket'     => '<i class=\'fa fa-lg fa-bitbucket\'></i> Bitbucket',
			'twitch'        => '<i class=\'fa fa-lg fa-twitch\'></i> Twitch',
			'weibo'         => '<i class=\'fa fa-lg fa-weibo\'></i> Weibo',
			'tencent-weibo' => '<i class=\'fa fa-lg fa-tencent-weibo\'></i> Tecent Weibo',
			'renren'        => '<i class=\'fa fa-lg fa-renren\'></i> RenRen',
			'xing'          => '<i class=\'fa fa-lg fa-xing\'></i> Xing',
		);
	}


	public function vc_include_field_search( $search_string ) {
		$query = $search_string;
		$data = array();
		$args = array(
			's' => $query,
			'post_type' => 'project',
		);
		$args['vc_search_by_title_only'] = true;
		$args['numberposts'] = - 1;
		if ( 0 === strlen( $args['s'] ) ) {
			unset( $args['s'] );
		}
		add_filter( 'posts_search', 'vc_search_by_title_only', 500, 2 );
		$posts = get_posts( $args );
		if ( is_array( $posts ) && ! empty( $posts ) ) {
			foreach ( $posts as $post ) {
				$data[] = array(
					'value' => $post->ID,
					'label' => $post->post_title,
					'group' => $post->post_type,
				);
			}
		}

		return $data;
	}


	public function vc_include_field_render( $value ) {
		$post = get_post( $value['value'] );

		return is_null( $post ) ? false : array(
			'value' => $post->ID,
			'label' => $post->post_title,
			'group' => $post->post_type,
		);
	}


	public function vc_autocomplete_projects_categories_field_search( $search_string ) {
		$data = array();
		$projects_categories = get_terms( 'projects_category', array(
			'hide_empty' => false,
			'search' => $search_string,
		) );
		if ( ! empty( $projects_categories ) && ! is_wp_error( $projects_categories ) ){
			foreach ( $projects_categories as $project_category ) {
				if ( is_object( $project_category ) ) {
					$data[] = array(
						'label'    => $project_category->name,
						'value'    => $project_category->term_id,
						'group_id' => $project_category->taxonomy,
					);
				}
			}
		}

		return $data;
	}


	public function vc_autocomplete_projects_categories_field_render( $term ) {
		$terms = get_terms( 'projects_category', array(
			'include' => array( $term['value'] ),
			'hide_empty' => false,
		) );
		$data = false;
		if ( is_array( $terms ) && 1 === count( $terms ) ) {
			$term = $terms[0];
			$data = vc_get_term_object( $term );
		}

		return $data;
	}


	public function integrate_with_vc() {
		/*
		Add your Visual Composer logic here.
		Lets call vc_map function to "register" our custom shortcode within Visual Composer interface.

		More info: http://kb.wpbakery.com/index.php?title=Vc_map
		*/

		$size_names = array_flip(get_image_size_names());

		vc_map( array(
			'name' => esc_html__('Project Grid', 'air_addons'),
			'base' => 'air_vc_project_grid',
			'icon' => 'icon-wpb-application-icon-large',
			'content_element' => true,
			'category' => 'Air Addons',
			'description' => esc_html__('Posts, pages or custom posts in grid', 'air_addons'),
			'params' => array(
				array(
					'type' => 'checkbox',
					'heading' => esc_html__('List of IDs', 'air_addons'),
					'param_name' => 'ids',
					'value' => array( esc_html__('Yes', 'air_addons') => 'yes' ),
				),
				array(
					'type' => 'autocomplete',
					'heading' => __( 'Include only', 'air_addons' ),
					'param_name' => 'include',
					'description' => __( 'Add projects by title.', 'air_addons' ),
					'settings' => array(
						'multiple' => true,
						'sortable' => true,
						'groups' => true,
					),
					'dependency' => array(
						'element' => 'ids',
						'value' => array( 'yes' ),
					),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__('Show filter', 'air_addons'),
					'param_name' => 'filter',
					'value' => array( esc_html__('Yes', 'air_addons') => 'yes' ),
					'description' => esc_html__('Append filter to grid.', 'air_addons'),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Alignment', 'air_addons'),
					'param_name' => 'filter_align',
					'value' => array(
						esc_html__('Center', 'air_addons') => 'center',
						esc_html__('Left', 'air_addons') => 'left',
						esc_html__('Right', 'air_addons') => 'right',
					),
					'std' => 'center',
					'dependency' => array(
						'element' => 'filter',
						'value' => array( 'yes' ),
					),
					'description' => esc_html__('Select filter alignment.', 'air_addons'),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__('Light text for filter', 'air_addons'),
					'param_name' => 'light_text_filter',
					'value' => array( esc_html__('Yes', 'air_addons') => 'yes' ),
				),
				array(
					'type' => 'autocomplete',
					'heading' => esc_html__('Narrow data source', 'air_addons'),
					'param_name' => 'taxonomies',
					'settings' => array(
						'multiple' => true,
						'min_length' => 1,
						'groups' => true,
						'unique_values' => true,
						'display_inline' => true,
						'delay' => 500,
						'auto_focus' => true,
					),
					'param_holder_class' => 'vc_not-for-custom',
					'description' => esc_html__( 'Enter categories, tags or custom taxonomies.', 'air_addons' ),
					'dependency' => array(
						'element' => 'ids',
						'value_not_equal_to' => array( 'yes' ),
					),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Total items', 'air_addons'),
					'param_name' => 'items',
					'value' => 9,
					'description' => esc_html__('Set max limit for items in grid or enter -1 to display all.', 'air_addons'),
					'dependency' => array(
						'element' => 'ids',
						'value_not_equal_to' => array( 'yes' ),
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Grid columns', 'air_addons'),
					'param_name' => 'items_columns',
					'value' => array(
						'4 columns' => 4,
						'3 columns' => 3,
						'2 columns' => 2,
						'1 column' => 1,
					),
					'std' => 3,
					'description' => esc_html__('Select number of single grid columns.', 'air_addons'),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Gap', 'air_addons'),
					'param_name' => 'gap',
					'value' => array(
						'0px' => 0,
						'2px' => 1,
						'4px' => 2,
						'10px' => 5,
						'20px' => 10,
						'30px' => 15,
					),
					'std' => 15,
					'description' => esc_html__('Select gap between grid columns.', 'air_addons'),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__('Use expanded grid columns on big screens', 'air_addons'),
					'param_name' => 'items_expanded_columns',
					'value' => array( esc_html__('Yes', 'air_addons') => 'yes' ),
					'description' => esc_html__('2 to 3, 3 to 4, 4 to 6 columns on big screes.', 'air_addons'),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__('Use double height and double width view', 'air_addons'),
					'param_name' => 'double',
					'value' => array( esc_html__('Yes', 'air_addons') => 'yes' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Image size', 'air_addons'),
					'param_name' => 'img_size',
					'value' => $size_names,
					'dependency' => array(
						'not_empty' => true,
					),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__('Large font size', 'air_addons'),
					'param_name' => 'large_font_size',
					'value' => array( esc_html__('Yes', 'air_addons') => 'yes' ),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Color to overlay image on hover', 'air_addons'),
					'param_name' => 'img_overlay',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Title align', 'air_addons'),
					'param_name' => 'title_align',
					'value' => array(
						esc_html__('Left', 'air_addons') => 'left',
						esc_html__('Center', 'air_addons') => 'center',
						esc_html__('Right', 'air_addons') => 'right',
					),
					'std' => 'center',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Animation on hover', 'air_addons'),
					'param_name' => 'animation',
					'value' => array(
						'No' => '',
						'Simple' => '1',
						'Simple (reverse)' => '2',
						'Blur' => '3',
						'Colorful' => '4',
						'Bordered' => '5',
						'Slice' => '6',
						'Grayscale' => '7',
					),
					'std' => '',
				),
				array(
					'type' => 'vc_grid_id',
					'param_name' => 'grid_id',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Extra class name', 'air_addons'),
					'param_name' => 'ex_class',
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'air_addons'),
				),
				array(
					'type' => 'css_editor',
					'heading' => esc_html__('CSS box', 'air_addons'),
					'param_name' => 'css',
					'group' => esc_html__('Design Options', 'air_addons'),
				),
			),
		) );

		vc_map( array(
			'name' => esc_html__('Team Member', 'air_addons'),
			'base' => 'air_vc_team_member',
			'content_element' => true,
			'category' => 'Air Addons',
			'description' => esc_html__('Display a team member with effects, description and social icons', 'air_addons'),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Name', 'air_addons'),
					'param_name' => 'title',
					'admin_label' => true,
					'description' => esc_html__('Type your team member name.', 'air_addons'),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Job Title', 'air_addons'),
					'param_name' => 'job',
					'description' => esc_html__('Type your team member job title, e.g. Manager.', 'air_addons'),
				),
				array(
					'type' => 'attach_image',
					'heading' => esc_html__('Photo', 'air_addons'),
					'param_name' => 'img',
					'value' => '',
					'description' => esc_html__('Upload or select a photo from media gallery.', 'air_addons'),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Photo size', 'air_addons'),
					'param_name' => 'img_size',
					'value' => $size_names,
					'dependency' => array(
						'element' => 'img',
						'not_empty' => true,
					),
				),
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__('Description', 'air_addons'),
					'param_name' => 'content',
					'value' => '',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Text Position', 'air_addons'),
					'param_name' => 'txt_position',
					'value' => array(
						esc_html__('Text and social links after photo', 'air_addons') => '',
						esc_html__('Text and social links on second slide (on hover)', 'air_addons') => '__card __anim_1',
						esc_html__('Text on first slide, social links on second (on hover)', 'air_addons') => '__card __anim_2',
					),
					'std' => '',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Text Vertical Alignment', 'air_addons'),
					'param_name' => 'txt_vertical_align',
					'value' => array(
						esc_html__('Top', 'air_addons') => '__top',
						esc_html__('Middle', 'air_addons') => '__middle',
						esc_html__('Bottom', 'air_addons') => '__bottom',
					),
					'std' => '__middle',
					'dependency' => array(
						'element' => 'txt_position',
						'not_empty' => true,
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Text Alignment', 'air_addons'),
					'param_name' => 'txt_align',
					'value' => array(
						esc_html__('Center', 'air_addons') => 'text-center',
						esc_html__('Left', 'air_addons') => 'text-left',
						esc_html__('Right', 'air_addons') => 'text-right',
					),
					'std' => 'text-center',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Color scheme', 'air_addons'),
					'param_name' => 'color_scheme',
					'value' => array(
						esc_html__('Light', 'air_addons') => '__light',
						esc_html__('Dark', 'air_addons') => '__dark',
					),
					'std' => '__light',
					'dependency' => array(
						'element' => 'txt_position',
						'is_empty' => true,
					),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__('Boxed', 'air_addons'),
					'param_name' => 'boxed',
					'value' => array( esc_html__('Yes', 'air_addons') => '__boxed' ),
					'dependency' => array(
						'element' => 'txt_position',
						'is_empty' => true,
					),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__('Scale photo on hover', 'air_addons'),
					'param_name' => 'img_scale',
					'value' => array( esc_html__('Yes', 'air_addons') => '__scale' ),
					'dependency' => array(
						'element' => 'txt_position',
						'not_empty' => true,
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Filter for photo on hover', 'air_addons'),
					'param_name' => 'img_filter',
					'value' => array(
						'Disable' => '',
						'Grayscale (color to gray)' => '__gray',
						'Grayscale (gray to color)' => '__color',
					),
					'std' => '',
					'dependency' => array(
						'element' => 'txt_position',
						'not_empty' => true,
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Overlay', 'air_addons'),
					'param_name' => 'img_overlay',
					'value' => array(
						esc_html__('Disable', 'air_addons') => '',
						esc_html__('First Slide', 'air_addons') => '__overlay',
						esc_html__('Second Slide (on hover)', 'air_addons') => '__on-hover',
						esc_html__('Both Slides', 'air_addons') => '__both',
						esc_html__('Gradient On First Slide', 'air_addons') => '__gradient',
						esc_html__('Gradient On Second Slide (on hover)', 'air_addons') => '__gradient-on-hover',
						esc_html__('Gradient On Both Slides', 'air_addons') => '__gradient-both',
					),
					'std' => '',
					'dependency' => array(
						'element' => 'txt_position',
						'not_empty' => true,
					),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Overlay Color', 'air_addons'),
					'param_name' => 'img_overlay_color',
					'dependency' => array(
						'element' => 'img_overlay',
						'not_empty' => true,
					),
				),
				array(
					'type' => 'vc_grid_id',
					'param_name' => 'grid_id',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Extra class name', 'air_addons'),
					'param_name' => 'ex_class',
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'air_addons'),
				),
				array(
					'type' => 'css_editor',
					'heading' => esc_html__('CSS box', 'air_addons'),
					'param_name' => 'css',
					'group' => esc_html__('Design Options', 'air_addons'),
				),
			),
		) );

		$social_links = $this->$this->get_social_links();
		$air_vc_social_links = array();
		$air_vc_social_links[] = array(
			'type' => 'checkbox',
			'heading' => esc_html__('Use brand colors', 'air_addons'),
			'param_name' => 'brand_colors',
			'group' => esc_html__('Social links', 'air_addons'),
		);
		foreach ($social_links as $id => $icon_and_name) {
			$air_vc_social_links[] = array(
				'type' => 'textfield',
				'heading' => $icon_and_name,
				'param_name' => $id,
				'group' => esc_html__('Social links', 'air_addons'),
			);
		}
		vc_add_params( 'air_vc_team_member', $air_vc_social_links );
	}

	/*
	Shortcode logic how it should be rendered
	*/
	public function render_vc_project_grid($atts, $content = null) {
		$atts = shortcode_atts( array(
			'ids' => false,
			'include' => '',
			'filter' => false,
			'filter_align' => 'center',
			'light_text_filter' => false,
			'taxonomies' => '',
			'items' => 9,
			'items_columns' => 3,
			'items_expanded_columns' => false,
			'gap' => 15,
			'double' => false,
			'img_size' => 'full',
			'large_font_size' => false,
			'img_overlay' => '',
			'title_align' => 'center',
			'animation' => false,
			'grid_id' => false,
			'ex_class' => false,
			'css' => false,
		), $atts );

		if ($atts['ids']) {
			$args = array(
				'post_type' => 'project',
				'post__in'  => explode(", ", $atts['include']),
			);
		} else {
			$args = array(
				'post_type' => 'project',
				'posts_per_page' => $atts['items'],
				'post_status' => 'publish',
				'tax_query' => !$atts['taxonomies'] ?  array() : array(
					array(
						'taxonomy' => 'projects_category',
						'field'    => 'term_id',
						'terms'    => explode(", ", $atts['taxonomies']),
					),
				),
			);
		}

		$projects = new WP_Query($args);

		if ($projects->have_posts()) {
			ob_start();
			include '../templates/project_grid.php';
			$output = ob_get_contents();
			ob_get_clean();

			wp_reset_postdata();

			return $output;
		}
	}

	public function render_vc_team_member($atts, $content = null) {
		$social_links = $this->get_social_links();
		$default_social_links = array();
		foreach ($social_links as $id => $icon_and_name) {
			$default_social_links[$id] = '';
		}

		$default_atts = array_merge( array(
			'title' => '',
			'job' => '',
			'img' => '',
			'img_size' => 'full',
			'color_scheme' => '__light',
			'boxed' => '',
			'txt_position' => '',
			'txt_vertical_align' => '__middle',
			'txt_align' => 'text-center',
			'img_scale' => '',
			'img_filter' => '',
			'img_overlay' => '',
			'img_overlay_color' => '',
			'grid_id' => false,
			'ex_class' => false,
			'css' => false,
			'brand_colors' => false,
		), $default_social_links );

		$atts = shortcode_atts( $default_atts, $atts );

		ob_start();
		include '../templates/team_member.php';
		$output = ob_get_contents();
		ob_get_clean();

		return $output;
	}

	/*
	Load plugin css and javascript files which you may need on front end of your site
	*/
	// public function loadCssAndJs() {
	// 	If you need any css files on front end, here is how you can load them.
	// 	wp_register_style( 'vc_extend_style', plugins_url('assets/vc_extend.css', __FILE__) );
	// 	wp_enqueue_style( 'vc_extend_style' );

	// 	If you need any javascript files on front end, here is how you can load them.
	// 	wp_enqueue_script( 'vc_extend_js', plugins_url('assets/vc_extend.js', __FILE__), array('jquery') );
	// }

}

AirAddons::getInstance();
