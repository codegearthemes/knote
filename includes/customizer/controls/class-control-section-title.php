<?php
if ( ! defined('ABSPATH') ) {
	exit;
}

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}


class Knote_Control_Section_Title extends WP_Customize_Section {

	/**
	 * The type of control being rendered
	 */
	public $divider = false;
	public $type = 'knote-section-title';


	/**
	 * Render the control in the customizer
	 */
	public function render() {
		?>
		<li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="accordion-section control-section-title block-section__title">
            <?php if ( ! empty( $this->divider ) ) { ?>
				<hr />
			<?php } ?>
			<?php if ( ! empty( $this->title ) ) { ?>
				<h3 class="title"><?php echo esc_html( $this->title ); ?></h3>
			<?php } ?>
			<?php if ( ! empty( $this->description ) ) { ?>
				<span class="description"><?php echo esc_html( $this->description ); ?></span>
			<?php } ?>
		</li>
		<?php
	}
}
