<?php
/**
 * Dynamic Options hook.
 *
 * This file contains option values from customizer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nari
 */

if ( ! function_exists( 'nari_dynamic_styles' ) ) :
	function nari_dynamic_styles() {

		$custom_css = "";

		/*--------------------------------------------------------------
		## Logo Height
		--------------------------------------------------------------*/
		$logo_height =  nari_get_option( 'logo_height' );

		$custom_css .= "
		.site-branding img {
			max-height: {$logo_height}px;
		}";

		/*--------------------------------------------------------------
		## Banner Height
		--------------------------------------------------------------*/
		$banner_height =  nari_get_option( 'banner_height' );

		$custom_css .= "
		.site-hero {
			min-height: {$banner_height}px;
		}";

		wp_add_inline_style( 'nari-style', $custom_css );
	}
endif;

add_action( 'wp_enqueue_scripts', 'nari_dynamic_styles' );

