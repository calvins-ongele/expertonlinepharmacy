<?php

class Content_Model extends Model
{
	public function __construct() {
		parent::__construct();
	}
	
 
	public function getblog($url = '' ) {
	    if (!empty($url)) {
	        $data = $this->_get('* blog.*, categories.title as category_title, categories.slug as category_slug 
			FROM
			blog left join categories on category_id = categories.id   ', 'blog.slug', [$url], 0  )[1];
	        if (empty($data)) return false;
	        return 
	        [
	            $data,
	            $this->_get('blog left join categories on category_id = categories.id  ', 'categories.slug =, categories.id !=', 
				[$data['category_slug'], $data['category_id']], true, 
	            'order by categories.id desc limit 20' )
	        
	        ];
	    }

		if (!empty($_GET['category'])) {

		$query = "* blog.*, categories.title as category_title, categories.slug as category_slug 
					FROM
					blog left join categories on category_id = categories.id";
			 
		$blog_data = $this->_get($query, "categories.slug", [$_GET['category']], 1, "order by blog.id desc {$this->pagination()} ")[1];
		 
	    	return [
					'blog'=>$blog_data,
					'count'=> $this->_get($query, "categories.slug", [$_GET['category']])[0]
				  ];
		}
	    
	    $query = "* blog.*, categories.title as category_title, categories.slug as category_slug 
					FROM
					blog left join categories on category_id = categories.id";
	    return [
			'blog'=>$this->_get($query, "", [], 1, "order by blog.id desc {$this->pagination()} ")[1],
			'count'=> $this->_get("blog ")[0]
			];
	}
	public function getblogcategories($categ = '') { 
	    
	    if (empty($categ)) {  
	        $cats = $this->_get("blog_categories  order by bc_ID desc ");
	        $output = [];
	        foreach ($cats[1] as $row) {
	            $row['count'] = $this->_get('blog ', 'blog_category_fk', [$row['bc_ID']] )[0];
	            $output[] = $row;
	        }
	        
	        return [$cats[0], $output];
	    }  
	   
	        return 
	        [
	            $this->_get('blog_categories ', 'bc_url', [$categ], 0  )[1] ,
	            $this->_get('blog left join blog_categories on blog_category_fk = bc_ID   ', 'bc_url', [$categ], true, "order by blog_ID desc {$this->pagination()}" ) ,
	            
	        ];
	}
	
	public function getprevnext($url) {
	    $id = $this->_get('blog', 'blog_slug', [$url], false)[1];
	    
	    $prev = $this->_get('blog ', 'blog_ID <', [$id['blog_ID']], false, 'order by blog_ID desc' );
	    $next = $this->_get('blog ', 'blog_ID >', [$id['blog_ID']], false, 'order by blog_ID asc' );
 
        $output = [];
        if ($prev[0] > 0) $output[] = $prev[1];
        if ($next[0] > 0) $output[] = $next[1];
	    return $output;
	     
	}





















 

	
// end of class	
}