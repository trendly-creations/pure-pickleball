<?php 
/* Template Name: Profile */

sh_custom_header(); 
$settings 	=	sh_set( sh_set( get_post_meta( get_the_ID(), 'sh_page_meta', true ) , 'sh_page_options' ) , 0 );
$sidebar 	=	sh_set($settings, 'sidebar');
$class 		=	( sh_set($settings, 'sidebar') )? 'col-md-8' : 'col-md-12';
$layout 	=	sh_set($settings, 'layout');
global $wp_query;		
$args = array(
	'post_type' 		=> 	'blog_profile',
	'paged'				=> 	(isset($wp_query->query['paged'])) ? $wp_query->query['paged'] : 1,
);
$querys = new WP_Query($args);
?>

<section class="block">
    <div class="container">
    	<div class="row">
			<?php
                if( sh_set( $settings, 'sidebar' ) && sh_set( $settings, 'layout' ) == 'right' )
                {
                     echo '<aside class="col-md-4">
					 		<div class="top-margin">';
                        dynamic_sidebar($sidebar);
                    echo '</div></aside>';
                }
            ?>
            <div class="<?php echo $class?>">
                <div class="white-box">
                	<div class="top-margin">	
                        <div class="row">
                <?php if( $querys->have_posts() ): while( $querys->have_posts() ): $querys->the_post(); 
                            $meta  = get_post_meta(get_the_ID(), 'sh_profile_meta', true );?>
                            <div class="col-md-4">
                                <div class="profile-box-sec">
                                    <div class="profile-box">
                                        <img src="<?php echo sh_set( $meta, 'sh_po_img' );?>" alt="" />
                                        <h3><?php the_title();?></h3>
                                        <a href="<?php the_permalink()?>" title=""><i class="fa fa-link"></i></a>
                                    </div>
                                    <ul class="social-btns">
                                        <?php 
											if( sh_set( $meta, 'sh_author_social') )
											{
												foreach( sh_set( $meta, 'sh_author_social') as $social ):
														$counter = 0;
															if( 4 == $counter ): break; endif;
															echo '<li><a href="'.sh_set( $social, 'social_link' ).'" title=""><i class="'.sh_set( $social, 'au_social_icon' ).'"></i></a></li>';
															$counter++;
												endforeach;
											}
										?>
                                    </ul>
                                </div><!-- Profile Box Sec -->
                            </div>
                <?php endwhile; endif; wp_reset_query();?>
                        </div>
                    </div>
                </div>
                <?php _the_pagination( array( 'total' => $querys->max_num_pages ), 1, true ); ?>
            </div>
            <?php
                if( sh_set( $settings, 'sidebar' ) && sh_set( $settings, 'layout' ) == 'left' )
                {
                     echo '<aside class="col-md-4">
					 			<div class="top-margin">';
                        dynamic_sidebar($sidebar);
                    echo '</div></aside>';
                }
            ?>
        </div>
    </div>
</section>

<?php get_footer() ?>