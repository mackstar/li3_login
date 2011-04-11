<?php

/**
 * Register g11n resource.
 */
use \lithium\g11n\Catalog;

$catalog = array(
	'login' => array(
		'adapter' => 'Php',
		'path' => dirname(dirname(__DIR__)) . '/resources/g11n/php'
	)
);
Catalog::config($catalog + Catalog::config());

if (file_exists(LITHIUM_APP_PATH . '/config/bootstrap/g11n.php')) {
	require_once LITHIUM_APP_PATH . '/config/bootstrap/g11n.php';
}