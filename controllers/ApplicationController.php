<?php

namespace li3_login\controllers;

use li3_flash_message\extensions\storage\FlashMessage;
use lithium\g11n\Message;
use li3_login\extensions\adapter\Authentication;

class ApplicationController extends \lithium\action\Controller {

	protected function _init(){
		
		// Extract messages
		extract(Message::aliases());
		
		// Set standard application layout
		$this->_render['paths']['template'] = '{:library}/views/{:controller}/{:template}.{:type}.php';
		$this->_render['paths']['layout'] = LITHIUM_APP_PATH . '/views/layouts/default.html.php';
		$this->_render['paths']['element'] = LITHIUM_APP_PATH . '/views/elements/{:template}.html.php';
		
		// Initialize parent
		parent::_init();
		
	}
	
	protected function _limitUserControl($user){
		if (!Authentication::userControl($user)) {
			FlashMessage::write($t('You do not have permission to access this screen', array('scope'=>'login')));
			$this->redirect('/');
		}
	}
}