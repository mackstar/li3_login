<?php

use \lithium\net\http\Router;

Router::connect('/login', array(
	'library' => 'login', 'controller' => 'authenticate', 'action' => 'add'
));
Router::connect('/auth/{:controller}', array(
	'library' => 'login', 'controller' => 'users', 'action' => 'add'
));
Router::connect('/auth/{:controller}/{:action}', array(
	'library' => 'login', 'controller' => 'users', 'action' => 'index'
));
Router::connect('/auth/{:controller}/{:action}/{:id}', array(
	'controller' => 'users', 'action' => 'index', 'library' => 'login'
));
