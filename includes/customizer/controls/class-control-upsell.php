<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Knote_Control_Upsell extends WP_Customize_Control {

	/**
	 * The type of control being rendered
	 */
	public $title         = '';
	public $button_text   = '';
	public $type          = 'knote-upsell';
	public $button_link   = 'https://codegearthemes.com/upgrade?utm_source=theme_customizer_deep&utm_medium=button&utm_campaign=Knote';
	public $features_list = array();

	/**
	 * Constructor
	 */
	public function __construct( $manager, $id, $args = array(), $options = array() ) {

		parent::__construct( $manager, $id, $args );

		$this->button_text = esc_html__( 'Upgrade Now', 'knote' );
	}

	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
		if( class_exists( 'KnotePro' ) ) { return ''; }
		?>
		<div class="block-upsell__feature">
			<?php if( ! empty( $this->title ) ) : ?>
				<strong><?php echo esc_html( $this->title ); ?></strong>
			<?php endif; ?>
			<?php if( ! empty( $this->features_list ) ) : ?>
				<ul class="upsell-features-list">
					<?php foreach( $this->features_list as $feature ) : ?>
						<li>
                            <svg viewBox="0 0 64 64" class="w-16 h-16 shrink-0" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="32" cy="32" r="32" fill="#213fd4" fill-opacity="0.2"></circle>
                                <circle cx="32" cy="32" r="20" fill="#213fd4"></circle>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M29.4428 36.2766L39.8391 24.5044L41.2445 25.7455L29.5627 38.9734L23.2302 32.9722L24.52 31.6112L29.4428 36.2766Z" fill="#fff"></path>
                            </svg>
							<?php echo esc_html( $feature ); ?>
						</li>

					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			<a href="<?php echo esc_url( $this->button_link ) ?>" role="button" class="upsell-button__link" target="_blank">
				<?php echo esc_html( $this->button_text ); ?>
			</a>
		</div>
	<?php
	}
}
