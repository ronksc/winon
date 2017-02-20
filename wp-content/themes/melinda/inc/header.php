<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');

$header_layout = get_theme_option('header--layout');

$mobile_menu = get_theme_option('header--mobile_menu');

$hide_on_screen_lg = $header_layout == 'layout7' || $header_layout == 'layout8' ? false : true;

?>

<div class="main-h-bottom-w"><div class="
	main-h-bottom
	js--main-h-bottom
	<?php
	if (
		is_404() ||
		!have_posts() ||
		(is_singular() && get_post_type() == 'product') ||
		(function_exists('is_account_page') && is_account_page() && !is_user_logged_in())
	) {
		echo ' __dark';
	} else {
		echo ' __' . esc_attr(get_theme_option('header--color_scheme'));
	}
	echo ' __' . esc_attr($header_layout);
	if (get_theme_option('header--boxed')) { echo ' __boxed'; }
	if (get_theme_option('header--fixed')) { echo ' js--fixed-header'; }
	?>
"><div class="container"><div class="main-h-bottom-cnt">


	<?php if (
		$header_layout == 'layout2' ||
		$header_layout == 'layout5'
	) { ?>

		<div class="main-h-bottom_add-menu <?php if ($mobile_menu) { echo 'hidden-xs hidden-sm hidden-md'; } ?>">

			<nav class="add-menu-w"><?php
				if (has_nav_menu('additional')) {
					$menu_id = '';
					if (get_theme_option('menu--additional')) {
						$menu_id = get_theme_option('menu--additional');
					}
					wp_nav_menu( array(
						'theme_location' => 'additional',
						'menu' => $menu_id,
						'menu_class' => 'js--scroll-nav add-menu',
						'container' => '',
					) );
				} else {
					esc_html_e('Assign a menu at Appearance > Menus', 'melinda');
				}
			?></nav>

		</div>

	<?php } ?>


	<?php if ($header_layout != 'layout2' && $header_layout != 'layout5') { get_logo(); } ?>


	<div class="main-h-bottom_menu-and-mods">

		<?php if (
			$header_layout != 'layout4' &&
			$header_layout != 'layout5' &&
			$header_layout != 'layout6'
		) { ?>
			<div class="mods-w<?php
				if ($header_layout == 'layout1' && get_theme_option('header--separator')) {
					?> __with_separator<?php
				}
			?>">

				<div class="mods">

					<?php if ($header_layout != 'layout8') { ?>

						<?php get_icon_module_mobile(); ?>

						<?php get_module_text(); ?>

						<?php get_icon_module_social(); ?>

						<?php get_icon_module_lwa(); ?>

						<?php get_icon_module_wishlist(); ?>

						<?php get_icon_module_minicart(); ?>

						<?php get_icon_module_search(); ?>

						<?php get_icon_module_currency(); ?>

						<?php get_icon_module_language_flags(); ?>

					<?php } ?>

					<?php if ($mobile_menu || $hide_on_screen_lg) { ?>
						<?php get_icon_module_popup_menu(true, $hide_on_screen_lg); ?>
					<?php } ?>

				</div>

			</div>
		<?php } elseif ($mobile_menu) { ?>
			<div class="mods-w hidden-lg">
				<div class="mods">
					<?php get_icon_module_popup_menu(); ?>
				</div>
			</div>
		<?php } ?>

		<?php if (
			$header_layout != 'layout7' &&
			$header_layout != 'layout8'
		) { ?>
			<nav class="main-menu-w <?php if ($mobile_menu) { echo 'hidden-xs hidden-sm hidden-md'; } ?>"><?php
				if (has_nav_menu('main')) {
					$menu_id = '';
					if (get_theme_option('menu--main')) {
						$menu_id = get_theme_option('menu--main');
					}
					$main_menu = wp_nav_menu( array(
						'theme_location' => 'main',
						'menu' => $menu_id,
						'menu_class' => 'js--scroll-nav main-menu',
						'container' => '',
					) );
				} else {
					esc_html_e('Assign a menu at Appearance > Menus', 'melinda');
				}
			?></nav>
		<?php } ?>

	</div>


	<?php if ($header_layout == 'layout2' || $header_layout == 'layout5') { get_logo(); } ?>


</div></div></div></div>
