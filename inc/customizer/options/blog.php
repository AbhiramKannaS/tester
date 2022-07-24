<?php
/**
 * Blog Options.
 *
 * @package Nari
 */

// Blog Section.
$wp_customize->add_section( 'section_blog',
	array(
		'title'      => esc_html__( 'Blog/Archive', 'nari' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting show_date.
$wp_customize->add_setting( 'theme_options[show_date]',
	array(
		'default'           => $default['show_date'],
		'sanitize_callback' => 'nari_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_date]',
	array(
		'label'    			=> esc_html__( 'Show Date', 'nari' ),
		'section'  			=> 'section_blog',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting show_author.
$wp_customize->add_setting( 'theme_options[show_author]',
	array(
		'default'           => $default['show_author'],
		'sanitize_callback' => 'nari_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_author]',
	array(
		'label'    			=> esc_html__( 'Show Author', 'nari' ),
		'section'  			=> 'section_blog',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting show_categories.
$wp_customize->add_setting( 'theme_options[show_categories]',
	array(
		'default'           => $default['show_categories'],
		'sanitize_callback' => 'nari_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_categories]',
	array(
		'label'    			=> esc_html__( 'Show Categories', 'nari' ),
		'section'  			=> 'section_blog',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting show_excerpt.
$wp_customize->add_setting( 'theme_options[show_excerpt]',
	array(
		'default'           => $default['show_excerpt'],
		'sanitize_callback' => 'nari_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_excerpt]',
	array(
		'label'    			=> esc_html__( 'Show Excerpt', 'nari' ),
		'section'  			=> 'section_blog',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[excerpt_length]',
	array(
		'default'           => $default['excerpt_length'],
		'sanitize_callback' => 'nari_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[excerpt_length]',
	array(
		'label'       => esc_html__( 'Excerpt Length', 'nari' ),
		'section'     => 'section_blog',
		'type'        => 'number',
		'priority'    => 100,
		'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
		'active_callback' 	=> 'nari_is_show_excerpt_active',
	)
);

// Setting readmore_text.
$wp_customize->add_setting( 'theme_options[readmore_text]',
	array(
		'default'           => $default['readmore_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[readmore_text]',
	array(
		'label'    => esc_html__( 'Read More Text', 'nari' ),
		'section'  => 'section_blog',
		'type'     => 'text',
		'priority' => 100,
		'active_callback' 	=> 'nari_is_show_excerpt_active',
	)
);
