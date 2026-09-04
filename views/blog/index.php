<!DOCTYPE html>
<html lang="en" data-astro-cid-sckkx6r4>

<head>
    <?php require 'public/includes/header.inc.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"  >

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebPage",
            "name": "<?= $this->title ?>",
            "description": "Explore clinically-proven weight loss treatments including Mounjaro and Wegovy. Clinician-led service with discreet delivery.",
            "url": "https://www.<?= $_SERVER['SERVER_NAME'] ?>/",
            "dateModified": "2026-05-26"
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "https://www.<?= $_SERVER['SERVER_NAME'] ?>/"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "<?= $this->title ?>",
                "item": "https://www.<?= $_SERVER['SERVER_NAME'] ?><?= $_SERVER['REQUEST_URI'] ?>"
            }
            ]
        }
    </script>
</head>

<body data-page-type="landing" data-astro-cid-sckkx6r4>  
    
   <?php  require 'public/includes/navbar.inc.php' ?>

    
    <main>
        <section class="hero-placeholder" data-component="hero" data-astro-cid-d257t26o>
            <div class="hero-placeholder__inner" data-astro-cid-d257t26o>
                <div class="hero-placeholder__body" data-astro-cid-d257t26o>

<!-------------------------------------------->
<?php if (!empty($_GET['category'])) { ?>
 <h5 class='h2 text-center mt-3'><?= $this->data['blog'][0]['category_title']??"" ?> </h5>
<?php } else { ?> 
 <h5 class='h2 text-center mt-3'>Blog </h5>
 <?php  } ?>
    <pre>
        <?php //print_r($this->data) ?>
    </pre>
        
        <div class='container'>
            <div class='row'>
                <?php foreach($this->data['blog'] as $row) { ?>
                <div class='col-md-4 '>
                    <div class="card">
                        
                    <div class='alert'>
                        <img class='card-img-top' src='/<?= $row['image'] ?>' style="height: 200px;  ">
                        <div class='card-body'>
                            <h5 class='card-heading'><?= substr(strip_tags($row['title']), 0, 50) ?></h5>
                            <p><?= substr(strip_tags($row['content']), 0, 100) ?>...</p>
                            <a href='/content/<?= $row['slug'] ?>' class='card-heading'>Read more</a>
                        </div>
                    </div>
                    </div>
                </div>
                <?php } ?>
                
                
                 
            </div>
        </div>

        <div class="containerx" >
            
                <hr>
                    <div class=" ">
                        <br><br>
                        <nav>
                            <ul class="pagination">
                                <?php
                                $currentPage = $_GET['pg'] ?? 1;
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
                                    <li class="page-item">
                                        <a class="page-link" href="<?= CustomFunctions::formatDynamicUrl('pg', ($currentPage - 1)) ?>">Previous</a>
                                </li>
                                <?php } ?>
                                <?php for ($i = 1; $i < ceil($totalCount / $totalPerPage) + 1; $i++) { ?>
                                    <li class="page-item <?= ($currentPage == $i) ? 'active' : '' ?>">
                                        <a class="page-link" href="<?= CustomFunctions::formatDynamicUrl('pg', $i) ?>"><?= $i ?></a>
                                    </li>
                                <?php }
                                if ($possiblePages) { ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?= CustomFunctions::formatDynamicUrl('pg', $next) ?>">Next</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                     
        </div>
 
<!------------------------------------------------------------>

                     
                </div>
               
            </div>
        </section>
      
         
    </main>
 
   

    <?php require 'public/includes/footer.inc.php' ?>
</body>

</html>