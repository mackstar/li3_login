<?php

namespace li3_login\controllers;

use \li3_flash_message\extensions\storage\FlashMessage;
use \li3_login\extensions\adapter\Authentication;
use \lithium\g11n\Message;

class AuthenticateController extends ApplicationController {
	
	public function add() {
		
	}
	
	public function create() {
		extract(Message::aliases());
		$data = $this->request->data;
		if (Authentication::authenticate($data['email'], $data['password'])) {
			FlashMessage::set($t('Successfully logged in', array('scope'=>'login')));
			return $this->redirect('/');
		}
		else {
			FlashMessage::set($t('Your details did not match our records', array('scope'=>'login')));
			return $this->redirect('/login');
		}

	}
	
	public function destroy() {
		extract(Message::aliases());
		Authentication::remove();
		FlashMessage::set($t('Successfully logged out', array('scope'=>'login')));
		return $this->redirect('/login');
	}

}	