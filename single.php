<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Knote
 */

get_header();

?>

<div class="content-inner single-article">
	<div class="<?php echo esc_attr( apply_filters( 'knote_container_class', 'container' ) ); ?>">
		<div class="grid">
			<div id="primary" class="grid__item <?php echo esc_attr( apply_filters( 'knote_content_class', 'one-whole' ) ); ?> content-area">
				<main id="main" class="site-main">
					<?php
						while ( have_posts() ) :
							the_post();

							do_action( 'knote_single_content_before' );
							get_template_part( 'template-parts/single/content', get_post_type() );
							do_action( 'knote_single_content_after' );

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
