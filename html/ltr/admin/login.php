<?php
session_start();
include('dbconnect.php');
/*error_reporting(E_PARSE | E_ERROR);*/
if(isset($_POST['submit']))
{
    $name = $_POST['uname'];
    $pass = $_POST['pass'];
    $active = "active";
    $sql = mysqli_query($con,"SELECT * FROM admin_regester_login");
    foreach ($sql as $sql) 
    {
        if ($sql['admin_status'] == $active)
        {
            $_SESSION['name']=$name;
            if($sql['admin_mobile'] == $name && $sql['admin_password'] == $pass)
            {
                header('Location:dashbord.php');
            }
            elseif($sql['admin_password'] != $pass)
            {
                ?>
                <script>alert("Please enter Valid Username And Password")</script>
                <?php
                /*header('Location:login.php');*/
            }
        }
        else
        {
             echo "<script>window.alert('Please Waite Till th ADMIN accept your Request');
                    window.location.href='login.php';</script>";    
        }
        
    }
    
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/login-with-bg-image.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2019 21:09:34 GMT -->
<head>
    <title>Login in</title>
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/icheck/custom.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/app.min.css">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/login-register.min.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-menu-modern 1-column   menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" style="background-image: url(../../../image/background.jpg); background-size: 100% 100%; ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-md-4 col-10 box-shadow-2 p-0">
            <!-- <div class="card border-grey border-lighten-3 px-1 py-1 m-0"> -->
                <div class=" border-0">
                    <div class="card-title text-center">
                        <!-- <img src="../../../app-assets/images/logo/stack-logo-dark.png" alt="branding logo"> -->
                        <h1 style="border: 1px solid black;">VVIET</h1>
                    </div>
                    
                </div>
                <div class="card-content">
                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span> Log In </span></p>
                    <div class="card-body">
                        <form method="post" action="login.php" class="form-horizontal">
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control" id="user-name" name="uname" placeholder="Your Username" required>
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control" id="user-password" name="pass" placeholder="Enter Password" required>
                                <div class="form-control-position">
                                    <i class="fa fa-key"></i>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <div class="col-md-6 col-12 text-center text-sm-left">
                                    <!-- <fieldset>
                                        <input type="checkbox" id="remember-me" class="chk-remember">
                                        <label for="remember-me"> Remember Me</label>
                                    </fieldset> -->
                                </div>
                               <!--  <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div> -->
                            </div>
                            <button type="submit" name="submit" class="btn btn-outline-primary btn-block"><i class="ft-unlock"></i> Login</button>
                        </form>
                    </div>
                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>New Regestration ?</span></p>
                    <div class="card-body">
                        <a href="signin.php" class="btn btn-outline-danger btn-block"><i class="ft-user"></i> Register</a>
                    </div>
                </div>
<!--             </div> -->
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../../../app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="../../../app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <script src="../../../app-assets/js/core/app-menu.min.js"></script>
    <script src="../../../app-assets/js/core/app.min.js"></script>
    <script src="../../../app-assets/js/scripts/forms/form-login-register.min.js"></script>
  </body>

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/login-with-bg-image.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2019 21:09:38 GMT -->
</html>