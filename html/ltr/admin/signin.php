<?php
include('dbconnect.php');
error_reporting(E_PARSE | E_ERROR);
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $mob = $_POST['mobile'];
    $password = $_POST['password'];
    $repass = $_POST['repassword'];
    $quest = $_POST['questions'];
    $ans = $_POST['answer'];
    $query = mysqli_query($con,"select * from admin_regester_login where admin_mobile = '$mob'");
    $row = mysqli_num_rows($query) > 0;
    /*echo "$row";*/
    if ($row > 0) 
    {
        ?>
        <script> alert("This phone number is all ready regestered")</script>
        <?php
    }
    else
    {
        if($password == $repass)
        {
        $sql = mysqli_query($con,"insert into admin_regester_login values(null,'$name','$lname','$mob','$password','$quest','$ans','deactive')");
        echo(
        "<script>window.alert('DATA SAVED');
         window.location.href='login.php';</script>");
        }
        else
        {
        ?>
        <script>alert("Password Miss Match")</script>
        <?php
        return false;
        }
    }
    
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2019 20:01:41 GMT -->
<head>
    <title>Sign In</title>
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
                    <h4 class="card-title" id="basic-layout-form-center">Regestration Details</h4>
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
                        <form method="post" action="signin.php">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <div class="form-body">
                                        
                                        <div class="form-group">
                                            <label for="eventInput2">Name</label>
                                            <input type="text" name="name" class="form-control round" placeholder="Name" style="text-transform: capitalize;">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput2">Last Name</label>
                                            <input type="text" name="lname" class="form-control round" placeholder="Last name" style="text-transform: capitalize;">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput2">Mobile Number</label>
                                            <input type="text" name="mobile" class="form-control round" placeholder="Mobile Number" maxlength="10" pattern="{10}">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput2">password</label>
                                            <input type="password" name="password" class="form-control round" placeholder="Password" >
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput2">Re_enter Password</label>
                                            <input type="password" name="repassword" class="form-control round" placeholder="Re-Enter-Password">
                                        </div>
                                        <div class="form-group">
                                                <fieldset class="form-group">
                                                    <label for="customSelect">Security Question</label>
                                                    <select required="" class="form-control round" id="customSelect"  name="questions">
                                                         <option selected><strong>Please select the question</strong></option>
                                                            <?php
                                                            $security = mysqli_query($con,"select * from security_questions");
                                                            foreach ($security as $secur) 
                                                            {
                                                                ?>
                                                                <option value="<?php echo $secur['id'] ?>"><?php echo $secur['questions'] ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                    </select>
                                                </fieldset>                  
                                         </div>
                                        <div class="form-group">
                                            <label for="eventInput2">Answer</label>
                                            <input type="text" name="answer" class="form-control round" placeholder="Answer" style="text-transform: capitalize;">
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