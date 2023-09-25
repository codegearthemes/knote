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

			add_action( 'knote_after_site', array( $this, 'footer_scrollup' ), 10 );
		}

		public function footer_markup_open() {
			$styles 	= array();
			$footer 	= get_theme_mod( 'knote_footer_type', 'default' );
			$padding    = Knote_Styles::dimensions_variables('knote_footer_builder_padding', 'padding', 'footer');

			if (is_array($padding)) {
				$styles = array_merge($styles, $padding);
			}

			?>
			<footer id="footer" class="footer site-footer footer-builder__main" data-footer-type="<?php echo esc_attr( $footer ); ?>" style="<?php echo esc_attr( implode(';', $styles ) ); ?>">
				<div class="site-footer__inner">
			<?php
		}

		public function footer_markup_close() { ?>
				</div>
            </footer>
			<?php
		}

		public function footer_scrollup(){

			$classes  = array();

			$type          			=   get_theme_mod( 'knote_scrolltop_type', 'icon' );
			$enable        			=   get_theme_mod( 'knote_scrolltop_enable', 1 );
			$position         		=   get_theme_mod( 'knote_scrolltop_position', 'right' );
			$visibility       		=   get_theme_mod( 'knote_scrolltop_visibility', 'all' );
			$scroll_icon			= 	get_theme_mod( 'knote_scrolltop_icon', 'icon-angle-up' );
			$scroll_icon_text		=   get_theme_mod( 'knote_scrolltop_text', esc_html__( 'Back to top', 'knote' ) );

			$color              		= get_theme_mod( 'knote_scrolltop_color', '#000000' );
			$color_hover         		= get_theme_mod( 'knote_scrolltop_color_hover', '#000000' );
			$background_color   		= get_theme_mod( 'knote_scrolltop_background_color', '#D0F224' );
			$background_color_hover   	= get_theme_mod( 'knote_scrolltop_background_color_hover', '#D0F224' );
			$border_color   			= get_theme_mod( 'knote_scrolltop_border_color', '#D0F224' );
			$border_color_hover   		= get_theme_mod( 'knote_scrolltop_border_color_hover', '#D0F224' );

			$radius = get_theme_mod( 'knote_scrolltop_radius', 4 ).'px';
			$offset = get_theme_mod( 'knote_scrolltop_side_offset', 32 ).'px';
			$bottom = get_theme_mod( 'knote_scrolltop_bottom_offset', 32 ).'px';

			$styles[] = '--scroll-color:'.esc_attr( $color );
			$styles[] = '--scroll-color-hover:'.esc_attr( $color_hover );
			$styles[] = '--scroll-background-color:'.esc_attr( $background_color );
			$styles[] = '--scroll-background-color-hover:'.esc_attr( $background_color_hover );
			$styles[] = '--scroll-border-color:'.esc_attr( $border_color );
			$styles[] = '--scroll-border-color-hover:'.esc_attr( $border_color_hover );

			$styles[] = '--scroll-offset:'.esc_attr( $offset );
			$styles[] = '--scroll-bottom-offset:'.esc_attr( $bottom );
			$styles[] = '--scroll-border-radius:'.esc_attr( $radius );

			$classes[] = $type;
			$classes[] = $position;
			$classes[] = $visibility;



			if( $enable ): ?>
				<div class="footer-scrolltop <?php echo esc_attr( implode( ' ',  $classes ) ); ?>" style="<?php echo esc_attr( implode(';', $styles ) );?>" data-position="<?php echo esc_attr( $position) ?>" data-scrollup>
					<div class="footer-scroll__inner">
						<div class="icon-text">
							<?php if( $type == 'text' ): ?>
								<span class="text">
									<?php echo esc_html( $scroll_icon_text ); ?>
								</span>
							<?php endif; ?>
							<?php knote_get_svg_icon( $scroll_icon, true, true ); ?>
						</div>
					</div>
				</div>
			<?php endif;

		}


    }

     /**
	 * Initialize class
	 */
	Knote_Footer::instance();

endif;
