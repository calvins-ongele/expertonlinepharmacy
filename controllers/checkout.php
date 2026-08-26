<?php

class Checkout extends Controller {

	public function __construct() {
		parent::__construct();
		
	}
	
	public function index($url = '', $newprice ='') {	
	   // Auth::handleLogin();
	   
	    if (empty($url)) {
	        CustomFunctions::relocate('/not-found');
	        return; 
	    }
	    $this->view->data = $this->model->getproduct($url, $newprice);
		$this->view->title = 'Checkout for '.$this->view->data['p_title'].' | '.$this->_company()['c_name'];
		$this->view->render('index/checkout');
	}
	
	
	public function chat($seller_url = '', $product_url = '', $customer = '') {	 
	    Auth::handleLogin();
	        $this->view->seller_url = $seller_url;
	        $this->view->product_url = $product_url;
	        $this->view->customer_url = $customer;
	    if (empty($seller_url) || empty($product_url) ) { 
	        $this->view->heads = $this->model->getchatheads();
	       	$this->view->title = 'Your chats | '.$this->_company()['c_name'];
		    $this->view->render('index/chatheads');
		    return; 
	    }
	    $this->view->receiver = $this->model->receiver($seller_url,$customer);
	    $this->view->customer = $this->model->receiver($customer);
	    $this->view->data = $this->model->getproduct($product_url);
		$this->view->title = 'Chat for '.$this->view->data['p_title'].' | '.$this->_company()['c_name'];
		$this->view->render('index/chat');
	}
	
	public function order($uri = '', $order = '') { 
	    if (empty($uri)) {
	        CustomFunctions::relocate('/');
	        return;
	    }
	    $this->view->data = $this->model->getorder($uri);
	    $this->view->feedback = $this->model->payorder($this->view->data, $uri, $order, $_POST['type']);
		$this->view->title = 'Pending Order Payment | '.$this->_company()['c_name'];
		$this->view->render('index/order');
	}
	
	
	
	
	
	
	
	
	
	
}