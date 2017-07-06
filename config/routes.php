<?php

use \lithium\net\http\Router;

Router::connect('/login', ['Authenticate::login', 'library' => 'li3_login']);

Router::connect('/register', ['Authenticate::register', 'library' => 'li3_login']);

Router::connect('/logout', ['Authenticate::destroy', 'library' => 'li3_login']);

Router::connect('/auth/{:controller}', ['library' => 'li3_login', 'action' => 'index']);

Router::connect('/auth/{:controller}/{:action}', ['library' => 'li3_login']);

Router::connect('/auth/{:controller}/{:action}/{:id}', ['controller' => 'users', 'action' => 'index', 'library' => 'li3_login']);
