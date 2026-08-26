<?php

class Legal extends Controller {

	public function __construct() {
		parent::__construct(); 
	}
	
	public function index() {	
		$this->view->title = 'Privacy Policy | '.$this->_company()['c_name'];
		$this->view->render('index/legal');
	}
	
	public function termsandconditions() {	
		$this->view->title = 'Terms and Conditions | '.$this->_company()['c_name'];
		$this->view->render('index/terms');
	}
	
	public function faq() {	
		$this->view->title = 'Frequently Asked Questions | '.$this->_company()['c_name'];
		$this->view->render('index/faq');
	}
}