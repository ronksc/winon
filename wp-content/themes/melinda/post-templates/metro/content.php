<?php
/**
 * @package melinda
 */

global $melinda_post_loop;

?>

<?php melinda_post_preview_image(get_theme_option('posts--img_size'), 'post-metro_img'); ?>

<?php get_template_part( 'post-templates/metro/part', 'category' ); ?>

<div class="post-metro_desc-w">
	<div class="post-metro_date"><time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time></div>

	<?php the_title( '<header><h3 class="post-metro_h">', '</h3></header>' ); ?>

	<?php if ($melinda_post_loop % 3 == 2) { ?>
		<div class="post-metro_desc hidden-xxs">
			<?php echo apply_filters( 'the_excerpt', melinda_esc_post_preview(get_the_excerpt()) ); ?>
		</div>
	<?php } ?>
</div>

<?php get_template_part( 'post-templates/metro/part', 'link' ); ?>
