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
            <h1 class='text-center'>Send SMS</h1>
             <div class='row'>
                 <div class='col-md-3'></div>
                 <div class='col-md-6'>
                     <form id='sendSMS'>
                         <div class='form-group mb-3'>
                             <label>Phone</label>
                             <input type='phone' name='phone' class='form-control' value='<?php echo $_GET['id'] ?? '' ?>'>
                         </div>
                          
                         <div class='form-group mb-3'>
                             <label>SMS body</label>
                             <textarea type='text' name='body' class='  form-control'  ></textarea>
                         </div>
                         <div class='form-group'> 
                             <input type='submit' value='Send Now' class='form-control btn btn-primary'  >
                         </div>
                     </form>
                 </div>
                 
             </div>
             
                
                 
        </section> 



            </div>

        </div>








        <?php require DASHBOARD . 'includes/footer.inc.php' ?>
        <script src="/views/dashboard/admin/includes/admin.inc.js"></script>
       
       
           
      <script>
          $(function() {
              $('#sendSMS').submit(function(e) {
                  e.preventDefault();
                  let form = new FormData(this);  
                  let data = _data(form, 'send-sms'); 
                  fireswal({msg:resp['msg'] });
              
              })
          })
      </script>

    </main>


</body>

</html>