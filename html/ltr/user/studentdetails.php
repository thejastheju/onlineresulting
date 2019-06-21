<?php
include('../admin/dbconnect.php');
error_reporting(E_PARSE | E_ERROR);
if (isset($_POST['submit']))
{
    $usn = $_POST['usn'];
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $pname = $_POST['pname'];
    $mobile=$_POST['mobile'];
    $pmobile=$_POST['pmob'];
    $sem=$_POST['sem'];
    $que = mysqli_query($con,"SELECT * from student_regester where usn = '$usn' ");
    $row = mysqli_num_rows($que);
    /*echo "$row";*/
    if ($row > 0) 
    {
        ?>
        <script> alert("This usn is allready saved!!!!!  contact admin to Update")</script>
        <?php
    }
    else
    {
        $sql = mysqli_query($con,"insert into student_regester values(null,'$usn','$name','$lname','$pname','$mobile','$pmobile','$sem','Active')");
        ?>
        <script>alert("Data saved");</script>
        <?php
    }
    /*else
    {
        ?>
        <script>alert("This USN is allready regestered Contact admin to Update")</script>
        <?php
    }*/
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
  <body>

    <!-- fixed-top-->

    <!-- ////////////////////////////////////////////////////////////////////////////-->




    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form-center">Student Details</h4>
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
                        <form method="post" action="studentdetails.php">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="eventInput1">usn</label>
                                            <input type="text" id="eventInput1" class="form-control round" placeholder="USN" required="" name="usn">
                                        </div>

                                        <div class="form-group">
                                            <label for="eventInput2">Name</label>
                                            <input type="text" name="name" class="form-control round" placeholder="Name" style="text-transform: capitalize;">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput2">Last Name</label>
                                            <input type="text" name="lname" class="form-control round" placeholder="Last name" style="text-transform: capitalize;">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput2">Parents/ Guardian Name</label>
                                            <input type="text" class="form-control round" name="pname" placeholder="Parents Name" style="text-transform: capitalize;">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput2">Mobile Number</label>
                                            <input type="text" name="mobile" class="form-control round" placeholder="Mobile Number" maxlength="10" pattern="{10}">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput2">Parents Mobile Number</label>
                                            <input type="text" name="pmob" class="form-control round" placeholder="Parents Mobile Number" maxlength="10" pattern="[0-9]{10}">
                                        </div>
                                        <div class="form-group">
                                                <fieldset class="form-group">
                                                    <label for="customSelect">Semistor</label>
                                                    <select required="" class="form-control round" id="customSelect" name="sem">
                                                         <option selected><strong>Please select the Semistor</strong></option>
                                                         <option value="1">1</option>
                                                         <option value="2">2</option>
                                                         <option value="3">3</option>
                                                         <option value="4">4</option>
                                                         <option value="5">5</option>
                                                         <option value="6">6</option>
                                                    </select>
                                                </fieldset>                  
                                         </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions center ">
                                <button type="submit" class="btn btn-success form-control round col-md-4" name="submit">
                                    <i class="fa fa-check-square-o"></i> Save
                                </button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>

        </div>
      </div>
   
    <!-- ////////////////////////////////////////////////////////////////////////////-->


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