<?php
/**
 * Shop Options.
 *
 * @package Nari
 */

// Shop Section.
$wp_customize->add_section( 'section_shop',
	array(
		'title'      => esc_html__( 'Shop', 'nari' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting shop_layout.
$wp_customize->add_setting( 'theme_options[shop_layout]',
	array(
		'default'           => $default['shop_layout'],
		'sanitize_callback' => 'nari_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[shop_layout]',
	array(
		'label'    => esc_html__( 'Shop Layout', 'nari' ),
		'section'  => 'section_shop',
		'type'     => 'radio',
		'priority' => 100,
		'choices'  => array(
				'with-sidebar' => esc_html__( 'Sidebar', 'nari' ),
				'no-sidebar' => esc_html__( 'No Sidebar', 'nari' ),
			),
	)
);

// Setting product_per_page.
$wp_customize->add_setting( 'theme_options[product_per_page]',
	array(
		'default'           => $default['product_per_page'],
		'sanitize_callback' => 'nari_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[product_per_page]',
	array(
		'label'    		=> esc_html__( 'Products Per Page', 'nari' ),
		'description'   => esc_html__( 'Total number of products shown per page', 'nari' ),
		'section'  		=> 'section_shop',
		'type'     		=> 'number',
		'priority' 		=> 100,
		'input_attrs'   => array( 'min' => 4, 'max' => 20 ),
	)
);

// Setting product_number_per_row.
$wp_customize->add_setting( 'theme_options[product_number]',
	array(
		'default'           => $default['product_number'],
		'sanitize_callback' => 'nari_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[product_number]',
	array(
		'label'    		=> esc_html__( 'Products Per Row', 'nari' ),
		'description'   => esc_html__( 'Number of products shown per row', 'nari' ),
		'section'  		=> 'section_shop',
		'type'     		=> 'select',
		'priority' 		=> 100,
		'choices'  		=> array(
							'2'  	=> esc_html__( '2', 'nari' ),
							'3' 	=> esc_html__( '3', 'nari' ),
							'4'    	=> esc_html__( '4', 'nari' ),
						),
	)
);

// Setting hide_product_sorting.
$wp_customize->add_setting( 'theme_options[hide_product_sorting]',
	array(
		'default'           => $default['hide_product_sorting'],
		'sanitize_callback' => 'nari_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[hide_product_sorting]',
	array(
		'label'    			=> esc_html__( 'Disable Product Sorting Option', 'nari' ),
		'section'  			=> 'section_shop',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);
