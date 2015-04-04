<?php 
	$sticky = get_option('sticky_posts');
	$sticky_class = ( in_array( get_the_id(), $sticky ) )? 'sticky': '';
	$settings  = get_post_meta( get_the_ID(), 'sh_post_meta', true );
	$video_id = sh_set( sh_set( $settings, 'sh_post_options' ), 0 );
?>
<div <?php post_class('plan-post '.$sticky_class)?>>
	<div class="plan-post-thumb">
		<div class="post-padding">
            <iframe height="350" src="<?php echo sh_set( $video_id, 'post_vidoe' )?>"></iframe>
        </div>
    </div>
        <div class="plan-post-desc">
            <h2><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
            <ul class="plan-metas">
                <li><i class="fa fa-user"></i><?php _e( 'By:', SH_NAME )?>  <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title=""> <?php ucwords( the_author_meta( 'display_name' ) ); ?></a> </li>
                <li><i class="fa fa-calendar-o"></i> <a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php echo get_the_date('F d, Y') ?></a></li>
                <li><i class="fa fa-comments-o"></i> <?php echo sh_get_comment() ?></li>
            </ul>
            <ul class="social-btns">
                <?php echo sh_socil_media( get_the_title(), get_the_permalink(), get_the_excerpt() ); ?>
            </ul>
            <p><?php echo get_the_excerpt()?></p>
        </div>
    </div><!-- Post -->