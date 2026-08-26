<!DOCTYPE html>
<html lang="en-US">

<head>
  <?php require 'public/includes/header.inc.php'; ?> 
  <style>
        .main-header .main-navbar {
            background: hsl(var(--black));
            padding: 0;
        }
  </style>
</head>
 
<body class="publication-the-star ">
  <?php $page_id = 'login'; require 'public/includes/navbar.inc.php'; ?>
         
    <main>
        <section class="properties-two-section py-120">
           <div class="container">
               <div class="row"> 
                   <div class="col-md-8">
                        <div class='product'> 
                            <?php 
                            require 'public/includes/counties.php';
                            
                                $imgs = explode(',',$this->data['p_images']);
                                $heights = 0;
                                $img_1 = explode(',',$this->data['p_images'])[0];
                                foreach ($imgs as $img) {
                                    if (@file_get_contents("https://cdn.miziziclassifieds.com/images/classiefieds/$img") == false) continue; 
                                    $image_size_array = @(getimagesize("https://cdn.miziziclassifieds.com/images/classiefieds/$img" ));
                                   
                                   if (($image_size_array[1]??0) > $heights ) {
                                       $heights = $image_size_array[1]??0 ;
                                       $img_1 = $img;
                                   } 
                            
                                }
                            
                                
                              
                            ?> 
                            <div class='card m-3 p-4'>
                               
                                <form id='payforproduct'>
                                    <input type='hidden' name='pid' class='urll' value='<?php echo $this->data['p_url'] ?>'>
                                    <input type='hidden' name='discountid' class=' ' value='<?php echo $this->data['d_url'] ?? '' ?>'>
                                    <input value='<?php echo $_COOKIE['ref'] ?? '' ?>' type='hidden' name='ref' class='form-control'>
                                <div class='table-responsive'>
                                    <table class='table table-bordered'>
                                        <thead>
                                            <tr>
                                                <th>Product Pic</th>
                                                <th>Title</th>
                                                <!--<th>Price</th>-->
                                                <!--<th>Your&nbsp;Phone&nbsp;Number</th>-->
                                                <!--<th>Action</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img style='height:60px;width:auto' src='https://cdn.miziziclassifieds.com/images/classiefieds/<?php echo $img_1 ?>' ></td>
                                                <td><?php echo $this->data['p_title'] ?></td>
                                                <!--<td><input value='<?php echo $this->data['d_price'] ?? $this->data['p_price'] ?>' name='price' class='form-control'></td>-->
                                                <!--<td><input value='<?php echo $this->_me['user_tel']??"" ?>' name='phone' class='form-control'></td>-->
                                                <!--<td>-->
                                                <!--    <button type='submit' class='btn btn-block btn-primary' >Pay Now</button>-->
                                                <!--</td>-->
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-between border-bottom mt-3">
                                        <h4><bold>Total</bold></h4>
                                        <h4><bold>KES <?= number_format($this->data['d_price'] ?? $this->data['p_price']) ?></bold></h4>

                                    </div>
                                    
                                    <div class='form-group'>
                                        <!-- <label>Amount to pay</label> -->
                                        <input type='hidden' value='<?= $this->data['d_price'] ?? $this->data['p_price'] ?>' name='price' class='form-control'><br>
                                        
                                        
                          
                                    <label>Select how to Pay</label>
                                    <select name='type'  class="form-control howtocontribute" required >
                                        <option hidden >Select type</option>
                                        <option value='Mpesa Balance'>Mpesa Account</option>
                                        <?php if (Session::get('userid') != null) { ?>
                                        <option value='Mizizi Balance'>MiziziClassifieds Account</option>
                                        <?php } ?>
                                        <option value='ATM Card/Paybal'>ATM Card/Paybal Account</option>
                                    </select>
                    
                                        <label>Phone number</label>
                                        <input value='<?php echo $this->_me['user_tel']??"" ?>' name='phone' class='phonee form-control'><br> 
                                    </div>
                                    
                              
                                    <div class='form-group'>
                                        <label>Product Location</label>
                                        <select type='text' name='county' class='countty form-control' required>
                                            <option value=''>Select Location</option>
                                            <?php foreach($counties as $r) { ?>
                                            <option value='<?php echo $r ?>'><?php echo $r ?></option> 
                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                                    <div class='form-group'> 
                                        <label>Precise Town/Location for Delivery</label>
                                        <div class='d-flex bd-highlight'>
                                            <div class="p-2 flex-fill bd-highlight">
                                            <input value='' name='locationSpecific' id='messageLocation' class='locationSpecific form-control'></div>
                                             <div class="p-2 flex-fill bd-highlight">
                                                 <button type="button" class="btn btn-secondary" id="locationButton"><i class="fa fa-map-marker"></i> Attach location</button></div>
                                        </div>
                                        
                                        <br>
                                        <?php if (Session::get('userid') == null) { ?>
                                        <a href="/login?return=<?= CustomFunctions::formatDynamicUrl('login',1) ?>"  class='btn btn-block btn-primary' >Login to continue</a>
                                        <?php } else { ?> 
                                        <button type='submit' class='btn form-control ' style="background: hsl(var(--base));" >Pay Now</button>
                                        <?php } ?>
                                    </div>
                                    
                                    <div class='feedback m-3'></div> 
                                    <p class='alert alert-sm alert-danger'>
                                        Your payment will be with-held until the seller delivers the item.
                                    </p>
                                </div>
                                </form>
                                
                                
                               
                              
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-4">
                         
                        <div class='card m-3 p-4'>
                            
                            <div class="introfeed" style="border:none">
                                <div class="img"> <img src="/public/assets/system/download.jpeg" class="avatar" alt="<?php echo $this->data['user_fname'] . ' '.$this->data['user_lname'] ?>"></div>
                                <div class="post">
                                    <a href="#/dashboard/02Q" class=" "><?php echo $this->data['user_fname'] . ' '.$this->data['user_lname'] ?><br>
                                   <span style="color:initial;font-size:10px">Verified Profile  </span>
                                   </a> 
                                   </div>
                            </div>
                            
                            <div >
                                <?php if (Session::get('userid') == 'ffdfdfdfdfdfdf' ) { ?>
                                <a href='https://wa.me/<?php echo $this->data['user_tel'] ?>' class='btn btn-outline-primary mt-2'><i class='fa fa-phone'></i> <?php echo $this->data['user_tel'] ?> </a><br>
                                
                                <?php } else if (1 == 3) { ?>
                                <a href='?signin=true' class='btn btn-outline-primary mt-2'><i class='fa fa-phone'></i> Negotiate</a><br>
                                <?php } ?>
                                
                                 <a href='/checkout/chat/<?php echo $this->data['user_url'] ?>/<?php echo $this->data['p_url'] ?>/<?php echo Session::get('url') ?>' class='btn mt-2' style="background:hsl(var(--base))" ><i class='fa fa-envelope'></i> Start Chat Now </a><br>
                                
                                <a href='/contact-us?type=abuse&s=<?php echo $this->data['user_url'] ?>' class='btn btn-outline-primary mt-2' style="background:hsl(var(--green))" ><i class='fa fa-phone'></i> Report Abuse</a>
                                
                        </div>
                        </div>
                        <div class='card m-3 p-4'>
                            <h3 class='text-center'>Safety Tips</h3>
                            <div class=''>
                                <li>Pay through our paybill if unsure!</li>
                                <li>Avoid paying in advance, even for delivery</li>
                                <li>Meet with the seller at a safe public place</li>
                                <li>Inspect the item and ensure it's exactly what you want</li>
                                <li>Make sure that the packed item is the one you've inspected</li>
                                <li>Only pay if you're satisfied</li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                               
        </section>
          
    
    <?php require 'public/includes/footer.inc.php';   ?>
    <script>
        $(function() {
            
            
   document.getElementById('locationButton').addEventListener('click', function() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) 
     {
          const latitude = position.coords.latitude;
          const longitude = position.coords.longitude; 
    
    
          // You can use the latitude and longitude to:
          // 1. Display the location on a map
          // 2. Send the location data to a server
          // 3. Use it for other purposes
    
          // For example, to display the location on a map:
          const mapUrl = `https://maps.google.com/?q=${latitude},${longitude}`;
          //window.open(mapUrl, '_blank');
    
          // Or, to send the location data to the server:
          const messageInput = document.getElementById('messageLocation');
          messageInput.value += `https://maps.google.com/?q=${latitude},${longitude}`;
        });
      } else {
        alert("Geolocation is not supported by this browser.");
      }
    });
            
            
            $('table').addClass('table', 'table');
            $('#payforproduct').submit(function(e) {
                 e.preventDefault();
                 
                 if ( $('.howtocontribute').val() == 'ATM Card/Paybal' ) {
                     const email = "<?php echo Session::get('email') ?>";
                     location.href=`/dashboard/card-payment?type=product&email=${email}&url=${$('.urll').val()}&county=${$('.countty').val()}&locationSpecific=${$('.locationSpecific').val()}&phone=${$('.phonee').val()}`;
                     return;
                 }
                 
                const data = _data(new FormData(this), 'pay_product'); 
                $('.feedback').html(data['msg']);
                $('.feedback').addClass(data['msg'] == 'true' ? 'alert alert-danger' : 'alert alert-success')
                
            })
        })
    </script>
    </main>
</body>
 

</html>