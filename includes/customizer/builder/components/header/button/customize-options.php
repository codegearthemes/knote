<?php
/**
 * Builder
 * Button Component
 *
 * @package Knote
 */

$wp_customize->add_section(
    'knote_header_component_button',
    array(
        'title'      => esc_html__( 'Button', 'knote' ),
        'panel'      => 'knote_header_panel'
    )
);

$wp_customize->add_setting(
    'knote_header_component_button_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Tabs (
        $wp_customize,
        'knote_header_component_button_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'knote_header_component_button',
            'controls_general'		=> json_encode(
                array(
                    '#customize-control-knote_header_component_button_text',
                    '#customize-control-knote_header_component_button_link',
                    '#customize-control-knote_header_component_button_class',
                    '#customize-control-knote_header_component_button_target'
                )
            ),
            'controls_design'		=> json_encode(
                array(
                    '#customize-control-knote_header_component_button_default_title',
                    '#customize-control-knote_header_component_button_color',
                    '#customize-control-knote_header_component_button_background_color',
                    '#customize-control-knote_header_component_button_border_color',

                    // Sticky State
                    '#customize-control-knote_header_component_button_sticky_title',
                    '#customize-control-knote_header_component_button_sticky_text_color',
                    '#customize-control-knote_header_component_button_sticky_background_color',
                    '#customize-control-knote_header_component_button_sticky_border_color',
                    '#customize-control-knote_header_component_button_margin',
                    '#customize-control-knote_header_component_button_padding'
                )
            ),
            'priority' 				=> 10
        )
    )
);

/**
 * Layout (Tab Content)
 *
 */
$wp_customize->add_setting(
	'knote_header_component_button_text',
	array(
		'sanitize_callback' => 'knote_sanitize_text',
		'default'           => esc_html__( 'Click me', 'knote' ),
	)
);
$wp_customize->add_control(
    'knote_header_component_button_text',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Button text', 'knote' ),
        'section'     => 'knote_header_component_button',
        'priority'			=> 15
    )
);

$wp_customize->add_setting(
	'knote_header_component_button_link',
	array(
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '#',
	)
);
$wp_customize->add_control(
    'knote_header_component_button_link',
    array(
        'label'       => esc_html__( 'Button link', 'knote' ),
        'type'        => 'text',
        'section'     => 'knote_header_component_button',
        'priority'			=> 15
    )
);

$wp_customize->add_setting(
	'knote_header_component_button_class',
	array(
		'sanitize_callback' => 'esc_attr',
		'default'           => '',
	)
);

$wp_customize->add_control(
    'knote_header_component_button_class',
    array(
        'label'       => esc_html__( 'Button Class', 'knote' ),
        'type'        => 'text',
        'section'     => 'knote_header_component_button',
        'priority'			=> 15
    )
);

$wp_customize->add_setting(
	'knote_header_component_button_target',
	array(
		'default'           => 0,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_header_component_button_target',
		array(
			'label'         	=> esc_html__( 'Open in a new tab?', 'knote' ),
			'section'       	=> 'knote_header_component_button',
			'priority'			=> 15
		)
	)
);

/**
 * Design (Tab Content)
 *
 */

// Default State Title.
$wp_customize->add_setting(
    'knote_header_component_button_default_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	)
);
$wp_customize->add_control(
    new Knote_Control_Text(
        $wp_customize,
        'knote_header_component_button_default_title',
        array(
            'label'    => esc_html__( 'Default style', 'knote' ),
            'section'  => 'knote_header_component_button',
            'priority' => 30
        )

	)
);

// Color.
$wp_customize->add_setting(
	'knote_header_component_button_color',
	array(
		'default'           => '#FFFFFF',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_setting(
	'knote_header_component_button_color_hover',
	array(
		'default'           => '#FFFFFF',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_header_component_button_color',
        array(
            'label'    => esc_html__( 'Color', 'knote' ),
            'section'  => 'knote_header_component_button',
            'settings' => array(
                'normal' => 'knote_header_component_button_color',
                'hover'  => 'knote_header_component_button_color_hover',
            ),
            'priority' => 31
        )
    )
);

// Background color.
$wp_customize->add_setting(
	'knote_header_component_button_background_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_header_component_button_background_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_header_component_button_background_color',
        array(
            'label'    => esc_html__( 'Background color', 'knote' ),
            'section'  => 'knote_header_component_button',
            'settings' => array(
                'normal' => 'knote_header_component_button_background_color',
                'hover'  => 'knote_header_component_button_background_color_hover',
            ),
            'priority' => 31
        )
    )
);

// Border color.
$wp_customize->add_setting(
	'knote_header_component_button_border_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_setting(
	'knote_header_component_button_border_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_header_component_button_border_color',
        array(
            'label'    => esc_html__( 'Border color', 'knote' ),
            'section'  => 'knote_header_component_button',
            'settings' => array(
                'normal' => 'knote_header_component_button_border_color',
                'hover'  => 'knote_header_component_button_border_color_hover',
            ),
            'priority' => 31
        )
    )
);

// Sticky Header - Title
$wp_customize->add_setting(
    'knote_header_component_button_sticky_title',
    array(
        'default' 			=> '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Text(
        $wp_customize,
        'knote_header_component_button_sticky_title',
        array(
            'label'			  => esc_html__( 'Sticky Header - Active State', 'knote' ),
            'description'     => esc_html__( 'Control the colors when the sticky header state is active.', 'knote' ),
            'section' 		  => 'knote_header_component_button',
            'active_callback' => 'knote_sticky_header_enabled',
            'priority'	 	  => 67
        )
    )
);

// Sticky Header - Text Color.
$wp_customize->add_setting(
	'knote_header_component_button_sticky_text_color',
	array(
		'default'           => '#FFFFFF',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_header_component_button_sticky_text_color_hover',
	array(
		'default'           => '#FFFFFF',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_header_component_button_sticky_text_color',
        array(
            'label'    => esc_html__( 'Text Color', 'knote' ),
            'section'  => 'knote_header_component_button',
            'settings' => array(
                'normal' => 'knote_header_component_button_sticky_text_color',
                'hover'  => 'knote_header_component_button_sticky_text_color_hover',
            ),
			'active_callback' => 'knote_sticky_header_enabled',
            'priority' => 68
        )
    )
);

// Sticky Header - Background color.
$wp_customize->add_setting(
	'knote_header_component_button_sticky_background_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_header_component_button_sticky_background_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_header_component_button_sticky_background_color',
        array(
            'label'    => esc_html__( 'Background color', 'knote' ),
            'section'  => 'knote_header_component_button',
            'settings' => array(
                'normal' => 'knote_header_component_button_sticky_background_color',
                'hover'  => 'knote_header_component_button_sticky_background_color_hover',
            ),
			'active_callback' => 'knote_sticky_header_enabled',
            'priority' => 68
        )
    )
);

// Sticky Header - Border Color.
$wp_customize->add_setting(
	'knote_header_component_button_sticky_border_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_setting(
	'knote_header_component_button_sticky_border_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_header_component_button_sticky_border_color',
        array(
            'label'    => esc_html__( 'Border Color', 'knote' ),
            'section'  => 'knote_header_component_button',
            'settings' => array(
                'normal' => 'knote_header_component_button_sticky_border_color',
                'hover'  => 'knote_header_component_button_sticky_border_color_hover',
            ),
			'active_callback' => 'knote_sticky_header_enabled',
            'priority' => 70
        )
    )
);

// Margin
$wp_customize->add_setting(
    'knote_header_component_button_margin_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_button_margin_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_button_margin_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_header_component_button_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'knote' ),
            'section'         	=> 'knote_header_component_button',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'              => array( 'px', 'em', 'rem' ),
            'responsive'   	     => true,
            'settings'        	 => array(
                'desktop' => 'knote_header_component_button_margin_desktop',
                'tablet'  => 'knote_header_component_button_margin_tablet',
                'mobile'  => 'knote_header_component_button_margin_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Padding
$wp_customize->add_setting(
    'knote_header_component_button_padding_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_button_padding_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_button_padding_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_header_component_button_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'knote' ),
            'section'         	=> 'knote_header_component_button',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'              => array( 'px', 'em', 'rem' ),
            'responsive'   	     => true,
            'settings'        	 => array(
                'desktop' => 'knote_header_component_button_padding_desktop',
                'tablet'  => 'knote_header_component_button_padding_tablet',
                'mobile'  => 'knote_header_component_button_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);
