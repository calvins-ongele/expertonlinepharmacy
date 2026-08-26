<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require DASHBOARD . 'includes/header.inc.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
         
        <?php 
        $pageid = 'withdraw';
        require 'public/includes/counties.php';
        require DASHBOARD . 'includes/sidebar.inc.php' ?>
        
        
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header"> 
            </div>
            <div class="content px-2">
                
                    <div class='container alert'>
                        <div class=''>
                            <form id='newpesapax' action='/dashboard/card-payment' method='GET'>
                                            <!--<input type='hidden' name='url' class='form-control'   value='<?php echo $this->data['v_url'] ?? '' ?>' >-->
                                            <input type='hidden' name='email' class='form-control'   value='<?php echo Session::get('email') ?>' >
                                            <input type='hidden' name='type' class='form-control'   value='deposit' >
                                
                                <div class='row'>
                                    <div class='col-md-12 mb-3'>
                                        <div class='form-group'>
                                            <label>Amount to depsit</label>
                                            <input type='text' name='amount' class='form-control' placeholder='KES' required value='<?php echo $this->data['v_title'] ?? '' ?>' >
                                        </div>
                                    </div> 
                                </div>
  
                                
                               
                                <div class='form-group mb-3'>
                                    <label>Account number <span>[Required]</span></label>
                                    <div class=' '>
                                        
                                        <select class='form-control' required name='account'  > 
                                        <?php foreach($this->accounts as $row) { if ($row['cur'] != 'KES' || ($row['set_type'] != 'Owner') ) continue; ?>
                                            <option value='<?php echo $row['acc'] ?>'><?php echo "{$row['acc']} - Bal: {$row['cur']} {$row['bal']}" ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <div class='row'> 
                                    <div class='col-md-12 mb-3'>
                                        <div class='form-group'> 
                                            <input type='submit'  class='form-control btn btn-success' value='Submit Now'>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class='feedback mt-2'></div>
                            </form>
                        </div>
                     
                        
                        
 
                    </div>
                
                 
            </div>
        </div>
        <div class="modal fade" id="exampleModadl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Card/Airtel Money Deposit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body modiframe">
                    Loading...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                  </div>
                </div>
              </div>
            </div>
        
        <?php require DASHBOARD.'includes/footer.inc.php' ?> 
        <script>
            $(function() {
                
                $('#newpesapa').submit(function(e) {
                    e.preventDefault();
                    const data = _data(new FormData(this), 'depositpesapal');
                    
                    if (data['error'] != 'true') {
                        $('#exampleModadl').modal('show');
                        $('.modiframe').html(data['msg']);
                    } else {
                        alert(data['msg'])
                    }
                    
                });
            });
        </script>
    
    </main> 
 
</body>

</html>