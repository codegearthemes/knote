<?php
/**
 * Header Customizer options
 *
 * @package Knote
 */

$wp_customize->add_panel( 'knote_header_panel',
	array(
		'title'         => esc_html__( 'Header', 'knote'),
		'priority'      => 10,
	)
);

/**
 * Site identity
 */
$wp_customize->add_setting( 'knote_logo_size_desktop', array(
	'default'   		=> 250,
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_logo_size_tablet', array(
	'default'   		=> 175,
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_logo_size_mobile', array(
	'default'   		=> 125,
	'sanitize_callback' => 'absint',
) );


$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_logo_size',
		array(
			'label' 		=> esc_html__( 'Logo width', 'knote' ),
			'section' 		=> 'title_tagline',
			'responsive'	=> true,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_logo_size_desktop',
				'size_tablet' 		=> 'knote_logo_size_tablet',
				'size_mobile' 		=> 'knote_logo_size_mobile',
			),
			'input_attrs' => array (
				'min'	=> 10,
				'max'	=> 500,
				'step'  => 1,
				'unit'  => 'px'
			)
		)
	)
);

$wp_customize->add_setting(
	'knote_enable_site_title',
	array(
		'default'           => 1,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_enable_site_title',
		array(
			'label'         	=> esc_html__( 'Enable site title', 'knote' ),
			'section'       	=> 'title_tagline',
			'settings'      	=> 'knote_enable_site_title',
		)
	)
);

$wp_customize->add_setting(
	'knote_enable_site_tagline',
	array(
		'default'           => 0,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_enable_site_tagline',
		array(
			'label'         	=> esc_html__( 'Enable site tagline', 'knote' ),
			'section'       	=> 'title_tagline',
			'settings'      	=> 'knote_enable_site_tagline',
		)
	)
);


