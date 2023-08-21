<?php
/**
 * Knote Accordion Control
 *
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Knote_Control_Accordion extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 */
	public $type  = 'knote-accordion';
    public $connected = '';


	/**
	 * Constructor
	 */
	public function __construct( $manager, $id, $args = array(), $options = array() ) {
		parent::__construct( $manager, $id, $args );
	}

    /**
     * Displays the control content.
     *
     */
    public function render_content() { ?>
        <div class="customizer-accordion-header">
            <a href="#" class="accordion-title" data-connected="<?php echo esc_attr( $this->connected ); ?>"><?php echo esc_html( $this->label ); ?></a>
        </div>
    <?php
    }
}
