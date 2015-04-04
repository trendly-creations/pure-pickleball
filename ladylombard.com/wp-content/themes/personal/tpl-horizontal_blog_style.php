<?php
/* Template Name: Horizontal Blog Style */
sh_custom_header();
$settings  = sh_set( sh_set( get_post_meta(get_the_ID(), 'sh_page_meta', true ) , 'sh_page_options' ) , 0 );
$theme_options = get_option( SH_NAME.'_theme_options' );
$sidebar = sh_set( $settings, 'sidebar' );
$position = sh_set( $settings, 'layout' );
$span = ( $sidebar ) ? 'col-md-8' : 'col-md-12';
$icon = sh_set( $settings, 'sh_title_icon' );
$ext = explode( ' ', get_the_title(), 2 );
global $paged, $wp_query;
$args = array(
	'post_type' 		=> 	'post',
	'paged'				=> 	(isset($wp_query->query['paged'])) ? $wp_query->query['paged'] : 1,
);
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
					<?php if( sh_set( $settings, 'show_heading' ) == 1 ): ?>
                    <div class="heading1">
						<h1><?php if( $icon ):?><i class="<?php echo $icon?>"></i><?php endif; ?> <strong><?php echo sh_set( $ext, '0' )?></strong> <?php echo sh_set( $ext, '1' )?></h1>
					</div>
					<?php endif; ?>
                    <div class="top-margin">
                        <?php while( $query->have_posts() ): $query->the_post(); ?>
                        <?php if( !has_post_thumbnail() ): $no_img = 'no-image'; else: $no_img = ''; endif; ?>
                            <div class="blog-list <?php echo $no_img?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="post-thumb"><?php if( has_post_thumbnail() ): the_post_thumbnail( '460x399' ); endif; ?></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="blog-list-desc">
                                            <h2><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
                                            <ul class="plan-metas">
                                                <li><i class="fa fa-user"></i> <?php _e( 'By:', SH_NAME )?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title=""> <?php ucwords( the_author_meta( 'display_name' ) ); ?></a> </li>
                                                <li><i class="fa fa-calendar-o"></i> <?php echo get_the_date( 'F d, Y' ) ?></li>
                                            </ul>
                                            <p><?php echo get_the_excerpt()?></p>
                                            <a href="<?php the_permalink()?>" title=""><?php _e( 'Read More', SH_NAME )?> <i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_query(); ?>
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