<?php

namespace li3_login\models;

use lithium\data\Model;
use lithium\util\String;

class User extends \lithium\data\Model {

	public $validates = array(
		'email' => array(
			array('emailUnique', 'message' => 'Email has already been registered.'),
			array('notEmpty', 'message' => 'Email should not be empty.'),
			array('email', 'message' => 'Please enter a valid email address.'),
		),
		'password' => array(
			array('notEmpty', 'message' => 'Password should not be empty.'),
		),
	);
	protected $_meta = array('key' => '_id');

	
}

User::applyFilter('save', function($self, $params, $chain){
	$record = $params['entity'];
	if (!$record->id) {
		$record->password = \lithium\util\String::hash($record->password);
	}
	if (!empty($params['data'])) {
		$record->set($params['data']);
	}
	$params['entity'] = $record;
	return $chain->next($self, $params, $chain);
});