<?php

namespace li3_login\controllers;

use li3_login\models\User;
use lithium\storage\Session;
use lithium\core\Libraries;
use li3_flash_message\extensions\storage\FlashMessage;
use li3_login\extensions\adapter\Authentication;
use lithium\g11n\Message;

class UsersController extends ApplicationController {

	public function index() {
		extract(Message::aliases());
		if(!Authentication::isAdmin()) {
			FlashMessage::write($t('You do not have permission to access this screen', array('scope'=>'login')));
			$this->redirect('/');
		}
		$users = User::all();
		return compact('users');
	}
	
	public function add() {
		extract(Message::aliases());
		$user = User::create($this->request->data);
		if (($this->request->data) && $user->save()) {
			FlashMessage::write($t('Successfully added user', array('scope'=>'login')));
			if(Authentication::isAdmin()) {
				$this->redirect(array('Users::index', 'library' => 'li3_login'));
			}	
			else {
				$this->redirect('/');
			}
		}
		return compact('user');
	}
	
	public function destroy() {
		extract(Message::aliases());
		$user = User::find($this->request->_id);
		$this->_limitUserControl($user);
		if ($user->_id == Authentication::getUser()->_id) {
			Authentication::remove();
		}
		if (User::remove(array('_id'=>$this->request->id))) {
			FlashMessage::write($this->t('User not found', array('scope'=>'login')));
			$this->redirect('/');
		}
	}
	
	public function view() {
		$user = User::first($this->request->id);
		$this->_limitUserControl($user);
		return compact('user');
	}
	
	public function edit() {
		$user = User::find($this->request->id);
		if (!$user) {
			FlashMessage::write($t('User not found', array('scope'=>'login')));
			$this->redirect('/');
		}
		$this->_limitUserControl($user);
		if (($this->request->data) && $user->save($this->request->data)) {
			$this->redirect(array('User::view', 'args' => array($course->id)));
		}
		return compact('user');
	}
}