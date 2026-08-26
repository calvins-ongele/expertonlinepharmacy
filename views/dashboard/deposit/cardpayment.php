<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require DASHBOARD . 'includes/header.inc.php' ?>
        <script src="https://www.paypal.com/sdk/js?client-id=AZZhY88SOF9wanuoI_YuX3FfVPeOHmXvqaeXvCpuI6BjBUq1iX-jIQ2Yb_jTg8b7_o5J67DFVXAuiAOL&currency=USD"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
         
        <?php 
        $pageid = 'withdraw';
        require 'public/includes/counties.php';
        require DASHBOARD . 'includes/sidebar.inc.php' ?>
        
        
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header"> 
            </div>
            <div class="content px-2">
                
                    <div class='container alert'>
                        <div class=''>
                            <form id='xnewpesapa'>
                                
                                
                                <center>
                                    <div class=''>
                                        <h4>We will add transaction fees to the payment amount</h4>
                                    </div>
                                    <div id="paypal-button-container" style='margin-top:10%;'></div></center>
                                
                                <div class='feedback mt-2'></div>
                            </form>
                        </div>
                     
                        
                        
 
                    </div>
                
                 <div class='respons'></div>
            </div>
        </div>
      
        
        <?php require DASHBOARD.'includes/footer.inc.php' ?> 
<?php file_put_contents("public/pypal{$_SESSION['userid']}.json", json_encode($_GET) ); ?>
        <script>
    //////////////////////////////////////jquery ////////////////////////
            
            $(function() {
                const account = "<?php echo $_GET['link'] ?? '2000000000' ?>";
                const email = "<?php echo $_GET['email'] ?? '00' ?>";
                const amount = "<?php echo $_GET['amount'] ?? '00' ?>";
                 
                paypal.Buttons({
                  // Order is created on the server and the order id is returned
                  createOrder: function() {
                    return $.ajax({
                      url: '/myapp/createorder',
                      method: 'POST', 
                      dataType: 'json',
                      data: {account: account, email:email, amount:amount },
                    }).then(function(response) { 
                        //console.log(response);
                        //$('.respons').html(response);
                      return response['id'];
                    });
                  },
                  // Finalize the transaction on the server after payer approval
                  onApprove: function(data) {
                    return $.ajax({
                      url: '/myapp/capturepayment',
                      method: 'POST',
                      dataType: 'json',
                      //contentType: 'application/json',
                      data: {orderID:data.orderID, account: account, email:email, amount:amount },
                       
                    }).then(function(orderData) {
                        if ( orderData['ptype'] == 'video') {
                            location.href=`${orderData['rturn']}`;
                            return;
                        }
                       location.href = '/services/thankyou/'+orderData['ref']+'?amount=' + orderData['amount'] + '&ref=' + orderData['ref'];
                    });
                  }
                }).render('#paypal-button-container');
        
            });

    
 
    </script>
    
    </main> 
 
</body>

</html>