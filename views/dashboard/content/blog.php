<!DOCTYPE html>
<html lang="en">

<head>
    <?php require ADMIN . 'includes/header.inc.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">

        <?php
        $pageid = 'content';
        require 'public/includes/counties.php';
        require ADMIN . 'includes/sidebar.inc.php' ?>



        <div class="content-wrapper px-4 py-2">
            <div class="content-header">
            </div>
            <div class="content px-2">

                <div class='container alert'>
                    <div class='row'>
                        <div class='col-md-1'></div>
                        <div class='col-md-10 table-responsive'>
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Money Generated</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;
                                    foreach ($this->data['blog'] as $row) {
                                        $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><a target='_blank' href='/content/<?php echo $row['b_url']; ?>' style='color:initial'><?php echo $row['b_title']; ?></a></td>
                                            <td>KES 0<?php //echo $row['v_money_made']; 
                                                        ?></td>
                                            <td>
                                                <a href='#' class='deltvideo btn btn-sm badge-danger' rel='<?php echo $row['v_url']; ?>' title='Delete'
                                                    style='color:initial'><i class='fa fa-trash'></i></a>
                                                <a class=' btn btn-sm badge-success' href='#/dashboard/content/edit?vid=<?php //echo $row['v_url']; 
                                                                                                                        ?>'
                                                    title='Edit' style='color:initial'><i class='fa fa-pencil'></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>



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
                        <div class='col-md-3'></div>

                    </div>




                </div>


            </div>
        </div>


        <?php require ADMIN . 'includes/footer.inc.php' ?>
        <script type="text/javascript">
            $(function() {
                $('.deltvideo').click(function(e) {
                    e.preventDefault();
                    var form = new FormData();
                    form.append('url', $(this).attr('rel'));
                    if (confirm("Are you sure? This action is permanent.")) {
                        var data = _data(form, 'delete_video');
                        alert(data['msg']);
                        location.reload();
                    }
                })
            })
        </script>

    </main>

</body>

</html>