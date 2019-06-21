<?php
include('dbconnect.php');
error_reporting(E_PARSE | E_ERROR);
session_start();
if($_SESSION["name"]=="")
{
    echo "<script>window.alert('Session time out');
    window.location.href='login.php';</script>";
    die();    
}
if (isset($_POST['online'])) 
{
    $sem = $_POST['sem'];
    $inter = $_POST['inter'];
    $sql = mysqli_query($con,"UPDATE lab_internals_marks SET online_status='online' WHERE lab_sem = '$sem' AND lab_internals = '$inter';");
    $sub = mysqli_query($con,"UPDATE `first_internale` SET online_status='online' WHERE semistor='$sem' AND internals='$inter';");
    echo "<script>window.alert('DATA UPDATED')</script>";
}
if (isset($_POST['offline'])) 
{
    $sem1 = $_POST['sem1'];
    $inter1 = $_POST['inter1'];
    $sql = mysqli_query($con,"UPDATE lab_internals_marks SET online_status='offline' WHERE lab_sem = '$sem1' AND lab_internals = '$inter1';");
    $sub = mysqli_query($con,"UPDATE `first_internale` SET online_status='offline' WHERE semistor='$sem1' AND internals='$inter1';");
    echo "<script>window.alert('DATA DELETED')</script>";
}

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <title>Marks entry</title>
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/unslider.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/fonts/meteocons/style.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/morris.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/app.min.css">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/timeline.min.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/app.min.css">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.min.css">
  </head>
  <body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- fixed-top-->
    <?php
include('header.php');
    ?>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


<?php include('aside.php');?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
<!--/ Basic Horizontal Timeline -->
            <form method="post">
                <section id="horizontal">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <legend style="text-align: center; text-transform: capitalize;">online</legend>
                                <div class="row">&nbsp &nbsp
                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                         <!-- <label for="customSelect">semistor</label> -->
                                        <select class="form-control round" id="customSelect" name="sem" required="">
                                            <option selected value=""><strong>Please select the Semistor</strong></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </fieldset>                  
                                </div>
                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <!--  <label for="customSelect">internals</label> -->
                                        <select class="form-control round" name="inter" required="">
                                            <option selected value=""><strong>Please select the internals</strong></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </fieldset>                  
                                </div>
                            <div class="col-md-2">
                            <div class="form-group">
                                <input type="submit" name="online" value="online" class="btn btn-success form-control round">
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
            <form method="post">
                <section id="horizontal">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                 <legend style="text-align: center; text-transform: capitalize;">Offline</legend>
                                <div class="row">&nbsp &nbsp
                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                         <!-- <label for="customSelect">semistor</label> -->
                                        <select class="form-control round" id="customSelect" name="sem1" required="">
                                            <option selected value=""><strong>Please select the Semistor</strong></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </fieldset>                  
                                </div>
                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                         <!-- <label for="customSelect">internals</label> -->
                                        <select class="form-control round" name="inter1" required="">
                                            <option selected value=""><strong>Please select the internals</strong></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </fieldset>                  
                                </div>
                            <div class="col-md-2">
                            <div class="form-group">
                                <input type="submit" name="offline" value="offline" class="btn btn-danger form-control round">
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
            
        </div>
      </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

<?php
include('theme.php');

?>

   <?php include('footer.php'); ?>

    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../../../app-assets/vendors/js/charts/raphael-min.js"></script>
    <script src="../../../app-assets/vendors/js/charts/morris.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/unslider-min.js"></script>
    <script src="../../../app-assets/vendors/js/timeline/horizontal-timeline.js"></script>
    <script src="../../../app-assets/js/core/app-menu.min.js"></script>
    <script src="../../../app-assets/js/core/app.min.js"></script>
    <script src="../../../app-assets/js/scripts/customizer.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="../../../app-assets/js/scripts/tables/datatables/datatable-basic.min.js"></script>
  </body>

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2019 20:03:18 GMT -->
</html>