<?php
/**
 * Add to wishlist button template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 2.0.0
 */

global $product;
?>

<a href="<?php echo esc_url( add_query_arg( 'add_to_wishlist', $product_id ) ); ?>" rel="nofollow" data-product-id="<?php echo esc_attr($product_id); ?>" data-product-type="<?php echo esc_attr($product_type); ?>" class="<?php echo esc_attr($link_classes); ?>">
	<?php
		if ($icon) {
			echo wp_kses($icon, 'post');
		} else {
			echo '<span class="add-to-wishlist_ic icon-heart"></span>';
		}
	?>
	<span class="add-to-wishlist_tx"><?php echo esc_attr($label); ?></span>
</a>