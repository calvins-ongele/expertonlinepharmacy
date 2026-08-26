<?php

class Paybill extends Controller {

	public function __construct() {
		parent::__construct(); 
	}
	
	public function index() {	
		$this->view->title = 'Paybill Service | '.$this->_company()['c_name'];
		$this->view->render('index/paybill');
	}
	
	
	
	
 
}