<?php

use \lithium\security\Auth;
use \lithium\storage\Session;
use lithium\storage\session\adapter\Cookie;
use lithium\action\Dispatcher;
use \li3_login\extensions\Adapter\Authentication;
use lithium\core\Environment;

Session::config(array(
	'default' => array('adapter' => 'Php'),
	'cookie' => array('adapter' => 'Cookie'),
	'flash_message' => array('adapter' => 'Php')
));

Auth::config(array(
	'user' => array(
		'adapter' => 'Form',
		'model'   => 'User',
		'fields'  => array('email', 'password')
	)
));

Dispatcher::applyFilter('run', function($self, $params, $chain) {
	if(php_sapi_name() != 'cli' && Environment::get()!='test') {
		Authentication::load();
	}
	return $chain->next($self, $params, $chain);
});
