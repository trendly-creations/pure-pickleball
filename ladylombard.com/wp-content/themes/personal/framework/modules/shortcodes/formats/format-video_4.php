<?php 
	$sticky = get_option('sticky_posts');
	$sticky_class = ( in_array( get_the_id(), $sticky ) )? 'sticky': ''; 
	$settings  = get_post_meta( get_the_ID(), 'sh_post_meta', true );
	$video_id = sh_set( sh_set( $settings, 'sh_post_options' ), 0 );
?>

<div <?php post_class('blog-style7 '. $sticky_class)?>>
	<h2><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
    <div class="post-thumb">
       <iframe height="350" src="<?php echo sh_set( $video_id, 'post_vidoe' )?>"></iframe>
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