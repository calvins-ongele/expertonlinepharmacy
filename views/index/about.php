<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'public/includes/header.inc.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
     <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebPage",
            "name": "About Us | UK Trusted Online Pharmacy",
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
                "name": "About Us",
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


        <!-----------------------about------------------------------->
        <section class="container mt-2">
            <div>
                <div class="contentPageWrap aboutPageWrap">
                    <div class="row">
                        <div class="col-md-6 aboutLeft">
                            <h1>About Us</h1>
                            <div class="pageContent wysiwyg">
                                <p><?= $this->_company['c_name'] ?> is a Registered UK Online Pharmacy. We have been online since 2012.&nbsp;We focus on customer care and our aim is make your online pharmacy experience as simple as possible.</p>
                                <p>Our online doctor service&nbsp;offers treatments for a range of conditions, such as hair loss, erectile dysfunction, weight loss and more. You do not require a prescription, as our free online consultation allows us to assess suitability, before our doctor generates a prescription free of charge. This is then passed to the pharmacy team, who prepare and post your medication.</p>
                                <h3>&nbsp;</h3>
                                <h3>Complaints</h3>
                                <p>We always try our best to give every patient a&nbsp;great online experience. &nbsp;If something does go wrong however, we will do our utmost to put things right. Should you wish to raise any complaint, dissatisfaction, worry or concern, please contact our complaints team by email with the subject &lsquo;complaints team.&rsquo;&nbsp; Provide as much detail as possible such as your name, order number and a description of the issue.&nbsp; We have an escalation process which allows for a non-biased, independent review of any issue.</p>
                                <p>&nbsp;</p>
                            </div><!-- .pageContent  -->
                        </div>
                   
                        <div class="col-md-6 aboutRight">
                            <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Company Information #1
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        
       <div class="innerSection wysiwyg">
            <p><?= $this->_company['c_name'] ?> is owned by the UK registered company:&nbsp;Simple Online Healthcare Limited (company no:&nbsp;&nbsp;SC498329)</p>
            <p>Registered Office:</p>
            <p><strong>Address:</strong><br /><?= $this->_company['c_address'] ?><br />Tel : <?= $this->_company['c_tel'] ?><br />Email : <a href="mailto:<?= $this->_company['c_email'] ?>"  ><?= $this->_company['c_email'] ?></a></p>
            <p><strong>Pharmacy GPhC registration number:</strong><br /><a href="https://www.pharmacyregulation.org/registers/pharmacy/registrationnumber/9011287" target="_blank">9011287</a></p>
            <p><strong>Superintendent Pharmacist:</strong><br />Aamina Rafiq - GPhC number 2216332<br /><br /><strong>Responsible Pharmacist:</strong><br />Zahra Qureshi&nbsp;- GPhC number&nbsp;2216331</p>
        </div>

      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Our Prescribers #2
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        
      <div class="innerSection wysiwyg">
                                <p>All of our prescribers are UK based and registered with the relevant regulatory body.</p>
                                <p>Our doctors are <a href="https://www.gmc-uk.org/registration-and-licensing/the-medical-register">GMC</a> registered.<br />Our pharmacist prescribers are <a href="https://www.pharmacyregulation.org/registers/pharmacist">GPhC</a> registered.<br />Our nurse prescribers are <a href="https://www.nmc.org.uk/registration/search-the-register/">NMC</a> registered.</p>
                                <p>&nbsp;</p>
                                <p><span style="text-decoration: underline;">DOCTORS</span></p>
                                <p>Aniqah Ilyas - 7670761&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />Awais Alvi - 4574497&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />Avi Sharma -&nbsp;6077543<br />Sahira Dar -&nbsp;4705718<br />Shoaib Moughal -&nbsp;4704762</p>
                                <p>&nbsp;</p>
                                <p><span style="text-decoration: underline;">PHARMACISTS</span></p>
                                <p>Abdal Alvi -&nbsp;2059572 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />Abdullah Mistry -&nbsp;2078474<br />Ali Bashir - 2059852<br />Amal Osman -&nbsp;2205049<br />Ariana Leila Jahanfar -&nbsp;2231370<br />Craig Marsh -&nbsp;2070724<br />Danyal Ahmed -&nbsp;2222428<br />Daryoush Safavi -&nbsp;2208917<br />Lara Seymour -&nbsp;2219773<br />Leanne McAuley -&nbsp;2087307<br />Markie Dales -&nbsp;2213621<br />Nicola Hopewell -&nbsp;2222145<br />Rubina Ali -&nbsp;2221311<br />Sabeela Yasin -&nbsp;2085618<br />Sultana Khaliq -&nbsp;2080082<br />Syed Shah -&nbsp;2221087<br />Ubayd Ali -&nbsp;2219322<br />Zaynab Araim -&nbsp;2077623<br />Zeenah Araim -&nbsp;2077620</p>
                                <p>&nbsp;</p>
                                <p><span style="text-decoration: underline;">NURSES</span></p>
                                <p>Andrea Nagy -&nbsp;14D0189C<br />Jacqueline Brennan -&nbsp;07I1293S<br />Jason Smart -&nbsp;12A1007E<br />Justine Riley -&nbsp;05I0249E<br />Katie Taylor -&nbsp;98D0056W<br />Kerry-Anne Mitchell -&nbsp;11A0128S<br />Louise Purves -&nbsp;00J0100S<br />Naomi Garcia -&nbsp;95D0788E<br />Rebekah Parker -&nbsp;02I1881S<br />Sarah Hales -&nbsp;13E1415E<br />Sonia White -&nbsp;07I1272S<br />Susannah Russell -&nbsp;09B0097S<br />Theresa Deveney -&nbsp;90E0488S<br />Vicky Simpson -&nbsp;00H0155S</p>
                            </div>

      </div>
    </div>
  </div>

  
</div>

                         
                           
                          
                            
                        </div>
                    </div><!-- .contentWrap -->
                </div><!-- .contentPageWrap -->
            </div>
        </section>



    </main>
    <!-- ==================== Footer Start Here ==================== -->
    <?php require "public/includes/footer.inc.php" ?>
</body>

</html>