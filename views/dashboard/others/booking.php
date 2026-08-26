<!DOCTYPE html>
<html lang="en">

<head>
    <?php require DASHBOARD . 'includes/header.inc.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">

        <?php
        $pageid = 'property';

        require DASHBOARD . 'includes/sidebar.inc.php' ?>



        <div class="content-wrapper px-4 py-2">
            <div class="content-header">
            </div>

            <div class="container-xl">


                <div class="card mb-4">
                    <div class="card-header">
                        Customer: <?= "{$this->booking['user_fname']} {$this->booking['user_lname']}" ?>
                    </div>
                    <div class="card-body">
                        <p>
                            <?php echo $this->booking['bfv_comment'] ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <p>
                            Number of days: <i style='color:blac;font-weight:bolder;'><?php echo $this->booking['bfv_number_days'] ?></i> &nbsp;
                            Phone: <i style='color:blac;font-weight:bolder;'><?php echo $this->booking['user_tel'] ?></i></i> &nbsp;
                            Status: <i style='color:blac;font-weight:bolder;'><?php echo $this->booking['bfv_status'] ?></i></i> &nbsp;
                            Joining Date: <i style='color:blac;font-weight:bolder;'><?php echo date('d/m/Y', strtotime($this->booking['bfv_start_date'])) ?></i> &nbsp;
                            Email: <a href='/dashboard/send_email?email=<?php echo $this->booking['user_email'] ?>'><i style='color:blac;font-weight:bolder;'><?php echo $this->booking['user_email'] ?></i></i>
                                <i class='fa fa-external-link'></i></a>


                        </p>
                        <div class='row'>
                            <div class='col-md-6'>
                                <a href='#' class='sendlease btn btn-success mb-2 ' choice='Accepted' rel='<?php echo $this->booking['bfv_ID'] ?>'>Send Lease </a><br>
                                <a href='#' class='sendoffer btn btn-secondary mb-2 ' choice='Accepted' cid='' rel='<?php echo $this->booking['bfv_ID'] ?>'>Send Offer Letter </a><br>
                                <a href='#' class='sendsale btn btn-primary mb-2 ' choice='Accepted' rel='<?php echo $this->booking['bfv_ID'] ?>'>Send Sale Agreement </a><br>
                                <a href='#' class='actbooking btn btn-success' choice='Accepted' rel='<?php echo $this->booking['bfv_ID'] ?>'>Accept this booking </a>
                            </div>
                            <div class='col-md-6'> 
                                <?php if (strtolower($this->msg[0]['status']) != 'closed') { ?>
                                    <a href='#' class='actbooking btn btn-warning' choice='Closed' rel='<?php echo $this->booking['bfv_ID'] ?>'>Close this booking </a>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>



	<div class="modal fade" id="sendsalemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
              </div>
              <form id='sendsaleform'>
                  <div class="modal-body">
                    <label>Customer's address</label>
                    <input class='form-control' name='address' ><br>
                    <label>Customer's ID Number</label>
                    <input class='form-control' name='natid' ><br>
                    <input type='hidden' name='type' value='bfv'>
                    <?php $price = empty($this->msg[1]['ih_price']) ? $this->msg[1]['bp_price'] : $this->msg[1]['ih_price']; ?>
                    <label>Monthly Amount [Current price: KSH <?php echo $price  ?> ]</label>
                    <input class='form-control' name='amount' ><br>
                    <!--<label>Lease start date</label>-->
                    <!--<input class='form-control' name='sdate' type='date' ><br>-->
                    <!--<label>Lease end date</label>-->
                    <!--<input class='form-control' name='edate' type='date' ><br>-->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send Lease Now</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
	<div class="modal fade" id="sendleasemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
              </div>
              <form id='sendleaseform'>
                  <div class="modal-body">
                    <label>Customer's address</label>
                    <input class='form-control' name='address' ><br>
                    <label>Customer's ID Number</label>
                    <input class='form-control' name='natid' ><br>
                    <input type='hidden' name='type' value='bfv'>
                    <?php $price = empty($this->msg[1]['ih_price']) ? $this->msg[1]['bp_price'] : $this->msg[1]['ih_price']; ?>
                    <label>Monthly Amount [Current price: KSH <?php echo $price  ?> ]</label>
                    <input class='form-control' name='amount' ><br>
                    <label>Lease start date</label>
                    <input class='form-control' name='sdate' type='date' ><br>
                    <label>Lease end date</label>
                    <input class='form-control' name='edate' type='date' ><br>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send Lease Now</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
        
		<div class="modal fade" id="sendoffermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
              </div>
              <form id='sendofferletter'>
                  <div class="modal-body">
                    <label>Customer's address</label>
                    <input class='form-control' name='address' ><br>
                    <label>Customer's ID Number</label>
                    <input class='form-control' name='natid' ><br>
                    <input type='hidden' name='type' value='bfv'>
                    <?php $price = empty($this->msg[1]['ih_price']) ? $this->msg[1]['bp_price'] : $this->msg[1]['ih_price']; ?>
                    <label>Deposit Amount [Current price: KSH <?php echo $price  ?> ]</label>
                    <input class='form-control' name='amount' >
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send Offer Now</button>
                  </div>
              </form>
            </div>
          </div>
        </div>

        <?php require DASHBOARD . 'includes/footer.inc.php' ?>


    </main>

</body>

</html>