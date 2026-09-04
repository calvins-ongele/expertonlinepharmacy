<!DOCTYPE html>
<html lang="en">

<head>
    <?php  require 'public/includes/header.inc.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"  >

    <?php 
    $imageLink = "https://{$_SERVER['SERVER_NAME']}/{$this->blog[0]['image']}";
    $sizes = @(getimagesize( $this->blog[0]['image'] ));
    $canonical = "https://{$_SERVER['SERVER_NAME']}/content/{$this->blog[0]['slug']}";
 
    ?>
 
    <meta property='author' content='<?= $this->_company['c_name'] ?>'>
    <meta name='description' content="<?= $this->blog[0]['meta'] ?>">
    <meta property='og:description' content="<?= $this->blog[0]['meta'] ?>">
    <meta property='og:image' content='<?= $imageLink ?>'>
    <meta property='og:image:width' content="<?= $sizes[0]??0 ?>">
    <meta property='og:image:height' content="<?= $sizes[1]??0 ?>">
    <meta property='og:title' content="<?= $this->blog[0]['title'] ?>">
    <meta property='og:site_name' content='<?= $this->_company['c_name'] ?>'>
    <meta property='og:url' content='<?=  $canonical ?>'>
    <meta property='article:published_time' content='<?= $this->blog[0]['created_at'] ?>'> 
    <link rel='canonical'   href='<?=  $canonical ?>'/>
    <meta property="og:type" content="Article.Blog News" />
       
        
    <script type="application/ld+json"> {
        "@context": "http://schema.org",
        "@type": "Article",
        "mainEntityOfPage": "<?= $canonical ?>",
        "headline": "<?= $this->blog[0]['title'] ?>",
        "description": "<?= $this->blog[0]['meta'] ?>",
        "datePublished": "<?= $this->blog[0]['created_at'] ?>",  "dateModified": "<?= $this->blog[0]['updated_at'] ?>",   
        "name":"<?= $this->blog[0]['title'] ?>",
        "image": {
                "@type": "ImageObject", 
                "url": "<?= $imageLink ?>",
                "height": "<?= $sizes[1]??0 ?>",
                "width": "<?= $sizes[0]??0 ?>"
            },
            "author": {
                "@type": "Person",
                "name": "John B.",
                "url": "https://twitter.com/#"
            },    
            "publisher": {
            "@type": "Organization",
            "name": "<?= $this->_company['c_name'] ?>",
            "url": "https://<?= $_SERVER['SERVER_NAME'] ?>",
            "logo": {
                "@type": "ImageObject",
                "url": "https://<?= $_SERVER['SERVER_NAME'] ?>/public/assets/uploads/<?= $this->_company['c_logo'] ?>"
            },
            "sameAs": []
        }
    } 
    </script>

</head> 

<body> 

    <header class="header">

        <?php  require 'public/includes/navbar.inc.php'; ?>
       
    </header>

    <main class="main"> 
        
        <h5 class='h2 text-center mt-4'><?= $this->blog[0]['title'] ?> </h5>
        
        <div class='container'>
            
               
                    <div class='alert card'>
                        <img class='card-img-top' src='/<?= $this->blog[0]['image'] ?>'
                        style="height:240px">
                        <div class='card-body'>
                            <h3 class='card-heading'><?= $this->blog[0]['title'] ?></h3>
                            <p><?=  $this->blog[0]['content']  ?></p>
                            
                        </div>
                    </div>
            
        </div>
 

    </main>

<br>


    <?php require 'public/includes/footer.inc.php'; ?>
</body>

</html>