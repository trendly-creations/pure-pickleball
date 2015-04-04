<?php if (!defined('ABSPATH')) exit('restricted access');


class SH_Gallery
{
    private $baseurl 		= '';
    private $path 			= '';
    private $text_domain 	= SH_NAME;

    function __construct()
    {
        $this->baseurl = get_template_directory_uri() . '/framework/modules/gallery/';
        $this->path = get_template_directory() . '/framework/modules/gallery/';	   
        add_action( 'admin_print_scripts-post-new.php', array( $this, 'admin_script' ), 11 );
        add_action( 'admin_print_scripts-post.php', array( $this, 'admin_script' ), 11 );
        add_action( 'admin_print_styles-post-new.php', array( $this, 'admin_style' ), 11 );
        add_action( 'admin_print_styles-post.php', array( $this, 'admin_style' ), 11 );
        add_action( 'wp_ajax_webinane_gallery', array( $this, 'get_attachments' ) );
        add_action( 'add_meta_boxes', array( $this, 'sh_metaboxes') );
        add_action( 'publish_webinane_galleries', array( $this, 'save_post' ) );
        add_filter( 'manage_edit-webinane_galleries_columns', array( $this, 'head_only_gallery' ), 10 );
        add_action( 'manage_webinane_galleries_posts_custom_column', array( $this, 'content_only_gallery' ), 10, 2 );
        //add_shortcode( 'webinane_gallery', array($this, 'webinane_gallery_shortcode' ) );
    }
	
    /*function webinane_gallery_shortcode( $atts, $content = null )
    {
        extract( shortcode_atts(array(
							'id' 		=> 0,
							'per_page'	=> 0,
							'container' => 'ul'
					),
			$atts)
		);
		
        ob_start();
        $this->gallery_html( array( 'post_id' => $id, 'images_per_page' => $per_page, 'container' => $container ) );
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }*/
	
	function gallery_html( $arg )
	{
		global $wp_query;
		$t = $GLOBALS['webinane_gal'];
		$span_array = array( '2'=>'span6', '3'=>'span4', '4'=>'span3' );
		$gal = $t->gallery_array( sh_set( $arg, 'post_id' ), 'gallery-thumb' );
		?>
         <div class="gallery">
            <div id="gallery" class="gallery-grid col-<?php echo sh_set($settings, 'gallery_layout' ); ?>">
              <?php foreach( $gal as $g ): ?>              
              	<div class="col">               
                    <div class="image"> 
                    	<a title="gallery image" data-rel="prettyPhoto[gallery1]" href="<?php echo sh_set($g, 'url'); ?>"> 
                        	<img alt="thumb" src="<?php echo sh_set($g, 'thumb'); ?>"> 
                        </a> 
                    </div>               
                </div>
            <?php endforeach; ?>
            </div>
        	<div id="pagination" class="pagination"></div>
       	</div>
        <?php
	}

    function head_only_gallery($default)
    {
        unset($default['date']);

        $default['gallery_image'] = __('Images and Videos', SH_NAME);
        $default['author'] = __('Author', SH_NAME);
        $default['date'] = __('Date', SH_NAME);

        return $default;
    }

    function content_only_gallery($column_name, $post_ID)
    {
        if ($column_name == 'webinane_gallery') {
            $terms = get_the_term_list($post_ID, 'webinane_gallery', '', ',', '');
            if (is_string($terms)) echo $terms;
            else _e('Unable to get category', SH_NAME);

        } elseif ($column_name == 'gallery_image')
            echo array_sum((array)get_post_meta($post_ID, 'webinane_gallery_count', true));
    }


    function save_post($post_id)
    {
        global $post;
        if ( defined('DOING_AUTOSAVE' ) && DOING_AUTOSAVE) return;
        $post_id = is_int( $post_id ) ? $post_id : $post->ID;
        $nonce = isset( $_POST['webinane_gallery_content_nonce'] ) ? $_POST['webinane_gallery_content_nonce'] : '';
        if ( !current_user_can( 'edit_page', $post_id ) ) return;
        elseif (!wp_verify_nonce($nonce, plugin_basename($this->path))) return;
		
        $count = array();

        /** Store Videos */
        if (isset( $_POST['videos'] ) )
		{
            $videos = array_reverse( $_POST['videos'] );
            $count['videos'] = count($videos);
            update_post_meta( $post_id, 'webinane_videos', $videos );
        }

        /** Store Gallery */
        if ( isset( $_POST['gallery'] ) )
		{
            $count['images'] = count( $_POST['gallery'] );
            update_post_meta( $post_id, 'webinane_gallery', (array)$_POST['gallery'] );
        }

        update_post_meta( $post_id, 'webinane_gallery_count', $count );
    }

    function get_attachments()
    {
        if ( empty($_POST['ids']  )) return;
        $ids = explode(',', $_POST['ids']);

        $attachments = get_posts(array('posts_per_page' => -1, 'post_type' => 'attachment', 'post__in' => $ids, 'orderby' => 'none')); //print_r($attachments);
        $response = array_flip($ids);

        foreach ($attachments as $attachment) {
            $thumbnail = current((array)wp_get_attachment_image_src($attachment->ID));
            $response[$attachment->ID] = array('id' => $attachment->ID, 'alt' => $attachment->post_title, 'caption' => $attachment->post_excerpt, 'img' => $thumbnail);
        }

        $response = array_reverse($response);
        exit(json_encode($response));
    }


    function sh_metaboxes()
    {
        /** Use metabox on gallery page only */
        if ('webinane_galleries' != $GLOBALS['post_type']) return;
		
        //add_meta_box('the_shortcode', __('Shortcode', SH_NAME), array($this, 'shortcode'), 'webinane_galleries', 'side', 'high');
        add_meta_box('the_image_uploader', __('Upload Images', SH_NAME), array($this, 'upload_images'), 'webinane_galleries', 'advanced', 'core');
        add_meta_box('the_video_uploader', __('Upload Videos', SH_NAME), array($this, 'upload_Videos'), 'webinane_galleries', 'advanced', 'core');
    }

    function shortcode()
    {
        echo '[webinane_gallery id="' . get_the_ID() . '"]';
    }

    function upload_images()
    {
        include($this->path . 'views/upload_images.php');
    }


    function upload_videos()
    {
        include($this->path . 'views/upload_videos.php');
    }

    function admin_style()
    {

        if ('webinane_galleries' != $GLOBALS['post_type']) return;

        wp_enqueue_style("wp-jquery-ui-dialog");
        wp_enqueue_style('gallery-admin-style', $this->baseurl . 'css/style.css');
    }

    function admin_script()
    {
        if ('webinane_galleries' != $GLOBALS['post_type']) return;

        wp_enqueue_script('nukes-videos', $this->baseurl . 'js/jquery-video.js', array('jquery-ui-dialog'));
        wp_enqueue_script('galleries-admin-script', $this->baseurl . 'js/image-gallery.js');
    }

    /**
     * @see webinane_gallery::gallery_array()
     * @since 1.0.0
     *
     * @param int $post_id Id of the gallery post.
     * @param string $thumb_size Either register size of the image or an array of width height.
     * @return array returns the array of images and videos found in the current gallery post.
     */
    public function gallery_array($post_id, $thumb_size, $args = array())
    {
        global $post, $wpdb, $wp_embed;

        $title_limit = 25;

        /** Default values of the 3rd argument $args */
        $default = array('show_featured' => false, 'number' => -1, 'mime_type' => 'all', 'no_detail' => false);
        $args = wp_parse_args($args, $default);

        $is_featured = ($args['show_featured']) ? true : false;

        $views = get_post_meta($post_id, 'webinane_gallery_views_counter', true);
        $content = array();

        $showposts = $args['number'];
		
        /** Check whether only featured images need to show */
        if ($is_featured) {
            $gallery = (get_post_thumbnail_id(get_the_ID())) ? array(get_post_thumbnail_id(get_the_ID())) : array();
            $gallery = ($gallery) ? $gallery : array(current((array)get_post_meta($post_id, 'webinane_gallery', true)));
        } else {
            $gallery = get_post_meta($post_id, 'webinane_gallery', true);
        }
		
        if ($gallery && ($args['mime_type'] == 'all' || $args['mime_type'] == 'image')) {

            $gallery = ($showposts == 1) ? current((array)$gallery) : $gallery;
            $posts = get_posts(array('showposts' => $showposts, 'post_type' => 'attachment', 'post_mime_type' => '"image/jpeg,image/gif,image/jpg,image/png"',
                'include' => $gallery));

            $gallery = array_flip((array)$gallery);

            if ($posts) {
                foreach ($posts as $p) {
                    $img_info = array();
					
                    $thumb = wp_get_attachment_image_src($p->ID, $thumb_size);
                    if ($args['no_detail']) $img_info['thumb'] = $thumb[0];
                    else {

                        $img_info['type'] = 'picture';
                        $img_info['uid'] = $p->ID;
                        $img_info['url'] = wp_get_attachment_url($p->ID);
                        $img_info['thumb'] = $thumb[0];
                        $img_info['title'] = $this->get_title(sh_set($p, 'post_title'));
                        $img_info['date'] = date(get_option('date_format'), strtotime($p->post_date));
                        $img_info['author'] = get_userdata($p->post_author)->display_name;
                        $img_info['views'] = isset($views[$p->ID]) ? $views[$p->ID] : 0;
                        $img_info['duration'] = '';
                        $img_info['cat'] = ''; //get_the_term_list(get_the_ID(), 'webinane_gallery', '', ' ,');
                        $img_info['desc'] = $p->post_excerpt;
                    }
                    $gallery[$p->ID] = $img_info;


                }
            }
        }
        $content = $gallery;

        /** Check whether only featured videos need to show */
        $videos = get_post_meta($post_id, 'webinane_videos', true);

        if ($videos && ($args['mime_type'] == 'all' || $args['mime_type'] == 'video')) {
            foreach (array_reverse((array)$videos) as $video) {
                $img_info = array();
                if ($args['no_detail']) $img_info['thumb'] = $video['thumb'];
                else {
                    $url = ($video['source'] == 'vimeo') ? 'http://vimeo.com/' . $video['id'] : 'http://www.youtube.com/watch?v=' . $video['id'];
					if( $video['source'] == 'vimeo' )
					{
						$url = 'http://player.vimeo.com/video/' . $video['id'];
					}else if( $video['source'] == 'youtube' )
					{
						$url = 'http://www.youtube.com/watch?v=' . $video['id'];
					}else if( $video['source'] == 'dailymotion' )
					{
						$url = 'http://www.dailymotion.com/embed/video/' . $video['id'];
					}else if( $video['source'] == 'soundcloud' )
					{
						$url = 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/' . $video['id'];
					}
                    $img_info['type'] = 'video';
                    $img_info['uid'] = $video['id'];
                    $img_info['url'] = $url;
                    $img_info['thumb'] = $video['thumb'];
                    $img_info['title'] = $video['title'];
                    $img_info['date'] = get_the_date();
                    //$img_info['author'] = $video['author'];
                    $views[$video['id']] = isset($views[$video['id']]) ? $views[$video['id']] : 0;
                    //$img_info['views'] = (int)$video['views'] + $views[$video['id']];
                    $img_info['duration'] = $video['duration'];
                    //$img_info['cat'] = $video['tags'];
                    $img_info['desc'] = character_limiter($video['desc'], 100);
                }

                if ($is_featured) {
                    if (isset($video['featured']) && $video['featured']) $content[] = $img_info;
                } else {
                    $content[] = $img_info;
                }
            }
        }
        return $content;
    }

    /**
     * @see webinane_gallery::get_title()
     * @since 1.0.0
     *
     * @return string returns formatted title.
     */
    function get_title($title, $limit = '')
    {
        return ($limit) ? substr(str_replace(array('-', '_', '+'), ' ', $title), 0, $limit) : str_replace(array('-', '_'), ' ', $title);
    }


}

/** Initiate the Class */
$GLOBALS['webinane_gal'] = new SH_Gallery;