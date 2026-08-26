<?php

class Signup extends Controller {

	public function __construct() {
		parent::__construct(); 
	}
	
	public function index()  {
		if (!empty($_GET['return'])) { Session::set('await_login', $_GET['return']); }
		
		$this->view->title = 'Sign Up | ' . $this->_company()['c_name'];
		$this->view->render('account/signup');
	}



	// end of the class
}
?>
