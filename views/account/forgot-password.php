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
                    <h5 class='h2 text-centebr'>Forgot Password   </h5><br><br>
                    <form class="universal-form" data-url="forgot-password" data-feedback="feedback-forgotpassword">
                        <div class='form-group'    >
                            <input name='email' class='form-control' placeholder='Your email'> <br>  
                        </div> 
                        <div class='form-group'   > 
                            <input   class='form-control btn btn_blend submit_btn'  type='submit' value='Submit'> 
                        </div>
                        <a href='/login/'>Login Instead</a>  
                         
                        
                         <div class='feedback-forgotpassword feedback-box'> </div>
                        
                        
                    </form>
                    
                </div>
                <div class='col-md-2'></div>
            </div>
        </div>
 

    </main>



<br>
    <?php require 'public/includes/footer.inc.php'; ?>
     
</body>

</html>