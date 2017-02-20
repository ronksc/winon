<?php
/**
 * Show messages
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! $messages ){
	return;
}

?>

<div class="wc-message-w __success">
	<div class="wc-message_ic"><i class="fa fa-check"></i></div>
	<div class="wc-message_cnt">
		<?php foreach ( $messages as $message ) : ?>
			<div class="woocommerce-message"><?php echo wp_kses_post( $message ); ?></div>
		<?php endforeach; ?>
	</div>
</div>
