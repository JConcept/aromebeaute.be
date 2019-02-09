<?php 
if( ! defined('IAMD_BASE_URL' ) ){	define( 'IAMD_BASE_URL',  get_template_directory_uri().'/'); }
define('IAMD_FW_URL', IAMD_BASE_URL . 'framework/' );
define('IAMD_FW',TEMPLATEPATH.'/framework/');
define('IAMD_CORE_PLUGIN', WP_PLUGIN_DIR.'/designthemes-core-features' );
define('IAMD_IMPORTER_URL',IAMD_FW.'wordpress-importer/');
define('IAMD_THEME_SETTINGS', 'mytheme');
define('IAMD_SAMPLE_FONT', __('The quick brown fox jumps over the lazy dog','spalab') );

define( 'IAMD_TEMPLATE_DIR',  get_template_directory() );
define( 'IAMD_STYLESHEET_DIR',  get_stylesheet_directory() );

/* Define IAMD_THEME_NAME
 * Objective:	
 *		Used to show theme name where ever needed( eg: in widgets title ar the back-end).
 */
// get themedata version wp 3.4+
if(function_exists('wp_get_theme')):
	$theme_data = wp_get_theme();
	define('IAMD_THEME_NAME',$theme_data->get('Name'));
	define('IAMD_THEME_FOLDER_NAME',$theme_data->template);
	define('IAMD_THEME_VERSION',(float) $theme_data->get('Version'));
endif;

#ALL BACKEND DETAILS WILL BE IN include.php
require_once (get_template_directory () . '/framework/include.php');

if ( ! isset( $content_width ) ){
	 $content_width = 1170;
}

$GLOBALS['page_layout'] = dttheme_option('specialty', 'global-layout-layout');
$GLOBALS['force_enable'] = dttheme_option('specialty', 'force-enable-global-layout');

//Hide default browser scrollbar
/*add_action('wp_enqueue_scripts','dttheme_styles');
function dttheme_styles() {
        $custom_scroll = dttheme_option("general","disable-custom-scroll");
		if( !isset( $custom_scroll  ) ) { ?>
                <style type="text/css">::-webkit-scrollbar { display: none; }</style><?php
        }
}*/?>