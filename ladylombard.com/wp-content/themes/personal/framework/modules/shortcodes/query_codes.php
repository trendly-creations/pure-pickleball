<?php
if( $type == 'blog_post_image_carousel' )
{
	ob_start();
	$args = array(
					'post_type'			=>	'post',
					'post_status'		=>	'publish',
					'cat'				=>	(int)$cat,
					'posts_per_page'	=>	$number,
					'sort_by' 			=> 	$sort_by,
					'order' 			=> 	$sorting_order,
				);
		query_posts($args);
		$counter = 1;
		$counter2 = 1;
	?>
        <div class="multimedia widget <?php echo $back_ground?>">
        	<?php if($col_title){?>
                <h4 class="sidebar-title"><span><?php echo $col_sub_title?></span><i><?php echo $col_title?></i></h4>
            <?php } ?>
            <div class="multimedia-tabs">
                <div class="tab-content">
                	<?php while( have_posts() ): the_post(); ?>
                    <?php if( has_post_thumbnail() ): ?>
                        <div id="media-tab<?php echo $counter++?>" class="tab-pane fade <?php if( 2 == $counter ): echo 'in active'; endif;?>">
                            <?php the_post_thumbnail( '308x150' );?>
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
                <?php endif; endwhile; ?>
                <?php wp_reset_query();?>
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
	$output = ob_get_contents();
	ob_clean();
}else if( $type == 'blog_testimonial' )
{
	ob_start();
	$args = array(
					'post_type'			=>	'blog_testimonials',
					'post_status'		=>	'publish',
					'posts_per_page'	=>	$number,
					'sort_by' 			=> 	$sort_by,
					'order' 			=> 	$sorting_order,
				);
		query_posts($args);
		$counter = 1;
		$counter2 = 1;
		?>
        <div class="testimonials widget <?php echo $back_ground?>">
        	<?php if($col_title){?>
                <h4 class="sidebar-title"><span><?php echo $col_sub_title?></span><i><?php echo $col_title?></i></h4>
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
                    <?php endwhile; ?>
                    <?php wp_reset_query();?>
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
        $output = ob_get_contents();
		ob_clean();
}else if( $type == 'blog_post_single_image_carousel' )
{
	ob_start();
	$args = array(
					'post_type'			=>	'post',
					'post_status'		=>	'publish',
					'cat'				=>	(int)$cat,
					'posts_per_page'	=>	$number,
					'sort_by' 			=> 	$sort_by,
					'order' 			=> 	$sorting_order,
				);
		query_posts($args);
		?>
        <div class="fashion-carousal widget <?php echo $back_ground?>">
        	<?php if($col_title){?>
                <h4 class="sidebar-title"><span><?php echo $col_sub_title?></span><i><?php echo $col_title?></i></h4>
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
                    <?php endif; endwhile; ?>
                    <?php wp_reset_query();?>
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
        $output = ob_get_contents();
		ob_clean();
}else if( $type == 'blog_latest_post_carousel' )
{
	ob_start();
	$args = array(
					'post_type'			=>	'post',
					'post_status'		=>	'publish',
					'cat'				=>	(int)$cat,
					'posts_per_page'	=>	$number,
					'sort_by' 			=> 	$sort_by,
					'order' 			=> 	$sorting_order,
				);
		query_posts($args); 
		$post = array();
		$post_counter = 0;
		$counter = 1;
		?>
        <div class="latest-post widget <?php echo $back_ground?>">
        	<?php if($col_title){?>
                <h4 class="sidebar-title"><span><?php echo $col_sub_title?></span><i><?php echo $col_title?></i></h4>
            <?php } ?>
            <div class="latest-post-sec">
                	<?php while( have_posts() ): the_post(); ?>
                    <?php if( has_post_thumbnail() ): 
							$post_counter++;
                    		$post[]= '<li>'.get_the_post_thumbnail( get_the_ID(), array(370, 216) ).'<div class="title"><h3><a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h3></div></li>';
							
                    endif; endwhile;?>
                    <?php wp_reset_query();?>
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
        $output = ob_get_contents();
		ob_clean();
}else if( $type == 'faqs' )
{
	ob_start();
	$settings = get_option( SH_NAME . '_theme_options' );
	$faqs = sh_set( sh_set( $settings, 'sah_faqs' ), 'sah_faqs' );
	$counter = 0;
	?>
	<div class="accordian widget <?php echo $back_ground?>">
    	<?php if($col_title){?>
            <h4 class="sidebar-title"><span><?php echo $col_sub_title?></span><i><?php echo $col_title?></i></h4>
        <?php } ?>
		<div id="toggle-widget" class="accordian-widget">
			<?php 
				foreach( $faqs as $faq )
				{
					if( sh_set( $faq, 'tocopy' ) || $counter == $number ) break;
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
	$output = ob_get_contents();
	ob_clean();
}else if( $type == 'our_partners' )
{
	ob_start();
	$settings = get_option( SH_NAME . '_theme_options' );
		$partners = sh_set( sh_set( $settings, 'dynamic_partners' ), 'dynamic_partners' );
		$counter = 0;
		?>
        <div class="partners widget <?php echo $back_ground?>">
        	<?php if($col_title){?>
                <h4 class="sidebar-title"><span><?php echo $col_sub_title?></span><i><?php echo $col_title?></i></h4>
            <?php } ?>
            <div id="partner-carousal" class="partner-carousal">
            	<div class="row">
            	<?php 
					if( $partners )
					{
						foreach( $partners as $partner )
						{
							if( sh_set( $partner, 'tocopy' ) || $counter == $number ) break;
					?>
								<div class="col-md-6">
									<a href="<?php echo sh_set( $partner, 'partner_link' )?>" title="" class="partner"><img src="<?php echo sh_set( $partner, 'partner_img' )?>" alt="" /></a>
								</div>
                <?php $counter++;if( $counter % 4 == 0 && $counter != $number ): echo'</div><div class="row">'; endif; } } ?>
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
	$output = ob_get_contents();
	ob_clean();
}else if( $type == 'blog_latest_news_carousel' )
{
	ob_start();
	$args = array(
					'post_type'			=>	'post',
					'post_status'		=>	'publish',
					'cat'				=>	(int)$cat,
					'posts_per_page'	=>	$number,
					'sort_by' 			=> 	$sort_by,
					'order' 			=> 	$sorting_order,
				);
		query_posts($args); 
		$post = array();
		$post_counter = 0;
		$counter = 1;
		?>
        <div class="news widget <?php echo $back_ground?>">
            <?php if($col_title){?>
                <h4 class="sidebar-title"><span><?php echo $col_sub_title?></span><i><?php echo $col_title?></i></h4>
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
                    <?php endif; endwhile;?>
                    <?php wp_reset_query() ?>
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
	$output = ob_get_contents();
	ob_clean();
}else if( $type == 'blog_categories' )
{
	ob_start();
	$cat_args = array( 'orderby' => 'name', 'show_count' => (int)$post_count );
		?>
		<div class="categories widget <?php echo $back_ground?>">
            <?php if($col_title){?>
            	<h4 class="sidebar-title"><span><?php echo $col_sub_title?></span><i><?php echo $col_title?></i></h4>
            <?php } ?>
         <ul>
			<?php
            $cat_args['title_li'] = '';
            wp_list_categories( apply_filters( 'widget_categories_args', $cat_args ) );
            ?>
		</ul>
	</div>
	<?php
	$output = ob_get_contents();
	ob_clean();
}else if( $type == 'tweets' )
{
	ob_start();
	wp_enqueue_script(array('lodash'));
	?>
	<div class="twitter">
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
	$output = ob_get_contents();
	ob_clean();
}else if( $type == 'blog_creative_team' )
{
	ob_start();
	$args = array(
					'post_type'			=>	'blog_profile',
					'post_status'		=>	'publish',
					'posts_per_page'	=>	$number,
				);
		$profile_query = new WP_Query($args); 
		?>
        <div class="team widget <?php echo $back_ground?>">
            <?php if($col_title){?>
            	<h4 class="sidebar-title"><span><?php echo $col_sub_title?></span><i><?php echo $col_title?></i></h4>
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
	$output = ob_get_contents();
	ob_clean();
}


