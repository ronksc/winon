<?php
/**
 * Single Product tabs
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) { ?>

	<div id="product-tabs">
		<div class="product-tabs-w">
			<ul class="product-tabs">
				<?php foreach ( $tabs as $key => $tab ) { ?>

					<li class="product-tabs-el <?php echo esc_attr($key); ?>_tab">
						<a href="#product-tabs-<?php echo esc_attr($key); ?>" class="product-tabs-el_lk"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></a>
					</li>

				<?php } ?>
				<?php if (get_theme_option('single_product--extra_tab')) { ?>

					<li class="product-tabs-el extra_tab">
						<a href="#product-tabs-extra" class="product-tabs-el_lk"><?php echo wp_kses(get_theme_option('single_product--extra_tab_title'), 'post'); ?></a>
					</li>

				<?php } ?>
			</ul>
		</div>
		<div class="product-tabs-cnt-w">
			<?php foreach ( $tabs as $key => $tab ) { ?>

				<div class="product-tabs-cnt" id="product-tabs-<?php echo esc_attr($key); ?>">
					<div class="container"><?php call_user_func( $tab['callback'], $key, $tab ); ?></div>
				</div>

			<?php } ?>
			<?php if (get_theme_option('single_product--extra_tab')) { ?>

				<div class="product-tabs-cnt" id="product-tabs-extra">
					<div class="container"><?php echo wp_kses(get_theme_option('single_product--extra_tab_content'), 'post'); ?></div>
				</div>

			<?php } ?>
		</div>
	</div>

<?php } ?>
