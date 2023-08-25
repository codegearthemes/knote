<?php
/**
 * Woocommerce Customizer options
 *
 * @package Knote
 */

 //General
 $wp_customize->add_section(
	'knote_catalog_general_section',
	array(
		'title'     => esc_html__( 'General', 'knote'),
        'panel'     => 'woocommerce',
		'priority'  => 1,
	)
);

$wp_customize->get_control( 'woocommerce_shop_page_display' )->section  = 'knote_catalog_general_section';
$wp_customize->get_control( 'woocommerce_category_archive_display' )->section  = 'knote_catalog_general_section';
$wp_customize->get_control( 'woocommerce_default_catalog_orderby' )->section  = 'knote_catalog_general_section';


/**
 * Store Notice
 */

// Store notice tabs
$wp_customize->add_setting(
	'knote_store_notice_tabs',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	)
);
$wp_customize->add_control(
	new Knote_Control_Tabs (
		$wp_customize,
		'knote_store_notice_tabs',
		array(
			'label'            => '',
			'section'          => 'woocommerce_store_notice',
			'controls_general' => json_encode( array(
				'#customize-control-woocommerce_demo_store_notice',
				'#customize-control-woocommerce_demo_store'
			) ),
			'controls_design'  => json_encode( array(
				'#customize-control-knote_store_notice_text_color',
				'#customize-control-knote_store_notice_link_color',
				'#customize-control-knote_store_notice_background_color',
				'#customize-control-knote_store_notice_wrapper_padding'
			) ),
			'priority'         =>	-10
		)
	)
);

// Store notice text color
$wp_customize->add_setting(
	'knote_store_notice_text_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_store_notice_text_color',
		array(
			'label'         	=> esc_html__( 'Text color', 'knote' ),
			'section'       	=> 'woocommerce_store_notice',
			'priority'	 		=> 52
		)
	)
);

// Store notice link color
$wp_customize->add_setting(
	'knote_store_notice_link_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_setting(
	'knote_store_notice_link_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_store_notice_link_color',
        array(
            'label'    => esc_html__( 'Link Color', 'knote' ),
            'section'  => 'woocommerce_store_notice',
            'settings' => array(
                'normal' => 'knote_store_notice_link_color',
                'hover'  => 'knote_store_notice_link_color_hover',
            ),
            'priority' => 54
        )
    )
);

// Store notice background color
$wp_customize->add_setting(
	'knote_store_notice_background_color',
	array(
		'default'           => '#3d9cd2',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_store_notice_background_color',
		array(
			'label'         	=> esc_html__( 'Background color', 'knote' ),
			'section'       	=> 'woocommerce_store_notice',
			'priority'	 		=> 56
		)
	)
);

// Store notice padding
$wp_customize->add_setting(
    'knote_store_notice_wrapper_padding_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting(
    'knote_store_notice_wrapper_padding_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting(
    'knote_store_notice_wrapper_padding_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text',
        'transport'         => 'postMessage'
    )
);

$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_store_notice_wrapper_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'knote' ),
            'section'         	=> 'woocommerce_store_notice',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'              => array( 'px', 'em', 'rem' ),
            'responsive'   	     => true,
            'settings'        	 => array(
                'desktop' => 'knote_store_notice_wrapper_padding_desktop',
                'tablet'  => 'knote_store_notice_wrapper_padding_tablet',
                'mobile'  => 'knote_store_notice_wrapper_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);


/**
 * Product Catalog
 */
$wp_customize->add_setting(
	'knote_catalog_tabs',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	)
);
$wp_customize->add_control(
	new Knote_Control_Tabs (
		$wp_customize,
		'knote_catalog_tabs',
		array(
			'label'            => '',
			'section'          => 'woocommerce_product_catalog',
			'controls_general' => json_encode(
				array(
					'#customize-control-knote_catalog_layout_accordion',
					'#customize-control-knote_catalog_categories_accordion',
					'#customize-control-knote_catalog_product_card_accordion',
					'#customize-control-knote_catalog_sale_badge_accordion'
				)
			),
			'controls_design'  => json_encode(
				array(
					'#customize-control-knote_catalog_layout_style_accordion',
					'#customize-control-knote_catalog_categories_style_accordion',
					'#customize-control-knote_catalog_product_card_style_accordion',
					'#customize-control-knote_catalog_sale_badge_style_accordion'
				)
			),
			'priority'         =>	-10
		)
	)
);

//Layout
$wp_customize->add_setting( 'knote_catalog_layout_accordion',
	array(
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
    new Knote_Control_Accordion(
        $wp_customize,
        'knote_catalog_layout_accordion',
        array(
            'label'         => esc_html__( 'Layout', 'knote' ),
            'section'       => 'woocommerce_product_catalog',
			'connected'		=> json_encode( array(
				'#customize-control-knote_woocommerce_catalog_columns',
				'#customize-control-knote_woocommerce_catalog_rows',
				'#customize-control-knote_woocommerce_catalog_archive_sidebar',
				'#customize-control-knote_woocommerce_catalog_divider',
				'#customize-control-knote_woocommerce_elements_title',
				'#customize-control-knote_woocommerce_catalog_breadcrumbs',
				'#customize-control-knote_woocommerce_catalog_title',
				'#customize-control-knote_woocommerce_catalog_description',
				'#customize-control-knote_woocommerce_catalog_results_count',
				'#customize-control-knote_woocommerce_catalog_product_sorting'
			) ),
			'priority' =>	80

        )
    )
);

$wp_customize->add_setting(
	'knote_woocommerce_catalog_columns_desktop',
	array(
		'default'   		=> 4,
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_setting(
	'knote_woocommerce_catalog_columns_tablet',
	array(
		'default'   		=> 3,
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_setting(
	'knote_woocommerce_catalog_columns_mobile',
	array(
		'default'   		=> 2,
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_woocommerce_catalog_columns',
		array(
			'label' 		=> esc_html__( 'Products per row', 'knote' ),
			'section' 		=> 'woocommerce_product_catalog',
			'responsive'	=> 1,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_woocommerce_catalog_columns_desktop',
				'size_tablet' 		=> 'knote_woocommerce_catalog_columns_tablet',
				'size_mobile' 		=> 'knote_woocommerce_catalog_columns_mobile'
			),
			'input_attrs' => array (
				'min'	=> 1,
				'max'	=> 6,
				'step'  => 1
			),
			'priority'      => 82
		)
	)
);

$wp_customize->add_setting(
	'knote_woocommerce_catalog_rows',
	array(
		'default'   		=> 4,
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_woocommerce_catalog_rows',
		array(
			'label' 		=> esc_html__( 'Rows per page', 'knote' ),
			'section' 		=> 'woocommerce_product_catalog',
			'responsive'	=> 0,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_woocommerce_catalog_rows'
			),
			'input_attrs' => array (
				'min'	=> 1,
				'max'	=> apply_filters( 'knote_woocommerce_catalog_rows_max', 20 ),
				'step'  => 1,
			),
			'priority'      => 82
		)
	)
);

$wp_customize->add_setting(
	'knote_woocommerce_catalog_archive_sidebar',
	array(
		'default'           => 'no-sidebar',
		'sanitize_callback' => 'sanitize_key',
	)
);
$wp_customize->add_control(
	new Knote_Control_RadioImage(
		$wp_customize,
		'knote_woocommerce_catalog_archive_sidebar',
		array(
			'label'    => esc_html__( 'Sidebar Layout', 'knote' ),
			'section'  => 'woocommerce_product_catalog',
			'columns' 		=> 'one-half',
			'choices'  => array(
				'no-sidebar'   => array(
					'label' => esc_html__( 'No Sidebar', 'knote' ),
					'url'   => '%s/assets/admin/src/layout/disabled.svg'
				),
				'sidebar-left' => array(
					'label' => esc_html__( 'Left', 'knote' ),
					'url'   => '%s/assets/admin/src/layout/sidebar-left.svg'
				),
				'sidebar-right' => array(
					'label' => esc_html__( 'Right', 'knote' ),
					'url'   => '%s/assets/admin/src/layout/sidebar-right.svg'
				),
			),
			'priority'	 => 82
		)
	)
);

$wp_customize->add_setting( 'knote_woocommerce_catalog_divider',
	array(
		'sanitize_callback' => 'esc_attr'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_woocommerce_catalog_divider',
		array(
			'section' 			=> 'woocommerce_product_catalog',
			'priority'	 		=> 82
		)
	)
);

//Page elements
$wp_customize->add_setting( 'knote_woocommerce_catalog_elements_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	)
);

$wp_customize->add_control(
	new Knote_Control_Text(
		$wp_customize,
		'knote_woocommerce_catalog_elements_title',
		array(
			'label'			=> esc_html__( 'Page elements', 'knote' ),
			'section' 		=> 'woocommerce_product_catalog',
			'priority'	 	=> 82
		)
	)
);

$wp_customize->add_setting(
	'knote_woocommerce_catalog_title',
	array(
		'default'           => 1,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_woocommerce_catalog_title',
		array(
			'label'         	=> esc_html__( 'Page title', 'knote' ),
			'section'       	=> 'woocommerce_product_catalog',
			'priority'	 		=> 82
		)
	)
);

$wp_customize->add_setting(
	'knote_woocommerce_catalog_breadcrumbs',
	array(
		'default'           => 1,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_woocommerce_catalog_breadcrumbs',
		array(
			'label'         	=> esc_html__( 'Display breadcrumbs', 'knote' ),
			'section'       	=> 'woocommerce_product_catalog',
			'priority'	 		=> 82
		)
	)
);

$wp_customize->add_setting(
	'knote_woocommerce_catalog_description',
	array(
		'default'           => 1,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_woocommerce_catalog_description',
		array(
			'label'         	=> esc_html__( 'Page description', 'knote' ),
			'section'       	=> 'woocommerce_product_catalog',
			'priority'	 		=> 82
		)
	)
);

$wp_customize->add_setting(
	'knote_woocommerce_catalog_product_sorting',
	array(
		'default'           => 1,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_woocommerce_catalog_product_sorting',
		array(
			'label'         	=> esc_html__( 'Product sorting', 'knote' ),
			'description'       => esc_html__( 'Show options for sorting products.', 'knote' ),
			'section'       	=> 'woocommerce_product_catalog',
			'priority'	 		=> 82
		)
	)
);

$wp_customize->add_setting(
	'knote_woocommerce_catalog_results_count',
	array(
		'default'           => 1,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_woocommerce_catalog_results_count',
		array(
			'label'         	=> esc_html__( 'Results count', 'knote' ),
			'section'       	=> 'woocommerce_product_catalog',
			'priority'	 		=> 82
		)
	)
);

//Categories
$wp_customize->add_setting( 'knote_catalog_categories_accordion',
	array(
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
    new Knote_Control_Accordion(
        $wp_customize,
        'knote_catalog_categories_accordion',
        array(
            'label'         => esc_html__( 'Categories', 'knote' ),
            'section'       => 'woocommerce_product_catalog',
			'connected'		=> json_encode( array(
				'#customize-control-knote_catalog_categories_layout',
				'#customize-control-knote_catalog_categories_alignment',
				'#customize-control-knote_catalog_categories_radius'
			) ),
			'priority' => 100

        )
    )
);

$wp_customize->add_setting(
	'knote_catalog_categories_layout',
	array(
		'default'           => 'layout1',
		'sanitize_callback' => 'sanitize_key',
	)
);
$wp_customize->add_control(
	new Knote_Control_RadioImage(
		$wp_customize,
		'knote_catalog_categories_layout',
		array(
			'label'    	=> esc_html__( 'Layout', 'knote' ),
			'section'  	=> 'woocommerce_product_catalog',
			'columns'		=> 'one-half',
			'choices'  => array(
				'layout1' => array(
					'label' => esc_html__( 'Layout 1', 'knote' ),
					'url'   => '%s/assets/admin/src/woocommerce/product-category/layout1.svg'
				)
			),
			'priority'	 => 101
		)
	)
);

$wp_customize->add_setting( 'knote_catalog_categories_alignment',
	array(
		'default' 			=> 'center',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);
$wp_customize->add_control(
	new Knote_Control_RadioButtons(
		$wp_customize,
		'knote_catalog_categories_alignment',
		array(
			'label'   => esc_html__( 'Text alignment', 'knote' ),
			'section' => 'woocommerce_product_catalog',
			'choices' => array(
				'left' 		=> '<svg width="16" height="13" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h10v1H0zM0 4h16v1H0zM0 8h10v1H0zM0 12h16v1H0z"/></svg>',
				'center' 	=> '<svg width="16" height="13" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M3 0h10v1H3zM0 4h16v1H0zM3 8h10v1H3zM0 12h16v1H0z"/></svg>',
				'right' 	=> '<svg width="16" height="13" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M6 0h10v1H6zM0 4h16v1H0zM6 8h10v1H6zM0 12h16v1H0z"/></svg>',
			),
			'priority'	 => 101
		)
	)
);

$wp_customize->add_setting( 'knote_catalog_categories_radius', array(
	'default'   		=> 3,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_catalog_categories_radius',
		array(
			'label' 		=> esc_html__( 'Border radius', 'knote' ),
			'section' 		=> 'woocommerce_product_catalog',
			'responsive'	=> 0,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_catalog_categories_radius',
			),
			'input_attrs' => array (
				'min'	=> 0,
				'max'	=> 100
			),
			'priority'	 => 101
		)
	)
);

//Product Card
$wp_customize->add_setting( 'knote_catalog_product_card_accordion',
	array(
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
    new Knote_Control_Accordion(
        $wp_customize,
        'knote_catalog_product_card_accordion',
        array(
            'label'         => esc_html__( 'Product card', 'knote' ),
            'section'       => 'woocommerce_product_catalog',
			'connected'		=> json_encode( array(
				'#customize-control-knote_woocommerce_product_card_layout',
				'#customize-control-knote_woocommerce_product_card_purchase_layout',
				'#customize-control-knote_woocommerce_product_card_elements',
				'#customize-control-knote_woocommerce_product_card_alignment',
				'#customize-control-knote_woocommerce_product_card_element_spacing'
			) ),
			'priority' => 110

        )
    )
);

$wp_customize->add_setting(
	'knote_woocommerce_product_card_layout',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'sanitize_key',
	)
);
$wp_customize->add_control(
	new Knote_Control_RadioImage(
		$wp_customize,
		'knote_woocommerce_product_card_layout',
		array(
			'label'    	=> esc_html__( 'Layout', 'knote' ),
			'section'  	=> 'woocommerce_product_catalog',
			'cols'		=> 3,
			'choices'  => array(
				'default' => array(
					'label' => esc_html__( 'Layout 1', 'knote' ),
					'url'   => '%s/assets/admin/src/woocommerce/product-card/product-card-default.svg'
				)
			),
			'priority'	 => 110
		)
	)
);

$wp_customize->add_setting(
	'knote_woocommerce_product_card_purchase_layout',
	array(
		'default'           => 'secondary',
		'sanitize_callback' => 'sanitize_key',
	)
);
$wp_customize->add_control(
	new Knote_Control_RadioImage(
		$wp_customize,
		'knote_woocommerce_product_card_purchase_layout',
		array(
			'label'    	=> esc_html__( 'Add to cart button', 'knote' ),
			'section'  	=> 'woocommerce_product_catalog',
			'choices'  => array(
				'primary' => array(
					'label' => esc_html__( 'Layout 1', 'knote' ),
					'url'   => '%s/assets/admin/src/woocommerce/product-card/purchase-layout-primary.svg'
				),
				'secondary' => array(
					'label' => esc_html__( 'Layout 2', 'knote' ),
					'url'   => '%s/assets/admin/src/woocommerce/product-card/purchase-layout-secondary.svg'
				)
			),
			'priority'	 => 120
		)
	)
);

$wp_customize->add_setting(
    'knote_woocommerce_product_card_elements',
    array(
        'default'              => array('title', 'price'),
        'sanitize_callback'    => 'knote_sanitize_product_card_elements'
    )
);

$wp_customize->add_control(
    new \Kirki\Control\Sortable(
        $wp_customize,
        'knote_woocommerce_product_card_elements',
        array(
            'label'             => esc_html__('Card Elements', 'knote'),
            'section'           => 'woocommerce_product_catalog',
            'choices'   => array(
				'title'            => esc_html__('Title', 'knote'),
                'price'             => esc_html__('Price', 'knote'),
				'brand'            => esc_html__('Brand', 'knote'),
                'reviews'            => esc_html__('Reviews ', 'knote'),
                'category'             => esc_html__('Category', 'knote')
            ),
            'priority'     => 120
        )
    )
);

$wp_customize->add_setting( 'knote_woocommerce_product_card_alignment',
	array(
		'default' 			=> 'center',
		'sanitize_callback' => 'knote_sanitize_text'
	)
);
$wp_customize->add_control(
	new Knote_Control_RadioButtons(
		$wp_customize,
		'knote_woocommerce_product_card_alignment',
		array(
			'label'   => esc_html__( 'Alignment', 'knote' ),
			'section' => 'woocommerce_product_catalog',
			'choices' => array(
				'left' 		=> '<svg width="16" height="13" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h10v1H0zM0 4h16v1H0zM0 8h10v1H0zM0 12h16v1H0z"/></svg>',
				'center' 	=> '<svg width="16" height="13" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M3 0h10v1H3zM0 4h16v1H0zM3 8h10v1H3zM0 12h16v1H0z"/></svg>',
				'right' 	=> '<svg width="16" height="13" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M6 0h10v1H6zM0 4h16v1H0zM6 8h10v1H6zM0 12h16v1H0z"/></svg>',
			),
			'priority'	 => 150
		)
	)
);

// $wp_customize->add_setting( 'knote_woocommerce_product_card_element_spacing', array(
// 	'default'   		=> 15,
// 	'transport'			=> 'postMessage',
// 	'sanitize_callback' => 'absint',
// ) );

// $wp_customize->add_control(
// 	new Knote_Control_Slider(
// 		$wp_customize,
// 		'knote_woocommerce_product_card_element_spacing',
// 		array(
// 			'label' 		=> esc_html__( 'Elements spacing', 'knote' ),
// 			'section' 		=> 'woocommerce_product_catalog',
// 			'responsive'	=> 0,
// 			'settings' 		=> array (
// 				'size_desktop' 		=> 'knote_woocommerce_product_card_element_spacing',
// 			),
// 			'input_attrs' => array (
// 				'min'	=> 0,
// 				'max'	=> 100
// 			),
// 			'priority'	 => 160
// 		)
// 	)
// );

//Sale tag
$wp_customize->add_setting( 'knote_catalog_sale_badge_accordion',
	array(
		'sanitize_callback' => 'esc_attr',
	)
);

$wp_customize->add_control(
    new Knote_Control_Accordion(
        $wp_customize,
        'knote_catalog_sale_badge_accordion',
        array(
            'label'         => esc_html__( 'Sale tag', 'knote' ),
            'section'       => 'woocommerce_product_catalog',
			'connected'		=> json_encode( array(
				'#customize-control-knote_catalog_sale_badge_layout',
				'#customize-control-knote_catalog_sale_badge_spacing',
				'#customize-control-knote_catalog_sale_badge_radius',
				'#customize-control-knote_catalog_sale_badge_text',
				'#customize-control-knote_catalog_sale_badge_percent'
			) ),
			'priority' => 210

        )
    )
);

$wp_customize->add_setting(
	'knote_catalog_sale_badge_layout',
	array(
		'default'           => 'left',
		'sanitize_callback' => 'sanitize_key',
	)
);

$wp_customize->add_control(
	new Knote_Control_RadioImage(
		$wp_customize,
		'knote_catalog_sale_badge_layout',
		array(
			'label'    	=> esc_html__( 'Layout', 'knote' ),
			'section'  	=> 'woocommerce_product_catalog',
			'cols'		=> 3,
			'choices'  => array(
				'top-left' => array(
					'label' => esc_html__( 'Top left', 'knote' ),
					'url'   => '%s/assets/admin/src/woocommerce/product-card/sale1.svg'
				),
				'top-right' => array(
					'label' => esc_html__( 'Top right', 'knote' ),
					'url'   => '%s/assets/admin/src/woocommerce/product-card/sale2.svg'
				),
			),
			'priority'	 => 210
		)
	)
);

$wp_customize->add_setting( 'knote_catalog_sale_badge_spacing', array(
	'default'   		=> 20,
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_catalog_sale_badge_spacing',
		array(
			'label' 		=> esc_html__( 'Badge Offset', 'knote' ),
			'section' 		=> 'woocommerce_product_catalog',
			'responsive'	=> 0,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_catalog_sale_badge_spacing',
			),
			'input_attrs' => array (
				'min'	=> 0,
				'max'	=> 100
			),
			'priority'	 => 210
		)
	)
);

$wp_customize->add_setting( 'knote_catalog_sale_badge_radius', array(
	'default'   		=> 0,
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control(
	new Knote_Control_Slider(
		$wp_customize,
		'knote_catalog_sale_badge_radius',
		array(
			'label' 		=> esc_html__( 'Border radius', 'knote' ),
			'section' 		=> 'woocommerce_product_catalog',
			'responsive'	=> 0,
			'settings' 		=> array (
				'size_desktop' 		=> 'knote_catalog_sale_badge_radius',
			),
			'input_attrs' => array (
				'min'	=> 0,
				'max'	=> 100
			),
			'priority'	 => 210
		)
	)
);

$wp_customize->add_setting(
	'knote_catalog_sale_badge_text',
	array(
		'default'           => esc_html__( 'Sale', 'knote' ),
		'sanitize_callback' => 'knote_sanitize_text',
	)
);

$wp_customize->add_control(
	'knote_catalog_sale_badge_text',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Badge text', 'knote' ),
		'section'     => 'woocommerce_product_catalog',
		'priority'	  => 210
	)
);

$wp_customize->add_setting(
	'knote_catalog_sale_badge_percent',
	array(
		'default'           => 0,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_catalog_sale_badge_percent',
		array(
			'label'         	=> esc_html__( 'Display sale percentage', 'knote' ),
			'section'       	=> 'woocommerce_product_catalog',
			'priority'	 		=> 210
		)
	)
);


// Styles
$wp_customize->add_setting( 'knote_catalog_layout_style_accordion',
	array(
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
    new Knote_Control_Accordion(
        $wp_customize,
        'knote_catalog_layout_style_accordion',
        array(
            'label'         => esc_html__( 'Layout', 'knote' ),
            'section'       => 'woocommerce_product_catalog',
			'connected'		=> json_encode( array(
				'#customize-control-knote_woocommerce_catalog_columns'
			) ),
			'priority' =>	80

        )
    )
);

$wp_customize->add_setting( 'knote_catalog_categories_style_accordion',
	array(
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
    new Knote_Control_Accordion(
        $wp_customize,
        'knote_catalog_categories_style_accordion',
        array(
            'label'         => esc_html__( 'Categories', 'knote' ),
            'section'       => 'woocommerce_product_catalog',
			'connected'		=> json_encode( array(
				'#customize-control-knote_woocommerce_catalog_columns'
			) ),
			'priority' =>	80

        )
    )
);

$wp_customize->add_setting( 'knote_catalog_product_card_style_accordion',
	array(
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
    new Knote_Control_Accordion(
        $wp_customize,
        'knote_catalog_product_card_style_accordion',
        array(
            'label'         => esc_html__( 'Product card', 'knote' ),
            'section'       => 'woocommerce_product_catalog',
			'connected'		=> json_encode( array(
				'#customize-control-knote_catalog_product_card_background'
			) ),
			'priority' =>	80

        )
    )
);

$wp_customize->add_setting( 'knote_catalog_product_card_background',
	array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_catalog_product_card_background',
		array(
			'label'         	=> esc_html__( 'Background', 'knote' ),
			'section'       	=> 'woocommerce_product_catalog',
			'priority' =>	80
		)
	)
);

$wp_customize->add_setting( 'knote_catalog_sale_badge_style_accordion',
	array(
		'sanitize_callback' => 'esc_attr',
	)
);
$wp_customize->add_control(
    new Knote_Control_Accordion(
        $wp_customize,
        'knote_catalog_sale_badge_style_accordion',
        array(
            'label'         => esc_html__( 'Sale tag', 'knote' ),
            'section'       => 'woocommerce_product_catalog',
			'connected'		=> json_encode( array(
				'#customize-control-knote_catalog_sale_badge_color',
				'#customize-control-knote_catalog_sale_badge_background'
			) ),
			'priority' =>	80

        )
    )
);

$wp_customize->add_setting( 'knote_catalog_sale_badge_color',
	array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_catalog_sale_badge_color',
		array(
			'label'         	=> esc_html__( 'Color', 'knote' ),
			'section'       	=> 'woocommerce_product_catalog',
			'border' 			=> true,
			'priority' =>	80
		)
	)
);

$wp_customize->add_setting( 'knote_catalog_sale_badge_background',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control(
	new Knote_Control_AlphaColor(
		$wp_customize,
		'knote_catalog_sale_badge_background',
		array(
			'label'         	=> esc_html__( 'Background', 'knote' ),
			'section'       	=> 'woocommerce_product_catalog',
			'priority' =>	80
		)
	)
);