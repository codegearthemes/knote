<?php
/**
*
* Excerpt Length
* @since 0.1.0
*
*/
if ( ! function_exists( 'knote_excerpt_length' ) ) :
	function knote_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		$knote_length = get_theme_mod( 'knote_archive_excerpt_length', 30 );
	    return $knote_length;
	}
	add_filter( 'excerpt_length', 'knote_excerpt_length', 100 );
endif;

if ( ! function_exists( 'knote_excerpts_auto' ) ) :
	/**
	 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a option from customizer
	 *
	 * @return string option from customizer prepended with an ellipsis.
	 */
	function knote_excerpts_auto( $link ) {
		if ( is_admin() ) {
			return $link;
		}

		$knote_read_more 	= get_theme_mod( 'knote_archive_readmore_enable', 1 );

		if( $knote_read_more ){
			return sprintf( '<a class="button read-more more-link" aria-label="%3$s" href="%1$s">%2$s<span class="screen-reader-text">%3$s</span></a>',
				get_permalink( get_the_ID() ),
				__( 'Read More', 'knote' ),
				get_the_title()
			);
		}
	}
endif;
add_filter( 'excerpt_more', 'knote_excerpts_auto' );

if ( ! function_exists( 'knote_breadcrumb' ) ) :
    function knote_breadcrumb() {
		Knote\Breadcrumbs::get_instance()->get_breadcrumbs();
    }
endif;

if ( ! function_exists( 'knote_excerpt_more' ) ) :
	/**
	 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a option from customizer
	 *
	 * @return string option from customizer prepended with an ellipsis.
	 */
	function knote_excerpt_more( $excerpt ) {
		$knote_read_more 	= get_theme_mod( 'knote_archive_readmore_enable', 1 );
		if ( has_excerpt() && ! is_attachment() && $knote_read_more ) {
		    $link = sprintf( '<a class="button read-more more-link" aria-label="%3$s" href="%1$s">%2$s<span class="screen-reader-text">%3$s</span></a>',
		        get_permalink( get_the_ID() ),
		        __( 'Read More', 'knote' ),
				get_the_title()
		    );
			$excerpt .= $link;
		}
		return $excerpt;
	}
endif;
add_filter( 'get_the_excerpt', 'knote_excerpt_more' );

/**
 * Check if google fonts is being either locally load or not and insert
 * the needed stylesheet version. That's needed because the new google API (css2)
 * isn't compatible with wp_enqueue_style().
 *
 * Reference: https://core.trac.wordpress.org/ticket/49742#comment:7
 */
function knote_google_fonts_version() {
	$knote_googlefont_load_locally = get_theme_mod('knote_load_google_fonts_locally', 0);
	if( $knote_googlefont_load_locally ) {
		return KNOTE_VERSION;
	}

	return NULL;
}

/**
 * Google fonts preconnect
 */
function knote_preconnect_google_fonts() {

	$defaults = json_encode(
		array(
			'font' 			=> 'System default',
			'regularweight' => 'regular',
			'category' 		=> 'sans-serif'
		)
	);

	$knote_body_fonts		= get_theme_mod( 'knote_base_font', $defaults );
	$knote_heading_fonts 	= get_theme_mod( 'knote_heading_font', $defaults );
	$knote_navigation_fonts = get_theme_mod( 'knote_menu_font', $defaults );

	$knote_body_fonts 		= json_decode( $knote_body_fonts, true );
	$knote_heading_fonts 	= json_decode( $knote_heading_fonts, true );

	$knote_googlefont_load_locally = get_theme_mod('knote_load_google_fonts_locally', 0);
	if( $knote_googlefont_load_locally ) return;

	if ( 'System default' === $knote_body_fonts['font'] && 'System default' === $knote_heading_fonts['font'] && 'System default' === $knote_navigation_fonts) {
		return;
	}

	echo '<link rel="preconnect" href="//fonts.googleapis.com">';
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}
add_action( 'wp_head', 'knote_preconnect_google_fonts', 1);


function knote_copyright_cb(){

	/* translators: %1$1s, %2$2s theme copyright tags*/
	$credits 	= get_theme_mod( 'knote_footer_credits', sprintf( __( '%1$1s. <small class="credit">Proudly powered by %2$2s</small>', 'knote' ), '{copyright} {year} {site_title}', '{theme_author}' ) );

	$tags 		= array( '{theme_author}', '{site_title}', '{copyright}', '{year}' );
	$replace 	= array( '<a rel="nofollow" target="_blank" href="https://codegearthemes.com/products/knote/">' . esc_html__( 'Knote', 'knote' ) . '</a>', get_bloginfo( 'name' ), '&copy;', date('Y') );

	$credits 	= str_replace( $tags, $replace, $credits );

	echo wp_kses_post( $credits );
}
add_action( 'knote_footer_copyright', 'knote_copyright_cb' );

function knote_has_social_links(){

	$knote_facebook_link 		= get_theme_mod('knote_facebook_url', '');
	$knote_twitter_link 		= get_theme_mod('knote_twitter_url', '');
	$knote_linkedin_link 		= get_theme_mod('knote_linkedin_url', '');
	$knote_instagram_link 		= get_theme_mod('knote_instagram_url', '');
	$knote_pinterest_link 		= get_theme_mod('knote_pinterest_url', '');
	$knote_youtube_link 			= get_theme_mod('knote_youtube_url', '');
	if(	empty($knote_facebook_link) && empty($knote_twitter_link) && empty($knote_linkedin_link) && empty($knote_instagram_link) && empty($knote_pinterest_link) && empty($knote_youtube_link) ){
		return false;
	}

	return true;
}

function knote_post_navigation(){

	global $wp_query;

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) ) {
		return;
	}

	if ( ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) ) {
		// Support infinite scroll plugins.
		the_posts_navigation();
	} else {
		knote_pagination();
	}

}

/**
 * Get SVG code. From TwentTwenty
 */
function knote_get_svg_icon( $icon, $echo = false, $wrap= true ) {
	$svg_code = wp_kses(
		Knote_SVG_Icons::get_svg_icon( $icon ),
		array(
			'svg'     => array(
				'class'       => true,
				'xmlns'       => true,
				'width'       => true,
				'height'      => true,
				'viewbox'     => true,
				'aria-hidden' => true,
				'role'        => true,
				'focusable'   => true,
				'fill'		  => true,
				'stroke'		=> true,
				'stroke-width'  => true,
				'stroke-linecap' => true,
				'stroke-linejoin' => true,
			),
			'line'	=> array(
				'x1' => true,
				'x2' => true,
				'y1' => true,
				'y2' => true,
			),
			'circle' => array(
				'cx' => true,
				'cy' => true,
				'r' => true,
			),
			'path'    => array(
				'fill'      => true,
				'fill-rule' => true,
				'd'         => true,
				'transform' => true,
			),
			'polygon' => array(
				'fill'      => true,
				'fill-rule' => true,
				'points'    => true,
				'transform' => true,
				'focusable' => true,
			),
			'polyline' => array(
				'points' => true,
			),
			'rect'    => array(
				'x'      => true,
				'y'      => true,
				'width'  => true,
				'height' => true,
				'transform' => true
			),
		)
	);

	if ( $echo ) {
		if( $wrap ){
			echo '<span class="icon">' . $svg_code . '</span>'; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}else{
			echo $svg_code; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	} else {
		return '<span class="icon">' . $svg_code . '</span>';
	}
}


/*
 * Add numeric pagination to blog listing pages
 */
function knote_pagination() {

	if( is_singular() )
		return;

	global $wp_query;

	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	if ( $paged >= 1 )
		$links[] = $paged;

	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	} ?>

	<nav class="navigation posts-navigation" role="navigation">
		<div class="pagination-inner">
			<ul class="block--pagination-nav">
				<?php
					if ( get_previous_posts_link() )
						printf( '<li class="prev-post-link">%s</li>', get_previous_posts_link() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

					if ( ! in_array( 1, $links ) ) {
						$class = 1 == $paged ? ' class=active' : '';

						printf( '<li%s><a href="%s">%s</a></li>', esc_attr($class), esc_url( get_pagenum_link( 1 ) ), '1' );

						if ( ! in_array( 2, $links ) )
							echo wp_kses_post('<li>...</li>');
					}

					sort( $links );
					foreach ( (array) $links as $link ) {
						$class = $paged == $link ? ' class=active' : '';
						printf( '<li%s><a href="%s">%s</a></li>', esc_attr($class), esc_url( get_pagenum_link( $link ) ), absint($link) );
					}

					if ( ! in_array( $max, $links ) ) {
						if ( ! in_array( $max - 1, $links ) )
						echo wp_kses_post('<li>...</li>');

						$class = $paged == $max ? ' class=active' : '';
						printf( '<li%s><a href="%s">%s</a></li>', esc_attr($class), esc_url( get_pagenum_link( $max ) ), absint( $max ) );
					}

					if ( get_next_posts_link() )
						printf( '<li class="next-post-link">%s</li>', get_next_posts_link() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</ul>
		</div>
	</nav>
<?php
}


function knote_posts_nav(){
    $next_post = get_next_post();
    $prev_post = get_previous_post();

    if ( $next_post || $prev_post ) : ?>

        <div class="block-posts-nextprev">
            <div class="block-post-prev">
                <?php if ( ! empty( $prev_post ) ) : ?>
                    <a href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>" title="<?php the_title_attribute( $prev_post ); ?>">
                        <div class="prev-inner">
							<div class="arrow">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"/></svg>
							</div>
							<div class="text">
								<span class="prev-text"><?php esc_html_e( 'Previous article', 'knote' ) ?></span>
								<h4 class="title h6"><?php echo wp_kses_post( get_the_title( $prev_post ) ); ?></h4>
							</div>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
            <div class="block-post-next">
                <?php if ( ! empty( $next_post ) ) : ?>
                    <a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>" title="<?php the_title_attribute( $next_post ); ?>">
                        <div class="next-inner">
							<div class="text">
								<span class="next-text"><?php esc_html_e( 'Next article', 'knote' ) ?></span>
                            	<h4 class="title h6"><?php echo wp_kses_post( get_the_title( $next_post ) ); ?></h4>
							</div>
                            <div class="arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"/></svg>
							</div>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </div> <!-- .wpb-posts-nav -->

    <?php endif;
}

add_action( 'knote_single_content_after', 'knote_posts_nav' );

/**
 * Add arrows to menu items
 *
 * @param string $item_output, HTML output for the menu item
 * @param object $item, menu item object
 * @param int $depth, depth in menu structure
 * @param object $args, arguments passed to wp_nav_menu()
 * @return string $item_output
 */
function knote_menus_arrows( $item_output, $item, $depth, $args ) {

	if( in_array( 'menu-item-has-children', $item->classes ) ) {

		$arrow 	= '<button class="sub-menu-toggle" tabindex="0" aria-label="'.__('Expand dropdown menu', 'knote').'" data-submenu-toggle><span class="screen-reader-text">'.__('Expand dropdown menu', 'knote').'</span><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="square" class="icon icon-chevron-down"><polyline points="6 9 12 15 18 9"/></svg></button>';
		$item_output = str_replace( '</a>', $arrow.'</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'knote_menus_arrows', 10, 4 );


function knote_header_transparent(){

	if( !is_singular('post') ){
		if( get_theme_mod( 'knote_header_builder_transparent_enable', 0 ) ){
			return 'true';
		}
	}

	return 'false';

}
add_filter( 'knote_transparent_header_status', 'knote_header_transparent' );

function knote_header_sticky(){

		if( get_theme_mod( 'knote_header_builder_sticky_enable', 0 ) ){
			return 'true';
		}

	return 'false';

}
add_filter( 'knote_sticky_header_status', 'knote_header_sticky' );


function knote_header_sticky_direction_type(){

	return get_theme_mod( 'knote_header_builder_sticky_type', 'scroll' );

}
add_filter( 'knote_header_sticky_direction', 'knote_header_sticky_direction_type' );
