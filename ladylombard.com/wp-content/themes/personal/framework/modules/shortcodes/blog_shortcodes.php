<?php if( $type == 'blog_single_post' ){ ?>
<?php ob_start(); ?>
<?php $args = array(
			'post_type' 		=> 	'post',
			'posts_per_page' 	=> 	$number,
			'sort_by' 			=> 	$sort_by,
			'order' 			=> 	$sorting_order,
			'cat'				=>	(int)$cat,
		);
	$query = new WP_Query( $args );
?>
<?php if( $blog_style == '_6' ): echo '<div class="white-box">'; endif; ?>
        <div class="top-margin">
        <?php
            while( $query->have_posts() ): $query->the_post();
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
                            <div class="post-thumb"><?php if( has_post_thumbnail() ): the_post_thumbnail( '460x399', get_the_id() ); endif; ?></div>
                        </div>
                        <div class="col-md-6">
                            <div class="blog-list-desc">
                                <h2><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
                                <ul class="plan-metas">
                                    <li><i class="fa fa-user"></i> <?php _e( 'By:', SH_NAME )?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title=""> <?php ucwords( the_author_meta( 'display_name' ) ); ?></a> </li>
                                    <li><i class="fa fa-calendar-o"></i> <?php echo get_the_date( 'F d, Y' ) ?></li>
                                </ul>
                                <p><?php echo substr( get_the_content(), 0, 200 )?></p>
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
                            <?php if( has_post_thumbnail() ): the_post_thumbnail( '370x439', get_the_id() ); endif; ?>
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
            endwhile; wp_reset_query();
        ?>
        </div>
<?php if( $blog_style == '_6' ): echo '</div>'; endif; ?>
<?php $output = ob_get_contents(); ob_clean(); ?>
<?php }else if( $type == 'blog_single_post_2' ){ ?>
<?php ob_start(); ?>
<?php $args = array(
			'post_type' 		=> 	'post',
			'posts_per_page' 	=> 	1,
			'p'			 		=> 	(int)$post_id,
		);
	$query = new WP_Query( $args );
?>
<?php if( $blog_style == '_6' ): echo '<div class="white-box">'; endif; ?>
        <div class="top-margin">
        <?php
            while( $query->have_posts() ): $query->the_post();
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
                            <div class="post-thumb"><?php if( has_post_thumbnail() ): the_post_thumbnail( '460x399', get_the_id() ); endif; ?></div>
                        </div>
                        <div class="col-md-6">
                            <div class="blog-list-desc">
                                <h2><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
                                <ul class="plan-metas">
                                    <li><i class="fa fa-user"></i> <?php _e( 'By:', SH_NAME )?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title=""> <?php ucwords( the_author_meta( 'display_name' ) ); ?></a> </li>
                                    <li><i class="fa fa-calendar-o"></i> <?php echo get_the_date( 'F d, Y' ) ?></li>
                                </ul>
                                <p><?php echo substr( get_the_content(), 0, 200 )?></p>
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
                            <?php if( has_post_thumbnail() ): the_post_thumbnail( '370x439', get_the_id() ); endif; ?>
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
            endwhile; wp_reset_query();
        ?>
        </div>
<?php if( $blog_style == '_6' ): echo '</div>'; endif; ?>
<?php $output = ob_get_contents(); ob_clean(); ?>
<?php } ?>