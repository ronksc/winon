<?php
/**
 * @package melinda
 */
?>

<?php
$post_format = get_post_format();
$classes = 'post-masonry __' . ($post_format ? $post_format : 'standard');
$content_width = get_theme_option('layout--content_width');
$sidebar_location = get_sidebar_location();

if ($content_width == 'expanded') {
	if ($sidebar_location) {
		$col_classes = 'col-xs-12 col-md-6 col-xl-4 col-xxxl-3';
	} else {
		$col_classes = 'col-xs-12 col-sm-6 col-md-4 col-xl-3 col-xxxl-2';
	}
} elseif ($content_width == 'normal') {
	if ($sidebar_location) {
		$col_classes = 'col-xs-12 col-md-6';
	} else {
		$col_classes = 'col-xs-12 col-sm-6 col-md-4';
	}
} else {
	$col_classes = 'col-xs-12 col-sm-6';
}
?>

<div class="<?php echo esc_attr($col_classes); ?> animate-on-screen js--animate-on-screen">
	<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
		<?php get_template_part( 'post-templates/masonry/content', $post_format ); ?>
	</article>
</div>