<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');

$category_image_on_bg = get_theme_option('title_wrapper--category_image_on_bg');
$subcat_image_src = melinda_wc_get_subcat_image_src();

?>
<div class="
	t-w
	js--t-w
	<?php
	if (get_theme_option('title_wrapper--full_height')) {?> __full-height<?php }
	if (get_theme_option('title_wrapper--parallax')) {?> __parallax<?php }
	if ($category_image_on_bg && $subcat_image_src) {?> __products-subcat<?php }
	?>
">


	<?php if ($category_image_on_bg && $subcat_image_src) { ?>
		<div class="t-w_bg js--t-w-bg"
			style="
				background-image:url(<?php echo esc_url($subcat_image_src); ?>);
				background-position:center;
				background-size:cover;
			"
		></div>
	<?php } else { ?>
		<div class="t-w_bg js--t-w-bg"
		<?php if (is_singular('post') && get_theme_option('title_wrapper--featured_image_on_bg') && has_post_thumbnail()) { ?>
			style="
				background-image:url(<?php
					$attachment_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
					echo esc_url($attachment_image_src[0]);
				?>);
				background-position:center;
				background-size:cover;
			"
		<?php } ?>
		></div>
		<?php if (get_theme_option('title_wrapper_styles--bg_overlay_pattern')) { ?><div class="t-w_bg-overlay-pattern"></div><?php } ?>
	<?php } ?>
	<div class="t-w_bg-overlay" style="background-color:<?php
		$bg_overlay = get_theme_option('title_wrapper_styles--bg_overlay');
		echo esc_attr($bg_overlay['rgba']);
	?>;"></div>


	<div class="js--under-main-h"></div>


	<div class="t-w_cnt js--t-w-cnt">
		<div class="container">
		<?php


		// Single post categories

		if (is_singular('post') && melinda_categorized_blog() && get_theme_option('single_post--categories')) {
			?><div class="t-w-post-category"><?php the_category(' '); ?></div><?php
		}


		// Sub title

		if (get_theme_option('title_wrapper--sub_title')) {
			?><div class="t-w_sub-h"><?php echo esc_attr(get_theme_option('title_wrapper--sub_title')); ?></div><?php
		}


		// Title

		?><h1 class="t-w_h"><?php

		if (is_home() && is_front_page()) {

			bloginfo('name');

		} elseif (is_melinda_shop()) {

			woocommerce_page_title();

		} elseif (is_home()) {

			single_post_title();

		} elseif (is_tax('projects_category')) {

			single_cat_title();

		} elseif (is_archive() && get_post_type() == 'project') {

			echo get_theme_option('projects--title');

		} elseif (is_archive()) {

			the_archive_title();

		} elseif (is_search()) {

			printf( esc_html__( 'Search Results for: %s', 'melinda' ), '<span>' . get_search_query() . '</span>' );

		} elseif (!have_posts()) {

			esc_html_e('Nothing Found', 'melinda');

		} else {

			the_title();

		}

		?></h1><?php


		// Subcategories

		if (is_melinda_shop()) {
			woocommerce_product_subcategories(array('before' => '<div class="t-w_subcat">', 'after' => '</div>'));
		}


		// Description

		if (get_theme_option('title_wrapper--desc') && !is_search()) {

			if (is_melinda_shop()) {

				?><div class="t-w_desc __products"><?php do_action( 'woocommerce_archive_description' ); ?></div><?php

			} elseif (is_archive()) {

				the_archive_description( '<div class="t-w_desc">', '</div>' );

			} elseif (is_singular('post')) {

				?><div class="t-w_desc __post"><div class="t-w-post-meta">

					<span class="t-w-post-meta_date"><time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><span class="icon-clock"></span> <?php echo get_the_date(); ?></time></span>

					<?php if (!post_password_required() && comments_open() && get_comments_number() != 0) { ?>
						<span class="t-w-post-meta_separator"></span>
						<span class="t-w-post-meta_comments js--scroll-nav"><a href="#comments"><span class="icon-speech-bubble"></span> <?php comments_number( esc_html__('No comments', 'melinda'), esc_html__('1 comment', 'melinda'), esc_html__('% comments', 'melinda') ); ?></a></span>
					<?php } ?>

				</div></div><?php

			} elseif (is_home() && get_theme_option('posts--desc') != '') {

				?><div class="t-w_desc"><?php echo wp_kses(get_theme_option('posts--desc'), 'post'); ?></div><?php

			} elseif (get_theme_option('local_title_wrapper--desc_text', false) != '') {

				?><div class="t-w_desc"><?php echo wp_kses(get_theme_option('local_title_wrapper--desc_text', false), 'post'); ?></div><?php

			}

		}


		?>
		</div>
	</div>


	<?php


	// Single post author and share

	if (is_singular('post') && get_theme_option('title_wrapper--full_height')) {

		?><div class="t-w-post-meta-bottom js--scroll-bottom"><div class="container"><div class="row"><?php

			if (get_theme_option('single_post--author')) {
				?><div class="col-sm-5 col-md-4 text-left"><a class="t-w-post-author" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
					<span class="t-w-post-author_img"><?php echo get_avatar(get_the_author_meta('email') , 100); ?></span>
					<span class="t-w-post-author_h">
						<span class="t-w-post-author_sub-h"><?php esc_html_e('Posted by', 'melinda')?></span>
						<span class="t-w-post-author_name"><?php the_author(); ?></span>
					</span>
				</a></div><?php
			}

			if (get_theme_option('single_post--share')) {
				?><div class="col-sm-7 col-md-8 text-right-sm"><?php
					melinda_share_alt();
				?></div><?php
			}

		?></div></div></div><?php

	}


	// Breadcrumb

	if (get_theme_option('title_wrapper--breadcrumb') && !is_search() && !is_singular('post')) {

		if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<nav class="breadcrumb js--scroll-bottom"><div class="container">','</div></nav>');
		} elseif (is_melinda_shop()) {
			woocommerce_breadcrumb(array(
				'wrap_before' => '<nav class="breadcrumb js--scroll-bottom"><div class="container">',
				'wrap_after' => '</div></nav>'
			));
		}

	}
	?>


</div>
