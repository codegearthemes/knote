<?php
/**
 * Footer Builder
 * Widget 1 Component
 *
 * @package Knote
 */

$wp_customize->add_section(
    'knote_footer_component_widget1',
    array(
        'title'      => esc_html__( 'Widget Area 1', 'knote' ),
        'panel'      => 'knote_footer_panel'
    )
);

$wp_customize->add_setting(
    'knote_footer_component_widget1_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Tabs (
        $wp_customize,
        'knote_footer_component_widget1_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'knote_footer_component_widget1',
            'controls_general'		=> json_encode(
                array(
                    '#customize-control-knote_footer_component_widget1_goto_sections'
                )
            ),
            'controls_design'		=> json_encode(
                array(
                    '#customize-control-knote_footer_component_widget1_title_color',
                    '#customize-control-knote_footer_component_widget1_text_color',
                    '#customize-control-knote_footer_component_widget1_links_color',
                    '#customize-control-knote_footer_component_widget1_style_divider',
					'#customize-control-knote_footer_component_widget1_margin',
					'#customize-control-knote_footer_component_widget1_padding'
                )
            ),
            'priority' 				=> 20
        )
    )
);

// Go to button (edit widget)
$wp_customize->add_setting( 'knote_footer_component_widget1_goto_sections',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	)
);
$wp_customize->add_control(
    new Knote_Control_Text(
        $wp_customize,
        'knote_footer_component_widget1_goto_sections',
		array(
			'description' 	=> '
				<span class="customize-control-title" style="font-style: normal;">' . esc_html__( 'Footer Widget', 'knote' ) . '</span>
				<div class="customize-section-shortcuts">
					<a class="widget-area-goto-link" href="javascript:wp.customize.section( \'sidebar-widgets-footer-1\' ).active(true); wp.customize.section( \'sidebar-widgets-footer-1\' ).focus();">' . esc_html__( 'Footer Widget Area 1', 'knote' ) . '<span class="dashicons dashicons-arrow-right-alt2"></span></a>
				</div>
			',
			'section' 		=> 'knote_footer_component_widget1',
            'priority' 		=> 30
		)
	)
);

// Widget Title Color
$wp_customize->add_setting(
	'knote_footer_component_widget1_title_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_footer_component_widget1_title_color',
		array(
			'label'         	=> esc_html__( 'Title Color', 'knote' ),
			'section'       	=> 'knote_footer_component_widget1',
            'border'	        => true,
			'priority'			=> 30
		)
	)
);

// Text Color
$wp_customize->add_setting(
	'knote_footer_component_widget1_text_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_footer_component_widget1_text_color',
		array(
			'label'         	=> esc_html__( 'Text Color', 'knote' ),
			'section'       	=> 'knote_footer_component_widget1',
            'border'	        => true,
			'priority'			=> 30
		)
	)
);

// Links Color
$wp_customize->add_setting(
	'knote_footer_component_widget1_links_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_footer_component_widget1_links_color_hover',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_footer_component_widget1_links_color',
        array(
            'label'    => esc_html__( 'Links Color', 'knote' ),
            'section'  => 'knote_footer_component_widget1',
            'settings' => array(
                'normal' => 'knote_footer_component_widget1_links_color',
                'hover'  => 'knote_footer_component_widget1_links_color_hover',
            ),
            'priority' => 30
        )
    )
);

$wp_customize->add_setting( 'knote_footer_component_widget1_style_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_footer_component_widget1_style_divider',
		array(
			'section' 		=> 'knote_footer_component_widget1',
			'priority' 			=> 72
		)
	)
);

// Margin
$wp_customize->add_setting(
    'knote_footer_component_widget1_margin_desktop',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_footer_component_widget1_margin_tablet',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_footer_component_widget1_margin_mobile',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_footer_component_widget1_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'knote' ),
            'section'         	=> 'knote_footer_component_widget1',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'             => array( 'px', 'em', 'rem' ),
            'responsive'   	    => true,
            'settings'        	=> array(
                'desktop' => 'knote_footer_component_widget1_margin_desktop',
                'tablet'  => 'knote_footer_component_widget1_margin_tablet',
                'mobile'  => 'knote_footer_component_widget1_margin_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Padding
$wp_customize->add_setting(
    'knote_footer_component_widget1_padding_desktop',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_footer_component_widget1_padding_tablet',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_footer_component_widget1_padding_mobile',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_footer_component_widget1_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'knote' ),
            'section'         	=> 'knote_footer_component_widget1',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'              => array( 'px', 'em', 'rem' ),
            'responsive'   	 => true,
            'settings'        	 => array(
                'desktop' => 'knote_footer_component_widget1_padding_desktop',
                'tablet'  => 'knote_footer_component_widget1_padding_tablet',
                'mobile'  => 'knote_footer_component_widget1_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);
