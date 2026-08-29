<?php

class Products_Model extends Model {

	public function __construct() {
		parent::__construct(); 
	}
	
    
    public function getProducts($url = '') {

        if (!empty($url)) {
            return $this->_get('products', 'slug', [])[1];
        }
         
        $sql = "";
        $where = "";
        $queryData = [];

        $data = $this->_query("$sql $where ORDER BY ih_ID desc {$this->pagination()}", $queryData )[1] ?? []; 
         

        return [
            'property'=>$data,
            'count'=>count($this->_query("$sql $where ", $queryData )[1] ?? [])
        ];        
    }
     
         
	
	public function thishouse(string $url) {
        $output = $this->_get(' individual_houses left join building_partitions on  ih_partition_fk = bp_ID left join building on building_ID = bp_name_fk left join users on b_listedby=user_ID 
       left join bedrooms on bp_bedroom_fk=b_ID left join housetype on ht_ID=b_type',
        'ih_url', [$url], false );
        
       if ($output[0] == 0) CustomFunctions::relocate('/property');
       
       $this->_update('building', 'b_views', 'building_ID ', [ $output[1]['b_views'] + 1, $output[1]['building_ID'] ]);
       $return = $output[1];
       
        $return['spec_features'] = $this->_get('sp_features_link left join specialfeatures on sf_ID = sfl_specialfeature_fk ', 'sfl_houses_fk', [ $return['b_specialfeatures']])[1];
             
            
            
       return $return;
    }
	
	
	
	
 
}