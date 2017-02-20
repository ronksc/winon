<?php
/**
 * @package melinda
 */
?>

<?php get_template_part( 'post-templates/grid/part', 'category' ); ?>

<div class="post-grid_desc-w">
	<div class="post-grid_icon">
		<span class="icon-check"></span>
	</div>

	<blockquote class="post-grid_desc"><?php echo apply_filters( 'the_content', melinda_esc_post_preview(get_the_content()) ); ?></blockquote>
</div>

<?php get_template_part( 'post-templates/grid/part', 'meta' ); ?>
