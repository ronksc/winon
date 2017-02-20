<?php
/**
 * Simple product add to cart
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

?>

<?php
	// Availability
	$availability      = $product->get_availability();
	$availability_html = empty( $availability['availability'] ) ? '' : '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>';

	echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
?>

<?php if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="product_add-to-cart-w" method="post" enctype="multipart/form-data">
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<?php
			if ( ! $product->is_sold_individually() )
				woocommerce_quantity_input( array(
					'class' => '__bold_round',
					'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
					'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
				) );
		?>

		<button type="submit" class="single_add_to_cart_button button alt"><span class="icon-bag"></span> <span><?php echo esc_html( $product->single_add_to_cart_text() ); ?></span></button>

		<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>">

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
