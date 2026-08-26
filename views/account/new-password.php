<!DOCTYPE html>
<html lang="en">
<?php $ignoreFooter = true; ?>
<head>
    <?php  require 'public/includes/header.inc.php'; ?>
    <meta name='robots' content='noindex, noffollow'>
</head> 

<body>

    <?php require "public/includes/preloader.inc.php" ?>


    <header class="header">

        <?php  //require 'public/includes/navbar.inc.php'; ?>
       
    </header>
    <section class="login-section">
            <div class="login-container">
                <div class="login-form-content">
                    <div class="form-content">
                        <a href="/" class="btn btn--border">
                            <i class="fa-solid fa-arrow-left"></i>
                            Back To Home
                        </a>
                    </div>
                </div>
            </div>
    </section>

    <main class="main">
          
        <div class='container'>
            <div class='row'>
                <div class='col-md-4'></div>
                <div class='col-md-6'>
                    <h5 class='h2 text-centevr'>Reset Password   </h5><br><br>
                    <form class="universal-form" data-url="reset-pass" data-feedback="feedback-resetpass">
                        <div class='form-group'    >
                            <input name='selector' type='hidden' class='form-control' value='<?php echo $_GET['s'] ?? '' ?>'>   
                            <input name='validator' type='hidden' class='form-control' value='<?php echo $_GET['t'] ?? '' ?>'> 
                            <input name='pass1' class='form-control' placeholder='New Password ' type='password'> <br>  
                            <input name='pass2' class='form-control' placeholder='Repeat password ' type='password' > <br>  
                            
                        <div class='form-group'   >
                                <input   class='form-control btn btn_blend submit_btn'  type='submit' value='Submit Now'> 
                        </div>
                        </div> 
                        <a href='/login'>Login?</a>  
                         
                        
                         <div class='feedback-resetpass feedback-box'> </div>
                        
                        
                    </form>
                    
                </div>
                <div class='col-md-2'></div>
            </div>
        </div>
 

    </main>




    <?php require 'public/includes/footer.inc.php'; ?>
  
</body>

</html>