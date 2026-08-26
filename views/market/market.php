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
                            <h2 class="breadcrumb__title"> Properties</h2>
                            <ul class="breadcrumb__list">
                                <li class="breadcrumb__item"><a href="/" class="breadcrumb__link"> <i
                                            class="las la-home"></i> Home</a> </li>
                                <li class="breadcrumb__item"><i class="fa-solid fa-angle-right"></i></li>
                                <li class="breadcrumb__item"> <span class="breadcrumb__item-text"> Properties </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     <!-- ==================== Breadcrumb Start Here ==================== -->

      <!--==========================  Properties Section Start  ==========================-->
        <section class="properties-two-section py-120">
            <div class="container">
                <div class="row row-gap-4 justify-content-centerx">
                    
                <?php $i = 0; foreach($this->data['market'] as $row ) {  
                    
                      
                        $img = trim(explode(',', $row['p_images'])[0]);// 
                        //CustomFunctions::bestimg($row['p_images']); 
                    
                        $tags = '';
                        $j = 0;
                        foreach (explode(',', $row['p_tags']) as $t) { $j++;
                            if ($j == 4) break;
                            $tags .= "<a href='/market/{$row['p_url']}'>$t</a>";
                        }
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="properties-item top-reveal">
                            <div class="properties-item__images">
                                <a href="/market/<?= $row['p_url']?>">
                                    <a href="/market/<?= $row['p_url'] ?>">
                                    <figure class="image-effectd" style="border-radius:10px 10px 0 0; <?= CustomFunctions::centerdImage("https://cdn.miziziclassifieds.com/images/classiefieds/$img") ?>">
                                        <!-- <img src="https://cdn.miziziclassifieds.com/images/classiefieds/<?= $img ?>" loading="lazy" alt="properties image"
                                            class="img-fluid card-img-top" style="height:260px!important;width:auto!important"> -->
                                    </figure>
                                    </a>
                                </a>
                                <div class="features-tag">
                                    <?= $tags ?>
                                </div>
                                <ul class="wach-info">
                                    <li>
                                        <i class="fa-solid fa-clock-rotate-left"></i> 
                                        <?= CustomFunctions::timeago($row['p_date']) ?>
                                    </li>
                                    <!-- <li>
                                        <i class="fa-regular fa-eye"></i>
                                        1450
                                    </li> -->
                                </ul>
                            </div>
                            <div class="properties-item__info">
                                <div class="post-namex d-flex justify-content-between">
                                    <span>By <a href="/market/sellers/<?= $row['user_url'] ?>" style="color: hsl(var(--base));"><?= $row['user_fname'] ?></a></span>
                                    <h6>KES <?= number_format($row['p_price'])?></h6>
                                </div>
                                <ul class="properties-address">
                                    <li>
                                        <h5><a href="/market/<?= $row['p_url']?>"><?= $row['p_title']?></a></h5>
                                        <p><?= $row['p_county'] ?></p>
                                    </li>
                                    <!-- <li>
                                        <p>Start From</p>
                                        <h5>KES <?= number_format($row['p_price'])?></h5>
                                    </li> -->
                                </ul>

                                
                                <hr>
                            <div class="read-more">
                                <a href="/market/<?= $row['p_url'] ?>" style="color: hsl(var(--base));">View More </a>
                            </div>
                            </div>
                            
                            <!-- <div class="properties-footer">
                                <ul>
                                    <li><i class="fa-solid fa-bed"></i> 4</li>
                                    <li><i class="fa-solid fa-bath"></i> 3</li>
                                    <li><i class="fa-solid fa-ruler-combined"></i> 1800 sq ft</li>
                                </ul>
                                <div class="start-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <span>(4.7)</span>
                                </div>
                            </div> -->
                        </div>
                    </div>
                <?php } ?>
                   
                    
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
        
    </main>
    <!-- ==================== Footer Start Here ==================== -->
    <?php require "public/includes/footer.inc.php" ?>
</body>

</html>