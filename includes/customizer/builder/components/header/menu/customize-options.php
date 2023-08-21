<?php
/**
 * Builder
 * Menu
 *
 * @package Knote
 */

$wp_customize->add_section(
    'knote_header_component_menu',
    array(
        'title'      => esc_html__( 'Primary Menu', 'knote' ),
        'panel'      => 'knote_header_panel'
    )
);

$wp_customize->add_setting(
    'knote_header_component_menu_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Tabs (
        $wp_customize,
        'knote_header_component_menu_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'knote_header_component_menu',
            'controls_general'		=> json_encode(
                array(
                    '#customize-control-knote_header_component_menu_config'
                )
            ),
            'controls_design'		=> json_encode(
                array(
                    '#customize-control-knote_header_component_menu_style_title',
                    '#customize-control-knote_header_component_menu_color',
                    '#customize-control-knote_header_component_menu_divider_menu',
                    '#customize-control-knote_header_component_submenu_style_title',
                    '#customize-control-knote_header_component_submenu_color',
                    '#customize-control-knote_header_component_submenu_background',
                    '#customize-control-knote_header_component_menu_divider_dimensions',
                    '#customize-control-knote_header_component_menu_margin',
                    '#customize-control-knote_header_component_menu_padding'
                )
            ),
            'priority' 				=> 20
        )
    )
);

$wp_customize->add_setting(
    'knote_header_component_menu_config',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	)
);

$wp_customize->add_control(
    new Knote_Control_Text(
        $wp_customize,
        'knote_header_component_menu_config',
		array(
            'description' 	=> '
                <span class="customize-control-title" style="font-style: normal;">' . esc_html__( 'Configure Menu', 'knote' ) . '</span>
				<div class="customize-section-shortcuts">
                    <a class="widget-area-goto-link" href="javascript:wp.customize.section( \'menu_locations\' ).focus();">' . esc_html__( 'Configure menu', 'knote' ) . '<span class="dashicons dashicons-arrow-right-alt2"></span></a>
				</div>
			',
			'section' 		=> 'knote_header_component_menu',
            'priority'      => 20
		)
	)
);


/**
 * Design
 */
$wp_customize->add_setting(
    'knote_header_component_menu_style_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
    new Knote_Control_Heading(
        $wp_customize,
        'knote_header_component_menu_style_title',
		array(
			'label'			=> esc_html__( 'Menu Style', 'knote' ),
			'section' 		=> 'knote_header_component_menu',
            'priority' 			=> 30
		)
	)
);

$wp_customize->add_setting(
	'knote_header_component_menu_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_header_component_menu_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_header_component_menu_color',
        array(
            'label'    => esc_html__( 'Color', 'knote' ),
            'section'  => 'knote_header_component_menu',
            'settings' => array(
                'normal' => 'knote_header_component_menu_color',
                'hover'  => 'knote_header_component_menu_color_hover',
            ),
            'priority' => 30
        )
    )
);

$wp_customize->add_setting( 'knote_header_component_menu_divider_menu',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_header_component_menu_divider_menu',
		array(
			'section' 		=> 'knote_header_component_menu',
			'priority' 			=> 30
		)
	)
);

$wp_customize->add_setting( 'knote_header_component_submenu_style_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
    new Knote_Control_Heading(
        $wp_customize,
        'knote_header_component_submenu_style_title',
		array(
			'label'			=> esc_html__( 'Submenu Style', 'knote' ),
			'section' 		=> 'knote_header_component_menu',
            'priority' 			=> 30
		)
	)
);

$wp_customize->add_setting(
	'knote_header_component_submenu_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_header_component_submenu_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_header_component_submenu_color',
        array(
            'label'    => esc_html__( 'Submenu color', 'knote' ),
            'section'  => 'knote_header_component_menu',
            'settings' => array(
                'normal' => 'knote_header_component_submenu_color',
                'hover'  => 'knote_header_component_submenu_color_hover',
            ),
            'priority' => 30
        )
    )
);

$wp_customize->add_setting(
    'knote_header_component_submenu_background',
	array(
		'default'           => '#FFFFFF',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_control(
    new Knote_Control_AlphaColor(
        $wp_customize,
        'knote_header_component_submenu_background',
		array(
			'label'         	=> esc_html__( 'Submenu background', 'knote' ),
			'section'       	=> 'knote_header_component_menu',
            'priority' 			=> 30
		)
	)
);

$wp_customize->add_setting( 'knote_header_component_menu_divider_dimensions',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_header_component_menu_divider_dimensions',
		array(
			'section' 		=> 'knote_header_component_menu',
			'priority' 			=> 35
		)
	)
);

// Margin
$wp_customize->add_setting(
    'knote_header_component_menu_margin_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_menu_margin_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_menu_margin_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_header_component_menu_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'knote' ),
            'section'         	=> 'knote_header_component_menu',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'              => array( 'px', 'em', 'rem'),
            'responsive'   	 => true,
            'settings'        	 => array(
                'desktop' => 'knote_header_component_menu_margin_desktop',
                'tablet'  => 'knote_header_component_menu_margin_tablet',
                'mobile'  => 'knote_header_component_menu_margin_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Padding
$wp_customize->add_setting(
    'knote_header_component_menu_padding_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_menu_padding_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_menu_padding_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_header_component_menu_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'knote' ),
            'section'         	=> 'knote_header_component_menu',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'              => array( 'px', 'em', 'rem'),
            'responsive'   	     => true,
            'settings'        	 => array(
                'desktop' => 'knote_header_component_menu_padding_desktop',
                'tablet'  => 'knote_header_component_menu_padding_tablet',
                'mobile'  => 'knote_header_component_menu_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);
