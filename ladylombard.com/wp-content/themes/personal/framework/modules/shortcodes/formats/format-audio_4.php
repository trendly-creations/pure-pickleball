<?php 
	$settings  = get_post_meta( get_the_ID(), 'sh_post_meta', true );
	$audio_id = sh_set( sh_set( $settings, 'sh_post_options' ), 0 );
	$sticky = get_option('sticky_posts');
	$sticky_class = ( in_array( get_the_id(), $sticky ) )? 'sticky': '';
?>
<?php if( sh_set( $audio_id, 'audio_soundcloud' ) == 1 ){ ?>

<div <?php post_class('blog-style7 '.$sticky_class)?>>
	<h2><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
    <div class="post-thumb">
        <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo sh_set( $audio_id, 'post_audio_soundcloud' )?>&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
    </div>
    <ul class="social-btns">
		<?php echo sh_socil_media( get_the_title(), get_the_permalink(), get_the_excerpt() ); ?>
    </ul>
    <ul class="blog7-metas">
        <li><p><?php _e( 'Posted in:', SH_NAME )?>&nbsp;<?php sh_get_cats() ?></p></li>
        <li><p><i class="fa fa-calendar-o"></i> <a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php echo get_the_date('F d, Y') ?></a></p></li>
    </ul>
    <p><?php echo get_the_excerpt()?></p>
</div><!-- Post -->

<?php } ?>
<?php if( sh_set( $audio_id, 'audio_own' ) == 1 ){?>

<div <?php post_class('blog-style7 '.$sticky_class)?>>
	<h2><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
    <div class="post-thumb">
        <?php echo do_shortcode('[audio '.sh_set( $audio_id, 'post_audio_own' ).'|loop=yes]'); ?>
    </div>
    <ul class="social-btns">
		<?php echo sh_socil_media( get_the_title(), get_the_permalink(), get_the_excerpt() ); ?>
    </ul>
    <ul class="blog7-metas">
        <li><p><?php _e( 'Posted in:', SH_NAME )?>&nbsp;<?php sh_get_cats() ?></p></li>
        <li><p><i class="fa fa-calendar-o"></i> <a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php echo get_the_date('F d, Y') ?></a></p></li>
    </ul>
    <p><?php echo get_the_excerpt()?></p>
</div><!-- Post -->
<?php } ?>