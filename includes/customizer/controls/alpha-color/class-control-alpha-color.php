<?php
/**
 * Customizer Control: Alpha Color
 *
 * @package     Knote
 * @author      CodegearThemes
 * @link        https://codegearthemes.com/
 * @since       0.1.0
 */
class Knote_Control_AlphaColor extends WP_Customize_Control {

	public $type = 'knote-alpha-color';

	/**
	 * Add support for palettes to be passed in.
	 *
	 * Supported palette values are true, false, or an array of RGBa and Hex colors.
	 */
	public $palette;
	/**
	 * Add support for showing the opacity value on the slider handle.
	 */
	public $show_opacity;

	public $border;

	public function render_content() {

		// Process the palette
		if ( is_array( $this->palette ) ) {
			$palette = implode( '|', $this->palette );
		} else {
			// Default to true.
			$palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
		}

		// Support passing show_opacity as string or boolean. Default to true.
		$show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';

		?>
			<div class="control-color-alpha <?php if( $this->border ){ echo esc_attr('has-border'); } ?>">
				<?php // Output the label and description if they were passed in.
					if ( isset( $this->label ) && '' !== $this->label ) {
						echo '<span class="color-control-title">' . esc_html( $this->label ) . '</span>';
					}
					if ( isset( $this->description ) && '' !== $this->description ) {
						echo '<span class="description customize-control-description">' . esc_html( $this->description ) . '</span>';
					} ?>
					<input type="text" value="<?php echo esc_attr( $this->value() ); ?>" class="alpha-color-control" data-color-val="<?php echo esc_attr( $this->value() ); ?>" data-show-opacity="<?php echo esc_attr( $show_opacity ); ?>" data-palette="<?php echo esc_attr( $palette ); ?>" data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>" <?php $this->link(); ?>  />
			</div>
	<?php
	}

	/**
	 * Loads the jQuery UI Button script and hooks our custom styles in.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'wp-color-picker' );
	}
}
