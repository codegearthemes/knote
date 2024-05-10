<?php

/**
 * Builder
 * Social Component
 *
 * @package Knote
 */

$styles = array();
$margin = Knote_Styles::dimensions_variables('knote_header_component_social_margin', 'margin', 'social');
$padding = Knote_Styles::dimensions_variables('knote_header_component_social_padding', 'padding', 'social');

if (is_array($margin)) {
	$styles = array_merge($styles, $margin);
}

if (is_array($padding)) {
	$styles = array_merge($styles, $padding);
}

?>

<div class="builder-item component-social" style="<?php echo esc_attr(implode(';', $styles)); ?>" data-element-id="button" data-component>
	<?php do_action('header_builder_social_start'); ?>
	<?php $this->customizer_edit_button('social'); ?>
	<?php

	$styles = array();

	$knote_social_color               = get_theme_mod('knote_header_component_social_color', '#212121');
	$knote_social_color_hover         = get_theme_mod('knote_header_component_social_color_hover', '#757575');

	$knote_social_sticky_color        = get_theme_mod('knote_header_component_social_color_sticky_color', '#212121');
	$knote_social_sticky_color_hover  = get_theme_mod('knote_header_component_social_color_sticky_color_hover', '#757575');

	$styles[] = '--social-icon-color:' . esc_attr($knote_social_color);
	$styles[] = '--social-icon-color-hover:' . esc_attr($knote_social_color_hover);

	if (get_theme_mod('knote_header_builder_sticky_enable', 0)) {
		$styles[] = '--social-icon-sticky-color:' . esc_attr($knote_social_sticky_color);
		$styles[] = '--social-icon-sticky-color-hover:' . esc_attr($knote_social_sticky_color_hover);
	}

	?>
	<div class="block-social" style="<?php echo esc_attr(implode(';', $styles)); ?>">
		<ul class="social-icons clearfix">
			<?php do_action('header_builder_social'); ?>
			<?php

			$knote_facebook_link  = get_theme_mod('knote_header_component_social_facebook_url', '');
			$knote_twitter_link   = get_theme_mod('knote_header_component_social_twitter_url', '');
			$knote_linkedin_link  = get_theme_mod('knote_header_component_social_linkedin_url', '');
			$knote_instagram_link = get_theme_mod('knote_header_component_social_instagram_url', '');
			$knote_pinterest_link = get_theme_mod('knote_header_component_social_pinterest_url', '');
			$knote_youtube_link   = get_theme_mod('knote_header_component_social_youtube_url', '');


			if (!empty($knote_facebook_link)) : ?>
				<li class="text-center">
					<?php /* translators: %s: Network name */ ?>
					<a href="<?php echo esc_url($knote_facebook_link); ?>" title="<?php echo esc_attr(sprintf(__('%1$s on %2$s', 'knote'), bloginfo('name'), __('Facebook', 'knote'))); ?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-facebook">
							<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
						</svg>
					</a>
				</li>
			<?php
			endif;
			if (!empty($knote_twitter_link)) : ?>
				<li class="text-center">
					<?php /* translators: %s: Network name */ ?>
					<a href="<?php echo esc_url($knote_twitter_link); ?>" title="<?php echo esc_attr(sprintf(__('%1$s on %2$s', 'knote'), bloginfo('name'), __('Twitter', 'knote'))); ?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-twitter">
							<path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
						</svg>
					</a>
				</li>
			<?php
			endif;
			if (!empty($knote_linkedin_link)) : ?>
				<li class="text-center">
					<?php /* translators: %s: Network name */ ?>
					<a href="<?php echo esc_url($knote_linkedin_link); ?>" title="<?php echo esc_attr(sprintf(__('%1$s on %2$s', 'knote'), bloginfo('name'), __('LinkedIn', 'knote'))); ?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-linkedin">
							<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
							<rect x="2" y="9" width="4" height="12"></rect>
							<circle cx="4" cy="4" r="2"></circle>
						</svg>
					</a>
				</li>
			<?php
			endif;
			if (!empty($knote_instagram_link)) : ?>
				<li class="text-center">
					<?php /* translators: %s: Network name */ ?>
					<a href="<?php echo esc_url($knote_instagram_link); ?>" title="<?php echo esc_attr(sprintf(__('%1$s on %2$s', 'knote'), bloginfo('name'), __('Instagram', 'knote'))); ?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-instagram">
							<rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
							<path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
							<line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
						</svg>
					</a>
				</li>
			<?php
			endif;
			if (!empty($knote_youtube_link)) : ?>
				<li class="text-center">
					<?php /* translators: %s: Network name */ ?>
					<a href="<?php echo esc_url($knote_youtube_link); ?>" title="<?php echo esc_attr(sprintf(__('%1$s on %2$s', 'knote'), bloginfo('name'), __('Youtube', 'knote'))); ?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-youtube">
							<path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path>
							<polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
						</svg>
					</a>
				</li>
			<?php
			endif;
			?>
		</ul>
	</div>
	<?php do_action('header_builder_social_end'); ?>
</div>
