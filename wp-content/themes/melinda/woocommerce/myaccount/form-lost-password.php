<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices(); ?>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="wc-account-reset-password">

			<h1 class="wc-account-reset-password_h"><?php esc_html_e( 'Reset Password', 'woocommerce' ); ?></h1>

			<form method="post" class="wc-account-reset-password_form">

				<p class="wc-lead"><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p>

				<p class="form-row form-row-wide">
					<label for="user_login"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?></label>
					<input class="input-text" type="text" name="user_login" id="user_login">
				</p>

				<?php do_action( 'woocommerce_lostpassword_form' ); ?>

				<p class="form-row">
					<input type="hidden" name="wc_reset_password" value="true">
					<input type="submit" class="wc-account-reset-password_btn" value="<?php esc_attr_e( 'Reset Password', 'woocommerce' ); ?>">
				</p>

				<?php wp_nonce_field( 'lost_password' ); ?>

			</form>

		</div>
	</div>
</div>