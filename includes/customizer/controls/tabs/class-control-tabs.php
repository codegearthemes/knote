<?php
/**
 * Customizer Control: Tabs
 *
 * @package     Knote
 * @author      CodegearThemes
 * @copyright   Copyright (c) 2020, Knote
 * @link        https://codegearthemes.com/
 * @since       0.1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Knote_Control_Tabs extends WP_Customize_Control {

	/**
	 * The type of control being rendered
	 */
	public $type = 'knote-tabs-control';

	public $controls_design;
	public $controls_general;


	/**
	 * Constructor
	 */
	public function __construct( $manager, $id, $args = array(), $options = array() ) {
		parent::__construct( $manager, $id, $args );
	}

	/**
	 * Render the control in the customizer
	 */
	public function render_content() { ?>
        <div class="control-tabs">
            <div class="control-tab control-tab-general active" data-connected="<?php echo esc_attr( $this->controls_general ); ?>"><?php echo esc_html__( 'General', 'knote' ); ?></div>
            <div class="control-tab control-tab-design" data-connected="<?php echo esc_attr( $this->controls_design ); ?>"><?php echo esc_html__( 'Style', 'knote' ); ?></div>
        </div>
	<?php
	}
}
