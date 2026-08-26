<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require DASHBOARD. 'includes/header.inc.php' ?>  
    <style>
        .hidden {
            display:none;
        }
        .dispboth {
            display:flex;
            justify-content:space-between;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
        
        <?php 
        $pageid = 'profile';
        
        require DASHBOARD. 'includes/sidebar.inc.php' ?>
        
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header">
                <h1>Change or provide personal details</h1>
            </div>
            <div class="content px-2">
                
                <div class='container'><hr></div>
                
                
                <div class='container'>
                    <h4>Please provide honest details</h4>
            
                    <form id='walletdeposit'>
                        <div class='form-group'>
                            <div class='row'>
                                <!--------------------------------->
                                <?php $me = $this->_me; ?>
                                <div class='col-md-6 mb-3'>
                                    <label>First Name</label>
                                    <input class='form-control udata' rel='user_fname'  value='<?php echo $me['user_fname'] ?>'>
                                    <span class='user_fname'></span>
                                </div>
                                <div class='col-md-6 mb-3'>
                                    <label>Last Name</label>
                                    <input class='form-control udata' rel='user_lname'  value='<?php echo $me['user_lname'] ?>'>
                                    <span class='user_lname'></span>
                                </div>
                                <div class='col-md-6 mb-3'>
                                    <label class='dispboth'><span>Email</span> <?php if ($me['user_email_verified'] == 0) { echo "<a href='#' class='VerifyEmail btn btn-sm btn-success'>Verify Now</a> ";} else {echo "<span class='text-success'>Verified</span>";} ?></label>
                                   
                                    <input class='form-control udata' rel='user_email'  value='<?php echo $me['user_email'] ?>'>
                                    <span class='user_email'></span>
                                </div>
                                <!--------------------------------->
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Tel</span> 
                                    <?php if ($me['user_tel_verified'] == 0) {echo "<a href='#' class='VerifyPhone btn btn-sm btn-success'>Verify Now</a> ";} else {echo "<span class='text-success'>Verified</span>";} ?></label>
                                   
                                    <input  class='form-control udata' rel='user_tel'  value='<?php echo $me['user_tel'] ?>'>
                                    <span class='user_tel'></span>
                                </div> 
                                <div class='col-md-6 mb-3'>
                                    <label>License,kra pin or Registration certificate - needed <img id='previmg' src='<?php echo "/home/mizizipa/cdn.miziziclassifieds.com/images/classiefieds/{user_taxpin}" ?>' style='height:20px; width:20px;'> <span  class='hidden imgloader'></label>
                                    <input type='file' accept='image/*' id='celeb_img' class='form-control udata' rel='user_taxpin'  value='<?php echo $me['user_taxpin'] ?>'>
                                    <span class='user_taxpin'></span>
                                </div>   
                                <div class='col-md-6 mb-3'>
                                    <label>Your Role</label>
                                    <input  class='form-control ' value='<?php echo $me['user_role'] ?>'>
                                   
                                </div>
                                <!--------------------------------->
                                 <div class='col-md-12 mb-3 mt-3'>
                                   
                                   <hr>
                                   <div class='row'>
                                       <div class='col-md-6'><h2>Become an affilliate? </h2></div>
                                       <div class='col-md-6'>
                                           <label class="toggle-switch">
                                                <input type="checkbox"  <?php echo $me['user_aff_status'] == 'True' ? 'checked':' ' ?> />
                                                <span class="slider"></span>
                                            </label>
                                       </div>
                                   </div>
                                    

                                   
                                </div>
                                <section class='col-md-12 mb-3 mt-3 aff <?php echo $me['user_aff_status'] == 'True' ? '':'hidden' ?> '>
                                     <div class='row     mb-2' >
                                         <div class='col-md-6 '>
                                                <label>Affilliate code <?php echo $me['user_aff_status'] ?> </label>
                                                <input class='form-control' type='text' value='<?php echo $me['user_aff_code'] ?>' > 
                                            </div>
                                            
                                            <div class='col-md-6 '>
                                                <label>Sharable link</label>
                                                <input class='form-control' type='text' value='https://www.miziziclassifieds.com/?aff=<?php echo $me['user_aff_code'] ?>' > 
                                            </div>
                                         
                                     </div>
                                     
                                     <div class='card p-3' >
                                         <div class='card-head alert-success'><h3 class='text-center'>Users you have referred</h3></div>
                                         <div class='card-body' style='max-height:500px;overflow:auto'>
                                             <table class='table'>
                                                 <thead>
                                                     <tr>
                                                         <th>Name</th>
                                                         <th>Phone</th>
                                                         <th>Email</th>
                                                         <th>Date</th>
                                                     </tr>
                                                 </thead>
                                                 
                                                 <tbody>
                                                     <?php foreach($this->refusers as $row) { ?>
                                                     <tr>
                                                         <td><?php echo "{$row['user_fname']} {$row['user_lname']}" ?></td>
                                                         <td><?php echo CustomFunctions::maskPhoneNumber($row['user_tel']) ?></td>
                                                         <td><?php echo CustomFunctions::maskEmail($row['user_email']) ?></td>
                                                         
                                                         <td><?php echo date( 'd.m.y', $row['user_datecreated'] ) ?></td>
                                                     </tr>
                                                     <?php } ?>
                                                 </tbody>
                                                 
                                             </table>
                                         </div>
                                     </div>
                                 </section>
                                
                                 
                                
                            </div>
                        </div>
                    </form>
                </div>
                 
            </div>
        </div>
        
        
        <?php require DASHBOARD.'includes/footer.inc.php' ?>
        <script>
            $(function() {
                
                $('#verify_email_phone').submit(function(e) {
                    e.preventDefault();
                    const data = _data(new FormData(this), 'verify_email_phone' );
                    $('.feedback').removeClass('alert-danger');$('.feedback').removeClass('alert-success');
                    
                    $('.feedback').html(data['msg']);
                    if (data['error'] == 'true') 
                        $('.feedback').addClass('alert alert-sm alert-danger mt-2');
                    else $('.feedback').addClass('alert alert-sm alert-success mt-2');
                })
                
                $('.btnsend').on('click', '.sendPin', function() {
                    const form = new FormData( $('#verify_email_phone')[0] );
                    const data = _data(form, 'send_verify_email_phone' );
                    
                    $('.btnsend button').removeClass('sendPin');
                    coundown();
                });
                
                
                function coundown() {
                    let tot = 59;
                    
                    let intv = setInterval(function() {
                        tot -= 1;
                        $('.btnsend button').text(`Try again in ${tot}`);
                    }, 1000);
                    
                    setTimeout(function() { 
                        $('.btnsend button').addClass('sendPin');
                        $('.btnsend button').text(`Get Pin`);
                        clearInterval(intv);
                    }, 59000);
                    
                    
                }
                
                $('.VerifyPhone').click(function(e) {
                    e.preventDefault();
                    $('#verifyphoneModal').modal('show');
                    $('.modal-title').text("Verify your Phone Number");
                    $('.type').val('tel');
                });
                
                $('.VerifyEmail').click(function(e) {
                    e.preventDefault();
                    $('#verifyphoneModal').modal('show');
                    $('.modal-title').text("Verify your Email");
                    $('.type').val('email');
                });
                
                $(".toggle-switch input").on("change", function() {
                    if ($(this).is(":checked")) {
                        //console.log("Toggle is ON");
                        $('.aff').removeClass('hidden');
                        var form = new FormData();
                        form.append('aff', 'True');
                        _data(form, 'change_aff');
                    } else {
                        $('.aff').addClass('hidden');
                        //console.log("Toggle is OFF");
                        var form = new FormData();
                        form.append('aff', 'False');
                        _data(form, 'change_aff');
                    }
                });
                
                
                 celeb_img.onchange = evt => {
                  //$('.imgloader').removeClass('hidden');
                  const [file] = celeb_img.files
                  if (file) {
                    previmg.src = URL.createObjectURL(file);
                    let form_data = new FormData();
                    form_data.append('file', file); 
                    const data = _data(form_data, 'update_taxpin');
                    //$('.imgloader').addClass('hidden');
                   
                     $('.user_taxpin').html(`<p style='color:red;background:lighgrey;padding:5px'> ${data['msg']}</p>`);
                  
                  }
                }
                
            })
        </script>
    
    </main> 
 
</body>
<style>
    /* Container for the toggle */
.toggle-switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 24px;
}

/* Hide default checkbox */
.toggle-switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

/* The track */
.slider {
    position: absolute;
    cursor: pointer;
    background-color: #ccc;
    border-radius: 24px;
    width: 100%;
    height: 100%;
    transition: background-color 0.3s;
}

/* The circular slider */
.slider::before {
    content: "";
    position: absolute;
    height: 20px;
    width: 20px;
    left: 4px;
    bottom: 2px;
    background-color: white;
    border-radius: 50%;
    transition: transform 0.3s;
}

/* Toggled state */
.toggle-switch input:checked+.slider {
    background-color: #4caf50;
}

.toggle-switch input:checked+.slider::before {
    transform: translateX(26px);
}
</style>
<div class="modal" id='verifyphoneModal' tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Verify </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <section class='alert alert-sm'>
              <form   method="POST" class=" mb-3" id="verify_email_phone"> 
             
                <div class='row'> 
               
                <div class='col-md-6'>
                    <div class="form-group">
                        <label>Pin for verification  </label>
                        <input type='hidden' name='type' class="type form-control" value=''>
                        <input type='number' name='pin' class="verify_pin form-control" required>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class="form-group btnsend">
                        <label>Send Verification Pin  </label> 
                        <button class='form-control btn btn-success sendPin' type='button' >Get Pin</button>
                    </div>
                </div>
                  
                <div class='col-md-12'>
                    <div class="form-group" > 
                        <input type="submit" class="btn btn-block btn-primary" value='Verify Now'>
                  
                    </div>
                </div> 
                <div class="feedback"></div>  
                
                </div>
            </form>
          </section>
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
</html>