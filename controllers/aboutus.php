<?php

class AboutUs extends Controller {

	public function __construct() {
		parent::__construct(); 
	}
	
	public function index() {	
		$this->view->title = 'About Us | '.$this->_company()['c_name'];
		$this->view->render('index/about');
	}
	
	public function indexx() {	
		$this->view->title = 'About Us | '.$this->_company()['c_name'];
		$this->view->render('index/about');
	}
}