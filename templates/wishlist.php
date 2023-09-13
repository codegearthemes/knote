<?php
/**
 * Template Name: Wishlist
 *
 * @author      CodeGearThemes
 * @category    WordPress
 * @package     Knote
 * @version     0.1.9
 *
 *
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

							get_template_part( 'template-parts/wishlist/content', 'wishlist' );

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

