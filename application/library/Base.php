<?php
class Base extends Yaf\Controller_Abstract {

	public function init(){
		$this->_config = Yaf\Registry::get('config');
		$this->_req = $this->getRequest();
		$this->_session = Yaf\Session::getInstance();
		$this->_session->start();
		if(!$this->_session->has('username')){
			$this->redirect('/index/');
		}
	}
}
