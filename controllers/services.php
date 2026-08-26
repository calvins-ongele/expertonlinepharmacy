<?php

class Services extends Controller {

	public function __construct() {
		parent::__construct(); 
	}
	
	public function index($uri = '') {	
	    
	  //  CustomFunctions::relocate('/not-found');die;
	    
	    if (!empty($uri)) {
	        $this->view->uri = $uri;
	        $this->view->data = $this->model->getdisbursedata($uri);
    		$this->view->title = "Contribute/Buy Ticket to {$this->view->data['s_nominated_name']} | {$this->_company()['c_name']}";
    		//if ( Session::get('userid') != null ) $this->view->render('index/contributex');
    		if ($this->view->data['s_purpose'] == 'Event' ) {
    		    $this->view->variations = $this->model->events_variations($uri);
    		     $this->view->render('index/contribute-event');
    		} else
    		$this->view->render('index/contribute');
    		return;
	    }
		$this->view->title = 'Services | '.$this->_company()['c_name'];
		$this->view->render('index/services');
	}
	
	public function pickaspot() {  
		$this->view->title = 'Pick a Spot | '.$this->_company()['c_name']; 
		$this->view->render('index/pick-a-spot');
	}

	public function register() {	
	   // Auth::handleLogin();
		$this->view->title = "Announce Your Event | {$this->_company()['c_name']}"; 
		$this->view->render('index/new-service');
	}

	public function contribute($uri = '') { 
	    $this->view->data = $this->model->getdisbursedata($uri);
		$this->view->title = "Contribute to {$this->view->data['s_nominated_name']} | {$this->_company()['c_name']}";
		$this->view->render('index/contribute');
	}

	public function transparency($uri = '') { 
	    $this->view->data = $this->model->getdisbursedata($uri);
	    $this->view->donors = $this->model->getdisbursedonors($uri);
		$this->view->title = "Donors to {$this->view->data['s_nominated_name']} | {$this->_company()['c_name']}";
		$this->view->render('index/transparency-donors');
	}
	public function ourpaybill($uri = '') {  
		$this->view->title = "Use our Paybill | {$this->_company()['c_name']}";
		$this->view->render('index/our-paybill');
	}
	public function thankyou($uri = '') { 
	    $this->view->data = $this->model->getdisbursedata($uri);
		$this->view->title = "Thank You for Assisting {$this->view->data['s_nominated_name']} | {$this->_company()['c_name']}";
		$this->view->render('index/thankyou');
	}
	
	public function lists() {
	    
	    $this->view->charity = $this->model->getservicesaccounts();
		$this->view->title = "Find most Appropriate Need and Support | {$this->_company()['c_name']}";
		$this->view->render('index/services-lists');
	}
    
    
	public function events() {  
	    
	    $this->view->event = $this->model->getservicesaccounts('Event');
		$this->view->title = "Find most Appropriate Events & Book | {$this->_company()['c_name']}";
		$this->view->render('index/events-lists');
	}
    
    
    
    
}