<?php
/**
 * Class to handle the header elements
 *
 * @package Knote
 */

if ( !class_exists( 'Knote_Header' ) ) :

    /**
	 * Knote_Header
	 */

    class Knote_Header {

        /**
         * Instance
         */
        private static $instance;

        /**
         * Initiator
         */

        public static function get_instance(){
            if ( !isset( self::$instance ) ) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        /**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'knote_header_before', array( $this, 'header_markup_open' ), 5 );
			add_filter( 'knote_header_class', array( $this, 'header_classes' ) );
			add_action( 'knote_header_after', array( $this, 'header_markup_close' ), 30 );
		}


		public function header_markup_open() {
			?>
			<header
				id="masthead"
				class="site-header header-builder__main <?php echo esc_attr( implode(' ', apply_filters( 'knote_header_class', '' ) ) ); ?>"
				data-sticky="<?php echo esc_attr( get_theme_mod( 'knote_header_builder_sticky_enable', 0 ) ); ?>"
				data-transparent="<?php echo esc_attr( get_theme_mod( 'knote_header_builder_transparent_enable', 0 ) ); ?>"
				data-header
			>
				<div class="site-header__inner">
			<?php
		}

		public function header_classes(){

			$classes = array();

			$sticky 			= get_theme_mod( 'knote_header_builder_sticky_enable', 0 );
			$sticky_row 		= get_theme_mod( 'knote_header_builder_sticky_row', 'main' );

			$transparent 		= get_theme_mod( 'knote_header_builder_transparent_enable', 0 );
			$transparent_row 	= get_theme_mod( 'knote_header_builder_transparent_row', 'main' );

			if( $sticky ){
				$classes[] = 'header-sticky';

				$classes[] = 'header-sticky-'.$sticky_row;
			}

			if( $transparent ){
				if( is_front_page() ){
					$classes[] = 'header-transparent';

					$classes[] = 'header-transparent-'.$transparent_row;
				}
			}

			return $classes;


		}

		public function header_markup_close() { ?>
				</div>
			</header>
			<?php
		}

	}


    /**
	 * Initialize class
	 */
	Knote_Header::get_instance();

endif;


