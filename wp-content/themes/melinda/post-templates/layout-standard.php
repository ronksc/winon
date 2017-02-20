<?php
/**
 * @package melinda
 */

$post_format = get_post_format();
$classes = 'post-standard __' . ($post_format ? $post_format : 'standard');

if (get_theme_option('posts--img') && has_post_thumbnail()) {
	$classes .= ' __with-img';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<?php get_template_part( 'post-templates/standard/content', $post_format ); ?>
</article>
