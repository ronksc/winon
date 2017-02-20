<?php
/**
 * The template for displaying all single posts and attachments.
 *
 * @package melinda
 */

get_header();

$classes = '';
$sidebar_location = get_sidebar_location();

if (!$sidebar_location) {
	$classes .= ' __without-sidebar';
}
?>

	<div class="post-single-w <?php echo esc_attr($classes); ?>">
		<?php if (!$sidebar_location) { ?>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
		<?php } ?>

		<?php while (have_posts()) { the_post(); ?>

			<?php get_template_part( 'single-templates/content', get_post_format() ); ?>

			<?php
			if (comments_open() || get_comments_number()) {
				comments_template();
			}
			?>

			<?php
			if (get_theme_option('single_post--nav')) {
				melinda_post_navigation(get_theme_option('single_post--nav__fixed'));
			}
			?>

		<?php } // end of the loop. ?>

		<?php if (!$sidebar_location) { ?>
				</div>
			</div>
		<?php } ?>
	</div>

<?php get_footer(); ?>
