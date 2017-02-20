<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see         http://docs.woothemes.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Extra post classes
$classes = get_responsive_column_classes($woocommerce_loop['columns'], $woocommerce_loop['loop']);
$classes[] = 'animate-on-screen js--animate-on-screen';

?>

<div <?php post_class( $classes ); ?>>
	<div class="cat-lst-el">

		<?php
		/**
		 * woocommerce_before_shop_loop_item hook.
		 */
		do_action( 'woocommerce_before_shop_loop_item' );
		?>

		<div class="cat-lst-el_img-w">
			<?php echo woocommerce_get_product_thumbnail(); ?>
			<?php
			$attachment_ids = $product->get_gallery_attachment_ids();
			if ($attachment_ids) {
				foreach ($attachment_ids as $attachment_id) {

					$image = wp_get_attachment_image_src( $attachment_id, 'shop_catalog' );

					if (!$image) continue;

					?><a href="<?php the_permalink(); ?>" class="cat-lst-el_back-img" style="background-image:url(<?php echo esc_url($image[0]); ?>);"></a><?php

					break;
				}
			}
			?>
		</div>

		<div class="cat-lst-el_bottom">
			<?php if (class_exists( 'YITH_WCWL' )) {
				echo '<div class="__small cat-lst-el_wishlist-btn">' . do_shortcode('[yith_wcwl_add_to_wishlist]') . '</div>';
			} ?>
			<div class="cat-lst-el_lbl-w">
				<?php
					/**
					 * woocommerce_before_shop_loop_item_title hook
					 *
					 * @hooked woocommerce_show_product_loop_sale_flash - 10
					 */
					do_action( 'woocommerce_before_shop_loop_item_title' );
				?>
			</div>
			<a href="<?php the_permalink(); ?>" class="cat-lst-el_h"><?php
				/**
				 * woocommerce_shop_loop_item_title hook
				 *
				 * @hooked melinda_template_loop_product_title - 10
				 */
				do_action( 'woocommerce_shop_loop_item_title' );
			?></a>
			<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
		</div>

		<div class="cat-lst-el_btn-w">
			<?php
			/**
			 * woocommerce_after_shop_loop_item hook
			 *
			 * @hooked melinda_quick_view - 1
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
			?>
		</div>

	</div>
</div>
