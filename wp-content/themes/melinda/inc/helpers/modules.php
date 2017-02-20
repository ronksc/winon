<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');


function get_mods_count($section = 'header') {
	$count = 0;
	if (get_theme_option($section . '--text')) $count++;
	if (get_theme_option($section . '--social')) $count++;
	if (get_theme_option($section . '--wishlist')) $count++;
	if (get_theme_option($section . '--wpml_currency')) $count++;
	if (get_theme_option($section . '--wpml_lang')) $count++;
	return $count;
}


function get_module_text($section = 'header', $hide_on_screen_xs = true) {
	if (get_theme_option($section . '--text')) { ?>
		<div class="mods_el<?php if ($hide_on_screen_xs) { ?> hidden-xs<?php } ?>"><div class="mods_el-tx"><?php echo do_shortcode(get_theme_option('header--text_content')); ?></div></div>
		<?php
		if ($hide_on_screen_xs) { ?><span class="mods_el hidden-xs __separator"></span><?php }
		else { ?><br><?php }
	}
}


function get_icon_module_social($section = 'header', $large_icon = true, $hide_on_screen_xs = true) {
	if (get_theme_option($section . '--social')) {
		$social_links = get_theme_option($section . '--social_links');
		foreach ($social_links as $key => $social_link) {
			if ($social_link) {
			?>
			<a
				href="<?php echo esc_url(get_theme_option('social--' . $key)); ?>"
				target="_blank"
				class="mods_el<?php if ($hide_on_screen_xs) { ?> hidden-xs<?php } ?>"
			><span class="mods_el-ic"><i class="fa <?php if ($large_icon) echo 'fa-lg'; ?> fa-<?php echo esc_attr($key); ?>"></i></span></a>
			<?php
			}
		}
		if ($hide_on_screen_xs) { ?><span class="mods_el hidden-xs __separator"></span><?php }
	}
}

function get_icon_module_lwa($section = 'header', $large_icon = true) {
	if (get_theme_option($section . '--login_ajax') && function_exists('login_with_ajax')) {
		if (class_exists('woocommerce')) {
			$profile_link = get_permalink( get_option('woocommerce_myaccount_page_id') );
		} else if (function_exists('bp_loggedin_user_link')) {
			$profile_link = bp_loggedin_user_link();
		} else {
			$profile_link = trailingslashit(get_admin_url()) . 'profile.php';
		}
		?>
		<div class="mods_el"><div class="lwa-w">
			<a href="<?php echo esc_url($profile_link); ?>" class="js--show-next"><span class="mods_el-ic"><span class="icon-head <?php if ($large_icon) echo 'xbig'; ?>"></span></span></a>
			<?php login_with_ajax( array( 'profile_link' => 1 ) ); ?>
		</div></div>
		<?php
	}
}


function get_icon_module_wishlist($section = 'header', $large_icon = true, $hide_on_screen_xs = true) {
	if (get_theme_option($section . '--wishlist') && function_exists('YITH_WCWL')) {
		?>
		<div class="mods_el<?php if ($hide_on_screen_xs) { ?> hidden-xs<?php } ?>"><a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>"><span class="mods_el-ic"><span class="icon-heart <?php if ($large_icon) echo 'xbig'; ?>"></span></span></a></div>
		<?php
	}
}


function get_icon_module_minicart($section = 'header', $large_icon = true) {
	if (get_theme_option($section . '--woo_cart') && class_exists('woocommerce') && !is_melinda_cart() && !is_melinda_checkout()) {
		$count = WC()->cart->cart_contents_count;
		?>
		<div class="mods_el"><div class="minicart <?php if ($large_icon) echo '__lg'; ?>">
			<a href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" title="<?php esc_html_e('View your shopping cart', 'melinda'); ?>" class="minicart_lk js--show-next">
				<span class="mods_el-ic">
					<span class="icon-bag <?php if ($large_icon) echo 'xbig'; ?>"></span>
					<span class="minicart_count <?php if (!$count) echo '__zero'; ?> js--minicart_count"><?php echo absint($count); ?></span>
				</span>
			</a>
			<div class="minicart_cnt js--show-me"><div class="widget_shopping_cart_content"></div></div>
		</div></div>
		<?php
	}
}


function get_icon_module_search($section = 'header', $large_icon = true) {
	if (get_theme_option($section . '--search')) {
		?>
		<div class="mods_el"><div class="search-form-popup-w js--focus-w">
			<a href="#" class="js--show-next js--focus"><span class="mods_el-ic"><span class="icon-search <?php if ($large_icon) echo 'xbig'; ?>"></span></span></a>
			<?php get_search_form(); ?>
		</div></div>
		<?php
	}
}


function get_icon_module_currency($section = 'header', $hide_on_screen_xs = true) {
	if (get_theme_option($section . '--wpml_currency')) {
		if ($hide_on_screen_xs) { ?><span class="mods_el hidden-xs __separator"></span><?php }
		?>
		<div class="mods_el<?php if ($hide_on_screen_xs) { ?> hidden-xs<?php } ?>"><div class="mods_el-tx"><?php do_action('currency_switcher', array('format' => '%symbol%', 'switcher_style' => 'list', 'orientation' => 'horizontal')); ?></div></div>
		<?php
	}
}


function get_icon_module_language_flags($section = 'header', $hide_on_screen_xs = true) {
	if (get_theme_option($section . '--wpml_lang') && function_exists('icl_get_languages')) {
		$languages = icl_get_languages('skip_missing=0&orderby=code');
		if (!empty($languages)) {
			if ($hide_on_screen_xs) { ?><span class="mods_el hidden-xs __separator"></span><?php }
			foreach ($languages as $language) {
				?>
				<div class="mods_el<?php if ($hide_on_screen_xs) { ?> hidden-xs<?php } ?>"><?php
				if (!$language['active']) echo '<a href="' . esc_url($language['url']) . '">';
				?><img src="<?php echo esc_url($language['country_flag_url']); ?>" alt="<?php echo esc_attr($language['language_code']); ?>" width="18" height="12"> <?php
				if (!$language['active']) echo '</a>';
				?></div>
				<?php
			}
		}
	}
}


function get_icon_module_popup_menu($large_icon = true, $hide_on_screen_lg = true) {
	?>
	<span class="mods_el hidden-xs<?php if ($hide_on_screen_lg) { ?> hidden-lg<?php } ?> __separator"></span>
	<div class="mods_el<?php if ($hide_on_screen_lg) { ?> hidden-lg<?php } ?>"><div class="popup-menu-mod">
		<a href="#" class="js--show-next"><span class="mods_el-ic"><span class="icon-menu <?php if ($large_icon) echo 'xbig'; ?>"></span></span></a>
		<div class="popup-menu-popup js--show-me js-popup-menu-popup">
			<span class="vertical-helper"></span><nav class="popup-menu-w"><?php
				if (has_nav_menu('popup')) {
					$menu_id = '';
					if (get_theme_option('menu--popup')) {
						$menu_id = get_theme_option('menu--popup');
					}
					wp_nav_menu( array(
						'theme_location' => 'popup',
						'menu' => $menu_id,
						'menu_class' => 'popup-menu js-popup-menu',
						'container' => '',
					) );
				} else {
					esc_html_e('Assign a menu at Appearance > Menus', 'melinda');
				}
			?></nav>
			<a href="#" class="popup-menu-popup-close js--hide-me"><span class="icon-cross"></span></a>
		</div>
	</div></div>
	<?php
}


function get_icon_module_mobile($section = 'header', $large_icon = true) {
	if (get_mods_count()) {
		?>
		<div class="mods_el hidden-sm hidden-md hidden-lg"><div class="mobile-mod-w">
			<a href="#" class="js--show-next"><span class="mods_el-ic"><span class="icon-plus <?php if ($large_icon) echo 'xbig'; ?>"></span></span></a>
			<div class="mobile-mod js--show-me">
				<?php get_module_text($section, false); ?>

				<?php get_icon_module_social($section, $large_icon, false); ?>

				<?php get_icon_module_wishlist($section, $large_icon, false); ?>

				<?php get_icon_module_currency($section, false); ?>

				<?php get_icon_module_language_flags($section, false); ?>
			</div>
		</div></div>
		<?php
	}
}


function melinda_share($tooltip_align_left = false) {
	global $post;

	$image = '';
	if (has_post_thumbnail($post->ID)) {
		$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'shop_single');
		$image = esc_attr(urlencode($image[0]));
	}

	$link = esc_attr(urlencode(get_permalink()));
	$title = esc_attr(urlencode(get_the_title()));

	if (is_singular(array('product'))) {
		$share = esc_html__('Share this product', 'melinda');
	} elseif (is_singular('project')) {
		$share = esc_html__('Share this project', 'melinda');
	} elseif (is_singular('post')) {
		$share = esc_html__('Share this post', 'melinda');
	} else {
		$share = esc_html__('Share this page', 'melinda');
	}

	$tooltip_class_mod = '';
	if ($tooltip_align_left) {
		$tooltip_class_mod = '__left';
	}
	?>
	<div class="share">
		<span class="share_h"><span class="share_icon icon-share"></span> <span class="share_tx"><?php echo $share; ?></span></span>
		<div class="share_lst-w <?php echo esc_attr($tooltip_class_mod); ?>">
			<ul class="share_lst">
				<li>
					<a target="_blank" href="https://www.facebook.com/sharer.php?s=100&amp;p%5Btitle%5D=<?php echo $title ?>&amp;p%5Burl%5D=<?php echo $link ?>&amp;p%5Bimages%5D%5B0%5D=<?php echo $image ?>" title="<?php esc_html_e('Facebook', 'melinda'); ?>">
						<i class="fa fa-facebook"></i>
					</a>
				</li>
				<li>
					<a target="_blank" href="https://twitter.com/share?url=<?php echo $link ?>&amp;text=<?php echo $title ?>" title="<?php esc_html_e('Twitter', 'melinda'); ?>">
						<i class="fa fa-twitter"></i>
					</a>
				</li>
				<li>
					<a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo $link ?>&amp;description=<?php echo $title ?>&media=<?php echo $image ?>" title="<?php esc_html_e('Pinterest', 'melinda'); ?>" onclick="window.open(this.href); return false;">
						<i class="fa fa-pinterest"></i>
					</a>
				</li>
				<li>
					<a target="_blank" href="https://plus.google.com/share?url=<?php echo $link ?>&amp;title=<?php echo $title ?>" title="<?php esc_html_e('Google+', 'melinda'); ?>" onclick='javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;'>
						<i class="fa fa-google-plus"></i>
					</a>
				</li>
				<li>
					<a href="mailto:?subject=I wanted you to see this site&amp;body=<?php echo $link ?>&amp;title=<?php echo $title ?>" title="<?php esc_html_e('Email', 'melinda'); ?>">
						<i class="fa fa-envelope"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<?php
}


function melinda_share_alt() {
	global $post;

	$image = '';
	if (has_post_thumbnail($post->ID)) {
		$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'shop_single');
		$image = esc_attr(urlencode($image[0]));
	}

	$link = esc_attr(urlencode(get_permalink()));
	$title = esc_attr(urlencode(get_the_title()));
	?>
	<ul class="share-alt __brand-colors">
		<li class="share-alt_btn-w">
			<a class="share-alt_btn __facebook" target="_blank" href="https://www.facebook.com/sharer.php?s=100&amp;p%5Btitle%5D=<?php echo $title ?>&amp;p%5Burl%5D=<?php echo $link ?>&amp;p%5Bimages%5D%5B0%5D=<?php echo $image ?>" title="<?php esc_html_e('Facebook', 'melinda'); ?>">
				<i class="fa fa-facebook"></i> <?php esc_html_e('Facebook', 'melinda'); ?>
			</a>
		</li>
		<li class="share-alt_btn-w">
			<a class="share-alt_btn __twitter" target="_blank" href="https://twitter.com/share?url=<?php echo $link ?>&amp;text=<?php echo $title ?>" title="<?php esc_html_e('Twitter', 'melinda'); ?>">
				<i class="fa fa-twitter"></i> <?php esc_html_e('Twitter', 'melinda'); ?>
			</a>
		</li>
		<li class="share-alt_btn-w">
			<a class="share-alt_btn __google-plus" target="_blank" href="https://plus.google.com/share?url=<?php echo $link ?>&amp;title=<?php echo $title ?>" title="<?php esc_html_e('Google Plus', 'melinda'); ?>" onclick='javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;'>
				<i class="fa fa-google-plus"></i> <?php esc_html_e('Google Plus', 'melinda'); ?>
			</a>
		</li>
		<li class="share-alt_btn-w">
			<a class="share-alt_btn __pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo $link ?>&amp;description=<?php echo $title ?>&media=<?php echo $image ?>" title="<?php esc_html_e('Pinterest', 'melinda'); ?>" onclick="window.open(this.href); return false;">
				<i class="fa fa-pinterest"></i> <?php esc_html_e('Pinterest', 'melinda'); ?>
			</a>
		</li>
	</ul>
	<?php
}
