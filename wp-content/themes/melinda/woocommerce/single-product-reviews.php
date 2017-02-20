<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.3.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if (!comments_open()) {
	return;
}

?>
<div class="product-comments">
	<h5 class="product-comments-h"><?php
		if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_review_count() ) )
			printf( _n( '%s review for %s%s%s', '%s reviews for %s%s%s', $count, 'woocommerce' ), $count, '<span>', get_the_title(), '</span>' );
		else
			esc_html_e( 'Reviews', 'woocommerce' );
	?></h5>

	<?php if ( have_comments() ) : ?>

		<ul class="product-comments-lst">
			<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			echo '<nav class="product-comments-pagination">';
			paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
				'prev_text'    => '<i class="fa fa-arrow-left"></i>',
				'next_text'    => '<i class="fa fa-arrow-right"></i>',
				'type'         => 'list',
				'add_fragment' => '#product-tabs-reviews'
			) ) );
			echo '</nav>';
		endif; ?>

	<?php else : ?>

		<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'woocommerce' ); ?></p>

	<?php endif; ?>
</div>

<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>

	<div class="product-add-comment">
		<?php
		$commenter = wp_get_current_commenter();

		$comment_form = array(
			'title_reply'          => have_comments() ? esc_html__( 'Add a review', 'woocommerce' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), get_the_title() ),
			'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'woocommerce' ),
			'comment_notes_after'  => '',
			'fields'               => array(
				'author' => '<div class="row"><div class="col-md-6"><div class="comment-form-author"><label for="author" class="product-add-comment_lbl">' . esc_html__( 'Name', 'woocommerce' ) . '<span class="required">*</span></label> <input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" class="full-width" required></div></div>',
				'email'  => '<div class="col-md-6"><div class="comment-form-email"><label for="email" class="product-add-comment_lbl">' . esc_html__( 'Email', 'woocommerce' ) . '<span class="required">*</span></label> ' . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" class="full-width" required></div></div></div>',
			),
			'label_submit'  => esc_html__( 'Submit', 'woocommerce' ),
			'logged_in_as'  => '',
			'comment_field' => ''
		);

		if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
			$comment_form['must_log_in'] = '<div class="must-log-in">' . sprintf( wp_kses(__( 'You must be <a href="%s">logged in</a> to post a review.', 'woocommerce' ), 'post'), esc_url( $account_page_url ) ) . '</div>';
		}

		if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
			$comment_form['comment_field'] = '<div class="product-add-comment_rating"><span class="product-add-comment_lbl">' . esc_html__( 'Your Rating', 'woocommerce' ) .'</span>
				<label title="' . esc_html__( 'Very Poor', 'woocommerce' ) . '"><input name="rating" type="radio" value="1"><i class="fa fa-star"></i></label>
				<label title="' . esc_html__( 'Not that bad', 'woocommerce' ) . '"><input name="rating" type="radio" value="2"><i class="fa fa-star"></i><i class="fa fa-star"></i></label>
				<label title="' . esc_html__( 'Average', 'woocommerce' ) . '"><input name="rating" type="radio" value="3"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></label>
				<label title="' . esc_html__( 'Good', 'woocommerce' ) . '"><input name="rating" type="radio" value="4"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></label>
				<label title="' . esc_html__( 'Perfect', 'woocommerce' ) . '"><input name="rating" type="radio" value="5"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></label></div>';
		}

		$comment_form['comment_field'] .= '<div class="comment-form-comment"><label for="comment" class="product-add-comment_lbl">' . esc_html__( 'Your Review', 'woocommerce' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required class="full-width"></textarea></div>';


		comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
		?>
	</div>

<?php else : ?>

	<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>

<?php endif; ?>
