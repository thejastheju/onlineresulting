<?php
include('dbconnect.php');
session_start();
error_reporting(E_PARSE | E_ERROR);
if($_SESSION["name"]=="")
{
    echo "<script>window.alert('Session time out');
    window.location.href='login.php';</script>";    
}
$mobile = $_POST['mobile'];
$state = $_POST['state'];
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2019 20:01:41 GMT -->
<head>
    <title>Home</title>
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
    <script>
        function delet()
        {
            alert("Data Deleted");
          
        }
        function activ()
        {
            alert("data update");
            
        }
    </script>
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
                            <div class="card-header">
                                <h4 class="card-title"></h4>
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
                                <div class="card-body card-dashboard">
                                    <table class="table display  table-bordered ">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Mobile number</th>
                                                    <th>Account Status</th>
                                                    <th>Update</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    <?php
                                                    $sql = mysqli_query($con,"SELECT * FROM `admin_regester_login` WHERE `admin_status`='deactive'");
                                                    foreach ($sql as $sql)
                                                    {
                                                       ?>
                                                       <tr>
                                                       <td><label style="text-transform: capitalize;"><?php echo $sql['admin_name'] ?> <?php echo $sql['admin_lname'] ?></label></td>
                                                       <td><label><?php echo $sql['admin_mobile'] ?><input type="text" name="mobile" hidden="" value="<?php echo $sql['admin_mobile'] ?>"></label></td>
                                                       <td><label style="text-transform: capitalize;"><?php echo $sql['admin_status'] ?></label>
                                                        </td>
                                                       <td><form method="post" name="update" action="dashbord.php">
                                                            <input type="text" name="mobile" value="<?php echo $sql['admin_mobile'] ?>">
                                                            <input type="submit" name="update" value="Activate" class="btn btn-success form-control round" onclick="activ()">
                                                            <?php
                                                            $upda = mysqli_query($con,"UPDATE admin_regester_login SET admin_status='Active' WHERE admin_mobile='$mobile'");
                                                            ?>
                                                       </form></td>
                                                       <td><form method="post" name="delete" action="dashbord.php">
                                                            <input type="text" name="mobile" value="<?php echo $sql['admin_mobile'] ?>">
                                                           <input type="submit" name="delet" value="Delete" class="btn btn-danger form-control round" onclick="delet()">
                                                           <?php                                            
                                                            $del = mysqli_query($con,"UPDATE admin_regester_login SET admin_status='offline' WHERE admin_mobile='$mobile'");
                                                            ?> 
                                                       </form></td>
                                                       </tr>
                                                       <?php
                                                    }
                                                    ?>
                                                
                                            </tbody>
                                        </table>
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