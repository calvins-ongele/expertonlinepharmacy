<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require ADMIN . 'includes/header.inc.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
         
        <?php 
        $pageid = 'content';
        require 'public/includes/counties.php';
        require ADMIN . 'includes/sidebar.inc.php' ?>
        
        
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header"> 
            </div>
            <div class="content px-2">
                
                    <div class='container alert'>
                        <div class=''>
                            <form id='newblog'>
                                            <input type='hidden' name='url' class='form-control'   value='<?php echo $this->data['b_url'] ?? '' ?>' >
                                
                                <div class='row'>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Title of the Post</label>
                                            <input type='text' name='title' class='form-control' required value='<?php echo $this->data['b_title'] ?? '' ?>' >
                                        </div>
                                    </div>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Photo Image</label>
                                            <input type='file' name='img' class='form-control' required    >
                                        </div>
                                    </div>
                                </div>
  
                                
                               
                                <div class='row'> 
                                    <div class='col-md-12 mb-3'>
                                        <div class='form-group'>
                                            <label>Blog Post</label>
                                            <textarea type='text' id='ckeditor' class='form-control' ><?php echo $this->data['v_desc'] ?? '' ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class='row'> 
                                    <div class='col-md-12 mb-3'>
                                        <div class='form-group'> 
                                            <input type='submit'  class='form-control btn btn-primary' value='Update Now'>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class='feedback mt-2'></div>
                            </form>
                        </div>
                     
                        
                        
 
                    </div>
                
                 
            </div>
        </div>
        
        
        <?php require ADMIN.'includes/footer.inc.php' ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script> 
        <script type="text/javascript"> 
            //<![CDATA[
            CKEDITOR.replace( 'ckeditor');
            //]]>
        </script>
    
    </main> 
 
</body>

</html>