<?php

class Pay extends Controller {

	public function __construct() {
		parent::__construct();  
	}
	
	public function index() { 
		$this->view->title = 'Pay | '.$this->_company()['c_name'];	
		$this->view->render('index/pay');
	}

}