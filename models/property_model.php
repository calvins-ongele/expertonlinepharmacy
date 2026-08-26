<?php

class Property_Model extends Model {

	public function __construct() {
		parent::__construct(); 
	}
	
    
    public function getProperty($url = '') {
        $sql = "SELECT * FROM individual_houses left join building_partitions on  ih_partition_fk = bp_ID left join building on building_ID = bp_name_fk left join users on b_listedby=user_ID 
               left join bedrooms on bp_bedroom_fk=b_ID left join housetype on ht_ID=b_type
        WHERE 1=1 AND building_name != ?   
        ";
        $queryData = [''];
        $where = '';
        /***************queries HERE****************** */
        if (!empty($url)) {
            $where .= " AND user_url = ? ";
            $queryData[] = $url;
        }
        if (!empty($_GET['htype'])) {
            $where .= " AND ht_name = ? ";
            $queryData[] = $_GET['htype'];
        }
        if (!empty($_GET['purpose'])) {
            $where .= " AND b_use = ? ";
            $queryData[] = $_GET['purpose'];
        }
        if (!empty($_GET['area'])) {
            $where .= " AND building_estate = ? ";
            $queryData[] = $_GET['area'];
        }
        if (!empty($_GET['city'])) {
            $where .= " AND building_town = ? ";
            $queryData[] = $_GET['city'];
        }
        if (!empty($_GET['pricefrom'])) {
            $where .= " AND ih_price = > ";
            $queryData[] = $_GET['pricefrom'];
        }
        if (!empty($_GET['priceto'])) {
            $where .= " AND ih_price = < ";
            $queryData[] = $_GET['priceto'];
        }
        if (!empty($_GET['bedrooms'])) {
            $where .= " AND b_name = ? ";
            $queryData[] = $_GET['bedrooms'];
        }
        if (!empty($_GET['q'])) {
            $where = " AND ( b_name like ? or ht_name like ? or building_estate like ? or building_town like ? or b_use like ? or 
        building_occupied like ? or building_name like ? or ih_url like ? or bp_price like ? or bp_furnished like ? or bp_description like ? ) ";
            $queryData[] = "%{$_GET['q']}%";$queryData[] = "%{$_GET['q']}%";
            $queryData[] = "%{$_GET['q']}%";$queryData[] = "%{$_GET['q']}%";
            $queryData[] = "%{$_GET['q']}%";$queryData[] = "%{$_GET['q']}%";
            $queryData[] = "%{$_GET['q']}%";$queryData[] = "%{$_GET['q']}%";
            $queryData[] = "%{$_GET['q']}%";$queryData[] = "%{$_GET['q']}%";
            $queryData[] = "%{$_GET['q']}%";
        }


        /*************XXXXX******************* */


        $data = $this->_query("$sql $where ORDER BY ih_ID desc {$this->pagination()}", $queryData )[1] ?? []; 
        $output = [];

        foreach ($data as $row) { 
            $row['spec_features'] = $this->_get('sp_features_link left join specialfeatures on sf_ID = sfl_specialfeature_fk ', 'sfl_houses_fk', [ $row['b_specialfeatures']])[1];
            $output[] = $row;
        }

        return [
            'property'=>$output,
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