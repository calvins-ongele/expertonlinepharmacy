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
                    <h4 class="h6 text-center"> Add a Listing </h4>
                    <form action="" id="addListingForm2">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <label>Buildings </label> <br>
                                    <select type="text" name="building" class="form-control form_control_sm" style="min-width:100%;" required>
                                        <?php foreach ($this->building as $row) { ?>
                                            <option value="<?php echo $row['building_ID'] ?>" <?php if (isset($_GET['id'])) {
                                                                                                    if ($_GET['id'] == $row['building_ID']) echo 'selected';
                                                                                                } ?>> <?php echo $row['building_name'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label>Price/Accommodation Fee </label> <br>
                                    <input type="number" name="price" class="form-control form_control_sm" style="min-width:100%;" required>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label>Bedroom Type </label> <br>
                                    <select type="text" name="bedrooms" class="form-control form_control_sm" style="min-width:100%;" required>
                                        <?php foreach ($this->bedrooms as $row) { ?>
                                            <option value="<?php echo $row['b_ID'] ?>"> <?php echo $row['b_name'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>How many are occupied </label> <br>
                                    <input type="number" name="occupied" class="form-control form_control_sm" style="min-width:100%;" required>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label>How many are of type bedroom selected above ie 5 are bedsitters </label> <br>
                                    <input type="number" name="part_number" class="form-control form_control_sm" style="min-width:100%;" required>
                                </div>




                                <!--div class="col-md-6 mt-3">                   
                    <label >Special features (Select as many) </label> <br>
                    <select type="text" name="spfeatures[]" class=" form_control_sm" style="min-width:100%;"  required multiple> 
                        <?php foreach ($this->spfeatures as $row) { ?>
                        <option value="<?php echo $row['sf_ID'] ?>" > <?php echo $row['sf_name'] ?> </option>
                        <?php } ?>
                    </select>
                </div--->
                                <div class="col-md-6 mt-3">
                                    <label>Files (upload as many)</label> <br>
                                    <input type="file" name="file[]" multiple class="form-control file form_control_sm" style="min-width:100%;" required accept="image/*">
                                </div>


                                <div class="col-md-12 mt-3" style='background:lightgrey;padding:5px;'>
                                    <label class="">Features (select as many) </label><br>
                                    <?php $i = 0;
                                    foreach ($this->spfeatures as $row) {
                                        $i++; ?>
                                        <span class="<?php echo ($i == 1) ? '' : 'padding_checkbox';  ?>">
                                            <input type="checkbox" name="specialfeatures[]" class="" value="<?php echo $row['sf_ID'] ?>">
                                            <?php echo $row['sf_name'] ?>
                                        </span>
                                    <?php } ?>
                                </div>


                                <div class="col-md-12 mt-3">
                                    <label>Description </label> <br>
                                    <textarea type="text" name="description1" id='terms' cols="2" class="form-control description form_control_sm" style="min-width:100%; min-height:50px!important"></textarea>
                                </div>


                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btnsubmit form-control btn btn-success">Submit</button>
                                </div>


                            </div>

                        </div>
                    </form>
                </div>

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