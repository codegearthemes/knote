<?php

/**
 * Customizer callbacks
 *
 * @package Knote
 */

/**
 * Archive Grid
 */
function knote_archives_layout(){
	$archive = get_theme_mod('knote_archive_layout', 'default');

	if ( $archive == 'grid' ) {
		return true;
	}

	return false;
}

/**
 * Sticky header
 */
function knote_header_transparent_enabled(){
	$enable = get_theme_mod('knote_header_builder_transparent_enable', 0);

	if ($enable) {
		return true;
	}

	return false;
}


/**
 * Transparent header
 */
function knote_sticky_header_enabled(){
	$enable = get_theme_mod('knote_header_builder_sticky_enable', 0);

	if ($enable) {
		return true;
	}

	return false;
}

/**
 * Scroll to top
 */
function knote_scrolltop_enabled() {
	$enable = get_theme_mod('knote_scrolltop_enable', 1 );

	if ($enable) {
		return true;
	}

	return false;
}

function knote_scrolltop_icontype(){

	$icontype = get_theme_mod( 'knote_scrolltop_type', 'icon' );
	if( $icontype === 'text' ){
		return true;
	}

	return false;
}

function knote_single_layout(){
	$layout = get_theme_mod( 'knote_single_layout', 'centered' );
	if ( $layout != 'centered' ) {
		return true;
	}

	return false;
}


function knote_single_sidebar_enable(){
	$enable = get_theme_mod('knote_single_sidebar_enable', 0);
	$layout = get_theme_mod( 'knote_single_layout', 'centered' );
	if ( $enable && $layout != 'centered' ) {
		return true;
	}

	return false;
}

function knote_archive_sidebar_enable(){
	$enable = get_theme_mod('knote_archive_layout_sidebar_enable', 0);
	if ($enable) {
		return true;
	}

	return false;
}

function knote_archive_feature_image_enable(){
	$enable = get_theme_mod('knote_archive_image_enable', 1);
	if ($enable) {
		return true;
	}

	return false;
}

function knote_archive_excerpt_enable(){
	$enable = get_theme_mod('knote_archive_excerpt_enable', 1);
	if ($enable) {
		return true;
	}

	return false;
}

function knote_single_image_enable(){
	$enable = get_theme_mod('knote_single_image_enable', 1);
	if ($enable) {
		return true;
	}

	return false;
}
