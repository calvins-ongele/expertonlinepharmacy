<?php  

use Dompdf\Dompdf;
 
class Dashboard_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	

    public function getrefusers() {
        $users = $this->_get('users ', 'user_ref_by', [ Session::get('myaff') ], 1, ' limit 200' )[1];
        
        return $users;
    }
        
	public function totposts($status ) {
	    if ($status == 'all' ) { 
    		return $this->_getmore('blog', 'count(b_ID)', '', []);
	    }
	    if ($status == 'celeb') { 
    		return $this->_getmore('celebrity', 'count(c_ID)', '', []);
	    }
	    if ($status == 'content') { 
    		return $this->_getmore('celeb_content', 'count(cc_ID)', '', []);
	    }
	      if ($status == 'external') { 
    		return $this->_getmore('dynamics', 'count(d_ID)', '', []);
	    }
	   if ($status == 'links') { 
    		return $this->_getmore('quicklinks', 'count(ql_ID)', '', []);
	    }
	   if ($status == 'contact') { 
    		return $this->_getmore('contactus', 'count(cus_ID)', '', []);
	    }
	
    	return $this->_getmore('blog', 'count(b_ID)', 'b_status', [ $status ]);
	} 
	
  
	
	public function list_accounts_cards() {   
	    $accounts = $this->_get('accounts', 'a_account_owner, a_status', [ Session::get('userid'), 'Active' ]  )[1]; 
      
          $output = array();
          foreach ($accounts as $row) {
             $output[] = ['acc'=>$row['a_account_number'], 'bal'=>$row['a_account_balance'], 'cur'=>$row['a_account_currency'], 'name'=>$row['a_accountname'], 
             'date'=>$row['a_account_date'], 'set_type'=>$row['a_settlement_type'] ];
          }
          
          return $output;
	}
    public function getlogs($max) {  
        return $this->_get('logs left join users on l_by = user_ID ', 'l_by', [ Session::get('userid') ], true, " order by l_ID desc limit $max" )[1];
    }
	public function getproducts() {
		
	    $products = $this->_get('products', 'p_user_fk',  [ Session::get('userid') ],1,"order by p_ID desc {$this->pagination()}")[1];

		return [
			'products'=>$products,
			'count'=>$this->_get('products', 'p_user_fk',  [ Session::get('userid') ])[0]
		];
	}
 
	public function bidproduct($url = '') { 
	    
	    if (empty($url)) {
	        $data = $this->_get('products left join users on user_ID=p_user_fk  ', '', [  ], true, "order by p_ad_bid desc {$this->pagination()} ")[1];
			$count = $this->_get('products left join users on user_ID=p_user_fk  ', '', [  ] )[0];
	    } else {
            $category = $this->_get('products', 'p_url', [$url], false)[1]['p_category']; 
            $data = $this->_get('products left join users on user_ID=p_user_fk  ', 'p_category', [ $category ], true, "order by p_ad_bid desc {$this->pagination()}")[1];
            $count = $this->_get('products left join users on user_ID=p_user_fk  ', 'p_category', [ $category ] )[0];
	    }
	    if (count($data) == 0) {
	        // echo json_encode(['error'=>'true', 'msg'=>[] ]);die;
	    }
	    $output = [];
	    
	    foreach ($data as $row) {
	        $output[] = [
	            
	             'id'=>$row['p_ID'],
	            'title'=> $row['p_title'],
	            'price'=>number_format($row['p_price']),
	            'earning_pc'=>number_format($row['p_ad_bid']),
	            'earning_ca'=> ($row['p_price'] * ($row['p_ad_bid']/100) ),
	            'price_nf'=>$row['p_price'],
	            'url'=>$row['p_url'],
	            'desc'=>CustomFunctions::trimTitle(strip_tags($row['p_desc'])),
	            'fulldesc'=>strip_tags($row['p_desc']),
	            'date'=>date('d M Y', $row['p_date']),
	            'img'=> explode(',', $row['p_images'])[0], //CustomFunctions::bestimg($row['p_images']), //$row['p_images']
	            'imgs'=>explode(',', $row['p_images']),
	            'loc'=>$row['p_county'],
	            'brand'=>$row['p_brand'], 
	            'condition'=>$row['p_condition']
	            ];
	    }

		
		return [
			"bids"=>$output,
			"count"=>$count
		];
	     
    }
   public function getadearnings() {
	    $data = $this->_get('orders left join products on order_product_url=p_url left join users on user_ID=order_ref_fk ',
		 'order_ref_fk, order_status', [Session::get('userid') 
	    ,'Completed'],1)[1];
	     
	    
	   $output = [];
	    
	    foreach ($data as $row) {
	        $output[] = [
	            
	            'id'=>$row['p_ID'],
	            'title'=> $row['p_title'],
	            'price'=>number_format($row['p_price']),
	            'earning_pc'=>number_format($row['p_ad_bid']),
	            'earning_ca'=> ($row['p_price'] * ($row['p_ad_bid']/100) ),
	            'price_nf'=>$row['p_price'],
	            'url'=>$row['p_url'],
	            'desc'=>CustomFunctions::trimTitle(strip_tags($row['p_desc'])),
	            'fulldesc'=>strip_tags($row['p_desc']),
	            'date'=>date('d M Y', $row['p_date']),
	            'img'=> explode(',', $row['p_images'])[0], //CustomFunctions::bestimg($row['p_images']), //$row['p_images']
	            'imgs'=>explode(',', $row['p_images']),
	            'loc'=>$row['p_county'],
	            'brand'=>$row['p_brand'], 
	            'condition'=>$row['p_condition']
	            ];
	    }
	    
	    return $output ;
	}
	public function removedevices() {
	    $this->_delete('user_devices', 'ud_key', [ $_COOKIE['rkey'] ] );
	    
	    if (isset($_GET['all_devices'])) $this->_delete('user_devices', 'ud_userid', [ $_COOKIE['remember'] ] );
	}
	
	public function all_devices() {
	    return $this->_get('user_devices', 'ud_userid', [ Session::get('userid') ] )[1];
	}
	
	public function getorders($status) {
	    return $this->_get('orders left join products on p_url = order_product_url', 'p_user_fk, order_status', [Session::get('userid'),$status])[1];
	}
	
	
	public function getpurchases($status) {
	    return $this->_get('orders left join products on p_url = order_product_url left join users on p_user_fk=user_ID', 'order_buyer_fk, order_status',
	    [Session::get('userid'),$status])[1];
	}
	
	
	public function getwithdraw($type = '' ) {
	    // $data = $this->_get('withdrawals left join users on w_user_fk=user_ID', 'w_user_fk',
	    // [Session::get('userid')], true, "order by w_ID desc {$this->pagination()} ")[1];

		 
		$sql = "SELECT * FROM transactions WHERE t_user_fk = ?";
		$query_data = [Session::id() ];
		if (!empty($type)) {
			if (!in_array($type, ['dr', 'cr'])) $type  = '';
			$sql .= " AND t_dr_or_cr = ?";
			$query_data[] = $type;
		}
		if (!empty($_GET['account']) && (is_numeric($_GET['account'])) ) {
			$sql .= " AND (t_from_account_fk = ? OR t_to_account_fk = ?) ";
			$query_data[] = $_GET['account'];
			$query_data[] = $_GET['account'];
		}

		$data = $this->_query("$sql {$this->pagination()}", $query_data )[1] ?? [];

		return [
			"draws"=>$data,
			"count"=>$this->_get('transactions', "t_user_fk", [Session::id()])[0]
		];
	}
	
	public function getblogaccounts() {
	    
	    $blog = $this->_get('blog  ', ' b_user_fk ', [  Session::get('userid') ], 1, "{$this->pagination()}" )[1];

		return [
			'blog'=>$blog,
			'count'=>$this->_get('blog  ', ' b_user_fk ', [  Session::get('userid') ] )[0]
		];
	}
	public function categories( ) {
	    return $this->_get('categories ', ' ', [ ] )[1];
	} //$2y$10$HHPTbNjUrgeIQ5m5mztZVecM.faDCpyKaCuMuxvNETpGXxDrxoYwW
	public function getservicesaccounts( ) {
	    return $this->_get('services  left join accounts on a_settlement_type=s_ID  ', 'a_account_owner, a_settlement_type != ', [  Session::get('userid'), 'Owner' ] )[1];
	}
	
	public function getdisbursedata(string $uri ) {
	    return $this->_get('accounts left join services on a_settlement_type=s_ID  ', 's_status, s_url, a_account_owner, a_settlement_type != ',
	    ['Active', $uri, Session::get('userid'), 'Owner' ],false )[1];
	}
	public function myaccount() {
	    return $this->_get('accounts   ', 'a_account_currency, a_account_owner, a_settlement_type != ',
	    [ 'KES', Session::get('userid'), 'Owner' ],false )[1];
	}
	public function getvideos($vid = '') {
	    
	    if (empty($vid)) {
	        $videos = $this->_get('videos', 'v_owner', [Session::get('userid') ], 1, "{$this->pagination()}")[1];

			return [
				'videos'=>$videos,
				'count'=>$this->_get('videos', 'v_owner', [Session::get('userid') ], true)[0]
			];
	    }
	    return $this->_get('videos', 'v_url, v_owner', [$vid, Session::get('userid') ], false)[1];
	}
	public function getcontributors($uri) {
	    $data = $this->_get('donors left join services on s_url = d_s_url  ', 'd_s_url  ', [ $uri ] )[1];
	    $service = $this->_get('services', 's_url', [$uri],0)[1];
	    
	    $bookers = $this->_get('bookers left join events_variations on booker_event_rand_id = ev_rand_id ',  'booker_service_id, booker_payment_status', [$uri,'Paid' ]);
	    $others = '';
		$firstpart = ''; 
	    
	    if ($bookers[0] > 0) {
	        $others = "
					<tr style='text-align:center;'>
						<th style='border: 1px solid black;'>   </th>
						<th style='border: 1px solid black;'> Others </th>
						<th style='border: 1px solid black;'> </th>
						<th style='border: 1px solid black;'>   </th>
						<th style='border: 1px solid black;'>  </th>
					</tr>
				";
	        $i = 0;
	         
	        foreach($bookers[1] as $booker ) { $i++;
	      
	            $firstpart .= "
					<tr style='text-align:center;'>
						<td style='border: 1px solid black;'> " . $i . " </td>
						<td style='border: 1px solid black;'> " . $booker['booker_name'] . " [{$booker['ev_name']}] </td>
						<td style='border: 1px solid black;'> " . $booker['booker_phone'] . " </td>
						<td style='border: 1px solid black;'> " . $booker['ev_price'] . " </td>
						<td style='border: 1px solid black;'> " . date('d.m.Y',$booker['booker_date']) . " </td>
					</tr>
				";
	        }
	    }
	    
	    //return $data;
	    
	    if (file_exists("/home2/mizizimu/cdn.miziziclassifieds.com/images/classiefieds/$uri.pdf")) 
	    unlink("/home2/mizizimu/cdn.miziziclassifieds.com/images/classiefieds/$uri.pdf");
	    
	    $output = "   
		<div class='container'>
		<div class='row'> 
		<div class='col-md-2'> </div> 
		<div class='col-md-8' style='padding-left:10px;' > 
	
		<div align='center'> <h2 align='center'> {$service['s_title']} </h2></div> <br>
		<table class='table table-bordered' align='center'>               
			<thead style='border: 1px solid black;'>
				<tr>
					<th style='border: 1px solid black;'>#</th>
					<th style='border: 1px solid black;'>Name</th>
					<th style='border: 1px solid black;'>Phone</th>
					<th style='border: 1px solid black;'>Amount</th>
					<th style='border: 1px solid black;'>Date</th>
				</tr>
			</thead> <tbody style='border: 1px solid black;'>";
			
		$body = '';
	    foreach($data as $row) {
	            $i++;
	        	$body .= "
					<tr style='text-align:center;'>
						<td style='border: 1px solid black;'> " . $i . " </td>
						<td style='border: 1px solid black;'> " . $row['d_name'] . " </td>
						<td style='border: 1px solid black;'> " . $row['d_phone'] . " </td>
						<td style='border: 1px solid black;'> " . $row['d_amount'] . " </td>
						<td style='border: 1px solid black;'> " . date('d.m.Y',$row['d_date']) . " </td>
					</tr>
				";
	    }
	    
	    $output .= $firstpart;
	    $output .= $others;
	    $output .= $body;
        $output .= "</tbody></table>	</div> 	
        <div class='col-md-2'> </div> 
        </div></div>";  

        
		$output .= $this->_styles();
        $pdf = new Dompdf();
        $file_name = "/home2/mizizimu/cdn.miziziclassifieds.com/images/classiefieds/$uri.pdf";
        $pdf->loadHtml($output);
        $pdf->setPaper(array(0,0,600,500), 'Portrait');
        $pdf->render();
        file_put_contents($file_name, $pdf->output() );
       // $pdf-> stream($file_name);//, array('Attachment' => false));
	    
	    return [
	            'link'=> "https://cdn.miziziclassifieds.com/images/classiefieds/$uri.pdf",
	             'title'=> ''  
	        ];
	}
	
	public function videodata(string $videouri) {
	    return $this->_get('videos left join users on user_ID=v_owner', 'v_url', [$videouri  ], false )[1];
	}
	
	public function vidattachment(array $videodata) {
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
	                'full_url'=>$service['p_url'] ? "https://miziziclassifieds.com/market/{$service['p_url']}" : "https://miziziclassifieds.com/services/{$service['s_url']}",
	                'desc'=> $service['p_desc'] ?? $service['s_explanation'] 
	           ];
	        
	        
	    } else return [];
	   
	}
	
	
	public function getproduct( $url, $newprice = '' ) { 
	    if (!empty($newprice)) {
	       return $this->_get('products left join users on user_ID=p_user_fk left join discounts on d_product=p_url', 'p_url, d_url', [$url,$newprice], false )[1]; 
	    }
	    return $this->_get('products left join users on user_ID=p_user_fk', 'p_url', [$url], false )[1];
	}
	
	public function getproductEdit($id) {
	    return $this->_get('products left join users on user_ID=p_user_fk  ', 'p_ID, user_ID', [$id,Session::get('userid') ], false )[1];  
	}
	
	public function getSaloStatus() {
	    return $this->_get('salo  ', 's_user_fk ', [Session::get('userid') ], false );  
	}
	
	public function getEmps() {
	    return $this->_get('employees  ', 'emp_user_fk ', [Session::get('userid') ], 1 );  
	}

	
    public function housetypes() {
        return $this->_get('housetype' )[1];
    }
    public function bedrooms() {
        return $this->_get('bedrooms' )[1];
    }
    public function spfeatures() {
        return $this->_get('specialfeatures' )[1];
    }
    public function houses() {
        
        return $this->_get('building_partitions left join building on bp_name_fk=building_ID left join bedrooms on bp_bedroom_fk=b_ID ', 'b_listedby, building_owner', 
            [ Session::get('userid'),Session::get('userid')  ], true, '', 'or' )[1];
            
            
        if (Session::get('role') == 'Admin') 
            return $this->_get('houses left join bedrooms on h_beedrooms=b_ID left join housetype on ht_ID=h_type ' )[1];
        else 
            return $this->_get('houses left join bedrooms on h_beedrooms=b_ID left join housetype on ht_ID=h_type ', 'h_listedby, h_landlord', 
            [ Session::get('userid'),Session::get('userid')  ], true, '', 'or' )[1];
    } 
    
    public function buildings() {
        if (Session::get('role') == 'Admin') 
            $data = $this->_get('building   left join housetype on ht_ID=b_type ' )[1];
        else 
            $data =  $this->_get('building  left join housetype on ht_ID=b_type ', 'b_listedby, building_owner', 
            [ Session::get('userid'),Session::get('userid')  ], true, ' order by building_ID desc', 'or' )[1];
            
        return $data;
    } 
	
   public function getbuilding($id) {
       return $this->_get('building', 'building_ID', [$id], false)[1];
   } 
	
    public function idvhouse() {
        
        return $this->_get('individual_houses left join building_partitions on ih_partition_fk=bp_ID left join building on bp_name_fk=building_ID left join bedrooms on bp_bedroom_fk=b_ID ', 'b_listedby, building_owner', 
            [ Session::get('userid'),Session::get('userid')  ], true, '', 'or' )[1];
            
    } 
	
    public function last5ratings($user) {
        return $this->_get('property_ratings left join users on user_ID=r_rater', 'r_rate_to, r_type', [ $user, 'tenant' ], true, ' limit 5')[1];
    }

    public function gettenants($status = 'Active') {
        return $this->_get('tenants left join users on user_ID = t_tenant left join individual_houses on t_house=ih_ID left join building_partitions on ih_partition_fk = bp_ID left join building on building_ID = bp_name_fk left join  bedrooms on bp_bedroom_fk=b_ID ', ' t_landlord , t_status ', [ Session::get('userid'), $status ], true, 'order by t_ID desc')[1];
 
    }
	
    public function getbuidings() { 
        $data = $this->_get('building left join users on b_listedby=user_ID', 'b_listedby', [ Session::get('userid') ])[1];

        $output = array();
        foreach ($data as $row) { 
            $occupied = $this->_get('individual_houses', 'ih_building_fk, ih_occupied', [ $row['building_ID'], 1 ])[0];
            $empty = $this->_get('individual_houses', 'ih_building_fk, ih_occupied', [ $row['building_ID'], 0 ])[0];
			$user = $this->me( $row['building_owner'] );
            $row['buildingowner'] = "{$user['user_fname']} {$user['user_lname']}";
            $row['occupied'] = $occupied;
            $row['empty'] = $row['building_no_doors'] - $occupied;
            $row['rate'] = number_format((($occupied / $row['building_no_doors']) * 100), 1);
            $output[] = $row;
        }
        return $output;
    } 

	 
    public function getActiveBookings() {
        return $this->_get('booked_for_view left join users on user_ID = bfv_booker left join individual_houses on ih_ID=bfv_house ', '  ', [  ])[1];
    } 
    public function getbooking($id) {
        return $this->_get('booked_for_view left join users on user_ID = bfv_booker left join individual_houses on ih_ID=bfv_house ', 'bfv_ID  ', [ $id ], false)[1];
    }
	
    public function contacts($status, $id = '') { 
        if (!empty($id)) {
            $data =  $this->_get('contactus left join users on email=user_email ', 'id', [ $id  ], false )[1];
            $house = [];
            if (!empty($data['property_id'])) {
                $house = $this->_get(' individual_houses left join building_partitions on  ih_partition_fk = bp_ID left join building on building_ID = bp_name_fk left join users on b_listedby=user_ID 
       left join bedrooms on bp_bedroom_fk=b_ID left join housetype on ht_ID=b_type', 'ih_ID', [$data['property_id']], false )[1];
            }
            
            return [$data, $house];
        }
        $data = $this->_get('contactus left join users on email=user_email ', 'status', [ $status  ])[1]; 
        return $data;
    }

	
	public function users() {
		
        //return $this->_get('accounts left join users on user_ID=a_account_owner', '', [], true, 'order by a_account_balance desc');
        $data = $this->_get('users left join accounts on user_ID=a_account_owner', '', [], true, "order by user_ID desc {$this->pagination()} ");
        
       $output = [];
       
       foreach($data[1] as $row) {
           $row['email_sent'] = ($this->_get('email_logs', 'el_contact', [$row['user_email']])[0] > 0) ? '<span class="text-success">S</span>':'<span class="text-danger">NS</span>';
           $row['sms_sent'] = ($this->_get('email_logs', 'el_contact', [$row['user_tel']])[0] > 0) ? '<span class="text-success">S</span>':'<span class="text-danger">NS</span>';
           
           $output[] = $row;
       }
       
       
       return [
			'users'=>$output, 
	   		'count'=>$this->_get('users left join accounts on user_ID=a_account_owner', '', [], true, 'order by user_ID desc')[0]
	   ];
	}
    
    public function transactions() {
        $data = $this->_get('transactions left join accounts on t_from_account_fk=a_account_number left join users on user_ID=a_account_owner ', '', [], true, "order by t_ID desc {$this->pagination()} ")[1];

		return [
			'trans'=>$data,
			'count'=>$this->_get('transactions left join accounts on t_from_account_fk=a_account_number left join users on user_ID=a_account_owner ')[0]
		];
    }

	public function numbers() {
		return[
			'numbers'=>$this->_get("numbers order by n_ID desc {$this->pagination()}")[1],
			'count'=>$this->_get('numbers order by n_ID desc')[0],
		];
	}
	public function receipts() {

		$sql = "SELECT * FROM receipts WHERE 1=1 ";
		$where = "";
		$query_data = [];
		if (!empty($_GET['q'])) {
			$sql .= " AND (r_ID = ? or r_name like ?) ";
			$query_data[] = "{$_GET['q']}";
			$query_data[] = "{$_GET['q']}";
		}

		$data = $this->_query("$sql $where ORDER BY r_ID DESC {$this->pagination()} ", $query_data )[1] ?? [];

		return [
			'receipts'=>$data,
			'count'=> count($this->_query("$sql $where ORDER BY r_ID DESC ", $query_data )[1] ?? [])
		];
	}

	public function learners() {
       $data = $this->_get("ihub left join courses on ihub_course=course_ID order by ihub_ID desc {$this->pagination()} ")[1]; 
       $output = [];
       
       foreach($data as $row) {
           $row['email_sent'] = ($this->_get('email_logs', 'el_contact', [$row['ihub_email']])[0] > 0) ? '<span class="text-success">S</span>':'<span class="text-danger">NS</span>';
           $row['sms_sent'] = ($this->_get('email_logs', 'el_contact', [$row['ihub_phone']])[0] > 0) ? '<span class="text-success">S</span>':'<span class="text-danger">NS</span>';
           
           $output[] = $row;
       }
       
       
       return 
	   ['ihub'=>$output,'count'=>$this->_get('ihub left join courses on ihub_course=course_ID order by ihub_ID desc')[0] ];
    }
	
    public function eos($status = 'pending') {
        $enquiries = [
                        'count'=>$this->_get('business_regs', 'status', [$status], 1, "")[0],
                        'eos'=>$this->_get('business_regs', 'status', [$status], 1, "order by id desc {$this->pagination()}")[1]
                    ];
                                
        return $enquiries;
         
    }
	public function support() {
		return [
			'support'=>$this->_get("contactus order by id desc {$this->pagination()} ")[1],
			'count'=>$this->_get('contactus order by id desc')[0]
		];
	}
	 
	
// end of class	
}