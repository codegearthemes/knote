<?php

/**
 * Sanitize text
 */
function knote_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
/**
 * Selects
 */
function knote_sanitize_select( $input, $setting ){

    $input = sanitize_key($input);

    $choices = $setting->manager->get_control( $setting->id )->choices;

    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize URLs
 */
function knote_sanitize_urls( $input ) {
    if ( strpos( $input, ',' ) !== false) {
        $input = explode( ',', $input );
    }
    if ( is_array( $input ) ) {
        foreach ($input as $key => $value) {
            $input[$key] = esc_url_raw( $value );
        }
        $input = implode( ',', $input );
    }
    else {
        $input = esc_url_raw( $input );
    }
    return $input;
}

/**
 * Sanitize hex and rgba
 */
function knote_sanitize_hex_rgba( $input, $setting ) {
    if ( empty( $input ) || is_array( $input ) ) {
        return $setting->default;
    }

    if ( false === strpos( $input, 'rgb' ) ) {
        $input = sanitize_hex_color( $input );
    } else {
        if ( false === strpos( $input, 'rgba' ) ) {
            // Sanitize as RGB color
            $input = str_replace( ' ', '', $input );
            sscanf( $input, 'rgb(%d,%d,%d)', $red, $green, $blue );
            $input = 'rgb(' . knote_range( $red, 0, 255 ) . ',' . knote_range( $green, 0, 255 ) . ',' . knote_range( $blue, 0, 255 ) . ')';
        }
        else {
            // Sanitize as RGBa color
            $input = str_replace( ' ', '', $input );
            sscanf( $input, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
            $input = 'rgba(' . knote_range( $red, 0, 255 ) . ',' . knote_range( $green, 0, 255 ) . ',' . knote_range( $blue, 0, 255 ) . ',' . knote_range( $alpha, 0, 1 ) . ')';
        }
    }
    return $input;
}

/**
 * Helper function to check if value is in range
 */
function knote_range( $input, $min, $max ){
    if ( $input < $min ) {
        $input = $min;
    }
    if ( $input > $max ) {
        $input = $max;
    }
    return $input;
}

/**
 * Sanitize checkboxes
 */
function knote_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

/**
 * Sanitize fonts
 */
function knote_google_fonts_sanitize( $input ) {
    $val =  json_decode( $input, true );
    if( is_array( $val ) ) {
        foreach ( $val as $key => $value ) {
            $val[$key] = sanitize_text_field( $value );
        }
        $input = json_encode( $val );
    }
    else {
        $input = json_encode( sanitize_text_field( $val ) );
    }
    return $input;
}

/**
 * Sanitize Meta
 */
function knote_sanitize_archive_meta_components( $input ){
    $input     = (array) $input;
    $sanitized = array();

    foreach ( $input as $sub_value ) {
        if ( in_array( $sub_value, array( 'date', 'author' ), true ) ) {
            $sanitized[] = $sub_value;
        }
    }
    return $sanitized;
}

/**
 * Sanitize Single Meta
 */
function knote_sanitize_single_meta_components( $input ){
    $input     = (array) $input;
    $sanitized = array();

    foreach ( $input as $sub_value ) {
        if ( in_array( $sub_value, array( 'date', 'author', 'comments' ), true ) ) {
            $sanitized[] = $sub_value;
        }
    }
    return $sanitized;
}

/**
 * Sanitize loop product components
 */
function knote_sanitize_woocommerce_components( $input ) {
    $input      = (array) $input;
    $sanitized  = array();
    $elements   = apply_filters( 'knote_sanitize_woocommerce_header_elements', array( 'account', 'wishlist', 'cart' ) );

    foreach ( $input as $sub_value ) {
        if ( in_array( $sub_value, $elements, true ) ) {
            $sanitized[] = $sub_value;
        }
    }
    return $sanitized;
}


/**
 * Sanitize loop product components
 */
function knote_sanitize_product_card_elements( $input ) {
    $input      = (array) $input;
    $sanitized  = array();
    $elements   = apply_filters( 'knote_sanitize_product_card_elements', array( 'title', 'price', 'brand', 'reviews', 'category', 'short-description' ) );

    foreach ( $input as $sub_value ) {
        if ( in_array( $sub_value, $elements, true ) ) {
            $sanitized[] = $sub_value;
        }
    }
    return $sanitized;
}


/**
 * Sanitize Single product components
 */
function knote_sanitize_single_product_components( $input ) {
    $input      = (array) $input;
    $sanitized  = array();
    $elements   = apply_filters(
                    'knote_sanitize_single_product_elements',
                    array(
                            'woocommerce_product_vendor',
                            'woocommerce_template_single_title',
                            'woocommerce_template_single_rating',
                            'woocommerce_template_single_price',
                            'woocommerce_template_single_excerpt',
                            'woocommerce_template_single_add_to_cart',
                            'knote_woocommerce_divider_output',
                            'woocommerce_template_single_meta'
                        )
                    );

    foreach ( $input as $sub_value ) {
        if ( in_array( $sub_value, $elements, true ) ) {
            $sanitized[] = $sub_value;
        }
    }
    return $sanitized;
}

