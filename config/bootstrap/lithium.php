<?php

use lithium\core\Environment;
use lithium\core\Libraries;

if (!defined('LITHIUM_LIBRARY_PATH')) {
	define('LITHIUM_APP_PATH', dirname(dirname(__DIR__)));
	define('LITHIUM_LIBRARY_PATH', dirname(dirname(dirname(__DIR__))) . '/libraries');
}

if (!include_once LITHIUM_LIBRARY_PATH . '/lithium/core/Libraries.php') {
	$message  = "Lithium core could not be found.  Check the value of LITHIUM_LIBRARY_PATH in ";
	$message .= "config/bootstrap.php.  It should point to the directory containing your ";
	$message .= "/libraries directory.";
	trigger_error($message, E_USER_ERROR);
}

if (!Libraries::get('lithium')) {
	Libraries::add('lithium');
}

if (!Libraries::get('login')) {
	Libraries::add('login', array('default' => true));
}