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
                                        <th>Status</th>
                                        <th>Clear</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; foreach($this->data as $row) { $i++; ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><a href='/products/<?= $row['slug'] ?>' style='color:black'>
                                            <?= $row['title'] ?> <i class='fa fa-external-link-square-alt' ></i></a> </td>

                                        <td>
                                            <?= $row['product_count'] ?> x
                                            <?= $row['price'] ?> = 
                                            <?= $row['price'] * $row['product_count'] ?>
                                        </td>
                                        <td><?= $row['order_created_at'] ?></td>
                                        <td><?= $row['order_status'] ?></td>
                                        <td>
                                            <a href="#" rel="<?= $row['order_id'] ?>"
                                            class="badge badge-success clear" >
                                                Clear?
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                             
                        </div>
                     
                        
                        
 
                    </div>
                
                 
            </div>
        </div>
        
        
        <?php require DASHBOARD.'includes/footer.inc.php' ?>

        <script>
            $(function() {

            $('.clear').click( async function(e) {
                e.preventDefault();

                const form = new FormData();
                form.set('id', $(this).attr('rel') );
                form.set('method', 'clear_order_past' );
                form.set('csrf_token', '<?= CSRF::get() ?>' );
                 
                if (confirm("Are you sure?")) {
                    const response = await fetch('/myapp/requests', {method:"POST", body:form});

                    const result = await response.json(); 
                    alert(result.msg);
                    location.reload();
                }

            })
               
            })
        </script>
        
    
    </main> 
 
</body>

</html>