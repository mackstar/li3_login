<?php

namespace li3_login\controllers;

use \li3_flash\extensions\storage\FlashMessage;
use \li3_login\extensions\adapter\Authentication;
use \lithium\g11n\Message;

class AuthenticateController extends ApplicationController {
	
	public function add() {
		if(($this->request->data)) {
			extract(Message::aliases());
			if (Authentication::authenticate($this->request->data['email'], $this->request->data['password'])) {
				FlashMessage::write($t('Successfully logged in', array('scope'=>'login')));
				return $this->redirect('/');
			}
			else {
				FlashMessage::write($t('Your details did not match our records', array('scope'=>'login')));
				return $this->redirect('/login');
			}
		}
	}
	
	public function destroy() {
		extract(Message::aliases());
		Authentication::remove();
		FlashMessage::write($t('Successfully logged out', array('scope'=>'login')));
		return $this->redirect('/');
	}

}	