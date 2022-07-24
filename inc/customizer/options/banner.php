<?php
/**
 * Banner Options.
 *
 * @package Nari
 */

// Banner Section.
$wp_customize->add_section( 'section_banner',
	array(
		'title'      => esc_html__( 'Banner', 'nari' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting enable_banner.
$wp_customize->add_setting( 'theme_options[enable_banner]',
	array(
		'default'           => $default['enable_banner'],
		'sanitize_callback' => 'nari_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_banner]',
	array(
		'label'    			=> esc_html__( 'Enable Banner', 'nari' ),
		'section'  			=> 'section_banner',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting banner_height.
$wp_customize->add_setting( 'theme_options[banner_height]',
	array(
		'default'           => $default['banner_height'],
		'sanitize_callback' => 'nari_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[banner_height]',
	array(
		'label'       => esc_html__( 'Banner Height', 'nari' ),
		'section'     => 'section_banner',
		'type'        => 'number',
		'priority'    => 100,
		'input_attrs' => array( 'min' => 90, 'max' => 750, 'style' => 'width: 75px;' ),
		'active_callback' 	=> 'nari_is_banner_active',
	)
);

// Setting banner_image.
$wp_customize->add_setting( 'theme_options[banner_image]',
	array(
		'default'           => $default['banner_image'],
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'theme_options[banner_image]',
		array(
			'label'    => esc_html__( 'Banner Image', 'nari' ),
			'section'  => 'section_banner',
			'priority' => 100,
			'active_callback' 	=> 'nari_is_banner_active',
		)
	)
);

// Setting banner_heading.
$wp_customize->add_setting( 'theme_options[banner_heading]',
	array(
		'default'           => $default['banner_heading'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[banner_heading]',
	array(
		'label'    => esc_html__( 'Heading', 'nari' ),
		'section'  => 'section_banner',
		'type'     => 'text',
		'priority' => 100,
		'active_callback' 	=> 'nari_is_banner_active',
	)
);

// Setting banner_button.
$wp_customize->add_setting( 'theme_options[banner_button]',
	array(
		'default'           => $default['banner_button'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[banner_button]',
	array(
		'label'    => esc_html__( 'Button Text', 'nari' ),
		'section'  => 'section_banner',
		'type'     => 'text',
		'priority' => 100,
		'active_callback' 	=> 'nari_is_banner_active',
	)
);

// Setting banner_link.
$wp_customize->add_setting( 'theme_options[banner_link]',
	array(
		'default'           => $default['banner_link'],
		'sanitize_callback' => 'sanitize_url',
	)
);
$wp_customize->add_control( 'theme_options[banner_link]',
	array(
		'label'    => esc_html__( 'Button Link', 'nari' ),
		'section'  => 'section_banner',
		'type'     => 'text',
		'priority' => 100,
		'active_callback' 	=> 'nari_is_banner_active',
	)
);
