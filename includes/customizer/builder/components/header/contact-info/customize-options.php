<?php
/**
 * Builder
 * Contact Information
 *
 * @package Knote
 */

 $wp_customize->add_section(
    'knote_header_component_contact_information',
    array(
        'title'      => esc_html__( 'Contact Info', 'knote' ),
        'panel'      => 'knote_header_panel'
    )
);

$wp_customize->add_setting(
    'knote_header_component_contact_information_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Tabs (
        $wp_customize,
        'knote_header_component_contact_information_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'knote_header_component_contact_information',
            'controls_general'		=> json_encode(
                array(
                    '#customize-control-knote_builder_contact_info_email',
                    '#customize-control-knote_builder_contact_info_phone',
                    '#customize-control-knote_builder_contact_info_display_inline'
                )
            ),
            'controls_design'		=> json_encode(
                array(
                    '#customize-control-knote_builder_contact_info_default_title',
                    '#customize-control-knote_builder_contact_info_icon_color',
                    '#customize-control-knote_builder_contact_info_text_color',

                    // Sticky Active State
                    '#customize-control-knote_builder_contact_info_sticky_title',
                    '#customize-control-knote_builder_contact_info_icon_sticky_color',
                    '#customize-control-knote_builder_contact_info_text_sticky_color',

                    '#customize-control-knote_builder_contact_info_padding',
                    '#customize-control-knote_builder_contact_info_margin'
                )
            ),
            'priority' 				=> 20
        )
    )
);

/**
 * Layout (Tab Content)
 *
 */
$wp_customize->add_setting(
	'knote_builder_contact_info_email',
	array(
        'default'           => esc_html__( 'info@example.org', 'knote' ),
		'sanitize_callback' => 'knote_sanitize_text',
	)
);
$wp_customize->add_control(
    'knote_builder_contact_info_email',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Email address', 'knote' ),
        'section'     => 'knote_header_component_contact_information',
        'priority'			=> 50
    )
);

$wp_customize->add_setting(
	'knote_builder_contact_info_phone',
	array(
        'default'           => esc_html__( '+1(555) 555-1234', 'knote' ),
		'sanitize_callback' => 'knote_sanitize_text',
	)
);
$wp_customize->add_control(
    'knote_builder_contact_info_phone',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Phone number', 'knote' ),
        'section'     => 'knote_header_component_contact_information',
        'priority'			=> 50
    )
);

$wp_customize->add_setting(
    'knote_builder_contact_info_display_inline',
    array(
        'default'           => 1,
        'sanitize_callback' => 'knote_sanitize_checkbox'
    )
);
$wp_customize->add_control(
    new Knote_Control_Switch(
        $wp_customize,
        'knote_builder_contact_info_display_inline',
        array(
            'label'         	=> esc_html__( 'Display inline', 'knote' ),
            'section'       	=> 'knote_header_component_contact_information',
            'priority' 			=> 50
        )
    )
);

/**
 * Style (Tab Content)
 *
 */
// Default State Title.
$wp_customize->add_setting(
    'knote_builder_contact_info_default_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	)
);
$wp_customize->add_control(
    new Knote_Control_Text(
        $wp_customize,
        'knote_builder_contact_info_default_title',
        array(
            'label'    => esc_html__( 'Default style', 'knote' ),
            'section'  => 'knote_header_component_contact_information',
            'priority' => 25
        )

	)
);

// Icons Color
$wp_customize->add_setting(
	'knote_builder_contact_info_icon_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_builder_contact_info_icon_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_builder_contact_info_icon_color',
        array(
            'label'    => esc_html__( 'Icons Color', 'knote' ),
            'section'  => 'knote_header_component_contact_information',
            'settings' => array(
                'normal' => 'knote_builder_contact_info_icon_color',
                'hover'  => 'knote_builder_contact_info_icon_color_hover',
            ),
            'priority' => 25
        )
    )
);

// Text Color
$wp_customize->add_setting(
	'knote_builder_contact_info_text_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_builder_contact_info_text_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_builder_contact_info_text_color',
        array(
            'label'    => esc_html__( 'Text Color', 'knote' ),
            'section'  => 'knote_header_component_contact_information',
            'settings' => array(
                'normal' => 'knote_builder_contact_info_text_color',
                'hover'  => 'knote_builder_contact_info_text_color_hover',
            ),
            'priority' => 35
        )
    )
);

// Sticky Header - Title
$wp_customize->add_setting(
    'knote_builder_contact_info_sticky_title',
    array(
        'default' 			=> '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Text(
        $wp_customize,
        'knote_builder_contact_info_sticky_title',
        array(
            'label'			  => esc_html__( 'Sticky Header - Active State', 'knote' ),
            'description'     => esc_html__( 'Control the colors when the sticky header state is active.', 'knote' ),
            'section' 		  => 'knote_header_component_contact_information',
            'active_callback' => 'knote_sticky_header_enabled',
            'priority'	 	  => 42
        )
    )
);

// Sticky Header - Icons Color
$wp_customize->add_setting(
	'knote_builder_contact_info_icon_sticky_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_builder_contact_info_icon_sticky_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_builder_contact_info_icon_sticky_color',
        array(
            'label'    => esc_html__( 'Icons Color', 'knote' ),
            'section'  => 'knote_header_component_contact_information',
            'settings' => array(
                'normal' => 'knote_builder_contact_info_icon_sticky_color',
                'hover'  => 'knote_builder_contact_info_icon_sticky_color_hover',
            ),
			'active_callback' => 'knote_sticky_header_enabled',
            'priority' => 43
        )
    )
);

// Sticky Header - Text Color
$wp_customize->add_setting(
	'knote_builder_contact_info_text_sticky_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_builder_contact_info_text_sticky_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_builder_contact_info_text_sticky_color',
        array(
            'label'    => esc_html__( 'Text Color', 'knote' ),
            'section'  => 'knote_header_component_contact_information',
            'settings' => array(
                'normal' => 'knote_builder_contact_info_text_sticky_color',
                'hover'  => 'knote_builder_contact_info_text_sticky_color_hover',
            ),
            'active_callback' => 'knote_sticky_header_enabled',
            'priority' => 45
        )
    )
);

// Margin
$wp_customize->add_setting(
    'knote_builder_contact_info_margin_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_builder_contact_info_margin_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_builder_contact_info_margin_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_builder_contact_info_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'knote' ),
            'section'         	=> 'knote_header_component_contact_information',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'              => array( 'px', 'em', 'rem' ),
            'responsive'   	 => true,
            'settings'        	 => array(
                'desktop' => 'knote_builder_contact_info_margin_desktop',
                'tablet'  => 'knote_builder_contact_info_margin_tablet',
                'mobile'  => 'knote_builder_contact_info_margin_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Padding
$wp_customize->add_setting(
    'knote_builder_contact_info_padding_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_builder_contact_info_padding_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_builder_contact_info_padding_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_builder_contact_info_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'knote' ),
            'section'         	=> 'knote_header_component_contact_information',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'             => array( 'px', '%', 'rem' ),
            'responsive'   	    => true,
            'settings'        	=> array(
                'desktop' => 'knote_builder_contact_info_padding_desktop',
                'tablet'  => 'knote_builder_contact_info_padding_tablet',
                'mobile'  => 'knote_builder_contact_info_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);
