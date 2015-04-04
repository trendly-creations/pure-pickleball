<?php
get_template_part('framework/base');
// windows-proof constants: replace backward by forward slashes - thanks to: https://github.com/peterbouwmeester

$fr_dir = get_template_directory_uri().'/framework/';

$fr_abs = get_template_directory().'/framework/';
if(!defined('SH_FRW_DIR')){
	define('SH_FRW_DIR', $fr_abs);
}

if(!defined('SH_FRW_URL')){
	define('SH_FRW_URL', $fr_dir);
}
if(!defined('SH_Options_URL')){
	define('SH_Options_URL', $fr_dir);
}
if(!defined('SH_THEME_NAME')){
	define('SH_THEME_NAME', $fr_dir);
}
function get_options($section = 'general_settings', $key = '', $std = '')
    {
        $options = wp_cache_get('alloptions', 'options');
        if ($value = kvalue($options, $section))
            $settings = maybe_unserialize($value);
        else
            $settings = get_option(THEME_PREFIX . $section);

        if ($key) return (isset($settings[$key])) ? $settings[$key] : $std;
        else return $settings;
    }
	
function sh_get_rev_slider()
{
	global $wpdb;	
	$res = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."revslider_sliders");	
	$return = array();
	if( $res ){
		foreach( $res as $r )
		{
			$return[sh_set( $r, 'alias' )] = sh_set( $r, 'title' );
		}
	}
	return $return;
}

function sh_set( $var, $key, $def = '' )
{
	if( !$var ) return false;
	if( is_object( $var ) && isset( $var->$key ) ) return $var->$key;
	elseif( is_array( $var ) && isset( $var[$key] ) ) return $var[$key];
	elseif( $def ) return $def;
	else return false;
}
function sh_ch_limit( $Limit, $Text )
{
	return ( strlen( $Text ) > $Limit ) ? substr( $Text, 0, $Limit ).'<small>...</small>': $Text;
}
function sh_get_title( $Title, $TitleTag, $SubTitleTag, $IsFirstWordInSubTitleTag = TRUE )
{
	if( strpos( $Title, ' ' ) !== FALSE )
	{
		$FirstWord = explode( ' ', $Title );
		$RestOfTitle = str_replace( $FirstWord[0], '', $Title );

		$FirstWordBefore = ( $IsFirstWordInSubTitleTag !== FALSE ) ? '<'.$SubTitleTag.'>': '';

		$FirstWordAfert = ( $IsFirstWordInSubTitleTag !== FALSE ) ? '</'.$SubTitleTag.'> ': ' <'.$SubTitleTag.'>';

		$RestOfTitleAfter = ( $IsFirstWordInSubTitleTag === FALSE ) ? '</'.$SubTitleTag.'>': '';

		

		return '<'.$TitleTag.'>'.$FirstWordBefore.$FirstWord[0].$FirstWordAfert.$RestOfTitle.$RestOfTitleAfter.'</'.$TitleTag.'>';

	}

	else return '<'.$TitleTag.'><'.$SubTitleTag.'>'.$Title.'</'.$SubTitleTag.'></'.$TitleTag.'>';

}



function sh_get_post_types()
{
	$post_types = get_post_types( '', 'names' );
	$PostTypes = array( '' => '' );
	foreach ( $post_types as $post_type ) {
		$Value = str_replace( 'dict', '', $post_type );
		$Value = str_replace( '_', ' ', $Value );
		$PostTypes[$post_type] = ucwords( $Value );
	}
	return $PostTypes;
}
function printr($data)
{
	echo '<pre>'; print_r($data);exit;
}
function _font_awesome( $index )
{
	$array = array_values($GLOBALS['_font_awesome']);
	if( $font = sh_set($array, $index )) return $font;
	else return false;
}
function _load_class($class, $directory = 'libraries', $global = true, $prefix = 'SH_')
{
	$obj = &$GLOBALS['_sh_base'];
	$obj = is_object( $obj ) ? $obj : new stdClass;
	$name = FALSE;
	// Is the request a class extension?  If so we load it too
	$path = SH_FRW_DIR.$directory.'/'.$class.'.php';	

	if( file_exists($path) )

	{
		$name = $prefix.ucwords( $class );		
		if (class_exists($name) === FALSE) {
			require($path);
			//if( $class == 'donation') {echo $name;exit;}
		}
	}
	// Did we find the class?
	if ($name === FALSE) exit('Unable to locate the specified class: '.$class.'.php');
	if( $global ) $GLOBALS['_sh_base']->$class = new $name();
	else new $name();
}
get_template_part('framework/library/functions');
get_template_part('framework/library/widgets');
get_template_part('framework/helpers/taxonomies');



_load_class('enqueue', 'helpers', false);
_load_class( 'ajax', 'helpers', false );
_load_class( 'codebird', 'helpers' , false);
_load_class( 'megamenu_walker', 'helpers', false );
//_load_class( 'gallery', 'modules/gallery', true );

include(SH_FRW_DIR.'library/tgm-plugin-activation/plugins.php');

if( function_exists('vc_map') ) get_template_part( 'framework/vc_map' );

/**
 * Include Vafpress Framework
 */
require_once 'vafpress/bootstrap.php';
include_once( 'vp_new/loader.php' );
/**
 * Include Custom Data Sources
 */
require_once 'vafpress/admin/data_sources.php';


// options
$tmpl_opt  = get_template_directory() . '/framework/vafpress/admin/option/option.php';

// metaboxes
$tmpl_mb1  = include_once(get_template_directory() . '/framework/vafpress/admin/metabox/meta_boxes.php');


/**
* Create instance of Options
*/
$theme_options = new VP_Option(array(
	'is_dev_mode'           => false,                                  // dev mode, default to false
	'option_key'            => SH_NAME.'_theme_options',                           // options key in db, required
	'page_slug'             => SH_NAME.'_option',                           // options page slug, required
	'template'              => $tmpl_opt,                              // template file path or array, required
	'menu_page'             => 'themes.php',                           // parent menu slug or supply `array` (can contains 'icon_url' & 'position') for top level menu
	'use_auto_group_naming' => true,                                   // default to true
	'use_util_menu'         => true,                                   // default to true, shows utility menu
	'minimum_role'          => 'edit_theme_options',                   // default to 'edit_theme_options'
	'layout'                => 'fluid',                                // fluid or fixed, default to fixed
	'page_title'            => __( 'Theme Options', SH_NAME ), // page title
	'menu_label'            => __( 'Theme Options', SH_NAME ), // menu label
));
// * Create instances of Metaboxes

foreach( (array)$tmpl_mb1 as $tmb )  new VP_Metabox($tmb);

$tmpl_mb1  = include get_template_directory() . '/framework/vafpress/admin/taxonomy/taxonomy.php';

include_once( get_template_directory() . '/framework/vp_new/taxonomy.php' );
foreach( $tmpl_mb1 as $tmb )   new SH_Metabox($tmb);

if(is_admin())
{
	if( sh_set($_GET, 'page') == 'wp_corner_stone_option' && sh_set($_GET, 'sh_dummy') == true)
	{
		
		_load_class('import_export', 'helpers');
		$GLOBALS['_sh_base']->import_export->export();
	}
}