<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');

class AirProjects {

	/**
	 * Core singleton class
	 * @var self - pattern realization
	 */
	private static $_instance;

	private function __construct()
	{
		add_action('init', array($this, 'register_custom_post_types'), 1);
		add_action('init', array($this, 'register_custom_taxonomy'), 1);
		add_action('load-options-permalink.php', array($this, 'project_permalinks'), 1);
	}

	/**
	 * Get the instane of AirProjects
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


	public function register_custom_post_types() {
		register_post_type(
			'project',
			array(
				'labels' => array(
					'name'               => _x( 'Projects', 'Project Type General Name', 'air_addons' ),
					'singular_name'      => _x( 'Project', 'Project Type Singular Name', 'air_addons' ),
					'menu_name'          => esc_html__( 'Projects', 'air_addons' ),
					'name_admin_bar'     => esc_html__( 'Projects', 'air_addons' ),
					'parent_item_colon'  => esc_html__( 'Parent Project:', 'air_addons' ),
					'all_items'          => esc_html__( 'All Projects', 'air_addons' ),
					'add_new_item'       => esc_html__( 'Add New Project', 'air_addons' ),
					'add_new'            => esc_html__( 'Add New', 'air_addons' ),
					'new_item'           => esc_html__( 'New Project', 'air_addons' ),
					'edit_item'          => esc_html__( 'Edit Project', 'air_addons' ),
					'update_item'        => esc_html__( 'Update Project', 'air_addons' ),
					'view_item'          => esc_html__( 'View Project', 'air_addons' ),
					'search_items'       => esc_html__( 'Search Project', 'air_addons' ),
					'not_found'          => esc_html__( 'Not found', 'air_addons' ),
					'not_found_in_trash' => esc_html__( 'Not found in Trash', 'air_addons' ),
				),
				'public' => true,
				'menu_position' => 20,
				'menu_icon' => 'dashicons-portfolio',
				'hierarchical' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => get_option('project_base')),
				'supports' => array(
					'title',
					'editor',
					'thumbnail',
					'page-attributes',
				),
				'taxonomies' => array('projects_category'),
			)
		);
	}

	public function register_custom_taxonomy() {
		register_taxonomy(
			'projects_category',
			'project',
			array(
				'labels' => array(
					'name'                       => _x( 'Project Categories', 'Project Categories General Name', 'air_addons' ),
					'singular_name'              => _x( 'Project Category', 'Project Category Singular Name', 'air_addons' ),
					'menu_name'                  => esc_html__( 'Categories', 'air_addons' ),
					'all_items'                  => esc_html__( 'All Categories', 'air_addons' ),
					'parent_item'                => esc_html__( 'Parent Category', 'air_addons' ),
					'parent_item_colon'          => esc_html__( 'Parent Category:', 'air_addons' ),
					'new_item_name'              => esc_html__( 'New Category Name', 'air_addons' ),
					'add_new_item'               => esc_html__( 'Add New Category', 'air_addons' ),
					'edit_item'                  => esc_html__( 'Edit Category', 'air_addons' ),
					'update_item'                => esc_html__( 'Update Category', 'air_addons' ),
					'view_item'                  => esc_html__( 'View Category', 'air_addons' ),
					'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'air_addons' ),
					'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'air_addons' ),
					'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'air_addons' ),
					'popular_items'              => esc_html__( 'Popular Categories', 'air_addons' ),
					'search_items'               => esc_html__( 'Search Categories', 'air_addons' ),
					'not_found'                  => esc_html__( 'Not Found', 'air_addons' ),
				),
				'public' => true,
				'hierarchical' => true,
				'rewrite' => array('slug' => get_option('projects_category_base')),
			)
		);
	}

	public function project_permalinks() {
		if (isset($_POST['projects_category_base'])) {
			update_option('projects_category_base', sanitize_title_with_dashes($_POST['projects_category_base']));
		}

		add_settings_field('projects_category_base', esc_html__('Projects category base', 'air_addons'), array($this, 'projects_category_base_callback'), 'permalink', 'optional');

		if (isset($_POST['project_base'])) {
			update_option('project_base', sanitize_title_with_dashes($_POST['project_base']));
		}

		add_settings_field('project_base', esc_html__('Projects base', 'air_addons'), array($this, 'project_base_callback'), 'permalink', 'optional');
	}

	public function projects_category_base_callback() {
		$value = get_option('projects_category_base');
		echo '<input type="text" value="' . esc_attr($value) . '" name="projects_category_base" id="projects_category_base" class="regular-text" placeholder="projects_category">';
	}

	public function project_base_callback() {
		$value = get_option('project_base');
		echo '<input type="text" value="' . esc_attr($value) . '" name="project_base" id="project_base" class="regular-text" placeholder="project">';
	}

}

AirProjects::getInstance();
