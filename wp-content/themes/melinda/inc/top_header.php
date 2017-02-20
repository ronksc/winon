<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');

$menu = get_theme_option('top_header--menu');
$menu_at_left = get_theme_option('top_header--menu_left');

if ($menu) {
	$menu_id = '';
	if (get_theme_option('menu--top_header')) {
		$menu_id = get_theme_option('menu--top_header');
	}
	if (has_nav_menu('top_header')) {
		$top_header_menu = wp_nav_menu( array(
			'theme_location' => 'top_header',
			'menu' => $menu_id,
			'menu_class' => 'top-h-menu js--scroll-nav mods_el-menu',
			'container' => 'nav',
			'container_class' => 'mods_el visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block text-center text-right-sm',
			'echo' => false,
			'depth' => 1,
		) );
	} else {
		$top_header_menu = '<div class="mods_el visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block text-center text-right-sm"><div class="mods_el-menu">' . esc_html__('Assign a menu at Appearance > Menus', 'melinda') . '</div></div>';
	}
}

?>

<div class="main-h-top">
	<div class="container">
		<div class="row __inline">
			<?php if (get_theme_option('top_header--left_cols_sm')) { ?>
				<div class="col-sm-<?php echo absint(get_theme_option('top_header--left_cols_sm')); ?> __inline"><div>
					<div class="mods text-center text-left-sm">
						<?php if (get_theme_option('top_header--text')) {
							?><div class="mods_el"><div class="small mods_el-tx"><?php echo do_shortcode(get_theme_option('top_header--text_content')); ?></div></div><?php
						} ?>
						<span class="mods_el __separator hidden-xs"></span>
						<?php if ($menu && $menu_at_left) { echo $top_header_menu; } ?>
					</div>
				</div></div>
			<?php } ?>
			<?php if (get_theme_option('top_header--right_cols_sm')) { ?>
				<div class="col-sm-<?php echo absint(get_theme_option('top_header--right_cols_sm')); ?> __inline"><div>
					<div class="mods text-center text-right-sm">
						<?php if ($menu && !$menu_at_left) { ?>
							<?php echo $top_header_menu; ?>
							<span class="mods_el __separator hidden-xs"></span>
						<?php } ?>

						<?php get_icon_module_lwa('top_header', false); ?>

						<?php get_icon_module_wishlist('top_header', false); ?>

						<?php get_icon_module_minicart('top_header', false); ?>

						<?php get_icon_module_search('top_header', false); ?>

						<?php get_icon_module_social('top_header', false); ?>

						<?php get_icon_module_currency('top_header', false); ?>

						<?php get_icon_module_language_flags('top_header', false); ?>
					</div>
				</div></div>
			<?php } ?>
		</div>
	</div>
</div>
