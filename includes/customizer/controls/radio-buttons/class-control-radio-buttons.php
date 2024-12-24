<?php
/**
 * Customizer Control: Radio Buttons
 *
 * @package     Knote
 * @author      CodegearThemes
 * @copyright   Copyright (c) 2020, Knote
 * @link        https://codegearthemes.com/
 * @since       0.1.0
 */
class Knote_Control_RadioButtons extends WP_Customize_Control {

	public $type = 'knote-radio-buttons';

	public $responsive;

	public function render_content() {

		$allowed_tags = array(
			'div' => array(
				'style' => array()
			),
			'svg'     => array(
				'class'       => true,
				'xmlns'       => true,
				'width'       => true,
				'height'      => true,
				'viewbox'     => true,
				'aria-hidden' => true,
				'role'        => true,
				'focusable'   => true,
				'fill'			=> true,
				'stroke'		=> true,
				'stroke-width'  => true,
				'stroke-linecap' => true,
				'stroke-linejoin' => true,
			),
			'line'	=> array(
				'x1' => true,
				'x2' => true,
				'y1' => true,
				'y2' => true,
			),
			'circle' => array(
				'cx' => true,
				'cy' => true,
				'r' => true,
			),
			'path'    => array(
				'd'      => true,
			),
			'polyline' => array(
				'points' => true,
			),
			'rect'    => array(
				'x'      => true,
				'y'      => true,
				'width'  => true,
				'height' => true,
				'transform' => true
			),
		);

		$responsive_class = $this->responsive ? 'responsive' : 'non-responsive';
		$responsive_class_desktop = $this->responsive ? '-desktop desktop' : '';

		if( $this->responsive ) {
			if( !isset( $this->settings[ 'tablet' ] ) ){
				$responsive_class_desktop .= ' responsive-control-tablet';
			}

			if( !isset( $this->settings[ 'mobile' ] ) && !isset( $this->settings[ 'tablet' ] ) ){
				$responsive_class_desktop .= ' responsive-control-mobile';
			}
		}

		?>
			<div class="text_radio_button_control">
				<?php if( !empty( $this->label ) ) { ?>
					<div class="block-control__heading control-heading">
						<div class="customize-control-title block-title <?php echo esc_attr( $responsive_class ); ?>">
							<span><?php echo esc_html( $this->label ); ?></span>
							<?php if ($this->responsive) : ?>
								<div class="devices-wrapper">
									<div class="devices devices-preview">
										<?php if( isset( $this->settings[ 'desktop' ] ) && isset( $this->settings[ 'tablet' ] ) ) : ?>
											<button type="button" class="preview-desktop active" aria-pressed="true" data-device="desktop">
												<span class="screen-reader-text">Enter desktop preview mode</span>
												<i class="dashicons dashicons-desktop"></i>
											</button>
										<?php endif; ?>
										<?php if( isset( $this->settings[ 'tablet' ] ) ) : ?>
											<button type="button" class="preview-tablet" aria-pressed="false" data-device="tablet">
												<span class="screen-reader-text">Enter tablet preview mode</span>
												<i class="dashicons dashicons-tablet"></i>
											</button>
										<?php endif; ?>
										<?php if( isset( $this->settings[ 'mobile' ] ) ) : ?>
											<button type="button" class="preview-mobile" aria-pressed="false" data-device="mobile">
												<span class="screen-reader-text">Enter mobile preview mode</span>
												<i class="dashicons dashicons-smartphone"></i>
											</button>
										<?php endif; ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php } ?>

				<div class="radio-buttons responsive-control<?php echo esc_attr( $responsive_class_desktop ); ?> active">
					<?php foreach ( $this->choices as $key => $value ) { ?>
						<label class="radio-button-label">
						<input type="radio" name="<?php echo esc_attr( $this->id ); echo $this->responsive ? '_desktop' : ''; ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->responsive ? $this->link( 'desktop' ) : $this->link(); ?> <?php checked( esc_attr( $key ), $this->responsive ? $this->value( 'desktop' ) : $this->value() ); ?>/>
							<span><?php echo wp_kses( $value, $allowed_tags ); ?></span>
						</label>
					<?php	} ?>
				</div>

				<?php if ( $this->responsive ) : ?>
					<?php if( isset( $this->settings[ 'tablet' ] ) ) : ?>
						<div class="radio-buttons responsive-control-tablet tablet <?php if( !isset( $this->settings[ 'mobile' ] ) ){ echo esc_attr('responsive-control-mobile mobile'); } ?>">
						<?php foreach ( $this->choices as $key => $value ) { ?>
							<label class="radio-button-label">
								<input type="radio" name="<?php echo esc_attr( $this->id . '_tablet' ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link( 'tablet' ); ?> <?php checked( esc_attr( $key ), $this->value( 'tablet' ) ); ?>/>
								<span><?php echo wp_kses( $value, $allowed_tags ); ?></span>
							</label>
						<?php	} ?>
						</div>
					<?php endif; ?>
					<?php if( isset( $this->settings[ 'mobile' ] ) ) : ?>
						<div class="radio-buttons responsive-control-mobile  mobile">
						<?php foreach ( $this->choices as $key => $value ) { ?>
							<label class="radio-button-label">
								<input type="radio" name="<?php echo esc_attr( $this->id . '_mobile' ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link( 'mobile' ); ?> <?php checked( esc_attr( $key ), $this->value( 'mobile' ) ); ?>/>
								<span><?php echo wp_kses( $value, $allowed_tags ); ?></span>
							</label>
						<?php	} ?>
						</div>
					<?php endif; ?>
				<?php endif; ?>

				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>

			</div>
		<?php
	}
}
