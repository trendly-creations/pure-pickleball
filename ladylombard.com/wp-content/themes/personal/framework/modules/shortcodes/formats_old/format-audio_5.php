<?php 
	$settings  = get_post_meta( get_the_ID(), 'sh_post_meta', true );
	$audio_id = sh_set( sh_set( $settings, 'sh_post_options' ), 0 );
	//printr($audio_id);
?>
<?php if( sh_set( $audio_id, 'audio_soundcloud' ) == 1 ){ ?>

<div <?php post_class('blog-style8')?>>
	<div class="post-thumb">
        <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo sh_set( $audio_id, 'post_audio_soundcloud' )?>&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
        <div class="views-status">
            <span><?php echo sh_get_post_view( get_the_ID() )?><strong><?php _e( 'views', SH_NAME )?></strong></span>
        </div>
    </div>
    <div class="blog8-sec">
        <div class="row">
            <div class="col-md-3">
                <ul class="blog8-metas">
                	<li>
                        <span><?php echo get_avatar( get_the_author_meta( 'ID' ), 52 ); ?></span>
                        <h6><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title=""> <?php ucwords( the_author_meta( 'display_name' ) ); ?></a></h6>
                    </li>
                    <li>
                        <span><i class="fa fa-calendar-o"></i></span>
                        <p><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php echo get_the_date('M d, Y') ?></a></p>
                    </li>
                    <li>
                        <span><i class="fa fa-clock-o"></i></span>
                        <p><?php echo get_the_date('h:i a') ?></p>
                    </li>
               </ul>
            </div>
            <div class="col-md-9">
                <div class="blog-desc">
                    <h2><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
                    <p><?php echo get_the_excerpt()?></p>
                    <?php if( has_tag() ): ?>
                        <ul class="tags-bar">
                            <li><i class="fa fa-tags"></i></li>
                            <li>
                            <?php echo sh_the_tags( get_the_ID(), 5 )?>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- Post -->

<?php } ?>
<?php if( sh_set( $audio_id, 'audio_own' ) == 1 ){?>

<div <?php post_class('blog-style8')?>>
	<div class="post-thumb">
        <?php echo do_shortcode('[audio '.sh_set( $audio_id, 'post_audio_own' ).'|loop=yes]'); ?>
        <div class="views-status">
            <span><?php echo sh_get_post_view( get_the_ID() )?><strong><?php _e( 'views', SH_NAME )?></strong></span>
        </div>
    </div>
       <div class="blog8-sec">
        <div class="row">
            <div class="col-md-3">
                <ul class="blog8-metas">
                	<li>
                        <span><?php echo get_avatar( get_the_author_meta( 'ID' ), 52 ); ?></span>
                        <h6><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title=""> <?php ucwords( the_author_meta( 'display_name' ) ); ?></a></h6>
                    </li>
                    <li>
                        <span><i class="fa fa-calendar-o"></i></span>
                        <p><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php echo get_the_date('M d, Y') ?></a></p>
                    </li>
                    <li>
                        <span><i class="fa fa-clock-o"></i></span>
                        <p><?php echo get_the_date('h:i a') ?></p>
                    </li>
               </ul>
            </div>
            <div class="col-md-9">
                <div class="blog-desc">
                    <h2><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
                    <p><?php echo get_the_excerpt()?></p>
                    <?php if( has_tag() ): ?>
                        <ul class="tags-bar">
                            <li><i class="fa fa-tags"></i></li>
                            <li>
                            <?php echo sh_the_tags( get_the_ID(), 5 )?>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- Post -->
<?php } ?>