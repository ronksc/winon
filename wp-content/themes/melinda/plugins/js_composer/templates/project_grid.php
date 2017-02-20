<?php
/**
 * @package melinda
 */

// don't load directly
if (!defined('ABSPATH')) die('-1');

$css = $atts['css'] ? $atts['css'] : '';
$ex_class = $atts['ex_class'] ? ' ' . str_replace('.', '', $atts['ex_class']) : '';

$container_classes = vc_shortcode_custom_css_class($css, ' ') . $ex_class;

$grid_id = esc_attr(str_replace(':', '_', $atts['grid_id']));

$columns = absint($atts['items_columns']);

$gap = absint($atts['gap']);

$expanded = $atts['items_expanded_columns'] && get_theme_option('layout--content_width') == 'expanded' ? true : false;

?>

<div class="vc_clearfix"><div class="vc_clearfix wpb_content_element<?php echo esc_attr($container_classes); ?>">

	<?php
	$categories = get_terms('projects_category');
	if ($atts['filter'] && !empty($categories) && !is_wp_error($categories)) {
	?>
		<nav class="projects-cat js--masonry-nav __<?php echo esc_attr($atts['filter_align']); ?>">
			<a
				href="#<?php echo $grid_id; ?>"
				data-filter="*"
				class="
					projects-cat_lk
					__active
					js--masonry-lk
					<?php if ($atts['light_text_filter']) { echo '__light'; } ?>
				"
			><?php esc_html_e('All', 'melinda'); ?></a>
			<?php foreach ($categories as $category) { ?>
				<a
					href="#<?php echo $grid_id; ?>"
					data-filter=".masonry-col, .<?php echo esc_attr($category->slug); ?>"
					class="
						projects-cat_lk
						js--masonry-lk
						<?php if ($atts['light_text_filter']) { echo '__light'; } ?>
					"
				><?php echo esc_attr($category->name); ?></a>
			<?php } ?>
		</nav>
	<?php } ?>

	<div
		id="<?php echo $grid_id; ?>"
		class="projects row js--masonry"
		style="margin-right:-<?php echo $gap; ?>px;margin-left:-<?php echo $gap; ?>px;"
		data-isotope-options='{ "masonry": { "columnWidth": ".js--masonry-col" } }'
	>
		<div class="js--masonry-col masonry-col <?php echo esc_attr(join(' ', get_responsive_column_classes($columns, false, false, $expanded, false))); ?>"></div>
		<?php
		while ($projects->have_posts()) { $projects->the_post();

			$double_width = false;
			$double_height = false;
			if ($atts['double']) {
				$double_width = melinda_post_meta('local_single_project--double_width');
				$double_height = melinda_post_meta('local_single_project--double_height');
			}

			if (has_post_thumbnail()) {

				$post_thumbnail_id = get_post_thumbnail_id();

				$img = wp_get_attachment_image_src($post_thumbnail_id, $atts['img_size']);
				$img_path = get_attached_file($post_thumbnail_id);
				$img_src = '';

				if ($double_width && !$double_height) {
					$img_src = get_intermediate_size_image_src($img_path, $img[1], $img[2]/2, true);
				} elseif ($double_height && !$double_width) {
					$img_src = get_intermediate_size_image_src($img_path, $img[1]/2, $img[2], true);
				}
				if (!$img_src) {
					$img_src = $img[0];
				}
			}

			$classes = 'projects-el';
			if ($atts['animation']) {
				$classes .= ' __anim __anim_' . $atts['animation'];
			}
			if ($atts['large_font_size']) {
				$classes .= ' __large';
			}

			$cat_classes = array();
			$categories_html = '';

			$categories = get_the_terms(get_the_ID(), 'projects_category');

			if (!empty($categories) && !is_wp_error($categories)) {

				$ar_categories = array();

				foreach ($categories as $category) {
					$cat_classes[] = $category->slug;
					$ar_categories[] = $category->name;
				}

				$categories_html = '<div class="projects-el_cat">';
				$categories_html .= join(", ", $ar_categories);
				$categories_html .= '</div>';
			}

			?>
			<div
				class="
					projects-el-w
					animate-on-screen
					js--animate-on-screen
					<?php echo esc_attr(join(' ', $cat_classes)); ?>
					<?php echo esc_attr(join(' ', get_responsive_column_classes($columns, false, $double_width, $expanded, false))); ?>
				"
				style="padding-right:<?php echo $gap; ?>px;padding-left:<?php echo $gap; ?>px;"
			>
			<article id="project-<?php the_ID(); ?>" <?php post_class( $classes ); ?> style="margin-bottom:<?php echo 2*$gap; ?>px;">
				<div class="projects-el_img-w">
					<?php if (has_post_thumbnail()) { ?>
						<img alt="<?php the_title(); ?>" src="<?php echo esc_url($img_src); ?>" class="projects-el_img">
					<?php } ?>
					<div class="projects-el_img-overlay" style="background-color:<?php echo esc_attr($atts['img_overlay']); ?>"></div>

					<?php if (!$atts['animation']) { ?>
						<div class="projects-el_icon"><span class="icon-open"></span></div>
					<?php } ?>
				</div>

				<div class="projects-el_cnt text-<?php echo esc_attr($atts['title_align']); ?>">
					<?php the_title( sprintf( '<h3 class="projects-el_h"><a href="%s" class="projects-el_lk" rel="bookmark">', esc_url(get_permalink()) ), '</a></h3>' ); ?>

					<div class="projects-el_desc">
						<?php echo wp_kses($categories_html, 'post'); ?>
					</div>
				</div>
				<a href="<?php echo esc_url(get_permalink()); ?>" class="projects-el_bg-lk"></a>
			</article>
			</div>
		<?php } ?>
	</div>

</div></div>
