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
	public function newproduct(){ $this->model->newproduct(); }
	public function pay_product(){ $this->model->pay_product(); }
	public function payseller(){ $this->model->payseller(); }
	public function del_product(){ $this->model->del_product(); }
	public function shareprofit(){ $this->model->shareprofit(); }
	public function withdrawmoney(){ $this->model->withdrawmoney(); }
	public function edituser(){ $this->model->edituser(); }
	public function changepass(){ $this->model->changepass(); }
	public function registerservice(){ $this->model->registerservice(); }
	public function deactivateservice(){ $this->model->deactivateservice(); }
	public function confirmdisbursement(){ $this->model->confirmdisbursement(); }
	public function contributetoservice(){ $this->model->contributetoservice(); }
	public function payticket(){ $this->model->payticket(); }
	public function checkcontribution(){ $this->model->checkcontribution(); }
	public function update_taxpin(){ $this->model->update_taxpin(); }
	public function uploadvideo(){ $this->model->uploadvideo(); }
	public function finalizeuploadvideo(){ $this->model->finalizeuploadvideo(); }
	public function editvideo(){ $this->model->editvideo(); }
	public function depositpesapal(){ $this->model->depositpesapal(); }
	public function capturepayment(){ $this->model->capturepayment(); }
	public function createorder(){ $this->model->createorder(); }
	public function likevideo(){ $this->model->likevideo(); }
	public function depositfunds(){ $this->model->depositfunds(); }
	public function videotime(){ $this->model->videotime(); }
	public function delete_video(){ $this->model->delete_video(); }
	public function payvideo(){ $this->model->payvideo(); }
	public function GoLiveStart(){ $this->model->GoLiveStart(); }
	public function endlive(){ $this->model->endlive(); }
	public function activatelive(){ $this->model->activatelive(); }
	public function sendmessages(){ $this->model->sendmessages(); }
	public function fetchmessages(){ $this->model->fetchmessages(); }
	public function adddiscount(){ $this->model->adddiscount(); }
	public function submitrating(){ $this->model->submitrating(); }
	public function sendpinresetotp(){ $this->model->sendpinresetotp(); }
	public function resetpin(){ $this->model->resetpin(); }
	public function newblog(){ $this->model->newblog(); }
	public function droppost(){ $this->model->droppost(); }
	public function editproduct(){ $this->model->editproduct(); }
	public function newsalo(){ $this->model->newsalo(); }
	public function manageemployees(){ $this->model->manageemployees(); }
	public function dropEmployee(){ $this->model->dropEmployee(); }
	public function sendsalaries(){ $this->model->sendsalaries(); }
	public function new_emps_excel(){ $this->model->new_emps_excel(); } 
	public function newquote(){ $this->model->newquote(); }
	public function change_aff(){ $this->model->change_aff(); } 
	public function dropVariation(){ $this->model->dropVariation(); } 
	public function saveevent_variation(){ $this->model->saveevent_variation(); } 
	public function getticket(){ $this->model->getticket(); } 
	public function send_verify_email_phone(){ $this->model->send_verify_email_phone(); }
	public function verify_email_phone(){ $this->model->verify_email_phone(); }
	public function cont_politics(){ $this->model->cont_politics(); }
	public function confirm_deposit(){ $this->model->confirm_deposit(); }
	public function list_accounts_cards() { $this->model->list_accounts_cards(); }
	public function peace(){ echo json_encode(['error'=>'', 'msg'=>'' ]);  }
	public function view_transactions() { $this->model->view_transactions(); }

	/***********admin */  
	public function deleteuser() { $this->model->deleteuser();	}
	public function sendemail() { $this->model->sendemail();	}
	public function savenumber() { $this->model->savenumber();	}
	public function sendsms() { $this->model->sendsms();	}
	public function screenshotform() { $this->model->screenshotform();	}
	public function send_invitation_email() { $this->model->send_invitation_email();	}
	public function send_invitation_sms() { $this->model->send_invitation_sms();	}
	public function followup_sms($i = 0) { 
	$this->model->followup_sms($i);	}
	public function approve_new_company() { $this->model->approve_new_company(); }
	

	
	/***************waimaskan */
	public function expired_tenancy() {$this->model->expired_tenancy(); 	} 
	public function bedrooms() {$this->model->bedrooms(); 	}    
	public function updatedetails() {$this->model->updatedetails(); 	} 
	public function housetypesdetails() {$this->model->housetypesdetails(); 	} 
	public function spfeatures() {$this->model->spfeatures(); 	} 
	public function newlisting() {$this->model->newlisting(); 	}
	public function delete_building() {$this->model->delete_building(); 	} 
	public function delete_houses() {$this->model->delete_houses(); 	}
	public function editerms() {$this->model->editerms(); 	}   
	public function rateTenant() {$this->model->rateTenant(); 	} 
    // public function toggleactiveuser() { $this->model->toggleactiveuser(); } 
    // public function sendmassemails() { $this->model->sendmassemails(); } 
    // public function subscribe() { $this->model->subscribe(); 	}
	// public function contactform() { 	$this->model->contactform(); 	}
	// public function newpost() { 	$this->model->newpost(); 	}
    // public function post_view() {	$this->model->post_view(); 	}
    // public function getOnlineUsers() {$this->model->getOnlineUsers(); 	} 
    // public function editpost() {$this->model->editpost(); 	}      
	// public function closeticket() {$this->model->closeticket(); 	}    
	// public function deleteticket() {$this->model->deleteticket(); 	}   
	// public function newbuilding() {$this->model->newbuilding(); 	}   
	// public function univinsert() {$this->model->univinsert(); 	} 
	// public function send_email() {$this->model->send_email(); 	}   
	// public function editcompany1() {$this->model->editcompany1(); 	}
	// public function add_users() {$this->model->add_users(); 	}
	// public function resetpass_indv() {$this->model->resetpass_indv(); 	} 
	// public function deluser() {$this->model->deluser(); 	}
	// public function reinstateuser() {$this->model->reinstateuser(); 	}
	// public function deactivateuser() {$this->model->deactivateuser(); 	} 
	// public function contactagent() {$this->model->contactagent(); 	} 
	// public function delete_blog() {$this->model->delete_blog(); 	} 
	// public function insert_blog() {$this->model->insert_blog(); 	} 
	// public function update_blog() {$this->model->update_blog(); 	} 
	// public function regenerate_xml() {$this->model->regenerate_xml(); 	} 
	// public function act_on_booking() {$this->model->act_on_booking(); 	} 
	// public function endtenancy() {$this->model->endtenancy(); 	} 
	// public function edithouse() {$this->model->edithouse(); 	}  
	// public function sendofferletter() {$this->model->sendofferletter(); 	}
	// public function sendlease() {$this->model->sendlease(); 	}
	// public function sendsale() {$this->model->sendsale(); 	}

    
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