<?php

class Products_Model extends Model {

	public function __construct() {
		parent::__construct(); 
	}
	
    
    public function getProducts($url = '') {

        if (!empty($url)) {
            return $this->_get('products', 'slug', [$url],0)[1];
        }
         
        $sql = "SELECT * FROM products ";
        $where = "";
        $queryData = [];

        $data = $this->_query("$sql $where ORDER BY ih_ID desc {$this->pagination()}", $queryData )[1] ?? []; 
         

        return [
            'property'=>$data,
            'count'=>count($this->_query("$sql $where ", $queryData )[1] ?? [])
        ];        
    }
      
    public function category($url = '') {
        return $this->_get("categories", "slug", [$url],0)[1];
    }
        
    public function fetchProducts($url = '') {
        //return $this->_get("products join categories ON products.category_id = categories.id ", "categories.slug", [$url],1)[1];

        $sql = "SELECT products.*, categories.id as cat_id
        FROM products
        join categories ON products.category_id = categories.id
        where categories.slug = ?
        ";

        $data = $this->_query("$sql ", [ $url ])[1] ?? [];

        return $data;
    }
	
 
}