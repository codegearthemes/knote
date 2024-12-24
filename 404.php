<?php

/**
 * The template for displaying 404 page (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @author      CodegearThemes
 * @category    WordPress
 * @package     Knote
 * @version     0.1.0
 *
 */

get_header();
?>
<div class="content-result-none content-inner">
	<div class="<?php echo esc_attr(apply_filters('knote_container_class', 'container')); ?>">
		<div class="grid">
			<div id="primary" class="grid__item one-whole content-area">
				<main id="main" class="site-main">
					<div class="error-404 not-found">
						<div class="page-content">
							<div class="page-large-text">
								<h2 class="page-heading-large heading-large"><?php esc_html_e('404', 'knote'); ?></h2>
							</div>
							<div class="page-content">
								<p class="content"><?php esc_html_e('Sorry! Page not Found', 'knote'); ?></p>
								<a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary"><?php esc_html_e('Return to Home', 'knote'); ?></a>
							</div><!-- .page-content -->
						</div>
						<?php get_search_form(); ?>
					</div><!-- .error-404 -->
				</main><!-- #main -->
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
