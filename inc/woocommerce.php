<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Nari
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */

function nari_woocommerce_setup() {
	add_theme_support('woocommerce');
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	$gallery_zoom = nari_get_option( 'enable_gallery_zoom' );

	if( 1 == $gallery_zoom ){
		add_theme_support( 'wc-product-gallery-zoom' );
	}

}
add_action( 'after_setup_theme', 'nari_woocommerce_setup' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function nari_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'nari_woocommerce_active_body_class' );

//=============================================================
// Change number of product per page
//=============================================================
add_filter( 'loop_shop_per_page', 'nari_new_loop_shop_per_page', 20 );

if (!function_exists('nari_new_loop_shop_per_page')) {

	function nari_new_loop_shop_per_page( $cols ) {

		$product_per_page 	= nari_get_option( 'product_per_page' );

		$cols = absint( $product_per_page );

		return $cols;
	}
}

//=============================================================
// Change number of product per row
//=============================================================

if (!function_exists('nari_product_columns')) {

	function nari_product_columns() {

		$product_number = nari_get_option( 'product_number' );

		return absint( $product_number ); // number of products per row

	}

}

add_filter('loop_shop_columns', 'nari_product_columns');

//=============================================================
// Change number of related product
//=============================================================

if (!function_exists('nari_related_products_args')) {

	function nari_related_products_args( $args ) {

		$product_number = nari_get_option( 'product_number' );

		$args['columns']   		= absint( $product_number );

		$args['posts_per_page'] = absint( $product_number ); // number of related products

		return $args;
	}

}

add_filter( 'woocommerce_output_related_products_args', 'nari_related_products_args' );

// Disable Related Products
$disable_related_products = nari_get_option( 'disable_related_products' );

if( true === $disable_related_products ){
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
}

//=============================================================
// Change number of upsell products
//=============================================================

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

add_action( 'woocommerce_after_single_product_summary', 'nari_output_upsells', 15 );

if ( ! function_exists( 'nari_output_upsells' ) ) {

	function nari_output_upsells() {

		$product_number = nari_get_option( 'product_number' );

	    woocommerce_upsell_display( absint( $product_number ), absint( $product_number ) ); // Display 3 products in rows of 3

	}

}

// Remove sidebar in woocommerce page and add conditional sidebar
$shop_layout = nari_get_option( 'shop_layout' );
if( 'no-sidebar' === $shop_layout ){
	remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
}

// Remove add to cart button from product listing
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'nari_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function nari_woocommerce_wrapper_before() {
		?>
			<main id="primary" class="site-main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'nari_woocommerce_wrapper_before' );

if ( ! function_exists( 'nari_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function nari_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'nari_woocommerce_wrapper_after' );

// Remove sorting option
$hide_product_sorting = nari_get_option( 'hide_product_sorting' );

if( true === $hide_product_sorting ){
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
}

// Remove Breadcrumb
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

if ( ! function_exists( 'nari_header_add_to_cart_fragment' ) ) {
	/**
	 * Update number of items in cart and total after Ajax
	 *
	 * @return void
	 */
	function nari_header_add_to_cart_fragment( $fragments ) {

		global $woocommerce;

		ob_start(); ?>

		<span class="cart-value nari-cart-fragment"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>

		<?php

		$fragments['span.nari-cart-fragment'] = ob_get_clean();

		return $fragments;

	}
}

add_filter( 'woocommerce_add_to_cart_fragments', 'nari_header_add_to_cart_fragment' );
