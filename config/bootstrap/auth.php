<?php

use \lithium\security\Auth;
use \lithium\storage\Session;
use lithium\storage\session\adapter\Cookie;
use lithium\action\Dispatcher;
use \li3_login\extensions\Adapter\Authentication;

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

Authentication::load();

/*
Dispatcher::applyFilter('_callable', function($self, $params, $chain) {
    $request = $params['request'];
    $controller = $chain->next($self, $params, $chain);

    if (!$request->locale) {
        $request->params['locale'] = Locale::preferred($request);
    }
    Environment::set(Environment::get(), array('locale' => $request->locale));
    return $controller;
});
*/
