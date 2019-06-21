
<?php
include ('dbconnect.php');
$searc = $_POST['searc'];
$inter = $_POST['inter'];
$subje = $_POST['sub'];
$lab_sem = $_POST['lab_sem'];
if (isset($_POST['search']))
{
    $student = mysqli_query($con,"SELECT * FROM student_regester WHERE usn = '$searc' AND sem = '$subje' ");
    $student_sem = mysqli_num_rows($student);
    $internals = mysqli_query($con,"SELECT * FROM first_internale where internals_usn = '$searc' ");
    $count_usn = mysqli_num_rows($student);
    echo "$count_usn";
}
if (isset($_POST['submit'])) 
{
	?>
	<script>che = confirm("Do you want to update the marks")</script>
	<?php
	if(che == true)
	{
		$lab_us = $_POST['lab_us'];
		$lab_internal =$_POST['lab_internal'];
		$sub1 = $_POST['marksentry_1'];
		$sub2 = $_POST['marksentry_2'];
		$sub3 = $_POST['marksentry_3'];
		$sub4 = $_POST['marksentry_4'];
		$sub5 = $_POST['marksentry_5'];
		$subject_update = mysqli_query($con,"UPDATE `first_internale` SET `subject_1`='$sub1',`subject_2`='$sub2',`subject_3`='$sub3',`subject_4`='$sub4',`subject_5`='$sub5' WHERE `internals_usn`='$lab_us' AND `internals`='$lab_internal'");
		$lab4 = $_POST['lab_marksentry_4'];
		$lab5 = $_POST['lab_marksentry_5'];
		$lab6 = $_POST['lab_marksentry_6'];
				/*$lab_update = mysqli_query($con,"UPDATE lab_internals_marks SET subject_1='$lab4',subject_2='$lab5',subject_3='$lab6' WHERE lab_usn='$searc' AND lab_internals = '$inter'");*/
		$lab_update = mysqli_query($con,"UPDATE `lab_internals_marks` SET `subject_1`='$lab4',`subject_2`='$lab5',`subject_3`='$lab6' WHERE `lab_usn`='$lab_us' AND`lab_internals`='$lab_internal'");
		echo ("<script>alert('Data updated')</script>");
	}
	else
	{
		echo("<script>alert('Data not updates')</script>");
	}
}
?>
