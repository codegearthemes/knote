<?php
/**
 * Builder
 * Columns
 *
 * @package Knote
 */


/**
 * Columns
 */
foreach( $this->footer_rows as $row ) {

    // Up to 6 columns.
    for( $i=1; $i<=6; $i++ ) {
        $section = 'knote_builder_' . $row['id'] . '_column' . $i;

        // Section.
        $wp_customize->add_section(
            $section,
            array(
                /* translators: 1: column number. */
                'title'      => sprintf( esc_html__( 'Column %s', 'knote' ), $i ),
                'panel'      => 'knote_footer_panel'
            )
        );

        /**
         * Tabs (Layout / Design)
         *
         */
        $wp_customize->add_setting(
            $section . '_tabs',
            array(
                'default'           => '',
                'sanitize_callback' => 'esc_attr'
            )
        );
        $wp_customize->add_control(
            new Knote_Control_Tabs (
                $wp_customize,
                $section . '_tabs',
                array(
                    'label' 				=> '',
                    'section'       		=> $section,
                    'controls_general'		=> json_encode(
                        array(
                            "#customize-control-{$section}_inner_layout",
                            "#customize-control-{$section}_vertical_alignment",
                            "#customize-control-{$section}_horizontal_alignment",
                            "#customize-control-{$section}_elements_spacing",
                        )
                    ),
                    'controls_design'		=> json_encode(
                        array(
                            "#customize-control-{$section}_margin",
                            "#customize-control-{$section}_padding",
                        )
                    ),
                    'priority' 				=> 10
                )
            )
        );

        /**
         * Layout (Tab Content)
         *
         */
        // Inner Elements Layout.
        $default = Knote_Builder::get_row_column_default_customizer_value( $row[ 'id' ], $i, 'inner_layout' );

        $wp_customize->add_setting(
            $section . '_inner_layout_desktop',
            array(
                'default' 			=> $default,
                'sanitize_callback' => 'knote_sanitize_text'
            )
        );
        $wp_customize->add_setting(
            $section . '_inner_layout_tablet',
            array(
                'default' 			=> $default,
                'sanitize_callback' => 'knote_sanitize_text'
            )
        );
        $wp_customize->add_setting(
            $section . '_inner_layout_mobile',
            array(
                'default' 			=> $default,
                'sanitize_callback' => 'knote_sanitize_text'
            )
        );
        $wp_customize->add_control(
            new Knote_Control_RadioButtons(
                $wp_customize,
                $section . '_inner_layout',
                array(
                    'label'   => esc_html__( 'Inner Elements Layout', 'knote' ),
                    'section' => $section,
                    'responsive' => true,
                    'settings' => array(
                        'desktop' 		=> $section . '_inner_layout_desktop',
                        'tablet' 		=> $section . '_inner_layout_tablet',
                        'mobile' 		=> $section . '_inner_layout_mobile'
                    ),
                    'choices' => array(
                        'stack'  => esc_html__( 'Stack', 'knote' ),
                        'inline' => esc_html__( 'Inline', 'knote' )
                    ),
                    'priority'              => 25
                )
            )
        );

        // Vertical Alignment.
        $default = Knote_Builder::get_row_column_default_customizer_value( $row[ 'id' ], $i, 'vertical_alignment' );

        $wp_customize->add_setting(
            $section . '_vertical_alignment_desktop',
            array(
                'default' 			=> $default,
                'sanitize_callback' => 'knote_sanitize_text'
            )
        );
        $wp_customize->add_setting(
            $section . '_vertical_alignment_tablet',
            array(
                'default' 			=> $default,
                'sanitize_callback' => 'knote_sanitize_text'
            )
        );
        $wp_customize->add_setting(
            $section . '_vertical_alignment_mobile',
            array(
                'default' 			=> $default,
                'sanitize_callback' => 'knote_sanitize_text'
            )
        );
        $wp_customize->add_control(
            new Knote_Control_RadioButtons(
                $wp_customize,
                $section . '_vertical_alignment',
                array(
                    'label'         => esc_html__( 'Vertical Alignment', 'knote' ),
                    'section'       => $section,
                    'responsive' => true,
                    'settings' 		=> array (
                        'desktop' 		=> $section . '_vertical_alignment_desktop',
                        'tablet' 		=> $section . '_vertical_alignment_tablet',
                        'mobile' 		=> $section . '_vertical_alignment_mobile'
                    ),
                    'choices'       => array(
                        'flex-align-start'    => esc_html__( 'Top', 'knote' ),
                        'flex-align-center' => esc_html__( 'Middle', 'knote' ),
                        'flex-align-end' => esc_html__( 'Bottom', 'knote' )
                    ),
                    'priority'      => 30
                )
            )
        );

        // Horizontal Alignment.
        $default = Knote_Builder::get_row_column_default_customizer_value( $row[ 'id' ], $i, 'horizontal_alignment' );

        $wp_customize->add_setting(
            $section . '_horizontal_alignment_desktop',
            array(
                'default' 			=> $default,
                'sanitize_callback' => 'knote_sanitize_text'
            )
        );
        $wp_customize->add_setting(
            $section . '_horizontal_alignment_tablet',
            array(
                'default' 			=> $default,
                'sanitize_callback' => 'knote_sanitize_text'
            )
        );
        $wp_customize->add_setting(
            $section . '_horizontal_alignment_mobile',
            array(
                'default' 			=> $default,
                'sanitize_callback' => 'knote_sanitize_text'
            )
        );
        $wp_customize->add_control(
            new Knote_Control_RadioButtons(
                $wp_customize,
                $section . '_horizontal_alignment',
                array(
                    'label'         => esc_html__( 'Horizontal Alignment', 'knote' ),
                    'section'       => $section,
                    'responsive' => true,
                    'settings' => array(
                        'desktop' 		=> $section . '_horizontal_alignment_desktop',
                        'tablet' 		=> $section . '_horizontal_alignment_tablet',
                        'mobile' 		=> $section . '_horizontal_alignment_mobile'
                    ),
                    'choices'       => array(
                        'flex-start'  => esc_html__( 'Start', 'knote' ),
                        'flex-center' => esc_html__( 'Center', 'knote' ),
                        'flex-end'    => esc_html__( 'End', 'knote' )
                    ),
                    'priority'      => 35
                )
            )
        );

        // Elements Spacing.
        $wp_customize->add_setting(
            $section . '_elements_spacing_desktop',
            array(
                'default'   		=> 24,
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_setting(
            $section . '_elements_spacing_tablet',
            array(
                'default'   		=> 16,
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_setting(
            $section . '_elements_spacing_mobile',
            array(
                'default'   		=> 12,
                'sanitize_callback' => 'absint'
            )
        );

        $wp_customize->add_control(
            new Knote_Control_Slider(
                $wp_customize,
                $section . '_elements_spacing',
                array(
                    'label' 		=> esc_html__( 'Elements Spacing', 'knote' ),
                    'section' 		=> $section,
                    'responsive'	=> true,
                    'settings' 		=> array (
                        'size_desktop' 		=> $section . '_elements_spacing_desktop',
                        'size_tablet' 		=> $section . '_elements_spacing_tablet',
                        'size_mobile' 		=> $section . '_elements_spacing_mobile'
                    ),
                    'input_attrs' => array (
                        'min'	=> 0,
                        'max'	=> 150,
                        'step'  => 1
                    ),
                    'priority'     => 40
                )
            )
        );

        /**
         * Design (Tab Content)
         *
         */
        // Margin
        $wp_customize->add_setting(
            $section . '_margin_desktop',
            array(
                'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
                'sanitize_callback' => 'knote_sanitize_text'
            )
        );
        $wp_customize->add_setting(
            $section . '_margin_tablet',
            array(
                'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
                'sanitize_callback' => 'knote_sanitize_text'
            )
        );
        $wp_customize->add_setting(
            $section . '_margin_mobile',
            array(
                'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
                'sanitize_callback' => 'knote_sanitize_text'
            )
        );
        $wp_customize->add_control(
            new Knote_Control_Dimensions(
                $wp_customize,
                $section . '_margin',
                array(
                    'label'           	=> __( 'Margin', 'knote' ),
                    'section'         	=> $section,
                    'sides'             => array(
                        'top'    => true,
                        'right'  => true,
                        'bottom' => true,
                        'left'   => true
                    ),
                    'units'             => array( 'px', 'em', 'rem' ),
                    'responsive'   	    => true,
                    'settings'        	=> array(
                        'desktop' => $section . '_margin_desktop',
                        'tablet'  => $section . '_margin_tablet',
                        'mobile'  => $section . '_margin_mobile'
                    ),
                    'priority'	      	 => 45
                )
            )
        );

        // Padding
        $wp_customize->add_setting(
            $section . '_padding_desktop',
            array(
                'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
                'sanitize_callback' => 'knote_sanitize_text'
            )
        );
        $wp_customize->add_setting(
            $section . '_padding_tablet',
            array(
                'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
                'sanitize_callback' => 'knote_sanitize_text'
            )
        );
        $wp_customize->add_setting(
            $section . '_padding_mobile',
            array(
                'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
                'sanitize_callback' => 'knote_sanitize_text'
            )
        );
        $wp_customize->add_control(
            new Knote_Control_Dimensions(
                $wp_customize,
                $section . '_padding',
                array(
                    'label'           	=> __( 'Padding', 'knote' ),
                    'section'         	=> $section,
                    'sides'             => array(
                        'top'    => true,
                        'right'  => true,
                        'bottom' => true,
                        'left'   => true
                    ),
                    'units'              => array( 'px', 'em', 'rem' ),
                    'responsive'   	 => true,
                    'settings'        	 => array(
                        'desktop' => $section . '_padding_desktop',
                        'tablet'  => $section . '_padding_tablet',
                        'mobile'  => $section . '_padding_mobile'
                    ),
                    'priority'	      	 => 46
                )
            )
        );

    }

}
