<?php
/*
Plugin Name: Blog Shortcode
Description: This plugin work with Blog theme only
Author: Webinane
Author URI: http://themeforest.net/user/webinane
Version: 1.0
License: GPL2
Text Domain: wp_blog
*/

$theme = wp_get_theme();
if( $theme->name == 'Personal' )
{
	add_action( 'plugins_loaded','sh_blog_shortcodes_setup' );
	function sh_blog_shortcodes_setup()
	{
		include 'functions.php';
		blog_shortcodes_load_class( 'shortcodes', '', false );
	}
}

