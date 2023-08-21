<?php

/**
 * Template part for related post
 *
 * @package knote
 */

$knote_related_posts_args = array(
    'no_found_rows'       => true,
    'ignore_sticky_posts' => true,
    'posts_per_page'    => 2
);

$knote_current_object = get_queried_object();

if ($knote_current_object instanceof WP_Post) {
    $knote_current_id = $knote_current_object->ID;
    if (absint($knote_current_id) > 0) {
        // Exclude current post.
        $knote_related_posts_args['post__not_in'] = array(absint($knote_current_id));
        // Include current posts categories.
        $knote_categories = wp_get_post_categories($knote_current_id);
        if (!empty($knote_categories)) {
            $knote_related_posts_args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'term_id',
                    'terms'    => $knote_categories,
                    'operator' => 'IN',
                )
            );
        }
    }
}

$knote_related_posts_query = new WP_Query($knote_related_posts_args);
if ($knote_related_posts_query->have_posts()) : ?>
    <div class="block-related-posts">
        <div class="content-related-inner">
            <div class="section-title">
                <h3><?php echo esc_html__('Related Posts', 'knote'); ?></h3>
            </div><!-- Section Title  -->
            <div class="related--single-entry">
                <div class="grid">
                    <?php
                    while ($knote_related_posts_query->have_posts()) :

                        $knote_related_posts_query->the_post();
                    ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('article post-card grid__item large--one-half medium--one-half small--one-whole'); ?>>
                            <div class="content">
                                <?php knote_post_thumbnail(); ?>
                                <div class="entry-header">
                                    <?php
                                    if ('post' === get_post_type()) :
                                        $knote_meta_class = '';
                                        if (!has_post_thumbnail()) {
                                            $knote_meta_class = 'no-thumbnail-meta';
                                        }
                                    ?>
                                        <div class="entry-meta <?php echo esc_attr($knote_meta_class, 'knote') ?>">
                                            <?php knote_posted_on(); ?>
                                        </div><!-- .entry-meta -->
                                    <?php endif; ?>
                                    <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
                                </div>
                                <div class="entry-content">
                                    <?php the_excerpt(); ?>
                                </div><!-- .entry-content -->
                            </div>
                        </article>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
endif;
