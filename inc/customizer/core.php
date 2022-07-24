<?php
/**
 * Core functions.
 *
 * @package Nari
 */

if ( ! function_exists( 'nari_get_option' ) ) :

    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function nari_get_option( $key ) {

        if ( empty( $key ) ) {
            return;
        }

        $nari_default = nari_get_default_theme_options();

        $default = ( isset( $nari_default[ $key ] ) ) ? $nari_default[ $key ] : '';
        $theme_options = get_theme_mod( 'theme_options', $nari_default );
        $theme_options = array_merge( $nari_default, $theme_options );
        $value = '';

        if ( isset( $theme_options[ $key ] ) ) {
            $value = $theme_options[ $key ];
        }

        return $value;

    }

endif;

if ( ! function_exists( 'nari_get_default_theme_options' ) ) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function nari_get_default_theme_options() {

        $defaults = array();

        $defaults['logo_height']            = 50;
        $defaults['hide_site_title']        = false;
        $defaults['hide_tagline']      		= true;

        //banner
        $defaults['enable_banner']          = false;
        $defaults['banner_height']          = 550;
        $defaults['banner_image']     		= '';
        $defaults['banner_heading']         = esc_html__( 'Simple and Clean Blog Theme', 'nari' );
        $defaults['banner_button']          = esc_html__( 'View More', 'nari' );
        $defaults['banner_link']            = '';

        //featured posts
        $defaults['enable_featured_posts']  = false;
        $defaults['featured_posts_heading'] = esc_html__( 'Trending Articles', 'nari' );

        //breadcrumb
        $defaults['enable_breadcrumb']      = false;
        $defaults['breadcrumb_type']        = 'rankmath';

        // Shop page
        $defaults['shop_layout']       		= 'no-sidebar';
        $defaults['product_per_page']       = 9;
        $defaults['product_number']         = 3;
        $defaults['hide_product_sorting']   = false;

        // Shop single page
        $defaults['enable_gallery_zoom']    	= false;
        $defaults['disable_related_products']	= false;

        //blog
        $defaults['show_date']      		= true;
        $defaults['show_author']      		= true;
        $defaults['show_categories']      	= false;
        $defaults['show_excerpt']      		= true;
        $defaults['excerpt_length']         = 20;
        $defaults['readmore_text']          = esc_html__( 'Continue Reading', 'nari' );

        //blog single
        $defaults['show_date_single']      	= true;
        $defaults['show_author_single']     = true;
        $defaults['show_categories_single'] = true;
        $defaults['show_tags_single'] 		= true;
        $defaults['show_related_posts']     = true;
        $defaults['related_posts_heading']  = esc_html__( 'Related Posts', 'nari' );
        $defaults['related_posts_number']   = 2;
        $defaults['enable_social_share']    = true;

        $defaults['copyright_text']         = esc_html__( 'Copyright &copy; [the-year] [the-site-title]. All Rights Reserved.', 'nari' );

        return $defaults;
    }

endif;

//=============================================================
// Get all options in array
//=============================================================
if ( ! function_exists( 'nari_get_options' ) ) :

    /**
     * Get all theme options in array.
     *
     * @since 1.0.0
     *
     * @return array Theme options.
     */
    function nari_get_options() {

        $value = array();

        $value = get_theme_mods();

        return $value;

    }

endif;
