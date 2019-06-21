<?php
session_start();
include('dbconnect.php');
if($_SESSION["name"]=="")
{
    echo "<script>window.alert('Session time out');
    window.location.href='login.php';</script>";    
}
$sent = $_POST['sent'];
$view = mysqli_query($con,"select * from subejcts where subject_code = '$sent' ");
if(isset($_POST['submit']))
{
    echo "<script>confirm('Do you want to update the Subject list')</script>";
    $co = $_POST['Subject_code'];
    $name = $_POST['Subject_name'];
    $semi = $_POST['sem'];
    $status = $_POST['status'];
    $sql = mysqli_query($con,"UPDATE subejcts set subject_code='$co',subject_name='$name',subject_semistor= '$semi',subject_status = 'Active' where subject_code='$sent' ");
    /*die("data notsaved");*/
    echo "<script>window.alert('Data updated');
    window.location.href='subjects.php';</script>";
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2019 20:01:41 GMT -->
<head>
    <title>Subject edit</title>
    <!-- BEGIN VENDOR CSS-->
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
        <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form-center">Subjects entry</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <!-- <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li> -->
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">

                        <form method="post">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="eventInput1">Subject Code</label>
                                            <input type="text" id="eventInput1" readonly="" value="<?php echo $sent ?>" class="form-control round" placeholder="Subject Code" required="" name="sent">
                                        </div>
                                    <?php
                                    foreach ($view as $view1) 
                                    {
                                    ?>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="eventInput1">Subject Code</label>
                                            <input type="text" id="eventInput1" required="" value="<?php echo $view1['subject_code'] ?>" class="form-control round" placeholder="Subject Code" required="" name="Subject_code">
                                        </div>

                                        <div class="form-group">
                                            <label for="eventInput2">Subject Name</label>
                                            <input type="text" id="eventInput2" required="" class="form-control round" value="<?php echo $view1['subject_name'] ?>" placeholder="Subject name" required="" name="Subject_name">
                                        </div>

                                        <div class="form-group">
                                                <fieldset class="form-group">
                                                    <label for="customSelect">Semistor</label>
                                                    <select required="" class="form-control round" required="" id="customSelect" name="sem">
                                                         <option value="<?php echo $view1['subject_semistor'] ?>"><strong><?php echo $view1['subject_semistor'] ?></strong></option>
                                                         <option value="1">1</option>
                                                         <option value="2">2</option>
                                                         <option value="3">3</option>
                                                         <option value="4">4</option>
                                                         <option value="5">5</option>
                                                         <option value="6">6</option>
                                                    </select>
                                                </fieldset>                  
                                         </div>
                                         <div class="form-group">
                                                <fieldset class="form-group">
                                                    <label for="customSelect">Status</label>
                                                    <select required="" class="form-control round" id="customSelect" required="" name="status">
                                                         <option value="<?php echo $view1['subject_status'] ?>"><strong><?php echo $view1['subject_status'] ?></strong></option>
                                                         <option value="1">Active</option>
                                                         <option value="2">Deactive</option>
                                                    </select>
                                                </fieldset>                  
                                         </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="form-actions center">
                                <button type="submit" class="btn btn-success" name="submit">
                                    <i class="fa fa-check-square-o"></i> Update
                                </button>
                            </div>
                        </form> 

                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <script src="../../../app-assets/js/scripts/pages/dashboard-ecommerce.min.js"></script>
  </body>

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2019 20:03:18 GMT -->
</html>