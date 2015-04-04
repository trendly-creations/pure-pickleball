<?php 
	$settings  = get_post_meta( get_the_ID(), 'sh_post_meta', true );
	$audio_id = sh_set( sh_set( $settings, 'sh_post_options' ), 0 );
	$sticky = get_option('sticky_posts');
	$sticky_class = ( in_array( get_the_id(), $sticky ) )? 'sticky': '';
?>
<?php if( sh_set( $audio_id, 'audio_soundcloud' ) == 1 ){ ?>

<div <?php post_class('plan-post style2 '.$sticky_class)?>>
	<div class="plan-post-thumb">
    	<div class="post-padding">
        	<iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo sh_set( $audio_id, 'post_audio_soundcloud' )?>&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
        </div>
    </div>
    <div class="plan-post-desc">
        <h2><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
        <ul class="plan-metas">
            <li><i class="fa fa-user"></i><?php _e( 'By:', SH_NAME )?>  <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title=""> <?php ucwords( the_author_meta( 'display_name' ) ); ?></a> </li>
            <li><i class="fa fa-calendar-o"></i> <?php echo get_the_date('F d, Y') ?></li>
            <li><i class="fa fa-comments-o"></i> <?php echo sh_get_comment() ?></li>
        </ul>
        <ul class="social-btns">
            <?php echo sh_socil_media( get_the_title(), get_the_permalink(), get_the_excerpt() ); ?>
        </ul>
        <p><?php echo get_the_excerpt()?></p>
        <a href="<?php the_permalink()?>" title=""><?php _e( 'Read More', SH_NAME ) ?></a>
	</div>
</div>
        
<!-- Post -->

<?php } ?>
<?php if( sh_set( $audio_id, 'audio_own' ) == 1 ){?>

<div <?php post_class('plan-post style2 '.$sticky_class)?>>
	<div class="plan-post-thumb">
    	<div class="post-padding">
        	<?php echo do_shortcode('[audio '.sh_set( $audio_id, 'post_audio_own' ).'|loop=yes]'); ?>
		</div>
    </div>
    <div class="plan-post-desc">
        <h2><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
        <ul class="plan-metas">
            <li><i class="fa fa-user"></i><?php _e( 'By:', SH_NAME )?>  <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title=""> <?php ucwords( the_author_meta( 'display_name' ) ); ?></a> </li>
            <li><i class="fa fa-calendar-o"></i> <?php echo get_the_date('F d, Y') ?></li>
            <li><i class="fa fa-comments-o"></i> <?php echo sh_get_comment() ?></li>
        </ul>
        <ul class="social-btns">
            <?php echo sh_socil_media( get_the_title(), get_the_permalink(), get_the_excerpt() ); ?>
        </ul>
        <p><?php echo get_the_excerpt()?></p>
        <a href="<?php the_permalink()?>" title=""><?php _e( 'Read More', SH_NAME ) ?></a>
	</div>
</div>
        
<!-- Post -->
<?php } ?>