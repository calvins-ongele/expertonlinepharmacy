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
                                    <h2>My <b>Listings</b></h2>
                                </div>
                                <div class="col-sm-6">
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th> Building </th>
                                    <th>Bedrooms</th>
                                    <th>Door Number</th>
                                    <th>Occupied</th>
                                    <th>Price/Rent</th>
                                    <th>Floor area</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->idvhouse as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['building_name'] ?></td>
                                        <td><?php echo $row['b_name'] ?></td>
                                        <td><?php echo $row['ih_house_door_no'] ?></td>
                                        <td><?php echo $row['ih_occupied'] == 1 ? 'Yes' : 'No' ?></td>
                                        <td title="This price will apply" data-toggle="tooltip"><?php echo empty($row['ih_price']) ? $row['bp_price'] : $row['ih_price'] ?><sup style='color:red;'>*</sup></td>
                                        <td><?php echo empty($row['ih_floor_area']) ? $row['bp_floor_area'] : $row['ih_floor_area'] ?></td>


                                        <td>
                                            <a href="#" class="edithouse  badge badge-success" data='<?php echo json_encode($row) ?>' rel='<?php echo $row['ih_ID'] ?>' title="Edit House" data-toggle="tooltip"> <i class="fa fa-pencil"></i> </a>
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
            <!----------------------------->

        </div>

        </div>






        <!-- Main Modal -->
        <div id="editHouseModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0 ml-2"></h5>
                        <button type="button" class="close closebtnmodal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class='alert'>
                        <form id='edithouseform'>
                            <input name='houseid' type='hidden' class='form-control houseid' value=''>


                            <div class='form-group'>
                                <label>Price/Accommodation Fees per day</label>
                                <input name='price' class='form-control pricecl' value=''>

                            </div>
                            <div class='form-group'>
                                <label>Floor Area</label>
                                <input name='floorarea' class='form-control floorarea' value=''>
                            </div>
                            <div class='form-group'>
                                <label>Floor Number</label>
                                <input name='floornumber' class='form-control floornumber' value=''>
                            </div>
                            <div class='form-group'>
                                <label>Door Number</label>
                                <input name='doornumber' type='text' class='form-control doornumber' value=''>
                            </div>
                            <div class='form-group'>
                                <label>Occupied?</label>
                                <select name='occupied' type='number' class='form-control occupiedcl' value=''>
                                    <option value='0'>Not Occupied</option>
                                    <option value='1'>Occupied</option>
                                </select>
                            </div>

                            <div class='form-group'>
                                <button type='submit' class='btn btn-small btn-primary btn-submit  '>Submit</button>
                            </div>
                        </form>
                    </div>

                    <div class="alert alert-danger d-none mx-3 mt-3 mb-0"></div>
                    <div class="alert alert-primary d-none mx-3 mt-3 mb-0"></div>
                    <div class="modal-body overflow-hidden"></div>

                </div>
            </div>
        </div>


        <?php require DASHBOARD . 'includes/footer.inc.php' ?>


    </main>

</body>

</html>