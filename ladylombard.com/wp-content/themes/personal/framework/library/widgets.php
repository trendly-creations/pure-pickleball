<?php 

// sidebar search box
class sh_search_box extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'SearchBox', /* Name */__('The Blog Search Box',SH_NAME), array( 'description' => __('This widgtes is used in sidebar to show search form', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$title	=	apply_filters( 'widget_title', $instance['title'] );
		$bg =	$instance['bg'];
		if( $bg == 'darked' ){ $style = 'darked'; }else{ $style = ''; }
		echo $before_widget;
		?>
        <div class="search <?php echo $style;?>">
            <form method="get" action="<?php echo home_url();?>">
                <input name="s" type="text" placeholder="<?php echo $title?>" />
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div><!-- Search Widget -->
        <?php
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title']	=	strip_tags( $new_instance['title'] );
		$instance['bg']	=	strip_tags( $new_instance['bg'] );	
		return $instance;
	}
	
	public function form( $instance )
	{
		$title	= 	( $instance ) ? esc_attr( $instance['title'] )	: __( 'Search', SH_NAME );
		$bg		=	( $instance ) ? esc_attr( $instance['bg'] ) : '' ;
		
		$opt	=	array( 'light' => 'Light', 'darked' => 'Dark' );
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Placeholder:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' );?>" name="<?php echo $this->get_field_name( 'title' );?>" type="text" value="<?php echo $title;?>" />
        </p>
        <p>
         	 <label for="<?php echo $this->get_field_id('bg');?>"><?php _e('Select Background:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'bg' ); ?>" name="<?php echo $this->get_field_name( 'bg' ); ?>" >
			<?php foreach ( $opt as $k => $op ) : 	
					$selected = ( $bg == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <?php
	}
}

// sidebar contact info
class sh_contact_info extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'ConatacInfo', /* Name */__('The Blog Contact Info Box',SH_NAME), array( 'description' => __('This widgtes is used in sidebar to show Contact Information', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$title	=	apply_filters( 'widget_title', $instance['title'] );
		$bg =	$instance['bg'];
		if( $bg == 'darked' ){ $style = 'darked'; }else{ $style = ''; }
		echo $before_widget;
		?>
        <div class="contact-info <?php echo $style?>">
        	<?php if($instance['title']){?>
            	<h4 class="sidebar-title"><span><?php echo $instance['sub_title']?></span><i><?php echo $instance['title']?></i></h4>
            <?php } ?>
            <ul>
                <?php if($instance['title']){?><li><i class="fa fa-envelope"></i> <strong><?php _e( 'Email:', SH_NAME )?></strong> <?php echo $instance['email']?></li><?php } ?>
                <?php if($instance['title']){?><li><i class="fa fa-phone"></i> <strong><?php _e( 'Phone:', SH_NAME )?></strong> <?php echo $instance['phone']?>)</li><?php } ?>
                <?php if($instance['title']){?><li><i class="fa fa-clock-o"></i> <strong><?php _e( 'Date of Birth:', SH_NAME )?></strong> <?php echo $instance['dob']?></li><?php } ?>
                <?php if($instance['title']){?><li><i class="fa fa-home"></i> <strong><?php _e( 'Address:', SH_NAME )?></strong> <?php echo $instance['desc']?></li><?php } ?>
            </ul>
        </div>
        <?php
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title']		= strip_tags($new_instance['title']);
		$instance['sub_title']	= strip_tags($new_instance['sub_title']);
		$instance['email']		= strip_tags($new_instance['email']);
		$instance['phone']		= strip_tags($new_instance['phone']);
		$instance['dob']		= strip_tags($new_instance['dob']);
		$instance['desc']		= strip_tags($new_instance['desc']);
		$instance['bg']			= strip_tags( $new_instance['bg'] );	
		return $instance;
	}
	
	public function form( $instance )
	{
		if ( $instance )
		{
			$title 				= esc_attr($instance['title']);
			$sub_title 			= esc_attr($instance['sub_title']);
			$email 				= esc_attr($instance['email']);
			$phone 				= esc_attr($instance['phone']);
			$dob 				= esc_attr($instance['dob']);
			$desc 				= esc_attr($instance['desc']);
			$bg 				= esc_attr($instance['bg']);
		}
		else
		{
			$title 				= __( 'Contact Us', SH_NAME );
			$sub_title 			= "";
			$email 				= "";
			$phone 				= "";
			$dob 				= "";
			$desc 				= "";
			$bg 				= "";
		}
		$opt	=	array( 'light' => 'Light', 'darked' => 'Dark' );
		?>
        	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', SH_NAME); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
            <p><label for="<?php echo $this->get_field_id('sub_title'); ?>"><?php _e('Sub Title:', SH_NAME); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('sub_title'); ?>" name="<?php echo $this->get_field_name('sub_title'); ?>" type="text" value="<?php echo $sub_title; ?>" /></p>
            
            <p><label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email ID:', SH_NAME); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" /></p>
            <p><label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Contact No:', SH_NAME); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone; ?>" /></p>
            <p><label for="<?php echo $this->get_field_id('dob'); ?>"><?php _e('Date of Birth:', SH_NAME); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('dob'); ?>" name="<?php echo $this->get_field_name('dob'); ?>" type="text" value="<?php echo $dob; ?>" /></p>
            
            <p><label for="<?php echo $this->get_field_id('desc'); ?>"><?php _e('Descritpion:', SH_NAME); ?></label> 
            <textarea class="widefat" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>" ><?php echo $desc; ?></textarea></p>
         
        <p>
         	 <label for="<?php echo $this->get_field_id('bg');?>"><?php _e('Select Background:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'bg' ); ?>" name="<?php echo $this->get_field_name( 'bg' ); ?>" >
			<?php foreach ( $opt as $k => $op ) : 	
					$selected = ( $bg == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <?php
	}
}

// sidebar flicker photo
class SH_Flickr extends WP_Widget
{
	function __construct()
	{
		parent::__construct( /* Base ID */'SH_Flickr', /* Name */__('The Blog Flickr Feed',SH_NAME), array( 'description' => __('Fetch the latest feed from Flickr', SH_NAME )) );
	}
	
	function widget($args, $instance)
	{
		extract( $args );
		$flickr_id = apply_filters( 'widget_flickr_id', $instance['flickr_id'] );
		$number = apply_filters( 'widget_number', $instance['number'] );
		$bg =	$instance['bg'];
		$mode =	$instance['mode'];
		if( $bg == 'darked' ){ $style = 'darked'; }else{ $style = ''; }
		if( $mode == 'blank' ){ $mod_type = 'target="_blank"'; }else{ $mod_type = ''; }
		wp_enqueue_script('flickrjs');
		echo $before_widget;
		
		$limit = ( $number ) ? $number : 9;?>
            <div class="flickr <?php echo $style?>">
            <?php if($instance['title']){?>
            	<h4 class="sidebar-title"><span><?php echo $instance['sub_title']?></span><i><?php echo $instance['title']?></i></h4>
            <?php } ?>
            <div class="row">
            <div class="gallery-widget">
               <script type="text/javascript">
                    jQuery(document).ready(function($) {
                     $('.gallery-widget').jflickrfeed({
                      limit: <?php echo $limit;?> ,
                      qstrings: {id: '<?php echo $instance['flickr_id']; ?>'},
                      itemTemplate: '<div class="col-md-4"><a <?php echo $mod_type?> data-rel="prettyPhoto" href="{{link}}"><img src="{{image_s}}" alt="{{title}}" /></a></div>'
                     });
                    });
               </script>
            </div></div></div><?php
			
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] 			= strip_tags($new_instance['title']);
		$instance['sub_title'] 		= strip_tags($new_instance['sub_title']);
		$instance['flickr_id'] 		= $new_instance['flickr_id'];
		$instance['number'] 		= $new_instance['number'];
		$instance['bg']				= strip_tags( $new_instance['bg'] );
		$instance['mode']			= strip_tags( $new_instance['mode'] );
		
		return $instance;
	}
	
	function form($instance)
	{
		wp_enqueue_script('flickrjs');
		$title = ($instance) ? esc_attr($instance['title']) : __('OUR FLICKR', SH_NAME);
		$sub_title = ($instance) ? esc_attr($instance['sub_title']) :'';
		$flickr_id = ($instance) ? esc_attr($instance['flickr_id']) : '';
		$number = ( $instance ) ? esc_attr($instance['number']) : 8;
		$bg		=	( $instance ) ? esc_attr( $instance['bg'] ) : '' ;
		$mode	=	( $instance ) ? esc_attr( $instance['mode'] ) : '' ;
		$opt	=	array( 'light' => 'Light', 'darked' => 'Dark' );
		$mod	=	array( 'parent' => 'Parent', 'blank' => 'Blank' );?>
        <p>
            <label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title:', SH_NAME);?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" />
        </p>
        <p><label for="<?php echo $this->get_field_id('sub_title'); ?>"><?php _e('Sub Title:', SH_NAME); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('sub_title'); ?>" name="<?php echo $this->get_field_name('sub_title'); ?>" type="text" value="<?php echo $sub_title; ?>" /></p>
        <p>
            <label for="<?php echo $this->get_field_id('flickr_id');?>"><?php _e('Flickr ID:', SH_NAME);?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('flickr_id');?>" name="<?php echo $this->get_field_name('flickr_id');?>" type="text" value="<?php echo $flickr_id;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number');?>"><?php _e('Number of Images:', SH_NAME);?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('number');?>" name="<?php echo $this->get_field_name('number');?>" type="text" value="<?php echo $number;?>" />
        </p>
        <p>
         	 <label for="<?php echo $this->get_field_id('bg');?>"><?php _e('Select Background:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'bg' ); ?>" name="<?php echo $this->get_field_name( 'bg' ); ?>" >
			<?php foreach ( $opt as $k => $op ) : 	
					$selected = ( $bg == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
         <p>
         	 <label for="<?php echo $this->get_field_id('mode');?>"><?php _e('Open Links In:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'mode' ); ?>" name="<?php echo $this->get_field_name( 'mode' ); ?>" >
			<?php foreach ( $mod as $k => $op ) : 	
					$selected = ( $mode == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <?php 
	}
}

// sidebar post image carouser
class sh_post_image_carousel extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'PostImageCarousel', /* Name */__('The Blog Posts Images Carousel',SH_NAME), array( 'description' => __('This widgtes is used in sidebar to show post images in carousel', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$title	=	apply_filters( 'widget_title', $instance['title'] );
		$bg =	$instance['bg'];
		if( $bg == 'darked' ){ $style = 'darked'; }else{ $style = ''; }
		echo $before_widget;
		$args = array(
					'post_type'			=>	'post',
					'post_status'		=>	'publish',
					'cat'				=>	(int)$instance['cat'],
					'posts_per_page'	=>	$instance['num'],
				);
		query_posts($args);
		$counter = 1;
		$counter2 = 1;
		?>
        <div class="multimedia <?php echo $style?>">
            <?php if($instance['title']){?>
            	<h4 class="sidebar-title"><span><?php echo $instance['sub_title']?></span><i><?php echo $instance['title']?></i></h4>
            <?php } ?>
            <div class="multimedia-tabs">
                <div class="tab-content">
                	<?php while( have_posts() ): the_post(); ?>
                    <?php if( has_post_thumbnail() ): ?>
                        <div id="media-tab<?php echo $counter++?>" class="tab-pane fade <?php if( 2 == $counter ): echo 'in active'; endif;?>">
                            <?php the_post_thumbnail( '370x216' );?>
                        </div>
                   	<?php endif; endwhile; ?>
                </div>
            <ul role="tablist" class="nav nav-tabs multimedia-carousal">
            	<?php while( have_posts() ): the_post(); ?>
                <?php if( has_post_thumbnail() ): ?>
            	<li class="<?php if( 1 == $counter2 ): echo 'active'; endif;?>">
                    <a data-toggle="tab" role="tab" href="#media-tab<?php echo $counter2++?>">
                    	<?php the_post_thumbnail( '180x180' );?>
                    </a>
                </li>
                <?php endif; endwhile; wp_reset_query();?>
			</ul>
		</div>
	</div>
    <script>
		jQuery(document).ready(function() {
            jQuery(".multimedia-carousal").owlCarousel({
				autoPlay :true,
				stopOnHover : true,
				goToFirstSpeed : 500,
				slideSpeed:500,
				autoHeight : true,
				transitionStyle:"fade",
				navigation:true,
				items : 3,
				pagination:false
			});		
        });
    </script>
        <?php
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title']		=	strip_tags( $new_instance['title'] );
		$instance['sub_title']	=	strip_tags( $new_instance['sub_title'] );
		$instance['num']		=	strip_tags( $new_instance['num'] );
		$instance['cat']		=	strip_tags( $new_instance['cat'] );
		$instance['bg']			=	strip_tags( $new_instance['bg'] );	
		return $instance;
	}
	
	public function form( $instance )
	{
		$title		= 	( $instance ) ? esc_attr( $instance['title'] )	: '';
		$sub_title	= 	( $instance ) ? esc_attr( $instance['sub_title'] )	: '';
		$num		= 	( $instance ) ? esc_attr( $instance['num'] )	: '';
		$cat		= 	( $instance ) ? esc_attr( $instance['cat'] )	: '';
		$bg			=	( $instance ) ? esc_attr( $instance['bg'] ) : '' ;
		
		$cats		=	sh_get_categories( array( 'taxonomy' => 'category', 'hide_empty' => false ) );
		$opt		=	array( 'light' => 'Light', 'darked' => 'Dark' );
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' );?>" name="<?php echo $this->get_field_name( 'title' );?>" type="text" value="<?php echo $title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'sub_title' );?>"><?php _e( 'Sub Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'sub_title' );?>" name="<?php echo $this->get_field_name( 'sub_title' );?>" type="text" value="<?php echo $sub_title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'num' );?>"><?php _e( 'Number of Show Posts Images:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'num' );?>" name="<?php echo $this->get_field_name( 'num' );?>" type="text" value="<?php echo $num;?>" />
        </p>
        <p>
         	 <label for="<?php echo $this->get_field_id('cat');?>"><?php _e('Select Category:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'cat' ); ?>" name="<?php echo $this->get_field_name( 'cat' ); ?>" >
			<?php foreach ( $cats as $k => $op ) : 	
					$selected = ( $cat == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <p>
         	 <label for="<?php echo $this->get_field_id('bg');?>"><?php _e('Select Background:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'bg' ); ?>" name="<?php echo $this->get_field_name( 'bg' ); ?>" >
			<?php foreach ( $opt as $k => $op ) : 	
					$selected = ( $bg == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <?php
	}
}

// sidebar post image carouser
class sh_testimonial extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'Testimonial', /* Name */__('The Blog Testimonial',SH_NAME), array( 'description' => __('This widgtes is used in sidebar to show Testimonial', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$title	=	apply_filters( 'widget_title', $instance['title'] );
		$bg =	$instance['bg'];
		if( $bg == 'darked' ){ $style = 'darked'; }else{ $style = ''; }
		echo $before_widget;
		$args = array(
					'post_type'			=>	'blog_testimonials',
					'post_status'		=>	'publish',
					'posts_per_page'	=>	$instance['num'],
				);
		query_posts($args);
		$counter = 1;
		$counter2 = 1;
		?>
        <div class="testimonials <?php echo $style?>">
            <?php if($instance['title']){?>
            	<h4 class="sidebar-title"><span><?php echo $instance['sub_title']?></span><i><?php echo $instance['title']?></i></h4>
            <?php } ?>
            <ul class="testimonial-carousal">
                	<?php while( have_posts() ): the_post(); ?>
                    <li>
                        <?php the_content()?>
                        <div class="testimonial-avatar">
                            <span><?php echo get_avatar( get_the_author_meta( 'ID' ), 71 ); ?></span>
                            <h4><?php ucwords( the_author_meta( 'display_name' ) ); ?></h4>
                            <h6><?php the_title()?></h6>
                        </div>
                    </li>
                    <?php endwhile; wp_reset_query();?>
             </ul>
		</div>
        <script>
			jQuery(document).ready(function($) {
				$(".testimonial-carousal").owlCarousel({
					autoPlay :true,
					stopOnHover : true,
					goToFirstSpeed : 500,
					slideSpeed:500,
					singleItem : true,
					autoHeight : true,
					transitionStyle:"fade",
					navigation:false,
					pagination:true
				});	
			});
    	</script>
        <?php
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title']		=	strip_tags( $new_instance['title'] );
		$instance['sub_title']	=	strip_tags( $new_instance['sub_title'] );
		$instance['num']		=	strip_tags( $new_instance['num'] );
		$instance['bg']			=	strip_tags( $new_instance['bg'] );	
		return $instance;
	}
	
	public function form( $instance )
	{
		$title		= 	( $instance ) ? esc_attr( $instance['title'] )	: '';
		$sub_title	= 	( $instance ) ? esc_attr( $instance['sub_title'] )	: '';
		$num		= 	( $instance ) ? esc_attr( $instance['num'] )	: '';
		$bg			=	( $instance ) ? esc_attr( $instance['bg'] ) : '' ;
		$opt		=	array( 'light' => 'Light', 'darked' => 'Dark' );
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' );?>" name="<?php echo $this->get_field_name( 'title' );?>" type="text" value="<?php echo $title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'sub_title' );?>"><?php _e( 'Sub Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'sub_title' );?>" name="<?php echo $this->get_field_name( 'sub_title' );?>" type="text" value="<?php echo $sub_title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'num' );?>"><?php _e( 'Number of Posts:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'num' );?>" name="<?php echo $this->get_field_name( 'num' );?>" type="text" value="<?php echo $num;?>" />
        </p>
        <p>
         	 <label for="<?php echo $this->get_field_id('bg');?>"><?php _e('Select Background:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'bg' ); ?>" name="<?php echo $this->get_field_name( 'bg' ); ?>" >
			<?php foreach ( $opt as $k => $op ) : 	
					$selected = ( $bg == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <?php
	}
}

// sidebar post image carouser
class sh_post_single_image_carousel extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'PostSingleImageCarousel', /* Name */__('The Blog Post Single Image Carousel',SH_NAME), array( 'description' => __('This widgtes is used in sidebar to show single post image carousel', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$title	=	apply_filters( 'widget_title', $instance['title'] );
		$bg =	$instance['bg'];
		if( $bg == 'darked' ){ $style = 'darked'; }else{ $style = ''; }
		echo $before_widget;
		
		$args = array(
					'post_type'			=>	'post',
					'post_status'		=>	'publish',
					'cat'				=>	(int)$instance['cat'],
					'posts_per_page'	=>	$instance['num'],
				);
		query_posts($args);
		?>
        <div class="fashion-carousal <?php echo $style?>">
            <?php if($instance['title']){?>
            	<h4 class="sidebar-title"><span><?php echo $instance['sub_title']?></span><i><?php echo $instance['title']?></i></h4>
            <?php } ?>
            <div class="trendy-carousal-sec">
            	<ul class="trendy-carousal">
                	<?php while( have_posts() ): the_post(); ?>
                    <?php if( has_post_thumbnail() ): ?>
                    <li>
                        <a href="<?php the_permalink()?>" title=""><i class="fa fa-link"></i></a>
                        <?php the_post_thumbnail( '370x439' )?>
                        <h3><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h3>
                    </li>
                    <?php endif; endwhile; wp_reset_query();?>
             </ul>
		</div>
	</div>
        <script>
			jQuery(document).ready(function($) {
				$(".trendy-carousal").owlCarousel({
					autoPlay :true,
					stopOnHover : true,
					goToFirstSpeed : 500,
					slideSpeed:5000,
					autoHeight : true,
					transitionStyle:"fade",
					navigation:true,
					singleItem : true,
					pagination:false
				});	
			});
    	</script>
        <?php
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title']		=	strip_tags( $new_instance['title'] );
		$instance['sub_title']	=	strip_tags( $new_instance['sub_title'] );
		$instance['num']		=	strip_tags( $new_instance['num'] );
		$instance['cat']		=	strip_tags( $new_instance['cat'] );
		$instance['bg']			=	strip_tags( $new_instance['bg'] );	
		return $instance;
	}
	
	public function form( $instance )
	{
		$title		= 	( $instance ) ? esc_attr( $instance['title'] )	: '';
		$sub_title	= 	( $instance ) ? esc_attr( $instance['sub_title'] )	: '';
		$num		= 	( $instance ) ? esc_attr( $instance['num'] )	: '';
		$cat		= 	( $instance ) ? esc_attr( $instance['cat'] )	: '';
		$bg			=	( $instance ) ? esc_attr( $instance['bg'] ) : '' ;
		$cats		=	sh_get_categories( array( 'taxonomy' => 'category', 'hide_empty' => false ) );
		$opt		=	array( 'light' => 'Light', 'darked' => 'Dark' );
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' );?>" name="<?php echo $this->get_field_name( 'title' );?>" type="text" value="<?php echo $title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'sub_title' );?>"><?php _e( 'Sub Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'sub_title' );?>" name="<?php echo $this->get_field_name( 'sub_title' );?>" type="text" value="<?php echo $sub_title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'num' );?>"><?php _e( 'Number of Posts:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'num' );?>" name="<?php echo $this->get_field_name( 'num' );?>" type="text" value="<?php echo $num;?>" />
        </p>
        <p>
         	 <label for="<?php echo $this->get_field_id('cat');?>"><?php _e('Select Category:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'cat' ); ?>" name="<?php echo $this->get_field_name( 'cat' ); ?>" >
			<?php foreach ( $cats as $k => $op ) : 	
					$selected = ( $cat == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <p>
         	 <label for="<?php echo $this->get_field_id('bg');?>"><?php _e('Select Background:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'bg' ); ?>" name="<?php echo $this->get_field_name( 'bg' ); ?>" >
			<?php foreach ( $opt as $k => $op ) : 	
					$selected = ( $bg == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <?php
	}
}

// sidebar latest post carousel
class sh_latest_post_carousel extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'LatestPostCarousel', /* Name */__('The Blog Latest Post Carousel',SH_NAME), array( 'description' => __('This widgtes is used in sidebar to show latest post images carousel', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$title	=	apply_filters( 'widget_title', $instance['title'] );
		$bg =	$instance['bg'];
		if( $bg == 'darked' ){ $style = 'darked'; }else{ $style = ''; }
		echo $before_widget;
		
		$args = array(
					'post_type'			=>	'post',
					'post_status'		=>	'publish',
					'cat'				=>	(int)$instance['cat'],
					'posts_per_page'	=>	$instance['num'],
				);
		query_posts($args); 
		$post = array();
		$post_counter = 0;
		$counter = 1;
		?>
        <div class="latest-post <?php echo $style?>">
            <?php if($instance['title']){?>
            	<h4 class="sidebar-title"><span><?php echo $instance['sub_title']?></span><i><?php echo $instance['title']?></i></h4>
            <?php } ?>
            <div class="latest-post-sec">
                	<?php while( have_posts() ): the_post(); ?>
                    <?php if( has_post_thumbnail() ): 
							$post_counter++;
                    		$post[]= '<li>'.get_the_post_thumbnail( get_the_ID(), array(370,216) ).'<div class="title"><h3><a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h3></div></li>';
							
                    endif; endwhile; wp_reset_query(); ?>
					<ul>
                    <?php
						$post_array = array_chunk( $post, 3 ); 
						foreach ( $post_array as $chunk ) 
						{
							foreach ( $chunk as $post ) 
							{
								echo $post; 
								if( $counter % 3 == 0 && $counter != $post_counter ): echo'</ul><ul>'; endif;
								$counter++;
							}
						} ?>
                  </ul>
		</div>
	</div>
        <script>
			jQuery(document).ready(function($) {
				$(".latest-post-sec").owlCarousel({
					autoPlay :true,
					stopOnHover : true,
					goToFirstSpeed : 500,
					slideSpeed:5000,
					autoHeight : true,
					transitionStyle:"fade",
					navigation:true,
					singleItem : true,
					pagination:false
				});	
			});
    	</script>
        <?php
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title']		=	strip_tags( $new_instance['title'] );
		$instance['sub_title']	=	strip_tags( $new_instance['sub_title'] );
		$instance['num']		=	strip_tags( $new_instance['num'] );
		$instance['cat']		=	strip_tags( $new_instance['cat'] );
		$instance['bg']			=	strip_tags( $new_instance['bg'] );	
		return $instance;
	}
	
	public function form( $instance )
	{
		$title		= 	( $instance ) ? esc_attr( $instance['title'] )	: '';
		$sub_title	= 	( $instance ) ? esc_attr( $instance['sub_title'] )	: '';
		$num		= 	( $instance ) ? esc_attr( $instance['num'] )	: '';
		$cat		= 	( $instance ) ? esc_attr( $instance['cat'] )	: '';
		$bg			=	( $instance ) ? esc_attr( $instance['bg'] ) : '' ;
		$cats		=	sh_get_categories( array( 'taxonomy' => 'category', 'hide_empty' => false ) );
		$opt		=	array( 'light' => 'Light', 'darked' => 'Dark' );
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' );?>" name="<?php echo $this->get_field_name( 'title' );?>" type="text" value="<?php echo $title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'sub_title' );?>"><?php _e( 'Sub Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'sub_title' );?>" name="<?php echo $this->get_field_name( 'sub_title' );?>" type="text" value="<?php echo $sub_title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'num' );?>"><?php _e( 'Number of Posts:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'num' );?>" name="<?php echo $this->get_field_name( 'num' );?>" type="text" value="<?php echo $num;?>" />
        </p>
        <p>
         	 <label for="<?php echo $this->get_field_id('cat');?>"><?php _e('Select Category:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'cat' ); ?>" name="<?php echo $this->get_field_name( 'cat' ); ?>" >
			<?php foreach ( $cats as $k => $op ) : 	
					$selected = ( $cat == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <p>
         	 <label for="<?php echo $this->get_field_id('bg');?>"><?php _e('Select Background:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'bg' ); ?>" name="<?php echo $this->get_field_name( 'bg' ); ?>" >
			<?php foreach ( $opt as $k => $op ) : 	
					$selected = ( $bg == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <?php
	}
}

// sidebar latest post carousel
class sh_faqs extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'FAQs', /* Name */__('The Blog FAQs',SH_NAME), array( 'description' => __('This widgtes is used in sidebar to show FAQs', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$title	=	apply_filters( 'widget_title', $instance['title'] );
		$bg =	$instance['bg'];
		if( $bg == 'darked' ){ $style = 'darked'; }else{ $style = ''; }
		echo $before_widget;
		$settings = get_option( SH_NAME . '_theme_options' );
		$faqs = sh_set( sh_set( $settings, 'sah_faqs' ), 'sah_faqs' );
		$counter = 0;
		?>
        <div class="accordian <?php echo $style?>">
            <?php if($instance['title']){?>
            	<h4 class="sidebar-title"><span><?php echo $instance['sub_title']?></span><i><?php echo $instance['title']?></i></h4>
            <?php } ?>
            <div id="toggle-widget" class="accordian-widget">
            	<?php 
					foreach( $faqs as $faq )
					{
						if( sh_set( $faq, 'tocopy' ) || $counter == $instance['num'] ) break;
				?>
                        <h2><i></i><?php echo sh_set( $faq, 'sh_question' );?></h2>
                        <div class="content">
                            <p><?php echo sh_set( $faq, 'sh_desc' );?></p>
                        </div>
                <?php $counter++; } ?>
            </div>
        </div>
        <script>
			jQuery(document).ready(function($) {
				$('#toggle-widget .content').hide();
				$('#toggle-widget h2:first').addClass('active').next().slideDown('slow');
				$('#toggle-widget h2').click(function() {
					if($(this).next().is(':hidden')) {
						$('#toggle-widget h2').removeClass('active').next().slideUp('slow');
						$(this).toggleClass('active').next().slideDown('slow');
					}
				});
            });
        </script>
        <?php
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title']		=	strip_tags( $new_instance['title'] );
		$instance['sub_title']	=	strip_tags( $new_instance['sub_title'] );
		$instance['num']		=	strip_tags( $new_instance['num'] );
		$instance['bg']			=	strip_tags( $new_instance['bg'] );	
		return $instance;
	}
	
	public function form( $instance )
	{
		$title		= 	( $instance ) ? esc_attr( $instance['title'] )	: '';
		$sub_title	= 	( $instance ) ? esc_attr( $instance['sub_title'] )	: '';
		$num		= 	( $instance ) ? esc_attr( $instance['num'] )	: '';
		$bg			=	( $instance ) ? esc_attr( $instance['bg'] ) : '' ;
		$opt		=	array( 'light' => 'Light', 'darked' => 'Dark' );
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' );?>" name="<?php echo $this->get_field_name( 'title' );?>" type="text" value="<?php echo $title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'sub_title' );?>"><?php _e( 'Sub Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'sub_title' );?>" name="<?php echo $this->get_field_name( 'sub_title' );?>" type="text" value="<?php echo $sub_title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'num' );?>"><?php _e( 'Number of FAQs to Show:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'num' );?>" name="<?php echo $this->get_field_name( 'num' );?>" type="text" value="<?php echo $num;?>" />
        </p>
        <p>
         	 <label for="<?php echo $this->get_field_id('bg');?>"><?php _e('Select Background:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'bg' ); ?>" name="<?php echo $this->get_field_name( 'bg' ); ?>" >
			<?php foreach ( $opt as $k => $op ) : 	
					$selected = ( $bg == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <?php
	}
}

// sidebar latest post carousel
class sh_our_partners extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'OurPartners', /* Name */__('The Blog Our Partners',SH_NAME), array( 'description' => __('This widgtes is used in sidebar to show Partners', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$title	=	apply_filters( 'widget_title', $instance['title'] );
		$bg =	$instance['bg'];
		if( $bg == 'darked' ){ $style = 'darked'; }else{ $style = ''; }
		echo $before_widget;
		$settings = get_option( SH_NAME . '_theme_options' );
		$partners = sh_set( sh_set( $settings, 'dynamic_partners' ), 'dynamic_partners' );
		$counter = 0;
		?>
        <div class="partners <?php echo $style?>">
            <?php if($instance['title']){?>
            	<h4 class="sidebar-title"><span><?php echo $instance['sub_title']?></span><i><?php echo $instance['title']?></i></h4>
            <?php } ?>
            <div id="partner-carousal" class="partner-carousal">
            	<div class="row">
            	<?php 
					foreach( $partners as $partner )
					{
						if( sh_set( $partner, 'tocopy' ) || $counter == $instance['num'] ) break;
				?>
                            <div class="col-md-6">
                                <a href="<?php echo sh_set( $partner, 'partner_link' )?>" title="" class="partner"><img src="<?php echo sh_set( $partner, 'partner_img' )?>" alt="" /></a>
                            </div>
                <?php $counter++;if( $counter % 4 == 0 && $counter != $instance['num'] ): echo'</div><div class="row">'; endif; } ?>
            </div>
        </div>
	</div>
        <script>
			jQuery(document).ready(function($) {
				$(".partner-carousal").owlCarousel({
					autoPlay :true,
					stopOnHover : true,
					goToFirstSpeed : 500,
					slideSpeed:500,
					singleItem : true,
					autoHeight : true,
					transitionStyle:"fade",
					navigation:false,
					pagination:true
				});
            });
        </script>
        <?php
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title']		=	strip_tags( $new_instance['title'] );
		$instance['sub_title']	=	strip_tags( $new_instance['sub_title'] );
		$instance['num']		=	strip_tags( $new_instance['num'] );
		$instance['bg']			=	strip_tags( $new_instance['bg'] );	
		return $instance;
	}
	
	public function form( $instance )
	{
		$title		= 	( $instance ) ? esc_attr( $instance['title'] )	: '';
		$sub_title	= 	( $instance ) ? esc_attr( $instance['sub_title'] )	: '';
		$num		= 	( $instance ) ? esc_attr( $instance['num'] )	: '';
		$bg			=	( $instance ) ? esc_attr( $instance['bg'] ) : '' ;
		$opt		=	array( 'light' => 'Light', 'darked' => 'Dark' );
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' );?>" name="<?php echo $this->get_field_name( 'title' );?>" type="text" value="<?php echo $title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'sub_title' );?>"><?php _e( 'Sub Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'sub_title' );?>" name="<?php echo $this->get_field_name( 'sub_title' );?>" type="text" value="<?php echo $sub_title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'num' );?>"><?php _e( 'Number of Partners to Show:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'num' );?>" name="<?php echo $this->get_field_name( 'num' );?>" type="text" value="<?php echo $num;?>" />
        </p>
        <p>
         	 <label for="<?php echo $this->get_field_id('bg');?>"><?php _e('Select Background:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'bg' ); ?>" name="<?php echo $this->get_field_name( 'bg' ); ?>" >
			<?php foreach ( $opt as $k => $op ) : 	
					$selected = ( $bg == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <?php
	}
}

// sidebar latest post carousel
class sh_latest_news_carousel extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'LatestNewsCarousel', /* Name */__('The Blog Latest News Carousel',SH_NAME), array( 'description' => __('This widgtes is used in sidebar to show latest News carousel', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$title	=	apply_filters( 'widget_title', $instance['title'] );
		$bg =	$instance['bg'];
		if( $bg == 'darked' ){ $style = 'darked'; }else{ $style = ''; }
		echo $before_widget;
		
		$args = array(
					'post_type'			=>	'post',
					'post_status'		=>	'publish',
					'cat'				=>	(int)$instance['cat'],
					'posts_per_page'	=>	$instance['num'],
				);
		query_posts($args); 
		$post = array();
		$post_counter = 0;
		$counter = 1;
		?>
        <div class="news <?php echo $style?>">
            <?php if($instance['title']){?>
            	<h4 class="sidebar-title"><span><?php echo $instance['sub_title']?></span><i><?php echo $instance['title']?></i></h4>
            <?php } ?>
            <div class="news-carousal-sec">
            	<div id="news-carousal" class="news-carousal">
                	<?php while( have_posts() ): the_post(); ?>
                    <?php if( has_post_thumbnail() ): ?>
						<div class="news-widget">
                            <?php the_post_thumbnail( '370x216' );?>
                            <span class="news-avatar">
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
                            </span>
                            <h4><a href="<?php the_permalink()?>"><?php the_title()?></a></h4>
                            <h6><?php _e( 'BY:', SH_NAME ) ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title=""> <?php strtoupper( the_author_meta( 'display_name' ) ); ?></a> <?php echo get_the_date('F d, Y') ?></h6>
                            <p><?php echo substr( get_the_content(), 0, 120 ) ?></p>
                        </div>						
                    <?php endif; endwhile; wp_reset_query();?>
			</div>
		</div>
	</div>
        <script>
			jQuery(document).ready(function($) {
				$(".news-carousal").owlCarousel({
					autoPlay :true,
					stopOnHover : true,
					goToFirstSpeed : 500,
					slideSpeed:500,
					singleItem : true,
					autoHeight : true,
					transitionStyle:"fade",
					navigation:true,
					pagination:false	
				});		
			});
    	</script>
        <?php
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title']		=	strip_tags( $new_instance['title'] );
		$instance['sub_title']	=	strip_tags( $new_instance['sub_title'] );
		$instance['num']		=	strip_tags( $new_instance['num'] );
		$instance['cat']		=	strip_tags( $new_instance['cat'] );
		$instance['bg']			=	strip_tags( $new_instance['bg'] );	
		return $instance;
	}
	
	public function form( $instance )
	{
		$title		= 	( $instance ) ? esc_attr( $instance['title'] )	: '';
		$sub_title	= 	( $instance ) ? esc_attr( $instance['sub_title'] )	: '';
		$num		= 	( $instance ) ? esc_attr( $instance['num'] )	: '';
		$cat		= 	( $instance ) ? esc_attr( $instance['cat'] )	: '';
		$bg			=	( $instance ) ? esc_attr( $instance['bg'] ) : '' ;
		$cats		=	sh_get_categories( array( 'taxonomy' => 'category', 'hide_empty' => false ) );
		$opt		=	array( 'light' => 'Light', 'darked' => 'Dark' );
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' );?>" name="<?php echo $this->get_field_name( 'title' );?>" type="text" value="<?php echo $title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'sub_title' );?>"><?php _e( 'Sub Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'sub_title' );?>" name="<?php echo $this->get_field_name( 'sub_title' );?>" type="text" value="<?php echo $sub_title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'num' );?>"><?php _e( 'Number of Posts:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'num' );?>" name="<?php echo $this->get_field_name( 'num' );?>" type="text" value="<?php echo $num;?>" />
        </p>
        <p>
         	 <label for="<?php echo $this->get_field_id('cat');?>"><?php _e('Select Category:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'cat' ); ?>" name="<?php echo $this->get_field_name( 'cat' ); ?>" >
			<?php foreach ( $cats as $k => $op ) : 	
					$selected = ( $cat == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <p>
         	 <label for="<?php echo $this->get_field_id('bg');?>"><?php _e('Select Background:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'bg' ); ?>" name="<?php echo $this->get_field_name( 'bg' ); ?>" >
			<?php foreach ( $opt as $k => $op ) : 	
					$selected = ( $bg == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <?php
	}
}

class sh_categories extends WP_Widget {

	public function __construct()
	{
		$widget_ops = array( 'classname' => 'sh_widget_categories', 'description' => __( "This widgtes is used in sidebar to show All Categoreis.", SH_NAME ) );
		parent::__construct( 'sh_categories', __( 'The Blog Categories', SH_NAME), $widget_ops );
	}

	public function widget( $args, $instance )
	{

		$c = !empty( $instance['count'] ) ? '1' : '0';
		$bg =	$instance['bg'];
		if( $bg == 'darked' ){ $style = 'darked'; }else{ $style = ''; }
		echo $args['before_widget'];
		$cat_args = array( 'orderby' => 'name', 'show_count' => $c );
		?>
		<div class="categories <?php echo $style?>">
            <?php if($instance['title']){?>
            	<h4 class="sidebar-title"><span><?php echo $instance['sub_title']?></span><i><?php echo $instance['title']?></i></h4>
            <?php } ?>
         	<ul>
				<?php
                $cat_args['title_li'] = '';
                wp_list_categories( apply_filters( 'widget_categories_args', $cat_args ) );
                ?>
			</ul>
        </div>
		<?php
		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['title']			=	strip_tags($new_instance['title']);
		$instance['sub_title']		=	strip_tags($new_instance['sub_title']);
		$instance['count']			=	!empty($new_instance['count']) ? 1 : 0;
		$instance['bg']				=	strip_tags( $new_instance['bg'] );		

		return $instance;
	}

	public function form( $instance ) {
		
		$instance 		=	wp_parse_args( (array) $instance, array( 'title' => '') );
		$title 			=	isset( $instance['title'] ) ? $instance['title'] : '';
		$sub_title		=	isset( $instance['sub_title'] );
		$count 			=	isset($instance['count']) ? (bool) $instance['count'] : false;
		$bg				=	isset( $instance['bg'] ) ?  $instance['bg']  : '' ;
		$opt			=	array( 'light' => 'Light', 'darked' => 'Dark' );
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', SH_NAME ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
         <p>
            <label for="<?php echo $this->get_field_id( 'sub_title' );?>"><?php _e( 'Sub Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'sub_title' );?>" name="<?php echo $this->get_field_name( 'sub_title' );?>" type="text" value="<?php echo $sub_title;?>" />
        </p>

		<p>
		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>"<?php checked( $count ); ?> />
		<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e( 'Show post counts', SH_NAME ); ?></label><br />
        <p>
         <label for="<?php echo $this->get_field_id('bg');?>"><?php _e('Select Background:', SH_NAME);?></label>
         <select class="widefat" id="<?php echo $this->get_field_id( 'bg' ); ?>" name="<?php echo $this->get_field_name( 'bg' ); ?>" >
         <?php foreach ( $opt as $k => $op ) : 	
                $selected = ( $bg == $k ) ? 'selected="selected"' : '';
                echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
              endforeach; ?>
         </select>
         </p>
<?php
	}

}

// sidebar creative team carousel
class sh_creative_team_carousel extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'CreativeTeamCarousel', /* Name */__('The Blog Creative Team Carousel',SH_NAME), array( 'description' => __('This widgtes is used in sidebar to show latest team posts carousel', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$title	=	apply_filters( 'widget_title', $instance['title'] );
		$bg =	$instance['bg'];
		if( $bg == 'darked' ){ $style = 'darked'; }else{ $style = ''; }
		echo $before_widget;
		
		$args = array(
					'post_type'			=>	'blog_profile',
					'post_status'		=>	'publish',
					'posts_per_page'	=>	$instance['num'],
				);
		$profile_query = new WP_Query($args); 
		?>
        <div class="team <?php echo $style?>">
            <?php if($instance['title']){?>
            	<h4 class="sidebar-title"><span><?php echo $instance['sub_title']?></span><i><?php echo $instance['title']?></i></h4>
            <?php } ?>
            <div class="team-carousal-sec">
            	<div id="team-carousal" class="team-carousal">
                	<?php while( $profile_query->have_posts() ): $profile_query->the_post(); ?>
                    	<?php $meta  = get_post_meta( get_the_ID(), 'sh_profile_meta', true ); ?>
                        	<?php if( sh_set( $meta, 'sh_po_img' ) ): ?>
                        	<div class="team-widget">
                                <span><img src="<?php echo sh_set( $meta, 'sh_po_img' );?>" alt="" /></span>
                                <h4><?php the_title()?></h4>
                                <div class="social-btns">
                                    <ul>
                                        <?php echo sh_socil_media_clr()?>
                                    </ul>
                                </div>
                                <p><?php echo substr( sh_set( $meta, 'sh_po_desc' ), 0, 150 );?></p>
                            </div>
                          <?php endif; ?>
                    <?php endwhile; wp_reset_query();?>
			</div>
		</div>
	</div>
        <script>
			jQuery(document).ready(function($) {
				$(".team-carousal").owlCarousel({
					autoPlay :true,
					stopOnHover : true,
					goToFirstSpeed : 500,
					slideSpeed:500,
					singleItem : true,
					autoHeight : true,
					transitionStyle:"fade",
					navigation:false,
					pagination:true
				});
			});
    	</script>
        <?php
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title']		=	strip_tags( $new_instance['title'] );
		$instance['sub_title']	=	strip_tags( $new_instance['sub_title'] );
		$instance['num']		=	strip_tags( $new_instance['num'] );
		$instance['bg']			=	strip_tags( $new_instance['bg'] );	
		return $instance;
	}
	
	public function form( $instance )
	{
		$title		= 	( $instance ) ? esc_attr( $instance['title'] )	: '';
		$sub_title	= 	( $instance ) ? esc_attr( $instance['sub_title'] )	: '';
		$num		= 	( $instance ) ? esc_attr( $instance['num'] )	: '';
		$bg			=	( $instance ) ? esc_attr( $instance['bg'] ) : '' ;
		$opt		=	array( 'light' => 'Light', 'darked' => 'Dark' );
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' );?>" name="<?php echo $this->get_field_name( 'title' );?>" type="text" value="<?php echo $title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'sub_title' );?>"><?php _e( 'Sub Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'sub_title' );?>" name="<?php echo $this->get_field_name( 'sub_title' );?>" type="text" value="<?php echo $sub_title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'num' );?>"><?php _e( 'Number of Posts:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'num' );?>" name="<?php echo $this->get_field_name( 'num' );?>" type="text" value="<?php echo $num;?>" />
        </p>
        <p>
         	 <label for="<?php echo $this->get_field_id('bg');?>"><?php _e('Select Background:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'bg' ); ?>" name="<?php echo $this->get_field_name( 'bg' ); ?>" >
			<?php foreach ( $opt as $k => $op ) : 	
					$selected = ( $bg == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <?php
	}
}

// sidebar tags cloud
class sh_tags extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'Sh_Tags', /* Name */__('The Blog Tag Cloud',SH_NAME), array( 'description' => __('This widgtes is used in sidebar to show Tags Cloud', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$bg =	$instance['bg'];
		if( $bg == 'darked' ){ $style = 'darked'; }else{ $style = ''; }
		echo $before_widget;
		$args = array(
			'smallest'                  => 8, 
			'largest'                   => 22,
			'unit'                      => 'pt', 
			'number'                    => 45,  
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
		?>
        <div class="tags <?php echo $style?>">
        	<?php if($instance['title']){?>
            	<h4 class="sidebar-title"><span><?php echo $instance['sub_title']?></span><i><?php echo $instance['title']?></i></h4>
            <?php } ?>
            <div class="tags-button">
            	<?php wp_tag_cloud( $args ); ?>
            </div>
        </div>
        <?php
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title']		=	strip_tags( $new_instance['title'] );
		$instance['sub_title']	=	strip_tags( $new_instance['sub_title'] );
		$instance['bg']			=	strip_tags( $new_instance['bg'] );	
		return $instance;
	}
	
	public function form( $instance )
	{
		$title		= 	( $instance ) ? esc_attr( $instance['title'] )	: '';
		$sub_title	= 	( $instance ) ? esc_attr( $instance['sub_title'] )	: '';
		$bg			=	( $instance ) ? esc_attr( $instance['bg'] ) : '' ;
		$opt		=	array( 'light' => 'Light', 'darked' => 'Dark' );
		?>
        	<p>
            <label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' );?>" name="<?php echo $this->get_field_name( 'title' );?>" type="text" value="<?php echo $title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'sub_title' );?>"><?php _e( 'Sub Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'sub_title' );?>" name="<?php echo $this->get_field_name( 'sub_title' );?>" type="text" value="<?php echo $sub_title;?>" />
        </p>
            <p>
         	 <label for="<?php echo $this->get_field_id('bg');?>"><?php _e('Select Background:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'bg' ); ?>" name="<?php echo $this->get_field_name( 'bg' ); ?>" >
			<?php foreach ( $opt as $k => $op ) : 	
					$selected = ( $bg == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <?php
	}
}

// sidebar twitte tweets
class sh_twitter_tweets extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'TwitterTweets', /* Name */__('The Blog Twitter Tweets',SH_NAME), array( 'description' => __('This widgtes is used in sidebar to show Twitter Tweets', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$bg =	$instance['bg'];
		if( $bg == 'darked' ){ $style = 'darked'; }else{ $style = ''; }
		echo $before_widget;
		$output = '';
		?>
        <div class="twitter <?php echo $style?>">
        	<?php if($instance['title']){?>
            	<h4 class="sidebar-title"><span><?php echo $instance['sub_title']?></span><i><?php echo $instance['title']?></i></h4>
            <?php } 
			$user	=	$instance['user'];
			$num	=	$instance['num'];
			$type = 'tweets';
			include ( get_template_directory().'/framework/modules/shortcodes/query_codes.php' );
			echo $output;
		?>
        </div>
        <?php
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title']		=	strip_tags( $new_instance['title'] );
		$instance['sub_title']	=	strip_tags( $new_instance['sub_title'] );
		$instance['num']		=	strip_tags( $new_instance['num'] );
		$instance['user']		=	strip_tags( $new_instance['user'] );
		$instance['bg']			=	strip_tags( $new_instance['bg'] );	
		return $instance;
	}
	
	public function form( $instance )
	{
		$title		= 	( $instance ) ? esc_attr( $instance['title'] )	: '';
		$sub_title	= 	( $instance ) ? esc_attr( $instance['sub_title'] )	: '';
		$num		=	( $instance ) ? esc_attr( $instance['num'] ) : '' ;
		$user		=	( $instance ) ? esc_attr( $instance['user'] ) : '' ;
		$bg			=	( $instance ) ? esc_attr( $instance['bg'] ) : '' ;
		$opt		=	array( 'light' => 'Light', 'darked' => 'Dark' );
		?>
        	<p>
            <label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' );?>" name="<?php echo $this->get_field_name( 'title' );?>" type="text" value="<?php echo $title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'sub_title' );?>"><?php _e( 'Sub Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'sub_title' );?>" name="<?php echo $this->get_field_name( 'sub_title' );?>" type="text" value="<?php echo $sub_title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'user' );?>"><?php _e( 'Twitter UserName:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'user' );?>" name="<?php echo $this->get_field_name( 'user' );?>" type="text" value="<?php echo $user;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'num' );?>"><?php _e( 'Number of Posts:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'num' );?>" name="<?php echo $this->get_field_name( 'num' );?>" type="text" value="<?php echo $num;?>" />
        </p>
            <p>
         	 <label for="<?php echo $this->get_field_id('bg');?>"><?php _e('Select Background:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'bg' ); ?>" name="<?php echo $this->get_field_name( 'bg' ); ?>" >
			<?php foreach ( $opt as $k => $op ) : 	
					$selected = ( $bg == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <?php
	}
}

// sidebar instagram images
class sh_instagram extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'sh_instagram', /* Name */__('The Blog Instagram',SH_NAME), array( 'description' => __('This widgtes is used in sidebar to show your Instagram Photos', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$bg =	$instance['bg'];
		if( $bg == 'darked' ){ $style = 'darked'; }else{ $style = ''; }
		$username 	= empty($instance['user']) ? '' : $instance['user'];
		$limit 		= empty($instance['num']) ? 9 : $instance['num'];
		$mode =	$instance['mode'];
		if( $mode == 'blank' ){ $mod_type = 'target="_blank"'; }else{ $mod_type = ''; }
		echo $before_widget;
		$media_array = scrape_instagram( $username, $limit );
		?>
        <div class="instagram <?php echo $style?>">
        	<?php if($instance['title']){?>
            	<h4 class="sidebar-title"><span><?php echo $instance['sub_title']?></span><i><?php echo $instance['title']?></i></h4>
            <?php } ?>
            <div class="row">
            	<div id="insta-masonary" class="insta-masonary">
            <?php
				if ( is_wp_error( $media_array ) )
				{
					echo $media_array->get_error_message();
				} else
				{
					if ( $images_only = apply_filters( 'wpiw_images_only', FALSE ) )
					$media_array = array_filter( $media_array, array( $this, 'images_only' ) ); 
					foreach ( $media_array as $item )
					{
						echo '<div class="col-md-4"><a href="http:'. sh_set( $item, 'link' ) .'" '.$mod_type.'><img src="http:'. sh_set( sh_set( $item, 'thumbnail'), 'url') .'"  alt="'. sh_set( $item, 'description' ) .'" title="'. sh_set( $item, 'description' ).'"/></a></div>';
					}
				}
			?>
            </div>
        </div>
	</div>
        <?php
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title']		=	strip_tags( $new_instance['title'] );
		$instance['sub_title']	=	strip_tags( $new_instance['sub_title'] );
		$instance['num']		=	strip_tags( $new_instance['num'] );
		$instance['user']		=	strip_tags( $new_instance['user'] );
		$instance['bg']			=	strip_tags( $new_instance['bg'] );
		$instance['mode']		=	strip_tags( $new_instance['mode'] );
		return $instance;
	}
		
	public function form( $instance )
	{
		$title		= 	( $instance ) ? esc_attr( $instance['title'] )	: '';
		$sub_title	= 	( $instance ) ? esc_attr( $instance['sub_title'] )	: '';
		$num		=	( $instance ) ? esc_attr( $instance['num'] ) : '' ;
		$user		=	( $instance ) ? esc_attr( $instance['user'] ) : '' ;
		$bg			=	( $instance ) ? esc_attr( $instance['bg'] ) : '' ;
		$mode		=	( $instance ) ? esc_attr( $instance['mode'] ) : '' ;
		$opt		=	array( 'light' => 'Light', 'darked' => 'Dark' );
		$mod		=	array( 'parent' => 'Parent', 'blank' => 'Blank' );
		?>
        	<p>
            <label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' );?>" name="<?php echo $this->get_field_name( 'title' );?>" type="text" value="<?php echo $title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'sub_title' );?>"><?php _e( 'Sub Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'sub_title' );?>" name="<?php echo $this->get_field_name( 'sub_title' );?>" type="text" value="<?php echo $sub_title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'user' );?>"><?php _e( 'Instagram UserName:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'user' );?>" name="<?php echo $this->get_field_name( 'user' );?>" type="text" value="<?php echo $user;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'num' );?>"><?php _e( 'Number of Posts:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'num' );?>" name="<?php echo $this->get_field_name( 'num' );?>" type="text" value="<?php echo $num;?>" />
        </p>
            <p>
         	 <label for="<?php echo $this->get_field_id('bg');?>"><?php _e('Select Background:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'bg' ); ?>" name="<?php echo $this->get_field_name( 'bg' ); ?>" >
			<?php foreach ( $opt as $k => $op ) : 	
					$selected = ( $bg == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
         <p>
         	 <label for="<?php echo $this->get_field_id('mode');?>"><?php _e('Open Links In:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'mode' ); ?>" name="<?php echo $this->get_field_name( 'mode' ); ?>" >
			<?php foreach ( $mod as $k => $op ) : 	
					$selected = ( $mode == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <?php
	}
}
// sidebar social media
class sh_social_media extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'SocialMedia', /* Name */__('The Blog Social Media',SH_NAME), array( 'description' => __('This widgtes is used in sidebar to show Social Media Icons', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$bg =	$instance['bg'];
		$mode =	$instance['mode'];
		if( $bg == 'darked' ){ $style = 'darked'; }else{ $style = ''; }
		echo $before_widget;
		?>
        <div class="social-btns <?php echo $style ?>">
            <ul>
            	<?php if( $mode != 'blank' )
					  {
						  echo sh_socil_media_clr($instance['num']);
					  }else{
						  echo sh_socil_media_clr($instance['num'], '_blank');
					  }
				?>
            </ul>
        </div>
        <?php
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['num']		=	strip_tags( $new_instance['num'] );	
		$instance['bg']			=	strip_tags( $new_instance['bg'] );	
		$instance['mode']			= strip_tags( $new_instance['mode'] );
				
		return $instance;
	}
	
	public function form( $instance )
	{
		$num		= 	( $instance ) ? esc_attr( $instance['num'] )	: '';
		$bg			=	( $instance ) ? esc_attr( $instance['bg'] ) : '' ;
		$mode		=	( $instance ) ? esc_attr( $instance['mode'] ) : '' ;
		$mod	=	array( 'parent' => 'Parent', 'blank' => 'Blank' );
		$opt		=	array( 'light' => 'Light', 'darked' => 'Dark' );		
		?>
        	<p>
            <label for="<?php echo $this->get_field_id( 'num' );?>"><?php _e( 'Number of Social Icons:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'num' );?>" name="<?php echo $this->get_field_name( 'num' );?>" type="text" value="<?php echo $num;?>" />
        	</p>
            <p>
         	 <label for="<?php echo $this->get_field_id('bg');?>"><?php _e('Select Background:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'bg' ); ?>" name="<?php echo $this->get_field_name( 'bg' ); ?>" >
			<?php foreach ( $opt as $k => $op ) : 	
					$selected = ( $bg == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
         <p>
         	 <label for="<?php echo $this->get_field_id('mode');?>"><?php _e('Open Links In:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'mode' ); ?>" name="<?php echo $this->get_field_name( 'mode' ); ?>" >
			<?php foreach ( $mod as $k => $op ) : 	
					$selected = ( $mode == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <?php
	}
}

// footer about block
class sh_footer_about extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'FooterAbout', /* Name */__('The Blog Footer About Box',SH_NAME), array( 'description' => __('This widgtes is used in footer to show about us box', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$title	=	apply_filters( 'widget_title', $instance['title'] );
		$desc	=	$instance['desc'];
		
		echo $before_widget;
		?>
        	<div class="blog-about">
                <?php echo $before_title.$title.$after_title;?>
                <span><?php echo substr( $desc, 0, 1)?></span>
                <p><?php echo substr( $desc, 1)?></p>
                <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="_blank">
                	<input type="text" name="email" placeholder="Subcribe Email" required />
                    <input type="hidden" value="<?php echo $instance['feedlink']; ?>" name="uri" id="uri"/>
                    <input type="hidden" name="loc" value="en_US"/>
                    <button type="submit"><i class="fa fa-envelope"></i> </button>
                </form>
            </div>
        <?php
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title']	=	strip_tags( $new_instance['title'] );
		$instance['desc']	=	strip_tags( $new_instance['desc'] );
		$instance['feedlink'] = strip_tags($new_instance['feedlink']);
			
		return $instance;
	}
	
	public function form( $instance )
	{
		$title	= 	( $instance ) ? esc_attr( $instance['title'] )	: __( 'Why is Block', SH_NAME );
		$desc	=	( $instance ) ? esc_attr( $instance['desc'] )	: '' ;
		$link = (isset($instance['feedlink'])) ? esc_attr($instance['feedlink']) : '';
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' );?>"><?php _e( 'Title:', SH_NAME );?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' );?>" name="<?php echo $this->get_field_name( 'title' );?>" type="text" value="<?php echo $title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'desc' );?>"><?php _e( 'Description:', SH_NAME );?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'desc' );?>" name="<?php echo $this->get_field_name( 'desc' );?>" type="text" ><?php echo $desc;?></textarea>
        </p>
        <p>
        	<label for="<?php echo $this -> get_field_id('feedlink'); ?>"><?php _e('Feedburner Link:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this -> get_field_id('feedlink'); ?>"
                   name="<?php echo $this -> get_field_name('feedlink'); ?>" type="text" value="<?php echo $link; ?>"/>
        </p>
        <?php
	}
}

// recent article
class sh_recent_blog extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'recentblog', /* Name */__('The Blog Recent Article',SH_NAME), array( 'description' => __('This widgtes is used to show Recent Posts to Footer', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$number = apply_filters( 'widget_number', $instance['number'] );
		$order_by = apply_filters( 'widget_order_by', $instance['order_by'] );
		$order = apply_filters( 'widget_order', $instance['order'] );
		$post_args = array( 'post_type' => 'post' ,  'showposts' => $number , 'orderby'=> $order_by , 'order'=> $order );
		query_posts( $post_args );
		echo $before_widget;
        ?>
            <div class="recent-post">
                <h3><?php echo $title?></h3>
                <ul>
                <?php if(have_posts()): while(have_posts()): the_post(); ?>
                    <li>
                        <?php if( has_post_thumbnail() ): ?><span><?php the_post_thumbnail( '180x180' )?></span><?php endif; ?>
                        <h3><a href="<?php the_permalink() ?>" title="<?php the_title()?>"><?php the_title()?></a></h3>
                        <i><?php echo get_the_date( 'F d, Y' )?></i>
                        <p><?php echo substr( get_the_content(), 0, 70 )?></p>
                    </li>
                <?php endwhile; endif ; wp_reset_query(); ?>
                </ul>
            </div>
        
		<?php
		echo $after_widget ;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title']		= strip_tags( $new_instance['title'] );
		$instance['number']		= strip_tags( $new_instance['number'] );
		$instance['order_by']	= strip_tags( $new_instance['order_by'] );
		$instance['order']		= strip_tags( $new_instance['order'] );
		return $instance;
	}
	
	public function form($instance)
	{
		$title		= ( $instance ) ? esc_attr( $instance['title'] ) : '';
		$number		= ( $instance ) ? esc_attr( $instance['number'] ) : '' ;
		$order_by	= ( $instance ) ? esc_attr( $instance['order_by'] ) : '';
		$order		= ( $instance ) ? esc_attr( $instance['order'] ) : '' ;
		?>
        <p>
            <label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title:', SH_NAME);?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" />
        </p>
         <p>
            <label for="<?php echo $this->get_field_id('number');?>"><?php _e('Number:', SH_NAME);?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('number');?>" name="<?php echo $this->get_field_name('number');?>" type="text" value="<?php echo $number;?>" />
        </p>
         <p>
            <label for="<?php echo $this->get_field_id('order_by');?>"><?php _e('Order By:', SH_NAME);?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('order_by');?>" name="<?php echo $this->get_field_name('order_by');?>" >
            	<option value="date" <?php if($order_by == 'date') :?> selected="selected" <?php endif; ?>> <?php _e("Date" , SH_NAME); ?></option>
                <option value="title" <?php if($order_by == 'title') :?> selected="selected" <?php endif; ?>><?php _e("Title" , SH_NAME); ?> </option>
                <option value="name" <?php if($order_by == 'name') :?> selected="selected" <?php endif; ?>> <?php _e("Name" , SH_NAME); ?> </option>
                <option value="author" <?php if($order_by == 'author') :?> selected="selected" <?php endif; ?>><?php _e("Author" , SH_NAME); ?> </option>
                <option value="comment_count" <?php if($order_by == 'comment_count') :?> selected="selected" <?php endif; ?>><?php _e("Comment Count" , SH_NAME); ?> </option>
            	<option value="random" <?php if($order_by == 'random') :?> selected="selected" <?php endif; ?>><?php _e("Random" , SH_NAME); ?> </option>
            </select>
        </p>
         <p>
            <label for="<?php echo $this->get_field_id('order');?>"><?php _e('Order:', SH_NAME);?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('order');?>" name="<?php echo $this->get_field_name('order');?>" >
            	<option value="ASC" <?php if($order == 'ASC') :?> selected="selected" <?php endif; ?>> <?php _e("Ascending Order" , SH_NAME); ?></option>
                <option value="DESC" <?php if($order == 'DESC') :?> selected="selected" <?php endif; ?>><?php _e("Descending Order" , SH_NAME); ?> </option>
                
            </select>
        </p>
        <?php 
	}
}

// recent article
class sh_post_tabber extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'PostTabber', /* Name */__('The Blog Posts Tabber',SH_NAME), array( 'description' => __('This widgtes is used to show Recent Posts, Most Viewed Posts and Recent Comments', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$number  = apply_filters( 'widget_number', $instance['num'] );
		$sorting_order 	= 	'';
		$sort_by		=	'';
		echo $before_widget;
        $type = 'post_tabber';
		include (get_template_directory().'/framework/modules/shortcodes/post_widgets.php' );
		echo $output;
		echo $after_widget ;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['num']		= strip_tags( $new_instance['num'] );
		return $instance;
	}
	
	public function form($instance)
	{
		$num		= ( $instance ) ? esc_attr( $instance['num'] ) : 3;
		?>
        <p>
            <label for="<?php echo $this->get_field_id('num');?>"><?php _e('Number of Posts:', SH_NAME);?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('num');?>" type="text" value="<?php echo $num;?>" />
        </p>
        <?php 
	}
}

// author profie
class sh_author_profile extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'AuthorProfiles', /* Name */__('The Blog Author Profile',SH_NAME), array( 'description' => __('This widgtes is used to show Author Profiles', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$number = apply_filters( 'widget_number', $instance['number'] );
		$post_args = array( 'post_type' => 'blog_profile' ,  'showposts' => $number );
		$query = new WP_Query( $post_args );
		echo $before_widget;
		$counter = 0;
		$counter2 = 0;
        ?>
            <div class="author-desk-tab">
                <h3><?php echo $title?></h3>
                <div class="row">
                	<ul role="tablist" class="nav nav-tabs author-tab-carousal">
                <?php if( $query->have_posts()): while( $query->have_posts() ): $query->the_post();
						$settings  = get_post_meta(get_the_ID(), 'sh_profile_meta', true );
						if( sh_set( $settings, 'sh_po_img' ) ):
							$tem  = explode( '.', sh_set( $settings, 'sh_po_img' ) );
							$ext = array_pop( $tem );
							$val = implode( '.', $tem );
						endif;
				?>
                    <li<?php if( 0  == $counter ) echo ' class="active"';?>>
                        <a data-toggle="tab" role="tab" href="#author-tab<?php echo $counter++;?>">
							<?php if( sh_set( $settings, 'sh_po_img' ) ): ?><img src="<?php echo $val.'-180x180.'.$ext?>" alt= "" /><?php endif; ?>
						</a>
                    </li>
                <?php endwhile; endif ; wp_reset_query(); ?>
                </ul>
            </div>
            
            <div class="tab-content">
            	<?php if( $query->have_posts()): while( $query->have_posts() ): $query->the_post(); $settings  = get_post_meta( get_the_ID(), 'sh_profile_meta', true ); ?>
                	<div id="author-tab<?php echo $counter2++;?>" class="tab-pane fade <?php if( 1  == $counter2 ) echo 'in active';?>">
                    	<div class="author-desk-info">
                        	<h4><?php the_title()?></h4>
                            <p><?php echo substr( sh_set( $settings, 'sh_po_desc' ), 0, 100 );?></p>
                        </div>
                    </div>
                <?php endwhile; endif ; wp_reset_query(); ?>
			</div>
		</div>
        <script>
			jQuery(document).ready(function($) {
                $(".author-tab-carousal").owlCarousel({
					autoPlay :true,
					stopOnHover : true,
					goToFirstSpeed : 500,
					slideSpeed:5000,
					autoHeight : true,
					transitionStyle:"fade",
					navigation:false,
					items : 3,
					pagination:false
				});		
            });
        </script>
		<?php
		echo $after_widget ;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title']		= strip_tags( $new_instance['title'] );
		$instance['number']		= strip_tags( $new_instance['number'] );
		return $instance;
	}
	
	public function form($instance)
	{
		$title		= ( $instance ) ? esc_attr( $instance['title'] ) : '';
		$number		= ( $instance ) ? esc_attr( $instance['number'] ) : '' ;
		?>
        <p>
            <label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title:', SH_NAME);?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" />
        </p>
         <p>
            <label for="<?php echo $this->get_field_id('number');?>"><?php _e('Number:', SH_NAME);?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('number');?>" name="<?php echo $this->get_field_name('number');?>" type="text" value="<?php echo $number;?>" />
        </p>
        <?php 
	}
}

// author single profie
class sh_author_single_profile extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'AuthorSingleProfiles', /* Name */__('The Blog Author Single Profile',SH_NAME), array( 'description' => __('This widgtes is used to show Author Single Profiles', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$post  = apply_filters( 'widget_post', $instance['post'] );
		$skill  = apply_filters( 'widget_skill', $instance['skill'] );
		$perc  = apply_filters( 'widget_perc', $instance['percnt'] );
		$post_args = array( 'post_type' => 'blog_profile', 'p' => $post,  'posts_per_page' => 1 );
		$query = new WP_Query( $post_args );
		echo $before_widget;
		$counter = 0;
		$counter2 = 0;
        ?>
        	<div class="author-widget-sec">
                <h3><?php echo $title?></h3>
                <div class="row">
                <?php if( $query->have_posts()): while( $query->have_posts() ): $query->the_post();
						$settings  = get_post_meta( get_the_ID(), 'sh_profile_meta', true );
						if( sh_set( $settings, 'sh_po_img' ) ):
							$tem  = explode( '.', sh_set( $settings, 'sh_po_img' ) );
							$ext = array_pop( $tem );
							$val = implode( '.', $tem );
						endif;
				?>
                	<div class="author-widget">
                    	<div class="col-md-6">
                            <span class="author-thumb-widgt">
                               <?php if( sh_set( $settings, 'sh_po_img' ) ): ?><img src="<?php echo $val.'-180x180.'.$ext?>" alt= "" /><?php endif; ?>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <h3><?php the_title()?></h3>
                            <div class="progress">
                                <i><?php echo $skill?></i>
                                <div style="width: <?php echo $perc?>;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar">
                                <?php echo $perc?>
                                </div>
                            </div>
                            <p><?php echo substr( sh_set( $settings, 'sh_po_desc' ), 0, 50 );?></p>
                        </div>
                    </div>    
                <?php endwhile; endif ; wp_reset_query(); ?>
            </div>
		</div>
		<?php
		echo $after_widget ;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title']		= strip_tags( $new_instance['title'] );
		$instance['post']		= strip_tags( $new_instance['post'] );
		$instance['skill']		= strip_tags( $new_instance['skill'] );
		$instance['percnt']		= strip_tags( $new_instance['percnt'] );
		return $instance;
	}
	
	public function form($instance)
	{
		$title		= ( $instance ) ? esc_attr( $instance['title'] ) : '';
		$post		= ( $instance ) ? esc_attr( $instance['post'] ) : '';
		$skill		= ( $instance ) ? esc_attr( $instance['skill'] ) : 'SEO Skills';
		$percnt		= ( $instance ) ? esc_attr( $instance['percnt'] ) : '60%';
		$posts = sh_get_posts();
		?>
        <p>
            <label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title:', SH_NAME);?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('skill');?>"><?php _e('Skill Name:', SH_NAME);?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('skill');?>" name="<?php echo $this->get_field_name('skill');?>" type="text" value="<?php echo $skill;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('percnt');?>"><?php _e('Percent Age:', SH_NAME);?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('percnt');?>" name="<?php echo $this->get_field_name('percnt');?>" type="text" value="<?php echo $percnt;?>" />
        </p>
         <p>
         	 <label for="<?php echo $this->get_field_id('post');?>"><?php _e('Select Profile:', SH_NAME);?></label>
         	 <select class="widefat" id="<?php echo $this->get_field_id( 'post' ); ?>" name="<?php echo $this->get_field_name( 'post' ); ?>" >
			<?php foreach ( $posts as $k => $op ) : 	
					$selected = ( $post == $k ) ? 'selected="selected"' : '';
					echo '<option value="'.$k.'" '.$selected.'>'.$op.'</option>';
				  endforeach; ?>
			</select>
         </p>
        <?php 
	}
}

// google adds box
class sh_google_ads_box extends WP_Widget
{
	public function __construct()
	{
		parent::__construct( /* Base ID */'GoogleAds', /* Name */__('The Blog Google Ads Box',SH_NAME), array( 'description' => __('This widgtes is used to show Google Ads Box', SH_NAME )) );
	}
	
	public function widget( $args, $instance )
	{
		extract( $args );
		$ads = apply_filters( 'widget_google', $instance['google'] );
		echo $before_widget;
        ?>
        	<div class="google_ads">
            	<?php echo $ads;?>
            </div>
		<?php
		echo $after_widget ;
	}
	
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['google']		=  $new_instance['google'];
		return $instance;
	}
	
	public function form($instance)
	{
		$google		= ( $instance ) ? $instance['google']  : '';
		?>
        <p>
        	<label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Enter Your Code:', SH_NAME); ?></label> 
            <textarea class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" ><?php echo $google; ?></textarea></p>
         
        <p>
        <?php 
	}
}