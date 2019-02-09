<?php
add_action('admin_init', 'dttheme_admin_options_init', 1);
add_action('admin_print_styles', 'dttheme_admin_panel_styles');
add_action('admin_enqueue_scripts', 'dttheme_admin_panel_scripts'); # replaced it add_action('admin_print_scripts', 'dttheme_admin_panel_scripts');

##Admin panel media uploader hooks( to alter the media uploder used to upload logo , favicon ... )
add_action('admin_init', 'dttheme_image_upload_option');
## End hook

if( !function_exists('dttheme_admin_panel_styles') ) {
	function dttheme_admin_panel_styles() {
		global $wp_version;
	
		wp_enqueue_style('thickbox');
	
		if (version_compare($wp_version, '3.5', '>=')) :
			wp_enqueue_script('wp-color-picker'); #New Color Picker
		else :
			wp_enqueue_script('farbtastic'); #Color picker
		endif;
	
		wp_enqueue_style('dttheme-adminpanel', IAMD_FW_URL.'theme_options/style.css');
	}
}

if( !function_exists('dttheme_admin_panel_scripts') ) {
	function dttheme_admin_panel_scripts() {
		global $wp_version;
	
		echo "<script type=\"text/javascript\">
		//<![CDATA[
		var mysiteWpVersion = '$wp_version';
		//]]>\r</script>\r";
	
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui-slider');
	
		if (version_compare($wp_version, '3.5', '>=')) :
			wp_enqueue_style('wp-color-picker'); #New Color Picker
		else :
			wp_enqueue_style('farbtastic'); #Color Picker
		endif;
	
		wp_enqueue_script('dttheme-tooltip', IAMD_FW_URL.'js/admin/jquery.tools.min.js');
		wp_enqueue_script('dttheme', IAMD_FW_URL.'js/admin/mytheme.admin.js');
		
		wp_localize_script('dttheme', 'objectL10n', array(
			'saveall' => __('Save All','spalab'),
			'saving' => __('Saving ...','spalab'),
			'resetConfirm' => __('This will restore all of your options to default. Are you sure?', 'spalab'),
			'importConfirm' => __('You are going to import the dummy data provided with the theme, kindly confirm?', 'spalab'),
			'disableImportMsg' => __('Importing is disabled.. :), Please set Disable Import to NO in Buddha Panel General Settings', 'spalab'),
			'backupMsg' => __('Click OK to backup your current saved options.', 'spalab'),
			'backupSuccess' => __('Your options are backuped successfully', 'spalab'),
			'backupFailure' => __('Backup Process not working', 'spalab'),
			'restoreMsg' => __('Warning: All of your current options will be replaced with the data from your last backup! Proceed?', 'spalab'),
			'restoreSuccess' => __('Your options are restored from previous backup successfully', 'spalab'),
			'restoreFailure' => __('Restore Process not working', 'spalab'),
			'importMsg' => __('Click ok import options from the above textarea', 'spalab'),
			'importSuccess' => __('Your options are imported successfully', 'spalab'),
			'importFailure' => __('Import Process not working', 'spalab'),
			'pageBuilderUpdate' => __('You page and post contents are updated successfully for page builder latest version!', 'spalab'),
			'pageBuilderUpdateAlready' => __('Page builder updates are implemented already to your page and post contents!', 'spalab')));
	}
}

if( !function_exists('dttheme_admin_options_init') ) {
	function dttheme_admin_options_init() {
		register_setting(IAMD_THEME_SETTINGS, IAMD_THEME_SETTINGS);
		add_option(IAMD_THEME_SETTINGS, dttheme_default_option());
		if (isset($_POST['mytheme-option-save'])) :
			dttheme_ajax_option_save();
		endif;
		
		if (isset($_POST['mytheme']['reset'])) :
			delete_option(IAMD_THEME_SETTINGS);
			update_option(IAMD_THEME_SETTINGS, dttheme_default_option()); # To set Default options
			wp_redirect(admin_url('admin.php?page=parent&reset=true'));
			exit;
		endif;
	}
}

if( !function_exists('dttheme_ajax_option_save') ) {
	function dttheme_ajax_option_save() {
		check_ajax_referer(IAMD_THEME_SETTINGS.'_wpnonce', 'mytheme_admin_wpnonce');
		$data = $_POST;
		unset($data['_wp_http_referer'], $data['_wpnonce'], $data['action']);
		unset($data['mytheme_admin_wpnonce'], $data['mytheme-option-save'], $data['option_page']);
	
		$msg = array('success' => false, 'message' => __('Error: Options not saved, please try again.', 'spalab'));
	
		$data = array_filter($data[IAMD_THEME_SETTINGS]);
	
		#Customizer Options
		set_theme_mod('dt_skin',$data['appearance']['skin'] );
		#Customizer Options End
	
		if (get_option(IAMD_THEME_SETTINGS) != $data) {
			if (update_option(IAMD_THEME_SETTINGS, $data))
				$msg = array('success' => 'options_saved', 'message' => __('Options Saved.', 'spalab'));
		} else {
			$msg = array('success' => true, 'message' => __('Options Saved.', 'spalab'));
		}
	
		$echo = json_encode($msg);
		@header('Content-Type: application/json; charset='.get_option('blog_charset'));
		echo ( $echo );
		exit;
	}
}

add_action('admin_head-toplevel_page_parent', 'dttheme_admin_print_scripts');
if( !function_exists('dttheme_admin_print_scripts') ) {
	function dttheme_admin_print_scripts() {
		echo "<script type=\"text/javascript\">
		//<![CDATA[
		jQuery(document).ready(function(){
			mythemeAdmin.menuSort();
		});
		//]]>\r</script>\r";
	}
}


######### SAMPLE FONT PREVIEW ##########
add_action('wp_ajax_dttheme_font_url', 'dttheme_font_url');
if( !function_exists('dttheme_font_url') ) {
	function dttheme_font_url() {
		$recieve_font = $_POST['font'];
		if( ! isset( $_COOKIE['dtPrivacyGoogleWebfontsDisabled'] ) ) {
		$font_url = array('url' => 'https://fonts.googleapis.com/css?family='.str_replace(' ', '+', $recieve_font));
	}
		die(json_encode($font_url));
	}
}

/* ---------------------------------------------------------------------------
 * Getting privacy button action selection box
 * --------------------------------------------------------------------------- */
if ( ! function_exists( 'dt_theme_privacy_btnaction_selection' ) ) {
	function dt_theme_privacy_btnaction_selection($name = '', $selected = "") {
		$actions = array( '' => esc_html__('Dismiss the notification', 'spalab'), 'link' => esc_html__('Link to another page', 'spalab'), 'info_modal' => esc_html__('Open info modal on privacy and cookies', 'spalab') );
	
		$name = ! empty ( $name ) ? "name='mytheme[privacy-bar][{$name}][action]'" : '';
		$out = "<select class='button-select' {$name}>"; // name attribute will be added to this by jQuery menuAdd()
		foreach ( $actions as $key => $value ) :
			$s = selected ( $key, $selected, false );
			$v = $value;
			$out .= "<option value='{$key}' {$s} >{$v}</option>";
		endforeach;
		$out .= "</select>";
	
		return $out;
	}
}

#### BACKUP OPTION #####
add_action('wp_ajax_dttheme_backup_and_restore_action', 'dttheme_backup_and_restore_action');
if( !function_exists('dttheme_backup_and_restore_action') ) {
	function dttheme_backup_and_restore_action() {
	
		$save_type = $_POST['type'];
	
		if ($save_type == 'backup_options') :
			$data = array('general' => dttheme_option('general'),
				'appearance' => dttheme_option('appearance'),
				'color-options' => dttheme_option('color-options'),
				'integration' => dttheme_option('integration'),
				'seo' => dttheme_option('seo'),
				'specialty' => dttheme_option('specialty'),
				'widgetarea' => dttheme_option("widgetarea"),
				'mobile' => dttheme_option('mobile'),
				'advance' => dttheme_option('advance'),
				
				'backup' => date('r'));
			update_option("mytheme_backup", $data);
			die('1');
		elseif ($save_type == 'restore_options') :
			$data = get_option("mytheme_backup");
			update_option(IAMD_THEME_SETTINGS, $data);
			die('1');
		elseif ($save_type == "import_options") :
			$data = $_POST['data'];
			$data = stripslashes( $data );
			$data = unserialize( $data ); //100% safe - ignore theme check nag
			update_option(IAMD_THEME_SETTINGS, $data);
			die('1');
		elseif( $save_type == "reset_options") :
			delete_option(IAMD_THEME_SETTINGS);
			update_option(IAMD_THEME_SETTINGS, dttheme_default_option()); # To set Default options
			die('1');
		endif;
	}
}?>