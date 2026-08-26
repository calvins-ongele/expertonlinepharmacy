<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <?php require 'public/includes/header.inc.php'; ?>
     <?php
        $img = $this->data['s_pic'];
        if (@file_get_contents("https://cdn.miziziclassifieds.com/images/classiefieds/$img") == false) 
            $img = 'avatardefault_92824.webp';
        $pc = 0;
        if ($this->data['s_contributed_amount'] > 0) {
            $pc = ($this->data['s_contributed_amount'] / $this->data['s_target_amount']) * 100;}
        
    
    ?>
    
        <meta name='description' content="<?php echo CustomFunctions::trimTitle(strip_tags($this->data['s_explanation']),70) ?>">
        <meta property='og:description' content="<?php echo CustomFunctions::trimTitle(strip_tags($this->data['s_explanation']),70) ?>">
        <meta property='og:image' content='https://cdn.miziziclassifieds.com/images/classiefieds/<?php echo $img ?>'>
        <meta property='og:image:width' content="<?php echo getimagesize("https://cdn.miziziclassifieds.com/images/classiefieds/$img")[0] ?>">
        <meta property='og:image:height' content="<?php echo getimagesize("https://cdn.miziziclassifieds.com/images/classiefieds/$img")[1] ?>">
</head>
<body>
    <!-------------------------header----------------------------->
    <header>
        <?php $page_id = 'contact';  require 'public/includes/navbar.inc.php'; ?>
        <style>
            .sub-subheader { 
                background:var(--blend);
            }
           
            .hidden-text { display: none; }
            .see-more-btn { color: blue; cursor: pointer; }
        </style>
           <style>
            .hero-img {
                position: relative;
                width: 100%;
                height: 400px; /* or any other fixed or responsive height */
                background-image: url('https://cdn.miziziclassifieds.com/images/classiefieds/<?php echo $img; ?>');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
            }
            
            .centered-img {
                max-width: 100%;
                max-height: 100%;
                object-fit: contain; /* This will keep the image's aspect ratio */
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Optional: shadow to make the image stand out */
            }
          </style>
    </header>
    <!-------------------------body----------------------------->
    <section class="container-fluid cotact-page-main-section">
       
            <section class="sub-sectiosn sub-subheaders hero-img " style='background:rgba(0,0,0, 0.3)!important' >
                <?php if (!empty($img)) { ?>
                <img class='centered-img card-img-top'src='https://cdn.miziziclassifieds.com/images/classiefieds/<?php echo $img;  ?>'>
                <?php } else { ?>
                    <h1 class="text-center"><?= $this->data['s_title'] ?></h1>
                <?php } ?>
               
            </section>
      
    
    
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-12" style='margin-top:-16%'>
                    <div class="alert card mt-3 mb-3"> 
                    <?php if (!empty($img)) { ?>
                    <h1><?= $this->data['s_title'] ?></h1>
                    <?php } else { ?>
                    <h3><?= $this->data['s_title'] ?></h3>
                    <?php } ?>
                      
                    <?php $text = explode('</p>', str_replace('&nbsp;', '', $this->data['s_explanation']) ); ?>
                    <p class="content">
                        <?php echo $text[0] . '</p>' ?>
                        <span class="hidden-text"> 
                            <?php for($i = 1; $i < count($text); $i++ ) { 
                                    if ( ($text[$i] == '<p>&nbsp;')  ) { continue;}  
                                    $t =  $text[$i] . '</p>';  
                                    echo str_replace('<p></p>', '', $t);
                            } ?>
                        </span>
                    </p>
                        <span class="see-more-btn">See More</span>
                    <hr>
                    
                    <section class='table-responsive'>
                        <form id='getticket'> <input type='hidden' name='id' value='<?php echo $this->uri ?>'>
                        <table class="table table-striped table-hover table-bordered">
                               
                                <tbody id='tbodyx'>
                                    <?php   
                                    
                                        $i = 0; foreach ($this->variations as $row) { $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?> <input type='hidden' name='rando[]' value='<?php echo $row['ev_rand_id'] ?>'> </td>
                                            <td> <input type='hidden' name='name[]' value='<?php echo $row['ev_name'] ?>'>
                                                <?php echo $row['ev_name']; ?> 
                                                [<span style='font-size:12px;color:grey'>Sales end on <?php echo $row['ev_enddate']; ?> </span>]
                                            </td>
                                            <td><?php echo $row['ev_desc']; ?></td>
                                            <td>KES <?php echo number_format($row['ev_price']); ?> </td>
                                            
                                            <td>
                                                <select required name='taken[]' rel='<?php echo $row['ev_ID'] ?? ''; ?>' style='min-width:50px' >
                                                    <option >0</option>
                                                    <option value='1'>1</option>
                                                    <option value='2'>2</option>
                                                    <option value='3'>3</option>
                                                    <option value='4'>4</option>
                                                    <option value='5'>5</option>
                                                    <option value='6'>6</option>
                                                    <option value='7'>7</option>
                                                    <option value='8'>8</option>
                                                    <option value='9'>9</option>
                                                </select>
                                                 
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            
                            <div align='right'>
                                <button class='btn btn-blocsk btn-success' style='color:white;min-width:200px;'>Get Ticket</button>
                                <div class='mt-1 mb-1 feeb'></div>
                            </div>
                            </form>
                    </section>
                    
                        
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>            
        </div>
    </section> 
</body>

<div class="modal" id='completeBooking' tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Complete booking #<span class='text-danger ' style='font-size:14px;'><?php echo $this->data['s_title'] ?></span> </h5> 
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          
          <section class='alert alert-sm' style="max-height: 400px; overflow:auto">
              <form   method="POST" class=" mb-3" id="payticket">
                  
                  <section id='moreinfo'></section>
                  
                  
                  <hr>
                  <h4>Payment Information</h4>
                <div class='row'> 
                <div class='col-md-6'>
                    <div class="form-group">
                        <label>Select how to contribute</label>
                        <select name='type'  class="form-control howtocontribute" required >
                           
                            <option value='Mpesa Balance'>Mpesa Account</option>
                            <?php if (Session::get('userid') != null) { ?>
                            <option value='Mizizi Balance'>MiziziClassifieds Account</option>
                            <?php } ?>
                            <!--<option value='ATM Card/Paybal'>ATM Card/Paybal Account</option>-->
                        </select>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class="form-group">
                        <label>Amount in KES:   </label>
                        <input type='hidden' name='uri' class="uri form-control" value='<?php echo $this->data['s_url'] ?>'>
                        <input type='number' name='amount' class="amount_tot form-control" required>
                    </div>
                </div>
                 
                
                <div class='col-md-12'>
                    <div class="form-group">
                        <label>Phone number to pay with:</label>
                        <input type='number' name='phone' class=" phone_tot form-control" required>
                    </div>
                </div> 
                  
              
                
                
                <div class='col-md-12'>
                    <div class="form-group" > 
                        <input type="submit" class="btn btn-block btn-primary" value='Pay Now'>
                    <div class='mt-1 mb-1 feebb'></div>
                    </div>
                </div>
                
                
                <div class="feedback"></div> 
                <div id='toolkit' class='hidden'>
                    <h5>Pay with Mpesa Toolkit</h5>
                     <iframe style='min-width:350px' src='/private.php?uri='></iframe>
                    
                </div>
                
                </div>
            </form>
          </section>
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>

<!-------------------------footer----------------------------->

<?php require 'public/includes/footer.inc.php'; ?>
<script>
        $(document).ready(function() {
            var content = $(".content");
            var text = content.html(); 
            console.log(text)
            var maxWords = 300;

            // Split the text into words
            var words = text.split(" ");
            
            if (words.length > maxWords) {
                var visibleText = words.slice(0, maxWords).join(" ");
                var hiddenText = words.slice(maxWords).join(" ");

                content.html(visibleText + ' <span class="hidden-text">' + hiddenText + '</span>');
                $(".see-more-btn").show();
            }

            $(".see-more-btn").click(function() {
                var btn = $(this);
                var hiddenPart = $(".hidden-text");

                if (hiddenPart.is(":visible")) {
                    hiddenPart.hide();
                    btn.text("See More");
                } else {
                    hiddenPart.show();
                    btn.text("See Less");
                }
            });
        });
    </script>
</html> 
 