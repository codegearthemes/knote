<?php
/**
 * Builder
 * Hamburger
 *
 * @package Knote
 */

$wp_customize->add_section(
    'knote_header_component_hamburger',
    array(
        'title'      => esc_html__( 'Menu Toggle', 'knote' ),
        'panel'      => 'knote_header_panel'
    )
);

$wp_customize->add_setting(
    'knote_header_component_hamburger_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Tabs (
        $wp_customize,
        'knote_header_component_hamburger_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'knote_header_component_hamburger',
            'controls_general'		=> json_encode(
                array(

                )
            ),
            'controls_design'		=> json_encode(
                array(
                    '#customize-control-knote_header_component_hamburger_icon_color',
                    '#customize-control-knote_header_component_hamburger_margin',
                    '#customize-control-knote_header_component_hamburger_padding'
                )
            ),
            'priority' 				=> 20
        )
    )
);

// Icon Color
$wp_customize->add_setting(
	'knote_header_component_hamburger_icon_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_header_component_hamburger_icon_color',
		array(
			'label'         	=> esc_html__( 'Icon color', 'knote' ),
			'section'       	=> 'knote_header_component_hamburger',
			'priority'			=> 25
		)
	)
);

// Margin
$wp_customize->add_setting(
    'knote_header_component_hamburger_margin_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_hamburger_margin_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_hamburger_margin_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_header_component_hamburger_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'knote' ),
            'section'         	=> 'knote_header_component_hamburger',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'             => array( 'px', '%', 'rem' ),
            'responsive'   	    => true,
            'settings'        	=> array(
                'desktop' => 'knote_header_component_hamburger_margin_desktop',
                'tablet'  => 'knote_header_component_hamburger_margin_tablet',
                'mobile'  => 'knote_header_component_hamburger_margin_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Padding
$wp_customize->add_setting(
    'knote_header_component_hamburger_padding_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_hamburger_padding_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_hamburger_padding_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_header_component_hamburger_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'knote' ),
            'section'         	=> 'knote_header_component_hamburger',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'             => array( 'px', '%', 'rem' ),
            'responsive'   	    => true,
            'settings'        	=> array(
                'desktop' => 'knote_header_component_hamburger_padding_desktop',
                'tablet'  => 'knote_header_component_hamburger_padding_tablet',
                'mobile'  => 'knote_header_component_hamburger_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);
