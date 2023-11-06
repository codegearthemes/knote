<?php

/**
 * Performance Customizer options
 *
 * @package Knote
 */
/*--------------------------------------------
	Performance Panel
---------------------------------------------*/
$wp_customize->add_panel(
	'knote_performance_panel',
	array(
		'title'         => esc_html__('Performance', 'knote'),
		'priority'      => 72,
	)
);

$wp_customize->add_section(
	'knote_performance_section',
	array(
		'title'      => esc_html__('Optimization', 'knote'),
		'panel'      => 'knote_performance_panel',
	)
);

$wp_customize->add_setting(
	'knote_load_google_fonts_locally',
	array(
		'default'           => 0,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_load_google_fonts_locally',
		array(
			'label'         	=> esc_html__('Local load google font', 'knote'),
			'section'       	=> 'knote_performance_section',
			'settings'      	=> 'knote_load_google_fonts_locally',
			'priority'  		=> 5
		)
	)
);

$wp_customize->add_setting(
	'knote_load_minified_assets',
	array(
		'default'           => 0,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_load_minified_assets',
		array(
			'label'         	=> esc_html__('Local minified assets', 'knote'),
			'section'       	=> 'knote_performance_section',
			'settings'      	=> 'knote_load_minified_assets',
			'priority'  		=> 10
		)
	)
);
