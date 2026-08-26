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
            <h1 class='text-center'>Learners registered | Total <span style='color:white;background:grey;padding:2px;border-radius:3px'><?= ($this->data['count']) ?></span></h1>
             
             
             <div class='table-responsive '> 
                <table class='table table-striped table-hover'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Course </th> 
                            <th>Status </th> 
                            <th>Preferred Time </th> 
                            <th>Date of Registration</th>
                            <th>Ref</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($this->data['ihub'] as $row) { $i++; 
                        
                        $ref = explode('//', $row['ihub_ref'] )[1] ?? "";
                        $ref = explode('/', $ref)[0];
                        
                        
                        ?>
                        <tr>
                            <td><?= $i ?></td> 
                            <td><?= $row['ihub_name'] ?></td>
                             <td><?= $row['ihub_email'] ?>[<?= $row['email_sent'] ?>]<a href='#' class='sendemail badge' style='background:blue;color:white' rel='<?= $row['ihub_email'] ?>' >Send</a></td>
                             <td><?= $row['ihub_phone'] ?>[<?= $row['sms_sent'] ?>]<a href='#' class='sendsms badge' style='background:green;color:white' rel='<?= $row['ihub_phone'] ?>' >Send</a></td>
                             <td><?= $row['course_name'] ?></td>
                             <td><?= $row['ihub_status'] ?></td>
                             <td><?= $row['ihub_pref_time'] ?></td>
                            <td><?php echo date('d.m.Y',$row['ihub_date']) ?></td>
                             <td><?= $ref ?></td>
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