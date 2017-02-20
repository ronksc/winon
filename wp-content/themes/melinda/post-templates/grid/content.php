<?php
/**
 * @package melinda
 */

$double_width = melinda_post_meta('local_single_post--double_width');

?>

<?php get_template_part( 'post-templates/grid/part', 'img' ); ?>

<?php if ($double_width) { get_template_part( 'post-templates/grid/part', 'category' ); } ?>

<div class="post-grid_desc-w">
	<?php if (!$double_width) { get_template_part( 'post-templates/grid/part', 'category' ); } ?>

	<?php get_template_part( 'post-templates/grid/part', 'header' ); ?>

	<div class="post-grid_desc">
		<?php echo apply_filters( 'the_excerpt', melinda_esc_post_preview(get_the_excerpt()) ); ?>
	</div>
</div>

<?php get_template_part( 'post-templates/grid/part', 'meta' ); ?>

<?php get_template_part( 'post-templates/grid/part', 'link' ); ?>
