<!-- general -->
<div id="theme-footer" class="bpanel-content">

    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel"> 
            <li><a href="#my-footer"><?php _e("Footer",'spalab');?></a></li>
        </ul>
        

        <!-- my-footer-->
        <div id="my-footer" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
                <div class="box-title">
                    <h3><?php _e('Footer','spalab');?></h3>
                </div>
                
                <div class="box-content">
                
                    <div class="bpanel-option-set">

                         <h6><?php _e('Show Footer','spalab');?></h6>
                    	 <?php $switchclass = ( "on" ==  dttheme_option('general','show-footer') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                         <div data-for="mytheme-show-footer" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
						 <input class="hidden" id="mytheme-show-footer" name="mytheme[general][show-footer]" type="checkbox" 
						 <?php checked(dttheme_option('general','show-footer'),'on');?>/>
                         <div class="hr"></div>
                    
                        <h6><?php _e('Footer Column Layout','spalab');?></h6>
                        <p class="note"><?php _e("Select a perfect column layout style for your theme's footer.",'spalab');?></p>
                        
                        <ul class="bpanel-post-layout bpanel-layout-set">
                        <?php $footer_layouts = array(
									1=>'one-column',							2=>'one-half-column',
									3=>'one-third-column',						4=>'one-fourth-column',
									5=>'onefourth-onefourth-onehalf-column',	6=>'onehalf-onefourth-onefourth-column',
									7=>'onefourth-threefourth-column',			8=>'threefourth-onefourth-column',
									9=>'onethird-twothird-column',				10=>'twothird-onethird-column');?>
                        <?php foreach($footer_layouts as $k => $v): $class = ( $k ==  dttheme_option('general','footer-columns')) ? " class='selected' " : "";?>
                       		<li><a href="#" rel="<?php echo esc_attr( $k );?>" <?php echo ( $class );?>><img src="<?php echo IAMD_FW_URL."theme_options/images/columns/{$v}.png";?>" /></a></li>	
                        <?php endforeach;?>
                        </ul><input id="mytheme[general][footer-columns]" name="mytheme[general][footer-columns]" type="hidden"
                        			value="<?php echo  dttheme_option('general','footer-columns');?>"/>
                                    
                    </div><!-- .bpanel-option-set -->
                    <div class="hr"></div>

                    <div class="bpanel-option-set">
                         <h6><?php _e('Show Copyright Text','spalab');?></h6>
                    	 <?php $switchclass = ( "on" ==  dttheme_option('general','show-copyrighttext') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                         <div data-for="mytheme-show-copyrighttext" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
						 <input class="hidden" id="mytheme-show-copyrighttext" name="mytheme[general][show-copyrighttext]" type="checkbox" 
						 <?php checked(dttheme_option('general','show-copyrighttext'),'on');?>/>
                         <div class="hr_invisible"></div>
                    
                        <h6><?php _e('Copyright Text','spalab');?></h6>
                        <textarea id="mytheme-copyright-text" name="mytheme[general][copyright-text]"
                        	rows="" cols=""><?php echo htmlspecialchars (stripslashes(dttheme_option('general','copyright-text')));?></textarea>
                        <p class="note"> <?php _e('You can paste your copyright text in this box. This will be automatically added to the footer.','spalab');?> </p>
                    </div><!-- .bpanel-option-set -->
                    
                    
                    <!-- Footer Logo -->
                    <div class="hr"> </div>
                    <h6><?php _e('Show Footer Logo','spalab');?></h6>
                    <?php $switchclass = ( "on" ==  dttheme_option('general','show-footer-logo') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                    <div data-for="mytheme-show-footer-logo" class="checkbox-switch <?php echo esc_attr( $switchclass );?>"></div>
                    <input class="hidden" id="mytheme-show-footer-logo" name="mytheme[general][show-footer-logo]" type="checkbox" <?php checked(dttheme_option('general','show-footer-logo'),'on');?>/>
                    <div class="hr_invisible"></div>
                    
                    <div class="image-preview-container">
                    	<input id="mytheme-logo" name="mytheme[general][footer-logo-url]" type="text" class="uploadfield" readonly="readonly" value="<?php echo  dttheme_option('general','footer-logo-url');?>" />
                        <input type="button" value="<?php _e('Upload','spalab');?>" class="upload_image_button show_preview" />
                        <input type="button" value="<?php _e('Remove','spalab');?>" class="upload_image_reset" />
                        <?php dttheme_adminpanel_image_preview(dttheme_option('general','footer-logo-url'),false,'footer-top-logo.png');?>
                    </div>
                    <p class="note"> <?php _e('Upload a footer logo for your theme, or specify the image address of your online logo.','spalab');?> </p>
                    
                    <div class="hr_invisible"></div>
                    <div class="clear"></div>

                    <h6><?php _e('Retina Footer Logo','spalab');?></h6>
                    <div class="image-preview-container">
                        <input id="mytheme-retina-footer-logo" type="text" name="mytheme[general][retina-footer-logo-url]" class="uploadfield" readonly="readonly" value="<?php echo dttheme_option('general','retina-footer-logo-url');?>"/>
                        <input type="button" value="<?php _e('Upload','spalab');?>" class="upload_image_button show_preview" />
                        <input type="button" value="<?php _e('Remove','spalab');?>" class="upload_image_reset" />
                        <?php dttheme_adminpanel_image_preview(dttheme_option('general','retina-footer-logo-url'),false,'footer-top-logo@2x.png');?>
                    </div>
                    <p class="note"><?php _e('Upload a retina footer logo for your theme, or specify the image address of your online logo','spalab');?></p>

                    <div class="clear"></div>
                    
                    <div class="one-half-content">
                        <h6><?php _e('Width','spalab');?></h6>
                        <input type="text" class="medium" name="mytheme[general][retina-footer-logo-width]" 
                            value="<?php echo dttheme_option('general','retina-footer-logo-width');?>" /><?php _e('px','spalab');?>
                    </div>    

                    <div class="one-half-content last">
                        <h6><?php _e('Height','spalab');?></h6>
                        <input type="text" class="medium" name="mytheme[general][retina-footer-logo-height]" 
                            value="<?php echo dttheme_option('general','retina-footer-logo-height');?>"/><?php _e('px','spalab');?>
                    </div>    
                    <p class="note"><?php _e('If footer retina logo is uploaded, enter the standard footer logo width and height in above respective boxes.','spalab');?></p>
                    <div class="clear"></div>
                    <!-- Footer Logo End-->
                    
                </div> <!-- .box-content -->
            
            </div><!-- .bpanel-box end -->
        </div><!--#my-footer end-->
        
    </div><!-- .bpanel-main-content end-->
</div><!-- general end-->