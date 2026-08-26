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
                            <h2 class="breadcrumb__title"> Property Listing</h2>
                            <ul class="breadcrumb__list">
                                <li class="breadcrumb__item"><a href="/" class="breadcrumb__link"> <i
                                            class="las la-home"></i> Home</a> </li>
                                <li class="breadcrumb__item"><i class="fa-solid fa-angle-right"></i></li>
                                <li class="breadcrumb__item"> <span class="breadcrumb__item-text"> Property Listing </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==================== Breadcrumb Start Here ==================== -->
        <!--==========================  Properties Section Start  ==========================-->
        
        <section class="properties-two-section py-30">
            <div class="container-fluid">
                          
                <div class="row row-gap-5">
                    <div class="col-lg-8">
                        <?php if(!$this->data['property']) { ?>
                        <div class="alert alert-danger text-center">There's no property to show</div>
                        <?php } ?>
                        
                        <div class="row row-gap-1 justify-content-centerx"> 

                            <?php foreach ($this->data['property'] as $row) {



                                $price = empty($row['ih_price']) ? $row['bp_price'] : $row['ih_price'];
                                $bname = $row['user_fname'];
                                $someid = '';

                                $img = array_merge(explode(',', $row['bp_files']), explode(',', $row['building_pics']))[0];
                                //CustomFunctions::bestimg($row['bp_files'],$row['building_pics']);

                                $use = htmlspecialchars($row['b_use']);
                                $tags = "
                                <span class='badge badge-md bg-primary'>{$use}</span>
                                <span class='badge badge-md bg-info'>New</span>
                                ";

                            ?>
                                <div class="col-lg-4 col-md-6 mb-3">
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
                                                    <p><?= htmlspecialchars($row['building_estate'] . ' ' . $row['building_town']) ?></p>
                                                </li>
                                                <li class="d-flex">
                                                    <p>Starts From</p>
                                                    <h5>KES <?= number_format($price) ?></h5>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="properties-footerx">
                                            <ul class="border-right d-flex" style="padding:10px 20px;">
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


                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="properties-filter">
                            <h4>Filter Properties</h4>
                            <form action="#" class="mt-3" method="get">
                                <div class="row row-gap-3">
                                    <div class="col-12 d-grid">
                                        <label for="status">Status</label>
                                        <select class="select-search" name="purpose" id="status">
                                            <option value="" hidden>Select Status</option>
                                            <option value='Accommodation'>Accommodation/Stay In</option>
                                            <option value='For Sale'>Houses For Sale</option>
                                            <option value='Land'>Land For Sale</option>
                                            <option value='Commercial'>Commercial</option>
                                            <option value='Residential'>Residential</option>
                                        </select>
                                    </div>
                                    <div class="col-12 d-grid">
                                        <?php //echo "<pre>"; print_r($this->filters['htypes'][0]); echo "</pre>"; ?>
                                        
                                        <label for="suburb">Suburb</label>
                                        <select class="select-search" name="area" id="suburb">
                                            <option value="" hidden>Select suburb</option>
                                            <?php foreach($this->filters['towns'] as $row) { ?>
                                            <option value="<?= $row['building_estate'] ?>"><?= $row['building_estate'] ?></option> 
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-sm-6 d-grid">
                                        <label for="city">City</label>
                                        <select class="select-search" name="city" id="city">
                                            <option value="" hidden>Select City</option>
                                            <?php foreach($this->filters['towns'] as $row) { ?>
                                            <option value="<?= $row['building_town'] ?>"><?= $row['building_town'] ?></option> 
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-sm-6 d-grid">
                                        <label for="country">Country</label>
                                        <select class="select-search" name="country" id="country">
                                            <option value="">Select Country</option>
                                            <option value="Kenya">Kenya</option> 
                                        </select>
                                    </div>
                                    <div class="col-12 d-grid">
                                        <label for="house-category">House Category</label>
                                        <select class="select-search" name="htype" id="house-category">
                                            <option value="">Select Category</option> 
                                            <?php foreach($this->filters['htypes'] as $row) { ?>
                                            <option value="<?= $row['ht_name'] ?>"><?= $row['ht_name'] ?></option> 
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-sm-6 d-grid ">
                                        <div class="form-group ">
                                            <label for="price-from">Price From</label>
                                            <input type="number" class="form-control border" name="pricefrom" id="price-from" style="max-height:50px;background:white" placeholder="ie 10000">
                                        </div> 
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-sm-6 d-grid">
                                        <div class="form-group ">
                                        <label for="price-to">Price To</label>
                                        <input type="number" class="form-control border" name="priceto" id="price-to" style="max-height:50px;background:white" placeholder="ie 1000000"> 
                                        </div>
                                    </div>

                                    <div class="col-12  d-grid">
                                        <?php //echo "<pre>"; print_r($this->filters['bedrooms']); echo "</pre>"; ?>
                                        <label for="bedrooms-min">Number of Bedrooms</label>
                                        <select class="select-search" name="bedrooms" id="bedrooms-min">
                                            <option value="">Number of Bedrooms</option>
                                            <?php foreach($this->filters['bedrooms'] as $row) { ?>
                                            <option value="<?= $row['b_name'] ?>"><?= $row['b_name'] ?></option> 
                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group ">
                                        <label for="price-tox">Type to search</label>
                                        <input type="text" class="form-control border" name="q" id="price-tox" style="max-height:50px;background:white" placeholder="ie type to search"> 
                                        </div>
                                    </div>
                                    
                                    
                                    <!-- <div class="col-12 d-flex flex-wrap gap-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="air-conditioning"
                                                id="air-con" name="features[]" checked>
                                            <label class="form-check-label" for="air-con">Air Conditioning</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="pool" id="pool-che"
                                                name="features[]" checked>
                                            <label class="form-check-label" for="pool-che">Pool</label>
                                        </div>
                                        
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="security"
                                                id="security-che" name="features[]" checked>
                                            <label class="form-check-label" for="security-che">Security</label>
                                        </div>
                                    </div> -->
                                    <div class="col-12 d-grid">
                                        <button type="submit" class="btn btn--base">Search</button>
                                    </div>
                                </div>
                            </form>

                        </div>

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
                                <h2>Become a Real Estate Agent</h2>
                                <p>We only work with the best companies around the globe</p>
                            </div>
                            <div class="button">
                                <a href="/login" class="btn btn--base"><i class="flaticon-user"></i> Register
                                    Now</a>
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