<?php
/**
 * @package melinda
 */

global $melinda_post_loop;

$post_format = get_post_format();
$classes = 'post-metro __' . ($post_format ? $post_format : 'standard');

$col_classes = array();
$col_classes[] = 'col-xs-12';

if ($melinda_post_loop == 1) {
	?><div class="col-xs-12 col-md-6 col-lg-3 js--masonry-col"></div><?php
}

if (++$melinda_post_loop % 3 == 2) {
	$col_classes[] = 'col-md-6';
	$classes .= ' __double';
} else {
	$col_classes[] = 'col-md-6 col-lg-3';
}
?>

<div class="<?php echo esc_attr(join(' ', $col_classes)); ?> animate-on-screen js--animate-on-screen">
	<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
		<?php get_template_part( 'post-templates/metro/content', $post_format ); ?>
	</article>
</div>
