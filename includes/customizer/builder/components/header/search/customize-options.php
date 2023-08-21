<?php
/**
 * Builder
 * Search
 *
 * @package Knote
 */

$wp_customize->add_section(
    'knote_header_component_search',
    array(
        'title'      => esc_html__( 'Search', 'knote' ),
        'panel'      => 'knote_header_panel'
    )
);

$wp_customize->add_setting(
    'knote_header_component_search_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Tabs (
        $wp_customize,
        'knote_header_component_search_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'knote_header_component_search',
            'controls_general'		=> json_encode(
                array_merge(
                    array(
                        '#customize-control-knote_header_component_search_layout',
                    )
                ),
            ),
            'controls_design'		=> json_encode(
                array_merge(
                    array(
                        '#customize-control-knote_header_component_search_color',
                        '#customize-control-knote_header_component_search_icon_color',
                        '#customize-control-knote_header_component_search_background_color',
                        '#customize-control-knote_header_component_search_border_color',
                        '#customize-control-knote_header_component_search_color_divider',
                        '#customize-control-knote_header_component_search_sticky_title',
                        '#customize-control-knote_header_component_search_sticky_color',
                        '#customize-control-knote_header_component_search_sticky_color_divider',
                        '#customize-control-knote_header_component_search_margin',
                        '#customize-control-knote_header_component_search_padding'
                    )
                )
            ),
            'priority' 				=> 20
        )
    )
);

$wp_customize->add_setting(
	'knote_header_component_search_layout',
	array(
		'default' 			=> 'icon',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_RadioButtons(
		$wp_customize,
		'knote_header_component_search_layout',
		array(
			'label' 		=> esc_html__( 'Layout', 'knote' ),
			'section' 		=> 'knote_header_component_search',
			'choices' => array(
				'icon' 		    => esc_html__( 'Icon Only', 'knote' ),
				'search-box' 	=> esc_html__( 'Search Box', 'knote' ),
			),
			'priority'		  => 25
		)
	)
);

$wp_customize->add_setting(
	'knote_header_component_search_color',
	array(
		'default'           => '#FFFFFF',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_AlphaColor(
        $wp_customize,
        'knote_header_component_search_color',
        array(
            'label'    => esc_html__( 'Color', 'knote' ),
            'section'  => 'knote_header_component_search',
            'settings' => 'knote_header_component_search_color',
            'border'   => true,
            'priority' => 25
        )
    )
);

$wp_customize->add_setting(
	'knote_header_component_search_background_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_AlphaColor(
        $wp_customize,
        'knote_header_component_search_background_color',
        array(
            'label'    => esc_html__( 'Background', 'knote' ),
            'section'  => 'knote_header_component_search',
            'settings' => 'knote_header_component_search_background_color',
            'border'   => true,
            'priority' => 25
        )
    )
);

// Icon Color
$wp_customize->add_setting(
	'knote_header_component_search_icon_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_header_component_search_icon_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_header_component_search_icon_color',
        array(
            'label'    => esc_html__( 'Icon Color', 'knote' ),
            'section'  => 'knote_header_component_search',
            'settings' => array(
                'normal' => 'knote_header_component_search_icon_color',
                'hover'  => 'knote_header_component_search_icon_color_hover',
            ),
            'border'   => true,
            'priority' => 25
        )
    )
);

$wp_customize->add_setting(
	'knote_header_component_search_border_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_AlphaColor(
        $wp_customize,
        'knote_header_component_search_border_color',
        array(
            'label'    => esc_html__( 'Border Color', 'knote' ),
            'section'  => 'knote_header_component_search',
            'settings' => 'knote_header_component_search_border_color',
            'priority' => 25
        )
    )
);

$wp_customize->add_setting( 'knote_header_component_search_color_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_header_component_search_color_divider',
		array(
			'section' 		=> 'knote_header_component_search',
			'priority' 			=> 25
		)
	)
);

// Sticky Header - Title
$wp_customize->add_setting(
    'knote_header_component_search_sticky_title',
    array(
        'default' 			=> '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Text(
        $wp_customize,
        'knote_header_component_search_sticky_title',
        array(
            'label'			  => esc_html__( 'Sticky Header - Active State', 'knote' ),
            'description'     => esc_html__( 'Control the colors when the sticky header state is active.', 'knote' ),
            'section' 		  => 'knote_header_component_search',
            'active_callback' => 'knote_sticky_header_enabled',
            'priority'	 	  => 32
        )
    )
);

// Sticky Header - Icon Color
$wp_customize->add_setting(
	'knote_header_component_search_sticky_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_header_component_search_sticky_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_header_component_search_sticky_color',
        array(
            'label'    => esc_html__( 'Icon Color', 'knote' ),
            'section'  => 'knote_header_component_search',
            'settings' => array(
                'normal' => 'knote_header_component_search_sticky_color',
                'hover'  => 'knote_header_component_search_sticky_color_hover',
            ),
            'active_callback' => 'knote_sticky_header_enabled',
            'priority' => 33
        )
    )
);

$wp_customize->add_setting( 'knote_header_component_search_sticky_color_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_header_component_search_sticky_color_divider',
		array(
			'section' 		=> 'knote_header_component_search',
            'active_callback' => 'knote_sticky_header_enabled',
			'priority' 			=> 33
		)
	)
);

// Margin
$wp_customize->add_setting(
    'knote_header_component_search_margin_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_search_margin_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_search_margin_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_header_component_search_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'knote' ),
            'section'         	=> 'knote_header_component_search',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'             => array( 'px', 'em', 'rem'),
            'responsive'   	    => true,
            'settings'        	=> array(
                'desktop' => 'knote_header_component_search_margin_desktop',
                'tablet'  => 'knote_header_component_search_margin_tablet',
                'mobile'  => 'knote_header_component_search_margin_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Padding
$wp_customize->add_setting(
    'knote_header_component_search_padding_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_search_padding_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_search_padding_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_header_component_search_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'knote' ),
            'section'         	=> 'knote_header_component_search',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'             => array( 'px', 'em', 'rem'),
            'responsive'   	    => true,
            'settings'        	=> array(
                'desktop' => 'knote_header_component_search_padding_desktop',
                'tablet'  => 'knote_header_component_search_padding_tablet',
                'mobile'  => 'knote_header_component_search_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);
