<?php
/**
 * Builder
 * Footer Builder Options
 *
 * @package Knote
 */

/**
 * Tabs (Layout / Design)
 *
 */
$wp_customize->add_setting(
    'knote_section_footer_builder_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Tabs (
        $wp_customize,
        'knote_section_footer_builder_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'knote_section_footer_wrapper',
            'controls_general'		=> json_encode(
				array(
					'#customize-control-knote_footer_builder_goto_sections',
					'#customize-control-knote_footer_builder_container',
					'#customize-control-knote_footer_type',
				)
            ),
            'controls_design'		=> json_encode(
				array(
					'#customize-control-knote_footer_builder_background',
					'#customize-control-knote_footer_builder_padding'
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

// Footer Section Shortcuts
$wp_customize->add_setting(
	'knote_footer_builder_goto_sections',
	array(
		'default'             => '',
		'sanitize_callback' => 'esc_attr'
	)
);

$wp_customize->add_control( new Knote_Control_Text( $wp_customize, 'knote_footer_builder_goto_sections',
		array(
			'description' 	=> '
				<span class="customize-control-title" style="font-style: normal;">' . esc_html__( 'Global Footer', 'knote' ) . '</span>
				<div class="customize-section-shortcuts">
					<a class="widget-area-goto-link" href="javascript:wp.customize.section( \'knote_section_footer_row_above\' ).focus();">' . esc_html__( 'Top Row', 'knote' ) . '<span class="dashicons dashicons-arrow-right-alt2"></span></a>
					<a class="widget-area-goto-link" href="javascript:wp.customize.section( \'knote_section_footer_row_main\' ).focus();">' . esc_html__( 'Main Row', 'knote' ) . '<span class="dashicons dashicons-arrow-right-alt2"></span></a>
					<a class="widget-area-goto-link" href="javascript:wp.customize.section( \'knote_section_footer_row_below\' ).focus();">' . esc_html__( 'Bottom Row', 'knote' ) . '<span class="dashicons dashicons-arrow-right-alt2"></span></a>
				</div>
			',
			'section' 		=> 'knote_section_footer_wrapper',
            'priority' 		=> 20
		)
	)
);

// Footer Container
$wp_customize->add_setting(
	'knote_footer_builder_container',
	array(
		'default' 			=> 'container',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_RadioButtons(
		$wp_customize,
		'knote_footer_builder_container',
		array(
			'label' 		=> esc_html__( 'Container', 'knote' ),
			'section' 		=> 'knote_section_footer_wrapper',
			'choices' => array(
				'container' 		=> esc_html__( 'Contained', 'knote' ),
				'container-fluid' 	=> esc_html__( 'Full-width', 'knote' ),
			),
			'priority'		  => 25
		)
	)
);

/**
 * Design (Tab Content)
 *
 */

// Background color
$wp_customize->add_setting(
	'knote_footer_builder_background',
	array(
		'default'           => '#f8f8f8',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_footer_builder_background',
		array(
			'label'         	=> esc_html__( 'Background color', 'knote' ),
			'section'       	=> 'knote_section_footer_wrapper',
			'priority'			=> 35
		)
	)
);

// Padding
$wp_customize->add_setting(
	'knote_footer_builder_padding_desktop',
	array(
		'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);
$wp_customize->add_setting(
	'knote_footer_builder_padding_tablet',
	array(
		'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_setting(
	'knote_footer_builder_padding_mobile',
	array(
		'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);
$wp_customize->add_control(
	new Knote_Control_Dimensions(
		$wp_customize,
		'knote_footer_builder_padding',
		array(
			'label'           	=> __( 'Padding', 'knote' ),
			'section'         	=> 'knote_section_footer_wrapper',
			'sides'             => array(
				'top'    => true,
				'right'  => true,
				'bottom' => true,
				'left'   => true
			),
			'units'             => array( 'px', 'em', 'rem' ),
			'responsive'   	 	=> true,
			'settings'        	=> array(
				'desktop' => 'knote_footer_builder_padding_desktop',
				'tablet'  => 'knote_footer_builder_padding_tablet',
				'mobile'  => 'knote_footer_builder_padding_mobile'
			),
			'priority'	      	 => 35
		)
	)
);
