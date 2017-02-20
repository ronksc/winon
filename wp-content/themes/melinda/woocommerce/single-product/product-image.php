<?php
/**
 * Single Product Image
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $woocommerce, $product;

$product_id = esc_attr($product->id);

if ( has_post_thumbnail() ) {

	$images = array();
	$main_image = array();

	$image_index = 0;
	$image_id = get_post_thumbnail_id();

	$main_image['title'] = esc_attr(get_the_title($image_id));

	$image_full = wp_get_attachment_image_src( $image_id, 'full' );
	$main_image['large']['src'] = esc_url($image_full[0]);
	$main_image['large']['width'] = esc_attr($image_full[1]);
	$main_image['large']['height'] = esc_attr($image_full[2]);

	$image_shop_single = wp_get_attachment_image_src( $image_id, 'shop_single' );
	$main_image['medium']['src'] = esc_url($image_shop_single[0]);
	$main_image['medium']['width'] = esc_attr($image_shop_single[1]);
	$main_image['medium']['height'] = esc_attr($image_shop_single[2]);

	$image_thumbnail = wp_get_attachment_image_src( $image_id, 'shop_thumbnail' );
	$main_image['thumbnail']['src'] = esc_url($image_thumbnail[0]);
	$main_image['thumbnail']['width'] = esc_attr($image_thumbnail[1]);
	$main_image['thumbnail']['height'] = esc_attr($image_thumbnail[2]);

	$attachment_ids = $product->get_gallery_attachment_ids();

	if ( $attachment_ids ) {
		foreach ( $attachment_ids as $attachment_id ) {
			$attachment_full = wp_get_attachment_image_src( $attachment_id, 'full' );
			if ( ! $attachment_full )
				continue;

			$images[$attachment_id]['title'] = esc_attr( get_the_title( $attachment_id ) );

			$images[$attachment_id]['large']['src'] = esc_url($attachment_full[0]);
			$images[$attachment_id]['large']['width'] = esc_attr($attachment_full[1]);
			$images[$attachment_id]['large']['height'] = esc_attr($attachment_full[2]);

			$attachment_shop_single = wp_get_attachment_image_src( $attachment_id, 'shop_single' );
			$images[$attachment_id]['medium']['src'] = esc_url($attachment_shop_single[0]);
			$images[$attachment_id]['medium']['width'] = esc_attr($attachment_shop_single[1]);
			$images[$attachment_id]['medium']['height'] = esc_attr($attachment_shop_single[2]);

			$attachment_thumbnail = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
			$images[$attachment_id]['thumbnail']['src'] = esc_url($attachment_thumbnail[0]);
			$images[$attachment_id]['thumbnail']['width'] = esc_attr($attachment_thumbnail[1]);
			$images[$attachment_id]['thumbnail']['height'] = esc_attr($attachment_thumbnail[2]);
		}
?>

		<?php if (!defined('DOING_AJAX')) { ?>
			<div class="row">
				<div class="col-sm-2 hidden-xs">
					<ul id="product-slider-control-manual-<?php echo $product_id; ?>" class="flex-control-manual">
						<li><a href="#"><img src="<?php echo $main_image['thumbnail']['src'] ?>" alt="<?php echo $main_image['title'] ?>"></a></li>
						<?php foreach ( $images as $image ) { ?>
							<li><a href="#"><img src="<?php echo $image['thumbnail']['src'] ?>" alt="<?php echo $image['title'] ?>"></a></li>
						<?php } ?>
					</ul>
				</div>
				<div class="col-sm-10">
		<?php } ?>
					<div id="product-slider-<?php echo $product_id; ?>" class="flexslider">
						<ul class="slides js--slides">
							<li>
								<a
									itemprop="image"
									href="<?php echo $main_image['large']['src'] ?>"
									data-img-width="<?php echo $main_image['large']['width'] ?>"
									data-img-height="<?php echo $main_image['large']['height'] ?>"
									data-img-index="<?php echo $image_index++ ?>"
									data-pswp-uid="<?php echo $product_id; ?>"
									title="<?php echo $main_image['title'] ?>"
									class="js-pswp-img-lk product-img-lk"
								>
									<img src="<?php echo $main_image['medium']['src'] ?>" alt="<?php echo $main_image['title'] ?>">
								</a>
							</li>
							<?php foreach ( $images as $image ) { ?>
								<li>
									<a
										href="<?php echo $image['large']['src'] ?>"
										data-img-width="<?php echo $image['large']['width'] ?>"
										data-img-height="<?php echo $image['large']['height'] ?>"
										data-img-index="<?php echo $image_index++ ?>"
										data-pswp-uid="<?php echo $product_id; ?>"
										title="<?php echo $image['title'] ?>"
										class="js-pswp-img-lk product-img-lk"
									>
										<img src="<?php echo $image['medium']['src'] ?>" alt="<?php echo $image['title'] ?>">
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
		<?php if (defined('DOING_AJAX')) { ?>
			<script>
				(function($) {
					$(document).ready(function() {
						$('#product-slider-<?php echo $product_id; ?>').flexslider({
							animation: 'slide',
							slideshow: false,
							animationLoop: false
						});
					});
				})(jQuery);
			</script>
		<?php } else { ?>
				</div>
			</div>
			<script>
				(function($) {
					$(document).ready(function() {
						$('#product-slider-<?php echo $product_id; ?>').flexslider({
							animation: 'slide',
							slideshow: false,
							animationLoop: false,
							manualControls: '#product-slider-control-manual-<?php echo $product_id; ?> a'
						});
					});
				})(jQuery);
			</script>
		<?php } ?>

<?php
	} else {
?>
		<a
			itemprop="image"
			href="<?php echo $main_image['large']['src']; ?>"
			data-img-width="<?php echo $main_image['large']['width']; ?>"
			data-img-height="<?php echo $main_image['large']['height']; ?>"
			data-img-index="<?php echo $image_index; ?>"
			data-pswp-uid="<?php echo $product_id; ?>"
			title="<?php echo $main_image['title']; ?>"
			class="js-pswp-img-lk product-img-lk"
		>
			<img src="<?php echo $main_image['medium']['src']; ?>" alt="<?php echo $main_image['title'] ?>">
		</a>
<?php
	}

} else {

	echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s">', wc_placeholder_img_src(), esc_html__( 'Placeholder', 'woocommerce' ) ), $product_id );

}
?>