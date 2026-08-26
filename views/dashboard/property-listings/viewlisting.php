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
                                    <th>NOs</th>
                                    <th>Price/Rent</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->houses as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['building_name'] ?></td>
                                        <td><?php echo $row['b_name'] ?></td>
                                        <td><?php echo $row['bp_bedroom_numbers'] ?></td>
                                        <td data-toggle="tooltip" title='This price will not apply if you select a different amount on individual prices'><?php echo $row['bp_price'] ?><sup style='color:red;'>*</sup></td>


                                        <td>
                                            <a href="#" class="edithouse  badge badge-success" data='<?php echo json_encode($row) ?>' rel='<?php echo $row['bp_ID'] ?>' title="Edit House" data-toggle="tooltip"> <i class="fa fa-pencil"></i> </a>
                                        </td>
                                        <td>
                                            <a href="#" class="deleteHouse badge badge-danger " rel='<?php echo $row['bp_ID'] ?>' title="Delete" data-toggle="tooltip"> <i class="fa fa-trash"></i> </a>

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






        <!-- Main Modal -->
        <div id="editHouseModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0 ml-2"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class='alert'>
                        <form id='edithouseform'>
                            <input name='houseid' type='hidden' class='form-control houseid' value=''>

                            <input name='buildingid' type='hidden' class='form-control buildingid' value=''>

                            <div class='form-group'>
                                <label>Bedroom</label>
                                <select name='bedroom' class='form-control bedroomcl'>
                                    <?php foreach ($this->bedrooms as $row) { ?>
                                        <option value='<?php echo $row['b_ID']  ?>'><?php echo $row['b_name']  ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class='form-group'>
                                <label>How many of type selected above</label>
                                <input name='bedroom_number' class='form-control bedroom_numbercl' value=''>
                            </div>
                            <div class='form-group'>
                                <label>Price/Accommodation Fee</label>
                                <input name='price_rent' type='number' class='form-control price_rent' value=''>
                            </div>
                            <div class='form-group'>
                                <label>Description</label>
                                <textarea name='bp_description' class='form-control bp_description'></textarea>
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


        <script type="text/javascript">
            (function($) {

                $('.edithouse').click(function() {

                    let data = JSON.parse($(this).attr('data'));

                    $('.bedroomcl').val(data['bp_bedroom_fk']);
                    $('.bedroom_numbercl').val(data['bp_bedroom_numbers']);
                    $('.price_rent').val(data['bp_price']);
                    $('.bp_description').val(data['bp_description']);
                    $('.buildingid').val(data['bp_name_fk']);
                    $('.houseid').val(data['bp_ID']);

                    new bootstrap.Modal(document.getElementById('editHouseModal'), {
                        keyboard: false
                    }).toggle();
                });

                $('.deleteHouse').click(function() {
                    const _val = $(this).attr('rel');
                    Swal.fire({
                            text: "Are you sure? It will delete individual houses as well!! ",
                            icon: "warning",  
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, delete it!"
                        })
                        .then((ok) => {
                            if (ok.isConfirmed) {
                                let form_data = new FormData();
                                form_data.append('id', _val)
                                let feedback = _serv(form_data, 'delete_houses');
                                alert(feedback['msg']);
                                if (feedback['error'] == 'false') location.reload();

                            }
                        });
                });


                $('#edithouseform').submit(function() {
                    let feedback = _serv(new FormData(this), 'edithouse')
                    alert(feedback['msg']);
                    if (feedback['error'] == 'false') location.reload();


                });

                $('.close').click(function() {
                    $('.modal').modal('hide');
                });


                function _serv(form_data, url) {
                    let data;
                    $.ajax({
                        url: '/myapp/' + url,
                        type: 'post',
                        async: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        dataType: 'json',
                        success: function(data1) {
                            data = data1;
                        }
                    });

                    return data;
                }



                "use strict";

                //Show Success Message

                //Show Single Error Message



            })(jQuery);
        </script>
        <!-- Custom JS -->

    </main>

</body>

</html>