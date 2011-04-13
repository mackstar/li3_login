<?php

use \li3_login\models\User;
use \lithium\util\Validator;

Validator::add('emailUnique', function($value) {
	if (User::find('first', array('conditions' => array('email'=>$value)))) {
		return false;
	} else {
		return true;
	}
});