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
                            <h1 class="breadcrumb__title h2"> <?= htmlspecialchars("{$this->data['products'][0]['user_fname']} {$this->data['products'][0]['user_lname']}'s Product Profile") ?></h1>
                            <ul class="breadcrumb__list">
                                <li class="breadcrumb__item"><a href="/" class="breadcrumb__link"> <i
                                            class="las la-home"></i> Home</a> </li>
                                <li class="breadcrumb__item"><i class="fa-solid fa-angle-right"></i></li>
                                <li class="breadcrumb__item"> <span class="breadcrumb__item-text"> Seller's Profile </span>
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
                    <div class="col-lg-10">

                        <div class="team-abut mt-4 pt-2">
                            <h4 class="mb-4">About <?= htmlspecialchars("{$this->data['products'][0]['user_fname']} {$this->data['products'][0]['user_lname']}'s Profile") ?></h4>
                            <p><?= htmlspecialchars("{$this->data['products'][0]['user_about']}") ?></p>
                        </div>
                        <div class="my-listing-content mt-60">
                            <h4>My Listings</h4>
                            <div class="row row-gap-4">

                                <?php foreach ($this->data['products'] as $row) {
                                    $img = trim(explode(',', $row['p_images'])[0]);

                                    $tags = '';
                                    $j = 0;
                                    foreach (explode(',', $row['p_tags']) as $t) {
                                        $t = htmlspecialchars($t);
                                        $j++;
                                        if ($j == 4) break;
                                        $tags .= "<a href='/market/{$row['p_url']}'>$t</a>";
                                    }
                                ?>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="properties-item top-reveal">
                                            <div class="properties-item__images">
                                                <a href="/market/<?= htmlspecialchars($row['p_url']) ?>">
                                                    <figure class="image-effect" style="border-radius:10px 10px 0 0; <?= CustomFunctions::centerdImage("https://cdn.miziziclassifieds.com/images/classiefieds/$img") ?>">
                                                        <!-- <img src="assets/images/properties/card6.jpg"
                                                        alt="properties image" class="img-fluid"> -->
                                                    </figure>
                                                </a>
                                                <div class="features-tag">
                                                    <?= ($tags) ?>
                                                </div>
                                            </div>
                                            <div class="properties-item__info">
                                                <ul class="properties-address">
                                                    <li>
                                                        <h5><a href="/market/<?= htmlspecialchars($row['p_url']) ?>"><?= htmlspecialchars($row['p_title']) ?></a>
                                                        </h5>
                                                    </li>
                                                    <li>
                                                        <h4>KES <?= htmlspecialchars(number_format($row['p_price'])) ?></h4>
                                                    </li>
                                                </ul>
                                                <hr>
                                                <div class="read-more">
                                                    <a href="/market/<?= htmlspecialchars($row['p_url']) ?>" style="color: hsl(var(--base));">View More </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>

                                <div class="col-12">
                                    <nav>
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
                                    <div class="view-all text-center">
                                        <a class="btn btn--base" href="/market">View All Products <i
                                                class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <!--
                        <div class="team-contact">
                            <h5>Contact Anthony Martinez</h5>
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
                        </div>-->
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