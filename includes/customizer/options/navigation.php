<?php
// General
$wp_customize->add_section(
    new Knote_Control_Section_Title(
        $wp_customize,
        'knote_section_general',
        array(
            'title'    => esc_html__( 'General', 'knote' ),
            'divider'  => true,
            'priority' => 0,
        )
    )
);

// Header
$wp_customize->add_section(
    new Knote_Control_Section_Title(
        $wp_customize,
        'knote_section_header',
        array(
            'title'    => esc_html__( 'Header', 'knote' ),
            'divider'  => true,
            'priority' => 10,
        )
    )
);

$wp_customize->add_section( new Knote_Control_Section_Title( $wp_customize, 'knote_styles',
	array(
		'title'    => esc_html__( 'Styles', 'knote' ),
        'divider'  => true,
		'priority' => 15,
	)
) );

$wp_customize->get_section( 'colors' )->priority    = 16;

$wp_customize->get_panel( 'knote_typography_panel' )->priority      = 17;
$wp_customize->get_section( 'background_image' )->priority          = 18;

$wp_customize->add_section( new Knote_Control_Section_Title( $wp_customize, 'knote_footer',
	array(
		'title'    => esc_html__( 'Footer', 'knote' ),
        'divider'  => true,
		'priority' => 20,
	)
) );

$wp_customize->add_section( new Knote_Control_Section_Title( $wp_customize, 'knote_blog',
	array(
		'title'    => esc_html__( 'Blog', 'knote' ),
        'divider'  => true,
		'priority' => 40,
	)
) );

if( class_exists( 'Woocommerce' ) ) {
    $wp_customize->add_section( new Knote_Control_Section_Title( $wp_customize, 'knote_woocommerce',
        array(
            'title'    => esc_html__( 'WooCommerce', 'knote' ),
            'divider'  => true,
            'priority' => 60,
        )
    ) );

    if ( $wp_customize->get_section( 'knote_catalog_general_section' ) ) {
		$wp_customize->get_section( 'knote_catalog_general_section' )->panel    = null;
		$wp_customize->get_section( 'knote_catalog_general_section' )->priority = 61;
	}

    if ( $wp_customize->get_section( 'woocommerce_store_notice' ) ) {
		$wp_customize->get_section( 'woocommerce_store_notice' )->panel    = null;
		$wp_customize->get_section( 'woocommerce_store_notice' )->priority = 62;
	}

    if ( $wp_customize->get_section( 'woocommerce_product_images' ) ) {
		$wp_customize->get_section( 'woocommerce_product_images' )->panel    = null;
		$wp_customize->get_section( 'woocommerce_product_images' )->priority = 62;
	}

    if ( $wp_customize->get_section( 'woocommerce_product_catalog' ) ) {
		$wp_customize->get_section( 'woocommerce_product_catalog' )->panel       = null;
		$wp_customize->get_section( 'woocommerce_product_catalog' )->priority 	 = 63;
	}

    if ( $wp_customize->get_section( 'woocommerce_checkout' ) ) {
		$wp_customize->get_section( 'woocommerce_checkout' )->panel    = null;
		$wp_customize->get_section( 'woocommerce_checkout' )->priority = 65;
	}
}

$wp_customize->add_section( new Knote_Control_Section_Title( $wp_customize, 'knote_performance',
	array(
		'title'    => esc_html__( 'Performance', 'knote' ),
        'divider'  => true,
		'priority' => 70,
	)
) );

$wp_customize->add_section( new Knote_Control_Section_Title( $wp_customize, 'knote_core',
	array(
		'title'    => esc_html__( 'Core', 'knote' ),
        'divider'  => true,
		'priority' => 80,
	)
) );
