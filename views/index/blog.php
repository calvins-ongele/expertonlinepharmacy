<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'public/includes/header.inc.php' ?>
    <?php if (   $this->post  ) { ?>
          
            <?php
                $img = $this->data[0]['b_img'];
                if (@file_get_contents("https://cdn.miziziclassifieds.com/images/classiefieds/$img") == false) 
                    $img = 'avatardefault_92824.webp';
            
            ?>
    
        <meta name='description' content="<?php echo CustomFunctions::trimTitle(strip_tags($this->data[0]['b_desc']),70) ?>">
        <meta property='og:description' content="<?php echo CustomFunctions::trimTitle(strip_tags($this->data[0]['b_desc']),70) ?>">
        <meta property='og:image' content='https://cdn.miziziclassifieds.com/images/classiefieds/<?php echo $img ?>'>
        <meta property='og:image:width' content="<?php echo getimagesize("https://cdn.miziziclassifieds.com/images/classiefieds/$img")[0] ?>">
        <meta property='og:image:height' content="<?php echo getimagesize("https://cdn.miziziclassifieds.com/images/classiefieds/$img")[1] ?>">
    <?php } ?>
</head>

<body>

    <?php require "public/includes/navbar.inc.php" ?>
	  <style>
      .navbar-brand h2{
          font-size:35px;
          margin-top:2px;
      }
  </style>
   <!-- Preloader -->
    <div id="fakeloader"></div>
	
  
	<style type="text/css">
	.item.creditbanner{
		position: relative;
	}
	.banner-content{
		position: absolute;
	    top: 45%;
	    left: 9%;
	    background-color: #fff;
	    padding: 30px 50px 30px 10px;
	    box-shadow: 0 0 23px -5px #000;
	}
	.banner-content h3{
		color: #14261c;
	    font-size: 28px;
	    text-transform: uppercase;
	    margin-bottom: 15px;
	    font-weight: bold;
	}
	.banner-content p{
		color: #333;
    	font-size: 20px;
    	margin-bottom: 0;
	}
	.cardWr.row{
		box-shadow: 0 0 15px -3px #000;
	    margin: 60px 0;
	    border-radius: 0;
	}
	.single-bolg.hover01 a:hover .blog-content{
		color: #2AC93E;
		transition: all .5s ease 0s;
	}
	.cardWr .col-sm-8{
		padding: 30px;
	}
	.cardWr .col-sm-4{
		padding: 40px 30px 30px;
	}
	.cardWr .col-sm-4{
		background-color: #14261c;
		color: #fff;
	}
	.cardWr .col-sm-4 .col-sm-12{
		padding:0;
	}
	.cardWr .col-sm-12 p{
		margin: 8px 0 15px;
    	font-size: 18px;
	}
	.cardWr .col-sm-12 h2{
		font-size: 22px;
	    font-weight: bold;
	    color: #14261c;
	    margin-bottom: 17px;
	    margin-top: 15px;
	    text-transform: uppercase;
	}
	.inner-card-wr .fa.fa-check{
		margin-right: 10px;
	}
	.cardWr .col-sm-12 ul, .inner-card-wr ul{
		padding-left: 0;
	}
	.inner-card-wr li {
	    font-weight: bold;
	}
	.inner-card-wr ul p {
	    margin-left: 29px;
	    margin-bottom: 18px;
	}
	.card-single-wr h2{
		font-size: 30px;
	    position: relative;
	    margin-left: 20px;
	    margin-bottom: 30px;
	    color: #14261c;
	}
	.card-single-wr h2::before {
	    position: absolute;
	    left: -25px;
	    top: 0;
	    width: 5px;
	    height: 32px;
	    background-color: #2AC93E;
	    content: '';
	}
	.inner-card-wr h3{
		margin-bottom: 23px;
	    font-size: 24px;
	    margin-top: 40px;
	    font-weight: bold;
	    color: #2AC93E;
	}
	.cardWr .col-sm-12 li, .inner-card-wr li{
		display: block;
		margin-bottom: 14px;
	}
	.card-single-wr {
	    border-top: 1px solid #14261c;
	    padding: 45px 0 22px;
	}
	.inner-card-wr p a{
		color: #14261c;
		text-decoration: underline;
	}
	.firstspan{
		width: 4%;
		display: inline-block;
		vertical-align: top;
	}
	.secondspan{
		display: inline-block;
		width: 90%;
		vertical-align: top;
	}
	.rightwr .col-sm-12 p{
		font-size: 20px;
	    line-height: 30px;
	    margin-bottom: 20px;
	}
	.col-sm-12.variableper{
		margin-top: 10px;
	}
	p span{
		display: block;
    	font-size: 16px;
	}
	.readmoreWr {
		text-align: left;
	    margin: 20px 0 20px;
	    padding-left: 15px;
	}
	.fa.fa-info-circle{
		margin-right: 10px; 
	}
	i.fa.fa-check {
	    color: #14261c;
	    font-size: 19px;
	}
	.inner-card-wr.lowerwr ul {
	    margin: 5px 0;
	}
	i.fa.fa-download {
	    margin-right: 10px;
	    color: #14261c;
	}
	.inner-card-wr.lowerwr li {
	    font-weight: normal;
	}
	.inner-card-wr.lowerwr li a{
		color: #14261c;
	}
	.inner-card-wr.lowerwr li a:hover{
		color: #2AC93E;
	}
	.toggleclass{
		color: #333;
	    font-size: 18px;
	    font-weight: bold;
	    text-decoration: underline;
	    margin-bottom: 25px;
	    display: inline-block;
	}
	.toggleclass:hover{
		text-decoration: underline;
	}
	.logonwr{
		margin-bottom: 35px;
	}
	.collapse h3 a{
		color: #14261c;
	}
	.business-wr{
		padding:0;
		margin-top: 40px;
	}
	.blog-content {
	    font-size: 25px;
	    margin-top: 15px;
	    text-align: left;
	    margin-bottom: 22px;
	    min-height: auto;
	}
	.single-bolg.hover01{
		margin-top: 0;
	}
	#demo1 .col-sm-6 h3{
		margin-top: 0;
	}
	.anchorlink a{
		color: #fff;
		text-decoration: underline;
	}
	.card-single-wr1{
		margin-bottom: 30px;
	}
</style>
    <!-- ==================== Header End Here ==================== -->
    <main>
        
     <!-- ==================== Breadcrumb Start Here ==================== -->
        <section class="breadcrumb py-120 bg-img" data-background-image="<?= ( $this->post ) ? "https://cdn.miziziclassifieds.com/images/classiefieds/{$this->data[0]['b_img']}" : $this->_company['breadcrumb_bg'] ?>">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="breadcrumb__wrapper">
                            <h1 class="breadcrumb__title"><?php echo ($this->post)? $this->data[0]['b_title'] : "Blogs & News" ?> </h1>
							<?php if ($this->post) { ?>
								<ul class="breadcrumb__blog-list">
									<li><?= $this->data[0]['user_fname'] ?></li>
									<li>0 Comments </li>
									<li><?= date('M d, Y', $this->data[0]['b_date']) ?></li>
								</ul>
							<?php } else { ?>
                            <ul class="breadcrumb__list">
                                <li class="breadcrumb__item"><a href="index.html" class="breadcrumb__link"> <i
                                            class="las la-home"></i> Home</a> </li>
                                <li class="breadcrumb__item"><i class="fa-solid fa-angle-right"></i></li>
                                <li class="breadcrumb__item"> <span class="breadcrumb__item-text"> Blogs </span>
                                </li>
                            </ul>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     <!-- ==================== Breadcrumb Start Here ==================== -->

	 <div class="card-detail-wr">
	<div class="container">
		<div class="card-single-wr1">
			<div class="business-wr">
				<div class="container">
				    <?php if ( $this->post ) { ?>
				        <div class="row">
				            <div class='col-md-2'></div>
				            <div class='col-md-8'>
				                <div class=''>
				                    <!-- <h1><?php echo $this->data[0]['b_title'] ?></h1>
				                    <img src='https://cdn.miziziclassifieds.com/images/classiefieds/<?php echo $this->data[0]['b_img'] ?>' >
				                     -->
									<div>
				                        <?php echo $this->data[0]['b_desc'] ?>
				                    </div>
				                </div>
				            </div>
				            <div class='col-md-2'></div>
				        </div>
				    <?php } else { ?>
					<section class="blog-two-section blog-item-background py-120x">
            		<div class="container">
					<div class="row row-gap-4 justify-content-centerx">
					    <?php  foreach($this->data['blog'] as $row) { ?>
						 <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="blog-item">
                            <div class="blog-item__img">
                                <figure class="image-effect" onclick="location.href='/content/blog/<?php echo $row['b_url'] ?>"
								style=" <?= CustomFunctions::centerdImage("https://cdn.miziziclassifieds.com/images/classiefieds/{$row['b_img']}") ?>">
                                    <!-- <img src="https://cdn.miziziclassifieds.com/images/classiefieds/<?= $row['b_img'] ?>" alt="<?= $row['b_title'] ?>" class="img-fluid"> -->
                                </figure>
                            </div>
                            <div class="blog-item__content">
                                <ul>
                                    <li><i class="flaticon-user"></i> By: <?= $row['user_fname'] ?></li>
                                    <li><i class="flaticon-calendar"></i> <?= date('M d, Y',$row['b_date']) ?></li>
                                </ul>
                                <h4><a href="/content/blog/<?= $row['b_url'] ?>"><?= substr($row['b_title'],0, 150) ?>... </a></h4>

                                <div class="read-more">
                                    <a href="/content/blog/<?= $row['b_url'] ?>">Read More </a>
                                </div>
                            </div>
                        </div>
                    </div>

						 
						<?php } ?>


	    <?php if ($this->post) {} else { ?>
		<div class="col-12">
		<nav>
			<ul class="pagination"   >
				<?php
					$currentPage = $_GET['pg'] ?? 1; 
					$totalPerPage = $this->_company['user_loop_sequence']?? 24;
					$totalCount = $this->data['count'] ?? 1;

					$possiblePages = false;
					$next = 0;
					if ( ($totalPerPage * $currentPage) < $totalCount) {
						$possiblePages = true;
						$next = $currentPage + 1;
					}
				
					if ($currentPage > 1) {
				?>
				<li class="page-item"><a class="page-link" href="<?= CustomFunctions::formatDynamicUrl('pg', ($currentPage - 1)) ?>">Previous</a></li>
				<?php } ?>
				<?php for($i = 1; $i < ceil($totalCount/$totalPerPage)+1; $i++ ) { ?>
				<li class="page-item <?= ($currentPage == $i)?'active':'' ?>"><a class="page-link" href="<?= CustomFunctions::formatDynamicUrl('pg', $i) ?>"><?= $i ?></a></li>
				<?php } if ($possiblePages) { ?> 
				<li class="page-item"><a class="page-link" href="<?= CustomFunctions::formatDynamicUrl('pg', $next) ?>">Next</a></li>
				<?php } ?>
			</ul>
		</nav>
	</div>
	<?php } ?>
			
					
					</div>
					</div>
					</section>
					
					<?php } ?>
				</div>
			</div>
		</div>

	</div>
</div>

        
    </main>
    <!-- ==================== Footer Start Here ==================== -->
    <?php require "public/includes/footer.inc.php" ?>
</body>

</html>