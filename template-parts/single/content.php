<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Knote
 */

// Heading
$knote_heading_alignment 	= get_theme_mod('knote_single_title_alignment', 'left');
$knote_heading_margin 	= get_theme_mod('knote_single_title_spacing', 30);

// Image
$knote_image_enable 	= get_theme_mod('knote_single_image_enable', 1);
$knote_image_position = get_theme_mod('knote_single_image_position', 'before');
$knote_image_margin 	= get_theme_mod('knote_single_image_spacing', 30);

// Meta
$knote_meta_position  = get_theme_mod('knote_single_meta_position', 'before');

// Extras
$knote_author_enable 	= get_theme_mod('knote_single_author_enable', 1);
$knote_related_posts 	= get_theme_mod('knote_single_related_post_enable', 0);
$knote_single_class 	= 'has-no-thumbnails';

if (has_post_thumbnail()) {
	$knote_single_class = 'has-thumbnails';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-content'); ?>>
	<?php
	if ($knote_image_enable && $knote_image_position == 'before') :
		knote_post_thumbnail();
	endif;
	?>
	<header class="entry-header <?php echo esc_attr($knote_single_class); ?>">
		<?php
		if ('post' === get_post_type() && $knote_meta_position === 'before') :
			knote_single_postmeta('above-title');
		endif;

		if (is_singular()) :
			the_title('<h1 class="entry-title text-' . esc_attr($knote_heading_alignment) . '">', '</h1>');
		else :
			the_title('<h2 class="entry-title text-' . esc_attr($knote_heading_alignment) . '"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

		if ('post' === get_post_type() && $knote_meta_position === 'after') :
			knote_single_postmeta('below-title');
		endif;
		?>
	</header><!-- .entry-header -->
	<?php
	if ($knote_image_enable && $knote_image_position === 'after') :
		knote_post_thumbnail();
	endif;
	?>
	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'knote'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'knote'),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php do_action('knote_entry_footer_before'); ?>
	<footer class="entry-footer">
		<?php knote_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php do_action('knote_entry_footer_after'); ?>

</article><!-- #post-<?php the_ID(); ?> -->

<?php

if ($knote_author_enable) {
	get_template_part('template-parts/snippets/content', 'author');
}

if ($knote_related_posts) {
	get_template_part('template-parts/snippets/content', 'related');
}
?>
