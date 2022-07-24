<?php
/**
 * Header Options.
 *
 * @package Nari
 */

// Setting logo_height
$wp_customize->add_setting( 'theme_options[logo_height]',
	array(
		'default'           => $default['logo_height'],
		'sanitize_callback' => 'nari_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[logo_height]',
	array(
		'label'       => esc_html__( 'Height of Logo (in px)', 'nari' ),
		'section'     => 'title_tagline',
		'type'        => 'number',
		'priority'    => 9,
		'input_attrs' => array( 'min' => 30, 'max' => 100 ),
	)
);

// Setting hide site title.
$wp_customize->add_setting( 'theme_options[hide_site_title]',
	array(
		'default'           => $default['hide_site_title'],
		'sanitize_callback' => 'nari_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[hide_site_title]',
	array(
		'label'    			=> esc_html__( 'Hide Site Title', 'nari' ),
		'section'  			=> 'title_tagline',
		'type'     			=> 'checkbox',
		'priority' 			=> 10,
	)
);

// Setting hide site tagline.
$wp_customize->add_setting( 'theme_options[hide_tagline]',
	array(
		'default'           => $default['hide_tagline'],
		'sanitize_callback' => 'nari_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[hide_tagline]',
	array(
		'label'    			=> esc_html__( 'Hide Tagline', 'nari' ),
		'section'  			=> 'title_tagline',
		'type'     			=> 'checkbox',
		'priority' 			=> 10,
	)
);
