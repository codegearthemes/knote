<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Knote
 */
?>

<article id="post-<?php the_ID(); ?>" class="grid__item article <?php echo esc_attr( apply_filters( 'knote_article_layout_class', 'post-card' ) ); ?>">
	<div class="content">
		<?php do_action( 'knote_loop_post' ); ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
