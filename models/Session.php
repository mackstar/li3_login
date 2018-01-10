<?php

namespace li3_login\models;

use lithium\data\Model;


class Session extends \lithium\data\Model {

    protected $_meta = [
        'source' => 'tbl_session',
        'key' => '_id'
    ];

	public $validates = array();
		
	protected $_schema = array(
		'_id'  => array('type' => 'id'),
		'user' => array('type' => 'string'),
		'ip' => array('type' => 'string'),
		'timestamp' => array('type' => 'string'),
		'lasttimestamp'  => array('type' => 'string')
	);
}