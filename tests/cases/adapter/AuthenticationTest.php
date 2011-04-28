<?php

namespace li3_login\tests\cases\adapter;

use \li3_login\extensions\Adapter\Authentication;
use \li3_login\models\User;
use \li3_login\models\Session;
use \lithium\storage\Session as PhpSession;
use lithium\data\Connections;
use lithium\core\Environment;


class AuthenticationTest extends \lithium\test\Unit {

	protected $email = 'test@mackstar.com';
	protected $password = 'secret';
	protected $wrongPassword = 'wrongwrongwrong';


	public function setUp() {
		// Clear database for all Sessions and Users
		User::remove();
		Session::remove();
		Authentication::load();
		$user = User::create(array('email'=> $this->email, 'password'=>$this->password));
		$user->save();
		PhpSession::delete('sessionkey');
	}

	public function tearDown() {
		//User::remove();
		//Session::remove();
	}
	
	public function testSession() {
		$this->assertEqual(Session::count(), 1);
		$this->assertFalse(Authentication::isAuthenticated());
		$this->assertEqual(Session::count(), 1);
	}
	
	public function testDestroySession() {
		$session = Authentication::getSession();
		$id = $session->_id->__toString();
		Authentication::destroy();
		$this->assertEqual(Session::count(), 2);
		$session = Authentication::getSession();
		$this->assertTrue($session->_id->__toString());
		$this->assertNotEqual($id, $session->_id->__toString());
		$this->assertEqual(Session::count(), 2);
	}
	
	public function testFalesAuthentication() {
		$count = Session::count();
		$this->assertFalse(Authentication::authenticate($this->email, $this->wrongPassword));
		$this->assertFalse(Authentication::isAuthenticated());
		$this->assertEqual($count, Session::count());
		$this->assertNull(Authentication::getUser());
	}
	
	public function testAuthentication() {
		$count = Session::count();
		$this->assertTrue(Authentication::authenticate($this->email, $this->password));
		$this->assertTrue(Authentication::isAuthenticated());
		$this->assertEqual($count, Session::count());
		$user = Authentication::getUser();
		$this->assertEqual($this->email, $user->email);
		$this->assertNotEqual($this->password, $user->password);
	}
	
	public function testRemove() { 
		$count = Session::count();
		Authentication::remove();
		$this->assertFalse(Authentication::isAuthenticated());
		$this->assertEqual($count, Session::count());
	}
	
	public function testAdminUser() {
		
		$this->assertTrue(Authentication::authenticate($this->email, $this->password));
		$this->assertFalse(Authentication::isAdmin());
	}
	
}

?>