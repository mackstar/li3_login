<?php

namespace li3_login\extensions\adapter;

use li3_login\models\Session as ModelSession;
use li3_login\models\User;
use lithium\storage\Session;

class Authentication extends \lithium\core\StaticObject{
	
	protected static $_session = null;
	
	protected static $_time = null;
	
	protected static $_user = null;
	
	public static function load() {
		self::$_time = new \Datetime;
		if ($sessionid = Session::read('sessionkey')) {
			if($session = ModelSession::find($sessionid)) {
				$session->save(array('lasttimestamp' => static::$_time->getTimestamp()));
				self::$_session = $session;
			} else {
				self::_initiateSession();
			}
		} else {
			self::_initiateSession();
		}
	}
	
	protected static function _initiateSession() {
		$session = ModelSession::create( array(
			'ip' => isset($_SERVER)? $_SERVER['REMOTE_ADDR']:'' ,
			'timestamp' => self::$_time->getTimestamp(),
			'lasttimestamp' => self::$_time->getTimestamp()
		)); 
		$session->save();
		Session::write('sessionkey', $session->_id->__toString());
		self::$_session = $session;
	}
	
	public static function authenticate($email, $password) {
		$user = User::find('first', array('conditions'=>array(
			'email'=>$email, 'password'=>\lithium\util\String::hash($password)
		)));
		if ($user) {
			self::$_session->user = $user->_id->__toString();
			self::$_session->save();
			return true;
		} else {
			return false;
		}
	}
	
	public static function userControl($user) {
		if($user->_id == self::getUser()->_id || self::isAdmin()){
			return true;
		}
		return false;
	}
	
	public static function getSession() {
		return self::$_session;
	}
	
	public static function destroy() {
		self::_initiateSession();
	}
	
	public static function remove() {
		self::$_session->user = null;
		self::$_session->save();
	}
	
	public static function isAuthenticated() {
		if (self::$_session->user) {
			return true;
		} else {
			return false;
		}
	}
	
	public static function isAdmin() {
		$user = self::getUser();
		if ($user && $user->admin) {
			return true;
		} else {
			return false;
		}
	}
	
	public static function getUser() {
		if (static::$_user) {
			return static::$_user;
		} elseif (static::$_session->user) {
			static::$_user = User::find(self::$_session->user);
			return static::$_user;
		} else {
			return null;
		}
	}
	
	
}