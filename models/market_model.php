<?php

class Market_Model extends Model {

	public function __construct() {
		parent::__construct();  
	}
	
	public function getratings(string $url  ) { 
	     
	    return $this->_get('ratings left join users on r_user_fk = user_ID', 'r_product', [$url], true, 'order by r_ID desc limit 20' )[1];
	}
	
	public function getproduct(string  $url, $newprice = '' ) { 
	    if (!empty($newprice)) {
	       return $this->_get('products left join users on user_ID=p_user_fk left join discounts on d_product=p_url', 'p_url, d_url', [$url,$newprice], false )[1]; 
	    }
	    return $this->_get('products left join users on user_ID=p_user_fk', 'p_url', [$url], false )[1];
	}
	
	
	
	
	
	public function getproducts() { 
	    if (isset($_GET['category'])) {
	         $market = $this->_get('products left join users on user_ID=p_user_fk left join categories on p_category=cat_ID', '(p_title like ? or p_desc like ? or cat_name like ?)  ', 
	         [ "%{$_GET['category']}%",  "%{$_GET['category']}%", "%{$_GET['category']}%"    ], 
	         true, "order by p_ID desc {$this->pagination()} ", 'or')[1]; 

			 return [
				'market'=>$market,
				'count'=>$this->_get('products left join users on user_ID=p_user_fk left join categories on p_category=cat_ID', '(p_title like ? or p_desc like ? or cat_name like ?)  ', 
	         		[ "%{$_GET['category']}%",  "%{$_GET['category']}%", "%{$_GET['category']}%"    ], true, '', 'or')[0]
			 ];
	    }
	    
	    if (isset($_GET['q'])) {
	         $market = $this->_get('products left join users on user_ID=p_user_fk ', 'p_title like, p_desc like ', [ "%{$_GET['q']}%",  "%{$_GET['q']}%"   ], true, "order by p_ID desc {$this->pagination()} ", 'or')[1]; 
			 return [
				'market'=>$market,
				'count'=>$this->_get('products left join users on user_ID=p_user_fk ', 'p_title like, p_desc like ', [ "%{$_GET['q']}%",  "%{$_GET['q']}%"   ], true, " ", 'or')[0]
			 ];
	    }
	     
	    $products = [
			'market'=>$this->_get("products left join users on user_ID=p_user_fk", "", [], 1, " order by p_ID  desc {$this->pagination()} ")[1],
			'count'=>$this->_get("products left join users on user_ID=p_user_fk ")[0]
		];
  
		return $products;
	}

	public function similarProducts($category = 1) {
		return $this->_get('products left join users on user_ID=p_user_fk left join categories on p_category=cat_ID', 'cat_ID', 
	         [ $category   ], 
	         true, 'order by rand() limit 3 ' )[1]; 
	}

	public function getSellers($url = "") {
		if (!empty($url)) {
			$products = $this->_get('products left join users on user_ID=p_user_fk left join categories on p_category=cat_ID', 'user_url', 
	         [ $url   ], 
	         true, "order by p_ID desc {$this->pagination()} " )[1]; 
 
 
			return [
				'products'=>$products,
				'count'=> $this->_get('products left join users on user_ID=p_user_fk','user_url', [$url] )[0]
			];
		}
		$sql = "SELECT user_fname, user_lname, user_dp, user_url, p_user_fk
				FROM (
					SELECT user_fname, user_lname, user_dp, user_url,p_user_fk,
						ROW_NUMBER() OVER(PARTITION BY p_user_fk ORDER BY p_ID DESC) as row_num
					FROM products LEFT JOIN users ON p_user_fk=user_ID 
				) ranked_products
				{$this->pagination()}";
				//--WHERE row_num = 1;";
		
		$sql = "SELECT user_fname, user_lname, user_dp, user_url, p_user_fk 
		FROM products 
		LEFT JOIN users ON p_user_fk=user_ID
		GROUP BY p_user_fk ";
		$data = $this->_query("$sql {$this->pagination()}", [])[1];
		 

		return [
			'sellers'=>$data,
			'count'=>count($this->_query("$sql", [])[1] ?? 1)
		];
	}

	public function getCategories() {
		return $this->_get('categories')[1];
	}
	
		
	
	
	
	
	
	

}