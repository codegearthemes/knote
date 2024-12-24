<?php
/**
 * Radio Image Customizer Control.
 *
 * @author      CodegearThemes
 * @category    WordPress
 * @package     Knote
 * @subpackage  Controls
 * @since       0.1.0
 *
 */
if ( ! defined( 'ABSPATH' ) ) exit;

if ( class_exists( 'WP_Customize_Control' ) ) {
  class Knote_Control_RadioImage extends WP_Customize_Control {

        public $type = 'knote-radio-image';

        public $columns;

        public $responsive;
		/**
		 * Render the control's content.
		 */
		public function render_content() {

            if ( empty( $this->choices ) )
				return;

			$desktop = $this->responsive ? '_desktop' : '';
			$premium = defined( 'KNOTE_VERSION_PRO' ) ? true : false;
            $responsive_class = $this->responsive ? 'responsive' : 'non-responsive';
            $responsive_class_desktop = $this->responsive ? 'desktop' : '';

			if( $this->responsive ) {
				if( !isset( $this->settings[ 'tablet' ] ) ){
					$responsive_class_desktop .= ' responsive-control-tablet';
				}

				if( !isset( $this->settings[ 'mobile' ] ) && !isset( $this->settings[ 'tablet' ] ) ){
					$responsive_class_desktop .= ' responsive-control-mobile';
				}
			}

			?>
			<div class="block-control__heading control-heading">
				<div class="customize-control-title block-title <?php echo esc_attr( $responsive_class ); ?>">
					<span><?php echo esc_html( $this->label ); ?></span>
					<?php if ($this->responsive) : ?>
						<div class="devices-wrapper">
							<div class="devices devices-preview">
								<?php if( isset( $this->settings[ 'desktop' ] ) ) : ?>
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

            <div id="<?php echo esc_attr( "input_{$this->id}{$desktop}" ); ?>" class="<?php echo esc_attr( $responsive_class ) ?> responsive-control-<?php echo esc_attr( $responsive_class_desktop ); ?> buttonset-setting <?php echo esc_attr( $responsive_class_desktop ); ?> <?php echo esc_attr( "radio-image-{$this->columns}" ); ?>">
                <div class="radio-image <?php echo esc_attr( $this->columns ); ?>">
					<?php foreach ( $this->choices as $value => $args ) : ?>
						<label for="<?php echo esc_attr( "{$this->id}{$desktop}-{$value}" ); ?>">
							<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( "_customize-radio-{$this->id}{$desktop}" ); ?>" id="<?php echo esc_attr( "{$this->id}{$desktop}-{$value}" ); ?>" <?php $this->responsive ? $this->link( 'desktop' ) : $this->link(); ?> <?php checked( $this->responsive ? $this->value( 'desktop' ) : $this->value(), $value ); ?> <?php if( isset( $args[ 'pro' ] ) && $args[ 'pro' ] && !$premium ){ echo esc_attr('disabled'); } ?> />
							<img src="<?php echo esc_url( sprintf( $args['url'], get_template_directory_uri(), get_stylesheet_directory_uri() ) ); ?>" alt="<?php echo esc_attr( $args['label'] ); ?>">
							<?php if(isset( $value )): ?>
								<span class="visibility-hidden name"><?php echo esc_html( $args['label'] ); ?></span>
							<?php endif; ?>
							<?php if( !$premium ): ?>
								<?php if( isset( $args[ 'pro' ] ) && $args[ 'pro' ] ): ?>
									<span class="premium"><?php esc_html_e('Pro', 'knote'); ?></span>
								<?php endif; ?>
							<?php endif; ?>
						</label>
					<?php endforeach; ?>
				</div>
            </div>

            <?php if ( $this->responsive ) : ?>
				<?php if( isset( $this->settings[ 'tablet' ] ) ) : ?>
					<div id="<?php echo esc_attr( "input_{$this->id}_tablet" ); ?>" class="<?php echo esc_attr( $responsive_class ) ?> responsive-control-tablet buttonset-setting <?php if( !isset( $this->settings[ 'mobile' ] ) ){ echo esc_attr('responsive-control-mobile mobile'); } ?> tablet <?php echo esc_attr( "radio-image-{$this->columns}" ); ?>">
						<div class="radio-image <?php echo esc_attr( $this->columns ); ?>">
							<?php foreach ( $this->choices as $value => $args ) : ?>

								<label for="<?php echo esc_attr( "{$this->id}_tablet-{$value}" ); ?>">
									<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( "_customize-radio-{$this->id}_tablet" ); ?>" id="<?php echo esc_attr( "{$this->id}_tablet-{$value}" ); ?>" <?php $this->link( 'tablet' ); ?> <?php checked( $this->value( 'tablet' ), $value ); ?> <?php if( isset( $args[ 'pro' ] ) && $args[ 'pro' ] && !defined( 'KNOTE_VERSION_PRO' ) ){ echo esc_attr('disabled'); } ?> />
									<img src="<?php echo esc_url( sprintf( $args['url'], get_template_directory_uri(), get_stylesheet_directory_uri() ) ); ?>" alt="<?php echo esc_attr( $args['label'] ); ?>">
									<?php if(isset( $value )): ?>
										<span class="visibility-hidden name"><?php echo esc_html( $args['label'] ); ?></span>
									<?php endif; ?>
									<?php if( $premium ): ?>
										<?php if( isset( $args[ 'pro' ] ) && $args[ 'pro' ] ): ?>
											<span class="premium"><?php esc_html_e('Pro', 'knote'); ?></span>
										<?php endif; ?>
									<?php endif; ?>
								</label>

							<?php endforeach; ?>
						</div>
					</div>
                <?php endif; ?>

				<?php if( isset( $this->settings[ 'mobile' ] ) ) : ?>
					<div id="<?php echo esc_attr( "input_{$this->id}_mobile" ); ?>" class="<?php echo esc_attr( $responsive_class ) ?> responsive-control-mobile buttonset-setting mobile <?php echo esc_attr( "radio-image-{$this->columns}" ); ?>">
						<div class="radio-image <?php echo esc_attr( $this->columns ); ?>">
							<?php foreach ( $this->choices as $value => $args ) : ?>
								<label for="<?php echo esc_attr( "{$this->id}_mobile-{$value}" ); ?>">
									<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( "_customize-radio-{$this->id}_mobile" ); ?>" id="<?php echo esc_attr( "{$this->id}_mobile-{$value}" ); ?>" <?php $this->link( 'mobile' ); ?> <?php checked( $this->value( 'mobile' ), $value ); ?> <?php if( isset( $args[ 'pro' ] ) && $args[ 'pro' ] && !defined( 'KNOTE_VERSION_PRO' ) ){ echo esc_attr('disabled'); } ?> />
									<img src="<?php echo esc_url( sprintf( $args['url'], get_template_directory_uri(), get_stylesheet_directory_uri() ) ); ?>" alt="<?php echo esc_attr( $args['label'] ); ?>">
									<?php if(isset( $value )): ?>
										<span class="visibility-hidden name"><?php echo esc_html( $args['label'] ); ?></span>
									<?php endif; ?>
									<?php if( $premium ): ?>
										<?php if( isset( $args[ 'pro' ] ) && $args[ 'pro' ] ): ?>
											<span class="premium"><?php esc_html_e('Pro', 'knote'); ?></span>
										<?php endif; ?>
									<?php endif; ?>
								</label>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
            <?php endif; ?>


            <?php if ( ! empty( $this->description ) && isset( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <?php endif; ?>
			<?php
		}
	}

}
