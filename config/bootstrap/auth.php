<?php

use lithium\storage\Session;
use lithium\action\Dispatcher;
use lithium\aop\Filters;
use li3_login\extensions\adapter\Authentication;
use lithium\core\Environment;

Session::config([
	'default' => ['adapter' => 'Php'],
	'cookie' => ['adapter' => 'Cookie'],
	'flash_message' => ['adapter' => 'Php']
]);

Filters::apply(Dispatcher::class,'_callable', function($params, $next) {
	if(php_sapi_name() != 'cli' && Environment::get()!='test') {
		Authentication::load();
	}
	return $next($params);
});
