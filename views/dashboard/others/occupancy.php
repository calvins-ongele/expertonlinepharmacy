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
                        Buildings and how they are occupied

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Since</th>
                                        <th>Landlord</th>
                                        <th>Building Name</th>
                                        <th>Total Doors</th>
                                        <th>Occupied Doors</th>
                                        <th>Empty Doors</th>
                                        <th>Occupancy Rate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($this->buildings as $row) { ?>
                                        <tr>
                                            <td> <?php echo date('d.m.y', $row['building_date']); ?></td>
                                            <td><?php echo $row['buildingowner']   ?></td>
                                            <td><?php echo ($row['building_name'])   ?></td>
                                            <td><?php echo $row['building_no_doors'] ?></td>
                                            <td><?php echo $row['occupied'] ?></td>
                                            <td><?php echo $row['empty'] ?></td>
                                            <td><?php echo $row['rate'] ?>%</td>



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