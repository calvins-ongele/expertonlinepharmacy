<?php

class Checkout_Model extends Model {

	public function __construct() {
		parent::__construct();  
	}
	
	public function getproduct( $url, $newprice ='' ) {  
	    if (!empty($newprice)) {
	       return $this->_get('products left join users on user_ID=p_user_fk left join discounts on d_product=p_url', 'p_url, d_url', [$url,$newprice], false )[1]; 
	    }
	    $data = $this->_get('products left join users on user_ID=p_user_fk', 'p_url', [$url], false )[1];
	    return $data;
	}
	
	
	
	
	
	public function getproducts() {  
	    
	    if (isset($_GET['q'])) {
	         return $this->_get('products left join users on user_ID=p_user_fk ', 'p_title like, p_desc like ', [ "%{$_GET['q']}%",  "%{$_GET['q']}%"   ], true, 'order by rand() limit 80 ', 'or')[1]; 
	    }
	    
	    return $this->_get('products left join users on user_ID=p_user_fk order by rand() limit 80 ')[1];
	}
	
	public function getchatheads() {  
	   //$sql = "
    //         SELECT DISTINCT  CASE  WHEN sender_id = ? THEN receiver_id  ELSE sender_id 
    //         END AS chat_partner,  users.user_fname FROM messages
    //         JOIN users ON users.user_ID = CASE   WHEN sender_id = ? THEN receiver_id  ELSE sender_id  END
    //         WHERE sender_id = ? OR receiver_id = ?";
        
    //     $stmt = $this->db_mysqli()->prepare($sql);
    //     $stmt->bind_param("iiii", Session::get('userid'), Session::get('userid'), Session::get('userid'), Session::get('userid'));
    //     $stmt->execute();
    //     $result = $stmt->get_result();
	    
	   // return $result;
	    ini_set('max_execution_time', 300);
	    
	   // $sql = "
    // SELECT DISTINCT 
    //     sender_id, receiver_id 
    //     FROM messages 
    //     WHERE sender_id = ? OR receiver_id = ?";
    
    // $stmt =  $this->connection()->prepare($sql);
    // //$stmt->bind_param("ii", $currentUser, $currentUser);
    // $stmt->execute([$currentUser, $currentUser]);
    // $result = $stmt->get_result();
    
    // $chatPartners = [];
    // while ($row = $result->fetch_assoc()) {
    //     $chatPartner = ($row['sender_id'] == $currentUser) ? $row['receiver_id'] : $row['sender_id'];
    //     $chatPartners[] = $chatPartner;
    // }
    
    // $placeholders = implode(',', array_fill(0, count($chatPartners), '?'));
    // $sql = "SELECT id, user_fname FROM users WHERE id IN ($placeholders)";
    // $stmt =  $this->db_mysqli()->prepare($sql);
    // $stmt->bind_param(str_repeat('i', count($chatPartners)), ...$chatPartners);
    // $stmt->execute();
    // $result = $stmt->get_result();



try {
    // Query to fetch distinct chat partners from the messages table
    // $sql = "
    //     SELECT DISTINCT 
    //         CASE 
    //             WHEN sender_id = :userId THEN receiver_id 
    //             ELSE sender_id 
    //         END AS chat_partner,
    //         users.user_fname, chathref
    //     FROM messages
    //     JOIN users ON users.user_ID = CASE 
    //                                 WHEN sender_id = :userId THEN receiver_id 
    //                                 ELSE sender_id 
    //                              END
    //     WHERE sender_id = :userId OR receiver_id = :userId";

    // $stmt = $this->connection()->prepare($sql);
    // $stmt->bindParam(':userId', Session::get('userid'), PDO::PARAM_INT);
    // $stmt->execute();
    // $chatPartners = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
     $sql = "
        SELECT DISTINCT 
            CASE 
                WHEN sender_id = :userId THEN receiver_id 
                ELSE sender_id 
            END AS chat_partner,
            users.user_fname, chathref,p_title,p_url 
        FROM messages
        JOIN users ON users.user_ID = CASE 
                                    WHEN sender_id = :userId THEN receiver_id  
                                    ELSE sender_id 
                                 END
        WHERE sender_id = :userId OR receiver_id = :userId";

    $stmt = $this->connection()->prepare("select DISTINCT chathref,users.user_fname,p_title,p_url,product from messages left join products on p_url = product left join users on users.user_ID = CASE 
                                    WHEN sender_id = :userId THEN receiver_id 
                                    ELSE sender_id  
                                 END
        WHERE sender_id = :userId OR receiver_id = :userId");
    $userid = Session::id();
    $stmt->bindParam(':userId', $userid, PDO::PARAM_INT);
    $stmt->execute();
    $chatPartners = $stmt->fetchAll(PDO::FETCH_ASSOC);
 //print_r($chatPartners);
    return $chatPartners;
} catch (PDOException $e) {
    die("Error retrieving chat partners: " . $e->getMessage());
}




	}
		
	
	
	public function receiver($ur1 = '', $ur2 = '') {  
	  
	    if ($ur1 == Session::get('url') ) { //sender
	        $data =  $this->_get('users', 'user_url', [$ur2], false)[1];
	    } else
	    
	    $data = $this->_get('users', 'user_url', [$ur1], false)[1];
	  
	    
	    return $data;
	}
	
	public function getorder($uri) {
	    $order = $this->_get('all_payment_orders', 'apo_url', [$uri], 0 )[1];
	    $t_row = '';
	    if ($order['apo_table'] == 'services') { $t_row = 's_url'; }  
	    
	    $main = $this->_get("{$order['apo_table']}", $t_row, [ $order['apo_table_id'] ], 0)[1];
	    
	    return [
	        'status'=>$order['apo_status'],
	        'type'=> $order['apo_table'],
	         'order'=>$order,
	         'title'=> $main['s_title'] ?? '',
	         'table'=>$main,
	        
	        ];
	}
	public function payorder($data, $uri, $order, $type) {
	    if ($order == 'auto') {
	        
	        if ($data['order']['apo_table'] == 'services') {
	           // if (($type == 'Mpesa Balance') || empty($type) )
	           return $this->contribute( $data['order']['apo_amount'], $data['order']['apo_account'], $data['order']['apo_payment_method'], $data['order']['apo_table_id'],$data['order']['apo_name'],
	           $data['order']['apo_user'], $data['title']  );
	            
	        }
	        
	        
	        
	        
	        
	        
	        
	    }
	}
	
	
	private function contribute($amount, $phone, $method,$uri, $names,$userfk, $title ) {
	    $_amount = $amount; 
		$_tel = $phone;     
	 	$cleaned_string = preg_replace('/[^a-zA-Z0-9]/', '', $title ); //remove spec chars
		$account =  substr($cleaned_string,0,12);// $_POST['uri'];
	  
	    $service = $this->_get('services', 's_url', [ $uri ], false )[1];
	    if ($method == 'Mizizi Balance') {  
	        //do they have the balance
	        $myaccount = $this->_get('accounts', 'a_account_balance >= , a_account_owner, a_account_currency', [$_amount, $userfk, 'KES'], false );
	        if ($myaccount[0] == 0) die($this->_ms(true, "You have insufficient balance in your Mizizi Balance"));
	        
	        echo $this->_ms(false, "Contribution/payment successful.");
	         $this->_update('accounts', 'a_account_balance',' a_account_number', [$myaccount[1]['a_account_balance'] - $_amount, $myaccount[1]['a_account_number'] ] );
                    
                $this->_insert('donors', 'd_amount, d_transcode, d_name, d_s_url, d_phone, d_date', [
                        $_amount, 'M2M', $names, $uri,$_tel, time() ] ); 
        	     $this->_update('services', 's_contributed_amount, s_running_total', 's_url',[ $service['s_contributed_amount']+$_amount, 
        	     $service['s_running_total']+$_amount, $uri ]); 
	        return;
	    }   
		
		// clear previous one first
		$this->_delete('mpesa_temp', 'mt_phone', [$_tel]);
		$call_url = 'servicescontr';
		$name = $names;
 
     
    	// a few variables needed 
    	$return = true;
    	require "/home/mizizipa/api.miziziclassifieds.com/public/initiate.php";
    	return $reply;
	}
	
 
	
	

}