<?php
/**
 * Builder
 * Header Builder Options
 *
 * @package Knote
 */

/**
 * Tabs (Layout / Design)
 *
 */
$wp_customize->add_setting(
    'knote_section_header_builder_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Tabs (
        $wp_customize,
        'knote_section_header_builder_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'knote_section_header_wrapper',
            'controls_general'		=> json_encode(
				array(
					'#customize-control-knote_header_builder_goto_sections',
					'#customize-control-knote_header_builder_transparent_enable',
					'#customize-control-knote_header_builder_transparent_row',
					'#customize-control-knote_header_builder_container',
					'#customize-control-knote_header_builder_sticky_enable',
					'#customize-control-knote_header_builder_sticky_row'
				)
            ),
            'controls_design'		=> json_encode(
				array(
					'#customize-control-knote_header_builder_background',
					// '#customize-control-knote_header_builder_background_image',
					// '#customize-control-knote_header_builder_background_size',
					// '#customize-control-knote_header_builder_background_position',
					// '#customize-control-knote_header_builder_background_repeat',
					'#customize-control-knote_header_builder_padding'
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

// Header Section Shortcuts
$wp_customize->add_setting(
	'knote_header_builder_goto_sections',
	array(
		'default'             => '',
		'sanitize_callback' => 'esc_attr'
	)
);

$wp_customize->add_control( new Knote_Control_Text( $wp_customize, 'knote_header_builder_goto_sections',
		array(
			'description' 	=> '
				<span class="customize-control-title" style="font-style: normal;">' . esc_html__( 'Global Header', 'knote' ) . '</span>
				<div class="customize-section-shortcuts">
					<a class="widget-area-goto-link" href="javascript:wp.customize.section( \'knote_section_header_row_above\' ).focus();">' . esc_html__( 'Top Row', 'knote' ) . '<span class="dashicons dashicons-arrow-right-alt2"></span></a>
					<a class="widget-area-goto-link" href="javascript:wp.customize.section( \'knote_section_header_row_main\' ).focus();">' . esc_html__( 'Main Row', 'knote' ) . '<span class="dashicons dashicons-arrow-right-alt2"></span></a>
					<a class="widget-area-goto-link" href="javascript:wp.customize.section( \'knote_section_header_row_below\' ).focus();">' . esc_html__( 'Bottom Row', 'knote' ) . '<span class="dashicons dashicons-arrow-right-alt2"></span></a>
					<a class="widget-area-goto-link" href="javascript:wp.customize.section( \'knote_section_header_mobile_offcanvas\' ).focus();">' . esc_html__( 'Mobile Header', 'knote' ) . '<span class="dashicons dashicons-arrow-right-alt2"></span></a>
				</div>
			',
			'section' 		=> 'knote_section_header_wrapper',
            'priority' 		=> 20
		)
	)
);

// Header Transparent
$wp_customize->add_setting(
	'knote_header_builder_transparent_enable',
	array(
		'default'           => 0,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_header_builder_transparent_enable',
		array(
			'label'         	=> esc_html__( 'Enable Transparent Header', 'knote' ),
			'description'		=> esc_html__( 'The header stays over the content. You need to manually change the background color from each header builder row to be transparent.', 'knote'),
			'section'       	=> 'knote_section_header_wrapper',
			'settings'      	=> 'knote_header_builder_transparent_enable',
			'priority' 		=> 25
		)
	)
);

// Header Transparent - Apply transparent header to
$wp_customize->add_setting(
	'knote_header_builder_transparent_row',
	array(
		'default'           => 'main',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'knote_header_builder_transparent_row',
	array(
		'type' 		      => 'select',
		'label'           => esc_html__( 'Apply Transparent Header To', 'knote' ),
		'section'         => 'knote_section_header_wrapper',
		'choices'         => array(
			'all' 		=> __( 'All Rows', 'knote' ),
			'main' 		=> __( 'Main Row', 'knote' ),
			'bottom'  	=> __( 'Bottom Row', 'knote' )
		),
		'active_callback' => 'knote_header_transparent_enabled',
		'priority'		  => 25
	)
);

// Header Container
$wp_customize->add_setting(
	'knote_header_builder_container',
	array(
		'default' 			=> 'container',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_RadioButtons(
		$wp_customize,
		'knote_header_builder_container',
		array(
			'label' 		=> esc_html__( 'Container', 'knote' ),
			'section' 		=> 'knote_section_header_wrapper',
			'choices' => array(
				'container' 		=> esc_html__( 'Contained', 'knote' ),
				'container-fluid' 	=> esc_html__( 'Full-width', 'knote' ),
			),
			'priority'		  => 25
		)
	)
);

// Header Sticky
$wp_customize->add_setting(
	'knote_header_builder_sticky_enable',
	array(
		'default'           => 0,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_header_builder_sticky_enable',
		array(
			'label'         	=> esc_html__( 'Enable Sticky Header', 'knote' ),
			'section'       	=> 'knote_section_header_wrapper',
			'settings'      	=> 'knote_header_builder_sticky_enable',
			'priority' 			=> 25
		)
	)
);

// Sticky Header Row
$wp_customize->add_setting(
	'knote_header_builder_sticky_row',
	array(
		'default' 			=> 'main',
		'sanitize_callback' => 'knote_sanitize_select'
	)
);

$wp_customize->add_control(
	'knote_header_builder_sticky_row',
	array(
		'type' 		      => 'select',
		'label' 	      => esc_html__( 'Header Row To Sticky', 'knote' ),
		'choices'         => array(
         	'all' 	        => esc_html__( 'All Rows', 'knote' ),
			'main' 			=> esc_html__( 'Main Row', 'knote' ),
         	'below' 		=> esc_html__( 'Bottom Row', 'knote' )
		),
        'section' 	      => 'knote_section_header_wrapper',
        'active_callback' => 'knote_sticky_header_enabled',
        'priority'        => 25
	)
);

/**
 * Design (Tab Content)
 *
 */

// Background color
$wp_customize->add_setting(
	'knote_header_builder_background',
	array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);
$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_header_builder_background',
		array(
			'label'         	=> esc_html__( 'Background color', 'knote' ),
			'section'       	=> 'knote_section_header_wrapper',
			'priority'			=> 35
		)
	)
);

// // Background Image
// $wp_customize->add_setting(
// 	'knote_header_builder_background_image',
// 	array(
// 		'default'           => '',
// 		'sanitize_callback' => 'absint',
// 	)
// );
// $wp_customize->add_control(
// 	new WP_Customize_Media_Control(
// 		$wp_customize,
// 		'knote_header_builder_background_image',
// 		array(
// 			'label'           => __( 'Background Image', 'knote' ),
// 			'section'         => 'knote_section_header_wrapper',
// 			'mime_type'       => 'image',
// 			'priority'	      => 35
// 		)
// 	)
// );

// // Background Size
// $wp_customize->add_setting(
// 	'knote_header_builder_background_size',
// 	array(
// 		'default'           => 'cover',
// 		'sanitize_callback' => 'knote_sanitize_select'
// 	)
// );
// $wp_customize->add_control(
// 	'knote_header_builder_background_size',
// 	array(
// 		'type' 		      => 'select',
// 		'label' 	      => esc_html__( 'Background Size', 'knote' ),
// 		'choices'         => array(
// 			'cover'   => esc_html__( 'Cover', 'knote' ),
// 			'contain' => esc_html__( 'Contain', 'knote' )
// 		),
// 		'section' 	      => 'knote_section_header_wrapper',
// 		'active_callback' => function(){ return get_theme_mod( 'knote_header_builder_background_image' ) ? true : false; },
// 		'priority'        => 35
// 	)
// );

// // Background Position
// $wp_customize->add_setting(
// 	'knote_header_builder_background_position',
// 	array(
// 		'default'           => 'center',
// 		'sanitize_callback' => 'knote_sanitize_select'
// 	)
// );
// $wp_customize->add_control(
// 	'knote_header_builder_background_position',
// 	array(
// 		'type' 		      => 'select',
// 		'label' 	      => esc_html__( 'Background Position', 'knote' ),
// 		'choices'         => array(
// 			'top'    => esc_html__( 'Top', 'knote' ),
// 			'center' => esc_html__( 'Center', 'knote' ),
// 			'bottom' => esc_html__( 'Bottom', 'knote' )
// 		),
// 		'section' 	      => 'knote_section_header_wrapper',
// 		'active_callback' => function(){ return get_theme_mod( 'knote_header_builder_background_image' ) ? true : false; },
// 		'priority'        => 35
// 	)
// );

// // Background Repeat
// $wp_customize->add_setting(
// 	'knote_header_builder_background_repeat',
// 	array(
// 		'default'           => 'no-repeat',
// 		'sanitize_callback' => 'knote_sanitize_select'
// 	)
// );
// $wp_customize->add_control(
// 	'knote_header_builder_background_repeat',
// 	array(
// 		'type' 		      => 'select',
// 		'label' 	      => esc_html__( 'Background Repeat', 'knote' ),
// 		'choices'         => array(
// 			'no-repeat' => esc_html__( 'No Repeat', 'knote' ),
// 			'repeat'    => esc_html__( 'Repeat', 'knote' )
// 		),
// 		'section' 	      => 'knote_section_header_wrapper',
// 		'active_callback' => function(){ return get_theme_mod( 'knote_header_builder_background_image' ) ? true : false; },
// 		'priority'        => 35
// 	)
// );

// Padding
$wp_customize->add_setting(
	'knote_header_builder_padding_desktop',
	array(
		'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);
$wp_customize->add_setting(
	'knote_header_builder_padding_tablet',
	array(
		'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_setting(
	'knote_header_builder_padding_mobile',
	array(
		'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);
$wp_customize->add_control(
	new Knote_Control_Dimensions(
		$wp_customize,
		'knote_header_builder_padding',
		array(
			'label'           	=> __( 'Padding', 'knote' ),
			'section'         	=> 'knote_section_header_wrapper',
			'sides'             => array(
				'top'    => true,
				'right'  => true,
				'bottom' => true,
				'left'   => true
			),
			'units'             => array( 'px', 'em', 'rem' ),
			'responsive'   	 	=> true,
			'settings'        	=> array(
				'desktop' => 'knote_header_builder_padding_desktop',
				'tablet'  => 'knote_header_builder_padding_tablet',
				'mobile'  => 'knote_header_builder_padding_mobile'
			),
			'priority'	      	 => 35
		)
	)
);
