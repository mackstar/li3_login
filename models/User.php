<?php

namespace li3_login\models;

use lithium\data\Model;
use lithium\util\validator;
use lithium\util\String;

class User extends \lithium\data\Model {
	
	protected $_meta = array('key' => '_id');
	
	protected $_schema = array(
		'_id' => array('type' => 'id'),
		'name' => array('type' => 'string'),
		'email' => array('type' => 'string'),
		'password' => array('type' => 'string'),
		'admin' => array('type' => 'integer', 'default'=>0),
	);
	
	public $validates = array(
		'email' => array(
			array('emailUnique', 'message' => 'Email has already been registered.'),
			array('notEmpty', 'message' => 'Email should not be empty.'),
			array('email', 'message' => 'Please enter a valid email address.'),
		),
		'password' => array(
			array('hashedNotEmpty', 'message' => 'Password should be between 5 and 12 characters.'),
		),
	);

	public static function __init(){
		
		Validator::add('emailUnique', function($value, $name, $options) {
			if ($options['events'] != 'update'){
				return User::emailExists($options['values']['email']);
			}	else {
				$user = User::first(array('conditions' => array('_id' => $options['values']['_id']), 'fields' => array('email')));
				if ($user->email == $options['values']['email']) {
					return true;
				} else {
					return User::emailExists($options['values']['email']);
				}	
			}
		});
		Validator::add('hashedNotEmpty', function($value) {
			return (\lithium\util\String::hash('') != $value)? true : false;
		});
		
		parent::__init();
	}
	
	public static function emailExists($email){
		$users = User::all(array('conditions' => array('email'=>$email)));
		return User::count(array('conditions' => array('email'=>$email)))? false : true;
	}	
}

User::applyFilter('save',function($self, $params, $chain){
	$record = $params['entity'];
	if (!$record->id) {
		$record->password = \lithium\util\String::hash($record->password);
		$record->created = date('Y-m-d H:i:s');
	}
	if (!empty($params['data'])) {
		$record->set($params['data']);
	}
	$params['record'] = $record;
	return $chain->next($self, $params, $chain);
});