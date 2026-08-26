<!DOCTYPE html>
<html lang="en">

<head>
    <?php require DASHBOARD . 'includes/header.inc.php' ?>
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

                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>My <b>Bookings
                                            <pre><?php //echo print_r($this->bookings); 
                                                    ?></pre>
                                        </b></h2>
                                </div>
                                <div class="col-sm-6">
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Phone</th>
                                    <th>House Title</th>
                                    <th>Book date</th>
                                    <th>Status</th>
                                    <th>Read more</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->bookings as $row) { ?>
                                    <tr>
                                        <td><?= "{$row['user_fname']} {$row['user_lname']}" ?></td>
                                        <td><?php echo $row['user_tel'] ?> </td>
                                        <td><?php echo $row['building_name']??"" ?> <a href="/?p=<?php echo $row['ih_url'] ?>" class='badge badge-primary' target='blank' title="View house" data-toggle="tooltip"> <i class="fa fa-eye"></i> </a> </td>
                                        <td><?php echo date('d/m/y', $row['bfv_date']) ?></td>

                                        <td class='badge <?php echo $row['bfv_status'] == 'pending' ? 'badge-warning' : 'badge-danger' ?>'><?php echo $row['bfv_status'] ?> </td>

                                        <td>
                                            <a href="/dashboard/others/booking/<?php echo $row['bfv_ID'] ?>" class='badge badge-success' title="View more" data-toggle="tooltip"> Read more </a>
                                        </td>




                                    </tr>
                                <?php } ?>


                            </tbody>
                        </table>
                        <!--<div class="clearfix hidden">-->
                        <!--    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>-->
                        <!--    <ul class="pagination">-->
                        <!--        <li class="page-item disabled"><a href="#">Previous</a></li>-->
                        <!--        <li class="page-item"><a href="#" class="page-link">1</a></li>-->
                        <!--        <li class="page-item"><a href="#" class="page-link">2</a></li>-->
                        <!--        <li class="page-item active"><a href="#" class="page-link">3</a></li>-->
                        <!--        <li class="page-item"><a href="#" class="page-link">4</a></li>-->
                        <!--        <li class="page-item"><a href="#" class="page-link">5</a></li>-->
                        <!--        <li class="page-item"><a href="#" class="page-link">Next</a></li>-->
                        <!--    </ul>-->
                        <!--</div>-->
                    </div>
                </div>

            </div>

        </div>





        <?php require DASHBOARD . 'includes/footer.inc.php' ?>


    </main>

</body>

</html>