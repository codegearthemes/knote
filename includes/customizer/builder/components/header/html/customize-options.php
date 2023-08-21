<?php
/**
 * Builder
 * Hamburger
 *
 * @package Knote
 */
$wp_customize->add_section(
    'knote_header_component_html',
    array(
        'title'      => esc_html__( 'HTML', 'knote' ),
        'panel'      => 'knote_header_panel'
    )
);

$wp_customize->add_setting(
    'knote_header_component_html_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Tabs (
        $wp_customize,
        'knote_header_component_html_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'knote_header_component_html',
            'controls_general'		=> json_encode(
                array_merge(
                    array(
                        '#customize-control-knote_header_component_html_content',
                        '#customize-control-knote_header_component_html_text_align',
                    )
                )
            ),
            'controls_design'		=> json_encode(
                array_merge(
                    array(
                        '#customize-control-knote_header_component_html_text_color',
                        '#customize-control-knote_header_component_html_link',

						// Sticky State
                        '#customize-control-knote_header_component_html_sticky_title',
                        '#customize-control-knote_header_component_html_sticky_text_color',
                        '#customize-control-knote_header_component_html_sticky_link',
                        '#customize-control-knote_header_component_html_margin',
                        '#customize-control-knote_header_component_html_padding'

                    )
                )
            ),
            'priority' 				=> 20
        )
    )
);

$wp_customize->add_setting(
	'knote_header_component_html_content',
	array(
        'default'           => '',
		'sanitize_callback' => 'knote_sanitize_text',
	)
);
$wp_customize->add_control(
	'knote_header_component_html_content',
	array(
		'label'           => esc_html__( 'HTML Content', 'knote' ),
		'type'            => 'textarea',
		'section'         => 'knote_header_component_html',
		'priority'        => 30
	)
);

// Text Alignment.
$wp_customize->add_setting(
    'knote_header_component_html_text_align',
    array(
        'default' 			=> 'left',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);

$wp_customize->add_control(
    new Knote_Control_RadioButtons(
        $wp_customize,
        'knote_header_component_html_text_align',
        array(
            'label'         => esc_html__( 'Text Alignment', 'knote' ),
            'section'       => 'knote_header_component_html',
            'responsive'    => false,
            'settings'      => 'knote_header_component_html_text_align',
            'choices'       => array(
                'left' 		=> '<svg width="16" height="13" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h10v1H0zM0 4h16v1H0zM0 8h10v1H0zM0 12h16v1H0z"/></svg>',
                'center' 	=> '<svg width="16" height="13" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M3 0h10v1H3zM0 4h16v1H0zM3 8h10v1H3zM0 12h16v1H0z"/></svg>',
                'right' 	=> '<svg width="16" height="13" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M6 0h10v1H6zM0 4h16v1H0zM6 8h10v1H6zM0 12h16v1H0z"/></svg>'
            ),
            'priority'      => 30
        )
    )
);

// Text Color.
$wp_customize->add_setting(
	'knote_header_component_html_text_color',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_header_component_html_text_color',
		array(
			'label'         	=> esc_html__( 'Text Color', 'knote' ),
			'section'       	=> 'knote_header_component_html',
            'priority'          => 40
		)
	)
);

// Link Color.
$wp_customize->add_setting(
	'knote_header_component_html_link_color',
	array(
		'default'           => '#121212',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_header_component_html_link_color_hover',
	array(
		'default'           => '#121212',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_header_component_html_link',
        array(
            'label'    => esc_html__( 'Link Color', 'knote' ),
            'section'  => 'knote_header_component_html',
            'settings' => array(
                'normal' => 'knote_header_component_html_link_color',
                'hover'  => 'knote_header_component_html_link_color_hover',
            ),
            'priority' => 41
        )
    )
);

// Sticky Header - Title
$wp_customize->add_setting(
    'knote_header_component_html_sticky_title',
    array(
        'default' 			=> '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Text(
        $wp_customize,
        'knote_header_component_html_sticky_title',
        array(
            'label'			  => esc_html__( 'Sticky Header - Active State', 'knote' ),
            'description'     => esc_html__( 'Control the colors when the sticky header state is active.', 'knote' ),
            'section' 		  => 'knote_header_component_html',
            'active_callback' => 'knote_sticky_header_enabled',
            'priority'	 	  => 44
        )
    )
);

// Sticky - Text Color.
$wp_customize->add_setting(
	'knote_header_component_html_sticky_text_color',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_header_component_html_sticky_text_color',
		array(
			'label'         	=> esc_html__( 'Text Color', 'knote' ),
			'section'       	=> 'knote_header_component_html',
            'active_callback'   => 'knote_sticky_header_enabled',
            'priority'          => 45
		)
	)
);

// Sticky - Link Color.
$wp_customize->add_setting(
	'knote_header_component_html_sticky_link_color',
	array(
		'default'           => '#121212',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_header_component_html_sticky_link_color_hover',
	array(
		'default'           => '#121212',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_header_component_html_sticky_link',
        array(
            'label'    => esc_html__( 'Link Color', 'knote' ),
            'section'  => 'knote_header_component_html',
            'settings' => array(
                'normal' => 'knote_header_component_html_sticky_link_color',
                'hover'  => 'knote_header_component_html_sticky_link_color_hover',
            ),
            'active_callback' => 'knote_sticky_header_enabled',
            'priority' => 46
        )
    )
);

// Margin
$wp_customize->add_setting(
    'knote_header_component_html_margin_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_html_margin_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_html_margin_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_header_component_html_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'knote' ),
            'section'         	=> 'knote_header_component_html',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'             => array( 'px', '%', 'rem' ),
            'responsive'   	    => true,
            'settings'        	=> array(
                'desktop' => 'knote_header_component_html_margin_desktop',
                'tablet'  => 'knote_header_component_html_margin_tablet',
                'mobile'  => 'knote_header_component_html_margin_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Padding
$wp_customize->add_setting(
    'knote_header_component_html_padding_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_html_padding_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_html_padding_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_header_component_html_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'knote' ),
            'section'         	=> 'knote_header_component_html',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'             => array( 'px', '%', 'rem' ),
            'responsive'   	    => true,
            'settings'        	=> array(
                'desktop' => 'knote_header_component_html_padding_desktop',
                'tablet'  => 'knote_header_component_html_padding_tablet',
                'mobile'  => 'knote_header_component_html_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);
