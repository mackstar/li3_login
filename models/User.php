<?php

namespace li3_login\models;

use lithium\data\Model;
use lithium\util\validator;
use lithium\util\Text;
use lithium\security\Password;


class User extends \lithium\data\Model {
	
	protected $_meta = [
        'source' => 'tbl_users',
        'key' => 'user_id'
    ];
	
	protected $_schema = [
		'user_id' => ['type' => 'id'],
		'creator_id' => ['type' => 'id', 'default' => 0 ],
		'name' => ['type' => 'string'],
		'email' => ['type' => 'string'],
		'mobile' => ['type' => 'string'],
		'password' => ['type' => 'string'],
		'is_admin' => ['type' => 'integer', 'default' => 0 ],
		'create_at' => ['type' => 'date'],
		'update_at' => ['type' => 'date'],
		'delete_at' => ['type' => 'date'],
    ];
	
	public $validates = [
		'email' => [
			['emailUnique', 'message' => 'Email has already been registered.'],
			['notEmpty', 'message' => 'Email should not be empty.'],
			['email', 'message' => 'Please enter a valid email address.'],
        ],
		'password' => [
           ['hashedNotEmpty', 'message' => 'Password should be between 5 and 12 characters.'],
		],
	];

	public function __construct(){
		
		Validator::add('emailUnique', function($value, $name, $options) {
			if ($options['events'] != 'update') {
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
			return (Password::hash('') != $value)? true : false;
		});
		
	//	parent::_init();
	}
	
	public static function emailExists($email){
		$users = User::all(array('conditions' => array('email'=>$email)));
		return User::count(array('conditions' => array('email'=>$email)))? false : true;
	}	
}

