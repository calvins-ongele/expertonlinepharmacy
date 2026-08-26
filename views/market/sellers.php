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
                            <h2 class="breadcrumb__title"> Mizizi Classidieds Products Sellers</h2>
                            <ul class="breadcrumb__list">
                                <li class="breadcrumb__item"><a href="/" class="breadcrumb__link"> <i
                                            class="las la-home"></i> Home</a> </li>
                                <li class="breadcrumb__item"><i class="fa-solid fa-angle-right"></i></li>
                                <li class="breadcrumb__item"> <span class="breadcrumb__item-text"> Products Sellers </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     <!-- ==================== Breadcrumb Start Here ==================== -->
      <!--==========================  Team Section Start  ==========================-->
        <section class="team-two-section py-30">
              
            <div class="container">
                <div class="row row-gap-4 justify-content-centerx">
                     <?php foreach($this->data['sellers'] as $row) { 
                        $img = $row['user_dp'];
                        if (empty($row['user_url'])) continue;    
                        //if (@file_get_contents("https://cdn.miziziclassifieds.com/images/classiefieds/$img") === FALSE ) continue;
                    ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 top-reveal">
                        <div class="team-slide-item">
                            <div class="team-img">
                                <!-- <img src="assets/images/team/8.jpg" alt="team" class="img-fluid w-100"> -->
                                 <a href="/market/sellers/<?= $row['user_url'] ?>">
                                 <figure class="image-effect" style="border-radius:10px 10px 0 0; <?= CustomFunctions::centerdImage("https://cdn.miziziclassifieds.com/images/classiefieds/$img") ?>"></figure>
                                 </a>
                            </div>
                            <div class="team-text">
                                <span>Products Seller</span>
                                <h5><a href="/market/sellers/<?= $row['user_url'] ?>"><?= $row['user_fname'] .' '. $row['user_lname'] ?></a></h5> 
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            
                
		<div class="col-12">
            <nav>
                <ul class="pagination" >
                    <?php
                        $currentPage = $_GET['pg'] ?? 1; 
                        $totalPerPage = $this->_company['user_loop_sequence']?? 24;
                        $totalCount = $this->data['count'] ?? 1;

                        $possiblePages = false;
                        $next = 0;
                        if ( ($totalPerPage * $currentPage) < $totalCount) {
                            $possiblePages = true;
                            $next = $currentPage + 1;
                        }
                    
                        if ($currentPage > 1) {
                    ?>
                    <li class="page-item"><a class="page-link" href="<?= CustomFunctions::formatDynamicUrl('pg', ($currentPage - 1)) ?>">Previous</a></li>
                    <?php } ?>
                    <?php for($i = 1; $i < ceil($totalCount/$totalPerPage)+1; $i++ ) { ?>
                    <li class="page-item <?= ($currentPage == $i)?'active':'' ?>"><a class="page-link" href="<?= CustomFunctions::formatDynamicUrl('pg', $i) ?>"><?= $i ?></a></li>
                    <?php } if ($possiblePages) { ?> 
                    <li class="page-item"><a class="page-link" href="<?= CustomFunctions::formatDynamicUrl('pg', $next) ?>">Next</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>

                </div>
            </div>
        </section>
        <!--==========================  Properties Section End  ==========================-->
        
        <!--==========================  Call-to-action Section Start  ==========================-->
        <section class="call-to-action-section py-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div
                            class="d-flex flex-wrap gap-5 justify-content-center justify-content-md-between align-items-center">
                            <div class="text">
                                <h2>Sell on Mizizi Classifieds</h2>
                                <p>List your products and we will help market them affordably</p>
                            </div>
                            <div class="button">
                                <a href="/login" class="btn btn--base">Start Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==========================  Call-to-action Section End  ==========================-->
        
        <!--==========================  Team Section End  ==========================-->
        
    </main>
    <!-- ==================== Footer Start Here ==================== -->
    <?php require "public/includes/footer.inc.php" ?>
</body>

</html>