<?php
/**
 * The header for our theme.
 *
 * @package melinda
 */

$sidebar_location = get_sidebar_location();

$expanded_content = false;
if (get_theme_option('layout--content_width') == 'expanded') {
	$expanded_content = true;
}

$body_classes = '';

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<?php if (get_theme_option('general--responsiveness')) { ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php } ?>
	<?php
	if (get_theme_option('general--preloader')) {
		$body_classes .= ' preload'
		?>
		<script
			data-pace-options='{"ajax":false,"restartOnPushState":false}'
			src="<?php echo get_template_directory_uri(); ?>/scripts/vendor/PACE/pace.min.js"
		></script>
	<?php } ?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php
	if (!function_exists('has_site_icon') || !has_site_icon()) {
		get_template_part('inc/favicons');
	}
	?>
	<?php wp_head(); ?>
</head>

<body <?php body_class( $body_classes ); ?>>
	<section class="
		main-w
		js--main-w
		<?php echo ' __' . esc_attr(get_theme_option('layout--boxed')); ?>
	">
		<div class="main-brd __top"></div>
		<div class="main-brd __right"></div>
		<div class="main-brd __bottom"></div>
		<div class="main-brd __left"></div>

		<header>

			<div class="main-h js--main-h <?php if (is_negative_header()) { echo '__negative'; } ?>">
				<?php
				// Top header

				if (
					get_theme_option('top_header') &&
					!(function_exists('is_account_page') && is_account_page() && !is_user_logged_in())
				) {
					get_template_part( 'inc/top_header' );
				}


				// Header

				if (get_theme_option('header')) {
					get_template_part( 'inc/header' );
				}
				?>
			</div>


			<?php
			// Title wrapper

			if (is_title_wrapper() && have_posts()) {
				get_template_part( 'inc/title_wrapper' );
			}
			?>

		</header>

		<div class="main-cnts-before">
			<?php get_dynamic_area(get_theme_option('content--dynamic_area__before')); ?>
		</div>

		<div id="main-content" class="main-cnts-w">
			<?php if (!(is_singular(array('product')) && !$sidebar_location)) { ?><div class="container"><?php } ?>
				<?php if ($sidebar_location) { ?><div class="row"><?php } ?>
					<?php
					if ($sidebar_location == 'both') {
						?>
						<aside class="widget-area sidebar col-sm-3 col-lg-2" role="complementary">
							<?php dynamic_sidebar('sidebar_left'); ?>
						</aside>
						<?php
					}
					?>

					<main class="main-cnts <?php
						if ($sidebar_location == 'left' || $sidebar_location == 'right') {
							?> col-sm-8 col-md-9 <?php
							if ($expanded_content) { ?>col-xl-10 <?php }
						} elseif ($sidebar_location == 'both' || $sidebar_location == 'both_left' || $sidebar_location == 'both_right') {
							?> col-sm-6 col-lg-8 <?php
						}
						if ($sidebar_location == 'left' || $sidebar_location == 'both_left') {
							?> pull-right-sm <?php
						}
					?>">
