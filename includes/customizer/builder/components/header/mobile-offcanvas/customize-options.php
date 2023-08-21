<?php
/**
 * Builder
 * Button Component
 *
 * @package Knote
 */

// // Mobile Offcanvas Wrapper/Row
$wp_customize->add_setting(
    'knote_builder_mobile_offcanvas',
    array(
        'default'           => $this->get_row_default_value( 'mobile_offcanvas' ),
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    'knote_builder_mobile_offcanvas',
    array(
        'type'     => 'text',
        'label'    => esc_html__( 'Mobile Offcanvas', 'knote' ),
        'section'  => 'knote_section_header_mobile_offcanvas',
        'settings' => 'knote_builder_mobile_offcanvas',
        'priority' => 10
    )
);

// Tabs
$wp_customize->add_setting(
    'knote_section_header_mobile_offcanvas_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Tabs (
        $wp_customize,
        'knote_section_header_mobile_offcanvas_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'knote_section_header_mobile_offcanvas',
            'controls_general'		=> json_encode(
                array_merge(
                    array(
                        '#customize-control-knote_builder_mobile_offcanvas',
                        '#customize-control-knote_mobile_offcanvas_layout',
                        '#customize-control-knote_mobile_offcanvas_close_offset',
                        '#customize-control-knote_mobile_offcanvas_alignment'
                    )
                )
            ),
            'controls_design'		=> json_encode(
                array_merge(
                    array(
                        '#customize-control-knote_mobile_offcanvas_title',
                        '#customize-control-knote_mobile_offcanvas_color',
                        '#customize-control-knote_mobile_offcanvas_background',
                        '#customize-control-knote_mobile_offcanvas_style_divider',
                        '#customize-control-knote_mobile_offcanvas_close_icon_title',
                        '#customize-control-knote_mobile_offcanvas_close_text_color',
                        '#customize-control-knote_mobile_offcanvas_close_background',
                        '#customize-control-knote_mobile_offcanvas_close_style_divider',
                        '#customize-control-knote_mobile_offcanvas_margin',
                        '#customize-control-knote_mobile_offcanvas_padding'
                    )
                )
            ),
            'priority' 				=> 20
        )
    )
);

$wp_customize->add_setting(
	'knote_mobile_offcanvas_layout',
	array(
		'default'           => 'fixed',
		'sanitize_callback' => 'sanitize_key',
	)
);
$wp_customize->add_control(
	new Knote_Control_RadioImage(
		$wp_customize,
		'knote_mobile_offcanvas_layout',
		array(
			'label'    	=> esc_html__( 'Layout', 'knote' ),
			'section'  	=> 'knote_section_header_mobile_offcanvas',
			'columns'		=> 'one-half',
			'choices'  => array(
				'fixed' => array(
					'label' => esc_html__( 'Layout 1', 'knote' ),
					'url'   => '%s/assets/admin/src/layout/offcanvas-layout1.svg'
				),
				'full-width' => array(
					'label' => esc_html__( 'Layout 2', 'knote' ),
					'url'   => '%s/assets/admin/src/layout/offcanvas-layout2.svg'
				)
			),
			'priority'	 => 25
		)
	)
);

// Close Button Offset.
$wp_customize->add_setting(
    'knote_mobile_offcanvas_close_offset',
    array(
        'default'   		=> 8,
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    new Knote_Control_Slider(
        $wp_customize,
        'knote_mobile_offcanvas_close_offset',
        array(
            'label' 		=> esc_html__( 'Close Icon Offset', 'knote' ),
            'section' 		=> 'knote_section_header_mobile_offcanvas',
            'responsive'	=> false,
            'settings' 		=> array (
                'size_desktop' 		=> 'knote_mobile_offcanvas_close_offset',
            ),
            'input_attrs' => array (
                'min'	=> 0,
                'max'	=> 100,
                'step'  => 1,
                'unit' => 'px'
            ),
            'priority'     => 25
        )
    )
);

$wp_customize->add_setting( 'knote_mobile_offcanvas_alignment',
	array(
		'default' 			=> 'left',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);
$wp_customize->add_control(
    new Knote_Control_RadioButtons(
        $wp_customize,
        'knote_mobile_offcanvas_alignment',
        array(
            'label'   => esc_html__( 'Alignment', 'knote' ),
            'section' => 'knote_section_header_mobile_offcanvas',
            'choices' => array(
                'left' 		=> '<svg width="16" height="13" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h10v1H0zM0 4h16v1H0zM0 8h10v1H0zM0 12h16v1H0z"/></svg>',
                'center' 	=> '<svg width="16" height="13" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M3 0h10v1H3zM0 4h16v1H0zM3 8h10v1H3zM0 12h16v1H0z"/></svg>',
                'right' 	=> '<svg width="16" height="13" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M6 0h10v1H6zM0 4h16v1H0zM6 8h10v1H6zM0 12h16v1H0z"/></svg>',
            ),
            'priority'  => 40
        )
    )
);

// Default State Title.
$wp_customize->add_setting(
    'knote_mobile_offcanvas_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	)
);
$wp_customize->add_control(
    new Knote_Control_Text(
        $wp_customize,
        'knote_mobile_offcanvas_title',
        array(
            'label'    => esc_html__( 'Canvas', 'knote' ),
            'section'  => 'knote_section_header_mobile_offcanvas',
            'priority' => 40
        )

	)
);

// Color
$wp_customize->add_setting(
	'knote_mobile_offcanvas_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_mobile_offcanvas_color',
		array(
			'label'         	=> esc_html__( 'Color', 'knote' ),
			'section'       	=> 'knote_section_header_mobile_offcanvas',
            'border'            => true,
			'priority'			=> 40
		)
	)
);

// Background
$wp_customize->add_setting(
	'knote_mobile_offcanvas_background',
	array(
		'default'           => '#FBFBF9',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_mobile_offcanvas_background',
		array(
			'label'         	=> esc_html__( 'Background', 'knote' ),
			'section'       	=> 'knote_section_header_mobile_offcanvas',
			'priority'			=> 40
		)
	)
);

$wp_customize->add_setting( 'knote_mobile_offcanvas_style_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_mobile_offcanvas_style_divider',
		array(
			'section' 		=> 'knote_section_header_mobile_offcanvas',
			'priority' 			=> 40
		)
	)
);

// Default State Title.
$wp_customize->add_setting(
    'knote_mobile_offcanvas_close_icon_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	)
);
$wp_customize->add_control(
    new Knote_Control_Text(
        $wp_customize,
        'knote_mobile_offcanvas_close_icon_title',
        array(
            'label'    => esc_html__( 'Icon', 'knote' ),
            'section'  => 'knote_section_header_mobile_offcanvas',
            'priority' => 40
        )

	)
);

// Close Icon Text Color.
$wp_customize->add_setting(
	'knote_mobile_offcanvas_close_text_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_mobile_offcanvas_close_text_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_mobile_offcanvas_close_text_color',
        array(
            'label'    => esc_html__( 'Color', 'knote' ),
            'section'  => 'knote_section_header_mobile_offcanvas',
            'settings' => array(
                'normal' => 'knote_mobile_offcanvas_close_text_color',
                'hover'  => 'knote_mobile_offcanvas_close_text_color_hover',
            ),
            'border'            => true,
            'priority' => 40
        )
    )
);

// Close Icon Background.
$wp_customize->add_setting(
	'knote_mobile_offcanvas_close_background',
	array(
		'default'           => 'rgba(255,255,255,0)',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_mobile_offcanvas_close_background',
		array(
			'label'         	=> esc_html__( 'Background', 'knote' ),
			'section'       	=> 'knote_section_header_mobile_offcanvas',
			'priority'			=> 40
		)
	)
);

$wp_customize->add_setting( 'knote_mobile_offcanvas_close_style_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_mobile_offcanvas_close_style_divider',
		array(
			'section' 		=> 'knote_section_header_mobile_offcanvas',
			'priority' 			=> 40
		)
	)
);

// // Margin
$wp_customize->add_setting(
    'knote_mobile_offcanvas_margin_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_mobile_offcanvas_margin_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);

$wp_customize->add_setting(
    'knote_mobile_offcanvas_margin_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_mobile_offcanvas_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'knote' ),
            'section'         	=> 'knote_section_header_mobile_offcanvas',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'              => array( 'px', 'em', 'rem' ),
            'responsive'   	 => true,
            'settings'        	 => array(
                'desktop' => 'knote_mobile_offcanvas_margin_desktop',
                'tablet'  => 'knote_mobile_offcanvas_margin_tablet',
                'mobile'  => 'knote_mobile_offcanvas_margin_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Padding
$wp_customize->add_setting(
    'knote_mobile_offcanvas_padding_desktop',
    array(
        'default'           => '{ "unit": "px","top": "20", "right": "20", "bottom": "20", "left": "20" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_mobile_offcanvas_padding_tablet',
    array(
        'default'           => '{ "unit": "px","top": "20", "right": "20", "bottom": "20", "left": "20" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_mobile_offcanvas_padding_mobile',
    array(
        'default'           => '{ "unit": "px","top": "20", "right": "20", "bottom": "20", "left": "20" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);

$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_mobile_offcanvas_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'knote' ),
            'section'         	=> 'knote_section_header_mobile_offcanvas',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'             => array( 'px', 'em', 'rem' ),
            'responsive'   	    => true,
            'settings'        	=> array(
                'desktop' => 'knote_mobile_offcanvas_padding_desktop',
                'tablet'  => 'knote_mobile_offcanvas_padding_tablet',
                'mobile'  => 'knote_mobile_offcanvas_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);
