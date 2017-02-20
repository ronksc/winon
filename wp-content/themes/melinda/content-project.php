<?php
/**
 * The template part for displaying projects.
 *
 * @package melinda
 */

// don't load directly
if (!defined('ABSPATH')) die('-1');

$double_width = melinda_post_meta('local_single_project--double_width');
$double_height = melinda_post_meta('local_single_project--double_height');

if (has_post_thumbnail()) {
	$post_thumbnail_id = get_post_thumbnail_id();

	$img = wp_get_attachment_image_src($post_thumbnail_id, get_theme_option('projects--img_size'));
	$img_path = get_attached_file($post_thumbnail_id);
	$img_src = '';

	if ($double_width && !$double_height) {
		$img_src = get_intermediate_size_image_src($img_path, $img[1]*2, $img[2], true);
	} elseif ($double_height && !$double_width) {
		$img_src = get_intermediate_size_image_src($img_path, $img[1], $img[2]*2, true);
	}
	if (!$img_src) {
		$img_src = $img[0];
	}
}

$classes = 'projects-el';
$classes .= ' __' . get_theme_option('projects--font_size');
$animation = get_theme_option('projects--animation');
if ($animation) {
	$classes .= ' __anim __anim_' . $animation;
}
if (get_theme_option('projects--closely')) {
	$classes .= ' __full-width';
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

$col_classes = get_responsive_column_classes(get_theme_option('projects--columns'), false, $double_width);

?>

<div class="
	projects-el-w
	animate-on-screen
	js--animate-on-screen
	<?php echo esc_attr(join(' ', $cat_classes)); ?>
	<?php echo esc_attr(join(' ', $col_classes)); ?>
">
<article id="project-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<div class="projects-el_img-w">
		<?php if (has_post_thumbnail()) { ?>
			<img alt="<?php the_title(); ?>" src="<?php echo esc_url($img_src); ?>" class="projects-el_img">
		<?php } ?>
		<div class="projects-el_img-overlay" style="background-color:<?php
			$bg_overlay = get_theme_option('projects--bg_overlay');
			echo esc_attr($bg_overlay['rgba']);
		?>"></div>

		<?php if (!$animation) { ?>
			<div class="projects-el_icon"><span class="icon-open"></span></div>
		<?php } ?>
	</div>

	<div class="projects-el_cnt text-<?php echo esc_attr(get_theme_option('projects--align')); ?>">
		<?php the_title( sprintf( '<h3 class="projects-el_h"><a href="%s" class="projects-el_lk" rel="bookmark">', esc_url(get_permalink()) ), '</a></h3>' ); ?>

		<div class="projects-el_desc">
			<?php echo wp_kses($categories_html, 'post'); ?>
		</div>
	</div>
	<a href="<?php echo esc_url(get_permalink()); ?>" class="projects-el_bg-lk"></a>
</article>
</div>
