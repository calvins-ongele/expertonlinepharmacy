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
                            <h1 class="breadcrumb__title"> Pick a favourite event and book early with affordable rates. </h1>
                            <ul class="breadcrumb__list">
                                <li class="breadcrumb__item"><a href="index.html" class="breadcrumb__link"> <i
                                            class="las la-home"></i> Home</a> </li>
                                <li class="breadcrumb__item"><i class="fa-solid fa-angle-right"></i></li>
                                <li class="breadcrumb__item"> <span class="breadcrumb__item-text"> Events </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     <!-- ==================== Breadcrumb Start Here ==================== -->
    <section>
        <div class='container mt-2 mb-2'>
            <form>
                <div class='searchform d-flex justify-content-start align-items-center gap-2' xstyle='display:flex;align-items:center;justify-content:flex-start' >
                    <input type='search' class='w-100 mb-2 form-control' name='q' value='<?php echo $_GET['q'] ?? '' ?>' placeholder='Enter word to search' >&nbsp;
                    <button type='submit' class='btn btn-success mb-2' value='Search'><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </section>

    
      <section class="blog-two-section blog-item-background py-120">
            <div class="container">
                <div class="row row-gap-4 justify-content-center">
                    <!-------------------------------->
                    
                <?php foreach($this->event['events'] as $row ) { 
                
                    $img = $row['s_pic'];
                    if (empty($img) || (@file_get_contents("https://cdn.miziziclassifieds.com/images/classiefieds/$img") == false)) { 
                        $img = 'pexels-souvenirpixels-19544945.jpg';
                    }

                    $pc = 0;
                    if ($row['s_running_total'] > 0) {
                        $pc = ($row['s_running_total'] / $row['s_target_amount']) * 100;
                    }
            
                ?> 
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="blog-item">
                            <div class="blog-item__img">
                                <figure class="image-effect"
                                style="<?= CustomFunctions::centerdImage("https://cdn.miziziclassifieds.com/images/classiefieds/$img") ?>">
                                    <!-- <img src="https://cdn.miziziclassifieds.com/images/classiefieds/<?= $img ?>" class="card-img-top" alt="<?= $row['s_pic'] ?>" class="img-fluid"> -->
                                </figure>
                            </div>
                            <div class="blog-item__content">
                                <ul>
                                    <li><i class="flaticon-user"></i> By: <?= $row['user_fname']??"" ?></li>
                                    <li><i class="flaticon-calendar"></i> <?= date("M d, Y", $row['s_date']) ?></li>
                                </ul>
                                <h4><a href="/services/<?php echo $row['s_url'] ?>"><?= $row['s_title'] ?> </a></h4>

                                <div class="read-more">
                                    <a href="/services/<?= $row['s_url'] ?>">Buy Ticket </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!------------------------------------->
                    
               <?php } ?>

               
		<div class="col-12">
            <nav>
                <ul class="pagination" >
                    <?php
                        $currentPage = $_GET['pg'] ?? 1; 
                        $totalPerPage = $this->_company['user_loop_sequence']?? 24;
                        $totalCount = $this->event['count'] ?? 1;

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

        <!--==========================  Call-to-action Section Start  ==========================-->
        <section class="call-to-action-section py-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div
                            class="d-flex flex-wrap gap-5 justify-content-center justify-content-md-between align-items-center">
                            <div class="text">
                                <h2>Have an Event?</h2>
                                <p>Post an event and easily collect bookings without a hustle.</p>
                            </div>
                            <div class="button">
                                <a href="/signup" class="btn btn--base"><i class="flaticon-plus"></i> Start Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==========================  Call-to-action Section End  ==========================-->
 
   
    </main>
    <!-- ==================== Footer Start Here ==================== -->
     <a href="/services/register?event=1" class="floating-action-button" aria-label="Add new item">
        <span class="fab-icon">
        <i class="fa fa-circle-plus"></i> 
        <!-- <i class="fa fa-creative-commons-sampling-plus"></i>       -->
         </span>
        &nbsp;<span style="font-size:14px">Post an Event</span>
    </a>
    <?php require "public/includes/footer.inc.php" ?>
</body>

</html>