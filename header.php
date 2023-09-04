<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Knote
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Mobile Specific Metas -->
    <meta name="HandheldFriendly" content="True">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php do_action( 'knote_before_site' ); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'knote' ); ?></a>
    <div class="container-wrapper" data-container-main>
		<?php

			// Header
			do_action('knote_header_before');
			do_action('knote_header');
			do_action('knote_header_after');

			// Main Content
			do_action( 'knote_main_wrapper_before' );
			do_action( 'knote_main_wrapper_start' );

			// Page Header
			do_action( 'knote_page_header_before' );
			do_action( 'knote_page_header' );
			do_action( 'knote_page_header_after' );

