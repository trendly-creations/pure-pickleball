<div <?php post_class('picture-modern')?>>
    <div class="post-thumb">
        <blockquote>
            <p><?php echo get_the_excerpt()?></p>
        </blockquote>
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