<?php
$options = array();
$options[] =  array(
	'id'          => 'sh_post_meta',
	'types'       => array('post'),
	'title'       => __('Post Settings', SH_NAME),
	'priority'    => 'high',
	'template'    => 
			array(
					array(
						'type'      => 'group',
						'repeating' => false,
						'length'    => 1,
						'name'      => 'sh_post_options',
						'title'     => __('General Post Settings', SH_NAME),
						'fields'    => 
						array(
							array(
								'type' => 'textbox',
								'name' => 'post_vidoe',
								'label' => __('Video Source', SH_NAME),
								'description' => __('Enter the video iframe src', SH_NAME),	
							),
							array(
								'type' => 'toggle',
								'name' => 'audio_soundcloud',
								'label' => __('SoundCloud', SH_NAME),	
							),
							array(
								'type' => 'textbox',
								'name' => 'post_audio_soundcloud',
								'label' => __('Audio ID', SH_NAME),
								'description' => __('Enter the Soundcloud Track ID, Like 164639676', SH_NAME),	
								'dependency' => array(
									'field' => 'audio_soundcloud',
									'function' => 'vp_dep_boolean',
								),
							),
							array(
								'type' => 'toggle',
								'name' => 'audio_own',
								'label' => __('Own Audio', SH_NAME),	
							),							
							array(
								'type' => 'upload',
								'name' => 'post_audio_own',
								'label' => __('Audio URL', SH_NAME),
								'description' => __('Chose or upload your audio file', SH_NAME),	
								'dependency' => array(
									'field' => 'audio_own',
									'function' => 'vp_dep_boolean',
								),
							),
							array(
								'type' => 'select',
								'name' => 'author_profile',
								'label' => __('Profile', SH_NAME),
								'description' => __('Select Author Profile.', SH_NAME),
								'items' => vp_get_posts_custom(),
							),
							array(
								'type' => 'select',
								'name' => 'sidebar',
								'label' => __('Sidebar', SH_NAME),
								'default' => '',
								'items' => sh_get_sidebars(true)	
							),
							array(
								'type' => 'radioimage',
								'name' => 'layout',
								'label' => __('Page Layout', SH_NAME),
								'description' => __('Choose the layout for blog pages', SH_NAME),
								'dependency' => array(
									'field' => 'sidebar',
									'function' => 'vp_dep_boolean',
								),
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
							array(
								'type' => 'toggle',
								'name' => 'fixed_sidebar',
								'label' => __('fixed_sidebar', SH_NAME),
								'default' => '',
								'dependency' => array(
									'field' => 'sidebar',
									'function' => 'vp_dep_boolean',
								),
							),
						),
					),
				),
);
/* Page options */
$options[] =  array(
	'id'          => 'sh_page_meta',
	'types'       => array('page'),
	'title'       => __('Page Settings', SH_NAME),
	'priority'    => 'high',
	'template'    => 
			array(
					array(
						'type'      => 'group',
						'repeating' => false,
						'length'    => 1,
						'name'      => 'sh_page_options',
						'title'     => __('General Page Settings', SH_NAME),
						'fields'    => array(	
							array(
								'type' => 'toggle',
								'name' => 'show_author',
								'label' => __('Show Author Box', SH_NAME),
								'description' => __('Show Hide Author Box.', SH_NAME),
							),					
							array(
								'type' => 'select',
								'name' => 'sidebar',
								'label' => __('Sidebar', SH_NAME),
								'default' => '',
								'items' => sh_get_sidebars(true)	
							),
							array(
								'type' => 'radioimage',
								'name' => 'layout',
								'label' => __('Page Layout', SH_NAME),
								'description' => __('Choose the layout for blog pages', SH_NAME),
								'dependency' => array(
									'field' => 'sidebar',
									'function' => 'vp_dep_boolean',
								),
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

/* Page options */
$options[] =  array(
	'id'          => 'sh_gallery_meta',
	'types'       => array('webinane_galleries'),
	'title'       => __('Page Settings', SH_NAME),
	'priority'    => 'high',
	'template'    => 
			array(
				array(
					'type'      => 'group',
					'repeating' => false,
					'length'    => 1,
					'name'      => 'sh_gallery_options',
					'title'     => __('General Page Settings', SH_NAME),
					'fields'    => array(
				array(
					'type' => 'select',
					'name' => 'gallery_layout',
					'label' => __('Gallery Layout:', SH_NAME),
					'description' => __('Select Gallery listing default layout', SH_NAME),
					'items' => array( 
									array('value'=>'blog_gallery_style_3', 'label'=>'Blog Gallery Style 1'), 
									array('value'=>'blog_gallery_style_4', 'label'=>'Blog Gallery Style 2'),
									array('value'=>'blog_gallery_style_5', 'label'=>'Blog Gallery Style 3'),
									array('value'=>'blog_gallery_style_6', 'label'=>'Blog Gallery Style 4'),
							),
				),
				array(
					'type' => 'select',
					'name' => 'gallery_style',
					'label' => __('Gallery Style:', SH_NAME),
					'description' => __('Select the style of gallery', SH_NAME),
					'items' => array( 
									array('value'=>'col-md-6', 'label'=>'2 Column'), 
									array('value'=>'col-md-4', 'label'=>'3 Column'),
									array('value'=>'col-md-3', 'label'=>'4 Column'),
							),
				),
				array(
							'type' => 'select',
							'name' => 'sidebar',
							'label' => __('Sidebar', SH_NAME),
							'default' => '',
							'items' => sh_get_sidebars(true)	
						),
						array(
							'type' => 'radioimage',
							'name' => 'layout',
							'label' => __('Page Layout', SH_NAME),
							'description' => __('Choose the layout for blog pages', SH_NAME),
							'dependency' => array(
								'field' => 'sidebar',
								'function' => 'vp_dep_boolean',
							),
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
/** Team Options*/
$options[] =  array(
	'id'          => 'sh_profile_meta',
	'types'       => array('blog_profile'),
	'title'       => __('Author Profile Options', SH_NAME),
	'priority'    => 'high',
	'template'    => array(
		array(
			'type' => 'textbox',
			'name' => 'sh_po_title',
			'label' => __('Ttitle:', SH_NAME),
		),
		array(
			'type' => 'textbox',
			'name' => 'sh_po_sub_title',
			'label' => __('Sub Ttitle:', SH_NAME),
		),
		array(
			'type' => 'textbox',
			'name' => 'sh_po_short_desc',
			'label' => __('Short Description:', SH_NAME),
		),
		array(
			'type' => 'textarea',
			'name' => 'sh_po_desc',
			'label' => __('Description:', SH_NAME),
		),
		array(
			'type' => 'upload',
			'name' => 'sh_po_img',
			'label' => __('Author Image:', SH_NAME),
			'description' => __('Upload Author Image.', SH_NAME),
		),
		array(
			'type' => 'upload',
			'name' => 'sh_po_resume',
			'label' => __('Resume:', SH_NAME),
			'description' => __('Upload your resume.', SH_NAME),
		),
		array(
			'type' => 'textarea',
			'name' => 'sh_po_map',
			'label' => __('Google Map:', SH_NAME),
			'description' => __('Enter Your Google Map Iframe.', SH_NAME),
		),
		array(
			'type' => 'upload',
			'name' => 'sh_po_bg',
			'label' => __('Background Image:', SH_NAME),
			'description' => __('Upload Background Image.', SH_NAME),
		),

		array(
			'type'      => 'group',
			'repeating' => true,
			'sortable'  => true,
			'length'    => 1,
			'name'      => 'sh_author_social',
			'title'     => __('Author Social Links:', SH_NAME),
			'fields'    =>  array(
				array(
					'type' => 'textbox',
					'name' => 'social_link',
					'label' => __('Link', SH_NAME),
					'description' => __('Enter the Link for Social Media.', SH_NAME),
					'default' => __('#', SH_NAME),
				),
				array(
					'type' => 'fontawesome',
					'name' => 'au_social_icon',
					'label' => __('Icon', SH_NAME),
					'description' => __('Choose Icon for Social Media.', SH_NAME),
					'default' => '',
				),
			),
		),
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'sh_contact_options',
			'title'     => __('Contact Information Box', SH_NAME),
			'fields'    => 
			array(
				array(
					'type' => 'toggle',
					'name' => 'pro_show_contact',
					'label' => __('Show Contact Info', SH_NAME),
					'description' => __('Show or Hide Contact info box', SH_NAME),	
				),
				array(
					'type' => 'textbox',
					'name' => 'pro_cont_title',
					'label' => __('Title:', SH_NAME),
					'description' => __('Enter the title for Contact Box.', SH_NAME),
					'dependency' => array(
									'field' => 'pro_show_contact',
									'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type' => 'textbox',
					'name' => 'pro_cont_sub_title',
					'label' => __('Sub Title:', SH_NAME),
					'description' => __('Enter the sub title for Contact Box.', SH_NAME),
					'dependency' => array(
									'field' => 'pro_show_contact',
									'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type' => 'textbox',
					'name' => 'pro_cont_name',
					'label' => __('Name:', SH_NAME),
					'description' => __('Enter your name.', SH_NAME),
					'dependency' => array(
									'field' => 'pro_show_contact',
									'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type' => 'textbox',
					'name' => 'pro_cont_email',
					'label' => __('Email:', SH_NAME),
					'description' => __('Enter your Email.', SH_NAME),
					'dependency' => array(
									'field' => 'pro_show_contact',
									'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type' => 'textbox',
					'name' => 'pro_cont_phone',
					'label' => __('Phone:', SH_NAME),
					'description' => __('Enter your Contact Number.', SH_NAME),
					'dependency' => array(
									'field' => 'pro_show_contact',
									'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type' => 'date',
					'name' => 'pro_cont_dob',
					'label' => __('Date of Birth:', SH_NAME),
					'description' => __('Enter your Date of Birth.', SH_NAME),
					'dependency' => array(
									'field' => 'pro_show_contact',
									'function' => 'vp_dep_boolean',
					),
					'format' => 'd M yy',
				),
				array(
					'type' => 'textarea',
					'name' => 'pro_cont_address',
					'label' => __('Address:', SH_NAME),
					'description' => __('Enter your Address.', SH_NAME),
					'dependency' => array(
									'field' => 'pro_show_contact',
									'function' => 'vp_dep_boolean',
					),
				),
			),
		),
		array(
			'type' => 'textbox',
			'name' => 'sh_pro_title',
			'label' => __('Professional Skills Ttitle:', SH_NAME),
		),
		array(
			'type' => 'textbox',
			'name' => 'sh_pro_sub_title',
			'label' => __('Professional Skills Sub Ttitle:', SH_NAME),
		),
		array(
			'type' => 'upload',
			'name' => 'sh_pro_bg',
			'label' => __('Background Image:', SH_NAME),
			'description' => __('Upload Background Image.', SH_NAME),
		),
		array(
			'type' => 'group',
			'label' => 'Professional Skills',
			'repeating' => true,
			'sortable'  => true,
			'title'       => __('Professional Skills:', SH_NAME),
			'name' => 'sh_po_skills',
			'description' => __('This section is used to add Author Skills.', SH_NAME),
			'fields' => array(
				array(
					'type' => 'textbox',
					'name' => 'sh_po_skill_name',
					'label' => __('Skill Name:', SH_NAME),
					'description' => __('Enter Your Skill Name.', SH_NAME),
					'validation' => 'alphabet',
				),
				array(
					'type' => 'textbox',
					'name' => 'sh_op_skill_percent',
					'label' => __('Percentage Skill:', SH_NAME),
					'description' => __('Enter Your Skill Percentage.', SH_NAME),
					'validation' => 'numeric',
				),
			),
		),
		array(
			'type' => 'textbox',
			'name' => 'sh_my_exp_title',
			'label' => __('My Experience Ttitle:', SH_NAME),
		),
		array(
			'type' => 'textbox',
			'name' => 'sh_my_exp_sub_title',
			'label' => __('My Experience Sub Ttitle:', SH_NAME),
		),
		array(
			'type' => 'group',
			'label' => 'My Experience',
			'repeating' => true,
			'sortable'  => true,
			'title'       => __('My Experience:', SH_NAME),
			'name' => 'sh_po_experiences',
			'description' => __('This section is used to add Author Experience.', SH_NAME),
			'fields' => array(
				array(
					'type' => 'textbox',
					'name' => 'sh_po_exp_company_name',
					'label' => __('Company Name:', SH_NAME),
					'description' => __('Enter Company Name.', SH_NAME),
				),
				array(
					'type' => 'textbox',
					'name' => 'sh_po_exp_designation',
					'label' => __('Designation:', SH_NAME),
					'description' => __('Enter Your Designation.', SH_NAME),
				),
				array(
					'type' => 'textarea',
					'name' => 'sh_po_exp_desc',
					'label' => __('Job Description:', SH_NAME),
					'description' => __('Enter Your Job Description.', SH_NAME),
				),
				array(
					'type' => 'date',
					'name' => 'sh_op_exp_start_dt',
					'label' => __('Select Date:', SH_NAME),
					'description' => __('Select Your Hearing Date.', SH_NAME),
					'format' => 'yy-mm-dd',
				),						
				array(
					'type' => 'date',
					'name' => 'sh_op_exp_end_dt',
					'label' => __('Select Date:', SH_NAME),
					'description' => __('Select Your Leaving Date.', SH_NAME),
					'format' => 'yy-mm-dd',
				),	
			),
		),
		array(
			'type' => 'textbox',
			'name' => 'sh_my_edu_title',
			'label' => __('Education & Diplomas Ttitle:', SH_NAME),
		),
		array(
			'type' => 'textbox',
			'name' => 'sh_my_edu_sub_title',
			'label' => __('Education & Diplomas Sub Ttitle:', SH_NAME),
		),
		array(
			'type' => 'upload',
			'name' => 'sh_my_exp_bg',
			'label' => __('Background Image:', SH_NAME),
			'description' => __('Upload Background Image.', SH_NAME),
		),
		array(
			'type' => 'group',
			'label' => 'Education & Diplomas',
			'repeating' => true,
			'sortable'  => true,
			'title'       => __('Education & Diplomas:', SH_NAME),
			'name' => 'sh_po_experience',
			'description' => __('This section is used to add Author Education & Diplomas.', SH_NAME),
			'fields' => array(
				array(
					'type' => 'textbox',
					'name' => 'sh_po_edu_name',
					'label' => __('Diploma Name:', SH_NAME),
					'description' => __('Enter Your Diploma Name.', SH_NAME),
					'validation' => 'alphabet',
				),
				array(
					'type' => 'toggle',
					'name' => 'sh_po_edu_icon',
					'label' => __('Show/Hide Icon:', SH_NAME),
					'description' => __('Show or Hide to choose your diploma icon.', SH_NAME),
				),
				array(
					'type' => 'fontawesome',
					'name' => 'sh_po_edu_icon_select',
					'label' => __('Select Icon:', SH_NAME),
					'description' => __('Select Icon.', SH_NAME),
					'dependency' => array(
						'field' => 'sh_po_edu_icon',
						'function' => 'vp_dep_boolean',
					),
				),
				/*array(
					'type' => 'toggle',
					'name' => 'sh_po_edu_img',
					'label' => __('Show/Hide Custom Image:', SH_NAME),
					'description' => __('Show or Hide to choose your diploma custom image.', SH_NAME),
				),
				array(
					'type' => 'upload',
					'name' => 'sh_po_edu_img_up',
					'label' => __('Upload Image:', SH_NAME),
					'description' => __('Upload Image for Your Diploma.', SH_NAME),
					'dependency' => array(
						'field' => 'sh_po_edu_img',
						'function' => 'vp_dep_boolean',
					),
				),*/
				array(
					'type' => 'textarea',
					'name' => 'sh_po_edu_desc',
					'label' => __('Description:', SH_NAME),
					'description' => __('Enter Your Diploma Description.', SH_NAME),
				),
			),
		),
		array(
			'type' => 'textbox',
			'name' => 'sh_my_proj_title',
			'label' => __('Projects Ttitle:', SH_NAME),
		),
		array(
			'type' => 'textbox',
			'name' => 'sh_my_proj_sub_title',
			'label' => __('Projects Sub Ttitle:', SH_NAME),
		),
		array(
			'type' => 'group',
			'label' => 'My All Projects',
			'repeating' => true,
			'sortable'  => true,
			'title'       => __('My All Projects:', SH_NAME),
			'name' => 'sh_po_all_projects',
			'description' => __('This section is used to add Author Projects.', SH_NAME),
			'fields' => array(
				array(
					'type' => 'textbox',
					'name' => 'sh_po_pro_link',
					'label' => __('Project Link:', SH_NAME),
					'description' => __('Enter Your Project Link.', SH_NAME),
				),
				array(
					'type' => 'textbox',
					'name' => 'sh_po_pro_title',
					'label' => __('Project Title:', SH_NAME),
					'description' => __('Enter Your Project Title.', SH_NAME),
				),
				array(
					'type' => 'upload',
					'name' => 'sh_po_pro_img',
					'label' => __('Screen Shoot:', SH_NAME),
					'description' => __('Enter Your Project Screen Shoot.', SH_NAME),
				),
			),
		),
		array(
			'type' => 'textbox',
			'name' => 'sh_my_refer_title',
			'label' => __('My Refrence Ttitle:', SH_NAME),
		),
		array(
			'type' => 'textbox',
			'name' => 'sh_my_refer_sub_title',
			'label' => __('My Refrence Sub Ttitle:', SH_NAME),
		),
		array(
			'type' => 'group',
			'label' => 'My Refrence',
			'repeating' => true,
			'sortable'  => true,
			'title'       => __('My Refrence:', SH_NAME),
			'name' => 'sh_po_projects',
			'description' => __('This section is used to add Author Reference.', SH_NAME),
			'fields' => array(
				array(
					'type' => 'textbox',
					'name' => 'sh_po_ref_link',
					'label' => __('Reference Link:', SH_NAME),
					'description' => __('Enter Your Reference Link.', SH_NAME),
				),
				array(
					'type' => 'upload',
					'name' => 'sh_po_ref_img',
					'label' => __('Screen Shoot:', SH_NAME),
					'description' => __('Enter Your Reference Screen Shoot.', SH_NAME),
				),
			),
		),
			
		
	),
);
 return $options;
 