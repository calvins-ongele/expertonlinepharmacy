<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require DASHBOARD . 'includes/header.inc.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
         
        <?php 
        $pageid = 'bids';
        
        require DASHBOARD . 'includes/sidebar.inc.php' ?>
        
        
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header"> 
            </div>
            <div class="content px-2">
                
                    <div class='container alert'>
                        <p class='text text-danger'>These amounts earned have already been deposited into your account.</p>
                        <div class='table-responsive'>
                            <table class='table table-striped table-hover'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Amount Earned</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; foreach($this->data as $row) { $i++; ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><a href='/market/<?php echo $row['url'] ?>?ref=<?php Session::get('userid'); ?>' style='color:black'><?php echo $row['title'] ?> <i class='fa fa-external-link-square-alt' ></i></a> </td>
                                        <td><?php echo $row['price'] ?></td> 
                                        <td><?php echo $row['earning_ca'] ?></td> 
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