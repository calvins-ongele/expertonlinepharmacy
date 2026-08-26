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
                            <h2 class="breadcrumb__title"> Contact Us</h2>
                            <ul class="breadcrumb__list">
                                <li class="breadcrumb__item"><a href="index.html" class="breadcrumb__link"> <i
                                            class="las la-home"></i> Home</a> </li>
                                <li class="breadcrumb__item"><i class="fa-solid fa-angle-right"></i></li>
                                <li class="breadcrumb__item"> <span class="breadcrumb__item-text"> Contact us </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==================== Breadcrumb End Here ==================== -->
        <!--==========================  Contact Section Start  ==========================-->
        <section class="contact-section py-120">
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-start">
                            <div class="sub-title">Get in touch !</div>
                            <h2>Get in touch with us</h2>
                        </div>
                    </div>
                </div>
                <div class="row row-gap-4 justify-content-between mt-60">
                    <div class="col-lg-4">
                        <div class="d-grid row-gap-4">
                            <div class="contact-info-item">
                                <div class="icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div class="text">
                                    <h6>Our Office</h6>
                                    <p><?= $this->_company['c_address'] ?></p>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="icon">
                                    <i class="fa-solid fa-phone-volume"></i>
                                    <i class="fa-solid fa-phone-volume"></i>
                                </div>
                                <div class="text">
                                    <h6>Make A Call</h6>
                                    <p>Office: <a href="tel:<?= $this->_company['c_tel'] ?>"><?= $this->_company['c_tel'] ?></a></p> 
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="icon">
                                    <i class="fa-solid fa-envelope"></i>
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="text">
                                    <h6>Send Email</h6>
                                    <p><a href="mailto:<?= $this->_company['c_email'] ?>"><span  ><?= $this->_company['c_email'] ?></span></a></p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="contact-info-form">
                            <form id="contact-form" idx="contactus" action="/myapp/contactus"  method="post"
                                class="contact-info__form row row-gap-4">
                                <input name="csrf_token" value="<?= CSRF::get() ?>" type="hidden" />
                                <input name='action' class="   form-control" value='<?= $_GET['del'] ?? '' ?>'
                                <?= ($_GET['del']??"") ? 'readonly' : 'type="hidden"' ?> >
                                <input type='hidden' name='ref' value='<?php echo $_SERVER['HTTP_REFERER'] ?? 'null'; ?>'>

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name*"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="email" class="form-control" placeholder="Your Email / Phone*"
                                        required>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="subject" class="form-control"  value='<?php echo $_GET['c'] ?? '' ?>' placeholder="Your Subject*"
                                        required>
                                </div>
                                
                                <div class="col-md-12">
                                    <textarea name="message" class="form-control" placeholder="Message..." required
                                        rows="6"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn--base">
                                        Send Message
                                    </button>
                                </div>

                                <div class="feeb"></div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==========================  Contact Section End  ==========================-->
        <div class="contact__map">
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.9900011241984!2d36.9639813742356!3d-1.1675283988213032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f418f48a2ec27%3A0x2b5d8d1af93721b0!2sMarjo%20complex!5e0!3m2!1sen!2ske!4v1786527882868!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
        </div>
        <!--==========================  Call-to-action Section Start  ==========================-->
        <section class="call-to-action-section py-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div
                            class="d-flex flex-wrap gap-5 justify-content-center justify-content-md-between align-items-center">
                            <div class="text">
                                <h2>Become a Real Estate Agent</h2>
                                <p>We only work with the best companies around the region</p>
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