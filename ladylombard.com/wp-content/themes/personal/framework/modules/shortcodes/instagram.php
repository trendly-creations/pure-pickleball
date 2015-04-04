<?php 
if( $type == 'instagram' )
{
	ob_start();
	$media_arrays = scrape_instagram( $user, $num );
	?>
	<div class="instagram widget <?php echo $back_ground?>">
    	<?php if($col_title){?>
            <h4 class="sidebar-title"><span><?php echo $col_sub_title?></span><i><?php echo $col_title?></i></h4>
        <?php } ?>
		<div class="row">
			<div id="insta-masonary" class="insta-masonary">
			<?php
				if ( is_wp_error( $media_arrays ) )
					{
						echo $media_arrays->get_error_message();
					} else
					{
						if ( $images_only = apply_filters( 'wpiw_images_only', FALSE ) )
						$media_arrays = array_filter( $media_array, array( $this, 'images_only' ) ); 
						foreach ( $media_arrays as $item )
						{
							echo '<div class="col-md-6"><a href="'. sh_set( $item, 'link' ) .'"';
							if( $mode == 'blank') echo ' target="'.$mode.'"';
							echo '><img src="'. sh_set( sh_set( $item, 'thumbnail'), 'url') .'"  alt="'. sh_set( $item, 'description' ) .'" title="'. sh_set( $item, 'description' ).'"/></a></div>';
						}
					}
			?>
			</div>
		</div>
	</div>
	<?php
	$output = ob_get_contents();
	ob_clean();
}
	?>