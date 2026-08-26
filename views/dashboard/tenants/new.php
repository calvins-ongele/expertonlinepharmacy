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


                <div class="card mb-4">
                    <div class="card-header">
                        Your <?php echo $_GET['status'] ?? 'Active' ?> tenants
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Agreement</th>
                                        <th>Date In</th>
                                        <th>House</th>
                                        <th>Rating x/5</th>
                                        <th>Bill</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($this->tenants as $row) { ?>
                                        <tr>
                                            <td><?php echo $row['user_names']   ?> <a href="/dashboard/tenants/view?id=<?php echo $row['user_ID'] ?>"><i class="fa fa-eye"></i></a></td>
                                            <td><?php echo  $row['user_email']   ?></td>
                                            <td><a href='//seyari.co.ke/public/tenancy_agreements/<?php echo $row['t_tenancy_agreement'] ?>'>View agreement</a> </td>
                                            <td><?php echo date('d.M.y', $row['t_startdate']) ?></td>
                                            <td><?php echo $row['b_name'] . ' - ' . $row['building_name'] ?></td>
                                            <td><?php echo $row['user_avg_rating'] ?> stars</td>
                                            <td>
                                                <span class='newbill badge badge-warning cursor' rel='<?php echo $row['user_ID'] ?>'>Add a Bill</span>
                                            </td>
                                            <td>
                                                <?php $status = $_GET['status'] ?? 'Active';
                                                if ($status == 'Active') { ?>

                                                    <span class='ratetenant badge badge-primary cursor' rel='<?php echo $row['user_ID'] ?>'>Rate tenant</span>
                                                    <span class='finetenant badge badge-secondary cursor' rel='<?php echo $row['user_ID'] ?>'>Fine Tenant</span>
                                                    <span class='endtenancy badge badge-danger cursor' rel='<?php echo $row['t_ID'] ?>'>End Tenancy</span>
                                                <?php } ?>

                                            </td>




                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>





        <?php require DASHBOARD . 'includes/footer.inc.php' ?>


    </main>

</body>

</html>