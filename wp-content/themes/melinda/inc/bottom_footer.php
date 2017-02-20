<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');

$menu = get_theme_option('bottom_footer--menu');
$menu_at_left = get_theme_option('bottom_footer--menu_left');

if ($menu) {
	$menu_id = '';
	if (get_theme_option('menu--bottom_footer')) {
		$menu_id = get_theme_option('menu--bottom_footer');
	}
	if (has_nav_menu('bottom_footer')) {
		$bottom_footer_menu = wp_nav_menu( array(
			'theme_location' => 'bottom_footer',
			'menu' => $menu_id,
			'menu_class' => 'bottom-f-menu js--scroll-nav',
			'container' => 'nav',
			'container_class' => 'mods_el',
			'echo' => false,
			'depth' => 1,
		) );
	} else {
		$bottom_footer_menu = '<div class="mods_el">' . esc_html__('Assign a menu at Appearance > Menus', 'melinda') . '</div>';
	}
}
?>
<div class="main-f-bottom">
	<div class="container">
		<div class="row">
			<?php if (get_theme_option('bottom_footer--left_cols_sm')) { ?>
				<div class="col-sm-<?php echo absint(get_theme_option('bottom_footer--left_cols_sm')); ?>">
					<div class="
						mods
						text-center
						text-<?php echo esc_attr(get_theme_option('bottom_footer_styles--first_align')); ?>-sm
					">
						<?php if (get_theme_option('bottom_footer--text')) {
							?><div class="mods_el"><div class="small mods_el-tx"><?php echo do_shortcode(get_theme_option('bottom_footer--text_content')); ?></div></div> <span class="mods_el __separator"></span><?php
						} ?>
						<?php if ($menu && $menu_at_left) { echo $bottom_footer_menu; } ?>
					</div>
				</div>
			<?php } ?>
			<?php if (get_theme_option('bottom_footer--right_cols_sm')) { ?>
				<div class="col-sm-<?php echo absint(get_theme_option('bottom_footer--right_cols_sm')); ?>">
					<div class="
						mods
						text-center
						text-<?php echo esc_attr(get_theme_option('bottom_footer_styles--second_align')); ?>-sm
					">
						<?php if ($menu && !$menu_at_left) { echo $bottom_footer_menu; } ?>

						<?php get_icon_module_social('bottom_footer', false); ?>

						<?php get_icon_module_currency('bottom_footer', false); ?>

						<?php get_icon_module_language_flags('bottom_footer', false); ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
