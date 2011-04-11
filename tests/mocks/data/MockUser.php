<?php

namespace login\tests\mocks\data;

use lithium\data\collection\RecordSet;

class MockUser extends \login\models\User {
	public static function find($type = 'all', array $options = array()) {
		switch ($type) {
			case 'first':
				return new RecordSet(array('items' => array(
					'id' => 1, 'title' => 'Top ten reasons why this is a bad title.'
				)));
			break;
			case 'all':
			default :
				return new RecordSet(array('items' => array(
					array('id' => 1, 'title' => 'Top ten reasons why this is a bad title.'),
					array('id' => 2, 'title' => 'Sensationalist Over-dramatization!'),
					array('id' => 3, 'title' => 'Heavy Editorializing!'),
				)));
			break;
		}
	}
}