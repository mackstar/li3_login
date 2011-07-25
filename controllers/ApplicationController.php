<?php

namespace li3_login\controllers;

use \li3_flash\extensions\storage\FlashMessage;

class ApplicationController extends \lithium\action\Controller {

	protected function _init(){
		parent::_init();
		$this->_render['paths']['template'] = '{:library}/views/{:controller}/{:template}.{:type}.php';
		$this->_render['paths']['layout'] = LITHIUM_APP_PATH . '/views/layouts/default.html.php';
		$this->_render['paths']['element'] = LITHIUM_APP_PATH . '/views/elements/{:template}.html.php';
		
	}
}