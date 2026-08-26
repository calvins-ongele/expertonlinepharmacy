<!DOCTYPE html>
<html lang="en">

<head>
    <?php  require 'public/includes/header.inc.php'; ?>
    
    <style>
        .main-header .main-navbar {
            background: hsl(var(--black));
            padding: 0;
        }
        </style>
</head> 

<body>
  
    <?php  require 'public/includes/navbar.inc.php'; ?>
        
    <main class="main">
         <section class="properties-two-section py-120">
        
        <h5 class='h2 text-center'>Create a New Account </h5>
        
        <div class='container'>
            <div class='row'>
                <div class='col-md-4'></div>
                <div class='col-md-6 card '> 
                    <div class=' alert'>
                        <form class="universal-form" data-url="processsignup" data-feedback="feedback-register">
                              <?php $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null; ?>
                            <input type='hidden' name='ref' class='form-control form-control-sm '  value='<?php echo $_GET['utm_campaign'] ?? $server ?? '' ?>' />
                                            

                            <div class='form-group'    >
                                <div class='row'>
                                    <div class='col-md-6 mb-3'>
                                        
                                        <label>First Name</label>
                                        <input name='fname' class='form-control' placeholder='Eg John Doe' required>   
                                    </div>
                                    <div class='col-md-6 mb-3'>
                                        
                                        <label>Last Name</label>
                                        <input name='lname' class='form-control' placeholder='Eg John Doe' required>   
                                    </div>
                                    <div class='col-md-6 mb-3'>
                                        <label>Your Email</label>
                                        <input name='email' class='form-control' placeholder='eg johndoe@yahoo.com' required>  
                                    </div> 
                                    <div class='col-md-6 mb-3'> 
                                        <label>Your Phone</label>
                                        <input name='tel' class='form-control' placeholder='Eg 07000000000' required>
                                    </div>
                                    <div class='col-md-6 mb-3'>
                                         <label>A New Password</label>
                                        <input name='pass1' class='form-control' class='form-control' placeholder='Your password' type='password' required>
                                    </div>
                                    
                                    <div class='col-md-6 mb-3'>
                                         <label>Repeat the Password</label>
                                        <input name='pass2' class='form-control' class='form-control' placeholder='Your password again' type='password' required>
                                    </div>
                                     <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12"> 
                                                    <label>Optional referral code  </label> 
                                                <input type='text' name='aff' class='form-control form-control-sm  ' value="" placeholder='Referral code eg AMB-1' />
                                                
                                            </div>
                                        </div>
                                     </div>
                                    
                                </div>
                                       
                                  
                            </div>
                            <div class='form-group mb-2'   > 
                                <input   class='form-control btn btn_blend submit_btn'  type='submit' value='Submit'>  
                            </div>
                            <div class='feedback-register feedback-box'> </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <a href='/account/'>Login <span class='text-decoration-underline'>here</span></a>
                                </div> 
                            </div>
                              
                            
                            
                        </form>
                    </div>
                    
                </div>
                <div class='col-md-2'></div>
            </div>
        </div>
 
         </section>
    </main>

<br>


    <?php require 'public/includes/footer.inc.php'; ?>
</body>

</html>