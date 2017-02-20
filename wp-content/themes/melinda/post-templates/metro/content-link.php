<?php
/**
 * @package melinda
 */

$current_post_content = get_the_content('');
$ar_current_post_content = melinda_post_preview_link($current_post_content);

?>

<?php melinda_post_preview_image(get_theme_option('posts--img_size'), 'post-metro_img'); ?>

<?php get_template_part( 'post-templates/metro/part', 'category' ); ?>

<div class="post-metro_icon">
	<span class="icon-link"></span>
</div>

<div class="post-metro_desc-w">
	<div class="post-metro_desc">
		<?php echo esc_url($ar_current_post_content['link']); ?>
	</div>

	<?php the_title( '<header><h3 class="post-metro_h">', '</h3></header>' ); ?>
</div>

<a href="<?php echo esc_url($ar_current_post_content['link']); ?>" class="post-metro_lk" rel="bookmark" title="<?php the_title(); ?>"></a>
