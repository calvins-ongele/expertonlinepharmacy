<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'public/includes/header.inc.php' ?>
    
    <style>
        .main-header .main-navbar {
            background: hsl(var(--black));
            padding: 0;
        }

        .ractive {
            color: hsl(var(--base));

        }

        .star {
            font-size: 15px;
        }

        .rating-box {
            background-color: #f1f1f1;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .star-ratxing {
            color: gold;
        }

        .verified-badge {
            color: green;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
        }

        .verified-badge::before {
            content: "✔";
            margin-right: 5px;
        }
        @media screen and (min-width: 991px) {
            .desktop-hidden {
                display: none;
            }
        }
    </style>
    <?php 
                                     
        $imgs = array_merge(explode(',',$this->house['bp_files']),explode(',',$this->house['building_pics']));
        $price = empty($this->house['ih_price']) ? $this->house['bp_price'] : $this->house['ih_price'];
        $bname = $this->house['user_fname'];
        $someid = '';
    ?>
</head>

<body>

    <?php require "public/includes/navbar.inc.php" ?>
    <!-- ==================== Header End Here ==================== -->
    <main> 
      <!--==========================  Properties Section Start  ==========================-->
        <section class="properties-two-section py-120">
            <div class="container">
                <div class="row row-gap-5">
                    <div class="col-lg-8">
                        <div class="properties-details">
                            <div class="properties-details-slide swiper">
                                <div class="swiper-wrapper">
                                    <?php foreach($imgs as $img) { ?>
                                    <div class="swiper-slide">
                                        <figure class="image-effectd"
                                            style="<?= CustomFunctions::centerdImage("https://cdn.miziziclassifieds.com/images/waimaskan/$img") ?>"> 
                                        </figure>
                                    </div>
                                    <?php } ?>
                                    
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <h1 class="h3"><?= $this->house['building_name'] ?></h1>
                            <div class="location"><i class="fa-solid fa-location-dot"></i> <?= $this->house['building_estate'].' '.$this->house['building_town'] ?>
                            </div>
                            <!-- <ul class="properties-infos">
                                <li>

                                    <i class="flaticon-hallway"></i>
                                    4 Rooms
                                </li>
                                <li>
                                    <i class="fa-solid fa-bath"></i>
                                    4 Bathrooms
                                </li>
                                <li>
                                    <i class="flaticon-kitchen"></i>
                                    1 Kitchen
                                </li>
                                <li>
                                    <i class="fa-solid fa-ruler-combined"></i>
                                    1400 sqft
                                </li>
                            </ul>
                             -->
                                <div data-aos="fade-up" data-aos-duration="1400" class="property-info mt-5">
                                    <div class="row">
                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                            <h5>Property Details</h5>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <ul class="property-list list-unstyled">
                                                        <li><b>Property ID:</b> <?= $this->house['ih_url'] ?></li>
                                                        <li><b>Price:</b> KES <?= number_format($price) ?></li>
                                                        <li><b>Property Size:</b> <?= $this->house['ih_floor_area'] ?> Sqft</li>
                                                        <li><b>Bedrooms:</b> <?= $this->house['bp_bedroom_numbers'] ?></li>
                                                        <!--<li><b>Bathrooms:</b> 3</li>-->
                                                    </ul>
                                                </div>
                                                <div class="col-sm-6">
                                                    <ul class="property-list list-unstyled">
                                                       <li><b>Garage:</b> 1</li>
                                                       <!--<li><b>Garage Size:</b> 458 SqFt</li>-->
                                                       <!--<li><b>Year Built:</b> 2023-01-09</li>-->
                                                       <li><b>Property Type:</b> Full  Family Home</li>
                                                       <li><b>Property Status:</b> <?= $this->house['b_use'] ?> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h6 class="base">Additional details</h6>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                   <ul class="property-list list-unstyled mb-0">
                                                       <li><b>Deposit:</b> 30%</li>
                                                       <li><b>Pool Size:</b> Large Sqft</li>
                                                       <!--<li><b>Last remodel year:</b> 2000</li>-->
                                                    </ul>
                                                </div>
                                                <div class="col-sm-6">
                                                    <ul class="property-list list-unstyled mb-0">
                                                        <li><b>Amenities:</b> Pool</li>
                                                        <li><b>Additional Rooms:</b> Guest Bat</li>
                                                        <li><b>Equipment:</b> Grill - Gas - light</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                                <div data-aos="fade-up" data-aos-duration="1600" class="property-description">
                                    <div class="row">
                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                            <h5>Description</h5>
                                        </div>
                                        <div class="col-sm-9">
                          <?php echo $this->house['bp_description']  ?>
                                        </div>
                                    </div>
                                </div>

                                
                                <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                                <div data-aos="fade-up" data-aos-duration="2000" class="property-features">
                                    <div class="row">
                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                            <h5>Features</h5>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <ul class="property-list-style-2 list-unstyled mb-0">
                                                        <li>TV Cable</li>
                                                        <li>Air Conditioning</li>
                                                        <li>Barbeque</li>
                                                        <li>Gym</li>
                                                        <li>Swimming Pool</li>
                                                        <li>Laundry</li>
                                                        <li>Microwave</li>
                                                        <li>Outdoor Shower</li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-6">
                                                    <ul class="property-list-style-2 list-unstyled mb-0">
                                                        <li>Lawn</li>
                                                        <li>Refrigerator</li>
                                                        <li>Sauna</li>
                                                        <li>Washer</li>
                                                        <li>Dryer</li>
                                                        <li>WiFi</li>
                                                        <li>Window Coverings</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                                <div data-aos="fade-up" data-aos-duration="2200" class="property-address">
                                    <div class="row">
                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                            <h5>Address</h5>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <ul class="property-list list-unstyled mb-0">
                                                        <li><b>Address:</b> <?= $this->house['building_estate'] ?> </li>
                                                        <li><b>State:</b> <?= $this->house['building_town'] ?> </li>
                                                        <li><b>Country:</b> Kenya </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-6">
                                                    <!--<ul class="property-list list-unstyled mb-0">-->
                                                    <!--    <li><b>City:</b> Hang Dong</li>-->
                                                    <!--    <li><b>Zip:</b> 50230</li>-->
                                                    <!--    <li><b>Country:</b> Thailand</li>-->
                                                    <!--</ul>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php if(!empty($this->house['building_youtube'])) { ?>
                                <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                                <div data-aos="fade-up" data-aos-duration="2600" class="property-video">
                                    <div class="row">
                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                            <h5>Property Video</h5>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <?php if (!empty($this->house['building_youtube'])) { ?>
                                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?= $this->house['building_youtube'] ?>" 
                                                title="<?= $this->house['building_name'] ?> | <?= $this->house['building_estate'] ?> REAL ESTATE | <?= $price ?>+"
                                                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
   
                            <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                                <div data-aos="fade-up" data-aos-duration="2600" class="property-video">
                                    <div class="row">
                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                            <h5>Property Direction</h5>
                                        </div>
                                        <div class="col-sm-9">
                             <iframe src="https://maps.google.com/maps?q=<?php echo $this->house['building_estate'].' '.$this->house['building_town'] ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                        </div>
                                    </div>
                                </div>
                                        

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="properties-sidebar d-grid row-gap-4">
                            <div class="properties-price">
                                <h4 class="d-flex flex-between">Price: <span>KES <?= number_format($price) ?></span></h4>
                                <div class="base-bg">For Sale</div>
                                <!-- <ul>
                                    <li> Days on Hously <span>124 Days</span> </li>
                                    <li> Price per sq ft <span>$ 186</span></li>
                                    <li>Monthly Payment (estimate) <span>$ 1497/Monthly</span></li>
                                </ul>
                                <a href="contact.html" class="btn btn--base">Book Now </a> -->
                            </div>
                            <div class="team-contact">
                                <h5>Contact Anthony</h5>
                                <form action="#" class="mt-4">
                                    <div class="row row-gap-4">
                                        <div class="col-12">
                                            <input type="text" name="name" class="form-control" placeholder="Your Name"
                                                required="">
                                        </div>
                                        <div class="col-12">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Email Address" required="">
                                        </div>
                                        <div class="col-12">
                                            <input type="number" name="Number" class="form-control"
                                                placeholder="Phone Number" required="">
                                        </div>
                                        <div class="col-12">
                                            <textarea name="message" class="form-control" placeholder="Write a Message"
                                                rows="5" required=""></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn--base">Send a Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
                                <a href="/signup" class="btn btn--base"><i class="flaticon-user"></i> Register
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