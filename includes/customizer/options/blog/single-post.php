<?php
/**
 * Layout Customizer options
 *
 * @package Knote
 */

/*--------------------------------------------
	Single Posts
---------------------------------------------*/
$wp_customize->add_section( 'knote_single_section',
	array(
		'title'         => esc_html__( 'Single posts', 'knote'),
        'priority'      => 42,
	)
);

$wp_customize->add_setting( 'knote_single_section_tabs',
	array(
		'default'           => '',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Tabs(
		$wp_customize,
		'knote_single_section_tabs',
		array(
			'label' 				=> esc_html__( 'Single post tabs', 'knote' ),
			'section'       		=> 'knote_single_section',
			'controls_general'		=> json_encode( array(
					'#customize-control-knote_single_layout',
					'#customize-control-knote_single_sidebar_enable',
					'#customize-control-knote_single_sidebar_position',
					'#customize-control-knote_single_layout_divider',
					'#customize-control-knote_single_image_title',
					'#customize-control-knote_single_image_enable',
					'#customize-control-knote_single_image_position',
					'#customize-control-knote_single_image_spacing',
					'#customize-control-knote_single_image_divider',
					'#customize-control-knote_single_title_title',
					'#customize-control-knote_single_title_alignment',
					'#customize-control-knote_single_title_spacing',
					'#customize-control-knote_single_title_divider',
					'#customize-control-knote_single_meta_elements',
					'#customize-control-knote_single_meta_position',
					'#customize-control-knote_single_meta_spacing',
					'#customize-control-knote_single_meta_divider',
					'#customize-control-knote_single_elements_title',
					'#customize-control-knote_single_post_tags_enable',
					'#customize-control-knote_single_post_category_enable',
					'#customize-control-knote_single_author_enable',
					'#customize-control-knote_single_post_sharing_enable',
					'#customize-control-knote_single_navigation_enable',
					'#customize-control-knote_single_related_post_enable',
					'#customize-control-knote_single_elements_divider'
				)
			),
			'controls_design'		=> json_encode(
				array(
					'#customize-control-knote_single_design_title',
					'#customize-control-knote_single_title_font_size',
					'#customize-control-knote_single_title_color',
					'#customize-control-knote_single_meta_title_color_divider',
					'#customize-control-knote_single_meta_font_size',
					'#customize-control-knote_single_meta_color'
				)
			)
		)
	)
);

$wp_customize->add_setting( 'knote_single_layout',
	array(
		'default'           => 'centered',
		'sanitize_callback' => 'sanitize_key',
	)
);

$wp_customize->add_control(
	new Knote_Control_RadioImage(
		$wp_customize,
		'knote_single_layout',
		array(
			'label'    => esc_html__( 'Post layout', 'knote' ),
			'section'  => 'knote_single_section',
			'columns'  => 'one-half',
			'choices'  => array(
				'centered' => array(
					'label' => esc_html__( 'Centered', 'knote' ),
					'url'   => '%s/assets/admin/src/layout/post-centered.svg'
				),
				'default' => array(
					'label' => esc_html__( 'Default', 'knote' ),
					'url'   => '%s/assets/admin/src/layout/post-wide.svg'
                ),
				'fullwidth' => array(
					'label' => esc_html__( 'Full-width', 'knote' ),
					'url'   => '%s/assets/admin/src/layout/post-fullwidth.svg'
				)
			),
			'priority'  => 60
		)
	)
);

$wp_customize->add_setting(
	'knote_single_sidebar_enable',
	array(
		'default'           => 0,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_single_sidebar_enable',
		array(
			'label'         	=> esc_html__( 'Enable sidebar', 'knote' ),
			'section'       	=> 'knote_single_section',
			'active_callback' 	=> 'knote_single_layout',
			'settings'      	=> 'knote_single_sidebar_enable',
			'priority'  => 60
		)
	)
);

$wp_customize->add_setting( 'knote_single_sidebar_position',
	array(
		'default' 			=> 'right',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_RadioButtons(
		$wp_customize,
		'knote_single_sidebar_position',
		array(
			'label' 	=> esc_html__( 'Sidebar Position', 'knote' ),
			'section' 	=> 'knote_single_section',
			'choices' 	=> array(
				'left' 		=> esc_html__( 'Left', 'knote' ),
				'right' 	=> esc_html__( 'Right', 'knote' ),
			),
			'active_callback' 	=> 'knote_single_sidebar_enable',
			'priority'  => 60
		)
	)
);

$wp_customize->add_setting( 'knote_single_layout_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_single_layout_divider',
		array(
			'section' 		=> 'knote_single_section',
			'priority'  => 60
		)
	)
);

//Image
$wp_customize->add_setting( 'knote_single_image_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Heading(
		$wp_customize,
		'knote_single_image_title',
		array(
			'label'			=> esc_html__( 'Image', 'knote' ),
			'section' 		=> 'knote_single_section',
			'priority'  => 75
		)
	)
);

$wp_customize->add_setting(
	'knote_single_image_enable',
	array(
		'default'           => 1,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_single_image_enable',
		array(
			'label'         	=> esc_html__( 'Show featured image', 'knote' ),
			'section'       	=> 'knote_single_section',
			'settings'      	=> 'knote_single_image_enable',
			'priority'  => 75
		)
	)
);

$wp_customize->add_setting( 'knote_single_image_position',
	array(
		'default' 			=> 'before',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_RadioButtons(
		$wp_customize,
		'knote_single_image_position',
		array(
			'label' 	=> esc_html__( 'Placement', 'knote' ),
			'section' 	=> 'knote_single_section',
			'choices' 	=> array(
				'before' 	=> esc_html__( 'Above title', 'knote' ),
				'after' 	=> esc_html__( 'Below title', 'knote' ),
			),
			'active_callback' => 'knote_single_image_enable',
			'priority'  => 75
		)
	)
);

$wp_customize->add_setting( 'knote_single_image_spacing', array(
	'default'   		=> 16,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_single_image_spacing',
		array(
			'label' 		=> esc_html__( 'Spacing', 'knote' ),
			'section' 		=> 'knote_single_section',
			'responsive'	=> false,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_single_image_spacing',
			),
			'input_attrs' => array (
				'min'	=> 5,
				'max'	=> 200,
				'step'  => 1,
				'unit'  => 'px'
			),
			'active_callback' => 'knote_single_image_enable',
			'priority'  => 75
		)
	)
);

$wp_customize->add_setting( 'knote_single_image_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_single_image_divider',
		array(
			'section' 		=> 'knote_single_section',
			'priority'  => 75
		)
	)
);

//Title
$wp_customize->add_setting( 'knote_single_title_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Heading(
		$wp_customize,
		'knote_single_title_title',
		array(
			'label'			=> esc_html__( 'Title', 'knote' ),
			'section' 		=> 'knote_single_section',
			'priority'  => 85
		)
	)
);

$wp_customize->add_setting( 'knote_single_title_alignment',
	array(
		'default' 			=> 'left',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_RadioButtons(
		$wp_customize,
		'knote_single_title_alignment',
		array(
			'label' 	=> esc_html__( 'Alignment', 'knote' ),
			'section' 	=> 'knote_single_section',
			'choices' 	=> array(
				'left' 		=> esc_html__( 'Left', 'knote' ),
				'center' 	=> esc_html__( 'Center', 'knote' ),
				'right' 	=> esc_html__( 'Right', 'knote' ),
			),
			'priority'  => 85
		)
	)
);

$wp_customize->add_setting( 'knote_single_title_spacing', array(
	'default'   		=> 16,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_single_title_spacing',
		array(
			'label' 		=> esc_html__( 'Spacing', 'knote' ),
			'section' 		=> 'knote_single_section',
			'responsive'	=> false,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_single_title_spacing',
			),
			'input_attrs' => array (
				'min'	=> 5,
				'max'	=> 200,
				'step'  => 1,
				'unit'  => 'px'
			),
			'priority'  => 85
		)
	)
);

$wp_customize->add_setting( 'knote_single_title_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_single_title_divider',
		array(
			'section' 		=> 'knote_single_section',
			'priority'  => 85
		)
	)
);

//Meta Elements
$wp_customize->add_setting(
    'knote_single_meta_elements',
    array(
        'default'              => array('date', 'author'),
        'sanitize_callback'    => 'knote_sanitize_single_meta_components'
    )
);

$wp_customize->add_control(
    new \Kirki\Control\Sortable(
        $wp_customize,
        'knote_single_meta_elements',
        array(
            'label'             => esc_html__('Meta elements', 'knote'),
            'section'           => 'knote_single_section',
            'choices'   => array(
                'date'            => esc_html__('Post Date', 'knote'),
                'author'             => esc_html__('Post Author', 'knote'),
                'comments'             => esc_html__('Post Comments', 'knote')
            ),
            'priority'     => 100
        )
    )
);

$wp_customize->add_setting( 'knote_single_meta_position',
	array(
		'default' 			=> 'before',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_RadioButtons(
		$wp_customize,
		'knote_single_meta_position',
		array(
			'label' 	=> esc_html__( 'Meta position', 'knote' ),
			'section' 	=> 'knote_single_section',
			'choices' 	=> array(
				'before' 	=> esc_html__( 'Above title', 'knote' ),
				'after' 	=> esc_html__( 'Below title', 'knote' ),
			),
			'priority'  => 100
		)
	)
);

$wp_customize->add_setting( 'knote_single_meta_spacing', array(
	'default'   		=> 16,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_single_meta_spacing',
		array(
			'label' 		=> esc_html__( 'Meta spacing', 'knote' ),
			'section' 		=> 'knote_single_section',
			'responsive'	=> false,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_single_meta_spacing',
			),
			'input_attrs' => array (
				'min'	=> 5,
				'max'	=> 50,
				'step'  => 1,
				'unit'  => 'px'
			),
			'priority'  => 100
		)
	)
);

$wp_customize->add_setting( 'knote_single_meta_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_single_meta_divider',
		array(
			'section' 		=> 'knote_single_section',
			'priority'  => 100
		)
	)
);

//Elements
$wp_customize->add_setting( 'knote_single_elements_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Heading(
		$wp_customize,
		'knote_single_elements_title',
		array(
			'label'			=> esc_html__( 'Elements', 'knote' ),
			'section' 		=> 'knote_single_section',
			'priority'  => 100
		)
	)
);

$wp_customize->add_setting(
	'knote_single_post_tags_enable',
	array(
		'default'           => 1,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_single_post_tags_enable',
		array(
			'label'         	=> esc_html__( 'Post tags', 'knote' ),
			'section'       	=> 'knote_single_section',
			'settings'      	=> 'knote_single_post_tags_enable',
			'priority'  => 110
		)
	)
);

$wp_customize->add_setting(
	'knote_single_post_category_enable',
	array(
		'default'           => 1,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_single_post_category_enable',
		array(
			'label'         	=> esc_html__( 'Post category', 'knote' ),
			'section'       	=> 'knote_single_section',
			'settings'      	=> 'knote_single_post_category_enable',
			'priority'  => 110
		)
	)
);

$wp_customize->add_setting(
	'knote_single_author_enable',
	array(
		'default'           => 1,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_single_author_enable',
		array(
			'label'         	=> esc_html__( 'Author box', 'knote' ),
			'section'       	=> 'knote_single_section',
			'settings'      	=> 'knote_single_author_enable',
			'priority'  => 110
		)
	)
);

$wp_customize->add_setting(
	'knote_single_post_sharing_enable',
	array(
		'default'           => 0,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_single_post_sharing_enable',
		array(
			'label'         	=> esc_html__( 'Social share', 'knote' ),
			'section'       	=> 'knote_single_section',
			'settings'      	=> 'knote_single_post_sharing_enable',
			'priority'  => 115
		)
	)
);

$wp_customize->add_setting(
	'knote_single_navigation_enable',
	array(
		'default'           => 1,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_single_navigation_enable',
		array(
			'label'         	=> esc_html__( 'Post navigation', 'knote' ),
			'section'       	=> 'knote_single_section',
			'settings'      	=> 'knote_single_navigation_enable',
			'priority'  => 115
		)
	)
);

$wp_customize->add_setting(
	'knote_single_related_post_enable',
	array(
		'default'           => 0,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_single_related_post_enable',
		array(
			'label'         	=> esc_html__( 'Related posts', 'knote' ),
			'section'       	=> 'knote_single_section',
			'settings'      	=> 'knote_single_related_post_enable',
			'priority'  => 115
		)
	)
);

$wp_customize->add_setting( 'knote_single_elements_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_single_elements_divider',
		array(
			'section' 		=> 'knote_single_section',
			'priority'  => 115
		)
	)
);

// Design
$wp_customize->add_setting( 'knote_single_design_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Heading(
		$wp_customize,
		'knote_single_design_title',
		array(
			'label'			=> esc_html__( 'Title', 'knote' ),
			'section' 		=> 'knote_single_section',
			'priority'  => 120
		)
	)
);

$wp_customize->add_setting( 'knote_single_title_font_size_desktop', array(
	'default'   		=> 28,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_single_title_font_size_tablet', array(
	'default'   		=> 26,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_single_title_font_size_mobile', array(
	'default'   		=> 24,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_single_title_font_size',
		array(
			'label' 		=> esc_html__( 'Font size', 'knote' ),
			'section' 		=> 'knote_single_section',
			'responsive'	=> true,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_single_title_font_size_desktop',
				'size_tablet' 		=> 'knote_single_title_font_size_tablet',
				'size_mobile' 		=> 'knote_single_title_font_size_mobile',
			),
			'input_attrs' => array (
				'min'	=> 10,
				'max'	=> 120,
				'step'  => 1,
				'unit'  => 'px'
			),
			'priority'  => 120
		)
	)
);

$wp_customize->add_setting( 'knote_single_title_color',
	array(
		'default'           => '#121212',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_single_title_color',
		array(
			'label'         	=> esc_html__( 'Title color', 'knote' ),
			'section'       	=> 'knote_single_section',
            'priority'  => 120
		)
	)
);

$wp_customize->add_setting( 'knote_single_meta_title_color_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_single_meta_title_color_divider',
		array(
			'section' 		=> 'knote_single_section',
			'priority'  => 120
		)
	)
);

$wp_customize->add_setting( 'knote_single_meta_font_size_desktop', array(
	'default'   		=> 14,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_single_meta_font_size_tablet', array(
	'default'   		=> 12,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_single_meta_font_size_mobile', array(
	'default'   		=> 12,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_single_meta_font_size',
		array(
			'label' 		=> esc_html__( 'Font size', 'knote' ),
			'section' 		=> 'knote_single_section',
			'responsive'	=> true,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_single_meta_font_size_desktop',
				'size_tablet' 		=> 'knote_single_meta_font_size_tablet',
				'size_mobile' 		=> 'knote_single_meta_font_size_mobile',
			),
			'input_attrs' => array (
				'min'	=> 8,
				'max'	=> 40,
				'step'  => 1,
				'unit'  => 'px'
			),
			'priority'  => 120
		)
	)
);

$wp_customize->add_setting( 'knote_single_meta_color',
	array(
		'default'           => '#121212',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_single_meta_color',
		array(
			'label'         	=> esc_html__( 'Meta color', 'knote' ),
			'section'       	=> 'knote_single_section',
            'priority'  => 120
		)
	)
);
