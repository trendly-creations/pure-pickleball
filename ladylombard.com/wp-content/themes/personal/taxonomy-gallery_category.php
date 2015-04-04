<?php
sh_custom_header(); 
$object 		= get_queried_object(); 
$cat_settings 	= get_option('_sh_gallery_category_settings'.$object->term_id);
$cat_sets 		= sh_set( sh_set ( $cat_settings, 'sh_gallery_category_options' ), 0 );
//printr($cat_sets);


	$class 			=	(sh_set($cat_sets, 'category_sidebar'))? 'col-md-8' : 'col-md-12';
	$sidebar 		=	sh_set($cat_sets, 'category_sidebar');
	$layout 		=	(sh_set($cat_sets, 'category_blog_layout'))?sh_set($cat_sets, 'category_blog_layout'): 'col-md-6';
	$title 			=	sh_set($cat_sets, 'category_heading');
	$icon 			=	sh_set($cat_sets, 'category_title_icon');
	$type			=	(sh_set($cat_sets, 'category_blog_style'))? sh_set($cat_sets, 'category_blog_style'):'blog_gallery_style_3';
	$inner_cls		=	(sh_set($cat_sets, 'category_sidebar'))? 'col-md-6' : 'col-md-4';
	$position		=	sh_set( $cat_sets, 'category_layout' );
	$ext 			= 	explode( ' ', $title, 2 );



?>

<section class="block">
		<div class="container">
        <div class="heading1">
			<h1><?php if( $icon ):?><i class="<?php echo $icon?>"></i><?php endif; ?> <strong><?php echo sh_set( $ext, '0' )?></strong> <?php echo sh_set( $ext, '1' )?> <?php echo single_cat_title('', FALSE);?></h1>
					</div>
			<div class="row">
            	<?php if( $sidebar && $position == 'left' ): ?>
                	<aside class="col-md-4">
                    	<div class="top-margin">
							<?php dynamic_sidebar($sidebar); ?>
                        </div>
					</aside>
                <?php endif; ?>
				<!-- ========================== -->
                <div class="<?php echo $class?>">
                <div class="heading1">
					<h1><?php if( $icon ):?><i class="<?php echo $icon?>"></i><?php endif; ?> <strong><?php echo sh_set( $ext, '0' )?></strong> <?php echo sh_set( $ext, '1' )?> <?php echo single_cat_title('', FALSE);?></h1>
                	<div class="row">
          			<?php
						if( $type == 'blog_gallery_style_3' ) {
							global $wp_query;	
							$args 				= array('post_type' => 'webinane_galleries', 'showposts' => -1, 'post_status' => 'publish');
							if( $object->term_id ) $args['tax_query'] = array( array( 'taxonomy' => 'gallery_category', 'field' => 'id', 'terms' => (int)$object->term_id ) );
							$t 					= $GLOBALS['webinane_gal'];
							$query = new WP_Query($args);
							echo '<div class="top-margin">';
							while ($query->have_posts()) : $query->the_post();						
								$gal = $t->gallery_array(get_the_ID(), '770x418'); 
								$counter = 0;       
								foreach ($gal as $g):
								if( 1 == $counter ) break;?>
									<div class="<?php echo $layout?>">
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
								   
							<?php $counter++; endforeach; endwhile; wp_reset_query();
								  echo '</div></div>';
						}else if( $type == 'blog_gallery_style_4' ) {
							global $wp_query;	
							$args 				= array('post_type' => 'webinane_galleries', 'showposts' => -1, 'post_status' => 'publish');
							if( $object->term_id ) $args['tax_query'] = array( array( 'taxonomy' => 'gallery_category', 'field' => 'id', 'terms' => (int)$object->term_id ) );
							$t 					= $GLOBALS['webinane_gal'];		
							$query = new WP_Query($args);
							echo '<div class="top-margin">';
							while ($query->have_posts()) : $query->the_post();						
								$gal = $t->gallery_array(get_the_ID(), '770x418'); 
								$counter = 0;       
								foreach ($gal as $g):
								if( 1 == $counter ) break;?>
									<div class="<?php echo $layout?>">
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
								   
							<?php $counter++; endforeach; endwhile; wp_reset_query();
								  echo '</div></div>';
						}else if( $type == 'blog_gallery_style_5' ) {
							global $wp_query;	
							$args 				= array('post_type' => 'webinane_galleries', 'showposts' => -1, 'post_status' => 'publish');
							if( $object->term_id ) $args['tax_query'] = array( array( 'taxonomy' => 'gallery_category', 'field' => 'id', 'terms' => (int)$object->term_id ) );
							$t 					= $GLOBALS['webinane_gal'];
							$query = new WP_Query($args);
							echo '<div class="top-margin">';
							while ($query->have_posts()) : $query->the_post();						
								$gal = $t->gallery_array(get_the_ID(), '770x418'); 
								$counter = 0;       
								foreach ($gal as $g):
								if( 1 == $counter ) break;?>
									<div class="<?php echo $layout?>">
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
								   
							<?php $counter++; endforeach; endwhile; wp_reset_query();
									echo '</div>';
						}else if( $type == 'blog_gallery_style_6' ) {
							global $wp_query;	
							$args 				= array('post_type' => 'webinane_galleries', 'showposts' => -1, 'post_status' => 'publish');
							if( $object->term_id ) $args['tax_query'] = array( array( 'taxonomy' => 'gallery_category', 'field' => 'id', 'terms' => (int)$object->term_id ) );
							$t 					= $GLOBALS['webinane_gal']; 		
							$query = new WP_Query($args);
							while ($query->have_posts()) : $query->the_post();						
								$gal = $t->gallery_array(get_the_ID(), '770x418'); 
								$counter = 0;       
								foreach ($gal as $g):
								if( 1 == $counter ) break;?>
									<div class="<?php echo $layout?>">
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
								   
							<?php $counter++; endforeach; endwhile; wp_reset_query();
						}
						?>
                        <?php sh_the_pagination();?>
                    </div>
        		</div>
            <!--=========================== -->
                <?php if( $sidebar && $position == 'right' ): ?>
                	<aside class="col-md-4">
                    	<div class="top-margin">
							<?php dynamic_sidebar($sidebar); ?>
                        </div>
					</aside>
                <?php endif; ?>
                
			</div>
		</div>
</section>
<?php get_footer(); ?>