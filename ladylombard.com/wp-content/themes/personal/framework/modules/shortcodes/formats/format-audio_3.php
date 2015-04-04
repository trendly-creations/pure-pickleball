<?php 
	$settings  = get_post_meta( get_the_ID(), 'sh_post_meta', true );
	$audio_id = sh_set( sh_set( $settings, 'sh_post_options' ), 0 );
	$sticky = get_option('sticky_posts');
	$sticky_class = ( in_array( get_the_id(), $sticky ) )? 'sticky': '';
?>
<?php if( sh_set( $audio_id, 'audio_soundcloud' ) == 1 ){ ?>
<div <?php post_class('picture-modern '.$sticky_class)?>>
    <div class="post-thumb">
    	<div class="post-padding">
    		<iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo sh_set( $audio_id, 'post_audio_soundcloud' )?>&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
        </div>
    </div>
        <div class="post-title">
            <span><?php echo get_avatar( get_the_author_meta( 'ID' ), 66 ); ?></span>
            <h3><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h3>
            <p><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title=""> <?php ucwords( the_author_meta( 'display_name' ) ); ?>,</a> <?php echo get_the_date('F, d, Y') ?></p>
        </div>
        <div class="post-buttons">
            <div class="sharing-btns">
                <a href="#" title=""><i class="fa fa-share-square-o"></i></a>
                <ul>
                    <?php echo sh_socil_media( get_the_title(), get_the_permalink(), get_the_excerpt() ); ?>
                </ul>
            </div>
            <a href="<?php echo get_comments_link()?>" title="" class="comment-btn"><i class="fa fa-comments"></i> <?php echo get_comments_number( get_the_ID() ); ?></a>
            <a href="<?php the_permalink()?>" title="" class="read-more"><?php _e( 'Read More', SH_NAME )?></a>
        </div>
    </div><!-- Post -->
<?php } ?>
<?php if( sh_set( $audio_id, 'audio_own' ) == 1 ){?>
<div <?php post_class('picture-modern '.$sticky_class)?>>
    <div class="post-thumb">
    	<div class="post-padding">
	           	<?php echo do_shortcode('[audio '.sh_set( $audio_id, 'post_audio_own' ).'|loop=yes]'); ?>
        	</div>
        </div>
        <div class="post-title">
            <span><?php echo get_avatar( get_the_author_meta( 'ID' ), 66 ); ?></span>
            <h3><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h3>
            <p><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title=""> <?php ucwords( the_author_meta( 'display_name' ) ); ?>,</a> <?php echo get_the_date('F, d, Y') ?></p>
        </div>
        <div class="post-buttons">
            <div class="sharing-btns">
                <a href="#" title=""><i class="fa fa-share-square-o"></i></a>
                <ul>
                    <?php echo sh_socil_media( get_the_title(), get_the_permalink(), get_the_excerpt() ); ?>
                </ul>
            </div>
            <a href="<?php echo get_comments_link()?>" title="" class="comment-btn"><i class="fa fa-comments"></i> <?php echo get_comments_number( get_the_ID() ); ?></a>
            <a href="<?php the_permalink()?>" title="" class="read-more"><?php _e( 'Read More', SH_NAME )?></a>
        </div>
    </div><!-- Post -->
<?php } ?>