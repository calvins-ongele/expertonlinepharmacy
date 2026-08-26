<!DOCTYPE html>
<html lang="en">

<head>
    <?php require DASHBOARD . 'includes/header.inc.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">

        <?php
        $pageid = 'admin';

        require DASHBOARD . 'includes/sidebar.inc.php' ?>



        <div class="content-wrapper px-4 py-2">
            <div class="content-header">
            </div>

            <div class="container-xl">

               
        <section class='container mt-3'>
            <h1 class='text-centerx'>Phone numbers collected | Total <span style='color:white;background:grey;padding:2px;border-radius:3px'><?php echo $this->data['count'] ?></span></h1>
             
             <div style='max-width:30%' class='mt-3 mb-3'>
                 <a data-toggle="modal" data-target="#numbersModal" href="#numbersModal" role="button" class="btn btn-primary tile-link d-flex align-items-center flex-column text-center rounded-2">
                     Add New Number
                 </a>
             </div>
             <div class='table-responsive '> 
                <table class='table table-striped table-hover'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Phone</th>
                            <th>Name</th>
                            <th>Source</th>
                            <th>Date </th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($this->data['numbers'] as $row) { $i++; ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['n_phone']   ?> <?php if (!empty($row['n_phone'])){ ?><a title='Send SMS' href='/dashboard/sms?id=<?php echo $row['n_phone'] ?>'> 
                            <i style='font-size:20px color:bue;' class='bi-folder-symlink'></i></a> <?php } ?></td> 
                            <td><?php echo $row['n_name'] ?></td>
                             <td><?php echo $row['n_source'] ?></td>
                            <td><?php echo date('d.m.Y',$row['n_date']) ?></td>
                            <!--<td><a href='#' class='badge badge-danger deluser12' rel='<?php //echo $row['n_ID'] ?>' ><i class='fa fa-trash'></i></a></td>-->
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
             </div>
             
                
                 
        </section> 

                <div class="table-responsive">
                    <div class="col-12">
                        <nav>
                            <ul class="pagination">
                                <?php
                                $currentPage = $_GET['pg'] ?? 1;
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
                                    <li class="page-item"><a class="page-link" href="<?= CustomFunctions::formatDynamicUrl('pg', ($currentPage - 1)) ?>">Previous</a></li>
                                <?php } ?>
                                <?php for ($i = 1; $i < ceil($totalCount / $totalPerPage) + 1; $i++) { ?>
                                    <li class="page-item <?= ($currentPage == $i) ? 'active' : '' ?>"><a class="page-link" href="<?= CustomFunctions::formatDynamicUrl('pg', $i) ?>"><?= $i ?></a></li>
                                <?php }
                                if ($possiblePages) { ?>
                                    <li class="page-item"><a class="page-link" href="<?= CustomFunctions::formatDynamicUrl('pg', $next) ?>">Next</a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>




            </div>

        </div>




<div class="modal fade" id="numbersModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >
          Add Phone
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
      </div>
      <div class="modal-body">
          <div class='alert '>
            
              <form id='savenewnumber'>
                 <div class='form-group mb-3'>
                     <label>Phone</label>
                     <input name='phone' type='number' required class='form-control'>
                 </div>
                 
                 <div class='form-group mb-3'>
                     <label>Name (optional)</label>
                     <input name='name' type='text' class='form-control'>
                 </div>
                 <div class='form-group mb-3'>
                     <label>Source (optional)</label>
                     <input name='source' type='source' class='form-control'>
                 </div>
                 
                                
                 <div class='form-group mb-3'> 
                     <input   type='submit' class='form-control btn-primary  ' value='Save Now'>
                 </div>
                 <div class='mb-3 feedback'></div>
             </form>
             
            </div>
      </div>
      
    </div>
  </div>
</div>




        <?php require DASHBOARD . 'includes/footer.inc.php' ?>
        <script src="/views/dashboard/admin/includes/admin.inc.js"></script>
  <script>
          $(function() {
              
           $('#savenewnumber').submit(function(e) {
                e.preventDefault();
                const data = _data(new FormData(this), 'savenumber');
                if (data['error'] == 'false') $('#savenewnumber').trigger('reset');
                $('.feedback').html(data['msg']);
                $('.feedback').addCass(data['msg'] == 'true' ? 'alert alert-danger' : 'alert alert-success')
                
            });
            
          })
      </script>


    </main>


</body>

</html>