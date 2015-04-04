<?php
	$sticky = get_option('sticky_posts');
	$sticky_class = ( in_array( get_the_id(), $sticky ) )? 'sticky': '';
?>
<div <?php post_class('blog-style7 '.$sticky_class)?>>
	<h2><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
    <div class="post-thumb">
        <?php if( has_post_thumbnail() ): echo get_the_post_thumbnail( get_the_ID(), array(770,418) ); endif; ?>
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