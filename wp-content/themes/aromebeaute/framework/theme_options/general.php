<!-- general -->
<div id="general" class="bpanel-content">

    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel"> 
            <li><a href="#my-general"><?php _e("General",'spalab');?></a></li>
            <li><a href="#my-sociable"><?php _e("Sociable",'spalab');?></a></li>
            <li><a href="#my-top"><?php _e("Top",'spalab');?></a></li>
        </ul>
        
        <!-- my-general-->
        <div id="my-general" class="tab-content">
        
            <!-- .bpanel-box -->
            <div class="bpanel-box">
                    <!-- Logo -->
                    <div class="box-title"><h3><?php _e('Logo','spalab');?></h3></div>
                    <div class="box-content">
                    
                    
                    	<div class="column three-fifth">
                            <div class="bpanel-option-set">
                                <?php $logo = array(
                                        'id'=>		'logo',
                                        'options'=>		array(
                                                            'true'	=> __('Custom Image Logo','spalab'),
                                                             ''=> 	__('Display Site Title','spalab'). '<small><a href="'. admin_url( 'options-general.php' ) .'">( '. __('click here to edit site title','spalab').')</a></small>',
                                                            )
                                        );
                                             
                                        $output = "";
                                        $i = 0;
                                        foreach($logo['options'] as $key => $option):
                                            $checked = ( $key ==  dttheme_option('general',$logo['id']) ) ? ' checked="checked"' : '';
                                            $output .= "<label><input type='radio' name='mytheme[general][$logo[id]]' value='{$key}'  $checked />$option</label>";
                                            if($i == 0):
                                                $output .='<div class="clear"></div>';
                                            endif;
                                        $i++;
                                        endforeach;
                                        echo ( $output );?>
                          </div><!-- .bpanel-option-set end-->
                      
                        </div>
                        
                        <div class="column two-fifth last">
                            <p class="note"><?php _e('You can choose whether you wish to display a custom logo or your site title.','spalab');?></p>
                        </div>  
                        
                        <div class="hr"> </div>
                         <div class="clear"></div>
                        
                        <h6><?php _e('Logo','spalab');?></h6>
                        <div class="image-preview-container">
                            <input id="mytheme-logo" name="mytheme[general][logo-url]" type="text" class="uploadfield" readonly="readonly"
                                    value="<?php echo  dttheme_option('general','logo-url');?>" />
                            <input type="button" value="<?php _e('Upload','spalab');?>" class="upload_image_button show_preview" />
                            <input type="button" value="<?php _e('Remove','spalab');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','logo-url'),false,'logo.png');?>
                        </div>
                        
                        <p class="note"> <?php _e('Upload a logo for your theme, or specify the image address of your online logo.','spalab');?> </p>
                        
                        <div class="hr"></div>
                        <div class="clear"></div>
                        <h6><?php _e('Retina Logo','spalab');?></h6>
                        <div class="image-preview-container">
                          <input id="mytheme-retina-logo" type="text" name="mytheme[general][retina-logo-url]" class="uploadfield" readonly="readonly" 
                            value="<?php echo dttheme_option('general','retina-logo-url');?>"/>
                          <input type="button" value="<?php _e('Upload','spalab');?>" class="upload_image_button show_preview" />
                          <input type="button" value="<?php _e('Remove','spalab');?>" class="upload_image_reset" />
                          <?php dttheme_adminpanel_image_preview(dttheme_option('general','retina-logo-url'),false,'logo@2x.png');?>
                        </div>

                        <p class="note"><?php _e('Upload a retina logo for your theme, or specify the image address of your online logo.','spalab');?></p>
                        <div class="clear"></div>
                        
                        <div class="one-half-content">
                        	<h6><?php _e('Width','spalab');?></h6>
                            <input type="text" class="medium" name="mytheme[general][retina-logo-width]" value="<?php echo dttheme_option('general','retina-logo-width');?>" />
							<?php _e('px','spalab');?>
                        </div>    

                        <div class="one-half-content last">
                        	<h6><?php _e('Height','spalab');?></h6>
                            <input type="text" class="medium" name="mytheme[general][retina-logo-height]" value="<?php echo dttheme_option('general','retina-logo-height');?>"/>
                            <?php _e('px','spalab');?>
                        </div>    
                        <p class="note"><?php _e('If retina logo is uploaded, enter the standard logo width and height in above respective boxes.','spalab');?></p>
                        <div class="clear"></div>


                        <div class="bpanel-option-set">
                          <?php $label =      __("Site Title Color", 'spalab');
                          $name  =      "mytheme[general][site-title-color]";   
                          $value =      (dttheme_option('general','site-title-color') != NULL) ? dttheme_option('general','site-title-color') : "#";
                          $tooltip =    __("Pick a custom color for the site title e.g. #564912", 'spalab'); ?>
                          <h6><?php echo $label;?></h6> 
                          <?php dttheme_admin_color_picker("",$name,$value,'');?>  
                          <p class="note"><?php echo $tooltip;?></p>                    
                        </div>
                        
                    </div> <!-- Logo End -->

                    <!-- Favicon -->
                    <div class="box-title">
                        <h3><?php _e('Favicon','spalab');?></h3>
                    </div>
                    <div class="box-content">
                    	<h6> <?php _e('Enable Favicon','spalab');?> </h6> 
                        
                        <div class="column one-fifth">                        
							<?php $checked = ( "true" ==  dttheme_option('general','enable-favicon') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('general','enable-favicon') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="enable-favicon" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="enable-favicon" name="mytheme[general][enable-favicon]" type="checkbox" 
                            value="true" <?php echo ( $checked );?> />
                        </div>
                        <!--<div class="column four-fifth last"> -->                   
                        <div class="hr"></div>
                        <div class="clear"></div>
                        <h6><?php _e('Custom Favicon','spalab');?></h6>
                          <div class="image-preview-container">
                            <input id="mytheme-favicon" name="mytheme[general][favicon-url]" type="text" class="uploadfield medium" 
                                value="<?php echo  dttheme_option('general','favicon-url');?>" />
                            <input type="button" value="<?php _e('Upload','spalab');?>" class="upload_image_button" />
                            <input type="button" value="<?php _e('Remove','spalab');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','favicon-url'),false,'favicon.ico');?>
                        <!--</div>-->
                          </div>
                          <p class="note"> <?php _e('Upload a favicon for your theme, or specify the oneline URL for favicon','spalab');?>  </p>

                        <div class="hr"></div>
                        <div class="clear"></div>
                        <h6><?php _e('Apple iPhone Icon','spalab');?></h6>
                        <div class="image-preview-container">
                          <input id="mytheme-apple-icon" name="mytheme[general][apple-favicon]" type="text" class="uploadfield"
                            value="<?php echo dttheme_option('general','apple-favicon');?>"/>
                            <input type="button" value="<?php _e('Upload','spalab');?>" class="upload_image_button" />
                            <input type="button" value="<?php _e('Remove','spalab');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','apple-favicon'),false,'apple-touch-icon.png');?>
                        </div>
                        <p class="note"> <?php _e('Upload your custom iPhone icon (57px by 57px), or specify the oneline URL for favicon','spalab');?>  </p>

                        <div class="hr"></div>
                        <div class="clear"></div>
                        <h6><?php _e('Apple iPhone Retina Icon','spalab');?></h6>
                        <div class="image-preview-container">
                          <input id="mytheme-apple-icon" name="mytheme[general][apple-retina-favicon]" type="text" class="uploadfield"
                            value="<?php echo dttheme_option('general','apple-retina-favicon');?>"/>
                            <input type="button" value="<?php _e('Upload','spalab');?>" class="upload_image_button" />
                            <input type="button" value="<?php _e('Remove','spalab');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','apple-retina-favicon'),false,'apple-touch-icon-114x114.png');?>
                        </div>
                        <p class="note"><?php _e('Upload your custom iPhone retina icon (144px by 144px), or specify the oneline URL for favicon','spalab');?></p>

                        <div class="hr"></div>
                        <div class="clear"></div>
                        <h6><?php _e('Apple iPad Icon','spalab');?></h6>
                        <div class="image-preview-container">
                          <input id="mytheme-apple-icon" name="mytheme[general][apple-ipad-favicon]" type="text" class="uploadfield"
                            value="<?php echo dttheme_option('general','apple-ipad-favicon');?>"/>
                            <input type="button" value="<?php _e('Upload','spalab');?>" class="upload_image_button" />
                            <input type="button" value="<?php _e('Remove','spalab');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','apple-ipad-favicon'),false,'apple-touch-icon-72x72.png');?>
                        </div>
                        <p class="note"> <?php _e('Upload your custom iPad icon (72px by 72px), or specify the oneline URL for favicon','spalab');?>  </p>

                        <div class="hr"></div>
                        <div class="clear"></div>
                        <h6><?php _e('Apple iPad Retina Icon','spalab');?></h6>
                        <div class="image-preview-container">
                          <input id="mytheme-apple-icon" name="mytheme[general][apple-ipad-retina-favicon]" type="text" class="uploadfield"
                            value="<?php echo dttheme_option('general','apple-ipad-retina-favicon');?>"/>
                            <input type="button" value="<?php _e('Upload','spalab');?>" class="upload_image_button" />
                            <input type="button" value="<?php _e('Remove','spalab');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','apple-ipad-retina-favicon'),false,'apple-touch-icon-114x114.png');?>
                        </div>
                        <p class="note"><?php _e('Upload your custom iPad retina icon (114px by 114px), or specify the oneline URL for favicon','spalab');?></p>
                    </div> <!-- Favicon End -->

                    <!-- Others -->
                    <div class="box-title"><h3><?php _e('Others', 'spalab');?></h3></div>
                    <div class="box-content">

                      <h6> <?php _e('Enable Sticky Navigation','spalab'); ?></h6>
                    
                      <div class="column one-fifth">
                        	<?php $checked = ( "true" ==  dttheme_option('general','enable-sticky-nav') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('general','enable-sticky-nav') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-enable-sticky-nav" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-enable-sticky-nav" name="mytheme[general][enable-sticky-nav]" type="checkbox" 
                            value="true" <?php echo ( $checked );?> />
                        </div>
                        
                        <div class="column four-fifth last">
                            <p class="note"><?php _e('YES! to enable sticky navigation.','spalab');?> </p>
                        </div>
                        
                        <div class="clear"> </div>
                        <div class="hr"></div>
                     
                     <h6> <?php _e('Disable Loading Bar','spalab'); ?></h6>
                    
                      <div class="column one-fifth">
                        	<?php $checked = ( "true" ==  dttheme_option('general','loading-bar') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  dttheme_option('general','loading-bar') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-loading-bar" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                            <input class="hidden" id="mytheme-loading-bar" name="mytheme[general][loading-bar]" type="checkbox" 
                            value="true" <?php echo ( $checked );?> />
                        </div>
                        
                        <div class="column four-fifth last">
                            <p class="note"><?php _e('YES! to disable loading-bar. ','spalab');?> </p>
                        </div>
                        
                        <div class="clear"> </div>
                        <div class="hr"></div>
                    

                      <h6> <?php _e('Globally Disable Comments on Pages','spalab');?> </h6>
                      <div class="column one-fifth">
                      	<?php $checked = ( "true" ==  dttheme_option('general','disable-page-comment') ) ? ' checked="checked"' : ''; ?>
                        <?php $switchclass = ( "true" ==  dttheme_option('general','disable-page-comment') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-global-page-comment" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                        <input class="hidden" id="mytheme-global-page-comment" name="mytheme[general][disable-page-comment]" type="checkbox" value="true" <?php echo ( $checked );?> />
                      </div>
                      <div class="column four-fifth last">
                      	<p class="note no-margin"><?php 
							_e('YES! to disable comments on all the pages. This will globally override your "Allow comments" option under your page "Discussion" settings. ','spalab');?> </p>
                      </div>
                      <div class="hr"></div>
                      
                      <div class="clear"> </div>

                      <h6> <?php _e('Globally Enable Page Title','spalab');?> </h6>
                      <div class="column one-fifth">
                      	<?php $checked = ( "true" ==  dttheme_option('general','disable-page-title') ) ? ' checked="checked"' : ''; ?>
                        <?php $switchclass = ( "true" ==  dttheme_option('general','disable-page-title') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-global-page-title" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                        <input class="hidden" id="mytheme-global-page-title" name="mytheme[general][disable-page-title]" type="checkbox" value="true" <?php echo ( $checked );?> />
                      </div>
                      <div class="column four-fifth last">
                      	<p class="note no-margin"><?php 
							_e('YES! to enable page title on all the pages.','spalab');?> </p>
                      </div>
                      <div class="hr"></div>
                      <div class="clear"> </div>
                      
                      <h6> <?php _e('Globally Enable Placeholder','spalab');?> </h6>
                      <div class="column one-fifth">
                      	<?php $checked = ( "true" ==  dttheme_option('general','disable-posts-placeholder') ) ? ' checked="checked"' : ''; ?>
                        <?php $switchclass = ( "true" ==  dttheme_option('general','disable-posts-placeholder') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-global-posts-placeholder" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                        <input class="hidden" id="mytheme-global-posts-placeholder" name="mytheme[general][disable-posts-placeholder]" type="checkbox" value="true" <?php echo ( $checked );?> />
                      </div>
                      <div class="column four-fifth last">
                      	<p class="note no-margin"><?php 
							_e('YES! to enable placeholder on all posts.','spalab');?> </p>
                      </div>
                      <div class="hr"></div>
                      <div class="clear"> </div>
                      
                      <h6><?php _e('Globally Disable Comments on Posts','spalab');?></h6>
                      <div class="column one-fifth">
                      	<?php $checked = ( "true" ==  dttheme_option('general','global-post-comment') ) ? ' checked="checked"' : ''; ?>
                        <?php $switchclass = ( "true" ==  dttheme_option('general','global-post-comment') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-global-post-comment" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                        <input class="hidden" id="mytheme-global-post-comment" name="mytheme[general][global-post-comment]" type="checkbox" value="true" <?php echo ( $checked );?> />
                      </div>
                      <div class="column four-fifth last">
                      	<p class="note no-margin"><?php 
							_e('YES! to disable comments on all the posts. This will globally override your "Allow comments" option under your post "Discussion" settings. ','spalab');?> </p>
                      </div>
                      <div class="hr"></div>
                      

                      <h6><?php _e('Globally Disable Comments on Portfolios','spalab');?></h6>
                      <div class="column one-fifth">
                      	<?php $checked = ( "true" ==  dttheme_option('general','disable-portfolio-comment') ) ? ' checked="checked"' : ''; ?>
                        <?php $switchclass = ( "true" ==  dttheme_option('general','disable-portfolio-comment') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-global-portfolio-comment" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                        <input class="hidden" id="mytheme-global-portfolio-comment" name="mytheme[general][disable-portfolio-comment]" type="checkbox" value="true" <?php echo ( $checked );?> />
                      </div>
                      
                      <div class="column four-fifth last">
                      	<p class="note"><?php _e('Enable/ Disable comments on portfolio pages.','spalab');?> </p>
                      </div>
                      <div class="hr"></div>
                      

                      <h6><?php _e('Globally Disable Breadcrumbs','spalab');?></h6>
                      <div class="column one-fifth">
                      	<?php $switchclass = ( "on" ==  dttheme_option('general','disable-breadcrumb') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-global-breadcrumb-disable" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                        <input class="hidden" id="mytheme-global-breadcrumb-disable" name="mytheme[general][disable-breadcrumb]" type="checkbox" 
							<?php checked(dttheme_option('general','disable-breadcrumb'),'on');?>/>                            
                      </div>
                      <div class="column four-fifth last">
                      	<p class="note"><?php _e('show / Hide Breacrumbs globally on sitewide','spalab');?> </p>
                      </div>
                      <div class="hr-invisible-small"> </div>
                      
                      <label><?php _e('Breadcrumb Delimiter','spalab');?></label>
                      <select id="mytheme-breadcrumb-delimiter" name="mytheme[general][breadcrumb-delimiter]"><?php 
					  	$breadcrumb_icons = array('fa-angle-double-right','fa-sort','fa-ok','fa-angle-right','fa-caret-right','fa-double-angle-right','fa-arrow-right','fa-chevron-right',
							'fa-hand-right','fa-plus','fa-remove');
							foreach($breadcrumb_icons as $breadcrumb_icon):
								$s = selected(dttheme_option('general','breadcrumb-delimiter'),$breadcrumb_icon,false);
								echo "<option $s >$breadcrumb_icon</option>";
							endforeach;?></select>
                      <p class="note"><?php _e('This is the symbol that will appear in between your breadcrumbs','spalab');?></p>
                      
                      <label><?php _e('Breadcrumb Type','spalab');?></label>
                      <select id="mytheme-breadcrumb-type" name="mytheme[general][breadcrumb-type]"><?php 
					  	$breadcrumb_types = array('type1','type2');
							foreach($breadcrumb_types as $breadcrumb_type):
								$s = selected(dttheme_option('general','breadcrumb-type'),$breadcrumb_type,false);
								echo "<option $s >$breadcrumb_type</option>";
							endforeach;?></select>
                      <p class="note"><?php _e('Select breadcrumb type','spalab');?></p>
                      
                      <h6><?php _e('Default Breadcrumb Image','spalab');?></h6>
                        <div class="image-preview-container">
                            <input id="mytheme-breadcrumb-image" name="mytheme[general][breadcrumb-image-url]" type="text" class="uploadfield" readonly="readonly"
                                    value="<?php echo  dttheme_option('general','breadcrumb-image-url');?>" />
                            <input type="button" value="<?php _e('Upload','spalab');?>" class="upload_image_button show_preview" />
                            <input type="button" value="<?php _e('Remove','spalab');?>" class="upload_image_reset" />
                            <?php dttheme_adminpanel_image_preview(dttheme_option('general','breadcrumb-image-url'),false,'breadcrumb-default-bg.jpg');?>
                        </div>
                        
                        <p class="note"> <?php _e('Upload a default breadcrumb image for your theme. This option is applicable for breadcrumb TYPE2','spalab');?> </p>
                      <div class="hr-invisible-small"> </div> <div class="hr"></div>
                      
                      <h6><?php _e('Globally Enable Page Layout for All Single Posts','spalab');?></h6>
                      <div class="column one-fifth">
                      	<?php $switchclass = ( "on" ==  dttheme_option('general','disable-page-layout-single-post') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-global-page-layout-single-post-disable" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                        <input class="hidden" id="mytheme-global-page-layout-single-post-disable" name="mytheme[general][disable-page-layout-single-post]" type="checkbox" 
							<?php checked(dttheme_option('general','disable-page-layout-single-post'),'on');?>/>                            
                      </div>
                      <div class="column four-fifth last">
                      	<p class="note"><?php _e('show / Hide Page Layout globally on all single posts','spalab');?> </p>
                      </div>
                      <div class="hr-invisible-small"> </div>
                      
                    	<div class="bpanel-option-set">
                        	<ul class="bpanel-post-layout bpanel-layout-set">
                           	<?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar');
							foreach($layout as $key => $value):
								$class = ( $key ==  dttheme_option('general',"global-single-posts-layout")) ? " class='selected' " : "";
								echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
							endforeach; ?>
                            </ul>
                            <input id="mytheme[general][global-single-posts-layout]" name="mytheme[general][global-single-posts-layout]" type="hidden"  
                            	value="<?php echo dttheme_option('general',"global-single-posts-layout");?>"/>
                        </div>
                      <div class="hr"></div>
                      
                   
                      <h6><?php _e('Disable browser custom scroll','spalab');?></h6>
                      <div class="column one-fifth">
                      	<?php $switchclass = ( "on" ==  dttheme_option('general','disable-custom-scroll') ) ? 'checkbox-switch-on' :'checkbox-switch-off';?>
                        <div data-for="mytheme-browesr-scroll-disable" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                        <input class="hidden" id="mytheme-browesr-scroll-disable" name="mytheme[general][disable-custom-scroll]" type="checkbox" 
							<?php checked(dttheme_option('general','disable-custom-scroll'),'on');?>/>
                      </div>
                      <div class="column four-fifth last">
                      	<p class="note"><?php _e('Check if you do not want disable the browser custom scrollbar :)','spalab');?> </p>
                      </div>
                      <div class="hr"></div>
                      
                      
                      <h6><?php _e('Disable Style Picker','spalab');?></h6>
                      <div class="column one-fifth">
                      	<?php $switchclass = ( "on" ==  dttheme_option('general','disable-picker') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="mytheme-global-disable-picker" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                        <input class="hidden" id="mytheme-global-disable-picker" name="mytheme[general][disable-picker]" type="checkbox" <?php checked(dttheme_option('general','disable-picker'),'on');?>/>                      </div>
                      <div class="column four-fifth last">
                      	<p class="note"><?php _e('YES! to hide the front end style picker','spalab');?> </p>
                      </div>
                      <div class="hr"></div>
                      
                      <h6><?php _e('Google Font Subset','spalab');?></h6>
                      <div class="column one-half">
                      	<input id="mytheme-google-font-subset" name="mytheme[general][google-font-subset]" type="text" value="<?php echo dttheme_option('general','google-font-subset');?>"/>
                      </div>
                      
                      <div class="column one-half last">
                      	<p class="note no-margin"><?php _e('Specify which subsets should be downloaded. Multiple subsets should be separated with coma','spalab'); ?></p>
                      </div>
                      
                      <div class="clear"> </div>
                      <div class="hr-invisible-small"> </div>
                      <p class="note"><?php _e('Some of the fonts in the Google Font Directory supports multiple scripts (like Latin and Cyrillic for example). In order to specify which subsets should be downloaded the subset parameter should be appended to the URL. For a complete list of available fonts and font subsets please see','spalab'); 
							echo " <a href='https://www.google.com/webfonts'>Google Web Fonts</a>";?> </p>
                      <div class="hr"></div>
                      <div class="clear"> </div>
                      
                      
                      <h6><?php _e('Mailchimp API KEY','spalab');?></h6>
                      <div class="column one-half">
                      	<input id="mytheme-mailchimp-key" name="mytheme[general][mailchimp-key]" type="text" value="<?php echo dttheme_option('general','mailchimp-key'); ?>" />
                      </div>
                      
                      <div class="column one-half last">
                      	<p class="note no-margin"><?php _e('Paste your mailchimp api key that will be used by the mailchimp widget.','spalab'); ?></p>
                      </div>
                      
                        <div class="hr"></div>
                        <div class="clear"> </div>
                        
                        <h6><?php _e('Site Bottom Newsletter','spalab');?></h6>
                    	<?php $switchclass = ( "on" ==  dttheme_option('general','show-newsletter') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div class="column one-fifth">                         
                        	<div data-for="mytheme-show-newsletter" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
						 	<input class="hidden" id="mytheme-show-newsletter" name="mytheme[general][show-newsletter]" type="checkbox" 
							 <?php checked(dttheme_option('general','show-newsletter'),'on');?>/>
						</div>
                        <div class="column four-fifth last">
                        	<p class="note"><?php _e('show / Hide bottom newsletter form globally on sitewide','spalab');?> </p>
                        </div>
                        
                        <div class="hr-invisible-small"> </div>
                        
                       <?php  
						if(dttheme_option('general','mailchimp-key') != '') { 
							?>
						
							<div class="hr"></div>
		
							<h6><?php esc_html_e('Mailchimp List Id','spalab');?></h6>
							<?php
							
							$list_id = (dttheme_option('general','mailchimp-listid') != '') ? dttheme_option('general','mailchimp-listid') : '';
							
							$apiKey = dttheme_option('general','mailchimp-key');						
							$mailchimp_lists = dt_theme_mailchimp_list_ids($apiKey);
							
							echo '<select id="mytheme-mailchimp-listid" name="mytheme[general][mailchimp-listid]">';
							foreach ($mailchimp_lists as $key => $value):
								$id = $value['id'];
								var_dump($id);
								var_dump($list_id);
								$name = $value['name'];
								$selected = selected(dttheme_option('general','mailchimp-listid'),$id,false);
								echo '<option '.$selected.' value="'.$id.'">'.$name.'</option>';
							endforeach;
							echo '</select>';
							
							?>
							<p class="note no-margin"><?php esc_html_e('Select your mailchip list id, which will be used in newsletter shortcodes.','spalab'); ?></p>
					
							<?php 
						} 
						?> 
                    </div>                                            
                    
            </div><!-- .bpanel-box end-->
        </div><!--#my-general end-->
        

        <!-- my-sociable-->
        <div id="my-sociable" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
            
                <div class="box-title">
                	<h3><?php _e('Sociable','spalab');?></h3>
                </div><!-- .box-title -->

                <div class="box-content">
                    <div class="bpanel-option-set">
                         <h6><?php _e('Show Sociable','spalab');?></h6>
                         
                         <div class="column one-fifth">
							 <?php $switchclass = ( "on" ==  dttheme_option('general','show-sociables') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                             <div data-for="mytheme-show-sociables" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                             <input class="hidden" id="mytheme-show-sociables" name="mytheme[general][show-sociables]" type="checkbox" 
                             <?php checked(dttheme_option('general','show-sociables'),'on');?>/>
                         </div>
                         
                         <input type="button" value="<?php _e('Add New Sociable','spalab');?>" class="black mytheme_add_item" />
                         
                         <div class="column four-fifth last">
                             <p class="note"> <?php _e('Manage Social Network icons list to display','spalab');?> </p>
                         </div>
                         
                         <div class="hr_invisible"></div>
                    </div>
                    
                    <div class="bpanel-option-set">
                        <ul class="menu-to-edit">
                        <?php $socials = dttheme_option('social');
						      if(is_array($socials)): 
							  	$keys = array_keys($socials);
								$i=0;
						 	  foreach($socials as $s):?>
                              <li id="<?php echo esc_attr( $keys[$i] );?>">
                                <div class="item-bar">
                                    <span class="item-title"><?php $n = $s['icon']; $n = explode('.',$n); $n = ucwords($n[count($n) - 2]); echo ( $n );?></span>
                                    <span class="item-control"><a class="item-edit"><?php _e('Edit','spalab');?></a></span>
                                </div>
                                <div class="item-content" style="display: none;">
                                	<span><label><?php _e('Sociable Icon','spalab');?></label>
										<?php echo dttheme_sociables_selection($keys[$i],$s['icon']);?></span>
                                    <span><label><?php _e('Sociable Link','spalab');?></label>
                                    	<input type="text" class="social-link" name="mytheme[social][<?php echo ( $keys[$i] );?>][link]" value="<?php echo esc_attr( $s['link'] )?>"/>
                                    </span>
                                    
                                    <div class="remove-cancel-links">
                                        <span class="remove-item"><?php _e('Remove','spalab');?></span>
                                        <span class="meta-sep"> | </span>
                                        <span class="cancel-item"><?php _e('Cancel','spalab');?></span>
                                    </div>
                                </div>
                              </li>
                        <?php $i++;endforeach; endif;?> 
                        </ul>
                        
                        <ul class="sample-to-edit" style="display:none;">
                        	<!-- Social Item -->
                            <li>
                            	<!-- .item-bar -->
                            	<div class="item-bar">
                                	<span class="item-title"><?php _e('Sociable','spalab');?></span>
                                    <span class="item-control"><a class="item-edit"><?php _e('Edit','spalab');?></a></span>
                                </div><!-- .item-bar -->
                                <!-- .item-content -->
                                <div class="item-content">                                
                                	<span><label><?php _e('Sociable Icon','spalab');?></label><?php echo dttheme_sociables_selection();?></span>
                                    <span><label><?php _e('Sociable Link','spalab');?></label><input type="text" class="social-link" /></span>
                                    <div class="remove-cancel-links">
                                        <span class="remove-item"><?php _e('Remove','spalab');?></span>
                                        <span class="meta-sep"> | </span>
                                        <span class="cancel-item"><?php _e('Cancel','spalab');?></span>
                                    </div>
                                </div><!-- .item-content end -->
                            </li><!-- Social Item End-->
                        </ul>
                        
                    </div>
                </div> <!-- .box-content -->    
                
            </div><!-- .bpanel-box end -->
        </div><!--#my-sociable end-->
        
        <!--#my-sociable-->
        <div id="my-top" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
            
                <div class="box-title">
                	<h3><?php _e('Top Section','spalab');?></h3>
                </div><!-- .box-title -->

                <div class="box-content">
                	<textarea id="mytheme-bbar-tmsg" name="mytheme[general][top-message]" class="fullwidth-textarea"><?php echo stripslashes(dttheme_option('general','top-message'));?></textarea>
                    <p class="note"><?php _e("You can add your custom buddha bar message.",'spalab');?></p>                    
                </div><!-- .box-content-->
            
            </div><!-- .bpanel-box end -->
        </div><!--#my-top end-->

    </div><!-- .bpanel-main-content end-->
</div><!-- general end-->