<?php

namespace li3_login\controllers;

class ApplicationController extends \lithium\action\Controller {

	protected function _init(){
		parent::_init();

		//アプリのレイアウトを使うように設定します。
		$this->_render['paths']['template'] = '{:library}/views/{:controller}/{:template}.{:type}.php';
		$this->_render['paths']['layout'] = LITHIUM_APP_PATH . '/views/layouts/default.html.php';
	}
}