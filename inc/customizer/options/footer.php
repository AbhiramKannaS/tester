<?php
/**
 * Footer Options.
 *
 * @package Nari
 */

// Footer Section.
$wp_customize->add_section( 'section_footer',
	array(
		'title'      => esc_html__( 'Footer', 'nari' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
		'default'           => $default['copyright_text'],
		'sanitize_callback' => 'nari_sanitize_textarea',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
		'label'    => esc_html__( 'Copyright Text', 'nari' ),
		'section'  => 'section_footer',
		'type'     => 'textarea',
		'priority' => 100,
	)
);
