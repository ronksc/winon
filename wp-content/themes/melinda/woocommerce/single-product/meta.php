<?php
/**
 * Single Product Meta
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

?>
<div class="product-meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="product-meta-el sku_wrapper"><span class="product-meta-el_h"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?></span> <span class="product-meta-el_cnt sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>

	<?php endif; ?>

	<?php echo wp_kses( $product->get_categories( ', ', '<span class="product-meta-el posted_in"><span class="product-meta-el_h">' . _n( 'Category:', 'Categories:', $cat_count, 'woocommerce' ) . '</span> <span class="product-meta-el_cnt">', '</span></span>' ), 'post'); ?>

	<?php echo wp_kses( $product->get_tags( ', ', '<span class="product-meta-el tagged_as"><span class="product-meta-el_h">' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) . '</span> <span class="product-meta-el_cnt">', '</span></span>' ), 'post'); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
