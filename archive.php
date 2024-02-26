<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Knote
 */

get_header();
?>

<?php if ( have_posts() ) : ?>
<header class="header-inner" data-page-header>
	<div class="<?php echo esc_attr( apply_filters( 'knote_container_class', 'container' ) ); ?>">
		<div class="page-header entry-header">
			<?php
				do_action( 'knote_before_title' );
				the_archive_title( '<h1 class="entry-title">', '</h1>' );
				do_action( 'knote_after_title' );
				the_archive_description( '<div class="archive-description">', '</div>' );

			?>
		</div>
	</div>
</header><!-- .page-header -->
<?php endif; ?>

<div class="content-inner archive-blocks">
	<div class="<?php echo esc_attr( apply_filters( 'knote_container_class', 'container' ) ); ?>">
		<div class="grid">
			<div id="primary" class="grid__item <?php echo esc_attr( apply_filters( 'knote_content_class', 'one-whole' ) ); ?> content-area">
				<main id="main" class="site-main <?php echo esc_attr( apply_filters( 'knote_blog_layout_class', 'default' ) ); ?>">
					<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', get_post_type() );

							endwhile;

							knote_post_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
					?>
				</main><!-- #main -->
			</div>
			<?php do_action( 'knote_sidebar' ); ?>
		</div>
	</div>
</div>
<?php
get_footer();
