<?php
/**
 * Single variation cart button
 *
 * @see         http://docs.woothemes.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

?>

<div class="woocommerce-variation-add-to-cart variations_button">
	<?php
	if (!$product->is_sold_individually()) {
		woocommerce_quantity_input( array(
			'class' => '__bold_round',
			'input_value' => ( isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 ),
			'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
			'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product ),
		) );
	}
	?>
	<button type="submit" class="single_add_to_cart_button button"><span class="icon-bag"></span> <span><?php echo esc_html( $product->single_add_to_cart_text() ); ?></span></button>
	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->id ); ?>">
	<input type="hidden" name="product_id" value="<?php echo absint( $product->id ); ?>">
	<input type="hidden" name="variation_id" class="variation_id" value="0">
</div>
