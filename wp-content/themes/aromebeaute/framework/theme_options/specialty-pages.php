<!-- specialty-pages -->
<div id="specialty-pages" class="bpanel-content">
    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
    	 <ul class="sub-panel">
         <?php $sub_menus = array(
					array("title"=>__("Global",'spalab'), "link"=>"#global-page"),
					array("title"=>__("Author",'spalab'), "link"=>"#author-archives"),
                    array("title"=>__("Category",'spalab'), "link"=>"#category-archives"),
                    array("title"=>__("Tag",'spalab'), "link"=>"#tag-archives"),
                    array("title"=>__("Gallery",'spalab'), "link"=>"#gallery-archives"),
					array("title"=>__("Catalog",'spalab'), "link"=>"#catalog-archives"),
					array("title"=>__("Search",'spalab'), "link"=>"#search"),
					array("title"=>__("404",'spalab'), "link"=>"#404"));
				  foreach($sub_menus as $menu): ?>
                  	<li><a href="<?php echo esc_attr( $menu['link'] )?>"><?php echo ( $menu['title'] );?></a></li>
		 <?php endforeach?>
         </ul>
         
         <?php $posts_layout_array =   array( 'one-column'=>__("Single post per row.",'spalab'),'one-half-column'=>__("Two posts per row.",'spalab'));

                $tabs = array(

                        array(  "id"=>"global-layout",
								"layout-title"=>__("Global Layout",'spalab'),
								"layout-tooltip"=>__("You can choose between a left, right or no sidebar layout globally.",'spalab')
						 ),
				 
						array(  "id"=>"author-archives", 
                                "layout-title"=>__("Post's Author Archive Page Layout",'spalab'),
                                "layout-tooltip"=>__("You can choose between a left, right or no sidebar layout for the Author Archive page.",'spalab'),
                                "post-layout-title" => __("Posts Layout",'spalab'),
                                "post-layout-tooltip"=>__("Your author archive results will use the layout you select below.",'spalab'),                                
                                "post-layouts" => $posts_layout_array
                         ),

			 			array(	"id"=>"category-archives", 
								"layout-title"=>__("Post's Category Archive Page Layout",'spalab'),
								"layout-tooltip"=>__("You can choose between a left, right or no sidebar layout for the Category Archive page.",'spalab'),
								"post-layout-title" => __("Posts Layout",'spalab'),
								"post-layout-tooltip"=>__("Your category archive results will use the layout you select below.",'spalab'),								
                                "post-layouts" => $posts_layout_array
						 ),

                        array(  "id"=>"tag-archives", 
                                "layout-title"=>__("Post's Tag Archive Page Layout",'spalab'),
                                "layout-tooltip"=>__("You can choose between a left, right or no sidebar layout for the Tag Archive page.",'spalab'),
                                "post-layout-title" => __("Posts Layout",'spalab'),
                                "post-layout-tooltip"=>__("Your tag archive results will use the layout you select below.",'spalab'),
                                "post-layouts" => $posts_layout_array                                
                         ),

                        array(  "id"=>"gallery-archives", 
                                "layout-title"=>__("Gallery Custom Post's Category Archive Page Layout",'spalab'),
                                "layout-tooltip"=>__("You can choose between a left, right or no sidebar layout for the Gallery custom post's category Archive page.",'spalab'),
                                "post-layout-title" => __("Posts Layout",'spalab'),
                                "post-layout-tooltip"=>__("Your category archive results will use the layout you select below.",'spalab'),                                
                                "post-layouts" => array(
                                    'one-column'=>__("Single gallery item  per row.",'spalab'),
                                    'one-half-column'=>__("Two gallery items per row.",'spalab'),
                                    'one-third-column'=>__("Three gallery items per row.",'spalab'),                                   
                                    'one-fourth-column' => __("Three gallery items per row.",'spalab'))
                        ),
						
						array(  "id"=>"catalog-archives", 
                                "layout-title"=>__("Catalog Custom Post's Category Archive Page Layout",'spalab'),
                                "layout-tooltip"=>__("You can choose between a left, right or no sidebar layout for the Catalog custom post's category Archive page.",'spalab'),
                                "post-layout-title" => __("Posts Layout",'spalab'),
                                "post-layout-tooltip"=>__("Your category archive results will use the layout you select below.",'spalab'),                                
                                "post-layouts" => array(
                                    'one-column'=>__("Single catalog item  per row.",'spalab'),
                                    'one-half-column'=>__("Two catalog items per row.",'spalab'))
                        ),

						array(  "id"=>"search",
								"layout-title"=>__("Search Layout",'spalab'),
								"layout-tooltip"=>__("You can choose between a left, right or no sidebar layout for your Search page.",'spalab'),
								"post-layout-title" => __("Posts Layout",'spalab'),
								"post-layout-tooltip"=>__("Your Search results will use the layout you select below.",'spalab'),
                                "post-layouts" => $posts_layout_array
						),

						array(  "id"=>"404",
								"layout-title"=>__("404 Layout",'spalab'),
								"layout-tooltip"=>__("You can choose between a left, right or no sidebar layout for your 404 page.",'spalab'),
								
								"bg-title"=>__("404 Background",'spalab'),
								"bg-label"=>__("404 background image",'spalab'),
								"bg-tooltip"=>__('Upload an image for the theme\'s 404 page background','spalab'),

								"content-title" => __("404 Message",'spalab'),
								"content-tooltip"=>__("You can give custom 404 page message",'spalab')
						));?>
        <?php foreach($tabs as $tab): 
				$id =  $tab['id'];?>
        	<div id="<?php echo esc_attr( $id );?>" class="tab-content">
            	 <div class="bpanel-box">
                 
                 	<!-- Section 1 -->	
                    <div class="box-title"><h3><?php echo ( $tab['layout-title'] );?></h3></div>
                    <div class="box-content">
                    	<p class="note"> <?php echo ($tab['layout-tooltip']);?></p>

                    	<?php if($id == 'global-layout'): ?>
                                <div class="bpanel-option-set">
                                    <h6><?php _e('Force to Enable Global Page Layout','spalab');?></h6>
                                    <?php dttheme_switch("",'specialty','force-enable-global-layout');?>
                                    <p class="note"> <?php _e('Force to enable or disable global page layout for all pages.','spalab');?>  </p>
                                </div>
                                <div class="clear"> </div>
                                <div class="hr"> </div>
                       <?php  endif; ?>
                       
                        <div class="bpanel-option-set">
                        	<ul class="bpanel-post-layout bpanel-layout-set">
                           	<?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar');
							foreach($layout as $key => $value):
								$class = ( $key ==  dttheme_option('specialty',"{$id}-layout")) ? " class='selected' " : "";
								echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
							endforeach; ?>
                            </ul>
                            <input id="mytheme[specialty][<?php echo ( $id );?>-layout]" name="mytheme[specialty][<?php echo ( $id );?>-layout]" type="hidden"  
                            	value="<?php echo dttheme_option('specialty',"{$id}-layout");?>"/>
                        </div><?php
                            $cs = dttheme_option('specialty',"{$id}-layout");
                            $cs = ( $cs == "content-full-width" ) ? " style='display:none;' " : "";?>
                        <div class="widgetarea-section" <?php echo ( $cs );?>>
                            <div class="hr"></div>
                            <div class="bpanel-option-set">
                                <h6><?php _e('Disable Every Where Sidebar','spalab');?></h6>
                                <?php dttheme_switch("",'specialty','disable-everywhere-sidebar-for-'.$id);?>
                            </div>
                        </div>
                    </div><!-- Section 1 End -->


                    <?php if( $id != "404" && $id != "global-layout" ): ?>
                    <!-- Post Layout Section -->
	                <div class="box-title"><h3><?php echo ( $tab['post-layout-title'] );?></h3></div>
                    <div class="box-content">
                    	<p class="note"><?php echo ( $tab['post-layout-tooltip'] );?></p>
                    	<div class="bpanel-option-set">
                        	<ul class="bpanel-post-layout bpanel-layout-set">
                            <?php $posts_layout = $tab['post-layouts'];
									$v = dttheme_option('specialty',"{$id}-post-layout");
									$v = !empty($v) ? $v : "one-column";
								  foreach($posts_layout as $key => $value):
									$class = ( $key ==  $v ) ? " class='selected' " :"";								  
									echo "<li><a href='#' rel='{$key}' {$class} title='{$value}'><img src='".IAMD_FW_URL."theme_options/images/columns/{$key}.png' /></a></li>";
                           		 endforeach;?>
                    		</ul>
                            <input id="mytheme[specialty][<?php echo ( $id );?>-post-layout]" name="mytheme[specialty][<?php echo ( $id );?>-post-layout]" type="hidden"  
                            	value="<?php echo dttheme_option('specialty',"{$id}-post-layout");?>"/>
                        </div>
                    </div>
                    <!-- Post Layout Section End-->
                    <?php endif; ?>
                    

                    <!-- 404 Content -->
                    <?php if($id == "404"): ?>
                        <div class="box-title"><h3><?php echo ( $tab['content-title'] );?></h3></div>
                        <div class="box-content">
                        	<p class="note"><?php echo ($tab['content-tooltip']);?></p>
                            
                            
                            <div class="bpanel-option-set">
                                <h6><?php _e('404 Custom Message','spalab');?></h6>
                                <textarea id="mytheme-404-text" name="mytheme[specialty][404-message]" rows="" 
                                	cols=""><?php echo stripslashes(dttheme_option('specialty','404-message'));?></textarea>
                            </div>
                            <div class="hr"></div>
                            
                            <h6><?php _e("Disable Font Settings",'spalab')?></h6>
                            <div class="column one-fifth bpanel-option-set">
                            	<?php dttheme_switch("",'specialty','disable-404-font-settings');?>
                            </div>
                            <div class="column four-fifth last"><p class="note"><?php _e('Enable / Disable 404 Font settings','spalab');?></p></div>
                            <div class="hr"></div>
                        
                        	<!-- Font Section -->                        	
                            <div class="column one-column">
                                <div class="bpanel-option-set">
                                    <?php dttheme_admin_fonts(__('Message Font','spalab'),'mytheme[specialty][message-font]',dttheme_option('specialty','message-font'));?>
                                </div>
                            </div>
                            <!-- Font Section -->
                            <div class="hr_invisible"> </div>
                            <!-- Font Color Section -->
                            <div class="column one-half">
        	                    <?php $label = 		__("Message Font Color",'spalab');
									  $name  =		"mytheme[specialty][message-font-color]";	
									  $value =  	 (dttheme_option('specialty','message-font-color')!= NULL) ? dttheme_option('specialty','message-font-color') : "#";
									  $tooltip = 	__("Pick a custom color for 404 message font color of the theme e.g. #a314a3",'spalab'); ?>
									  <h6> <?php echo ( $label );?> </h6>
                                  <?php dttheme_admin_color_picker("",$name,$value,'');?>
                            
                            </div><!-- Font Color Section -->
                            <div class="column one-half last">
								<?php dttheme_admin_jqueryuislider(__('Message Font Size','spalab'),"mytheme[specialty][message-font-size]",
    	                        dttheme_option('specialty',"message-font-size"));?>
                            </div>
                            
                        </div>
                    <?php endif;?>
                    <!-- 404 Content End-->

                 </div><!-- .bpanel-box end -->
            </div><!-- .tab-content end -->
        <?php endforeach;?>
    </div>
</div><!-- specialty-pages end-->