<?php
/**
 * Builder
 * WooCommerce Widgets
 *
 * @package Knote
 */

$wp_customize->add_section(
    'knote_header_component_account',
    array(
        'title'      => esc_html__( 'Account', 'knote' ),
        'panel'      => 'knote_header_panel'
    )
);

$wp_customize->add_setting(
    'knote_header_component_account_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Tabs (
        $wp_customize,
        'knote_header_component_account_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'knote_header_component_account',
            'controls_general'		=> json_encode(
                array(
                    '#customize-control-knote_header_component_account_elements',
                )
            ),
            'controls_design'		=> json_encode(
                array_merge(
                    array(
                        '#customize-control-knote_header_component_account_color',
                        '#customize-control-knote_header_component_account_color_divider',
                        '#customize-control-knote_header_component_account_sticky_title',
                        '#customize-control-knote_header_component_account_sticky_color',
                        '#customize-control-knote_header_component_account_sticky_color_divider',
                        '#customize-control-knote_header_component_account_padding',
                        '#customize-control-knote_header_component_account_margin'
                    )
                )
            ),
            'priority' 				=> 20
        )
    )
);

// Design
$wp_customize->add_setting(
	'knote_header_component_account_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_header_component_account_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_header_component_account_color',
        array(
            'label'    => esc_html__( 'Icons color', 'knote' ),
            'section'  => 'knote_header_component_account',
            'settings' => array(
                'normal' => 'knote_header_component_account_color',
                'hover'  => 'knote_header_component_account_color_hover',
            ),
            'priority' => 25
        )
    )
);

$wp_customize->add_setting( 'knote_header_component_account_color_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_header_component_account_color_divider',
		array(
			'section' 		=> 'knote_header_component_account',
			'priority' 			=> 25
		)
	)
);

// Sticky Header - Title
$wp_customize->add_setting(
    'knote_header_component_account_sticky_title',
    array(
        'default' 			=> '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Text(
        $wp_customize,
        'knote_header_component_account_sticky_title',
        array(
            'label'			  => esc_html__( 'Sticky Header - Active State', 'knote' ),
            'description'     => esc_html__( 'Control the colors when the sticky header state is active.', 'knote' ),
            'section' 		  => 'knote_header_component_account',
            'active_callback' => 'knote_sticky_header_enabled',
            'priority'	 	  => 51
        )
    )
);

// Sticky Header - Icon Color
$wp_customize->add_setting(
	'knote_header_component_account_sticky_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_header_component_account_sticky_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_header_component_account_sticky_color',
        array(
            'label'    => esc_html__( 'Icons color', 'knote' ),
            'section'  => 'knote_header_component_account',
            'settings' => array(
                'normal' => 'knote_header_component_account_sticky_color',
                'hover'  => 'knote_header_component_account_sticky_color_hover',
            ),
            'active_callback'   => 'knote_sticky_header_enabled',
            'priority' => 52
        )
    )
);

$wp_customize->add_setting( 'knote_header_component_account_sticky_color_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_header_component_account_sticky_color_divider',
		array(
			'section' 		=> 'knote_header_component_account',
            'active_callback' => 'knote_sticky_header_enabled',
			'priority' 			=> 52
		)
	)
);

// Margin
$wp_customize->add_setting(
    'knote_header_component_account_margin_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_account_margin_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_account_margin_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_header_component_account_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'knote' ),
            'section'         	=> 'knote_header_component_account',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'             => array( 'px', '%', 'rem' ),
            'responsive'   	    => true,
            'settings'        	=> array(
                'desktop' => 'knote_header_component_account_margin_desktop',
                'tablet'  => 'knote_header_component_account_margin_tablet',
                'mobile'  => 'knote_header_component_account_margin_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Padding
$wp_customize->add_setting(
    'knote_header_component_account_padding_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_account_padding_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_account_padding_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_header_component_account_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'knote' ),
            'section'         	=> 'knote_header_component_account',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'             => array( 'px', '%', 'rem' ),
            'responsive'   	    => true,
            'settings'        	=> array(
                'desktop' => 'knote_header_component_account_padding_desktop',
                'tablet'  => 'knote_header_component_account_padding_tablet',
                'mobile'  => 'knote_header_component_account_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);
