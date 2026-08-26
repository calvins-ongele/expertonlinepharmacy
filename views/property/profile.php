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
        <section class="breadcrumb py-30 bg-img" data-background-image="<?= $this->_company['breadcrumb_bg'] ?>">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="breadcrumb__wrapper">
                            <h1 class="breadcrumb__title h2"> <?= htmlspecialchars("{$this->data['property'][0]['user_fname']} {$this->data['property'][0]['user_lname']}'s Property Profile") ?></h1>
                            <ul class="breadcrumb__list">
                                <li class="breadcrumb__item"><a href="/" class="breadcrumb__link"> <i
                                            class="las la-home"></i> Home</a> </li>
                                <li class="breadcrumb__item"><i class="fa-solid fa-angle-right"></i></li>
                                <li class="breadcrumb__item"> <span class="breadcrumb__item-text"> Agent's Profile </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==================== Breadcrumb Start Here ==================== -->
        <!--==========================  Team Section Start  ==========================-->
        <section class="team-section py-30">
            <div class="container">
                <div class="row row-gap-5 justify-content-centerx">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-12">

                        <div class="team-abut mt-1 pt-xx2">
                            <h4 class="mb-4">About <?= htmlspecialchars("{$this->data['property'][0]['user_fname']} {$this->data['property'][0]['user_lname']}'s Property Profile") ?></h4>
                            <p><?= htmlspecialchars("{$this->data['property'][0]['user_about']}") ?></p>
                        </div>
                        <div class="my-listing-content mt-60">
                        
                            <div class="row row-gap-4">

                                <?php foreach ($this->data['property'] as $row) {
                                    
                     
                    
                    $price = empty($row['ih_price']) ? $row['bp_price'] : $row['ih_price'];
                    $bname = $row['user_fname'];
                    $someid = ''; 
                        
                        $img = array_merge( explode(',',$row['bp_files']), explode(',',$row['building_pics']) )[0];
                             //CustomFunctions::bestimg($row['bp_files'],$row['building_pics']);
                    
                        $use = htmlspecialchars($row['b_use']);
                        $tags = "
                                <span class='badge badge-md bg-primary'>{$use}</span>
                                <span class='badge badge-md bg-info'>New</span>
                                ";
                       
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="properties-item top-reveal">
                            <div class="properties-item__images">
                                <a href="/property/<?= $row['ih_url'] ?>">
                                    <figure class="image-effectd" 
                                        style="<?= CustomFunctions::centerdImage("https://cdn.miziziclassifieds.com/images/waimaskan/$img") ?>">
                                        <!-- <img src="https://cdn.miziziclassifieds.com/images/classiefieds/<?= $img ?>" loading="lazy" alt="properties image"
                                            class="img-fluid card-img-top" style="height:260px!important;width:auto!important"> -->
                                    </figure>
                                </a>
                                <div class="features-tag">
                                    <?= $tags ?>
                                </div>
                                <ul class="wach-info">
                                    <li>
                                        <i class="fa-solid fa-clock-rotate-left"></i> 
                                        <?= CustomFunctions::timeago($row['bp_date']) ?>
                                    </li>
                                    <!-- <li>
                                        <i class="fa-regular fa-eye"></i>
                                        1450
                                    </li> -->
                                </ul>
                            </div>
                            <div class="properties-item__info">
                                <div class="post-name">
                                    By <span><a href="/property/agents/<?= $row['user_url'] ?>"><?= htmlspecialchars($row['user_fname']) ?></a></span>
                                </div>
                                <ul class="properties-address">
                                    <li>
                                        <h5><a href="/property/<?= $row['ih_url'] ?>"><?= htmlspecialchars(CustomFunctions::trimTitle($row['building_name'], 12)) ?></a></h5>
                                        <p><?= htmlspecialchars($row['building_estate'].' '.$row['building_town']) ?></p>
                                    </li>
                                    <li>
                                        <p>Start From</p>
                                        <h5>KES <?= number_format($price)?></h5>
                                    </li>
                                </ul>
                            </div>
                            <div class="properties-footer">
                                <ul class="border-right" style="padding:10px 20px;">
                                    <li><i class="fa-solid fa-bed"></i> <?= htmlspecialchars($row['bp_bedroom_numbers']) ?></li>
                                    <li><i class="fa-solid fa-bath"></i> <?= htmlspecialchars($row['ih_floor_number']) ?></li>
                                    <li><i class="fa-solid fa-ruler-combined"></i> <?= htmlspecialchars($row['ih_floor_area']) ?> sqft</li>
                                </ul>
                                <div class="start-rating">
                                    <a href="/property/<?= $row['ih_url'] ?>" class="seedetails">
                                        See Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                <?php } ?>

                                <div class="col-12">
                                    <nav class="d-flex justify-content-start">
                                        <ul class="pagination">
                                            <?php
                                            $currentPage = htmlspecialchars($_GET['pg'] ?? 1);
                                            $totalPerPage = $this->_company['user_loop_sequence'] ?? 24;
                                            $totalCount = $this->data['count'] ?? 1;

                                            $possiblePages = false;
                                            $next = 0;
                                            if (($totalPerPage * $currentPage) < $totalCount) {
                                                $possiblePages = true;
                                                $next = $currentPage + 1;
                                            }

                                            if ($currentPage > 1) {
                                            ?>
                                                <li class="page-item"><a class="page-link" href="<?= htmlspecialchars(CustomFunctions::formatDynamicUrl('pg', ($currentPage - 1))) ?>">Previous</a></li>
                                            <?php } ?>
                                            <?php for ($i = 1; $i < ceil($totalCount / $totalPerPage) + 1; $i++) { ?>
                                                <li class="page-item <?= ($currentPage == $i) ? 'active' : '' ?>"><a class="page-link" href="<?= htmlspecialchars(CustomFunctions::formatDynamicUrl('pg', $i)) ?>"><?= $i ?></a></li>
                                            <?php }
                                            if ($possiblePages) { ?>
                                                <li class="page-item"><a class="page-link" href="<?= htmlspecialchars(CustomFunctions::formatDynamicUrl('pg', $next)) ?>">Next</a></li>
                                            <?php } ?>
                                        </ul>
                                    </nav>
                                </div>

                                <div class="col-lg-12">
                                    <div class="view-all text-centerx">
                                        <a class="btn btn--base" href="/property">View All Properties <i
                                                class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                      
                    </div>
                </div>
            </div>
        </section>
        <!--==========================  Team Section End  ==========================-->

    </main>
    <!-- ==================== Footer Start Here ==================== -->
    <?php require "public/includes/footer.inc.php" ?>
</body>

</html>