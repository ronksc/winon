<?php
/**
 * Cart item data (when outputting non-flat)
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<dl class="cart-el-variation variation">
	<?php foreach ($item_data as $data) { ?>
		<dt class="cart-el-variation_h variation-<?php echo sanitize_html_class( $data['key'] ); ?>"><?php echo wp_kses_post( $data['key'] ); ?>:</dt>&nbsp;<dd class="cart-el-variation_cnt variation-<?php echo sanitize_html_class( $data['key'] ); ?>"><?php echo wp_kses_post( wpautop( $data['display'] ) ); ?></dd>
	<?php } ?>
</dl>
