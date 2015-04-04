<?php
$options = array();
$options[] =  array(
	'id'          => _WSH()->set_term_key('category'),
	'types'       => array('category'),
	'title'       => __('Category Settings', SH_NAME),
	'priority'    => 'high',
	'template'    => 
			array(
					array(
						'type'      => 'group',
						'repeating' => false,
						'length'    => 1,
						'name'      => 'sh_category_options',
						'title'     => __('Category Settings', SH_NAME),
						'fields'    => 
						array(
							array(
							'type' => 'textbox',
							'name' => 'category_heading',
							'label' => __('Title', SH_NAME),
							'description' => __('Enter the Title you want to show on category page', SH_NAME),
							'default' => 'Category Archive For: ',
						),
					array(
							'type' => 'fontawesome',
							'name' => 'category_title_icon',
							'label' => __('Icon', SH_NAME),
							'description' => __('Select the Icon for your Title.', SH_NAME),
						),
					array(
							'type' => 'select',
							'name' => 'category_blog_style',
							'label' => __('Select Blog Style', SH_NAME),
							'items' => array(
								array(
									'value' => 'fancy_blog_list',
									'label' => __('Fancy Blog Style 1', SH_NAME),
								),
								array(
									'value' => '_2',
									'label' => __('Fancy Blog Style 2', SH_NAME),
								),
								array(
									'value' => '_3',
									'label' => __('Fancy Blog Style 3', SH_NAME),
								),
								array(
									'value' => '_4',
									'label' => __('Fancy Blog Style 4', SH_NAME),
								),
								array(
									'value' => '_5',
									'label' => __('Fancy Blog Style 5', SH_NAME),
								),
								array(
									'value' => '_6',
									'label' => __('Fancy Blog Style 6', SH_NAME),
								),
								array(
									'value' => 'horizontal_blog_style',
									'label' => __('Horizontal Blog Style', SH_NAME),
								),
								array(
									'value' => 'verticle_blog_style',
									'label' => __('Verticle Blog Style', SH_NAME),
								),
							),
							'default' => array(
								'fancy_blog_list',
							),
						),
					array(
						'type' => 'select',
						'name' => 'category_sidebar',
						'label' => __('Sidebar', SH_NAME),
						'default' => '',
						'items' => sh_get_sidebars(true)	
					),
					array(
						'type' => 'radioimage',
						'name' => 'category_layout',
						'label' => __('Page Layout', SH_NAME),
						'description' => __('Choose the layout for category pages', SH_NAME),
						'items' => array(
							array(
								'value' => 'left',
								'label' => __('Left Sidebar', SH_NAME),
								'img' => get_template_directory_uri().'/framework/vafpress/public/img/2cl.png',
							),
							array(
								'value' => 'right',
								'label' => __('Right Sidebar', SH_NAME),
								'img' => get_template_directory_uri().'/framework/vafpress/public/img/2cr.png',
							),
						),
					),
							
						),
					),
				),
);

$options[] =  array(
	'id'          => _WSH()->set_term_key('gallery_category'),
	'types'       => array('gallery_category'),
	'title'       => __('Category Settings', SH_NAME),
	'priority'    => 'high',
	'template'    => 
			array(
					array(
						'type'      => 'group',
						'repeating' => false,
						'length'    => 1,
						'name'      => 'sh_gallery_category_options',
						'title'     => __('Category Settings', SH_NAME),
						'fields'    => 
						array(
							array(
							'type' => 'textbox',
							'name' => 'category_heading',
							'label' => __('Title', SH_NAME),
							'description' => __('Enter the Title you want to show on category page', SH_NAME),
							'default' => 'Category Archive For: ',
						),
					array(
							'type' => 'fontawesome',
							'name' => 'category_title_icon',
							'label' => __('Icon', SH_NAME),
							'description' => __('Select the Icon for your Title.', SH_NAME),
						),
					array(
							'type' => 'select',
							'name' => 'category_blog_style',
							'label' => __('Select Blog Style', SH_NAME),
							'items' => array(
									array('value'=>'blog_gallery_style_3', 'label'=>'Blog Gallery Style 1'), 
									array('value'=>'blog_gallery_style_4', 'label'=>'Blog Gallery Style 2'),
									array('value'=>'blog_gallery_style_5', 'label'=>'Blog Gallery Style 3'),
									array('value'=>'blog_gallery_style_6', 'label'=>'Blog Gallery Style 4'),
							),
							'default' => array(
								'blog_gallery_style_3',
							),
						),
					array(
							'type' => 'select',
							'name' => 'category_blog_layout',
							'label' => __('Select Blog Layout', SH_NAME),
							'items' => array(
									array('value'=>'col-md-6', 'label'=>'2 Column'), 
									array('value'=>'col-md-4', 'label'=>'3 Column'),
									array('value'=>'col-md-3', 'label'=>'4 Column'),
							),
							'default' => array(
								'col-md-6',
							),
						),
					array(
						'type' => 'select',
						'name' => 'category_sidebar',
						'label' => __('Sidebar', SH_NAME),
						'default' => '',
						'items' => sh_get_sidebars(true)	
					),
					array(
						'type' => 'radioimage',
						'name' => 'category_layout',
						'label' => __('Page Layout', SH_NAME),
						'description' => __('Choose the layout for category pages', SH_NAME),
						'items' => array(
							array(
								'value' => 'left',
								'label' => __('Left Sidebar', SH_NAME),
								'img' => get_template_directory_uri().'/framework/vafpress/public/img/2cl.png',
							),
							array(
								'value' => 'right',
								'label' => __('Right Sidebar', SH_NAME),
								'img' => get_template_directory_uri().'/framework/vafpress/public/img/2cr.png',
							),
						),
					),
							
				),
			),
		),
);
return $options;
/**
 * EOF
 */
 
 
