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
            <h1 class='text-center'>All Users</h1>
             <div class='table-responsive '> 
                <table class='table table-striped table-hover'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Date </th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($this->data['support'] as $row) { $i++; ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['phone']   ?> <?php if (!empty($row['phone'])){ ?><a title='Send SMS' href='/dashboard/sms?id=<?php echo $row['phone'] ?>'> 
                            <i style='font-size:20px color:bue;' class='bi-folder-symlink'></i></a> <?php } ?></td>
                            <td><?php echo $row['email'] ?> <a title='Send Email' href='/dashboard/email?id=<?php echo $row['email'] ?>'> <i style='font-size:20px color:bue;' class='bi-folder-symlink'></i></a></td>
                            <td><?php echo $row['message'] ?></td>
                            <td><?php echo $row['date'] ?></td>
                             <td><?php echo $row['status'] ?></td>
                            <!--<td><a href='#' class='badge badge-danger deluser12' rel='<?php echo $row['id'] ?>' ><i class='fa fa-trash'></i></a></td>-->
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
              $('.deluser12').click(function(e) {
                  e.preventDefault();
                  let form = new FormData();
                  form.append('id', $(this).attr('rel') );
                  
                  if (confirm("Are you sure?")) {
                      let data = _data(form, 'delete-user'); 
                      fireswal({msg:resp['msg'] });
                  }
              })
          })
      </script>


    </main>


</body>

</html>