<?php
/*
 * This is the page users will see logged in. 
 * You can edit this, but for upgrade safety you should copy and modify this file into your template folder.
 * The location from within your template folder is plugins/login-with-ajax/ (create these directories if they don't exist)
*/

$user = wp_get_current_user();

?>

<div class="lwa js--show-me">
	<div class="lwa-title-sub __with-avatar __first"><?php echo esc_html__( 'Hi', 'login-with-ajax' ) . " " . $user->display_name; ?></div>
	<div class="avatar lwa-avatar">
		<?php echo get_avatar( $user->ID, $size = '50' ); ?>
	</div>
	<ul class="lwa-info">
		<?php
		//WooCommerce My Account
		if (class_exists('woocommerce')) {
			?>
			<li>
				<a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>"><span class="icon-head"></span> <?php esc_html_e('My Account', 'melinda'); ?></a>
			</li>
			<li>
				<a href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>"><span class="icon-bag"></span> <?php esc_html_e('Cart', 'melinda'); ?></a>
			</li>
			<?php
		}

		//Wishlist
		if (function_exists('YITH_WCWL')) {
			?>
			<li><a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>"><span class="icon-heart"></span> <?php esc_html_e('Wishlist', 'yith-woocommerce-wishlist'); ?></a></li>
			<?php
		}

		//Admin URL
		if ($lwa_data['profile_link']) {
			if (function_exists('bp_loggedin_user_link')) {
				?>
				<li>
					<a href="<?php echo esc_url(bp_loggedin_user_link()); ?>"><span class="icon-briefcase"></span> <?php esc_html_e('Profile', 'login-with-ajax') ?></a>
				</li>
				<?php
			} else {
				?>
				<li>
					<a href="<?php echo trailingslashit(get_admin_url()); ?>profile.php"><span class="icon-briefcase"></span> <?php esc_html_e('Profile', 'login-with-ajax') ?></a>
				</li>
				<?php
			}
		}

		//Blog Admin
		if (current_user_can('list_users')) {
			?>
			<li>
				<a href="<?php echo esc_url(get_admin_url()); ?>"><span class="icon-cog"></span> <?php esc_html_e('Dashboard', 'melinda'); ?></a>
			</li>
			<?php
		}

		//Logout URL
		?>
		<li>
			<a id="wp-logout" href="<?php echo esc_url(wp_logout_url()); ?>"><span class="icon-power"></span> <?php esc_html_e('Log Out', 'login-with-ajax') ?></a>
		</li>
	</ul>
</div>
