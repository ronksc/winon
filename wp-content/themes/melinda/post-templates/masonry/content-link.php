<?php
/**
 * @package melinda
 */

$ar_current_post_content = melinda_post_preview_link(get_the_content(''));

?>

<?php get_template_part( 'post-templates/masonry/part', 'category' ); ?>

<div class="post-masonry_desc-w">
	<div class="post-masonry_icon">
		<span class="icon-link"></span>
	</div>

	<?php get_template_part( 'post-templates/masonry/part', 'header' ); ?>

	<div class="post-masonry_desc">
		<?php echo esc_url($ar_current_post_content['link']); ?>
	</div>
</div>

<?php get_template_part( 'post-templates/masonry/part', 'meta' ); ?>

<a href="<?php echo esc_url($ar_current_post_content['link']); ?>" class="post-masonry_lk" rel="bookmark" title="<?php the_title(); ?>"></a>
