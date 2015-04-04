<?php 
//* Template Name: Blog Masonery
	get_header();
	$page_setting = sh_set( sh_set( get_post_meta( get_the_ID(), 'sh_page_meta', true ) , 'sh_page_options' ) , 0 );
	$sidebar = sh_set( $page_setting, 'sidebar' );
	global $wp_query;		
	$args = array(
		'post_type' 		=> 	'post',
		'paged'				=> 	(isset($wp_query->query['paged'])) ? $wp_query->query['paged'] : 1,
	);
	$querys = new WP_Query( $args );
	$number = 0;
	$inner = ($sidebar)? 'col-md-6': 'col-md-4';
	?>

<section class="block">
  <div class="container">
    <div class="row">
      <?php 
	if( sh_set( $page_setting, 'sidebar' ) && sh_set( $page_setting, 'layout' ) == 'left' )
	{
		 echo '<aside class="col-md-4">';
		 	dynamic_sidebar($sidebar);
		echo '</aside>';
	}
	if( sh_set( $page_setting, 'sidebar' ) && sh_set( $page_setting, 'layout' ) )
	{
		echo '<div class="col-md-8">';
	}else
	{
		echo '<div class="col-md-12">';
	}
	?>
      <div class="top-margin">
        <div class="row">
          <div id="masonary-blog">
            <?php 
			while( $querys->have_posts() ): $querys->the_post();
				if( has_post_thumbnail() ):
				if ($number % 2 == 0) {$size = '370x439';}else{ $size = '270x188'; }
			?>
            <div class="<?php echo $inner?>">
              <div class="post">
                <div class="post-mas-thumb">
                  <?php if( has_post_thumbnail() ): echo get_the_post_thumbnail( get_the_ID(), $size ); endif; ?>
                  <a href="#" title=""> <span><?php echo get_avatar( get_the_ID(), 75 )?></span>
                  <?php the_author_meta( 'display_name' )?>
                  </a> </div>
                <div class="post-details2">
                  <h3><a href="<?php the_permalink()?>" title="<?php the_title()?>">
                    <?php the_title()?>
                    </a></h3>
                  <i><?php echo get_the_date( 'M d, Y' )?></i>
                  <p><?php echo substr( get_the_content(), 0, 50 )?></p>
                </div><!-- Post Details --> 
              </div><!-- Post --> 
            </div>
            <?php $number++; endif; endwhile; wp_reset_query(); ?>
          </div>
        </div>
        <?php _the_pagination( array( 'total' => $querys->max_num_pages ), 1, true )?>
      </div>
      <script>
		jQuery(window).load(function(){
			masonery("masonary-blog");
		});
	</script> 
    </div>
    <?php if( sh_set( $page_setting, 'sidebar' ) && sh_set( $page_setting, 'layout' ) == 'right' )
	{
		 echo '<aside class="col-md-4">';
		 	dynamic_sidebar($sidebar);
		echo '</aside>';
	}
	?>
  </div>
  </div>
</section>
<?php get_footer();?>
