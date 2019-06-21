<?php
session_start();
include('dbconnect.php');
include('subjects_connect.php');
error_reporting(E_PARSE | E_ERROR);
if($_SESSION["name"]=="")
{
    echo "<script>window.alert('Session time out');
    window.location.href='login.php';</script>";
    die();    
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2019 20:01:41 GMT -->
<head>
    <title>Subjects</title>
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
    <!-- ss -->
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
            <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Employee Details</h2>
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
        <ul class="nav nav-tabs">
        <li class="nav-item">
        <a class="nav-link " data-toggle="tab" href="#create">Create</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#designation">Subjects View</a>
        </li>
        </ul>

  <!-- Tab panes -->
        <div class="tab-content">
        <div id="create" class="container tab-pane fade"><br>
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
                            <div class="row">&nbsp &nbsp
                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                         <!-- <label for="customSelect">semistor</label> -->
                                        <select class="form-control round" id="customSelect" name="sub" required="">
                                            <option value=""><strong>Please select the Semistor</strong></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </fieldset>                  
                                </div>
                            <div class="col-md-6">
                            <div class="form-group "><form method="post">
                                <input type="submit" name="submit2" value="submit" class="btn btn-success form-control round col-md-4"></form>
                            </div>
                        </div>
                        </div>
                    </form>
                    <form method="post">
                        <input type="text" name="sem" value="<?php echo $subje ?>" hidden>
                                <table class="table display nowrap table-striped table-bordered ">
                                <thead>
                                <tr style="text-align: center;">
                                    <th>SubjectCode</th>
                                    <th>Subject Name</th>
                                    <th>Semistor</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    
                                        <tr style="text-align: center;">
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Subject Code" required="" name="Subject_code[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Subject name" required="" name="Subject_name[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Subject name" readonly="" name="Sem" value="<?php echo $subje ?>">   
                                        <input type="text" name="abc[]" value="subject_1" hidden=""></td>
                                        </tr>
                                        <tr>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Subject Code" required="" name="Subject_code[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Subject name" required="" name="Subject_name[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Subject name" readonly=""  value="<?php echo $subje ?>">   
                                        <input type="text" name="abc[]" value="subject_2" hidden=""></td>
                                        </tr>
                                        <tr>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Subject Code" required="" name="Subject_code[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Subject name" required="" name="Subject_name[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Subject name" readonly=""  value="<?php echo $subje ?>">   
                                        <input type="text" name="abc[]" value="subject_3" hidden=""></td>
                                        </tr>
                                        <tr>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Subject Code" required="" name="Subject_code[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Subject name" required="" name="Subject_name[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Subject name" readonly=""  value="<?php echo $subje ?>">   
                                        <input type="text" name="abc[]" value="subject_4" hidden=""></td>
                                        </tr>
                                        <tr>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Subject Code" required="" name="Subject_code[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Subject name" required="" name="Subject_name[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Subject name" readonly="" value="<?php echo $subje ?>">   
                                        <input type="text" name="abc[]" value="subject_5" hidden=""></td>
                                        </tr>
                                    
                            </tbody>
                            </tfoot>
                            </table>

                            <n><h2>Lab Subjects</h2></n>
                            <table class="table display nowrap table-striped table-bordered ">
                                <thead>
                                <tr style="text-align: center;">
                                    <th>Lab_SubjectCode</th>
                                    <th>Lab_Subject Name</th>
                                    <th>Semistor</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    
                                        <tr>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Lab Subject Code" required="" name="lab_subject_code[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Lab Subject name" required="" name="lab_subject_name[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Subject name" readonly="" name="Sem" value="<?php echo $subje ?>">   
                                        <input type="text" name="sub_data[]" value="subject_1" hidden=""></td>
                                        </tr>
                                        <tr>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Lab Subject Code" required="" name="lab_subject_code[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Lab Subject name" required="" name="lab_subject_name[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Subject name" readonly=""  value="<?php echo $subje ?>">   
                                        <input type="text" name="sub_data[]" value="subject_2" hidden=""></td>
                                        </tr>
                                        <tr>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Lab Subject Code" required="" name="lab_subject_code[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Lab Subject name" required="" name="lab_subject_name[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control round" placeholder="Subject name" readonly=""  value="<?php echo $subje ?>">   
                                        <input type="text" name="sub_data[]" value="subject_3" hidden=""></td>
                                        </tr>
                                        
                                    
                            </tbody>
                            </table>
                            <input type="submit" name="submit" value="SUBMIT" class="btn-success form-control round">
                        </form> 

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Basic Horizontal Timeline -->
<!-- start of 2 tab -->
<?php

?>
<div id="designation" class="container tab-pane active"><br>
    <form method="post">
    <section id="horizontal">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Subject Details</h4>
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
                            <div class="row">&nbsp &nbsp
                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                         <!-- <label for="customSelect">semistor</label> -->
                                        <select class="form-control round" id="customSelect" name="semist" required="">
                                            <option value="0"><strong>Please select the Semistor</strong></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </fieldset>                  
                                </div>
                            <div class="col-md-6">
                            <div class="form-group ">
                                <input type="submit" name="submit1" value="submit" class="btn btn-success form-control round col-md-4">
                            </div>
                        </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                                <thead>
                                <tr>
                                    <th>SubjectCode</th>
                                    <th>Subject Name</th>
                                    <th>Semistor</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php
                                    
                                    foreach ($view as $view1) 
                                    {
                                        ?>
                                        <tr>
                                        <td><?php echo $view1['subject_code'] ?></td>
                                        <td style="text-transform: capitalize;"><?php echo $view1['subject_name'] ?></td>
                                        <td style="text-align: center;"><?php echo $view1['subject_semistor'] ?></td>
                                        <td><?php echo $view1['subject_status'] ?></td>
                                        <td><form name ="edi" action="subjectedit.php" method="post"><input type="text" name="sent" value="<?php echo $view1['subject_code']; ?>" hidden><input type="submit" value="Edit" name="submit2" class="btn btn-success form-control round"></form></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SubjectCode</th>
                                    <th>Subject Name</th>
                                    <th>Semistor</th>
                                    <th>Status</th>
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
    </form>
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
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="../../../app-assets/js/scripts/tables/datatables/datatable-basic.min.js"></script>
  </body>

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2019 20:03:18 GMT -->
</html>