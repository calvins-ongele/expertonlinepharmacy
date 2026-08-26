<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'public/includes/header.inc.php' ?>
    <style>
        .cat {
            padding: 15px;
        }
        .cat img {
            height: 40px;
            width: auto;
        }
    </style>
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
                            <h2 class="breadcrumb__title"> Product Categories</h2>
                            <ul class="breadcrumb__list">
                                <li class="breadcrumb__item"><a href="/" class="breadcrumb__link"> <i
                                            class="las la-home"></i> Home</a> </li>
                                <li class="breadcrumb__item"><i class="fa-solid fa-angle-right"></i></li>
                                <li class="breadcrumb__item"> <span class="breadcrumb__item-text"> Product Categories </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==================== Breadcrumb Start Here ==================== -->
        <section class="properties-two-section py-30">
            <div class="containers">
                <div class="row">
                    <div class="col-md-2"> </div>
                    <div class="col-md-8">
                        <div class=" mt-3 mb-1 card-team">
                            <!------------------>
                            <?php for ($i = 0; $i < count($this->categories); $i += 2) { ?>
                                <div class="row  ">
                                    <div class="col-md-6 cat"><a href="/market?category=<?= $this->categories[$i]['cat_name'] ?>"
                                    >
                                    <img src="//cdn.miziziclassifieds.com/images/classiefieds/<?= $this->categories[$i]['cat_img'] ?>" />
                                    <?= $this->categories[$i]['cat_name'] ?></a></div>
                                    
                                    <div class="col-md-6 cat"><a href="/market?category=<?= $this->categories[$i + 1]['cat_name'] ?>"
                                    >
                                    <img src="//cdn.miziziclassifieds.com/images/classiefieds/<?= $this->categories[$i+1]['cat_img'] ?>" />
                                    <?= $this->categories[$i + 1]['cat_name'] ?></a></div>
</div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <!-- ==================== Footer Start Here ==================== -->
    <?php require "public/includes/footer.inc.php" ?>
</body>

</html>