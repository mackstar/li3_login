<?php

namespace li3_login\tests\cases\models;

use \li3_login\models\User;

class UserTest extends \lithium\test\Unit {

	public function setUp() {
		User::remove();
	}

	public function tearDown() {}
	
	public function testValidatesPassword() {
		//$user = User::create(array('email'=>'test1@mackstar.com', 'password'=>''));
		//$this->assertFalse($user->save());
	}
	
	public function testValidatesEmail() {
		
		//valid email address
		$user = User::create(array('email'=>'test@mackstar.com', 'password'=>'secret'));
		$this->assertTrue($user->save());
		
		//email must be unique
		$user = User::create(array('email'=>'test@mackstar.com', 'password'=>'secret'));
		$this->assertFalse($user->save());
		
		//email must be email address
		$user = User::create(array('email'=>'ackstar', 'password'=>'secret'));
		$this->assertFalse($user->save());
		
	}
	
	public function testEncryptedPassword() {
		$user = User::create(array('email'=>'test2@mackstar.com', 'password'=>'secret'));
		$user->save();
		$user = User::find('first', array('conditions'=>array('email'=>'test2@mackstar.com')));
		$this->assertEqual($user->email, 'test2@mackstar.com');
		$this->assertNotEqual($user->password, 'secret');
	}


}

?>