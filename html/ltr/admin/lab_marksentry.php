<?php
session_start();
error_reporting(E_PARSE | E_ERROR);
if($_SESSION["name"]=="")
{
    /*echo"<script>alert('session time out Please Login')</script>";
    header("Location:login.php",true , 301);
    die();*/
    echo "<script>window.alert('Session time out or session not setted Please login');
    window.location.href='login.php';</script>";
    
}
include('dbconnect.php');
include('number.php');
if(isset($_POST['submit1']))
{
    $stud = $_POST['student'];
    $sql = mysqli_query($con,"SELECT * from lab_subjects where lab_status = 'Active' and lab_sem ='$stud' ");
    if ( $row = mysqli_num_rows($sql) < 1 )
    {
    ?>
    <script>a = confirm("you havent added subjects please click here to add subjects")</script>
    <?php
    if (a == true) 
    {
        header("Location:subjects.php");
    }
    
    /*sleep(5);
    header("Location:subjects.php");*/
    
    }
}
$inte = $_POST['inern'];
if (isset($_POST['submit'])) 
{
    $regest = $_POST['usn'];
    $semistor = $_POST['sem'];
    $inter_numb = $_POST['in'];
    $subject1 = $_POST['sub_1'];
    $subject2 = $_POST['sub_2'];
    $subject3 = $_POST['sub_3'];
    foreach($regest as $key => $internals )
    {
        $internals = mysqli_query($con,"insert into lab_internals_marks values (null,'".mysqli_real_escape_string($con,$internals)."','$semistor','$inter_numb','".mysqli_real_escape_string($con,$subject1[$key])."','".mysqli_real_escape_string($con,$subject2[$key])."','".mysqli_real_escape_string($con,$subject3[$key])."','Active','')");
        /*echo($mysqli->real_escape_string($subject1[$key]));*/
        /*echo $id[$key];*/
        ?>
        <script>alert("data saved")</script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <title>Lab Marks entry</title>
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
                            <div class="card-header">
                                <h4 class="card-title">Lab Marks Entry</h4>
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
                                         <label for="customSelect">semistor</label>
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
                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                         <label for="customSelect">Internals</label>
                                        <select class="form-control round" id="customSelect" name="inern" required="">
                                            <option selected value="0"><strong>Please select the Semistor</strong></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </fieldset>                  
                                </div>
                            <div class="col-md-2">
                            <div class="form-group">
                                <input type="submit" name="submit1" value="submit" class="btn btn-success form-control round">
                            </div>
                        </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <input type="text" name="in" hidden="" value="<?php echo $inte ?>">
                                <table class="table display nowrap table-striped table-bordered scroll-horizontal" style="align-items: center;">
                                <thead>
                                <tr>
                                    <th>USN</th>
                                    <th>Name</th>
                                    <th>Semistor</th>
                                    <?php
                                    $sql = mysqli_query($con,"SELECT * from lab_subjects where lab_status = 'Active' and lab_sem ='$stud' ");
                                    foreach ($sql as $sql1) 
                                    {
                                    ?>
                                    <th><?php echo $sql1['lab_sub_name'] ?><!-- <input type="text" name="id[]" class="form-control" readonly value="<?php echo $sql1['subject_id'] ?>"> --></th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $name = mysqli_query($con,"select * from student_regester where status='Active' and sem ='$stud'");
                                    foreach ($name as $name1) 
                                    {
                                ?>
                                <tr>
                                    <td><input name='usn[]' class="form-control" hidden="" value="<?php echo $name1['usn'] ?>">
                                        <label name=usn[]><?php echo $name1['usn'] ?></label></td>
                                    <td style="text-transform: capitalize;"><?php echo $name1['name'] ?> <?php echo $name1['lname'] ?></td>
                                    <td><input type="text" name="sem" class="form-control" hidden="" value="<?php echo $name1['sem'];?>"><label name=usn[]><?php echo $name1['sem'] ?></label></td>
                                    <td><input type="text" name="sub_1[]" class="form-control" title="Numbers Only " maxlength="3" onkeypress="return onlyNumbers(event,this);"></td>
                                    <td><input type="text" name="sub_2[]" class="form-control" title="Numbers Only " maxlength="3" onkeypress="return onlyNumbers(event,this);"></td>
                                    <td><input type="text" name="sub_3[]" class="form-control" title="Numbers Only " maxlength="3" onkeypress="return onlyNumbers(event,this);"></td>
                                </tr>
                                <?php
                                    }
                                    ?> 
                            </tbody>
                            <tfoot>
                                <!-- <tr>
                                    <th><input type="submit" name="submit" value="SUBMIT" class="btn-success form-control round"></th>
                                </tr> -->
                            </tfoot>
                            </table>
                            <input type="submit" name="submit" value="SUBMIT" class="btn-success form-control round">
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