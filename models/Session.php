<?php

namespace li3_login\models;

use lithium\data\Model;

/**
 * 日本語のコメント
 */
class Session extends \lithium\data\Model {

	public $validates = array();
	
	protected $_meta = array('key' => '_id');
	
	protected $_schema = array(
		'_id'  => array('type' => 'string'),
		'user' => array('type' => 'string'),
		'ip' => array('type' => 'string'),
		'timestamp' => array('type' => 'string'),
		'lasttimestamp'  => array('type' => 'string')
	);
}