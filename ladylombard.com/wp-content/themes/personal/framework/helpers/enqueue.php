<?php
class SH_Enqueue
{
	function __construct()
	{
		add_action( 'wp_enqueue_scripts', array( $this, 'sh_enqueue_scripts' ) );
		add_action( 'wp_head', array( $this, 'wp_head' ) );
		add_action( 'wp_footer', array( $this, 'wp_footer' ) );
	}
	
	function sh_enqueue_scripts()
	{
		$options = get_option( SH_NAME.'_theme_options' );
		$protocol = is_ssl() ? 'https' : 'http';
		$styles = array( 
					'google_fonts' => $protocol.'://fonts.googleapis.com/css?family=Roboto:400,500,700|Limelight|Julius+Sans+One|Roboto+Condensed:400,700,300|Source+Sans+Pro|Josefin+Slab:700',
					'bootstrap' 		=>	'css/bootstrap.min.css', 
					'font-awesome' 		=>	'css/font-awesome.min.css',
					'extralayers' 		=>	'css/extralayers.css',
					'revolution' 		=>	'css/revolution.css',
					'settings' 			=>	'css/settings.css',
					'owl' 				=>	'css/owl.carousel.css',
					'prettyPhoto'		=>	'css/prettyPhoto.css',
					'main_style' 		=>	'style.css',
					'responsive' 		=>	'css/responsive.css',
				);	
		
		$fonts =  $this->custom_fonts();
		if( $fonts ):
			foreach ( $fonts as $key => $value )
			{
				wp_enqueue_style( $key , $value );
			}
		endif;	
		
		foreach( $styles as $name => $style )
		{
			if (strstr( $style, 'http' ) || strstr( $style, 'https' ) ) wp_enqueue_style( $name, $style );
			else wp_enqueue_style( $name, SH_URL.$style );
		}
		$scripts = array( 
					  'jquery' 			=>	'jquery-1.11.0.js', 	
					  'modernizr'		=>	'modernizr.js',
					  'bootstrap' 		=>	'bootstrap.min.js', 
					  'owl'				=>	'owl.carousel.min.js',
					  'scrolltop'		=>	'scrolltopcontrol.js',
					  'isotopes'		=>	'jquery.isotope.js',					  
					  'lightbox'		=>	'html5lightbox.js',
					  'jigowatt'		=>	'jquery.jigowatt.js',
					  'flickrjs'		=>	'jflickrfeed.min.js',
					  'prettyPhoto'		=>	'jquery.prettyPhoto.js',
					  'lodash'			=>	'lodash.min.js',
					  'custom_script'	=>	'script.js', 					  
					);
					
		wp_enqueue_script( 'jquery' );			 
		foreach( $scripts as $name => $js )
		{
			wp_register_script( $name, SH_URL.'js/'.$js, array(), '', true);
		}
		
		wp_enqueue_script( array( 'jquery', 'modernizr', 'bootstrap', 'owl', 'scrolltop', 'isotopes', 'lightbox', 'jigowatt', 'prettyPhoto', 'flickrjs', 'lodash', 'custom_script' ) );
		if( is_singular() ) wp_enqueue_script('comment-reply');
	}
	function wp_head()
	{
		$options = get_option(SH_NAME.'_theme_options');
		echo $custom_css = sh_set($options , 'custom_css');
		echo sh_theme_color_scheme();
		echo '<script type="text/javascript"> if( ajaxurl === undefined ) var ajaxurl = "'.admin_url('admin-ajax.php').'";</script>';
		echo "\n";
        if( sh_set( $options, 'body_custom_fonts' ) == 1 ): 
				echo '<style type="text/css">';
				echo sh_get_font_settings( array( 'body_font_family' => 'font-family', 'body_font_color' => ';color' ), 'body, p {', ' !important}' );
				echo '</style>';
			endif;
			 if( sh_set( $options, 'use_custom_font' ) == 1 ): 
			 	echo '<style type="text/css">';
				echo sh_get_font_settings( array( 'h1_font_family' => 'font-family' ), 'h1 {', ' !important}' );
				echo sh_get_font_settings( array( 'h2_font_family' => 'font-family' ), 'h2 {', ' !important}' );
				echo sh_get_font_settings( array( 'h3_font_family' => 'font-family' ), 'h3 {', ' !important}' );
				echo sh_get_font_settings( array( 'h4_font_family' => 'font-family' ), 'h4 {', ' !important}' );
				echo sh_get_font_settings( array( 'h5_font_family' => 'font-family' ), 'h5 {', ' !important}' );
				echo sh_get_font_settings( array( 'h6_font_family' => 'font-family' ), 'h6 {', ' !important}' );
				
				
				echo sh_get_font_settings( array( 'h1_font_color' => ';color' ), 'h1 {', ' !important}' );
				echo sh_get_font_settings( array( 'h2_font_color' => ';color' ), 'h2 {', ' !important}' );
				echo sh_get_font_settings( array( 'h3_font_color' => ';color' ), 'h3 {', ' !important}' );
				echo sh_get_font_settings( array( 'h4_font_color' => ';color' ), 'h4 {', ' !important}' );
				echo sh_get_font_settings( array( 'h5_font_color' => ';color' ), 'h5 {', ' !important}' );
				echo sh_get_font_settings( array( 'h6_font_color' => ';color' ), 'h6 {', ' !important}' );
				echo '</style>';
			endif; 
		if( sh_set( $options, 'set_rtl' ) == 1 ): echo "<link rel='stylesheet' id='rtl'  href='".get_template_directory_uri()."/css/rtl.css?ver=4.0' type='text/css' media='all' />"; endif;
	}
	
	function custom_fonts( $styles = null )
	{
		$opt = get_option(SH_NAME.'_theme_options');
		
		$protocol = ( is_ssl() ) ? 'https' : 'http';
		$font = array();
		if( sh_set( $opt, 'use_custom_font' ) == 1 ):
			if( $h1 = sh_set( $opt, 'h1_font_family' ) ) $font[$h1] = urlencode( $h1 ).':400,300,600,700,800';
			if( $h2 = sh_set( $opt, 'h2_font_family' ) ) $font[$h2] = urlencode( $h2 ).':400,300,600,700,800';
			if( $h3 = sh_set( $opt, 'h3_font_family' ) ) $font[$h3] = urlencode( $h3 ).':400,300,600,700,800';
			if( $h4 = sh_set( $opt, 'h4_font_family' ) ) $font[$h4] = urlencode( $h4 ).':400,300,600,700,800';
			if( $h5 = sh_set( $opt, 'h5_font_family' ) ) $font[$h5] = urlencode( $h5 ).':400,300,600,700,800';
			if( $h6 = sh_set( $opt, 'h6_font_family' ) ) $font[$h6] = urlencode( $h6 ).':400,300,600,700,800';
		endif;
		if( sh_set( $opt, 'body_custom_fonts' ) == 1 ): 	
			if( $body = sh_set( $opt, 'body_font_family' ) ) $font[$body] = urlencode( $body ).':400,300,600,700,800';
		endif;	
			if( $font ) $styles['sh_google_custom_font'] = $protocol.'://fonts.googleapis.com/css?family='.implode('|', $font);
		return $styles;
	}
	function wp_footer()
	{
	}
}