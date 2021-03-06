<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<?php 	
		$settings 		= 	get_option( SH_NAME . '_theme_options' );
		$header 		= 	sh_set( $settings, 'custom_header' ) ? sh_set( $settings, 'custom_header' ) : 'header-style1';
	?>
    <?php echo ( sh_set( $settings, 'site_favicon' ) ) ? '<link rel="icon" type="image/png" href="'.sh_set( $settings, 'site_favicon' ).'">': '';?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		{
			wp_enqueue_script( 'comment-reply' );
		}
	?>
    <?php wp_head(); ?>
    <?php 
		$body_layout	=	(sh_set( $settings, 'body_layout' ))?sh_set( $settings, 'body_layout' ):'';
		$back_type		=	(sh_set( $settings, 'back_type'))?sh_set( $settings, 'back_type'):'';
		$sticky			=	(sh_set( $settings, 'sticky_menu'))? 'fix-header' : '';
		
		if( $body_layout == 'fixed' )
		{
			$boxed		=	'boxed';
			if( $back_type == 'pat' )
			{
				$pat			=	(sh_set( $settings, 'bg_pattorns' ))?sh_set( $settings, 'bg_pattorns' ):'';
				$body_class		=	'body_pattern';
				echo '<style>
							.body_pattern{
								background-image: url('.SH_URL."images/".$pat.".png".');
								background-repeat:repeat;
							}
					  </style>';	
			}else if( $back_type == 'own_bg' )
			{
				$own_bg			=	(sh_set( $settings, 'site_background' ))?sh_set( $settings, 'site_background' ):'';
				$bg_set			=	(sh_set( $settings, 'bg_setting' ))?sh_set( $settings, 'bg_setting' ):'';
				$body_class		=	'body_own';
				echo '<style>
							.body_own{
								background-image: url('.$own_bg.');
								background-repeat:'.$bg_set.';
							}
					  </style>';	
			}
		}if( $body_layout == 'full' )
		{
			$full_bg_type		=	sh_set( $settings, 'body_bg_type' );
			if( $full_bg_type == 'clr' )
			{
				$clr			=	sh_set( $settings, 'bg_clr' );
				$body_class		=	'body_clr';
				echo '<style>
						.body_clr {
							background:'.$clr.' !important;
						}
					</style>';
			}else if( $full_bg_type == 'body_img' )
			{
				$b_img = ( sh_set( $settings, 'body_background' ) ) ? sh_set( $settings, 'body_background' ): '';
				$body_class		=	'fixed-bg';
				echo '<style>
						.fixed-bg {
							background-attachment: fixed;
							background-image: url("'.$b_img.'");
							background-repeat: no-repeat;
							background-size: 100% auto;
							position: relative;
						}
					</style>';
			}
		}
		if( !isset( $body_class )): $body_class = ''; endif;
		if( $body_layout == 'fixed' )
		{
			$boxed = 'boxed';
		}else{
			$boxed = '';
		}
	?>
</head>
<?php global $is_IE ?>
<body <?php body_class($body_class);?>>
<div class="theme-layout <?php echo $boxed?>">
<?php 
			$page_settings  = sh_set(sh_set(get_post_meta(get_the_ID(), 'sh_page_meta', true) , 'sh_page_options') , 0);
			if( sh_set( $page_settings, 'show_author' ) == 1  && sh_set( $settings, 'box_position' ) == 'top' ):
				include (get_template_directory().'/framework/modules/shortcodes/author.php' );
				echo '<div class="author_bio">';
				echo $output;
				echo '</div>';
			endif;
		?>
<?php sh_responsive_menu() ?>
<header class="header-style1 dark <?php echo $sticky;?>">
	<div class="head-sec">
		<div class="container">
			<div class="logo">
				<?php $Logo = '<img src="' . sh_set( $settings, 'logo_image' ) . '" alt="" />'; ?>
				<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php echo $Logo; ?></a>
			</div>
            <ul class="social-btns">
                <?php echo sh_socil_media_sim( 5 )?>
            </ul>
            <form class="header-search" method="get" action="<?php echo home_url()?>">
            	<input name="s" type="text" placeholder="Search Here" />
                <button type="submit"><i class="fa fa-search"></i></button>
           </form>
		</div>
	</div>
    <div class="menu-sec">
    	<div class="container">
			<nav class="menus">
				<?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'menu_class' => '', 'container'=>null, 'fallback_cb' => false, 'walker' => new SH_Megamenu_walker ) ); ?>
			</nav>
		</div>
	</div>
</header><!-- Header End -->
<?php 
			if( sh_set( $page_settings, 'show_author' ) == 1  && sh_set( $settings, 'box_position' ) == 'bottom' ):
				include (get_template_directory().'/framework/modules/shortcodes/author.php' );
				echo $output;
			endif;
		?>