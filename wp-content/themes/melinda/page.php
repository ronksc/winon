<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package melinda
 */

get_header(); ?>

	<?php while (have_posts()) { the_post(); ?>

		<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
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
		if ((comments_open() || get_comments_number()) && get_theme_option('general--page_comments')) {
			comments_template();
		}
		?>

	<?php } // end of the loop. ?>

<?php get_footer(); ?>
