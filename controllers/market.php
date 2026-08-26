<?php

class Market extends Controller {

	public function __construct() {
		parent::__construct();  
	}
	
	public function index($url = '', $newprice = '') { 
	    
	    if (!empty($url)) {
	        //Auth::handleLogin();

		    $this->view->data = $this->model->getproduct($url,$newprice);
			$this->view->similar = $this->model->similarProducts($this->view->data['p_category']??1);
		    $this->view->ratings = $this->model->getratings($url);
		    $this->view->title = htmlspecialchars($this->view->data['p_title'] .' | '.$this->_company()['c_name']);	
		    $this->view->render('market/product');
		    return;
	        
	    }
	    
	    
		$this->view->data = $this->model->getproducts();
		$this->view->title = 'Market | '.$this->_company()['c_name'];	
		$this->view->render('market/market');
	}

	public function sellers($url = "") {
		
		//echo "<pre>";
		//print_r($this->view->data['products'][0] );
		 
		if (!empty($url)) {
			$this->view->data = $this->model->getSellers($url);
			$this->view->title = htmlspecialchars("{$this->view->data['products'][0]['user_fname']} {$this->view->data['products'][0]['user_lname']}'s Profile | {$this->_company()['c_name']}");	
			$this->view->render('market/profile');
			return;
		} 
		$this->view->data = $this->model->getSellers();
		$this->view->title = 'Sellers | '.$this->_company()['c_name'];	
		$this->view->render('market/sellers');
	}
	public function categories() {
		$this->view->categories = $this->model->getCategories();
		$this->view->title = 'Categories | '.$this->_company()['c_name'];	
		$this->view->render('market/categories');
	}


    
    
}