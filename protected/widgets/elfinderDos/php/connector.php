<?php

error_reporting(0); // Set E_ALL for debuging

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elfinderDosConnector.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elfinderDos.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elfinderDosVolumeDriver.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elfinderDosVolumeLocalFileSystem.class.php';
// Required for MySQL storage connector
// include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elfinderDosVolumeMySQL.class.php';

/**
 * Simple function to demonstrate how to control file access using "accessControl" callback.
 * This method will disable accessing files/folders starting from  '.' (dot)
 *
 * @param  string  $attr  attribute name (read|write|locked|hidden)
 * @param  string  $path  file path relative to volume root directory started with directory separator
 * @return bool
 **/
function access($attr, $path, $data, $volume) {
	return strpos(basename($path), '.') === 0   // if file/folder begins with '.' (dot)
		? !($attr == 'read' || $attr == 'write')  // set read+write to false, other (locked+hidden) set to true
		: ($attr == 'read' || $attr == 'write');  // else set read+write to true, locked+hidden to false
}

$opts = array(
	'debug' => true,
	'roots' => array(
		array(
			'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
			'path'          => '../files/',         // path to files (REQUIRED)
			'URL'           => dirname($_SERVER['PHP_SELF']) . '/../files/', // URL to files (REQUIRED)
			'accessControl' => 'access',             // disable and hide dot starting files (OPTIONAL)
			'uploadAllow' => array('image') ,
		)
	)
);

// run elfinderDos
$connector = new elfinderDosConnector(new elfinderDos($opts));
$connector->run();
