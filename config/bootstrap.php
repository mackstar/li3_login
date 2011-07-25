<?php

if (!defined('LITHIUM_LIBRARY_PATH')) {
	define('LITHIUM_APP_PATH', dirname(__DIR__));
	define('LITHIUM_LIBRARY_PATH', LITHIUM_APP_PATH . 'libraries/lithium');
}

/**
 * This file configures lithium
 */
require __DIR__ . '/bootstrap/lithium.php';

/**
 * This file configures auth
 */
require __DIR__ . '/bootstrap/auth.php';

/**
 * This file configures g11n
 */
require __DIR__ . '/bootstrap/g11n.php';
