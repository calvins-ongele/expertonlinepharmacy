<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'public/includes/header.inc.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"  > 

<script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebPage",
            "name": "Contact Us | <?= $this->_company['c_name'] ?> ",
            "description": "Explore clinically-proven weight loss treatments including Mounjaro and Wegovy. Clinician-led service with discreet delivery.",
            "url": "https://www.<?= $_SERVER['SERVER_NAME'] ?>/",
            "dateModified": "2026-01-26"
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "Contact Us",
                "item": "https://www.<?= $_SERVER['SERVER_NAME'] ?>/"
            }]
        }
    </script>
</head>

<body>

    <?php require "public/includes/navbar.inc.php" ?>
    <!-- ==================== Header End Here ==================== -->
    <main>

     <!-- ==================== Breadcrumb Start Here ==================== -->
        <section class="breadcrumb py-120 bg-img" data-background-image="<?= $this->_company['breadcrumb_bg'] ?>">
            <div class="container">
                 
            </div>
        </section>
        <!-- ==================== Breadcrumb End Here ==================== -->
        <!--==========================  Contact Section Start  ==========================-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
          
        <section class="contact-section py-120">
            <div class="container ">
                <h3 class="my-3">Please reach out to us in case of anything</h3>
               
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
                                    <button type="submit" class="btn btn-primary">
                                        Send Message
                                    </button>
                                </div>

                                <div class="feeb"></div> 
                            </form>
                        </div>
                   
            </div>
        </section>
              
            </div>
        </div>
    
        
    </main>
    <!-- ==================== Footer Start Here ==================== -->
    <?php require "public/includes/footer.inc.php" ?>
</body>

</html>