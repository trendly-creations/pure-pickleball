<?php
if( $type == 'featured_video_gallery')
{
	ob_start();
    global $wp_query;
	$general_settings 	= '';	
	$paged	 			= get_query_var('paged');	
	$args 				= array('post_type' => 'webinane_galleries', 'showposts' => 1 , 'order' => $sorting_order, 'orderby' => $sort_by, 'post_status' => 'publish');
	$args2 				= array('post_type' => 'webinane_galleries', 'showposts' => 1 , 'order' => $sorting_order, 'orderby' => $sort_by,  'post_status' => 'publish', 'offset' => 1);
	$args3 				= array('post_type' => 'webinane_galleries', 'showposts' => 1 , 'order' => $sorting_order, 'orderby' => $sort_by,  'post_status' => 'publish', 'offset' => 2);
	$args4 				= array('post_type' => 'webinane_galleries', 'showposts' => 1 , 'order' => $sorting_order, 'orderby' => $sort_by,  'post_status' => 'publish', 'offset' => 3);
	$args5 				= array('post_type' => 'webinane_galleries', 'showposts' => 1 , 'order' => $sorting_order, 'orderby' => $sort_by,  'post_status' => 'publish', 'offset' => 4);	
	$t 					= $GLOBALS['webinane_gal'];
	
	if( $cat && $cat != " " ) $args['tax_query'] = array( array( 'taxonomy' => 'gallery_category', 'field' => 'id', 'terms' => (int)$cat ) ); 
	if( $cat && $cat != " " ) $args2['tax_query'] = array( array( 'taxonomy' => 'gallery_category', 'field' => 'id', 'terms' => (int)$cat ) ); 
	if( $cat && $cat != " " ) $args3['tax_query'] = array( array( 'taxonomy' => 'gallery_category', 'field' => 'id', 'terms' => (int)$cat ) ); 
	if( $cat && $cat != " " ) $args4['tax_query'] = array( array( 'taxonomy' => 'gallery_category', 'field' => 'id', 'terms' => (int)$cat ) ); 
	if( $cat && $cat != " " ) $args5['tax_query'] = array( array( 'taxonomy' => 'gallery_category', 'field' => 'id', 'terms' => (int)$cat ) ); 
	?>
	<?php 		
    $query =  new WP_Query($args);
	echo '<div class="row">';
    while ($query->have_posts()) : $query->the_post();						
        $gal = $t->gallery_array(get_the_ID(), '460x399'); 
        $counter = 0;       
        foreach ($gal as $g):
        if( 1 == $counter ) break;?>
            <div class="col-md-6">
            <div class="post-style-video">
            	<?php if( $hover == 'true' ):?>
                    <div class="hover">	
                        <img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                        <ul>
                            <li><a data-width="1000" data-height="700" class="html5lightbox" href="<?php echo sh_set( $g, 'url' )?>" title=""><i class="fa fa-play"></i></a></li>
                            <li><a href="<?php the_permalink();?>" title=""><i class="fa fa-link"></i></a></li>
                        </ul>
                    </div>
                <?php else: ?>
                	<img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                <?php endif; ?>
                <div class="video-heading">
                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                </div>
            </div><!-- Post Style Video -->
        </div>                          
    <?php $counter++; endforeach; endwhile; wp_reset_query();?> 
    
    <?php 		
    $query = new WP_Query($args2);
    while ($query->have_posts()) : $query->the_post();						
        $gal = $t->gallery_array(get_the_ID(), '460x399'); 
        $counter = 0;       
        foreach ($gal as $g):
        if( 1 == $counter ) break;?>
            <div class="col-md-3">
            <div class="post-style-video">
            	<?php if( $hover == 'true' ):?>
                    <div class="hover">	
                        <img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                        <ul>
                            <li><a data-width="1000" data-height="700" class="html5lightbox" href="<?php echo sh_set( $g, 'url' )?>" title=""><i class="fa fa-play"></i></a></li>
                            <li><a href="<?php the_permalink();?>" title=""><i class="fa fa-link"></i></a></li>
                        </ul>
                    </div>
                <?php else: ?>
                	<img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                <?php endif; ?>
                <div class="video-heading">
                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                </div>
            </div><!-- Post Style Video -->
        </div>                          
    <?php $counter++; endforeach; endwhile; wp_reset_query();?>
    
    <?php 		
    $query = new WP_Query($args3);
    while ($query->have_posts()) : $query->the_post();						
        $gal = $t->gallery_array(get_the_ID(), '460x399'); 
        $counter = 0;       
        foreach ($gal as $g):
        if( 1 == $counter ) break;?>
            <div class="col-md-3">
            <div class="post-style-video">
            	<?php if( $hover == 'true' ):?>
                    <div class="hover">	
                        <img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                        <ul>
                            <li><a data-width="1000" data-height="700" class="html5lightbox" href="<?php echo sh_set( $g, 'url' )?>" title=""><i class="fa fa-play"></i></a></li>
                            <li><a href="<?php the_permalink();?>" title=""><i class="fa fa-link"></i></a></li>
                        </ul>
                    </div>
                <?php else: ?>
                	<img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                <?php endif; ?>
                <div class="video-heading">
                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                </div>
            </div><!-- Post Style Video -->
        </div>                          
    <?php $counter++; endforeach; endwhile; wp_reset_query();?>
    
    <?php 		
    $query = new WP_Query($args4);
    while ($query->have_posts()) : $query->the_post();						
        $gal = $t->gallery_array(get_the_ID(), '770x418'); 
        $counter = 0;       
        foreach ($gal as $g):
        if( 1 == $counter ) break;?>
            <div class="col-md-3">
            <div class="post-style-video">
            	<?php if( $hover == 'true' ):?>
                    <div class="hover">	
                        <img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                        <ul>
                            <li><a data-width="1000" data-height="700" class="html5lightbox" href="<?php echo sh_set( $g, 'url' )?>" title=""><i class="fa fa-play"></i></a></li>
                            <li><a href="<?php the_permalink();?>" title=""><i class="fa fa-link"></i></a></li>
                        </ul>
                    </div>
                <?php else: ?>
                	<img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                <?php endif; ?>
                <div class="video-heading">
                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                </div>
            </div><!-- Post Style Video -->
        </div>                          
    <?php $counter++; endforeach; endwhile; wp_reset_query();?>
    
    <?php 		
    $query = new WP_Query($args5);
    while ($query->have_posts()) : $query->the_post();						
        $gal = $t->gallery_array(get_the_ID(), '460x399'); 
        $counter = 0;       
        foreach ($gal as $g):
        if( 1 == $counter ) break;?>
            <div class="col-md-3">
            <div class="post-style-video">
            	<?php if( $hover == 'true' ):?>
                    <div class="hover">	
                        <img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                        <ul>
                            <li><a data-width="1000" data-height="700" class="html5lightbox" href="<?php echo sh_set( $g, 'url' )?>" title=""><i class="fa fa-play"></i></a></li>
                            <li><a href="<?php the_permalink();?>" title=""><i class="fa fa-link"></i></a></li>
                        </ul>
                    </div>
                <?php else: ?>
                	<img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                <?php endif; ?>
                <div class="video-heading">
                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                </div>
            </div><!-- Post Style Video -->
        </div>                          
    <?php $counter++; endforeach; endwhile; wp_reset_query();?>
    </div>
<?php 
$output = ob_get_contents();
ob_clean();
}else if( $type == 'boxed_video_gallery')
{
	ob_start();
    global $wp_query;
	$paged	 			= get_query_var('paged');	
	$args 				= array('post_type' => 'webinane_galleries', 'showposts' => $number, 'order' => $sorting_order, 'orderby' => $sort_by, 'post_status' => 'publish');
	$t 					= $GLOBALS['webinane_gal'];
	if( $cat && $cat != " " ) $args['tax_query'] = array( array( 'taxonomy' => 'gallery_category', 'field' => 'id', 'terms' => (int)$cat ) ); 
	?>
    <?php 
    $query = new WP_Query($args);
	echo '<div class="row">';
    while ($query->have_posts()) : $query->the_post();						
        $gal = $t->gallery_array(get_the_ID(), '770x418'); 
        $counter = 0;       
        foreach ($gal as $g):
        if( 1 == $counter ) break;?>
            <div class="col-md-6">
            <div class="post-style-video boxed_style">
            	<?php if( $hover == 'true' ):?>
                    <div class="hover">	
                        <img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                        <ul>
                            <li><a data-width="1000" data-height="700" class="html5lightbox" href="<?php echo sh_set( $g, 'url' )?>" title=""><i class="fa fa-play"></i></a></li>
                            <li><a href="<?php the_permalink();?>" title=""><i class="fa fa-link"></i></a></li>
                        </ul>
                     </div>
                    <div class="video-heading style2">
                        <span><?php echo sh_get_post_view( get_the_ID() )?><i><?php _e( 'View', SH_NAME )?></i></span><h3><h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3></h3>
                        <ul class="social-btns">
                            <?php echo sh_socil_media( sh_set( $g, 'title' ), sh_set( $g, 'url' ), sh_set( $g, 'desc' ) ); ?>
                        </ul>
                    </div>
                <?php else: ?>
                	<img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                    <div class="video-heading style2">
                            <span><?php echo sh_get_post_view( get_the_ID() )?><i><?php _e( 'View', SH_NAME )?></i></span><h3><h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3></h3>
                            <ul class="social-btns">
                                <?php echo sh_socil_media( sh_set( $g, 'title' ), get_the_permalink(), sh_set( $g, 'desc' ) ); ?>
                            </ul>
                        </div>
                <?php endif; ?>
            </div><!-- Post Style Video -->
        </div>                          
    <?php $counter++; endforeach; endwhile; wp_reset_query();?>
    </div>
<?php 
$output = ob_get_contents();
ob_clean();
}else if( $type == 'blog_single_gallery' ) {
	ob_start();
    global $wp_query;	
	$args 				= array('post_type' => 'webinane_galleries', 'showposts' => 1, 'post_status' => 'publish', 'p' => $post_id);
	$t 					= $GLOBALS['webinane_gal'];
	?>
    <?php 		
    $query = new WP_Query($args);
    while ($query->have_posts()) : $query->the_post();						
        $gal = $t->gallery_array(get_the_ID(), '770x418'); 
        $counter = 0;       
        foreach ($gal as $g):
        if( 1 == $counter ) break;?>
            <div class="post-style-video boxed_style_single">
            	<?php if( $hover == 'true' ):?>
                    <div class="hover">	
                        <img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                        <ul>
                            <li><a data-width="1000" data-height="700" class="html5lightbox" href="<?php echo sh_set( $g, 'url' )?>" title=""><i class="fa fa-play"></i></a></li>
                            <li><a href="<?php the_permalink();?>" title=""><i class="fa fa-link"></i></a></li>
                        </ul>
                     </div>
                    <div class="video-heading style2">
                        <span><?php echo sh_get_post_view( get_the_ID() )?><i><?php _e( 'View', SH_NAME )?></i></span><h3><h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3></h3>
                        <ul class="social-btns">
                            <?php echo sh_socil_media( sh_set( $g, 'title' ), sh_set( $g, 'url' ), sh_set( $g, 'desc' ) ); ?>
                        </ul>
                    </div>
                <?php else: ?>
                	<img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                    <div class="video-heading style2">
                            <span><?php echo sh_get_post_view( get_the_ID() )?><i><?php _e( 'View', SH_NAME )?></i></span><h3><h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3></h3>
                            <ul class="social-btns">
                                <?php echo sh_socil_media( sh_set( $g, 'title' ), get_the_permalink(), sh_set( $g, 'desc' ) ); ?>
                            </ul>
                        </div>
                <?php endif; ?>
            </div><!-- Post Style Video -->                        
    <?php $counter++; endforeach; endwhile; wp_reset_query();?>
    
<?php 
$output = ob_get_contents();
ob_clean();
}else if( $type == 'boxed_video_gallery')
{
	ob_start();
    global $wp_query;
	$paged	 			= get_query_var('paged');	
	$args 				= array('post_type' => 'webinane_galleries', 'showposts' => $number, 'order' => $sorting_order, 'orderby' => $sort_by, 'post_status' => 'publish');
	$t 					= $GLOBALS['webinane_gal'];
	if( $cat && $cat != " " ) $args['tax_query'] = array( array( 'taxonomy' => 'gallery_category', 'field' => 'id', 'terms' => (int)$cat ) ); 
	?>
    <?php 
    $query = new WP_Query($args);
    while ($query->have_posts()) : $query->the_post();						
        $gal = $t->gallery_array(get_the_ID(), '770x418'); 
        $counter = 0;       
        foreach ($gal as $g):
        if( 1 == $counter ) break;?>
            <div class="col-md-6">
            <div class="post-style-video boxed_style">
            	<?php if( $hover == 'true' ):?>
                    <div class="hover">	
                        <img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                        <ul>
                            <li><a data-width="1000" data-height="700" class="html5lightbox" href="<?php echo sh_set( $g, 'url' )?>" title=""><i class="fa fa-play"></i></a></li>
                            <li><a href="<?php the_permalink();?>" title=""><i class="fa fa-link"></i></a></li>
                        </ul>
                     </div>
                    <div class="video-heading style2">
                        <span><?php echo sh_get_post_view( get_the_ID() )?><i><?php _e( 'View', SH_NAME )?></i></span><h3><h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3></h3>
                        <ul class="social-btns">
                            <?php echo sh_socil_media( sh_set( $g, 'title' ), sh_set( $g, 'url' ), sh_set( $g, 'desc' ) ); ?>
                        </ul>
                    </div>
                <?php else: ?>
                	<img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                    <div class="video-heading style2">
                            <span><?php echo sh_get_post_view( get_the_ID() )?><i><?php _e( 'View', SH_NAME )?></i></span><h3><h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3></h3>
                            <ul class="social-btns">
                                <?php echo sh_socil_media( sh_set( $g, 'title' ), get_the_permalink(), sh_set( $g, 'desc' ) ); ?>
                            </ul>
                        </div>
                <?php endif; ?>
            </div><!-- Post Style Video -->
        </div>                          
    <?php $counter++; endforeach; endwhile; wp_reset_query();?>
    
<?php 
$output = ob_get_contents();
ob_clean();
}else if( $type == 'blog_gallery_style_3' ) {
	ob_start();
    global $wp_query;	
	$args 				= array('post_type' => 'webinane_galleries', 'showposts' => $number, 'order' => $sorting_order, 'orderby' => $sort_by, 'post_status' => 'publish');
	$t 					= $GLOBALS['webinane_gal'];
	if( $cat && $cat != " " ) $args['tax_query'] = array( array( 'taxonomy' => 'gallery_category', 'field' => 'id', 'terms' => (int)$cat ) ); 
	?>
    <?php 		
    $query = new WP_Query($args);
	echo '<div class="row" id="gallery_sec">';
    while ($query->have_posts()) : $query->the_post();						
        $gal = $t->gallery_array(get_the_ID(), '770x418'); 
        $counter = 0;       
        foreach ($gal as $g):
        if( 1 == $counter ) break;?>
        	<div class="col-md-3">
                <div class="project gallery_project">
                    <img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                    <div class="title">
                        <div class="project-title">
                            <h3><a href="<?php the_permalink();?>" title=""><?php echo sh_set($g, 'title'); ?></a></h3>
                        </div>
                    </div>
                    <a href="<?php the_permalink();?>" title=""><i class="fa fa-link"></i></a>
                </div>
            </div>
           
    <?php $counter++; endforeach; endwhile; wp_reset_query();?>
     </div>
<?php 
$output = ob_get_contents();
ob_clean();
}else if( $type == 'blog_gallery_style_4' ) {
	ob_start();
    global $wp_query;	
	$args 				= array('post_type' => 'webinane_galleries', 'showposts' => $number, 'order' => $sorting_order, 'orderby' => $sort_by, 'post_status' => 'publish');
	$t 					= $GLOBALS['webinane_gal'];
	if( $cat && $cat != " " ) $args['tax_query'] = array( array( 'taxonomy' => 'gallery_category', 'field' => 'id', 'terms' => (int)$cat ) ); 
	?>
    <?php 		
    $query = new WP_Query($args);
	echo '<div class="row">';
    while ($query->have_posts()) : $query->the_post();						
        $gal = $t->gallery_array(get_the_ID(), '770x418'); 
        $counter = 0;       
        foreach ($gal as $g):
        if( 1 == $counter ) break;?>
        	<div class="col-md-4">
                <div class="gallery4">
                    <div class="gallery4-thumb gallery_style_4">
                        <img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                        <ul>
                            <li><a href="<?php the_permalink();?>" title=""><i class="fa fa-link"></i></a></li>
                            <li><a data-width="1000" data-height="700" class="html5lightbox" href="<?php echo sh_set( $g, 'url' )?>" title=""><i class="fa fa-search"></i></a></li>
                            
                        </ul>
                    </div>
                    <div class="gallery4-info">
                        <span><i class="fa fa-eye"></i><?php echo sh_get_post_view( get_the_ID() )?></span>
                        <h3><a href="<?php the_permalink();?>" title=""><?php the_title()?></a></h3>
                        <div class="gallery-category">
                            <?php sh_get_term( 5, ",", 'gallery_category', get_the_ID() );?>
                        </div>
                    </div>
                </div><!-- Gallery4 -->
            </div>
           
    <?php $counter++; endforeach; endwhile; wp_reset_query();?>
     </div>
<?php 
$output = ob_get_contents();
ob_clean();
}else if( $type == 'blog_gallery_style_5' ) {
	ob_start();
    global $wp_query;	
	$args 				= array('post_type' => 'webinane_galleries', 'showposts' => $number, 'order' => $sorting_order, 'orderby' => $sort_by, 'post_status' => 'publish');
	$t 					= $GLOBALS['webinane_gal'];
	if( $cat && $cat != " " ) $args['tax_query'] = array( array( 'taxonomy' => 'gallery_category', 'field' => 'id', 'terms' => (int)$cat ) ); 
	?>
    <?php 		
    $query = new WP_Query($args);
	echo '<div class="row">';
    while ($query->have_posts()) : $query->the_post();						
        $gal = $t->gallery_array(get_the_ID(), '770x418'); 
        $counter = 0;       
        foreach ($gal as $g):
        if( 1 == $counter ) break;?>
        	<div class="col-md-4">
                <div class="gallery1">
                    <div class="gallery-thumb1 gallery_style4">
                        <a data-width="1000" data-height="700" class="html5lightbox" href="<?php echo sh_set( $g, 'url' )?>" title=""><i class="fa fa-search"></i></a>
                        <img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                        <ul>
                            <li><a href="<?php the_permalink();?>" title=""><i class="fa fa-link"></i></a></li>
                        </ul>
                    </div>
                    <div class="gallery1-info">
                        <h3><a href="<?php the_permalink();?>" title=""><?php the_title()?></a></h3>
                        <ul class="social-btns">
                            <?php echo sh_socil_media( sh_set( $g, 'title' ), get_the_permalink(), sh_set( $g, 'desc' ) ); ?>
                        </ul>
                    </div>
                </div><!-- Gallery1 -->
            </div>
           
    <?php $counter++; endforeach; endwhile; wp_reset_query();?>
     </div>
<?php 
$output = ob_get_contents();
ob_clean();
}else if( $type == 'blog_gallery_style_6' ) {
	ob_start();
    global $wp_query;	
	$args 				= array('post_type' => 'webinane_galleries', 'showposts' => $number, 'order' => $sorting_order, 'orderby' => $sort_by, 'post_status' => 'publish');
	$t 					= $GLOBALS['webinane_gal'];
	if( $cat && $cat != " " ) $args['tax_query'] = array( array( 'taxonomy' => 'gallery_category', 'field' => 'id', 'terms' => (int)$cat ) ); 
	?>
    <?php 		
    $query = new WP_Query($args);
	echo '<div class="row" id="gallery_style_6">';
    while ($query->have_posts()) : $query->the_post();						
        $gal = $t->gallery_array(get_the_ID(), '770x418'); 
        $counter = 0;       
        foreach ($gal as $g):
        if( 1 == $counter ) break;?>
        	<div class="col-md-4">
                <div class="gallery2">
                    <img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
                    <div class="title-shadow">
                        <ul>
                            <li><a href="<?php the_permalink();?>" title=""><i class="fa fa-link"></i></a></li>
                            <li><a data-width="1000" data-height="700" class="html5lightbox" href="<?php echo sh_set( $g, 'url' )?>" title=""><i class="fa fa-search"></i></a></li>
                        </ul>
                        <h3><a href="<?php the_permalink();?>" title=""><?php the_title()?></a></h3>
                    </div>
                </div>
            </div>
           
    <?php $counter++; endforeach; endwhile; wp_reset_query();?>
     </div>
<?php 
$output = ob_get_contents();
ob_clean();
}