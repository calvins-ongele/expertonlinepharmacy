<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require DASHBOARD . 'includes/header.inc.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
         
        <?php 
        $pageid = 'products';
        
        require DASHBOARD . 'includes/sidebar.inc.php' ?>
        
        
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header"> 
            </div>
            <div class="content px-2">
                
                    <div class='container alert'>
                        <div class='table-responsive'>
                            <table class='table table-striped table-hover'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th>Customer&nbsp;has&nbsp;paid</th>
                                        <th>Seller Paid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; foreach($this->data as $row) { $i++; ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><a href='/market/<?php echo $row['p_url'] ?>' style='color:black'><?php echo $row['p_title'] ?> <i class='fa fa-external-link-square-alt' ></i></a> </td>
                                        <td><?php echo $row['order_paid_amount'] ?></td>
                                        <td><?php echo date('m-d-Y', $row['order_date']) ?></td>
                                        <td><?php echo $row['order_fully_paid'] ?></td>
                                        <td><?php echo $row['order_seller_paid'] ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                             
                        </div>
                     
                        
                        
 
                    </div>
                
                 
            </div>
        </div>
        
        
        <?php require DASHBOARD.'includes/footer.inc.php' ?>
        
    
    </main> 
 
</body>

</html>