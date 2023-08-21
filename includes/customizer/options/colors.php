<?php
/**
 * Colors Customizer options
 *
 * @package Knote
 */
/*--------------------------------------------
	General
---------------------------------------------*/
$wp_customize->add_setting( 'knote_general_color_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Heading(
		$wp_customize,
		'knote_general_color_title',
		array(
			'label'			=> esc_html__( 'General', 'knote' ),
			'section' 		=> 'colors',
            'priority' 			=> 5
		)
	)
);

$wp_customize->add_setting( 'knote_website_primary_color',
	array(
		'default'           => '#121212',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_website_primary_color',
		array(
			'label'         	=> esc_html__( 'Primary color', 'knote' ),
			'section'       	=> 'colors',
			'border'			=> true,
            'priority' 			=> 5
		)
	)
);

$wp_customize->add_setting( 'knote_website_secondary_color',
	array(
		'default'           => '#D0F224',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_website_secondary_color',
		array(
			'label'         	=> esc_html__( 'Secondary color', 'knote' ),
			'section'       	=> 'colors',
			'border'			=> true,
            'priority' 			=> 5
		)
	)
);

$wp_customize->add_setting( 'knote_website_accent_color',
	array(
		'default'           => '#000000',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_website_accent_color',
		array(
			'label'         	=> esc_html__( 'Accent color', 'knote' ),
			'section'       	=> 'colors',
            'priority' 			=> 5
		)
	)
);

$wp_customize->add_setting( 'knote_website_general_color_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_website_general_color_divider',
		array(
			'section' 		=> 'colors',
			'priority' 			=> 5
		)
	)
);

$wp_customize->add_setting( 'knote_header_color_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Heading(
		$wp_customize,
		'knote_header_color_title',
		array(
			'label'			=> esc_html__( 'Website', 'knote' ),
			'section' 		=> 'colors',
            'priority' 			=> 6
		)
	)
);

$wp_customize->add_setting( 'knote_website_text_color',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_website_text_color',
		array(
			'label'         	=> esc_html__( 'Text', 'knote' ),
			'section'       	=> 'colors',
			'border'			=> true,
            'priority' 			=> 7
		)
	)
);

$wp_customize->add_setting( 'knote_website_heading_color',
	array(
		'default'           => '#121212',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_website_heading_color',
		array(
			'label'         	=> esc_html__( 'Heading', 'knote' ),
			'section'       	=> 'colors',
			'border'			=> true,
            'priority' 			=> 7
		)
	)
);

$wp_customize->add_setting( 'knote_website_color_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_website_color_divider',
		array(
			'section' 		=> 'colors',
			'priority' 			=> 15
		)
	)
);

$wp_customize->add_setting( 'knote_form_color_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Heading(
		$wp_customize,
		'knote_form_color_title',
		array(
			'label'			=> esc_html__( 'Form', 'knote' ),
			'section' 		=> 'colors',
            'priority' 			=> 15
		)
	)
);

$wp_customize->add_setting( 'knote_form_field_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_form_field_color',
		array(
			'label'         	=> esc_html__( 'Color', 'knote' ),
			'section'       	=> 'colors',
			'border'			=> true,
            'priority' 			=> 20
		)
	)
);

$wp_customize->add_setting( 'knote_form_field_background',
	array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_form_field_background',
		array(
			'label'         	=> esc_html__( 'Background', 'knote' ),
			'section'       	=> 'colors',
			'border'			=> true,
            'priority' 			=> 20
		)
	)
);

$wp_customize->add_setting( 'knote_border_color',
	array(
		'default'           => '#e6e6e6',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_border_color',
		array(
			'label'         	=> esc_html__( 'Border color', 'knote' ),
			'section'       	=> 'colors',
            'priority' 			=> 25
		)
	)
);

$wp_customize->add_setting( 'knote_website_form_divider',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_website_form_divider',
		array(
			'section' 		=> 'colors',
			'priority' 			=> 30
		)
	)
);

$wp_customize->add_setting( 'knote_content_card_color_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Heading(
		$wp_customize,
		'knote_content_card_color_title',
		array(
			'label'			=> esc_html__( 'Content card', 'knote' ),
			'section' 		=> 'colors',
            'priority' 			=> 30
		)
	)
);

$wp_customize->add_setting( 'knote_content_card_color',
	array(
		'default'           => '#262626',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_content_card_color',
		array(
			'label'         	=> esc_html__( 'Color', 'knote' ),
			'section'       	=> 'colors',
			'border'			=> true,
            'priority' 			=> 30
		)
	)
);

$wp_customize->add_setting( 'knote_content_card_heading_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_content_card_heading_color',
		array(
			'label'         	=> esc_html__( 'Heading color', 'knote' ),
			'section'       	=> 'colors',
			'border'			=> true,
            'priority' 			=> 30
		)
	)
);

$wp_customize->add_setting( 'knote_content_card_background_color',
	array(
		'default'           => '#FBFBF9',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_content_card_background_color',
		array(
			'label'         	=> esc_html__( 'Background', 'knote' ),
			'section'       	=> 'colors',
            'priority' 			=> 30
		)
	)
);

$wp_customize->add_setting( 'knote_website_content_card_color_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_website_content_card_color_divider',
		array(
			'section' 		=> 'colors',
			'priority' 			=> 30
		)
	)
);

$wp_customize->add_setting( 'knote_other_color_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Heading(
		$wp_customize,
		'knote_other_color_title',
		array(
			'label'			=> esc_html__( 'Other', 'knote' ),
			'section' 		=> 'colors',
            'priority' 			=> 30
		)
	)
);

$wp_customize->add_setting( 'knote_success_color',
	array(
		'default'           => '#16A679',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_success_color',
		array(
			'label'         	=> esc_html__( 'Success color', 'knote' ),
			'section'       	=> 'colors',
			'border'			=> true,
            'priority' 			=> 30
		)
	)
);

$wp_customize->add_setting( 'knote_error_color',
	array(
		'default'           => '#C5280C',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_error_color',
		array(
			'label'         	=> esc_html__( 'Error color', 'knote' ),
			'section'       	=> 'colors',
            'priority' 			=> 30
		)
	)
);
