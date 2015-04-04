<?php
$options = array();
$options['blog_testimonials'] = array(
									'labels' => array(__('Testimonial', SH_NAME), __('Testimonial', SH_NAME)),
									'slug' => 'testimonail',
									'label_args' => array('menu_name' => __('Testimonial', SH_NAME)),
									'supports' => array( 'title', 'editor', 'thumbnail' ),
									'label' => __('Testimonial', SH_NAME),
									'args'=>array('menu_icon'=>SH_URL.'/images/COmments.png')
								 );
$options['blog_profile'] 		= array(
								'labels' => array(__('Profile', SH_NAME), __('Profile', SH_NAME)),
								'slug' => 'profile',
								'label_args' => array('menu_name' => __('Profile', SH_NAME)),
								'supports' => array('title'),
								'label' => __('Profile', SH_NAME),
								'args'=>array('menu_icon'=>SH_URL.'/images/team.png')
							);
$options['webinane_galleries'] 		= array(
								'labels' => array(__('Gallery', SH_NAME), __('Gallery', SH_NAME)),
								'slug' => 'gallery',
								'label_args' => array('menu_name' => __('Gallery', SH_NAME)),
								'supports' => array('title', 'thumbnail'),
								'label' => __('Gallery', SH_NAME),
								'args'=>array('menu_icon'=>SH_URL.'/images/gallery-image.png')
							);														
