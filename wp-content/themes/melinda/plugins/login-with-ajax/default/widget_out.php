<?php
/*
 * This is the page users will see logged out. 
 * You can edit this, but for upgrade safety you should copy and modify this file into your template folder.
 * The location from within your template folder is plugins/login-with-ajax/ (create these directories if they don't exist)
*/
?>

<div class="lwa lwa-default js--show-me"><?php //class must be here, and if this is a template, class name should be that of template directory ?>
	<form class="lwa-form js--lwa-login" action="<?php echo esc_attr(LoginWithAjax::$url_login); ?>" method="post">
		<div class="lwa-title-sub"><?php esc_html_e('Log In', 'login-with-ajax'); ?></div>
		<span class="lwa-status"></span>
		<div class="lwa-username">
			<div class="lwa-username-input lwa_it-w">
				<span class="lwa_it-ic"><span class="icon-head"></span></span>
				<input type="text" name="log" placeholder="<?php esc_html_e('Username','login-with-ajax') ?>">
			</div>
		</div>
		<div class="lwa-password">
			<div class="lwa-password-input lwa_it-w">
				<span class="lwa_it-ic"><span class="icon-lock"></span></span>
				<input type="password" name="pwd" placeholder="<?php esc_html_e('Password','login-with-ajax') ?>">
			</div>
		</div>
		<?php do_action('login_form'); ?>
		<div class="lwa-submit">
			<div class="lwa-submit-button">
				<label class="lwa-rememberme-w"><input name="rememberme" type="checkbox" class="lwa-rememberme" value="forever"> <?php esc_html_e('Remember Me','login-with-ajax') ?></label>
				<input type="submit" name="wp-submit" id="lwa_wp-submit" value="<?php esc_attr_e('Log In', 'login-with-ajax'); ?>" tabindex="100" class="">
				<input type="hidden" name="lwa_profile_link" value="<?php echo esc_attr($lwa_data['profile_link']); ?>">
				<input type="hidden" name="login-with-ajax" value="login">
				<?php if( !empty($lwa_data['redirect']) ): ?>
				<input type="hidden" name="redirect_to" value="<?php echo esc_url($lwa_data['redirect']); ?>">
				<?php endif; ?>
			</div>
			<div class="lwa-submit-links">
				<?php if( !empty($lwa_data['remember']) ): ?>
					<a class="js--lwa-show-remember lwa-remember-btn" href="<?php echo esc_url(LoginWithAjax::$url_remember); ?>" title="<?php esc_attr_e('Password Lost and Found','login-with-ajax') ?>"><?php esc_attr_e('Lost your password?','login-with-ajax') ?></a>
				<?php endif; ?>
				<?php if ( get_option('users_can_register') && !empty($lwa_data['registration']) ) : ?>
					<a href="<?php echo esc_url(LoginWithAjax::$url_register); ?>" class="js--lwa-show-register button __light"><?php esc_html_e('Register','login-with-ajax') ?></a>
				<?php endif; ?>
			</div>
		</div>
	</form>

	<?php if( !empty($lwa_data['remember']) ) { ?>
		<form class="lwa-remember js--lwa-remember" action="<?php echo esc_attr(LoginWithAjax::$url_remember) ?>" method="post" style="display:none;">
			<div class="lwa-title-sub"><?php esc_html_e('Forgotten Password', 'login-with-ajax'); ?></div>
			<span class="lwa-status"></span>
			<div class="lwa-remember-email lwa_it-w">
				<span class="lwa_it-ic"><span class="icon-head"></span></span>
				<input type="text" name="user_login" class="lwa-user-remember" placeholder="<?php esc_html_e('Enter username or email','login-with-ajax') ?>">
				<?php do_action('lostpassword_form'); ?>
			</div>
			<div class="lwa-remember-buttons">
				<input type="submit" value="<?php esc_attr_e("Get New Password", 'login-with-ajax'); ?>" class="lwa-button-remember">
				<input type="hidden" name="login-with-ajax" value="remember">
				<a href="#" class="js--lwa-hide-remember button __light"><?php esc_html_e('Cancel', 'login-with-ajax'); ?></a>
			</div>
		</form>
	<?php } ?>

	<?php if( get_option('users_can_register') && !empty($lwa_data['registration']) ) { ?>
		<div class="lwa-register lwa-register-default js--lwa-register" style="display:none;">
			<div class="lwa-title-sub"><?php esc_html_e('Register For This Site','login-with-ajax') ?></div>
			<p><em class="lwa-register-tip"><?php esc_html_e('A password will be e-mailed to you.','login-with-ajax') ?></em></p>
			<form class="lwa-register-form" action="<?php echo esc_attr(LoginWithAjax::$url_register); ?>" method="post">
				<span class="lwa-status"></span>
				<div class="lwa-username lwa_it-w">
					<span class="lwa_it-ic"><span class="icon-head"></span></span>
					<input type="text" name="user_login" id="user_login" class="input" size="20" tabindex="10" placeholder="<?php esc_html_e('Username','login-with-ajax') ?>">
				</div>
				<div class="lwa-email lwa_it-w">
					<span class="lwa_it-ic"><span class="icon-mail"></span></span>
					<input type="text" name="user_email" id="user_email" class="input" size="25" tabindex="20" placeholder="<?php esc_html_e('E-mail','login-with-ajax') ?>">
				</div>
				<?php do_action('register_form'); ?>
				<?php do_action('lwa_register_form'); ?>
				<div class="submit">
					<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="<?php esc_attr_e('Register', 'login-with-ajax'); ?>" tabindex="100">
				</div>
				<input type="hidden" name="login-with-ajax" value="register">
				<a href="#" class="js--lwa-hide-register button __light"><?php esc_html_e('Cancel', 'login-with-ajax'); ?></a>
			</form>
		</div>
	<?php } ?>

</div>
