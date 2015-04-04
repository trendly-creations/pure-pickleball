<div <?php post_class('blog-style8')?>>
	<div class="post-thumb">
        <?php if( has_post_thumbnail() ): echo get_the_post_thumbnail( get_the_ID(), array(770,418) ); endif; ?>
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
</div>