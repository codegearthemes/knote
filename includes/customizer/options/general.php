<?php
/**
 * General Customizer options
 *
 * @package Knote
 */
/*--------------------------------------------
	General Panel
---------------------------------------------*/
$wp_customize->add_panel('knote_general_panel',
	array(
		'title'         => esc_html__( 'General', 'knote'),
		'priority'      => 5,
	)
);

$wp_customize->add_section( 'knote_container_section',
	array(
		'title'      => esc_html__( 'Container', 'knote'),
		'panel'      => 'knote_general_panel',
	)
);

$wp_customize->add_setting( 'knote_website_container',
	array(
		'default' 			=> 'container',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_RadioButtons(
		$wp_customize,
		'knote_website_container',
		array(
			'label' 		=> esc_html__( 'Container', 'knote' ),
			'section' 		=> 'knote_container_section',
			'choices' => array(
				'container' 		=> esc_html__( 'Contained', 'knote' ),
				'container-fluid' 	=> esc_html__( 'Full Width', 'knote' ),
			),
			'priority'		  => 10
		)
	)
);

$wp_customize->add_setting('knote_container_width',
	array(
		'default'           => 1260,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_container_width',
		array(
			'label' 		=> esc_html__('Container Width', 'knote'),
			'section' 		=> 'knote_container_section',
			'responsive'	=> false,
			'settings' 		=> array(
				'size_desktop' 		=> 'knote_container_width',
			),
			'input_attrs' => array(
				'min'	=> 990,
				'max'	=> 1920,
				'unit'  => 'px'
			),
			'priority'		  => 10
		)
	)
);

$wp_customize->add_section( 'knote_button_section',
	array(
		'title'      => esc_html__( 'Button', 'knote'),
		'panel'      => 'knote_general_panel',
	)
);

$wp_customize->add_setting('knote_button_tabs',
	array(
		'default'           => '',
		'sanitize_callback'	=> 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
    new Knote_Control_Tabs (
        $wp_customize,
        'knote_button_tabs',
		array(
			'label' 				=> esc_html__( 'Button tabs', 'knote'),
			'section'       		=> 'knote_button_section',
			'controls_general'		=> json_encode(
                array(
                    '#customize-control-knote_button_font_size',
					'#customize-control-knote_button_text_transform',
					'#customize-control-knote_button_letter_spacing',
					'#customize-control-knote_button_top_bottom_padding',
					'#customize-control-knote_button_border_radius'
                )
            ),
			'controls_design'		=> json_encode(
                array(
					'#customize-control-knote_button_color',
					'#customize-control-knote_button_background_color',
					'#customize-control-knote_button_border_color'
                )
            ),
            'priority'      => 10,
		)
	)
);

/*--------------------------------------------
	Button General
---------------------------------------------*/
// Button Font Size
$wp_customize->add_setting('knote_button_font_size_desktop', array(
	'default'           => 14,
	'sanitize_callback' => 'absint',
));

$wp_customize->add_setting('knote_button_font_size_tablet', array(
	'default'           => 14,
	'sanitize_callback' => 'absint',
));

$wp_customize->add_setting('knote_button_font_size_mobile', array(
	'default'           => 14,
	'sanitize_callback' => 'absint',
));
$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_button_font_size',
		array(
			'label'         => esc_html__('Font size', 'knote'),
			'section'       => 'knote_button_section',
			'responsive' 	=> true,
			'settings'      => array(
				'size_desktop' => 'knote_button_font_size_desktop',
				'size_tablet'  => 'knote_button_font_size_tablet',
				'size_mobile'  => 'knote_button_font_size_mobile',
			),
			'input_attrs' => array(
				'min'	=> 0,
				'max'	=> 50
			)
		)
	)
);

// Button Text Transform
$wp_customize->add_setting( 'knote_button_text_transform',
	array(
		'default' 			=> 'none',
		'sanitize_callback' => 'knote_sanitize_text',
	)
);
$wp_customize->add_control( new Knote_Control_RadioButtons(
	$wp_customize,
	'knote_button_text_transform',
	array(
		'label'   => esc_html__( 'Text transform', 'knote' ),
		'section' => 'knote_button_section',
		'choices' => array(
			'none' 			=> '-',
			'capitalize' 	=> 'Aa',
			'lowercase' 	=> 'aa',
			'uppercase' 	=> 'AA',
		)
	)
) );

// Button Letter Spacing
$wp_customize->add_setting('knote_button_letter_spacing', array(
	'default'           => 0,
	'sanitize_callback' => 'knote_sanitize_text',
));
$wp_customize->add_control(new Knote_Control_Slider(
	$wp_customize,
	'knote_button_letter_spacing',
	array(
		'label'         => esc_html__('Letter spacing', 'knote'),
		'section'       => 'knote_button_section',
		'responsive' => false,
		'settings'      => array(
			'size_desktop' => 'knote_button_letter_spacing',
		),
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 5,
			'step' => 0.1,
			'unit'  => 'em'
		)
	)
));

// Button Top and Bottom Padding
$wp_customize->add_setting('knote_button_top_bottom_padding_desktop', array(
	'default'           => 16,
	'sanitize_callback' => 'absint',
));

$wp_customize->add_setting('knote_button_top_bottom_padding_tablet', array(
	'default'           => 16,
	'sanitize_callback' => 'absint',
));

$wp_customize->add_setting('knote_button_top_bottom_padding_mobile', array(
	'default'           => 16,
	'sanitize_callback' => 'absint',
));
$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_button_top_bottom_padding',
		array(
			'label' 		=> esc_html__('Button padding', 'knote'),
			'section' 		=> 'knote_button_section',
			'responsive'	=> true,
			'settings' 		=> array(
				'size_desktop' 		=> 'knote_button_top_bottom_padding_desktop',
				'size_tablet' 		=> 'knote_button_top_bottom_padding_tablet',
				'size_mobile' 		=> 'knote_button_top_bottom_padding_mobile',
			),
			'input_attrs' => array(
				'min'	=> 0,
				'max'	=> 50,
				'unit'  => 'px'
			)
		)
	)
);

// Button Border Radius
$wp_customize->add_setting('knote_button_border_radius', array(
	'default'           => 4,
	'sanitize_callback' => 'absint',
));

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_button_border_radius',
		array(
			'label' 		=> esc_html__('Button radius', 'knote'),
			'section' 		=> 'knote_button_section',
			'responsive'	=> true,
			'settings' 		=> array(
				'size_desktop' 		=> 'knote_button_border_radius',
			),
			'input_attrs' => array(
				'min'	=> 0,
				'max'	=> 100,
				'unit'  => 'px'
			),
		)
	)
);

/*--------------------------------------------
	Button Style
---------------------------------------------*/
// Color
$wp_customize->add_setting(
	'knote_button_color',
	array(
		'default'           => '#FFFFFF',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_setting(
	'knote_button_color_hover',
	array(
		'default'           => '#FFFFFF',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_button_color',
        array(
            'label'    => esc_html__( 'Color', 'knote' ),
            'section'  => 'knote_button_section',
			'border' 	=> true,
            'settings' => array(
                'normal' => 'knote_button_color',
                'hover'  => 'knote_button_color_hover',
            ),
            'priority' => 31
        )
    )
);

// Background
$wp_customize->add_setting(
	'knote_button_background_color',
	array(
		'default'           => '#000000',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_setting(
	'knote_button_background_color_hover',
	array(
		'default'           => '#121212',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_button_background_color',
        array(
            'label'    => esc_html__( 'Background Color', 'knote' ),
            'section'  => 'knote_button_section',
			'border' 	=> true,
            'settings' => array(
                'normal' => 'knote_button_background_color',
                'hover'  => 'knote_button_background_color_hover',
            ),
            'priority' => 31
        )
    )
);

// Background
$wp_customize->add_setting(
	'knote_button_border_color',
	array(
		'default'           => '#000000',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_setting(
	'knote_button_border_color_hover',
	array(
		'default'           => '#121212',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_button_border_color',
        array(
            'label'    => esc_html__( 'Border Color', 'knote' ),
            'section'  => 'knote_button_section',
            'settings' => array(
                'normal' => 'knote_button_border_color',
                'hover'  => 'knote_button_border_color_hover',
            ),
            'priority' => 31
        )
    )
);
