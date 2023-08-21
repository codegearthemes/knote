<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Knote
 */

get_header();
?>

<div class="content-inner">
	<div class="<?php echo esc_attr( apply_filters( 'knote_container_class', 'container' ) ); ?>">
		<div class="grid">
			<div id="primary" class="grid__item <?php echo esc_attr( apply_filters( 'knote_content_class', 'one-whole' ) ); ?> content-area">
				<main id="main" class="site-main">
					<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
					?>
				</main><!-- #main -->
			</div>
			<?php do_action( 'knote_sidebar' ); ?>
		</div>
	</div>
</div>
<?php
get_footer();
