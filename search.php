<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
						if ( have_posts() ) : ?>

							<header class="header-search">
								<h1 class="title">
									<?php
										/* translators: %s: search query. */
										printf( esc_html__( 'Search Results for: %s', 'knote' ), '<span>' . get_search_query() . '</span>' );
									?>
								</h1>
							</header><!-- .page-header -->

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

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
