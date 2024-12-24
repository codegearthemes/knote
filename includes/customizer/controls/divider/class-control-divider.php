<?php
/**
 * Customizer Control: Divider
 *
 * @package     Knote
 * @author      CodegearThemes
 * @copyright   Copyright (c) 2020, Knote
 * @link        https://CodegearThemes.com/
 * @since       0.1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Knote_Control_Divider extends WP_Customize_Control {

	/**
	 * The type of control being rendered
	 */
	public $type = 'knote-divider';

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
		<hr class="item-divider divider">
	<?php
	}
}
