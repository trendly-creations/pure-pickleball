<?php
/* Template Name: Vertical Blog Style */
sh_custom_header();
$settings  = sh_set( sh_set( get_post_meta(get_the_ID(), 'sh_page_meta', true ) , 'sh_page_options' ) , 0 );
$theme_options = get_option( SH_NAME.'_theme_options' );
$sidebar = sh_set( $settings, 'sidebar' );
$position = sh_set( $settings, 'layout' );
$span = ( $sidebar ) ? 'col-md-8' : 'col-md-12';
$cols = ($sidebar ) ? 'col-md-6' : 'col-md-4';
global $paged, $wp_query;
$args = array(
	'post_type' 		=> 	'post',
	'paged'				=> 	(isset($wp_query->query['paged'])) ? $wp_query->query['paged'] : 1,
);
$options = get_option( SH_NAME.'_theme_options' );
if( sh_set( $options, 'custom_header' ) != 'fancy_header' )
{
	$protocol = is_ssl() ? 'https' : 'http';
	sh_remove_style('bootstrap');
	$google =  $protocol.'://fonts.googleapis.com/css?family=Limelight|Julius+Sans+One|Roboto+Condensed:400,700,300|Source+Sans+Pro|Josefin+Slab:700';
	wp_enqueue_style( 'google_font', $google );
}
$query = new WP_Query( $args );	
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
                    <div class="heading1">
                        <h1><i class="fa fa-edit"></i><strong><?php echo get_the_title();?></strong></h1>
                    </div>
                    <div class="top-margin">
                   		<div class="row">
                        	<div id="masonery_verticle" class="masonery_verticle">
                        <?php while( $query->have_posts() ): $query->the_post(); ?>
                            	<div class="<?php echo $cols?>">
                                    <div <?php post_class('century-21st')?>>
                                        <h2><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
                                        <ul class="metas">
                                            <li><?php _e( 'Posted:', SH_NAME )?> <a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php echo get_the_date( 'h:i:a d/m/Y' ) ?></a></li>
                                            <li><?php _e( 'Category:', SH_NAME )?> <?php sh_get_cats() ?></li>
                                        </ul>
                                        <div class="post-thumb">
                                            <?php 
                                                if( has_post_thumbnail() && $cols == 'col-md-4' )
                                                { 
                                                    the_post_thumbnail( '370x439' );
                                                }elseif( has_post_thumbnail() && $cols == 'col-md-6' )
                                                { 
                                                    the_post_thumbnail( '770x418' );
                                                }
                                            ?>
                                            <a href="<?php the_permalink()?>" title=""><i class="fa fa-external-link"></i></a>
                                            <i class="box-1"></i>
                                            <i class="box-2"></i>
                                            <i class="box-3"></i>
                                            <i class="box-4"></i>
                                       </div>
                                       <p><?php echo sh_cus_excerpt(15)?></p>
                                       <ul class="social-btns">
                                        <?php echo sh_socil_media( get_the_title(), get_the_permalink(), get_the_excerpt() ); ?>
                                       </ul>
                                   </div>
      							</div>
                        <?php endwhile; wp_reset_query(); ?>  
                        	</div>
						</div>
                        <?php _the_pagination( array( 'total' => $query->max_num_pages ), 1, true ); ?>
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