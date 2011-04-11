<?php

namespace login\tests\cases\models;

use \login\models\User;

class UserTest extends \lithium\test\Unit {

	public function setUp() {}

	public function tearDown() {}
	
	public function testValidatesPassword() {
		$this->assertTrue(User::isGoodTitle());
	}


}

?>