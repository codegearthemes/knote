<?php
/**
 * Typography Customizer options
 *
 * @package Knote
 */
$wp_customize->add_panel(
	'knote_typography_panel',
	array(
		'title'         => esc_html__( 'Typography', 'knote'),
		'priority'      => 10,
	)
);

/*--------------------------------------------
	General
---------------------------------------------*/
$wp_customize->add_section(
	'knote_typography_general',
	array(
		'title'      => esc_html__( 'General', 'knote'),
		'panel'      => 'knote_typography_panel',
	)
);

$wp_customize->add_setting( 'knote_typography_library', array(
	'default' 			=> 'google',
	'sanitize_callback' => 'knote_sanitize_select',
) );

$wp_customize->add_control(
	'knote_typography_library',
	array(
		'type' 		=> 'select',
		'label' 	=> esc_html__( 'Fonts Library', 'knote' ),
		'section' 	=> 'knote_typography_general',
		'choices' => array(
			'google' 	=> esc_html__( 'Google Fonts', 'knote' ),
			'adobe' 	=> esc_html__( 'Adobe Fonts', 'knote' ),
		)
	)
);

/*--------------------------------------------
	Heading
---------------------------------------------*/
$wp_customize->add_section(
	'knote_typography_heading',
	array(
		'title'      => esc_html__( 'Headings', 'knote'),
		'panel'      => 'knote_typography_panel',
	)
);

$wp_customize->add_setting( 'knote_heading_font',
    array(
        'default'           => '{"font":"System default","regularweight":"700","category":"sans-serif"}',
        'sanitize_callback' => 'knote_google_fonts_sanitize'
    )
);

$wp_customize->add_control(
	new Knote_Control_Typography(
		$wp_customize,
		'knote_heading_font',
		array(
			'section' => 'knote_typography_heading',
			'settings' => array (
				'family' => 'knote_heading_font',
			),
			'input_attrs' => array(
				'font_count'    => 'all',
				'orderby'       => 'alpha',
				'disableRegular' => false,
			),
		)
	)
);

$wp_customize->add_setting( 'knote_heading_font_style', array(
	'default' 			=> 'normal',
	'sanitize_callback' => 'knote_sanitize_select'
) );

$wp_customize->add_control( 'knote_heading_font_style', array(
	'type' 		=> 'select',
	'section' 	=> 'knote_typography_heading',
	'label' 	=> esc_html__( 'Font style', 'knote' ),
	'choices' => array(
		'normal' 	=> esc_html__( 'Normal', 'knote' ),
		'italic' 	=> esc_html__( 'Italic', 'knote' ),
		'oblique' 	=> esc_html__( 'Oblique', 'knote' ),
	),
) );

$wp_customize->add_setting( 'knote_heading_line_height', array(
	'default'   		=> 1.2,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'knote_sanitize_text',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_heading_line_height',
		array(
			'label' 		=> esc_html__( 'Line height', 'knote' ),
			'section' 		=> 'knote_typography_heading',
			'responsive'	=> false,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_heading_line_height',
			),
			'input_attrs' => array (
				'min'	=> 0,
				'max'	=> 5,
				'step'  => 0.01,
				'unit'  => 'em'
			)
		)
	)
);

$wp_customize->add_setting( 'knote_heading_letter_spacing', array(
	'default'   		=> 0,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'knote_sanitize_text',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_heading_letter_spacing',
		array(
			'label' 		=> esc_html__( 'Letter spacing', 'knote' ),
			'section' 		=> 'knote_typography_heading',
			'responsive'	=> false,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_heading_letter_spacing',
			),
			'input_attrs' => array (
				'min'	=> 0,
				'max'	=> 5,
				'step'  => 0.1,
				'unit'  => 'px'
			)
		)
	)
);

$wp_customize->add_setting( 'knote_heading_text_transform',
	array(
		'default' 			=> 'none',
		'sanitize_callback' => 'knote_sanitize_text',
		'transport'			=> 'postMessage',
	)
);
$wp_customize->add_control(
	new Knote_Control_RadioButtons(
		$wp_customize,
		'knote_heading_text_transform',
		array(
			'label'   => esc_html__( 'Text transform', 'knote' ),
			'section' => 'knote_typography_heading',
			'choices' => array(
				'none' 			=> '-',
				'capitalize' 	=> 'Aa',
				'lowercase' 	=> 'aa',
				'uppercase' 	=> 'AA',
			)
		)
	)
);

$wp_customize->add_setting( 'knote_heading_typography_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_heading_typography_divider',
		array(
			'section' 		=> 'knote_typography_heading',
		)
	)
);


$wp_customize->add_setting( 'knote_heading_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Heading(
		$wp_customize,
		'knote_heading_title',
		array(
			'label'			=> esc_html__( 'Heading', 'knote' ),
			'description'	=> esc_html__( '(H1 - h6) heading font size.', 'knote' ),
			'section' 		=> 'knote_typography_heading',
		)
	)
);

$wp_customize->add_setting( 'knote_heading_h1_font_size_desktop', array(
	'default'   		=> 40,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_heading_h1_font_size_tablet', array(
	'default'   		=> 36,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_heading_h1_font_size_mobile', array(
	'default'   		=> 28,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_heading_h1_font_size',
		array(
			'label' 		=> esc_html__( 'H1 font size', 'knote' ),
			'section' 		=> 'knote_typography_heading',
			'responsive'	=> true,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_heading_h1_font_size_desktop',
				'size_tablet' 		=> 'knote_heading_h1_font_size_tablet',
				'size_mobile' 		=> 'knote_heading_h1_font_size_mobile',
			),
			'input_attrs' => array (
				'min'	=> 10,
				'max'	=> 72,
				'step'  => 1,
				'unit'  => 'px'
			)
		)
	)
);

$wp_customize->add_setting( 'knote_heading_h2_font_size_desktop', array(
	'default'   		=> 32,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_heading_h2_font_size_tablet', array(
	'default'   		=> 28,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_heading_h2_font_size_mobile', array(
	'default'   		=> 22,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_heading_h2_font_size',
		array(
			'label' 		=> esc_html__( 'H2 font size', 'knote' ),
			'section' 		=> 'knote_typography_heading',
			'responsive'	=> true,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_heading_h2_font_size_desktop',
				'size_tablet' 		=> 'knote_heading_h2_font_size_tablet',
				'size_mobile' 		=> 'knote_heading_h2_font_size_mobile',
			),
			'input_attrs' => array (
				'min'	=> 10,
				'max'	=> 72,
				'step'  => 1,
				'unit'  => 'px'
			)
		)
	)
);

$wp_customize->add_setting( 'knote_heading_h3_font_size_desktop', array(
	'default'   		=> 28,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_heading_h3_font_size_tablet', array(
	'default'   		=> 24,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_heading_h3_font_size_mobile', array(
	'default'   		=> 18,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_heading_h3_font_size',
		array(
			'label' 		=> esc_html__( 'H3 font size', 'knote' ),
			'section' 		=> 'knote_typography_heading',
			'responsive'	=> true,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_heading_h3_font_size_desktop',
				'size_tablet' 		=> 'knote_heading_h3_font_size_tablet',
				'size_mobile' 		=> 'knote_heading_h3_font_size_mobile',
			),
			'input_attrs' => array (
				'min'	=> 10,
				'max'	=> 72,
				'step'  => 1,
				'unit'  => 'px'
			)
		)
	)
);

$wp_customize->add_setting( 'knote_heading_h4_font_size_desktop', array(
	'default'   		=> 24,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_heading_h4_font_size_tablet', array(
	'default'   		=> 20,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_heading_h4_font_size_mobile', array(
	'default'   		=> 16,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_heading_h4_font_size',
		array(
			'label' 		=> esc_html__( 'H4 font size', 'knote' ),
			'section' 		=> 'knote_typography_heading',
			'responsive'	=> true,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_heading_h4_font_size_desktop',
				'size_tablet' 		=> 'knote_heading_h4_font_size_tablet',
				'size_mobile' 		=> 'knote_heading_h4_font_size_mobile',
			),
			'input_attrs' => array (
				'min'	=> 10,
				'max'	=> 72,
				'step'  => 1,
				'unit'  => 'px'
			)
		)
	)
);

$wp_customize->add_setting( 'knote_heading_h5_font_size_desktop', array(
	'default'   		=> 20,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_heading_h5_font_size_tablet', array(
	'default'   		=> 16,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_heading_h5_font_size_mobile', array(
	'default'   		=> 16,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_heading_h5_font_size',
		array(
			'label' 		=> esc_html__( 'H5 font size', 'knote' ),
			'section' 		=> 'knote_typography_heading',
			'responsive'	=> true,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_heading_h5_font_size_desktop',
				'size_tablet' 		=> 'knote_heading_h5_font_size_tablet',
				'size_mobile' 		=> 'knote_heading_h5_font_size_mobile',
			),
			'input_attrs' => array (
				'min'	=> 10,
				'max'	=> 72,
				'step'  => 1,
				'unit'  => 'px'
			)
		)
	)
);

$wp_customize->add_setting( 'knote_heading_h6_font_size_desktop', array(
	'default'   		=> 16,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_heading_h6_font_size_tablet', array(
	'default'   		=> 16,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_heading_h6_font_size_mobile', array(
	'default'   		=> 16,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_heading_h6_font_size',
		array(
			'label' 		=> esc_html__( 'H6 font size', 'knote' ),
			'section' 		=> 'knote_typography_heading',
			'responsive'	=> true,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_heading_h6_font_size_desktop',
				'size_tablet' 		=> 'knote_heading_h6_font_size_tablet',
				'size_mobile' 		=> 'knote_heading_h6_font_size_mobile',
			),
			'input_attrs' => array (
				'min'	=> 10,
				'max'	=> 72,
				'step'  => 1,
				'unit'  => 'px'
			)
		)
	)
);

/*--------------------------------------------
	Navigation
---------------------------------------------*/
$wp_customize->add_section(
	'knote_typography_navigation',
	array(
		'title'         => esc_html__( 'Navigation', 'knote'),
		'panel'         => 'knote_typography_panel',
	)
);

$wp_customize->add_setting( 'knote_menu_font',
    array(
        'default'           =>'{"font":"System default","regularweight":"400","category":"sans-serif"}',
        'sanitize_callback' => 'knote_google_fonts_sanitize'
    )
);

$wp_customize->add_control(
	new Knote_Control_Typography(
		$wp_customize,
		'knote_menu_font',
		array(
			'section' => 'knote_typography_navigation',
			'settings' => array (
				'family' => 'knote_menu_font',
			),
			'input_attrs' => array(
				'font_count'    => 'all',
				'orderby'       => 'alpha',
				'disableRegular' => false,
			),
		)
	)
);

$wp_customize->add_setting( 'knote_menu_font_style', array(
	'sanitize_callback' => 'knote_sanitize_select',
	'default' 			=> 'normal'
) );

$wp_customize->add_control( 'knote_menu_font_style', array(
	'type' 		=> 'select',
	'section' 	=> 'knote_typography_navigation',
	'label' 	=> esc_html__( 'Font style', 'knote' ),
	'choices' => array(
		'normal' 	=> esc_html__( 'Normal', 'knote' ),
		'italic' 	=> esc_html__( 'Italic', 'knote' ),
		'oblique' 	=> esc_html__( 'Oblique', 'knote' ),
	),
) );

$wp_customize->add_setting( 'knote_menu_line_height', array(
	'default'   		=> 1.68,
	'sanitize_callback' => 'knote_sanitize_text',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_menu_line_height',
		array(
			'label' 		=> esc_html__( 'Line height', 'knote' ),
			'section' 		=> 'knote_typography_navigation',
			'responsive'	=> false,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_menu_line_height',
			),
			'input_attrs' => array (
				'min'	=> 0,
				'max'	=> 5,
				'step'  => 0.01,
				'unit'  => 'em'
			)
		)
	)
);

$wp_customize->add_setting( 'knote_menu_letter_spacing', array(
	'default'   		=> 0,
	'sanitize_callback' => 'knote_sanitize_text',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_menu_letter_spacing',
		array(
			'label' 		=> esc_html__( 'Letter spacing', 'knote' ),
			'section' 		=> 'knote_typography_menu',
			'responsive'	=> false,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_menu_letter_spacing',
			),
			'input_attrs' => array (
				'min'	=> 0,
				'max'	=> 5,
				'step'  => 0.1,
				'unit'  => 'px'
			)
		)
	)
);

$wp_customize->add_setting( 'knote_menu_text_transform',
	array(
		'default' 			=> 'uppercase',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);
$wp_customize->add_control(
	new Knote_Control_RadioButtons(
		$wp_customize,
		'knote_menu_text_transform',
		array(
			'label'   => esc_html__( 'Text transform', 'knote' ),
			'section' => 'knote_typography_navigation',
			'choices' => array(
				'none' 			=> '-',
				'capitalize' 	=> 'Aa',
				'lowercase' 	=> 'aa',
				'uppercase' 	=> 'AA',
			)
		)
	)
);

$wp_customize->add_setting( 'knote_menu_typography_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_menu_typography_divider',
		array(
			'section' 		=> 'knote_typography_navigation',
		)
	)
);

$wp_customize->add_setting( 'knote_menu_font_size_desktop', array(
	'default'   		=> 16,
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_menu_font_size_tablet', array(
	'default'   		=> 16,
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_menu_font_size_mobile', array(
	'default'   		=> 16,
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_menu_font_size',
		array(
			'label' 		=> esc_html__( 'Font size', 'knote' ),
			'section' 		=> 'knote_typography_navigation',
			'responsive'	=> true,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_menu_font_size_desktop',
				'size_tablet' 		=> 'knote_menu_font_size_tablet',
				'size_mobile' 		=> 'knote_menu_font_size_mobile',
			),
			'input_attrs' => array (
				'min'	=> 10,
				'max'	=> 72,
				'step'  => 1,
				'unit'  => 'px'
			)
		)
	)
);

/*--------------------------------------------
	Base
---------------------------------------------*/
$wp_customize->add_section(
	'knote_typography_base',
	array(
		'title'         => esc_html__( 'Body', 'knote'),
		'panel'         => 'knote_typography_panel',
	)
);

$wp_customize->add_setting( 'knote_base_font',
    array(
        'default'           => '{"font":"System default","regularweight":"400","category":"sans-serif"}',
        'sanitize_callback' => 'knote_google_fonts_sanitize',
    )
);

$wp_customize->add_control(
	new Knote_Control_Typography(
		$wp_customize,
		'knote_base_font',
		array(
			'section' => 'knote_typography_base',
			'settings' => array (
				'family' => 'knote_base_font',
			),
			'input_attrs' => array(
				'font_count'    => 'all',
				'orderby'       => 'alpha',
				'disableRegular' => false,
			),
		)
	)
);

$wp_customize->add_setting( 'knote_base_font_style',
	array(
		'sanitize_callback' => 'knote_sanitize_select',
		'default' 			=> 'normal',
	)
);

$wp_customize->add_control( 'knote_base_font_style',
	array(
		'type' 		=> 'select',
		'section' 	=> 'knote_typography_base',
		'label' 	=> esc_html__( 'Font style', 'knote' ),
		'choices' => array(
			'normal' 	=> esc_html__( 'Normal', 'knote' ),
			'italic' 	=> esc_html__( 'Italic', 'knote' ),
			'oblique' 	=> esc_html__( 'Oblique', 'knote' ),
		),
	)
);

$wp_customize->add_setting( 'knote_base_line_height',
	array(
		'default'   		=> 1.68,
		'transport'			=> 'postMessage',
		'sanitize_callback' => 'knote_sanitize_text',
	)
);

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_base_line_height',
		array(
			'label' 		=> esc_html__( 'Line height', 'knote' ),
			'section' 		=> 'knote_typography_base',
			'responsive'	=> false,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_base_line_height',
			),
			'input_attrs' => array (
				'min'	=> 0,
				'max'	=> 5,
				'step'  => 0.01,
				'unit'  => 'em'
			)
		)
	)
);

$wp_customize->add_setting( 'knote_base_letter_spacing',
	array(
		'default'   		=> 0,
		'transport'			=> 'postMessage',
		'sanitize_callback' => 'knote_sanitize_text',
	)
);

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_base_letter_spacing',
		array(
			'label' 		=> esc_html__( 'Letter spacing', 'knote' ),
			'section' 		=> 'knote_typography_base',
			'responsive'	=> false,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_base_letter_spacing',
			),
			'input_attrs' => array (
				'min'	=> 0,
				'max'	=> 5,
				'step'  => 0.1,
				'unit'  => 'px'
			)
		)
	)
);

$wp_customize->add_setting( 'knote_base_text_transform',
	array(
		'default' 			=> 'none',
		'sanitize_callback' => 'knote_sanitize_text',
		'transport'			=> 'postMessage',
	)
);
$wp_customize->add_control(
	new Knote_Control_RadioButtons(
		$wp_customize,
		'knote_base_text_transform',
		array(
			'label'   => esc_html__( 'Text transform', 'knote' ),
			'section' => 'knote_typography_base',
			'choices' => array(
				'none' 			=> '-',
				'capitalize' 	=> 'Aa',
				'lowercase' 	=> 'aa',
				'uppercase' 	=> 'AA',
			)
		)
	)
);

$wp_customize->add_setting( 'knote_base_typography_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_base_typography_divider',
		array(
			'section' 		=> 'knote_typography_base',
		)
	)
);

$wp_customize->add_setting( 'knote_base_font_size_desktop', array(
	'default'   		=> 16,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_base_font_size_tablet', array(
	'default'   		=> 14,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_base_font_size_mobile', array(
	'default'   		=> 14,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_base_font_size',
		array(
			'label' 		=> esc_html__( 'Font size', 'knote' ),
			'section' 		=> 'knote_typography_base',
			'responsive'	=> true,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_base_font_size_desktop',
				'size_tablet' 		=> 'knote_base_font_size_tablet',
				'size_mobile' 		=> 'knote_base_font_size_mobile',
			),
			'input_attrs' => array (
				'min'	=> 10,
				'max'	=> 72,
				'step'  => 1,
				'unit'  => 'px'
			)
		)
	)
);
