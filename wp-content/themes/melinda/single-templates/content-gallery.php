<?php
/**
 * @package melinda
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	$current_post_content = get_the_content();
	$current_post_content = melinda_post_preview_gallery($current_post_content);
	?>

	<?php if (!is_title_wrapper()) { ?>
		<?php get_template_part( 'single-templates/part', 'top' ); ?>
	<?php } ?>

	<div class="post-single-cnt">
		<?php echo apply_filters( 'the_content', $current_post_content ); ?>
	</div>

	<?php get_template_part( 'single-templates/part', 'bottom' ); ?>
</article>