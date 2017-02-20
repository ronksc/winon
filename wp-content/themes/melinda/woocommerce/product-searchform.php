<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see         http://docs.woothemes.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<div class="search-form js--show-me">
	<form
		role="search"
		method="get"
		class="searchform"
		action="<?php echo esc_url(home_url('/')); ?>"
	>
		<input
			class="search-form_it"
			type="search"
			value="<?php echo get_search_query(); ?>"
			name="s"
			placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'woocommerce' ); ?>"
			size="40"
			title="<?php echo esc_attr_x( 'Search for:', 'label', 'woocommerce' ); ?>"
		><button
			class="search-form_button"
			type="submit"
			value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>"
		><span class="icon-search search-form_button-ic"></span><span class="search-form_button-tx"><?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?></span></button>
		<input type="hidden" name="post_type" value="product">
	</form>
</div>