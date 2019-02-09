<?php
/** dttheme_options_page()
  * Objective:
  *		To create thme option page at back end.
**/
function dttheme_options_page(){ ?>
<!-- wrapper -->
<div id="wrapper">

	<!-- Result -->
    <div id="bpanel-message" style="display:none;"></div>
    <div id="ajax-feedback" style="display:none;"><img src="<?php echo IAMD_FW_URL.'theme_options/images/loading.png';?>" alt="" title=""/> </div>
    <!-- Result -->


	<!-- panel-wrap -->
	<div id="panel-wrap">
    
       	<!-- bpanel-wrapper -->
        <div id="bpanel-wrapper">
        
           	<!-- bpanel -->
           	<div id="bpanel">
            
                	<!-- bpanel-left -->
                	<div id="bpanel-left">
                    	<div id="logo"> 
                        <?php $logo =  IAMD_FW_URL.'theme_options/images/logo.png';
							  $advance = dttheme_option('advance');
							  if(isset($advance['buddhapanel-logo-url']) && isset( $advance['enable-buddhapanel-logo-url'])):
							  	$logo = $advance['buddhapanel-logo-url'];
							  endif;?>
                        <img src="<?php echo esc_attr( $logo );?>" width="186" height="101" alt="" title="" /> </div>                        
                        <?php $tabs = array(
								array('id'=>'general' , 'name'=>__('General','spalab')),
								array('id'=>'appearance', 'name'=>__('Appearance','spalab')),
								array('id'=>'color-options', 'name'=>__('Color Options','spalab')),
								array('id'=>'skin', 'name'=>__('Skins','spalab')),
								array('id'=>'integration', 'name'=>__('Integration','spalab')),
								array('id'=>'specialty-pages', 'name'=>__('Speciality Pages','spalab')),
								array('id'=>'theme-footer', 'name'=>__('Footer','spalab')),
								array('id'=>'widgetarea', 'name'=>__('Widget Area','spalab')),
								array('id'=>'woocommerce', 'name'=>__('WooCommerce','spalab')),
								array('id'=>'pagebuilder', 'name'=>__('Page Builder','spalab')),
								array('id'=>'privacy', 'name'=>__('Privacy & Cookies','spalab')),
								array('id'=>'mobile', 'name'=>__('Responsive &amp; Mobile','spalab')),
								array('id'=>'branding', 'name'=>__('Branding','spalab')),
								array('id'=>'company', 'name'=>__('Company','spalab')),
								array('id'=>'backup', 'name'=>__('Backup','spalab')),
							  );
							  
								
							  $output = "<!-- bpanel-mainmenu -->\n\t\t\t\t\t\t<ul id='bpanel-mainmenu'>\n";
									foreach($tabs as $tab ):
									$output .= "\t\t\t\t\t\t\t\t<li><a href='#{$tab['id']}' title='{$tab['name']}'><span class='{$tab['id']}'></span>{$tab['name']}</a></li>\n";
									endforeach;
							  $output .= "\t\t\t\t\t\t</ul><!-- bpanel-mainmenu -->\n";
							  echo ( $output );?>
                    </div><!-- bpanel-left  end-->
                    
                    <form id="mytheme_options_form" name="mytheme_options_form" method="post" action="options.php">
		                <?php settings_fields(IAMD_THEME_SETTINGS);?>
                        <input type="hidden" id="mytheme-full-submit" name="mytheme-full-submit" value="0" />
                        <input type="hidden" name="mytheme_admin_wpnonce" value="<?php echo wp_create_nonce(IAMD_THEME_SETTINGS.'_wpnonce');?>" />
                        
                    	<?php 	#General
								$dt_file_path = '/framework/theme_options/general.php';
								if( IAMD_TEMPLATE_DIR != IAMD_STYLESHEET_DIR && is_file(IAMD_STYLESHEET_DIR . $dt_file_path) ){
									require_once (IAMD_STYLESHEET_DIR .$dt_file_path);
								}
								else{
									require_once (IAMD_TEMPLATE_DIR .$dt_file_path);
								}
								#Appearance
								$dt_file_path = '/framework/theme_options/appearance.php';
								if( IAMD_TEMPLATE_DIR != IAMD_STYLESHEET_DIR && is_file(IAMD_STYLESHEET_DIR . $dt_file_path) ){
									require_once (IAMD_STYLESHEET_DIR .$dt_file_path);
								}
								else{
									require_once (IAMD_TEMPLATE_DIR .$dt_file_path);
								}
								#Color Options
								$dt_file_path = '/framework/theme_options/color-options.php';
								if( IAMD_TEMPLATE_DIR != IAMD_STYLESHEET_DIR && is_file(IAMD_STYLESHEET_DIR . $dt_file_path) ){
									require_once (IAMD_STYLESHEET_DIR .$dt_file_path);
								}
								else{
									require_once (IAMD_TEMPLATE_DIR .$dt_file_path);
								}
								#Integration
								$dt_file_path = '/framework/theme_options/integration.php';
								if( IAMD_TEMPLATE_DIR != IAMD_STYLESHEET_DIR && is_file(IAMD_STYLESHEET_DIR . $dt_file_path) ){
									require_once (IAMD_STYLESHEET_DIR .$dt_file_path);
								}
								else{
									require_once (IAMD_TEMPLATE_DIR .$dt_file_path);
								}
								#Speciality pages
								$dt_file_path = '/framework/theme_options/specialty-pages.php';
								if( IAMD_TEMPLATE_DIR != IAMD_STYLESHEET_DIR && is_file(IAMD_STYLESHEET_DIR . $dt_file_path) ){
									require_once (IAMD_STYLESHEET_DIR .$dt_file_path);
								}
								else{
									require_once (IAMD_TEMPLATE_DIR .$dt_file_path);
								}
								#Footer 
								$dt_file_path = '/framework/theme_options/footer.php';
								if( IAMD_TEMPLATE_DIR != IAMD_STYLESHEET_DIR && is_file(IAMD_STYLESHEET_DIR . $dt_file_path) ){
									require_once (IAMD_STYLESHEET_DIR .$dt_file_path);
								}
								else{
									require_once (IAMD_TEMPLATE_DIR .$dt_file_path);
								}
								#Widget area
								$dt_file_path = '/framework/theme_options/widgetarea.php';
								if( IAMD_TEMPLATE_DIR != IAMD_STYLESHEET_DIR && is_file(IAMD_STYLESHEET_DIR . $dt_file_path) ){
									require_once (IAMD_STYLESHEET_DIR .$dt_file_path);
								}
								else{
									require_once (IAMD_TEMPLATE_DIR .$dt_file_path);
								}
								#Woocommerce
								$dt_file_path = '/framework/theme_options/woocommerce.php';
								if( IAMD_TEMPLATE_DIR != IAMD_STYLESHEET_DIR && is_file(IAMD_STYLESHEET_DIR . $dt_file_path) ){
									require_once (IAMD_STYLESHEET_DIR .$dt_file_path);
								}
								else{
									require_once (IAMD_TEMPLATE_DIR .$dt_file_path);
								}
								#Page Builder
								$dt_file_path = '/framework/theme_options/pagebuilder.php';
								if( IAMD_TEMPLATE_DIR != IAMD_STYLESHEET_DIR && is_file(IAMD_STYLESHEET_DIR . $dt_file_path) ){
									require_once (IAMD_STYLESHEET_DIR .$dt_file_path);
								}
								else{
									require_once (IAMD_TEMPLATE_DIR .$dt_file_path);
								}
								#Privacy
								$dt_file_path = '/framework/theme_options/privacy.php';
								if( IAMD_TEMPLATE_DIR != IAMD_STYLESHEET_DIR && is_file(IAMD_STYLESHEET_DIR . $dt_file_path) ){
									require_once (IAMD_STYLESHEET_DIR .$dt_file_path);
								}
								else{
									require_once (IAMD_TEMPLATE_DIR .$dt_file_path);
								}
								#Responsive
								$dt_file_path = '/framework/theme_options/responsive.php';
								if( IAMD_TEMPLATE_DIR != IAMD_STYLESHEET_DIR && is_file(IAMD_STYLESHEET_DIR . $dt_file_path) ){
									require_once (IAMD_STYLESHEET_DIR .$dt_file_path);
								}
								else{
									require_once (IAMD_TEMPLATE_DIR .$dt_file_path);
								}
								#Branding
								$dt_file_path = '/framework/theme_options/branding.php';
								if( IAMD_TEMPLATE_DIR != IAMD_STYLESHEET_DIR && is_file(IAMD_STYLESHEET_DIR . $dt_file_path) ){
									require_once (IAMD_STYLESHEET_DIR .$dt_file_path);
								}
								else{
									require_once (IAMD_TEMPLATE_DIR .$dt_file_path);
								}
								#Skins
								$dt_file_path = '/framework/theme_options/skins.php';
								if( IAMD_TEMPLATE_DIR != IAMD_STYLESHEET_DIR && is_file(IAMD_STYLESHEET_DIR . $dt_file_path) ){
									require_once (IAMD_STYLESHEET_DIR .$dt_file_path);
								}
								else{
									require_once (IAMD_TEMPLATE_DIR .$dt_file_path);
								}
						
								#Company
								$dt_file_path = '/framework/theme_options/company.php';
								if( IAMD_TEMPLATE_DIR != IAMD_STYLESHEET_DIR && is_file(IAMD_STYLESHEET_DIR . $dt_file_path) ){
									require_once (IAMD_STYLESHEET_DIR .$dt_file_path);
								}
								else{
									require_once (IAMD_TEMPLATE_DIR .$dt_file_path);
								}
								
								

								#Backup
								require_once(IAMD_TEMPLATE_DIR.'/framework/theme_options/backup.php'); ?>
                                
						<!-- bpanel-bottom -->
                        <div id="bpanel-bottom">
                           <input type="submit" value="<?php _e('Reset All','spalab');?>" class="save-reset mytheme-reset-button bpanel-button white-btn" name="mytheme[reset]" />
						   <input type="submit" value="<?php _e('Save All','spalab');?>" name="submit"  class="save-reset mytheme-footer-submit bpanel-button white-btn" />
                        </div><!-- bpanel-bottom end-->        
                    </form>

            </div><!-- bpanel -->
            
        </div><!-- bpanel-wrapper -->
    </div><!-- panel-wrap end -->
</div><!-- wrapper end-->
<?php
}
### --- ****  dttheme_options_page() *** --- ###
?>