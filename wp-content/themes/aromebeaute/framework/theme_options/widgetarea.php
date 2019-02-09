<!-- widgetarea -->
<div id="widgetarea" class="bpanel-content">

  <!-- .bpanel-main-content -->
  <div class="bpanel-main-content">
    <ul class="sub-panel widget-area-nav">
      <li><a href="#for-custom-widget-area"><?php _e("Widget Areas",'spalab');?></a></li>
    </ul>

    <!-- General -->
    <div id="for-custom-widget-area" class="tab-content">
      <div class="bpanel-box">

        <!-- Type 1 -->
        <div class="box-title"><h3><?php _e('Create New Widget Area','spalab');?></h3></div>
        <div class="box-content">

          <p class="note"><?php _e("You can create widget areas here, and assign them in individual page/post",'spalab');?></p>
          <div class="bpanel-option-set">
            <input type="button" data-for="custom" value="<?php _e('Add New Widget Area','spalab');?>" class="black mytheme_add_widgetarea" />
            <div class="hr_invisible"></div><?php
              $widgets = dttheme_option('widgetarea','custom');
              $widgets = is_array($widgets) ? array_unique($widgets) : array();
              $widgets = array_filter($widgets);?>
          </div>
          <div class="bpanel-option-set">    
            <ul class="added-menu"><?php
                foreach( $widgets as $k => $v){?>
                    <li>
                      <div class="item-bar">
                        <span class="item-title"><?php _e('Widget Area:','spalab'); echo" $v";?></span>
                        <span class="item-control"><a class="item-edit"><?php _e('Edit','spalab');?></a></span>
                      </div>
                      <div class="item-content" style="display: none;">
                        <span><label><?php _e('Name','spalab');?></label><input type="text" name="mytheme[widgetarea][custom][]" class="social-link" value="<?php echo esc_attr( $v );?>" /></span>
                        <div class="remove-cancel-links">
                          <span class="remove-item"><?php _e('Remove','spalab');?></span>
                          <span class="meta-sep"> | </span>
                          <span class="cancel-item"><?php _e('Cancel','spalab');?></span>
                        </div>
                      </div>
                    </li><?php
                }?>
            </ul>

            <ul class="sample-to-edit" style="display:none;">
              <li>
                <div class="item-bar">
                  <span class="item-title"><?php _e('Widget Area','spalab');?></span>
                  <span class="item-control"><a class="item-edit"><?php _e('Edit','spalab');?></a></span>
                </div>

                <div class="item-content">
                  <span><label><?php _e('Name','spalab');?></label><input type="text" class="social-link" /></span>
                  <div class="remove-cancel-links">
                    <span class="remove-item"><?php _e('Remove','spalab');?></span>
                    <span class="meta-sep"> | </span>
                    <span class="cancel-item"><?php _e('Cancel','spalab');?></span>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div><!-- Type 1 -->

        <!-- Type 2 -->
        <div class="box-title"><h3><?php _e('Widget Areas For Mega Menu','spalab');?></h3></div>
        <div class="box-content">

          <p class="note"><?php _e("You can create widget areas here, and assign them in mega menu",'spalab');?></p>
          <div class="bpanel-option-set">
            <input type="button" data-for="megamenu" value="<?php _e('Add New Widget Area','spalab');?>" class="black mytheme_add_widgetarea" />
            <div class="hr_invisible"></div><?php
              $widgets = dttheme_option('widgetarea','megamenu');
              $widgets = is_array($widgets) ? array_unique($widgets) : array();
              $widgets = array_filter($widgets);?>
          </div>
          <div class="bpanel-option-set">    
            <ul class="added-menu"><?php

                foreach( $widgets as $k => $v){?>
                    <li>
                      <div class="item-bar">
                        <span class="item-title"><?php _e('Widget Area:','spalab'); echo" $v";?></span>
                        <span class="item-control"><a class="item-edit"><?php _e('Edit','spalab');?></a></span>
                      </div>
                      <div class="item-content" style="display: none;">
                        <span><label><?php _e('Name','spalab');?></label><input type="text" name="mytheme[widgetarea][megamenu][]" class="social-link" value="<?php echo esc_attr( $v );?>" /></span>
                        <div class="remove-cancel-links">
                          <span class="remove-item"><?php _e('Remove','spalab');?></span>
                          <span class="meta-sep"> | </span>
                          <span class="cancel-item"><?php _e('Cancel','spalab');?></span>
                        </div>
                      </div>
                    </li><?php
                }?>
            </ul>

            <ul class="sample-to-edit" style="display:none;">
              <li>
                <div class="item-bar">
                  <span class="item-title"><?php _e('Widget Area','spalab');?></span>
                  <span class="item-control"><a class="item-edit"><?php _e('Edit','spalab');?></a></span>
                </div>

                <div class="item-content">
                  <span><label><?php _e('Name','spalab');?></label><input type="text" class="social-link" /></span>
                  <div class="remove-cancel-links">
                    <span class="remove-item"><?php _e('Remove','spalab');?></span>
                    <span class="meta-sep"> | </span>
                    <span class="cancel-item"><?php _e('Cancel','spalab');?></span>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div><!-- Type 2 -->
      </div>
    </div><!-- General End -->
  </div><!-- .bpanel-main-content end-->
</div><!-- widgetarea end -->