<?php 
	global $post;
	if ( $post->post_type == 'post' && $post->post_status == 'publish' )
	{
		$attachments = get_posts( array(
					'post_type' => 'attachment',
					'posts_per_page' => -1,
					'post_parent' => $post->ID,
					'exclude'     => get_post_thumbnail_id()
				)
		);
	}
?>
<div <?php post_class('plan-post')?>>
    <div class="plan-post-thumb">
        <div class="row">
            <div id="post-masonry" class="post-masonry">
                <?php if ( $attachments )
						{
							$counter = 0;
							foreach ( $attachments as $attachment ) {
								if( !is_single() && 4 == $counter ) break;
								$class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
								$thumbimg = wp_get_attachment_link( $attachment->ID, '770x418', true );
								echo '<div class="col-md-6">' . $thumbimg . '</div>';
								$counter++;
							}							
						}
			?>
        	</div>
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

<script> jQuery(window).load(function() { masonery('post-masonry') });</script>