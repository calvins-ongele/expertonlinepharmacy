<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require ADMIN . 'includes/header.inc.php' ?>
    
     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     <style>
        .select2-container--bootstrap-5 .select2-selection {
          border: 1px solid #ced4da; /* Standard Bootstrap 5 border color */
          border-radius: 0.375rem; /* Bootstrap form control radius */
          height: calc(2.5rem + 2px); /* Align with Bootstrap input height */
          padding: 0.375rem 0.75rem;
          font-size: 1rem;
          background-color: #fff; /* Ensure background is white */
          transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
        
        .select2-container--bootstrap-5 .select2-selection:hover {
          border-color: #86b7fe; /* Bootstrap's hover border color */
        }
        
        .select2-container--bootstrap-5 .select2-selection:focus {
          border-color: #86b7fe; /* Blue border on focus */
          box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25); /* Bootstrap's focus shadow */
        }
        
        .select2-container--bootstrap-5 .select2-selection__arrow {
          height: 100%; /* Align arrow vertically */
          right: 10px;
        }
        .hidden {
            display:none!important;
        }

     </style>
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
                            <form id='GoLiveStart'> 
                                
                                <div class='row'>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Title of the video</label>
                                            <input type='text' name='title' class='form-control' required value='<?php echo $this->data['v_title'] ?? '' ?>' >
                                        </div>
                                    </div>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Video joining price [Zero means it's free]</label>
                                            <input type='text' name='price' class='form-control' required value='<?php echo $this->data['v_price'] ?? '' ?>'  >
                                        </div>
                                    </div>
                                </div> 
                                <div class='row'>
                                    <div class='col-md-4 mb-3'>
                                        <div class='form-group'>
                                            
                                            <label>Attach a service or product</label>   
                                           <select name="attach_type"   class="form-control  "    >
                                            <option value='' hidden>Select to attach product or service</option>
                                             <option value="service">Service</option> 
                                             <option value="product">Product</option> 
                                      
                                           </select>
            
            
                                        </div>
                                    </div>
                                    <div class='col-md-8 mb-3 product1'>
                                        <div class='form-group'>
                                            
                                            <label>Attach a product to live [optional]</label>  
                                           <select name="attachproduct" id='productAttach' class="productAttach  form-control select2"    >
                                            <option value='' hidden>Select your product to attach</option>
                                            <?php foreach ($this->products as $row) { ?>
                                             <option value="<?php echo $row['p_ID'] ?>"><?php echo $row['p_title'] ?></option> 
                                             <?php } ?>
                                           </select>
            
            
                                        </div>
                                    </div> 
                                    <div class='col-md-8 mb-3 hidden service1 '>
                                        <div class='form-group'>
                                            
                                            <label>Attach a service to live [optional]</label> 
                                                                             
                                           <select name="attachservice" class="  productAttach form-control select2"    >
                                            <option value='' hidden>Select your service to attach</option>
                                            <?php foreach ($this->services as $row) { ?>
                                             <option value="<?php echo $row['s_ID'] ?>"><?php echo $row['s_title'] ?></option> 
                                             <?php } ?>
                                           </select>
            
            
                                        </div>
                                    </div>
                                </div> 
                               
                                <div class='row'> 
                                    <div class='col-md-12 mb-3'>
                                        <div class='form-group'>
                                            <label>Video Description</label>
                                            <textarea type='text' id='ckeditor' class='form-control' ><?php echo $this->data['v_desc'] ?? '' ?></textarea>
                                        </div>
                                    </div>
                                </div> 
                                <div class='row'> 
                                    <div class='col-md-12 mb-3'>
                                        <div class='form-group'> 
                                            <input type='submit'  class='form-control btn btn-success' value='Proceed Now'>
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
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(function() {
                 $('.productAttach').select2({
                    theme: 'bootstrap-5',
                    width: '100%',
                    placeholder: "Select your product/service to attach to live", 
                    selectionCssClass: "select2--large", // selectionCssClass: 'select2--large',
                    dropdownCssClass: "select2--large",
                  });
                  
                  $("select[name='attach_type']").on('change', function() {
                      
                      if ($(this).val() == 'product') {
                          
                          $('.service1').addClass('hidden');
                          $('.product1').removeClass('hidden');
                      }
                      if ($(this).val() == 'service') {
                          $('.service1').removeClass('hidden');
                          $('.product1').addClass('hidden');
                      }
                  })
                  
 
            })
        </script>
        <script  >  
        //<![CDATA[
        CKEDITOR.replace( 'ckeditor');
        //]]>
    </script>
    </main> 
 
</body>

</html>