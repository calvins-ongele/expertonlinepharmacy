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
                                                <th>Title</th>
                                                <th>Total/Occupied</th> 
                                                <th>House&nbsp;Type</th>  
                                                <th>Partitioning</th>   
                                                <th>Add/Edit T & C</th> 
                                                <th>Delete</th>   
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($this->building as $row) { ?>
                                            <tr> 
                                                <td><?php echo $row['building_name'] ?></td>
                                                <td><?php echo $row['building_no_doors'] ?>/<?php echo $row['building_occupied'] ?></td>
                                                <td><?php echo $row['ht_name'] ?></td>  
                                               
                                                <td>
                                                    <a href="/dashboard/property-listings/add/?id=<?php echo $row['building_ID'] ?>" rel='<?php echo $row['building_ID'] ?>' title="Edit" data-toggle="tooltip"> <i class="fa fa-pencil-square"></i> </a>
                                                </td> 
                                                
                                                <td>
                                                    <a href="/dashboard/property-listings/terms/?id=<?php echo $row['building_ID'] ?>" 
                                                    class='badge badge-secondary'  title="Terms & Agreement for <?php echo $row['building_name'] ?>" data-toggle="tooltip"> <i class="fa fa-pencil"></i> </a>
                                                </td> 
                                                
                                                
                                                <td>
                                                    <a href="#" 
                                                    class='badge badge-secondary delete_building' rel='<?php echo $row['building_ID'] ?>'  title="Delete <?php echo $row['building_name'] ?>" data-toggle="tooltip"> <i class="fa fa-trash"></i> </a>
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
  <script>
            $(function() {
                
                
    		    $('.delete_building').click(function() {
                    const _val = $(this).attr('rel');
                    Swal.fire({ 
                        text: "Are you sure? It will delete individual houses as well!! ", 
                        icon: "question",  
                        
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                      })
                      .then((ok) => {
                        if (ok.isConfirmed)  {
                            let form_data = new FormData();
                            form_data.append('id', _val) 
                            let feedback = _data(form_data, 'delete_building'); 
                            alert(feedback['msg']);
                            if (feedback['error'] == 'false') location.reload(); 
                            
                        }
                      }); 
                }); 
            
            
            });
        </script>

    </main>

</body>

</html>