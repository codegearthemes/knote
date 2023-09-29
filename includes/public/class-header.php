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

		public $sticky;
		public $transparent;

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
			$this->sticky 			= get_theme_mod( 'knote_header_builder_sticky_enable', 0 );
			$this->transparent 		= get_theme_mod( 'knote_header_builder_transparent_enable', 0 );

			add_action( 'knote_header_before', array( $this, 'header_markup_open' ), 5 );
			add_filter( 'knote_header_class', array( $this, 'header_classes' ) );
			add_action( 'knote_header_after', array( $this, 'header_markup_close' ), 30 );

			if( $this->sticky || $this->transparent ) {
				add_action( 'knote_header_inner_start', array( $this, 'knote_header_inner_markup_start') );
				add_action( 'knote_header_inner_end', array( $this, 'knote_header_inner_markup_end') );
			}
		}


		public function header_markup_open() {
			?>
			<header
				id="masthead"
				class="site-header header-builder__main <?php echo esc_attr( implode(' ', apply_filters( 'knote_header_class', '' ) ) ); ?>"
				data-sticky="<?php echo esc_attr( apply_filters( 'knote_sticky_header_status', 'no' ) ); ?>"
				data-location="<?php echo esc_attr(get_theme_mod( 'knote_header_builder_sticky_row', 'main' ));?>"
				data-sticky-direction="<?php echo esc_attr( apply_filters( 'knote_header_sticky_direction', 'scroll' ) ); ?>"
				data-transparent="<?php echo esc_attr( apply_filters( 'knote_transparent_header_status', 'no' ) ); ?>"
				data-header
			>
				<div class="site-header__inner" data-header-inner>
					<?php do_action('knote_header_inner_start'); ?>
			<?php
		}

		public function header_classes(){

			$classes = array();

			$sticky_row 		= get_theme_mod( 'knote_header_builder_sticky_row', 'main' );

			$transparent_row 	= get_theme_mod( 'knote_header_builder_transparent_row', 'main' );

			if( $this->sticky ){
				$classes[] = 'header-sticky';

				$classes[] = 'header-sticky-'.$sticky_row;
			}

			if( $this->transparent ){
				$classes[] = 'header-transparent';
				$classes[] = 'header-transparent-'.$transparent_row;
			}

			return $classes;


		}

		public function header_markup_close() { ?>
					<?php do_action('knote_header_inner_end'); ?>
				</div>
			</header>
			<?php
		}

		public function knote_header_inner_markup_start(){
			$classes = 'header-inner__markup';
			if( $this->sticky ){
				$classes .= ' header-sticky';
			}

			if( $this->transparent ){
				$classes .= ' header-transparent';
			}
			?>
			<div class="<?php echo esc_attr( $classes ); ?>">
		<?php
		}

		public function knote_header_inner_markup_end(){ ?>
			</div>
		<?php
		}

	}


    /**
	 * Initialize class
	 */
	Knote_Header::get_instance();

endif;


