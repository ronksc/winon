<?php
/**
 * @package melinda
 */
?>

<?php get_template_part( 'post-templates/grid/part', 'category' ); ?>

<div class="post-grid_desc-w">
	<div class="post-grid_icon">“</div>

	<blockquote class="post-grid_desc"><?php echo apply_filters( 'the_content', melinda_esc_post_preview(get_the_content()) ); ?></blockquote>
</div>

<?php the_title( '<cite class="post-grid_h">', '</cite>' ); ?>

<?php get_template_part( 'post-templates/grid/part', 'meta' ); ?>
