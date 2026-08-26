<!DOCTYPE html>
<html lang="en">

<head>
    <?php require DASHBOARD . 'includes/header.inc.php' ?>
    
		<style>
			.liststars {
				list-style-type: none; 
			}
			.liststars li {
				display: inline-block;
				cursor: pointer;
				 
			}
			.liststars li {
				font-size: 14px;
			}
			.st_active {
				color: red;
			}
		</style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">

        <?php
        $pageid = 'property';

        require DASHBOARD . 'includes/sidebar.inc.php' ?>



        <div class="content-wrapper px-4 py-2">
            <div class="content-header">
            </div>

            <div class="container-xl">


                <div class="card mb-4">
                    <div class="card-header ">
                        <div class="">
                            <div class="no_style d-flex justify-content-start align-items-center">
                                <div  >
                                    <?php 
                                        $file = "public/assets/uploads/{$this->user['user_dp']}";
                                        if (!file_exists($file)) {
                                            $file = "public/assets/system/download.jpeg";
                                        }
                                    ?>
                                    <img height="50" width="60" src="/<?= $file  ?>" alt="<?= "{$this->user['user_fname']} {$this->user['user_lname']}" ?>"> 
                                </div>
                                <div>
                                    <h5>&nbsp; <?= "{$this->user['user_fname']} {$this->user['user_lname']}" ?></h5>
                                    <span>&nbsp;&nbsp; <?php echo $this->user['user_role']   ?></span>
                                </div>
                            </div>
                             
                            <p>User Since : <?php echo  date('D-M-Y', $this->user['user_datecreated']) ?> </p>

                        </div>




                    </div>
                    <div class="card-body">

                        <!--------------- ------------------->
                        <div class="row">

                            <div class="col-md-6">
                                <p>
                                    <bold>Email</bold>: <?php echo  $this->user['user_email']  ?>
                                </p>
                                <p>
                                    <bold>Phone Number</bold>: <?php echo $this->user['user_tel'] ?>
                                </p>
                                <p>
                                    <bold>Status</bold>: <?php echo $this->user['user_status'] ?>
                                </p>

                            </div>






                            <div class="col-md-12 ">
                                <div class="h3">
                                    <bold>Last 5 Ratings</bold>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Stars x/5</th>
                                                <th>Comment</th>
                                                <th>Rated by</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php foreach ($this->ratings as $row) { ?>
                                                <tr>
                                                    <td>
                                                        <ul class='liststars'>
                                                            <?php
                                                            $stars = $row['r_rates'];
                                                            $nostars = 5 - $row['r_rates'];;
                                                            for ($i = 0; $i < $stars; $i++)
                                                                echo "<li><i class='fa fa-star stars st_active'></i></li>";
                                                            for ($i = 0; $i < $nostars; $i++)
                                                                echo "<li><i class='fa fa-star stars '></i></li>";
                                                            ?>
                                                        </ul>
                                                    </td>
                                                    <td><?= htmlspecialchars($row['r_comment']) ?></td>
                                                    <td><?= "{$this->user['user_fname']} {$this->user['user_lname']}" ?></td>
                                                    <td><?php echo date('d-M-y', $row['r_date']) ?></td>


                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <div class="col-md-12 ">
                                <div class="h3">
                                    <bold>My Permanent Bills </bold>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Purpose</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php foreach ($this->bills as $row) { ?>
                                                <tr>
                                                    <td><?php echo $row['oc_purpose']   ?></td>
                                                    <td><?php echo $row['oc_amount'] ?></td>
                                                    <td><?php echo date('d-m-y', $row['oc_date']) ?></td>
                                                    <td>

                                                        <span class='removeBill badge badge-danger cursor' rel='<?php echo $row['oc_ID'] ?>'>Remove</span>
                                                    </td>


                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>



                        </div>


                        <div class="alert">

                        </div>

                    </div>
                </div>

            </div>

        </div>





        <?php require DASHBOARD . 'includes/footer.inc.php' ?>


    </main>

</body>

</html>