<?php
session_start();
error_reporting(E_PARSE | E_ERROR);
include ('marksedit_connect.php');
include('number.php');
if($_SESSION["name"]=="")
{
    echo "<script>window.alert('Session not loged in Please login');
    window.location.href='login.php';</script>";    
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <title>MARKS EDIT</title>
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
            <section id="horizontal">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Marks Entry</h4>
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
                            <!-- enter eliments -->
                            <form method="post">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                     <div class="form-body">
                                        <div class="form-group">
                                            <label for="eventInput1">search</label>
                                            <input type="text" id="eventInput1" class="form-control round" required="" placeholder="Please enter USN to search" name="searc">
                                        </div>
                                        <div class="form-group">
                                        <fieldset class="form-group">
                                         <!-- <label for="customSelect">semistor</label> -->
                                        <select class="form-control round" id="customSelect" name="sub" required="">
                                            <option value=""><strong>Please select the semistor</strong></option>
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
                                         <!-- <label for="customSelect">semistor</label> -->
                                        <select class="form-control round" id="customSelect" name="inter" required="">
                                            <option value=""><strong>Please select the internals</strong></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        </fieldset>
                                        </div>
                                        <div class="row justify-content-md-center">
                                            <input type="submit" name="search" value="search" style="width: 20%" class="btn-success form-control round" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <input type="text" name="" value="<?php echo $count_usn ?>">
                            <!-- <?php
                            if($count_usn > 0 ) 
                            {
                            ?> -->
                            <form method="post">
                            <div class="card-content">
                                <div class="card-body">
                                    <?php
                                    if($student_sem > 0)
                                    {
                                    ?>
                                    <div class="row">
                                        <?php foreach ($student as $student1): ?>
                                        <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput" style="text-align: center;">Name</label>
                                                <input type="text" class="form-control round" readonly="" style="text-transform: capitalize;" value="<?php echo $student1['name']; ?>" >
                                            </fieldset>
                                        </div>
                                        <?php endforeach ?>
                                        <?php foreach ($internals as $internals1): ?>
                                        <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label style="text-align: center;">USN</label>
                                                <input type="text" class="form-control round" name="lab_us" readonly="" value="<?php echo $internals1['internals_usn'] ?>" >
                                            </fieldset>
                                        </div>
                                        <?php
                                        break;
                                        endforeach ?>
                                        <div class="col-xl-4 col-lg-6 col-md-12 mb-1"s>
                                            <fieldset class="form-group">
                                                <label style="text-align: center;">Internals</label>
                                                <input type="text" class="form-control round" name="lab_internal" readonly="" value="<?php echo $inter ?>" >
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control round" name="lab_sem" readonly="" hidden="" value="<?php echo $subje ?>" >
                                            </fieldset>
                                            
                                        </div>
                                    </div>
                                <!-- <?php } 
                                else
                                {
                                    echo "<script>window.alert('The usn entered does not matches to the sem')</script>";   
                                }
                                ?> -->
                                </div>
                            </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                        <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead>
                                                <tr style="text-align: center;">
                                                    <div>
                                                    <?php
                                                    $subject = mysqli_query($con,"SELECT * from subejcts where subject_semistor = '$subje' ORDER BY `subject_data` ASC ");
                                                    foreach ($subject as $subject1) 
                                                    {
                                                    ?>
                                                        <th><?php echo $subject1['subject_name']?><!--  <?php echo $subject1['subject_data'] ?> --></th>
                                                       
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    <?php
                                                    $message = "no data to display please add the data";
                                                    $subject_edit = mysqli_query($con,"SELECT * FROM `first_internale` WHERE `internals_usn` = '$searc' AND `semistor` = '$subje' AND `internals` = '$inter'");
                                                    $subject_edit1 = mysqli_num_rows($subject_edit);
                                                    if ($subject_edit1 == 0) 
                                                    {
                                                        ?>
                                                        <tr><th><?php echo $message ?></th></tr>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                    foreach ($subject_edit as $subject_edit) 
                                                    {
                                                    ?>
                                                    <tr>
                                                    <td>
                                                        <div>
                                                        <fieldset class="form-group">
                                                            <input type="text" class="form-control round" name="marksentry_1" title="Digits only" maxlength="3" value="<?php echo $subject_edit['subject_1'] ?>" onkeypress="return onlyNumbers(event,this);">
                                                        </fieldset>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                        <fieldset class="form-group">
                                                            <input type="text" class="form-control round" name="marksentry_2" title="Digits only" maxlength="3" value="<?php echo $subject_edit['subject_2'] ?>" onkeypress="return onlyNumbers(event,this);">
                                                        </fieldset>
                                                        </div>
                                                    </td>
                                                    <td >
                                                        <div>
                                                        <fieldset class="form-group">
                                                            <input type="text" class="form-control round" name="marksentry_3" title="Digits only" maxlength="3" value="<?php echo $subject_edit['subject_3'] ?>" onkeypress="return onlyNumbers(event,this);">
                                                        </fieldset>
                                                        </div>
                                                    </td>
                                                    <td  >
                                                        <div>
                                                        <fieldset class="form-group">
                                                            <input type="text" class="form-control round" name="marksentry_4" title="Digits only" maxlength="3" value="<?php echo $subject_edit['subject_4'] ?>" onkeypress="return onlyNumbers(event,this);">
                                                        </fieldset>
                                                        </div>
                                                    </td>
                                                    <td >
                                                        <div>
                                                        <fieldset class="form-group">
                                                            <input type="text" class="form-control round" name="marksentry_5" title="Digits only" maxlength="3" value="<?php echo $subject_edit['subject_5'] ?>" onkeypress="return onlyNumbers(event,this);">
                                                        </fieldset>
                                                        </div>
                                                    </td>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                    </tr>
                                            </tbody>
                                        </table>
                                        <n><h2>lab subjects</h2></n>
                                        <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead>
                                                <tr style="text-align: center;">
                                                    <div>
                                                <?php
                                                    $lab = mysqli_query($con,"SELECT * FROM `lab_subjects` WHERE lab_sem = '$subje' ORDER BY `lab_name_db` ASC ");
                                                    foreach ($lab as $lab1) 
                                                    {
                                                    ?>
                                                        <th><?php echo $lab1['lab_sub_name']?> <?php echo $lab1['lab_name_db'] ?> </th>
                                                       
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php
                                                    $message = "no data inserted please enter the data to edit";
                                                    $lab_edit = mysqli_query($con,"SELECT * FROM `lab_internals_marks` WHERE `lab_usn` = '$searc' AND `lab_sem` = '$subje' AND `lab_internals` = '$inter'");
                                                    $row = mysqli_num_rows($lab_edit);
                                                    if($row == 0)
                                                    {
                                                        ?>
                                                        <td>
                                                        <?php echo $message ?>
                                                        </td>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                    foreach ($lab_edit as $lab_edit) 
                                                    {
                                                    ?>
                                                    <td>
                                                        <div>
                                                        <fieldset class="form-group">
                                                            <input type="text" class="form-control round" name="lab_marksentry_4" title="Digits only" maxlength="3" value="<?php echo $lab_edit['subject_1'] ?>" onkeypress="return onlyNumbers(event,this);">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                        <fieldset class="form-group">
                                                            <input type="text" class="form-control round" name="lab_marksentry_5" title="Digits only" maxlength="3" value="<?php echo $lab_edit['subject_2'] ?>" onkeypress="return onlyNumbers(event,this);">
                                                        </fieldset>
                                                        </div>
                                                    </td>
                                                    <td >
                                                        <div>
                                                        <fieldset class="form-group">
                                                            <input type="text" class="form-control round" name="lab_marksentry_6" title="Digits only" maxlength="3" value="<?php echo $lab_edit['subject_3'] ?>" onkeypress="return onlyNumbers(event,this);">
                                                        </fieldset>
                                                        </div>
                                                    </td>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                         <input type="submit" name="submit" value="submit" class="btn-success form-control round" >
                                        </div>
                                    <!-- </div>
                                </div> -->
                            </div>
                        </div>
                        </form>
                        <?php
                        
                            }
                            if($count_usn == 0)
                            {
                                /*die("<h2> sorry the USN entered was in correct!! </h2>");*/
                                echo ("<script>window.alert('The usn entered was wrong');</script>");

                            }
                            ?>
                        
                    </div>
                </div>
            </section>
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