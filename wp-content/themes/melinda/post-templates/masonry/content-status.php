<?php
/**
 * @package melinda
 */
?>

<?php get_template_part( 'post-templates/masonry/part', 'category' ); ?>

<div class="post-masonry_desc-w">
	<div class="post-masonry_icon">
		<span class="icon-check"></span>
	</div>

	<blockquote class="post-masonry_desc"><?php echo apply_filters( 'the_content', melinda_esc_post_preview(get_the_content()) ); ?></blockquote>
</div>

<?php get_template_part( 'post-templates/masonry/part', 'meta' ); ?>
