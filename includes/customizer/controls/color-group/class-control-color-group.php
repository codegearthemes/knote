<?php
/**
 * Customizer Control: Color Group
 *
 * @package     Knote
 * @author      CodeGearThemes
 * @link        https://codegearthemes.com/
 * @since       0.1.0
 */
class Knote_Control_ColorGroup extends WP_Customize_Control {

	public $type = 'knote-color-group';

	/**
	 * Add support for palettes to be passed in.
	 *
	 * Supported palette values are true, false, or an array of RGBa and Hex colors.
	 */
	public $palette;

	public $border;
	/**
	 * Add support for showing the opacity value on the slider handle.
	 */
	public $show_opacity;

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
			<div class="control-color-alpha control-color-group <?php if( $this->border ){ echo esc_attr('has-border'); } ?>">
				<?php // Output the label and description if they were passed in.
				if ( isset( $this->label ) && '' !== $this->label ) {
					echo '<span class="color-control-title">' . esc_html( $this->label ) . '</span>';
				}
				if ( isset( $this->description ) && '' !== $this->description ) {
					echo '<span class="description customize-control-description">' . esc_html( $this->description ) . '</span>';
				} ?>
				<div class="block-color-controls">
					<?php foreach ( array_keys( $this->settings ) as $key => $value ) : ?>
						<div class="color-control-item" data-control-id="<?php echo esc_attr( $this->settings[ $value ]->id ); ?>">
							<div class="color-label">
								<?php
									if ( $key === 0 ) {
										esc_html_e( 'Normal', 'knote' );
									} else {
										esc_html_e( 'Hover', 'knote' );
									}
								?>
							</div>

							<input type="text" value="<?php echo esc_attr( $this->value( $value ) ); ?>" name="<?php echo esc_attr( $this->settings[ $value ]->id ); ?>" class="alpha-color-control testnext" data-color-val="<?php echo esc_attr( $this->value( $value ) ); ?>"  data-show-opacity="<?php echo esc_attr( $show_opacity ); ?>" data-palette="<?php echo esc_attr( $palette ); ?>" data-default-color="<?php echo esc_attr( $this->settings[ $value ]->default ); ?>" <?php $this->link( $value ); ?>  />
						</div>
					<?php endforeach; ?>
				</div>
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
