<!-- woocommerence starts here-->
<div id="woocommerce" class="bpanel-content">
    <!-- .bpanel-main-content starts here-->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
            <li><a href="#my-woocommerce"><?php _e("wooCommerce Settings",'spalab');?></a></li>
        </ul>
        
        
        <!-- my-woocommerce starts here --> 
        <div id="my-woocommerce" class="tab-content">
            <div class="bpanel-box">
<?php  if( class_exists('woocommerce') ) : ?>

                <!-- SHOP PAGE -->
                <div class="box-title"><h3><?php _e('Shop','spalab');?></h3></div>
                <div class="box-content">
                
                    <div class="column one-third"><label><?php _e('Products Per Page','spalab');?></label></div>
                    <div class="column two-third last">
                        <input name="mytheme[woo][shop-product-per-page]" type="text" class="small" value="<?php echo trim(stripslashes(dttheme_option('woo','shop-product-per-page')));?>" />
                        <p class="note"><?php _e('Number of products to show in catalog / shop page','spalab');?></p>
                    </div>
                    
                    <!-- Layout -->
                    <h6><?php _e('Layout','spalab');?></h6>
                    <p class="note no-margin"> <?php _e("Choose the Product Layout Style in Catalog / Shop ","spalab");?> </p>
                    <div class="hr_invisible"> </div>
                    <div class="bpanel-option-set">
                        <ul class="bpanel-post-layout bpanel-layout-set">
                        <?php $posts_layout = array('one-half-column'=>__("Two products per row.",'spalab'),'one-third-column' => __("Three products per row.",'spalab'),
													'one-fourth-column' => __("Four products per row","spalab"));
                                    $v = dttheme_option('woo',"shop-page-product-layout");
                                    $v = !empty($v) ? $v : "one-half-column";
                                  foreach($posts_layout as $key => $value):
                                    $class = ( $key ==  $v ) ? " class='selected' " :"";                                  
                                    echo "<li><a href='#' rel='{$key}' {$class} title='{$value}'><img src='".IAMD_FW_URL."theme_options/images/columns/{$key}.png' /></a></li>";
                                 endforeach;?>                        
                        </ul>
                        <input name="mytheme[woo][shop-page-product-layout]" type="hidden" value="<?php echo esc_attr( $v );?>"/>
                    </div><!-- .Layout End -->                    
                </div><!-- SHOP PAGE -->
                
                <!-- Product Page -->
                <div class="box-title"><h3><?php _e('Product Detail','spalab');?></h3></div>
                <div class="box-content">
                    <!-- Product Detail Page Layout -->
                    <h6><?php _e('Layout','spalab');?></h6>
                    <p class="note no-margin"> <?php _e("Choose the Product Page Layout","spalab");?></p>
                    <div class="hr_invisible"> </div>
                    <div class="bpanel-option-set">
                        <ul class="bpanel-post-layout bpanel-layout-set">
                        <?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar');
                              $v =  dttheme_option('woo',"product-layout");
                              $v = !empty($v) ? $v : "content-full-width";
							  $cs = ( $v == "content-full-width" ) ? " style='display:none;' " : "";
                              
                        foreach($layout as $key => $value):
                            $class = ( $key ==  $v ) ? " class='selected' " : "";
                            echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
                        endforeach; ?>
                        </ul>
                        <input name="mytheme[woo][product-layout]" type="hidden" value="<?php echo esc_attr( $v );?>"/>
                    </div><!-- Product Detail Page Layout End-->
                    
                    <div class="widgetarea-section" <?php echo ( $cs );?>>
                        <div class="hr"></div>
                        <div class="bpanel-option-set">
                            <h6><?php _e('Disable Shop Every Where Sidebar','spalab');?></h6>
                            <?php dttheme_switch("",'woo','disable-shop-everywhere-sidebar-in-product-detail');?>
                        </div>
                    </div>
                </div><!-- Product Page -->

                <!-- Product Category Page -->
                <div class="box-title"><h3><?php _e('Product Category','spalab');?></h3></div>
                <div class="box-content">
                    <!-- Product Detail Page Layout -->
                    <h6><?php _e('Layout','spalab');?></h6>
                    <p class="note no-margin"> <?php _e("Choose the Product category page layout Style","spalab");?></p>
                    <div class="hr_invisible"> </div>
                    <div class="bpanel-option-set">
                        <ul class="bpanel-post-layout bpanel-layout-set">
                        <?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar');
                              $v =  dttheme_option('woo',"product-category-layout");
                              $v = !empty($v) ? $v : "content-full-width";
							  $cs = ( $v == "content-full-width" ) ? " style='display:none;' " : "";
                              
                        foreach($layout as $key => $value):
                            $class = ( $key ==  $v ) ? " class='selected' " : "";
                            echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
                        endforeach; ?>
                        </ul>
                        <input name="mytheme[woo][product-category-layout]" type="hidden" value="<?php echo esc_attr( $v );?>"/>
                    </div><!-- Product Detail Page Layout End-->
                    
                    <div class="widgetarea-section" <?php echo ( $cs );?>>
                        <div class="hr"></div>
                        <div class="bpanel-option-set">
                            <h6><?php _e('Disable Shop Every Where Sidebar','spalab');?></h6>
                            <?php dttheme_switch("",'woo','disable-shop-everywhere-sidebar-in-product-category-archive');?>
                        </div>
                    </div>
                </div><!-- Product Category Page -->

                <!-- Product Tag Page -->
                <div class="box-title"><h3><?php _e('Product Tag','spalab');?></h3></div>
                <div class="box-content">
                    <!-- Product Detail Page Layout -->
                    <h6><?php _e('Layout','spalab');?></h6>
                    <p class="note no-margin"> <?php _e("Choose the Product tag page layout Style","spalab");?></p>
                    <div class="hr_invisible"> </div>
                    <div class="bpanel-option-set">
                        <ul class="bpanel-post-layout bpanel-layout-set">
                        <?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar');
                              $v =  dttheme_option('woo',"product-tag-layout");
                              $v = !empty($v) ? $v : "content-full-width";
							  $cs = ( $v == "content-full-width" ) ? " style='display:none;' " : "";
                        
                        foreach($layout as $key => $value):
                            $class = ( $key ==   $v ) ? " class='selected' " : "";
                            echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
                        endforeach; ?>
                        </ul>
                        <input name="mytheme[woo][product-tag-layout]" type="hidden" value="<?php echo esc_attr( $v );?>"/>
                    </div><!-- Product Detail Page Layout End-->
                    
                    <div class="widgetarea-section" <?php echo ( $cs );?>>
                        <div class="hr"></div>
                        <div class="bpanel-option-set">
                            <h6><?php _e('Disable Shop Every Where Sidebar','spalab');?></h6>
                            <?php dttheme_switch("",'woo','disable-shop-everywhere-sidebar-in-product-tag-archive');?>
                        </div>
                    </div>                    
                </div><!-- Product Tag Page -->

                <!-- Gift Card Page -->
                <div class="box-title"><h3><?php _e('Gift Card Email Settings','spalab');?></h3></div>
                <div class="box-content">
					<div class="bpanel-option-set">
                        <h6><?php _e('Email Subject','spalab');?></h6>
                        <input type="text" id="mytheme-gcemail-subject" name="mytheme[woo][gcemail-subject]" value="<?php echo dttheme_option('woo','gcemail-subject');?>" />
                        <p class="note"> <?php _e('You can paste your email subject of gift card notification.','spalab');?> </p>
                        <div class="hr_invisible"></div>
                    
                        <h6><?php _e('Email Template','spalab');?></h6>
                        <textarea id="mytheme-gcemail-template" name="mytheme[woo][gcemail-template]"
                        	rows="" cols=""><?php echo htmlspecialchars (stripslashes(dttheme_option('woo','gcemail-template')));?></textarea>
                        <p class="note"> <?php _e('You can paste your email template of gift card notification.','spalab');?> </p>
                    </div><!-- .bpanel-option-set -->
                </div><!-- Gift Card Page -->
                
<?php   else: ?>
                <div class="box-title"><h3><?php _e('Warning','spalab');?></h3></div>
                <div class="box-content"><p class="note"><?php _e("You have to install and activate the wooCommerce plugin to use this module ..",'spalab');?></p></div>
<?php   endif;?>                
            </div><!--.bpanel-box End -->
        </div><!-- my-woocommerce ends here -->        

    </div><!-- .bpanel-main-content ends here-->    
</div><!-- woocommerence end-->