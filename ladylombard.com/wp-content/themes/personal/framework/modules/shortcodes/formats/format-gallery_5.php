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
<div <?php post_class('blog-style8 '.$sticky_class)?>>
    <div class="post-thumb">
        <ul id="carousal-post" class="carousal-post">
            <?php if ( $attachments )
                    {
                        foreach ( $attachments as $attachment ) {
                            $class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
                            $thumbimg = wp_get_attachment_image_src( $attachment->ID, '770x418' );
                            echo '<li><img src="' . $thumbimg['0'] . '" alt=""></li>';
                        }							
                    }
        ?>
    	</ul>
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
<script> jQuery(document).ready(function($) { simple_carousel('carousal-post') });</script>