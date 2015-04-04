<?php 
if( $type == 'post_tabber' )
{
	$args = array(
			'post_type' 		=> 	'post',
			'posts_per_page' 	=> 	$number,
			'sort_by' 			=> 	$sort_by,
			'order' 			=> 	$sorting_order,
		);
	$recent_query = new WP_Query( $args );
	
	$papular_args = array(
		'post_type' 		=> 	'post',
		'posts_per_page' 	=> 	$number,
		'meta_key' 			=> 	'sh_post_views_count',
		'orderby' 			=> 	'meta_value_num',
	);
	$papular_query = new WP_Query( $papular_args );
	
	$output ='';
	$output .= '
					<div class="sidebar-tabs widget">
						<ul role="tablist" class="nav nav-tabs">
						   <li class="active"><a data-toggle="tab" role="tab" href="#recent">'.__( 'Recent', SH_NAME ).'</a></li>
						   <li><a data-toggle="tab" role="tab" href="#popular">'.__( 'Popular', SH_NAME ).'</a></li>
						   <li><a data-toggle="tab" role="tab" href="#share">'.__( 'Comments', SH_NAME ).'</a></li>
						</ul>
						<div class="tab-content">
							<div id="recent" class="tab-pane fade in active">
								<ul class="tab-sidebar">';
									while( $recent_query->have_posts() ): $recent_query->the_post();
										$output .= '<li>';
													if( has_post_thumbnail() ): $output .= '<div class="sidebar-post">'; else: $output .= '<div class="sidebar-post no-image">';endif;
											$output .= '<span>';
															if( has_post_thumbnail() ): $output .= get_the_post_thumbnail( get_the_ID(), array(106,95) ); endif;
												$output .= '</span>
															<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>
															<i>'.get_the_date( 'd/M/Y' ).'</i>
															<p>'.substr( get_the_content(), 0, 50 ).'</p>
														</div>
													</li>';
									endwhile; wp_reset_query();
					$output .= '</ul>
						</div>
						<div id="popular" class="tab-pane fade">
								<ul class="tab-sidebar">';
									while( $papular_query->have_posts() ): $papular_query->the_post();
										$output .= '<li>';
														if( has_post_thumbnail() ): $output .= '<div class="sidebar-post">'; else: $output .= '<div class="sidebar-post no-image">';endif;
															$output .= '<span>';
															if( has_post_thumbnail() ): $output .= get_the_post_thumbnail( get_the_ID(), array(106,95) ); endif;
												$output .= '</span>
															<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>
															<i>'.get_the_date( 'd/M/Y' ).'</i>
															<p>'.substr( get_the_content(), 0, 50 ).'</p>
														</div>
													</li>';
									endwhile; wp_reset_query();
					$output .= '</ul>
						</div>
						<div id="share" class="tab-pane fade">
								<ul class="tab-sidebar">';
									$all_comments = get_comments( array( 'status' => 'approve', 'number'=> $number ) );
									foreach( $all_comments as $k => $c )
									{
										 $post 		= $c->comment_post_ID;
										 $post_url 	= get_permalink($post);
										 $output .= '<li>';
														if( has_post_thumbnail() ): $output .= '<div class="sidebar-post">'; else: $output .= '<div class="sidebar-post no-image">';endif;
												$output .= '<span>';
															if( has_post_thumbnail() ): $output .= get_the_post_thumbnail( get_the_ID(), array(106,95) ); endif;
												$output .= '</span>
															<i>'.get_the_date( 'd/M/Y' ).'</i>
															<p><a href="'.$post_url.'/#comment-'.$c->comment_ID.'">'.substr( $c->comment_content, 0, 50 ).'</a></p>
														</div>
													</li>';
									}
					$output .= '</ul>
						</div>';
						
	$output .= '		</div>
					</div>';
}
?>