<?php

/**
 * Knote functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @author      CodegearThemes
 * @category    WordPress
 * @package     Knote
 * @version     0.7.0
 *
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
if (!defined('KNOTE_VERSION')) {
	define('KNOTE_VERSION', '0.7.0');
}
define('KNOTE_THEME_DIR', trailingslashit(get_template_directory()));
define('KNOTE_THEME_URI', trailingslashit(esc_url(get_template_directory_uri())));

if (!function_exists('knote_setup')) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function knote_setup()
	{

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		   * Let WordPress manage the document title.
		   * By adding theme support, we declare that this theme does not use a
		   * hard-coded <title> tag in the document head, and expect WordPress to
		   * provide it for us.
		   */
		add_theme_support('title-tag');

		/*
		   * Enable support for Post Thumbnails on posts and pages.
		   *
		   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		   */
		add_theme_support('post-thumbnails');
		add_image_size('knote-post-thumbnails-grid-xlarge', 610);
		add_image_size('knote-post-thumbnails-grid-large', 360);
		add_image_size('knote-post-thumbnails-grid-medium', 295);
		add_image_size('knote-post-thumbnails-grid-small', 235);

		add_image_size('knote-post-thumbnails-list', 750);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary'	=> esc_html__('Primary', 'knote'),
				'secondary' => esc_html__('Secondary Menu', 'knote'),
				'footer' 	=> esc_html__('Footer Menu', 'knote')
			)
		);

		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Knote, use a find and replace
		* to change 'knote' to the name of your theme in all the template files.
		*/
		load_theme_textdomain('knote', get_template_directory() . '/languages');

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'knote_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support('align-wide');
		add_theme_support('editor-styles');

		/**
		 * Knote font sizes
		 */
		add_theme_support(
			'knote-font-sizes',
			array(
				array(
					'name'      => esc_html__('Small', 'knote'),
					'shortName' => esc_html_x('S', 'Font size', 'knote'),
					'size'      => 14,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__('Normal', 'knote'),
					'shortName' => esc_html_x('N', 'Font size', 'knote'),
					'size'      => 16,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__('Large', 'knote'),
					'shortName' => esc_html_x('L', 'Font size', 'knote'),
					'size'      => 18,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__('Larger', 'knote'),
					'shortName' => esc_html_x('L', 'Font size', 'knote'),
					'size'      => 24,
					'slug'      => 'larger',
				),
				array(
					'name'      => esc_html__('Extra large', 'knote'),
					'shortName' => esc_html_x('XL', 'Font size', 'knote'),
					'size'      => 32,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__('Huge', 'knote'),
					'shortName' => esc_html_x('XXL', 'Font size', 'knote'),
					'size'      => 48,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__('Gigantic', 'knote'),
					'shortName' => esc_html_x('XXXL', 'Font size', 'knote'),
					'size'      => 64,
					'slug'      => 'gigantic',
				),
			)
		);

		/**
		 * Responsive embeds
		 */
		add_theme_support( 'editor-styles' );
		add_theme_support('responsive-embeds');
		update_option('elementor_onboarded', true);

		/*
		* Styles the visual editor to resemble the theme style
		*
		*/
		add_editor_style('assets/admin/css/editor.style.css');

		/**
		 * Page templates with blocks
		 */
		add_theme_support('block-templates');

		/**
		 * Appearance tools.
		 */
		add_theme_support( 'appearance-tools' );
	}
endif;
add_action('after_setup_theme', 'knote_setup');

function knote_widgets_init()
{

	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'knote'),
		'id'            => 'sidebar',
		'description'   => esc_html__('Add widgets here.', 'knote'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="title h5"><span>',
		'after_title'   => '</span></h3>',
	));

	for ($i = 1; $i <= 4; $i++) {
		register_sidebar(
			array(
				/* translators: %s = footer widget area number */
				'name'          => sprintf(esc_html__('Footer %s', 'knote'), $i),
				'id'            => 'footer-' . $i,
				'description' => esc_html__('Add widgets here to display to displays content on the footer section.', 'knote'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="title h5">',
				'after_title'   => '</h3>',
			)
		);
	}
}
add_action('widgets_init', 'knote_widgets_init');

/**
 * Disable Elementor default schemes
 */
function knote_set_elementor_defaults()
{
	update_option('elementor_disable_color_schemes', 'yes');
	update_option('elementor_disable_typography_schemes', 'yes');
	update_option('elementor_container_width', 1160);
	
	// Deactivate Elementor Wizard.
	update_option( 'elementor_onboarded', true );
}
add_action('after_switch_theme', 'knote_set_elementor_defaults');

/**
 * Autoload
 */
require_once get_parent_theme_file_path('vendor/autoload.php');
require_once get_parent_theme_file_path('framework/framework.php');

/**
 * Breadcrumb
 */
require get_template_directory() . '/plugins/breadcrumb/breadcrumb.php';
require get_template_directory() . '/plugins/breadcrumb/json-ld.php';

/**
 * SVG Icons
 */
require get_template_directory() . '/includes/classes/class-svg-icons.php';

/**
 * Styles Variables
 */
require get_template_directory() . '/includes/classes/class-variables-styles.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/functions/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/functions/theme-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/functions/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer/customizer.php';
require get_template_directory() . '/includes/customizer/builder/class-builder.php';

function knote_load_builder(){
	/**
	 * Initialize class
	 */
	Knote_Builder::get_instance();
}
add_action('init', 'knote_load_builder');

/**
 * Header & Footer
 */
require get_template_directory() . '/includes/public/class-header.php';
require get_template_directory() . '/includes/public/class-footer.php';

/**
 * Elementor Compatibility
 */
if (defined('ELEMENTOR_VERSION')) {
	require get_template_directory() . '/plugins/elementor/elementor.php';
}

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/extras/extras.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/plugins/jetpack/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/plugins/woocommerce/woocommerce.php';
}

/**
 * Archives
 */
require get_template_directory() . '/includes/classes/class-post-archives.php';
