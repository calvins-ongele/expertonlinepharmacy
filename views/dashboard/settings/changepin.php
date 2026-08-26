<?php
//setcookie('username', '6', time() + (86400 * 30), "/");

?>
<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require DASHBOARD. 'includes/header.inc.php' ?>  
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
       
        <?php 
        $pageid = 'changepin';
        
        require DASHBOARD.'includes/sidebar.inc.php' ?>
        
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header">
                <h1>Change Pin </h1>
            </div>
            <div class="content px-2">
                
                <div class='container'><hr></div>
                
                
                <div class='container'>
                    <h4>Please fill to change pin. This pin must be used in all withdrawal attempts</h4>
            
                    <form id='changepassword' class='alert' >
                        <div class='form-group alert' >
                            <div class='row'> 
                                <!--------------------------------->
                                <?php if (!empty( $this->me['user_pin'] )) { ?>
                                <div class='col-md-12 mb-3'>
                                    <label>Current pin [Can be left empty if setting up pin for the first time]</label>
                                    <input type='password' class='form-control  ' name='oldpass' value=''  > 
                                </div>
                                <?php } ?>
                                
                                
                                <input type='hidden' class='form-control  ' name='userid' value='<?php echo $this->me['user_ID'] ?>'   > 
                                <div class='col-md-12 mb-3'>
                                    <label>New pin</label>
                                    <input  type='hidden'  type='hidden' name='pin'  value='pin'  required  > 
                                    <input  type='password'  class='form-control  ' name='pass'   > 
                                </div>
                                <!--------------------------------->
                                <div class='col-md-12 mb-3'>
                                    <label>Repeat new pin</label>
                                    <input   type='password'  class='form-control  ' name='pass1' required   > 
                                </div> 
                                <div class='col-md-6 mb-3'>  </div> 
                                <!--------------------------------->
                                
                                <div class='col-md-12 mb-3'> 
                                    <input type='submit'  class='form-control btn-primary ' value='Save Now'   > 
                                </div> 
                                
                                <div class='feedback m-3'></div>
                                 
                                
                            </div>
                        </div>
                    </form>
                </div>
                 
            </div>
        </div>
        
        
        <?php require DASHBOARD. 'includes/footer.inc.php' ?>
    
    </main> 
 
</body>

</html>