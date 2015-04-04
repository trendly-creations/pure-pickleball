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
<div <?php post_class('blog-style7 '.$sticky_class)?>>
    <h2><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
        <div class="post-thumb">
            <ul class="carousal-post">
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
    </div>
    <ul class="social-btns">
		<?php echo sh_socil_media( get_the_title(), get_the_permalink(), get_the_excerpt() ); ?>
    </ul>
    <ul class="blog7-metas">
        <li><p><?php _e( 'Posted in:', SH_NAME )?>&nbsp;<?php sh_get_cats() ?></p></li>
        <li><p><i class="fa fa-calendar-o"></i> <a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php echo get_the_date('F d, Y') ?></a></p></li>
    </ul>
    <p><?php echo get_the_excerpt()?></p>
</div> 	
<script> jQuery(document).ready(function($) { simple_carousel('carousal-post') });</script>