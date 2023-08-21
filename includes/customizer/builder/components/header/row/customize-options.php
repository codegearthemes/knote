<?php
/**
 * Builder
 * Rows
 *
 * @package Knote
 */

/**
 * Rows
 */
foreach( $this->header_rows as $row ) {

    $wp_customize->add_setting(
        'knote_builder_' . $row['id'],
        array(
            'default'           => $row['default'],
            'sanitize_callback' => 'knote_sanitize_text',
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'knote_builder_' . $row['id'],
        array(
            'type'     => 'text',
            'label'    => esc_html( $row['label'] ),
            'section'  => $row['section'],
            'settings' => 'knote_builder_' . $row['id'],
            'priority' => 10
        )
    );

    // Selective Refresh
    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial(
            'knote_builder_' . $row['id'],
            array(
                'selector'        => '.builder-desktop .builder-rows .builder-' . $row['id'],
                'render_callback' => function() use( $row ) {
                    $this->rows_callback( $row['id'], 'header', 'desktop' ); // phpcs:ignore PHPCompatibility.FunctionDeclarations.NewClosure.ThisFoundOutsideClass
                },
            )
        );
    }

    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_tabs',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control(
        new Knote_Control_Tabs (
            $wp_customize,
            'knote_builder_' . $row['id'] . '_tabs',
            array(
                'label' 				=> '',
                'section'       		=> $row['section'],
                'controls_general'		=> json_encode( array(
                    '#customize-control-knote_builder_mobile_header_row_above',
                    '#customize-control-knote_builder_mobile_header_row_main',
                    '#customize-control-knote_builder_mobile_header_row_below',
                    '#customize-control-knote_builder_' . $row['id'] ,
                    '#customize-control-knote_builder_' . $row['id'] . '_height',
                    '#customize-control-knote_builder_' . $row['id'] . '_columns',
                    '#customize-control-knote_builder_' . $row['id'] . '_columns_layout',
                    '#customize-control-knote_builder_' . $row['id'] . '_available_columns'
                ) ),
                'controls_design'		=> json_encode( array(
                    '#customize-control-knote_builder_' . $row['id'] . '_background_color',
                    '#customize-control-knote_builder_' . $row['id'] . '_background_image',
                    '#customize-control-knote_builder_' . $row['id'] . '_background_size',
                    '#customize-control-knote_builder_' . $row['id'] . '_background_position',
                    '#customize-control-knote_builder_' . $row['id'] . '_background_repeat',
                    '#customize-control-knote_builder_' . $row['id'] . '_border_bottom',
                    '#customize-control-knote_builder_' . $row['id'] . '_border_bottom_color',
                    '#customize-control-knote_builder_' . $row['id'] . '_padding',
                    '#customize-control-knote_builder_' . $row['id'] . '_margin',

                    // Stiky Active State
                    '#customize-control-knote_builder_' . $row['id'] . '_sticky_divider1',
                    '#customize-control-knote_builder_' . $row['id'] . '_sticky_title',
                    '#customize-control-knote_builder_' . $row['id'] . '_sticky_background_color',
                    '#customize-control-knote_builder_' . $row['id'] . '_sticky_border_bottom_color'
                ) ),
                'priority' 				=> 20
            )
        )
    );

    /**
     * General
     */

    // Height.
    $wp_customize->add_setting( 'knote_builder_' . $row['id'] . '_height_desktop', array(
        'default'   		=> 80,
        'sanitize_callback' => 'absint'
    ) );
    $wp_customize->add_setting( 'knote_builder_' . $row['id'] . '_height_tablet', array(
        'default'   		=> 80,
        'sanitize_callback' => 'absint'
    ) );
    $wp_customize->add_setting( 'knote_builder_' . $row['id'] . '_height_mobile', array(
        'default'   		=> 80,
        'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control(
        new Knote_Control_Slider(
            $wp_customize,
            'knote_builder_' . $row['id'] . '_height',
            array(
                'label' 		=> esc_html__( 'Height', 'knote' ),
                'section' 		=> $row['section'],
                'responsive'	=> 1,
                'settings' 		=> array (
                    'size_desktop' 		=> 'knote_builder_' . $row['id'] . '_height_desktop',
                    'size_tablet' 		=> 'knote_builder_' . $row['id'] . '_height_tablet',
                    'size_mobile' 		=> 'knote_builder_' . $row['id'] . '_height_mobile',
                ),
                'input_attrs' => array (
                    'min'	=> 0,
                    'max'	=> 500,
                    'unit'  => 'px'
                ),
                'priority'              => 30
            )
        )
    );

    // Columns.
    $wp_customize->add_setting( 'knote_builder_' . $row['id'] . '_columns_desktop',
        array(
            'default' 			=> '2',
            'sanitize_callback' => 'knote_sanitize_text'
        )
    );
    $wp_customize->add_setting( 'knote_builder_' . $row['id'] . '_columns_tablet',
        array(
            'default' 			=> '3',
            'sanitize_callback' => 'knote_sanitize_text'
        )
    );
    $wp_customize->add_control( new Knote_Control_RadioButtons( $wp_customize, 'knote_builder_' . $row['id'] . '_columns',
        array(
            'label'         => esc_html__( 'Columns', 'knote' ),
            'section'       => $row['section'],
            'responsive'    => true,
            'settings' 		=> array (
                'desktop' 		=> 'knote_builder_' . $row['id'] . '_columns_desktop',
                'tablet' 		=> 'knote_builder_' . $row['id'] . '_columns_tablet'
            ),
            'choices'       => array(
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6'
            ),
            'priority'      => 35
        )
    ) );

    // Columns Layout.
    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_columns_layout_desktop',
        array(
            'default'           => 'column-2-equal',
            'sanitize_callback' => 'sanitize_key'
        )
    );
    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_columns_layout_tablet',
        array(
            'default'           => 'column-3-equal',
            'sanitize_callback' => 'sanitize_key'
        )
    );
    $wp_customize->add_control(
        new Knote_Control_RadioImage(
            $wp_customize,
            'knote_builder_' . $row['id'] . '_columns_layout',
            array(
                'label'    => esc_html__( 'Columns Layout', 'knote' ),
                'section'  => $row['section'],
                'columns' 		=> 4,
                'responsive' => true,
                'settings' 		=> array (
                    'desktop' 		=> 'knote_builder_' . $row['id'] . '_columns_layout_desktop',
                    'tablet' 		=> 'knote_builder_' . $row['id'] . '_columns_layout_tablet'
                ),
                'choices'  => array(
                    'column-1-equal' => array(
                        'label' => esc_html__( 'Full Width', 'knote' ),
                        'url'   => '%s/assets/admin/src/header/cl1.svg'
                    ),
                    'column-2-equal' => array(
                        'label' => esc_html__( '2 Equal Width', 'knote' ),
                        'url'   => '%s/assets/admin/src/header/cl2.svg'
                    ),
                    'column-2-bigleft' => array(
                        'label' => esc_html__( 'Big Left', 'knote' ),
                        'url'   => '%s/assets/admin/src/header/cl3.svg'
                    ),
                    'column-2-bigright' => array(
                        'label' => esc_html__( 'Big Right', 'knote' ),
                        'url'   => '%s/assets/admin/src/header/cl4.svg'
                    ),
                    'column-3-equal' => array(
                        'label' => esc_html__( '3 Equal Width', 'knote' ),
                        'url'   => '%s/assets/admin/src/header/cl5.svg'
                    ),
                    'column-3-fluid' => array(
                        'label' => esc_html__( 'Fluid Width', 'knote' ),
                        'url'   => '%s/assets/admin/src/header/cl6.svg'
                    ),
                    'column-3-bigleft' => array(
                        'label' => esc_html__( 'Big Left', 'knote' ),
                        'url'   => '%s/assets/admin/src/header/cl7.svg'
                    ),
                    'column-3-bigright' => array(
                        'label' => esc_html__( 'Big Right', 'knote' ),
                        'url'   => '%s/assets/admin/src/header/cl8.svg'
                    ),
                    'column-4-equal' => array(
                        'label' => esc_html__( '4 Equal Width', 'knote' ),
                        'url'   => '%s/assets/admin/src/header/cl9.svg'
                    ),
                    'column-4-bigleft' => array(
                        'label' => esc_html__( 'Big Left', 'knote' ),
                        'url'   => '%s/assets/admin/src/header/cl10.svg'
                    ),
                    'column-4-bigright' => array(
                        'label' => esc_html__( 'Big Right', 'knote' ),
                        'url'   => '%s/assets/admin/src/header/cl11.svg'
                    ),
                    'column-5-equal' => array(
                        'label' => esc_html__( '5 Equal Width', 'knote' ),
                        'url'   => '%s/assets/admin/src/header/cl12.svg'
                    ),
                    'column-6-equal' => array(
                        'label' => esc_html__( '6 Equal Width', 'knote' ),
                        'url'   => '%s/assets/admin/src/header/cl13.svg'
                    ),
                ),
                'priority' => 35
            )
        )
    );

    // Available Columns.
    $desc    = '';
    $devices = array( 'desktop', 'tablet' );
    foreach( $devices as $device ) {
        $column_count = absint( get_theme_mod( 'knote_builder_' . $row['id'] . '_columns_'. $device, 3 ) );
        $desc .= '<div class="responsive-control-'. esc_attr( $device ) .' builder-available-columns builder-available-columns-'. esc_attr( $device ) .'">';
            $desc .= '<div class="header-columns">';
            $desc .= '<span class="customize-control-title builder-columns-control-title" style="font-style: normal;">'. esc_html__( 'Available Columns', 'knote' ) .'</span>';
            $desc .= '<div class="customize-section-shortcuts">';
            for( $i=1;$i<=6;$i++ ) {
                $column_class = '';
                if( $i > $column_count ){
                    $column_class = 'hide';
                }
                $col_section_id = 'knote_builder_' . $row['id'] . '_column' . $i;
                $desc .= '<a class="columns-item widget-area-goto-link '. $column_class .'" href="#" data-column="'. absint( $i ) .'" onClick="wp.customize.section(\''. esc_js( $col_section_id ) .'\').focus()">'. /* translators: 1: column number. */ sprintf( esc_html__( 'Column %s', 'knote' ), absint( $i ) ) .'<span class="dashicons dashicons-arrow-right-alt2"></span></a>';
            }
            $desc .= '</div>';
            $desc .= '</div>';
        $desc .= '</div>';
    }

    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_available_columns',
        array(
            'default' 			=> '',
            'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control(
        new Knote_Control_Text(
            $wp_customize,
            'knote_builder_' . $row['id'] . '_available_columns',
            array(
                'description' 	=> $desc,
                'section' 		=> $row['section'],
                'priority' 		=> 37
            )
        )
    );

    /**
     * Styling
     */

    // Background.
    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_background_color',
        array(
            'default'           => '#FFFFFF',
            'sanitize_callback' => 'knote_sanitize_hex_rgba'
        )
    );
    $wp_customize->add_control(
        new Knote_Control_AlphaColor(
            $wp_customize,
            'knote_builder_' . $row['id'] . '_background_color',
            array(
                'label'         	=> esc_html__( 'Background color', 'knote' ),
                'section'       	=> $row['section'],
                'priority'			=> 32
            )
        )
    );

    // Background Image
    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_background_image',
        array(
            'default'           => '',
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'knote_builder_' . $row['id'] . '_background_image',
            array(
                'label'           => __( 'Background Image', 'knote' ),
                'section'         => $row['section'],
                'mime_type'       => 'image',
                'priority'	      => 32
            )
        )
    );

    // Background Size
    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_background_size',
        array(
            'default'           => 'cover',
            'sanitize_callback' => 'knote_sanitize_select'
        )
    );
    $wp_customize->add_control(
        'knote_builder_' . $row['id'] . '_background_size',
        array(
            'type' 		      => 'select',
            'label' 	      => esc_html__( 'Background Size', 'knote' ),
            'choices'         => array(
                'cover'   => esc_html__( 'Cover', 'knote' ),
                'contain' => esc_html__( 'Contain', 'knote' )
            ),
            'section' 	      => $row['section'],
            'active_callback' => function() use ( $row ){ return get_theme_mod( 'knote_builder_' . $row['id'] . '_background_image' ) ? true : false; },
            'priority'        => 32
        )
    );

    // Background Position
    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_background_position',
        array(
            'default'           => 'center',
            'sanitize_callback' => 'knote_sanitize_select'
        )
    );
    $wp_customize->add_control(
        'knote_builder_' . $row['id'] . '_background_position',
        array(
            'type' 		      => 'select',
            'label' 	      => esc_html__( 'Background Position', 'knote' ),
            'choices'         => array(
                'top'    => esc_html__( 'Top', 'knote' ),
                'center' => esc_html__( 'Center', 'knote' ),
                'bottom' => esc_html__( 'Bottom', 'knote' )
            ),
            'section' 	      => $row['section'],
            'active_callback' => function() use ( $row ){ return get_theme_mod( 'knote_builder_' . $row['id'] . '_background_image' ) ? true : false; },
            'priority'        => 32
        )
    );

    // Background Repeat
    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_background_repeat',
        array(
            'default'           => 'no-repeat',
            'sanitize_callback' => 'knote_sanitize_select'
        )
    );
    $wp_customize->add_control(
        'knote_builder_' . $row['id'] . '_background_repeat',
        array(
            'type' 		      => 'select',
            'label' 	      => esc_html__( 'Background Repeat', 'knote' ),
            'choices'         => array(
                'no-repeat' => esc_html__( 'No Repeat', 'knote' ),
                'repeat'    => esc_html__( 'Repeat', 'knote' )
            ),
            'section' 	      => $row['section'],
            'active_callback' => function() use ( $row ){ return get_theme_mod( 'knote_builder_' . $row['id'] . '_background_image' ) ? true : false; },
            'priority'        => 32
        )
    );

    // Border Bottom.
    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_border_bottom',
        array(
            'default'   		=> 0,
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control(
        new Knote_Control_Slider(
            $wp_customize,
            'knote_builder_' . $row['id'] . '_border_bottom',
            array(
                'label' 		=> esc_html__( 'Border Bottom Size', 'knote' ),
                'section' 		=> $row['section'],
                'responsive'	=> false,
                'settings' 		=> array (
                    'size_desktop' 		=> 'knote_builder_' . $row['id'] . '_border_bottom'
                ),
                'input_attrs' => array (
                    'min'	=> 0,
                    'max'	=> 10,
                    'unit'  => 'px'
                ),
                'priority'              => 34
            )
        )
    );

    // Border Bottom Color.
    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_border_bottom_color',
        array(
            'default'           => '#EAEAEA',
            'sanitize_callback' => 'knote_sanitize_hex_rgba'
        )
    );
    $wp_customize->add_control(
        new Knote_Control_AlphaColor(
            $wp_customize,
            'knote_builder_' . $row['id'] . '_border_bottom_color',
            array(
                'label'         	=> esc_html__( 'Border Bottom Color', 'knote' ),
                'section'       	=> $row['section'],
                'priority'			=> 36
            )
        )
    );

    // Margin
    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_margin_desktop',
        array(
            'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
            'sanitize_callback' => 'knote_sanitize_text',
        )
    );
    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_margin_tablet',
        array(
            'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
            'sanitize_callback' => 'knote_sanitize_text'
        )
    );
    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_margin_mobile',
        array(
            'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
            'sanitize_callback' => 'knote_sanitize_text'
        )
    );
    $wp_customize->add_control(
        new Knote_Control_Dimensions(
            $wp_customize,
            'knote_builder_' . $row['id'] . '_margin',
            array(
                'label'           	=> __( 'Margin', 'knote' ),
                'section'         	=> $row['section'],
                'sides'             => array(
                    'top'    => true,
                    'right'  => true,
                    'bottom' => true,
                    'left'   => true
                ),
                'units'             => array( 'px', 'em', 'rem' ),
                'responsive'   	    => true,
                'settings'        	=> array(
                    'desktop' => 'knote_builder_' . $row['id'] . '_margin_desktop',
                    'tablet'  => 'knote_builder_' . $row['id'] . '_margin_tablet',
                    'mobile'  => 'knote_builder_' . $row['id'] . '_margin_mobile'
                ),
                'priority'	      	 => 36
            )
        )
    );

    // Padding
    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_padding_desktop',
        array(
            'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
            'sanitize_callback' => 'knote_sanitize_text'
        )
    );
    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_padding_tablet',
        array(
            'default'           => '{ "unit": "px","top":"", "right": "", "bottom": "", "left": "" }',
            'sanitize_callback' => 'knote_sanitize_text'
        )
    );
    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_padding_mobile',
        array(
            'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
            'sanitize_callback' => 'knote_sanitize_text'
        )
    );
    $wp_customize->add_control(
        new Knote_Control_Dimensions(
            $wp_customize,
            'knote_builder_' . $row['id'] . '_padding',
            array(
                'label'           	=> __( 'Padding', 'knote' ),
                'section'         	=> $row['section'],
                'sides'             => array(
                    'top'    => true,
                    'right'  => true,
                    'bottom' => true,
                    'left'   => true
                ),
                'units'             => array( 'px', 'em', 'rem' ),
                'responsive'   	    => true,
                'settings'        	 => array(
                    'desktop' => 'knote_builder_' . $row['id'] . '_padding_desktop',
                    'tablet'  => 'knote_builder_' . $row['id'] . '_padding_tablet',
                    'mobile'  => 'knote_builder_' . $row['id'] . '_padding_mobile'
                ),
                'priority'	      	 => 36
            )
        )
    );

    /**
     * Sticky Header State
     *
     */

    // Divider
    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_sticky_divider1',
        array(
            'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control(
        new Knote_Control_Divider(
            $wp_customize,
            'knote_builder_' . $row['id'] . '_sticky_divider1',
            array(
                'section' 		=> $row['section'],
                'active_callback' => 'knote_sticky_header_enabled',
                'priority' 		=> 38
            )
        )
    );

    // Sticky Header - Title
    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_sticky_title',
        array(
            'default' 			=> '',
            'sanitize_callback' => 'esc_attr'
        )
        );
        $wp_customize->add_control(
        new Knote_Control_Text(
            $wp_customize,
            'knote_builder_' . $row['id'] . '_sticky_title',
            array(
                'label'			  => esc_html__( 'Sticky Header - Active State', 'knote' ),
                'description'     => esc_html__( 'Control the colors when the sticky header state is active.', 'knote' ),
                'section' 		  => $row['section'],
                'active_callback' => 'knote_sticky_header_enabled',
                'priority'	 	  => 38
            )
        )
    );

    // Sticky Header - Background.
    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_sticky_background_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'knote_sanitize_hex_rgba'
        )
    );
    $wp_customize->add_control(
        new Knote_Control_AlphaColor(
            $wp_customize,
            'knote_builder_' . $row['id'] . '_sticky_background_color',
            array(
                'label'         	=> esc_html__( 'Background color', 'knote' ),
                'section'       	=> $row['section'],
                'active_callback'   => 'knote_sticky_header_enabled',
                'priority'			=> 39
            )
        )
    );

    // Sticky Header - Border Bottom Color.
    $wp_customize->add_setting(
        'knote_builder_' . $row['id'] . '_sticky_border_bottom_color',
        array(
            'default'           => '#EAEAEA',
            'sanitize_callback' => 'knote_sanitize_hex_rgba'
        )
    );
    $wp_customize->add_control(
        new Knote_Control_AlphaColor(
            $wp_customize,
            'knote_builder_' . $row['id'] . '_sticky_border_bottom_color',
            array(
                'label'         	=> esc_html__( 'Border Bottom Color', 'knote' ),
                'section'       	=> $row['section'],
                'active_callback'   => 'knote_sticky_header_enabled',
                'priority'			=> 40
            )
        )
    );
}

/**
 * Mobile Controls
 * Currently we only add mobile partials here to trigger the 'change'
 * javascript event and consequently do the selective refresh in the desired area.
 *
 */
foreach( $this->header_rows as $row ) {

    $wp_customize->add_setting(
        'knote_builder_mobile_' . $row['id'],
        array(
            'default'           => '',
            'sanitize_callback' => 'knote_sanitize_text',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        'knote_builder_mobile_' . $row['id'],
        array(
            'type'     => 'text',
            /* translators: 1: Mobile row identifier. */
            'label'    => sprintf( esc_html__( 'Mobile - %s', 'knote' ), $row['label'] ),
            'section'  => $row['section'],
            'settings' => 'knote_builder_mobile_' . $row['id'],
            'priority' => 10
        )
    );

    // Selective Refresh
    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial(
            'knote_builder_mobile_' . $row['id'],
            array(
                'selector'        => '.builder-mobile .builder-' . $row['id'],
                'render_callback' => function() use( $row ) {
                    $this->rows_callback( $row['id'], 'header', 'mobile' ); // phpcs:ignore PHPCompatibility.FunctionDeclarations.NewClosure.ThisFoundOutsideClass
                },
            )
        );
    }
}
