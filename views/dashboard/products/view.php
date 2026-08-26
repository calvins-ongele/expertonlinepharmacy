<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require DASHBOARD . 'includes/header.inc.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
         
        <?php 
        $pageid = 'products';
        
        require DASHBOARD . 'includes/sidebar.inc.php' ?>
        
        
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header"> 
            </div>
            <div class="content px-2">
                
                    <div class='container alert'>
                        <div class='table-responsive'>
                            <table class='table table-striped table-hover'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Brand</th>
                                        <th>Condition</th>
                                        <th>Promote</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; foreach($this->data['products'] as $row) { $i++; ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo strtoupper($row['p_title']) ?> <a class='badge   btn-primary' href='/dashboard/listings/edit/<?php echo $row['p_ID'] ?>'><i class='fa fa-pencil'></i></a> </td>
                                        <td><?php echo $row['p_price'] ?></td>
                                        <td><?php echo $row['p_brand'] ?></td>
                                        <td><?php echo $row['p_condition'] ?></td>
                                        <td><a href='#' rel='<?php echo $row['p_ID'] ?>' class='badge badge-success sharepromote'>Promote</a> </td>
                                        <td><a href='#' rel='<?php echo $row['p_ID'] ?>' class='badge badge-danger delproduct'>Delete</a> </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                             
                        </div>

                        
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
        
        <div class="modal fade" id="exampleModalx" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Share with Advertisers</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class=''>
                      <p>Share a percentage with advertisers for free promotion.</p>
                      <form id='shareprofit'>
                          <label>Share percentage eg 5 for 5%</label>
                          <div class='form-group'>
                              <input class='form-control sharepid ' type='hidden' name='id' value='' >
                              <input class='form-control ' name='share'>
                          </div>
                          <div class='form-group'>
                              <input type='submit' class='form-control btn-success ' value='Submit'>
                          </div>
                          
                      </form>
                  </div>
                
              </div>
              <!--<div class="modal-footer">-->
              <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
              <!--  <button type="button" class="btn btn-primary">Save changes</button>-->
              <!--</div>-->
            </div>
          </div>
        </div>
        
        
        <?php require DASHBOARD.'includes/footer.inc.php' ?> 
        <script type="text/javascript">
          
            
            $(function() {
                
                $('#shareprofit').submit(function(e) {
                    e.preventDefault();
                    var data = _data(new FormData(this), 'shareprofit');
                    alert(data['msg'])
                });
                
                $('.sharepromote').click(function(e) {
                    e.preventDefault();
                    $('.sharepid').val( $(this).attr('rel') );
                    $('#exampleModalx').modal('show');
                });
                
                $('.delproduct').click(function(e) {
                    e.preventDefault();
                    var form = new FormData();
                    form.append('id', $(this).attr('rel') );
                    if (confirm("Are you sure?")) {
                        const data = _data(form, 'del_product');
                        
                        alert(data['msg'])
                    }
                });
            })
        </script>
    
    </main> 
 
</body>

</html>