<?php
#Backend
add_filter( 'wp_edit_nav_menu_walker', 'dt_modify_backend_walker', 10 );
if( !function_exists('dt_modify_backend_walker') ) {
	function dt_modify_backend_walker() {
		return 'DTModifyBackendMenuWalker';
	}
}

//This is copy of wp-admin/includes/nav-menu.php
if( !class_exists('DTModifyBackendMenuWalker') ) {
	class DTModifyBackendMenuWalker  extends Walker_Nav_Menu {
		function start_lvl( &$output, $depth = 0, $args = array() ) {}
		function end_lvl( &$output, $depth = 0, $args = array() ) {}
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $_wp_nav_menu_max_depth;
			$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;
			
			ob_start();
			
			$item_id = esc_attr( $item->ID );
			$removed_args = array(
				'action',
				'customlink-tab',
				'edit-menu-item',
				'menu-item',
				'page-tab',
				'_wpnonce',
			);
	
			$original_title = '';
			if ( 'taxonomy' == $item->type ) {
				$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
				if ( is_wp_error( $original_title ) )
					$original_title = false;
			} elseif ( 'post_type' == $item->type ) {
				$original_object = get_post( $item->object_id );
				$original_title = get_the_title( $original_object->ID );
			}
	
			$classes = array(
				'menu-item menu-item-depth-' . $depth,
				'menu-item-' . esc_attr( $item->object ),
				'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
			);
	
			$title = $item->title;
			if ( ! empty( $item->_invalid ) ) {
				$classes[] = 'menu-item-invalid';
				/* translators: %s: title of menu item which is invalid */
				$title = sprintf( __( '%s (Invalid)' ,  'spalab'), $item->title );
			} elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
				$classes[] = 'pending';
				/* translators: %s: title of menu item in draft status */
				$title = sprintf( __('%s (Pending)' ,  'spalab' ), $item->title );
			}
	
			$title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;
	
			$submenu_text = '';
			if ( 0 == $depth )
				$submenu_text = 'style="display: none;"';?>
				
				<li id="menu-item-<?php echo ( $item_id ); ?>" class="<?php echo implode(' ', $classes ); ?>">
					<dl class="menu-item-bar">
						<dt class="menu-item-handle">
							<span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span class="is-submenu" <?php echo ( $submenu_text ); ?>><?php _e( 'sub item' , 'spalab' ); ?></span></span>
							<span class="item-controls">
								<span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
								<span class="item-order hide-if-js">
									<a href="<?php
										echo wp_nonce_url(
											add_query_arg(
												array(
													'action' => 'move-up-menu-item',
													'menu-item' => $item_id,
												),
												remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
											),
											'move-menu_item'
										);
									?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up','spalab'); ?>">&#8593;</abbr></a>
									|
									<a href="<?php
										echo wp_nonce_url(
											add_query_arg(
												array(
													'action' => 'move-down-menu-item',
													'menu-item' => $item_id,
												),
												remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
											),
											'move-menu_item'
										);
									?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down','spalab'); ?>">&#8595;</abbr></a>
								</span>
								<a class="item-edit" id="edit-<?php echo esc_attr( $item_id ); ?>" title="<?php esc_attr_e('Edit Menu Item','spalab'); ?>" href="<?php
									echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
								?>"><?php _e( 'Edit Menu Item'  , 'spalab' ); ?></a>
							</span>
						</dt>
					</dl>
					<div class="menu-item-settings" id="menu-item-settings-<?php echo esc_attr( $item_id ); ?>">
					<?php if( 'custom' == $item->type ) : ?>
						<p class="field-url description description-wide">
							<label for="edit-menu-item-url-<?php echo esc_attr( $item_id ); ?>">
								<?php _e( 'URL' ,  'spalab' ); ?><br />
								<input type="text" id="edit-menu-item-url-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
							</label>
						</p>
					<?php endif; ?>
					<p class="description description-thin">
						<label for="edit-menu-item-title-<?php echo esc_attr( $item_id ); ?>">
							<?php _e( 'Navigation Label' ,  'spalab' ); ?><br />
							<input type="text" id="edit-menu-item-title-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
						</label>
					</p>
					<p class="description description-thin">
						<label for="edit-menu-item-attr-title-<?php echo esc_attr( $item_id ); ?>">
							<?php _e( 'Title Attribute' ,  'spalab' ); ?><br />
							<input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
						</label>
					</p>
					<p class="field-link-target description">
						<label for="edit-menu-item-target-<?php echo esc_attr( $item_id ); ?>">
							<input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr( $item_id ); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr( $item_id ); ?>]"<?php checked( $item->target, '_blank' ); ?> />
							<?php _e( 'Open link in a new window/tab' ,  'spalab'); ?>
						</label>
					</p>
					<p class="field-css-classes description description-thin">
						<label for="edit-menu-item-classes-<?php echo esc_attr( $item_id ); ?>">
							<?php _e( 'CSS Classes (optional)' ,  'spalab' ); ?><br />
							<input type="text" id="edit-menu-item-classes-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
						</label>
					</p>
					<p class="field-xfn description description-thin">
						<label for="edit-menu-item-xfn-<?php echo esc_attr( $item_id ); ?>">
							<?php _e( 'Link Relationship (XFN)' ,   'spalab' ); ?><br />
							<input type="text" id="edit-menu-item-xfn-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
						</label>
					</p>
					<p class="field-description description description-wide">
						<label for="edit-menu-item-description-<?php echo esc_attr( $item_id ); ?>">
							<?php _e( 'Description' ,  'spalab'); ?><br />
							<textarea id="edit-menu-item-description-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr( $item_id ); ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
							<span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.' ,  'spalab'); ?></span>
						</label>
					</p>
					
					<?php 
					// Place this in your admin nav menu Walker
					   do_action( 'wp_nav_menu_item_custom_fields', $item_id, $item, $depth, $args );
					// end added section 
					?>
					
					<?php
					# For compatibilty with Nav Menu Roles by Kathy Darling
					do_action('wp_nav_menu_item_custom_fields', $item_id, $item, $depth, $args );
					?>
	
					
					<!-- DesignThemes Custom Code Begins Here-->
					<?php $value = get_post_meta( $item->ID, '_dt-use-as-megamenu', true);?>
					<p class="filed-dt-use-as-megamenu description description-thin">
						<label for="edit-menu-item-dt-use-as-megamenu-<?php echo esc_attr( $item_id ); ?>">
							<input type="checkbox" id="edit-menu-item-dt-use-as-megamenu-<?php echo esc_attr( $item_id ); ?>" value="1" name="dt-use-as-megamenu[<?php echo esc_attr( $item_id ); ?>]"<?php checked( $value, 1 ); ?> />
							<?php _e( 'Use As Mega Menu' ,  'spalab' ); ?>
						</label>
					</p>
	
					<?php $value = get_post_meta( $item->ID, '_dt-disable-text', true);?>
					<p class="filed-dt-disable-text description description-thin">
						<label for="edit-menu-item-dt-disable-text-<?php echo esc_attr( $item_id ); ?>">
							<input type="checkbox" id="edit-menu-item-dt-disable-text-<?php echo esc_attr( $item_id ); ?>" value="1" name="dt-disable-text[<?php echo esc_attr( $item_id ); ?>]"<?php checked( $value, 1 ); ?> />
							<?php _e( 'Disable Text' ,  'spalab'); ?>
						</label>
					</p>
					
					<?php $value = get_post_meta( $item->ID, '_dt-disable-link', true);?>
					<p class="filed-dt-disable-link description description-thin">
						<label for="edit-menu-item-dt-disable-link-<?php echo esc_attr( $item_id ); ?>">
							<input type="checkbox" id="edit-menu-item-dt-disable-link-<?php echo esc_attr( $item_id ); ?>" value="1" name="dt-disable-link[<?php echo esc_attr( $item_id ); ?>]"<?php checked( $value, 1 ); ?> />
							<?php _e( 'Disable Link' ,  'spalab' ); ?>
						</label>
					</p>
	
					<?php $value = get_post_meta( $item->ID, '_dt-fullwidth', true);?>
					<p class="filed-dt-fullwidth description description-thin">
						<label for="edit-menu-item-dt-fullwidth<?php echo esc_attr( $item_id ); ?>">
							<input type="checkbox" id="edit-menu-item-dt-fullwidth<?php echo esc_attr( $item_id ); ?>" value="1" name="dt-fullwidth[<?php echo esc_attr( $item_id ); ?>]"<?php checked( $value, 1 ); ?> />
							<?php _e( 'Enable Fullwidth' ,  'spalab' ); ?>
						</label>
					</p>
					
					<?php $value = get_post_meta( $item->ID, '_dt-custom-content', true);?>
					<p class="field-dt-content description description-wide">
						<label for="edit-menu-item-dt-content-<?php echo esc_attr( $item_id ); ?>">
							<?php _e( 'Custom Content' ,  'spalab' ); ?><br />
							<textarea id="edit-menu-item-dt-content-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-dt-content" rows="3" cols="20" name="dt-content[<?php echo esc_attr( $item_id ); ?>]"><?php echo esc_html( $value); // textarea_escaped ?></textarea>
							<span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.' ,  'spalab'); ?></span>
						</label>
					</p>
					
					<?php $value = get_post_meta( $item->ID, '_dt-columns', true);?>
					<p class="field-dt-submenu-column description description-wide">
							<label for="edit-menu-item-dt-submenu-column-<?php echo esc_attr( $item_id ); ?>">
							<?php _e( 'Sub Menu Column Layout' ,  'spalab' ); ?><br />
								<select id="edit-menu-item-dt-submenu-column-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-dt-submenu-column" name="dt-submenu-column[<?php echo esc_attr( $item_id ); ?>]">
								<?php for( $i = 2; $i <= 4; $i++): ?>
								  <option value="<?php echo esc_attr( $i );?>" <?php selected( $value,$i);?>><?php echo esc_html( $i ); ?></option>
								<?php endfor;?>
								</select>
							<span class="description"><?php _e('Select where to align the submenu.',  'spalab'); ?></span>
							</label>
					</p>
					
					<?php $value = get_post_meta( $item->ID, "_dt-menu-icon",true); ?>
					<p class="field-dt-menuicon description description-wide">
						<label for="edit-menu-item-dt-menu-icon-<?php echo esc_attr( $item_id ); ?>">
						<?php _e( 'Menu Icon' ,'spalab');?><br/>
						<input id="edit-menu-item-dt-menu-icon-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-dt-menu-icon" type="text" name="dt-menu-icon[<?php echo esc_attr( $item_id );?>]" value="<?php echo esc_attr( $value );?>">
						<span class="description"><?php _e('Please use font awesome icon ',  'spalab'); ?></span>
						</label>
					</p>
					
					<?php $selected = get_post_meta( $item->ID, '_dt-menu-widget', true);?>
						<p class="field-dt-submenu-widget description description-wide">
							<label for="edit-menu-item-dt-submenu-widget-<?php echo esc_attr( $item_id ); ?>">
							<?php _e( 'Display Widget Area' ,  'spalab' ); ?><br />
								<select id="edit-menu-item-dt-submenu-widget-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-dt-submenu-widget" name="dt-submenu-widget[<?php echo esc_attr( $item_id ); ?>]">
									<option value=""><?php _e('Select', 'spalab');?></option><?php
									$widgets = dttheme_option('widgetarea','megamenu');
									$widgets = is_array($widgets) ? array_unique($widgets) : array();
									$widgets = array_filter($widgets);
									foreach( $widgets as $widget) {
										$id = mb_convert_case($widget, MB_CASE_LOWER, "UTF-8");
										$id = str_replace(" ", "-", $id);
										echo "<option value='{$id}' " . selected ( $selected, $id, false ) . ">{$widget}</option>";
									}?>
								</select>
							<span class="description"><?php _e('Select widget area to show.',  'spalab'); ?></span>
							</label>
						</p>
	
						<?php $value = get_post_meta( $item->ID, '_dt-fill-columns', true);?>
						<p class="field-dt-widgetarea-column description description-wide">
								<label for="edit-menu-item-dt-submenu-column-<?php echo esc_attr( $item_id ); ?>">
								<?php _e( 'Fill Widget Area Layout' ,  'spalab' ); ?><br />
									<select id="edit-menu-item-dt-widgetarea-column-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-dt-submenu-column" name="dt-widgetarea-column[<?php echo esc_attr( $item_id ); ?>]">
										<option value=""><?php _e('select','spalab');?></option>
									<?php for( $i = 2; $i <= 4; $i++): ?>
									  <option value="<?php echo esc_attr( $i );?>" <?php selected( $value,$i);?>><?php echo esc_html( $i ); ?></option>
									<?php endfor;?>
									</select>
								<span class="description"><?php _e('Only works if you choose widget area',  'spalab'); ?></span>
								</label>
						</p>
					
					<!-- DesignThemes Custom Code Ends Here-->
					
					
					<p class="field-move hide-if-no-js description description-wide">
						<label>
							<span><?php _e( 'Move' , 'spalab' ); ?></span>
							<a href="#" class="menus-move-up"><?php _e( 'Up one' ,  'spalab' ); ?></a>
							<a href="#" class="menus-move-down"><?php _e( 'Down one' ,  'spalab' ); ?></a>
							<a href="#" class="menus-move-left"></a>
							<a href="#" class="menus-move-right"></a>
							<a href="#" class="menus-move-top"><?php _e( 'To the top' ,  'spalab' ); ?></a>
						</label>
					</p>
	
	<div class="menu-item-actions description-wide submitbox">
						<?php if( 'custom' != $item->type && $original_title !== false ) : ?>
							<p class="link-to-original">
								<?php printf( __('Original: %s' ,  'spalab'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
							</p>
						<?php endif; ?>
						<a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr( $item_id ); ?>" href="<?php
						echo wp_nonce_url(
							add_query_arg(
								array(
									'action' => 'delete-menu-item',
									'menu-item' => $item_id,
								),
								admin_url( 'nav-menus.php' )
							),
							'delete-menu_item_' . $item_id
						); ?>"><?php _e( 'Remove' ,  'spalab' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo esc_attr( $item_id ); ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
							?>#menu-item-settings-<?php echo esc_attr( $item_id ); ?>"><?php _e('Cancel' ,  'spalab'); ?></a>
					</div>
	
					<input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item_id ); ?>" />
					<input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
					<input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
					<input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
					<input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
					<input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />                                              
					</div>
				</li>
				<ul class="menu-item-transport"></ul>
			<?php
			$output .= ob_get_clean();		
		}//start_el()
	}
}

#To Save

add_action( 'wp_update_nav_menu_item', 'dt_update_menu', 100, 3);

if( !function_exists('dt_update_menu') ) {
	function dt_update_menu( $menu_id, $menu_item_db ){
		$value = isset( $_POST['dt-use-as-megamenu'][$menu_item_db] ) ? $_POST['dt-use-as-megamenu'][$menu_item_db] : "";
		update_post_meta( $menu_item_db,'_dt-use-as-megamenu',$value );
	
		$value = isset( $_POST['dt-disable-link'][$menu_item_db] ) ? $_POST['dt-disable-link'][$menu_item_db] : "";
		update_post_meta( $menu_item_db,'_dt-disable-link',$value );
	
		$value = isset( $_POST['dt-fullwidth'][$menu_item_db] ) ? $_POST['dt-fullwidth'][$menu_item_db] : "";
		update_post_meta( $menu_item_db,'_dt-fullwidth',$value );
	
		$value = isset( $_POST['dt-disable-text'][$menu_item_db] ) ? $_POST['dt-disable-text'][$menu_item_db] : "";
		update_post_meta( $menu_item_db,'_dt-disable-text',$value );
	
		$value = isset( $_POST['dt-submenu-column'][$menu_item_db] ) ? $_POST['dt-submenu-column'][$menu_item_db] : "";
		update_post_meta( $menu_item_db,'_dt-columns',$value );
	
		$value = isset( $_POST['dt-content'][$menu_item_db] ) ? $_POST['dt-content'][$menu_item_db] : "";
		update_post_meta( $menu_item_db,'_dt-custom-content',$value );
		
		$value = isset( $_POST['dt-menu-icon'][$menu_item_db] ) ? $_POST['dt-menu-icon'][$menu_item_db] : "";
		update_post_meta( $menu_item_db,'_dt-menu-icon',$value );
		
		$value = isset( $_POST['dt-widgetarea-column'][$menu_item_db] ) ? $_POST['dt-widgetarea-column'][$menu_item_db] : "";
		update_post_meta( $menu_item_db,'_dt-fill-columns',$value );
		
		$value = isset( $_POST['dt-submenu-widget'][$menu_item_db] ) ? $_POST['dt-submenu-widget'][$menu_item_db] : "";
		update_post_meta( $menu_item_db,'_dt-menu-widget',$value );
	}
}

#Front End Walker
# Walker - located at wp-includes/class-wp-walker.php
if( !class_exists('DTFrontEndMenuWalker') ) {
	class DTFrontEndMenuWalker extends Walker {
		var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
		var $mega_active;
	
		function start_lvl( &$output, $depth = 0, $args = array()) {
			$indent = str_repeat("\t", $depth);
			if($depth === 0) $output .= "\n{replace_one}\n";
			$output .= "\n$indent<ul class=\"sub-menu\">\n";
		}
	
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "$indent</ul>\n";
			$output .= '<a class="dt-menu-expand">+</a>';
			
			if($depth === 0) {
				if($this->mega_active){
						$output .= "\n</div>\n";
						$output .= '<a class="dt-menu-expand">+</a>';
						$output = str_replace("{replace_one}", "<div class='megamenu-child-container'>", $output);
				}else{
					$output = str_replace("{replace_one}", "", $output);
				}
			}
		}//end_lvl()
	
		function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {
			global $wp_query;
			$item_output = "";
			
			if($depth === 0) {	
				$this->mega_active = get_post_meta( $item->ID, '_dt-use-as-megamenu', true);
			}
			
			$this->dt_menuicon = get_post_meta( $item->ID, '_dt-menu-icon', true);
			
			$nolink = get_post_meta( $item->ID, '_dt-disable-link', true);
			$notext = get_post_meta( $item->ID, '_dt-disable-text', true);
			$custom_content = get_post_meta( $item->ID, '_dt-custom-content', true);
			
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			$description  = ! empty( $item->description ) ? '<span class="menu-item-description">'.esc_attr( $item->description ).'</span>' : '';
			
			$item_output .= $args->before;
			if( $nolink ) {
				$item_output .= '<span class="nolink-menu">';
			} else {
				$item_output .= '<a'. $attributes .'>';
			}
			
			if( !empty( $this->dt_menuicon) ){
				$item_output .= "<i class='menu-icon fa {$this->dt_menuicon}'></i>";
			}
			
			if( !$nolink )
				$item_output .= $args->link_before;
			
			if( !$notext ){
				$item_output .= apply_filters( 'the_title', $item->title, $item->ID );
			}
			
			#if( $depth == 0 || $depth == 1){
				$item_output .= $description;
			#}
			
			if( !$nolink )
				$item_output .= $args->link_after;
			
			if( $nolink ) {
				$item_output.= '</span>'; 		
			} else {
				$item_output .= '</a>';
			}
			$item_output .= $args->after;
			
			
	/*		if( $depth > 0){
				$content =  get_post_meta( $item->ID, '_dt-custom-content', true);
				if( !empty($content) ) {
					$content = do_shortcode( $content );
					$item_output .= "<div class='dt-megamenu-custom-content'>$content</div>";
				}
			}
	*/		
			
			$class_names = $value = '';
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names .= " menu-item-depth-{$depth}";
			
			if($depth === 0 ) {
				if( $this->mega_active ) {
					
					$class_names .= " menu-item-megamenu-parent ";
					
					//Columns
					$columns = get_post_meta( $item->ID, '_dt-columns', true);
					$class_names .= " megamenu-{$columns}-columns-group";
					
				} else {
					$class_names .= " menu-item-simple-parent ";
				}
				
			}
			
			if( $depth === 1 ){
				$fullwidth = get_post_meta( $item->ID, '_dt-fullwidth', true);
				if( $fullwidth ) {
					$class_names .= " menu-item-fullwidth ";
				}
	
				$sidebar = get_post_meta( $item->ID, '_dt-menu-widget', true);
				$fill = get_post_meta( $item->ID, '_dt-fill-columns', true);
				$extra_class = "";
				switch( $fill ){
					case '2': $extra_class = " fill-two-columns "; break;
					case '3': $extra_class = " fill-three-columns "; break;
					case '4': $extra_class = " fill-four-columns "; break;
				}
				$class_names .= !empty( $sidebar ) ? " menu-item-with-widget-area ".$extra_class : "";
			}
		
			$class_names = ' class="'.esc_attr( $class_names ).'"';
		
			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
	
			if( $depth === 1 ) {
				$sidebar = get_post_meta( $item->ID, '_dt-menu-widget', true);
	
				if( !empty($sidebar) ){
					$item_output .= '<div class="menu-item-widget-area-container">';
					if(function_exists('dynamic_sidebar')){
						$item_output .= '<ul>';
						ob_start();
						dynamic_sidebar($sidebar);
						$item_output .= ob_get_clean();	
						$item_output .= '</ul>';
					}
					$item_output .= '</div>';
				}
			}
			
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		} //start_el()
		
		function end_el(&$output, $object, $depth = 0, $args = array()) {
			$output .= "</li>\n";
		} //end_el()
		
	}
}