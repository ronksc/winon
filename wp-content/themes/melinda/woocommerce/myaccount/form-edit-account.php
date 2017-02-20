<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
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

do_action( 'woocommerce_before_edit_account_form' ); ?>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="wc-account-edit">

			<form action="" method="post" class="wc-account-edit_form">

				<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

				<p class="form-row form-row-first">
					<label for="account_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" class="input-text" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
				</p>
				<p class="form-row form-row-last">
					<label for="account_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" class="input-text" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
				</p>
				<div class="clear"></div>

				<p class="form-row form-row-wide">
					<label for="account_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="email" class="input-text" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
				</p>

				<div class="wc-account-edit-password">
					<h3 class="wc-account-edit-password_h"><?php esc_html_e( 'Password Change', 'woocommerce' ); ?></h3>

					<p class="form-row form-row-wide">
						<label for="password_current"><?php esc_html_e( 'Current Password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
						<input type="password" class="input-text" name="password_current" id="password_current" />
					</p>
					<p class="form-row form-row-wide">
						<label for="password_1"><?php esc_html_e( 'New Password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
						<input type="password" class="input-text" name="password_1" id="password_1" />
					</p>
					<p class="form-row form-row-wide">
						<label for="password_2"><?php esc_html_e( 'Confirm New Password', 'woocommerce' ); ?></label>
						<input type="password" class="input-text" name="password_2" id="password_2" />
					</p>
				</div>
				<div class="clear"></div>

				<?php do_action( 'woocommerce_edit_account_form' ); ?>

				<p class="form-row form-row-wide">
					<?php wp_nonce_field( 'save_account_details' ); ?>
					<input type="submit" class="wc-account-edit_btn" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>" />
					<input type="hidden" name="action" value="save_account_details" />
				</p>

				<?php do_action( 'woocommerce_edit_account_form_end' ); ?>

			</form>

		</div>
	</div>
</div>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
