<?php
/**
 * Knote review notice
 *
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

class Knote_Theme_Notice{

	/**
	 * Constructor
	 */
	public function __construct(){

		add_action('after_setup_theme', [$this, 'initiate_review_notice']);
		add_action('admin_notices', [$this, 'review_notice_markup'], 0);

		add_action('admin_init', [$this, 'ignore_theme_review_notice'], 0);
		add_action('admin_init', array($this, 'ignore_theme_review_notice_partially'), 0);

		add_action('switch_theme', [$this, 'review_notice_data_remove']);
		add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_scripts']);

	}

	/**
	 * Set the required option value as needed for theme review notice.
	 */
	public function initiate_review_notice(){

		if (!get_option('knote_theme_active_time')) {
			update_option('knote_theme_active_time', time());
		}
	}

	/**
	 * Show HTML markup if conditions meet.
	 */
	public function review_notice_markup(){

		$user_id                  = get_current_user_id();
		$current_user             = wp_get_current_user();
		$ignored_notice           = get_user_meta($user_id, 'knote_disable_review_notice', true);
		$ignored_notice_partially = get_user_meta($user_id, 'delay_knote_disable_review_notice_partially', true);

		if ((get_option('knote_theme_active_time') > strtotime('-16 day')) || ($ignored_notice_partially > strtotime('-16 day')) || ($ignored_notice)) {
			return;
		}

		?>
		<div class="notice notice-success theme-dashboard-notice is-dismissible" style="position:relative;">
			<a class="notice-dismiss" href="?nag_knote_disable_review_notice=0" style="text-decoration:none;"></a>
			<div class="block-review__message">
				<div class="stars">
					<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="18" height="18" x="0" y="0" viewBox="0 0 24 24" class="star">
						<path xmlns="http://www.w3.org/2000/svg" d="m23.363 8.584-7.378-1.127-3.307-7.044c-.247-.526-1.11-.526-1.357 0l-3.306 7.044-7.378 1.127c-.606.093-.848.83-.423 1.265l5.36 5.494-1.267 7.767c-.101.617.558 1.08 1.103.777l6.59-3.642 6.59 3.643c.54.3 1.205-.154 1.103-.777l-1.267-7.767 5.36-5.494c.425-.436.182-1.173-.423-1.266z" fill="#ffc107" data-original="#ffc107"></path>
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="18" height="18" x="0" y="0" viewBox="0 0 24 24" class="star">
						<path xmlns="http://www.w3.org/2000/svg" d="m23.363 8.584-7.378-1.127-3.307-7.044c-.247-.526-1.11-.526-1.357 0l-3.306 7.044-7.378 1.127c-.606.093-.848.83-.423 1.265l5.36 5.494-1.267 7.767c-.101.617.558 1.08 1.103.777l6.59-3.642 6.59 3.643c.54.3 1.205-.154 1.103-.777l-1.267-7.767 5.36-5.494c.425-.436.182-1.173-.423-1.266z" fill="#ffc107" data-original="#ffc107"></path>
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="18" height="18" x="0" y="0" viewBox="0 0 24 24" class="star">
						<path xmlns="http://www.w3.org/2000/svg" d="m23.363 8.584-7.378-1.127-3.307-7.044c-.247-.526-1.11-.526-1.357 0l-3.306 7.044-7.378 1.127c-.606.093-.848.83-.423 1.265l5.36 5.494-1.267 7.767c-.101.617.558 1.08 1.103.777l6.59-3.642 6.59 3.643c.54.3 1.205-.154 1.103-.777l-1.267-7.767 5.36-5.494c.425-.436.182-1.173-.423-1.266z" fill="#ffc107" data-original="#ffc107"></path>
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="18" height="18" x="0" y="0" viewBox="0 0 24 24" class="star">
						<path xmlns="http://www.w3.org/2000/svg" d="m23.363 8.584-7.378-1.127-3.307-7.044c-.247-.526-1.11-.526-1.357 0l-3.306 7.044-7.378 1.127c-.606.093-.848.83-.423 1.265l5.36 5.494-1.267 7.767c-.101.617.558 1.08 1.103.777l6.59-3.642 6.59 3.643c.54.3 1.205-.154 1.103-.777l-1.267-7.767 5.36-5.494c.425-.436.182-1.173-.423-1.266z" fill="#ffc107" data-original="#ffc107"></path>
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="18" height="18" x="0" y="0" viewBox="0 0 24 24" class="star">
						<path xmlns="http://www.w3.org/2000/svg" d="m23.363 8.584-7.378-1.127-3.307-7.044c-.247-.526-1.11-.526-1.357 0l-3.306 7.044-7.378 1.127c-.606.093-.848.83-.423 1.265l5.36 5.494-1.267 7.767c-.101.617.558 1.08 1.103.777l6.59-3.642 6.59 3.643c.54.3 1.205-.154 1.103-.777l-1.267-7.767 5.36-5.494c.425-.436.182-1.173-.423-1.266z" fill="#ffc107" data-original="#ffc107"></path>
					</svg>
				</div>
				<p class="block-message">
					<?php
					printf(
						/* Translators: %1$s current user display name. */
						esc_html__(
							'Hi %1$s, it\'s so exciting to see that you\'ve made significant progress in building your website. We have a small request that would mean the world to us. Could you please take a moment to give our website a glowing 5-star rating on WordPress? Your support and positive feedback will not only fuel our motivation but also help other users feel confident in choosing our theme. We truly appreciate your consideration and support. Thank you!',
							'knote'
						),
						'<strong>' . esc_html($current_user->display_name) . '</strong>'
					);
					?>
				</p>
				<div class="actions">
					<a class="button button-primary" href="https://wordpress.org/support/theme/knote/reviews/?filter=5#new-post" target="_blank"><?php esc_html_e('Ok, you deserve it', 'knote'); ?></a>
					<a class="button button-secondary" href="?delay_knote_disable_review_notice_partially=0"><?php esc_html_e('Nope, maybe later', 'knote'); ?></a>
					<a href="?nag_knote_disable_review_notice=0" class="button-tertiary"><?php esc_html_e('I already rated it', 'knote'); ?></a>
				</div>
			</div>
		</div>
	<?php
	}

	/**
	 * Disable review notice permanently
	 */
	public function ignore_theme_review_notice(){
		if (isset($_GET['nag_knote_disable_review_notice']) && '0' == $_GET['nag_knote_disable_review_notice']) {
			add_user_meta(get_current_user_id(), 'knote_disable_review_notice', 'true', true);
		}
	}

	/**
	 * Delay review notice
	 */
	public function ignore_theme_review_notice_partially(){

		if (isset($_GET['delay_knote_disable_review_notice_partially']) && '0' == $_GET['delay_knote_disable_review_notice_partially']) {
			update_user_meta(get_current_user_id(), 'delay_knote_disable_review_notice_partially', time());
		}
	}

	/**
	 * Delete data on theme switch
	 */
	public function review_notice_data_remove(){

		$get_all_users        = get_users();
		$theme_installed_time = get_option('knote_theme_active_time');

		// Delete options data.
		if ($theme_installed_time) {
			delete_option('knote_theme_active_time');
		}

		foreach ($get_all_users as $user) {

			$ignored_notice           = get_user_meta($user->ID, 'knote_disable_review_notice', true);
			$ignored_notice_partially = get_user_meta($user->ID, 'delay_knote_disable_review_notice_partially', true);

			if ($ignored_notice) {
				delete_user_meta($user->ID, 'knote_disable_review_notice');
			}

			if ($ignored_notice_partially) {
				delete_user_meta($user->ID, 'delay_knote_disable_review_notice_partially');
			}
		}
	}

	/**
	 * Enqueue styles
	 */
	public function admin_enqueue_scripts(){
		wp_enqueue_style('knote-notices-style', get_template_directory_uri() . '/assets/admin/css/notices.css', array(), KNOTE_VERSION, 'all');
	}
}

new Knote_Theme_Notice();
