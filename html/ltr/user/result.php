<?php
//session_start();
error_reporting(E_PARSE | E_ERROR);
include('../admin/dbconnect.php');
$usn = $_POST['usn'];
//echo "$usn"; 
$query = "SELECT * from first_internale where internals_usn='$usn'";
$sql = mysqli_query($con,$query);
$internal_number = mysqli_query($con,"SELECT * from first_internale where online_status = 'online' AND internals_usn='$usn' ");
foreach ($internal_number as $inte) 
{
	$sem = $inte['semistor'];
	$inte =  $inte['internals'];
	
	
}
//echo "sem : $sem";
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <title>SEARCH</title>
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
  <body  data-open="click" data-menu="vertical-menu-modern">

    <!-- fixed-top-->
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
<!--/ Basic Horizontal Timeline -->
            <section id="horizontal">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- enter eliments -->
                            <?php
                            $sql1 = mysqli_query($con,"SELECT * from student_regester where usn = '$usn'");
                            ?>
                            <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                            <table align="center">
                            	<tr><td>
                            		<?php foreach ($sql1 as $sql1): ?>
                            	<br>
                            	<br>
                            	<table>
                            		<tr>
                            		<tr>
                            			<td><h5>USN</h5></td><td>&nbsp</td>
                            			<td><h4><label style="text-transform: capitalize;"><?php echo "$usn" ?></label></h4></td>
                            		</tr>
                            		<tr>
                            			<td><h5>NAME</h5></td><td>&nbsp</td>
                            			<td><h4><label style="text-transform: capitalize;"><?php echo $sql1['name'] ?> <?php echo $sql1['lname'] ?></label></h4></td>
                            		</tr>
                            		
                            		<tr>
                            			<td><h5>parents Name</h5></td><td>&nbsp</td>
                            			<td><h4><label style="text-transform: capitalize;"><?php echo $sql1['parents_name'] ?></label></h4></td>
                            		</tr>
                            		<tr>
                            			<td><h5>Semister</h5></td><td>&nbsp</td>
                            			<td><h4><label style="text-transform: capitalize;"><?php echo $sql1['sem'] ?></label></h4></td>
                            		</tr>
                            	</tr>
                            	</table>
                            <?php endforeach ?>
                        		</td>
                        		<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                            		<td>
                            			<?php
                            			$internal_number = mysqli_query($con,"SELECT * from first_internale where online_status = 'online' AND internals_usn='$usn' ");
                            			?>
                            		<table>
                            			<?php foreach ($internal_number as $intern ): ?>
                            			<tr>
                            				<tr>
                            					<td><h5>Internals</h5></td><td>&nbsp&nbsp</td>
                            					<td><h4><label style="text-transform: capitalize;"><?php echo $intern['internals'] ?></label></h4>
                            						<input type="text" name="internal" value="<?php echo $intern['internals'] ?>" hidden></td>
                            				</tr>
                            			</tr>
                            			<?php endforeach ?>
                            		</table></td>
                            	</tr>
                            </table>
                        	</div>
                    		</div>
                            <form method="post">
                            <div class="card-content">
                                <div class="card-body">
                                     
                                </div>
                            </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                        
                                        <n><h2>SUBJECT MARKS</h2></n>
                                       <table border="1px solid black;" align="center" class="table display nowrap table-striped table-bordered scroll-horizontal">
                                       	<thead>
                                       		<?php
                                       		$subject = mysqli_query($con,"SELECT * FROM subejcts WHERE subject_semistor = '$sem' ORDER BY `subject_data` ASC "); 
                                          $row = mysqli_num_rows($subject);
                                          if ($row == 0) 
                                          {
                                            echo "no data";
                                          }
                                          else
                                          {
                                       		?>
                                       		<tr>
                                       		<?php foreach ($subject as $subject): ?>
                                       			<td><label style="text-transform: capitalize;"><?php echo $subject['subject_name'] ?></label></td>
                                       		<?php endforeach ?>
                                       		</tr>
                                       	</thead>
                                       	<tbody>
                                       		<?php
                                       		$marks = mysqli_query($con,"SELECT * FROM first_internale WHERE internals_usn='$usn' AND internals = '$inte' AND online_status = 'online' "); 
                                       		?>
                                       		<tr>
                                       		<?php foreach ($marks as $marks): ?>
                                       			<td><label style="text-transform: capitalize;"><?php echo $marks['subject_1'] ?></label></td>
                                       			<td><label style="text-transform: capitalize;"><?php echo $marks['subject_2'] ?></label></td>
                                       			<td><label style="text-transform: capitalize;"><?php echo $marks['subject_3'] ?></label></td>
                                       			<td><label style="text-transform: capitalize;"><?php echo $marks['subject_4'] ?></label></td>
                                       			<td><label style="text-transform: capitalize;"><?php echo $marks['subject_5'] ?></label></td>
                                       		<?php endforeach ?>
                                       		</tr>
                                       	</tbody>
                                       <?php } ?>
                                       </table>
                                    </div>
                            </div>
                            <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                        
                                        <n><h2>INTERNAL MARKS</h2></n>
                                       <table border="1px solid black;" align="center" class="table display nowrap table-striped table-bordered scroll-horizontal">
                                       	<thead>
                                       		<?php
                                       		$lab_subject = mysqli_query($con,"SELECT * FROM lab_subjects WHERE lab_Sem = '$sem' ORDER BY `lab_name_db` ASC "); 
                                          $row1 = mysqli_num_rows($lab_subjects);
                                          echo "$row1";
                                       		?>
                                       		<tr>
                                       		<?php foreach ($lab_subject as $lab): ?>
                                       			<td><label style="text-transform: capitalize;"><?php echo $lab['lab_sub_name'] ?></label></td>
                                       		<?php endforeach ?>
                                       		</tr>
                                       	</thead>
                                       	<tbody>
                                       		<?php
                                       		$lab_marks = mysqli_query($con,"SELECT * FROM lab_internals_marks WHERE lab_usn='$usn' AND lab_internals = '$inte' AND online_status = 'online' "); 
                                       		?>
                                       		<tr>
                                       		<?php foreach ($lab_marks as $lab_marks): ?>
                                       			<td><label style="text-transform: capitalize;"><?php echo $lab_marks['subject_1'] ?></label></td>
                                       			<td><label style="text-transform: capitalize;"><?php echo $lab_marks['subject_2'] ?></label></td>
                                       			<td><label style="text-transform: capitalize;"><?php echo $lab_marks['subject_3'] ?></label></td>
                                       		<?php endforeach ?>
                                       		</tr>
                                       	</tbody>
                                       </table>
                                    </div>
                            </div>
                            
                        </div>
                        </form>
                        
                    </div>
                </div>
            </section>
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