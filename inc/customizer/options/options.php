<?php
/**
 * Options.
 *
 * @package Nari
 */

$default = nari_get_default_theme_options();

// Add Theme Options Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
		'title'      => esc_html__( 'Theme Options', 'nari' ),
		'priority'   => 80,
	)
);

// Load main header options.
require_once trailingslashit( get_template_directory() ) . '/inc/customizer/options/header.php';

// Load banner options.
require_once trailingslashit( get_template_directory() ) . '/inc/customizer/options/banner.php';

// Load featured posts options.
require_once trailingslashit( get_template_directory() ) . '/inc/customizer/options/featured-posts.php';

// Load breadcrumb options.
require_once trailingslashit( get_template_directory() ) . '/inc/customizer/options/breadcrumb.php';

// Load blog options.
require_once trailingslashit( get_template_directory() ) . '/inc/customizer/options/blog.php';

// Load blog single options.
require_once trailingslashit( get_template_directory() ) . '/inc/customizer/options/blog-single.php';

// Load shop page options if woocommerce is active.
if( class_exists( 'WooCommerce' ) ){
	require_once trailingslashit( get_template_directory() ) . '/inc/customizer/options/shop.php';
	require_once trailingslashit( get_template_directory() ) . '/inc/customizer/options/shop-single.php';
}

// Load footer options.
require_once trailingslashit( get_template_directory() ) . '/inc/customizer/options/footer.php';
