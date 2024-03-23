<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Knote
 */
?>

	<?php

		// Main Content
		do_action( 'knote_main_wrapper_end' );
		do_action( 'knote_main_wrapper_after' );

		// Footer
		do_action('knote_footer_before');
		do_action('knote_footer');
		do_action('knote_footer_after');
	?>
	</div>
</div><!-- #page -->

<?php do_action( 'knote_after_site' ); ?>
<?php wp_footer(); ?>

</body>
</html>
