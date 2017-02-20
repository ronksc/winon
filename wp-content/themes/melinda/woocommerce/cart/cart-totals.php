<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see         http://docs.woothemes.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="col-md-5 col-xl-4"><div class="cart-totals-w">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<div class="cart-totals <?php if ( WC()->customer->has_calculated_shipping() ) echo 'calculated_shipping'; ?>">

		<h2 class="cart-totals_h"><?php esc_html_e( 'Cart Totals', 'woocommerce' ); ?></h2>

		<table class="cart-totals-lst" cellspacing="0">

			<tr class="cart-subtotal">
				<th class="cart-totals-lst-el_h"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
				<td class="cart-totals-lst-el_cnt" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
			</tr>

			<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
				<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
					<th class="cart-totals-lst-el_h"><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
					<td class="cart-totals-lst-el_cnt" data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
				</tr>
			<?php endforeach; ?>

			<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

				<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

				<?php wc_cart_totals_shipping_html(); ?>

				<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

			<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

				<tr>
					<th class="cart-totals-lst-el_h"><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></th>
					<td class="cart-totals-lst-el_cnt" data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>
				</tr>

			<?php endif; ?>

			<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
				<tr class="fee">
					<th class="cart-totals-lst-el_h"><?php echo esc_html( $fee->name ); ?></th>
					<td class="cart-totals-lst-el_cnt" data-title="<?php echo esc_html( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
				</tr>
			<?php endforeach; ?>

			<?php
			if (wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart) {
				$taxable_address = WC()->customer->get_taxable_address();
				$estimated_text  = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
					? sprintf( ' <small>(' . esc_html__( 'estimated for %s', 'woocommerce' ) . ')</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] )
					: '';

				if ('itemized' === get_option('woocommerce_tax_total_display')) {
					foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { ?>
						<tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
							<th class="cart-totals-lst-el_h"><?php echo esc_html( $tax->label ) . $estimated_text; ?></th>
							<td class="cart-totals-lst-el_cnt" data-title="<?php echo esc_html( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
						</tr>
					<?php } ?>
				<?php } else { ?>
					<tr class="tax-total">
						<th class="cart-totals-lst-el_h"><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; ?></th>
						<td class="cart-totals-lst-el_cnt" data-title="<?php echo esc_html( WC()->countries->tax_or_vat() ); ?>"><?php echo wc_cart_totals_taxes_total_html(); ?></td>
					</tr>
				<?php } ?>
			<?php } ?>

			<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

			<tr>
				<th class="cart-totals-lst-el_h __bottom"><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
				<td class="cart-totals-lst-el_cnt __bottom" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><span class="cart-totals-lst-el_price"><?php wc_cart_totals_order_total_html(); ?></span></td>
			</tr>

			<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

		</table>

		<div class="cart-totals-btn-w">

			<input type="submit" class="cart-totals-btn __update __light" name="update_cart" value="<?php esc_attr_e( 'Update Cart', 'woocommerce' ); ?>" form="cart-form">
			<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>

		</div>

	</div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div></div>
