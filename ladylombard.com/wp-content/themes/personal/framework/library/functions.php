<?php
/** A function to fetch the categories from wordpress */

function sh_get_categories( $arg = false )
{
	if( sh_set( $arg, 'taxonomy' ) )
	{
		global $wpdb;
		$wpdb->show_errors();
		$prefix = $wpdb->prefix;
		$cat_name = $wpdb->get_results('select term_id from '.$prefix.'term_taxonomy where taxonomy="'.$arg['taxonomy'].'"' );
		$blank = array( ' ' => ' ' );
		$result = array();
		foreach( $cat_name as $key => $value ):
			$get_listing = $wpdb->get_results('select * from '.$prefix.'terms where term_id='.$value->term_id );
			foreach( $get_listing as $key => $value ):
				$result[$value->term_id] = $value->name;
			endforeach;
		endforeach;
		$merge_result = array_merge($blank, $result);
		return $merge_result;	
	}
}
	
function sh_excerpt($pos, $limit = 127)
{
	$string = is_object( $pos ) ? do_shortcode( sh_set( $pos, 'post_content' ) ) : $pos;
	return sh_character_limit( $limit, strip_tags( $string ) );
}
function sh_get_sidebars( $multi = false )
{
	global $wp_registered_sidebars;
	$sidebars = !($wp_registered_sidebars) ? get_option('wp_registered_sidebars') : $wp_registered_sidebars;
	
	if( $multi ) $data[] = array('value'=>'', 'label' => __('No Sidebar', SH_NAME) );
	else $data = array('' => __('No Sidebar', SH_NAME));
	
	foreach( (array)$sidebars as $sidebar)
	{
		if( $multi ) $data[] = array( 'value' => sh_set($sidebar, 'id'), 'label' => sh_set($sidebar, 'name') );
		else $data[sh_set($sidebar, 'id')] = sh_set($sidebar, 'name');
	}
	return $data;
}
if ( ! function_exists('character_limiter'))
{
	function character_limiter($str, $n = 500, $end_char = '&#8230;', $allowed_tags = false)
	{
		if($allowed_tags) $str = strip_tags($str, $allowed_tags);
		if (strlen($str) < $n)	return $str;
		$str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));
		if (strlen($str) <= $n) return $str;
		$out = "";
		foreach (explode(' ', trim($str)) as $val)
		{
			$out .= $val.' ';
			
			if (strlen($out) >= $n)
			{
				$out = trim($out);
				return (strlen($out) == strlen($str)) ? $out : $out.$end_char;
			}		
		}
	}
}

function sh_get_posts_array( $post_type = 'post' )
{
	global $wpdb;
	$res = $wpdb->get_results( "SELECT 'ID', 'post_title' FROM '" .$wpdb->prefix. "posts' WHERE 'post_type' = '$post_type' AND 'post_status' = 'publish' ", ARRAY_A );
	$return = array();
	foreach( $res as $r) $return[sh_set($r, 'ID')] = sh_set($r, 'post_title');
	
	return $return;
}
if( !function_exists( 'bistro_slug' ) )
{
	function bistro_slug( $string )
	{
		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}
}
function sh_comments_list( $comment, $args, $depth )
{
	$GLOBALS['comment'] = $comment; ?>
    <li>
      <div id="comment-<?php comment_ID();?>" class="comment">
        <?php /** check if this comment author not have approved comments befor this */
        if($comment->comment_approved == '0' ) : ?>
            <em><?php /** print message below */  _e( 'Your comment is awaiting moderation.', SH_NAME ); ?>  </em>
        <?php endif; ?>
			<div class="avatar-thumb">
            	<span>
					<?php echo get_avatar( $comment, 80 ); ?>
				</span>
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div>
        <div class="comment-info">
              <h3><?php comment_author(); ?></h3>
              <span><?php comment_date( 'F')?> <?php comment_date( 'd, m Y  h:i:s' );?></span>

          <?php comment_text(); ?>
       </div>
       </div>
	<?php
}
/**
 * Outputs a complete commenting form for use within a template.
 * Most strings and form fields may be controlled through the $args array passed
 * into the function, while you may also choose to use the comment_form_default_fields
 * filter to modify the array of default fields if you'd just like to add a new
 * one or remove a single field. All fields are also individually passed through
 * a filter of the form comment_form_field_$name where $name is the key used
 * in the array of fields.
 *
 * @since 3.0.0
 * @param array $args Options for strings, fields etc in the form
 * @param mixed $post_id Post ID to generate the form for, uses the current post if null
 * @return void
 */
function sh_comment_form( $args = array(), $post_id = null )
{
	if ( null === $post_id )
		$post_id = get_the_ID();
	else
		$id = $post_id;
	$commenter 		= wp_get_current_commenter();
	$user 			= wp_get_current_user();
	$user_identity 	= $user->exists() ? $user->display_name : '';
	$args 			= wp_parse_args( $args );
	if ( ! isset( $args['format'] ) )
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	$req      		= get_option( 'require_name_email' );
	$aria_req 		= ( $req ? " aria-required='true'" : '' );
	$html5    		= 'html5' === $args['format'];
	$fields   		=  array(
						'author' => '<div class="col-md-6">						
		            					<input class="input-style" id="author" placeholder="NAME" name="author" type="text" value=
											"' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />
								</div>',
		
						'email'  => '<div class="col-md-6">
										<input class="input-style" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value=
											"' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' placeholder="EMAIL" />
								</div>',
					
						'url'    => '<div class="col-md-12">
										<input id="url" placeholder="URL" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value=
											"' . esc_attr( $commenter['comment_author_url'] ) . '"  />
									</div>',
				);
				
	$required_text 		= sprintf( ' ' . __('Required fields are marked %s', SH_NAME ), '<span class="required">*</span>' );
	$defaults = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<div class="col-md-12">
										<textarea class="input-style" id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="MESSAGE" ></textarea>
								   </div>',
								   
		'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), 
										wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . 
								  '</p>',
								  
		'logged_in_as'         => '<div class="col-md-12"><p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		//'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.' , SH_NAME). '</p>',
		'comment_notes_after'  => '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' , SH_NAME), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => __( 'Leave a Reply', SH_NAME ),
		'title_reply_to'       => __( 'Leave a Reply to %s', SH_NAME ),
		'cancel_reply_link'    => __( 'Cancel reply', SH_NAME ),
		'label_submit'         => __( 'Post Comment' , SH_NAME),
		'format'               => 'xhtml',
	);
	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );
	
	?>
		<?php if ( comments_open( $post_id ) ) : ?>
			<?php do_action( 'comment_form_before' ); ?>
				<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
					<?php echo $args['must_log_in']; ?>
					<?php do_action( 'comment_form_must_log_in_after' ); ?>
				<?php else : ?>
                <div id="respond" class="leave-comment">
                <h4><i class="fa fa-comment"></i><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?></h4> <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small>
					<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" <?php echo $html5 ? ' novalidate' : ''; ?>>
                    <div id="result"></div>
						<?php do_action( 'comment_form_top' ); ?>
						<?php if ( is_user_logged_in() ) : ?>
                        <div class="row">
							<?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
							<?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
                            </div>
						<?php else : ?>
                            <div class="row">
								<?php
                                do_action( 'comment_form_before_fields' );
                                foreach ( (array) $args['fields'] as $name => $field ) {
                                    echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
                                }
                                do_action( 'comment_form_after_fields' );
                                ?>
                            
						<?php endif; ?>
						<?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
						
						<div class="col-md-12 column">
							<button type="submit" class="submit" name="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" ><i class="fa fa-comments-o"></i> <?php echo esc_attr( $args['label_submit'] ); ?></button></div>
							<?php comment_id_fields( $post_id ); ?>
						</div>
						<?php do_action( 'comment_form', $post_id ); ?>
					</form>
                    </div>
				<?php endif; ?>
			<?php do_action( 'comment_form_after' ); ?>
		<?php else : ?>
			<?php do_action( 'comment_form_comments_closed' ); ?>
		<?php endif; ?>
	<?php
}
add_action('wp_ajax_nopriv_sh_comment_form_submit', 'sh_comment_form_submit');
add_action('wp_ajax_sh_comment_form_submit', 'sh_comment_form_submit');
function sh_comment_form_submit()
{
	if( isset( $_POST['action'] ) && $_POST['action'] == 'sh_comment_form_submit' )
	{
		$settings = get_option( SH_NAME.'_theme_options' );
		
		$name	= sh_set( $_POST, 'author' );
		$email	= sh_set( $_POST, 'email' );
		$url	= sh_set( $_POST, 'url' );
		$msg	= sh_set( $_POST, 'comment' );
		 
		if( strlen( $name ) <= 4 )
		{
			echo '<div class="msg">Please Enter Your Name</div>';
		}
		if( strlen( $email ) <= 4 )
		{
			echo '<div class="msg">Please Enter Your Email</div>';
		}
		if( strlen( $email ) >= 4 )
		{
			if( !filter_var( $email, FILTER_VALIDATE_EMAIL ) )
			{
				echo "<div class='msg'>This <strong>$email</strong> email address is not valid.</div>";
			}
		}
		if( strlen( $msg ) <= 4 )
		{
			echo '<div class="msg">Please Enter your Comment</div>';
		}
		
		if( strlen( $name ) >= 4 && strlen( $email ) >= 4 && filter_var( $email, FILTER_VALIDATE_EMAIL ) && strlen( $msg ) >= 4 )
		{
			echo 1;
		}
		exit;
	}
}
function sh_contact_form_submit()
{
	if( !count( $_POST ) ) return;
	
	
	_load_class( 'validation', 'helpers', true );
	$t = &$GLOBALS['_sh_base'];//printr($t);
	$settings = get_option( SH_NAME.'_theme_options' );
	/** set validation rules for contact form */
	$t->validation->set_rules('author','<strong>'.__('Name', SH_NAME).'</strong>', 'required|min_length[4]|max_lenth[30]');
	$t->validation->set_rules('email','<strong>'.__('Email', SH_NAME).'</strong>', 'required|valid_email');
	$t->validation->set_rules('comment','<strong>'.__('Message', SH_NAME).'</strong>', 'required|min_length[5]');
	if( sh_set($settings, 'captcha_status') == 'on')
	{
		if( sh_set( $_POST, 'contact_captcha') !== sh_set( $_SESSION, 'captcha'))
		{
			$t->validation->_error_array['captcha'] = __('Invalid captcha entered, please try again.', SH_NAME);
		}
	}
	
	$messages = '';
	if($t->validation->run() !== FALSE && empty($t->validation->_error_array))
	{
		printr($t->validation);
		
		$name = $t->validation->post('contact_name');
		$email = $t->validation->post('contact_email');
		$message = $t->validation->post('contact_message');
		$contact_to = ( sh_set($settings, 'contact_email') ) ? sh_set($settings, 'contact_email') : get_option('admin_email');
		
		$headers = 'From: '.$name.' <'.$email.'>' . "\r\n";
		wp_mail($contact_to, __('Contact Us Message', SH_NAME), $message, $headers);
		
		$message = sh_set($settings, 'success_message') ? $settings['success_message'] : sprintf( __('Thank you <strong>%s</strong> for using our contact form! Your email was successfully sent and we will be in touch with you soon.',SH_NAME), $name);
		$messages = '<div class="alert alert-success">
						<p class="title">'.__('SUCCESS! ', SH_NAME).$message.'</p>
					</div>';
							
	}else
	{
		 if( is_array( $t->validation->_error_array ) )
		 {
			 foreach( $t->validation->_error_array as $msg )
			 {
				 $messages .= '<div class="alert alert-error">
									<p class="title">'.__('Error! ', SH_NAME).$msg.'</p>
								</div>';
			 }
		 }
	}
	
	return $messages;
}

function _the_pagination( $args = array(), $echo = 1, $custom_qurey = false )
{
	global $wp_query;
	if( $custom_qurey == true )
	{
		$current = (isset($wp_query->query['paged'])) ? $wp_query->query['paged'] : 1;
	}
	else
	{
		$current = max( 1, get_query_var('paged') );
	}
	
	$default =  array('base' => str_replace( 99999, '%#%', esc_url( get_pagenum_link( 99999 ) ) ), 'format' => '?paged=%#%', 'current' => $current,
						'total' => $wp_query->max_num_pages, 'next_text' => __('Next', SH_NAME), 'prev_text' => __('Previous', SH_NAME), 'type'=>'list');
						
	$args = wp_parse_args($args, $default);	?>
	<?php	
	
	$pagination = '<div class="pagination-area">'.paginate_links($args).'</div>';
	$pagination =  str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $pagination );
	
	if(paginate_links(array_merge(array('type'=>'array'),$args)))
	{
		if($echo) echo $pagination;
		return $pagination;
	}
}

function sh_grab_video( $url, $opt )
{
	if( !esc_url($url) ) return;
	//$opt = get_post_meta( get_the_ID(), '_dictate_gal_videos', true );
	$key = md5( $url );
	
	if( sh_set( $opt, $key ) ) return sh_set( $opt, $key );
	
	$grab = new SH_grab( $url );
	$res = $grab->result();
	
	if( $res ) {
		$opt[$key] = sh_set( $res, '0' );
		update_post_meta( get_the_ID(), '_dictate_gal_videos', $opt );
		return sh_set( $res, '0' );
	}
	return false;
}

function sh_google_fonts()
{
	$options = get_option( 'sh_google_fonts_array' );
	if( ! $options ) {
		
		$fp = @fopen( get_template_directory().'/framework/resource/default_fonts', 'r');
		if( !$fp ) return array();
		$read = fread($fp, 1024000);//printr(json_decode($read));
		
	}else return $options;
	
	$return = array();
	$style = array();
	
	if( $items = sh_set( json_decode($read), 'items' ) )
	{
		foreach( $items as $item )
		{
			if( $styles = sh_set( $item, 'variants') ){
				foreach( $styles as $s ) $style[$s] = $s;
			}
			$return[sh_set( $item, 'family' )] = sh_set( $item, 'family' );
		}
	}
	update_option( 'sh_google_fonts_array', array('family'=>$return, 'style'=>$style ) );
	return array('family'=>$return, 'style'=>$style );
}

function sh_get_font_settings( $FontSettings = array(), $StyleBefore = '', $StyleAfter = '' )
{
	$i = 1;
	$settings = get_option(SH_NAME.'_theme_options');
	$Style = '';
	foreach( $FontSettings as $k => $v )
	{
		if( $i == 1 || $i == 5 )
		{
			$Style .= ( sh_set( $settings, $k )  ) ? $v .':'.sh_set( $settings, $k ) : '';
		}
		else
		{
			$Style .= ( sh_set( $settings, $k  )  ) ? $v.':'.sh_set( $settings, $k ).';': '';
		}
		$i++;
	}
	return ( !empty( $Style ) ) ? $StyleBefore.$Style.$StyleAfter: '';
}

function sh_theme_color_scheme( $cookie = false )
{
	$options = get_option(SH_NAME.'_theme_options');
	
	$selection = sh_set ($options, 'color_selection' );
	
	$styles = sh_set( $options, 'custom_color_scheme' );
	$predefined_color_scheme = sh_set($options, 'default_color_scheme');
	
	if( $predefined_color_scheme  && $selection == 'default' ) 
		echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/css/colors/'.$predefined_color_scheme.'.css" />';
		
	else if( $styles && $selection == 'custom' )
	{
		$_COOKIE['sh_color_scheme'] = isset( $_COOKIE['sh_color_scheme'] ) ? $_COOKIE['sh_color_scheme'] : $styles;
		$custom_style = ( $cookie && isset( $_COOKIE['sh_color_scheme'] ) ) ? $_COOKIE['sh_color_scheme'] : $styles;
	
		$content = @file_get_contents(get_template_directory_uri().'/css/color.css');
		
		if( $custom_style )
		{	
			$replace = str_replace('#ff304e', $custom_style, $content );
			$hex = $custom_style;
			list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
			$rgb = $r.', '.$g.', '.$b;
			$replace = str_replace('226, 58, 63', $rgb, $replace );		
			$replace = ( $custom_style ) ? $replace : $content ;
		}
		else
			$replace = $content;
		
		echo "\n".'<style type="text/css">';
		echo "\n".$replace;
		echo "\n".'</style>';
		echo "\n";
	}
}

// get template page url
function sah_tpl_page( $TEMPLATE_NAME )
{
	$url = "";
    $pages = query_posts(array(
         'post_type' =>'page',
         'meta_key'  =>'_wp_page_template',
         'meta_value'=> $TEMPLATE_NAME
     ));
	 if( $pages ):
		 $id = $pages[0]->ID;
		 $url = null;
		 if(isset($pages[0]))
		 {
			 $url = get_page_link($id);
		 }
	endif;
	wp_reset_query();
     return $url;
}

add_action('wp_ajax_sh_pagineation_masonery', 'sh_ajax_pagination_masonery');
add_action('wp_ajax_nopriv_sh_pagineation_masonery', 'sh_ajax_pagination_masonery');
function sh_ajax_pagination_masonery()
{
	if( isset( $_POST['action'] ) && $_POST['action'] == 'sh_pagination_masonery' )
	{
		$type = 'masnoery';
		include (get_template_directory().'/framework/modules/shortcodes/blog.php' );
	}
	exit;
}

function _WSH()
{
 return $GLOBALS['_sh_base'];
}
function sh_db_like_table()
{
	global $wpdb;
	$table_name = $wpdb->prefix . "like_dislike"; 
	$query = "CREATE TABLE IF NOT EXISTS $table_name (
				  `id` INT(11) NOT NULL AUTO_INCREMENT,
				  `id_item` INT(11) NOT NULL,
				  `ip` VARCHAR(25) NOT NULL,
				  `rate` INT(1) NOT NULL,
				  `dt_rated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
				  PRIMARY KEY (`id`)
				);";
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		$wpdb->query($query);
}