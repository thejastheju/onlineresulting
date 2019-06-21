<?php
session_start();
include('dbconnect.php');
include('number.php');
error_reporting(E_PARSE | E_ERROR);
if($_SESSION["name"]=="")
{
    echo "<script>window.alert('Session time out');
    window.location.href='login.php';</script>";
    die();    
}
elseif (isset($_POST['submit']))
{
    $usn = $_POST['usn']; 
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $pname = $_POST['pname'];
    $mobile=$_POST['mobile'];
    $pmobile=$_POST['pmob'];
    $sem=$_POST['sem'];
    $sql = mysqli_query($con,"UPDATE `student_regester` SET usn='$usn',name='$name',lname='$lname',parents_name='$pname',mobile='$mobile',parents_mobile='$pmobile',sem='$sem',status='Active' where usn='$usn'");
    ?>
    <script>alert("Data Updates");</script>
    <?php
}
$sent = $_POST['sent'];
if (isset($_POST['search'])) 
{
    $sea = $_POST['searc'];
    $result = mysqli_query($con,"select * from student_regester where usn = '$sea'");
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2019 20:01:41 GMT -->
<head>
    <title>Student Details</title>
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
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form-center">Student Details Edit </h4>
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
                        <form method="post" action="studentdetailsedit.php">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="eventInput1">search</label>
                                            <input type="text" id="eventInput1" class="form-control round" value="<?php echo $sent ?>" placeholder="Please enter USN to search" name="searc"> <br/>
                                            <input type="submit" name="search" value="search" class="btn-success form-control round" >
                                        </div>
                                        <?php foreach ($result as $res) {
                                        ?>
                                        <div class="form-group">
                                        <label for="eventInput1">usn</label>
                                        <input type="text" id="eventInput1" class="form-control round" value="<?php echo $res['usn']?>" placeholder="USN" required="" readonly name="usn">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput2">Name</label>
                                            <input type="text" name="name" class="form-control round" title="enter Alphabets only" value=" <?php echo $res['name']?>" placeholder="Name" style="text-transform: capitalize;"  onkeypress="return onlyAlphabets(event,this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput2">Last Name</label>
                                            <input type="text" name="lname" class="form-control round" title="enter Alphabets only" value=" <?php echo $res['lname']?>" placeholder="Last name" style="text-transform: capitalize;"  onkeypress="return onlyAlphabets(event,this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput2">Parents/ Guardian Name</label>
                                            <input type="text" class="form-control round" name="pname" title="enter Alphabets only" value=" <?php echo $res['parents_name']?>" placeholder="Parents Name" style="text-transform: capitalize;" onkeypress="return onlyAlphabets(event,this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput2">Mobile Number</label>
                                            <input type="text" name="mobile" class="form-control round" title="enter Digits only" pattern=".{10}" value=" <?php echo $res['mobile']?>" placeholder="Mobile Number" maxlength="10" onkeypress="return onlyNumbers(event,this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput2">Parents Mobile Number</label>
                                            <input type="text" name="pmob" class="form-control round" title="Enter Digits only" pattern=".{10}" value=" <?php echo $res['parents_mobile']?>" placeholder="Parents Mobile Number" maxlength="10" onkeypress="return onlyNumbers(event,this);" >
                                        </div>
                                        <div class="form-group">
                                                <fieldset class="form-group">
                                                    <label for="customSelect">Semistor</label>
                                                    <select required="" class="form-control round" name="sem" id="customSelect">
                                                         <option value="<?php echo $res['sem']?>"><strong><?php echo $res['sem']?></strong></option>
                                                         <option value="1">1</option>
                                                         <option value="2">2</option>
                                                         <option value="3">3</option>
                                                         <option value="4">4</option>
                                                         <option value="5">5</option>
                                                         <option value="6">6</option>
                                                    </select>
                                                </fieldset>                  
                                         </div>
                                     <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions center ">
                                <button type="submit" class="btn btn-success form-control round col-md-4" name="submit">
                                    <i class="fa fa-check-square-o"></i> Update
                                </button>
                            </div>
                        </form> 
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