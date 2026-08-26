<?php
//setcookie('username', '6', time() + (86400 * 30), "/");

?>
<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require DASHBOARD. 'includes/header.inc.php' ?>  
    <style>
        .hidden {
            display:none;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
       
        <?php 
        $pageid = 'changepin';
        
        require DASHBOARD.'includes/sidebar.inc.php' ?>
        
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header">
                <h1>New Quote</h1>
            </div>
            <div class="content px-2">
                
                <div class='container'><hr></div>
                
                
                <div class='container'>
                    
               
            
                    <form id='newquote' class='alert    ' >
                        <div class='form-group alert' >
                           
                            <div class='row'>
                                <!--------------------------------->
                         
                                <div class='col-md-12 mb-3'>
                                    <label>Quote</label> 
                                    <input type='text' class='form-control  ' name='quote'   > 
                                </div>
                               
                                <div class='col-md-12 mb-3'>
                                    <label>Day</label> 
                                    <input  type='number'  class='form-control  ' name='day'   > 
                                </div>
                                <!--------------------------------->
                                <div class='col-md-12 mb-3'>
                                    <label>Month</label>
                                    <input   type='number'  class='form-control  ' name='month' required   > 
                                </div> 
                                <div class='col-md-6 mb-3'>  </div> 
                                <!--------------------------------->
                                
                                <div class='col-md-12 mb-3'> 
                                    <input type='submit'  class='form-control btn-primary ' value='Save Now'   > 
                                </div> 
                            
                                <div class='feedback m-3'></div><br>
                                
                                 
                                
                            </div>
                        </div>
                    </form>
                </div>
                 
            </div>
        </div>
        
        
        <?php require DASHBOARD. 'includes/footer.inc.php' ?>
        <script> 
            $(function() {  
               
            
               
               $('#newquote').submit(function(e) {
                   e.preventDefault();
                   const data = _data(new FormData(this), 'newquote');
                   if (data['error'] == 'true') {
                       $('.feedback').html(data['msg']);
                       $('.feedback').addClass('alert alert-danger');
                   } else {
                       $('.feedback').html("quote added successfully");
                       $('.feedback').addClass('alert alert-success');
                   }
               });
               
               
            });
        </script>
    
    </main> 
 
</body>

</html>