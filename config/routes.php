<?php

use \lithium\net\http\Router;

Router::connect('/login', array(
	'Authenticate::add', 'library' => 'li3_login'
));

Router::connect('/logout', array(
	'Authenticate::destroy', 'library' => 'li3_login'
));

Router::connect('/auth/{:controller}', array(
	'library' => 'li3_login', 'action' => 'index'
));

Router::connect('/auth/{:controller}/{:action}', array(
	'library' => 'li3_login'
));

Router::connect('/auth/{:controller}/{:action}/{:id}', array(
	'controller' => 'users', 'action' => 'index', 'library' => 'li3_login'
));
