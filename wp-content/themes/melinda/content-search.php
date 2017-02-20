<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package melinda
 */

$post_type = get_post_type();

if (has_post_thumbnail()) {
	$attachment_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
}

?>

<div class="search-el">
	<?php if (!empty($attachment_image_src[0])) { ?>
		<div class="search-el_img" style="background-image:url(<?php
			echo esc_url($attachment_image_src[0]);
		?>);"></div>
	<?php } ?>

	<div class="search-el_desc">
		<?php the_title( sprintf( '<h5 class="search-el_h"><a href="%s" rel="bookmark" class="search-el_lk">', esc_url(get_permalink()) ), '</a></h5>' ); ?>

		<div class="search-el_cnt">
			<?php the_excerpt(); ?>
		</div>

		<?php if ($post_type == 'post') { ?>
			<div class="search-el_meta"><?php melinda_search_meta(); ?></div>
		<?php } ?>
	</div>

	<div class="search-el_type">
		<?php if ($post_type == 'post') { ?>
			<span class="icon-paper search-el_type-ic"></span>
			<span class="search-el_type-tx"><?php esc_html_e('Post', 'melinda'); ?></span>
		<?php } elseif ($post_type == 'page') { ?>
			<span class="icon-paper search-el_type-ic"></span>
			<span class="search-el_type-tx"><?php esc_html_e('Page', 'melinda'); ?></span>
		<?php } elseif ($post_type == 'product') { ?>
			<span class="icon-bag search-el_type-ic"></span>
			<span class="search-el_type-tx"><?php esc_html_e('Product', 'woocommerce'); ?></span>
		<?php } elseif ($post_type == 'project') { ?>
			<span class="icon-briefcase search-el_type-ic"></span>
			<span class="search-el_type-tx"><?php esc_html_e('Project', 'melinda'); ?></span>
		<?php } ?>
	</div>
</div>
