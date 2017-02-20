<?php


// Default favicons

$favicon = get_theme_option('favicon--16');
if (is_array($favicon) && $favicon['url']) {
	?><link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url($favicon['url']); ?>"><?php
}
$favicon = get_theme_option('favicon--32');
if (is_array($favicon) && $favicon['url']) {
	?><link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url($favicon['url']); ?>"><?php
}
$favicon = get_theme_option('favicon--96');
if (is_array($favicon) && $favicon['url']) {
	?><link rel="icon" type="image/png" sizes="96x96" href="<?php echo esc_url($favicon['url']); ?>"><?php
}
$favicon = get_theme_option('favicon--160');
if (is_array($favicon) && $favicon['url']) {
	?><link rel="icon" type="image/png" sizes="160x160" href="<?php echo esc_url($favicon['url']); ?>"><?php
}
$favicon = get_theme_option('favicon--192');
if (is_array($favicon) && $favicon['url']) {
	?><link rel="icon" type="image/png" sizes="192x192" href="<?php echo esc_url($favicon['url']); ?>"><?php
}


// Apple favicons

$favicon = get_theme_option('favicon--a_57');
if (is_array($favicon) && $favicon['url']) {
	?><link rel="apple-touch-icon" sizes="57x57" href="<?php echo esc_url($favicon['url']); ?>"><?php
}
$favicon = get_theme_option('favicon--a_114');
if (is_array($favicon) && $favicon['url']) {
	?><link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url($favicon['url']); ?>"><?php
}
$favicon = get_theme_option('favicon--a_72');
if (is_array($favicon) && $favicon['url']) {
	?><link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url($favicon['url']); ?>"><?php
}
$favicon = get_theme_option('favicon--a_144');
if (is_array($favicon) && $favicon['url']) {
	?><link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url($favicon['url']); ?>"><?php
}
$favicon = get_theme_option('favicon--a_60');
if (is_array($favicon) && $favicon['url']) {
	?><link rel="apple-touch-icon" sizes="60x60" href="<?php echo esc_url($favicon['url']); ?>"><?php
}
$favicon = get_theme_option('favicon--a_120');
if (is_array($favicon) && $favicon['url']) {
	?><link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_url($favicon['url']); ?>"><?php
}
$favicon = get_theme_option('favicon--a_76');
if (is_array($favicon) && $favicon['url']) {
	?><link rel="apple-touch-icon" sizes="76x76" href="<?php echo esc_url($favicon['url']); ?>"><?php
}
$favicon = get_theme_option('favicon--a_152');
if (is_array($favicon) && $favicon['url']) {
	?><link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url($favicon['url']); ?>"><?php
}
$favicon = get_theme_option('favicon--a_180');
if (is_array($favicon) && $favicon['url']) {
	?><link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url($favicon['url']); ?>"><?php
}


// Windows Metro favicons

if (get_theme_option('favicon--win_color')) {
	?><meta name="msapplication-TileColor" content="<?php echo esc_attr(get_theme_option('favicon--win_color')); ?>" /><?php
}
$favicon = get_theme_option('favicon--win_70');
if (is_array($favicon) && $favicon['url']) {
	?><meta name="msapplication-square70x70logo" content="<?php echo esc_attr($favicon['url']); ?>" /><?php
}
$favicon = get_theme_option('favicon--win_150');
if (is_array($favicon) && $favicon['url']) {
	?><meta name="msapplication-square150x150logo" content="<?php echo esc_attr($favicon['url']); ?>" /><?php
}
$favicon = get_theme_option('favicon--win_310');
if (is_array($favicon) && $favicon['url']) {
	?><meta name="msapplication-wide310x150logo" content="<?php echo esc_attr($favicon['url']); ?>" /><?php
}
$favicon = get_theme_option('favicon--win_310_quad');
if (is_array($favicon) && $favicon['url']) {
	?><meta name="msapplication-square310x310logo" content="<?php echo esc_attr($favicon['url']); ?>" /><?php
}
?>