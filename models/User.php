<?php

namespace login\models;

use lithium\data\Model;
use lithium\util\String;

class User extends \lithium\data\Model {

	public $validates = array();
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