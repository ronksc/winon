<?php
/**
 * The template for displaying quick view product content.
 *
 * @author  TVDA
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}
?>
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class('product __quick-view js--product'); ?>>

	<div class="row __inline">
		<div class="col-sm-6 col-md-5 __inline relative"><div>
			<?php
			/**
			 * woocommerce_before_single_product_summary hook
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			?>
		</div></div>

		<div class="col-sm-6 col-md-7 __inline"><div>
			<div class="product_summary-w">
				<div class="product_summary">
					<?php
					/**
					 * woocommerce_single_product_summary hook
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_rating - 15
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_sharing - 50
					 */
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
					do_action( 'woocommerce_single_product_summary' );
					?>
				</div>
			</div>
		</div></div>
	</div>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->
<a href="#" class="popup-quick-view_close-btn js--popup-quick-view-close"><span class="icon-cross"></span></a>
