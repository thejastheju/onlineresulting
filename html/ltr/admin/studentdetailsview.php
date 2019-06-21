<?php
include('dbconnect.php');
if(isset($_POST['submit']))
{
    $stud = $_POST['student'];
    if ($stud == "0") 
    {
        ?>
        <script>alert("please select semistor");</script>
        <?php
    }
    $sql = mysqli_query($con,"select * from student_regester where sem ='$stud' ");
}
if (isset($_POST['submit1'])) 
{
    /*redirect("studentdetailsedit.php");*/
     header("Location: studentdetailsedit.php");
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2019 20:01:41 GMT -->
<head>
    <title>student details</title>
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
        <!-- Scroll - horizontal table -->
        <form method="post">
            <section id="horizontal">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Student Details</h4>
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
                            <div class="row"><pre>&nbsp &nbsp</pre>
                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                         <!-- <label for="customSelect">semistor</label> -->
                                        <select class="form-control round" id="customSelect" name="student" required="">
                                            <option selected value="0"><strong>Please select the Semistor</strong></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </fieldset>                  
                                </div>
                            <div class="col-md-2">
                            <div class="form-group">
                                <input type="submit" name="submit" value="submit" class="btn btn-success form-control round">
                            </div>
                        </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                                <thead>
                                <tr>
                                    <th>USN</th>
                                    <th>Name</th>
                                    <th>Parents / Guardian Name</th>
                                    <th>Student Mobile number</th>
                                    <th>Parents Mobile number</th>
                                    <th>Semistor</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    foreach ($sql as $que1) 
                                    {
                                        /*$a=count($que1);
                                        echo "$a";*/
                                        ?>
                                        <td><?php echo $que1['usn'] ?></td>
                                        <td style="text-transform: capitalize;"><?php echo $que1['name'] ?> <?php echo $que1['lname'] ?></td>
                                        <td style="text-transform: capitalize;"><?php echo $que1['parents_name'] ?></td>
                                        <td><?php echo $que1['mobile'] ?></td>
                                        <td><?php echo $que1['parents_mobile'] ?></td>
                                        <td><?php echo $que1['sem'] ?></td>
                                        <td><form action="studentdetailsedit.php" method="post"><input type="text" name="id" value="<?php echo $que1['usn']; ?>" hidden><input type="submit" value="Edit" name="submit1" class="btn btn-success form-control round"> </form></td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>USN</th>
                                    <th>Name</th>
                                    <th>Parents / Guardian Name</th>
                                    <th>Student Mobile number</th>
                                    <th>Parents Mobile number</th>
                                    <th>Semistor</th>
                                    <th>Edit</th>
                                </tr>
                            </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
<!--/ Basic Horizontal Timeline -->

    </div>
</div>
</form>
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
    <!-- <script src="../../../app-assets/js/scripts/pages/dashboard-ecommerce.min.js"></script>
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script> -->
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <!-- <script src="../../../app-assets/js/scripts/customizer.min.js"></script> -->
    <script src="../../../app-assets/js/scripts/tables/datatables/datatable-basic.min.js"></script>
  </body>

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2019 20:03:18 GMT -->
</html>