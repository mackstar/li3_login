<?php

namespace login\controllers;

use \li3_flash_message\extensions\storage\FlashMessage;
use \lithium\security\Auth;
use \lithium\g11n\Message;

class AuthenticateController extends ApplicationController {

	public function index() {
	}
	
	public function add() {
		
	}
	
	public function create() {
		extract(Message::aliases());
		Auth::clear('user');
		if (Auth::check('user', $this->request)) {
			FlashMessage::set($t('Successfully logged in', array('scope'=>'login')));
		}
		FlashMessage::set($t('Your details did not match our records', array('scope'=>'login')));
		return $this->redirect('/');
	}

}	