<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'public/includes/header.inc.php' ?>
</head>

<body>

    <?php require "public/includes/navbar.inc.php" ?>
    <!-- ==================== Header End Here ==================== -->
    <main>
        
     <!-- ==================== Breadcrumb Start Here ==================== -->
        <section class="breadcrumb py-120 bg-img" data-background-image="<?= $this->_company['breadcrumb_bg'] ?>">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="breadcrumb__wrapper">
                            <h2 class="breadcrumb__title"> Our Paybill</h2>
                            <ul class="breadcrumb__list">
                                <li class="breadcrumb__item"><a href="index.html" class="breadcrumb__link"> <i
                                            class="las la-home"></i> Home</a> </li>
                                <li class="breadcrumb__item"><i class="fa-solid fa-angle-right"></i></li>
                                <li class="breadcrumb__item"> <span class="breadcrumb__item-text"> Our Paybill </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     <!-- ==================== Breadcrumb Start Here ==================== -->
       <!-------------------------body----------------------------->
    <section class="container-fluid cotact-page-main-section" >
        
                
           
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="alert card mb-3" >
                        
                        <?php if (Session::get('userid') == null ) { ?>
                        
                        <div class='card alert' style='border: 1px solid var(--blend); '>
                            
                            <h5 class='text-black-50' >We provide seamless collection services for our merchant clients, regardless of industry.</h5>
                            <p class='text-black-50'>Please login to use the service...</p>
                            
                          <div class='d-flex justify-content-around align-items-center gap-2'>
                              <a href='/login?return=<?= urlencode("/paybill") ?>' class='btn w-100 form-control btn--base ' >Login</a>  
                              <div style="width:20px"></div>
                              <a href='/signup?return=<?= urlencode("/paybill") ?>' class='btn btn-secondary w-100' >Create account</a>  
                          </div>
                                    
                            
                        </div>
                        <?php } else { ?>
                        <div class='containerx alertx'>
                            <div style="display:flex; width:100%">
                                <div style="flex-basis: 80%;">
                
                        <div class='card alert' style="background:lightgrey">
                            <form id='newdeposit'  method='GET'>
                                <!--<input type='hidden' name='url' class='form-control'   value='<?php echo $this->data['v_url'] ?? '' ?>' >-->
                                <input type='hidden' name='email' class='form-control'   value='<?php echo Session::get('email') ?>' >
                                <input type='hidden' name='type' class='form-control'   value='deposit' >
                                
                                <div class='row'>
                                    <div class='col-md-12 mb-3'>
                                        <div class='form-group'>
                                            <label>Amount to depsit</label>
                                            <input type='text' name='amount' class='form-control' required value='<?php echo $this->data['v_title'] ?? '' ?>' >
                                        </div>
                                    </div> 
                                </div>
  
                                <div class='row'>
                                    <div class='col-md-12 mb-3'>
                                        <div class='form-group'>
                                            <label>Mpesa Phone Number</label>
                                            <input type='tel' name='phone' class='form-control' required  >
                                        </div>
                                    </div> 
                                </div>
                                
                               
                                <div class='form-group mb-3'>
                                    <label>Account number <span>[Required]</span></label>
                                    <div class=' '>
                                        
                                        <select class='form-control accountselect' required name='account'  > 
                                        <?php $acc = ''; foreach($this->accounts as $row) { if ($row['cur'] != 'KES' || ($row['set_type'] != 'Owner') ) continue;
                                            $acc = $row['acc'];
                                        ?>
                                            <option value='<?php echo $row['acc'] ?>'><?php echo "{$row['acc']} - Bal: {$row['cur']} {$row['bal']}" ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <div class='row'> 
                                    <div class='col-md-12 mb-3'>
                                        <div class='form-group'> 
                                            <input type='submit'  class='form-control btn btn-success' value='Send Prompt'>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                <div class='feedback mt-2'><p class='text-primary'>Or: Go to MPESA and enter Paybill : 4143395 Your account number eg <span id='acc'></span> and proceed with prompts.</p></div>
                            </form>
                        </div>
                        
                           <h3 class='mt-2'>Totals</h3>
                            <div class='d-flexd mt-2'>
                                <button class='totaltoday btn btn-primary w-100 mt-2'></button>
                                <button class='totalyesterday btn btn-secondary w-100 mt-2'></button>
                                <button class='total7days btn btn-danger w-100 mt-2'></button>
                            </div>
                            
                            
                             </div>
                             <div style="flex-basis: 2%;"></div>
                                 <div style="flex-basis: 18%;">
                                    <div class='pl-1 alert-warning' style="height:400px; overflow:auto; font-size:10px">
                                        <h5>Deposits</h5>
                                        <div class='txs_D'> </div>
                                    </div>
                                    <div class='pl-1 alert-warning ' style="height:200px; overflow:auto; font-size:10px; ">
                                        <h5 style="border-top:3px solid green; font-size:15px">Withdrawals</h5>
                                        <div class='txs_W'> </div>
                                    </div>
                                    
                                        
                                </div>
                          </div>
                          </div>
                        <?php } ?>
                        
                   
                       
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>            
        </div>
      
             
    </section> 
        
    </main>
    <!-- ==================== Footer Start Here ==================== --> 
    <?php require "public/includes/footer.inc.php" ?>
 
<script src="/public/js/main.js?v=1"></script>
 <script>
            $(function() {   
                
                defaults();
                function defaults() {
                    list_accounts_cards();
                    transactions();
                    transactions('today', 'transactions', 'W');
                    totals(); 
                }
                
                function transactions(p = 'today', type = 'transactions', withd = 'D') {
                    let form = new FormData(); 
                    form.append('period', 'custom');
                    form.append('days', withd=='D' ? '3' : '30');
                    form.append('type', type);
                    form.append('fetch', withd);
                    const data = _data(form, 'view_transactions');
                    
                    let htm = '';
                    let objects = groupByDate(data['data']);
                    
                    for (const key in objects) {
                        console.log(key)
                        const bdata = objects[key];
                        htm += `<h6>${key}</h6>`;
                        
                        for(let i = 0; i < bdata.length; i++ ) {
                            let j = i + 1;
                            const ldata = bdata[i];
                            const tid = maskString(ldata['TransID'], 3, 3,  2);
                            
                            htm += `<li>${tid}, <span>Amount</span>: <bold>${ldata['TransAmount']}</bold>, 
                            <span>From</span>: <bold>${ldata['MSISDN']}</bold>  </li> <hr>`;
                        }
                    }
                    
         
                    
                    $('.txs_' + withd).html(htm);
                }
                function groupByDate(records) {
                    const today = new Date();
                    const todayStr = today.toISOString().slice(0, 10);
                
                    const yesterday = new Date();
                    yesterday.setDate(today.getDate() - 1);
                    const yesterdayStr = yesterday.toISOString().slice(0, 10);
                
                    const groups = {};
                
                    for (const r of records) {
                        let label;
                
                        if (r.trans_date === todayStr) {
                            label = "Today";
                        } else if (r.trans_date === yesterdayStr) {
                            label = "Yesterday";
                        } else {
                            // Format e.g. "9 Dec"
                            const d = new Date(r.trans_date);
                            const day = d.getDate();
                            const month = d.toLocaleString("en-US", { month: "short" });
                            label = `${day} ${month}`;
                        }
                
                        if (!groups[label]) groups[label] = [];
                        groups[label].push(r);
                    }
                
                    return groups;
                }

                function totals( ) {
                    //today
                    let form = new FormData();
                    form.append('period', 'today');
                    form.append('type', 'total');
                    let data = _data(form, 'view_transactions'); 
                    $('.totaltoday').text("Tod.:"+data['data']+"/-");
                    
                    
                    //yesterday
                    let form1 = new FormData();
                    form1.append('period', 'yesterday');
                    form1.append('type', 'total');
                    let data1 = _data(form1, 'view_transactions'); 
                    $('.totalyesterday').text("Yest.:"+data1['data']+"/-");
                    
                    
                    //7 days
                    let form2 = new FormData();
                    form2.append('period', 'custom');
                    form2.append('days', '7');
                    form2.append('type', 'total');
                    let data2 = _data(form2, 'view_transactions'); 
                    $('.total7days').text("7days:"+data2['data']+"/-");
                    
                }
                
                let conv_id = '';
                let intervalid;
                
                $('#newdeposit').submit(function(e) {
                    e.preventDefault();
                    const data = _data(new FormData(this), 'depositfunds');
                    
                    if (data['error'] != 'true') {
                        //conv_id = data['ordernumber'];
                        confirm_deposit( data['ordernumber'] );
                        $('.feedback').html(data['msg']);
                    } else {
                        alert(data['msg'])
                    }
                    
                });
                
                
                function confirm_deposit(id) {
                    let form = new FormData();
                    form.append('id', id);
                    intervalid = setInterval(()=> {
                        const f = _data(form, 'confirm_deposit');
                        
                        if (f['error'] != 'true') {
                            $("input[name='phone']").val('');
                            $("input[name='amount']").val('');
                            $('.feedback').html(`<p class='text-success'>The deposit was successful</p>`);
                            clearInterval(intervalid);
                            setTimeout(()=> { 
                                defaults();
                            }, 2000);
                            
                        } else {
                            $('.feedback').html(`<p class='text-danger'>${f['msg']}</p>`);
                            
                            if ( (f['msg'] == "Request Cancelled by user.") || (f['msg'] == "The balance is insufficient for the transaction.")  ) {
                                clearInterval(intervalid);
                            }
                            
                        }
                    }, 5000);
                }
                
                
                setInterval(()=> {
                    _data(new FormData(), 'peace')
                }, 600000);
                
                
                
                function list_accounts_cards() {
                  const data = _data(new FormData(), 'list_accounts_cards');
                  $('.accountselect').html(data['output']);
                }
                
                function maskString(str, start = 4, end = 3, stars = 4) {
                    // Ensure it's treated as a string
                    str = String(str);
                
                    // If too short to mask, return as-is
                    if (str.length <= start + end) {
                        return str;
                    }
                
                    const prefix = str.slice(0, start);
                    const suffix = str.slice(-end);
                
                    return prefix + "*".repeat(stars) + suffix;
                }
            });
        </script>
<script>
    $(function() {
        
        setInterval(()=> {
            _data(new FormData(), 'peace');
        }, 100000)
        
        $('.lg_form1').submit(function(e) {
            e.preventDefault();
            let form = new FormData(this);
            form.append('form', 'fly');
            const data = _data(form, 'processlogin' );
            $('.info').html(data['msg']);
            if (data['error'] == 'false') {
                $('body').html(`<script>location.reload()<\/script>`);
            }
        });
        
        $('.register_form1').submit(function(e) {
            e.preventDefault();
            let form = new FormData(this);
            form.append('form', 'fly');
            const data = _data(form, 'process-signup' );
            $('.info').html(data['msg']);
            if (data['error'] == 'false') {
                $('body').html(`<script>location.reload()<\/script>`);
            }
        });
        
    });
</script>
 <script>
        let pullStart = null;
        const PULL_THRESHOLD = 100; // Minimum downward distance in pixels to trigger a refresh
        
        // 1. Capture the starting Y coordinate when the user first touches the screen
        document.addEventListener('touchstart', (event) => {
          // Only consider a single touch event
          if (event.touches.length === 1 && window.scrollY === 0) {
            pullStart = event.touches[0].clientY;
          }
        });
        
        // 2. Track the movement of the finger
        document.addEventListener('touchmove', (event) => {
          if (pullStart === null) return;
        
          const currentY = event.touches[0].clientY;
          const pullDelta = currentY - pullStart;
        
          // Check if the user is pulling down (pullDelta > 0) and has exceeded the threshold
          if (pullDelta >= PULL_THRESHOLD) {
            // Prevent the default browser pull-to-refresh action
            event.preventDefault();
            // Trigger the page reload
            window.location.reload();
          }
        }, { passive: false }); // Using passive: false to allow preventDefault()
        
        // 3. Reset the start point when the touch ends or is cancelled
        document.addEventListener('touchend', () => {
          pullStart = null;
        });
        
        document.addEventListener('touchcancel', () => {
          pullStart = null;
        });
    </script>
</body>

</html>