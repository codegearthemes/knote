<?php
/**
 * Customizer Control: Dimension
 *
 * @package     Knote
 * @author      CodegearThemes
 * @copyright   Copyright (c) 2023, Knote
 * @link        https://codegearthemes.com/
 * @since       0.1.0
 */
class Knote_Control_Dimensions extends WP_Customize_Control {

	public $type = 'knote-dimensions';

    public $units = array();
    public $sides = array();

    public $responsive;

	/**
	 * Render the control in the customizer
	 */
	public function render_content(){
        $value = array(
            'desktop' => json_decode( $this->value( 'desktop' ) ),
            'tablet'  => json_decode( $this->value( 'tablet' ) ),
            'mobile'  => json_decode( $this->value( 'mobile' ) )
        );

        // Responsive identifier
        $responsive_class = 'non-responsive';
		if ( $this->responsive ) {
			$responsive_class = 'responsive';
		}

        ?>
		<div class="dimension-control-wrapper">
            <div class="dimensions-control">
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php if( !empty( $this->description ) ) { ?>
                    <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php } ?>
                <div class="dimensions-wrapper">
                    <div class="dimensions-header">

                        <div class="responsive-control-desktop dimensions-units preview-desktop active" data-device="desktop">
                            <select class="dimensions-unit">
                                <?php foreach( $this->units as $unit ) : ?>
                                    <option value="<?php echo esc_attr( $unit ); ?>" <?php selected( $unit, $value[ 'desktop' ]->unit, true ); ?>><?php echo esc_html( $unit ); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <?php if ( $this->responsive ) : ?>
                            <div class="responsive-control-tablet dimensions-units preview-tablet" data-device="tablet">
                                <select class="dimensions-unit">
                                    <?php foreach( $this->units as $unit ) : ?>
                                        <option value="<?php echo esc_attr( $unit ); ?>" <?php selected( $unit, $value[ 'tablet' ]->unit, true ); ?>><?php echo esc_html( $unit ); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="responsive-control-mobile dimensions-units preview-mobile" data-device="mobile">
                                <select class="dimensions-unit">
                                    <?php foreach( $this->units as $unit ) : ?>
                                        <option value="<?php echo esc_attr( $unit ); ?>" <?php selected( $unit, $value[ 'mobile' ]->unit, true ); ?>><?php echo esc_html( $unit ); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?php if ($this->responsive) : ?>
                                <div class="devices-wrapper">
                                    <div class="devices devices-preview">
                                        <button type="button" class="preview-desktop active" aria-pressed="true" data-device="desktop">
                                            <span class="screen-reader-text">Enter desktop preview mode</span>
                                            <i class="dashicons dashicons-desktop"></i>
                                        </button>
                                        <button type="button" class="preview-tablet" aria-pressed="false" data-device="tablet">
                                            <span class="screen-reader-text">Enter tablet preview mode</span>
                                            <i class="dashicons dashicons-tablet"></i>
                                        </button>
                                        <button type="button" class="preview-mobile" aria-pressed="false" data-device="mobile">
                                            <span class="screen-reader-text">Enter mobile preview mode</span>
                                            <i class="dashicons dashicons-smartphone"></i>
                                        </button>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                    </div>

                    <div class="dimensions-inputs responsive-control-desktop active" data-device-type="desktop">
                        <?php if( isset( $this->sides[ 'top' ] ) && $this->sides[ 'top' ] ) : ?>
                            <div class="dimensions-input-wrapper input-top">
                                <input type="number" min="-500" max="500" value="<?php echo esc_attr( $value[ 'desktop' ]->top ); ?>" data-side="top" class="dimensions-input" />
                                <label class="dimensions-input-label"><?php echo esc_html__( 'Top', 'knote' ); ?></label>
                            </div>
                        <?php endif; ?>
                        <?php if( isset( $this->sides[ 'right' ] ) && $this->sides[ 'right' ] ) : ?>
                            <div class="dimensions-input-wrapper input-right">
                                <input type="number" min="-500" max="500" value="<?php echo esc_attr( $value[ 'desktop' ]->right ); ?>" data-side="right" class="dimensions-input" />
                                <label class="dimensions-input-label"><?php echo esc_html__( 'Right', 'knote' ); ?></label>
                            </div>
                        <?php endif; ?>
                        <?php if( isset( $this->sides[ 'bottom' ] ) && $this->sides[ 'bottom' ] ) : ?>
                            <div class="dimensions-input-wrapper input-bottom">
                                <input type="number" min="-500" max="500" value="<?php echo esc_attr( $value[ 'desktop' ]->bottom ); ?>" data-side="bottom" class="dimensions-input" />
                                <label class="dimensions-input-label"><?php echo esc_html__( 'Bottom', 'knote' ); ?></label>
                            </div>
                        <?php endif; ?>
                        <?php if( isset( $this->sides[ 'left' ] ) && $this->sides[ 'left' ] ) : ?>
                            <div class="dimensions-input-wrapper input-left">
                                <input type="number" min="-500" max="500" value="<?php echo esc_attr( $value[ 'desktop' ]->left ); ?>" data-side="left" class="dimensions-input" />
                                <label class="dimensions-input-label"><?php echo esc_html__( 'Left', 'knote' ); ?></label>
                            </div>
                        <?php endif; ?>
                        <input type="hidden" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link( 'desktop' ); ?> class="dimensions-value" />
                    </div>
                    <?php if( $this->responsive ) : ?>
                        <div class="dimensions-inputs responsive-control-tablet" data-device-type="tablet">
                            <?php if( isset( $this->sides[ 'top' ] ) && $this->sides[ 'top' ] ) : ?>
                                <div class="dimensions-input-wrapper input-top">
                                    <input type="number" min="-500" max="500" value="<?php echo esc_attr( $value[ 'tablet' ]->top ); ?>" data-side="top" class="dimensions-input" />
                                    <label class="dimensions-input-label"><?php echo esc_html__( 'Top', 'knote' ); ?></label>
                                </div>
                            <?php endif; ?>
                            <?php if( isset( $this->sides[ 'right' ] ) && $this->sides[ 'right' ] ) : ?>
                                <div class="dimensions-input-wrapper input-right">
                                    <input type="number" min="-500" max="500" value="<?php echo esc_attr( $value[ 'tablet' ]->right ); ?>" data-side="right" class="dimensions-input" />
                                    <label class="dimensions-input-label"><?php echo esc_html__( 'Right', 'knote' ); ?></label>
                                </div>
                            <?php endif; ?>
                            <?php if( isset( $this->sides[ 'bottom' ] ) && $this->sides[ 'bottom' ] ) : ?>
                                <div class="dimensions-input-wrapper input-bottom">
                                    <input type="number" min="-500" max="500" value="<?php echo esc_attr( $value[ 'tablet' ]->bottom ); ?>" data-side="bottom" class="dimensions-input" />
                                    <label class="dimensions-input-label"><?php echo esc_html__( 'Bottom', 'knote' ); ?></label>
                                </div>
                            <?php endif; ?>
                            <?php if( isset( $this->sides[ 'left' ] ) && $this->sides[ 'left' ] ) : ?>
                                <div class="dimensions-input-wrapper input-left">
                                    <input type="number" min="-500" max="500" value="<?php echo esc_attr( $value[ 'tablet' ]->left ); ?>" data-side="left" class="dimensions-input" />
                                    <label class="dimensions-input-label"><?php echo esc_html__( 'Left', 'knote' ); ?></label>
                                </div>
                            <?php endif; ?>
                            <input type="hidden" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link( 'tablet' ); ?> class="dimensions-value" />
                        </div>
                        <div class="dimensions-inputs responsive-control-mobile" data-device-type="mobile">
                            <?php if( isset( $this->sides[ 'top' ] ) && $this->sides[ 'top' ] ) : ?>
                                <div class="dimensions-input-wrapper input-top">
                                    <input type="number" min="-500" max="500" value="<?php echo esc_attr( $value[ 'mobile' ]->top ); ?>" data-side="top" class="dimensions-input" />
                                    <label class="dimensions-input-label"><?php echo esc_html__( 'Top', 'knote' ); ?></label>
                                </div>
                            <?php endif; ?>
                            <?php if( isset( $this->sides[ 'right' ] ) && $this->sides[ 'right' ] ) : ?>
                                <div class="dimensions-input-wrapper input-right">
                                    <input type="number" min="-500" max="500" value="<?php echo esc_attr( $value[ 'mobile' ]->right ); ?>" data-side="right" class="dimensions-input" />
                                    <label class="dimensions-input-label"><?php echo esc_html__( 'Right', 'knote' ); ?></label>
                                </div>
                            <?php endif; ?>
                            <?php if( isset( $this->sides[ 'bottom' ] ) && $this->sides[ 'bottom' ] ) : ?>
                                <div class="dimensions-input-wrapper input-bottom">
                                    <input type="number" min="-500" max="500" value="<?php echo esc_attr( $value[ 'mobile' ]->bottom ); ?>" data-side="bottom" class="dimensions-input" />
                                    <label class="dimensions-input-label"><?php echo esc_html__( 'Bottom', 'knote' ); ?></label>
                                </div>
                            <?php endif; ?>
                            <?php if( isset( $this->sides[ 'left' ] ) && $this->sides[ 'left' ] ) : ?>
                                <div class="dimensions-input-wrapper input-left">
                                    <input type="number" min="-500" max="500" value="<?php echo esc_attr( $value[ 'mobile' ]->left ); ?>" data-side="left" class="dimensions-input" />
                                    <label class="dimensions-input-label"><?php echo esc_html__( 'Left', 'knote' ); ?></label>
                                </div>
                            <?php endif; ?>
                            <input type="hidden" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link( 'mobile' ); ?> class="dimensions-value" />
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
	<?php
	}
}
