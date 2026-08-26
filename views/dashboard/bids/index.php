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
                <input id='myInput' value='' style="color:white;border:none;">
                    <div class='container alert'>
                        <div class='table-responsive'>
                            <table class='table table-striped table-hover'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Amount Shared</th> 
                                        <th>Copy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; foreach($this->data['bids'] as $row) { $i++; ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><a href='/market/<?php echo $row['url'] ?>?ref=<?php echo Session::get('userid') ?>' style='color:black'><?php echo $row['title'] ?> <i class='fa fa-external-link-square-alt' ></i></a> </td>
                                        <td><?php echo $row['price'] ?></td> 
                                        <td><?php echo $row['earning_ca'] ?></td> 
                                        <td> <a href='#' class='btn btn-sm btn-success btncopy' rel='https://www.miziziclassifieds.com/market/<?php echo $row['url'] ?>?ref=<?php echo Session::get('userid') ?>'>Copy URL</a> </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                             
                        </div>
                     
                        
                        
                    <div class="col-12">
                        <nav>
                            <ul class="pagination">
                                <?php
                                $currentPage = $_GET['pg'] ?? 1;
                                $totalPerPage = $this->_company['user_loop_sequence'] ?? 24;
                                $totalCount = $this->data['count'] ?? 1;

                                $possiblePages = false;
                                $next = 0;
                                if (($totalPerPage * $currentPage) < $totalCount) {
                                    $possiblePages = true;
                                    $next = $currentPage + 1;
                                }

                                if ($currentPage > 1) {
                                ?>
                                    <li class="page-item"><a class="page-link" href="<?= CustomFunctions::formatDynamicUrl('pg', ($currentPage - 1)) ?>">Previous</a></li>
                                <?php } ?>
                                <?php for ($i = 1; $i < ceil($totalCount / $totalPerPage) + 1; $i++) { ?>
                                    <li class="page-item <?= ($currentPage == $i) ? 'active' : '' ?>"><a class="page-link" href="<?= CustomFunctions::formatDynamicUrl('pg', $i) ?>"><?= $i ?></a></li>
                                <?php }
                                if ($possiblePages) { ?>
                                    <li class="page-item"><a class="page-link" href="<?= CustomFunctions::formatDynamicUrl('pg', $next) ?>">Next</a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
 
                    </div>
                
                 
            </div>
        </div>
        
        
        <?php require DASHBOARD.'includes/footer.inc.php' ?>
        <script>
        function copyFunc() {
          // Get the text field
          var copyText = document.getElementById("myInput");  
          copyText.select();
          copyText.setSelectionRange(0, 99999);  
          navigator.clipboard.writeText(copyText.value); 
          alert("Copied link to clipboard: " + copyText.value);
        }

            $(function() {
                $('.btncopy').click(function(e) {
                    e.preventDefault();
                    $('#myInput').val( $(this).attr('rel') );
                    copyFunc();
                })
            })
        </script>
        
    
    </main> 
 
</body>

</html>