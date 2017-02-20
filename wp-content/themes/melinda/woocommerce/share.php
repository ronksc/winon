<?php
/**
 * Share template
 *
 * @author  Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 2.0.13
 */

if ( ! defined( 'YITH_WCWL' ) ) {
	exit; // Exit if accessed directly
}

?>

<div class="share">
	<span class="share_h"><span class="share_icon icon-share"></span> <span class="share_tx"><?php echo wp_kses($share_title, 'post'); ?></span></span>
	<div class="share_lst-w __left">
		<ul class="share_lst">
			<?php if( $share_facebook_enabled ): ?>
				<li>
					<a target="_blank" class="facebook" href="https://www.facebook.com/sharer.php?s=100&amp;p%5Btitle%5D=<?php echo esc_url($share_link_title); ?>&amp;p%5Burl%5D=<?php echo esc_url($share_link_url); ?>&amp;p%5Bsummary%5D=<?php echo esc_url($share_summary); ?>&amp;p%5Bimages%5D%5B0%5D=<?php echo esc_url($share_image_url); ?>" title="<?php _e( 'Facebook', 'yith-woocommerce-wishlist' ); ?>">
						<i class="fa fa-facebook"></i>
					</a>
				</li>
			<?php endif; ?>

			<?php if( $share_twitter_enabled ): ?>
				<li>
					<a target="_blank" class="twitter" href="https://twitter.com/share?url=<?php echo esc_url($share_link_url); ?>&amp;text=<?php echo esc_url($share_twitter_summary); ?>" title="<?php esc_html_e( 'Twitter', 'yith-woocommerce-wishlist' ); ?>">
						<i class="fa fa-twitter"></i>
					</a>
				</li>
			<?php endif; ?>

			<?php if( $share_pinterest_enabled ): ?>
				<li>
					<a target="_blank" class="pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url($share_link_url); ?>&amp;description=<?php echo esc_url($share_summary); ?>&media=<?php echo esc_url($share_image_url); ?>" title="<?php esc_html_e( 'Pinterest', 'yith-woocommerce-wishlist' ); ?>" onclick="window.open(this.href); return false;">
						<i class="fa fa-pinterest"></i>
					</a>
				</li>
			<?php endif; ?>

			<?php if( $share_googleplus_enabled ): ?>
				<li>
					<a target="_blank" class="googleplus" href="https://plus.google.com/share?url=<?php echo esc_url($share_link_url); ?>&amp;title=<?php echo esc_url($share_link_title); ?>" title="<?php esc_html_e( 'Google+', 'yith-woocommerce-wishlist' ); ?>" onclick='javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;'>
						<i class="fa fa-google-plus"></i>
					</a>
				</li>
			<?php endif; ?>

			<?php if( $share_email_enabled ): ?>
				<li>
					<a class="email" href="mailto:?subject=<?php echo urlencode( apply_filters( 'yith_wcwl_email_share_subject', esc_attr__( 'I wanted you to see this site', 'yith-woocommerce-wishlist' ) ) ); ?>&amp;body=<?php echo apply_filters( 'yith_wcwl_email_share_body', $share_link_url ); ?>&amp;title=<?php echo esc_url($share_link_title); ?>" title="<?php esc_attr_e( 'Email', 'yith-woocommerce-wishlist' ); ?>">
						<i class="fa fa-envelope"></i>
					</a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</div>
