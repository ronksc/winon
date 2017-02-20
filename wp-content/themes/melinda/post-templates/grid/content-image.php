<?php
/**
 * @package melinda
 */
?>

<?php get_template_part( 'post-templates/grid/part', 'img' ); ?>

<?php get_template_part( 'post-templates/grid/part', 'category' ); ?>

<div class="post-grid_desc-w">
	<?php get_template_part( 'post-templates/grid/part', 'header' ); ?>

	<div class="post-grid_desc">
		<?php echo apply_filters( 'the_excerpt', melinda_esc_post_preview(get_the_excerpt()) ); ?>
	</div>
</div>

<?php get_template_part( 'post-templates/grid/part', 'meta' ); ?>

<?php get_template_part( 'post-templates/grid/part', 'link' ); ?>
