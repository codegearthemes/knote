<?php

/**
 * General Customizer options
 *
 * @package Knote
 */
/*--------------------------------------------
	General Panel
---------------------------------------------*/
$wp_customize->add_panel(
	'knote_general_panel',
	array(
		'title'         => esc_html__('General', 'knote'),
		'priority'      => 5,
	)
);

/**
 * Button
 *
 */
$wp_customize->add_section(
	'knote_button_section',
	array(
		'title'      => esc_html__('Button', 'knote'),
		'panel'      => 'knote_general_panel',
	)
);

$wp_customize->add_setting(
	'knote_button_tabs',
	array(
		'default'           => '',
		'sanitize_callback'	=> 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Tabs(
		$wp_customize,
		'knote_button_tabs',
		array(
			'label' 				=> esc_html__('Button tabs', 'knote'),
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
$wp_customize->add_setting(
	'knote_button_text_transform',
	array(
		'default' 			=> 'none',
		'sanitize_callback' => 'knote_sanitize_text',
	)
);
$wp_customize->add_control(new Knote_Control_RadioButtons(
	$wp_customize,
	'knote_button_text_transform',
	array(
		'label'   => esc_html__('Text transform', 'knote'),
		'section' => 'knote_button_section',
		'choices' => array(
			'none' 			=> '-',
			'capitalize' 	=> 'Aa',
			'lowercase' 	=> 'aa',
			'uppercase' 	=> 'AA',
		)
	)
));

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
			'label'    => esc_html__('Color', 'knote'),
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
			'label'    => esc_html__('Background Color', 'knote'),
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
			'label'    => esc_html__('Border Color', 'knote'),
			'section'  => 'knote_button_section',
			'settings' => array(
				'normal' => 'knote_button_border_color',
				'hover'  => 'knote_button_border_color_hover',
			),
			'priority' => 31
		)
	)
);

/**
 * Container
 *
 */
$wp_customize->add_section(
	'knote_container_section',
	array(
		'title'      => esc_html__('Container', 'knote'),
		'panel'      => 'knote_general_panel',
	)
);

$wp_customize->add_setting(
	'knote_website_container',
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
			'label' 		=> esc_html__('Container', 'knote'),
			'section' 		=> 'knote_container_section',
			'choices' => array(
				'container' 		=> esc_html__('Contained', 'knote'),
				'container-fluid' 	=> esc_html__('Full Width', 'knote'),
			),
			'priority'		  => 35
		)
	)
);

$wp_customize->add_setting(
	'knote_container_width',
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
			'priority'		  => 35
		)
	)
);

/**
 * Scroll to top
 */
$wp_customize->add_section(
	'knote_scrolltop_section',
	array(
		'title'      => esc_html__('Scroll to top', 'knote'),
		'panel'      => 'knote_general_panel',
	)
);

$wp_customize->add_setting(
	'knote_scrolltop_tabs',
	array(
		'default'           => '',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Tabs(
		$wp_customize,
		'knote_scrolltop_tabs',
		array(
			'label' 				=> '',
			'section'       		=> 'knote_scrolltop_section',
			'controls_general'		=> json_encode(
				array(
					'#customize-control-knote_scrolltop_enable',
					'#customize-control-knote_scrolltop_text',
					'#customize-control-knote_scrolltop_type',
					'#customize-control-knote_scrolltop_icon',
					'#customize-control-knote_scrolltop_radius',
					'#customize-control-knote_scrolltop_radius_divider',
					'#customize-control-knote_scrolltop_position',
					'#customize-control-knote_scrolltop_side_offset',
					'#customize-control-knote_scrolltop_bottom_offset',
					'#customize-control-knote_scrolltop_divider_offset',
					'#customize-control-knote_scrolltop_visibility'
				)
			),
			'controls_design'		=> json_encode(
				array(
					'#customize-control-knote_scrolltop_color',
					'#customize-control-knote_scrolltop_background_color',
					"#customize-control-knote_scrolltop_border_color"
				)
			)
		)
	)
);

$wp_customize->add_setting(
	'knote_scrolltop_enable',
	array(
		'default'           => 1,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_scrolltop_enable',
		array(
			'label'         	=> esc_html__('Enable scroll to top', 'knote'),
			'section'       	=> 'knote_scrolltop_section',
		)
	)
);

$wp_customize->add_setting(
	'knote_scrolltop_type',
	array(
		'default' 			=> 'icon',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);
$wp_customize->add_control(new Knote_Control_RadioButtons(
	$wp_customize,
	'knote_scrolltop_type',
	array(
		'label' 	=> esc_html__('Type', 'knote'),
		'section' 	=> 'knote_scrolltop_section',
		'choices' 	=> array(
			'icon' 		=> esc_html__('Icon', 'knote'),
			'text' 		=> esc_html__('Text + Icon', 'knote'),
		),
		'active_callback' => 'knote_scrolltop_enabled',
	)
));

$wp_customize->add_setting(
	'knote_scrolltop_text',
	array(
		'default'           => esc_html__('Back to top', 'knote'),
		'sanitize_callback' => 'knote_sanitize_text',
	)
);
$wp_customize->add_control('knote_scrolltop_text', array(
	'type'        		=> 'text',
	'label'       		=> esc_html__('Text', 'knote'),
	'section'     		=> 'knote_scrolltop_section',
	'active_callback' 	=> 'knote_scrolltop_icontype'
));

$wp_customize->add_setting(
	'knote_scrolltop_icon',
	array(
		'default'           => 'icon-angle-up',
		'sanitize_callback' => 'sanitize_key',
	)
);
$wp_customize->add_control(
	new Knote_Control_RadioImage(
		$wp_customize,
		'knote_scrolltop_icon',
		array(
			'label'    	=> esc_html__('Icon', 'knote'),
			'section'  	=> 'knote_scrolltop_section',
			'choices'  	=> array(
				'icon-angle-up' 	=> array(
					'label' => esc_html__('Icon 1', 'knote'),
					'url'   => '%s/assets/admin/src/scroll/scroll-icon-1.svg'
				),
				'icon-double-angle-up' => array(
					'label' => esc_html__('Icon 2', 'knote'),
					'url'   => '%s/assets/admin/src/scroll/scroll-icon-2.svg'
				),
				'icon-arrow-up' => array(
					'label' => esc_html__('Icon 3', 'knote'),
					'url'   => '%s/assets/admin/src/scroll/scroll-icon-3.svg'
				),
				'icon-double-arrow-up' => array(
					'label' => esc_html__('Icon 4', 'knote'),
					'url'   => '%s/assets/admin/src/scroll/scroll-icon-4.svg'
				),
			),
			'active_callback' => 'knote_scrolltop_enabled',
		)
	)
);

$wp_customize->add_setting('knote_scrolltop_radius', array(
	'default'   		=> 4,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
));

$wp_customize->add_control(new Knote_Control_Slider(
	$wp_customize,
	'knote_scrolltop_radius',
	array(
		'label' 		=> esc_html__('Border radius', 'knote'),
		'section' 		=> 'knote_scrolltop_section',
		'responsive'	=> false,
		'settings' 		=> array(
			'size_desktop' 		=> 'knote_scrolltop_radius',
		),
		'input_attrs' => array(
			'min'	=> 0,
			'max'	=> 100,
			'unit' => 'px'
		),
		'active_callback' => 'knote_scrolltop_enabled',
	)
));

$wp_customize->add_setting(
	'knote_scrolltop_radius_divider',
	array(
		'sanitize_callback' => 'esc_attr'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_scrolltop_radius_divider',
		array(
			'section' 		=> 'knote_scrolltop_section',
			'active_callback' => 'knote_scrolltop_enabled',
		)
	)
);

$wp_customize->add_setting(
	'knote_scrolltop_position',
	array(
		'default' 			=> 'right',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);
$wp_customize->add_control(new Knote_Control_RadioButtons(
	$wp_customize,
	'knote_scrolltop_position',
	array(
		'label' 	=> esc_html__('Position', 'knote'),
		'section' 	=> 'knote_scrolltop_section',
		'choices' 	=> array(
			'left' 		=> esc_html__('Left', 'knote'),
			'right' 	=> esc_html__('Right', 'knote'),
		),
		'active_callback' => 'knote_scrolltop_enabled',
	)
));

$wp_customize->add_setting('knote_scrolltop_side_offset', array(
	'default'   		=> 32,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
));

$wp_customize->add_control(new Knote_Control_Slider(
	$wp_customize,
	'knote_scrolltop_side_offset',
	array(
		'label' 		=> esc_html__('Side offset', 'knote'),
		'section' 		=> 'knote_scrolltop_section',
		'responsive'	=> false,
		'settings' 		=> array(
			'size_desktop' 		=> 'knote_scrolltop_side_offset',
		),
		'input_attrs' => array(
			'min'	=> 0,
			'max'	=> 100,
			'unit' => 'px'
		),
		'active_callback' => 'knote_scrolltop_enabled',
	)
));

$wp_customize->add_setting('knote_scrolltop_bottom_offset', array(
	'default'   		=> 32,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
));

$wp_customize->add_control(new Knote_Control_Slider(
	$wp_customize,
	'knote_scrolltop_bottom_offset',
	array(
		'label' 		=> esc_html__('Bottom offset', 'knote'),
		'section' 		=> 'knote_scrolltop_section',
		'responsive'	=> false,
		'settings' 		=> array(
			'size_desktop' 		=> 'knote_scrolltop_bottom_offset',
		),
		'input_attrs' => array(
			'min'	=> 0,
			'max'	=> 500,
			'unit' => 'px'
		),
		'active_callback' => 'knote_scrolltop_enabled',
	)
));

$wp_customize->add_setting(
	'knote_scrolltop_divider_offset',
	array(
		'sanitize_callback' => 'esc_attr'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_scrolltop_divider_offset',
		array(
			'section' 		=> 'knote_scrolltop_section',
			'active_callback' => 'knote_scrolltop_enabled',
		)
	)
);

$wp_customize->add_setting('knote_scrolltop_visibility', array(
	'sanitize_callback' => 'knote_sanitize_select',
	'default' 			=> 'all',
));

$wp_customize->add_control('knote_scrolltop_visibility', array(
	'type' 		=> 'select',
	'section' 	=> 'knote_scrolltop_section',
	'label' 	=> esc_html__('Visibility', 'knote'),
	'choices' => array(
		'all' 						=> esc_html__('Show on all devices', 'knote'),
		'medium--hide small--hide' 	=> esc_html__('Desktop only', 'knote'),
		'large--hide' 				=> esc_html__('Mobile/tablet only', 'knote'),
	),
	'active_callback' => 'knote_scrolltop_enabled',
));

/**
 * Style
 */
// Color
$wp_customize->add_setting(
	'knote_scrolltop_color',
	array(
		'default'           => '#000000',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_setting(
	'knote_scrolltop_color_hover',
	array(
		'default'           => '#000000',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_control(
	new Knote_Control_ColorGroup(
		$wp_customize,
		'knote_scrolltop_color',
		array(
			'label'    => esc_html__('Color', 'knote'),
			'section'  => 'knote_scrolltop_section',
			'border' 	=> true,
			'settings' => array(
				'normal' => 'knote_scrolltop_color',
				'hover'  => 'knote_scrolltop_color_hover',
			),
			'priority' => 31
		)
	)
);

// Background
$wp_customize->add_setting(
	'knote_scrolltop_background_color',
	array(
		'default'           => '#D0F224',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_setting(
	'knote_scrolltop_background_color_hover',
	array(
		'default'           => '#D0F224',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_control(
	new Knote_Control_ColorGroup(
		$wp_customize,
		'knote_scrolltop_background_color',
		array(
			'label'    => esc_html__('Background Color', 'knote'),
			'section'  => 'knote_scrolltop_section',
			'border' 	=> true,
			'settings' => array(
				'normal' => 'knote_scrolltop_background_color',
				'hover'  => 'knote_scrolltop_background_color_hover',
			),
			'priority' => 31
		)
	)
);

// Background
$wp_customize->add_setting(
	'knote_scrolltop_border_color',
	array(
		'default'           => '#D0F224',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_setting(
	'knote_scrolltop_border_color_hover',
	array(
		'default'           => '#D0F224',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);

$wp_customize->add_control(
	new Knote_Control_ColorGroup(
		$wp_customize,
		'knote_scrolltop_border_color',
		array(
			'label'    => esc_html__('Border Color', 'knote'),
			'section'  => 'knote_scrolltop_section',
			'settings' => array(
				'normal' => 'knote_scrolltop_border_color',
				'hover'  => 'knote_scrolltop_border_color_hover',
			),
			'priority' => 31
		)
	)
);
