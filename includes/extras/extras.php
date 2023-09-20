<?php
/**
 * Enqueue admin scripts and styles.
 *
 * @author      CodeGearThemes
 * @category    WordPress
 * @package     Knote
 * @version     0.1.0
 *
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function knote_public_scripts(){

	$defaults = json_encode(
		array(
			'font' 			=> 'System default',
			'regularweight' => '400',
			'category' 		=> 'sans-serif'
		)
	);


    $knote_site_width 					= get_theme_mod( 'knote_container_width', '1260').'px';

	$knote_primary_color				= get_theme_mod( 'knote_website_primary_color', '#121212' );
	$knote_secondary_color				= get_theme_mod( 'knote_website_secondary_color', '#D0F224' );
	$knote_accent_color					= get_theme_mod( 'knote_website_accent_color', '#000000' );

	$knote_link_color					= get_theme_mod( 'knote_link_color', '#000000' );
	$knote_link_color_hover				= get_theme_mod( 'knote_link_color_hover', '#121212' );

	$knote_base_color					= get_theme_mod( 'knote_website_text_color', '#757575' );
	$knote_base_background				= get_theme_mod( 'background_color', '#ffffff' );
	$knote_heading_color				= get_theme_mod( 'knote_website_heading_color', '#121212' );


	$font_body 						= json_decode( get_theme_mod( 'knote_base_font', $defaults ), true );
	if ( 'System default' === $font_body['font'] ) {
		$knote_base_fonts			= '-apple-system, BlinkMacSystemFont, Roboto, Oxygen-Sans, Ubuntu, Cantarell, sans-serif';
	}else{
		$knote_base_fonts			= $font_body['font'];
	}

	$knote_desktop_logo_size 	= get_theme_mod( 'knote_logo_size_desktop', '250'). 'px';
	$knote_tablet_logo_size 	= get_theme_mod( 'knote_logo_size_tablet' , '175'). 'px';
	$knote_mobile_logo_size 	= get_theme_mod( 'knote_logo_size_mobile' , '125'). 'px';


	$knote_base_font_size			= get_theme_mod('knote_base_font_size_desktop', '16' ).'px';
	$knote_base_tablet_font_size	= get_theme_mod('knote_base_font_size_tablet', '14' ).'px';
	$knote_base_mobile_font_size	= get_theme_mod('knote_base_font_size_mobile', '14' ).'px';

	$knote_base_font_weight = 'normal';
	if( isset( $font_body['regularweight'] ) ){
		$knote_base_font_weight		= $font_body['regularweight'];
	}

	$knote_base_font_style		= get_theme_mod('knote_base_font_style', 'normal');
	$knote_base_line_height 		= get_theme_mod( 'knote_base_line_height', '1.4' );
	$knote_base_letter_spacing 	= get_theme_mod( 'knote_base_letter_spacing', '0' );
	$knote_base_text_transform 	= get_theme_mod( 'sknote_base_text_transform', 'none' );


	$font_heading = json_decode( get_theme_mod( 'knote_heading_font', $defaults ), true  );
	if ( 'System default' === $font_heading['font'] ) {
		$knote_heading_fonts			= '-apple-system, BlinkMacSystemFont, Roboto, Oxygen-Sans, Ubuntu, Cantarell, sans-serif';
	}else{
		$knote_heading_fonts			= $font_heading['font'];
	}

	$knote_heading_font_weight = 'bold';
	if( isset( $font_heading['regularweight'] ) ){
		$knote_heading_font_weight		= $font_heading['regularweight'];
	}

	$knote_heading_font_style			= get_theme_mod( 'knote_heading_font_style', 'normal');
	$knote_heading_line_height 		= get_theme_mod( 'knote_heading_line_height', '1.4' );
	$knote_heading_letter_spacing 	= get_theme_mod( 'knote_heading_letter_spacing', '0' );
	$knote_heading_text_transform 	= get_theme_mod( 'knote_heading_text_transform', 'none' );

	$knote_heading_fontsizeh1 		= get_theme_mod( 'knote_heading_h1_font_size_desktop' , '40' );
	$knote_heading_fontsizeh2			= get_theme_mod( 'knote_heading_h2_font_size_desktop' , '32' );
	$knote_heading_fontsizeh3			= get_theme_mod( 'knote_heading_h3_font_size_desktop' , '28' );
	$knote_heading_fontsizeh4			= get_theme_mod( 'knote_heading_h4_font_size_desktop' , '24' );
	$knote_heading_fontsizeh5			= get_theme_mod( 'knote_heading_h5_font_size_desktop' , '20' );
	$knote_heading_fontsizeh6			= get_theme_mod( 'knote_heading_h6_font_size_desktop' , '16' );

	$knote_heading_tablet_fontsizeh1 	= get_theme_mod( 'knote_heading_h1_font_size_tablet' , '36' );
	$knote_heading_tablet_fontsizeh2		= get_theme_mod( 'knote_heading_h2_font_size_tablet' , '28' );
	$knote_heading_tablet_fontsizeh3		= get_theme_mod( 'knote_heading_h3_font_size_tablet' , '24' );
	$knote_heading_tablet_fontsizeh4		= get_theme_mod( 'knote_heading_h4_font_size_tablet' , '20' );
	$knote_heading_tablet_fontsizeh5		= get_theme_mod( 'knote_heading_h5_font_size_tablet' , '16' );
	$knote_heading_tablet_fontsizeh6		= get_theme_mod( 'knote_heading_h6_font_size_tablet' , '16' );

	$knote_heading_mobile_fontsizeh1 	= get_theme_mod( 'knote_heading_h1_font_size_mobile' , '28' );
	$knote_heading_mobile_fontsizeh2		= get_theme_mod( 'knote_heading_h2_font_size_mobile' , '22' );
	$knote_heading_mobile_fontsizeh3		= get_theme_mod( 'knote_heading_h3_font_size_mobile' , '18' );
	$knote_heading_mobile_fontsizeh4		= get_theme_mod( 'knote_heading_h4_font_size_mobile' , '16' );
	$knote_heading_mobile_fontsizeh5		= get_theme_mod( 'knote_heading_h5_font_size_mobile' , '16' );
	$knote_heading_mobile_fontsizeh6		= get_theme_mod( 'knote_heading_h6_font_size_mobile' , '16' );

	$knote_border_color 					= get_theme_mod( 'knote_border_color', '#e6e6e6' );
	$knote_form_color						= get_theme_mod( 'knote_form_field_color', '#212121');
	$knote_form_field_background			= get_theme_mod( 'knote_form_field_background', '#ffffff' );

	$knote_button_color					= get_theme_mod( 'knote_button_color', '#ffffff' );
	$knote_button_color_hover				= get_theme_mod( 'knote_button_color_hover', '#ffffff' );
	$knote_button_background				= get_theme_mod( 'knote_button_background_color', '#000000' );
	$knote_button_background_hover		= get_theme_mod( 'knote_button_background_color_hover', '#121212' );
	$knote_button_border_color			= get_theme_mod( 'knote_button_border_color', '#000000' );
	$knote_button_border_color_hover		= get_theme_mod( 'knote_button_border_color_hover', '#121212' );

	$knote_button_desktop_font_size		= get_theme_mod( 'knote_button_font_size_desktop', 14 ).'px';
	$knote_button_tablet_font_size		= get_theme_mod( 'knote_button_font_size_tablet', 14 ).'px';
	$knote_button_mobile_font_size		= get_theme_mod( 'knote_button_font_size_mobile', 14 ).'px';

	$knote_button_text_transform			= get_theme_mod( 'knote_button_text_transform', 'none' );
	$knote_button_letter_spacing			= get_theme_mod( 'knote_button_letter_spacing', 0 );

	$knote_button_desktop_top_bottom_padding	= get_theme_mod( 'knote_button_top_bottom_padding_desktop', 16 ).'px';
	$knote_button_tablet_top_bottom_padding	= get_theme_mod( 'knote_button_top_bottom_padding_desktop', 16 ).'px';
	$knote_button_mobile_top_bottom_padding	= get_theme_mod( 'knote_button_top_bottom_padding_desktop', 16 ).'px';
	$knote_button_border_radius				= get_theme_mod( 'knote_button_border_radius', 4 ).'px';

	$knote_button_hamburger_color 		=	get_theme_mod( 'knote_hamburger_button_color', '#000000' );
	$knote_button_hamburger_background 	=	get_theme_mod( 'knote_hamburger_button_background', '#FFFFFF' );

	$font_menu = json_decode( get_theme_mod( 'knote_menu_font', $defaults ), true  );
	if ( 'System default' === $font_menu['font'] ) {
		$knote_menu_fonts			= '-apple-system, BlinkMacSystemFont, Roboto, Oxygen-Sans, Ubuntu, Cantarell, sans-serif';
	}else{
		$knote_menu_fonts			= $font_menu['font'];
	}

	$knote_menu_font_weight = 'normal';
	if( isset( $font_menu['regularweight'] ) ){
		$knote_menu_font_weight		= $font_menu['regularweight'];
	}

	$knote_menu_font_size					= get_theme_mod( 'knote_menu_font_size_desktop', 16 ).'px';
	$knote_menu_font_size_tablet			= get_theme_mod( 'knote_menu_font_size_tablet', 16 ).'px';
	$knote_menu_font_size_mobile			= get_theme_mod( 'knote_menu_font_size_mobile', 16 ).'px';
	$knote_menu_text_transform			= get_theme_mod( 'knote_menu_text_transform', 'uppercase' );
	$knote_menu_line_height 				= get_theme_mod( 'knote_menu_line_height', 1.6 );

	$knote_header_background 				= get_theme_mod('knote_header_builder_background', '#FFFFFF');
	$knote_header_padding = Knote_Styles::dimensions_variables('knote_header_builder_padding', 'padding', 'header');


	$knote_header_row_above_height_desktop = get_theme_mod( 'knote_builder_header_row_above_height_desktop', 80).'px';
    $knote_header_row_above_height_tablet = get_theme_mod( 'knote_builder_header_row_above_height_desktop', 80).'px';
	$knote_header_row_above_height_mobile = get_theme_mod( 'knote_builder_header_row_above_height_desktop', 80).'px';

	$knote_header_row_main_height_desktop = get_theme_mod( 'knote_builder_header_row_main_height_desktop', 80).'px';
    $knote_header_row_main_height_tablet = get_theme_mod( 'knote_builder_header_row_main_height_desktop', 80).'px';
	$knote_header_row_main_height_mobile = get_theme_mod( 'knote_builder_header_row_main_height_desktop', 80).'px';

	$knote_header_row_below_height_desktop = get_theme_mod( 'knote_builder_header_row_below_height_desktop', 80).'px';
    $knote_header_row_below_height_tablet = get_theme_mod( 'knote_builder_header_row_below_height_desktop', 80).'px';
	$knote_header_row_below_height_mobile = get_theme_mod( 'knote_builder_header_row_below_height_desktop', 80).'px';

	$knote_header_row_above_border_width = get_theme_mod( 'knote_builder_header_row_above_border_bottom', 0).'px';
	$knote_header_row_main_border_width = get_theme_mod( 'knote_builder_header_row_main_border_bottom', 0).'px';
	$knote_header_row_below_border_width = get_theme_mod( 'knote_builder_header_row_below_border_bottom', 0).'px';

	$knote_header_row_above_border_color = get_theme_mod( 'knote_builder_header_row_above_border_bottom_color', '#EAEAEA');
	$knote_header_row_main_border_color = get_theme_mod( 'knote_builder_header_row_main_border_bottom_color', '#EAEAEA');
	$knote_header_row_below_border_color = get_theme_mod( 'knote_builder_header_row_below_border_bottom_color', '#EAEAEA');

	$knote_header_row_above_background 	= get_theme_mod( 'knote_builder_header_row_above_background_color', '#FFFFFF' );
	$knote_header_row_main_background 	= get_theme_mod( 'knote_builder_header_row_main_background_color', '#FFFFFF' );
	$knote_header_row_below_background 	= get_theme_mod( 'knote_builder_header_row_below_background_color', '#FFFFFF' );

	$knote_archive_thumbnail_spacing 		= get_theme_mod( 'knote_archive_image_spacing', 30).'px';

	$knote_footer_background				=  get_theme_mod( 'knote_footer_builder_background', '#f8f8f8' );

	$knote_archive_title_spacing 				= get_theme_mod( 'knote_archive_title_spacing', 8).'px';
	$knote_archive_title_fonts_size 			= get_theme_mod( 'knote_archive_title_size_desktop', 18).'px';
	$knote_archive_title_fonts_size_tablet 	= get_theme_mod( 'knote_archive_title_size_tablet', 16).'px';
	$knote_archive_title_fonts_size_mobile 	= get_theme_mod( 'knote_archive_title_size_mobile', 16).'px';
	$knote_archive_title_color				= get_theme_mod( 'knote_archive_title_color', '#121212' );
	$knote_archive_excerpt_color				= get_theme_mod( 'knote_archive_title_color', '#454545' );

	$knote_archive_meta_spacing 				= get_theme_mod( 'knote_archive_meta_spacing', 8).'px';
	$knote_archive_meta_fonts_size 			= get_theme_mod( 'knote_archive_meta_size', 12).'px';
	$knote_archive_meta_color					= get_theme_mod( 'knote_archive_meta_color', '#494949' );

	$knote_single_title_font_size 		= get_theme_mod( 'knote_single_title_font_size_desktop', 28 ).'px';
	$knote_single_title_font_size_tablet 	= get_theme_mod( 'knote_single_title_font_size_tablet', 26 ).'px';
	$knote_single_title_font_size_mobile	= get_theme_mod( 'knote_single_title_font_size_mobile', 24 ).'px';
	$knote_single_title_spacing 			= get_theme_mod( 'knote_single_title_spacing', 16) .'px';
	$knote_single_title_color 			= get_theme_mod( 'knote_single_title_color', '#121212' );

	$knote_single_image_spacing 			= get_theme_mod( 'knote_single_image_spacing', 16) .'px';

	$knote_single_meta_font_size				= get_theme_mod( 'knote_single_meta_font_size', 14 ).'px';
	$knote_single_meta_font_size_tablet		= get_theme_mod( 'knote_single_meta_font_size', 12 ).'px';
	$knote_single_meta_font_size_mobile		= get_theme_mod( 'knote_single_meta_font_size', 12 ).'px';
	$knote_single_meta_spacing				= get_theme_mod( 'knote_single_meta_spacing', 16 ) .'px';
	$knote_single_meta_color 					= get_theme_mod( 'knote_single_meta_color', '#121212' );

	$knote_content_card_color 				= get_theme_mod( 'knote_content_card_color', '#262626' );
	$knote_content_card_heading_color 		= get_theme_mod( 'knote_content_card_heading_color', '#212121' );
	$knote_content_card_background_color 		= get_theme_mod( 'knote_content_card_background_color', '#FBFBF9' );

	$knote_other_error_color = get_theme_mod( 'knote_error_color', '#C5280C' );
	$knote_other_success_color = get_theme_mod( 'knote_success_color', '#16A679' );

	if ( class_exists( 'WooCommerce' ) ) {

		$knote_product_title_font = $knote_base_fonts;
		if( get_theme_mod( 'knote_single_product_title_font_style', 'heading' )){
			$knote_product_title_font = $knote_heading_fonts;
		}

		$knote_product_title_color 			= get_theme_mod( 'knote_single_product_title_color', '#212121' );
		$knote_product_title_font_size 		= get_theme_mod( 'knote_single_product_title_size_desktop', 32 ).'px';
		$knote_product_title_font_size_tablet = get_theme_mod( 'knote_single_product_title_size_tablet', 24 ).'px';
		$knote_product_title_font_size_mobile = get_theme_mod( 'knote_single_product_title_size_mobile', 18 ).'px';

		$knote_product_price_color 			= get_theme_mod( 'knote_single_product_price_color', '#212121' );
		$knote_product_price_font_size 		= get_theme_mod( 'knote_single_product_price_size_desktop', 24 ).'px';
		$knote_product_price_font_size_tablet = get_theme_mod( 'knote_single_product_price_size_tablet', 20 ).'px';
		$knote_product_price_font_size_mobile = get_theme_mod( 'knote_single_product_price_size_mobile', 18 ).'px';

		$knote_woocommerce_catalog_column_tablet = get_theme_mod( 'knote_woocommerce_catalog_columns_tablet', 3);
		$knote_woocommerce_catalog_column_mobile = get_theme_mod( 'knote_woocommerce_catalog_columns_mobile', 2);

		$knote_woocommerce_sale_spacing   			= get_theme_mod( 'knote_catalog_sale_badge_spacing', 20).'px';
		$knote_woocommerce_sale_border_radius 		= get_theme_mod( 'knote_catalog_sale_badge_radius', 0).'px';
		$knote_woocommerce_sale_badge_color 			= get_theme_mod( 'knote_catalog_sale_badge_color', '#ffffff');
		$knote_woocommerce_sale_badge_background 		= get_theme_mod( 'knote_catalog_sale_badge_background', '#121212');
		$knote_woocommerce_product_card_background 	= get_theme_mod( 'knote_catalog_product_card_background', '#ffffff');

		if( class_exists( 'KnoteToolkit' ) ) {
			$knote_product_gallery_arrow_color 				= get_theme_mod( 'knote_single_product_gallery_arrow_color', '#000000' );
			$knote_product_gallery_arrow_color_hover 		= get_theme_mod( 'knote_single_product_gallery_arrow_color_hover', '#121212' );
			$knote_product_gallery_arrow_background 		= get_theme_mod( 'knote_single_product_gallery_arrow_background', '#ffffff' );
			$knote_product_gallery_arrow_background_hover 	= get_theme_mod( 'knote_single_product_gallery_arrow_background_hover', '#ffffff' );
			$knote_product_gallery_arrow_border_color 		= get_theme_mod( 'knote_single_product_gallery_arrow_border_color', '#ffffff' );
			$knote_product_gallery_arrow_border_color_hover = get_theme_mod( 'knote_single_product_gallery_arrow_border_color_hover', '#ffffff' );
		}
	}

    $knote_custom_styles = "
		:root{
			--theme--site-width: $knote_site_width;

			--theme--primary-color:		". esc_attr ( $knote_primary_color ) .";
			--theme--secondary-color:	". esc_attr( $knote_secondary_color ) .";
			--theme--accent-color:	". esc_attr( $knote_accent_color ) .";

			--theme--link-color:	". esc_attr( $knote_link_color ) .";
			--theme--link-color-hover:	". esc_attr( $knote_link_color_hover ) .";

			--theme--base-color:	". esc_attr ( $knote_base_color ) .";
			--theme--base-background:	". esc_attr ( $knote_base_background ).";
			--theme--heading-color:	". esc_attr ( $knote_heading_color ) .";

			--theme--font-scale: 1;
			--theme--base-font-size:		". absint( $knote_base_font_size ) ."px;
			--theme--base-tablet-font-size: ". absint( $knote_base_tablet_font_size ) ."px;
			--theme--base-mobile-font-size: ". absint( $knote_base_mobile_font_size ) ."px;
			--theme--base-font-family:		". esc_attr ( $knote_base_fonts ) .";
			--theme--base-font-weight:		". esc_attr ( $knote_base_font_weight ) .";
			--theme--base-font-style:		". esc_attr ( $knote_base_font_style ) .";
			--theme--base-line-height:		". esc_attr ( $knote_base_line_height ) .";
			--theme--base-letter-spacing:	". esc_attr ( $knote_base_letter_spacing ) ."px;
			--theme--base-text-transform:	". esc_attr ( $knote_base_text_transform ) .";

			--theme--logo-size-desktop:	". absint( $knote_desktop_logo_size ) ."px;
			--theme--logo-size-tablet:  ". absint( $knote_tablet_logo_size ) ."px;
			--theme--logo-size-mobile:	". absint( $knote_mobile_logo_size ) ."px;

			--theme--heading-size1:	". absint( $knote_heading_fontsizeh1 ) ."px;
			--theme--heading-size2: ". absint( $knote_heading_fontsizeh2 ) ."px;
			--theme--heading-size3: ". absint( $knote_heading_fontsizeh3 ) ."px;
			--theme--heading-size4: ". absint( $knote_heading_fontsizeh4 ) ."px;
			--theme--heading-size5: ". absint( $knote_heading_fontsizeh5 ) ."px;
			--theme--heading-size6: ". absint( $knote_heading_fontsizeh6 ) ."px;

			--theme--heading-tablet-size1: ". absint( $knote_heading_tablet_fontsizeh1 ) ."px;
			--theme--heading-tablet-size2: ". absint( $knote_heading_tablet_fontsizeh2 ) ."px;
			--theme--heading-tablet-size3: ". absint( $knote_heading_tablet_fontsizeh3 ) ."px;
			--theme--heading-tablet-size4: ". absint( $knote_heading_tablet_fontsizeh4 ) ."px;
			--theme--heading-tablet-size5: ". absint( $knote_heading_tablet_fontsizeh5 ) ."px;
			--theme--heading-tablet-size6: ". absint( $knote_heading_tablet_fontsizeh6 ) ."px;

			--theme--heading-mobile-size1: ". absint( $knote_heading_mobile_fontsizeh1 ) ."px;
			--theme--heading-mobile-size2: ". absint( $knote_heading_mobile_fontsizeh2 ) ."px;
			--theme--heading-mobile-size3: ". absint( $knote_heading_mobile_fontsizeh3 ) ."px;
			--theme--heading-mobile-size4: ". absint( $knote_heading_mobile_fontsizeh4 ) ."px;
			--theme--heading-mobile-size5: ". absint( $knote_heading_mobile_fontsizeh5 ) ."px;
			--theme--heading-mobile-size6: ". absint( $knote_heading_mobile_fontsizeh6 ) ."px;

			--theme--heading-font-weight: ". esc_attr ( $knote_heading_font_weight ) .";
			--theme--heading-font-style: ". esc_attr ( $knote_heading_font_style ) .";
			--theme--heading-font-family: ". esc_attr ( $knote_heading_fonts ) .";
			--theme--heading-line-height: ". esc_attr ( $knote_heading_line_height ) .";
			--theme--heading-letter-spacing: ". esc_attr ( $knote_heading_letter_spacing ) ."px;
			--theme--heading-text-transform: ". esc_attr ( $knote_heading_text_transform ) .";

			--theme--border-color: ". esc_attr ( $knote_border_color ) .";
			--theme--form-color: ". esc_attr ( $knote_form_color ) .";
			--theme--form-background-color: ". esc_attr ( $knote_form_field_background ) .";

			--theme--button-color: ". esc_attr ( $knote_button_color ) .";
			--theme--button-color-hover: ". esc_attr ( $knote_button_color_hover ) .";
			--theme--button-background-color: ". esc_attr ( $knote_button_background ) .";
			--theme--button-background-color-hover: ". esc_attr ( $knote_button_background_hover ) .";
			--theme--button-border-color: ". esc_attr ( $knote_button_border_color ) .";
			--theme--button-border-color-hover: ". esc_attr ( $knote_button_border_color_hover ) .";

			--theme--button-desktop-font-size: " . esc_attr ( $knote_button_desktop_font_size ) .";
			--theme--button-tablet-font-size: " . esc_attr ( $knote_button_tablet_font_size ) .";
			--theme--button-mobile-font-size: " . esc_attr ( $knote_button_mobile_font_size ) .";

			--theme--button-text-transform: " . esc_attr ( $knote_button_text_transform ) .";
			--theme--button-letter-spacing: " . esc_attr ( $knote_button_letter_spacing ) ."px;

			--theme--button-desktop-top-bottom-padding: " . esc_attr ( $knote_button_desktop_top_bottom_padding ) .";
			--theme--button-tablet-top-bottom-padding: " . esc_attr ( $knote_button_tablet_top_bottom_padding ) .";
			--theme--button-mobile-top-bottom-padding: " . esc_attr ( $knote_button_mobile_top_bottom_padding ) .";

			--theme--button-border-radius: " . esc_attr ( $knote_button_border_radius ) .";

			--theme--button-hamburger-color: " . esc_attr ( $knote_button_hamburger_color ) .";
			--theme--button-hamburger-background: " . esc_attr ( $knote_button_hamburger_background ) .";

			--theme--menu-font-family: " . esc_attr ( $knote_menu_fonts ) .";
			--theme--menu-font-weight: " . esc_attr ( $knote_menu_font_weight ) .";

			--theme--menu-font-size: ". esc_attr ( $knote_menu_font_size ) .";
			--theme--menu-font-size-tablet: ". esc_attr ( $knote_menu_font_size_tablet ) .";
			--theme--menu-font-size-mobile: ". esc_attr ( $knote_menu_font_size_mobile ) .";
			--theme--menu-text-transform: ". esc_attr ( $knote_menu_text_transform ) .";
			--theme--menu-line-height: ". esc_attr ( $knote_menu_line_height ) .";

			--theme--archive-thumbnail-spacing: " . esc_attr( $knote_archive_thumbnail_spacing ) .";

			--theme--footer-background: ". esc_attr ( $knote_footer_background ) .";

			--theme--archive-title-spacing: " . esc_attr ( $knote_archive_title_spacing).";
			--theme--arcive-title-font-size: ". esc_attr ( $knote_archive_title_fonts_size ).";
			--theme--arcive-title-font-size-tablet: ". esc_attr ( $knote_archive_title_fonts_size_tablet ).";
			--theme--arcive-title-font-size-mobile: ". esc_attr ( $knote_archive_title_fonts_size_mobile ).";
			--theme--arcive-title-color: ". esc_attr ( $knote_archive_title_color ).";
			--theme--arcive-excerpt-color: ". esc_attr ( $knote_archive_excerpt_color ).";
			--theme--archive-meta-spacing: " . esc_attr ( $knote_archive_meta_spacing).";
			--theme--arcive-meta-font-size: ". esc_attr ( $knote_archive_meta_fonts_size ).";
			--theme--arcive-meta-color: ". esc_attr ( $knote_archive_meta_color ).";

			--theme--single-title-font-size: ". esc_attr ( $knote_single_title_font_size ).";
			--theme--single-title-font-size-tablet: ". esc_attr ( $knote_single_title_font_size_tablet ).";
			--theme--single-title-font-size-mobile: ". esc_attr ( $knote_single_title_font_size_mobile ).";
			--theme--single-title-spacing: " . esc_attr ( $knote_single_title_spacing ) .";
			--theme--single-title-color: ". esc_attr ( $knote_single_title_color ) .";

			--theme--single-image-spacing: " . esc_attr ( $knote_single_image_spacing ) .";

			--theme--single-meta-font-size: ". esc_attr ( $knote_single_meta_font_size ).";
			--theme--single-meta-font-size-tablet: ". esc_attr ( $knote_single_meta_font_size_tablet ).";
			--theme--single-meta-font-size-mobile: ". esc_attr ( $knote_single_meta_font_size_mobile ).";
			--theme--single-meta-spacing: ". esc_attr ( $knote_single_meta_spacing ).";
			--theme--single-meta-color: ". esc_attr ( $knote_single_meta_color ) .";

			--theme--content-card-color: ". esc_attr ( $knote_content_card_color ) .";
			--theme--content-card-heading-color: ". esc_attr ( $knote_content_card_heading_color ) .";
			--theme--content-card-background: ". esc_attr ( $knote_content_card_background_color ) .";

			--theme--other-error-color: ". esc_attr ( $knote_other_error_color ) .";
			--theme--other-success-color: ". esc_attr ( $knote_other_success_color ) .";
		}";

	$knote_custom_styles .= "
		:root{
			--theme--header-row-above-border-width: " . esc_attr ( $knote_header_row_above_border_width).";
			--theme--header-row-above-border-color: " . esc_attr ( $knote_header_row_above_border_color).";
			--theme--header-row-main-border-width: " . esc_attr ( $knote_header_row_main_border_width).";
			--theme--header-row-main-border-color: " . esc_attr ( $knote_header_row_main_border_color).";
			--theme--header-row-below-border-width: " . esc_attr ( $knote_header_row_below_border_width).";
			--theme--header-row-below-border-color: " . esc_attr ( $knote_header_row_below_border_color).";
			--theme--header-row-above-height-desktop:".esc_attr( $knote_header_row_above_height_desktop).";
			--theme--header-row-above-height-tablet:".esc_attr( $knote_header_row_above_height_tablet).";
			--theme--header-row-above-height-mobile:".esc_attr( $knote_header_row_above_height_mobile).";
			--theme--header-row-main-height-desktop:".esc_attr( $knote_header_row_main_height_desktop).";
			--theme--header-row-main-height-tablet:".esc_attr( $knote_header_row_main_height_tablet).";
			--theme--header-row-main-height-mobile:".esc_attr( $knote_header_row_main_height_mobile).";
			--theme--header-row-below-height-desktop:".esc_attr( $knote_header_row_below_height_desktop).";
			--theme--header-row-below-height-tablet:".esc_attr( $knote_header_row_below_height_tablet).";
			--theme--header-row-below-height-mobile:".esc_attr( $knote_header_row_below_height_mobile).";
			--theme--header-background: " . esc_attr( $knote_header_background ) .";
			--theme--header-row-above-background: " . esc_attr( $knote_header_row_above_background ) .";
			--theme--header-row-main-background: " . esc_attr( $knote_header_row_main_background ) .";
			--theme--header-row-below-background: " . esc_attr( $knote_header_row_below_background ) .";
			".esc_attr( implode(";",$knote_header_padding)).";
	}";

	if ( class_exists( 'WooCommerce' ) ) {
		$knote_custom_styles .= "
			:root{
				--theme--product-title-font: " . esc_attr( $knote_product_title_font ).";
				--theme--product-title-color: " .esc_attr( $knote_product_title_color ).";
				--theme--product-title-font-size: " .esc_attr( $knote_product_title_font_size ) . ";
				--theme--product-title-font-size-tablet: " .esc_attr( $knote_product_title_font_size_tablet ) . ";
				--theme--product-title-font-size-mobile: " .esc_attr( $knote_product_title_font_size_mobile ) . ";

				--theme--product-price-color: " .esc_attr( $knote_product_price_color ).";
				--theme--product-price-font-size: " .esc_attr( $knote_product_price_font_size ) . ";
				--theme--product-price-font-size-tablet: " .esc_attr( $knote_product_price_font_size_tablet ) . ";
				--theme--product-price-font-size-mobile: " .esc_attr( $knote_product_price_font_size_mobile ) . ";


				--theme--woocommerce-comumns-tablet: " . esc_attr ( $knote_woocommerce_catalog_column_tablet ).";
				--theme--woocommerce-comumns-mobile: " . esc_attr ( $knote_woocommerce_catalog_column_mobile ).";

				--theme--woocommerce-sale-spacing: " . esc_attr ( $knote_woocommerce_sale_spacing ).";
				--theme--woocommerce-sale-border-radius: " . esc_attr ( $knote_woocommerce_sale_border_radius ).";
				--theme--woocommerce-sale-badge-color: " . esc_attr ( $knote_woocommerce_sale_badge_color ).";
				--theme--woocommerce-sale-badge-background: " . esc_attr ( $knote_woocommerce_sale_badge_background ).";
				--theme--woocommerce-product-card-background: " . esc_attr ( $knote_woocommerce_product_card_background ).";
			}";

		if( class_exists( 'KnoteToolkit' ) ) {
			$knote_custom_styles .= "
			:root{
				--theme--product-gallery-arrow-color: " . esc_attr ( $knote_product_gallery_arrow_color ).";
				--theme--product-gallery-arrow-colorhover: " . esc_attr ( $knote_product_gallery_arrow_color_hover ).";
				--theme--product-gallery-arrow-background: " . esc_attr ( $knote_product_gallery_arrow_background ).";
				--theme--product-gallery-arrow-background-hover: " . esc_attr ( $knote_product_gallery_arrow_background_hover ).";
				--theme--product-gallery-arrow-border-color: " . esc_attr ( $knote_product_gallery_arrow_border_color ).";
				--theme--product-gallery-arrow-border-color-hover: " . esc_attr ( $knote_product_gallery_arrow_border_color_hover ).";
			}";
		}else{
			$knote_custom_styles .= "
			:root{
				--theme--product-gallery-arrow-color: " . esc_attr ( $knote_button_color ).";
				--theme--product-gallery-arrow-color-hover: " . esc_attr ( $knote_button_color_hover ).";
				--theme--product-gallery-arrow-background: " . esc_attr ( $knote_button_background ).";
				--theme--product-gallery-arrow-background-hover: " . esc_attr ( $knote_button_background_hover ).";
				--theme--product-gallery-arrow-border-color: " . esc_attr ( $knote_button_border_color ).";
				--theme--product-gallery-arrow-border-color-hover: " . esc_attr ( $knote_button_border_color_hover ).";
			}";
		}
	}

	wp_enqueue_style( 'knote-google-fonts', knote_google_fonts_url(), array(), knote_google_fonts_version() );
    wp_enqueue_style( 'knote-theme-style', KNOTE_THEME_URI . 'assets/public/css/theme.css', array(), KNOTE_VERSION);
	wp_enqueue_style( 'knote-header-style', KNOTE_THEME_URI . 'assets/public/css/header/header.css', array(), KNOTE_VERSION);
    wp_add_inline_style( 'knote-theme-style', $knote_custom_styles );


	wp_enqueue_script( 'knote-theme-script', KNOTE_THEME_URI . 'assets/public/js/theme.js', array(), KNOTE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if( wp_style_is('designer-fold-style') ){
		wp_dequeue_style('designer-fold-style');
	}
}
add_action( 'wp_enqueue_scripts', 'knote_public_scripts' );

/**
 * Scripts low priority
 */
function knote_public_scripts_priority_low(){

	if ( is_singular() ) {
		wp_enqueue_style( 'knote-single-style', KNOTE_THEME_URI . 'assets/public/css/single/single.css', array(), KNOTE_VERSION);
	}

	wp_enqueue_style( 'knote-footer-style', KNOTE_THEME_URI . 'assets/public/css/footer/footer.css', array(), KNOTE_VERSION);
}
add_action('wp_footer', 'knote_public_scripts_priority_low');

/**
 * Google Fonts URL
 */
function knote_google_fonts_url() {
	$fonts_url 	= '';
	$subsets 	= 'latin';

	$defaults = json_encode(
		array(
			'font' 			=> 'System default',
			'regularweight' => '400',
			'category' 		=> 'sans-serif'
		)
	);

	//Get and decode options
	$body_font		= get_theme_mod( 'knote_base_font', $defaults );
	$menu_font		= get_theme_mod( 'knote_menu_font', $defaults );
	$headings_font 	= get_theme_mod( 'knote_heading_font', $defaults );

	$body_font 		= json_decode( $body_font, true );
	$menu_font 		= json_decode( $menu_font, true );
	$headings_font 	= json_decode( $headings_font, true );

	if ( 'System default' === $body_font['font'] && 'System default' === $menu_font['font'] && 'System default' === $headings_font['font'] ) {
		return; //return early if defaults are active
	}

	/**
	 * Font weight loader.
	 *
	 * @since 0.0.1
	 */
	$body_font_weight    = str_replace(
		array( 'regular', 'italic' ),
		array( '400', '' ),
		$body_font['regularweight']
	);

	$menu_font_weight    = str_replace(
		array( 'regular', 'italic' ),
		array( '400', '' ),
		$menu_font['regularweight']
	);

	$heading_font_weight = str_replace(
		array( 'regular', 'italic' ),
		array( '400', '' ),
		$headings_font['regularweight']
	);

	$font_families = array(
		$headings_font['font'] . ':wght@' . $heading_font_weight,
		$menu_font['font'] . ':wght@' . $menu_font_weight,
		$body_font['font'] . ':wght@' . $body_font_weight
	);

	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_families ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	// Load google fonts locally
	$knote_googlefont_load_locally = get_theme_mod('knote_load_google_fonts_locally', 0);
	if( $knote_googlefont_load_locally ) {
		require_once get_theme_file_path( 'vendor/wptt-webfont-loader/wptt-webfont-loader.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

		add_filter( 'wptt_get_local_fonts_base_path', function( $path ) {
			$path = wp_upload_dir();
			return $path['basedir'];
		} );

		add_filter( 'wptt_get_local_fonts_base_url', function( $url ) {
			$path = wp_upload_dir();
			return $path['baseurl'];
		} );

		add_filter( 'wptt_get_local_fonts_subfolder_name', function( $subfolder_name ) {
			return 'knote';
		} );

		return wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
	}

	return esc_url_raw( $fonts_url );
}
