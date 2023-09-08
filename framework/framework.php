<?php

// Cannot access directly.
if ( ! defined( 'ABSPATH' ) ) { die; }

/**
 * Framework class.
 *
 * @package  Knote
 * @since    0.1.5
 */

class KnoteFramework {

    /**
	 * Theme type
	 *
	 * @var boolean $premium.
	 */
	public $premium = false;

	/**
     * The settings for page.
     *
     * @var array $settings
     */
    public $settings = array();

    /**
     * Instance of the class.
     *
     * @since   1.0.0
     *
     * @var   object
     */
    protected static $instance = null;

    /**
     * Return an instance of this class.
     *
     * @since    1.0.0
     *
     * @return  object  A single instance of the class.
     */
    public static function get_instance() {

        // If the single instance hasn't been set yet, set it now.
        if ( null == self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;

    }

    public function __construct() {

		$this->includes();

		if( $this->_themes_page() || $this->_dashboard_page() ) {
            add_action( 'init', array($this, 'set_settings') );
        }

		add_action( 'admin_notices', array( $this , 'notice' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ), 100 );

        add_action( 'admin_menu', array( $this, 'admin_menu_init' ), 9 );
		add_action( 'wp_ajax_knote_install_starter_plugin', array( $this, 'install_starter_plugin' ) );
		add_action('wp_ajax_knote_dismissed_handler', array($this, 'dismissed_handler'));

        add_action( 'knote_admin_content_before', array( $this, 'header_before'), 10 );
        add_action( 'knote_admin_content_after', array( $this, 'footer_after'), 100 );

		add_action('switch_theme', array($this, 'reset_notices'));
        add_action('after_switch_theme', array($this, 'reset_notices'));

    }

	public function set_settings() {

		$this->settings = apply_filters('knote_dashboard_settings', array() );

	}

	public function get_settings() {
		return $this->settings;
	}

	public function notice(){
		global $pagenow;

		$screen = get_current_screen();

		if ( 'themes.php' === $pagenow && 'themes' === $screen->base ) {
			$transient_name = sprintf( '%s_hero_notice', get_template() );

			if ( ! get_transient( $transient_name ) ) { ?>
				<div class="notice notice-success theme-dashboard-notice is-dismissible" data-notice="<?php echo esc_attr( $transient_name ); ?>">
					<button type="button" class="notice-dismiss" data-notice-dismiss></button>
					<?php require get_template_directory() . '/framework/views/hero.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound ?>
				</div>
				<?php
			}
		}
	}

	/**
     * Dismissed handler
     */
    public function dismissed_handler() {

        check_ajax_referer( 'nonce', 'nonce' );

		if ( isset( $_POST['notice'] ) ) { // Input var ok; sanitization ok.
			set_transient( sanitize_text_field( wp_unslash( $_POST['notice'] ) ), true, 0 ); // Input var ok.
			wp_send_json_success();
		}
        wp_send_json_error();

    }

	/**
     * Purified from the database information about notification.
     */
    public function reset_notices() {
        delete_transient(sprintf('%s_hero_notice', get_template()));
    }

	public static function premium() {
		if( class_exists( 'KnoteToolkit' ) )
			return true;

		return false;
	}

    public function includes() {

		require get_template_directory() . '/framework/functions/settings.php';

        require_once get_parent_theme_file_path( '/framework/views/common/header.php');
        require_once get_parent_theme_file_path( '/framework/views/common/footer.php');

		require_once get_parent_theme_file_path( '/framework/views/common/aside.php');

    }

    public function admin_menu_init() {
        if ( current_user_can( 'edit_theme_options' ) ) {

            add_menu_page( // phpcs:ignore WPThemeReview.PluginTerritory.NoAddAdminPages.add_menu_pages_add_menu_page
				esc_html__('Knote', 'knote'),
            	esc_html__('Knote', 'knote'),
				'manage_options', 'knote',
                array( $this, 'html' ),
                get_template_directory_uri().'/assets/admin/src/icon.svg', 59 );

        }
    }

    public function admin_scripts() {

        wp_enqueue_style( 'knote-admin-style', get_template_directory_uri() .'/assets/admin/css/admin.styles.css', false, KNOTE_VERSION );
        wp_enqueue_script( 'knote-admin-script', get_template_directory_uri() . '/assets/admin/js/admin.script.js', array(), KNOTE_VERSION, true );

        wp_localize_script( 'knote-admin-script', 'knote_localize', array(
            'nonce'          => wp_create_nonce( 'nonce' ),
            'ajax_url'       => admin_url( 'admin-ajax.php' ),
            'failed_message' => esc_html__( 'Something went wrong, contact support.', 'knote' ),
        ) );

    }

    /**
	 * Get plugin status.
	 *
	 * @param string $plugin_path Plugin path.
	 */
	public function get_plugin_status( $plugin_path ) {
		if ( ! current_user_can( 'install_plugins' ) ) {
			return;
		}

		if (!function_exists('is_plugin_active_for_network')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
        }

		if ( ! file_exists( WP_PLUGIN_DIR . '/' . $plugin_path ) ) {
			return 'not_installed';
		} elseif ( in_array( $plugin_path, (array) get_option( 'active_plugins', array() ), true ) || is_plugin_active_for_network( $plugin_path ) ) {
			return 'active';
		} else {
			return 'inactive';
		}
	}


	/**
	 * Install a plugin.
	 *
	 * @param string $plugin_slug Plugin slug.
	 */
	public function install_plugin( $plugin_slug ) {
		if ( ! current_user_can( 'install_plugins' ) ) {
			return;
		}

		if ( ! function_exists( 'plugins_api' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin-install.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		}
		if ( ! class_exists( 'WP_Upgrader' ) ) {
			require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		}

		if ( false === filter_var( $plugin_slug, FILTER_VALIDATE_URL ) ) {
			$api = plugins_api(
				'plugin_information',
				array(
					'slug'   => $plugin_slug,
					'fields' => array(
						'short_description' => false,
						'sections'          => false,
						'requires'          => false,
						'rating'            => false,
						'ratings'           => false,
						'downloaded'        => false,
						'last_updated'      => false,
						'added'             => false,
						'tags'              => false,
						'compatibility'     => false,
						'homepage'          => false,
						'donate_link'       => false,
					),
				)
			);

			$download_link = $api->download_link;
		} else {
			$download_link = $plugin_slug;
		}

		// Use AJAX upgrader skin instead of plugin installer skin.
		// ref: function wp_ajax_install_plugin().
		$upgrader = new Plugin_Upgrader( new WP_Ajax_Upgrader_Skin() );

		$install = $upgrader->install( $download_link );

		if ( false === $install ) {
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Activate a plugin.
	 *
	 * @param string $plugin_path Plugin path.
	 */
	public function activate_plugin( $plugin_path ) {

		if ( ! current_user_can( 'install_plugins' ) ) {
			return false;
		}

		$activate = activate_plugin( $plugin_path, '', false, true );

		if ( is_wp_error( $activate ) ) {
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Install starter plugin.
	 */
	public function install_starter_plugin() {
		check_ajax_referer( 'nonce', 'nonce' );

		$plugin_slug = (isset($_POST['slug'])) ? sanitize_text_field(wp_unslash($_POST['slug'])) : '';
        $plugin_path = (isset($_POST['path'])) ? sanitize_text_field(wp_unslash($_POST['path'])) : '';

		if ( ! current_user_can( 'install_plugins' ) ) {
			wp_send_json_error( esc_html__( 'Insufficient permissions to install the plugin.', 'knote' ) );
			wp_die();
		}

		if ( 'not_installed' === $this->get_plugin_status( $plugin_path ) ) {

			$this->install_plugin( $plugin_slug );
			$this->activate_plugin( $plugin_path );

		} elseif ( 'inactive' === $this->get_plugin_status( $plugin_path ) ) {
			$this->activate_plugin( $plugin_path );
		}

		if ( 'active' === $this->get_plugin_status( $plugin_path ) ) {
			wp_send_json_success();
		}

		wp_send_json_error( esc_html__( 'Failed to initialize or activate importer plugin.', 'knote' ) );

		wp_die();
	}

    public function header_before(){ ?>
		<div class="wrapper block-theme__screen">
			<div class="wrap">
    <?php
    }

    public function html(){

        do_action('knote_admin_content_before');
		require get_template_directory() . '/framework/views/content.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		require_once get_parent_theme_file_path( '/framework/views/common/aside.php'); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
        do_action('knote_admin_content_after');

    }

    public function footer_after(){ ?>
            </div>
        </div>
    <?php
    }

	/**
     * Check if is the themes.php page
     *
     */
    public function _themes_page() {
        global $pagenow;
        return $pagenow === 'themes.php';
    }

    /**
     * Check if is the theme dashboard page
     *
     */
    public function _dashboard_page() {
        global $pagenow;
        return $pagenow === 'admin.php' && ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] === 'knote' );
    }


}

KnoteFramework::get_instance();
