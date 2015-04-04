<?php
class SH_Shortcodes
{
    protected $keys;
    protected $toggle_count = 0;
    function __construct()
    {
        $GLOBALS['sh_toggle_count'] = 0;
            add_action('init', array( $this, 'add' ));
    }
	
	function add()
		{
		include (plugin_dir_path( __FILE__ ).'shortcodes_names.php');
	
		$this->keys = array_keys($options);
		foreach($this->keys as $k)
			{
			if (method_exists($this, $k)) add_shortcode('sh_' . $k, array(
				$this,	$k
			));
			}
		}
	
	function blog_carousel( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'cat'			=>	'',
							'sort_by' 		=> 	'date',
							'sorting_order' => 	'ASC',
						) , $atts
					)
				);
				
		$type = 'blog_carousel';
		include (get_template_directory().'/framework/modules/shortcodes/blog.php' );
		return $output;
	}
	
	function modern_carousel( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'cat'			=>	'',
							'sort_by' 		=> 	'date',
							'sorting_order' => 	'ASC',
						) , $atts
					)
				);
				
		$type = 'modern_carousel';
		include (get_template_directory().'/framework/modules/shortcodes/blog.php' );
		return $output;
	}
	
	function latest_posts( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'sort_by' 		=> 	'date',
							'sorting_order' => 	'ASC',
						) , $atts
					)
				);
				
		$type = 'latest_posts';
		include (get_template_directory().'/framework/modules/shortcodes/blog.php' );
		return $output;
	}
	
	function post_tabber( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'sort_by' 		=> 	'date',
							'sorting_order' => 	'ASC',
						) , $atts
					)
				);
				
		
		$type = 'post_tabber';
		include (get_template_directory().'/framework/modules/shortcodes/post_widgets.php' );
		return $output;
	}
	
	function masonary_blog( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'sort_by' 		=> 	'date',
							'sorting_order' => 	'ASC',
							'cols'			=>	''
						) , $atts
					)
				);
		$type = 'one_masnoery';
		include (get_template_directory().'/framework/modules/shortcodes/blog.php' );
		return $output;
	}
	
	function blog_slider( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'sort_by' 		=> 	'date',
							'sorting_order' => 	'ASC',
						) , $atts
					)
				);
				
		$args = array(
			'post_type' 		=> 	'post',
			'posts_per_page' 	=> 	$number,
			'sort_by' 			=> 	$sort_by,
			'order' 			=> 	$sorting_order,
		);
		$querys = new WP_Query( $args );
		$type = 'slider';
		include (get_template_directory().'/framework/modules/shortcodes/blog.php' );
		return $output;
	}
	
	function fancy_blog_list( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'sort_by' 		=> 	'date',
							'sorting_order' => 	'ASC',
						) , $atts
					)
				);
		global $wp_query;		
		$args = array(
			'post_type' 		=> 	'post',
			'posts_per_page' 	=> 	$number,
			'sort_by' 			=> 	$sort_by,
			'order' 			=> 	$sorting_order,
			'paged'				=> 	(isset($wp_query->query['paged'])) ? $wp_query->query['paged'] : 1,
		);
		$output = '';
		$querys = new WP_Query( $args );
		$type = 'fancy_blog_list';
		include (get_template_directory().'/framework/modules/shortcodes/blog.php' );
		return $output;
	}
	
	function fancy_blog_list_2( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'sort_by' 		=> 	'date',
							'sorting_order' => 	'ASC',
						) , $atts
					)
				);
		global $wp_query;		
		$args = array(
			'post_type' 		=> 	'post',
			'posts_per_page' 	=> 	$number,
			'sort_by' 			=> 	$sort_by,
			'order' 			=> 	$sorting_order,
			'paged'				=> 	(isset($wp_query->query['paged'])) ? $wp_query->query['paged'] : 1,
		);
		$output = '';
		$querys = new WP_Query( $args );
		$type = 'fancy_blog_list_2';
		include (get_template_directory().'/framework/modules/shortcodes/blog.php' );
		return $output;
	}
	
	function fancy_blog_list_3( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'sort_by' 		=> 	'date',
							'sorting_order' => 	'ASC',
						) , $atts
					)
				);
		global $wp_query;		
		$args = array(
			'post_type' 		=> 	'post',
			'posts_per_page' 	=> 	$number,
			'sort_by' 			=> 	$sort_by,
			'order' 			=> 	$sorting_order,
			'paged'				=> 	(isset($wp_query->query['paged'])) ? $wp_query->query['paged'] : 1,
		);
		$output = '';
		$querys = new WP_Query( $args );
		$type = 'fancy_blog_list_3';
		include (get_template_directory().'/framework/modules/shortcodes/blog.php' );
		return $output;
	}
	
	function fancy_blog_list_4( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'sort_by' 		=> 	'date',
							'sorting_order' => 	'ASC',
						) , $atts
					)
				);
		global $wp_query;		
		$args = array(
			'post_type' 		=> 	'post',
			'posts_per_page' 	=> 	$number,
			'sort_by' 			=> 	$sort_by,
			'order' 			=> 	$sorting_order,
			'paged'				=> 	(isset($wp_query->query['paged'])) ? $wp_query->query['paged'] : 1,
		);
		$output = '';
		$querys = new WP_Query( $args );
		$type = 'fancy_blog_list_4';
		include (get_template_directory().'/framework/modules/shortcodes/blog.php' );
		return $output;
	}
	
	function fancy_blog_list_5( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'sort_by' 		=> 	'date',
							'sorting_order' => 	'ASC',
						) , $atts
					)
				);
		global $wp_query;		
		$args = array(
			'post_type' 		=> 	'post',
			'posts_per_page' 	=> 	$number,
			'sort_by' 			=> 	$sort_by,
			'order' 			=> 	$sorting_order,
			'paged'				=> 	(isset($wp_query->query['paged'])) ? $wp_query->query['paged'] : 1,
		);
		$output = '';
		$querys = new WP_Query( $args );
		$type = 'fancy_blog_list_5';
		include (get_template_directory().'/framework/modules/shortcodes/blog.php' );
		return $output;
	}
	
	function fancy_blog_list_6( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'sort_by' 		=> 	'date',
							'sorting_order' => 	'ASC',
						) , $atts
					)
				);
		global $wp_query;		
		$args = array(
			'post_type' 		=> 	'post',
			'posts_per_page' 	=> 	$number,
			'sort_by' 			=> 	$sort_by,
			'order' 			=> 	$sorting_order,
			'paged'				=> 	(isset($wp_query->query['paged'])) ? $wp_query->query['paged'] : 1,
		);
		$output = '';
		$querys = new WP_Query( $args );
		$type = 'fancy_blog_list_6';
		include (get_template_directory().'/framework/modules/shortcodes/blog.php' );
		return $output;
	}
	
	function verticle_blog_style( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'sort_by' 		=> 	'date',
							'sorting_order' => 	'ASC',
							'cols'			=>	'',
						) , $atts
					)
				);
		$output = '';
		$type = 'verticle_blog_style';
		include ( get_template_directory().'/framework/modules/shortcodes/blog.php' );
		return $output;
	}
	
	function horizontal_blog_style( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'sort_by' 		=> 	'date',
							'sorting_order' => 	'ASC',
						) , $atts
					)
				);
		$output = '';
		$type = 'horizontal_blog_style';
		include ( get_template_directory().'/framework/modules/shortcodes/blog.php' );
		return $output;
	}
	
	function instagram_images( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'user' 			=> 	'',
							'num' 			=> 	9,
							'mode' 			=> 	'',
							'col_title'		=> 	'',
							'col_sub_title'	=> 	'',
							'heading' 		=> 	'',
							'back_ground'	=>	'',
						) , $atts
					)
				);
		$output = '';
		$type = 'instagram';
		include ( get_template_directory().'/framework/modules/shortcodes/instagram.php' );
		return $output;
	}
	
	function twitter_tweets( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'user' 			=> 	'',
							'num' 			=> 	3,
							'col_title'		=> 	'',
							'col_sub_title'	=> 	'',
							'heading' 		=> 	'',
							'back_ground'	=>	'',
						) , $atts
					)
				);
		ob_start();
	wp_enqueue_script(array('lodash'));
	
	?>
    <div class="twitter widget <?php echo $back_ground?>">
        <?php if($col_title){?>
            <h4 class="sidebar-title"><span><?php echo $col_sub_title?></span><i><?php echo $col_title?></i></h4>
        <?php } ?>
    	<div class="latest-tweets">
        	<ul id="tweet" class="tweets-slides"><li class="tweet-loader">Loading tweets...</li></ul>
    	</div>
    </div>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			var tweets = <?php echo get_most_recent( $user, $num, "true" )?>;
			display_tweets(tweets);
		});
	</script>
	<?php
	$tweets = ob_get_contents();
	ob_clean();
	return $tweets;
	}
	
	function tags_cloud( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'user' 			=> 	'',
							'col_title'		=> 	'',
							'col_sub_title'	=> 	'',
							'heading' 		=> 	'',
							'back_ground'	=>	'',
						) , $atts
					)
				);
		$args = array(
			'smallest'                  => 8, 
			'largest'                   => 22,
			'unit'                      => 'pt', 
			'number'                    => $user,  
			'format'                    => 'flat',
			'separator'                 => "\n",
			'orderby'                   => 'name', 
			'order'                     => 'ASC',
			'exclude'                   => null, 
			'include'                   => null, 
			'link'                      => 'view', 
			'taxonomy'                  => 'post_tag', 
			'echo'                      => true,
			'child_of'                  => null, // see Note!
		);
		ob_start();
		wp_tag_cloud( $args );
		$tags = ob_get_contents();
		ob_clean();
		$output = '';
		$output .= '<div class="tags widget '.$back_ground.'">';
        			if($col_title){
                		$output .= '<h4 class="sidebar-title"><span>'.$col_sub_title.'</span><i>'.$col_title.'</i></h4>';
            		}
			$output .= '<div class="tags-button">
							'.$tags.'
						</div>
					</div>';
		return $output;
	}
	
	function search_box( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'placeholder' 			=> 	'',
							'back_ground'			=>	'',
						) , $atts
					)
				);
		$output = '';
		$output .= '<div class="search widget '.$back_ground.'">
						<form method="get" action="'.home_url().'">
							<input name="s" type="text" placeholder="'.$placeholder.'" />
							<button type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>';
		return $output;
	}
	
	function social_media( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'num' 			=> 	5,
							'mode' 			=> 	'',
							'back_ground'	=>	'',
						) , $atts
					)
				);
		$output = '';
		$output .= '<div class="social-btns widget '.$back_ground.'">';
			$output .= '<ul>';
							if( $mode != 'blank' )
					  		{
						  		$output .= sh_socil_media_clr($num);
					  		}else{
						  		$output .= sh_socil_media_clr($num, '_blank');
					  		}
			$output .= '</ul>
					</div>';
		return $output;
	}
	
	function contect_box( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'email' 		=> 	'',
							'contact' 		=> 	'',
							'dob' 			=> 	'',
							'desc' 			=> 	'',
							'col_title'		=> 	'',
							'col_sub_title'	=> 	'',
							'heading' 		=> 	'',
							'back_ground'	=>	'',
						) , $atts
					)
				);
		$output = '';
		$output .= '<div class="contact-info widget '.$back_ground.'">';
        			if($col_title){
                		$output .= '<h4 class="sidebar-title"><span>'.$col_sub_title.'</span><i>'.$col_title.'</i></h4>';
            		}
			$output .= '<ul>';
							if($email)
							{
								$output .= '<li><i class="fa fa-envelope"></i> <strong>'.__( "Email:", SH_NAME ).'</strong> '.$email.'</li>';
							}
                			if($contact)
							{
								$output .= '<li><i class="fa fa-phone"></i> <strong>'.__( "Phone:", SH_NAME ).'</strong> '.$contact.'</li>';
							}
							if($dob)
							{
								$output .= '<li><i class="fa fa-clock-o"></i> <strong>'.__( "Date of Birth:", SH_NAME ).'</strong> '.$dob.'</li>';
							}
							if($desc)
							{
								$output .= '<li><i class="fa fa-home"></i> <strong>'.__( "Address:", SH_NAME ).'</strong> '.strip_tags($desc).'</li>';
							}
			$output .= '</ul>
					</div>';
		return $output;
	}
	
	function flicker_images( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'user' 			=> 	'',
							'num' 			=> 	9,
							'mode' 			=> 	'',
							'col_title'		=> 	'',
							'col_sub_title'	=> 	'',
							'heading' 		=> 	'',
							'back_ground'	=>	'',
						) , $atts
					)
				);
		ob_start();
		if( $mode == 'blank' ){ $mod_type = 'target="_blank"';}else{$mod_type = ''; } 
		?>
        <div class="flickr widget <?php echo $back_ground?>">
        	<?php if($col_title){?>
                <h4 class="sidebar-title"><span><?php echo $col_sub_title?></span><i><?php echo $col_title?></i></h4>
            <?php } ?>
            	<div class="row">
                	<div class="gallery-widget">
                   <script type="text/javascript">
                        jQuery(document).ready(function($) {
                         $('.gallery-widget').jflickrfeed({
                          limit: <?php echo $num;?> ,
                          qstrings: {id: '<?php echo $user; ?>'},
                          itemTemplate: '<div class="col-md-4"><a <?php echo $mod_type?> data-rel="prettyPhoto" href="{{link}}"><img src="{{image_s}}" alt="{{title}}" /></a></div>'
                         });
                        });
                   </script>
                </div>
			</div>
		</div>
        <?php
		$output = ob_get_contents();
		ob_clean();
		return $output;
	}
	
	function blog_post_image_carousel( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'cat'			=>	'',
							'sort_by' 		=> 	'date',
							'sorting_order' => 	'ASC',
							'col_title'		=> 	'',
							'col_sub_title'	=> 	'',
							'heading' 		=> 	'',
							'back_ground'	=>	'',
						) , $atts
					)
				);	
		$output = '';
		$type = 'blog_post_image_carousel';
		include ( get_template_directory().'/framework/modules/shortcodes/query_codes.php' );
		return $output;
	}
	
	function blog_testimonial( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'sort_by' 		=> 	'date',
							'sorting_order' => 	'ASC',
							'col_title'		=> 	'',
							'col_sub_title'	=> 	'',
							'heading' 		=> 	'',
							'back_ground'	=>	'',
						) , $atts
					)
				);	
		$output = '';
		$type = 'blog_testimonial';
		include ( get_template_directory().'/framework/modules/shortcodes/query_codes.php' );
		return $output;
	}
	
	function blog_post_single_image_carousel( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'cat'			=>	'',
							'sort_by' 		=> 	'date',
							'sorting_order' => 	'ASC',
							'col_title'		=> 	'',
							'col_sub_title'	=> 	'',
							'heading' 		=> 	'',
							'back_ground'	=>	'',
						) , $atts
					)
				);	
		$output = '';
		$type = 'blog_post_single_image_carousel';
		include ( get_template_directory().'/framework/modules/shortcodes/query_codes.php' );
		return $output;
	}
	
	function blog_latest_post_carousel( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'cat'			=>	'',
							'sort_by' 		=> 	'date',
							'sorting_order' => 	'ASC',
							'col_title'		=> 	'',
							'col_sub_title'	=> 	'',
							'heading' 		=> 	'',
							'back_ground'	=>	'',
						) , $atts
					)
				);	
		$output = '';
		$type = 'blog_latest_post_carousel';
		include ( get_template_directory().'/framework/modules/shortcodes/query_codes.php' );
		return $output;
	}
	
	function faqs( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'col_title'		=> 	'',
							'col_sub_title'	=> 	'',
							'heading' 		=> 	'',
							'back_ground'	=>	'',
						) , $atts
					)
				);	
		$output = '';
		$type = 'faqs';
		include ( get_template_directory().'/framework/modules/shortcodes/query_codes.php' );
		return $output;
	}
	
	function our_partners( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'col_title'		=> 	'',
							'col_sub_title'	=> 	'',
							'heading' 		=> 	'',
							'back_ground'	=>	'',
						) , $atts
					)
				);	
		$output = '';
		$type = 'our_partners';
		include ( get_template_directory().'/framework/modules/shortcodes/query_codes.php' );
		return $output;
	}
	
	function blog_latest_news_carousel( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	4,
							'cat'			=>	'',
							'sort_by' 		=> 	'date',
							'sorting_order' => 	'ASC',
							'col_title'		=> 	'',
							'col_sub_title'	=> 	'',
							'heading' 		=> 	'',
							'back_ground'	=>	'',
						) , $atts
					)
				);	
		$output = '';
		$type = 'blog_latest_news_carousel';
		include ( get_template_directory().'/framework/modules/shortcodes/query_codes.php' );
		return $output;
	}
	
	function blog_categories( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'post_count' 		=> 	'',
							'col_title'		=> 	'',
							'col_sub_title'	=> 	'',
							'heading' 		=> 	'',
							'back_ground'	=>	'',
						) , $atts
					)
				);	
		$output = '';
		$type = 'blog_categories';
		include ( get_template_directory().'/framework/modules/shortcodes/query_codes.php' );
		return $output;
	}
	
	function blog_creative_team( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	'',
							'col_title'		=> 	'',
							'col_sub_title'	=> 	'',
							'heading' 		=> 	'',
							'back_ground'	=>	'',
						) , $atts
					)
				);	
		$output = '';
		$type = 'blog_creative_team';
		include ( get_template_directory().'/framework/modules/shortcodes/query_codes.php' );
		return $output;
	}
	
	function featured_video_gallery( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'hover' 		=> 	'',
							'cat'			=> 	'',
							'sort_by'		=> 	'',
							'sorting_order'	=> 	'',
						) , $atts
					)
				);	
		$output = '';
		$type = 'featured_video_gallery';
		include ( get_template_directory().'/framework/modules/shortcodes/gallery.php' );
		return $output;
	}
	
	function boxed_video_gallery( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'hover' 		=> 	'',
							'number' 		=> 	'',
							'cat'			=> 	'',
							'sort_by'		=> 	'',
							'sorting_order'	=> 	'',
						) , $atts
					)
				);	
		$output = '';
		$type = 'boxed_video_gallery';
		include ( get_template_directory().'/framework/modules/shortcodes/gallery.php' );
		return $output;
	}
	
	function blog_single_post( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'blog_style' 	=> 	'',
							'number'		=>	'',
							'cat'			=> 	'',
							'sort_by'		=> 	'',
							'sorting_order'	=>	'',
						) , $atts
					)
				);	
		$output = '';
		$type = 'blog_single_post';
		include ( get_template_directory().'/framework/modules/shortcodes/blog_shortcodes.php' );
		return $output;
	}
	
	function blog_single_post_2( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'blog_style' 	=> 	'',
							'post_id' 		=> 	'',
						) , $atts
					)
				);	
		$output = '';
		$type = 'blog_single_post_2';
		include ( get_template_directory().'/framework/modules/shortcodes/blog_shortcodes.php' );
		return $output;
	}
	
	function blog_single_gallery( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'post_id' 		=> 	'',
							'hover' 		=> 	'',
						) , $atts
					)
				);	
		$output = '';
		$type = 'blog_single_gallery';
		include ( get_template_directory().'/framework/modules/shortcodes/gallery.php' );
		return $output;
	}
	
	function blog_gallery_style_3( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	'',
							'cat' 			=> 	'',
							'sort_by'		=>	'',
							'sorting_order'	=>	'',
						) , $atts
					)
				);	
		$output = '';
		$type = 'blog_gallery_style_3';
		include ( get_template_directory().'/framework/modules/shortcodes/gallery.php' );
		return $output;
	}
	
	function blog_gallery_style_4( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	'',
							'cat' 			=> 	'',
							'sort_by'		=>	'',
							'sorting_order'	=>	'',
						) , $atts
					)
				);	
		$output = '';
		$type = 'blog_gallery_style_4';
		include ( get_template_directory().'/framework/modules/shortcodes/gallery.php' );
		return $output;
	}
	
	function blog_gallery_style_5( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	'',
							'cat' 			=> 	'',
							'sort_by'		=>	'',
							'sorting_order'	=>	'',
						) , $atts
					)
				);	
		$output = '';
		$type = 'blog_gallery_style_5';
		include ( get_template_directory().'/framework/modules/shortcodes/gallery.php' );
		return $output;
	}
	
	function blog_gallery_style_6( $atts, $content = null )
	{
		extract( shortcode_atts( array(
							'number' 		=> 	'',
							'cat' 			=> 	'',
							'sort_by'		=>	'',
							'sorting_order'	=>	'',
						) , $atts
					)
				);	
		$output = '';
		$type = 'blog_gallery_style_6';
		include ( get_template_directory().'/framework/modules/shortcodes/gallery.php' );
		return $output;
	}
}
