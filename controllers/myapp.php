<?php

class MyApp extends Controller {
    
	public function __construct() {
		parent::__construct(); 
	}
	
	public function forgotpasswordaction(){ $this->model->forgotpasswordaction(); }
	public function passwordresetaction(){ $this->model->passwordresetaction(); }
	public function processlogin(){ $this->model->processlogin(); }
	public function processsignup(){ $this->model->processsignup(); }
	public function contactus(){ $this->model->contactus(); }  
	public function del_product(){ $this->model->del_product(); } 
	public function edituser(){ $this->model->edituser(); }
	public function changepass(){ $this->model->changepass(); } 
	public function newblog(){ $this->model->newblog(); }
	public function droppost(){ $this->model->droppost(); }
	public function editproduct(){ $this->model->editproduct(); } 
	public function send_verify_email_phone(){ $this->model->send_verify_email_phone(); }
	public function verify_email_phone(){ $this->model->verify_email_phone(); } 
	public function peace(){ echo json_encode(['error'=>'', 'msg'=>'' ]);  } 
 
    public function eventpdf() {
        $this->model->eventpdf();
    }

   	
    public function requests() { 
            $method = $_POST['method'] ?? ''; 
            try {
                $this->model->$method();
            } catch(Exception $e) {
                http_response_code(500);
                file_put_contents('logs/Admin.Api.log', json_encode($e), FILE_APPEND);
                echo json_encode(['error'=>true, 'msg'=>'Something fatally went wrong!']);
            }
    }
	
	
	
	
	
   // end of class
}