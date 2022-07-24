<?php
/**
 * Blog Single Options.
 *
 * @package Nari
 */

// Blog Single Section.
$wp_customize->add_section( 'section_blog_single',
	array(
		'title'      => esc_html__( 'Blog Detail (Single Post)', 'nari' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting show_date_single.
$wp_customize->add_setting( 'theme_options[show_date_single]',
	array(
		'default'           => $default['show_date_single'],
		'sanitize_callback' => 'nari_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_date_single]',
	array(
		'label'    			=> esc_html__( 'Show Date', 'nari' ),
		'section'  			=> 'section_blog_single',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting show_author_single.
$wp_customize->add_setting( 'theme_options[show_author_single]',
	array(
		'default'           => $default['show_author_single'],
		'sanitize_callback' => 'nari_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_author_single]',
	array(
		'label'    			=> esc_html__( 'Show Author', 'nari' ),
		'section'  			=> 'section_blog_single',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting show_categories_single.
$wp_customize->add_setting( 'theme_options[show_categories_single]',
	array(
		'default'           => $default['show_categories_single'],
		'sanitize_callback' => 'nari_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_categories_single]',
	array(
		'label'    			=> esc_html__( 'Show Categories', 'nari' ),
		'section'  			=> 'section_blog_single',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting show_tags_single.
$wp_customize->add_setting( 'theme_options[show_tags_single]',
	array(
		'default'           => $default['show_tags_single'],
		'sanitize_callback' => 'nari_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_tags_single]',
	array(
		'label'    			=> esc_html__( 'Show Tags', 'nari' ),
		'section'  			=> 'section_blog_single',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting enable_social_share.
$wp_customize->add_setting( 'theme_options[enable_social_share]',
	array(
		'default'           => $default['enable_social_share'],
		'sanitize_callback' => 'nari_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_social_share]',
	array(
		'label'    			=> esc_html__( 'Enable Social Share', 'nari' ),
		'section'  			=> 'section_blog_single',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting show_related_posts.
$wp_customize->add_setting( 'theme_options[show_related_posts]',
	array(
		'default'           => $default['show_related_posts'],
		'sanitize_callback' => 'nari_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_related_posts]',
	array(
		'label'    			=> esc_html__( 'Show Related Posts', 'nari' ),
		'section'  			=> 'section_blog_single',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting related_posts_heading.
$wp_customize->add_setting( 'theme_options[related_posts_heading]',
	array(
		'default'           => $default['related_posts_heading'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[related_posts_heading]',
	array(
		'label'    => esc_html__( 'Heading', 'nari' ),
		'section'  => 'section_blog_single',
		'type'     => 'text',
		'priority' => 100,
		'active_callback' 	=> 'nari_is_related_posts_active',
	)
);

// Setting related_posts_number.
$wp_customize->add_setting( 'theme_options[related_posts_number]',
	array(
		'default'           => $default['related_posts_number'],
		'sanitize_callback' => 'nari_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[related_posts_number]',
	array(
		'label'    		=> esc_html__( 'Number of Related Posts', 'nari' ),
		'section'  		=> 'section_blog_single',
		'type'     		=> 'number',
		'priority' 		=> 100,
		'input_attrs'   => array( 'min' => 2, 'max' => 10 ),
		'active_callback' 	=> 'nari_is_related_posts_active',
	)
);
