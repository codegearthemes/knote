<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Knote
 */
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function knote_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'knote_content_width', 880 );
}
add_action( 'after_setup_theme', 'knote_content_width', 0 );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function knote_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'knote_body_classes' );

function knote_container_classes() {
	// Global
	$knote_website_layout 	= get_theme_mod( 'knote_website_container', 'container' );
	$knote_single_layout	= get_theme_mod( 'knote_single_layout', 'centered' );

	if( is_singular('post') && $knote_single_layout === 'fullwidth' ){
		$knote_website_layout = 'container-fluid';
	}

	return $knote_website_layout;

}
add_filter( 'knote_container_class', 'knote_container_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function knote_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'knote_pingback_header' );

/**
 * Blog home page title
 */
function knote_post_header_title(){
	if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ){ ?>
		<header class="header-inner" data-page-header>
			<div class="<?php echo esc_attr( apply_filters( 'knote_container_class', 'container' ) ); ?>">
				<div class="page-header entry-header">
					<?php do_action( 'knote_before_title' ); ?>
					<h1 class="entry-title"><?php single_post_title(); ?></h1>
					<?php do_action( 'knote_after_title' ); ?>
				</div>
			</div>
		</header>
	<?php
	}
}
add_action( 'knote_page_header', 'knote_post_header_title');

/**
 * Page Header title
 */
function knote_page_header_title(){

	if ( is_page() && apply_filters( 'knote_page_builder_mode', true ) ){ ?>
		<?php if( is_page_template('templates/builder-template.php') ){ return; } ?>
		<header class="header-inner" data-page-header>
			<div class="<?php echo esc_attr( apply_filters( 'knote_container_class', 'container' ) ); ?>">
				<div class="page-header entry-header">
					<?php
						do_action( 'knote_before_title' );
						the_title( '<h1 class="entry-title">', '</h1>' );
						do_action( 'knote_after_title' );
					?>
				</div>
			</div>
		</header>
	<?php
	}
}
add_action( 'knote_page_header', 'knote_page_header_title', 10 );

/**
 * Sidebar
 */
function knote_sidebar_callback() {

	if ( !apply_filters( 'knote_sidebar_enable', true ) ) {
		return;
	}

	get_sidebar();
}
add_action( 'knote_sidebar', 'knote_sidebar_callback' );

/**
 * Sidebar single & page
 */
function knote_single_sidebar() {

	global $post;

	if ( !isset( $post ) ) {
		return;
	}

	if ( is_single() && 'post' == get_post_type() ) {

		$knote_sidebar_enable 		= get_theme_mod( 'knote_single_sidebar_enable', 0 );
		$sidebar_single_layout   	= get_theme_mod( 'knote_single_layout', 'centered' );

		if ( $sidebar_single_layout == 'centered' ) {

			add_filter( 'knote_sidebar_enable', '__return_false' );
			add_filter( 'knote_content_class', function() { return 'one-whole centered'; } );

		}else{

			if( $knote_sidebar_enable ){
				add_filter( 'knote_sidebar_enable', function() { return true; });
				add_filter( 'knote_content_class', function() {

					$sidebar_sidebar_position 	= get_theme_mod( 'knote_single_sidebar_position', 'right' );
					$classes = 'large--two-thirds medium--three-quarters small--one-whole';
					if ( 'left' === $sidebar_sidebar_position ){
						$classes .= ' omega';
					}
					return $classes;

				} );

			}else{
				add_filter( 'knote_sidebar_enable', '__return_false' );
				add_filter( 'knote_content_class', function() { return 'one-whole no-sidbar'; } );
			}

		}

	} elseif ( is_page() ) {
		add_filter( 'knote_sidebar_enable', '__return_false', 100 );
		add_filter( 'knote_content_class', function() { return 'one-whole no-sidebar'; }, 100 );
	}else{
		add_filter( 'knote_sidebar_enable', '__return_false', 100 );
		add_filter( 'knote_content_class', function() { return 'one-whole no-sidebar'; }, 100 );
	}
}
add_action( 'wp', 'knote_single_sidebar', 10 );

function knote_header_container_class(){

	$container = get_theme_mod( 'knote_header_builder_container', 'container' );

	return $container;
}
add_filter( 'knote_header_container', 'knote_header_container_class' );

function knote_footer_container_class(){

	$container = get_theme_mod( 'knote_footer_builder_container', 'container' );

	return $container;
}
add_filter( 'knote_footer_container', 'knote_footer_container_class' );

/**
 * Main Wrapper Start
 */
function knote_main_wrapper_start_cb(){
	echo '<div id="content" class="site-content">';
}
add_action( 'knote_main_wrapper_start', 'knote_main_wrapper_start_cb', 5 );

/**
 * Main Wrapper End
 */
function knote_main_wrapper_end_cb(){
	echo '</div>';
}
add_action( 'knote_main_wrapper_end', 'knote_main_wrapper_end_cb', 5 );



function knote_archive_grid(){

	$knote_article_class = '';

	$knote_archive_layout			= get_theme_mod( 'knote_archive_layout', 'grid' );
	$knote_archive_grid_columns 	= get_theme_mod( 'knote_archives_grid_columns', '2' );

	if( $knote_archive_layout == 'grid' ) {
		switch( $knote_archive_grid_columns ){
			case '2':
				$knote_article_class   = 'large--one-half medium--one-half small--one-whole';
				break;
			case '3':
				$knote_article_class   = 'large--one-third medium--one-third small--one-whole';
				break;
			case '4':
				$knote_article_class   = 'large--one-quarter medium--one-third small--one-whole';
				break;
			case '5':
				$knote_article_class   = 'large--one-fifth medium--one-third small--one-whole';
				break;
			default:
				$knote_article_class  = 'large--one-half medium--one-half small--one-whole';
		}
	}

	return $knote_article_class;
}

function knote_social_profiles() {
	$knote_facebook_link = get_theme_mod( 'knote_facebook_url', '' );
	$knote_twitter_link = get_theme_mod( 'knote_twitter_url', '' );
	$knote_linkedin_link = get_theme_mod( 'knote_linkedin_url', '' );
	$knote_instagram_link = get_theme_mod( 'knote_instagram_url', '' );
	$knote_pinterest_link = get_theme_mod( 'knote_pinterest_url', '' );
	$knote_youtube_link = get_theme_mod( 'knote_youtube_url', '' );
	$classes = 'round-border-icon';
	?>
	<div class="block-social">
		<ul class="social-icons clearfix <?php echo esc_attr( $classes ); ?>">
			<?php
			if( ! empty( $knote_facebook_link ) ): ?>
				<li class="text-center">
					<?php /* translators: %s: Network name */ ?>
					<a href="<?php echo esc_url( $knote_facebook_link ); ?>" title="<?php echo esc_attr( sprintf( __( '%1$s on %2$s', 'knote' ), bloginfo( 'name' ), __( 'Facebook', 'knote' )  )); ?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-facebook">
							<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
						</svg>
					</a>
				</li>
				<?php
			endif;
			if( ! empty( $knote_twitter_link ) ): ?>
				<li class="text-center">
					<?php /* translators: %s: Network name */ ?>
					<a href="<?php echo esc_url( $knote_twitter_link ); ?>" title="<?php echo esc_attr( sprintf( __( '%1$s on %2$s', 'knote' ), bloginfo( 'name' ), __( 'Twitter', 'knote' )  )); ?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-twitter">
							<path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
						</svg>
					</a>
				</li>
				<?php
			endif;
			if( ! empty( $knote_linkedin_link ) ): ?>
				<li class="text-center">
					<?php /* translators: %s: Network name */ ?>
					<a href="<?php echo esc_url( $knote_linkedin_link ); ?>" title="<?php echo esc_attr( sprintf( __( '%1$s on %2$s', 'knote' ), bloginfo( 'name' ), __( 'LinkedIn', 'knote' )  )); ?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-linkedin">
							<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
							<rect x="2" y="9" width="4" height="12"></rect>
							<circle cx="4" cy="4" r="2"></circle>
						</svg>
					</a>
				</li>
				<?php
			endif;
			if( ! empty( $knote_instagram_link ) ): ?>
				<li class="text-center">
					<?php /* translators: %s: Network name */ ?>
					<a href="<?php echo esc_url( $knote_instagram_link ); ?>" title="<?php echo esc_attr( sprintf( __( '%1$s on %2$s', 'knote' ), bloginfo( 'name' ), __( 'Instagram', 'knote' )  )); ?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-instagram">
							<rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
							<path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
							<line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
						</svg>
					</a>
				</li>
				<?php
			endif;
			if( ! empty( $knote_youtube_link ) ): ?>
				<li class="text-center">
					<?php /* translators: %s: Network name */ ?>
					<a href="<?php echo esc_url( $knote_youtube_link ); ?>" title="<?php echo esc_attr( sprintf( __( '%1$s on %2$s', 'knote' ), bloginfo( 'name' ), __( 'Youtube', 'knote' )  )); ?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-youtube">
							<path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path>
							<polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
						</svg>
					</a>
				</li>
				<?php
			endif;
			?>
		</ul>
	</div>
<?php
}

function knote_search_form(){ ?>
	<div class="block-search">
		<button class="search-toggle large--hide small-show" aria-label="<?php esc_attr__( 'View Search', 'knote' ); ?>" data-search-toggle>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-search">
				<circle cx="10" cy="10" r="7.5"/>
				<line x1="21" y1="21" x2="16.65" y2="16.65"/>
			</svg>
			<span class="fallback-text"><?php esc_html_e( 'Search', 'knote' ); ?></span>
		</button>
		<?php get_search_form(); ?>
	</div>
	<?php
}


/**
 * Sharing options
 */
function knote_post_sharing_links() {

	$knote_social_share = get_theme_mod( 'knote_single_post_sharing_enable', 0 );

	if ( !$knote_social_share ) { return; }

	global $post;

    $post_url   	= urlencode( esc_url( get_permalink($post->ID) ) );
    $post_title 	= urlencode( $post->post_title );
	//$sharing_title 	= get_theme_mod( 'post_share_title', esc_html__( 'Share this post', 'knote' ) );

	$urls = array(
		'facebook' 	=> array(
			'url' 		=> str_replace( '{title}', $post_title, str_replace( '{url}', $post_url, 'https://www.facebook.com/sharer.php?u={url}' ) ),
		),
		'twitter' 	=> array(
			'url' 		=> str_replace( '{title}', $post_title, str_replace( '{url}', $post_url, 'https://twitter.com/intent/tweet?url={url}&text={title}' ) ),
		),
		'pinterest' 	=> array(
			'url' 		=> str_replace( '{title}', $post_title, str_replace( '{url}', $post_url, 'http://pinterest.com/pin/create/link/?url={url}' ) ),
		)
	);

	$output = 	'<div class="social-sharing">';
	// if ( '' !== $sharing_title ) {
	// 	$output .=	'<h4>' . esc_html( $sharing_title ) . '</h4>';
	// }
	$output .= 		'<div class="sharing-icons">';
						foreach ( $urls as $network => $url ) {
							$output .= '<a target="_blank" href="' . $url['url'] . '" class="share-button share-button-' . esc_attr( $network ) . '">';
							 	$output .= knote_get_svg_icon( 'icon-' . $network, false );

								$output .= sprintf(
									/* translators: %s: Social network name */
									__( '<span class="screen-reader-text">Share %1$s on %2$s</span>', 'knote' ), $post->post_title, $network
								);
							$output .= '</a>';
						}
	$output .= 		'</div>';
	$output .= 	'</div>';

    echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}
add_action( 'knote_entry_footer_after', 'knote_post_sharing_links', 10 );
