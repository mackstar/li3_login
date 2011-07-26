<?php

use lithium\storage\Session;
use lithium\storage\session\adapter\Cookie;
use lithium\action\Dispatcher;
use li3_login\extensions\adapter\Authentication;
use lithium\core\Environment;

Session::config(array(
	'default' => array('adapter' => 'Php'),
	'cookie' => array('adapter' => 'Cookie'),
	'flash_message' => array('adapter' => 'Php')
));

Dispatcher::applyFilter('_callable', function($self, $params, $chain) {
	if(php_sapi_name() != 'cli' && Environment::get()!='test') {
		Authentication::load();
	}
	return $chain->next($self, $params, $chain);
});
