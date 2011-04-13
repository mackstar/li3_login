<?php

namespace li3_login\models;

use lithium\data\Model;

/**
 * 日本語のコメント
 */
class Session extends \lithium\data\Model {

	public $validates = array();
	
	
	public function save($params) {
		if (!isset($params['user'])) {
			$params['user'] = null;
		}
		parent::save($params);
	}
}