<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Knote
 */

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="grid__item <?php echo esc_attr( apply_filters( 'knote_secondary_class', 'large--one-third medium--one-quarter small--one-whole' ) ); ?> sidebar sidebar-widget widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar' ); ?>
</aside><!-- #secondary -->
