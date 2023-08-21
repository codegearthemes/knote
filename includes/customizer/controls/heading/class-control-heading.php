<?php
/**
 * Customizer Control: Heading
 *
 * @package     Knote
 * @author      CodeGearThemes
 * @copyright   Copyright (c) 2020, Knote
 * @link        https://codegearthemes.com/
 * @since       0.1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * A text control with validation for CSS units.
 */
class Knote_Control_Heading extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'knote-heading';

	/**
	 * Constructor
	 */
	public function __construct( $manager, $id, $args = array(), $options = array() ) {
		parent::__construct( $manager, $id, $args );
	}

	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
		?>
			<?php if( !empty( $this->label ) ) { ?>
				<span class="customize-control-title heading--title"><?php echo wp_kses_post( $this->label ); ?></span>
			<?php } ?>
			<?php if( !empty( $this->description ) ) { ?>
				<span class="customize-control-description"><?php echo $this->description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
			<?php } ?>
		<?php
	}
}


