<?php 
	$settings  = get_post_meta( get_the_ID(), 'sh_post_meta', true );
	$audio_id = sh_set( sh_set( $settings, 'sh_post_options' ), 0 );
?>
<div <?php post_class('post')?>>
    <div class="fancy-post">
        <div class="fancy-social">
            <span><i class="fa fa-pencil"></i></span>
            <ul>
                <?php echo sh_socil_media( get_the_title(), get_the_permalink(), get_the_excerpt() ); ?>
            </ul>
        </div><!-- Fancy Social -->
        <div class="fancy-post-desc">
            <h3><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h3>
            <p><?php echo get_the_excerpt()?></p>
            <ul class="plan-metas">
                <li><i class="fa fa-user"></i><?php _e( 'By:', SH_NAME )?>  <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title=""> <?php ucwords( the_author_meta( 'display_name' ) ); ?></a> </li>
                <li><i class="fa fa-calendar-o"></i> <?php echo get_the_date('F d, Y') ?></li>
                <li><i class="fa fa-comments-o"></i> <?php echo sh_get_comment() ?></li>
            </ul>
            <a href="<?php the_permalink()?>" title=""><?php _e( 'Read More', SH_NAME )?></a>
        </div>
    </div>
</div><!-- Post -->