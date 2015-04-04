<?php
if( !function_exists( 'blog_load_class' ) )
{
	function blog_load_class($class, $directory = 'libraries', $global = true, $prefix = 'SH_')
	{
		$obj = &$GLOBALS['_sh_base'];
		$obj = is_object( $obj ) ? $obj : new stdClass;
		$name = FALSE;
		// Is the request a class extension?  If so we load it too
		$path = plugin_dir_path( __FILE__ ).$directory.$class.'.php';
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
}