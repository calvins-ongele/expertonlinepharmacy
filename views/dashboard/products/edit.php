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
                            <form id='editproduct'>
                                
                                <div class='row'>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Title of the product</label>
                                            <input type='text' name='title' class='form-control'  value='<?php echo $this->data['p_title'] ?>' >
                                            <input type='hidden' name='id' class='form-control' value='<?php echo $this->data['p_ID'] ?>' >
                                        </div>
                                    </div>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Product price</label>
                                            <input type='number' name='price' class='form-control' value='<?php echo $this->data['p_price'] ?>'  >
                                        </div>
                                    </div>
                                </div>

                                <div class='row'>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Product Images  [leave empty to remain unchanged]</label>
                                            <input type='file' name='file[]' class='form-control' multiple >
                                        </div>
                                    </div>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Tag features</label>
                                            <input type='text' name='tags' class='form-control' value='<?php echo $this->data['p_tags'] ?>' >
                                        </div>
                                    </div>
                                </div>
                            	
                                
                                <div class='row'>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Product brand [Popular brands like Toyota]</label>
                                            <input type='text' name='brand' class='form-control' value='<?php echo $this->data['p_brand'] ?>'   >
                                        </div>
                                    </div>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Product condition</label>
                                            <select type='text' name='condition' class='form-control' >
                                                <option value=''>Select condition</option>
                                                <option value='Brand New'  <?php echo $this->data['p_condition'] == 'Brand New' ? 'selected':'' ?> >Brand New</option>
                                                <option value='Refurbished' <?php echo $this->data['p_condition'] == 'Refurbished' ? 'selected':'' ?>  >Refurbished</option>
                                                <option value='Second Hand' <?php echo $this->data['p_condition'] == 'Second Hand' ? 'selected':'' ?>  >Second Hand</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'> 
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Product Location</label>
                                            <select type='text' name='county' class='form-control' >
                                                <option value=''>Select Location</option>
                                                <?php foreach($counties as $r) { ?>
                                                <option value='<?php echo $r ?>'  <?php echo $this->data['p_county'] == $r ? 'selected':'' ?> ><?php echo $r ?></option> 
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Product Category</label>
                                            <select type='text' name='category' class='form-control' >
                                                <option value=''>Select Category</option>
                                                <?php foreach($this->categories as $r) { ?>
                                                <option value='<?php echo $r['cat_ID'] ?>' <?php echo $this->data['p_category'] == $r['cat_ID'] ? 'selected':'' ?> ><?php echo $r['cat_name'] ?></option> 
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'> 
                                    <div class='col-md-12 mb-3'>
                                        <div class='form-group'>
                                            <label>Product Description</label>
                                            <textarea type='text' id='ckeditor' class='form-control' ><?php echo $this->data['p_desc'] ?></textarea>
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