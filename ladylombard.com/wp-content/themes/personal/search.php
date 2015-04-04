<?php
sh_custom_header(); 
$settings 	=	get_option( SH_NAME . '_theme_options' );
$class 		=	(sh_set($settings, 'search_sidebar'))? 'col-md-8' : 'col-md-12';
$sidebar 	=	sh_set($settings, 'search_sidebar');
$layout 	=	sh_set($settings, 'search_layout');
$title 		=	sh_set($settings, 'search_heading');
$icon 		=	sh_set($settings, 'search_title_icon');
$blog_style	=	sh_set($settings, 'search_blog_style');
$inner_cls	=	(sh_set($settings, 'search_sidebar'))? 'col-md-6' : 'col-md-4';
$ext 		= 	explode( ' ', $title, 2 );
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
				<div class="<?php echo $class;?>">
                        <div class="white-box">
                            <div class="search-result">
                                <h3><?php _e( 'Search Result Found For:', SH_NAME ) ?> <span>"<?php echo get_search_query(); ?>"</span></h3>
                                
                        <?php
                            if( have_posts() ):
                            while( have_posts() ): the_post();
                            $format = get_post_format( get_the_ID() ); 
                            if( $blog_style == 'fancy_blog_list' )
                            {							
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
                                }else
                                {
                                    include( SHRT.'format-standard.php' );
                                }
                            }else if( $blog_style == '_2' || $blog_style == '_3' || $blog_style == '_4' || $blog_style == '_5' || $blog_style == '_6' )
                            {
                                if( $format == 'image' )
                                {
                                    include( SHRT.'format-image'.$blog_style.'.php' );
                                }else if(  $format == 'video' )
                                {
                                    include( SHRT.'format-video'.$blog_style.'.php' );
                                }else if(  $format == 'audio' )
                                {
                                    include( SHRT.'format-audio'.$blog_style.'.php' );
                                }
                                else if(  !has_post_thumbnail() )
                                {
                                    include( SHRT.'format-no-image'.$blog_style.'.php' );
                                }
                                else if(  $format == 'gallery' )
                                {
                                    include( SHRT.'format-gallery'.$blog_style.'.php' );
                                }else
                                {
                                    include( SHRT.'format-standard'.$blog_style.'.php' );
                                }
                            }else if( $blog_style == 'horizontal_blog_style' )
                            {
                                ?>
                                <div class="blog-list">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="post-thumb"><?php if( has_post_thumbnail() ): the_post_thumbnail( '370x321', get_the_id() ); endif; ?></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="blog-list-desc">
                                                <h2><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
                                                <ul class="plan-metas">
                                                    <li><i class="fa fa-user"></i> <?php _e( 'By:', SH_NAME )?> <a href="<?php echo get_search_posts_url( get_the_search_meta( 'ID' ) ); ?>" title=""> <?php ucwords( the_search_meta( 'display_name' ) ); ?></a> </li>
                                                    <li><i class="fa fa-calendar-o"></i> <?php echo get_the_date( 'F d, Y' ) ?></li>
                                                </ul>
                                                <p><?php echo substr( get_the_content(), 0, 250 )?></p>
                                                <a href="<?php the_permalink()?>" title=""><?php _e( 'Read More', SH_NAME )?> <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }else if( $blog_style == 'verticle_blog_style' )
                            {
                                ?>
                                <div class="<?php echo $inner_cls?>">
                                    <div class="century-21st">
                                        <h2><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
                                        <ul class="metas">
                                            <li><?php _e( 'Posted:', SH_NAME )?> <?php echo get_the_date( 'h:i:a d/m/Y' ) ?></li>
                                            <li><?php _e( 'Category:', SH_NAME )?> <?php sh_get_cats() ?></li>
                                        </ul>
                                        <div class="post-thumb">
                                            <?php if( has_post_thumbnail() ): the_post_thumbnail( '370x545', get_the_id() ); endif; ?>
                                            <a href="<?php the_permalink()?>" title=""><i class="fa fa-external-link"></i></a>
                                            <i class="box-1"></i>
                                            <i class="box-2"></i>
                                            <i class="box-3"></i>
                                            <i class="box-4"></i>
                                       </div>
                                       <p><?php echo substr( get_the_content(), 0, 120 )?></p>
                                       <ul class="social-btns">
                                        <?php echo sh_socil_media( get_the_title(), get_the_permalink(), get_the_excerpt() ); ?>
                                       </ul>
                                   </div>
                              </div>
                                <?php
                            }
                            endwhile; else:
                        ?>
                        <p>No results found. Please adjust your search term and try again.</p>
                                <form method="get" action="<?php echo home_url(); ?>">
                                    <input name="s" type="text" placeholder="<?php _e( 'Enter Search Item', SH_NAME ); ?>" />
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            
                    <?php endif; ?>
					</div>
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