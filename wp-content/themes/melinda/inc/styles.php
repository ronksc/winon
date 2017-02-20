<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');

function get_css_font($option) {
	$font = get_theme_option($option);
	if (!empty($font)) {
		if (!empty($font['font-family']) && !empty($font['font-backup'])) {
			echo 'font-family:' . $font['font-family'] . ', ' . $font['font-backup'] . ';';
		}
		elseif (!empty($font['font-family'])) {
			echo 'font-family:' . $font['font-family'] . ';';
		}
		if (!empty($font['font-weight'])) {
			echo 'font-weight:' . $font['font-weight'] . ';';
		}
		if (!empty($font['font-style'])) {
			echo 'font-style:' . $font['font-style'] . ';';
		}
		if (!empty($font['text-transform'])) {
			echo 'text-transform:' . $font['text-transform'] . ';';
		}
		if (!empty($font['font-size'])) {
			echo 'font-size:' . $font['font-size'] . ';';
		}
		if (!empty($font['line-height'])) {
			echo 'line-height:' . $font['line-height'] . ';';
		}
		if (!empty($font['letter-spacing'])) {
			echo 'letter-spacing:' . $font['letter-spacing'] . ';';
		}
		if (!empty($font['color'])) {
			echo 'color:' . $font['color'] . ';';
		}
	}
	$font_family = get_theme_option($option . '__custom_family');
	if ($font_family) {
		echo 'font-family:' . $font_family . ';';
	}
}

function get_css_bg($option_1 = false, $option_2 = false) {
	$bg = get_theme_option($option_1);
	$bg_patterns = get_theme_option($option_2);
	if (!empty($bg)) {
		if (!empty($bg['background-color'])) {
			echo 'background-color:' . $bg['background-color'] . ';';
		}
		if (!empty($bg['background-repeat'])) {
			echo 'background-repeat:' . $bg['background-repeat'] . ';';
		}
		if (!empty($bg['background-size'])) {
			echo 'background-size:' . $bg['background-size'] . ';';
		}
		if (!empty($bg['background-attachment'])) {
			echo 'background-attachment:' . $bg['background-attachment'] . ';';
		}
		if (!empty($bg['background-position'])) {
			echo 'background-position:' . $bg['background-position'] . ';';
		}
		if (!empty($bg['background-image'])) {
			echo 'background-image:url(' . $bg['background-image'] . ');';
		}
		if (!empty($bg_patterns)) {
			echo 'background-image:url(' . $bg_patterns . ');background-size:auto;';
		}
	}
}

function get_css_border($option, $top = true, $right = true, $bottom = true, $left = true) {
	$border = get_theme_option($option);
	$border_color = get_theme_option($option . '_color');
	if (!empty($border)) {
		echo 'border-top-width:' . (
			$top &&
			!empty($border['border-top']) &&
			$border['border-top'] !== 'px'
			? $border['border-top'] : 0
		) . ';';
		echo 'border-right-width:' . (
			$right &&
			!empty($border['border-right']) &&
			$border['border-right'] !== 'px'
			? $border['border-right'] : 0
		) . ';';
		echo 'border-bottom-width:' . (
			$bottom &&
			!empty($border['border-bottom']) &&
			$border['border-bottom'] !== 'px'
			? $border['border-bottom'] : 0
		) . ';';
		echo 'border-left-width:' . (
			$left &&
			!empty($border['border-left']) &&
			$border['border-left'] !== 'px'
			? $border['border-left'] : 0
		) . ';';
		echo 'border-style:' . (!empty($border['border-style']) ? $border['border-style'] : 'solid') . ';';
		if (!empty($border_color['rgba'])) {
			echo 'border-color:' . $border_color['rgba'] . ';';
		} else {
			echo 'border-color:' . ($border['border-color'] ? $border['border-color'] : 'inherit') . ';';
		}
	}
}

function get_css_padding($option) {
	$padding = get_theme_option($option);
	if (
		isset($padding['padding-top']) &&
		$padding['padding-top'] !== 'px' &&
		$padding['padding-top'] !== ''
	) {
		echo 'padding-top:' . $padding['padding-top'] . ';';
	}
	if (
		isset($padding['padding-right']) &&
		$padding['padding-right'] !== 'px' &&
		$padding['padding-right'] !== ''
	) {
		echo 'padding-right:' . $padding['padding-right'] . ';';
	}
	if (
		isset($padding['padding-bottom']) &&
		$padding['padding-bottom'] !== 'px' &&
		$padding['padding-bottom'] !== ''
	) {
		echo 'padding-bottom:' . $padding['padding-bottom'] . ';';
	}
	if (
		isset($padding['padding-left']) &&
		$padding['padding-left'] !== 'px' &&
		$padding['padding-left'] !== ''
	) {
		echo 'padding-left:' . $padding['padding-left'] . ';';
	}
}

function get_css_color($option) {
	$color = get_theme_option($option);
	if (!empty($color)) {
		echo 'color:' . $color . ';';
	}
}

function adjustBrightness($hex, $steps) {
	// Steps should be between -255 and 255. Negative = darker, positive = lighter
	$steps = max(-255, min(255, $steps));

	// Normalize into a six character long hex string
	$hex = str_replace('#', '', $hex);
	if (strlen($hex) == 3) {
		$hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
	}

	// Split into three parts: R, G and B
	$color_parts = str_split($hex, 2);
	$return = '#';

	foreach ($color_parts as $color) {
		$color   = hexdec($color); // Convert to decimal
		$color   = max(0,min(255,$color + $steps)); // Adjust color
		$return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
	}

	return $return;
}

function hex2rgb($hex) {
	$hex = str_replace("#", "", $hex);

	if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);
	return implode(",", $rgb);
}


// Body

?>
html {
	<?php
	get_css_bg('general_styles--bg', 'general_styles--patterns');
	?>
}

body {
	<?php
	get_css_font('general_styles--font');
	?>
}


<?php
$is_font_second = false;

$font = get_theme_option('general_styles--font_second');
if (
	!empty($font['font-family']) ||
	!empty($font['font-weight']) ||
	!empty($font['font-style']) ||
	!empty($font['font-transform']) ||
	!empty($font['font-size']) ||
	!empty($font['line-height']) ||
	!empty($font['letter-spacing']) ||
	!empty($font['color'])
) {
	$is_font_second = true;
}
$font_family = get_theme_option('general_styles--font_second__custom_family');
if (!empty($font_family)) {
	$is_font_second = true;
}

if ($is_font_second) {
?>

	h1, h2, h3, h4, h5, h6,
	input[type='text'],
	input[type='date'],
	input[type='datetime'],
	input[type='datetime-local'],
	input[type='time'],
	input[type='month'],
	input[type='week'],
	input[type='password'],
	input[type='search'],
	input[type='email'],
	input[type='url'],
	input[type='tel'],
	input[type='number'],
	textarea,
	label[for],
	select,
	input[type='button'],
	input[type='reset'],
	input[type='submit'],
	button,
	.button,
	input[type='button'].__o,
	input[type='reset'].__o,
	input[type='submit'].__o,
	button.__o,
	.button.__o,
	input[type='button'].__light,
	input[type='reset'].__light,
	input[type='submit'].__light,
	button.__light,
	.button.__light,
	.logo_tx,
	.top-h-menu,
	.bottom-f-menu,
	.main-menu,
	.add-menu,
	.main-menu .menu-item-desc,
	.add-menu .menu-item-desc,
	.popup-menu,
	.t-w_h,
	.t-w_desc.__post,
	.t-w-post-category a,
	.t-w-post-author_h,
	.t-w-subcat-el_lk,
	.main-f-top .widget_h,
	.sidebar .widget_h,
	.widget_archive li a,
	.widget_categories li a,
	.widget_nav_menu li a,
	.widget_meta li a,
	.widget_text li a,
	.widget_pages li a,
	.widget_recent_comments li a,
	.widget_recent_entries li a,
	.widget_calendar caption,
	.widget_tag_cloud a,
	.widget_product_tag_cloud a,
	.widget_product_categories li a,
	.widget_price_filter button,
	.widget_layered_nav li a,
	.widget_layered_nav_filters li a,
	.widget_layered_nav_filters a,
	.product_list_widget li,
	.product_list_widget .quantity,
	.widget_shopping_cart .total strong,
	.minicart .total strong,
	.widget_shopping_cart .total .amount,
	.minicart .total .amount,
	.widget_shopping_cart .button:first-child,
	.minicart .button:first-child,
	.minicart_count,
	.lwa-title-sub,
	.lwa-info li,
	.share_tx,
	.share-alt_btn,
	.search-page p,
	.search-el_meta,
	.search-el_type,
	.no-results-page_lbl,
	.no-results-page_lk,
	.post-standard_date,
	.post-standard_date-month,
	.post-standard_h,
	.post-standard_category a,
	.post-standard_author-by,
	.post-standard_author-name,
	.post-standard_comments,
	.post-standard.__quote .post-standard_h,
	.post-standard.__link .post-standard_desc,
	.post-standard.__quote .post-standard_desc,
	.post-standard.__status .post-standard_desc,
	.post-grid_category a,
	.post-grid_h,
	.post-grid_meta,
	.post-grid.__quote .post-grid_h,
	.post-grid.__quote .post-grid_desc,
	.post-grid.__status .post-grid_desc,
	.post-masonry_category a,
	.post-masonry_h,
	.post-masonry_meta,
	.post-masonry.__quote .post-masonry_h,
	.post-masonry.__quote .post-masonry_desc,
	.post-masonry.__status .post-masonry_desc,
	.post-metro_category a,
	.post-metro_date,
	.post-metro.__link .post-metro_desc,
	.post-metro.__quote .post-metro_h,
	.post-metro.__quote .post-metro_desc,
	.post-metro.__status .post-metro_desc,
	.post-single-h,
	.post-single-tags_h,
	.post-single-tags a,
	.post-single-author_h,
	.posts-nav-prev a,
	.posts-nav-next a,
	.post-nav-prev_desc,
	.post-nav-next_desc,
	.post-nav-prev_h,
	.post-nav-next_h,
	.comments-h,
	.comment-date,
	.comment-reply,
	.comment-reply-title,
	.comment-navigation .nav-previous,
	.comment-navigation .nav-next,
	#cancel-comment-reply-link,
	.projects-cat_lk,
	.projects-el_h,
	.projects-el_cat,
	.amount,
	.price,
	.stock,
	.wc-lead,
	.wc-message_cnt a,
	.add_to_cart_inline .added_to_cart,
	.cat-lst-el_lbl,
	.cat-lst-el_btn-w .added_to_cart,
	.cat-lst-el-btn,
	.cat-lst-el-btn.__quick_view,
	.cat-lst-el_h,
	.cat-lst-el_price,
	.cat-lst-pagination,
	.products-related_h,
	.products-upsells_h,
	.product_lbl,
	.product_h,
	.product_review-lk,
	.product-variations_h,
	.product-tabs-el_lk,
	.product-comments-h,
	.product-comments-lst-el_author,
	.product-add-comment_lbl,
	.product-additional-info-el_h,
	.product-meta-el_h,
	.product-meta-el_cnt,
	.add-to-wishlist_tx,
	.cart-lst-el_h,
	.cart-lst-el_cnt.__product,
	.cart-coupon_h,
	.cart-coupon_it,
	.cart-totals_h,
	.cart-totals-lst-el_h,
	.cart-el-variation,
	.shipping-calculator-button,
	.cross-sells_h,
	.checkout-coupon_h,
	.checkout-coupon_it,
	.checkout-billing_h,
	.checkout-shipping_h,
	.checkout-review-order_h,
	.checkout-review-order_cnt th,
	.checkout-review-order_cnt .product-name,
	.checkout-payment ul label a,
	.woocommerce-MyAccount-navigation_h,
	.woocommerce-MyAccount-navigation ul li,
	.wc-account_h,
	.wc-account-address_h,
	.wc-account-address_edit,
	.wc-account-address-form_h,
	.wc-account-login_h,
	.wc-account-register_h,
	.wc-account-reset-password_h,
	.wc-account-edit_h,
	.wc-account-login_form_h,
	.wc-account-register_form_h,
	.wc-account-reset-password_form_h,
	.wc-account-edit_form_h,
	.wc-account-login_separator,
	.wc-account-login-tabs_lk,
	.wc-account-edit-password_h,
	.wc-account-orders_h,
	.wc-account-orders-el_h,
	.wc-account-order-card_h,
	.wc-account-order-el_h,
	.wc-account-order-el_cnt,
	.wc-account-order-el_cnt .variation,
	.track-order_h,
	.wc-thankyou-order-received,
	.ninja-forms-form label,
	.vc_general.vc_btn3,
	.vc_progress_bar .vc_general.vc_single_bar .vc_label,
	.uvc-heading .uvc-main-heading h1,
	.uvc-heading .uvc-main-heading h2,
	.uvc-heading .uvc-main-heading h3,
	.uvc-heading .uvc-main-heading h4,
	.uvc-heading .uvc-main-heading h5,
	.uvc-heading .uvc-main-heading h6,
	.uvc-sub-heading,
	.ult-ib-effect-style1 .ult-new-ib-title,
	.flip-box-wrap .flip-box h3,
	.flip-box-wrap .flip_link a,
	.ultb3-title,
	a.ultb3-btn,
	.ult_countdown,
	.wpb_row .wpb_column .wpb_wrapper .ult_countdown,
	.uvc-type-wrap,
	.stats-block .stats-desc,
	.ult_design_1.ult-cs-black .ult_pricing_table .ult_price_link .ult_price_action_button,
	.ult_design_1.ult-cs-red .ult_pricing_table .ult_price_link .ult_price_action_button,
	.ult_design_1.ult-cs-blue .ult_pricing_table .ult_price_link .ult_price_action_button,
	.ult_design_1.ult-cs-yellow .ult_pricing_table .ult_price_link .ult_price_action_button,
	.ult_design_1.ult-cs-green .ult_pricing_table .ult_price_link .ult_price_action_button,
	.ult_design_1.ult-cs-gray .ult_pricing_table .ult_price_link .ult_price_action_button,
	.ult_featured.ult_design_1 .ult_pricing_table:before,
	.ult_design_1 .ult_pricing_heading .cust-subhead,
	.ult_design_1 .ult_price_body_block,
	.ult_design_4 .ult_pricing_table .ult_pricing_heading h3,
	.ult_design_4 .ult_pricing_table .ult_price_link .ult_price_action_button,
	.vc_grid-filter.vc_grid-filter-default > .vc_grid-filter-item,
	.grid-without-img-el_date,
	.grid-without-img-alt-el_date,
	.grid-def-el_category a,
	.grid-def-el_h,
	.grid-def-el_meta,
	.team-member_job,
	.timeline-separator-text .sep-text,
	.timeline-block .timeline-header h3,
	.timeline-header-block .timeline-header h3,
	.dropcaps_1:first-letter,
	.dropcaps_2:first-letter,
	.dropcaps_3:first-letter,
	.dropcaps_4:first-letter,
	.dropcaps_5:first-letter,
	.dropcaps_6:first-letter,
	.dropcaps_7:first-letter,
	.dropcaps_8:first-letter,
	.dropcaps_9:first-letter,
	.dropcaps_1b:first-letter,
	.dropcaps_2b:first-letter,
	.dropcaps_3b:first-letter,
	.dropcaps_4b:first-letter,
	.dropcaps_5b:first-letter,
	.dropcaps_6b:first-letter,
	.dropcaps_7b:first-letter,
	.dropcaps_8b:first-letter,
	.dropcaps_9b:first-letter
	{
		<?php
		get_css_font('general_styles--font_second');
		?>
	}


	@media (min-width: 992px) {
		.wc-message_cnt a {
			<?php
			get_css_font('general_styles--font_second');
			?>
		}
	}
<?php
}


// Accent color

$accent_color = esc_attr(get_theme_option('general_styles--accent'));
if (!empty($accent_color)) {
	$accent_color_hover = adjustBrightness($accent_color, -33);
?>

	a,
	blockquote:before,
	label[for]:hover,
	label[for].__focus,
	.top-h-menu .current-menu-ancestor > a,
	.bottom-f-menu .current-menu-ancestor > a,
	.top-h-menu .current-menu-item > a,
	.bottom-f-menu .current-menu-item > a,
	.top-h-menu a:hover,
	.bottom-f-menu a:hover,
	.main-menu .menu-item .menu-item:hover > a,
	.add-menu .menu-item .menu-item:hover > a,
	.main-menu .menu-item .current-menu-ancestor > a,
	.add-menu .menu-item .current-menu-ancestor > a,
	.main-menu .menu-item .current-menu-item > a,
	.add-menu .menu-item .current-menu-item > a,
	.widget_archive a:hover,
	.widget_categories a:hover,
	.widget_nav_menu a:hover,
	.widget_meta a:hover,
	.widget_text a:hover,
	.widget_pages a:hover,
	.widget_recent_comments a:hover,
	.widget_recent_entries a:hover,
	.widget_product_categories a:hover,
	.widget_product_categories .current-cat a,
	.widget_price_filter button,
	.widget_layered_nav a:hover,
	.widget_layered_nav_filters a:hover,
	.product_list_widget a:hover,
	.product_list_widget .amount,
	.widget_shopping_cart .total .amount,
	.minicart .total .amount,
	.lwa-info a:hover,
	.share:hover .share_h,
	.widget .search-form_button:hover,
	.no-results-page_lbl,
	.no-results-page_lk,
	.post-standard_h a:hover,
	.posts-nav-prev:hover a,
	.posts-nav-next:hover a,
	.post-nav-prev_ic,
	.post-nav-next_ic,
	.post-nav-prev:hover .post-nav-prev_h,
	.post-nav-next:hover .post-nav-next_h,
	.projects-cat_lk.__active,
	.projects-el:hover .projects-el_lk,
	.cat-lst-el_price,
	.cat-lst-pagination a:hover,
	.product_price,
	.product .woocommerce-variation-price,
	.product-tabs-el_lk:hover,
	.ui-tabs-active .product-tabs-el_lk,
	.product-add-comment_lbl .required,
	.product-meta-el_cnt a:hover,
	.add-to-wishlist a:hover,
	.cart-lst-el_cnt.__product a:hover,
	.checkout-payment ul label a,
	.product .flex-direction-nav a:before,
	.vc_tta-accordion.vc_tta-style-outline.vc_tta-shape-square.vc_tta-color-black .vc_tta-panel .vc_tta-panel-title > a:hover,
	.aio-icon,
	.stats-block .stats-number,
	.stats-block .counter_prefix,
	.stats-block .counter_suffix,
	.ult_design_1 .ult_price_body_block .ult_price_body .ult_price_figure,
	.grid-without-img-el_h a:hover,
	.grid-def-el_h a:hover
	{
		color: <?php echo $accent_color; ?>;
	}


	.stats-block .counter_prefix,
	.stats-block .counter_suffix
	{
		color: <?php echo $accent_color; ?> !important;
	}


	@media (max-width: 991px) {
		.search-page .search-form_button:hover
		{
			color: <?php echo $accent_color; ?>;
		}
	}


	@media (min-width: 992px) {
		.widget_displaytweetswidget p:before
		{
			color: <?php echo $accent_color; ?>;
		}
	}


	::-moz-selection {
		background-color: <?php echo $accent_color; ?>;
	}

	::selection {
		background-color: <?php echo $accent_color; ?>;
	}

	input[type='button'],
	input[type='reset'],
	input[type='submit'],
	button,
	.button,
	.main-menu a:after,
	.add-menu a:after,
	.popup-menu .menu-item.__back a:hover,
	.popup-menu a:after,
	.t-w-post-category a,
	.widget_tag_cloud a:hover,
	.widget_product_tag_cloud a:hover,
	.widget_layered_nav .chosen a:hover:before,
	.widget_layered_nav_filters a:hover,
	.minicart_count,
	.share_lst,
	.search-el_type,
	.post-standard_category a,
	.post-standard.__quote,
	.post-standard.__status,
	.post-grid_category a,
	.post-grid.__quote,
	.post-grid.__status,
	.post-grid.__video .post-grid_img-w:after,
	.post-grid.__audio .post-grid_img-w:after,
	.post-masonry_category a,
	.post-masonry.__quote,
	.post-masonry.__status,
	.post-masonry.__video .post-masonry_img-w:after,
	.post-masonry.__audio .post-masonry_img-w:after,
	.post-metro.__quote,
	.post-metro.__status,
	.post-single-tags a:hover,
	.projects-el.__anim_5:before,
	.projects-el.__anim_5:after,
	.projects-el.__anim_5 .projects-el_img-w:before,
	.projects-el.__anim_5 .projects-el_img-w:after,
	.projects-el.__anim_6,
	.projects-el.__anim_6 .projects-el_cnt:before,
	.go_to_top:hover,
	.add_to_cart_inline .added_to_cart,
	.cat-lst-el-btn,
	.product-tabs-el_lk:after,
	.preload:not(.pace-done),
	.ui-slider .ui-slider-range,
	.vc_toggle_simple .vc_toggle_icon::after,
	.vc_toggle_simple .vc_toggle_icon::before,
	.vc_toggle_round .vc_toggle_icon,
	.vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon::before,
	.vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon::after,
	.vc_progress_bar .vc_general.vc_single_bar .vc_bar,
	.ult-ib-effect-style1:after,
	.flip-box-wrap .flip_link a,
	a.vc_single_image-wrapper.prettyphoto:after,
	.launch-demo a:after,
	.aio-icon.circle,
	.aio-icon.square,
	.ult_design_1.ult-cs-black .ult_pricing_table .ult_price_link .ult_price_action_button,
	.ult_design_1.ult-cs-red .ult_pricing_table .ult_price_link .ult_price_action_button,
	.ult_design_1.ult-cs-blue .ult_pricing_table .ult_price_link .ult_price_action_button,
	.ult_design_1.ult-cs-yellow .ult_pricing_table .ult_price_link .ult_price_action_button,
	.ult_design_1.ult-cs-green .ult_pricing_table .ult_price_link .ult_price_action_button,
	.ult_design_1.ult-cs-gray .ult_pricing_table .ult_price_link .ult_price_action_button,
	.ult_featured.ult_design_1 .ult_pricing_table:before,
	.ult_design_1 .ult_pricing_heading .cust-headformat:after,
	.ult_design_4 .ult_pricing_table .ult_price_link .ult_price_action_button,
	.ult-cs-black.ult_design_4 .ult_pricing_table .ult_price_link .ult_price_action_button:hover,
	.ubtn-top-bg .ubtn-hover,
	.ubtn-right-bg .ubtn-hover,
	.ubtn-bottom-bg .ubtn-hover,
	.ubtn-left-bg .ubtn-hover,
	.ubtn-center-hz-bg .ubtn-hover,
	.ubtn-center-vt-bg .ubtn-hover,
	.ubtn-center-dg-bg .ubtn-hover,
	.grid-without-img-alt-el:hover,
	.grid-def-el_category a,
	.team-member_soc-lk:hover,
	.timeline-feature-item .timeline-dot,
	.timeline-wrapper .timeline-dot,
	.timeline-line o,
	.timeline-line z,
	.timeline-separator-text .sep-text,
	.dropcaps_7:first-letter,
	.dropcaps_7b:first-letter,
	.dropcaps_9:first-letter,
	.dropcaps_9b:first-letter
	{
		background-color: <?php echo $accent_color; ?>;
	}


	.search-form-popup-w .search-form {
		background-color: rgba(<?php echo hex2rgb($accent_color); ?>,0.98);
	}


	.uavc-icons .aio-icon:hover,
	.vc_row .uavc-icons .aio-icon:hover
	{
		background: <?php echo $accent_color; ?> !important;
	}


	input[type='text'],
	input[type='date'],
	input[type='datetime'],
	input[type='datetime-local'],
	input[type='time'],
	input[type='month'],
	input[type='week'],
	input[type='password'],
	input[type='search'],
	input[type='email'],
	input[type='url'],
	input[type='tel'],
	input[type='number'],
	textarea
	{
		background-image: -webkit-linear-gradient(top, <?php echo $accent_color; ?> 0, <?php echo $accent_color; ?> 100%);
		background-image: linear-gradient(to bottom, <?php echo $accent_color; ?> 0, <?php echo $accent_color; ?> 100%);
	}


	.share_lst:after,
	.team-member_cnt,
	.dropcaps_8:first-letter,
	.dropcaps_8b:first-letter
	{
		border-top-color: <?php echo $accent_color; ?>;
	}


	.ult-cs-black.ult_design_4 .ult_pricing_table
	{
		border-top-color: <?php echo $accent_color; ?> !important;
	}


	.projects-cat_lk.__active,
	.vc_grid-filter.vc_grid-filter-default > .vc_grid-filter-item.vc_active,
	.dropcaps_8:first-letter,
	.dropcaps_8b:first-letter
	{
		border-bottom-color: <?php echo $accent_color; ?>;
	}


	.ui-slider .ui-slider-handle,
	.vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon,
	.vc_tta-accordion.vc_tta-style-outline.vc_tta-shape-square.vc_tta-color-black .vc_tta-controls-icon::before,
	.vc_tta-accordion.vc_tta-style-outline.vc_tta-shape-square.vc_tta-color-black .vc_tta-controls-icon::after,
	.vc_tta-accordion.vc_tta-style-outline.vc_tta-shape-square.vc_tta-color-black .vc_active .vc_tta-panel-heading .vc_tta-controls-icon::before,
	.vc_tta-accordion.vc_tta-style-outline.vc_tta-shape-square.vc_tta-color-black .vc_tta-panel-heading:focus .vc_tta-controls-icon::before,
	.vc_tta-accordion.vc_tta-style-outline.vc_tta-shape-square.vc_tta-color-black .vc_tta-panel-heading:hover .vc_tta-controls-icon::before,
	.vc_tta-accordion.vc_tta-style-outline.vc_tta-shape-square.vc_tta-color-black .vc_active .vc_tta-panel-heading .vc_tta-controls-icon::after,
	.vc_tta-accordion.vc_tta-style-outline.vc_tta-shape-square.vc_tta-color-black .vc_tta-panel-heading:focus .vc_tta-controls-icon::after,
	.vc_tta-accordion.vc_tta-style-outline.vc_tta-shape-square.vc_tta-color-black .vc_tta-panel-heading:hover .vc_tta-controls-icon::after,
	.vc_tta-tabs.vc_tta-style-outline.vc_tta-o-no-fill.vc_tta-color-black .vc_tta-tab.vc_active > a,
	.dropcaps_4:first-letter,
	.dropcaps_4b:first-letter
	{
		border-color: <?php echo $accent_color; ?>;
	}


	a:hover,
	.widget_price_filter button:hover,
	.checkout-payment ul label a:hover
	{
		color: <?php echo $accent_color_hover; ?>;
	}


	input[type='button']:hover,
	input[type='reset']:hover,
	input[type='submit']:hover,
	button:hover,
	.button:hover,
	.t-w-post-category a:hover,
	.post-standard_category a:hover,
	.post-grid_category a:hover,
	.post-masonry_category a:hover,
	.add_to_cart_inline .added_to_cart:hover,
	.cat-lst-el-btn:hover,
	.vc_toggle_simple .vc_toggle_title:hover .vc_toggle_icon::after,
	.vc_toggle_simple .vc_toggle_title:hover .vc_toggle_icon::before,
	.vc_toggle_round .vc_toggle_title:hover .vc_toggle_icon,
	.vc_toggle_round.vc_toggle_color_inverted .vc_toggle_title:hover .vc_toggle_icon::before,
	.vc_toggle_round.vc_toggle_color_inverted .vc_toggle_title:hover .vc_toggle_icon::after,
	.flip-box-wrap .flip_link a:hover,
	.ult_design_1.ult-cs-black .ult_pricing_table .ult_price_link .ult_price_action_button:hover,
	.ult_design_1.ult-cs-red .ult_pricing_table .ult_price_link .ult_price_action_button:hover,
	.ult_design_1.ult-cs-blue .ult_pricing_table .ult_price_link .ult_price_action_button:hover,
	.ult_design_1.ult-cs-yellow .ult_pricing_table .ult_price_link .ult_price_action_button:hover,
	.ult_design_1.ult-cs-green .ult_pricing_table .ult_price_link .ult_price_action_button:hover,
	.ult_design_1.ult-cs-gray .ult_pricing_table .ult_price_link .ult_price_action_button:hover,
	.grid-def-el_category a:hover
	{
		background-color: <?php echo $accent_color_hover; ?>;
	}


	.vc_toggle_round.vc_toggle_color_inverted .vc_toggle_title:hover .vc_toggle_icon
	{
		border-color: <?php echo $accent_color_hover; ?>;
	}

<?php } ?>


<?php
$boxed = get_theme_option('layout--boxed');
if ($boxed == 'boxed' || $boxed == 'boxed_laterals') {
?>

	@media (min-width: 992px) {
		.main-w {
			margin-left:auto;
			margin-right:auto;
			max-width:992px;
			<?php if ($boxed == 'boxed') { ?>
				margin-top:45px;
				margin-bottom:45px;
			<?php } ?>
		}

		.main-h-bottom.__fixed {
			width:100%!important;
		}

		.main-cnts-w {
			overflow:hidden;
		}
	}

	@media (min-width: 1200px) {
		.main-w {
			max-width:1200px;
		}
	}

	@media (min-width: 1260px) {
		.main-w {
			max-width:1260px;
		}
	}

<?php
} elseif ($boxed == 'bordered') {
	$border = get_theme_option('layout--border');
	if (!empty($border)) {
?>

	@media (min-width: 992px) {
		.main-w {
			<?php
			echo 'margin-top:' . (
				!empty($border['border-top']) && $border['border-top'] !== 'px'
				? $border['border-top'] : 0) . ';';
			echo 'margin-right:' . (
				!empty($border['border-right']) && $border['border-right'] !== 'px'
				? $border['border-right'] : 0) . ';';
			echo 'margin-bottom:' . (
				!empty($border['border-bottom']) && $border['border-bottom'] !== 'px'
				? $border['border-bottom'] : 0) . ';';
			echo 'margin-left:' . (
				!empty($border['border-left']) && $border['border-left'] !== 'px'
				? $border['border-left'] : 0) . ';';
			?>
		}

		.main-h-bottom.__fixed {
			<?php
			echo 'top:' . (
				!empty($border['border-top']) && $border['border-top'] !== 'px'
				? $border['border-top'] : 0) . ';';
			echo 'left:' . (
				!empty($border['border-left']) && $border['border-left'] !== 'px'
				? $border['border-left'] : 0) . ';';
			echo 'right:' . (
				!empty($border['border-right']) && $border['border-right'] !== 'px'
				? $border['border-right'] : 0) . ';';
			?>
		}

		.main-cnts-w {
			overflow:hidden;
		}

		.post-nav-prev.__fixed {
			<?php
			echo 'left:' . (
				!empty($border['border-left']) && $border['border-left'] !== 'px'
				? $border['border-left'] : 0) . ';';
			?>
		}

		.post-nav-next.__fixed {
			<?php
			echo 'right:' . (
				!empty($border['border-right']) && $border['border-right'] !== 'px'
				? $border['border-right'] : 0) . ';';
			?>
		}

		.vc_row[data-vc-stretch-content] {
			<?php
			echo 'border-left:' . (
				!empty($border['border-left']) && $border['border-left'] !== 'px'
				? $border['border-left'] : 0) . ' solid transparent !important;';
			echo 'border-right:' . (
				!empty($border['border-right']) && $border['border-right'] !== 'px'
				? $border['border-right'] : 0) . ' solid transparent !important;';
			?>
			background-clip:padding-box;
		}

		.main-brd.__top {
			<?php
			get_css_border('layout--border', true, false, false, false);
			?>
		}
		.main-brd.__right {
			<?php
			get_css_border('layout--border', false, true, false, false);
			?>
		}
		.main-brd.__bottom {
			<?php
			get_css_border('layout--border', false, false, true, false);
			?>
		}
		.main-brd.__left {
			<?php
			get_css_border('layout--border', false, false, false, true);
			?>
		}
	}

<?php
	}
}


if (get_theme_option('layout--header_width') == 'compact') {
	?>
	.main-h-top > .container,
	.main-h-bottom > .container {
		max-width:970px;
	}
	<?php
}
elseif (get_theme_option('layout--header_width') == 'expanded') {
	?>
	@media (min-width: 768px) {
		.main-h-top > .container,
		.main-h-bottom > .container {
			width:100%;
			padding-right:30px;
			padding-left:30px;
		}
	}
	@media (min-width: 1200px) {
		.main-h-top > .container,
		.main-h-bottom:not(.__boxed) > .container {
			padding-right:60px;
			padding-left:60px;
		}
	}
	<?php
}

if (get_theme_option('layout--content_width') == 'compact') {
	?>
	.main-cnts-w > .container,
	.woocommerce.single-product .main-cnts-w > .main-cnts > .container,
	.woocommerce.single-product .main-cnts-w > .main-cnts > .product > .container,
	.main-cnts-before > .container,
	.main-cnts-after > .container {
		max-width:970px;
	}
	<?php
}
elseif (get_theme_option('layout--content_width') == 'expanded') {
	?>
	@media (min-width: 768px) {
		.main-cnts-w > .container,
		.main-cnts-before > .container,
		.main-cnts-after > .container {
			width:100%;
			max-width:1740px;
			padding-right:30px;
			padding-left:30px;
		}
		<?php if (get_post_type() == 'post') { ?>
			.blog .main-cnts-w > .container,
			.archive .main-cnts-w > .container {
				max-width:none;
			}
		<?php } ?>
	}
	@media (min-width: 1200px) {
		.main-cnts-w > .container,
		.main-cnts-before > .container,
		.main-cnts-after > .container {
			padding-right:60px;
			padding-left:60px;
		}
	}
	<?php
}

if (get_theme_option('layout--footer_width') == 'compact') {
	?>
	.main-f-top > .container,
	.main-f-bottom > .container {
		max-width:970px;
	}
	<?php
}
elseif (get_theme_option('layout--footer_width') == 'expanded') {
	?>
	@media (min-width: 768px) {
		.main-f-top > .container,
		.main-f-bottom > .container {
			width:100%;
			max-width:1740px;
			padding-right:30px;
			padding-left:30px;
		}
	}
	@media (min-width: 1200px) {
		.main-f-top > .container,
		.main-f-bottom > .container {
			padding-right:60px;
			padding-left:60px;
		}
	}
	<?php
}


// Top header styles

if (get_theme_option('top_header')) {
?>

	.main-h-top {
		<?php
		get_css_border('top_header_styles--border');

		get_css_padding('top_header_styles--padding');

		get_css_bg('top_header_styles--bg');
		?>
	}

	.main-h-top .mods_el-tx,
	.main-h-top .mods_el-menu,
	.main-h-top .mods_el-ic {
		<?php
		get_css_font('top_header_styles--font');
		?>
	}

<?php
}


// Header styles

if (get_theme_option('header')) {
?>

	.main-h-bottom-w {
		<?php
		get_css_border('header_styles--border');

		get_css_padding('header_styles--padding');
		?>
	}

	.main-h-bottom:not(.__fixed) .mods-w.__with_separator:before {
		<?php
		$border_color = get_theme_option('header_styles--border_color');
		if (!empty($border_color['rgba'])) {
			echo 'border-color:' . $border_color['rgba'] . ';';
		}
		?>
	}

	.main-h-bottom:not(.__fixed) .logo-w {
		<?php
		get_css_padding('header_styles--logo_padding');
		?>
	}

	.main-h-bottom:not(.__fixed) .mods {
		<?php
		get_css_padding('header_styles--mods_padding');
		?>
	}

	.main-h-bottom:not(.__fixed) .main-menu-w {
		<?php
		get_css_padding('header_styles--menu_padding');
		?>
	}

	.main-h-bottom:not(.__fixed) .add-menu-w {
		<?php
		get_css_padding('header_styles--additional_menu_padding');
		?>
	}

	.logo-w,
	.main-menu,
	.add-menu,
	.popup-menu,
	.mobile-menu,
	.main-h-bottom .mods_el-tx,
	.main-h-bottom .mods_el-ic {
		<?php
		get_css_font('header_styles--font');
		?>
	}

<?php
}


// Title wrapper styles

if (is_title_wrapper() && have_posts()) {
?>

	.t-w {
		<?php
		get_css_border('title_wrapper_styles--border');

		get_css_padding('title_wrapper_styles--padding');

		echo 'text-align:' . get_theme_option('title_wrapper_styles--align') . ';';
		?>
	}

	.t-w_bg {
		<?php
		get_css_bg('title_wrapper_styles--bg');
		?>
	}

	.breadcrumb {
		<?php
		get_css_font('title_wrapper_styles--font_breadcrumb');
		?>
	}

	.t-w_sub-h,
	.t-w_subcat {
		<?php
		$sub_header_color = get_theme_option('title_wrapper_styles--font_title');
		if (!empty($sub_header_color['color'])) {
			echo 'color:' . $sub_header_color['color'] . ';';
		}
		?>
	}

	.t-w_h {
		<?php
		get_css_font('title_wrapper_styles--font_title');
		?>
	}

	.t-w_desc {
		<?php
		get_css_font('title_wrapper_styles--font_desc');
		?>
	}

	@media (min-width: 768px) {
		.t-w_desc {
			<?php
			echo 'margin-' . get_theme_option('title_wrapper_styles--align') . ':0;';
			?>
		}
	}

<?php
}


// Content styles

?>
.main-cnts-w {
	<?php
	get_css_border('content_styles--border');

	get_css_padding('content_styles--padding');
	?>
}
<?php


// Footer styles

if (get_theme_option('footer')) {
?>

	.main-f-top {
		<?php
		get_css_border('footer_styles--border');

		get_css_padding('footer_styles--padding');

		get_css_bg('footer_styles--bg', 'footer_styles--patterns');

		get_css_font('footer_styles--font');
		?>
	}

	.main-f-top .widget_h,
	.main-f-top .widget .fa,
	.rpwwt-widget ul li a {
		<?php
		get_css_font('footer_styles--font_widget');
		?>
	}

<?php
}


// Bottom footer styles

if (get_theme_option('bottom_footer')) {
?>

	.main-f-bottom {
		<?php
		get_css_border('bottom_footer_styles--border');

		get_css_padding('bottom_footer_styles--padding');

		get_css_bg('bottom_footer_styles--bg', 'bottom_footer_styles--patterns');
		?>
	}

	.main-f-bottom .mods_el-tx,
	.main-f-bottom .mods_el-menu,
	.main-f-bottom .mods_el-ic {
		<?php
		get_css_font('bottom_footer_styles--font');
		?>
	}

<?php
}
?>
