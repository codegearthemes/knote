<?php

/**
 * Woocommerce Product Options
 *
 * @package Knote
 */

/**
 * General
 */
$wp_customize->add_section(
    'knote_single_product_section',
    array(
        'title'    => esc_html__('Single Product', 'knote'),
        'panel'     => 'woocommerce',
        'priority' => 110
    )
);

$wp_customize->add_setting(
    'knote_single_product_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);

$wp_customize->add_control(
    new Knote_Control_Tabs(
        $wp_customize,
        'knote_single_product_tabs',
        array(
            'label'            => '',
            'section'          => 'knote_single_product_section',
            'controls_general' => json_encode(array(
                '#customize-control-knote_single_product_gallery',
                '#customize-control-knote_single_product_gallery_slider',
                '#customize-control-knote_single_product_zoom_effects',
                '#customize-control-knote_single_product_gallery_divider',
                '#customize-control-knote_single_product_breadcrumbs',
                '#customize-control-knote_single_product_ajax_add_to_cart',
                '#customize-control-knote_single_product_elements_order',
                '#customize-control-knote_single_product_description_tabs',
                '#customize-control-knote_single_product_elements_divider',
                '#customize-control-knote_single_product_upsell_products',
                '#customize-control-knote_single_product_upsell_divider',
                '#customize-control-knote_single_product_recently_viewed_products',
                '#customize-control-knote_single_product_recently_viewed_divider',
                '#customize-control-knote_single_product_related_products',
                '#customize-control-knote_single_product_sku',
                '#customize-control-knote_single_product_categories',
                '#customize-control-knote_single_product_tags',
            )),
            'controls_design'  => json_encode(array(
                '#customize-control-knote_single_product_title_title',
                '#customize-control-knote_single_product_title_font_style',
                '#customize-control-knote_single_product_title_font',
                '#customize-control-knote_single_product_title_size',
                '#customize-control-knote_single_product_title_color',
                '#customize-control-knote_single_product_title_divider',
                '#customize-control-knote_single_product_price_title',
                '#customize-control-knote_single_product_price_size',
                '#customize-control-knote_single_product_price_color',
            )),
        )
    )
);


$wp_customize->add_setting(
    'knote_single_product_gallery',
    array(
        'default'           => 'default',
        'sanitize_callback' => 'sanitize_key',
    )
);
$wp_customize->add_control(
    new Knote_Control_RadioImage(
        $wp_customize,
        'knote_single_product_gallery',
        array(
            'label'        => esc_html__('Product Image', 'knote'),
            'section'      => 'knote_single_product_section',
            'choices'  => array(
                'default' => array(
                    'label' => esc_html__('Layout 1', 'knote'),
                    'url'   => '%s/assets/admin/src/woocommerce/single/single-gallery-slider-bottom.svg'
                ),
                'stack' => array(
                    'label' => esc_html__('Layout 2', 'knote'),
                    'url'   => '%s/assets//admin/src/woocommerce/single/single-gallery-stack.svg'
                ),
                'scrolling' => array(
                    'label' => esc_html__('Layout 3', 'knote'),
                    'url'   => '%s/assets//admin/src/woocommerce/single/single-gallery-scrolling.svg'
                ),
                'vertical' => array(
                    'label' => esc_html__('Layout 4', 'knote'),
                    'url'   => '%s/assets//admin/src/woocommerce/single/single-gallery-slider-left-right.svg'
                ),
            ),
            'priority'     => 20
        )
    )
);

$wp_customize->add_setting(
    'knote_single_product_gallery_slider',
    array(
        'default'           => 1,
        'sanitize_callback' => 'knote_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    new Knote_Control_Switch(
        $wp_customize,
        'knote_single_product_gallery_slider',
        array(
            'label'             => esc_html__('Gallery thumbnail slider', 'knote'),
            'description'       => esc_html__('Requires page refresh after saving', 'knote'),
            'section'           => 'knote_single_product_section',
            'priority'             => 30
        )
    )
);

$wp_customize->add_setting(
    'knote_single_product_zoom_effects',
    array(
        'default'           => 1,
        'sanitize_callback' => 'knote_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    new Knote_Control_Switch(
        $wp_customize,
        'knote_single_product_zoom_effects',
        array(
            'label'             => esc_html__('Image zoom effects', 'knote'),
            'description'       => esc_html__('Requires page refresh after saving', 'knote'),
            'section'           => 'knote_single_product_section',
            'priority'             => 40
        )
    )
);

$wp_customize->add_setting(
    'knote_single_product_gallery_divider',
    array(
        'sanitize_callback' => 'esc_attr'
    )
);

$wp_customize->add_control(
    new Knote_Control_Divider(
        $wp_customize,
        'knote_single_product_gallery_divider',
        array(
            'section'  => 'knote_single_product_section',
            'priority' => 45
        )
    )
);

$wp_customize->add_setting(
    'knote_single_product_breadcrumbs',
    array(
        'default'           => 1,
        'sanitize_callback' => 'knote_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    new Knote_Control_Switch(
        $wp_customize,
        'knote_single_product_breadcrumbs',
        array(
            'label'             => esc_html__('Breadcrumbs', 'knote'),
            'section'           => 'knote_single_product_section',
            'priority'             => 50
        )
    )
);

$wp_customize->add_setting(
    'knote_single_product_ajax_add_to_cart',
    array(
        'default'           => 0,
        'sanitize_callback' => 'knote_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    new Knote_Control_Switch(
        $wp_customize,
        'knote_single_product_ajax_add_to_cart',
        array(
            'label'    => esc_html__('Ajax Add To Cart', 'knote'),
            'section'  => 'knote_single_product_section',
            'priority' => 55
        )
    )
);

$wp_customize->add_setting(
    'knote_single_product_elements_order',
    array(
        'default'              => array(
            'woocommerce_template_single_title',
            'woocommerce_template_single_rating',
            'woocommerce_template_single_price',
            'woocommerce_template_single_add_to_cart',
            'knote_woocommerce_divider_output',
            'woocommerce_template_single_meta'
        ),
        'sanitize_callback'    => 'knote_sanitize_single_product_components'
    )
);

$wp_customize->add_control(
    new \Kirki\Control\Sortable(
        $wp_customize,
        'knote_single_product_elements_order',
        array(
            'label'             => esc_html__('Elements', 'knote'),
            'section'           => 'knote_single_product_section',
            'choices'   => array(
                'woocommerce_product_vendor'                    => esc_html__('Brand', 'knote'),
                'woocommerce_template_single_title'             => esc_html__('Title', 'knote'),
                'woocommerce_template_single_rating'            => esc_html__('Reviews ', 'knote'),
                'woocommerce_template_single_price'             => esc_html__('Price', 'knote'),
                'woocommerce_template_single_excerpt'           => esc_html__('Short description ', 'knote'),
                'woocommerce_template_single_add_to_cart'       => esc_html__('Add to cart', 'knote'),
                'knote_woocommerce_divider_output'            => esc_html__('Divider', 'knote'),
                'woocommerce_template_single_meta'              => esc_html__('Meta', 'knote'),
            ),
            'priority'     => 65
        )
    )
);

$wp_customize->add_setting(
    'knote_single_product_sku',
    array(
        'default'           => 0,
        'sanitize_callback' => 'knote_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    new Knote_Control_Switch(
        $wp_customize,
        'knote_single_product_sku',
        array(
            'label'             => esc_html__('SKU', 'knote'),
            'section'           => 'knote_single_product_section',
            'priority'             => 65
        )
    )
);

$wp_customize->add_setting(
    'knote_single_product_categories',
    array(
        'default'           => 0,
        'sanitize_callback' => 'knote_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    new Knote_Control_Switch(
        $wp_customize,
        'knote_single_product_categories',
        array(
            'label'             => esc_html__('Categories', 'knote'),
            'section'           => 'knote_single_product_section',
            'priority'             => 70
        )
    )
);

$wp_customize->add_setting(
    'knote_single_product_tags',
    array(
        'default'           => 0,
        'sanitize_callback' => 'knote_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    new Knote_Control_Switch(
        $wp_customize,
        'knote_single_product_tags',
        array(
            'label'             => esc_html__('Tags', 'knote'),
            'section'           => 'knote_single_product_section',
            'priority'             => 80
        )
    )
);

$wp_customize->add_setting(
    'knote_single_product_description_tabs',
    array(
        'default'           => 1,
        'sanitize_callback' => 'knote_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    new Knote_Control_Switch(
        $wp_customize,
        'knote_single_product_description_tabs',
        array(
            'label'             => esc_html__('Product tabs', 'knote'),
            'section'           => 'knote_single_product_section',
            'priority'             => 90
        )
    )
);

$wp_customize->add_setting(
    'knote_single_product_elements_divider',
    array(
        'sanitize_callback' => 'esc_attr'
    )
);

$wp_customize->add_control(
    new Knote_Control_Divider(
        $wp_customize,
        'knote_single_product_elements_divider',
        array(
            'section'         => 'knote_single_product_section',
            'priority'         => 100
        )
    )
);

$wp_customize->add_setting(
    'knote_single_product_upsell_products',
    array(
        'default'           => 1,
        'sanitize_callback' => 'knote_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    new Knote_Control_Switch(
        $wp_customize,
        'knote_single_product_upsell_products',
        array(
            'label'             => esc_html__('Upsell products', 'knote'),
            'section'           => 'knote_single_product_section',
            'priority'             => 101
        )
    )
);

$wp_customize->add_setting(
    'knote_single_product_upsell_divider',
    array(
        'sanitize_callback' => 'esc_attr'
    )
);

$wp_customize->add_control(
    new Knote_Control_Divider(
        $wp_customize,
        'knote_single_product_upsell_divider',
        array(
            'section'         => 'knote_single_product_section',
            'priority'         => 103
        )
    )
);

$wp_customize->add_setting(
    'knote_single_product_recently_viewed_products',
    array(
        'default'           => 0,
        'sanitize_callback' => 'knote_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    new Knote_Control_Switch(
        $wp_customize,
        'knote_single_product_recently_viewed_products',
        array(
            'label'             => esc_html__('Recently Viewed Products', 'knote'),
            'section'           => 'knote_single_product_section',
            'priority'             => 104
        )
    )
);

$wp_customize->add_setting(
    'knote_single_product_recently_viewed_divider',
    array(
        'sanitize_callback' => 'esc_attr'
    )
);

$wp_customize->add_control(
    new Knote_Control_Divider(
        $wp_customize,
        'knote_single_product_recently_viewed_divider',
        array(
            'section'         => 'knote_single_product_section',
            'priority'         => 105
        )
    )
);

$wp_customize->add_setting(
    'knote_single_product_related_products',
    array(
        'default'           => 1,
        'sanitize_callback' => 'knote_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    new Knote_Control_Switch(
        $wp_customize,
        'knote_single_product_related_products',
        array(
            'label'             => esc_html__('Related products', 'knote'),
            'section'           => 'knote_single_product_section',
            'priority'             => 110
        )
    )
);

/**
 * Styling
 */
// Title
$wp_customize->add_setting(
    'knote_single_product_title_title',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Text(
        $wp_customize,
        'knote_single_product_title_title',
        array(
            'label'    => esc_html__('Product Title', 'knote'),
            'section'  => 'knote_single_product_section',
            'priority' => 145
        )
    )
);

// Typography
$wp_customize->add_setting(
    'knote_single_product_title_font_style',
    array(
        'default'           => 'heading',
        'sanitize_callback' => 'knote_sanitize_select',
    )
);
$wp_customize->add_control(
    'knote_single_product_title_font_style',
    array(
        'type'      => 'select',
        'section'   => 'knote_single_product_section',
        'label'     => esc_html__('Font Style', 'knote'),
        'choices'   => array(
            'heading' => esc_html__('Heading', 'knote'),
            'body'    => esc_html__('Body', 'knote'),
        ),
        'priority'  => 145,
    )
);

// Font Size
$wp_customize->add_setting('knote_single_product_title_size_desktop', array(
    'default'           => 32,
    'transport'            => 'postMessage',
    'sanitize_callback' => 'absint',
));
$wp_customize->add_setting('knote_single_product_title_size_tablet', array(
    'default'           => 32,
    'transport'            => 'postMessage',
    'sanitize_callback' => 'absint',
));
$wp_customize->add_setting('knote_single_product_title_size_mobile', array(
    'default'           => 32,
    'transport'            => 'postMessage',
    'sanitize_callback' => 'absint',
));
$wp_customize->add_control(
    new Knote_Control_Slider(
        $wp_customize,
        'knote_single_product_title_size',
        array(
            'label'         => esc_html__('Font Size', 'knote'),
            'section'       => 'knote_single_product_section',
            'responsive'    => 1,
            'settings'      => array(
                'size_desktop'        => 'knote_single_product_title_size_desktop',
                'size_tablet'         => 'knote_single_product_title_size_tablet',
                'size_mobile'         => 'knote_single_product_title_size_mobile',
            ),
            'input_attrs' => array(
                'min'     => 12,
                'max'     => 200,
                'unit'    => 'px'
            ),
            'priority'     => 145
        )
    )
);

$wp_customize->add_setting(
    'knote_single_product_title_color',
    array(
        'default'           => '#212121',
        'sanitize_callback' => 'knote_sanitize_hex_rgba',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    new Knote_Control_AlphaColor(
        $wp_customize,
        'knote_single_product_title_color',
        array(
            'label'             => esc_html__('Title color', 'knote'),
            'section'           => 'knote_single_product_section',
            'priority'             => 145
        )
    )
);

$wp_customize->add_setting( 'knote_single_product_title_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_single_product_title_divider',
		array(
			'section' 		=> 'knote_single_product_section',
			'priority'      => 145
		)
	)
);

// Product Price Title
$wp_customize->add_setting(
    'knote_single_product_price_title',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Text(
        $wp_customize,
        'knote_single_product_price_title',
        array(
            'label'    => esc_html__('Product Price', 'knote'),
            'section'  => 'knote_single_product_section',
            'priority' => 145
        )
    )
);

// Font Size
$wp_customize->add_setting('knote_single_product_price_size_desktop', array(
    'default'           => 24,
    'transport'            => 'postMessage',
    'sanitize_callback' => 'absint',
));
$wp_customize->add_setting('knote_single_product_price_size_tablet', array(
    'default'           => 20,
    'transport'            => 'postMessage',
    'sanitize_callback' => 'absint',
));
$wp_customize->add_setting('knote_single_product_price_size_mobile', array(
    'default'           => 18,
    'transport'            => 'postMessage',
    'sanitize_callback' => 'absint',
));
$wp_customize->add_control(
    new Knote_Control_Slider(
        $wp_customize,
        'knote_single_product_price_size',
        array(
            'label'         => esc_html__('Font Size', 'knote'),
            'section'         => 'knote_single_product_section',
            'responsive'    => 1,
            'settings'         => array(
                'size_desktop'        => 'knote_single_product_price_size_desktop',
                'size_tablet'         => 'knote_single_product_price_size_tablet',
                'size_mobile'         => 'knote_single_product_price_size_mobile',
            ),
            'input_attrs' => array(
                'min'    => 8,
                'max'    => 100,
                'unit'    => 'px'
            ),
            'priority' => 145
        )
    )
);

// Price Color
$wp_customize->add_setting(
    'knote_single_product_price_color',
    array(
        'default'           => '#212121',
        'sanitize_callback' => 'knote_sanitize_hex_rgba',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    new Knote_Control_AlphaColor(
        $wp_customize,
        'knote_single_product_price_color',
        array(
            'label'    => esc_html__('Price color', 'knote'),
            'section'  => 'knote_single_product_section',
            'priority' => 145
        )
    )
);
