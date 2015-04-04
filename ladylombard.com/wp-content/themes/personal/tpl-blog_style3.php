<?php
/* Template Name: Blog Style 3 */
sh_custom_header();
$settings  = sh_set( sh_set( get_post_meta(get_the_ID(), 'sh_page_meta', true ) , 'sh_page_options' ) , 0 );
$theme_options = get_option( SH_NAME.'_theme_options' );
$sidebar = sh_set( $settings, 'sidebar' );
$position = sh_set( $settings, 'layout' );
$span = ( $sidebar ) ? 'col-md-8' : 'col-md-12';
$icon = sh_set( $settings, 'sh_title_icon' );
$ext = explode( ' ', get_the_title(), 2 );
global $wp_query;		
$args = array(
	'post_type' 		=> 	'post',
	'paged'				=> 	(isset($wp_query->query['paged'])) ? $wp_query->query['paged'] : 1,
);
$querys = new WP_Query($args);
?>
<section class="block">
			<div class="container">
				<div class="row">
                 <?php if($position == 'left') : ?>
                <aside class="col-md-4">
                	<div class="top-margin">
                    	<?php dynamic_sidebar($sidebar); ?>
                    </div>
                </aside>
                <?php endif; ?>
                <div class="<?php echo $span; ?> column">
                    <?php if( sh_set( $settings, 'show_heading' ) == 1 ): ?>
					<div class="heading1">
						<h1><?php if( $icon ):?><i class="<?php echo $icon?>"></i><?php endif; ?> <strong><?php echo sh_set( $ext, '0' )?></strong> <?php echo sh_set( $ext, '1' )?></h1>
					</div>
					<?php endif; ?>
                    <div class="top-margin">
                        <?php while( $querys->have_posts() ): $querys->the_post(); ?>
                            <?php
								$format = get_post_format( get_the_ID() ); 
								if ( false === $format ) {
									$format = 'standard';
								}							
								if( $format == 'image' )
								{
									include( SHRT.'format-image_3.php' );
								}else if(  $format == 'video' )
								{
									include( SHRT.'format-video_3.php' );
								}else if(  $format == 'audio' )
								{
									include( SHRT.'format-audio_3.php' );
								}
								else if(  !has_post_thumbnail() )
								{
									include( SHRT.'format-no-image_3.php' );
								}
								else if(  $format == 'gallery' )
								{
									include( SHRT.'format-gallery_3.php' );
								}else if(  $format == 'standard' )
								{
									include( SHRT.'format-standard_3.php' );
								}else if(  $format == 'quote' )
								{
									include( SHRT.'format-quote_3.php' );
								}
                            ?>
                        <?php endwhile; wp_reset_query(); ?>
                        <?php _the_pagination( array( 'total' => $querys->max_num_pages ), 1, true ); ?>  
                 	</div>
				</div>
                <?php if($position == 'right') : ?>
                <aside class="col-md-4">
                	<div class="top-margin">
                    	<?php dynamic_sidebar($sidebar); ?>
                    </div>
                </aside>
                <?php endif; ?>
		</div>
	</div>
</section>
            
<?php get_footer() ?>