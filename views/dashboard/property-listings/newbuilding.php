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

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissible" id="main_alert" role="alert">
                            <button type="button" id="close_alert" class="close">
                                <span aria-hidden="true"><i class="icofont-close-line-squared-alt"></i></span>
                            </button>
                            <span class="msg"></span>
                        </div>
                    </div>
                </div>



                <div class="card mb-4">
                    <div class="card-header">
                        Create a new building
                    </div>
                    <div class="card-body">

                        <form action="" id="addListingForm">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <label>Title </label> <br>
                                        <input type="text" name="title" class="form-control form_control_sm" style="min-width:100%;" required>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Building units (if sold/rented separately) </label> <br>
                                        <input type="number" name="no_doors" class="form-control form_control_sm" style="min-width:100%;" required placeholder='ie 5 to mean 5 units sold/rented independently'>
                                    </div>
                                    <!--div class="col-md-6 mt-3"-->
                                    <!--label >How many are occupied </label> <br-->
                                    <input type="hidden" name="no_occupied" class="form-control form_control_sm" style="min-width:100%;">
                                    <!--/div-->
                                    <!--<div class="col-md-6 mt-3">                   -->
                                    <!--    <label >Bedrooms </label> <br>-->
                                    <!--    <select type="text" name="bedrooms" class=" form_control_sm" style="min-width:100%;"  required> -->
                                    <!--        <?php foreach ($this->bedrooms as $row) { ?>-->
                                    <!--        <option value="<?php echo $row['b_ID'] ?>"> <?php echo $row['b_name'] ?> </option>-->
                                    <!--        <?php } ?>-->
                                    <!--    </select>-->
                                    <!--</div>-->


                                    <div class="col-md-6 mt-3">
                                        <label>House Types </label> <br>
                                        <select type="text" name="htype" class="form-control form_control_sm" style="min-width:100%;" required>
                                            <?php foreach ($this->htype as $row) { ?>
                                                <option value="<?php echo $row['ht_ID'] ?>"> <?php echo $row['ht_name'] ?> </option>
                                            <?php } ?>
                                        </select>
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
                                        <input type="file" name="file[]" multiple required class="form-control file form_control_sm" style="min-width:100%;" accept="image/*">
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <label>Select if furnished </label> <br>
                                        <select type="text" name="furnished" class="form-control form_control_sm" style="min-width:100%;" required>
                                            <option value='Furnished'>Furnished</option>
                                            <option value='Unfurnished'>Unfurnished</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Select Purpose </label> <br>
                                        <select type="text" name="purpose" class="form-control form_control_sm" style="min-width:100%;" required>
                                            <option value='Accommodation'>Accommodation/Stay In</option>
                                            <option value='For Sale'>Houses For Sale</option>
                                            <option value='Land'>Land For Sale</option>
                                            <option value='Commercial'>Commercial</option>
                                            <option value='Residential'>Residential</option>
                                        </select>
                                    </div>


                                    <div class="col-md-6 mt-3">
                                        <label>Town</label> <br>
                                        <input type="text" name="town" class="town form-control form_control_sm" style="min-width:100%;" required placeholder='eg Mombasa'>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Building address/Area/Estate/Village </label> <br>
                                        <input type="text" name="estate" class="estate form-control form_control_sm" style="min-width:100%;" required placeholder='eg Karen'>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label>Youtube complete Link Eg: https://www.youtube.com/watch?v=xpVfcZ0ZcFM </label> <br>
                                        <input type="url" name="ytlink" class="form-control form_control_sm" style="min-width:100%;" placeholder='This is optional'>
                                    </div>
                                    <div class="col-md-12 mt-3" style='background:lightgrey;padding:5px;'>
                                        <label class="">Features (select as many) </label><br>
                                        <?php $i = 0;
                                        foreach ($this->spfeatures as $row) {
                                            $i++; ?>
                                            <span class="<?php echo ($i == 1) ? '' : 'padding_checkbox';  ?>">
                                                <input type="checkbox" name="specialfeatures[]" class="" value="<?php echo $row['sf_ID'] ?>">&nbsp;<?php echo $row['sf_name'] ?>
                                            </span>
                                        <?php } ?>
                                    </div>



                                    <div class="col-md-12 mt-3">
                                        <button type="submit" value="Submit" class="btnsubmit form-control btn btn-success">Submit</button>
                                    </div>


                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>








        <?php require DASHBOARD . 'includes/footer.inc.php' ?>


    </main>

</body>

</html>