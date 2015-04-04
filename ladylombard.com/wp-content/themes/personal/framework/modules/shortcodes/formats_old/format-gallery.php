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
<div <?php post_class('post')?>>
    <div class="fancy-post">
        <div class="fancy-social">
            <span><i class="fa fa-th"></i></span>
            <ul>
                <?php echo sh_socil_media( get_the_title(), get_the_permalink(), get_the_excerpt() ); ?>
            </ul>
        </div><!-- Fancy Social -->
        <div class="post-thumb">
            	<?php if ( $attachments )
						{
							echo '<ul id="carousal-post" class="carousal-post">';
							foreach ( $attachments as $attachment ) {
								$class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
								$thumbimg = wp_get_attachment_link( $attachment->ID, '770x418', true );
								echo '<li>' . $thumbimg . '</li>';
							}
							echo '</ul>';							
						}
			?>
            </div>
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

<script> jQuery(document).ready(function($) { simple_carousel('carousal-post') });</script>