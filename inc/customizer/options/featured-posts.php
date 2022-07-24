<?php
/**
 * Featured Posts Options.
 *
 * @package Nari
 */

// Featured Posts Section.
$wp_customize->add_section( 'section_featured_posts',
	array(
		'title'      => esc_html__( 'Featured Posts', 'nari' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting enable_featured_posts.
$wp_customize->add_setting( 'theme_options[enable_featured_posts]',
	array(
		'default'           => $default['enable_featured_posts'],
		'sanitize_callback' => 'nari_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_featured_posts]',
	array(
		'label'    			=> esc_html__( 'Enable Featured Posts', 'nari' ),
		'section'  			=> 'section_featured_posts',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting featured_posts_heading.
$wp_customize->add_setting( 'theme_options[featured_posts_heading]',
	array(
		'default'           => $default['featured_posts_heading'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[featured_posts_heading]',
	array(
		'label'    => esc_html__( 'Heading', 'nari' ),
		'section'  => 'section_featured_posts',
		'type'     => 'text',
		'priority' => 100,
		'active_callback' 	=> 'nari_is_featured_posts_active',
	)
);

// Setting featured_posts_category.
$wp_customize->add_setting( 'theme_options[featured_posts_category]',
	array(
		'default'           => '',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Nari_Dropdown_Category_Control(
		$wp_customize,
		'theme_options[featured_posts_category]',
		array(
			'label'    => esc_html__( 'Select Category', 'nari' ),
			'section'  => 'section_featured_posts',
			'priority' => 100,
			'active_callback' 	=> 'nari_is_featured_posts_active',
		)
	)
);
