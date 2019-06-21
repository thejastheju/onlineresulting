<?php
include('../admin/dbconnect.php');
session_start();
if (isset($_POST['search'])) 
{
    $usn = $_POST['usn'];
    $_SESSION['usn'] = $usn;
    //echo "$_SESSION['usn']";
    $query = "SELECT * from first_internale where internals_usn='$usn'";
    $sql = mysqli_query($con,$query);

    //foreach ($sql as $sql1) 
    $row = mysqli_num_rows($sql);
    //echo "$row";
    //{
        if ($row > 0) 
        {
           // header("Location: result.php");
        }
        else
        {
            echo "<script>alert('Please check the usn you have entered')</script>";
        }
  //  }
    
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/search-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2019 21:16:20 GMT -->
<head>
    <title>SEARCH</title>
    
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/vendors.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/app.min.css">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/search.min.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-menu-modern 1-column   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">


    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <form method="post" name="form1" action="result.php">
    <div class="app-content content">
      <div class="content-wrapper">
        <!-- <div class="content-header row">
        </div> -->
        <div class="content-body"><!-- <div class="row full-height-vh-with-nav"> -->
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-lg-6 col-10">
                        <!-- <img class="img-fluid mx-auto d-block pb-3 pt-4 width-65-per" src="../../../app-assets/images/logo/stack-logo-dark-big.png" alt="Stack Search"> -->
                        <fieldset class="form-group position-relative">
                            <input style="text-align: center;" type="text" required="" name="usn" class="form-control form-control-xl input-xl" maxlength="10" placeholder="Enter usn to Searh">
                        </fieldset>
                       <div class="row py-2">
                            <div class="col-12 text-center">
                                
                                <input type="text" hidden="" name="sent" value="<?php echo "$usn"; ?>">
                                <button name="search" class="btn btn-success btn-md-3"> <i class="ft-search"></i>Search</a>
                                </button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

       <!--  </div> -->
      </div>
    </div>
    </form>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <footer class="footer fixed-bottom footer-dark navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-block d-md-inline-block d-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span></p>
    </footer>

    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../../../app-assets/js/core/app-menu.min.js"></script>
    <script src="../../../app-assets/js/core/app.min.js"></script>
    <script src="../../../app-assets/js/scripts/customizer.min.js"></script>
  </body>

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/search-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2019 21:16:23 GMT -->
</html>