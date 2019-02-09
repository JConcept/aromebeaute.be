<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.','spalab'); ?></p>
<?php  return;
	endif;?>
    
    <h3> <?php comments_number(__('No Comments','spalab'), __('Comment ( 1 )','spalab'), __('Comments ( % )','spalab') );?></h3>    
    <?php if ( have_comments() ) : ?>
    
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
                    <div class="navigation">
                        <div class="nav-previous"><?php previous_comments_link( __( 'Older Comments','spalab'  ) ); ?></div>
                        <div class="nav-next"><?php next_comments_link( __( 'Newer Comments','spalab') ); ?></div>
                    </div> <!-- .navigation -->
        <?php endif; // check for comment navigation ?>
        
        <ul class="commentlist">
     		<?php wp_list_comments( array( 'callback' => 'dttheme_custom_comments' ) ); ?>
        </ul>
    
    <?php else: ?>
		<?php if ( ! comments_open() ) : ?>
            <p class="nocomments"><?php _e( 'Comments are closed.','spalab'); ?></p>
        <?php endif;?>    
    <?php endif; ?>
	
    <!-- Comment Form -->
    <?php if ('open' == $post->comment_status) : ?>
			<?php comment_form();?>
	<?php endif; ?>