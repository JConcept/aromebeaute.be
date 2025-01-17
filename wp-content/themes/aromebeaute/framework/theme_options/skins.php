<!-- skin -->
<div id="skin" class="bpanel-content">
    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
			<?php $sub_menus = array(array("title"=>__("Skins",'spalab'), "link"=>"#appearance-skins"));
						
				  foreach($sub_menus as $menu): ?>
                  	<li><a href="<?php echo esc_attr( $menu['link'] )?>"><?php echo ( $menu['title'] );?></a></li>
			<?php endforeach?>
        </ul>

        <!--Skins Section -->
        <div id="appearance-skins" class="tab-content">
	        <div class="bpanel-box">
                <div class="box-title"><h3><?php _e('Current Skin','spalab');?></h3></div>
                <div class="box-content">
	                <?php $theme = dttheme_option('appearance','skin'); ?>
                	 <ul id="j-current-theme-container" class="skins-list" dummy-content="<?php echo ( $theme.'-dummy' );?>">
                     	 <li data-attachment-theme="<?php echo esc_attr( $theme );?>">
                            <img src="<?php echo IAMD_BASE_URL."skins/{$theme}/screenshot.png";?>" alt='' width='250' height='180' />
                            <input type="hidden" name="mytheme[appearance][skin]" value="<?php echo esc_attr( $theme );?>" />
                            <h4><?php echo ( $theme );?></h4>
                        </li>
                     </ul>
                </div>
                
                <div class="box-title"><h3><?php _e('Available Skins','spalab'); ?></h3></div>
                <div class="box-content">
                	<ul id="j-available-themes" class="skins-list">
					<?php $dt_file_path = '/skins';
						  if( IAMD_TEMPLATE_DIR != IAMD_STYLESHEET_DIR && is_dir(STYLESHEETPATH . $dt_file_path) ){
							   $dt_childtheme_dir = get_stylesheet_directory();
							   $dt_childtheme_dir_uri = get_stylesheet_directory_uri().'/';
						  }else{
							   $dt_childtheme_dir = get_template_directory();
							   $dt_childtheme_dir_uri = IAMD_BASE_URL;
						  }
						  foreach(getFolders($dt_childtheme_dir."/skins") as $skin ):
							  $active = ($theme == $skin) ? 'class="active"' : NULL;
							  $img = $dt_childtheme_dir_uri."skins/{$skin}/screenshot.png";
							  echo "<li data-attachment-theme='{$skin}' {$active}>";
							  echo "<img src='{$img}' alt='' width='250' height='180' />";
							  echo "<h4>{$skin}</h4>";
							  echo "</li>";
						   endforeach; ?>
                    </ul>
                </div>
            </div>
        </div><!--Skins Section  End-->

    </div><!-- .bpanel-main-content end -->
</div><!-- skin  end-->