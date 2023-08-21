<?php
/**
 * Posts archive class
 *
 * @package Knote
 */


if ( !class_exists( 'Knote_Posts_Archive' ) ) :
	class Knote_Posts_Archive {

		/**
		 * Instance
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'wp', array( $this, 'filters' ) );
			add_action( 'knote_loop_post', array( $this, 'post_markup' ) );
			add_filter( 'knote_blog_layout_class', array( $this, 'blog_layout_class' ) );
			add_filter( 'knote_article_layout_class', array( $this, 'blog_article_layout_class' ) );
		}

		/**
		 * Filters
		 */
		public function filters() {
			if ( is_singular() || is_404() || ( class_exists( 'Woocommerce' ) && is_woocommerce() ) || ( class_exists( 'Tribe__Events__Main' ) && get_post_type() === 'tribe_events' ) ) {
				return;
			}

			$sidebar_enable 	= get_theme_mod( 'knote_archive_layout_sidebar_enable', 0 );
			$sidebar_position 	= get_theme_mod( 'knote_archive_layout_sidebar_position', 'left' );

			if ( !$sidebar_enable ) {
				add_filter( 'knote_sidebar_enable', '__return_false' );
			}

			add_filter( 'knote_content_class', array( $this, 'content_classes' ) );
		}

		public function content_classes( $classes ) {

			$content_class   = array();
			$sidebar_enable 	= get_theme_mod( 'knote_archive_layout_sidebar_enable', 0 );
			$sidebar_position 	= get_theme_mod( 'knote_archive_layout_sidebar_position', 'left' );

			if( $sidebar_enable ) {
				$content_class[] = 'large--two-thirds medium-down--one-whole';

				if( $sidebar_position === 'left' ){
					$content_class[] = 'omega';
				}else{
					$content_class[] = 'alpha';
				}

			}else{
				$content_class[] = 'one-whole';
			}

			$classes = implode( ' ', $content_class );

			return $classes;
		}

		/**
		* Blog layout
		*/
		public function blog_layout() {
			$layout = get_theme_mod( 'knote_archive_layout', 'default' );

			return $layout;
		}

		public function blog_layout_class() {
			$layout = get_theme_mod( 'knote_archive_layout', 'default' );

			if( $layout == 'grid' ) {
				return 'grid layout-'.$layout;
			}

			return 'grid layout-'.$layout;
		}

		public function blog_article_layout_class() {
			$classes = knote_archive_grid();

			return $classes;
		}

		/**
		 * Default meta elements
		 */
		public function default_meta_elements() {
			return array( 'date' );
		}

		/**
		 * Create the archive posts
		 */
		public function post_markup() {

			$layout 			= $this->blog_layout();

			switch ( $layout ) {
				case 'grid':
				case 'default':
					$this->post_image();
					$this->post_title();
					$this->post_meta();
					$this->post_excerpt();

					break;

				case 'simple':
					$this->post_title();
					$this->post_meta();
					$this->post_image();
					$this->post_excerpt();

					break;

				case 'alternate':
				case 'image-left':
					echo '<div class="grid article-item flex-align-center">';
						echo '<div class="grid__item list-image image-left large--two-fifths medium--one-half small--one-whole">';
							$this->post_image();
						echo '</div>';
						echo '<div class="grid__item list-content large--three-fifths medium--one-half small--one-whole">';
							$this->post_title();
							$this->post_meta();
							$this->post_excerpt();
						echo '</div>';
					echo '</div>';

					break;
			}
		}

		/**
		 * Post image
		 */
		public function post_image() {

			if( get_theme_mod( 'knote_archive_image_enable', 1 ) ){
				knote_post_thumbnail();
			}
		}

		/**
		 * Post meta
		 */
		public function post_meta() {

			if ( in_array( get_post_format(), array( 'aside', 'status' ) ) ) {
				return;
			}

			$archive_meta_elements 	= get_theme_mod( 'knote_archive_meta_elements', $this->default_meta_elements() );
			$archive_meta_delimiter = get_theme_mod( 'knote_archive_delimiter_style', 'none' );

			if ( 'post' !== get_post_type() || empty( $archive_meta_elements ) ) {
				return;
			}

			echo '<div class="entry-meta delimiter-' . esc_attr( $archive_meta_delimiter ) . '">';
				foreach( $archive_meta_elements as $element ) {
					call_user_func( array( $this, 'post_'.$element ) );
				}
			echo '</div>';
		}

		/**
		 * Post title
		 */
		public function post_title() { ?>
			<header class="entry-header">
				<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
				?>
			</header><!-- .entry-header -->
			<?php
		}

		/**
		 * Post excerpt
		 */
		public function post_excerpt() {

			if ( in_array( get_post_format(), array( 'aside', 'quote', 'link', 'image', 'video', 'status' ) ) ) {
				echo '<div class="entry-content">'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					the_content();
				echo '</div>';
			} else {

				$excerpt 	= get_theme_mod( 'knote_archive_excerpt_enable', 1 );

				if ( !$excerpt ) return;

				echo '<div class="entry-content">'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					the_excerpt();
				echo '</div>';

			}

		}

		/**
		 * Post date
		 */
		public function post_date() {
			knote_posted_on();
		}

		/**
		 * Post author
		 */
		public function post_author() {
			knote_posted_by();
		}

		/**
		 * Post categories
		 */
		public function post_categories() {
			knote_post_categories();
		}

		/**
		 * Post comments
		 */
		public function post_comments() {
			knote_comment();
		}
	}

	/**
	 * Initialize class
	 */
	Knote_Posts_Archive::get_instance();

endif;
