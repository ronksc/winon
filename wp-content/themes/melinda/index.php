<?php
/**
 * The main template file.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package melinda
 */

get_header();


$post_type = esc_attr(get_post_type());
$content_width = esc_attr(get_theme_option('layout--content_width'));

if ($post_type == 'post') {


	global $melinda_post_loop;
	$melinda_post_loop = 1;

	$blog_view = get_theme_option('posts--view');

	$classes = array();
	$classes[] = 'row js--masonry';

	if ($blog_view == 'metro' && $content_width == 'expanded') {
		$classes[] = '__expanded';
	}
	?>

	<?php if ($blog_view != 'standard') { ?>
		<div class="<?php echo esc_attr(join(' ', $classes)); ?>">
	<?php } elseif (!get_sidebar_location()) { ?>
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
	<?php } ?>

	<?php if (have_posts()) { ?>

		<?php while (have_posts()) { the_post(); ?>

			<?php get_template_part( 'post-templates/layout', $blog_view ); ?>

		<?php } ?>

	<?php } else { ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php } ?>

	<?php if ($blog_view != 'standard') { ?>
		</div>
		<?php melinda_posts_navigation(); ?>
	<?php } elseif (!get_sidebar_location()) { ?>
				<?php melinda_posts_navigation(); ?>
			</div>
		</div>
	<?php } else { ?>
		<?php melinda_posts_navigation(); ?>
	<?php } ?>


<?php } elseif ($post_type == 'project') { ?>


	<?php if (have_posts()) { ?>

		<?php
		$categories = get_terms('projects_category');
		if (!empty($categories) && !is_wp_error($categories) && !is_tax('projects_category')) {
		?>
			<div class="row">
				<nav class="projects-cat js--masonry-nav __<?php echo esc_attr(get_theme_option('projects--categories_align')); ?>">
					<a href="#projects" data-filter="*" class="projects-cat_lk __active js--masonry-lk"><?php esc_html_e('All', 'melinda'); ?></a>
					<?php foreach ($categories as $category) { ?>
						<a href="#projects" data-filter=".masonry-col, .<?php echo esc_attr($category->slug); ?>" class="projects-cat_lk js--masonry-lk"><?php echo esc_attr($category->name); ?></a>
					<?php } ?>
				</nav>
			</div>
		<?php } ?>

		<div
			id="projects"
			class="
				projects
				row
				js--masonry
				<?php
				if (get_theme_option('projects--closely')) {
					echo ' __closely';
					echo ' __' . $content_width;
				}
				?>
			"
			data-isotope-options='{ "masonry": { "columnWidth": ".js--masonry-col" } }'
		>

			<div class="js--masonry-col masonry-col <?php echo esc_attr(join(' ', get_responsive_column_classes(get_theme_option('projects--columns')))); ?>"></div>

			<?php while (have_posts()) { the_post(); ?>

				<?php get_template_part( 'content', 'project' ); ?>

			<?php } ?>

		</div>

	<?php } else { ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php } ?>


	<?php melinda_posts_navigation('projects'); ?>


<?php } else { ?>


	<?php while (have_posts()) { the_post(); ?>

		<article id="<?php echo $post_type; ?>-<?php the_ID(); ?>" <?php post_class(); ?>>
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


<?php } ?>


<?php get_footer(); ?>
