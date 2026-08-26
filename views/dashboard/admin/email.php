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
            <h1 class='text-center'>Send Email</h1>
             <div class='row'>
                 <div class='col-md-3'></div>
                 <div class='col-md-6'>
                     <form id='sendemail'>
                         <div class='form-group'>
                             <label>Email</label>
                             <input type='email' name='email' class='form-control' value='<?php echo $_GET['id'] ?? '' ?>'>
                         </div>
                         <div class='form-group'>
                             <label>Subject</label>
                             <input type='text' name='subject' class='form-control'  >
                         </div>
                         <div class='form-group'>
                             <label>Email body</label>
                             <textarea type='text' id='editorck' class='editorck form-control'  ></textarea>
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
       
       
            <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script> 
        <script type="text/javascript"> 
         
            //<![CDATA[
            CKEDITOR.replace( 'editorck');
            //]]>
        </script>
    
   
      <script>
          $(function() {
              $('#sendemail').submit(function(e) {
                  e.preventDefault();
                  let form = new FormData(this); 
                  form.append('body', CKEDITOR.instances.editorck.getData() );
                  let data = _data(form, 'send-email'); 
                  fireswal({msg:resp['msg'] });
              
              })
          })
      </script>

    </main>


</body>

</html>