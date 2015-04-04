<?php
sh_custom_header(); 
global $wp_query;
$object = get_queried_object();
if( sh_set( $object, 'ID' ) )
{
	$page 		=	get_post_meta( sh_set( $object, 'ID' ) , 'sh_page_meta' , true);
	$settings 	=   sh_set( sh_set( $page, 'sh_page_options'), 0 );
	$sidebar 	=   (sh_set( $settings, 'sidebar' ))?sh_set( $settings, 'sidebar' ): 'default-sidebar';
	$layout 	=   (sh_set( $settings, 'layout' ))? sh_set( $settings, 'layout' ): 'right';
	$span 		=   ( $sidebar && $layout != 'full' ) ? 'col-md-8' : 'col-md-12';
	$ext 		= 	explode( ' ', get_the_title(), 2 );
}else{
	$sidebar 	= 'default-sidebar';
	$layout 	= 'right';
	$span 		= 'col-md-8';
	$ext 		= 	explode( ' ', 'Personal Blog', 2 );
}

//printr($sidebar);
?>

<section class="block">
		<div class="container">
			<div class="row">
            	<?php if( $sidebar && $layout == 'left' ): ?>
                	<aside class="col-md-4">
                    	<div class="top-margin">
							<?php dynamic_sidebar($sidebar); ?>
                        </div>
					</aside>
                <?php endif; ?>
				<div class="<?php echo $span?>">
                    <div class="top-margin">
                    <?php
						while( have_posts() ): the_post();
						$format = get_post_format( get_the_ID() ); 
						if ( false === $format ) {
							$format = 'standard';
						}
													
						if( $format == 'image' )
						{
							include( SHRT.'format-image.php' );
						}else if(  $format == 'video' )
						{
							include( SHRT.'format-video.php' );
						}else if(  $format == 'audio' )
						{
							include( SHRT.'format-audio.php' );
						}
						else if(  !has_post_thumbnail() )
						{
							include( SHRT.'format-no-image.php' );
						}
						else if(  $format == 'gallery' )
						{
							include( SHRT.'format-gallery.php' );
						}else if(  $format == 'standard' )
						{
							include( SHRT.'format-standard.php' );
						}
						endwhile;
                    ?>
                    </div>   
                    <?php sh_the_pagination();?>                
				</div>
                <?php if( $sidebar && $layout == 'right' ): ?>
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