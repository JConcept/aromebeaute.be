<!-- backup -->
<div id="backup" class="bpanel-content">
  <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
            <li><a href="#my-backup"><?php _e("Backup",'spalab');?></a></li>        
        </ul>
        
        <!-- my-responsive start --> 
        <div id="my-backup" class="tab-content">
        	<div class="bpanel-box">
                
                <div class="box-title"><h3><?php _e('Backup and Restore Options','spalab');?></h3></div>
                <div class="box-content">
                	<div><?php _e('You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.','spalab');?></div>
                    <?php $backup = get_option('mytheme_backup');
						  $log = ( is_array( $backup) && array_key_exists('backup',$backup) ) ? $backup['backup'] : __('No backups yet','spalab');?>
                    <p><strong><?php  _e('Last Backup : ','spalab') ?><span class="backup-log"><?php echo ( $log ); ?></span></strong></p>
                    
                    <div class="clar"></div>
                    <div class="hr_invisible"></div>
                    <a href="#" id="mytheme_backup_button" class="bpanel-button black-btn" title="<?php _e('Backup Options','spalab');?>"><?php _e('Backup Options','spalab');?></a>
                    <a href="#" id="mytheme_restore_button" class="bpanel-button black-btn" title="<?php _e('Restore Options','spalab');?>"><?php _e('Restore Options','spalab');?></a>
                </div>
                
            </div>
        </div><!-- my-responsive end -->
        
     </div><!-- .bpanel-main-content end-->   
</div><!-- mobile end -->