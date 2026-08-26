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
                                    <?php foreach (explode(',', $this->data['p_images']) as $img) {
                                        if (@file_get_contents("https://cdn.miziziclassifieds.com/images/classiefieds/$img") === FALSE) continue;

                                    ?>
                                        <div class="swiper-slide">
                                            <figure class="image-effectd"
                                                style="<?= CustomFunctions::centerdImage("https://cdn.miziziclassifieds.com/images/classiefieds/$img") ?>">

                                            </figure>
                                            <!-- <img src="https://cdn.miziziclassifieds.com/images/classiefieds/<?= $img ?>" 
                                        alt="<?= $this->data['p_title'] ?>"> -->
                                        </div>
                                    <?php } ?>

                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <h3><?= $this->data['p_title'] ?> | <?php $r = number_format($this->data['p_rating']);

                                                                for ($i = 1; $i <= 5; $i++) { ?>
                                    <i class='fa fa-star star <?= ($i <= $r) ? 'ractive' : '' ?> '></i>
                                <?php } ?>


                            </h3>

                            <div class="properties-price desktop-hidden">

                                <div class='  '>
                                    <h3>KES <?= isset($this->data['d_price']) ? number_format($this->data['d_price']) : number_format($this->data['p_price']) ?>
                                        <?php if (!isset($this->data['d_price'])) { ?><dbr>
                                                <h6 class='text-danger text-sm'>[Without Delivery Fee]</h6> <?php } else echo '<h6>'; ?>
                                            <a href='#nego' style='font-size:15px;color:initial;'><u>Chat with seller to get delivery fee or negotiate price?</u></a>
                                    </h3>
                                    <p style='font-size:14px'>
                                        Always pay with our paybill, the seller wont receive the money untill delivery is confirmed...
                                    </p>

                                    <a href='/checkout/<?= ($this->data['p_url']) ?>/<?= ($this->data['d_url'] ?? "") ?>' class='btn mt-1' style="background:hsl(var(--base))">Securey Pay the product Now</a>
                                    <a href='#ratings' style="color:hsl(var(--green))">View ratings</a>
                                </div>
                            </div>

                            <div class="location"><i class="fa-solid fa-location-dot"></i> <?= $this->data['p_county'] ?></div>
                            <div class='mt-2'>
                                <table class='table'>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p><?= $this->data['p_brand'] ?></p>
                                                <small>Brand</small>
                                            </td>
                                            <td>
                                                <p><?= $this->data['p_condition'] ?></p>
                                                <small>Condition</small>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr>

                            <h4 class="m-0">Details</h4>
                            <br>
                            <p><?= $this->data['p_desc'] ?></p>


                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="properties-sidebar d-grid row-gap-4">
                            <div class="properties-price">

                                <div class='  '>
                                    <h3>KES <?= isset($this->data['d_price']) ? number_format($this->data['d_price']) : number_format($this->data['p_price']) ?>
                                        <?php if (!isset($this->data['d_price'])) { ?><dbr>
                                                <h6 class='text-danger text-sm'>[Without Delivery Fee]</h6> <?php } else echo '<h6>'; ?>
                                            <a href='#nego' style='font-size:15px;color:initial;'><u>Chat with seller to get delivery fee or negotiate price?</u></a>
                                    </h3>
                                    <p style='font-size:14px'>
                                        Always pay with our paybill, the seller wont receive the money untill delivery is confirmed...
                                    </p>

                                    <a href='/checkout/<?= ($this->data['p_url']) ?>/<?= ($this->data['d_url'] ?? "") ?>' class='btn mt-1' style="background:hsl(var(--base))">Securey Pay the product Now</a>
                                    <a href='#ratings' style="color:hsl(var(--green))">View ratings</a>
                                </div>
                            </div>
                            <div class="properties-price">
                                <div id='nego' class=' '>

                                    <div class="introfeed d-flex" style="border:none; ">
                                        <div class="img">
                                            <img src="/public/assets/system/download.jpeg" class="avatar" alt="<?= $this->data['user_fname'] . ' ' . $this->data['user_lname'] ?>" style="height:60px;width:auto">
                                        </div>
                                        <div class="post">
                                            <a href="/market/sellers/<?= $this->data['p_url'] ?>" class=" "><?php echo $this->data['user_fname'] . ' ' . $this->data['user_lname'] ?> <br>
                                                <span style="color:initial;font-size:10px">Verified Profile </span>
                                            </a>
                                        </div>
                                    </div>

                                    <div>
                                        <?php if (Session::get('userid') == 'ffdfdfdfdfdfdf') { ?>
                                            <a href='https://wa.me/<?php echo $this->data['user_tel'] ?>' class='btn btn-outline-primary mt-2'><i class='fa fa-phone'></i> <?php echo $this->data['user_tel'] ?> </a><br>

                                        <?php } else if (1 == 3) { ?>
                                            <a href='?signin=true' class='btn btn-outline-primary mt-2'><i class='fa fa-phone'></i> Negotiate</a><br>
                                        <?php } ?>

                                        <a style="background:hsl(var(--base))"
                                            href='/checkout/chat/<?php echo $this->data['user_url'] ?>/<?php echo $this->data['p_url'] ?>/<?php echo Session::get('url') ?>' class='btn btn-outline-primary mt-2'><i class='fa fa-envelope'></i> Start Chat Now </a><br>

                                        <a href='/contact-us?type=abuse&s=<?= $this->data['user_url'] ?>' class='btn btn-outline-primary mt-2' style="background:hsl(var(--green))"><i class='fa fa-phone'></i> Report Abuse</a>

                                    </div>
                                </div>
                            </div>

                            <!---------------safety tips--------------->
                            <div class="properties-price">
                                <h3 class='text-center'>Safety Tips</h3>
                                <div class=''>
                                    <li>Pay through our paybill if unsure!</li>
                                    <li>Avoid paying in advance, even for delivery</li>
                                    <li>Meet with the seller at a safe public place</li>
                                    <li>Inspect the item and ensure it's exactly what you want</li>
                                    <li>Make sure that the packed item is the one you've inspected</li>
                                    <li>Only pay if you're satisfied</li>
                                </div>
                            </div>
                            <div class="properties-price">
                                <div class='card m-3 p-4 ' id='ratings'>
                                    <h4>Product reviews (<?php echo count($this->ratings) ?>) </h4>
                                    <div>
                                        <div class="containerx my-5d">
                                            <div class="row">
                                                <!-- Verified Ratings Section -->
                                                <?php $rt = number_format($this->data['p_rating']); ?>
                                                <div class="col-md-12">
                                                    <div class="rating-box">
                                                        <h5><?php echo $rt ?>/5</h5>
                                                        <div class="star-rating mb-2">

                                                            <?php for ($i = 1; $i <= 5; $i++) { ?>
                                                                <i class="fa fa-star <?php if ($i <= $rt) echo 'ractive'; ?> "></i>
                                                            <?php } ?>

                                                        </div>
                                                        <p><?php echo count($this->ratings) ?> verified ratings</p>
                                                    </div>
                                                </div>

                                                <!-- Product Reviews Section -->
                                                <div class="col-md-12">
                                                    <hr>
                                                    <?php foreach ($this->ratings as $row) { ?>
                                                        <div class="mb-3">
                                                            <div class="d-flex align-items-center mb-1">
                                                                <div class="star-rating">
                                                                    <?php $rt = number_format($row['r_rating']);
                                                                    for ($i = 1; $i <= 5; $i++) { ?>

                                                                        <i class="fa fa-star <?php if ($i <= $rt) echo 'ractive'; ?> "></i>
                                                                    <?php } ?>
                                                                </div>
                                                                <!--<span class="ms-2">very poor.</span>-->
                                                            </div>
                                                            <p>
                                                                <?php echo $row['r_comment'] ?>
                                                            </p>
                                                            <p class="text-muted" style='font-size:12px'><?php echo date('d-m-Y', $row['r_time']) ?> by <?php echo $row['user_fname'] ?></p>
                                                            <div class="verified-badge mt-n2" style='font-size:12px'>Verified Purchase</div>
                                                        </div>
                                                        <hr>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>



                            <div class="team-contact"> </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--==========================  Properties Section End  ==========================-->
        <!--==========================  Blog Section Start  ==========================-->
        <section class="blog-two-section py-120 section-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7">
                        <div class="section-title text-center">
                            <div class="sub-title top-reveal">Related Products</div>
                            <h5 class=" top-reveal">Customers who viewed this also viewed</h5>

                        </div>
                    </div>
                </div>
                <div class="row mt-60">
                    <div class="col-lg-12">
                        <div class="blog-slide-two swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($this->similar as $row) {
                                    $img = trim(explode(',', $row['p_images'])[0]);

                                    $tags = '';
                                    $j = 0;
                                    foreach (explode(',', $row['p_tags']) as $t) {
                                        $j++;
                                        if ($j == 4) break;
                                        $tags .= "<a href='/market/{$row['p_url']}'>$t</a>";
                                    }
                                ?>
                                    <div class="swiper-slide">
                                        <div class="blog-item">
                                            <div class="blog-item__img">
                                                <a href="/market/<?= $row['p_url'] ?>">
                                                <figure class="image-effectd" style="border-radius:10px 10px 0 0; <?= CustomFunctions::centerdImage("https://cdn.miziziclassifieds.com/images/classiefieds/$img") ?>">
                                                    <!-- <img src="https://cdn.miziziclassifieds.com/images/classiefieds/<?= $img ?>" loading="lazy" alt="properties image"
                                                    class="img-fluid card-img-top" style="height:260px!important;width:auto!important"> -->
                                                </figure>
                                                </a>
                                            </div>
                                            <div class="blog-item__content">
                                                <ul>
                                                    <li><i class="flaticon-user"></i> By: <span><a href="/market/sellers/<?= $row['user_url'] ?>"><?= $row['user_fname'] ?></a></span></li>
                                                    <li><i class="flaticon-calendar"></i> <?= CustomFunctions::timeago($row['p_date']) ?></li>
                                                </ul>
                                                <h4><a href="/market/<?= $row['p_url'] ?>"><?= $row['p_title'] ?></a></h4>

                                                <div class="read-more">
                                                    <a href="/market/<?= $row['p_url'] ?>">View More </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==========================  Blog Section End  ==========================-->
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