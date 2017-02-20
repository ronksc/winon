<?php
/**
 * @package melinda
 */

$current_post_content = get_the_content('');
$ar_current_post_content = melinda_post_preview_link($current_post_content);

?>

<?php get_template_part( 'post-templates/grid/part', 'category' ); ?>

<div class="post-grid_desc-w">
	<div class="post-grid_icon">
		<span class="icon-link"></span>
	</div>

	<?php get_template_part( 'post-templates/grid/part', 'header' ); ?>

	<div class="post-grid_desc">
		<?php echo esc_url($ar_current_post_content['link']); ?>
	</div>
</div>

<?php get_template_part( 'post-templates/grid/part', 'meta' ); ?>

<a href="<?php echo esc_url($ar_current_post_content['link']); ?>" class="post-grid_lk" rel="bookmark" title="<?php the_title(); ?>"></a>
