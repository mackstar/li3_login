<?php

use \lithium\security\Auth;
use \lithium\storage\Session;

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

