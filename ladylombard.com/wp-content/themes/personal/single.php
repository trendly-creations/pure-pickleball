<?php
sh_custom_header();
global $post;
$theme_options = get_option(SH_NAME.'_theme_options');
$post_meta = sh_set(sh_set(get_post_meta(get_the_ID() , "sh_post_meta" , true) , 'sh_post_options') , 0); 

$sidebar 	=	sh_set($post_meta, 'sidebar');
$cols		=	(sh_set($post_meta, 'sidebar'))? 'col-md-8' : 'col-md-12';
$layout 	=	sh_set($post_meta, 'layout');
$profile	=	sh_set($post_meta, 'author_profile');
$fixed_side	=	(sh_set($post_meta, 'fixed_sidebar'))? 'fixed-sidebar':'';

if(  sh_set( $theme_options, 'post_default_sidebar' ) == 1 && sh_set( $theme_options, 'single_post_sidebar' )){
	$cols = 'col-md-8';
}
	 ?>
     <section class="block">
		<div class="container">
			<div class="row">
            	<?php if( $sidebar && $layout == 'left' ) : ?>
					<aside class="col-md-4">
                    	<div class="top-margin">
							<?php strtolower(dynamic_sidebar($sidebar)); ?>
                        </div>
					</aside>
                <?php endif; ?>
				<div class="<?php echo $cols?>">
                <?php while ( have_posts()): the_post();
							sh_post_view( get_the_ID() );
							$attachments = get_posts( array(
											'post_type' => 'attachment',
											'posts_per_page' => -1,
											'post_parent' => $post->ID,
											'exclude'     => get_post_thumbnail_id()
										)
								);?>
                	<div class="single-post">
                    	<div class="single-thumb">
                        <?php $format = get_post_format( get_the_ID() ); ?>
                        	<?php if( $format == 'audio' ){
										if( sh_set( $post_meta, 'audio_soundcloud' ) == 1 )
										{
											echo '<iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/'.sh_set( $post_meta, 'post_audio_soundcloud' ).'&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>';
										}
										if( sh_set( $post_meta, 'audio_own' ) == 1 )
										{
											echo do_shortcode('[audio '.sh_set( $post_meta, 'post_audio_own' ).'|loop=yes]'); 
										}
									}elseif( $format == 'video' )
									{
										echo '<iframe height="350" src="'.sh_set( $post_meta, 'post_vidoe' ).'"></iframe>';
									}else{
										if( has_post_thumbnail() ): the_post_thumbnail('770x418'); endif;
										echo '<div class="liked'.sh_check_post_like(get_the_ID()).'">
												<a id="like_dislike" href="javascript:void(0)" title=""><i class="fa fa-heart-o"></i> <span>'.sh_post_counter(get_the_ID()).'</span></a>
												<span>'.__( 'Liked', SH_NAME ).'</span>
											</div>';
									}?>
							<ul class="general-metas">
								<li><i class="fa fa-user"></i> <?php _e( 'By:', SH_NAME )?>  <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title=""> <?php ucwords( the_author_meta( 'display_name' ) ); ?></a> </li>
								<li><i class="fa fa-calendar-o"></i> <?php echo get_the_date('F d, Y') ?></li>
								<li><i class="fa fa-comments-o"></i> <?php echo sh_get_comment() ?> </li>
								<li><i class="fa fa-file-o"></i><?php _e( 'Post :', SH_NAME )?>  <?php sh_get_cats() ?> </li>
							</ul>
							<ul class="social-btns">
								<?php echo sh_socil_media( get_the_title(), get_the_permalink(), get_the_excerpt() ); ?>
							</ul>
						</div>
                        
                        <div class="post-desc">
							<h2><a href="<?php the_permalink()?>" title=""><?php the_title()?></a></h2>
							<?php the_content();?>
                            <?php wp_link_pages(); ?>
                            <script> jQuery(window).load(function() {
                                            masonery("single-post-pics");
                                            like_dislike(<?php echo get_the_ID()?>);
                                        }); 
                                        </script>
                            <?php if( sh_set( $theme_options, 'set_single_masonery_images' ) == 1 ): ?>
                                        <div class="post-gallery">
                                            <div class="row">
                                                <div id="single-post-pics" class="single-post-pics">								
                                                    <?php
                                                        if ( $attachments )
                                                        {
                                                            foreach ( $attachments as $attachment ) {
                                                                echo '<div class="col-md-4">';
                                                                $class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
                                                                $thumbimg = wp_get_attachment_image_src( $attachment->ID, 'medium' );
                                                                $full = wp_get_attachment_image_src( $attachment->ID, 'full' );
                                                                echo '<a class="html5lightbox" href="'.$full['0'].'" title=""><img src="' . $thumbimg['0'] . '" alt=""></a>';
                                                                echo '</div>';
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                         </div>
                                        <script> jQuery(window).load(function() {
                                            masonery("single-post-pics");
                                            like_dislike(<?php echo get_the_ID()?>);
                                        }); 
                                        </script>
                            <?php endif; ?>
							<?php if( has_tag() ): ?>
                                <ul class="tags-bar">
                                    <li>
                                    <i class="fa fa-tags"></i>
                                    <?php the_tags( '', '', '');?>
                                    </li>
                                </ul>
                            <?php endif; ?>
                            <?php 
								if( $profile ):
								$args = array(
											'post_type' => 'blog_profile',
											'p' => $profile,
											'posts_per_page' => 1,
										);
								$get_profile = new WP_Query($args);
								while( $get_profile->have_posts() ): $get_profile->the_post();
									$meta  = get_post_meta( get_the_ID(), 'sh_profile_meta', true );
									$desc = sh_set( $meta, 'sh_po_desc' );
								?>
                                <div class="post-author-details">
                                    <span><img src="<?php echo sh_set( $meta, 'sh_po_img' )?>" alt="" /></span>
                                    <div class="post-author-infos">
                                        <h3><a href="<?php echo the_permalink();?>" title=""><?php the_title();?></a></h3>
                                        <p><?php echo substr( $desc , 0, 250 );?></p>
                                    </div>
                                </div>		                                 
                                <?php endwhile; wp_reset_query(); ?>
                            <?php else: ?>
                            		<?php if( sh_set( $theme_options, 'author_info' ) == 1 ): ?>
                                        <div class="post-author-details">
                                            <span><?php echo get_avatar( get_the_author_meta( 'ID' ), 180 ); ?></span>
                                            <div class="post-author-infos">
                                                <h3><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title=""> <?php ucwords( the_author_meta( 'display_name' ) ); ?></a></h3>
                                                <p><?php echo get_the_author_meta( 'description' )?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                            <?php endif; ?>
                            
							<div class="related-project-sec">
								<h3><i class="fa fa-pencil"></i> <?php _e( 'Related Project', SH_NAME )?></h3>
								<div class="project-carousal">
									<ul id="related-projects">
										<?php sh_related_posts();?>
									</ul>
								</div>
							</div>
						</div>
                        <?php if( is_single() && comments_open() ) comments_template('', true); ?>
                    </div>
                <?php endwhile; wp_reset_query(); ?>
                </div>
                <?php if( $sidebar && $layout == 'right' ) { ?>
                    	<aside class="col-md-4">
                    	<div class="top-margin">
							<?php strtolower(dynamic_sidebar($sidebar)); ?>
                        </div>
					</aside>
                 <?php }else{ ?>
					<?php if(  sh_set( $theme_options, 'post_default_sidebar' ) == 1 && sh_set( $theme_options, 'single_post_sidebar' )){ ?>
                        <aside class="col-md-4">
                            <div class="top-margin">
                                <?php strtolower(dynamic_sidebar(sh_set( $theme_options, 'single_post_sidebar' ))); ?>
                            </div>
                        </aside>
                    <?php } ?>
                <?php }?>
			</div>
		</div>
	</section>
<script>
	jQuery(document).ready(function($) {
		$("#related-projects").owlCarousel({
			autoPlay :true,
			stopOnHover : true,
			goToFirstSpeed : 500,
			slideSpeed:5000,
			autoHeight : true,
			transitionStyle:"fade",
			navigation:true,
			items : 3,
			pagination:false
		});	
	masonery('single-post-pics');	
	});
</script>
<?php get_footer();?>