<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require 'includes/header.inc.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
         
        <?php 
        $pageid = 'home';
        
        require 'includes/sidebar.inc.php' ?>
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header"> 
            </div>
            <div class="content px-2">
                
              
                
                    <div class='container alert' >
                        
                        <div class='containerxdrt'  style='display:flex;align-items:center; justify-content:space-between;flex-wrap: wrap;' >
                            <!-- <a href='/services/register' class='btn form-controlx btn-success mb-2' > <i class='fa fa-plus'></i> Create a new crowdfunding service</a> -->
                            <a href='/dashboard/listings/new' class='btn form-controlx btn-secondary mb-2' > <i class='fa fa-plus'></i> List your product</a>
                            
                            
                            <?php if (Session::get('role') == 'Admin') { ?>
                            
                            <a href='/dashboard/quote' class='btn form-controlx btn-primary mb-2 ' > <i class='fa fa-plus'></i> Create a new quote</a>
                            <?php } ?>
                        </div>
                        
                      
                        
                        <div class='row mt-4'>  
                    
            				<div class="col-md-4 ml-xx2" >
            					<div class="single-bolg hover01 card alert" style='border-bottom:2px solid var(--blend)' >
            						<center><figure><i class="fas fa-dollar " alt="slide 1" style="font-size: 120px;color:var(--blend)"></i></figure></center>
            						<div class="blog-content"><br>
            							<span>View Balances: <a  style='color:blue' href='/dashboard/my-balances'>here.</a> </span>
            						</div>
            					</div>
            				</div>	
            				<div class="col-md-4 ml-xx2" >
            					<div class="single-bolg hover01 card alert" style='border-bottom:2px solid var(--blend)' >
            						<center><figure><i class="fas fa-sack-dollar " alt="slide 1" style="font-size: 120px;color:var(--blend)"></i></figure></center>
            						<div class="blog-content"><br>
            							<span>Withheld Balance: <?php //echo $object->multi()[3] ?>  </span>
            						</div>
            					</div>
            				</div>	
            				<div class="col-md-4 ml-xx2" >
            					<div class="single-bolg hover01 card alert" style='border-bottom:2px solid var(--blend)' >
            						<center><figure><i class="fas fa-user " alt="slide 1" style="font-size: 120px;color:var(--blend)"></i></figure></center>
            						<div class="blog-content"><br>
            							<span>Total Orders: <?php //echo $object->multi()[0] ?></span>
            						</div>
            					</div>
            				</div>
            				<div class="col-md-4 ml-xx2" >
            					<div class="single-bolg hover01 card alert" style='border-bottom:2px solid var(--blend)' >
            						<center><figure><i class="fas fa-file-invoice " alt="slide 1" style="font-size: 120px;color:var(--blend)"></i></figure></center>
            						<div class="blog-content"><br>
            							<span>Total competed orders: <?php //echo $object->multi()[1] ?></span>
            						</div>
            					</div>
            				</div>	
            				<div class="col-md-4 ml-xx2" >
            					<div class="single-bolg hover01 card alert" style='border-bottom:2px solid var(--blend)' >
            						<center><figure><i class="fas fa-list " alt="slide 1" style="font-size: 120px;color:var(--blend)"></i></figure></center>
            						<div class="blog-content"><br>
            							<span>Transactions: <?php //echo $object->multi()[2] ?></span>
            						</div>
            					</div>
            				</div>
                  
                            
                        </div>
                        
                        
 
                    </div>
                
                 
            </div>
        </div>
        
        
        <?php require 'includes/footer.inc.php' ?>
        <script>
            function copyFunc() {
              // Get the text field
              var copyText = document.getElementById("myInput");  
              copyText.select();
              copyText.setSelectionRange(0, 99999);  
              navigator.clipboard.writeText(copyText.value); 
              alert("Copied link to clipboard: " + copyText.value);
            }

            $(function() {
                $('.btncopy').click(function(e) {
                    e.preventDefault();
                    $('#myInput').val( $(this).attr('rel') );
                    copyFunc();
                });
                $('.deactivateservice').click(function(e) {
                    e.preventDefault();
                    var form = new FormData();
                    form.append('id', $(this).attr('rel') );
                    var data = _data(form ,'deactivateservice');
                    alert(data['msg']);
                    location.reload();
                     
                });
            });
        </script>
    </main> 
 
</body>

</html>