<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'public/includes/header.inc.php' ?>
</head>

<body>

    <?php require "public/includes/navbar.inc.php" ?>
    <!-- ==================== Header End Here ==================== -->
    <main>
        
     <!-- ==================== Breadcrumb Start Here ==================== -->
        <section class="breadcrumb py-120 bg-img" data-background-image="<?= $this->_company['breadcrumb_bg'] ?>">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="breadcrumb__wrapper">
                            <h2 class="breadcrumb__title"> Use Our Paybill</h2>
                            <ul class="breadcrumb__list">
                                <li class="breadcrumb__item"><a href="index.html" class="breadcrumb__link"> <i
                                            class="las la-home"></i> Home</a> </li>
                                <li class="breadcrumb__item"><i class="fa-solid fa-angle-right"></i></li>
                                <li class="breadcrumb__item"> <span class="breadcrumb__item-text"> Use Our Paybill </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     <!-- ==================== Breadcrumb Start Here ==================== -->

      <section class="container-fluid cotact-page-main-section">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="alert card mt-3 mb-3">
                        <div class='card alert' style='border: 1px solid var(--blend)'>
                            
                            <h4>Get Piad instantly for your services using our paybill?</h4>
                            <hr>
                            <a href='/paybill' class='btn btn-block btn-primary'>Start now...</a>          
                            
                        </div>
                        
                   
                        <div class='card alert' style='border: 1px solid var(--blend)'>
                            <h4>How does our paybill works?</h4>
      
                            
                            <hr>
                            <p>
                           We provide seamless collection services for our merchant clients, regardless of industry. Whether you're in transportation and need fare collection, operate a small business like a cobbler shop, or manage church offerings, our platform ensures a smooth and efficient payment process
                                
                            </p>
                                <p class='text-danger'>With our service, you not only receive your payments instantly but also gain access to comprehensive reports and detailed analytics, helping you track and understand your financial transactions with ease.</p>
                                
                                <p>Getting started is simple: create an account, link it to our business number, and start receiving payments effortlessly.</p>
                                
                                
                            <hr>
                            <a href='/paybill' class='btn btn-block btn-primary'>Start now...</a> 
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>            
        </div>
    </section> 
        
    </main>
    <!-- ==================== Footer Start Here ==================== -->
    <?php require "public/includes/footer.inc.php" ?>
</body>

</html>