<?php
/**
 * Show error messages
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

<div class="wc-message-w __error">
	<div class="wc-message_ic"><i class="fa fa-exclamation-triangle"></i></div>
	<div class="wc-message_cnt">
		<ul class="woocommerce-error">
			<?php foreach ( $messages as $message ) : ?>
				<li><?php echo wp_kses_post( $message ); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
