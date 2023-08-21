<?php
/**
 * Builder
 * Logo
 *
 * @package Knote
 */

$wp_customize->add_section(
    'knote_header_component_logo',
    array(
        'title'      => esc_html__( 'Site logo', 'knote' ),
        'panel'      => 'knote_header_panel'
    )
);

$wp_customize->add_setting(
    'knote_header_component_logo_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Tabs (
        $wp_customize,
        'knote_header_component_logo_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'knote_header_component_logo',
            'controls_general'		=> json_encode(
                array_merge(
                    array(
                        '#customize-control-knote_header_component_logo_text_alignment',
                    )
                )
            ),
            'controls_design'		=> json_encode(
                array_merge(
                    array(
                        '#customize-control-knote_header_component_logo_sticky_title',
                        '#customize-control-knote_header_component_site_title_sticky_color',
                        '#customize-control-knote_header_component_site_description_sticky_color',
                        '#customize-control-knote_header_component_logo_padding',
                        '#customize-control-knote_header_component_logo_margin'
                    )
                )
            ),
            'priority' 				=> 20
        )
    )
);

// Text Alignment
$wp_customize->add_setting(
    'knote_header_component_logo_text_alignment',
    array(
        'default' 			=> 'center',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);

$wp_customize->add_control(
    new Knote_Control_RadioButtons(
        $wp_customize,
        'knote_header_component_logo_text_alignment',
        array(
            'label'         => esc_html__( 'Text Alignment', 'knote' ),
            'section'       => 'knote_header_component_logo',
            'choices'       => array(
                'left' 		=> '<svg width="16" height="13" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h10v1H0zM0 4h16v1H0zM0 8h10v1H0zM0 12h16v1H0z"/></svg>',
                'center' 	=> '<svg width="16" height="13" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M3 0h10v1H3zM0 4h16v1H0zM3 8h10v1H3zM0 12h16v1H0z"/></svg>',
                'right' 	=> '<svg width="16" height="13" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M6 0h10v1H6zM0 4h16v1H0zM6 8h10v1H6zM0 12h16v1H0z"/></svg>'
            ),
            'priority'      => 51
        )
    )
);

/**
 * Styling
 */
// Sticky Header - Title
$wp_customize->add_setting(
    'knote_header_component_logo_sticky_title',
    array(
        'default' 			=> '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Text(
        $wp_customize,
        'knote_header_component_logo_sticky_title',
        array(
            'label'			  => esc_html__( 'Sticky Header - Active State', 'knote' ),
            'description'     => esc_html__( 'Control the colors when the sticky header state is active.', 'knote' ),
            'section' 		  => 'knote_header_component_logo',
            'active_callback' => 'knote_sticky_header_enabled',
            'priority'	 	  => 51
        )
    )
);

// Sticky Header - Site TItle Color
$wp_customize->add_setting(
	'knote_header_component_site_title_sticky_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_header_component_site_title_sticky_color',
		array(
			'label'         	=> esc_html__( 'Site Title Color', 'knote' ),
			'section'       	=> 'knote_header_component_logo',
            'active_callback'   => 'knote_sticky_header_enabled',
			'priority'			=> 52
		)
	)
);

// Sticky Header - Site Description Color
$wp_customize->add_setting(
	'knote_header_component_site_description_sticky_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_header_component_site_description_sticky_color',
		array(
			'label'         	=> esc_html__( 'Site Description Color', 'knote' ),
			'section'       	=> 'knote_header_component_logo',
            'active_callback'   => 'knote_sticky_header_enabled',
			'priority'			=> 53
		)
	)
);

// Margin
$wp_customize->add_setting(
    'knote_header_component_logo_margin_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_logo_margin_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_logo_margin_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_header_component_logo_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'knote' ),
            'section'         	=> 'knote_header_component_logo',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'             => array( 'px', 'em', 'rem'),
            'responsive'   	    => true,
            'settings'        	=> array(
                'desktop' => 'knote_header_component_logo_margin_desktop',
                'tablet'  => 'knote_header_component_logo_margin_tablet',
                'mobile'  => 'knote_header_component_logo_margin_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Padding
$wp_customize->add_setting(
    'knote_header_component_logo_padding_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_logo_padding_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_logo_padding_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_header_component_logo_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'knote' ),
            'section'         	=> 'knote_header_component_logo',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'             => array( 'px', 'em', 'rem'),
            'responsive'   	    => true,
            'settings'        	=> array(
                'desktop' => 'knote_header_component_logo_padding_desktop',
                'tablet'  => 'knote_header_component_logo_padding_tablet',
                'mobile'  => 'knote_header_component_logo_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);
