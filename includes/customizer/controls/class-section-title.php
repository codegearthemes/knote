<?php
/**
 * Customizer Control: Title
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

class Knote_Section_Title extends WP_Customize_Section {

	/**
	 * The type of control being rendered
	 */
	public $type = 'knote-seciton-title';

	public $divider = false;

	/**
	 * Render the control in the customizer
	 */
	public function render() {
		?>
		<li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="accordion-section knote-section-title <?php if ( ! empty( $this->divider ) ) { echo "has-divider"; }?>">
			<?php if ( ! empty( $this->title ) ) { ?>
				<h3><?php echo esc_html( $this->title ); ?></h3>
			<?php } ?>
			<?php if ( ! empty( $this->description ) ) { ?>
				<span class="description"><?php echo esc_html( $this->description ); ?></span>
			<?php } ?>
		</li>
		<?php
	}
}
