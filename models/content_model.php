<?php

class Content_Model extends Model {

	public function __construct() {
		parent::__construct();  
	}
	
 
	public function getvideos($vid = '') {
	    
	    if (!empty($_GET['q'])) {
	        return $this->_get('videos left join users on user_ID=v_owner', 'v_title like ,v_desc like, (v_status) ', [ "%{$_GET['q']}%","%{$_GET['q']}%", 'Active'  ], true, 'order by v_ID desc ', 'or,and')[1];
	    }
	    
	    if (empty($vid)) {
	        return $this->_get('videos left join users on user_ID=v_owner', 'v_status ', [ 'Active' ], true, 'order by v_ID desc ')[1];
	    }
	    return $this->_get('videos left join users on user_ID=v_owner', 'v_url', [$vid  ], true, 'order by v_ID desc ' )[1];
	}
	
	public function getblog($uri = '' ) {
	    if (!empty($uri)) {
	         return $this->_get('blog  left join users on b_user_fk=user_ID', 'b_url', [ $uri ] )[1];
	    }
	        return [
				'blog'=>$this->_get('blog  left join users on b_user_fk=user_ID', 'b_status', [ 'Active' ], 1, "{$this->pagination()}"  )[1],

				'count'=>$this->_get('blog  left join users on b_user_fk=user_ID', 'b_status', [ 'Active' ]  )[0]
			]; 
	} 
	
	public function isPaid($vid = '', $price = 0) {
	    
	    $paid = $this->_get('video_watch', 'vw_paid, vw_url, vw_user_fk', [ 'Yes' ,$vid, Session::get('userid') ],false );
	    if ($paid[0] == 0 && ($price > 0) ) return [false, 10];
	    return [true, $paid[1]['vw_time_watched'] ?? 10 ];
	}
	
	
	public function vidattachment(array $videodata = []) {
	    if (!empty($videodata['v_attach_id'])) {
	        
	        if ($videodata['v_attach_type'] == 'service') {
	            $type = 'service';
	            $service = $this->_get('services', 's_ID', [ $videodata['v_attach_id'] ],false )[1];
	        } else {
	            $type = 'product';
	            $service = $this->_get('products', 'p_ID', [ $videodata['v_attach_id'] ],false )[1];
	        }
	        
	       return [
	                'title'=> $service['p_title'] ?? $service['s_title'],
	                'price'=> $service['p_price'] ?? 0,
	                'type'=> $type,
	                'url'=>$service['p_url'] ?? $service['s_url'],
	                'full_url'=>$service['p_url'] ? "https://{$_SERVER['HTTP_HOST']}/market/{$service['p_url']}" : "https://{$_SERVER['HTTP_HOST']}/services/{$service['s_url']}",
	                'desc'=> $service['p_desc'] ?? $service['s_explanation'] 
	           ];
	        
	        
	    } else return [];
	   
	}
	
	

}