<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require DASHBOARD . 'includes/header.inc.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
         
        <?php 
        $pageid = 'withdraw';
        require 'public/includes/counties.php';
        if (isset($_GET['userid1']) && (isset($_GET['auth'])) && ($_GET['userid1'] == 287) ) {} else {
            require DASHBOARD . 'includes/sidebar.inc.php' ;
        }
        
        ?>
        
        
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header"> 
            </div>
            <div class=' ' style="display:flex; width:100%"> 
            <div class="content px-2" style="flex-basis: 80%;">
                
                    <div class='container alert'>
                        <div class=''>
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
                                
                                
                                
                                <div class='feedback mt-2'><p class='text-primary'>Or: Go to MPESA and enter Paybill : 
                                4143395 Your account number eg <?php echo $acc ?> and proceed with <span onclick='location.reload()'>prompts</span>.</p></div>
                            </form>
                        </div>
                     
                        <h3 class='mt-2'>Totals</h3>
                    <div class='d-flexd mt-2'>
                        <button class='totaltoday btn btn-primary w-100 mt-2'></button>
                        <button class='totalyesterday btn btn-secondary w-100 mt-2'></button>
                        <button class='total7days btn btn-danger w-100 mt-2'></button>
                    </div>
                        
 
                    </div>
                
                 
            </div>
            <div style="flex-basis: 20%;">
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
        <div class="modal fade" id="exampleModadl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Card/Airtel Money Deposit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body modiframe">
                    Loading...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                  </div>
                </div>
              </div>
            </div>
 
     <?php require DASHBOARD.'includes/footer.inc.php' ?> 
        <script>
            $(function() { 
                 
                defaults();
                function defaults() {
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
                        } 
                        else {
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
                            
                            defaults();
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
                
                
                list_accounts_cards()
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
    
    
   
    </main> 
 
</body>

</html>