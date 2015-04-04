<?php
define('DOMAIN' , 'webinane_personal');
define('SH_NAME', 'webinane_personal');
define('SH_VERSION', 'v1.2.2');
define('SH_ROOT', get_template_directory().'/');
define('SH_URL', get_template_directory_uri().'/');
define( 'VM', SH_ROOT.'images/vc/' );
define( 'SHRT', SH_ROOT.'framework/modules/shortcodes/formats/' );
define('SH_LANG_DIR', SH_ROOT . 'languages');
get_template_part('framework/loader');

add_action('after_setup_theme', 'sh_theme_setup');
include('framework/modules/gallery/gallery.php');

if(!function_exists('get_the_permalink')){

	function get_the_permalink(){
		global $post;
		return get_permalink($post->ID);
	}

}





function sh_theme_localized($locale)
{
	$options = get_option(SH_NAME.'_theme_options');
	$lang = sh_set( $options, 'sh_localize' );
	$locale = (sh_set( $options, 'sh_localize' )) ? sh_set( $options, 'sh_localize' ) : $locale;
	if ( isset( $_GET['l'] ) )
	{
		return esc_attr( $_GET['l'] );
	}
		return $locale;
}
add_filter( 'locale', 'sh_theme_localized', 10 );


function sh_theme_setup()
{
	global $wp_version;
	load_theme_textdomain(SH_NAME, get_template_directory() . '/languages');
	add_editor_style();
	sh_db_like_table();
	//ADD THUMBNAIL SUPPORT
	add_theme_support('post-thumbnails');
	add_theme_support('menus'); //Add menu support
	add_theme_support('automatic-feed-links'); //Enables post and comment RSS feed links to head.
	add_theme_support('widgets'); //Add widgets and sidebar support
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery', 'chat'
	) );
	/** Register wp_nav_menus */
	if(function_exists('register_nav_menu'))
	{
		register_nav_menus(
			array(
				/** Register Main Menu location header */
				'main_menu' => __('Main Menu', SH_NAME),
				'top_menu' => __('Top Menu', SH_NAME),
			)
		);
	}
	
	if ( ! isset( $content_width ) ) $content_width = 960;
	
	add_image_size( '460x399', 460, 399, true );
	add_image_size( '770x418', 770, 418, true );
	add_image_size( '370x216', 370, 216, true );
	add_image_size( '180x180', 180, 180, true );
	add_image_size( '370x439', 370, 439, true );
	add_image_size( '770x216', 770, 216, true );
	add_image_size( '270x188', 270, 188, true );
}

function sh_widget_init()
{
	
	register_widget("sh_footer_about");
	register_widget("sh_recent_blog");
	register_widget("sh_search_box");
	register_widget("sh_contact_info");
	register_widget("SH_Flickr");
	register_widget("sh_post_image_carousel");
	register_widget("sh_testimonial");
	register_widget("sh_post_single_image_carousel");
	register_widget("sh_latest_post_carousel");
	register_widget("sh_faqs");
	register_widget("sh_our_partners");
	register_widget("sh_latest_news_carousel");
	register_widget("sh_categories");
	register_widget("sh_creative_team_carousel");
	register_widget("sh_social_media");
	register_widget("sh_tags");
	register_widget("sh_twitter_tweets");
	register_widget("sh_instagram");
	register_widget("sh_post_tabber");
	register_widget("sh_author_profile");
	register_widget("sh_author_single_profile");
        register_widget("sh_google_ads_box");
	
	global $wp_registered_sidebars;
	
	register_sidebar(array(
	  'name' => __( 'Default Sidebar', SH_NAME ),
	  'id' => 'default-sidebar',
	  'description' => __( 'Widgets in this area will be shown on the right-hand side.', SH_NAME ),
	  'class'=>'',
	  'before_widget'=>'<div class="widget">',
	  'after_widget'=>'</div>',
	  'before_title' => '<h4>',
	  'after_title' => '</h4>'
	));
	
	register_sidebar(array(
	  'name' => __( 'Blog Listing', SH_NAME ),
	  'id' => 'blog-sidebar',
	  'description' => __( 'Widgets in this area will be shown on the right-hand side.', SH_NAME ),
	  'class'=>'',
	  'before_widget'=>'<div class="widget">',
	  'after_widget'=>'</div>',
	  'before_title' => '<h4>',
	  'after_title' => '</h4>'
	));
	
	register_sidebar(array(
	  'name' => __( 'Footer Widget', SH_NAME ),
	  'id' => 'footer-widget',
	  'description' => __( 'Widgets in this area will be shown on the footer area.', SH_NAME ),
	  'class'=>'',
	  'before_widget'=>'<div class="col-md-4">',
	  'after_widget'=>'</div>',
	  'before_title' => '<h3>',
	  'after_title' => '</h3>'
	));
	
	$sidebars = sh_set( sh_set( get_option(SH_NAME.'_theme_options' ), 'dynamic_sidebar' ) , 'dynamic_sidebar' ); 
	foreach( array_filter( (array)$sidebars) as $sidebar )
	{
		if( sh_set($sidebar , 'topcopy') ) break ;
		$slug = bistro_slug( $sidebar ) ;
		
		register_sidebar( array(
			'name' => sh_set($sidebar , 'sidebar_name'),
			'id' =>  sh_set($slug , 'sidebar_name') ,
			'before_widget' => '<div class="widget">',
			'after_widget' => "</div>",
			'before_title' => '<h4>',
			'after_title' => '</h4>',
		) );		
	}
	
	update_option('wp_registered_sidebars' , $wp_registered_sidebars) ;
}
add_action( 'widgets_init', 'sh_widget_init' );

function sh_get_terms( $arg )
{	
	$tax_terms = get_terms( sh_set( $arg, 'type' ) );
	$terms = '';
	if( !sh_set( $tax_terms, 'errors' ) )
	{
		foreach ( $tax_terms as $tax_term ) 
		{		
			$terms .= '<a href="'.get_term_link( $tax_term, sh_set( $arg, 'type' ) ).'" title="'.sprintf( __( "View all posts in %s", SH_NAME ), $tax_term->name).'"'.'>'. $tax_term->name.'</a>, ';		
		}
	}
	
	return $terms;
}
function sh_get_pages()
{
	$wp_pages = get_pages();
	$result = array();
	foreach ( $wp_pages as $page )
	{
		$result[$page->ID] = $page->post_title;
	}
	return $result;
}
add_filter('admin_init', 'sh_keywords_fields', 99);
 
function sh_keywords_fields()
{
    register_setting('general', 'sh_keywords', 'esc_attr');
    add_settings_field('sh_keywords', '<label for="sh_keywords">'.__('Keywords' , 'sh_keywords' ).'</label>' , 'sh_keywords_fields_html', 'general');
}
 
function sh_keywords_fields_html()
{
    $value = get_option( 'sh_keywords', '' );
    echo '<input type="text" class="regular-text" id="sh_keywords" name="sh_keywords" value="' . $value . '" />';
}

function sh_post_view( $postid )
{
    $count_key = 'sh_post_views_count';
    $count = get_post_meta( $postid, $count_key, true );
	$count++;
	update_post_meta( $postid, $count_key, $count );
}

function sh_get_post_view( $postid )
{
    $count_key = 'sh_post_views_count';
    $count = get_post_meta( $postid, $count_key, true );
	if($count){
	}else
		return 0;
	{
		return $count;
	}
}

function sh_socil_media( $title, $link, $excerpt)
{
    $output = '<li><a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u='. urlencode($link).'&amp;display=popup" title=""><i class="fa fa-facebook"></i></a></li>
    <li><a target="_blank" href="https://twitter.com/intent/tweet?text='.urlencode($title).'&amp;url='.urlencode($link).'"><i class="fa fa-twitter"></i></a></li>
   <li> <a target="_blank" href="https://plus.google.com/share?url='.urlencode($link).'&amp;t='.urlencode($title).'"><i class="fa fa-google-plus"></i></a></li>
     <li><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.urlencode($link).'&amp;title='.urlencode($title).'&amp;ro=false&amp;summary='.urlencode($excerpt).'&amp;source=" title=""><i class="fa fa-linkedin"></i></a></li>';
	return $output;
}

function sh_socil_media_clr( $num = 4, $target = '' )
{
	$output = '';
	$opt = get_option(SH_NAME.'_theme_options');
	foreach( (array)sh_set( $opt, 'social_media') as $social ):
		if( $social ):
			array_pop($social);
			$counter = 0;
			foreach( $social as $social ):
				if( $counter == $num ): break; endif;
				$output .='<li><a ';
				if( $target )$output .= 'target="$target"'; 
				$output .=' href="'.sh_set( $social, 'social_link' ).'" title=""><i';
				if( sh_set( $social, 'icon_color_scheme' ) !='' ): $output .= ' style="background-color:'.sh_set( $social, 'icon_color_scheme' ).'"'; endif;
				$output .= ' class="'.sh_set( $social, 'social_icon' ).'"></i></a></li>';
				$counter++;
			endforeach;
		endif;
	endforeach;
	return $output;
}

function sh_socil_media_sim( $num = 4 )
{
	$output = '';
	$opt = get_option(SH_NAME.'_theme_options');
	foreach( (array)sh_set( $opt, 'social_media') as $social ):
		if( $social ):
			array_pop($social);
			$counter = 0;
			foreach( $social as $social ):
				if( $counter == $num ): break; endif;
				$output .='<li><a href="'.sh_set( $social, 'social_link' ).'" title=""><i class="'.sh_set( $social, 'social_icon' ).'"></i></a></li>';
				$counter++;
			endforeach;
		endif;
	endforeach;
	return $output;
}

function sh_get_cats()
{
	$categories = get_the_category();
	$separator = ', ';
	$output = '';
	if( $categories )
	{
		foreach( $categories as $category )
		{
			$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", SH_NAME ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
		}
	}
	echo trim( $output, $separator );
}

function sh_get_comment()
{
	$num_comments = get_comments_number(); // get_comments_number returns only a numeric value
	if ( comments_open() )
	{
		if ( $num_comments == 0 )
		{
			$comments = __('No Comments', SH_NAME);
		} elseif ( $num_comments > 1 )
		{
			$comments = $num_comments . __(' Comments', SH_NAME);
		} else {
			$comments = __('1 Comment', SH_NAME);
		}
		$write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
	} else {
		$write_comments =  __('Comments are off for this post.', SH_NAME);
	}
	return $write_comments;
}

function sh_custom_header()
{
	$settings = get_option( SH_NAME . '_theme_options' );
	$HeaderName = ( sh_set( $settings , 'custom_header' ) !== 'dafault' ) ? sh_set($settings , 'custom_header'): 'black_header';
	get_header( $HeaderName );
}

add_action('wp_ajax_theme-install-demo-data', 'theme_ajax_install_dummy_data');
function theme_ajax_install_dummy_data(){
	require_once('framework/helpers/importer.php');
	sh_xml_importer();
  	die();
}

remove_filter('nav_menu_description', 'strip_tags');
add_filter( 'wp_setup_nav_menu_item', 'cus_wp_setup_nav_menu_item' );
function cus_wp_setup_nav_menu_item($menu_item) {
                $menu_item->description = apply_filters('nav_menu_description',  $menu_item->post_content );
                return $menu_item;
}

function scrape_instagram( $username, $slice = 9 )
{
	if ( false === ( $instagram = get_transient( 'instagram-media-'.sanitize_title_with_dashes( $username ) ) ) )
	{
		$remote = wp_remote_get( 'http://instagram.com/'.trim( $username ) );
		if ( is_wp_error( $remote ) )
			return new WP_Error( 'site_down', __('Unable to communicate with Instagram.', SH_NAME ) );
			
		if ( 200 != wp_remote_retrieve_response_code( $remote ) )
			return new WP_Error( 'invalid_response', __( 'Instagram did not return a 200.', SH_NAME ) );

		$shards = explode('window._sharedData = ', $remote['body']);
		$insta_json = explode(';</script>', $shards[1]);
		$insta_array = json_decode($insta_json[0], TRUE);

		if ( !$insta_array )
			return new WP_Error('bad_json', __('Instagram has returned invalid data.', SH_NAME));

		$images = $insta_array['entry_data']['UserProfile'][0]['userMedia'];
		
		$instagram = array();

		foreach ($images as $image) {
			
			if ($image['user']['username'] == $username) {

				$image['link']                          = preg_replace( "/^http:/i", "", $image['link'] );
				$image['images']['thumbnail']           = preg_replace( "/^http:/i", "", $image['images']['thumbnail'] );
				$image['images']['standard_resolution'] = preg_replace( "/^http:/i", "", $image['images']['standard_resolution'] );

				$instagram[] = array(
					'description'   => $image['caption']['text'],
					'link'          => $image['link'],
					'time'          => $image['created_time'],
					'comments'      => $image['comments']['count'],
					'likes'         => $image['likes']['count'],
					'thumbnail'     => $image['images']['thumbnail'],
					'large'         => $image['images']['standard_resolution'],
					'type'          => $image['type']
				);
			}
		}

		$instagram = base64_encode( serialize( $instagram ) );
		set_transient( 'instagram-media-'.sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS*2 ) );
	}

	$instagram = unserialize( base64_decode( $instagram ) );
	return array_slice( $instagram, 0, $slice );
}

function sh_the_pagination($args = array(), $echo = 1)
{
	
	global $wp_query;
	
	$default =  array('base' => str_replace( 99999, '%#%', esc_url( get_pagenum_link( 99999 ) ) ), 'format' => '?paged=%#%', 'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages, 'next_text' => __('<i class="fa fa-angle-right"></i>', SH_NAME), 'prev_text' => __('<i class="fa fa-angle-left"></i>', SH_NAME), 'type'=>'list');
						
	$args = wp_parse_args($args, $default);		?>
	<?php	
	
	$pagination = '<div class="pagination-area">'.paginate_links($args).'</div>';
	$pagination =  str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $pagination );
	
	if(paginate_links(array_merge(array('type'=>'array'),$args)))
	{
		if($echo) echo $pagination;
		return $pagination;
	}
}

function sh_related_posts()
{
	$args = array(
			'post_type' => 'post',
			'posts_per_page' => 6,
			'orderby' => 'rand', 
	);
	query_posts($args);
	while( have_posts() ): the_post();
		if( has_post_thumbnail() ):
			echo '<li>
					<span>'.get_the_post_thumbnail( get_the_ID(), array(370,321) ).'</span>
					<a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a>
				</li>';
		endif;
	endwhile;
	wp_reset_query();
}

add_filter( 'wp_title', 'sh_filter_wp_title' );
/**
 * Filters the page title appropriately depending on the current page
 *
 * This function is attached to the 'wp_title' fiilter hook.
 *
 * @uses	get_bloginfo()
 * @uses	is_home()
 * @uses	is_front_page()
 */
function sh_filter_wp_title( $title ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	$site_description = get_bloginfo( 'description' );

	$filtered_title = $title . get_bloginfo( 'name' );
	$filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
	$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s', SH_NAME ), max( $paged, $page ) ) : '';

	return $filtered_title;
}
function get_most_recent( $screen_name, $count, $retweets )
{
	//codebird is going to be doing the oauth lifting for us
	$options = get_option( SH_NAME.'_theme_options' );
	if( sh_set( $options, 'twitter_api' ) )
	{
		require_once('framework/helpers/codebird.php');
		
		//These are your keys/tokens/secrets provided by Twitter
		$CONSUMER_KEY = sh_set( $options, 'twitter_api' );
		$CONSUMER_SECRET = sh_set( $options, 'twitter_api_secret' );
		$ACCESS_TOKEN = sh_set( $options, 'twitter_token' );
		$ACCESS_TOKEN_SECRET = sh_set( $options, 'twitter_token_Secret' );
	 
		//Get authenticated
		SH_Codebird::setConsumerKey($CONSUMER_KEY, $CONSUMER_SECRET);
		 
		$cb = SH_Codebird::getInstance();
		$cb->setToken($ACCESS_TOKEN, $ACCESS_TOKEN_SECRET);
		//These are our params passed in for our request to twitter
		//The GET request is made by our codebird instance for us further down
		$params = array(
			'screen_name' => $screen_name,
			'count' => $count,
			'include_rts' => $retweets,
		);
		//tweets returned by Twitter in JSON object format
		$tweets = (array) $cb->statuses_userTimeline($params);
		 
		 //printr($tweets);
		//Let's encode it for our JS/jQuery and return it
		return json_encode($tweets);
	}
}

function sh_search_filter( $query )
{
	if ( !$query->is_admin && $query->is_search)
	{
		$query->set('post_type', array( 'post', 'blog_profile', 'blog_testimonials' ) );
	}
	return $query;
}

add_filter( 'pre_get_posts', 'sh_search_filter' );

function sh_new_excerpt_more( $more ) {
	return '&nbsp;...';
}
add_filter('excerpt_more', 'sh_new_excerpt_more');

function sh_custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'sh_custom_excerpt_length', 999 );

function sh_remove_style( $handl )
{
	wp_dequeue_style( array( $handl ) );
	wp_deregister_style( array( $handl ) );
}
add_action( 'wp_print_styles', 'sh_remove_style', 99999 );


$opt = get_option( SH_NAME . '_theme_options' );
if( sh_set( $opt, 'home_page' ) == 1 )
{
	if( sh_set( $opt, 'profile_post' ) && sh_set( $opt, 'profile_post' ) != 'note' )
	{
		function sh_set_home_page ( $query ) 
		{
			$opt = get_option( SH_NAME . '_theme_options' );
			$post = sh_set( $opt, 'profile_post');
			if ( $query->is_home() || !$query->is_main_query() ) return;			
			$args = array( 'posts_per_page' => 1, 'ignore_sticky_posts' => false, 'post_type' => 'blog_profile', 'p' => $post );
			$query->init();
			$query->parse_query( $args );
		}
		add_action( 'pre_get_posts' , 'sh_set_home_page' );
	}
}

function sh_responsive_menu()
{
	$settings = get_option( SH_NAME . '_theme_options' );
	?>
    <div class="responsive-header">
    	<div class="responsive-logo">
			<?php $Logo = '<img src="' . sh_set( $settings, 'logo_image' ) . '" alt="" />'; ?>
			<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php echo $Logo; ?></a>
		</div>
		<span><i class="fa fa-align-justify"></i></span>
        <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'menu_class' => '', 'container'=>null, 'fallback_cb' => false, 'walker' => '' ) ); ?>
    </div>
    <?php
}

function sh_cus_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt).'...';
  } else {
	$excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

function sh_get_posts()
{
	$args = array(
				'post_type'			=>	'blog_profile',
				'posts_per_page'	=>	-1,
		);
		query_posts( $args );
		$title = array();
		while( have_posts() ): the_post();
			$title[get_the_id()] = get_the_title();
		endwhile; wp_reset_query();
		return $title;
}

function sh_the_tags( $ID, $c = 5 )
{
	$counter = 0;
	$posttags = get_the_tags( $ID );
	$tag_array = '';
	if ( $posttags )
	{
	  foreach( $posttags as $tag )
	  {
		  if( $c == $counter ) break;
		$tag_array .= '<a href="'.get_tag_link( $tag->term_id ).'">'.$tag->name.'</a>'; 
		$counter++;
	  }
	}
	return $tag_array;
}

function sh_get_posts_custom( $post_name )
{
	$args=array(
	  'post_type' => $post_name,
	  'post_status' => 'publish',
	  'posts_per_page' => -1,
	);
	
	$result = array();
	$my_query = null;
	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) 
	{
		  foreach( $my_query->posts as $key => $value ):
			$result[$value->ID] = $value->post_title;
		  endforeach;
	}
	return $result;
	wp_reset_query();
}

function sh_get_term( $limit, $sep = '', $taxonomy, $id )
{
	$counter = 0;
	$terms = get_the_terms( $id, $taxonomy );
	if ( $terms && ! is_wp_error($terms) && $terms != '' ) :
		$term_slugs_arr = array();
		foreach ( $terms as $term )
		{
			if( $counter == $limit ) break;
			$term_slugs_arr[] = '<a href="'.get_term_link( $term->slug, $taxonomy ).'" title="">'.$term->slug.'<a>';
		}
		$terms_slug_str = join( $sep, $term_slugs_arr);
		echo $terms_slug_str;
	endif;
}

function sh_check_post_like( $pageID )
{
	global $wpdb;
	$prefix 	= 	$wpdb->prefix;
	$user_ip 	= 	sh_set( $_SERVER, 'REMOTE_ADDR' );
	$table 		=	$prefix.'like_dislike';
	$pageID		=	$pageID;	
	$like_sql = $wpdb->get_results('SELECT COUNT(*) FROM  '.$table.' WHERE ip = "'.$user_ip.'" and id_item = "'.$pageID.'" and rate = 1 ');
	$like_sql = sh_set( sh_set( $like_sql, '0' ), 'COUNT(*)' );
	if( $like_sql > 0 )
	{
		return ' active';
	}
}

function sh_post_counter( $pageID )
{
	global $wpdb;
	$prefix 	= 	$wpdb->prefix;
	$table 		=	$prefix.'like_dislike';
	$pageID		=	$pageID;	
	$like_sql = $wpdb->get_results('SELECT COUNT(*) FROM  '.$table.' WHERE id_item = "'.$pageID.'" and rate = 1');
	$like_sql = sh_set( sh_set( $like_sql, '0' ), 'COUNT(*)' );
	if( $like_sql )
	{
		return $like_sql;
	}else{
		return $like_sql;
	}
}

function sh_like()
{
	if( sh_set( $_POST, 'action' ) && sh_set( $_POST, 'action' ) == 'sh_like' )
	{
		global $wpdb;
		$prefix 	= 	$wpdb->prefix;
		$table 		=	$prefix.'like_dislike'; 
		$user_ip 	= 	sh_set( $_SERVER, 'REMOTE_ADDR' );	
		$pageID		=	sh_set( $_POST, 'postid' );	
		
		$dislike_sql = $wpdb->get_results('SELECT COUNT(*) FROM  '.$table.' WHERE ip = "'.$user_ip.'" and id_item = "'.$pageID.'" and rate = 2 ');
		$dislike_count = sh_set( sh_set( $dislike_sql, '0' ), 'COUNT(*)' ); 
		
		$like_sql = $wpdb->get_results('SELECT COUNT(*) FROM  '.$table.' WHERE ip = "'.$user_ip.'" and id_item = "'.$pageID.'" and rate = 1 ');
		$like_sql = sh_set( sh_set( $like_sql, '0' ), 'COUNT(*)' );
		
		if( sh_set( $_POST, 'action' ) == 'sh_like' ):
		
			if(( $like_sql == 0 ) && ( $dislike_count == 0 ) )
			{
				$wpdb->query('INSERT INTO '.$table.' (id_item, ip, rate )VALUES("'.$pageID.'", "'.$user_ip.'", "1")');
				echo sh_post_counter( $pageID );
			}
			if($dislike_count == 1){
				$wpdb->query('UPDATE '.$table.' SET rate = 1 WHERE id_item = '.$pageID.' and ip ="'.$user_ip.'"');
				echo sh_post_counter( $pageID );
			}
		endif;
		exit;
	}
}
add_action( 'wp_ajax_sh_like', 'sh_like' );
add_action( 'wp_ajax_nopriv_sh_like', 'sh_like' );

function sh_dis_like()
{
	if( sh_set( $_POST, 'action' ) && sh_set( $_POST, 'action' ) == 'sh_dis_like' )
	{
		global $wpdb;
		$prefix 	= 	$wpdb->prefix;
		$table 		=	$prefix.'like_dislike'; 
		$user_ip 	= 	sh_set( $_SERVER, 'REMOTE_ADDR' );	
		$pageID		=	sh_set( $_POST, 'postid' );	
		
		$dislike_sql = $wpdb->get_results('SELECT COUNT(*) FROM  '.$table.' WHERE ip = "'.$user_ip.'" and id_item = "'.$pageID.'" and rate = 2 ');
		$dislike_count = sh_set( sh_set( $dislike_sql, '0' ), 'COUNT(*)' ); 
		
		$like_sql = $wpdb->get_results('SELECT COUNT(*) FROM  '.$table.' WHERE ip = "'.$user_ip.'" and id_item = "'.$pageID.'" and rate = 1 ');
		$like_sql = sh_set( sh_set( $like_sql, '0' ), 'COUNT(*)' );
		
		if( sh_set( $_POST, 'action' ) == 'sh_dis_like'):
			if(($like_sql == 0) && ($dislike_count == 0)){
				$wpdb->query('INSERT INTO '.$table.' (id_item, ip, rate )VALUES("'.$pageID.'", "'.$user_ip.'", "2")');
				echo sh_post_counter( $pageID );
			}
			if($like_sql == 1){
				$wpdb->query('UPDATE '.$table.' SET rate = 2 WHERE id_item = '.$pageID.' and ip ="'.$user_ip.'"');
				echo sh_post_counter( $pageID );
			}
		endif;
		exit;
	}
}
add_action( 'wp_ajax_sh_dis_like', 'sh_dis_like' );
add_action( 'wp_ajax_nopriv_sh_dis_like', 'sh_dis_like' );

$page = sh_set( $_GET, 'page' );
/*
if( $page = 'webinane_personal_option' )
{
	echo '<div class="overlay"></div>
	<div id="upload-wrapper" style="display: none">
	  <div align="center"> <span class="close">X</span>
		<h3>
		 '. __( 'Upload Language File', SH_NAME ).'
		</h3>
		<span class="">
			'.__( 'Type allowed: .mo. | Maximum Size 5 MB', SH_NAME ).'
		</span>
		<div id="sh_language_uploader">
		<form action="'. SH_URL .'/framework/modules/processupload.php" onSubmit="return false" method="post" enctype="multipart/form-data" id="MyUploadForm">
		  <input name="lang_file" id="language_input" type="file" />
		  <input type="submit"  id="submit-btn" value="Upload" />
		  <img src="<?php echo SH_URL?>images/ajaxloader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
		</form>
		<div id="progressbox" style="display:none;"><div id="progressbar"></div><div id="statustxt">0%</div></div>
		<div id="output"></div>  
		</div>
	  </div>	  
	</div>';
}
*/
?>