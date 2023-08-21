<?php
/**
 * Layout Customizer options
 *
 * @package Knote
 */


/*--------------------------------------------
	Archive Section
---------------------------------------------*/
$wp_customize->add_section( 'knote_archive_section',
	array(
		'title'         => esc_html__( 'Archive layout', 'knote'),
		'panel'         => 'knote_layout_panel',
        'priority'      => 10,
	)
);

$wp_customize->add_setting('knote_archive_tabs',
	array(
		'default'           => '',
		'sanitize_callback'	=> 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
    new Knote_Control_Tabs (
        $wp_customize,
        'knote_archive_tabs',
		array(
			'label' 				=> esc_html__( 'Archive tabs', 'knote'),
			'section'       		=> 'knote_archive_section',
			'controls_general'		=> json_encode(
                array(
                    '#customize-control-knote_archive_layout',
					'#customize-control-knote_archives_grid_columns',
                    '#customize-control-knote_archive_layout_sidebar_enable',
                    '#customize-control-knote_archive_layout_sidebar_position',
                    '#customize-control-knote_archive_layout_divider',
					'#customize-control-knote_archive_image_title',
					'#customize-control-knote_archive_image_enable',
					'#customize-control-knote_archive_image_spacing',
					'#customize-control-knote_archive_image_divider',
					'#customize-control-knote_archive_text_title',
					'#customize-control-knote_archive_title_spacing',
					'#customize-control-knote_archive_excerpt_enable',
					'#customize-control-knote_archive_excerpt_length',
					'#customize-control-knote_archive_readmore_enable',
					'#customize-control-knote_archive_text_divider',
                    '#customize-control-knote_archive_meta_elements',
                    '#customize-control-knote_archive_meta_spacing',
                    '#customize-control-knote_archive_delimiter_style'

                )
            ),
			'controls_design'		=> json_encode(
                array(
                    '#customize-control-knote_archive_title_size',
					'#customize-control-knote_archive_title_color',
					'#customize-control-knote_archive_excerpt_color',
					'#customize-control-knote_archive_style_title_divider',
                    '#customize-control-knote_archive_meta_size',
					'#customize-control-knote_archive_meta_color'
                )
            ),
            'priority'      => 10,
		)
	)
);

/*--------------------------------------------
	Archive General
---------------------------------------------*/
$wp_customize->add_setting( 'knote_archive_layout',
	array(
		'default'           => 'grid',
		'sanitize_callback' => 'sanitize_key',
	)
);

$wp_customize->add_control(
    new Knote_Control_RadioImage(
        $wp_customize,
        'knote_archive_layout',
		array(
			'label'    => esc_html__( 'Layout', 'knote' ),
			'section'  => 'knote_archive_section',
			'columns'  => 'one-half',
			'choices'  => array(
				'grid' => array(
					'label' => esc_html__( 'Grid Layout', 'knote' ),
					'url'   => '%s/assets/admin/src/layout/blog-layout-3.svg'
				),
				'default' => array(
					'label' => esc_html__( 'Default', 'knote' ),
					'url'   => '%s/assets/admin/src/layout/blog-layout-1.svg'
				),
				'simple' => array(
					'label' => esc_html__( 'Simple', 'knote' ),
					'url'   => '%s/assets/admin/src/layout/blog-layout-2.svg'
                ),
                'image-left' => array(
					'label' => esc_html__( 'Image left', 'knote' ),
					'url'   => '%s/assets/admin/src/layout/blog-layout-4.svg'
				),
                'alternate' => array(
					'label' => esc_html__( 'Alternate', 'knote' ),
					'url'   => '%s/assets/admin/src/layout/blog-layout-5.svg'
				)
            ),
            'priority'      => 10,
		)
	)
);

$wp_customize->add_setting( 'knote_archives_grid_columns',
	array(
		'default' 			=> '2',
		'sanitize_callback' => 'knote_sanitize_text',

	)
);
$wp_customize->add_control(
    new Knote_Control_RadioButtons(
        $wp_customize,
        'knote_archives_grid_columns',
        array(
            'label' 	=> esc_html__( 'Columns', 'knote' ),
            'section' 	=> 'knote_archive_section',
            'choices' 	=> array(
                '2' 		=> esc_html__( '2', 'knote' ),
                '3' 		=> esc_html__( '3', 'knote' ),
                '4' 		=> esc_html__( '4', 'knote' ),
                '5' 		=> esc_html__( '5', 'knote' ),
            ),
            'active_callback' 	=> 'knote_archives_layout',
            'priority'      => 10,
        )
    )
);

$wp_customize->add_setting(
	'knote_archive_layout_sidebar_enable',
	array(
		'default'           => 0,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_archive_layout_sidebar_enable',
		array(
			'label'         	=> esc_html__( 'Enable sidebar', 'knote' ),
			'section'       	=> 'knote_archive_section',
			'settings'      	=> 'knote_archive_layout_sidebar_enable',
			'priority'  => 10
		)
	)
);

$wp_customize->add_setting( 'knote_archive_layout_sidebar_position',
	array(
		'default' 			=> 'left',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_RadioButtons(
		$wp_customize,
		'knote_archive_layout_sidebar_position',
		array(
			'label' 	=> esc_html__( 'Sidebar Position', 'knote' ),
			'section' 	=> 'knote_archive_section',
			'choices' 	=> array(
				'left' 		=> esc_html__( 'Left', 'knote' ),
				'right' 	=> esc_html__( 'Right', 'knote' ),
			),
			'active_callback' 	=> 'knote_archive_sidebar_enable',
			'priority'  => 10
		)
	)
);

$wp_customize->add_setting( 'knote_archive_layout_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
    new Knote_Control_Divider(
        $wp_customize,
        'knote_archive_layout_divider',
		array(
			'section' 		=> 'knote_archive_section',
            'priority'      => 10,
		)
	)
);

//Image
$wp_customize->add_setting( 'knote_archive_image_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Heading(
		$wp_customize,
		'knote_archive_image_title',
		array(
			'label'			=> esc_html__( 'Image', 'knote' ),
			'section' 		=> 'knote_archive_section',
			'priority'  => 15
		)
	)
);

$wp_customize->add_setting(
	'knote_archive_image_enable',
	array(
		'default'           => 1,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_archive_image_enable',
		array(
			'label'         	=> esc_html__( 'Show featured image', 'knote' ),
			'section'       	=> 'knote_archive_section',
			'settings'      	=> 'knote_archive_image_enable',
			'priority'  => 15
		)
	)
);

$wp_customize->add_setting( 'knote_archive_image_spacing', array(
	'default'   		=> 15,
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_archive_image_spacing',
		array(
			'label' 		=> esc_html__( 'Spacing', 'knote' ),
			'section' 		=> 'knote_archive_section',
			'responsive'	=> false,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_archive_image_spacing',
			),
			'input_attrs' => array (
				'min'	=> 0,
				'max'	=> 200,
				'step'  => 1,
				'unit'  => 'px'
			),
			'active_callback' 	=> 'knote_archive_feature_image_enable',
			'priority'  => 15
		),
	)
);

$wp_customize->add_setting( 'knote_archive_image_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
    new Knote_Control_Divider(
        $wp_customize,
        'knote_archive_image_divider',
		array(
			'section' 		=> 'knote_archive_section',
            'priority'      => 15,
		)
	)
);

//Title
$wp_customize->add_setting( 'knote_archive_text_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Heading(
		$wp_customize,
		'knote_archive_text_title',
		array(
			'label'			=> esc_html__( 'Content', 'knote' ),
			'section' 		=> 'knote_archive_section',
			'priority'  => 20
		)
	)
);

$wp_customize->add_setting( 'knote_archive_title_spacing', array(
	'default'   		=> 8,
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_archive_title_spacing',
		array(
			'label' 		=> esc_html__( 'Title spacing', 'knote' ),
			'section' 		=> 'knote_archive_section',
			'responsive'	=> false,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_archive_title_spacing',
			),
			'input_attrs' => array (
				'min'	=> 5,
				'max'	=> 50,
				'step'  => 1,
				'unit'  => 'px'
			),
			'priority'  => 20
		)
	)
);

$wp_customize->add_setting(
	'knote_archive_excerpt_enable',
	array(
		'default'           => 1,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_archive_excerpt_enable',
		array(
			'label'         	=> esc_html__( 'Show Excerpt', 'knote' ),
			'section'       	=> 'knote_archive_section',
			'settings'      	=> 'knote_archive_excerpt_enable',
			'priority'  => 20
		)
	)
);

$wp_customize->add_setting( 'knote_archive_excerpt_length', array(
	'default'   		=> 30,
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_archive_excerpt_length',
		array(
			'label' 		=> esc_html__( 'Excerpt Length', 'knote' ),
			'section' 		=> 'knote_archive_section',
			'responsive'	=> false,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_archive_excerpt_length',
			),
			'input_attrs' => array (
				'min'	=> 5,
				'max'	=> 50,
				'step'  => 1,
				'unit'  => 'Char'
			),
			'active_callback' 	=> 'knote_archive_excerpt_enable',
			'priority'  => 20
		)
	)
);

$wp_customize->add_setting(
	'knote_archive_readmore_enable',
	array(
		'default'           => 1,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_archive_readmore_enable',
		array(
			'label'         	=> esc_html__( 'Read More Link', 'knote' ),
			'section'       	=> 'knote_archive_section',
			'settings'      	=> 'knote_archive_readmore_enable',
			'active_callback' 	=> 'knote_archive_excerpt_enable',
			'priority'  => 20
		)
	)
);

$wp_customize->add_setting( 'knote_archive_text_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
    new Knote_Control_Divider(
        $wp_customize,
        'knote_archive_text_divider',
		array(
			'section' 		=> 'knote_archive_section',
            'priority'      => 20,
		)
	)
);

//Meta Elements
$wp_customize->add_setting(
    'knote_archive_meta_elements',
    array(
        'default'              => array('date'),
        'sanitize_callback'    => 'knote_sanitize_archive_meta_components'
    )
);

$wp_customize->add_control(
    new \Kirki\Control\Sortable(
        $wp_customize,
        'knote_archive_meta_elements',
        array(
            'label'             => esc_html__('Meta elements', 'knote'),
            'section'           => 'knote_archive_section',
            'choices'   => array(
                'date'            => esc_html__('Post Date', 'knote'),
                'author'          => esc_html__('Post Author', 'knote')
            ),
            'priority'     => 25
        )
    )
);

$wp_customize->add_setting( 'knote_archive_meta_position',
	array(
		'default' 			=> 'before',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_RadioButtons(
		$wp_customize,
		'knote_archive_meta_position',
		array(
			'label' 	=> esc_html__( 'Meta position', 'knote' ),
			'section' 	=> 'knote_archive_section',
			'choices' 	=> array(
				'before' 	=> esc_html__( 'Above title', 'knote' ),
				'after' 	=> esc_html__( 'Below title', 'knote' ),
			),
			'priority'  => 25
		)
	)
);

$wp_customize->add_setting( 'knote_archive_meta_spacing', array(
	'default'   		=> 8,
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_archive_meta_spacing',
		array(
			'label' 		=> esc_html__( 'Meta spacing', 'knote' ),
			'section' 		=> 'knote_archive_section',
			'responsive'	=> false,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_archive_meta_spacing',
			),
			'input_attrs' => array (
				'min'	=> 5,
				'max'	=> 50,
				'step'  => 1,
				'unit'  => 'px'
			),
			'priority'  => 25
		)
	)
);

$wp_customize->add_setting( 'knote_archive_delimiter_style',
	array(
		'default' 			=> 'none',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_RadioButtons(
		$wp_customize,
		'knote_archive_delimiter_style',
		array(
			'label' 	=> esc_html__( 'Delimiter Style', 'knote' ),
			'section' 	=> 'knote_archive_section',
			'choices' 	=> array(
				'none' 		    => esc_html__( 'None', 'knote' ),
				'dot' 	        => esc_html__( '·', 'knote' ),
				'vertical' 	    => esc_html__( '|', 'knote' ),
                'horizontal' 	=> esc_html__( '⎯', 'knote' ),
			),
			'priority'  => 25
		)
	)
);


/*--------------------------------------------
	Archive Styling
---------------------------------------------*/
$wp_customize->add_setting( 'knote_archive_title_size_desktop', array(
	'default'   		=> 18,
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_archive_title_size_tablet', array(
	'default'   		=> 16,
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'knote_archive_title_size_mobile', array(
	'default'   		=> 16,
	'sanitize_callback' => 'absint',
) );


$wp_customize->add_control(
    new Knote_Control_Slider(
        $wp_customize,
        'knote_archive_title_size',
        array(
            'label' 		=> esc_html__( 'Title size', 'knote' ),
            'section' 		=> 'knote_archive_section',
            'responsive'	=> true,
            'settings' 		=> array (
                'size_desktop' 		=> 'knote_archive_title_size_desktop',
                'size_tablet' 		=> 'knote_archive_title_size_tablet',
                'size_mobile' 		=> 'knote_archive_title_size_mobile',
            ),
            'input_attrs' => array (
                'min'	=> 14,
                'max'	=> 100,
                'step'  => 1,
                'unit'  => 'px'
            )
        )
    )
);

$wp_customize->add_setting( 'knote_archive_title_color',
	array(
		'default'           => '#121212',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_archive_title_color',
		array(
			'label'         	=> esc_html__( 'Title color', 'knote' ),
			'section'       	=> 'knote_archive_section'
		)
	)
);

$wp_customize->add_setting( 'knote_archive_excerpt_color',
	array(
		'default'           => '#454545',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_archive_excerpt_color',
		array(
			'label'         	=> esc_html__( 'Content color', 'knote' ),
			'section'       	=> 'knote_archive_section'
		)
	)
);

$wp_customize->add_setting( 'knote_archive_style_title_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
    new Knote_Control_Divider(
        $wp_customize,
        'knote_archive_style_title_divider',
		array(
			'section' 		=> 'knote_archive_section'
		)
	)
);

$wp_customize->add_setting( 'knote_archive_meta_size', array(
	'default'   		=> 12,
	'sanitize_callback' => 'absint',
) );


$wp_customize->add_control(
    new Knote_Control_Slider(
        $wp_customize,
        'knote_archive_meta_size',
        array(
            'label' 		=> esc_html__( 'Meta size', 'knote' ),
            'section' 		=> 'knote_archive_section',
            'responsive'	=> false,
            'settings' 		=> array (
                'size_desktop' 		=> 'knote_archive_meta_size',
            ),
            'input_attrs' => array (
                'min'	=> 8,
                'max'	=> 72,
                'step'  => 1,
                'unit'  => 'px'
            )
        )
    )
);

$wp_customize->add_setting( 'knote_archive_meta_color',
	array(
		'default'           => '#494949',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_archive_meta_color',
		array(
			'label'         	=> esc_html__( 'Meta color', 'knote' ),
			'section'       	=> 'knote_archive_section'
		)
	)
);
