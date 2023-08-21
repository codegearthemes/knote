<?php

/*--------------------------------------------
	Footer Credits
---------------------------------------------*/
$wp_customize->add_section('knote_footer_component_credits',
	array(
		'title'      => esc_html__( 'Copyright', 'knote'),
		'panel'      => 'knote_footer_panel',
	)
);

$wp_customize->add_setting( 'knote_footer_component_credits_tabs',
	array(
		'default'           => '',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
    new Knote_Control_Tabs(
        $wp_customize,
        'knote_footer_component_credits_tabs',
		array(
			'label' 				=> esc_html__( 'Footer credit tabs', 'knote' ),
			'section'       		=> 'knote_footer_component_credits',
			'controls_general'		=> json_encode(
                array(
                    '#customize-control-knote_footer_component_credits_text',
                    '#customize-control-knote_footer_component_credits_alignment'
                )
            ),
			'controls_design'		=> json_encode(
                array(
                    '#customize-control-knote_footer_component_credits_color',
                    '#customize-control-knote_footer_component_credits_link_color',
                    '#customize-control-knote_footer_component_credits_style_divider',
                    '#customize-control-knote_footer_component_credits_margin',
                    '#customize-control-knote_footer_component_credits_padding'
                )
            )
		)
	)
);

/*--------------------------------------------
General
---------------------------------------------*/
$wp_customize->add_setting('knote_footer_component_credits_text',
	array(
		'default'           => sprintf( esc_html__( '%1$1s. Proudly powered by %2$2s', 'knote' ), '{copyright} {year} {site_title}', '{theme_author}' ),// phpcs:ignore WordPress.WP.I18n.MissingTranslatorsComment
		'sanitize_callback' => 'knote_sanitize_text',
		'transport' 		=> 'refresh'
	)
);
$wp_customize->add_control( 'knote_footer_component_credits_text',
	array(
		'label'       	  => esc_html__( 'Footer credits', 'knote' ),
		'description' 	  => esc_html__( 'You can use the following tags: {copyright}, {year}, {site_title}', 'knote' ),
		'type'        	  => 'textarea',
		'section'         => 'knote_footer_component_credits',
		'priority'    	  => 10
	)
);

$wp_customize->add_setting( 'knote_footer_component_credits_alignment',
	array(
		'default' 			=> 'center',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);
$wp_customize->add_control(
	new Knote_Control_RadioButtons(
		$wp_customize,
		'knote_footer_component_credits_alignment',
		array(
			'label'   => esc_html__( 'Alignment', 'knote' ),
			'section' => 'knote_footer_component_credits',
			'choices' => array(
				'left' 		=> '<svg width="16" height="13" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h10v1H0zM0 4h16v1H0zM0 8h10v1H0zM0 12h16v1H0z"/></svg>',
				'center' 	=> '<svg width="16" height="13" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M3 0h10v1H3zM0 4h16v1H0zM3 8h10v1H3zM0 12h16v1H0z"/></svg>',
				'right' 	=> '<svg width="16" height="13" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M6 0h10v1H6zM0 4h16v1H0zM6 8h10v1H6zM0 12h16v1H0z"/></svg>',
			),
			'priority'	 => 10
		)
	)
);


/*--------------------------------------------
Styling
---------------------------------------------*/
$wp_customize->add_setting( 'knote_footer_component_credits_color',
	array(
		'default'           => '#333333',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
    new Knote_Control_AlphaColor(
        $wp_customize,
        'knote_footer_component_credits_color',
		array(
			'label'         	=> esc_html__( 'Text color', 'knote' ),
			'section'       	=> 'knote_footer_component_credits',
            'border'            => true,
			'priority' 			=> 45
		)
	)
);

$wp_customize->add_setting( 'knote_footer_component_credits_link_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);
$wp_customize->add_setting( 'knote_footer_component_credits_link_color_hover',
	array(
		'default'           => '#000000',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_footer_component_credits_link_color',
        array(
            'label'    => esc_html__( 'Link Color', 'knote' ),
            'section'  => 'knote_footer_component_credits',
            'settings' => array(
                'normal' => 'knote_footer_component_credits_link_color',
                'hover'  => 'knote_footer_component_credits_link_color_hover',
            ),
            'priority' => 45
        )
    )
);

$wp_customize->add_setting( 'knote_footer_component_credits_style_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_footer_component_credits_style_divider',
		array(
			'section' 		=> 'knote_footer_component_credits',
			'priority' 			=> 72
		)
	)
);

// Margin
$wp_customize->add_setting(
    'knote_footer_component_credits_margin_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_footer_component_credits_margin_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_footer_component_credits_margin_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_footer_component_credits_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'knote' ),
            'section'         	=> 'knote_footer_component_credits',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'              => array( 'px', 'em', 'rem' ),
            'responsive'   	     => true,
            'settings'        	 => array(
                'desktop' => 'knote_footer_component_credits_margin_desktop',
                'tablet'  => 'knote_footer_component_credits_margin_tablet',
                'mobile'  => 'knote_footer_component_credits_margin_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Padding
$wp_customize->add_setting(
    'knote_footer_component_credits_padding_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_footer_component_credits_padding_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_footer_component_credits_padding_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_footer_component_credits_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'knote' ),
            'section'         	=> 'knote_footer_component_credits',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'              => array( 'px', 'em', 'rem' ),
            'responsive'   	     => true,
            'settings'        	 => array(
                'desktop' => 'knote_footer_component_credits_padding_desktop',
                'tablet'  => 'knote_footer_component_credits_padding_tablet',
                'mobile'  => 'knote_footer_component_credits_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);
