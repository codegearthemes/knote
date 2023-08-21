<?php

/**
 * Template part for displaying Author detail
 *
 * @package knote
 */

?>
<div class="section-author-box">
    <div class="author-image">
        <div class="author-thumb">
            <?php echo get_avatar(get_the_author_meta('ID'), 220); ?>
        </div>
    </div>
    <div class="author-details">
        <div class="author-name">
            <h5><?php echo esc_html(get_the_author()); ?></h5>
        </div>
        <?php
        $knote_author_description = get_the_author_meta('description');
        if (!empty($knote_author_description)) : ?>
            <div class="author-desc">
                <p><?php echo esc_html($knote_author_description); ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>
