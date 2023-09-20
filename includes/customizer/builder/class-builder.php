<?php
/**
 * Builder
 *
 * @package Knote
 */

class Knote_Builder {
    /**
     * Instance
     */
    private static $instance;

    /**
     * Properties
     */
    public $header_rows;
    public $header_components;
    public $header_mobile_components;
    public $header_components_upsell;

    public $footer_rows;
    public $footer_components;
    public $footer_components_upsell;

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

        // Desktop Components.
        $this->header_components = array(
            array(
                'id'    => 'menu',
                'label' => esc_html__( 'Primary Menu', 'knote' )
            ),
            array(
                'id'    => 'secondary_menu',
                'label' => esc_html__( 'Secondary Menu', 'knote' )
            ),
            array(
                'id'    => 'social',
                'label' => esc_html__( 'Social', 'knote' )
            ),
            array(
                'id'    => 'search',
                'label' => esc_html__( 'Search', 'knote' )
            ),
            array(
                'id'    => 'logo',
                'label' => esc_html__( 'Site Identity', 'knote' )
            ),
            array(
                'id'    => 'button',
                'label' => esc_html__( 'Button', 'knote' )
            ),
            array(
                'id'    => 'contact_information',
                'label' => esc_html__( 'Contact Info', 'knote' )
            ),
            array(
                'id'    => 'html',
                'label' => esc_html__( 'HTML', 'knote' )
            )
        );

        // Mobile components.
        $this->header_mobile_components = array(
            array(
                'id'    => 'offcanvas_menu',
                'label' => esc_html__( 'Off-Canvas Menu', 'knote' )
            ),
            array(
                'id'    => 'secondary_menu',
                'label' => esc_html__( 'Secondary Menu', 'knote' )
            ),
            array(
                'id'    => 'hamburger',
                'label' => esc_html__( 'Menu Toggle', 'knote' )
            ),
            array(
                'id'    => 'social',
                'label' => esc_html__( 'Social', 'knote' )
            ),
            array(
                'id'    => 'search',
                'label' => esc_html__( 'Search', 'knote' )
            ),
            array(
                'id'    => 'logo',
                'label' => esc_html__( 'Site Identity', 'knote' )
            ),
            array(
                'id'    => 'button',
                'label' => esc_html__( 'Button', 'knote' )
            ),
            array(
                'id'    => 'contact_information',
                'label' => esc_html__( 'Contact Info', 'knote' )
            ),
            array(
                'id'    => 'html',
                'label' => esc_html__( 'HTML', 'knote' )
            )
        );

        // WooCommerce components.
        if( class_exists( 'Woocommerce' ) ) {
            $this->header_components[] = array(
                'id'    => 'cart',
                'label' => esc_html__( 'Cart', 'knote' )
            );

            $this->header_components[] = array(
                'id'    => 'account',
                'label' => esc_html__( 'Account', 'knote' )
            );

            $this->header_mobile_components[] = array(
                'id'    => 'cart',
                'label' => esc_html__( 'Cart', 'knote' )
            );

            $this->header_mobile_components[] = array(
                'id'    => 'account',
                'label' => esc_html__( 'Account', 'knote' )
            );
        }

        // Extra Builder Components
        $this->header_components_upsell = array(
            array(
                'id'    => 'button2',
                'label' => esc_html__( 'Button 2', 'knote' )
            ),
            array(
                'id'    => 'html2',
                'label' => esc_html__( 'HTML 2', 'knote' )
            ),
            array(
                'id'    => 'scrolling_text',
                'label' => esc_html__( 'Scrolling Text', 'knote' )
            )
        );

        // Header Rows Options
        $this->header_rows = array(
            array(
                'id' => 'header_row_above',
                'label' => esc_html__( 'Above Header Row', 'knote' ),
                'section' => 'knote_section_header_row_above',
                'default' => $this->get_row_default_value( 'header_row_above' )
            ),
            array(
                'id' => 'header_row_main',
                'label' => esc_html__( 'Main Header Row', 'knote' ),
                'section' => 'knote_section_header_row_main',
                'default' => $this->get_row_default_value( 'header_row_main' )
            ),
            array(
                'id' => 'header_row_below',
                'label' => esc_html__( 'Below Header Row', 'knote' ),
                'section' => 'knote_section_header_row_below',
                'default' => $this->get_row_default_value( 'header_row_below' )
            )
        );

        // Footer Components.
        $this->footer_components = array(
            array(
                'id'    => 'credits',
                'label' => esc_html__( 'Copyright', 'knote' )
            ),
            array(
                'id'    => 'button',
                'label' => esc_html__( 'Button', 'knote' )
            ),
            array(
                'id'    => 'html',
                'label' => esc_html__( 'HTML', 'knote' )
            ),
            array(
                'id'    => 'widget1',
                'label' => esc_html__( 'Widget Area 1', 'knote' )
            ),
            array(
                'id'    => 'widget2',
                'label' => esc_html__( 'Widget Area 2', 'knote' )
            ),
            array(
                'id'    => 'widget3',
                'label' => esc_html__( 'Widget Area 3', 'knote' )
            ),
            array(
                'id'    => 'widget4',
                'label' => esc_html__( 'Widget Area 4', 'knote' )
            ),
        );

        // Upsell Footer Components
        $this->footer_components_upsell = array(
            array(
                'id'    => 'footer_menu',
                'label' => esc_html__( 'Footer Menu', 'knote' )
            ),
            array(
                'id'    => 'html2',
                'label' => esc_html__( 'HTML 2', 'knote' )
            ),
            array(
                'id'    => 'button2',
                'label' => esc_html__( 'Button 2', 'knote' )
            )
        );

        // Footer Rows Options
        $this->footer_rows = array(
            array(
                'id' => 'footer_row_above',
                'label' => esc_html__( 'Above Footer Row', 'knote' ),
                'section' => 'knote_section_footer_row_above',
                'default' => $this->get_row_default_value( 'footer_row_above' )
            ),
            array(
                'id' => 'footer_row_main',
                'label' => esc_html__( 'Main Footer Row', 'knote' ),
                'section' => 'knote_section_footer_row_main',
                'default' => $this->get_row_default_value( 'footer_row_main' )
            ),
            array(
                'id' => 'footer_row_below',
                'label' => esc_html__( 'Below Footer Row', 'knote' ),
                'section' => 'knote_section_footer_row_below',
                'default' => $this->get_row_default_value( 'footer_row_below' )
            )
        );

        if( is_customize_preview() ) {
            add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
        }

        add_action( 'customize_register', array( $this, 'customizer_options' ), 1000 );

        add_action( 'customize_controls_print_footer_scripts', function(){ $this->header_builder_admin_grid( 'header' ); } );
        add_action( 'customize_controls_print_footer_scripts', function(){ $this->header_builder_admin_grid( 'footer' ); } );

        add_filter( 'body_class', array( $this, 'body_class' ) );
        add_action( 'knote_header', array( $this, 'header_markup' ), 15 );
        add_action( 'knote_footer', array( $this, 'footer_markup' ), 15 );
    }

    /**
     * Enqueue Admin Scripts
     */
    public function admin_enqueue_scripts() {
        wp_enqueue_script( 'jquery-ui-sortable' );

        wp_enqueue_style( 'knote-builder', get_template_directory_uri() . '/assets/admin/css/builder.css', array(), KNOTE_VERSION );
        wp_enqueue_script( 'knote-builder', get_template_directory_uri() . '/assets/admin/js/builder.js', array(), KNOTE_VERSION, true );

        wp_localize_script( 'knote-builder', 'knote_builder', array(
            'rows' => array(
                'defaults' => array(
                    'header_row_above' => $this::get_row_default_value( 'header_row_above' ),
                    'header_row_main'  => $this::get_row_default_value( 'header_row_main' ),
                    'header_row_below' => $this::get_row_default_value( 'header_row_below' ),
                    'mobile_offcanvas' => $this::get_row_default_value( 'mobile_offcanvas' ),
                    'footer_row_above' => $this::get_row_default_value( 'footer_row_above' ),
                    'footer_row_main'  => $this::get_row_default_value( 'footer_row_main' ),
                    'footer_row_below' => $this::get_row_default_value( 'footer_row_below' ),
                )
            ),
            'components' => array(
                'desktop' => apply_filters( 'knote_header_builder_components', $this->header_components ),
                'mobile'  => apply_filters( 'knote_header_builder_mobile_components', $this->header_mobile_components ),
                'footer' => apply_filters( 'knote_footer_builder_components', $this->footer_components ),
            ),
            'upsell_components' => array(
                'enable' => ! defined( 'KNOTE_ACTIVE' ) && ! defined( 'KNOTE_PREMIUM_VERSION' ) ? true : false,
                'header' => apply_filters( 'knote_header_builder_upsell_components', $this->header_components_upsell ),
                'footer' => apply_filters( 'knote_footer_builder_upsell_components', $this->footer_components_upsell ),
                'title'  => esc_html__( 'Permium Components', 'knote' ),
                'total'  => esc_html__( '10+ Components Available', 'knote' ),
                'button' => esc_html__( 'Get Knote Premium Now!', 'knote' ),
                'link'   => 'https://codegearthemes.com/knote-upgrade?utm_source=theme_customizer_deep&utm_medium=button&utm_campaign=Knote'
            ),
            'i18n' => array(
                'elementsMessage' => esc_html__( 'It looks like you already are using all available components.', 'knote' )
            )
        ) );
    }

    /**
     * Body Class Callback
     */
    public function body_class( $classes ) {
        $classes[] = 'has-builder';

        return $classes;
    }

    /**
     * Register Customizer Header Builder Options
     */
    public function customizer_options( $wp_customize ) {
        $this->header_customizer_options( $wp_customize );
        $this->footer_customizer_options( $wp_customize );
    }

    /**
     * Header Customizer Options
     */
    public function header_customizer_options( $wp_customize ) {

        // Header Builder Wrapper
        $wp_customize->add_section(
            'knote_section_header_wrapper',
            array(
                'title'      => esc_html__( 'Header Builder', 'knote' ),
                'panel'      => 'knote_header_panel'
            )
        );

        // Header Builder Above Header Row Section
        $wp_customize->add_section(
            'knote_section_header_row_above',
            array(
                'title'      => esc_html__( 'Above Header Row', 'knote' ),
                'panel'      => 'knote_header_panel'
            )
        );

        // Header Builder Main Header Row Section
        $wp_customize->add_section(
            'knote_section_header_row_main',
            array(
                'title'      => esc_html__( 'Main Header Row', 'knote' ),
                'panel'      => 'knote_header_panel'
            )
        );

        // Header Builder Below Header Row Section
        $wp_customize->add_section(
            'knote_section_header_row_below',
            array(
                'title'      => esc_html__( 'Below Header Row', 'knote' ),
                'panel'      => 'knote_header_panel'
            )
        );

        // Header Builder Mobile Offcanvas Header Section
        $wp_customize->add_section(
            'knote_section_header_mobile_offcanvas',
            array(
                'title'      => esc_html__( 'Mobile Offcanvas', 'knote' ),
                'panel'      => 'knote_header_panel'
            )
        );

        // Components
        // @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
        require get_template_directory() . '/includes/customizer/builder/components/header/button/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/header/contact-info/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/header/menu/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/header/secondary-menu/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/header/social/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/header/search/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/header/logo/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/header/cart/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/header/account/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/header/html/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/header/hamburger/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/header/offcanvas-menu/customize-options.php';

        // Structure Components.
        require get_template_directory() . '/includes/customizer/builder/components/header/header-builder/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/header/row/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/header/columns/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/header/mobile-offcanvas/customize-options.php';
        // @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }

    /**
     * Footer Customizer Options
     */
    public function footer_customizer_options( $wp_customize ) {

        // Footer Builder Wrapper
        $wp_customize->add_section(
            'knote_section_footer_wrapper',
            array(
                'title'      => esc_html__( 'Footer Builder', 'knote' ),
                'panel'      => 'knote_footer_panel'
            )
        );

        // Footer Builder Above Footer Row Section
        $wp_customize->add_section(
            'knote_section_footer_row_above',
            array(
                'title'      => esc_html__( 'Above Footer Row', 'knote' ),
                'panel'      => 'knote_footer_panel'
            )
        );

        // Footer Builder Main Footer Row Section
        $wp_customize->add_section(
            'knote_section_footer_row_main',
            array(
                'title'      => esc_html__( 'Main Footer Row', 'knote' ),
                'panel'      => 'knote_footer_panel'
            )
        );

        // Footer Builder Below Footer Row Section
        $wp_customize->add_section(
            'knote_section_footer_row_below',
            array(
                'title'      => esc_html__( 'Below Footer Row', 'knote' ),
                'panel'      => 'knote_footer_panel'
            )
        );

        // Components
        // @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
        require get_template_directory() . '/includes/customizer/builder/components/footer/button/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/footer/html/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/footer/copyright/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/footer/widget1/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/footer/widget2/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/footer/widget3/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/footer/widget4/customize-options.php';

        // Structure Components.
        require get_template_directory() . '/includes/customizer/builder/components/footer/footer-builder/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/footer/row/customize-options.php';
        require get_template_directory() . '/includes/customizer/builder/components/footer/columns/customize-options.php';
        // @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }

    /**
     * Get Row Data
     */
    public static function get_row_data( $row, $area ) {
        return json_decode( get_theme_mod( 'knote_builder_' . $row, Knote_Builder::get_row_default_value( $row ) ) );

    }

    /**
     * Get Row Default Value
     */
    public static function get_row_default_value( $row ) {
        switch ( $row ) {
            case 'header_row_main':
                if( class_exists( 'Woocommerce' ) ) {
                    $default = '{ "desktop": [["logo"], ["menu"], ["search", "cart"]], "mobile": [["hamburger"], ["logo"], ["cart"]] }';
                } else {
                    $default = '{ "desktop": [["logo"], [], ["menu"]], "mobile": [["logo"], [], ["hamburger"]] }';
                }
                break;

            case 'mobile_offcanvas':
                $default = '{ "desktop": [], "mobile": [], "mobile_offcanvas": [["offcanvas_menu"]] }';
                break;

            case 'footer_row_main':
                $default = '{ "desktop": [[], [], []], "mobile": [[], [], []] }';
                break;

            case 'footer_row_below':
                $default = '{ "desktop": [["credits"]], "mobile": [[], [], []] }';
                break;

            default:
                $default = '{ "desktop": [[], [], []], "mobile": [[], [], []], "mobile_offcanvas": [[]] }';
                break;
        }

        return $default;
    }

    /**
     * Get rows column default customizer value
     */
    public static function get_row_column_default_customizer_value( $row, $column_id, $section ) {
        $default = '';

        // Vertical Alignment.
        if( $section === 'vertical_alignment' ) {
            $default = 'flex-align-center';
        }

        // Inner Layout.
        if( $section === 'inner_layout' ) {
            $default = 'inline';
        }

        // Horizontal Alignment.
        if( $section === 'horizontal_alignment' ) {
            $default = 'flex-start';

            if( $row === 'header_row_main' ) {
                if( $column_id === 2 ) {
                    $default = 'flex-center';
                }

                if( $column_id === 3 ) {
                    $default = 'flex-end';
                }
            }
        }

        return $default;
    }

    /**
     * Row Output
     */
    public function rows_callback( $row, $area, $device ) {

        $args = array(
            'row'      => $row,
            'device'   => $device,
            'row_data' => $this->get_row_data( $row, $area )
        );

        if( $area === 'header' ) {
            get_template_part( 'template-parts/header/layout', 'builder', $args );
        }

        if( $area === 'footer' ) {
            get_template_part( 'template-parts/footer/layout', 'builder', $args );
        }
    }

    /**
     * Mobile Offcanvas Output
     */
    public function mobile_offcanvas_callback() {
        $args = array(
            'row_data' => json_decode( get_theme_mod( 'knote_builder_mobile_offcanvas', $this->get_row_default_value( 'mobile_offcanvas' ) ) )
        );

        get_template_part( 'template-parts/header/layout', 'builder-mobile', $args );
    }

    /**
     * Edit icon inside customizer.
     */
    public static function customizer_edit_button( $element, $builder = 'header' ) {
        if( !is_customize_preview() ) {
            return;
        }

        $element = 'knote_'.$builder.'_component_'.$element;
        ?>

        <div class="customize-partial-edit-shortcut" data-element-id="<?php echo esc_attr( $element ); ?>" data-shortcut>
            <button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'knote' ); ?>"
                    title="<?php esc_attr_e( 'Click to edit this element.', 'knote' ); ?>"
                    class="customize-partial-edit-shortcut-button builder-item-customizer-focus">
                <?php echo knote_get_svg_icon( 'icon-dots' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </button>
        </div>
        <?php
    }

    /**
     * Edit column icon inside customizer.
     */
    public static function customizer_edit_column_button( $builderType, $row, $column_id ) {
        if( !is_customize_preview() ) {
            return;
        }

        // Mount customize column setting id.
        $columnOptionID = 'knote_'. $builderType .'_row_'. $row .'_column' . $column_id; ?>

        <div class="customize-partial-edit-shortcut builder-customize-partial-edit-column-shortcut" data-section-id="<?php echo esc_attr( $columnOptionID ); ?>">
            <button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'knote' ); ?>"
                    title="<?php esc_attr_e( 'Click to edit this element.', 'knote' ); ?>"
                    class="customize-partial-edit-shortcut-button builder-item-customizer-focus">
            <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="2" height="15" fill="#FFF"/><rect x="7" width="2" height="15" fill="#FFF"/><rect y="3" width="3" height="16" transform="rotate(-90 0 3)" fill="#FFF"/><rect y="15" width="2" height="16" transform="rotate(-90 0 15)" fill="#FFF"/><rect x="14" width="2" height="15" fill="#FFF"/></svg>
            </button>
        </div>
        <?php
    }

    /**
     * Edit row customizer.
     */
    public static function customizer_edit_row_button( $row ) {
        if( !is_customize_preview() ) {
            return;
        }

        // Mount customize row setting id.
        $rowId = 'knote_section_'. $row;
        $rowText = __('Top Row', 'knote' );

        if( str_contains( $row, 'main' ) ){
            $rowText = __('Main Row', 'knote' );
        }elseif( str_contains( $row, 'below' ) ){
            $rowText = __('Bottom Row', 'knote' );
        }

        ?>

        <div class="customize-row-edit-shortcut builder-customize-partial-edit-row-shortcut" data-section-id="<?php echo esc_attr( $rowId ); ?>">
            <button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'knote' ); ?>"
                    title="<?php esc_attr_e( 'Click to edit this element.', 'knote' ); ?>"
                    class="customize-row-edit-shortcut-button builder-item-customizer-focus">
                <?php echo esc_html( $rowText ); ?>
            </button>
        </div>
        <?php
    }

    /**
     * Customizer Header/Footer Builder Grid System Output
     */
    public function header_builder_admin_grid(  $area ) {
        ?>
        <div class="knote-builder knote-builder-<?php echo esc_attr( $area ); ?>">
            <div class="knote-builder-top active">
                <div id="knote-builder-elements" class="knote-builder-elements">
                    <div class="knote-builder-elements-wrapper">
                        <div class="knote-builder-elements-desktop"></div>
                        <div class="knote-builder-elements-mobile"></div>
                    </div>
                </div>
                <div class="knote-builder-desktop">
                    <div class="grid">
                        <div class="grid__item block-builder__row row-inner one-whole knote-builder-row-above knote-builder-above-row">
                            <p class="knote-builder-row-controls">
                                <a href="#" class="settings" onClick="wp.customize.section('knote_section_<?php echo esc_attr( $area ); ?>_row_above').focus();">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.7604 7.62398C11.7844 7.42398 11.8004 7.21598 11.8004 6.99998C11.8004 6.78398 11.7844 6.57598 11.7524 6.37598L13.1044 5.31998C13.2244 5.22398 13.2564 5.04798 13.1844 4.91198L11.9044 2.69598C11.8244 2.55198 11.6564 2.50398 11.5124 2.55198L9.9204 3.19198C9.5844 2.93598 9.2324 2.72798 8.8404 2.56798L8.6004 0.871976C8.5764 0.711976 8.4404 0.599976 8.2804 0.599976H5.7204C5.5604 0.599976 5.4324 0.711976 5.4084 0.871976L5.1684 2.56798C4.7764 2.72798 4.4164 2.94398 4.0884 3.19198L2.4964 2.55198C2.3524 2.49598 2.1844 2.55198 2.1044 2.69598L0.824397 4.91198C0.744397 5.05598 0.776397 5.22398 0.904397 5.31998L2.2564 6.37598C2.2244 6.57598 2.2004 6.79198 2.2004 6.99998C2.2004 7.20798 2.2164 7.42398 2.2484 7.62398L0.896397 8.67998C0.776397 8.77598 0.744397 8.95198 0.816397 9.08798L2.0964 11.304C2.1764 11.448 2.3444 11.496 2.4884 11.448L4.0804 10.808C4.4164 11.064 4.7684 11.272 5.1604 11.432L5.4004 13.128C5.4324 13.288 5.5604 13.4 5.7204 13.4H8.2804C8.4404 13.4 8.5764 13.288 8.5924 13.128L8.8324 11.432C9.2244 11.272 9.5844 11.056 9.9124 10.808L11.5044 11.448C11.6484 11.504 11.8164 11.448 11.8964 11.304L13.1764 9.08798C13.2564 8.94398 13.2244 8.77598 13.0964 8.67998L11.7604 7.62398ZM7.0004 9.39998C5.6804 9.39998 4.6004 8.31998 4.6004 6.99998C4.6004 5.67998 5.6804 4.59998 7.0004 4.59998C8.3204 4.59998 9.4004 5.67998 9.4004 6.99998C9.4004 8.31998 8.3204 9.39998 7.0004 9.39998Z" fill="white"/>
                                    </svg>
                                    <span class="title"><?php echo esc_html__( 'TOP ROW', 'knote' ); ?></span>
                                </a>
                            </p>
                            <div class="knote-builder-area knote-builder-area-left" data-builder-row="<?php echo esc_attr( $area ); ?>_row_above" data-builder-column="left"></div>
                            <div class="knote-builder-area knote-builder-area-center" data-builder-row="<?php echo esc_attr( $area ); ?>_row_above" data-builder-column="center"></div>
                            <div class="knote-builder-area knote-builder-area-right" data-builder-row="<?php echo esc_attr( $area ); ?>_row_above" data-builder-column="right"></div>
                        </div>
                        <div class="grid__item block-builder__row row-inner one-whole knote-builder-row-main knote-builder-main-row">
                            <p class="knote-builder-row-controls">
                                <a href="#" class="settings" onClick="wp.customize.section('knote_section_<?php echo esc_attr( $area ); ?>_row_main').focus();">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.7604 7.62398C11.7844 7.42398 11.8004 7.21598 11.8004 6.99998C11.8004 6.78398 11.7844 6.57598 11.7524 6.37598L13.1044 5.31998C13.2244 5.22398 13.2564 5.04798 13.1844 4.91198L11.9044 2.69598C11.8244 2.55198 11.6564 2.50398 11.5124 2.55198L9.9204 3.19198C9.5844 2.93598 9.2324 2.72798 8.8404 2.56798L8.6004 0.871976C8.5764 0.711976 8.4404 0.599976 8.2804 0.599976H5.7204C5.5604 0.599976 5.4324 0.711976 5.4084 0.871976L5.1684 2.56798C4.7764 2.72798 4.4164 2.94398 4.0884 3.19198L2.4964 2.55198C2.3524 2.49598 2.1844 2.55198 2.1044 2.69598L0.824397 4.91198C0.744397 5.05598 0.776397 5.22398 0.904397 5.31998L2.2564 6.37598C2.2244 6.57598 2.2004 6.79198 2.2004 6.99998C2.2004 7.20798 2.2164 7.42398 2.2484 7.62398L0.896397 8.67998C0.776397 8.77598 0.744397 8.95198 0.816397 9.08798L2.0964 11.304C2.1764 11.448 2.3444 11.496 2.4884 11.448L4.0804 10.808C4.4164 11.064 4.7684 11.272 5.1604 11.432L5.4004 13.128C5.4324 13.288 5.5604 13.4 5.7204 13.4H8.2804C8.4404 13.4 8.5764 13.288 8.5924 13.128L8.8324 11.432C9.2244 11.272 9.5844 11.056 9.9124 10.808L11.5044 11.448C11.6484 11.504 11.8164 11.448 11.8964 11.304L13.1764 9.08798C13.2564 8.94398 13.2244 8.77598 13.0964 8.67998L11.7604 7.62398ZM7.0004 9.39998C5.6804 9.39998 4.6004 8.31998 4.6004 6.99998C4.6004 5.67998 5.6804 4.59998 7.0004 4.59998C8.3204 4.59998 9.4004 5.67998 9.4004 6.99998C9.4004 8.31998 8.3204 9.39998 7.0004 9.39998Z" fill="white"/>
                                    </svg>
                                    <span class="title"><?php echo esc_html__( 'MAIN ROW', 'knote' ); ?></span>
                                </a>
                            </p>
                            <div class="knote-builder-area knote-builder-area-left" data-builder-row="<?php echo esc_attr( $area ); ?>_row_main" data-builder-column="left"></div>
                            <div class="knote-builder-area knote-builder-area-center" data-builder-row="<?php echo esc_attr( $area ); ?>_row_main" data-builder-column="center"></div>
                            <div class="knote-builder-area knote-builder-area-right" data-builder-row="<?php echo esc_attr( $area ); ?>_row_main" data-builder-column="right"></div>
                        </div>
                        <div class="grid__item block-builder__row row-inner one-whole knote-builder-row-below knote-builder-below-row">
                            <p class="knote-builder-row-controls">
                                <a href="#" class="settings" onClick="wp.customize.section('knote_section_<?php echo esc_attr( $area ); ?>_row_below').focus();">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.7604 7.62398C11.7844 7.42398 11.8004 7.21598 11.8004 6.99998C11.8004 6.78398 11.7844 6.57598 11.7524 6.37598L13.1044 5.31998C13.2244 5.22398 13.2564 5.04798 13.1844 4.91198L11.9044 2.69598C11.8244 2.55198 11.6564 2.50398 11.5124 2.55198L9.9204 3.19198C9.5844 2.93598 9.2324 2.72798 8.8404 2.56798L8.6004 0.871976C8.5764 0.711976 8.4404 0.599976 8.2804 0.599976H5.7204C5.5604 0.599976 5.4324 0.711976 5.4084 0.871976L5.1684 2.56798C4.7764 2.72798 4.4164 2.94398 4.0884 3.19198L2.4964 2.55198C2.3524 2.49598 2.1844 2.55198 2.1044 2.69598L0.824397 4.91198C0.744397 5.05598 0.776397 5.22398 0.904397 5.31998L2.2564 6.37598C2.2244 6.57598 2.2004 6.79198 2.2004 6.99998C2.2004 7.20798 2.2164 7.42398 2.2484 7.62398L0.896397 8.67998C0.776397 8.77598 0.744397 8.95198 0.816397 9.08798L2.0964 11.304C2.1764 11.448 2.3444 11.496 2.4884 11.448L4.0804 10.808C4.4164 11.064 4.7684 11.272 5.1604 11.432L5.4004 13.128C5.4324 13.288 5.5604 13.4 5.7204 13.4H8.2804C8.4404 13.4 8.5764 13.288 8.5924 13.128L8.8324 11.432C9.2244 11.272 9.5844 11.056 9.9124 10.808L11.5044 11.448C11.6484 11.504 11.8164 11.448 11.8964 11.304L13.1764 9.08798C13.2564 8.94398 13.2244 8.77598 13.0964 8.67998L11.7604 7.62398ZM7.0004 9.39998C5.6804 9.39998 4.6004 8.31998 4.6004 6.99998C4.6004 5.67998 5.6804 4.59998 7.0004 4.59998C8.3204 4.59998 9.4004 5.67998 9.4004 6.99998C9.4004 8.31998 8.3204 9.39998 7.0004 9.39998Z" fill="white"/>
                                    </svg>
                                    <span class="title"><?php echo esc_html__( 'BOTTOM ROW', 'knote' ); ?></span>
                                </a>
                            </p>
                            <div class="knote-builder-area knote-builder-area-left" data-builder-row="<?php echo esc_attr( $area ); ?>_row_below" data-builder-column="left"></div>
                            <div class="knote-builder-area knote-builder-area-center" data-builder-row="<?php echo esc_attr( $area ); ?>_row_below" data-builder-column="center"></div>
                            <div class="knote-builder-area knote-builder-area-right" data-builder-row="<?php echo esc_attr( $area ); ?>_row_below" data-builder-column="right"></div>
                        </div>
                    </div>
                </div>
                <?php if(  $area == 'header' ): ?>
                    <div class="knote-builder-mobile">
                        <div class="builder-offcanvas">
                            <p class="knote-builder-row-controls">
                                <a href="#" class="settings" onClick="wp.customize.section('knote_section_header_mobile_offcanvas').focus();">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.7604 7.62398C11.7844 7.42398 11.8004 7.21598 11.8004 6.99998C11.8004 6.78398 11.7844 6.57598 11.7524 6.37598L13.1044 5.31998C13.2244 5.22398 13.2564 5.04798 13.1844 4.91198L11.9044 2.69598C11.8244 2.55198 11.6564 2.50398 11.5124 2.55198L9.9204 3.19198C9.5844 2.93598 9.2324 2.72798 8.8404 2.56798L8.6004 0.871976C8.5764 0.711976 8.4404 0.599976 8.2804 0.599976H5.7204C5.5604 0.599976 5.4324 0.711976 5.4084 0.871976L5.1684 2.56798C4.7764 2.72798 4.4164 2.94398 4.0884 3.19198L2.4964 2.55198C2.3524 2.49598 2.1844 2.55198 2.1044 2.69598L0.824397 4.91198C0.744397 5.05598 0.776397 5.22398 0.904397 5.31998L2.2564 6.37598C2.2244 6.57598 2.2004 6.79198 2.2004 6.99998C2.2004 7.20798 2.2164 7.42398 2.2484 7.62398L0.896397 8.67998C0.776397 8.77598 0.744397 8.95198 0.816397 9.08798L2.0964 11.304C2.1764 11.448 2.3444 11.496 2.4884 11.448L4.0804 10.808C4.4164 11.064 4.7684 11.272 5.1604 11.432L5.4004 13.128C5.4324 13.288 5.5604 13.4 5.7204 13.4H8.2804C8.4404 13.4 8.5764 13.288 8.5924 13.128L8.8324 11.432C9.2244 11.272 9.5844 11.056 9.9124 10.808L11.5044 11.448C11.6484 11.504 11.8164 11.448 11.8964 11.304L13.1764 9.08798C13.2564 8.94398 13.2244 8.77598 13.0964 8.67998L11.7604 7.62398ZM7.0004 9.39998C5.6804 9.39998 4.6004 8.31998 4.6004 6.99998C4.6004 5.67998 5.6804 4.59998 7.0004 4.59998C8.3204 4.59998 9.4004 5.67998 9.4004 6.99998C9.4004 8.31998 8.3204 9.39998 7.0004 9.39998Z" fill="white"/>
                                    </svg>
                                    <span class="title"><?php echo esc_html__( 'OFFCANVAS', 'knote' ); ?></span>
                                </a>
                            </p>
                            <div class="builder-offcanvas-components-wrapper">
                                <div class="knote-builder-area knote-builder-area-offcanvas" data-builder-row="mobile_offcanvas" data-builder-column="left"></div>
                            </div>
                        </div>
                        <div class="builder-offcanvas-row grid">
                            <div class="grid__item block-builder__row row-inner one-whole knote-builder-row-above knote-builder-above-row">
                                <p class="knote-builder-row-controls">
                                    <a href="#" class="settings" onClick="wp.customize.section('knote_section_<?php echo esc_attr( $area ); ?>_row_above').focus();">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.7604 7.62398C11.7844 7.42398 11.8004 7.21598 11.8004 6.99998C11.8004 6.78398 11.7844 6.57598 11.7524 6.37598L13.1044 5.31998C13.2244 5.22398 13.2564 5.04798 13.1844 4.91198L11.9044 2.69598C11.8244 2.55198 11.6564 2.50398 11.5124 2.55198L9.9204 3.19198C9.5844 2.93598 9.2324 2.72798 8.8404 2.56798L8.6004 0.871976C8.5764 0.711976 8.4404 0.599976 8.2804 0.599976H5.7204C5.5604 0.599976 5.4324 0.711976 5.4084 0.871976L5.1684 2.56798C4.7764 2.72798 4.4164 2.94398 4.0884 3.19198L2.4964 2.55198C2.3524 2.49598 2.1844 2.55198 2.1044 2.69598L0.824397 4.91198C0.744397 5.05598 0.776397 5.22398 0.904397 5.31998L2.2564 6.37598C2.2244 6.57598 2.2004 6.79198 2.2004 6.99998C2.2004 7.20798 2.2164 7.42398 2.2484 7.62398L0.896397 8.67998C0.776397 8.77598 0.744397 8.95198 0.816397 9.08798L2.0964 11.304C2.1764 11.448 2.3444 11.496 2.4884 11.448L4.0804 10.808C4.4164 11.064 4.7684 11.272 5.1604 11.432L5.4004 13.128C5.4324 13.288 5.5604 13.4 5.7204 13.4H8.2804C8.4404 13.4 8.5764 13.288 8.5924 13.128L8.8324 11.432C9.2244 11.272 9.5844 11.056 9.9124 10.808L11.5044 11.448C11.6484 11.504 11.8164 11.448 11.8964 11.304L13.1764 9.08798C13.2564 8.94398 13.2244 8.77598 13.0964 8.67998L11.7604 7.62398ZM7.0004 9.39998C5.6804 9.39998 4.6004 8.31998 4.6004 6.99998C4.6004 5.67998 5.6804 4.59998 7.0004 4.59998C8.3204 4.59998 9.4004 5.67998 9.4004 6.99998C9.4004 8.31998 8.3204 9.39998 7.0004 9.39998Z" fill="white"/>
                                        </svg>
                                        <span class="title"><?php echo esc_html__( 'TOP ROW', 'knote' ); ?></span>
                                    </a>
                                </p>
                                <div class="knote-builder-area knote-builder-area-left" data-builder-row="<?php echo esc_attr( $area ); ?>_row_above" data-builder-column="left"></div>
                                <div class="knote-builder-area knote-builder-area-center" data-builder-row="<?php echo esc_attr( $area ); ?>_row_above" data-builder-column="center"></div>
                                <div class="knote-builder-area knote-builder-area-right" data-builder-row="<?php echo esc_attr( $area ); ?>_row_above" data-builder-column="right"></div>
                            </div>
                            <div class="grid__item block-builder__row row-inner one-whole knote-builder-row-main knote-builder-main-row">
                                <p class="knote-builder-row-controls">
                                    <a href="#" class="settings" onClick="wp.customize.section('knote_section_<?php echo esc_attr( $area ); ?>_row_main').focus();">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.7604 7.62398C11.7844 7.42398 11.8004 7.21598 11.8004 6.99998C11.8004 6.78398 11.7844 6.57598 11.7524 6.37598L13.1044 5.31998C13.2244 5.22398 13.2564 5.04798 13.1844 4.91198L11.9044 2.69598C11.8244 2.55198 11.6564 2.50398 11.5124 2.55198L9.9204 3.19198C9.5844 2.93598 9.2324 2.72798 8.8404 2.56798L8.6004 0.871976C8.5764 0.711976 8.4404 0.599976 8.2804 0.599976H5.7204C5.5604 0.599976 5.4324 0.711976 5.4084 0.871976L5.1684 2.56798C4.7764 2.72798 4.4164 2.94398 4.0884 3.19198L2.4964 2.55198C2.3524 2.49598 2.1844 2.55198 2.1044 2.69598L0.824397 4.91198C0.744397 5.05598 0.776397 5.22398 0.904397 5.31998L2.2564 6.37598C2.2244 6.57598 2.2004 6.79198 2.2004 6.99998C2.2004 7.20798 2.2164 7.42398 2.2484 7.62398L0.896397 8.67998C0.776397 8.77598 0.744397 8.95198 0.816397 9.08798L2.0964 11.304C2.1764 11.448 2.3444 11.496 2.4884 11.448L4.0804 10.808C4.4164 11.064 4.7684 11.272 5.1604 11.432L5.4004 13.128C5.4324 13.288 5.5604 13.4 5.7204 13.4H8.2804C8.4404 13.4 8.5764 13.288 8.5924 13.128L8.8324 11.432C9.2244 11.272 9.5844 11.056 9.9124 10.808L11.5044 11.448C11.6484 11.504 11.8164 11.448 11.8964 11.304L13.1764 9.08798C13.2564 8.94398 13.2244 8.77598 13.0964 8.67998L11.7604 7.62398ZM7.0004 9.39998C5.6804 9.39998 4.6004 8.31998 4.6004 6.99998C4.6004 5.67998 5.6804 4.59998 7.0004 4.59998C8.3204 4.59998 9.4004 5.67998 9.4004 6.99998C9.4004 8.31998 8.3204 9.39998 7.0004 9.39998Z" fill="white"/>
                                        </svg>
                                        <span class="title"><?php echo esc_html__( 'MAIN ROW', 'knote' ); ?></span>
                                    </a>
                                </p>
                                <div class="knote-builder-area knote-builder-area-left" data-builder-row="<?php echo esc_attr( $area ); ?>_row_main" data-builder-column="left"></div>
                                <div class="knote-builder-area knote-builder-area-center" data-builder-row="<?php echo esc_attr( $area ); ?>_row_main" data-builder-column="center"></div>
                                <div class="knote-builder-area knote-builder-area-right" data-builder-row="<?php echo esc_attr( $area ); ?>_row_main" data-builder-column="right"></div>
                            </div>
                            <div class="grid__item block-builder__row row-inner one-whole knote-builder-row-below knote-builder-below-row">
                                <p class="knote-builder-row-controls">
                                    <a href="#" class="settings" onClick="wp.customize.section('knote_section_<?php echo esc_attr( $area ); ?>_row_below').focus();">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.7604 7.62398C11.7844 7.42398 11.8004 7.21598 11.8004 6.99998C11.8004 6.78398 11.7844 6.57598 11.7524 6.37598L13.1044 5.31998C13.2244 5.22398 13.2564 5.04798 13.1844 4.91198L11.9044 2.69598C11.8244 2.55198 11.6564 2.50398 11.5124 2.55198L9.9204 3.19198C9.5844 2.93598 9.2324 2.72798 8.8404 2.56798L8.6004 0.871976C8.5764 0.711976 8.4404 0.599976 8.2804 0.599976H5.7204C5.5604 0.599976 5.4324 0.711976 5.4084 0.871976L5.1684 2.56798C4.7764 2.72798 4.4164 2.94398 4.0884 3.19198L2.4964 2.55198C2.3524 2.49598 2.1844 2.55198 2.1044 2.69598L0.824397 4.91198C0.744397 5.05598 0.776397 5.22398 0.904397 5.31998L2.2564 6.37598C2.2244 6.57598 2.2004 6.79198 2.2004 6.99998C2.2004 7.20798 2.2164 7.42398 2.2484 7.62398L0.896397 8.67998C0.776397 8.77598 0.744397 8.95198 0.816397 9.08798L2.0964 11.304C2.1764 11.448 2.3444 11.496 2.4884 11.448L4.0804 10.808C4.4164 11.064 4.7684 11.272 5.1604 11.432L5.4004 13.128C5.4324 13.288 5.5604 13.4 5.7204 13.4H8.2804C8.4404 13.4 8.5764 13.288 8.5924 13.128L8.8324 11.432C9.2244 11.272 9.5844 11.056 9.9124 10.808L11.5044 11.448C11.6484 11.504 11.8164 11.448 11.8964 11.304L13.1764 9.08798C13.2564 8.94398 13.2244 8.77598 13.0964 8.67998L11.7604 7.62398ZM7.0004 9.39998C5.6804 9.39998 4.6004 8.31998 4.6004 6.99998C4.6004 5.67998 5.6804 4.59998 7.0004 4.59998C8.3204 4.59998 9.4004 5.67998 9.4004 6.99998C9.4004 8.31998 8.3204 9.39998 7.0004 9.39998Z" fill="white"/>
                                        </svg>
                                        <span class="title"><?php echo esc_html__( 'BOTTOM ROW', 'knote' ); ?></span>
                                    </a>
                                </p>
                                <div class="knote-builder-area knote-builder-area-left" data-builder-row="<?php echo esc_attr( $area ); ?>_row_below" data-builder-column="left"></div>
                                <div class="knote-builder-area knote-builder-area-center" data-builder-row="<?php echo esc_attr( $area ); ?>_row_below" data-builder-column="center"></div>
                                <div class="knote-builder-area knote-builder-area-right" data-builder-row="<?php echo esc_attr( $area ); ?>_row_below" data-builder-column="right"></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="knote-builder-bottom">
                <?php if(  $area == 'header' ): ?>
                    <div class="knote-builder-devices">
                        <div class="knote-builder-device">
                            <a href="#" class="knote-builder-device-link desktop active" data-device="desktop">
                                <span class="dashicons dashicons-desktop"></span>
                                <?php echo esc_html__( 'Desktop', 'knote' ); ?>
                            </a>
                        </div>
                        <div class="knote-builder-device">
                            <a href="#" class="knote-builder-device-link tablet" data-device="tablet">
                                <span class="dashicons dashicons-smartphone"></span>
                                <?php echo esc_html__( 'Mobile', 'knote' ); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="knote-builder-settings">
                    <a href="#" class="knote-builder-bottom-settings" onClick="wp.customize.section('knote_section_<?php echo esc_attr( $area ); ?>_wrapper').focus();">
                        <span class="dashicons dashicons-admin-generic"></span>
                    </a>
                    <a href="#" class="knote-builder-bottom-display active">
                        <div class="knote-builder-bottom-display-show show-builder">
                            <span class="dashicons dashicons-arrow-up-alt2"></span>
                            <?php echo esc_html__( 'Show', 'knote' ); ?>
                        </div>
                        <div class="knote-builder-bottom-display-hide hide-builder">
                            <span class="dashicons dashicons-arrow-down-alt2"></span>
                            <?php echo esc_html__( 'Hide', 'knote' ); ?>
                        </div>
                    </a>
                </div>
            </div>
        </div>


    <?php
    }

    /**
     * Header Builder Front Output
     */
    public function header_markup() {

        $devices = array( 'desktop', 'mobile' );
        foreach( $devices as $device ) { ?>
            <?php do_action( 'header_builder_before'); ?>
            <div class="builder-rows builder-<?php echo esc_attr( $device ); ?>">
                <div class="builder-inner__rows">
                    <?php
                        foreach( $this->header_rows as $row ) {
                            $styles = array();
                            $select     = str_replace( '_', '-', $row['id'] );
                            $hide_row   = (int) $this->is_row_empty( $this->get_row_data( $row['id'], 'header' )->$device );
                            $default    = '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }' ;
                            // if( str_contains( $row['id'], 'main' ) ){
                            //     $default    = '{ "unit": "px","top": "15", "right": "", "bottom": "15", "left": "" }' ;
                            // }
                            $margin     = Knote_Styles::dimensions_variables('knote_builder_'.$row['id'].'_margin', 'margin', $select );
                            $padding    = Knote_Styles::dimensions_variables('knote_builder_'.$row['id'].'_padding', 'padding', $select, $default);

                            if (is_array($margin)) {
                                $styles = array_merge($styles, $margin);
                            }

                            if (is_array($padding)) {
                                $styles = array_merge($styles, $padding);
                            }

                            if( !$hide_row ) { ?>
                                <div class="builder-row--area builder-<?php echo esc_attr( $row['id'] ); ?>" style="<?php echo esc_attr(implode(';', $styles)); ?>">
                                    <?php $this->customizer_edit_row_button( $row['id'] ); ?>
                                    <div class="builder-area-inner <?php echo esc_attr( apply_filters( 'knote_header_container', 'container' ) ); ?> ">
                                        <?php
                                            if( $this->get_row_data( $row['id'], 'header' ) === NULL ) {
                                                continue;
                                            }

                                            $attributes = $classes = array();

                                            // Classes
                                            $classes[] = 'grid';
                                            $classes[] = 'builder-inner';

                                            $columns = get_theme_mod( 'knote_builder_'.$row['id'].'_columns_'.$device, 3 );

                                            if( $device === 'desktop' ){
                                                $columns_layout = get_theme_mod( 'knote_builder_'.$row['id'].'_columns_layout_'.$device, 'column-3-fluid' );
                                            }else{
                                                $columns_layout_tablet = get_theme_mod( 'knote_builder_'.$row['id'].'_columns_layout_tablet', 'column-3-fluid' );
                                                // $columns_layout_mobile = get_theme_mod( 'knote_builder_'.$row['id'].'_columns_layout_mobile', 'column-3-equal' );
                                                $columns_layout = 'medium-'.$columns_layout_tablet;
                                            }

                                            $classes[] = $columns_layout;

                                            $attributes[] = 'class="'. esc_attr( implode( ' ', $classes ) ) .'"'; ?>

                                            <div <?php echo implode( ' ', $attributes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                                                <?php do_action( "header_{$row['id']}_before" ); ?>
                                                <?php $this->rows_callback( $row['id'], 'header', $device ); ?>
                                                <?php do_action( "header_{$row['id']}_after" ); ?>
                                            </div>
                                    </div>
                                </div>
                            <?php
                            }
                        }
                    ?>
                </div>
            </div>
        <?php } ?>
            <div class="builder--header-offcanvas header-offcanvas">
                <?php $this->mobile_offcanvas_callback(); ?>
            </div>
        <?php do_action( 'header_builder_after'); ?>
        <?php
    }

    /**
     * Footer Builder Front Output
     */
    public function footer_markup() {

        $devices = array( 'desktop' );
        foreach( $devices as $device ) { ?>
            <div class="builder-rows <?php echo esc_attr( $device ); ?>">
                <?php
                    foreach( $this->footer_rows as $row ) {
                        $hide_row = (int) $this->is_row_empty( $this->get_row_data( $row['id'], 'footer' )->$device );
                        if( !$hide_row ) {

                            $select     = str_replace( '_', '-', $row['id'] );
                            $default    = '{ "unit": "px","top": "15", "right": "", "bottom": "15", "left": "" }';

                            $styles = array();
                            $margin     = Knote_Styles::dimensions_variables('knote_builder_'.$row['id'].'_margin', 'margin', 'footer-row' );
                            $padding    = Knote_Styles::dimensions_variables('knote_builder_'.$row['id'].'_padding', 'padding', 'footer-row', $default);

                            $background_color = '--theme--footer-row-background:'.esc_attr( get_theme_mod( 'knote_builder_'.$row['id'].'_background_color', '#FBFBF9') );
                            $background = array( $background_color );

                            $border_width = '--theme--footer-row-border-width:'.esc_attr( get_theme_mod( 'knote_builder_'.$row['id'].'_border_bottom_desktop', 0) ).'px';
                            $border_color = '--theme--footer-row-border-color:'.esc_attr( get_theme_mod( 'knote_builder_'.$row['id'].'_border_bottom_color', '#EAEAEA') );

                            $border = array( $border_color, $border_width );

                            if (is_array($margin)) {
                                $styles = array_merge($styles, $margin);
                            }

                            if (is_array($padding)) {
                                $styles = array_merge($styles, $padding);
                            }

                            if (is_array($background)) {
                                $styles = array_merge($styles, $background);
                            }

                            if (is_array($border)) {
                                $styles = array_merge($styles, $border);
                            }


                            ?>
                            <div class="builder-row--area builder-<?php echo esc_attr( $row['id'] ); ?>" style="<?php echo esc_attr(implode(';', $styles)); ?>">
                                <?php $this->customizer_edit_row_button( $row['id'] ); ?>
                                <div class="<?php echo esc_attr( apply_filters( 'knote_footer_container', 'container' ) ); ?>">
                                    <?php
                                        if( $this->get_row_data( $row['id'], 'footer' ) === NULL ) {
                                            continue;
                                        }

                                        $attributes = $classes = array();

                                        // Classes
                                        $classes[] = 'grid';
                                        $classes[] = 'builder-inner';

                                        $row_class_default = 'column-3-equal';
                                        if( str_contains( $row['id'], 'below' ) ){
                                            $row_class_default = 'column-1-equal';
                                        }

                                        $columns = get_theme_mod( 'knote_builder_'.$row['id'].'_columns_'.$device, 3 );
                                        $columns_layout = get_theme_mod( 'knote_builder_'.$row['id'].'_columns_layout_'.$device, $row_class_default );

                                        $classes[] = $columns_layout;

                                        $attributes[] = 'class="'. esc_attr( implode( ' ', $classes ) ) .'"'; ?>

                                        <div <?php echo implode( ' ', $attributes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                                            <?php do_action( "footer_{$row['id']}_before" ); ?>
                                            <?php $this->rows_callback( $row['id'], 'footer', $device ); ?>
                                            <?php do_action( "footer_{$row['id']}_after" ); ?>
                                        </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                ?>
            </div>
        <?php
        }
    }

    /**
     * Header/Footer Builder get number of columns
     */
    public static function get_row_number_of_columns( $columns ) {
        $cols = 0;

        foreach( $columns as $columnComponents ) {
            $cols++;
        }

        return $cols;
    }

    /**
     * Check if row is empty (without any component)
     */
    public static function is_row_empty( $columns ) {
        $empty = true;

        foreach( $columns as $columnComponents ) {
            if( is_array( $columnComponents ) && count( $columnComponents ) > 0 ) {
                $empty = false;
            }
        }

        return $empty;
    }

    /**
     * Primary Menu
     */
    public function menu() {
        require get_template_directory() . '/includes/customizer/builder/components/header/menu/menu.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }

    /**
     * Secondary Menu
     */
    public function secondary_menu() {
        require get_template_directory() . '/includes/customizer/builder/components/header/secondary-menu/secondary-menu.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }

    /**
     * Social
     */
    public function social() {
        require get_template_directory() . '/includes/customizer/builder/components/header/social/social.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }

    /**
     * Search icon
     */
    public function search() {
        require get_template_directory() . '/includes/customizer/builder/components/header/search/search.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }

    /**
     * Search form
     */
    public function search_form() {
        require get_template_directory() . '/includes/customizer/builder/components/header/search/search-form.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }

    /**
     * Site branding
     */
    public function logo() {
        require get_template_directory() . '/includes/customizer/builder/components/header/logo/logo.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }

    /**
     * Button
     */
    public function button( $params ) {
        require get_template_directory() . '/includes/customizer/builder/components/'.$params['builder_type'].'/button/button.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }

    /**
     * Contact Info
     */
    public function contact_information() {
        require get_template_directory() . '/includes/customizer/builder/components/header/contact-info/contact-info.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }

    /**
     * WooCommerce Cart Icons
    */
    public function cart() {
        require get_template_directory() . '/includes/customizer/builder/components/header/cart/cart.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }

    /**
     * WooCommerce Cart Icons
    */
    public function account() {
        require get_template_directory() . '/includes/customizer/builder/components/header/account/account.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }

    /**
     * HTML
     */
    public function html( $params ) {
        require get_template_directory() . '/includes/customizer/builder/components/'.$params['builder_type'].'/html/html.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }

    /**
     * Mobile menu trigger
     */
    public function hamburger() {
        require get_template_directory() . '/includes/customizer/builder/components/header/hamburger/hamburger.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }

    /**
     * Mobile Offcanvas Menu
     */
    public function offcanvas_menu() {
        require get_template_directory() . '/includes/customizer/builder/components/header/offcanvas-menu/menu.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }

    /**
     * Widget(s)
     */
    public function widget1() {
        require get_template_directory() . '/includes/customizer/builder/components/footer/widget1/widget.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }
    public function widget2() {
        require get_template_directory() . '/includes/customizer/builder/components/footer/widget2/widget.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }
    public function widget3() {
        require get_template_directory() . '/includes/customizer/builder/components/footer/widget3/widget.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }
    public function widget4() {
        require get_template_directory() . '/includes/customizer/builder/components/footer/widget4/widget.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }

     /**
     * Copyright
     */
    public function credits() {
        require get_template_directory() . '/includes/customizer/builder/components/footer/copyright/copyright.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
    }

}

/**
 * Initialize class
 */
Knote_Builder::get_instance();
