<!DOCTYPE html>
<html lang="en">

<head>
    <?php require DASHBOARD . 'includes/header.inc.php' ?>
    <style>
			.cursor {cursor: pointer;}
			.no_style {
				list-style-type: none!important;
			}

			.inline .no_style li  {
				display: inline-block;
			}
			.border_blend {
			    border-color: #c38c1d;
			}
			.border_blend a {
			   color: #c38c1d; 
			}
			.btn_blend{background:#c38c1d;color:white;}
			.btn_blend:hover{border-color:grey;color:black;}
		</style>


		
 		<style>
			.liststars {
				list-style-type: none; 
			}
			.liststars li {
				display: inline-block;
				cursor: pointer;
				padding: 7px;
			}
			.liststars li {
				font-size: 18px;
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

                <div id="newbillModal" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content alert">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0 ml-2"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="alert">
                                <form action="#" id="newbillform" autocomplete="off">
                                    <div class="form-group">
                                        <small class='text-danger'>This bill applies only to the selected tenant every month ie extra parking fee that others don't have</small>

                                        <input type="hidden" name="id" class="form-control eid "> <br>

                                        <label for="">New Bill Purpose</label>
                                        <input type="text" name="purpose" class="form-control " placeholder="ie parking fee"><br>
                                        <label for="">Amount</label>
                                        <input type="number" name="amount" class="form-control  " placeholder="eg 4000"><br>
                                        <button type="submit" class="form-control btn-primary btn-submit">Submit</button>

                                    </div>
                                </form>
                            </div>

                            <div class="alert alert-danger d-none mx-3 mt-3 mb-0"></div>
                            <div class="alert alert-primary d-none mx-3 mt-3 mb-0"></div>
                            <div class="modal-body overflow-hidden"></div>

                        </div>
                    </div>
                </div>

                <div id="finetenantModal" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content alert">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0 ml-2"></h5>
                                <<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>

                            <div class="alert">
                                <form action="#" id="finetenantform" autocomplete="off">
                                    <div class="form-group">
                                        <small class='text-danger'>This fine will only apply this month ie some destruction</small>

                                        <input type="hidden" name="id" class="form-control eid "> <br>

                                        <label for="">Fine Purpose</label>
                                        <input type="text" name="purpose" class="form-control " placeholder="ie "><br>
                                        <label for="">Amount [Use negative to indicate a refund on receipt]</label>
                                        <input type="number" name="amount" class="form-control  " placeholder="eg 1000"><br>
                                        <button type="submit" class="form-control btn-primary btn-submit">Submit</button>

                                    </div>
                                </form>
                            </div>

                            <div class="alert alert-danger d-none mx-3 mt-3 mb-0"></div>
                            <div class="alert alert-primary d-none mx-3 mt-3 mb-0"></div>
                            <div class="modal-body overflow-hidden"></div>

                        </div>
                    </div>
                </div>




                <div id="ratetenantModal" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content alert">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0 ml-2"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="alert">
                                <form action="#" id="ratetenantform" autocomplete="off">
                                    <div class="form-group">
                                        <small class='text-danger'>Rate tenant based on your views of them</small>

                                        <input type="hidden" name="id" class="form-control eid ">
                                        <input type="hidden" name="rates" class="form-control ratespicked ">

                                        <div>
                                            <ul class='liststars'>
                                                <li><i class="fa fa-star stars star1 " rel='1' title='Very Annoying' data-toggle='tooltip'></i></li>
                                                <li><i class="fa fa-star stars star2" rel='2' title='Annoying' data-toggle='tooltip'></i></li>
                                                <li><i class="fa fa-star stars star3" rel='3' title='Neutral' data-toggle='tooltip'></i></li>
                                                <li><i class="fa fa-star stars star4" rel='4' title='Pleasant' data-toggle='tooltip'></i></li>
                                                <li><i class="fa fa-star stars star5" rel='5' title='Very Pleasant' data-toggle='tooltip'></i></li>
                                            </ul>
                                        </div>

                                        <div>
                                            <label for="">Your optional comment</label>
                                            <textarea type="text" name="comment" class="form-control  "></textarea>
                                        </div>

                                        <br>
                                        <button type="submit" class="form-control btn-primary btn-submit">Submit</button>

                                    </div>
                                </form>
                            </div>

                            <div class="alert alert-danger d-none mx-3 mt-3 mb-0"></div>
                            <div class="alert alert-primary d-none mx-3 mt-3 mb-0"></div>
                            <div class="modal-body overflow-hidden"></div>

                        </div>
                    </div>
                </div>



                <div class="card mb-4">
                    <div class="card-header">
                        Your Active tenants
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date&nbsp;In</th>
                                        <th>Date&nbsp;Out</th>
                                        <th>House</th>
                                        <th>Rating x/5</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <a href="/dashboard/tenants/view?id=3"><i class="fa fa-eye"></i></a></td>
                                        <td>calvinnalexo@gmail.com</td>
                                        <td>2023-12-23</td>
                                        <td>2024-02-21
                                        </td>
                                        <td> - </td>
                                        <td>5 stars</td>

                                        <td>

                                            <span class='ratetenant badge badge-primary cursor-pointer' rel='3'>Rate tenant</span>
                                            <span class='endtenancy badge badge-danger cursor-pointer' rel='10'>End Tenancy</span>

                                        </td>




                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



            </div>

        </div>





        <?php require DASHBOARD . 'includes/footer.inc.php' ?>


        <script>
            $(function(e) {



                $('.close').click(function() {
                    $('#ratetenantModal').modal('hide');
                });

                $('.stars').click(function() {
                    $('.stars').removeClass('st_active');
                    let c = parseInt($(this).attr('rel'));
                    $('.ratespicked').val($(this).attr('rel'));

                    for (let i = c; i > 0; i--)
                        $('.star' + i).addClass('st_active');
                })


                $('#ratetenantform').submit(function(e) {
                    e.preventDefault();
                    const data = _data(new FormData(this), 'rateTenant');
                    if (data['error'] == false) {
                        Swal.fire('', data['msg'], 'success');
                        location.reload();
                    } else Swal.fire('Heads Up', data['msg'], 'error');
                });



                $('.ratetenant').click(function() {
                    $('.eid').val($(this).attr('rel'));
                    $('#ratetenantModal').modal('show');
                });



                $('.endtenancy').click(function() {
                    let formdata = new FormData();
                    formdata.append('id', $(this).val());

                    Swal.fire({
                            icon: 'warning',
                            text: 'Do you really want to execute this?',
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, end it!"
                        })
                        .then(function(ok) {

                            if (ok.isConfirmed) {
                                const data = _data(formdata, 'endtenancy');
                                if (data['error'] == false) {
                                    Swal.fire('', data['msg'], 'success');
                                    location.reload();
                                } else Swal.fire('Heads Up', data['msg'], 'error');
                                e.preventDefault();
                            }

                        });

                });



            })
        </script>
    </main>

</body>

</html>