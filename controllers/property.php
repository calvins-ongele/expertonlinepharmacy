<?php

class Property extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($url = '')
    {
        if (!empty($url)) {
            $this->SingleProperty($url);
            return;
        }
        $this->view->data = $this->model->getProperty();
        $this->view->title = 'Property | ' . $this->_company()['c_name'];
        $this->view->render('property/index');
    }

    public function SingleProperty(string $url)
    {
        $this->view->house = $this->model->thishouse($url);
        $this->view->title =   "View {$this->view->house['building_name']} {$this->view->house['b_name']} | " . $this->_company()['c_name'];
        $this->view->render('property/view-property');
    }
    public function categories() { 
		$this->view->categories = $this->filters();
		$this->view->title = 'Categories | '.$this->_company()['c_name'];	
		$this->view->render('property/categories');
    }
    public function agents($url = null)
    {
        if ($url) {

            $this->view->data = $this->model->getProperty($url); 
            $this->view->title = htmlspecialchars("{$this->view->data['property'][0]['user_fname']} {$this->view->data['property'][0]['user_lname']}'s Property Profile | {$this->_company()['c_name']}");
            $this->view->render('property/profile');
            return;
        }
        $this->view->data = $this->topagents(0);
        $this->view->title =   "View Agents | " . $this->_company()['c_name'];
        $this->view->render('property/agents');
    }
}
