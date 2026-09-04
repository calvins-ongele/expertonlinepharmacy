<?php

class Products extends Controller
{

    public function __construct() {
        parent::__construct();
    }

    public function index($url = '', $urlaction = '') {
        
        if (!empty($url)) {  
            $this->SinglePrduct($url, order:$urlaction === 'order');
            return;
        }
        $this->view->data = $this->model->getProducts($url);
        $this->view->title = 'Products | ' . $this->_company()['c_name'];
        $this->view->render('products/index');
    }

    public function SinglePrduct(string $url, $order = false)
    {
        $this->view->data = $this->model->getProducts($url);
        if ($order) {
            $this->view->title =   "Order {$this->view->data['title']} | " . $this->_company()['c_name'];
            $this->view->render('products/order-product');
            return;
        }
        $this->view->title =   "View {$this->view->data['title']} | " . $this->_company()['c_name'];
        $this->view->render('products/view-product');
    }
    public function categories($url = null) { 
        if ($url) {
            $this->view->category = $this->model->category($url);
            $this->view->data = $this->model->fetchProducts($url);
            $this->view->title = "{$this->view->category['title']} | {$this->_company()['c_name']}";	
            $this->view->render('products/categories'); 
            return;
        }
		$this->view->categories = parent::categories();
		$this->view->title = 'Categories | '.$this->_company()['c_name'];	
		$this->view->render('products/categories');
    }
     
}
