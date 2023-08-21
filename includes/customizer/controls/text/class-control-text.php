<?php
/**
 * Customizer Control: Text
 *
 * @author      CodeGearThemes
 * @category    WordPress
 * @package     Knote
 * @version     0.1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Knote_Control_Text extends WP_Customize_Control {

	/**
	 * The type of control being rendered
	 */
	public $type = 'knote-text';


	public $link = '';
	public $link_title = '';

	public $controls_general;

	public $controls_design;


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
		<?php if( !empty( $this->label ) ) { ?>
			<span class="customize-control-title"><?php echo wp_kses_post( $this->label ); ?></span>
		<?php } ?>
		<?php if( !empty( $this->description ) ) { ?>
			<span class="customize-control-description"><?php echo $this->description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
		<?php } ?>
		<?php if( !empty( $this->link_title ) && !empty( $this->link ) ) { ?>
			<a href="<?php echo esc_url( $this->link ); ?>" target="_blank"><?php echo $this->link_title; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
		<?php } ?>
	<?php
	}
}
