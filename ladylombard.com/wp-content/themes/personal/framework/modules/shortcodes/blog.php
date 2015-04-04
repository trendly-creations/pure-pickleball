	<?php
	if( $type == 'masnoery' )
	{
		$args = array(
				'post_type' 		=> 	'post',
				'posts_per_page' 	=> 	$_POST['number'],
				'sort_by' 			=> 	$_POST['sort'],
				'order' 			=> 	$_POST['order'],
				'paged'				=> 	$_POST['id'],
			);
			$output = '';
			$querys = new WP_Query( $args );
			$output .= '
							<div class="row">
								<div id="masonary-blog" class="masonary-blog">';
								while( $querys->have_posts() ): $querys->the_post();
						$output .= '<div class="col-md-3">
										<div class="post">
											<div class="post-mas-thumb">';
												if( has_post_thumbnail() ): $output .= get_the_post_thumbnail( get_the_ID(), 'large' ); endif;
										$output .= '<a href="#" title="">
													<span>'.get_avatar( get_the_ID(), 75 ).'</span>
													'.get_the_author_meta( 'display_name' ).'
												</a>
											</div>
											<div class="post-details2">
												<h3><a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h3>
												<i>'.get_the_date( 'M d, Y' ).'</i>
												<p>'.substr( get_the_content(), 0, 50 ).'</p>
											</div><!-- Post Details -->
										</div><!-- Post -->
									</div>';
								endwhile; wp_reset_query();
								$output .= _the_pagination( array( 'total' => $querys->max_num_pages, 'current' => $querys->query['paged'] ), 0, false );
			$output .= '		</div>
							</div>';
			$output .= '<script>
							jQuery(window).load(function(){
								masonery("masonary-blog");
							});
							jQuery(document).ready(function(){
								//pagination_masonery( "#masonary-blog .pagination-area ul li", "'.$_POST['number'].'", "'.$_POST['sort'].'", "'.$_POST['order'].'", "",'.$_POST['id'].' );
							});
						</script>';
			
			echo $output;
	}
	elseif( $type == 'one_masnoery' )
	{
		global $wp_query;		
		$args = array(
			'post_type' 		=> 	'post',
			'posts_per_page' 	=> 	$number,
			'sort_by' 			=> 	$sort_by,
			'order' 			=> 	$sorting_order,
			'paged'				=> 	(isset($wp_query->query['paged'])) ? $wp_query->query['paged'] : 1,
		);
		
		$output = '';
		$querys = new WP_Query( $args );
		$number = 0;
		$counter = 1;
		$output .= '
						<div class="row">
							<div id="masonary-blog">';
							while( $querys->have_posts() ): $querys->the_post();
							$sticky = get_option('sticky_posts');
							$sticky_class = ( in_array( get_the_id(), $sticky ) )? 'sticky': '';
							if ($number % 2 == 0) {$size = '370x439';}else{ $size = '270x188'; }
							if( $counter  % 3 == 0 )
							{
								$output .= '<div class="'.$cols.' '. $sticky_class.'">
												<div class="post">
													<div class="post-mas-thumb">
														<!--enter your add code-->
														<img src="http://themes.webinane.com/wp/personal/wp-content/uploads/2014/10/7-370x439.jpg" >
													</div>
												</div>
											</div>';
							}else{
							ob_start();
							
							?>
								<div class="<?php echo $cols.' '. $sticky_class;?>">
							<?php
							$output .= ob_get_contents();
							ob_clean();	
							
						$output .= '
									<div class="post">
										<div class="post-mas-thumb">';
											if( has_post_thumbnail() ): $output .= get_the_post_thumbnail( get_the_ID(), $size ); endif;
									$output .= '<a href="#" title="">
												<span>'.get_avatar( get_the_author_meta( 'ID' ), 180 ).'</span>
												'.get_the_author_meta( 'display_name' ).'
											</a>
											<div class="hover-btn"><a title="" href="'.get_the_permalink().'"><i class="fa fa-link"></i></a></div>
										</div>
										<div class="post-details2">
											<h3><a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h3>
											<a href="'.get_the_permalink().'" title="'.get_the_title().'"><i>'.get_the_date( 'M d, Y' ).'</i></a>';
											if( $cols == 'col-md-6' )
											{
												$output .= '<p>'.sh_cus_excerpt(30).'</p>'; 
											}elseif( $cols == 'col-md-4' )
											{
												$output .= '<p>'.sh_cus_excerpt(13).'</p>'; 
											}elseif( $cols == 'col-md-3' )
											{
												$output .= '<p>'.sh_cus_excerpt(8).'</p>'; 
											}
											
										$output .= '</div><!-- Post Details -->
									</div><!-- Post -->
								</div>';
							}
							 $counter++; $number++; endwhile; wp_reset_query();
		$output .= '		</div>
						</div>
						'._the_pagination( array( 'total' => $querys->max_num_pages ), 0, true ).'';
		$output .= '<script>
						jQuery(window).load(function(){
							masonery("masonary-blog");
						});
						jQuery(document).ready(function(){
							//pagination_masonery( "#masonary-blog .pagination-area ul li", "'.$number.'", "'.$sort_by.'", "'.$sorting_order.'");
						});
					</script>';
					
	}else if( $type == 'blog_carousel' )
	{
		$args = array(
				'post_type' 		=> 	'post',
				'posts_per_page' 	=> 	$number,
				'sort_by' 			=> 	$sort_by,
				'order' 			=> 	$sorting_order
			);
			if( $cat ) $args['category'] = (int)$cat;
			$output = '';
			query_posts( $args );
			$output .=  '<div class="row"><div id="slider-carousal-sec" class="slider-carousal-sec">';
								while( have_posts() ): the_post();
								if( has_post_thumbnail() ):
								 if( !has_post_thumbnail() ): $img = 'no_img'; else: $img = ''; endif;
									$output .= '<div>
													<div class="carousal-box '.$img.'">
														<span>';
															if( has_post_thumbnail() ) $output .= get_the_post_thumbnail( get_the_ID(), array(460,399) );
												$output .= '<a href="'.get_the_permalink().'" title=""><i class="fa fa-link"></i></a>
														</span>
														<h3><a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h3>
													</div>
												</div>';
								endif; endwhile; wp_reset_query();
			$output .= '</div></div>';
			$output .= '<script>jQuery(document).ready(function(){ 
					jQuery("#slider-carousal-sec").parent().parent().parent().parent().removeClass("container");
					carousel("slider-carousal-sec");  })</script>';
	
	}else if( $type == 'modern_carousel' )
	{
		$args = array(
				'post_type' 		=> 	'post',
				'posts_per_page' 	=> 	$number,
				'sort_by' 			=> 	$sort_by,
				'order' 			=> 	$sorting_order
			);
			if( $cat ) $args['category'] = (int)$cat;
			$output = '';
			query_posts( $args );
			$output .=  '<div class="row"><ul id="century-carousal-21st" class="century-carousal-21st">';
								while( have_posts() ): the_post();
									if( has_post_thumbnail() ):
									$output .= '<li>
													<a href="'.get_the_permalink().'" title="">
														<span>';
															$output .= get_the_post_thumbnail( get_the_ID(), array(180,180) );
										$output .= '	</span>'.substr( get_the_title(), 0, 30 ).' ...
													</a>
												</li>';
								endif;
								endwhile; wp_reset_query();
			$output .= '</div></ul>';
			$output .= '<script>jQuery(document).ready(function($){ 
					jQuery("#century-carousal-21st").parent().parent().parent().parent().parent().addClass("white");
					$(".century-carousal-21st").owlCarousel({
						autoPlay: true,
						rewindSpeed : 3000,
						slideSpeed:2000,
						items : 6,
						itemsDesktop : [1199,4],
						itemsDesktopSmall : [979,3],
						itemsTablet : [768,2],
						itemsMobile : [479,1],
						navigation : false,
						});  })</script>';
	
	}else if( $type == 'latest_posts' )
	{
		global $paged, $wp_query;
		$args = array(
			'post_type' 		=> 	'post',
			'posts_per_page' 	=> 	$number,
			'sort_by' 			=> 	$sort_by,
			'order' 			=> 	$sorting_order,
			'paged'				=> 	(isset($wp_query->query['paged'])) ? $wp_query->query['paged'] : 1,
		);
		$output ='';
		$query = new WP_Query( $args );
		$opt = get_option(SH_NAME.'_theme_options');
		ob_start();
		?>
		<div id="blog_list">
		<?php
		$output .= ob_get_contents();
		ob_clean();
						while( $query->have_posts() ): $query->the_post();
							$sticky = get_option('sticky_posts');
							$sticky_class = ( in_array( get_the_id(), $sticky ) )? 'sticky': '';
							$cat = get_the_category( get_the_ID() );
							ob_start();
							?>
								<div <?php post_class('post '.$sticky_class)?> >
							<?php
							$output .= ob_get_contents();
							ob_clean();
							$output .= '
											<div class="post-title1">
												<span>
													'.get_avatar( get_the_author_meta( 'ID' ), 75 ).'
													<i class="fa fa-angle-right"></i>
												</span>
												<h3><a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h3>
												<p>'.__( 'Posted in', SH_NAME ).' ';
												foreach( $cat as $key => $name ):
													 $output .= '<a href="'.get_category_link( $name->term_id ).'" title="'. esc_attr( sprintf( __( "View all posts in %s", SH_NAME ), $name->name ) ).'">'.$name->cat_name.'</a>, ';
												endforeach;
								$output .= ''.__( 'By ', SH_NAME).' <a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" title="">'.get_the_author_meta( 'display_name' ).'</a></p></div>
											<div class="post-sec1">
												<ul class="social-btns">';
													$output .= sh_socil_media( get_the_title(), get_the_permalink(), get_the_excerpt() );
									 $output .='</ul><!-- Social Btns -->
												<div class="post-details1">
													<span class="date"><i class="fa fa-calendar"></i>'.get_the_date( 'M d, Y' ).'</span>
													<p>'.sh_cus_excerpt(30).'</p>
													<a href="'.get_the_permalink().'" title="">'.__( 'Read More', SH_NAME ) .'</a>
												</div><!-- Post Details -->
											</div><!-- Post Sec -->
										</div>';
						endwhile; 
						$output .= _the_pagination( array( 'total' => $query->max_num_pages ), 0, true );
						wp_reset_query();
		$output .= '</div>';
		$output .= '<script>
							jQuery(document).ready(function(){
								//pagination_blog_list( "#blog_list .pagination-area ul li", "'.$number.'", "'.$sort_by.'", "'.$sorting_order.'");
							});
						</script>';
		
	}else if( $type == 'verticle_blog_style' )
	{
		ob_start();
		global $paged, $wp_query;
		$args = array(
			'post_type' 		=> 	'post',
			'posts_per_page' 	=> 	$number,
			'sort_by' 			=> 	$sort_by,
			'order' 			=> 	$sorting_order,
			'paged'				=> 	(isset($wp_query->query['paged'])) ? $wp_query->query['paged'] : 1,
		);
		
		$options = get_option( SH_NAME.'_theme_options' );
		if( sh_set( $options, 'custom_header' ) != 'fancy_header' )
		{
			$protocol = is_ssl() ? 'https' : 'http';
			sh_remove_style('bootstrap');
			$google =  $protocol.'://fonts.googleapis.com/css?family=Limelight|Julius+Sans+One|Roboto+Condensed:400,700,300|Source+Sans+Pro|Josefin+Slab:700';
			wp_enqueue_style( 'google_font', $google );
		}	
		$query = new WP_Query( $args );
		echo '	
				<div class="row"><div id="masonery_verticle" class="masonery_verticle">';	
		while( $query->have_posts() ): $query->the_post();
		$sticky = get_option('sticky_posts');
		$sticky_class = ( in_array( get_the_id(), $sticky ) )? 'sticky': '';
		?>
			<div class="<?php echo $cols?>">
				<div <?php post_class('century-21st '.$sticky_class)?>>
					<h2><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
					<ul class="metas">
						<li><?php _e( 'Posted:', SH_NAME )?> <a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php echo get_the_date( 'h:i:a d/m/Y' ) ?></a></li>
						<li><?php _e( 'Category:', SH_NAME )?> <?php sh_get_cats() ?></li>
					</ul>
					<div class="post-thumb">
						<?php 
							if( has_post_thumbnail() && $cols == 'col-md-4' )
							{ 
								the_post_thumbnail( '370x439' );
							}elseif( has_post_thumbnail() && $cols == 'col-md-6' )
							{ 
								the_post_thumbnail( '770x418' );
							}
						?>
						<a href="<?php the_permalink()?>" title=""><i class="fa fa-external-link"></i></a>
						<i class="box-1"></i>
						<i class="box-2"></i>
						<i class="box-3"></i>
						<i class="box-4"></i>
				   </div>
				   <p><?php echo sh_cus_excerpt(15)?></p>
				   <ul class="social-btns">
					<?php echo sh_socil_media( get_the_title(), get_the_permalink(), get_the_excerpt() ); ?>
				   </ul>
			   </div>
			</div>	
		<?php
		endwhile; 
		echo '</div></div>';
		?>	
		<script>
			jQuery(window).load(function(){
				masonery("masonery_verticle");
			});
		</script>	
		<?php
		echo _the_pagination( array( 'total' => $query->max_num_pages ), 0, true );
		wp_reset_query();
		$output = ob_get_contents();
		ob_clean();	
	}else if( $type == 'horizontal_blog_style' )
	{
		ob_start();
		global $paged, $wp_query;
		$args = array(
			'post_type' 		=> 	'post',
			'posts_per_page' 	=> 	$number,
			'sort_by' 			=> 	$sort_by,
			'order' 			=> 	$sorting_order,
			'paged'				=> 	(isset($wp_query->query['paged'])) ? $wp_query->query['paged'] : 1,
		);
		$query = new WP_Query( $args );	
		while( $query->have_posts() ): $query->the_post();
		if( !has_post_thumbnail() ): $no_img = 'no-image'; else: $no_img = ''; endif;
		$sticky = get_option('sticky_posts');
		$sticky_class = ( in_array( get_the_id(), $sticky ) )? 'sticky': '';
		?>
			<div class="<?php echo 'blog-list '.$sticky_class. ' '.$no_img  ?>">
				<div class="row">
					<div class="col-md-6">
						<div class="post-thumb"><?php if( has_post_thumbnail() ): the_post_thumbnail( '460x399' ); endif; ?></div>
					</div>
					<div class="col-md-6">
						<div class="blog-list-desc">
							<h2><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
							<ul class="plan-metas">
								<li><i class="fa fa-user"></i> <?php _e( 'By:', SH_NAME )?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title=""> <?php ucwords( the_author_meta( 'display_name' ) ); ?></a> </li>
								<li><i class="fa fa-calendar-o"></i> <?php echo get_the_date( 'F d, Y' ) ?></li>
							</ul>
							<p><?php echo get_the_excerpt()?></p>
							<a href="<?php the_permalink()?>" title=""><?php _e( 'Read More', SH_NAME )?> <i class="fa fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		<?php
		endwhile; 
		echo _the_pagination( array( 'total' => $query->max_num_pages ), 0, true );
		wp_reset_query();
		$output = ob_get_contents();
		ob_clean();	
	}elseif( $type == 'slider' )
	{
		ob_start();
		?>
				<div class="post">
					<ul id="post-carousal" class="post-carousal">
						<?php while( $querys->have_posts() ): $querys->the_post(); ?>
						<?php if( !has_post_thumbnail() ): $img = 'no_img'; else: $img = ''; endif; ?>
							<li class="<?php echo $img?>">
								<?php if( has_post_thumbnail() ): echo get_the_post_thumbnail( get_the_ID(), array(770,418) ); endif; ?>
								<div class="title">
									<div class="post-fancy-slide">
										<h3><a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a></h3>
										<i><?php echo get_the_date( 'M d, Y' ) ?></i>
										<p><?php echo sh_cus_excerpt(15) ?></p>
										<a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php _e( 'View', SH_NAME ) ?></a>
									</div>
								</div>
							</li><!-- Slide1 -->
						<?php endwhile; wp_reset_query(); ?>
					</ul>
				</div>
			<script>
				jQuery(document).ready(function(){
					simple_carousel("post-carousal");
				});
			</script>
		<?php
		$output = ob_get_contents();
		ob_clean();
	}else if( $type == 'fancy_blog_list' )
	{
		wp_reset_query();
		ob_start();
		?>
				<?php while( $querys->have_posts() ): $querys->the_post(); ?>
					<?php 
						$format = get_post_format( get_the_ID() ); 
						
					?>
					<?php 
						if( $format == 'image' )
						{
							include( SHRT.'format-image.php' );
						}else if(  $format == 'video' )
						{
							include( SHRT.'format-video.php' );
						}else if(  $format == 'audio' )
						{
							include( SHRT.'format-audio.php' );
						}
						else if(  !has_post_thumbnail() )
						{
							include( SHRT.'format-no-image.php' );
						}
						else if(  $format == 'gallery' )
						{
							include( SHRT.'format-gallery.php' );
						}else 
						{
							include( SHRT.'format-standard.php' );
						}
					endwhile; wp_reset_query(); ?>
			<?php _the_pagination( array( 'total' => $querys->max_num_pages ), 1, true ); ?>
		<?php
		$output = ob_get_contents();
		ob_clean();
	}else if( $type == 'fancy_blog_list_2' )
	{
		ob_start();
		?>
				<?php while( $querys->have_posts() ): $querys->the_post(); ?>
					<?php 
						$format = get_post_format( get_the_ID() );
						
					?>
					<?php 
						if( $format == 'image' )
						{
							include( SHRT.'format-image_2.php' );
						}else if(  $format == 'video' )
						{
							include( SHRT.'format-video_2.php' );
						}else if(  $format == 'audio' )
						{
							include( SHRT.'format-audio_2.php' );
						}
						else if(  !has_post_thumbnail() )
						{
							include( SHRT.'format-no-image_2.php' );
						}
						else if(  $format == 'gallery' )
						{
							include( SHRT.'format-gallery_2.php' );
						}else 
						{
							include( SHRT.'format-standard_2.php' );
						}
					endwhile; wp_reset_query(); ?>
			<?php _the_pagination( array( 'total' => $querys->max_num_pages ), 1, true ); ?>
		<?php
		$output = ob_get_contents();
		ob_clean();
	}else if( $type == 'fancy_blog_list_3' )
	{
		ob_start();
		?>
				<?php while( $querys->have_posts() ): $querys->the_post(); ?>
					<?php 
						$format = get_post_format( get_the_ID() );
						
					?>
					<?php 
						if( $format == 'image' )
						{
							include( SHRT.'format-image_3.php' );
						}else if(  $format == 'video' )
						{
							include( SHRT.'format-video_3.php' );
						}else if(  $format == 'audio' )
						{
							include( SHRT.'format-audio_3.php' );
						}
						else if(  !has_post_thumbnail() )
						{
							include( SHRT.'format-no-image_3.php' );
						}
						else if(  $format == 'gallery' )
						{
							include( SHRT.'format-gallery_3.php' );
						}else if(  $format == 'quote' )
						{
							include( SHRT.'format-quote_3.php' );
						}else 
						{
							include( SHRT.'format-standard_3.php' );
						}
					endwhile; wp_reset_query(); ?>
			<?php _the_pagination( array( 'total' => $querys->max_num_pages ), 1, true ); ?>
		<?php
		$output = ob_get_contents();
		ob_clean();
	}else if( $type == 'fancy_blog_list_4' )
	{
		ob_start();
		?>
				<?php while( $querys->have_posts() ): $querys->the_post(); ?>
					<?php 
						$format = get_post_format( get_the_ID() );
						
					?>
					<?php 
						if( $format == 'image' )
						{
							include( SHRT.'format-image_4.php' );
						}else if(  $format == 'video' )
						{
							include( SHRT.'format-video_4.php' );
						}else if(  $format == 'audio' )
						{
							include( SHRT.'format-audio_4.php' );
						}
						else if(  !has_post_thumbnail() )
						{
							include( SHRT.'format-no-image_4.php' );
						}
						else if(  $format == 'gallery' )
						{
							include( SHRT.'format-gallery_4.php' );
						}else 
						{
							include( SHRT.'format-standard_4.php' );
						}
					endwhile; wp_reset_query(); ?>
			<?php _the_pagination( array( 'total' => $querys->max_num_pages ), 1, true ); ?>
		<?php
		$output = ob_get_contents();
		ob_clean();
	}else if( $type == 'fancy_blog_list_5' )
	{
		ob_start();
		?>
				<?php while( $querys->have_posts() ): $querys->the_post(); ?>
					<?php 
						$format = get_post_format( get_the_ID() );
						
					?>
					<?php 
						if( $format == 'image' )
						{
							include( SHRT.'format-image_5.php' );
						}else if(  $format == 'video' )
						{
							include( SHRT.'format-video_5.php' );
						}else if(  $format == 'audio' )
						{
							include( SHRT.'format-audio_5.php' );
						}
						else if(  !has_post_thumbnail() )
						{
							include( SHRT.'format-no-image_5.php' );
						}
						else if(  $format == 'gallery' )
						{
							include( SHRT.'format-gallery_5.php' );
						}else 
						{
							include( SHRT.'format-standard_5.php' );
						}
					endwhile; wp_reset_query(); ?>
			<?php _the_pagination( array( 'total' => $querys->max_num_pages ), 1, true ); ?>
		<?php
		$output = ob_get_contents();
		ob_clean();
	}else if( $type == 'fancy_blog_list_6' )
	{
		ob_start();
		?>
				<div class="white-box">
				<div class="top-margin">
				<?php while( $querys->have_posts() ): $querys->the_post(); ?>
					<?php 
						$format = get_post_format( get_the_ID() );
					?>
					<?php 
						if( $format == 'image' )
						{
							include( SHRT.'format-image_6.php' );
						}else if(  $format == 'video' )
						{
							include( SHRT.'format-video_6.php' );
						}else if(  $format == 'audio' )
						{
							include( SHRT.'format-audio_6.php' );
						}
						else if(  !has_post_thumbnail() )
						{
							include( SHRT.'format-no-image_6.php' );
						}
						else if(  $format == 'gallery' )
						{
							include( SHRT.'format-gallery_6.php' );
						}else
						{
							include( SHRT.'format-standard_6.php' );
						}
					endwhile; wp_reset_query(); ?>
					</div>
					</div>
			<?php _the_pagination( array( 'total' => $querys->max_num_pages ), 1, true ); ?>
		<?php
		$output = ob_get_contents();
		ob_clean();
	}
	
	?>