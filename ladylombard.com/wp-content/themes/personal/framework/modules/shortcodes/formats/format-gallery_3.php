<?php 
	global $post;
	$sticky = get_option('sticky_posts');
	$sticky_class = ( in_array( get_the_id(), $sticky ) )? 'sticky': '';
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
<div <?php post_class('picture-modern '.$sticky_class)?>>
    <div class="post-thumb">
        <div class="post-tabs">
            <div id="tab_content" class="tab-content">
                <?php if ( $attachments )
						{
							$counter = 0;
							foreach ( $attachments as $attachment ) {
								if( 4 == $counter ) break;
								$class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
								$thumbimg = wp_get_attachment_image_src( $attachment->ID, '770x418' );
								echo '<div id="modern-tab'.$counter++.'" class="tab-pane fade"><img src="' . $thumbimg['0'] . '" alt=""></div>';
							}							
						}
			?>
        	</div>
            <?php if ( $attachments ){ $counter2 = 0; ?>
            <ul id="tab_contents" role="tablist" class="nav nav-tabs">
            	<?php 
					foreach ( $attachments as $attachment ) {
								if( 4 == $counter2 ) break;
								$class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
								$thumbimg = wp_get_attachment_image_src( $attachment->ID, '80x80' );
								echo  '<li><a data-toggle="tab" role="tab" href="#modern-tab'.$counter2++.'"><img src="' . $thumbimg['0'] . '" alt=""></a></li>';
							}
				?>
            </ul>
            <?php } ?>
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