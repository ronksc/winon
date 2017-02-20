<?php
/**
 * @package melinda
 */
?>

<?php melinda_post_preview_image(get_theme_option('posts--img_size'), 'post-metro_img'); ?>

<?php get_template_part( 'post-templates/metro/part', 'category' ); ?>

<div class="post-metro_icon">“</div>

<div class="post-metro_desc-w">
	<blockquote class="post-metro_desc"><?php echo apply_filters( 'the_content', melinda_esc_post_preview(get_the_content()) ); ?></blockquote>

	<?php the_title( '<cite class="post-metro_h">', '</cite>' ); ?>
</div>

<?php get_template_part( 'post-templates/metro/part', 'link' ); ?>
