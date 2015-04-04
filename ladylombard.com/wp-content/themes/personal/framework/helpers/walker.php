<?php 
/*
 * Walker for the Front End WPNUKES Megemenu
 */
class MegaMenuWalker extends Walker_Nav_Menu
{
	private $index = 0;
	
	function start_lvl(&$output, $depth = 0, $args = array())
	{
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"dropdown-menu sub-menu-".($depth+1)."\">\n";
	}
	
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
	{
		$arg = (object) $args;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$parent = $item->menu_item_parent;
		$this->item_id = $item->ID;
		
		global $wp_registered_widgets;
		$registered_sidebars = wp_get_sidebars_widgets();
		
		//Test override settings
		$status = get_post_meta( $item->ID, '_menu_item_status', true);
		$sidebar = get_post_meta( $item->ID, '_menu_item_sidebar', true);
		$this->sidebar = $sidebar;
		$statusOn = ( $status == 'active') ? true : false;
		
		if($statusOn && $depth > 0) return;
		
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		//$class_names = ( $statusOn || $depth > 0) ? $class_names.' dropdown dropdown-hover' : $class_names;
		$class_names .= ' dropdown dropdown-hover';
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ' class="dropdown-toggle"';
		if( $statusOn ) $attributes .= ' data-toggle="dropdown"';
		$args = (object) $args;
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		if( $statusOn ) $item_output .= '<span class="caret"></span>';
		$item_output .= '</a>';
		$item_output .= $args->after;
		
		$mega_class = '';
		
		$columns = get_post_meta($item->ID, '_bistro_menu_columns', true);
		$this->cols = array('2'=>'span12', '4'=>'span6', '6'=>'span4', '8'=>'span3', '10'=>'span2', '12'=>'span2');
		$this->columns = $columns;
		
		//Mega Menu
		if($statusOn && $depth == 0) {
			$item_output .= '<div class="dropdown-menu span'. (int)$columns .'"><div class="row-fluid">';
			if($sidebar) {
				
				ob_start();
				$this->dynamic_sidebar($sidebar);
				$content = ob_get_contents();
				ob_end_clean();
				$item_output .= $content;
			}
			$item_output .= '</div></div>';
		}
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	
	function my_dynamic_sidebar_params_filter($params, $auto = 0)
	{
		
		if($this->sidebar == $params[0]['id'])
		{
			//$item_output = preg_replace('/class="(.*?)"/i', 'class="$1 col_'.$width.'"', $params[0]['before_widget']);//'<div class="col_'. $width .'">';	
			//$params[0]['before_widget'] = $item_output;
			//$params[0]['after_widget'] = '</div>';
			//$params[0]['before_title'] = '<h3>';
			//$params[0]['after_title'] = '</h3>';
		}
		
		return $params;
	}
	
	function dynamic_sidebar($index = 1)
	{
		global $wp_registered_sidebars, $wp_registered_widgets;
	
		
		$columns = (get_post_meta($this->item_id, '_nuke_menu_columns', true)) ? get_post_meta($this->item_id, '_nuke_menu_columns', true) : 2;
		
		if ( is_int($index) ) {
			$index = "sidebar-$index";
		} else {
			$index = sanitize_title($index);
			foreach ( (array) $wp_registered_sidebars as $key => $value ) {
				if ( sanitize_title($value['name']) == $index ) {
					$index = $key;
					break;
				}
			}
		}
	
		$sidebars_widgets = wp_get_sidebars_widgets();
		if ( empty( $sidebars_widgets ) )
			return false;
	
		if ( empty($wp_registered_sidebars[$index]) || !array_key_exists($index, $sidebars_widgets) || !is_array($sidebars_widgets[$index]) || empty($sidebars_widgets[$index]) )
			return false;
	
		$sidebar = $wp_registered_sidebars[$index];
	
		$default = array('pages', 'search', 'archive', 'meta', 'calendar', 'categories', 'recent_entries', 'text', 'recent_comments', 'rss', 'tag_cloud', 'nav_mene', 'links');
		$did_one = false;
		foreach ( (array) $sidebars_widgets[$index] as $k => $id ) {
	
			if ( !isset($wp_registered_widgets[$id]) ) continue;
		
			$params = array_merge(
				array( array_merge( $sidebar, array('widget_id' => $id, 'widget_name' => $wp_registered_widgets[$id]['name']) ) ),
				(array) $wp_registered_widgets[$id]['params']
			);
			// Substitute HTML id and class attributes into before_widget
			$classname_ = '';
			foreach ( (array) $wp_registered_widgets[$id]['classname'] as $cn ) {
				if ( is_string($cn) )
					$classname_ .= '_' . $cn;
				elseif ( is_object($cn) )
					$classname_ .= '_' . get_class($cn);
			}
			$classname_ = ltrim($classname_, '_');
			
			if( in_array( str_replace( 'widget_', '', $classname_), $default ) ) {
				$classname_ = $classname_.' '.sh_set( $this->cols, $this->columns, 'span6' );
				$params[0]['before_widget'] = sprintf($params[0]['before_widget'], $id, $classname_);
				//$params[0]['after_widget'] = '</div>';
			}
			
			$params[0]['before_widget'] = sprintf($params[0]['before_widget'], $id, $classname_);
			$params[0]['before_title'] = '<h2 style="display:none;">';
	
			$params = apply_filters( 'dynamic_sidebar_params', $params );
			//$params = $this->my_dynamic_sidebar_params_filter($params, '');
	
			$callback = $wp_registered_widgets[$id]['callback'];
	
			do_action( 'dynamic_sidebar', $wp_registered_widgets[$id] );
	
			if ( is_callable($callback) ) {
				call_user_func_array($callback, $params);
				$did_one = true;
			}
		}
	
		return $did_one;
	}
}
class MegaMenuWalkerEdit extends Walker_Nav_Menu  {
	
	/**
	 * @see Walker_Nav_Menu::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 */
	function start_lvl(&$output, $depth = 0, $args = array()) {}
	/**
	 * @see Walker_Nav_Menu::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 */
	function end_lvl(&$output, $depth = 0, $args = array())  {
	}
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param object $args
	 */
	function start_el(&$output, $object, $depth = 0, $args = array(), $current_object_id = 0)  {
		global $_wp_nav_menu_max_depth;
		$item = $object;
		$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		ob_start();
		$item_id = esc_attr( sh_set($item, 'ID' ) );
		$removed_args = array(
			'action',
			'customlink-tab',
			'edit-menu-item',
			'menu-item',
			'page-tab',
			'_wpnonce',
		);
		$original_title = '';
		if ( 'taxonomy' == sh_set($item, 'type') ) {
			$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
			if ( is_wp_error( $original_title ) )
				$original_title = false;
		} elseif ( 'post_type' == sh_set($item, 'type') ) {
			$original_object = get_post( $item->object_id );
			$original_title = $original_object->post_title;
		}
		$classes = array(
			'menu-item menu-item-depth-' . $depth,
			'menu-item-' . esc_attr( sh_set( $item, 'object' ) ),
			'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
		);
		$title = sh_set($item, 'title');
		if ( ! empty( $item->_invalid ) ) {
			$classes[] = 'menu-item-invalid';
			/* translators: %s: title of menu item which is invalid */
			$title = sprintf( __( '%s (Invalid)', SH_NAME ), $item->title );
		} elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
			$classes[] = 'pending';
			/* translators: %s: title of menu item in draft status */
			$title = sprintf( __('%s (Pending)', SH_NAME ), $item->title );
		}
		$title = empty( $item->label ) ? $title : $item->label;
		?>
		<li id="menu-item-<?php echo $item_id;?>" class="<?php echo implode(' ', $classes);?>">
			<dl class="menu-item-bar">
				<dt class="menu-item-handle">
					<span class="item-title"><?php echo esc_html($title);?></span>
					<span class="item-controls">
						<span class="item-type"><?php echo esc_html($item -> type_label);?></span>
						<span class="item-order hide-if-js">
							<a href="<?php
							echo wp_nonce_url(add_query_arg(array('action' => 'move-up-menu-item', 'menu-item' => $item_id, ), remove_query_arg($removed_args, admin_url('nav-menus.php'))), 'move-menu_item');
							?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up');?>">&#8593;</abbr></a>
							|
							<a href="<?php
							echo wp_nonce_url(add_query_arg(array('action' => 'move-down-menu-item', 'menu-item' => $item_id, ), remove_query_arg($removed_args, admin_url('nav-menus.php'))), 'move-menu_item');
							?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down');?>">&#8595;</abbr></a>
						</span>
						<a class="item-edit" id="edit-<?php echo $item_id;?>" title="<?php esc_attr_e('Edit Menu Item', SH_NAME );?>" href="<?php
							echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
						?>"><?php _e('Edit Menu Item', SH_NAME);?></a>
					</span>
				</dt>
			</dl>
			<div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id;?>">
				<?php if( 'custom' == $item->type ) : ?>
					<p class="field-url description description-wide">
						<label for="edit-menu-item-url-<?php echo $item_id;?>">
							<?php _e('URL', SH_NAME);?><br />
							<input type="text" id="edit-menu-item-url-<?php echo $item_id;?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id;?>]" value="<?php echo esc_attr($item -> url);?>" />
						</label>
					</p>
				<?php endif;?>
				<p class="description description-thin">
					<label for="edit-menu-item-title-<?php echo $item_id;?>">
						<?php _e('Navigation Label', SH_NAME);?><br />
						<input type="text" id="edit-menu-item-title-<?php echo $item_id;?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id;?>]" value="<?php echo esc_attr($item -> title);?>" />
					</label>
				</p>
				<p class="description description-thin">
					<label for="edit-menu-item-attr-title-<?php echo $item_id;?>">
						<?php _e('Title Attribute', SH_NAME);?><br />
						<input type="text" id="edit-menu-item-attr-title-<?php echo $item_id;?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id;?>]" value="<?php echo esc_attr($item -> post_excerpt);?>" />
					</label>
				</p>
				<p class="field-link-target description">
					<label for="edit-menu-item-target-<?php echo $item_id;?>">
						<input type="checkbox" id="edit-menu-item-target-<?php echo $item_id;?>" value="_blank" name="menu-item-target[<?php echo $item_id;?>]"<?php checked($item -> target, '_blank');?> />
						<?php _e('Open link in a new window/tab', SH_NAME);?>
					</label>
				</p>
				<p class="field-css-classes description description-thin">
					<label for="edit-menu-item-classes-<?php echo $item_id;?>">
						<?php _e('CSS Classes (optional)', SH_NAME);?><br />
						<input type="text" id="edit-menu-item-classes-<?php echo $item_id;?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id;?>]" value="<?php echo esc_attr(implode(' ', $item -> classes));?>" />
					</label>
				</p>
				<p class="field-xfn description description-thin">
					<label for="edit-menu-item-xfn-<?php echo $item_id;?>">
						<?php _e('Link Relationship (XFN)', SH_NAME);?><br />
						<input type="text" id="edit-menu-item-xfn-<?php echo $item_id;?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id;?>]" value="<?php echo esc_attr($item -> xfn);?>" />
					</label>
				</p>
				<p class="field-description description description-wide">
					<label for="edit-menu-item-description-<?php echo $item_id;?>">
						<?php _e('Description', SH_NAME);?><br />
						<textarea id="edit-menu-item-description-<?php echo $item_id;?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id;?>]"><?php echo esc_html($item -> description);
							// textarea_escaped
 ?></textarea>
						<span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.', SH_NAME);?></span>
					</label>
				</p>
				
				<?php do_action('megamenu_menu_item_options', $item_id);?>
				<div class="menu-item-actions description-wide submitbox">
					<?php if( 'custom' != $item->type && $original_title !== false ) : ?>
						<p class="link-to-original">
							<?php printf(__('Original: %s', SH_NAME ), '<a href="' . esc_attr($item -> url) . '">' . esc_html($original_title) . '</a>');?>
						</p>
					<?php endif;?>
					<a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id;?>" href="<?php
					echo wp_nonce_url(add_query_arg(array('action' => 'delete-menu-item', 'menu-item' => $item_id, ), remove_query_arg($removed_args, admin_url('nav-menus.php'))), 'delete-menu_item_' . $item_id);
 ?>"><?php _e('Remove', SH_NAME );?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo $item_id;?>" href="<?php	echo esc_url(add_query_arg(array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg($removed_args, admin_url('nav-menus.php'))));?>#menu-item-settings-<?php echo $item_id;?>"><?php _e('Cancel', SH_NAME);?></a>
				</div>
				<input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id;?>]" value="<?php echo $item_id;?>" />
				<input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id;?>]" value="<?php echo esc_attr($item -> object_id);?>" />
				<input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id;?>]" value="<?php echo esc_attr($item -> object);?>" />
				<input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id;?>]" value="<?php echo esc_attr($item -> menu_item_parent);?>" />
				<input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id;?>]" value="<?php echo esc_attr($item -> menu_order);?>" />
				<input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id;?>]" value="<?php echo esc_attr($item -> type);?>" />
			</div><!-- .menu-item-settings-->
			<ul class="menu-item-transport"></ul>
		<?php
		$output .= ob_get_clean();
	}
}