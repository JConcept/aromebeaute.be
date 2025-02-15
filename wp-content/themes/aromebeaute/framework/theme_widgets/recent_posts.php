<?php
/** My Recent Posts Widget
  * Objective:
  *		1.To list out posts
**/
class MY_Recent_Posts extends WP_Widget {
	#1.constructor
	function __construct() {
		$widget_options = array("classname"=>'widget_recent_entries', 'description'=>'To list out posts');
		parent::__construct(false,IAMD_THEME_NAME.__(' Posts','spalab'),$widget_options);
	}
	
	#2.widget input form in back-end
	function form($instance) {
		$instance = wp_parse_args( (array) $instance,array('title'=>'','_post_count'=>'','_post_categories'=>'','_enabled_image'=>'','_excerpt'=>'') );
		$title = strip_tags($instance['title']);
		$_post_count = !empty($instance['_post_count']) ? strip_tags($instance['_post_count']) : "-1";
	    $_post_categories = !empty($instance['_post_categories']) ? $instance['_post_categories']: array();?>
        
        <!-- Form -->
        <p><label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php _e('Title:','spalab');?> 
		   <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" 
            type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
           
	    <p><label for="<?php echo esc_attr( $this->get_field_id('_post_categories') ); ?>">
			<?php _e('Choose the categories you want to display (multiple selection possible)','spalab');?></label>
            <select class="widefat" id="<?php echo ( $this->get_field_id('_post_categories').'[]' );?>" 
            	name="<?php echo ( $this->get_field_name('_post_categories').'[]' );?>" multiple="multiple">
                <option value=""><?php _e("Select",'spalab');?></option>
           	<?php $cats = get_categories( 'orderby=name&hide_empty=0' );
			foreach ($cats as $cat):
				$id = esc_attr($cat->term_id);
				$selected = ( in_array($id,$_post_categories)) ? 'selected="selected"' : '';
				$title = esc_html($cat->name);
				echo "<option value='{$id}' {$selected}>{$title}</option>";
			endforeach;?>
            </select></p>

	    <p><label for="<?php echo ( $this->get_field_id('_post_count') ); ?>"><?php _e('No.of posts to show:','spalab');?></label>
		   <input id="<?php echo esc_attr( $this->get_field_id('_post_count') ); ?>" name="<?php echo esc_attr( $this->get_field_name('_post_count') ); ?>" value="<?php echo esc_attr( $_post_count )?>" /></p>
        <!-- Form end-->
<?php
	}
	#3.processes & saves the twitter widget option
	function update( $new_instance,$old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['_post_count'] = strip_tags($new_instance['_post_count']);
		$instance['_post_categories'] = $new_instance['_post_categories'];
	return $instance;
	}
	
	#4.output in front-end
	function widget($args, $instance) {
		extract($args);
		global $post;
		$title = empty($instance['title']) ?	'' : strip_tags($instance['title']);
		$_post_count = (int) $instance['_post_count'];
		$_post_categories = "";
		if(!empty($instance['_post_categories']))
			$_post_categories = is_array($instance['_post_categories']) ? implode(",",$instance['_post_categories']) : $instance['_post_categories'];
		$arg = empty($_post_categories) ? "posts_per_page={$_post_count}":"cat={$_post_categories}&posts_per_page={$_post_count}";


		echo ( $before_widget );
 	    echo ( $before_title.$title.$after_title );
		echo "<div class='recent-posts-widget'><ul>";		
			 query_posts($arg);
			 if( have_posts()) :
			 while(have_posts()):
			 	the_post();
				$title = ( strlen(get_the_title()) > 20 ) ? substr(get_the_title(),0,19)."..." :get_the_title();
				echo "<li>";
				echo "<div class='post-thumb'>";
						$dttheme_options = get_option(IAMD_THEME_SETTINGS);
	  		  			$dttheme_general = $dttheme_options['general']; 
						$enable_placeholder =  array_key_exists('disable-posts-placeholder',$dttheme_general) ? true : false;
						$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full',false);
						if( $image != false ):
							$image = $image[0];
						else:
							if( $enable_placeholder ):
								$image = "http".dt_ssl()."://placehold.it/100x80&text=Image";
							endif;
						endif;
							
						if( $image != "" ) :
							echo "<a href='".get_permalink()."' class='thumb'>";
							echo "<img src='$image' alt='{$title}'/>";
							echo "</a>";
						endif;
				echo "</div>";
				echo "<h4><a href='".get_permalink()."'>{$title}</a></h4>";
				echo dttheme_excerpt(15);
				echo "<div class='post-meta'>";
				echo '<p class="author"><span class="fa fa-user"> </span>';
				echo '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'"> '.get_the_author().'</a>';
				echo '</p>';
				echo "<p class='date'> <span class='fa fa-calendar'> </span> ".get_the_date("M d Y")."</p>";				
				echo "<p>";
				comments_popup_link(__('<span class="fa fa-comments"> </span> 0','spalab'),__('<span class="fa fa-comments"> </span> 1','spalab'),' <span class="fa fa-comments"> </span> % ',""
									,__('<span class="fa fa-comments-o"> </span>','spalab'));
				echo "</p>";
				echo "</div>";				
				
				echo "</li>";
			 endwhile;
			 else:
			 	echo "<li><h4>".__('No Posts found','spalab')."</h4></li>";
			 endif;
			 wp_reset_query();
	 	echo "</ul></div>";			 
		echo ( $after_widget );
	}
}?>