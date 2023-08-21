<?php
/**
 * Class to handle the footer elements
 *
 * @package Knote
 */

if ( !class_exists( 'Knote_Footer' ) ) :

    /**
	 * knote_Footer
	 */

    class Knote_Footer {

         /**
         * Instance
         */
        private static $instance;

        /**
         * Initiator
         */

        public static function instance(){
            if ( !isset( self::$instance ) ) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        /**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'knote_footer_before', array( $this, 'footer_markup_open' ), 5 );
			add_action( 'knote_footer_after', array( $this, 'footer_markup_close' ), 30 );
		}

		public function footer_markup_open() {
			$styles = array();
			$padding    = Knote_Styles::dimensions_variables('knote_footer_builder_padding', 'padding', 'footer');

			if (is_array($padding)) {
				$styles = array_merge($styles, $padding);
			}

			?>
			<footer id="footer" class="footer site-footer footer-builder__main" style="<?php echo esc_attr( implode(';', $styles ) ); ?>">
				<div class="site-footer__inner">
			<?php
		}

		public function footer_markup_close() { ?>
				</div>
            </footer>
			<?php
		}


    }

     /**
	 * Initialize class
	 */
	Knote_Footer::instance();

endif;
