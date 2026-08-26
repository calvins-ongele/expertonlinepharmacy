<?php

class Services_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	 
	public function getdisbursedata($uri ) {
	    return $this->_get(' services left join accounts  on a_settlement_type=s_ID  ', 's_url,a_settlement_type != ',
	    [$uri, 'Owner' ],false )[1];
	}
	
	
	public function getservicesaccounts( $type = '') {  
	    if (! empty($type) ) { 
	        
    	    if (isset($_GET['q'])) {
    	        $data = $this->_get('services  
				LEFT JOIN accounts ON services.acs_account_number=accounts.a_account_number LEFT JOIN users ON a_account_owner=user_ID', '(s_status = ?) and s_title like ? ', 
    	        [ 'Active', "%{$_GET['q']}%" ],1,"order by s_ID desc {$this->pagination()} " )[1];
				$count = $this->_get('services  ', '(s_status = ?) and s_title like ? ', [ 'Active', "%{$_GET['q']}%" ] )[0];
				
				return [
					'events'=>$data,
					'count'=>$count
				];
    	    }
    	    
	        // $data = $this->_get('accounts left join services on a_settlement_type=s_ID 
			// left join users ON a_account_owner=user_ID ', 's_purpose, a_settlement_type !=, s_status ', [ $type, 'Owner', 'Active' ],1,'order by s_ID desc' )[1];
			
			
			$data = $this->_get("services 
			LEFT JOIN accounts ON services.acs_account_number=accounts.a_account_number LEFT JOIN users ON a_account_owner=user_ID", 's_status', ['Active'],1, "order by s_ID desc {$this->pagination()}")[1];
			$count = $this->_get("services ", 's_status', ['Active'] )[0];

			return [
				'events'=>$data,
				'count'=>$count
			]; 
	    } 
	    
	    
	    if (isset($_GET['q'])) {
	        return $this->_get('accounts left join services on a_settlement_type=s_ID  ', '( a_settlement_type != ? and s_status = ? ) and s_title like ? ', 
	        [ 'Owner', 'Active', "%{$_GET['q']}%" ],1,'order by s_ID desc' )[1];
	    }
	    
	    return $this->_get('accounts left join services on a_settlement_type=s_ID  ', ' a_settlement_type !=, s_status ', [ 'Owner', 'Active' ],1,'order by s_ID desc' )[1];
	    
	    
	}
	
	public function getdisbursedonors($uri) {
	    return $this->_get('donors left join services on s_url = d_s_url  ', 'd_s_url  ', [ $uri ] )[1];
	}

  
   // end of class
}