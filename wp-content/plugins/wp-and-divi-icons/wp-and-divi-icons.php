<?php
/**
 * Plugin Name: WP and Divi Icons
 * Description: Adds 300+ new icons to the WordPress editor and the Divi & Extra framework, helping you build standout WordPress web designs.
 * Version: 1.0.1
 * Author: Aspen Grove Studios
 * Author URI: https://aspengrovestudios.com/?utm_source=ds-icon-expansion&utm_medium=plugin-credit-link&utm_content=plugin-file-author-uri
 * License: GNU General Public License version 2
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 */
 
/*

WP and Divi Icons plugin
Copyright (C) 2018 Aspen Grove Studios

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.

========

Credits:

This plugin includes code based on parts of the Divi theme and/or the
Divi Builder by Elegant Themes, licensed GPLv2 (see license.txt file
in the plugin's root directory).

This plugin includes code copied from and based on parts of WordPress
by Automattic, licensed GPLv2+ (see license.txt file in the plugin's
root directory for GPLv2).

This plugin includes code copied from and based on parts of TinyMCE
by Ephox Corporation, licensed LGPL (see license-tinymce.txt file
in the plugin's root directory).

This plugin includes the jquery-base64 library; see copyright and
licensing info in in js/fallback.js.

This plugin includes the Modernizr library; see copyright and licensing
info in in js/icons.js.

=======

Note:

Divi is a registered trademark of Elegant Themes, Inc. This product is
not affiliated with nor endorsed by Elegant Themes.

*/

class AGS_Divi_Icons {
	const PLUGIN_NAME = 'WP and Divi Icons';
	const PLUGIN_AUTHOR = 'Aspen Grove Studios';
	const PLUGIN_AUTHOR_URL = 'https://aspengrovestudios.com/';
	const PLUGIN_VERSION = '1.0.1';
	const WPORG = true;
	
	public static $pluginFile, $pluginDir, $pluginDirUrl;
	
	public static function init() {
		self::$pluginFile = __FILE__;
		self::$pluginDir = dirname(__FILE__).'/';
		self::$pluginDirUrl = plugins_url('', __FILE__);
		
		add_action('admin_menu', array('AGS_Divi_Icons', 'adminMenu'));
		add_action('load-plugins.php', array('AGS_Divi_Icons', 'onLoadPluginsPhp'));
		add_action('admin_enqueue_scripts', array('AGS_Divi_Icons', 'adminScripts'));
		add_action('wp_ajax_agsdi_get_icons', array('AGS_Divi_Icons', 'getOrderedIconsAjax'));
		
		$isAdmin = is_admin();
		if ($isAdmin) {
			$settings = get_option('agsdi-icon-expansion');
		}
		
		if (self::WPORG || ds_icon_expansion_has_license_key()) {
			@include(self::$pluginDir.'/build/build.php');
			
			add_action('et_fb_framework_loaded', array('AGS_Divi_Icons', 'fbScripts'));
			add_filter('et_pb_font_icon_symbols', array('AGS_Divi_Icons', 'addIcons'));
			add_filter('mce_external_plugins', array('AGS_Divi_Icons', 'mcePlugins'));
			add_filter('mce_buttons', array('AGS_Divi_Icons', 'mceButtons'));
			add_filter('mce_css', array('AGS_Divi_Icons', 'mceStyles'));
			
			wp_enqueue_style('ags-divi-icons', self::$pluginDirUrl.'/css/icons.css', array(), self::PLUGIN_VERSION);
			wp_enqueue_script('ags-divi-icons', self::$pluginDirUrl.'/js/icons.js', array('jquery'), self::PLUGIN_VERSION);
			wp_localize_script('ags-divi-icons', 'ags_divi_icons_config', array(
				'pluginDirUrl' => self::$pluginDirUrl
			));
			
			// Review notice code from Donations for WooCommerce plugin
			if ($isAdmin && empty($settings['notice_instruction_hidden'])) {
				add_action('admin_notices', array('AGS_Divi_Icons', 'instructionNotice'));
			}
			add_action('wp_ajax_ds-icon-expansion_instruction_notice_hide', array('AGS_Divi_Icons', 'instructionNoticeHide'));
	
		} else {
			add_action('admin_notices', array('AGS_Divi_Icons', 'activateNotice'));
		}
	}
	
	public static function adminMenu() {
		add_submenu_page('admin.php', self::PLUGIN_NAME, self::PLUGIN_NAME,
							'install_plugins', 'ds-icon-expansion', array('AGS_Divi_Icons', 'adminPage'));
		add_submenu_page('et_divi_options', self::PLUGIN_NAME, self::PLUGIN_NAME,
							'install_plugins', 'ds-icon-expansion', array('AGS_Divi_Icons', 'adminPage'));
		add_submenu_page('et_extra_options', self::PLUGIN_NAME, self::PLUGIN_NAME,
							'install_plugins', 'ds-icon-expansion', array('AGS_Divi_Icons', 'adminPage'));
	}
	
	public static function adminPage() {
		if (self::WPORG || ds_icon_expansion_has_license_key()) {
			echo('<div id="agsdi-admin-page" class="wrap"><h1>'.esc_html__(self::PLUGIN_NAME, 'ds-icon-epxansion').'</h1>
					<div id="agsdi-instructions">
						<h2>'.esc_html__('Instructions', 'ds-icon-expansion').'</h2>'
						.'<p>'.sprintf(
									esc_html__('Easily insert one of the 300+ icons provided by %s when using the WordPress visual editor to create and edit posts, pages, and other content! Simply click on the %s icon in the editor\'s toolbar to open the icon insertion window.', 'ds-icon-expansion'),
									self::PLUGIN_NAME,
									'<span data-icon="agsdi-aspengrovestudios" class="agsdi-icon"></span>'
								).'</p>'
						.'<p>'.sprintf(
									esc_html__('If you use the %sDivi or Extra theme%s or the %sDivi Builder%s, you can also use the 300+ icons provided by %s anywhere that the Divi Builder allows you to specify an icon, such as in Buttons, Blurbs, and much more! Works in both the Divi Builder and the Visual Builder.', 'ds-icon-expansion'),
									'<a href="http://www.elegantthemes.com/affiliates/idevaffiliate.php?id=32248_0_1_10" target="_blank">',
									'</a>',
									'<a href="http://www.elegantthemes.com/affiliates/idevaffiliate.php?id=32248_0_1_10" target="_blank">',
									'</a>',
									self::PLUGIN_NAME
								).'</p>
					</div>');
			
			echo('<h2>'.esc_html__('Check out these products too!', 'ds-icon-expansion').'</h2>
				<ul>
			');
			foreach (self::getCreditPromos('admin-page', true) as $promo) {
				echo('<li>'.$promo.'</li>');
			}
			echo('</ul>');
			
			echo('<p><em>Divi is a registered trademark of Elegant Themes, Inc. This product is not affiliated with nor endorsed by Elegant Themes. Links to the Elegant Themes website on this page are affiliate links.</em></p>');
			
			@include(self::$pluginDir.'build/test.php');
			echo('</div>');
		} else {
			ds_icon_expansion_activate_page();
		}
	}

	// Add settings link on plugin page
	public static function pluginActionLinks($links) {
	  array_unshift($links, '<a href="admin.php?page=ds-icon-expansion">'.(self::WPORG || ds_icon_expansion_has_license_key() ? 'Instructions' : 'Activate License Key').'</a>'); 
	  return $links;
	}

	public static function onLoadPluginsPhp() {
		$plugin = plugin_basename(__FILE__); 
		add_filter('plugin_action_links_'.$plugin, array('AGS_Divi_Icons', 'pluginActionLinks'));
	}
	
	public static function addIcons($existingIcons) {
		return array_merge($existingIcons, self::getOrderedIcons());
	}
	
	public static function getOrderedIconsAjax() {
		wp_send_json_success(self::getOrderedIcons());
	}
	
	public static function getOrderedIcons() {
		$icons = self::getIcons();
		return $icons;
	}
	
	public static function getIcons() {
		return array(
			'agsdi-aspengrovestudios','agsdi-wpgears','agsdi-message','agsdi-location',
			'agsdi-message-2','agsdi-message-3','agsdi-mail','agsdi-gear','agsdi-zoom',
			'agsdi-zoom-in','agsdi-zoom-out','agsdi-time','agsdi-wallet','agsdi-world',
			'agsdi-bulb','agsdi-bulb-flash','agsdi-bulb-options','agsdi-calendar','agsdi-chat',
			'agsdi-music','agsdi-video','agsdi-security-camera','agsdi-sound','agsdi-music-play',
			'agsdi-video-play','agsdi-microphone','agsdi-cd','agsdi-coffee','agsdi-gift',
			'agsdi-printer','agsdi-hand-watch','agsdi-alarm','agsdi-alarm-2',
			'agsdi-calendar-check','agsdi-code','agsdi-learn','agsdi-globe',
			'agsdi-warning','agsdi-cancel','agsdi-question','agsdi-error','agsdi-check-circle',
			'agsdi-arrow-left-circle','agsdi-arrow-right-circle','agsdi-arrow-up-circle',
			'agsdi-arrow-down-circle','agsdi-refresh','agsdi-share','agsdi-tag',
			'agsdi-bookmark','agsdi-bookmark-star','agsdi-briefcase','agsdi-calculator',
			'agsdi-id-card','agsdi-credit-card','agsdi-shop','agsdi-tshirt','agsdi-handbag',
			'agsdi-clothing-handbag','agsdi-analysis','agsdi-chat-gear','agsdi-certificate','agsdi-medal',
			'agsdi-ribbon','agsdi-star','agsdi-bullhorn','agsdi-target','agsdi-pie-chart',
			'agsdi-bar-chart','agsdi-bar-chart-2','agsdi-bar-chart-3','agsdi-bar-chart-4','agsdi-bar-chart-5',
			'agsdi-income','agsdi-piggy-bank','agsdi-bitcoin','agsdi-bitcoin-circle',
			'agsdi-bitcoin-mining','agsdi-mining','agsdi-dollar','agsdi-dollar-circle',
			'agsdi-dollar-bill','agsdi-binders','agsdi-house','agsdi-padlock','agsdi-padlock-open',
			'agsdi-house-padlock','agsdi-cloud-padlock','agsdi-key','agsdi-keys','agsdi-eye',
			'agsdi-eye-closed','agsdi-champagne','agsdi-rocket','agsdi-rocket-2','agsdi-rocket-3',
			'agsdi-flag','agsdi-flag-2','agsdi-flag-3','agsdi-drop','agsdi-sun',
			'agsdi-sun-cloud','agsdi-thermometer','agsdi-celsius','agsdi-sun-2','agsdi-cloud',
			'agsdi-upload','agsdi-cloud-computing','agsdi-cloud-download','agsdi-cloud-check',
			'agsdi-cursor','agsdi-mobile','agsdi-monitor','agsdi-browser','agsdi-laptop',
			'agsdi-hamburger-menu','agsdi-hamburger-menu-circle','agsdi-download','agsdi-image',
			'agsdi-file','agsdi-file-error','agsdi-file-add','agsdi-file-check',
			'agsdi-file-download','agsdi-file-question','agsdi-file-cursor','agsdi-file-padlock',
			'agsdi-file-heart','agsdi-file-jpg','agsdi-file-png','agsdi-file-pdf','agsdi-file-zip',
			'agsdi-file-ai','agsdi-file-ps','agsdi-delete','agsdi-notebook','agsdi-notebook-2',
			'agsdi-documents','agsdi-brochure','agsdi-clip','agsdi-align-center',
			'agsdi-align-left','agsdi-align-justify','agsdi-align-right','agsdi-portrait',
			'agsdi-landscape','agsdi-portrait-2','agsdi-wedding','agsdi-billboard','agsdi-flash',
			'agsdi-crop','agsdi-message-heart','agsdi-adjust-square-vert',
			'agsdi-adjust-circle-vert','agsdi-camera','agsdi-grid','agsdi-grid-2','agsdi-layers',
			'agsdi-ruler','agsdi-eyedropper','agsdi-aperture','agsdi-macro','agsdi-pin',
			'agsdi-contrast','agsdi-battery-level-empty','agsdi-battery-level1',
			'agsdi-battery-level2','agsdi-battery-level3','agsdi-usb-stick','agsdi-sd-card',
			'agsdi-stethoscope','agsdi-vaccine','agsdi-hospital','agsdi-pills','agsdi-heart',
			'agsdi-heartbeat','agsdi-hearts','agsdi-heart-leaf','agsdi-heart-leaf-2',
			'agsdi-coffee-2','agsdi-hands','agsdi-book','agsdi-food-heart','agsdi-soup-heart',
			'agsdi-food','agsdi-soup','agsdi-pencil','agsdi-people','agsdi-money-bag',
			'agsdi-world-heart','agsdi-doctor','agsdi-person','agsdi-water-cycle','agsdi-sign',
			'agsdi-hand-leaf','agsdi-gift-heart','agsdi-sleep','agsdi-hand-heart',
			'agsdi-calendar-heart','agsdi-book-heart','agsdi-list','agsdi-leaves','agsdi-bread',
			'agsdi-bread-heart','agsdi-animal-hands','agsdi-animal-heart','agsdi-dog',
			'agsdi-cat','agsdi-bird','agsdi-dog-2','agsdi-cat-2','agsdi-transporter',
			'agsdi-adjust-square-horiz','agsdi-adjust-circle-horiz','agsdi-square',
			'agsdi-circle','agsdi-triangle','agsdi-pentagon','agsdi-hexagon','agsdi-heptagon',
			'agsdi-refresh-2','agsdi-pause','agsdi-play','agsdi-fast-forward','agsdi-rewind',
			'agsdi-previous','agsdi-next','agsdi-stop','agsdi-arrow-left','agsdi-arrow-right',
			'agsdi-arrow-up','agsdi-arrow-down','agsdi-face-sad','agsdi-face-happy',
			'agsdi-face-neutral','agsdi-messenger','agsdi-facebook','agsdi-facebook-like',
			'agsdi-twitter','agsdi-google-plus','agsdi-linkedin','agsdi-pinterest',
			'agsdi-tumblr','agsdi-instagram','agsdi-skype','agsdi-flickr','agsdi-myspace',
			'agsdi-dribble','agsdi-vimeo','agsdi-500px','agsdi-behance','agsdi-bitbucket',
			'agsdi-deviantart','agsdi-github','agsdi-github-2','agsdi-medium','agsdi-medium-2',
			'agsdi-meetup','agsdi-meetup-2','agsdi-slack','agsdi-slack-2','agsdi-snapchat',
			'agsdi-twitch','agsdi-rss','agsdi-rss-2','agsdi-paypal','agsdi-stripe',
			'agsdi-youtube','agsdi-facebook-2','agsdi-twitter-2','agsdi-linkedin-2',
			'agsdi-tumblr-2','agsdi-myspace-2','agsdi-slack-3','agsdi-github-3','agsdi-vimeo-2',
			'agsdi-behance-2','agsdi-apple','agsdi-quora','agsdi-trello','agsdi-amazon',
			'agsdi-reddit','agsdi-windows','agsdi-wordpress','agsdi-patreon','agsdi-patreon-2',
			'agsdi-soundcloud','agsdi-spotify','agsdi-google-hangout','agsdi-dropbox',
			'agsdi-tinder','agsdi-whatsapp','agsdi-adobe-cc','agsdi-android','agsdi-html5',
			'agsdi-google-drive','agsdi-pinterest-2','agsdi-gmail','agsdi-google-wallet',
			'agsdi-google-sheets','agsdi-twitch-2');
	}
	
	public static function adminScripts() {
		wp_enqueue_style('ags-divi-icons-admin', self::$pluginDirUrl.'/css/admin.css', array(), self::PLUGIN_VERSION);
		wp_enqueue_script('ags-divi-icons-admin', self::$pluginDirUrl.'/js/admin.js', array('jquery'), self::PLUGIN_VERSION);
		wp_enqueue_script('ags-divi-icons-tinymce', self::$pluginDirUrl.'/js/tinymce-plugin.js', array('tinymce'), self::PLUGIN_VERSION);
		wp_localize_script('ags-divi-icons-admin', 'ags_divi_icons_credit_promos', self::getCreditPromos('icon-picker'));
	}
	
	// Frontend Builder scripts
	public static function fbScripts() {
		wp_enqueue_script('ags-divi-icons-fb', self::$pluginDirUrl.'/js/fb.js', array('jquery'), self::PLUGIN_VERSION);
		self::adminScripts();
	}
	
	public static function mcePlugins($plugins) {
		$plugins['agsdi_icons'] = self::$pluginDirUrl.'/js/tinymce-plugin.js';
		return $plugins;
	}
	
	public static function mceButtons($toolbarButtons) {
		$toolbarButtons[] = 'agsdi_icons';
		return $toolbarButtons;
	}
	
	public static function mceStyles($styles) {
		$styles .= (empty($styles) ? '' : ',').self::$pluginDirUrl.'/css/icons.css';
		return $styles;
	}
	
	public static function getCreditPromos($context, $all=false) {
		/*
		$creditPromos array format:
		First level of the array is requirements (promo only shown if true)
		Second level of the array is exclusions (promo only shown if false)
		Third level of the array is promos themselves
		
		Requirements/exclusions have the following format:
		*  - no requirement/exclusion
		p: - require active plugin / exclude if plugin installed
		t: - require active parent theme (case-insensitive) / exclude if theme installed (case-sensitive, does not check if theme is parent or child)
		c: - require active child theme (case-insensitive) / exclude if theme installed (case-sensitive, does not check if theme is parent or child)
	
		Promos may be specifed as single promo or array of promos
		*/
		$contextSafe = esc_attr($context);
		$utmVars = 'utm_source=ds-icon-expansion&amp;utm_medium=plugin-ad&amp;utm_content='.$contextSafe.'&amp;utm_campaign=';
		
		$creditPromos = array(
			'*' => array(
				'*' => array(
					'<a href="https://aspengrovestudios.com/?'.$utmVars.'subscribe-general#main-footer" target="_blank">Subscribe</a> to Aspen Grove Studios emails for the latest news, updates, special offers, and more!',
				),
				'p:testify' => 'Create an engaging testimonial section for your website with <a href="https://divi.space/product/testify/?'.$utmVars.'testify" target="_blank">Testify</a>!'
			),
			't:Divi' => array(
				'*' => array(
					'<a href="https://divi.space/?'.$utmVars.'subscribe-general#main-footer" target="_blank">Sign up</a> for emails from <strong>Divi Space</strong> to receive news, updates, special offers, and more!',
					'Get child themes, must-have Divi plugins, &amp; exclusive content with the <a href="https://divi.space/product/annual-membership/?'.$utmVars.'annual-membership" target="_blank">Divi Space membership</a>!',
				),
				'p:divi-switch' => 'Take your Divi website to new heights with <a href="https://divi.space/product/divi-switch/?'.$utmVars.'divi-switch" target="_blank">Divi Switch</a>, the Swiss Army Knife for Divi!',
				'p:ds-divi-extras' => 'Get blog modules from the Extra theme in the Divi Builder with <a href="https://divi.space/product/divi-extras/?'.$utmVars.'divi-extras" target="_blank">Divi Extras</a>!',
				'c:diviecommerce' => 'Create an impactful online presence for your online store with the <a href="https://divi.space/product/divi-ecommerce/?'.$utmVars.'divi-ecommerce" target="_blank">divi ecommerce child theme</a>!',
				'c:divibusinesspro' => 'Showcase your business in a memorable &amp; engaging way with the <a href="https://divi.space/product/divi-business-pro/?'.$utmVars.'divi-business-pro" target="_blank">Divi Business Pro child theme</a>!',
				
			),
			'p:woocommerce' => array(
				'p:hm-product-sales-report-pro' => 'Need a powerful sales reporting tool for WooCommerce? Check out <a href="https://aspengrovestudios.com/product/product-sales-report-pro-for-woocommerce/?'.$utmVars.'product-sales-report-pro" target="_blank">Product Sales Report Pro</a>!',
			),
			'p:bbpress' => array(
				'p:image-upload-for-bbpress-pro' => 'Let your forum users upload images into their posts with <a href="https://aspengrovestudios.com/product/image-upload-for-bbpress-pro/?'.$utmVars.'image-upload-for-bbpress-pro" target="_blank">Image Upload for bbPress Pro</a>!',
			)
		);
		
		$myCreditPromos = array();
		if ($all) {
			$otherPromos = array();
		}
		
		foreach ($creditPromos as $require => $requirePromos) {
			unset($isOtherPromos);
			if ($require != '*') {
				switch ($require[0]) {
					case 'p':
						if (!is_plugin_active(substr($require, 2))) {
							if ($all) {
								$isOtherPromos = true;
							} else {
								continue 2;
							}
						}
						break;
					case 't':
						if (!isset($parentTheme)) {
							$parentTheme = get_template();
						}
						if (strcasecmp($parentTheme, substr($require, 2))) {
							if ($all) {
								$isOtherPromos = true;
							} else {
								continue 2;
							}
						}
						break;
					case 'c':
						if (!isset($childTheme)) {
							$childTheme = get_stylesheet();
						}
						if (strcasecmp($childTheme, substr($require, 2))) {
							if ($all) {
								$isOtherPromos = true;
							} else {
								continue 2;
							}
						}
						break;
					default:
						if ($all) {
							$isOtherPromos = true;
						} else {
							continue 2;
						}
				}
			}
			
			foreach ($requirePromos as $exclude => $promos) {
				if (empty($isOtherPromos)) {
					unset($isExcluded);
					if ($exclude != '*') {
						switch ($exclude[0]) {
							case 'p':
								if (is_dir(self::$pluginDir.'../'.substr($exclude, 2))) {
									if ($all) {
										$isExcluded = true;
									} else {
										continue 2;
									}
								}
								break;
							case 't':
							case 'c':
								if (!isset($themes)) {
									$themes = search_theme_directories();
								}
								if (isset($themes[substr($exclude, 2)])) {
									if ($all) {
										$isExcluded = true;
									} else {
										continue 2;
									}
								}
								break;
							default:
								if ($all) {
									$isExcluded = true;
								} else {
									continue 2;
								}
						}
					}
				}
				
				if (empty($isOtherPromos) && empty($isExcluded)) {
					if (is_array($promos)) {
						$myCreditPromos = array_merge($myCreditPromos, $promos);
					} else {
						$myCreditPromos[] = $promos;
					}
				} else {
					if (is_array($promos)) {
						$otherPromos = array_merge($otherPromos, $promos);
					} else {
						$otherPromos[] = $promos;
					}
				}
				
				
			}
		}
		return $all ? array_merge($myCreditPromos, $otherPromos) : $myCreditPromos;
	}
	
	
	/* Review notice code from Donations for WooCommerce (also adapted for instruction notice) */
	public static function instructionNotice() {
		global $pagenow;
		if (empty($pagenow) || $pagenow != 'admin.php' || empty($_GET['page']) || $_GET['page'] != 'ds-icon-expansion') {
			echo('
				<div id="ds-icon-expansion_instruction_notice" class="updated notice is-dismissible"><p>Thank you for installing the <strong>'.esc_html(self::PLUGIN_NAME).'</strong> plugin by <a href="'.esc_url(self::PLUGIN_AUTHOR_URL).'?utm_source=ds-icon-expansion&amp;utm_medium=plugin-credit-link&amp;utm_content=welcome-notice" target="_blank">'.esc_html(self::PLUGIN_AUTHOR).'</a>! <a href="'.esc_url(admin_url('admin.php?page=ds-icon-expansion')).'">Click here</a> for instructions to help you start using it.</p></div>
				<script>jQuery(document).ready(function($){$(\'#ds-icon-expansion_instruction_notice\').on(\'click\', \'.notice-dismiss\', function(){jQuery.post(ajaxurl, {action:\'ds-icon-expansion_instruction_notice_hide\'})});});</script>
			');
		}
	}
	public static function instructionNoticeHide() {
		$settings = get_option('agsdi-icon-expansion');
		if (empty($settings)) {
			$settings = array();
		}
		$settings['notice_instruction_hidden'] = 1;
		update_option('agsdi-icon-expansion', $settings, false);
	}
	
	
	
}

add_action('init', array('AGS_Divi_Icons', 'init'));





/*
Following code is copied from the Divi theme by Elegant Themes (v3.10): includes/builder/functions.php
Licensed under the GNU General Public License version 2 (see license.txt file in plugin root for license text)
Modified on July 13, 2018 by Divi Space to add content below the icon list
*/
if ( ! function_exists( 'et_pb_get_font_icon_list' ) ) :
function et_pb_get_font_icon_list() {
	$output = is_customize_preview() ? et_pb_get_font_icon_list_items() : '<%= window.et_builder.font_icon_list_template() %>';

	$output = sprintf( '<ul class="et_font_icon">%1$s</ul>', $output );

	// Following line was added
	$output .= '<span class="agsdi-picker-credit">With free icons by <a href="https://aspengrovestudios.com/?utm_source=ds-icon-expansion&amp;utm_medium=plugin-credit-link&amp;utm_content=divi-builder" target="_blank">Aspen Grove Studios</a><span class="agsdi-picker-credit-promo"></span></span>';
	
	return $output;
}
endif;
/* End code copied from the Divi theme by Elegant Themes */