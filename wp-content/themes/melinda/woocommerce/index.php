<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');

function is_melinda_shop() {
	if (function_exists('is_woocommerce')) {
			return is_woocommerce();
	}
	return false;
}

function is_melinda_cart() {
	if (function_exists('is_cart')) {
		return is_cart();
	}
	return false;
}

function is_melinda_checkout() {
	if (function_exists('is_checkout')) {
		return is_checkout();
	}
	return false;
}

function is_melinda_product_category() {
	if (function_exists('is_product_category')) {
		return is_product_category();
	}
	return false;
}


// Subcategory image
function melinda_wc_get_subcat_image_src() {
	if (is_melinda_product_category()) {
		global $wp_query;
		$category = $wp_query->get_queried_object();
		$thumbnail_id = get_woocommerce_term_meta($category->term_id, 'thumbnail_id', true);
		if ($thumbnail_id) {
			$image_src = wp_get_attachment_url($thumbnail_id);
			if ($image_src) {
				// Prevent esc_url from breaking spaces in urls for image embeds
				// Ref: http://core.trac.wordpress.org/ticket/23605
				$image_src = str_replace(' ', '%20', $image_src);
				return esc_url($image_src);
			}
		}
	}
	return false;
}


if (class_exists('woocommerce')) {

	add_filter( 'woocommerce_enqueue_styles', '__return_false' );

	add_action('woocommerce_share', 'melinda_share', 10);


	// Breadcrumb
	add_filter('woocommerce_breadcrumb_defaults', 'melinda_woocommerce_breadcrumb_defaults');
	function melinda_woocommerce_breadcrumb_defaults($args) {
		$args['delimiter'] = ' > ';
		$args['wrap_before'] = '<nav class="breadcrumb" itemprop="breadcrumb">';
		$args['wrap_after'] = '</nav>';
		return $args;
	}

	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

	if (get_theme_option('single_product--breadcrumb')) {
		add_action( 'woocommerce_before_single_product', 'melinda_breadcrumb', 15 );
		function melinda_breadcrumb() {
			if (function_exists('yoast_breadcrumb')) {
				yoast_breadcrumb('<nav class="breadcrumb" itemprop="breadcrumb">','</nav>');
			} else {
				woocommerce_breadcrumb();
			}
		}
	}


	// Products
	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return ' . get_theme_option('products--per_page') . ';' ), 20 );

	if (!get_theme_option('products--sorting')) {
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
	}

	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	add_action( 'woocommerce_shop_loop_item_title', 'melinda_template_loop_product_title', 10 );
	function melinda_template_loop_product_title() {
		echo get_the_title();
	}

	remove_action( 'woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10 );
	remove_action( 'woocommerce_after_subcategory', 'woocommerce_template_loop_category_link_close', 10 );

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );
	remove_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10 );
	add_action( 'woocommerce_review_after_comment_text', 'woocommerce_review_display_rating', 25 );

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	add_action( 'woocommerce_after_single_product_summary', 'woocommerce_template_single_meta', 10 );

	if (!get_theme_option('single_product--share')) {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
	}

	if (!get_theme_option('single_product--related_products')) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	}

	if (get_theme_option('products--catalog_mode')) {
		remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

		remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
		add_action('woocommerce_single_product_summary', 'catalog_mode_text', 30);
		function catalog_mode_text() {
			echo wp_kses(get_theme_option('products--catalog_mode_text'), 'post');
		}
	}


	// Products per page
	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return ' . get_theme_option('products--per_page') . ';' ), 20 );


	// Products columns
	add_filter('loop_shop_columns', 'melinda_loop_shop_columns');
	function melinda_loop_shop_columns() {
		return get_theme_option('products--columns');
	}


	// Related products
	add_filter( 'woocommerce_output_related_products_args', 'melinda_related_products_args' );
	function melinda_related_products_args( $args ) {
		$args['posts_per_page'] = get_theme_option('single_product--related_products_per_page');
		$args['columns'] = get_theme_option('single_product--related_products_columns');
		return $args;
	}


	// Quick view
	if(get_theme_option('products--quick_view')) {
		add_action('woocommerce_after_shop_loop_item', 'melinda_wc_quick_view_btn', 1);
		function melinda_wc_quick_view_btn() {
			global $product;

			echo sprintf(
				'<a href="#" rel="nofollow" data-product-id="%s" class="cat-lst-el-btn __quick_view js--quick-view-btn" title="%s"><span class="icon-search"></span></a>',
				esc_attr( $product->id ),
				esc_html__('Quick view', 'melinda')
			);
		}
	}

	if (defined('DOING_AJAX')) {
		add_action('wp_ajax_melinda_wc_quick_view', 'melinda_wc_quick_view');
		add_action('wp_ajax_nopriv_melinda_wc_quick_view', 'melinda_wc_quick_view');
		function melinda_wc_quick_view() {
			if ( ! wp_verify_nonce( htmlentities($_POST['nonce']), 'melinda-nonce' ) ) {
				echo 'error';
				wp_die();
			}

			global $product, $woocommerce, $post;

			$product_id = absint($_POST['product']);

			$post = get_post( $product_id );

			$product = get_product( $product_id );

			ob_start();

			woocommerce_get_template( 'content-quick-view.php');

			$output = ob_get_contents();
			ob_end_clean();

			echo balanceTags($output);

			wp_die();
		}
	}


	// Cart
	remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
	add_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 20 );

	add_filter( 'woocommerce_add_to_cart_fragments', 'minicart_count_update' );
	function minicart_count_update( $fragments ) {
		ob_start();

		$count = WC()->cart->cart_contents_count;

		?><span class="minicart_count <?php if (!$count) echo '__zero'; ?> js--minicart_count"><?php echo absint($count); ?></span><?php

		$fragments['.js--minicart_count'] = ob_get_clean();

		return $fragments;
	}


	// Cross-sells posts per page
	add_filter('woocommerce_cross_sells_total', 'melinda_cross_sells_total');
	function melinda_cross_sells_total() {
		return 6;
	}


	// Cross-sells columns
	add_filter('woocommerce_cross_sells_columns', 'melinda_cross_sells_columns');
	function melinda_cross_sells_columns() {
		return 6;
	}

}
