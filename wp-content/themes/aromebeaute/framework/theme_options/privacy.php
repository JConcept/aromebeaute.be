<!-- privacy -->
<div id="privacy" class="bpanel-content">

    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">

        <ul class="sub-panel"> 
            <li><a href="#tab1"><?php esc_html_e('Privacy & Cookies', 'spalab');?></a></li>
            <li><a href="#tab2"><?php esc_html_e('Cookie Consent Message', 'spalab');?></a></li>
            <li><a href="#tab3"><?php esc_html_e('Modal Window', 'spalab');?></a></li>
        </ul>

        <!-- tab1 - Privacy & Cookies -->
        <div id="tab1" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
              <div class="box-title"><h3><?php esc_html_e('Privacy Policy', 'spalab');?></h3></div>

              <div class="box-content">
                  <p class="note"><?php esc_html_e('In case you deal with any EU customers/visitors these options allow you to make your site GDPR compliant.', 'spalab');?></p>

                  <div class="hr"></div>
                  <div class="clear"></div>

                  <h6><?php esc_html_e('Append a privacy policy message to your comment form?', 'spalab');?></h6>
                  <div class="column one-fifth">
                      <?php $checked = ( "true" ==  dttheme_option('privacy','enable-commentfrm-msg') ) ? ' checked="checked"' : ''; ?>
                      <?php $switchclass = ( "true" ==  dttheme_option('privacy','enable-commentfrm-msg') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                      <div data-for="privacy-commentfrm-msg" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                      <input class="hidden" id="privacy-commentfrm-msg" name="mytheme[privacy][enable-commentfrm-msg]" type="checkbox" value="true" <?php echo $checked;?> />
                  </div>
                  <div class="column four-fifth last">
                      <p class="note no-margin"><?php esc_html_e('Check to append a message to the comment form for unregistered users. Commenting without consent is no longer possible.', 'spalab');?></p>
                  </div>
                  <div class="clear"></div>
                  <div class="hr_invisible_large"></div>
                  <h6><?php esc_html_e('Message below comment form', 'spalab');?></h6>
                  <?php $value = dttheme_option('privacy', 'commentfrm-msg'); 
                  if ( empty ($value) ) :

                    $value = "I agree to the terms and conditions laid out in the [dt_sc_privacy_link]Privacy Policy[/dt_sc_privacy_link]";

                 endif;

                  ?>
                  <textarea id="mytheme[privacy][commentfrm-msg]" name="mytheme[privacy][commentfrm-msg]"><?php echo esc_html($value);?></textarea>
                  <p class="note"><?php esc_html_e('A short message that can be displayed below forms, along with a checkbox, that lets the user know that he has to agree to your privacy policy in order to send the form.', 'spalab');?></p>

                  <div class="hr"></div>
                  <div class="clear"></div>

                  <h6><?php esc_html_e('Append a privacy policy message to mailchimp contact forms?', 'spalab');?></h6>
                  <div class="column one-fifth">
                      <?php $checked = ( "true" ==  dttheme_option('privacy','enable-mailchimpfrm-msg') ) ? ' checked="checked"' : ''; ?>
                      <?php $switchclass = ( "true" ==  dttheme_option('privacy','enable-mailchimpfrm-msg') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                      <div data-for="privacy-mailchimpfrm-msg" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                      <input class="hidden" id="privacy-mailchimpfrm-msg" name="mytheme[privacy][enable-mailchimpfrm-msg]" type="checkbox" value="true" <?php echo $checked;?> />
                  </div>
                  <div class="column four-fifth last">
                      <p class="note"><?php esc_html_e('Check to append a message to all of your mailchimp forms.', 'spalab');?></p>
                  </div>
                  <div class="clear"></div>
                  <div class="hr_invisible_large"></div>
                  <h6><?php esc_html_e('Message below mailchimp subscription forms', 'spalab');?></h6>
                  <?php $value = dttheme_option('privacy', 'mailchimpfrm-msg'); 
                  if ( empty ($value) ) :

                    $value = "I agree to the terms and conditions laid out in the [dt_sc_privacy_link]Privacy Policy[/dt_sc_privacy_link]";

                 endif;

                  ?>
                  <textarea id="mytheme[privacy][mailchimpfrm-msg]" name="mytheme[privacy][mailchimpfrm-msg]"><?php echo esc_html($value);?></textarea>
                  <p class="note"><?php esc_html_e('A short message that can be displayed below forms, along with a checkbox, that lets the user know that he has to agree to your privacy policy in order to send the form.', 'spalab');?></p>

                  <div class="hr"></div>
                  <div class="clear"></div>

                  
                  <h6><?php esc_html_e('Append a privacy policy message to your login forms?', 'spalab');?></h6>
                  <div class="column one-fifth">
                      <?php $checked = ( "true" ==  dttheme_option('privacy','enable-loginfrm-msg') ) ? ' checked="checked"' : ''; ?>
                      <?php $switchclass = ( "true" ==  dttheme_option('privacy','enable-loginfrm-msg') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                      <div data-for="privacy-loginfrm-msg" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                      <input class="hidden" id="privacy-loginfrm-msg" name="mytheme[privacy][enable-loginfrm-msg]" type="checkbox" value="true" <?php echo $checked;?> />
                  </div>
                  <div class="column four-fifth last">
                      <p class="note"><?php esc_html_e('Check to append a message to the default login and registrations forms.', 'spalab');?></p>
                  </div>
                  <div class="clear"></div>
                  <div class="hr_invisible_large"></div>
                  <h6><?php esc_html_e('Message below login forms', 'spalab');?></h6>
                  <?php $value = dttheme_option('privacy', 'loginfrm-msg'); 
                  if ( empty ($value) ) :

                    $value = "I agree to the terms and conditions laid out in the [dt_sc_privacy_link]Privacy Policy[/dt_sc_privacy_link]";

                 endif;

                  ?>
                  
                  <textarea id="mytheme[privacy][loginfrm-msg]" name="mytheme[privacy][loginfrm-msg]" ><?php echo esc_html($value);?></textarea>
                  <p class="note"><?php esc_html_e('A short message that can be displayed below forms, along with a checkbox, that lets the user know that he has to agree to your privacy policy in order to send the form.', 'spalab');?></p>

                  <div class="hr"></div>
                  <div class="clear"></div>

                  
                  <h6><?php esc_html_e('Append a privacy policy message to reservation contact forms?', 'spalab');?></h6>
                  <div class="column one-fifth">
                      <?php $checked = ( "true" ==  dttheme_option('privacy','enable-reservationfrm-msg') ) ? ' checked="checked"' : ''; ?>
                      <?php $switchclass = ( "true" ==  dttheme_option('privacy','enable-reservationfrm-msg') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                      <div data-for="privacy-reservationfrm-msg" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                      <input class="hidden" id="privacy-reservationfrm-msg" name="mytheme[privacy][enable-reservationfrm-msg]" type="checkbox" value="true" <?php echo $checked;?> />
                  </div>
                  <div class="column four-fifth last">
                      <p class="note"><?php esc_html_e('Check to append a message to all of your reservation forms.', 'spalab');?></p>
                  </div>
                  <div class="clear"></div>
                  <div class="hr_invisible_large"></div>
                  <h6><?php esc_html_e('Message below reservation form', 'spalab');?></h6>
                  <?php $value = dttheme_option('privacy', 'reservationfrm-msg'); 
                  if ( empty ($value) ) :

                    $value = "I agree to the terms and conditions laid out in the [dt_sc_privacy_link]Privacy Policy[/dt_sc_privacy_link]";

                 endif;
                 ?>
                  <textarea id="mytheme[privacy][reservationfrm-msg]" name="mytheme[privacy][reservationfrm-msg]"><?php echo esc_html($value);?></textarea>
                  <p class="note"><?php esc_html_e('A short message that can be displayed below forms, along with a checkbox, that lets the user know that he has to agree to your privacy policy in order to send the form.', 'spalab');?></p>

              </div><!-- .box-content -->
            </div><!-- .bpanel-box end -->

        </div><!-- tab1 End -->

        <!-- tab2 - Cookie Consent Message -->
        <div id="tab2" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
              <div class="box-title">
                  <h3><?php esc_html_e('Cookie Consent Message', 'spalab');?></h3>
              </div>

              <div class="box-content">
                  <p class="note"><?php echo __("Make your site comply with the <a target='_blank' href='https://ec.europa.eu/ipg/basics/legal/cookies/index_en.htm'>EU cookie law</a> by informing users that your site uses cookies. <br><br> You can also use the field to display a one time message not related to cookies if you are using a plugin for this purpose or do not need to inform your customers about the use of cookies.",'aagan');?></p>

                  <div class="hr"></div>
                  <div class="clear"></div>

                  <h6><?php esc_html_e('Cookie Message Bar', 'spalab');?></h6>
                  <div class="column one-fifth">
                      <?php $checked = ( "true" ==  dttheme_option('privacy','enable-cookie-msgbar') ) ? ' checked="checked"' : ''; ?>
                      <?php $switchclass = ( "true" ==  dttheme_option('privacy','enable-cookie-msgbar') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                      <div data-for="privacy-cookie-msgbar" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                      <input class="hidden" id="privacy-cookie-msgbar" name="mytheme[privacy][enable-cookie-msgbar]" type="checkbox" value="true" <?php echo $checked;?> />
                  </div>
                  <div class="column four-fifth last">
                      <p class="note"><?php esc_html_e('Enable cookie consent message bar', 'spalab');?></p>
                  </div>
                  <div class="clear"></div>
                  <div class="hr_invisible_large"></div>
                  <h6><?php esc_html_e('Message', 'spalab');?></h6>

                  <?php $value = dttheme_option('privacy', 'cookiebar-msg'); 
                  if ( empty ($value) ) :

                    $value = "This site uses cookies. By continuing to browse the site, you are agreeing to our use of cookies";

                 endif;?>

                  <textarea id="mytheme[privacy][cookiebar-msg]" name="mytheme[privacy][cookiebar-msg]"><?php echo esc_html($value);?></textarea>
                  <p class="note"><?php esc_html_e('Provide a message which indicates that your site uses cookies.', 'spalab');?></p>

                  <div class="hr"></div>
                  <div class="clear"></div>

                  <div class="column one-third">
                      <label><?php esc_html_e('Message Bar Position', 'spalab');?></label>
                  </div>
                  <div class="column two-third last">
                      <select name="mytheme[privacy][cookiebar-position]" class="dt-chosen-select"><?php
              $selected =   dttheme_option('privacy','cookiebar-position');
              $bar_poss =  array(
              'bottom'     => esc_html__('Bottom','spalab'),
              'top'        => esc_html__('Top','spalab'),
              'top-left'     => esc_html__('Top Left Corner','spalab'),
              'top-right'    => esc_html__('Top Right Corner','spalab'),
              'bottom-left'  => esc_html__('Bottom Left Corner','spalab'),
              'bottom-right' => esc_html__('Bottom Right Corner','spalab'),
              );
              foreach( $bar_poss as $bs => $bv ):
               echo "<option value='{$bs}'".selected($selected,$bs,false).">{$bv}</option>";
              endforeach;?>
                      </select>
                      <p class="note"><?php esc_html_e('Where on the page should the message bar appear?', 'spalab');?></p>
                  </div>

              </div><!-- .box-content -->

              <div class="box-title">
                  <h3><?php esc_html_e('Buttons', 'spalab');?></h3>
              </div>

              <div class="box-content">
                  <div class="bpanel-option-set">
                      <div class="column one-fifth">
                        <h6><?php esc_html_e('Buttons', 'spalab');?></h6>
                      </div>

                      <input type="button" value="<?php esc_attr_e('Add New Button', 'spalab');?>" class="black mytheme_add_group_item" />
                      <div class="column four-fifth last">
                         <p class="note"><?php esc_html_e('You can create any number of buttons/links for your message bar here:', 'spalab');?></p>
                      </div>
                      <div class="hr_invisible"></div>
                  </div>

                  <div class="bpanel-option-set">
                      <ul class="menu-to-edit">
                      <?php $buttons = dttheme_option('privacy-bar');
                            if(is_array($buttons)):
                              $keys = array_keys($buttons);
                              $i=0;

                            foreach($buttons as $b):?>
                                <li id="<?php echo esc_attr($keys[$i]);?>">
                                  <div class="item-bar">
                                      <span class="item-title"><?php $n = $b['label']; $n = ucwords($n); echo $n;?></span>
                                      <span class="item-control"><a class="item-edit"><?php esc_html_e('Edit', 'spalab');?></a></span>
                                  </div>
                                  <div class="item-content" style="display: none;">
                                      <span><label><small><?php esc_html_e('Button Label', 'spalab');?></small></label>
                                         <input type="text" class="button-label" name="mytheme[privacy-bar][<?php echo $keys[$i];?>][label]" value="<?php echo esc_attr($b['label']);?>"/></span>
                                      <span><label><small><?php esc_html_e('Button Action', 'spalab');?></small></label>
                                         <?php echo dt_theme_privacy_btnaction_selection($keys[$i],$b['action']);?></span>
                                      <span><label><small><?php esc_html_e('Button Link', 'spalab');?></small></label>
                                         <input type="text" class="button-link" name="mytheme[privacy-bar][<?php echo $keys[$i];?>][link]" value="<?php echo esc_attr($b['link']);?>"/></span>                                    
                                      <div class="remove-cancel-links">
                                          <span class="remove-item"><?php esc_html_e('Remove', 'spalab');?></span>
                                          <span class="meta-sep"> | </span>
                                          <span class="cancel-item"><?php esc_html_e('Cancel', 'spalab');?></span>
                                      </div>
                                  </div>
                                </li>
                      <?php $i++; endforeach; endif;?>
                      </ul>

                      <ul class="sample-to-edit" style="display:none;">
                          <li><!-- Social Item -->
                              <div class="item-bar"><!-- .item-bar -->
                                  <span class="item-title"><?php esc_html_e('Button', 'spalab');?></span>
                                  <span class="item-control"><a class="item-edit"><?php esc_html_e('Edit', 'spalab');?></a></span>
                              </div><!-- .item-bar -->
                              <div class="item-content"><!-- .item-content -->
                                  <span><label><small><?php esc_html_e('Button Label', 'spalab');?></small></label><input type="text" class="button-label" /></span>
                                  <span><label><small><?php esc_html_e('Button Action', 'spalab');?></small></label><?php echo dt_theme_privacy_btnaction_selection();?></span>
                                  <span><label><small><?php esc_html_e('Button Link', 'spalab');?></small></label><input type="text" class="button-link" /></span>                                  <div class="remove-cancel-links">
                                      <span class="remove-item"><?php esc_html_e('Remove', 'spalab');?></span>
                                      <span class="meta-sep"> | </span>
                                      <span class="cancel-item"><?php esc_html_e('Cancel', 'spalab');?></span>
                                  </div>
                              </div><!-- .item-content end -->
                          </li><!-- Social Item End-->
                      </ul>
                  </div>
              </div><!-- .box-content -->
            </div><!-- .bpanel-box end -->

        </div><!-- tab2 End -->
        
        <!-- tab3 - Cookie Consent Message -->
        <div id="tab3" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
              <div class="box-title">
                  <h3><?php esc_html_e('Modal Window with privacy and cookie info', 'spalab');?></h3>
              </div>

              <div class="box-content">

                  <h6><?php esc_html_e('Model Window Custom Content', 'spalab');?></h6>
                  <div class="column one-fifth">
                      <?php $checked = ( "true" ==  dttheme_option('privacy','enable-custom-model') ) ? ' checked="checked"' : ''; ?>
                      <?php $switchclass = ( "true" ==  dttheme_option('privacy','enable-custom-model') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                      <div data-for="privacy-custom-model" class="checkbox-switch <?php echo esc_attr($switchclass);?>"></div>
                      <input class="hidden" id="privacy-custom-model" name="mytheme[privacy][enable-custom-model]" type="checkbox" value="true" <?php echo $checked;?> />
                  </div>
                  <div class="column four-fifth last">
                      <p class="note"><?php esc_html_e('Instead of displaying the default content set custom content yourself', 'spalab');?></p>
                  </div>

                  <div class="hr"></div>
                  <div class="clear"></div>

                  <div class="column one-third"><label><?php esc_html_e('Main Heading', 'spalab');?></label></div>
                  <div class="column two-third last">

                     <?php $value = dttheme_option('privacy', 'custom-model-title'); 
                      if ( empty ($value) ) :

                        $value = "Cookie and Privacy Settings";

                     endif;?>

                     <input name="mytheme[privacy][custom-model-title]" type="text" class="large" value="<?php echo esc_html($value);?>" />
                  </div>

              </div><!-- .box-content -->
              
              <div class="box-title">
                  <h3><?php esc_html_e('Model Window Tabs', 'spalab');?></h3>
              </div>

              <div class="box-content">
                  <div class="bpanel-option-set">
                      <div class="column one-third">
                        <h6><?php esc_html_e('Model Window Tabs', 'spalab');?></h6>
                      </div>

                      <input type="button" value="<?php esc_attr_e('Add New Tab', 'spalab');?>" class="black mytheme_add_tab_item" />
                      <div class="column two-third last">
                         <p class="note"><?php esc_html_e('You can create any number of tabs for your model window here:', 'spalab');?></p>
                      </div>
                      <div class="hr_invisible"></div>
                  </div>

                  <div class="bpanel-option-set">
                      <ul class="menu-to-edit">
                      <?php $tabs = dttheme_option('privacy-model');

                            if(is_array($tabs)):
                              $keys = array_keys($tabs);
                              $i=0;

                            foreach($tabs as $t):?>
                                <li id="<?php echo esc_attr($keys[$i]);?>">
                                  <div class="item-bar">
                                      <span class="item-title"><?php $n = $t['label']; $n = ucwords($n); echo $n;?></span>
                                      <span class="item-control"><a class="item-edit"><?php esc_html_e('Edit', 'spalab');?></a></span>
                                  </div>
                                  <div class="item-content" style="display: none;">
                                      <span><label><small><?php esc_html_e('Tab Label', 'spalab');?></small></label>
                                         <input type="text" class="tab-label" name="mytheme[privacy-model][<?php echo $keys[$i];?>][label]" value="<?php echo esc_attr($t['label']);?>"/></span>
                                      <span><label><small><?php esc_html_e('Tab Content', 'spalab');?></small></label>
                                         <textarea class="tab-content" name="mytheme[privacy-model][<?php echo $keys[$i];?>][content]"><?php echo stripslashes($t['content']);?></textarea>
                                      </span>
                                      <div class="remove-cancel-links">
                                          <span class="remove-item"><?php esc_html_e('Remove', 'spalab');?></span>
                                          <span class="meta-sep"> | </span>
                                          <span class="cancel-item"><?php esc_html_e('Cancel', 'spalab');?></span>
                                      </div>
                                  </div>
                                </li>
                      <?php $i++; endforeach; endif;?>
                      </ul>

                      <ul class="sample-to-edit" style="display:none;">
                          <li><!-- Social Item -->
                              <div class="item-bar"><!-- .item-bar -->
                                  <span class="item-title"><?php esc_html_e('Tab', 'spalab');?></span>
                                  <span class="item-control"><a class="item-edit"><?php esc_html_e('Edit', 'spalab');?></a></span>
                              </div><!-- .item-bar -->
                              <div class="item-content"><!-- .item-content -->
                                  <span><label><small><?php esc_html_e('Tab Label', 'spalab');?></small></label><input type="text" class="tab-label" /></span>
                                  <span><label><small><?php esc_html_e('Tab Content', 'spalab');?></small></label><textarea class="tab-content"></textarea></span>
                                  <div class="remove-cancel-links">
                                      <span class="remove-item"><?php esc_html_e('Remove', 'spalab');?></span>
                                      <span class="meta-sep"> | </span>
                                      <span class="cancel-item"><?php esc_html_e('Cancel', 'spalab');?></span>
                                  </div>
                              </div><!-- .item-content end -->
                          </li><!-- Social Item End-->
                      </ul>
                  </div>
              </div><!-- .box-content -->

            </div><!-- .bpanel-box end -->
        </div><!-- tab3 End -->

    </div><!-- .bpanel-main-content end-->
</div><!-- privacy options end-->