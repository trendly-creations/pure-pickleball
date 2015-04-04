<?php
return array(
	'title' => __('Webinane Theme Options', SH_NAME),
	'logo' => 'logo.png',
	'menus' => array(
		// General Settings
		/* OnePage Settings */	
		array(
			'title' => __('General Settings', SH_NAME),
			'name' => 'general_settings',
			'icon' => 'font-awesome:fa fa-cogs',
			'menus' => array(
				array(
					'title' => __('General Settings', SH_NAME),
					'name' => 'general_settings',
					'icon' => 'font-awesome:fa fa-th-large',
					'controls' => array(
						array(
							'type' => 'section',
							'repeating' => true,
							'sortable'  => true,
							'title' => __('Profile Page and Color Scheme Settings', SH_NAME),
							'name' => 'color_schemes',
							'description' => __('This section is used for theme color settings', SH_NAME),
							'fields' => array(
								array(
									'type' => 'toggle',
									'name' => 'home_page',
									'label' => __('Profile Home Page:', SH_NAME),
									'description' => __('Make a profile page as home page.', SH_NAME),
								),
								array(
									'type' => 'select',
									'name' => 'profile_post',
									'label' => __('Select Profile:', SH_NAME),
									'description' => __('Select the profile for you home page.', SH_NAME),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'vp_get_posts_custom',
											),
										),
									),
									'default' => array(
										'{{first}}',
									),
									'dependency' => array(
										'field' => 'home_page',
										'function' => 'vp_dep_boolean',
									),
									
								),
								array(
									'type' => 'toggle',
									'name' => 'set_rtl',
									'label' => __('RTL:', SH_NAME),
									'description' => __('Enable Rtl On or Off.', SH_NAME),
								),
								array(
									'type' => 'toggle',
									'name' => 'set_single_masonery_images',
									'label' => __('Show Images on Single post:', SH_NAME),
									'description' => __('show or hide images on single post at the bottom.', SH_NAME),
								),
								array(
									'type' => 'toggle',
									'name' => 'author_info',
									'label' => __('Author Info:', SH_NAME),
									'description' => __('show or hide author info on single post.', SH_NAME),
								),
								array(
									'type' => 'toggle',
									'name' => 'post_default_sidebar',
									'label' => __('Single Post Default Sidebar:', SH_NAME),
									'description' => __('show or hide default sidebar on single post.', SH_NAME),
								),
								array(
									'type' => 'select',
									'name' => 'single_post_sidebar',
									'label' => __('Sidebar', SH_NAME),
									'default' => '',
									'items' => sh_get_sidebars(true),
									'dependency' => array(
										'field' => 'post_default_sidebar',
										'function' => 'vp_dep_boolean',
									),									
								),
								array(
									'type' => 'select',
									'name' => 'color_selection',
									'label' => __('Color Scheme', SH_NAME),
									'description' => __('Enable to choose from Default Colour Schemes', SH_NAME),
									'items' => array( array('value'=>'custom', 'label'=>'Custom Colour'), array('value'=>'default', 'label'=>'Default Colour Schemes '), ),
									'default' => 'custom'
								),
								array(
									'type' => 'color',
									'name' => 'custom_color_scheme',
									'label' => __('Colour Scheme', SH_NAME),
									'description' => __('Choose the Custom color scheme for the theme.', SH_NAME),
									'default' => '#EC644B',
									'dependency' => array(
										'field' => 'color_selection',
										'function' => 'vp_dep_is_custom_color',
									),
								),
								array(
									'type' => 'select',
									'name' => 'default_color_scheme',
									'label' => __('Colour Scheme', SH_NAME),
									'description' => __('Choose from Default color schemes for the theme.', SH_NAME),
									'deafault' => 'no' ,
									'items' => array( 
													array('value'=>'no', 'label'=>'No Colour'), 
													array('value'=>'blue', 'label'=>'Blue'),
													array('value'=>'brown', 'label'=>'Brown'),
													array('value'=>'green', 'label'=>'Green'),
													array('value'=>'purple', 'label'=>'Purple'),
													array('value'=>'red', 'label'=>'Red'),
													array('value'=>'yellow', 'label'=>'Yellow'),
											),
									'dependency' => array(
										'field' => 'color_selection',
										'function' => 'vp_dep_is_default_color',
									),
								),
								array(
									'type' => 'select',
									'name' => 'body_layout',
									'label' => __('Body Layout:', SH_NAME),
									'description' => __('Select Body Layout.', SH_NAME),
									'items' => array( array('value'=>'fixed', 'label'=>'Fixed'), array('value'=>'full', 'label'=>'Full'), ),
									'default' => 'full'
								),
								array(
									'type' => 'select',
									'name' => 'back_type',
									'label' => __('Body Type:', SH_NAME),
									'description' => __('Select Body Type.', SH_NAME),
									'items' => array( array('value'=>'pat', 'label'=>'Pattern'), array('value'=>'own_bg', 'label'=>'Custom Image'), ),
									'default' => '',
									'dependency' => array(
										'field' => 'body_layout',
										'function' => 'vp_dep_is_back_type',
									),
								),
								array(
									'type' => 'radioimage',
									'name' => 'bg_pattorns',
									'label' => __('Choose Patorn:', SH_NAME),
									'item_max_height' => '150',
									'item_max_width' => '400',
									'default' => '',
									'dependency' => array(
										'field' => 'back_type',
										'function' => 'vp_dep_is_bg_pattorns',
									),
									'items' => array(
										array(
											'value' => 'pat1',
											'label' => __('Patorn 1', SH_NAME),
											'img' => SH_URL.'/images/pat1.png',
										),
										array(
											'value' => 'pat2',
											'label' => __('Patorn 2', SH_NAME),
											'img' => SH_URL.'/images/pat2.png',
										),
										array(
											'value' => 'pat3',
											'label' => __('Patorn 3', SH_NAME),
											'img' => SH_URL.'/images/pat3.png',
										),
										array(
											'value' => 'pat4',
											'label' => __('Patorn 4', SH_NAME),
											'img' => SH_URL.'/images/pat4.png',
										),
										array(
											'value' => 'pat5',
											'label' => __('Patorn 5', SH_NAME),
											'img' => SH_URL.'/images/pat5.png',
										),
									),
								),
								array(
									'type' => 'upload',
									'name' => 'site_background',
									'label' => __('Background:', SH_NAME),
									'description' => __('Upload the Background Image.', SH_NAME),
									'default' => '',
									'dependency' => array(
										'field' => 'back_type',
										'function' => 'vp_dep_is_site_background',
									),
								),
								array(
									'type' => 'select',
									'name' => 'bg_setting',
									'label' => __('Background Settings:', SH_NAME),
									'description' => __('Select background Settings.', SH_NAME),
									'items' => array( 
												array('value'=>'repeat', 'label'=>'Repeat'),
												array('value'=>'no-repeat', 'label'=>'No Repeat'),
												array('value'=>'fixed', 'label'=>'Fixed'),
												array('value'=>'size', 'label'=>'size'),
											),
									'default' => 'repeat',
									'dependency' => array(
										'field' => 'back_type',
										'function' => 'vp_dep_is_bg_setting',
									),
								),
								array(
									'type' => 'select',
									'name' => 'body_bg_type',
									'label' => __('Body Background:', SH_NAME),
									'description' => __('Select Background Colour or Image', SH_NAME),
									'items' => array( array('value'=>'clr', 'label'=>'Select Colour'), array('value'=>'body_img', 'label'=>'Select Background Image'), ),
									'default' => '',
									'dependency' => array(
										'field' => 'body_layout',
										'function' => 'vp_dep_is_body_bg_type',
									),
								),
								array(
									'type' => 'color',
									'name' => 'bg_clr',
									'label' => __('Background Colour:', SH_NAME),
									'description' => __('Choose the Background Colour for the theme.', SH_NAME),
									'default' => '#f9f9f9',
									'dependency' => array(
										'field' => 'body_bg_type',
										'function' => 'vp_dep_is_bg_clr',
									),
								),
								array(
									'type' => 'upload',
									'name' => 'body_background',
									'label' => __('Background:', SH_NAME),
									'description' => __('Upload the Body Background Image.', SH_NAME),
									'default' => '',
									'dependency' => array(
										'field' => 'body_bg_type',
										'function' => 'vp_dep_is_body_background',
									),
								),
							),
						),
					),
				
				),
				
				/** Submenu for heading settings */
				array(
					'title' => __('Header Settings', SH_NAME),
					'name' => 'header_settings',
					'icon' => 'font-awesome:fa fa-th-large',
					'controls' => array(
						array(
							'type' => 'upload',
							'name' => 'site_favicon',
							'label' => __('Favicon', SH_NAME),
							'description' => __('Upload the favicon, should be 16x16', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'upload',
							'name' => 'logo_image',
							'label' => __('Logo Image', SH_NAME),
							'description' => __('Upload the logo image', SH_NAME),
							'default' => get_template_directory_uri().'/images/logo.png'
						),
						array(
							'name'  => 'sticky_menu',
							'label' => 'Sticky Menu:',
							'type'  => 'toggle',
						),
						array(
							'name'  => 'top_menu',
							'label' => 'Enable Top Menu:',
							'type'  => 'toggle',
						),
						array(
							'type' => 'upload',
							'name' => 'header_banner',
							'label' => __('Header Banner:', SH_NAME),
							'description' => __('Upload the header banner.', SH_NAME),
							'default' => get_template_directory_uri().'/images/ad.jpg'
						),
						array(
							'type' => 'textbox',
							'name' => 'banner_link',
							'label' => __('Banner Link:', SH_NAME),
							'description' => __('Enter your banner link.', SH_NAME),
						),
						array(
							'type' => 'radioimage',
							'name' => 'custom_header',
							'label' => __('Choose Header', SH_NAME),
							'item_max_height' => '150',
							'item_max_width' => '550',
							'items' => array(
								array(
									'value' => 'dark',
									'label' => __('Dark Header', SH_NAME),
									'img' => SH_URL.'/images/header.png',
								),
								array(
									'value' => 'white-without-banner',
									'label' => __('White Header', SH_NAME),
									'img' => SH_URL.'/images/header3.png',
								),
								array(
									'value' => 'white-with-banner',
									'label' => __('white Header with banner', SH_NAME),
									'img' => SH_URL.'/images/header2.png',
								),
								array(
									'value' => 'black_white_1',
									'label' => __('Black & white header Style 1', SH_NAME),
									'img' => SH_URL.'/images/header4.png',
								),
								array(
									'value' => 'black_white_2',
									'label' => __('Black & white header Style 2', SH_NAME),
									'img' => SH_URL.'/images/header5.png',
								),
								array(
									'value' => 'fancy_header',
									'label' => __('Fancy Header', SH_NAME),
									'img' => SH_URL.'/images/header6.png',
								),
							),
						),
								
						// Custom HEader Style End
						
						array(
							'type' => 'codeeditor',
							'name' => 'header_css',
							'label' => __('Header CSS', SH_NAME),
							'description' => __('Write your custom css to include in header.', SH_NAME),
							'theme' => 'github',
							'mode' => 'css',
						),
					),
				
				),
				
				/** Submenu for footer area */
				array(
					'title' => __('Footer Settings', SH_NAME),
					'name' => 'sub_footer_settings',
					'icon' => 'font-awesome:fa fa-th-large',
					'controls' => array(
					
						array(
							'type' => 'toggle',
							'name' => 'show_footer',
							'label' => __('Show Footer', SH_NAME),
						),
						array(
							'type' => 'section',
							'title' => __('Footer Options', SH_NAME),
							'name' => 'footer_options',
							'dependency' => array(
								'field' => 'show_footer',
								'function' => 'vp_dep_boolean',
							),
							'fields' => array(
								array(
									'type' => 'textarea',
									'name' => 'copyright_text',
									'label' => __('Copyright Text', SH_NAME),
									'description' => __('Enter the Copyright Text', SH_NAME),
									'default' => '',
								),
								array(
									'type' => 'upload',
									'name' => 'footer_bg',
									'label' => __('Background:', SH_NAME),
									'description' => __('Upload Background image for footer.', SH_NAME),
									'default' => '',
								),
								array(
									'type' => 'codeeditor',
									'name' => 'footer_analytics',
									'label' => __('Footer Analytics / Scripts', SH_NAME),
									'description' => __('In this area you can put Google Analytics Code or any other Script that you want to be included in the footer before the Body tag.', SH_NAME),
									'theme' => 'twilight',
									'mode' => 'javascript',
								),
							),
						),
					)
				), //End of submenu
				
				array(
					'title' => __('Twitter Settings', SH_NAME),
					'name' => 'sub_twitter_settings',
					'icon' => 'font-awesome:fa fa-th-large',
					'controls' => array(
					
						array(
							'type' => 'textbox',
							'name' => 'twitter_api',
							'label' => __('API', SH_NAME),
							'description' => __('Enter Twitter API key Here.', SH_NAME),
							'default' => '',
						),
						
						array(
							'type' => 'textbox',
							'name' => 'twitter_api_secret',
							'label' => __('API Secret', SH_NAME),
							'description' => __('Enter Twitter API Secret Here.', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'twitter_token',
							'label' => __('Token', SH_NAME),
							'description' => __('Enter Twitter Token here.', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'twitter_token_Secret',
							'label' => __('Token Secret', SH_NAME),
							'description' => __('Enter Token Secret', SH_NAME),
							'default' => '',
						),
					)
				), //End of submenu
			),
			
		),
		// Pages , Blog Pages Settings
		array(
			'title' => __('Page Settings', SH_NAME),
			'name' => 'general_settings',
			'icon' => 'font-awesome:fa fa-file',
			'menus' => array(
						
		/** Contact Settings */
				array(
				'title' => __('Contact Page Settings', SH_NAME),
				'name' => 'contact_Settings',
				'icon' => 'font-awesome:fa fa-th-large',
				'controls' => array(
					array(
						'type' => 'toggle',
						'name' => 'contact_show_heading',
						'label' => __('Show Heading:', SH_NAME),
						'description' => __('Show or hide Heading.', SH_NAME),
					),
					array(
							'type' => 'textbox',
							'name' => 'contact_heading',
							'label' => __('Title', SH_NAME),
							'description' => __('Enter the title of contact form.', SH_NAME),
							'default' => 'Contact Us',
							'dependency' => array(
									'field' => 'contact_show_heading',
									'function' => 'vp_dep_boolean',
								),
						),
					array(
							'type' => 'fontawesome',
							'name' => 'contact_title_icon',
							'label' => __('Icon', SH_NAME),
							'description' => __('Select the Icon for your Title.', SH_NAME),
						),
					array(
						'type'      => 'textarea',
						'name'      => 'success_message',
						'label'     => __('Success Message', SH_NAME),
						'description' => __('Enter the Success Code to show once the email is sent through contact form', SH_NAME),
					),
					array(
							'type' => 'toggle',
							'name' => 'contact_gmap_enable',
							'label' => __('Google Map Enable', SH_NAME),
							'description' => __('Enable Google Map Tab . ', SH_NAME),
							),
					array(
								'type'  => 'section',
								'title' => __('Googple MAp Tab', SH_NAME),
								'name'  => 'gmap_tab',
								'description' => __('Google Map Section', SH_NAME),
								'dependency' => array(
									'field' => 'contact_gmap_enable',
									'function' => 'vp_dep_boolean',
								),
								'fields' => array(
										array(
												'type' => 'textarea',
												'name' => 'contact_section_gmap_code',
												'label' => __('Google Map Code', SH_NAME),
												'description' => __('Enter the Google Map Code you want to display in this Section', SH_NAME),
											),
								),
							),
					
				)
			),
			
		// Search Page Settings 
				array(
				'title' => __('Search Page Settings', SH_NAME),
				'name' => 'search_page_settings',
				'icon' => 'font-awesome:fa fa-th-large',
				'controls' => array(
					array(
							'type' => 'select',
							'name' => 'search_blog_style',
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
						'name' => 'search_sidebar',
						'label' => __('Sidebar', SH_NAME),
						'default' => '',
						'items' => sh_get_sidebars(true)	
					),
					array(
						'type' => 'radioimage',
						'name' => 'search_layout',
						'label' => __('Page Layout', SH_NAME),
						'description' => __('Choose the layout for search pages', SH_NAME),
						'dependency' => array(
							'field' => 'search_sidebar',
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
				)
			),
		// Category Page Settings 
				array(
				'title' => __('Category Page Settings', SH_NAME),
				'name' => 'category_page_settings',
				'icon' => 'font-awesome:fa fa-th-large',
				'controls' => array(
					array(
						'type' => 'toggle',
						'name' => 'category_show_heading',
						'label' => __('Show Heading:', SH_NAME),
						'description' => __('Show or hide Heading.', SH_NAME),
					),
					array(
							'type' => 'textbox',
							'name' => 'category_heading',
							'label' => __('Title', SH_NAME),
							'description' => __('Enter the Title you want to show on category page', SH_NAME),
							'default' => 'Category Archive For: ',
							'dependency' => array(
								'field' => 'category_show_heading',
								'function' => 'vp_dep_boolean',
							),
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
						'dependency' => array(
							'field' => 'category_sidebar',
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
				)
			),
			
		// Tag Page Settings 
				array(
				'title' => __('Tag Page Settings', SH_NAME),
				'name' => 'tag_page_settings',
				'icon' => 'font-awesome:fa fa-th-large',
				'controls' => array(
					array(
						'type' => 'toggle',
						'name' => 'tag_show_heading',
						'label' => __('Show Heading:', SH_NAME),
						'description' => __('Show or hide Heading.', SH_NAME),
					),
					array(
							'type' => 'textbox',
							'name' => 'tag_heading',
							'label' => __('Title', SH_NAME),
							'description' => __('Enter the Title you want to show on tag page', SH_NAME),
							'default' => 'Tag Archive For: ',
							'dependency' => array(
								'field' => 'tag_show_heading',
								'function' => 'vp_dep_boolean',
							),
						),
					array(
							'type' => 'fontawesome',
							'name' => 'tag_title_icon',
							'label' => __('Icon', SH_NAME),
							'description' => __('Select the Icon for your Title.', SH_NAME),
						),
					array(
							'type' => 'select',
							'name' => 'tag_blog_style',
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
						'name' => 'tag_sidebar',
						'label' => __('Sidebar', SH_NAME),
						'default' => '',
						'items' => sh_get_sidebars(true)	
					),
					array(
						'type' => 'radioimage',
						'name' => 'tag_layout',
						'label' => __('Page Layout', SH_NAME),
						'description' => __('Choose the layout for tag pages', SH_NAME),
						'dependency' => array(
							'field' => 'tag_sidebar',
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
				)
			),
			
		// Archive Page Settings 
				array(
				'title' => __('Archive Page Settings', SH_NAME),
				'name' => 'archive_page_settings',
				'icon' => 'font-awesome:fa fa-th-large',
				'controls' => array(
					array(
						'type' => 'toggle',
						'name' => 'archive_show_heading',
						'label' => __('Show Heading:', SH_NAME),
						'description' => __('Show or hide Heading.', SH_NAME),
					),
					array(
							'type' => 'textbox',
							'name' => 'archive_heading',
							'label' => __('Title', SH_NAME),
							'description' => __('Enter the Title you want to show on archive page', SH_NAME),
							'default' => 'Archive',
							'dependency' => array(
								'field' => 'archive_show_heading',
								'function' => 'vp_dep_boolean',
							),
						),
					array(
							'type' => 'fontawesome',
							'name' => 'archive_title_icon',
							'label' => __('Icon', SH_NAME),
							'description' => __('Select the Icon for your Title.', SH_NAME),
						),
					array(
							'type' => 'select',
							'name' => 'archive_blog_style',
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
						'name' => 'archive_sidebar',
						'label' => __('Sidebar', SH_NAME),
						'default' => '',
						'items' => sh_get_sidebars(true)	
					),
					array(
						'type' => 'radioimage',
						'name' => 'archive_layout',
						'label' => __('Page Layout', SH_NAME),
						'description' => __('Choose the layout for archive pages', SH_NAME),
						'dependency' => array(
							'field' => 'archive_sidebar',
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
				)
			),
			
		// Author Page Settings 
				array(
				'title' => __('Author Page Settings', SH_NAME),
				'name' => 'author_page_settings',
				'icon' => 'font-awesome:fa fa-th-large',
				'controls' => array(
					array(
						'type' => 'toggle',
						'name' => 'author_show_heading',
						'label' => __('Show Heading:', SH_NAME),
						'description' => __('Show or hide Heading.', SH_NAME),
					),
					array(
							'type' => 'textbox',
							'name' => 'author_heading',
							'label' => __('Title', SH_NAME),
							'description' => __('Enter the Title you want to show on author page', SH_NAME),
							'default' => 'Author Archive For: ',
							'dependency' => array(
								'field' => 'author_show_heading',
								'function' => 'vp_dep_boolean',
							),
						),
					array(
							'type' => 'fontawesome',
							'name' => 'author_title_icon',
							'label' => __('Icon', SH_NAME),
							'description' => __('Select the Icon for your Title.', SH_NAME),
						),
					array(
							'type' => 'select',
							'name' => 'author_blog_style',
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
						'name' => 'author_sidebar',
						'label' => __('Sidebar', SH_NAME),
						'default' => '',
						'items' => sh_get_sidebars(true)	
					),
					array(
						'type' => 'radioimage',
						'name' => 'author_layout',
						'label' => __('Page Layout', SH_NAME),
						'description' => __('Choose the layout for author pages', SH_NAME),
						'dependency' => array(
							'field' => 'author_sidebar',
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
				)
			),
			
		// 404 Page Settings 
				array(
				'title' => __('404 Page Settings', SH_NAME),
				'name' => '404_page_settings',
				'icon' => 'font-awesome:fa fa-th-large',
				'controls' => array(
					array(
							'type' => 'textbox',
							'name' => '404_heading',
							'label' => __('Title', SH_NAME),
							'description' => __('Enter the Title you want to show on 404 page', SH_NAME),
							'default' => '404',
						),
						array(
							'type' => 'textbox',
							'name' => '404_sub_title',
							'label' => __('Sub Title', SH_NAME),
							'description' => __('Enter the Sub Title you want to show on 404 page', SH_NAME),
							'default' => 'The page you are looking for is not there',
						),
						array(
							'type' => 'textarea',
							'name' => '404_desc',
							'label' => __('Description:', SH_NAME),
							'description' => __('Enter the Description you want to show on 404 page', SH_NAME),
							'default' => 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable The page you are looking',
						),
					)
				),
			),			
		),
		
		// Author Box
		array(
				'title' => __('Author Box', SH_NAME),
				'name' => 'sh_author_box',
				'icon' => 'font-awesome:fa fa-user',
				'controls' => array(
					array(
						'type' => 'textbox',
						'name' => 'autor_name',
						'label' => __('Name:', SH_NAME),
						'description' => __('Enter your name.', SH_NAME),
					),
					array(
						'type' => 'textbox',
						'name' => 'autor_title',
						'label' => __('Author Title', SH_NAME),
						'description' => __('Enter the Title of Author.', SH_NAME),
					),
					array(
						'type' => 'toggle',
						'name' => 'contact_btn',
						'label' => __('Contact Button:', SH_NAME),
						'description' => __('Show hide contatct button.', SH_NAME),
					),
					array(
						'type' => 'select',
						'name' => 'box_position',
						'label' => __('Box Position:', SH_NAME),
						'description' => __('Select the box postion.', SH_NAME),
						'deafault' => 'no' ,
						'items' => array( 
										array('value'=>'top', 'label'=>'Before Header'), 
										array('value'=>'bottom', 'label'=>'After Header'),
								),
					),
					array(
						'type' => 'upload',
						'name' => 'author_img',
						'label' => __('Author Image', SH_NAME),
						'description' => __('Upload the Author Image, Recomended Format is png', SH_NAME),
					),
					array(
						'type' => 'upload',
						'name' => 'box_parallax',
						'label' => __('Parallax Image', SH_NAME),
						'description' => __('Upload the Author Box background Parallax image.', SH_NAME),
					),
				),
		),
		
		// Dynamic FAQs
		array(
			'title' => __('FAQs', SH_NAME),
			'name' => 'sh_faqs',
			'icon' => 'font-awesome:fa fa-question',
			'controls' => array(
				array(
					'type' => 'builder',
					'repeating' => true,
					'sortable'  => true,
					'label' => __('FAQs', SH_NAME),
					'name' => 'sah_faqs',
					'description' => __('This section is used to add FAQs.', SH_NAME),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'sh_question',
							'label' => __('Heading', SH_NAME),
							'description' => __('Enter the Heading of FAQs.', SH_NAME),
						),
						array(
							'type' => 'textarea',
							'name' => 'sh_desc',
							'label' => __('Description', SH_NAME),
							'description' => __('Enter the Description of FAQs.', SH_NAME),
						),
					),
				),
			)
		),
		// Partners Section
		array(
				'title' => __('Partners', SH_NAME),
				'name' => 'partners_settings',
				'icon' => 'font-awesome:fa fa-group',
				'controls' => array(
					array(
						'type' => 'builder',
						'repeating' => true,
						'sortable'  => true,
						'label' => __('Partners', SH_NAME),
						'name' => 'dynamic_partners',
						'description' => __('This section is used to add Partners.', SH_NAME),
						'fields' => array(
							array(
								'type' => 'textbox',
								'name' => 'partner_link',
								'label' => __('Pastors Link', SH_NAME),
								'description' => __('Enter Link of the Partner.', SH_NAME),
							),
							array(
									'type' => 'upload',
									'name' => 'partner_img',
									'label' => __('Image', SH_NAME),
									'description' => __('Upload image.', SH_NAME),								
							),
						),
					),
				)
			),	
		// Sidebar Creator
		array(
				'title' => __('Sidebar Settings', SH_NAME),
				'name' => 'sidebar-settings',
				'icon' => 'font-awesome:fa fa-list-ol',
				'controls' => array(
					array(
						'type' => 'builder',
						'repeating' => true,
						'sortable'  => true,
						'label' => __('Dynamic Sidebar', SH_NAME),
						'name' => 'dynamic_sidebar',
						'description' => __('This section is used for theme color settings', SH_NAME),
						'fields' => array(
							array(
								'type' => 'textbox',
								'name' => 'sidebar_name',
								'label' => __('Sidebar Name', SH_NAME),
								'description' => __('Choose the default color scheme for the theme.', SH_NAME),
								'default' => __('Dynamic Sidebar', SH_NAME),
							),
						),
					),
				)
			),
		
		// language settings
		array(
			'title' => __('Languages', SH_NAME),
			'name' => 'sh_language_settings',
			'icon' => 'font-awesome:fa fa-language',
			'controls' => array(
				array(
					'type' => 'language',
					'name' => 'sh_language_uploader',
					'label' => __('Uploade Your .mo file:', SH_NAME),
					'description' => __('Please Upload Your .mo file.', SH_NAME),
				),
				array(
					'type' => 'select',
					'name' => 'sh_localize',
					'label' => __('Select Language:', SH_NAME),
					'items' => array(
						'data' => array(
							array(
								'source' => 'function',
								'value' => 'fw_get_languages',
							),
						),
					),
				),
			),
		),
		
		/* Font settings */	
		array(
				'title' => __('Font Settings', SH_NAME),
				'name' => 'font_settings',
				'icon' => 'font-awesome:fa fa-font',
				'menus' => array(
					/** heading font settings */
					array(
						'title' => __('Heading Font', SH_NAME),
						'name' => 'heading_font_settings',
						'icon' => 'font-awesome:fa fa-th-large',
						
						'controls' => array(
							
							array(
								'type' => 'toggle',
								'name' => 'use_custom_font',
								'label' => __('Use Custom Font', SH_NAME),
								'description' => __('Use custom font or not', SH_NAME),
								'default'	=> 0,
							),
							array(
								'type'  => 'section',
								'title' => __('H1 Settings', SH_NAME),
								'name'  => 'h1_settings',
								'description' => __('heading 1 font settings', SH_NAME),
								'dependency' => array(
									'field' => 'use_custom_font',
									'function' => 'vp_dep_boolean',
								),
								'fields' => array(
									array(
										'type' => 'select',
										'label' => __('Font Family', SH_NAME),
										'name' => 'h1_font_family',
										'description' => __('Select the font family to use for h1', SH_NAME),
										'items' => array(
											'data' => array(
												array(
													'source' => 'function',
													'value' => 'vp_get_gwf_family',
												),
											),
										),
										
									),
									
									array(
										'type' => 'color',
										'name' => 'h1_font_color',
										'label' => __('Font Colour', SH_NAME),
										'description' => __('Choose the font color for heading h1', SH_NAME),
										'default' => '#98ed28',
									),
								),
							),
							array(
								'type'  => 'section',
								'title' => __('H2 Settings', SH_NAME),
								'name'  => 'h2_settings',
								'description' => __('heading h2 font settings', SH_NAME),
								'dependency' => array(
									'field' => 'use_custom_font',
									'function' => 'vp_dep_boolean',
								),
								'fields' => array(
									array(
										'type' => 'select',
										'label' => __('Font Family', SH_NAME),
										'name' => 'h2_font_family',
										'description' => __('Select the font family to use for h2', SH_NAME),
										'items' => array(
											'data' => array(
												array(
													'source' => 'function',
													'value' => 'vp_get_gwf_family',
												),
											),
										),
									),
									array(
										'type' => 'color',
										'name' => 'h2_font_color',
										'label' => __('Font Colour', SH_NAME),
										'description' => __('Choose the font color for heading h1', SH_NAME),
										'default' => '#98ed28',
									),
								),
							),
							array(
								'type'  => 'section',
								'title' => __('H3 Settings', SH_NAME),
								'name'  => 'h3_settings',
								'description' => __('heading h3 font settings', SH_NAME),
								'dependency' => array(
									'field' => 'use_custom_font',
									'function' => 'vp_dep_boolean',
								),
								'fields' => array(
									
									array(
										'type' => 'select',
										'label' => __('Font Family', SH_NAME),
										'name' => 'h3_font_family',
										'description' => __('Select the font family to use for h3', SH_NAME),
										'items' => array(
											'data' => array(
												array(
													'source' => 'function',
													'value' => 'vp_get_gwf_family',
												),
											),
										),
										
									),
									array(
										'type' => 'color',
										'name' => 'h3_font_color',
										'label' => __('Font Colour', SH_NAME),
										'description' => __('Choose the font color for heading h3', SH_NAME),
										'default' => '#98ed28',
									),
								),
							),
							
							array(
								'type'  => 'section',
								'title' => __('H4 Settings', SH_NAME),
								'name'  => 'h4_settings',
								'description' => __('heading h4 font settings', SH_NAME),
								'dependency' => array(
									'field' => 'use_custom_font',
									'function' => 'vp_dep_boolean',
								),
								'fields' => array(
									
									array(
										'type' => 'select',
										'label' => __('Font Family', SH_NAME),
										'name' => 'h4_font_family',
										'description' => __('Select the font family to use for h4', SH_NAME),
										'items' => array(
											'data' => array(
												array(
													'source' => 'function',
													'value' => 'vp_get_gwf_family',
												),
											),
										),
										
									),
									array(
										'type' => 'color',
										'name' => 'h4_font_color',
										'label' => __('Font Colour', SH_NAME),
										'description' => __('Choose the font color for heading h4', SH_NAME),
										'default' => '#98ed28',
									),
								),
							),
							
							array(
								'type'  => 'section',
								'title' => __('H5 Settings', SH_NAME),
								'name'  => 'h5_settings',
								'description' => __('heading h5 font settings', SH_NAME),
								'dependency' => array(
									'field' => 'use_custom_font',
									'function' => 'vp_dep_boolean',
								),
								'fields' => array(
									
									array(
										'type' => 'select',
										'label' => __('Font Family', SH_NAME),
										'name' => 'h5_font_family',
										'description' => __('Select the font family to use for h5', SH_NAME),
										'items' => array(
											'data' => array(
												array(
													'source' => 'function',
													'value' => 'vp_get_gwf_family',
												),
											),
										),
										
									),
									array(
										'type' => 'color',
										'name' => 'h5_font_color',
										'label' => __('Font Colour', SH_NAME),
										'description' => __('Choose the font color for heading h5', SH_NAME),
										'default' => '#98ed28',
									),
								),
							),
							
							array(
								'type'  => 'section',
								'title' => __('H6 Settings', SH_NAME),
								'name'  => 'h6_settings',
								'description' => __('heading h6 font settings', SH_NAME),
								'dependency' => array(
									'field' => 'use_custom_font',
									'function' => 'vp_dep_boolean',
								),
								'fields' => array(
									
									array(
										'type' => 'select',
										'label' => __('Font Family', SH_NAME),
										'name' => 'h6_font_family',
										'description' => __('Select the font family to use for h6', SH_NAME),
										'items' => array(
											'data' => array(
												array(
													'source' => 'function',
													'value' => 'vp_get_gwf_family',
												),
											),
										),
										
									),
									array(
										'type' => 'color',
										'name' => 'h6_font_color',
										'label' => __('Font Colour', SH_NAME),
										'description' => __('Choose the font color for heading h6', SH_NAME),
										'default' => '#98ed28',
									),
								),
							),
						)
					),
					
					/** body font settings */
					/** body font settings */
					array(
						'title' => __('Body Font', SH_NAME),
						'name' => 'body_font_settingss',
						'icon' => 'font-awesome:fa fa-th-large',
						'controls' => array(
							array(
								'type' => 'toggle',
								'name' => 'body_custom_fonts',
								'label' => __('Use Custom Font', SH_NAME),
								'description' => __('Use custom font or not', SH_NAME),
								'default'	=> 0,
							),
							array(
								'type'  => 'section',
								'title' => __('Body Font Settings', SH_NAME),
								'name'  => 'body_font_settings',
								'description' => __('body font settings', SH_NAME),
								'dependency' => array(
									'field' => 'body_custom_fonts',
									'function' => 'vp_dep_boolean',
								),
								'fields' => array(
									
									array(
										'type' => 'select',
										'label' => __('Font Family', SH_NAME),
										'name' => 'body_font_family',
										'description' => __('Select the font family to use for body', SH_NAME),
										'items' => array(
											'data' => array(
												array(
													'source' => 'function',
													'value' => 'vp_get_gwf_family',
												),
											),
										),
										
									),
									
									array(
										'type' => 'color',
										'name' => 'body_font_color',
										'label' => __('Font Colour', SH_NAME),
										'description' => __('Choose the font color for heading body', SH_NAME),
										'default' => '#98ed28',
									),
								),
							),
						)
					)
				)
		),

		// Dynamic Social Media Creator
		array(
			'title' => __('Social Media ', SH_NAME),
			'name' => 'social_media_section',
			'icon' => 'font-awesome:fa fa-share-alt',
			'controls' => array(
				array(
					'type' => 'builder',
					'repeating' => true,
					'sortable'  => true,
					'label' => __('Social Media', SH_NAME),
					'name' => 'social_media',
					'description' => __('This section is used to add Social Media.', SH_NAME),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'social_link',
							'label' => __('Link', SH_NAME),
							'description' => __('Enter the Link for Social Media.', SH_NAME),
							'default' => __('#', SH_NAME),
						),
						array(
							'type' => 'fontawesome',
							'name' => 'social_icon',
							'label' => __('Icon', SH_NAME),
							'description' => __('Choose Icon for Social Media.', SH_NAME),
							'default' => '',
						),
					   array(
							'type' => 'color',
							'name' => 'icon_color_scheme',
							'label' => __('Colour Scheme', SH_NAME),
							'description' => __('Choose the background color for this icon.', SH_NAME),
						),
					),
				),
			)
		),
)
);
/**
 *EOF
 */