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



                <!----------------------------->

                <div class="mt-2">
                    <h4 class="h6 text-centerx"> Add/Edit Terms of Agreement for <?php echo $this->building['building_name'] ?> </h4>

                    <form action="" id="newPay">
                        <div class="row">


                            <div class="col-md-12">

                                <div class="form-group">
                                    <id type="hidden" name='id' class='termsid' value="<?php echo $_GET['id'] ?> ">
                                        <label class="control-label">Terms & Conditions</label>
                                        <textarea class="form-control " id="terms"><?php echo $this->building['building_terms_and_conditions'] ?> </textarea>
                                </div>

                                <!------------------------------------------>
                                <hr>

                                <div class="form-group">
                                    <button type='button' class="submitterms btn btn-primary btn-block">Submit Now</button>
                                </div>
                                <div class="alert mt-2 fdback"></div>
                                <!------------------------------------------>




                            </div>

                        </div>

                    </form>
                </div>
                <!----------------------------->

            </div>

        </div>








        <?php require DASHBOARD . 'includes/footer.inc.php' ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
        <script type="text/javascript">
            //<![CDATA[
            CKEDITOR.replace('terms');
            //]]>
        </script>


    </main>

</body>

</html>