<!-- appearance -->
<div id="appearance" class="bpanel-content">
    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
			<?php $sub_menus = array(
						array("title"=>__("Header",'spalab'), "link" => "#appearance-header" ),
						array("title"=>__("Menu",'spalab'), "link"=>"#appearance-menu"),
						array("title"=>__("Body",'spalab'), "link"=>"#appearance-body"),
						array("title"=>__("Footer",'spalab'), "link"=>"#appearance-footer"),
						array("title"=>__("Typography",'spalab'), "link"=>"#appearance-typography"),
						array("title"=>__("Layout & BG",'spalab'), "link"=>"#appearance-layout"));
						
				  foreach($sub_menus as $menu): ?>
                  	<li><a href="<?php echo esc_attr( $menu['link'] )?>"><?php echo esc_html ( $menu['title'] );?></a></li>
			<?php endforeach?>
        </ul>

        <!-- Header Section -->
        <div id="appearance-header" class="tab-content">
        	<div class="bpanel-box">
                <div class="box-title"><h3><?php _e('Choose Header','spalab');?></h3></div>
                <div class="box-content">
                	<h6><?php _e('Header','spalab'); ?></h6>
                    <p class="note no-margin"> <?php _e("Choose the header type",'spalab');?> </p>
                    <div class="hr_invisible"> </div>
					<div class="bpanel-option-set">    
                         <ul class="bpanel-post-layout bpanel-layout-set">
                         <?php $header_types = array("header1","header2","header3","header4","header5","header6","header7","header8","header9","header10","header11","header12");
							 foreach( $header_types as $header_type):
							 	$class = ( $header_type ==  dttheme_option('appearance','header_type')) ? " class='selected' " : "";?>
                                <li class="headerlayout"><a href="#" rel="<?php echo esc_attr( $header_type );?>" <?php echo esc_attr( $class );?> title="<?php echo esc_attr( $header_type);?>">
                                    <img src="<?php echo IAMD_FW_URL."theme_options/images/headers/{$header_type}.png";?>" />
                                </a></li>
						 <?php endforeach; ?>
                         </ul>
                         <input id="mytheme[appearance][header_type]" name="mytheme[appearance][header_type]" type="hidden" value="<?php echo  dttheme_option('appearance','header_type');?>"/>                         
                    </div>
                </div>
            </div>
        </div><!-- Header Section End -->

        <!-- Menu Section -->
        <div id="appearance-menu" class="tab-content">
        	<div class="bpanel-box">
            
                <!-- Header Font -->
                <div class="box-title"><h3><?php _e('Menu Font','spalab');?></h3></div>
                <div class="box-content">

					<div class="bpanel-option-set">
                    	<h6><?php _e('Enable SubMenu Hover Settings','spalab');?></h6>
                        <?php dttheme_switch(__("Enable SubMenu Hover Style",'spalab'),'appearance','submenu-hover');?>
                    	<p class="note"> <?php _e('Enable or Disable SubMenu Hover style settings','spalab');?>                      
                    </div>
            
                    <div class="bpanel-option-set">
                    	<h6><?php _e('Disable Menu Settings','spalab');?></h6>
                        <?php dttheme_switch("",'appearance','disable-menu-settings');?>
                        <p class="note"> <?php _e('Enable or Disable Menu section apperance settings.','spalab');?>  </p>                        
                    </div>
                    
                    <div class="clear"> </div>
                    <div class="hr"> </div>
                    
                    <!-- Font -->
                    <div class="font-container">
                    
                        <div class="bpanel-option-set">
                            <h6><?php _e('Choose Font Type','spalab');?></h6>
                            <?php $switchclass = ("on" == dttheme_option('appearance', 'menu-font-type')) ? 'font-checkbox-switch-on' : 'font-checkbox-switch-off'; ?>
                            <div data-for="mytheme-menu-font-type" class="font-switcher checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-menu-font-type" name="mytheme[appearance][menu-font-type]" type="checkbox" 
                                <?php checked(dttheme_option('appearance','menu-font-type'),'on');?>/>
                            <p class="note"> <?php _e('Choose which type font.','spalab');?>  </p>
                        </div>
                        <div class="hr"></div>
                    
						<?php $show_menu_standard_font = ("on" == dttheme_option('appearance', 'menu-font-type')) ? " style='display:block;' " : "  style='display:none;' ";
                              $show_menu_google_font = (dttheme_option('appearance', 'menu-font-type')) ? "  style='display:none;' " : " style='display:block;' ";?>
                          
                        <div class="standard-font column one-column bpanel-option-set" <?php echo( $show_menu_standard_font );?>>
                            <div class="column one-half bpanel-option-set">
                                <?php dttheme_standard_font( __('Standard Font', 'spalab'), 'mytheme[appearance][menu-standard-font]', 
															dttheme_option('appearance', 'menu-standard-font'));?></div>
                            <div class="column one-half last bpanel-option-set">
                                <?php dttheme_standard_font_style( __('Sample Title Font Style', 'spalab'), 'mytheme[appearance][menu-standard-font-style]', 
                                      dttheme_option('appearance', 'menu-standard-font-style'));?></div>
                        </div>
                    
                        <div class="google-font column one-column bpanel-option-set" <?php echo ( $show_menu_google_font );?>>
                            <div class="column one-column bpanel-option-set">
                                <?php dttheme_admin_fonts(__('Menu Font','spalab'),'mytheme[appearance][menu-font]',dttheme_option('appearance','menu-font'));?>
                                <p class="note"> <?php _e('Choose the menu font','spalab');?> </p>
                            </div>
                        </div>
                    </div><!-- Font End -->
                    
                    <div class="column one-column bpanel-option-set">
                        <div class="clear"></div>
                        <?php dttheme_admin_jqueryuislider(__('Menu Font Size','spalab'),"mytheme[appearance][menu-font-size]",
						dttheme_option('appearance',"menu-font-size"));?>
                    </div>
                    
                    <div class="hr"> </div>

                    <div class="column one-half">
                    <?php $label = 		__("Primary / Default Color",'spalab');
                          $name  =		"mytheme[appearance][menu-primary-color]";	
						  $value =  	(dttheme_option('appearance','menu-primary-color') != NULL) ? dttheme_option('appearance','menu-primary-color') : "#";
                          $tooltip = 	__("Pick a custom primary color for the menu e.g. #564912",'spalab'); ?>
                          <h6><?php echo ( $label );?></h6>	
                          <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo ( $tooltip );?></p>                    
                    </div>

                    <div class="column one-half last">
                    <?php $label = 		__("Hover Color",'spalab');
                          $name  =		"mytheme[appearance][menu-secondary-color]";	
						  $value =  	(dttheme_option('appearance','menu-secondary-color')  != NULL) ? dttheme_option('appearance','menu-secondary-color') : "#";
                          $tooltip = 	__("Pick a custom hover state color for the menu e.g. #564912",'spalab'); ?>
                          <h6><?php echo ( $label );?></h6>	
                          <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo ( $tooltip );?></p>                    
                    </div>
                </div><!-- Header Font End-->
            </div>
        </div><!-- Menu Section (#appearance-menu) End-->
        
        <!-- Body Section -->
        <div id="appearance-body" class="tab-content">
        	<div class="bpanel-box">
            	
                <!-- Body Font Settings -->
                <div class="box-title"><h3><?php _e('Body Font','spalab');?></h3></div>
                <div class="box-content">
                
                    <div class="bpanel-option-set">
                    	<h6><?php _e('Disable Body Settings','spalab');?></h6>
                        <?php dttheme_switch("",'appearance','disable-boddy-settings');?>
                        <p class="note"> <?php _e('Enable or Disable Body apperance settings.','spalab');?>  </p>
                    </div>    
                    
                    <div class="hr"> </div>
                    
                    
                    <!-- Font -->
                    <div class="font-container">
                        <div class="bpanel-option-set">
                            <h6><?php _e('Choose Font Type','spalab');?></h6>
							<?php $switchclass = ("on" == dttheme_option('appearance', 'body-font-type')) ? 'font-checkbox-switch-on' : 'font-checkbox-switch-off'; ?>
                            <div data-for="mytheme-body-font-type" class="font-switcher checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-body-font-type" name="mytheme[appearance][body-font-type]" type="checkbox" 
                            <?php checked(dttheme_option('appearance','body-font-type'),'on');?>/>
                            <p class="note"> <?php _e('Choose which type font.','spalab');?>  </p>
                        </div>
                        <div class="hr"></div>
                        
                        <?php $show_body_standard_font = ("on" == dttheme_option('appearance', 'body-font-type')) ? " style='display:block;' " : "  style='display:none;' ";
                        	  $show_body_google_font = (dttheme_option('appearance', 'body-font-type')) ? "  style='display:none;' " : " style='display:block;' ";?>

                        <div class="standard-font column one-column bpanel-option-set" <?php echo ( $show_body_standard_font );?>>
                            <div class="column one-half bpanel-option-set">
                                <?php dttheme_standard_font( __('Standard Font', 'spalab'), 'mytheme[appearance][body-standard-font]', 
															dttheme_option('appearance', 'menu-standard-font'));?></div>
                            <div class="column one-half last bpanel-option-set">
                                <?php dttheme_standard_font_style( __('Sample Title Font Style', 'spalab'), 'mytheme[appearance][body-standard-font-style]', 
                                      dttheme_option('appearance', 'body-standard-font-style'));?></div>
                        </div>
                        
                        <div class="google-font column one-column bpanel-option-set" <?php echo ( $show_body_google_font );?>>
	                        <div class="column one-column">
                            	<div class="bpanel-option-set">
                                	<?php dttheme_admin_fonts(__('Body Font','spalab'),'mytheme[appearance][body-font]',dttheme_option('appearance','body-font'));?>
                                    <div class="clear"></div>
                                    <p class="note"> <?php _e('Choose the body font','spalab');?> </p>
                                </div>
                             </div>
                        </div>
                    </div><!-- Font End -->

                

                	<div class="column one-half">
                    <?php $label = 		__("Body Font Color",'spalab');
						  $name  =		"mytheme[appearance][body-font-color]";	
						  $value =  	(dttheme_option('appearance','body-font-color') != NULL) ? dttheme_option('appearance','body-font-color') :"#";
						  $tooltip = 	__("Pick a custom font color for body/content e.g. #a314a3",'spalab'); ?>
                          <h6><?php echo ( $label );?></h6> 
                          <?php dttheme_admin_color_picker('',$name,$value,"");?> 
                          <p class="note no-margin"><?php echo ( $tooltip );?></p>   
                    </div>
                	<div class="column one-half last">
						  <?php dttheme_admin_jqueryuislider(__('Body Font Size','spalab'),"mytheme[appearance][body-font-size]",
                                  dttheme_option('appearance',"body-font-size"));?>                                             
 					</div>                               
                    <div class="hr"> </div>

                	<div class="one-half-content">
                    <?php $label = 		__("Primary / Default Color for Links",'spalab');
						  $name  =		"mytheme[appearance][body-primary-color]";	
						  $value =  	(dttheme_option('appearance','body-primary-color') != NULL) ? dttheme_option('appearance','body-primary-color') :"#";
						  $tooltip = 	__("Pick a custom primary color to links and buttons for body/content e.g. #551256",'spalab'); ?>
                          <h6><?php echo ( $label );?></h6>	
						  <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo ( $tooltip );?></p>                     
                    </div>

                	<div class="one-half-content last">
                    <?php $label = 		__("Hover Color for Links",'spalab');
						  $name  =		"mytheme[appearance][body-secondary-color]";
						  $value =  	(dttheme_option('appearance','body-secondary-color') != NULL) ? dttheme_option('appearance','body-secondary-color') :"#";
						  $tooltip = 	__("Pick a custom hover state color to links and buttons for body/content e.g. #564912",'spalab'); ?>
                          <h6><?php echo ( $label );?></h6>	
                          <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo ( $tooltip );?></p>                   
                    </div>
                </div>
                <!-- Body Font Settings End-->
                 
            </div>
        </div><!-- Body Section(#appearance-body) end -->
        
        <!-- Footer Section -->
        <div id="appearance-footer" class="tab-content">
        	<div class="bpanel-box">

                <!-- Footer Font -->
                <div class="box-title"><h3><?php _e('Footer Font','spalab');?></h3></div>
                <div class="box-content">
                
                    <div class="bpanel-option-set">
                    	<h6><?php _e('Disable Footer Settings','spalab');?></h6>
                        <?php dttheme_switch(__("Disable Footer Settings",'spalab'),'appearance','disable-footer-settings');?>
                        <p class="note"><?php _e('Enable or Disable Footer apperance settings.','spalab');?>  </p>
                    </div>
                    
                    <div class="hr"> </div>
                    
                    <!-- Font -->
                    <div class="font-container">
                    
                        <div class="bpanel-option-set">
                            <h6><?php _e('Choose Footer Title Font Type','spalab');?></h6>
                            <?php $switchclass = ("on" == dttheme_option('appearance', 'footer-title-font-type')) ? 'checkbox-switch-on font-checkbox-switch-on' : 'checkbox-switch-off font-checkbox-switch-off'; ?>
                            <div data-for="mytheme-footer-title-font-type" class="font-switcher checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-footer-title-font-type" name="mytheme[appearance][footer-title-font-type]" type="checkbox" 
                                <?php checked(dttheme_option('appearance','footer-title-font-type'),'on');?>/>
                            <p class="note"> <?php _e('Choose which type font.','spalab');?>  </p>
                        </div>
                        <div class="hr"></div>
                        
						<?php $show_footer_title_standard_font = ("on" == dttheme_option('appearance', 'footer-title-font-type')) ? " style='display:block;' " : "  style='display:none;' ";
                              $show_footer_title_google_font = (dttheme_option('appearance', 'footer-title-font-type')) ? "  style='display:none;' " : " style='display:block;' ";?>
                              
                        <div class="standard-font column one-column bpanel-option-set" <?php echo ( $show_footer_title_standard_font );?>>
                        	<div class="column one-half bpanel-option-set">
                                <?php dttheme_standard_font( __('Standard Font', 'spalab'), 'mytheme[appearance][footer-title-standard-font]', 
															dttheme_option('appearance', 'footer-title-standard-font'));?></div>
                            <div class="column one-half last bpanel-option-set">
                                <?php dttheme_standard_font_style( __('Sample Title Font Style', 'spalab'), 'mytheme[appearance][footer-title-standard-font-style]', 
                                      dttheme_option('appearance', 'footer-title-standard-font-style'));?></div>
                        </div>
                        
                        <div class="google-font column one-column bpanel-option-set" <?php echo ( $show_footer_title_google_font );?>>
                        	<div class="column one-column bpanel-option-set">
                            	<?php dttheme_admin_fonts(__('Footer Title Font','spalab'),'mytheme[appearance][footer-title-font]',
										dttheme_option('appearance','footer-title-font'));?>
                                <div class="clear"></div>
                                <p class="note"> <?php _e('Choose the footer font','spalab');?> </p>
                            </div>
                        
                        </div>
                    </div><!-- Font End -->
                    
                    
                    <div class="column one-half last">
                    <?php $label = 		__("Footer Title Font Color",'spalab');
                          $name  =		"mytheme[appearance][footer-title-font-color]";
						  $value =  	(dttheme_option('appearance','footer-title-font-color') != NULL) ? dttheme_option('appearance','footer-title-font-color') :"#";
						  $tooltip = 	__("Pick a custom footer title font color to the theme e.g. #a314a3",'spalab'); ?>
                          <h6><?php echo ( $label );?></h6>
                          <?php dttheme_admin_color_picker("",$name,$value,'');?>   
                    <p class="note"><?php echo ( $tooltip );?></p>
                    </div>
                    
                    <div class="column one-half last">
					<?php dttheme_admin_jqueryuislider(__('Footer Font Size','spalab'),"mytheme[appearance][footer-font-size]",
                          dttheme_option('appearance',"footer-font-size"));?>
                    </div>
                    
                    <div class="hr"> </div>

                    <!-- Font -->
                    <div class="font-container">
                    
                        <div class="bpanel-option-set">
                            <h6><?php _e('Choose Footer Content Font Type','spalab');?></h6>
                            <?php $switchclass = ("on" == dttheme_option('appearance', 'footer-content-font-type')) ? 'checkbox-switch-on font-checkbox-switch-on' : 'checkbox-switch-off font-checkbox-switch-off'; ?>
                            <div data-for="mytheme-footer-content-font-type" class="font-switcher checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-footer-content-font-type" name="mytheme[appearance][footer-content-font-type]" type="checkbox" 
                                <?php checked(dttheme_option('appearance','footer-content-font-type'),'on');?>/>
                            <p class="note"> <?php _e('Choose which type font.','spalab');?>  </p>
                        </div>
                        <div class="hr"></div>

						<?php $show_footer_content_standard_font = ("on" == dttheme_option('appearance', 'footer-content-font-type')) ? " style='display:block;' " : "  style='display:none;' ";
                              $show_footer_content_google_font = (dttheme_option('appearance', 'footer-content-font-type')) ? "  style='display:none;' " : " style='display:block;' ";?>

                        <div class="standard-font column one-column bpanel-option-set" <?php echo ( $show_footer_content_standard_font );?>>
                        	<div class="column one-half bpanel-option-set">
                                <?php dttheme_standard_font( __('Standard Font', 'spalab'), 'mytheme[appearance][footer-content-standard-font]', 
															dttheme_option('appearance', 'footer-content-standard-font'));?></div>
                            <div class="column one-half last bpanel-option-set">
                                <?php dttheme_standard_font_style( __('Sample Title Font Style', 'spalab'), 'mytheme[appearance][footer-content-standard-font-style]', 
                                      dttheme_option('appearance', 'footer-content-standard-font-style'));?></div>
                        </div>
                        
                        <div class="google-font column one-column bpanel-option-set" <?php echo ( $show_footer_content_google_font );?>>
                        	<div class="column one-column bpanel-option-set">
                            	<?php dttheme_admin_fonts( __('Footer Content Font','spalab'),'mytheme[appearance][footer-content-font]',
														   dttheme_option('appearance','footer-content-font'));?>
                                <div class="clear"></div>
                                <p class="note"> <?php _e('Choose the footer content font','spalab');?> </p>
                             </div>                        
                        </div>
                    </div><!-- Font End -->
                    
                    
                    <div class="hr_invisible"> </div>
                    
                    <div class="column one-half">
                    <?php $label = 		__("Footer Content Font Color",'spalab');
                          $name  =		"mytheme[appearance][footer-content-font-color]";
						  $value =  	(dttheme_option('appearance','footer-content-font-color') != NULL) ? dttheme_option('appearance','footer-content-font-color') :"#";
						  $tooltip = 	__("Pick a custom font color for footer content e.g. #a314a3",'spalab'); ?>
						  <h6><?php echo ( $label );?></h6>
                          <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo ( $tooltip );?></p>                  
                    </div>
                    
                    <div class="column one-half last">
						<?php dttheme_admin_jqueryuislider(__('Footer Content Font Size','spalab'),"mytheme[appearance][footer-content-font-size]",
                              dttheme_option('appearance',"footer-content-font-size"));?>                    
                    </div>
                    
                    <div class="hr"> </div>
                    
                    <div class="column one-half">
                    <?php $label = 		__("Primary / Default Color for Links",'spalab');
                          $name  =		"mytheme[appearance][footer-primary-color]";	
						  $value =  	(dttheme_option('appearance','footer-primary-color') != NULL) ? dttheme_option('appearance','footer-primary-color') :"#";
                          $tooltip = 	__("Pick a custom primary color for links in footer e.g. #551256",'spalab'); ?>
                          <h6><?php echo ( $label );?></h6>
                	      <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo ( $tooltip );?></p>                  
                    </div>

                    <div class="column one-half last">
                    <?php $label = 		__("Hover Color for Links",'spalab');
                          $name  =		"mytheme[appearance][footer-secondary-color]";	
						  $value =  	(dttheme_option('appearance','footer-secondary-color') != NULL) ? dttheme_option('appearance','footer-secondary-color') :"#";
                          $tooltip = 	__("Pick a custom color for footer links hover state e.g. #564912",'spalab'); ?>
                          <h6><?php echo ( $label );?></h6>
                	      <?php dttheme_admin_color_picker("",$name,$value,'');?>   
                          <p class="note"><?php echo ( $tooltip );?></p>                 
                    </div>
                    
                    <div class="hr"> </div>

                    <div class="column one-half">
                    <?php $label = 		__("Footer BG Color",'spalab');
    	                  $name  =		"mytheme[appearance][footer-bg-color]";	
        	              $value =  	(dttheme_option('appearance','footer-bg-color')  != NULL) ? dttheme_option('appearance','footer-bg-color') : "#";
            	          $tooltip = 	__("Pick a custom background color of the theme's footer section.(e.g. #a314a3)",'spalab'); ?>
                          <h6><?php echo ( $label );?></h6>
                	      <?php dttheme_admin_color_picker("",$name,$value,'');?>
                          <p class="note"><?php echo ( $tooltip );?></p>
                    </div>
                    <div class="column one-half last">
                    <?php $label = 		__("Copyright Section BG Color",'spalab');
    	                  $name  =		"mytheme[appearance][copyright-bg-color]";	
        	              $value =  	(dttheme_option('appearance','copyright-bg-color')  != NULL) ? dttheme_option('appearance','copyright-bg-color') : "#";
            	          $tooltip = 	__("Pick a custom background color of the theme's copyright section.(e.g. #a314a3)",'spalab'); ?>
						  <h6><?php echo ( $label );?></h6>
                	      <?php dttheme_admin_color_picker("",$name,$value,'');?> 
                          <p class="note"><?php echo ( $tooltip );?></p>                         
                	</div>
                    
                </div>
                <!-- Footer Font End-->
            </div>
        </div><!-- Footer Section (#appearance-footer) End-->
        
        
        <!-- Typography Section -->
        <div id="appearance-typography" class="tab-content">
	        <div class="bpanel-box">
            
                <div class="box-title">
                	<h3><?php _e("Disable Typography Settings",'spalab'); ?></h3>
                </div>
                <div class="box-content">
                    <div class="bpanel-option-set">
                    	<h6><?php _e('Disable Typography Settings','spalab');?></h6>
                        <?php dttheme_switch("",'appearance','disable-typography-settings');?>
                        <p class="note"> <?php _e('Enable or Disable the typography settings','spalab');?>  </p>
                    </div>
                </div>
            
            	<?php for($i=1;$i<=6;$i++): ?>
                    <div class="box-title">
                    	<h3><?php echo "H{$i} ";?><?php _e('Font Family, Size and Color','spalab');?></h3>
                        
                    </div>
                    <div class="box-content">
                    	 <p class="note"> <?php _e("Choose Font Family, Size and Color for",'spalab'); echo " H{$i}"?> </p>
                         
                         <!-- Font -->
                         <div class="font-container">
                            <div class="bpanel-option-set">
                                <h6><?php echo "H{$i} "; _e('Choose Font Type','spalab');?></h6>
                                <?php $switchclass = ("on" == dttheme_option('appearance', "H{$i}-font-type")) ? 'checkbox-switch-on font-checkbox-switch-on' : 'checkbox-switch-off font-checkbox-switch-off'; ?>
                                <div data-for="<?php echo "mytheme-H{$i}-font-type";?>" class="font-switcher checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                                <input class="hidden" id="<?php echo "mytheme-H{$i}-font-type";?>" name="mytheme[appearance][<?php echo "H{$i}-font-type";?>]" type="checkbox" 
                                    <?php checked(dttheme_option('appearance',"H{$i}-font-type"),'on');?>/>
                                <p class="note"> <?php _e('Choose which type font.','spalab');?>  </p>
                            </div>
                            <div class="hr"></div>
                            <?php $show_h_standard_font = ("on" == dttheme_option('appearance',"H{$i}-font-type")) ? " style='display:block;' " : "  style='display:none;' ";
                              	  $show_h_google_font = (dttheme_option('appearance',"H{$i}-font-type")) ? "  style='display:none;' " : " style='display:block;' ";?>
                            
                            <div class="standard-font column one-column bpanel-option-set" <?php echo ( $show_h_standard_font );?>>
                                <div class="column one-half bpanel-option-set">
                                    <?php dttheme_standard_font( "H{$i} ".__('Standard Font', 'spalab'), "mytheme[appearance][H{$i}-standard-font]", 
                                                                dttheme_option('appearance', "H{$i}-standard-font"));?></div>
                                <div class="column one-half last bpanel-option-set">
                                    <?php dttheme_standard_font_style( "H{$i} ".__('Standard Font Style', 'spalab'), "mytheme[appearance][H{$i}-standard-font-style]", 
                                          dttheme_option('appearance', 'menu-standard-font-style'));?></div>
                            </div>
                            
                            <div class="google-font column one-column bpanel-option-set" <?php echo ( $show_h_google_font );?>>
                            	<div class="column one-column">
                                	<div class="bpanel-option-set"><?php dttheme_admin_fonts("H{$i} ".__('Font','spalab'),
											"mytheme[appearance][H{$i}-font]",dttheme_option('appearance',"H{$i}-font"));?></div>
                                </div>
                            </div>
                            
                         	
                         </div><!-- Font End -->

                         <div class="hr_invisible"> </div>
                         <div class="column one-half last">
							<?php $label = 		"H{$i} ".__("Font Color",'spalab');
                                  $name  =		"mytheme[appearance][H{$i}-font-color]";
								  $value =  	(dttheme_option('appearance',"H{$i}-font-color") != NULL) ? dttheme_option('appearance',"H{$i}-font-color") :"#"; ?>
								  <h6><?php echo ( $label );?></h6>	
                                  <?php dttheme_admin_color_picker("",$name,$value);?>                    
                         </div>
                         <div class="column one-half last">
						 	<?php dttheme_admin_jqueryuislider("H{$i} ".__('Font Size','spalab'),
                           		"mytheme[appearance][H{$i}-size]",dttheme_option('appearance',"H{$i}-size"));?>
                    	 </div>     
                    </div>
                <?php endfor;?>
            </div><!-- .bpanel-box end -->
        </div><!-- Typography Section -->


        <!--Layout Section -->
        <div id="appearance-layout" class="tab-content">
        	<!-- Layout Selection-->
	        <div class="bpanel-box">
                <div class="box-title">
                	<h3><?php _e('Choose Layout','spalab');?></h3>
                    
                </div>
                <div class="box-content">
                	<h6><?php _e('Layout','spalab');?></h6>
                	<p class="note no-margin"> <?php _e("Choose the Layout Style(Boxed / Fullwidth)","spalab");?> </p>
                    <div class="hr_invisible"> </div>
					<div class="bpanel-option-set">    
                         <ul class="bpanel-post-layout bpanel-layout-set">
                         	<?php $layouts = array("boxed","wide");
								  foreach($layouts as $layout):
								  	$class = ( $layout ==  dttheme_option('appearance','layout')) ? " class='selected' " : "";?>
                                  	<li class="themelayout"><a href="#" rel="<?php echo esc_attr( $layout );?>" <?php echo ( $class );?> title="<?php echo esc_attr( $layout );?>">
                                    	<img src="<?php echo IAMD_FW_URL."theme_options/images/layouts/{$layout}.png";?>" />
                                    </a></li>
                            <?php endforeach;?>	      
                         </ul>
                         <input id="mytheme[appearance][layout]" name="mytheme[appearance][layout]" type="hidden" 
                         		value="<?php echo  dttheme_option('appearance','layout');?>"/>
                    </div>
                </div><!-- .box-content -->
			</div><!-- Layout Selection End-->
            
        	<!-- Boxed Layout Settings -->
            <?php $style = (dttheme_option('appearance','layout') == "boxed") ? '' :'style="display:none;"'; ?>
	        <div id="boxed" class="bpanel-box" <?php echo ( $style );?>>
                <div class="box-title"><h3><?php _e('Boxed Layout BG Background','spalab');?></h3></div>
                <div class="box-content">
                
                    <?php dttheme_bgtypes("mytheme[appearance][bg-type]","appearance","bg-type");?>
                 
                    <?php $bg_pattern = ( dttheme_option('appearance','bg-type')=="bg-patterns" ) ? 'style="display:block"' : 'style="display:none"'; ?>
                    <?php $bg_custom = ( dttheme_option('appearance','bg-type')=="bg-custom" ) ? 'style="display:block"' : 'style="display:none"'; ?>
                
                	<!-- In-built BG Patterns starts-->
                    <div class="bg-pattern" <?php echo ( $bg_pattern );?>>
                    	<div class="hr_invisible"> </div>
                    	<h6> <?php _e('Choose Patterns','spalab');?> </h6>
                    	<!-- Pattern Sets Start -->
                    	<div class="bpanel-option-set">
                        	
                            <ul class="bpanel-post-layout bpanel-layout-set">
                            <?php $pattrens  = dttheme_listImage(IAMD_FW."theme_options/images/patterns/");
								foreach($pattrens as $key => $value):
									$class = ( $key ==  dttheme_option('appearance','boxed-layout-pattern')) ? " class='selected' " : "";
									echo "<li>";
									echo "<a href='#' rel='{$key}' {$class}><img width='80px' height='80px' src='".IAMD_FW_URL."theme_options/images/patterns/$key' /></a>";
									echo "</li>";
								endforeach;?></ul>
                            <input id="mytheme[appearance][boxed-layout-pattern]" name="mytheme[appearance][boxed-layout-pattern]" type="hidden" 
                         			value="<?php echo  dttheme_option('appearance','boxed-layout-pattern');?>"/>
                           <p class="note">	<?php _e('Choose background pattern, you can add patterns by placing the png files in the folder ','spalab');
						   	echo ('<b>framework/theme_options/images/pattern/</b>');?>   </p>
                        </div><!-- Patterns set End -->

                        <!-- Pattern BG Settings -->
                        <div class="column one-column">
                        	<div class="bpanel-option-set">
                                <h6><?php _e('Boxed Layout Background Pattern repeat','spalab');?></h6>
                                <div class="clear"></div>
                                <select name="mytheme[appearance][boxed-layout-pattern-repeat]">
                                    <option value=""><?php _e("Select",'spalab');?></option>
                                    <?php $options = array("repeat","repeat-x","repeat-y","no-repeat");
										foreach($options as $option):?>
                                        <option value="<?php echo esc_attr( $option );?>"
                                            <?php selected($option,dttheme_option('appearance','boxed-layout-pattern-repeat')); ?>><?php echo ( $option );?></option>
                                    <?php endforeach;?>
                                </select>
                                <p class="note"> <?php _e("Select how would you like to repeat the pattern image",'spalab');?> </p>
                            </div>
                            
                        </div>
                        
                        <div class="hr"> </div>
                        
                        <div class="column one-half">
                            <h6><?php _e("Disable Background Color",'spalab');?></h6>
                            <?php dttheme_switch("",'appearance','disable-boxed-layout-pattern-color');?>
                        </div>
                            
                        
                        <div class="column one-half last">
                        
                        <?php $label = 		__("Choose Background Color",'spalab');
                              $name  =		"mytheme[appearance][boxed-layout-pattern-color]";
                              $value =  	(dttheme_option('appearance','boxed-layout-pattern-color') != NULL) ? dttheme_option('appearance','boxed-layout-pattern-color') :"#";
                              $tooltip = 	__("Pick a custom background color of the theme.(e.g. #a314a3)",'spalab');
                                dttheme_admin_color_picker($label,$name,$value,'');?>    
                                
                                <p class="note"> <?php echo ( $tooltip );?></p>
                        </div>
                        <!-- Pattern BG Settings end-->    
                        
                        <div class="hr"> </div>
                        
                        <div class="bpanel-option-set">
                        <?php echo dttheme_admin_jqueryuislider( __("Background opacity",'spalab'),	"mytheme[appearance][boxed-layout-pattern-opacity]",
                                                                          dttheme_option("appearance","boxed-layout-pattern-opacity"),"");?>
                        </div> 
                        
                    </div><!-- In-built BG Patterns ends-->
                     	
                	<!-- Upload custom BG option Starts -->
                    <div class="bg-custom" <?php echo ( $bg_custom );?>>
                        
                        <div class="hr_invisible"> </div>
                        <h6><?php _e("Boxed Layout Background Image",'spalab');?></h6>
                        <div class="clear"></div>
                        <div class="image-preview-container">
                            <input id="mytheme-boxed-layout-bg" name="mytheme[appearance][boxed-layout-bg]" type="text" class="uploadfield medium" readonly="readonly"
                                    value="<?php echo dttheme_option('appearance','boxed-layout-bg');?>"/>
                            <input type="button" value="<?php _e('Upload','spalab');?>" class="upload_image_button show_preview" />
                            <input type="button" value="<?php _e('Remove','spalab');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('appearance','boxed-layout-bg'));?>
                        </div>
                        <p class="note"> <?php _e("Upload an image for the theme's background",'spalab');?> </p>
                       
                       <div class="hr_invisible"> </div>                       
                
                        <!-- Boxed Layout BG Settings -->
                        <div class="column one-half">
                        <?php $bg_settings = array(
                                    array(
                                        "label"=>	__('Background Image Repeat','spalab'),
                                        "tooltip"=>	__("Select how would you like to repeat the background image",'spalab'),
                                        "name" => "mytheme[appearance][boxed-layout-bg-repeat]",
                                        "db-key"=>"boxed-layout-bg-repeat",
                                        "options"=>  array("repeat","repeat-x","repeat-y","no-repeat")
                                    ),
                                    array(
                                        "label"=>__('Background Image Position','spalab'),
                                        "tooltip"=>	__("Select how would you like to position the background",'spalab'),
                                        "name" => "mytheme[appearance][boxed-layout-bg-position]",
                                        "db-key"=>"boxed-layout-bg-position",
                                        "options"=>  array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right")
                                    )
                                );
                    
                              foreach($bg_settings as $bgsettings): ?>
                                  <div class="bpanel-option-set">
                                    <label><?php echo esc_html ( $bgsettings['label'] );?></label>
                                    <div class="clear"></div>
                                    <select name="<?php echo esc_attr( $bgsettings['name'] );?>">
                                        <option value=""><?php _e("Select",'spalab');?></option>
                                        <?php foreach($bgsettings['options'] as $option):?>
                                            <option value="<?php echo esc_attr( $option );?>"
                                                <?php selected($option,dttheme_option('appearance',$bgsettings['db-key'])); ?>><?php echo ( $option );?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <p class="note"> <?php echo esc_html( $bgsettings['tooltip'] );?>  </p>
                                    <div class="hr_invisible"> </div>
                                  </div>
                        <?php endforeach;?>
                        		 <div class="bpanel-option-set">	
                                     
                                 	 <h6><?php _e("Disable Background Color",'spalab');?></h6>
	                        		 <?php dttheme_switch("",'appearance','disable-boxed-layout-bg-color');?>
                                 </div>    
                        </div><!-- Boxed Layout BG Settings End -->
                        
                         <!-- Boxed Layout BG Color -->
                         <div class="column one-half last">
	                        
                            <?php $label = 		__("Background Color",'spalab');
                                  $name  =		"mytheme[appearance][boxed-layout-bg-color]";
                                  $value =  	(dttheme_option('appearance','boxed-layout-bg-color') != NULL) ? dttheme_option('appearance','boxed-layout-bg-color') :"#";
                                  $tooltip = 	__("Pick a background color of the theme.(e.g. #a314a3)",'spalab');
                                dttheme_admin_color_picker($label,$name,$value,'');?>
                                
                                <p class="note"> <?php echo ( $tooltip );?> </p>
                                
                                <div class="hr_invisible"> </div>
                                
							 <?php echo dttheme_admin_jqueryuislider( __("Background opacity",'spalab'),	"mytheme[appearance][boxed-layout-bg-opacity]",
                                                                      dttheme_option("appearance","boxed-layout-bg-opacity"),"");?>                                
                         </div><!-- Boxed Layout BG Color -->
                    </div><!-- Upload custom BG option Ends -->
                     
                </div><!-- .box-content -->   
            </div><!-- .bpanel-box -->    
        </div><!--Layout Section  End-->        
        
    </div><!-- .bpanel-main-content end -->
</div><!-- appearance  end-->