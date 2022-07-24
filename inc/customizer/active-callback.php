<?php
/**
 * Active Callback functions.
 *
 * @package Nari
 */

if ( ! function_exists( 'nari_is_show_additional_btn_active' ) ) :

	/**
	 * Check if show additional button is active in header.
	 */
	function nari_is_show_additional_btn_active( $control ) {

		if ( true === $control->manager->get_setting( 'theme_options[show_additional_btn]' )->value() ) {
			return true;
		} else {
			return false;
		}
	}

endif;

if ( ! function_exists( 'nari_is_banner_active' ) ) :

	/**
	 * Check if banner is active.
	 */
	function nari_is_banner_active( $control ) {

		if ( true === $control->manager->get_setting( 'theme_options[enable_banner]' )->value() ) {
			return true;
		} else {
			return false;
		}
	}

endif;

if ( ! function_exists( 'nari_is_featured_posts_active' ) ) :

	/**
	 * Check if featured posts is active.
	 */
	function nari_is_featured_posts_active( $control ) {

		if ( true === $control->manager->get_setting( 'theme_options[enable_featured_posts]' )->value() ) {
			return true;
		} else {
			return false;
		}
	}

endif;

if ( ! function_exists( 'nari_is_breadcrumb_active' ) ) :

	/**
	 * Check if breadcrumb is active.
	 */
	function nari_is_breadcrumb_active( $control ) {

		if ( true === $control->manager->get_setting( 'theme_options[enable_breadcrumb]' )->value() ) {
			return true;
		} else {
			return false;
		}
	}

endif;

if ( ! function_exists( 'nari_is_layout_grid_active' ) ) :

	/**
	 * Check if blog layout grid is active.
	 */
	function nari_is_layout_grid_active( $control ) {

		if ( 'grid' === $control->manager->get_setting( 'theme_options[global_layout]' )->value() ) {
			return true;
		} else {
			return false;
		}
	}

endif;

if ( ! function_exists( 'nari_is_show_excerpt_active' ) ) :

	/**
	 * Check if show excerpt is active.
	 */
	function nari_is_show_excerpt_active( $control ) {

		if ( true === $control->manager->get_setting( 'theme_options[show_excerpt]' )->value() ) {
			return true;
		} else {
			return false;
		}
	}

endif;

if ( ! function_exists( 'nari_is_related_posts_active' ) ) :

	/**
	 * Check if related posts is active.
	 */
	function nari_is_related_posts_active( $control ) {

		if ( true === $control->manager->get_setting( 'theme_options[show_related_posts]' )->value() ) {
			return true;
		} else {
			return false;
		}
	}

endif;
