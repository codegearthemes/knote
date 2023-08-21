<?php
/**
 * Builder
 * Menu
 *
 * @package Knote
 */


$wp_customize->add_section(
    'knote_header_component_offcanvas_menu',
    array(
        'title'      => esc_html__( 'Mobile Offcanvas Menu', 'knote' ),
        'panel'      => 'knote_header_panel'
    )
);

// Tabs
$wp_customize->add_setting(
    'knote_header_component_offcanvas_menu_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Tabs (
        $wp_customize,
        'knote_header_component_offcanvas_menu_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'knote_header_component_offcanvas_menu',
            'controls_general'		=> json_encode(
                array_merge(
                    array(
                        '#customize-control-knote_header_component_offcanvas_menu_visibility'
                    )
                ),
            ),
            'controls_design'		=> json_encode(
                array_merge(
                    array(
                        '#customize-control-knote_header_component_offcanvas_menu',
                        '#customize-control-knote_header_component_offcanvas_menu_submenu',
                        '#customize-control-knote_header_component_offcanvas_menu_margin',
                        '#customize-control-knote_header_component_offcanvas_menu_padding'
                    )
                )
            ),
            'priority' 				=> 20
        )
    )
);

// Visibility
$wp_customize->add_setting(
    'knote_header_component_offcanvas_menu_visibility_desktop',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_offcanvas_menu_visibility_tablet',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_offcanvas_menu_visibility',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_RadioButtons(
        $wp_customize,
        'knote_header_component_offcanvas_menu_visibility',
        array(
            'label'         => esc_html__( 'Visibility', 'knote' ),
            'section'       => 'knote_header_component_offcanvas_menu',
            'responsive' => true,
            'settings' => array(
                'desktop' 		=> 'knote_header_component_offcanvas_menu_visibility_desktop',
                'tablet' 		=> 'knote_header_component_offcanvas_menu_visibility_tablet',
                'mobile' 		=> 'knote_header_component_offcanvas_menu_visibility'
            ),
            'choices'       => array(
                'visible' => esc_html__( 'Visible', 'knote' ),
                'hidden'  => esc_html__( 'Hidden', 'knote' )
            ),
            'priority'      => 55
        )
    )
);

// Text Color
$wp_customize->add_setting(
	'knote_header_component_offcanvas_menu_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_header_component_offcanvas_menu_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'offcanvas_menu',
        array(
            'label'    => esc_html__( 'Text Color', 'knote' ),
            'section'  => 'knote_header_component_offcanvas_menu',
            'settings' => array(
                'normal' => 'knote_header_component_offcanvas_menu_color',
                'hover'  => 'knote_header_component_offcanvas_menu_color_hover',
            ),
            'priority' => 25
        )
    )
);

// Submenu Text Color
$wp_customize->add_setting(
	'knote_header_component_offcanvas_menu_submenu_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_header_component_offcanvas_menu_submenu_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'offcanvas_menu_submenu',
        array(
            'label'    => esc_html__( 'Submenu Text Color', 'knote' ),
            'section'  => 'knote_header_component_offcanvas_menu',
            'settings' => array(
                'normal' => 'knote_header_component_offcanvas_menu_submenu_color',
                'hover'  => 'knote_header_component_offcanvas_menu_submenu_color_hover',
            ),
            'priority' => 40
        )
    )
);

// Margin
$wp_customize->add_setting(
    'knote_header_component_offcanvas_menu_margin_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_offcanvas_menu_margin_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_offcanvas_menu_margin',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'offcanvas_menu_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'knote' ),
            'section'         	=> 'knote_header_component_offcanvas_menu',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'             => array( 'px', 'em', 'rem'),
            'responsive'   	    => true,
            'settings'        	=> array(
                'desktop' => 'knote_header_component_offcanvas_menu_margin_desktop',
                'tablet'  => 'knote_header_component_offcanvas_menu_margin_tablet',
                'mobile'  => 'knote_header_component_offcanvas_menu_margin'
            ),
            'priority'	      	 => 72
        )
    )
);

// Padding
$wp_customize->add_setting(
    'knote_header_component_offcanvas_menu_padding_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_offcanvas_menu_padding_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_offcanvas_menu_padding',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_header_component_offcanvas_menu_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'knote' ),
            'section'         	=> 'knote_header_component_offcanvas_menu',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'             => array( 'px', 'em', 'rem'),
            'responsive'   	    => true,
            'settings'        	=> array(
                'desktop' => 'knote_header_component_offcanvas_menu_padding_desktop',
                'tablet'  => 'knote_header_component_offcanvas_menu_padding_tablet',
                'mobile'  => 'knote_header_component_offcanvas_menu_padding'
            ),
            'priority'	      	 => 72
        )
    )
);
