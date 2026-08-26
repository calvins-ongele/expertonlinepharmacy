<?php

class Content extends Controller {

	public function __construct() {
		parent::__construct();  
	}
	
	public function index($uri = '') {
	   //  CustomFunctions::relocate('/not-found');die;
	    $this->view->data = $this->model->getvideos($uri);
	    
	    if (!empty($uri)) {
	        Auth::handleLogin();
	        
	        $this->view->isPaid = $this->model->isPaid($uri, $this->view->data[0]['v_price'] );
		    $this->view->attachment = $this->model->vidattachment( $this->view->data[0] );  
	        $this->view->title = ((!empty($uri)) ? $this->view->data[0]['v_title'] : 'Content Creators Videos ') . " | {$this->_company()['c_name']}";	
		    $this->view->render('index/sing-video');
		    return;
	    }
	    
		$this->view->title = ((!empty($uri)) ? $this->view->data[0]['v_title'] : 'Content Creators Videos ') . " | {$this->_company()['c_name']}";	
		$this->view->render('index/content');
	}
	
	public function live($uri = '') { 
	     CustomFunctions::relocate('/not-found');die;
	    $this->view->data = $this->model->getvideos($uri);
	    
	    if (!empty($uri)) {
	        Auth::handleLogin();
	        
	        $this->view->isPaid = $this->model->isPaid($uri, $this->view->data[0]['v_price'] );
	        $this->view->title = ((!empty($uri)) ? $this->view->data[0]['v_title'] : 'Content Creators Videos ') . " | {$this->_company()['c_name']}";	
		    $this->view->render('index/live');
		    return;
	    }
	    
	 
	}
	
	public function blog($uri = '') {  
	    $this->view->data = $this->model->getblog($uri);
	    $this->view->post = 0;
	    if (!empty($uri)) $this->view->post = true;
	     
        $this->view->title = ((!empty($uri)) ? $this->view->data[0]['b_title'] : 'Mizizi Blog Videos ') . " | {$this->_company()['c_name']}";	
	    $this->view->render('index/blog');
	    
	}
	
	
	

}