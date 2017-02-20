<?php
/**
 * The template for displaying all single projects.
 *
 * @package melinda
 */

get_header(); ?>

	<div class="project-single-w">

		<?php while (have_posts()) { the_post(); ?>

			<article id="project-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_content(); ?>

				<?php
				wp_link_pages( array(
					'before'      => '<nav class="post-pagination">',
					'after'       => '</nav>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
				?>
			</article>

			<?php
			if (get_theme_option('single_project--nav')) {
				melinda_post_navigation(get_theme_option('single_project--nav__fixed'));
			}
			?>

		<?php } // end of the loop. ?>

	</div>

<?php get_footer(); ?>
