<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require DASHBOARD . 'includes/header.inc.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
         
        <?php 
        $pageid = 'products';
        require 'public/includes/counties.php';
        require DASHBOARD . 'includes/sidebar.inc.php' ?>
        
        
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header"> 
            </div>
            <div class="content px-2">
                
                    <div class='container alert'>
                        <div class=''>
                            <form id='newproduct'>
                                
                                <div class='row'>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Title of the product</label>
                                            <input type='text' name='title' class='form-control' required >
                                        </div>
                                    </div>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Product price</label>
                                            <input type='number' name='price' class='form-control' required >
                                        </div>
                                    </div>
                                </div>

                                <div class='row'>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Product Images [Select upto 5 photos]</label>
                                            <input type='file' name='file[]' class='form-control' multiple required>
                                        </div>
                                    </div>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Tag features</label>
                                            <input type='text' name='tags' class='form-control'>
                                        </div>
                                    </div>
                                </div>
                            	
                                
                                <div class='row'>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Product brand [Popular brands like Toyota]</label>
                                            <input type='text' name='brand' class='form-control'   >
                                        </div>
                                    </div>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Product condition</label>
                                            <select type='text' name='condition' class='form-control' required>
                                                <option value=''>Select condition</option>
                                                <option value='Brand New'>Brand New</option>
                                                <option value='Refurbished'>Refurbished</option>
                                                <option value='Second Hand'>Second Hand</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'> 
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Product Location</label>
                                            <select type='text' name='county' class='form-control' required>
                                                <option value=''>Select Location</option>
                                                <?php foreach($counties as $r) { ?>
                                                <option value='<?php echo $r ?>'><?php echo $r ?></option> 
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Product Category</label>
                                            <select type='text' name='category' class='form-control' required>
                                                <option value=''>Select Category</option>
                                                <?php foreach($this->categories as $r) { ?>
                                                <option value='<?php echo $r['cat_ID'] ?>'><?php echo $r['cat_name'] ?></option> 
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'> 
                                    <div class='col-md-12 mb-3'>
                                        <div class='form-group'>
                                            <label>Product Description</label>
                                            <textarea type='text' id='ckeditor' class='form-control' ></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class='row'> 
                                    <div class='col-md-12 mb-3'>
                                        <div class='form-group'> 
                                            <input type='submit'  class='form-control btn btn-primary' value='Submit Now'>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-6 mb-3'>
                                    <div class='form-group'> 
                                        <a class='btn btn-warning' href='/dashboard/promote'>Promote Account? <u class='text-italics'>See benefits</u></a>
                                    </div>
                                </div>
                                
                                <div class='feedback mt-2'></div>
                            </form>
                        </div>
                     
                        
                        
 
                    </div>
                
                 
            </div>
        </div>
        
        
        <?php require DASHBOARD.'includes/footer.inc.php' ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script> 
        <script type="text/javascript">
         
            //<![CDATA[
            CKEDITOR.replace( 'ckeditor');
            //]]>
        </script>
    
    </main> 
 
</body>

</html>