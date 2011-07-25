<?php

namespace li3_login\controllers;

use li3_login\models\User;
use lithium\storage\Session;
use lithium\core\Libraries;
use li3_flash\extensions\storage\FlashMessage;

class UsersController extends ApplicationController {

	public function index() {
		$users = User::all();
		return compact('users');
	}
	
	public function add() {
		$user = User::create();
		return compact('user');
	}
	
	public function create() {
		$user = User::create($this->request->data);
		if ($user->save()) {
			return $this->redirect('/auth/users/index');
		} else { 
			var_dump($user);
			exit;
		}
	}
	
	public function destroy() {
	}
	
	public function edit() {
		$user = User::find($this->request->id);
		return compact('user');
	}
	
	public function update() {
		$user = User::find($this->request->id);
		if ($user->save()) {
			return $this->redirect('/auth/users/index');
		}
	}
}