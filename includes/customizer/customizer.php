<?php
/**
 * Knote Theme Customizer
 *
 * @package Knote
 */

if ( !class_exists( 'Knote_Customizer' ) ) {
	class Knote_Customizer {

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
			add_action( 'customize_register', array( $this, 'knote_customize_register' ) );
			add_action( 'customize_preview_init', array( $this, 'knote_customize_preview_script' ) );
			add_action( 'customize_controls_print_footer_scripts', array( $this, 'knote_scripts' ) );
		}


		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public function knote_customize_register( $wp_customize ) {

			// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			require get_template_directory() . '/includes/customizer/controls/alpha-color/class-control-alpha-color.php';
			require get_template_directory() . '/includes/customizer/controls/color-group/class-control-color-group.php';
			require get_template_directory() . '/includes/customizer/controls/description/class-control-description.php';
			require get_template_directory() . '/includes/customizer/controls/divider/class-control-divider.php';
			require get_template_directory() . '/includes/customizer/controls/heading/class-control-heading.php';
			require get_template_directory() . '/includes/customizer/controls/radio-buttons/class-control-radio-buttons.php';
			require get_template_directory() . '/includes/customizer/controls/radio-image/class-control-radio-image.php';
			require get_template_directory() . '/includes/customizer/controls/slider/class-control-slider.php';
			require get_template_directory() . '/includes/customizer/controls/switch/class-control-switch.php';
			require get_template_directory() . '/includes/customizer/controls/tabs/class-control-tabs.php';
			require get_template_directory() . '/includes/customizer/controls/accordion/class-control-accordion.php';
			require get_template_directory() . '/includes/customizer/controls/typography/class-control-typography.php';
			require get_template_directory() . '/includes/customizer/controls/text/class-control-text.php';
			require get_template_directory() . '/includes/customizer/controls/dimensions/class-control-dimensions.php';
			require get_template_directory() . '/includes/customizer/controls/repeater/class-control-repeater.php';
			require get_template_directory() . '/includes/customizer/controls/class-section-title.php';
			// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

			$wp_customize->get_section( 'title_tagline' )->priority		= 1;
			$wp_customize->get_section( 'title_tagline' )->panel 		= 'knote_header_panel';
			$wp_customize->get_section( 'colors' )->priority 			= 5;

			$wp_customize->register_control_type( '\Kirki\Control\sortable' );

			// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			require get_template_directory() . '/includes/customizer/sanitizer.php';
			require_once get_template_directory() . '/includes/customizer/callbacks.php';
			require get_template_directory() . '/includes/customizer/options/navigation.php';
			require get_template_directory() . '/includes/customizer/options/general.php';
			require get_template_directory() . '/includes/customizer/options/typography.php';
			require get_template_directory() . '/includes/customizer/options/performance.php';
			require get_template_directory() . '/includes/customizer/options/colors.php';
			require get_template_directory() . '/includes/customizer/options/header.php';
			require get_template_directory() . '/includes/customizer/options/layout.php';
			require get_template_directory() . '/includes/customizer/options/layout/archive.php';
			require get_template_directory() . '/includes/customizer/options/layout/single-post.php';
			require get_template_directory() . '/includes/customizer/options/footer.php';

			/**
			 * Load WooCommerce compatibility file.
			 */
			if ( class_exists( 'WooCommerce' ) ) {
				require get_template_directory() . '/includes/customizer/options/woocommerce/woocommerce.php';
				require get_template_directory() . '/includes/customizer/options/woocommerce/woocommerce-single.php';
			}
			// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound


			if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->selective_refresh->add_partial(
					'blogname',
					array(
						'selector'        => '.site-title a',
						'render_callback' => array( $this, 'knote_customize_partial_blogname' ),
					)
				);

				$wp_customize->selective_refresh->add_partial(
					'blogdescription',
					array(
						'selector'        => '.site-description',
						'render_callback' => array( $this, 'knote_customize_partial_blogdescription' ),
					)
				);
			}
		}

		/**
		 * Render the site title for the selective refresh partial.
		 *
		 * @return void
		 */
		function knote_customize_partial_blogname() {
			bloginfo( 'name' );
		}

		/**
		 * Render the site tagline for the selective refresh partial.
		 *
		 * @return void
		 */
		function knote_customize_partial_blogdescription() {
			bloginfo( 'description' );
		}


		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		public function knote_customize_preview_script() {
			wp_enqueue_style( 'knote-customizer-preview', get_template_directory_uri() . '/assets/admin/css/customizer.preview.css', array(), KNOTE_VERSION,'all' );
			wp_enqueue_script( 'knote-customizer-preview', get_template_directory_uri() . '/assets/admin/js/customizer.preview.js', array( 'jquery', 'customize-preview' ), KNOTE_VERSION, true );
		}

		public function knote_scripts() {
			wp_enqueue_style( 'knote-customizer-styles', get_template_directory_uri() . '/assets/admin/css/customizer.css', array(), KNOTE_VERSION,'all' );
			wp_enqueue_script( 'knote-customizer-scripts', get_template_directory_uri() . '/assets/admin/js/customizer.js', array( 'jquery', 'jquery-ui-core' ), KNOTE_VERSION, true );
		}

	}
}

Knote_Customizer::get_instance();
