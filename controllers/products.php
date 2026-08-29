<?php

class Products extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($url = '')
    {
        if (!empty($url)) {
            $this->SinglePrduct($url);
            return;
        }
        $this->view->data = $this->model->getProducts();
        $this->view->title = 'Products | ' . $this->_company()['c_name'];
        $this->view->render('products/index');
    }

    public function SinglePrduct(string $url)
    {
        $this->view->house = $this->model->getProducts($url);
        $this->view->title =   "View {$this->view->house['building_name']} {$this->view->house['b_name']} | " . $this->_company()['c_name'];
        $this->view->render('products/view-product');
    }
    public function categories() { 
		$this->view->categories = parent::categories();
		$this->view->title = 'Categories | '.$this->_company()['c_name'];	
		$this->view->render('products/categories');
    }
     
}
