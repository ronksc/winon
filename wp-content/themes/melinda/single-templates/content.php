<?php
/**
 * @package melinda
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if (
		has_post_thumbnail() &&
		get_theme_option('single_post--featured_image') &&
		(!is_title_wrapper() || !get_theme_option('title_wrapper--featured_image_on_bg'))
	) {
		the_post_thumbnail( 'large', array('title' => esc_attr(get_the_title()), 'class' => 'post-single-img') );
	}
	?>

	<?php if (!is_title_wrapper()) { ?>
		<?php get_template_part( 'single-templates/part', 'top' ); ?>
	<?php } ?>

	<div class="post-single-cnt">
		<?php the_content(); ?>
	</div>

	<?php get_template_part( 'single-templates/part', 'bottom' ); ?>
</article>