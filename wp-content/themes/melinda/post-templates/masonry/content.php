<?php
/**
 * @package melinda
 */

?>

<?php get_template_part( 'post-templates/masonry/part', 'img' ); ?>

<div class="post-masonry_desc-w">
	<?php get_template_part( 'post-templates/masonry/part', 'category' ); ?>

	<?php get_template_part( 'post-templates/masonry/part', 'header' ); ?>

	<div class="post-masonry_desc">
		<?php echo apply_filters( 'the_content', melinda_esc_post_preview(get_the_content()) ); ?>
	</div>
</div>

<?php get_template_part( 'post-templates/masonry/part', 'meta' ); ?>

<?php get_template_part( 'post-templates/masonry/part', 'link' ); ?>
