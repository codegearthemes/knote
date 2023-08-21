<?php

/**
 * Customizer Control: Slider
 *
 * @package     Knote
 * @author      CodeGearThemes
 * @copyright   Copyright (c) 2020, Knote
 * @link        https://codegearthemes.com/
 * @since       0.1.0
 */
class Knote_Control_Slider extends WP_Customize_Control
{

	/**
	 * The type of control being rendered
	 */
	public $type = 'knote-slider';

	public $responsive;

	/**
	 * Render the control in the customizer
	 */
	public function render_content()
	{

		$step = 1;
		if (isset($this->input_attrs['step'])) {
			$step = $this->input_attrs['step'];
		}

		$desktop = $this->responsive ? '_desktop' : '';
		$responsive_class = $this->responsive ? 'responsive' : 'non-responsive';
		$responsive_class_desktop = $this->responsive ? 'responsive-control-desktop' : 'responsive-control';

?>
		<div class="range-slider range--slider-wrapper slider-range">
			<div class="block-control__heading control-heading">
				<div class="customize-control-title block-title <?php echo esc_attr( $responsive_class ); ?>">
					<span><?php echo esc_html( $this->label ); ?></span>
					<?php if ($this->responsive) : ?>
						<div class="devices-wrapper">
							<div class="devices devices-preview">
								<?php if( isset( $this->settings[ 'size_desktop' ] ) ) : ?>
									<button type="button" class="preview-desktop active" aria-pressed="true" data-device="desktop">
										<span class="screen-reader-text">Enter desktop preview mode</span>
										<i class="dashicons dashicons-desktop"></i>
									</button>
								<?php endif; ?>
								<?php if( isset( $this->settings[ 'size_tablet' ] ) ) : ?>
									<button type="button" class="preview-tablet" aria-pressed="false" data-device="tablet">
										<span class="screen-reader-text">Enter tablet preview mode</span>
										<i class="dashicons dashicons-tablet"></i>
									</button>
								<?php endif; ?>
								<?php if( isset( $this->settings[ 'size_mobile' ] ) ) : ?>
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
			<div class="<?php echo esc_attr( $responsive_class_desktop ); ?> range-slider-inner range--slider <?php echo esc_attr($responsive_class_desktop); ?> active <?php echo esc_attr($responsive_class); ?>">
				<input class="range--slider-range" type="range" value="<?php echo esc_attr($this->value('size_desktop')); ?>" <?php $this->link('size_desktop'); ?> min="<?php echo absint($this->input_attrs['min']); ?>" max="<?php echo absint($this->input_attrs['max']); ?>" step="<?php echo esc_attr($step); ?>">
				<input class="range--slider-value" type="number" value="<?php echo esc_attr($this->value('size_desktop')); ?>" <?php $this->link('size_desktop'); ?> min="<?php echo absint($this->input_attrs['min']); ?>" max="<?php echo absint($this->input_attrs['max']); ?>" step="<?php echo esc_attr($step); ?>">
				<?php if (isset($this->input_attrs['unit'])) : ?>
					<span><?php echo esc_html($this->input_attrs['unit']); ?></span>
				<?php endif; ?>
			</div>
			<?php if ($this->responsive) : ?>
				<?php if( isset( $this->settings[ 'size_tablet' ] ) ) : ?>
					<div class="responsive-control-tablet range-slider-inner range--slider tablet <?php if( !isset( $this->settings[ 'size_mobile' ] ) ){ echo esc_attr('responsive-control-mobile mobile'); } ?>">
						<input class="range--slider-range" type="range" value="<?php echo esc_attr($this->value('size_tablet')); ?>" <?php $this->link('size_tablet'); ?> min="<?php echo absint($this->input_attrs['min']); ?>" max="<?php echo absint($this->input_attrs['max']); ?>" step="<?php echo esc_attr($step); ?>">
						<input class="range--slider-value" type="number" value="<?php echo esc_attr($this->value('size_tablet')); ?>" <?php $this->link('size_tablet'); ?> min="<?php echo absint($this->input_attrs['min']); ?>" max="<?php echo absint($this->input_attrs['max']); ?>" step="<?php echo esc_attr($step); ?>">
						<?php if (isset($this->input_attrs['unit'])) : ?>
							<span><?php echo esc_html($this->input_attrs['unit']); ?></span>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if( isset( $this->settings[ 'size_mobile' ] ) ) : ?>
					<div class="responsive-control-mobile range-slider-inner range--slider mobile">
						<input class="range--slider-range" type="range" value="<?php echo esc_attr($this->value('size_mobile')); ?>" <?php $this->link('size_mobile'); ?> min="<?php echo absint($this->input_attrs['min']); ?>" max="<?php echo absint($this->input_attrs['max']); ?>" step="<?php echo esc_attr($step); ?>">
						<input class="range--slider-value" type="number" value="<?php echo esc_attr($this->value('size_mobile')); ?>" <?php $this->link('size_mobile'); ?> min="<?php echo absint($this->input_attrs['min']); ?>" max="<?php echo absint($this->input_attrs['max']); ?>" step="<?php echo esc_attr($step); ?>">
						<?php if (isset($this->input_attrs['unit'])) : ?>
							<span><?php echo esc_html($this->input_attrs['unit']); ?></span>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
<?php
	}
}
