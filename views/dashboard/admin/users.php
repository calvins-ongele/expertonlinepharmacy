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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date&nbsp;Registered</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 0;
                                foreach ($this->data['users'] as $row) {
                                    $i++; ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row['user_fname'] . ' ' . $row['user_lname'] ?> (<?php echo $row['a_account_currency'] ?> <?php echo $row['a_account_balance'] ?>) </td>
                                        <td><?php echo $row['user_email'] ?>
                                            [<?= $row['email_sent'] ?>]<a href='#' class='sendemail badge' style='background:blue;color:white' rel='<?= $row['user_email'] ?>'>Send</a>
                                            <a title='Send Email' href='/dashboard/admin/email?id=<?php echo $row['user_email'] ?>'><i class='bi bi-link'></i></a>

                                        </td>
                                        <td><?php echo $row['user_tel'] ?>
                                            [<?= $row['sms_sent'] ?>]<a href='#' class='sendsms badge' style='background:green;color:white' rel='<?= $row['user_tel'] ?>'>Send</a>
                                        </td>
                                        <td><?php echo date('d.m.Y', $row['user_datecreated']) ?></td>
                                        <td><a href='#' class='badge badge-danger deluser12' rel='<?php echo $row['user_ID'] ?>'><i class='fa fa-trash'></i></a></td>
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