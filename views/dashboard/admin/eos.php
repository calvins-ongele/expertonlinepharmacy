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
            <h3 class='text-centexr mb-3'>All Enquiries <span class='text-warning'><?= $this->data['eos'][0]['status']??'' ?></span> (<?= ($this->data['count']) ?>) </h3>
             <div class='table-responsive '> 
                <table class='table table-striped table-hover'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Date Registered</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($this->data['eos'] as $row) { $i++; ?>
                        
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['name'] ?>  </td>
                            <td><?php echo $row['email'] ?>  </td>
                            <td><?php echo $row['phone'] ?> </td>
                            <td><?php echo $row['company_name'] ?> </td>
                            <td><?php echo explode(' ', $row['created_at'])[0]; ?> </td>
                            <td>
                                <?= $row['status']=='pending'?"
                                <a href='#' class='btn btn-success approve-company ' rel='{$row['id']}' >Approve</a>
                                ":"" ?>
                            </td>
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
              
              $('.approve-company').click(async function(e) {
                  e.preventDefault();
                  let form = new FormData();
                  form.append('id', $(this).attr('rel') );
                  
                  const swalResult = await Swal.fire({
                  title: "Confirm Save",
                  text: `Are you sure you want to approve the company?`,    
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, approve it!",
                  });
                  
                  if (!swalResult.isConfirmed) { return;  }
                  
                  
                  let data = _data(form, 'approve_new_company'); 
                   
                  
                  Swal.fire({
                  title: "Confirmed",
                  text: `${data['msg']}`,    
                    icon: "info"
                  });
                  
              });
              
              $('.sendemail').click(function(e) {
                  e.preventDefault();
                  let form = new FormData();
                  form.append('email', $(this).attr('rel') );
                  let data = _data(form, 'send_invitation_email'); 
                  fireswal({msg:data['msg'] });
              });
              $('.sendsms').click(function(e) {
                  e.preventDefault();
                  let form = new FormData();
                  form.append('phone', $(this).attr('rel') );
                  let data = _data(form, 'send_invitation_sms'); 
                  fireswal({msg:data['msg'] });
              });
              
              
              
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