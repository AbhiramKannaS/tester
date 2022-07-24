<?php
/**
 * Breadcrumb Options.
 *
 * @package Nari
 */

// Breadcrumb Section.
$wp_customize->add_section( 'section_breadcrumb',
	array(
		'title'      => esc_html__( 'Breadcrumb', 'nari' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting enable_breadcrumb.
$wp_customize->add_setting( 'theme_options[enable_breadcrumb]',
	array(
		'default'           => $default['enable_breadcrumb'],
		'sanitize_callback' => 'nari_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_breadcrumb]',
	array(
		'label'    			=> esc_html__( 'Enable Breadcrumb', 'nari' ),
		'section'  			=> 'section_breadcrumb',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);


// Setting breadcrumb_type.
$wp_customize->add_setting( 'theme_options[breadcrumb_type]',
	array(
		'default'           => $default['breadcrumb_type'],
		'sanitize_callback' => 'nari_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[breadcrumb_type]',
	array(
		'label'    => esc_html__( 'Breadcrumb Type', 'nari' ),
		'section'  => 'section_breadcrumb',
		'type'     => 'radio',
		'priority' => 100,
		'choices'  => array(
				'rankmath' => esc_html__( 'Rank Math', 'nari' ),
				'yoast' => esc_html__( 'Yoast SEO', 'nari' ),
			),
		'active_callback' 	=> 'nari_is_breadcrumb_active',
	)
);
