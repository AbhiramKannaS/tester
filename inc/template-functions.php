<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Nari
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function nari_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	//Get shop layout sidebar or no sidebar
	$shop_layout = nari_get_option( 'shop_layout' );
	if( 'no-sidebar' === $shop_layout && class_exists( 'WooCommerce' ) && ( is_woocommerce() || is_cart() || is_checkout() ) ){
		$classes[] = 'full-width-shop';
	}

	//Adds a class if banner is disabled
	$enable_banner = nari_get_option( 'enable_banner' );
	if( false === $enable_banner ){
		$classes[] = 'banner-disabled';
	}

	return $classes;
}
add_filter( 'body_class', 'nari_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function nari_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'nari_pingback_header' );

//=============================================================
// Add a dropdown icon to header menu.
//=============================================================

add_filter( 'nav_menu_item_title', 'nari_add_dropdown_icons', 10, 4 );

if ( ! function_exists( 'nari_add_dropdown_icons' ) ) {

	function nari_add_dropdown_icons( $title, $item, $args, $depth ) {

		$icon = '<svg role="img" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none" fill-rule="evenodd" stroke-linecap="square"/></svg>';

		if ( 'menu-1' === $args->theme_location && (0 === $depth || 1 === $depth) ) {
			foreach ( $item->classes as $value ) {
				if ( 'menu-item-has-children' === $value || 'page_item_has_children' === $value ) {
					$title = $title . '<span role="presentation" class="dropdown-menu-toggle">' . $icon . '</span>';
				}
			}
		}

		return $title;

	}

}

//=============================================================
// Function to change default excerpt
//=============================================================
if ( ! function_exists( 'nari_implement_excerpt_length' ) ) :

	/**
	 * Implement excerpt length.
	 *
	 * @since 1.0.0
	 *
	 * @param int $length The number of words.
	 * @return int Excerpt length.
	 */
	function nari_implement_excerpt_length( $length ) {

		$excerpt_length = nari_get_option( 'excerpt_length' );

		if ( absint( $excerpt_length ) > 0 ) {
			$length = absint( $excerpt_length );
		}
		return $length;

	}
endif;

if ( ! function_exists( 'nari_content_more_link' ) ) :

	/**
	 * Implement read more in content.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more_link Read More link element.
	 * @param string $more_link_text Read More text.
	 * @return string Link.
	 */
	function nari_content_more_link( $more_link, $more_link_text ) {

		$read_more_text = nari_get_option( 'readmore_text' );

		if ( ! empty( $read_more_text ) ) {

			$more_link = str_replace( $more_link_text, esc_html( $read_more_text ), $more_link );

		}

		return $more_link;

	}

endif;

if ( ! function_exists( 'nari_implement_read_more' ) ) :

	/**
	 * Implement read more in excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more The string shown within the more link.
	 * @return string The excerpt.
	 */
	function nari_implement_read_more( $more ) {

		$output = $more;

		$read_more_text = nari_get_option( 'readmore_text' );

		if ( ! empty( $read_more_text ) ) {

			$output = '&hellip;<p><a href="' . esc_url( get_permalink() ) . '" class="btn-more">' . esc_html( $read_more_text ) . '<span class="arrow-more">&rarr;</span></a></p>';

		}

		return $output;

	}
endif;

if ( ! function_exists( 'nari_hook_read_more_filters' ) ) :

	/**
	 * Hook read more and excerpt length filters.
	 *
	 * @since 1.0.0
	 */
	function nari_hook_read_more_filters() {

		add_filter( 'excerpt_length', 'nari_implement_excerpt_length', 999 );
		add_filter( 'the_content_more_link', 'nari_content_more_link', 10, 2 );
		add_filter( 'excerpt_more', 'nari_implement_read_more' );

	}
endif;
add_action( 'wp', 'nari_hook_read_more_filters' );

//=============================================================
// Shortcode used in footer copyright
//=============================================================
if ( ! function_exists( 'nari_apply_theme_shortcode' ) ) :

	/**
	 * Apply theme shortcode.
	 *
	 * @since 1.0.0
	 *
	 * @param string $string Content.
	 * @return string Modified content.
	 */
	function nari_apply_theme_shortcode( $string ) {

		if ( empty( $string ) ) {
			return $string;
		}

		$search = array( '[the-year]', '[the-site-title]' );

		$replace = array(
			date_i18n( esc_html_x( 'Y', 'year date format', 'nari' ) ),
			esc_html( get_bloginfo( 'name', 'display' ) ),
		);

		$string = str_replace( $search, $replace, $string );

		return $string;

	}

endif;

//=============================================================
// Menu Fallback function
//=============================================================

if ( !function_exists('nari_menu_fallback') ) :

function nari_menu_fallback(){

	echo '<ul id="menu-main-menu" class="menu">';
		echo '<li class="menu-item"><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'nari' ). '</a></li>';
		wp_list_pages( array(
			'title_li' => '',
			'depth'    => 1,
			'number'   => 5,
		) );
		echo '</ul>';

}

endif;
