
$('.addVariations').click(function(e) {
    e.preventDefault(); 
    const rando = Math.floor(Math.random() * 12500165892650);
    
    $('#tbodyx').append(`
         <tr>
            <td>#</td>
            <td> <input type='hidden' name='rando[]' value='${rando}' >
            <input name='evname[]' value='' placeholder='Eg VIP' > </td>
            <td><input name='desc[]' value='' maxlength='100' ></td>
            <td><input type='number' name='price[]' value='' ></td>
            <td><input type='date' name='date[]' value='' ></td>
            <td> </td>
        </tr>
    
    `);
});

$('.dropVariation').click(function() {
    const id = $(this).attr('rel');
    let form = new FormData();
    form.append('id', id);
    if (confirm("Are you sure?")) {
        const data = _data(form, 'dropVariation');
        alert(data['msg']);
        window.location.reload();
    }
});


 // Click the hidden file input when the button is clicked
    $("#uploadButton").click(function() {
        $("#fileInput").click();
    });

    // Handle file selection and upload
    $("#fileInput").change(function() {
        let file = this.files[0]; // Get the selected file
        let formData = new FormData();
        formData.append("file", file); 
        formData.append("emp",  $('#emp').val() );  

         const data = _data(formData, 'new_emps_excel');  
         
        if (data['error'] == 'false') { 
            location.reload();
            $('#newsalo').trigger('reset');
        } else {
            alert(data['msg'] )
        }
    
    });
    
    
$('#newproduct').submit(function(e) {
    e.preventDefault();
    let form = new FormData(this);
    form.append('body',  CKEDITOR.instances.ckeditor.getData() );
    const data = _data(form, 'newproduct');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').html(data['msg']  ) ;
    if (data['error'] == 'false') {
        CKEDITOR.instances.ckeditor.setData('');
        $('#newproduct').trigger('reset');
    }
});
$('#newsalo').submit(function(e) {
    e.preventDefault();
    let form = new FormData(this); 
    const data = _data(form, 'newsalo');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').html(data['msg']  ) ;
    if (data['error'] == 'false') { 
        location.reload();
        $('#newsalo').trigger('reset');
    }
});
$('.dropEmployee').click(function() {
    const id = $(this).attr('rel');
    let form = new FormData();
    form.append('id', id);
    if (confirm("Are you sure?")) {
        const data = _data(form, 'dropEmployee');
        alert(data['msg']);
        window.location.reload();
    }
});
$('#saveemps').submit(function(e) {
    e.preventDefault();
    let form = new FormData(this); 
    const data = _data(form, 'manageemployees');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').html(data['msg']  ) ;
    if (data['error'] == 'false') { 
        location.reload();
        $('#manageemployees').trigger('reset');
    }
});
$('#saveevent_variation').submit(function(e) {
    e.preventDefault();
    let form = new FormData(this); 
    const data = _data(form, 'saveevent_variation');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').html(data['msg']  ) ;
    if (data['error'] == 'false') { 
        location.reload();
        $('#saveevent_variation').trigger('reset');
    }
});
$('.sendsalaries').click(function(e) {
    e.preventDefault(); 
    let form = new FormData($("#saveemps")[0]);
    
   if (confirm("Are you sure?")) {
        const data = _data(form, 'sendsalaries');
        $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
        $('.feedback').html(data['msg']  ) ;
        if (data['error'] == 'false') { 
            alert(data['msg']);
        }
   }
    
});

$('.addEmployee').click(function(e) {
    e.preventDefault(); 
    
    $('#tbodyx').append(`
         <tr>
            <td>#</td>
            <td><input name='name[]' value='' > </td>
            <td><input name='amount[]' value='' ></td>
            <td><input name='phone[]' value='' ></td>
            <td><select name='status[]'  ><option value='Active'>Active</option><option value='Inactive'  >Inactive</option></select></td>
            <td> </td>
        </tr>
    
    `);
})


$('#editproduct').submit(function(e) {
    e.preventDefault();
    let form = new FormData(this);
    form.append('body',  CKEDITOR.instances.ckeditor.getData() );
    const data = _data(form, 'editproduct');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').html(data['msg']  ) ;
    if (data['error'] == 'false') {
       // CKEDITOR.instances.ckeditor.setData('');
        //$('#editproduct').trigger('reset');
    }
});

$('#newblog').submit(function(e) {
    e.preventDefault();
    let form = new FormData(this);
    form.append('body',  CKEDITOR.instances.ckeditor.getData() );
    const data = _data(form, 'newblog');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').html(data['msg']  ) ; 
});
$('#editvideo').submit(function(e) {
    e.preventDefault();
    let form = new FormData(this);
    form.append('body',  CKEDITOR.instances.ckeditor.getData() );
    const data = _data(form, 'editvideo');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').html(data['msg']  ) ; 
});
$('#GoLiveStart').submit(function(e) {
    e.preventDefault();
    let form = new FormData(this);
    form.append('body',  CKEDITOR.instances.ckeditor.getData() );
    const data = _data(form, 'GoLiveStart');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    
    
    if (data['error'] == 'false') {
        $('.feedback').html("Redirecting..."  ) ; 
        window.location.href=`/dashboard/content/live/${data['msg']}`;
        return
    }
    $('.feedback').html(data['msg']  ) ; 
});
$('#confirmdisbursement').submit(function(e) {
    e.preventDefault();
    let form = new FormData(this);
    const data = _data(form, 'confirmdisbursement');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').html(data['msg'] ) ;
    if (data['error'] == 'false') $('#confirmdisbursement').trigger('reset');
});

$('#contactus').submit(function(e) {
    e.preventDefault();
    let form = new FormData(this);
    const data = _data(form, 'contactus');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').text(data['msg'] + " We will get back fast.") ;
    if (data['error'] == 'false') $('#contactus').trigger('reset');
});

$('#withdrawmoney').submit(function(e) {
    e.preventDefault();
    let form = new FormData(this);
    const data = _data(form, 'withdrawmoney');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').text(data['msg'] ) ;
    if (data['error'] == 'false') $('#withdrawmoney').trigger('reset');
});
$('#sendemail').submit(function(e) {
    e.preventDefault();
    let form = new FormData(this);  
    form.append('body', CKEDITOR.instances.editorck.getData() );
    const data = _data(form, 'send_mass_email');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').text(data['message'] ) ;
    if (data['error'] == 'false') $('#sendemail').trigger('reset');
});
$('.badge-delete').click(function() {
    const id = $(this).attr('rel');
    let form = new FormData();
    form.append('id', id);
    if (confirm("Are you sure?")) {
        const data = _data(form, 'deletebill');
        alert(data['message']);
        window.location.reload();
    }
});
$('.wddelete').click(function() {
    const id = $(this).attr('rel');
    let form = new FormData();
    form.append('id', id);
    if (confirm("Are you sure?")) {
        const data = _data(form, 'wddelete');
        alert(data['message']);
        window.location.reload();
    }
});
$('.terminatePan').click(function() {
    const id = $(this).attr('rel');
    let form = new FormData();
    form.append('id', id);
    if (confirm("Are you sure?")) {
        const data = _data(form, 'terminatePan');
        alert(data['message']);
        window.location.reload();
    }
});
$('.approvePlan').click(function() {
    const id = $(this).attr('rel');
    let form = new FormData();
    form.append('id', id);
    if (confirm("Are you sure?")) {
        const data = _data(form, 'approvePlan');
        alert(data['message']);
        window.location.reload();
    }
});
$('#approvetransaction').submit(function(e) {
    e.preventDefault();
    let form = new FormData(this);
    const data = _data(form, 'approvetransaction');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').text(data['message']  ) ;
    if (data['error'] == 'false') $('#approvetransaction').trigger('reset');
    setTimeout(()=> {
        location.href='index.php';
    }, 2000)
});

$('.udata').change(function() {
    const rel = $(this).attr('rel');
    const val = $(this).val();
    let form = new FormData();
    form.append('col', rel);
    form.append('val', val);
    form.append('id', $('.udataid').val() );
    const data = _data(form, 'edituser');
    
    $('.'+rel).addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.'+rel).html(data['msg']) ;
});

$('.edata').change(function() {
    const rel = $(this).attr('rel');
    const val = $(this).val();
    let form = new FormData();
    form.append('col', rel);
    form.append('val', val);
    form.append('id', $(".eid").val() );
    const data = _data(form, 'updateuser');
    
    $('.'+rel).addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.'+rel).html(data['msg']) ;
});

$('#approveuser').submit(function(e) {
    
    e.preventDefault();
    let form = new FormData(this);
    const data = _data(form, 'approveuser'); 
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').html(data['message']) ; 
})

$('#changepassword').submit(function(e) {
    e.preventDefault();
    let form = new FormData(this);
    const data = _data(form, 'changepass');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').html(data['msg']) ;
    if (data['error'] == 'false') $('#changepassword').trigger('reset');
});

$('#contactus').submit(function(e) {
    e.preventDefault();
    let form = new FormData(this);
    const data = _data(form, 'contactform');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').text(data['message']) ;
    if (data['error'] == 'false') $('#contactus').trigger('reset');
});

$('#btcDeposit').submit(function(e) {
    
    e.preventDefault();
    let form = new FormData(this);
    
    const data = _data(form, 'newbtc');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').text(data['message']) ;
    if (data['error'] == 'false') $('#amount').val('');
});

$('#depositmoney').submit(function(e) {
    
    e.preventDefault();
    let form = new FormData(this);
    const data = _data(form, 'depositmoney');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').text(data['message']) ;
    if (data['error'] == 'false') $('#depositmoney').trigger('reset');
});

$('#individualqr').submit(function(e) {
    
    e.preventDefault();
    let form = new FormData(this);
    const data = _data(form, 'individualqr');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').text(data['message']) ;
    if (data['error'] == 'false') $('#individualqr').trigger('reset');
});
$('#qrcode').submit(function(e) {
    
    e.preventDefault();
    let form = new FormData(this);
    const data = _data(form, 'qrcode');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').text(data['message']) ;
    if (data['error'] == 'false') $('#qrcode').trigger('reset');
});
$('#monetizeform').submit(function(e) {
    
    e.preventDefault();
    let form = new FormData(this);
    const data = _data(form, 'monetizeform');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').text(data['message']) ;
    if (data['error'] == 'false') $('#monetizeform').trigger('reset');
});
$('#intmonetizeform').submit(function(e) {
    
    e.preventDefault();
    let form = new FormData(this);
    const data = _data(form, 'intmonetizeform');
    $('.feedback').addClass(data['error'] == 'false'?'text-success':'text-danger');
    $('.feedback').text(data['message']) ;
    if (data['error'] == 'false') $('#intmonetizeform').trigger('reset');
});













 function _data(form_data, url = '', cl = 'submit_btn1' ) {
     
    const list = ['onlyonline', 'new'];
     
    const originalval = $('.'+cl).val();
     
    let data;
    $.ajax({
        url : '/myapp/' + url,
        type : 'post',
        async: false,
        contentType : false,
        processData : false,
        beforeSend: function() {
            $('.'+ cl).val('Loading...'); 
        },
        data : form_data,
        dataType: 'json', 
        success : function(data1) {
            data = data1;     
            $('.'+ cl).val(originalval);
        }
    });

    return data;
} 