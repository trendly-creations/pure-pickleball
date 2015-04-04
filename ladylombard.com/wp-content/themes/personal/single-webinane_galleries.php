<?php
sh_custom_header();
global $post;
$theme_options = get_option(SH_NAME.'_theme_options');
$post_meta = sh_set(sh_set(get_post_meta(get_the_ID() , "sh_gallery_meta" , true) , 'sh_gallery_options') , 0); 

$sidebar 	=	sh_set($post_meta, 'sidebar');
$cols		=	(sh_set($post_meta, 'sidebar'))? 'col-md-8' : 'col-md-12';
$layout 	=	(sh_set($post_meta, 'gallery_style'))?sh_set($post_meta, 'gallery_style'): 'col-md-6';
$position	=	sh_set( $post_meta, 'layout' );
$type		=	( sh_set( $post_meta, 'gallery_layout' ) )? sh_set( $post_meta, 'gallery_layout' ) : 'sh_blog_gallery_style_3';

/*global $wp_query;	
$paged	 			= get_query_var('paged');	
$args 				= array('post_type' => 'webinane_galleries', 'p' => get_the_ID(), 'showposts' => 1, 'post_status' => 'publish');
$t 					= $GLOBALS['webinane_gal'];
$query = new WP_Query($args);*/
	 ?>

<section class="block">
  <div class="container">
  <div class="heading1"><h1><?php the_title()?></h1></div>
    <div class="row">
      <?php if( $sidebar && $position == 'left' ) : ?>
      <aside class="col-md-4">
        <div class="top-margin">
          <?php strtolower(dynamic_sidebar($sidebar)); ?>
        </div>
      </aside>
      <?php endif; ?>
      <div class="<?php echo $cols?>">
          <div class="row">
          <!-- ========================== -->
          <?php 
			if( $type == 'blog_gallery_style_3' )
			{
				global $wp_query;	
				$args 				= array('post_type' => 'webinane_galleries', 'p' => get_the_ID(), 'showposts' => 1, 'post_status' => 'publish');
				$t 					= $GLOBALS['webinane_gal']; 					
				$query = new WP_Query($args);
				echo '<div id="gal_1">';
				while ($query->have_posts()) : $query->the_post();						
					$gal = $t->gallery_array(get_the_ID(), '770x418');      
					foreach ($gal as $g):?>
						<div class="<?php echo $layout?>">
							<div class="project">
								<img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
								<div class="title">
									<div class="project-title">
										<h3><a href="<?php the_permalink();?>" title=""><?php echo sh_set($g, 'title'); ?></a></h3>
									</div>
								</div>
								<a data-width="1000" data-height="700" class="html5lightbox" href="<?php echo sh_set( $g, 'url' )?>" title=""><i class="fa fa-search"></i></a>
							</div>
						</div>
					   
		<?php endforeach; endwhile; wp_reset_query();
			  echo '</div>';
			  echo '<script>jQuery(window).load(function(){ masonery("gal_1") });</script>';
		}else if( $type == 'blog_gallery_style_4' )
		{
			global $wp_query;	
			$args 				= array('post_type' => 'webinane_galleries', 'p' => get_the_ID(), 'showposts' => 1, 'post_status' => 'publish');
			$t 					= $GLOBALS['webinane_gal'];	
			$query = new WP_Query($args);
			echo '<div class="top-margin"><div id="gal_2">';
			while ($query->have_posts()) : $query->the_post();						
				$gal = $t->gallery_array(get_the_ID(), '770x418');       
				foreach ($gal as $g):?>
					<div class="<?php echo $layout?>">
						<div class="gallery4">
							<div class="gallery4-thumb  gallery_style_4_single">
								<img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
								<ul>
									<li><a data-width="1000" data-height="700" class="html5lightbox" href="<?php echo sh_set( $g, 'url' )?>" title=""><i class="fa fa-search"></i></a></li>
									
								</ul>
							</div>
							<div class="gallery4-info">
								<span><i class="fa fa-eye"></i><?php echo sh_get_post_view( get_the_ID() )?></span>
								<h3><a href="<?php the_permalink();?>" title=""><?php echo sh_set( $g, 'title' );?></a></h3>
								<div class="gallery-category">
									<?php sh_get_term( 5, ",", 'gallery_category', get_the_ID() );?>
								</div>
							</div>
						</div><!-- Gallery4 -->
					</div>
				   
		<?php endforeach; endwhile; wp_reset_query();
			  echo '</div></div>';
			  echo '<script>jQuery(window).load(function(){ masonery("gal_2") });</script>';
		}else if( $type == 'blog_gallery_style_5' )
		{
			global $wp_query;	
			$args 				= array('post_type' => 'webinane_galleries', 'p' => get_the_ID(), 'showposts' => 1, 'post_status' => 'publish');
			$t 					= $GLOBALS['webinane_gal']; 		
			$query = new WP_Query($args);
			echo '<div class="top-margin"><div id="gal_3">';
			while ($query->have_posts()) : $query->the_post();						
				$gal = $t->gallery_array(get_the_ID(), '770x418');      
				foreach ($gal as $g):?>
					<div class="<?php echo $layout?>">
						<div class="gallery1">
							<div class="gallery-thumb1">
								<a data-width="1000" data-height="700" class="html5lightbox" href="<?php echo sh_set( $g, 'url' )?>" title=""><i class="fa fa-search"></i></a>
								<img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
							</div>
							<div class="gallery1-info">
								<h3><a href="<?php the_permalink();?>" title=""><?php echo sh_set( $g, 'title' )?></a></h3>
								<ul class="social-btns">
									<?php  echo sh_socil_media( sh_set( $g, 'title' ), sh_set( $g, 'url' ), sh_set( $g, 'desc' ) ); ?>
								</ul>
							</div>
						</div><!-- Gallery1 -->
					</div>
				   
		<?php endforeach; endwhile; wp_reset_query();
			  echo '</div></div>';
			  echo '<script>jQuery(window).load(function(){ masonery("gal_3") });</script>';
		}else if( $type == 'blog_gallery_style_6' )
		{
			global $wp_query;	
			$args 				= array('post_type' => 'webinane_galleries', 'p' => get_the_ID(), 'showposts' => 1, 'post_status' => 'publish');
			$t 					= $GLOBALS['webinane_gal'];	
			$query = new WP_Query($args);
			echo '<div id="gal_4">';
			while ($query->have_posts()) : $query->the_post();						
				$gal = $t->gallery_array(get_the_ID(), '770x418');      
				foreach ($gal as $g):?>
					<div class="<?php echo $layout?>">
						<div class="gallery2">
							<img alt="<?php echo sh_set( $g, 'title' );?>" src="<?php echo sh_set($g, 'thumb'); ?>">
							<div class="title-shadow">
								<ul>
									<li><a data-width="1000" data-height="700" class="html5lightbox" href="<?php echo sh_set( $g, 'url' )?>" title=""><i class="fa fa-search"></i></a></li>
								</ul>
								<h3><a data-width="1000" data-height="700" class="html5lightbox" href="<?php echo sh_set( $g, 'url' )?>" title="">	<?php echo sh_set( $g, 'title' );?></a></h3>
							</div>
						</div>
					</div>
				   
			<?php endforeach; endwhile; wp_reset_query();
				  echo '</div>';
			  	  echo '<script>jQuery(window).load(function(){ masonery("gal_4") });</script>';
		}
		?>
            <!--=========================== -->
            
          </div>
      </div>
      <?php if( $sidebar && $position == 'right' ) : ?>
      <aside class="col-md-4">
        <div class="top-margin">
          <?php strtolower(dynamic_sidebar($sidebar)); ?>
        </div>
      </aside>
      <?php endif; ?>
    </div>
  </div>
</section>
<script>jQuery(window).load(function(){ masonery('single_style'); });</script>
<?php get_footer();?>
