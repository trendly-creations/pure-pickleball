<?php 
function sh_xml_importer()
{
	define('WP_LOAD_IMPORTERS', true);

	if ( !class_exists( 'WP_Import' ) ) {
		include ( SH_ROOT . '/framework/wordpress-importer/wordpress-importer.php');
	}

	$content_xml = SH_ROOT."framework/backup/data.xml";
	if(!is_file($content_xml)) {
		printr('wrong file');
	} else {
		$GLOBALS['wp_import'] = new WP_Import();
		$GLOBALS['wp_import']->fetch_attachments = true;
		$GLOBALS['wp_import']->import($content_xml);
		
		_load_class('import_export', 'helpers');
		$GLOBALS['_sh_base']->import_export->import();
	}
}
?>