<?php

use Dompdf\Dompdf;

class MyApp_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function content_update() {
	    $get = $this->_get('contents', 'cont_given_id', [ $_POST['cont_id'] ], false) ;
	    
	    if ($get[0] == 0) {
	        // insert 
	       echo $this->_insert('contents', 'cont_date, cont_body, cont_given_id, cont_title, cont_img', [date('Y-m-d'),$_POST['body'], $_POST['cont_id'], $_POST['title'], $_POST['imageid'] ] ); return;
	    }
	     
	    echo $this->_update('contents', 'cont_date, cont_body, cont_title, cont_img', 'cont_given_id', [date('Y-m-d'), $_POST['body'], $_POST['title'], $_POST['imageid'], $_POST['cont_id'] ] );
	    
	    $this->log(Session::get('email')." updated content titled {$_POST['title']} at " . date('Y-m-d, H:i:s'), 'Company' );
	}
	public function forgotpasswordaction() { 

		if (!CustomFunctions::validEmail($_POST['email'])) {
			die($this->_ms(true, "Incorrect! Enter valid email."));
		}

		// first delete any previous reset by the user 
		$this->_delete('password_reset', 'reset_email', [ $_POST['email'] ] );
		
			
		//create required inputs
		$selector = bin2hex(random_bytes(8));
		$token = random_bytes(32);
		$url = "https://{$_SERVER['HTTP_HOST']}/login/password-reset?selector=$selector&validator=" .bin2hex($token);
		$expiry = date('U') + 3600;
		$hashToken = password_hash($token, PASSWORD_DEFAULT);

		// insert new details 
		$this->_insert('password_reset', 'reset_email, reset_selector, reset_token, reset_expiry, origin', [ $_POST['email'], $selector, $hashToken, $expiry, $_POST['origin'] ] ); 
		
		//send mail	 				
		$body = "<h3 style='padding: 6px; background-color:green!important;color:white;'> Forgot Password verification </h3>";
		$body .= "<p>Dear user, <br>";
		$body .= "Click button below to reset your password before 2 hour expiry. Just ignore if you didn't make this request.";
		$body .= "<br><br><a  href='$url'  style='padding:5px; background:orange; color: white; font-weight: bold; border:none; border-radius: 5px;'>  Reset Password  </a>
				<br><br>Or copy the link below and paste it on your browser<br><br>$url
		";
		CustomFunctions::SendMail($_POST['email'], "Password Reset Request | Mizizi Classifieds", $body, $this->_company() );
		die($this->_ms(false, "Check your email to continue. Check your spam folder if you don't see our mail!"));
				
		$this->log("{$_POST['email']} requested a password reset at " . date('Y-m-d, H:i:s') . "| <br> {$_SERVER['HTTP_USER_AGENT']}", 'Account' );
		
			
	}

	public function passwordresetaction() {
	     

		if ((ctype_xdigit($_POST['selector']) != true)  || (ctype_xdigit($_POST['validator']) != true)) 
		    die($this->_ms(true, "We couldn't validate your password request. Start the reset process again"));

		
		if ($_POST['pass1'] != $_POST['pass2'])  die($this->_ms(true, "Passwords don't match"));
		

		// select if valid from db  
		$data = $this->_get('password_reset', 'reset_selector, reset_expiry >= ', [ $_POST['selector'], date("U") ], false);
		if ($data[0] != 1) { 
			die($this->_ms(true, "Invalid or expired token. Start the reset process again!"));
		} 
		$email = $data[1]['reset_email'];  
		// Verify token
    	if (!password_verify(hex2bin($_POST['validator']), $data[1]['reset_token'])) {
    		die($this->_ms(true, "Invalid or expired token. Start the reset process again!"));
    	}
		    
		// reset the password  
		$this->_update('users', 'user_pass, user_status', 'user_email', [password_hash($_POST['pass1'], PASSWORD_DEFAULT), "Active", $email] );
		
		$link = '/login';
		if (!empty($data[1]['origin'])) {
		    $link = '/paybill';
		}
		echo $this->_ms(false, "Password reset succesful. You can <a href='$link'>login</a>!");
		 

		// delete the row on success 
		$this->_delete('password_reset', 'reset_selector',  [ $_POST['selector'] ]);
        $this->log("{$email} completed a password reset at " . date('Y-m-d, H:i:s') ."| <br> {$_SERVER['HTTP_USER_AGENT']}", 'Account' );
	 
	}
	
	public function send_email() {
	    $email = explode(',', $_POST['email']);
	    
	     CustomFunctions::SendMail($email, "{$_POST['subject']}", "{$_POST['body']}", $this->_company() );
	     $this->log(Session::get('email')." sent an email at {$_POST['email']} at " . date('Y-m-d, H:i:s'), 'Company' );
	     echo $this->_ms(false);
	}
	 
	public function processlogin() {
	    		
		$data = $this->_get('users', 'user_email, user_status', [$_POST['email'], 'Active' ], false);
		
		if ($data[0] == 0) die($this->_ms(true, "Incorrect details")); // user not found
        
		    $data = $data[1];

			if (password_verify($_POST['pass1'], $data['user_pass'])) {
				// login
				Session::init();
				Session::set('role', $data['user_role']);
				Session::set('loggedIn', true);
				Session::set('userid', $data['user_ID']);
				Session::set('email', $data['user_email']); 
				Session::set('fname', $data['user_fname']);   
    			Session::set('phone', $data['user_tel']); 
    			Session::set('myaff', $data['user_aff_code']); 
    			Session::set('url', $data['user_url']); 
    			Session::set('name', $data['user_fname']  );
				//Session::set('fname', ucfirst(explode(" ", $data['user_names'])[0]));
			//	Session::set('staffcontract', $data['user_staff_contract']);
			$key = CustomFunctions::randchars(40);
				Session::set('key', $key); 
			$this->_update('users', 'user_key_web', 'user_email', [$key, $_POST['email'] ]);
			 
				
				$time = time();
				$md = md5( $time );
				$ua = $_SERVER['HTTP_USER_AGENT'];
				// update last login date 
			    if (isset($_POST['remember'])) {
			        //$this->_insert('user_devices', 'ud_userid, ud_key, ud_user_agent', [$data['user_ID'],$md,$ua ] );
		            //$this->_update('users', 'user_last_login, user_cookie_pass', 'user_email', [$time, $time, $_POST['email']]);
			        //Session::set('remember', $data['user_ID'] );
			        Session::set('rkey', $md );
			    }
			    
			    if (isset($_POST['form'])) {
			        die(json_encode( ['error'=>'false', 'msg'=>'success', 'id'=>$data['user_ID'] ] ));
			    }
					
                $this->log("{$data['user_email']} logged into the system at " . date('Y-m-d, H:i:s') ."| <br> {$_SERVER['HTTP_USER_AGENT']}", 'Account' );
		
					$direction = "/dashboard";
					
					$await_login = Session::get('await_login') != null ? Session::get('await_login') : $direction; 
                    die($this->_ms(false, CustomFunctions::relocate($await_login, true)));
                    
			} else die($this->_ms(true, "Incorrect details")); // wrong password
			 
	}
	public function processsignup() {
	     
	     $userslast = explode('-', $this->_get('users order by user_ID desc ', '', [], 0)[1]['user_aff_code'])[1] + 1;
        
      
	    
  
		if (empty($_POST['fname'])  ||  empty($_POST['lname'])  || empty($_POST['email'])  || empty($_POST['tel']) || empty($_POST['pass1']) || empty($_POST['pass2'])) 
			die($this->_ms(true, "Required fields are empty"));
		
		if (!CustomFunctions::validEmail($_POST['email'])) die($this->_ms(true, "Invalid email")); 
		//if (CustomFunctions::verifyTel($_POST['tel'])) die($this->_ms(true, "Invalid phone number")); 
		if ($_POST['pass1'] != $_POST['pass2']) die($this->_ms(true, "Your passwords don't match "));
		
		if (!is_numeric($_POST['tel'])) {
		    die($this->_ms(true, "Phone invalid."));
		}
		
		$phone = str_replace('+','',$_POST['phonecode']). preg_replace('/^0/', '', $_POST['tel']); //$_tel = preg_replace('/^0/', '254', $_POST['phone']);
        if ($this->_get('users', 'user_email', [$_POST['email']], false)[0] > 0 ) die($this->_ms(true, "Email exists already"));
        if ($this->_get('users', 'user_tel', [$phone], false)[0] > 0 ) die($this->_ms(true, "Phone already exists exists already"));
 
			$rand = random_int(1000000, 90000000000);
			$token = password_hash($rand, PASSWORD_DEFAULT); 
			$token = str_replace('/', '', $token);
			$body = "<h3 style='padding: 4px; background-color:darkblue; color:white; font-weigh:bold;'> Email verification </h3>";
			$body .= "<p>Dear " . $_POST['fname'] . ",<br>";
			$body .= "Click button below to verifiy your email.";
			$body .= "<button style='border:none; background:blue;border-radius: 5px;'> <a style='color:white; font-weight:bold;' 
			href='https://www.{$_SERVER['HTTP_HOST']}/login/email-verify/" . $_POST['email'] . "/$token'>Verify</a></button>";
		//	CustomFunctions::SendMail($_POST['email'], "Verify your Email | Mizizi Classifieds", $body, $this->_company() );
		 	
            $uri = CustomFunctions::randchars(30);
	    	$inserted = $this->_insert('users', 'user_ref_by, user_aff_code, user_email, user_fname, user_lname, user_tel, user_pass,  user_datecreated,user_url', 
	    	[$_POST['aff'], "AMB-$userslast", $_POST['email'], $_POST['fname'] ,$_POST['lname'], $phone, password_hash($_POST['pass1'], PASSWORD_DEFAULT), time(), $uri ] );
        
			//echo $this->_ms(false, "Registration successful. Check your email if our email is missing check your spam folder and whitelist us");
  
            
			// get the last insert id 
			$lastInsertId = json_decode($inserted)->cl; //$this->_getmore('users', 'MAX(user_ID)', 'user_email', [ $_POST['email'] ]); 

			// enter the user into a payment roll 
			$this->_insert('userearnings', 'es_userId, es_email', [$lastInsertId, $_POST['email']] );
			
			Session::set('role', "Customer");
			Session::set('loggedIn', true);
			Session::set('userid', $lastInsertId);
			Session::set('email', $_POST['email']); 
			Session::set('fname', $_POST['fname']);
			Session::set('phone', $phone ); 
    		Session::set('myaff', "AMB-$userslast" ); 
    		Session::set('url', $uri ); 
			Session::set('name', $_POST['fname'] . ' ' . $_POST['lname'] );
		    $this->log("{$_POST['email']} signup into the system at " . date('Y-m-d, H:i:s') ."| <br> {$_SERVER['HTTP_USER_AGENT']}", 'Account' );
		 
		    
		    
			if (isset($_POST['form'])) { 
				die(json_encode( ['error'=>'false', 'msg'=>'success', 'id'=>$lastInsertId ] ));
			}
		
		    
	        $direction = "/dashboard";
			$await_login = Session::get('await_login') != null ? Session::get('await_login') : $direction;
            echo $this->_ms(false, CustomFunctions::relocate($await_login, true));

 
	}
	
	 
   
	public function contactus() { 
      if (!CustomFunctions::validEmail($_POST['email']) || !CustomFunctions::verifyTel($_POST['email']) ) {
		die($this->_ms(true, "Enter either a valid phone number or email!")); 
	  }

	     $company = $this->_company(); 
         $stmt = $this->_insert('contactus', 'name, email, subject, message, date', [ htmlspecialchars($_POST['name']??''), strip_tags($_POST['email']), strip_tags($_POST['subject']), strip_tags($_POST['message']), date("Y-m-d") ]);
         echo $this->_ms(false, "Contact succesful. We will get back asap.");
         CustomFunctions::SendMail("{$company['c_email']}", "New Contact Form", 
         "<p>Subject<br>{$_POST['subject']}<br><hr> body<br> {$_POST['message']} <br><hr>Referrer:  {$_POST['ref']} <br><hr>Contact: {$_POST['email']} </p>", $this->_company() );
        $this->log("{$_POST['email']} added a new query contact form at " . date('Y-m-d, H:i:s'), 'Account' );
         
      
	} 
	 
	public function resetpass_indv() {
	    
		$message = "";  
		
		  $pass = CustomFunctions::randchars(5);
		 
		 $this->_update('users', 'user_pass , user_pass_expiry ', 'user_ID', [ password_hash($pass, PASSWORD_DEFAULT), (time() + (86400 * 60) ), Session::get('userid')  ]);
		 
            $user = $this->_get('users', 'user_ID ', [ Session::get('userid')  ], false);
            
            
            $this->log(Session::get('email')." reset password for {$user[1]['user_email']} at " . date('Y-m-d, H:i:s'), 'Account' );
            
            $body = "<div>Dear client,<br> Your password was reset for you by the admin.<br> Please login <a href='https://{$_SERVER['HTTP_HOST']}/login'>here</a> with:
                <p>Email: {$user[1]['user_email']} </p> <p>Email: {$pass} </p> </div>";
			CustomFunctions::SendMail($user[1]['user_email'], "Mizizi Classifieds Reset Password" , $body, $this->_company() );
            
          echo $this->_ms(false, "The user's password was reset and sent to their email.") ; 
	}
	public function get_images() {
		if (!empty($_POST['alt'])) {
			if (Session::get('role') == 'Admin') $images = $this->_get('images', '(image_alt_title like ? or image_name like ?) ', [ "%{$_POST['alt']}%","%{$_POST['alt']}%"  ], true, ' order by image_ID desc limit 30 ') ; 
			else $images = $this->_get('images', '(image_uploaded_by_fk ? and (image_alt_title like ? or image_name like ?) ', [ Session::get('userid'), "%{$_POST['alt']}%", "%{$_POST['alt']}%"  ], true, ' order by image_ID desc limit 30 ') ; 
		} else {
			if (Session::get('role') == 'Admin') $images = $this->_get('images', ' ', [   ], true, ' order by image_ID desc limit 20 ') ; 
			else $images = $this->_get('images', 'image_uploaded_by_fk ', [ Session::get('userid')  ], true, ' order by image_ID desc limit 20 ') ; 
		}
	   
	   $output = "<div class='row'> ";
	   $i = 1;
	   foreach ($images[1] as $row) {
	       $title = "<p>{$row['image_alt_title']}</p>";
	       
	        switch ($row['image_type']) {
              case 'audio':
                    if (($_POST['selectfirst'] == 'yes') && ($i == 1) ) {
            	            $output .= "<div class='col-md-2 mb-2'><div class='for_active_click active_img' id='id1'  type='{$row['image_type']}' imid='{$row['image_ID']}' rel='public/assets/uploads/{$row['image_name']}'><audio  style='width:120px;height:120px;' ><source src='/public/assets/uploads/{$row['image_name']}'></audio></div></div>";
        	        } else
        	            $output .= "<div class='col-md-2 mb-2'><div class='for_active_click' imid='{$row['image_ID']}'  type='{$row['image_type']}' rel='public/assets/uploads/{$row['image_name']}'><audio  style='width:120px;height:120px;' ><source src='/public/assets/uploads/{$row['image_name']}'></audio></div></div>";
        	       
                break;
              case 'video':
                if (($_POST['selectfirst'] == 'yes') && ($i == 1) ) {
        	            $output .= "<div class='col-md-2 mb-2'><div class='for_active_click active_img'  type='{$row['image_type']}' id='id1' imid='{$row['image_ID']}' rel='public/assets/uploads/{$row['image_name']}'><video autoplay muted  style='width:120px;height:120px;' ><source src='/public/assets/uploads/{$row['image_name']}'></video></div></div>";
    	        } else
    	            $output .= "<div class='col-md-2 mb-2'><div class='for_active_click'  type='{$row['image_type']}' imid='{$row['image_ID']}' rel='public/assets/uploads/{$row['image_name']}'><video  autoplay muted style='width:120px;height:120px;' ><source src='/public/assets/uploads/{$row['image_name']}'></video></div></div>";
    	       
                break;
              case 'image':
                if (($_POST['selectfirst'] == 'yes') && ($i == 1) ) {
        	            $output .= "<div class='col-md-2 mb-2'><div class='for_active_click active_img'  type='{$row['image_type']}' id='id1' imid='{$row['image_ID']}' rel='public/assets/uploads/{$row['image_name']}'><img src='/public/assets/uploads/{$row['image_name']}' style='width:120px;height:120px;' >$title</div></div>";
    	        } else
    	            $output .= "<div class='col-md-2 mb-2'><div class='for_active_click'  type='{$row['image_type']}' imid='{$row['image_ID']}' rel='public/assets/uploads/{$row['image_name']}'><img src='/public/assets/uploads/{$row['image_name']}' style='width:120px;height:120px;' >$title</div></div>";
    	       
                break;
              default: 
                if (($_POST['selectfirst'] == 'yes') && ($i == 1) ) {
        	            $output .= "<div class='col-md-2 mb-2'><div class='for_active_click active_img' type='{$row['image_type']}' id='id1' imid='{$row['image_ID']}' rel='public/assets/uploads/{$row['image_name']}'>
        	            <a target='blank' href='/public/assets/uploads/{$row['image_name']}' style='width:120px;height:120px;border:1px solid red;'><center>{$row['image_name']}</center></a></div></div>";
    	        } else
    	            $output .= "<div class='col-md-2 mb-2'><div class='for_active_click' imid='{$row['image_ID']}'  type='{$row['image_type']}' rel='public/assets/uploads/{$row['image_name']}'>
    	            <a target='blank' href='/public/assets/uploads/{$row['image_name']}' style='width:120px;height:120px;border:1px solid red;'><center>{$row['image_type']}</center></a></div></div>";
    	       
            }
            
	       
	       $i++;
	   }  
	   $output .= "</div>";
	   if (($_POST['selectfirst'] == 'yes')   ) {
	       $output .= "
        	   <script>
        	         
                    $('.for_active_click').removeClass('active_img');
                    $('#id1').addClass('active_img');
                    const imglink = $('#id1').attr('rel');
                    const imgid = $('#id1').attr('imid');
                    $('.viewimgid').val(imgid);
                    const type = $('#id1').attr('type');
                    $('.selectimg').html('<img src=\'/'+imglink+'\' style=\'height:30px;width:30px;\' > ');
                    $('.selectimgid').text(imgid);
                    $('.use_submitted_image').removeClass('hidden');
                    $('.del_submitted_image').removeClass('hidden');
                    $('.copy_submitted_image').removeClass('hidden');
                    $('.imagelink_copy').val('/'+imglink);
                    if (type != 'image') $('.use_submitted_image').addClass('hidden');
                    
        	   </script>  "; 
	   } 
	   $output .= "
	   <script>
	      
    	   $('.for_active_click').click(function() {  
                $('.for_active_click').removeClass('active_img');
                $(this).addClass('active_img');
                const imglink = $(this).attr('rel');
                const imgid = $(this).attr('imid');
                $('.viewimgid').val(imgid);
                $('.selectimg').html('<img src=\'/'+imglink+'\' style=\'height:30px;width:30px;\' > ');
                $('.selectimgid').text(imgid);
                $('.use_submitted_image').removeClass('hidden');
                $('.del_submitted_image').removeClass('hidden');
                $('.copy_submitted_image').removeClass('hidden');
                $('.imagelink_copy').val('/'+imglink);
                const type = $(this).attr('type');
                if (type != 'image') $('.use_submitted_image').addClass('hidden');
            });
	   </script>
	   ";
	   
	   echo $this->_ms(false, $output);
	}
	 
	public function delete_images() {
	    $images = $this->_get('images', 'image_ID ', [ $_POST['id']  ], false )[1] ; 
	    
	    if (file_exists("public/assets/uploads/{$images['image_name']}")) unlink("public/assets/uploads/{$images['image_name']}");
	    
	    echo $this->_delete('images', ' image_ID', [ $_POST['id']  ]    )  ; 
	    $this->log(Session::get('email')." deleted an image at " . date('Y-m-d, H:i:s'), 'Company' );
	    
	}
	public function update_blog() {
	    $postowner = $this->_get('blog left join users on user_email=b_added_by', 'b_ID', [$_POST['id']], false)[1];
	    if ( ($postowner[1]['b_added_by'] == Session::get('email')) || (Session::get('role') == 'Admin')  ) {
	        //admin
	       $url = substr(strip_tags($_POST['title']), 0, 40);
		    $url = $url . '-'. random_int(1000, 1000000);
		    $url_browser = CustomFunctions::validUrl($url);
		    $url = CustomFunctions::NoSpaceUrl($url);
    			 
    		echo $this->_update('blog', 'b_title, b_content, b_url, b_url_browser, b_file, b_status, b_word_count, b_date_edited, b_description, b_keywords','b_ID', 
			[strip_tags($_POST['title']), $_POST['body'], $url, $url_browser, $_POST['imageid'], '1', str_word_count($_POST['body']), time(), 
			strip_tags($_POST['cont_description']), $_POST['keywords'], $_POST['id'] ]);
			
			 $this->log(Session::get('email')." updated a blog " . date('Y-m-d, H:i:s'), 'Content' );
    			 
	    } else die($this->_ms(true, 'You cannot edit this post'));
	}
	public function insert_blog() {
	    
	    
	    /******************************  analyzing the post body ******************************/
	    
	    $explodes = explode(" ", $_POST['body']);
	    $hs = 0;
	    
	    foreach ($explodes as $ex ) {
	       // if ( ($ex == "<h1>") || ($ex == "<h2>") || ($ex == "<h3>") || ($ex == "<h4>") || ($ex == "<h5>")  || ($ex == "<h6>") ) {
	       //     $hs += 1;
	       // }
	        
	        if (strpos($ex, '<h') !== false) {
              $hs += 1;
            }
	    }
	    
	    if ((Session::get('email') != 'calvinsongele@gmail.com') || (Session::get('email') != 'bongele92@gmail.com')) {
	    if ($hs < 2 ) {
	         //echo "You need to have a minimum of 2 subheadings. You have $hs"; die;
	    }}
	    // similar posts
	    //$similarposts = $this->_similarposts();
	    /******************************  analyzing the post body ******************************/
	       
	    if ($_POST['thisdraft'] == '1') {

	        
    		$rowcount = $this->_get('blog', 'b_draft_indicator', [ $_POST['timest'] ] )[0];
    		
    		if ($rowcount == 0 ) {
    		    // insert
    		     $story = ($_POST['body']);
	        	 $word_count = str_word_count($story);
        		 $url = strip_tags(trim($_POST['title'])) . '-'. date('Y-m-d'); //random_int(1000, 1000000);
        		 $url_browser = CustomFunctions::validUrl($url);
        		 $url = CustomFunctions::NoSpaceUrl($url);
        		 $date = date("U");
    		    
    		    
    			 $draft = $this->_insert('blog', 'b_title, b_content, b_url, b_url_browser, b_added_by, b_word_count, b_date_created, b_draft_indicator', 
    			 [ strip_tags($_POST['title']), $story, $url, $url_browser, $_SESSION['email'], $word_count, $date,  $_POST['timest'] ] );
    			 
    			 if (json_decode($draft)->error == 'true') 
    			     die( $this->_ms(true, "Something went wrong!") );
    			     
    			 
    		} else {
    		    // edit
    		         $story = ($_POST['body']) ;
	        	 $word_count = str_word_count($story);
        		 $url = strip_tags($_POST['title']) . '-'. random_int(1000, 1000000);
        		 $url_browser = CustomFunctions::validUrl($url);
        		 $url = CustomFunctions::NoSpaceUrl($url);
		 
    			$this->_update('blog', 'b_title,b_content,b_url,b_url_browser,b_word_count', 'b_draft_indicator',
    			    [ strip_tags($_POST['title']), $story, $url, $url_browser , $word_count,  $_POST['timest'] ] );
    			//$this->regenerate_xml1();
    		
    		}
	       
    	    
    	    die;
	        
	    }
	    
	    if ($_POST['thisdraft'] == '0')  
			$this->_delete('blog', 'b_draft_indicator', [ $_POST['timest'] ]);
			
		$error = false;	
		if (empty($_POST['title'])) 
		    die($this->_ms(true, "You've not included the title!"));
		  
		
	
	    if ((Session::get('email') != 'calvinsongele@gmail.com') || (Session::get('email') != 'bongele92@gmail.com')) {
		    if ((strlen($_POST['cont_description']) > 165) || (strlen($_POST['cont_description']) < 100)) {
		     die($this->_ms(true, "The length of the summary should be between 100 to 165. Yours is not within the limit."));
		     
		}}
		
		if (isset($_POST['draft'])) $poststatus = ($_POST['draft'] == 1) ? 0 : 1; else $poststatus = 1;

	
		// a few needed param
		$url = substr(strip_tags($_POST['title']), 0, 40);
		$url = $url . '-'. random_int(1000, 1000000);
		$url_browser = CustomFunctions::validUrl($url);
		$url = CustomFunctions::NoSpaceUrl($url);
		//strip_tags($text, ['p', 'a']);
		if ($_SESSION['role'] == 'Admin') {
			$allowable = ['p', 'a', 'li', 'b', 'h1', 'h2', 'h3', 'h4', 'h5', 'b', 'strong', 'div', 'br', 'ul', 'ol','img', 'video'];
		} else {
			$allowable = ['p', 'li', 'b', 'h1', 'h2', 'h3', 'h4', 'h5', 'b', 'strong', 'div', 'br', 'ul', 'ol', 'img', 'a', 'video'];
		}	
	//	$story = strip_tags($_POST['body'], $allowable) . "<p><b> Send your hot story or video to  </b></p>";
		$story = ($_POST['body']) . "<p><b> Send your hot story or video to business@miziziclassifieds.com </b></p>";
		$word_count = str_word_count($story);
	
		
		if ($error == false) {
		    
		    		// images ... required
        		$event_imgs = $_POST['imageid'];
        		if (empty($event_imgs)) die($this->_ms(true, "Please upload an image!"));
        	
        	 
        		if ($_POST['category'] == '34') {
        		    $event_imgs = 'academic-writing.jpeg';
        		}
					
			$time_of_post = date('U');
			
			$post = $this->_insert('blog', 'b_title, b_content, b_url, b_url_browser, b_file, b_added_by, b_status, b_word_count, b_date_created, b_description, b_keywords', 
			[strip_tags($_POST['title']), $story, $url, $url_browser, $event_imgs, $_SESSION['email'], $poststatus, $word_count, $time_of_post, 
			strip_tags($_POST['cont_description']), $_POST['keywords'] ]);

			$insertID = json_decode($post)->cl;
			
			if (json_decode($post)->error != 'false') { 
				echo $this->_ms(true, "An error occurred");die;
			} 
			    
			// delete the draft 
			$this->_delete('blog', 'b_draft_indicator', [ $_POST['timest'] ]);

			if ( isset($_POST['sendmails']) && ($_POST['sendmails'] == 'send')) {
				
				if (empty($_POST['cont_description'])) {
					$msg = substr( strip_tags($story), 0, 150);
					
				}else {
					$msg = $_POST['cont_description'] . ' ...' . " ";
				}
				
				
				if ($poststatus == 1) $this->_sendtosubscribers($_POST['title'], $msg);
			}
			//last insert id
			//$insertID = $this->_get('blog', 'b_date_created,b_title', [ $time_of_post, strip_tags($_POST['title']) ], false)[1]['b_ID']; 
			
			//add to blog categories
			$this->_insert('categ_l_blog', 'ctl_post_ID, ctl_categ_ID', [ $insertID, $_POST['category'] ]);
			echo $this->_ms(false, "Post added successfully");
			$this->log(Session::get('email')." created a blog " . date('Y-m-d, H:i:s'), 'Content' );
			
		
		 
		}
		
	// end of adding event method
	}
	private function _sendtosubscribers(string $title, string $msg) {
	    if (Session::get('email') == 'calvinsongele@gmail.com') { 
    		$data = $this->_get('mail_list')[1];
    		
    		$emails = [];
    		foreach ($data as $row) $emails[] = $row['st_email'];
    		CustomFunctions::SendMail($row['st_email'], $title, $msg, $this->_company() );
	    }
	    
	}
	public function peace(){  }
	
	public function delete_blog() {
	    echo $this->_delete('blog', 'b_ID', [ $_POST['postID']]);
	    $this->log(Session::get('email')." deleted a blog " . date('Y-m-d, H:i:s'), 'Content' );
	}
	public function uploadimg() {
	    
	}
	
   
    
	public function send_sms() { 
        if ($_POST['number'] == 'sms') { 
            
    		$rows = $this->_get('users' )[1];
    		
    		foreach ($rows as $row) {
    		    CustomFunctions::SendSMS($_POST['message'], str_replace('+', '', $row['user_tel']) );
    		}
            
        } else {
    	    if (CustomFunctions::validEmail($_POST['number'])) {
    	        CustomFunctions::SendMail($_POST['number'], 'Hello from Mizizi Classifieds ', $_POST['message'], $this->_company() );
    	        echo $this->_ms(false);
    	    } else if (empty($_POST['number'])) { 
    		    $rows = $this->_get('mail_list' )[1];	
        		
        		foreach ($rows as $row) {
        		    CustomFunctions::SendMail($row['st_email'], 'Hello from Mizizi Classifieds ', $_POST['message'], $this->_company() );
        		}
        	    echo $this->_ms(false);
    		
    	    } else {
    	    
        	    if ($_SESSION['email'] == 'calvinsongele@gmail.com') {
            		//send sms
                    CustomFunctions::SendSMS($_POST['message'], $_POST['number']);
                       
        	    } else  echo $this->_ms(true, 'Only super admin can send sms');
    	    }
        }
	}
 
	 
	 
	
	public function editcompany1() { 
        //$me = $this->_get('company', 'c_ID', [1], false)[1];
        if (empty($_POST['value'])) exit($this->_ms(true, "<span class='text-danger'>Empty data cannot be saved</span>"));
 
        $more = '';
        
		
		$b = $this->_update('company', $_POST['col'], 'c_ID', [$_POST['value'],  1]);
		echo $this->_ms(false, "<span class='text-success'>".json_decode($b)->msg."</span>");
        
        $this->log( Session::get('email') . " edited the company details. Edited {$_POST['col']}  on " . date('Y-m-d, H:i:s'), 'Settings' );
	}
	public function edituser() { 
        //$me = $this->_get('users', 'user_ID', [Session::get('userid')], false)[1];
        if (empty($_POST['val'])) exit($this->_ms(true, "<span class='text-danger'>Empty data cannot be saved</span>"));
        
        if ( ($_POST['col'] == 'user_email') ) { //&& ( $this->me()['user_email_verified'] != 0 ) ) {
            exit($this->_ms(true, "<span class='text-danger'>You must contact support to change a verified email.</span>"));
        }
 
        $more = '';
        
		
		if ($_POST['col'] != 'user_bio')
		$b = $this->_update('users', $_POST['col'], 'user_ID', [$_POST['val'],  Session::get('userid')]);
		else
		$b = $this->_update('user_moredetails', $_POST['col'], 'user_ID', [$_POST['val'],  Session::get('userid')]);
		echo $this->_ms(false, "<span class='text-success'>".json_decode($b)->msg."</span>");
        
        $this->log( Session::get('email') . " edited their bio details. Edited {$_POST['col']}  on " . date('Y-m-d, H:i:s'), 'Settings' );
	}
	
    public function changepass() {  
        
        $me = $this->_get('users', 'user_ID', [Session::get('userid')], false)[1];
        
            if (isset($_POST['pin'])) {
                if ($_POST['pass1'] != $_POST['pass']) exit($this->_ms(true, "<span class='text-danger'>New pin and repeat pin must match!</span>"));
                
                if (strlen($_POST['pass1']) < 4 ) { //(!is_numeric($_POST['pass1']) ) {
                    die($this->_ms(true, "Pin must be a numeric number of 4 characters."));
                }
    
    
            if ( password_verify($_POST['oldpass'], $me['user_pin']) || (empty($me['user_pin'])) ) {
                // update
                $this->log( Session::get('email') . " changed their pin on " . date('Y-m-d, H:i:s'), 'Settings' );
                $expires = time() + (60 * 86400);
                $this->_update('users', 'user_pin', 'user_ID', [ password_hash($_POST['pass1'], PASSWORD_DEFAULT), Session::get('userid') ]);
               exit($this->_ms(false, "<span class='text-success'>Success. New pin saved</span>"));
            }
            exit($this->_ms(true, "<span class='text-danger'>Incorrect current pin!</span>"));
            return;
        }

        if ($_POST['pass1'] != $_POST['pass']) exit($this->_ms(true, "<span class='text-danger'>New password and repeat password must match!</span>"));


        if ( password_verify($_POST['oldpass'], $me['user_pass']) ) {
            // update
            $this->log( Session::get('email') . " changed their password on " . date('Y-m-d, H:i:s'), 'Settings' );
            $expires = time() + (60 * 86400);
            $this->_update('users', 'user_pass', 'user_ID', [ password_hash($_POST['pass1'], PASSWORD_DEFAULT), Session::get('userid') ]);
           exit($this->_ms(false, "<span class='text-success'>Success. New password saved</span>"));
        }
        exit($this->_ms(true, "<span class='text-danger'>Incorrect current password!</span>"));

     }
     
      
	
	public function newblog(){ 
	    $url = '';
	    for($i = 2; $i < 1000; $i++ ) {
	        $url = CustomFunctions::randchars($i); if ( $this->_get('blog', 'b_url', [ $url ])[0] < 1 ) { break; } 
	    }
	    
	      $img = '';
	    if (!empty($_FILES['img']['name'])) {
	        $name = 'BLOG'. time().rand().'.jpg';
	        if(move_uploaded_file($_FILES['img']['tmp_name'],  "/home2/mizizimu/cdn.miziziclassifieds.com/images/classiefieds/" . $name))
	            $img = $name;
	    }
	    
	    
	    echo $this->_insert('blog', 'b_title, b_url, b_desc, b_date, b_user_fk, b_img', [ $_POST['title'], $url, $_POST['body'], time(), Session::get('userid'), $img ] );
	}
	
	  
		
		public function deleteuser() {
			echo $this->_delete('users', 'user_ID', [$_POST['id']]);
		}
		public function sendemail() {
			
			CustomFunctions::SendMail($_POST['email'], $_POST['subject'], $_POST['body'], $this->_company() );
			echo $this->_ms(false);
		}
		
		public function savenumber() {
			if ($this->_get('numbers', 'n_phone', [$_POST['phone']] )[0] > 0 ) die($this->_ms(false));
			
			echo $this->_insert('numbers', 'n_phone, n_name, n_source, n_date', [$_POST['phone'], $_POST['name'], $_POST['source'], time() ] );
		}
		
        public function sendsms() {
            
            //if ($_POST['phone'] == 'users')
            
            if ($_POST['phone'] == 'all') {
                $phones = $this->_get('numbers', '', [], true)[1];
                foreach ($phones as $row) { 
                    $phn = preg_replace('/^0/', '254', $row['n_phone']);
                    CustomFunctions::SendSMS($_POST['body'], $phn  );    
                }
            } else {
                $phn = preg_replace('/^0/', '254', $_POST['phone'] );
                CustomFunctions::SendSMS($_POST['body'], $phn  ); 
            }
            
        }
         
         
        public function generate_uuidv4() {
            $data = random_bytes(16);
        
            // Set version to 0100 (4)
            $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
            // Set bits 6-7 to 10 (variant)
            $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        
            return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        }

	public function manage_categories() {
		
		if (!CSRF::isVerified($_POST['csrf_token'] ?? '')) {
			echo $this->_ms(true, "Invalid CSRF token. Please refresh the page and try again.", '',403);
			return;
		}

		if ($_POST['action'] == 'insert') {
			
            $file = '';
            if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
                $imagepath = CustomFunctions::uploadFile('file', UPLOADS);
                if ($imagepath[0]) die($this->_ms(true, $imagepath[1], '', 400 )); 
                $file = $imagepath[1];
            }

			$urlAvailable = $this->urlAvailable($_POST['slug'], 'categories', 'slug' );

			echo $this->_insert("categories", "category_type, title, quote_desc, meta_description, short_desc, content, image, slug, keyphrase", [
				$_POST['type'], $_POST['title'], $_POST['oneline'], $_POST['meta_description'], $_POST['meta_description'], $_POST['content'],
				$file, $urlAvailable, $_POST['keyphrase']
			]);
			return;
		}
		
		if ($_POST['action'] == 'update') {
			
            $file = '';
            if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
                $imagepath = CustomFunctions::uploadFile('file', UPLOADS);
                if (!$imagepath[0]) {
					$this->_update("categories", "image", "id", [ $file, $_POST['id'] ]);
				} 
                $file = $imagepath[1];
            }

			echo $this->_update("categories", "category_type, title, quote_desc, meta_description, short_desc, content, keyphrase", "id", [
				$_POST['type'], $_POST['title'], $_POST['oneline'], $_POST['meta_description'], $_POST['meta_description'], $_POST['content'],
				$_POST['keyphrase'], $_POST['id'] 
			]);
			return;
		}

		echo $this->_delete("categories", "id", [ $_POST['id'] ]);

	}

	public function manage_products() {
		
		if (!CSRF::isVerified($_POST['csrf_token'] ?? '')) {
			echo $this->_ms(true, "Invalid CSRF token. Please refresh the page and try again.", '',403);
			return;
		}
  
		$cols = "category_id, title, price, keyphrase, overview, content, drug_type";

		if ($_POST['action'] == 'insert') {
			
            $file = '';
            if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
                $imagepath = CustomFunctions::uploadFile('file', UPLOADS);
                if ($imagepath[0]) die($this->_ms(true, $imagepath[1], '', 400 )); 
                $file = $imagepath[1];
            }

			$urlAvailable = $this->urlAvailable($_POST['slug'], 'products', 'slug' );

			echo $this->_insert("products", "$cols, slug, image", [
				$_POST['category'], $_POST['title'], $_POST['price'],$_POST['keyphrase'], 
				$_POST['meta_description'], $_POST['content'], $_POST['drug_type'], $urlAvailable, $file 
			]);
			return;
		}
		
		if ($_POST['action'] == 'update') {
			
            $file = '';
            if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
                $imagepath = CustomFunctions::uploadFile('file', UPLOADS);
                if (!$imagepath[0]) {
					$this->_update("products", "image", "id", [ $file, $_POST['id'] ]);
				} 
                $file = $imagepath[1];
            }

			echo $this->_update("products", "$cols", "id", [
				$_POST['category'],$_POST['title'], $_POST['price'], $_POST['keyphrase'],
				$_POST['meta_description'], $_POST['content'], $_POST['drug_type'], $_POST['id'] 
			]);
			return;
		}

		echo $this->_delete("products", "id", [ $_POST['id'] ]);
	}


	

	public function manage_blog() {
		
		if (!CSRF::isVerified($_POST['csrf_token'] ?? '')) {
			echo $this->_ms(true, "Invalid CSRF token. Please refresh the page and try again.", '',403);
			return;
		}

		if ($_POST['action'] == 'insert') {
			
            $file = '';
            if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
                $imagepath = CustomFunctions::uploadFile('file', UPLOADS);
                if ($imagepath[0]) die($this->_ms(true, $imagepath[1], '', 400 )); 
                $file = $imagepath[1];
            }

			$urlAvailable = $this->urlAvailable($_POST['slug'], 'blog', 'slug' );

			echo $this->_insert("blog", "title, meta, short_desc, content, image, slug, keyphrase, category_id", [
				$_POST['title'], $_POST['meta_description'], $_POST['meta_description'], $_POST['content'],
				$file, $urlAvailable, $_POST['keyphrase'], $_POST['category']
			]);
			return;
		}
		
		if ($_POST['action'] == 'update') {
			
            $file = '';
            if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
                $imagepath = CustomFunctions::uploadFile('file', UPLOADS);
                if (!$imagepath[0]) {
					$this->_update("blog", "image", "id", [ $file, $_POST['id'] ]);
				} 
                $file = $imagepath[1];
            }

			echo $this->_update("blog", "title, meta, short_desc, content, keyphrase, category_id", "id", [
				$_POST['title'], $_POST['meta_description'], $_POST['meta_description'], $_POST['content'],
				$_POST['keyphrase'], $_POST['category'], $_POST['id'] 
			]);
			return;
		}

		echo $this->_delete("blog", "id", [ $_POST['id'] ]);

	}
        
         

	
// end of class	
}
