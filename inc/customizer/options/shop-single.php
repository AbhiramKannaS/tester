<?php
/**
 * Shop Single Options.
 *
 * @package Nari
 */

// Shop Single Section.
$wp_customize->add_section( 'section_shop_single',
	array(
		'title'      => esc_html__( 'Shop Single (Product Detail)', 'nari' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting enable_gallery_zoom.
$wp_customize->add_setting( 'theme_options[enable_gallery_zoom]',
	array(
		'default'           => $default['enable_gallery_zoom'],
		'sanitize_callback' => 'nari_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_gallery_zoom]',
	array(
		'label'    			=> esc_html__( 'Enable Image Zoom', 'nari' ),
		'section'  			=> 'section_shop_single',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting disable_related_products.
$wp_customize->add_setting( 'theme_options[disable_related_products]',
	array(
		'default'           => $default['disable_related_products'],
		'sanitize_callback' => 'nari_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[disable_related_products]',
	array(
		'label'    			=> esc_html__( 'Disable Related Products', 'nari' ),
		'section'  			=> 'section_shop_single',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);
