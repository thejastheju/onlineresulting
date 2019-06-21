<?php
if(isset($_POST['submit']))
{
    $code = $_POST['Subject_code'];
    $name = $_POST['Subject_name'];
    $semi = $_POST['sub'];
    $sem = $_POST['sem'];
    $abc = $_POST['abc'];
    $labcode = $_POST['lab_subject_code'];
    $labname = $_POST['lab_subject_name'];
    $lab = $_POST['sub_data'];
    foreach ($code as $key => $co1) 
    {
        $sql = mysqli_query($con,"insert into subejcts values (NULL,'".mysqli_real_escape_string($con,$co1)."','".mysqli_real_escape_string($con,$name[$key])."','$sem','".mysqli_real_escape_string($con,$abc[$key])."','Active')");
        /*echo $abc;*/ 

    }

    foreach ($lab as $key => $labco1) 
    {
    	$lab_sql = mysqli_query($con,"insert into lab_subjects values (NULL,'".mysqli_real_escape_string($con,$labcode[$key])."','".mysqli_real_escape_string($con,$labname[$key])."','$sem','".mysqli_real_escape_string($con,$lab[$key])."','Active')");
    }
    ?>
    <script>alert("Data saved")</script>
    <?php
}
elseif(isset($_POST['submit1'])) 
{
    $stud = $_POST['semist'];
    $view = mysqli_query($con,"select * from subejcts where subject_semistor = '$stud'");
}
if (isset($_POST['submit2'])) 
{
    $subje = $_POST['sub'];
    $counts = mysqli_query($con,"select * from subejcts where subject_semistor = '$subje'");
    if ( $row = mysqli_num_rows($counts) > 0 )
	{
    
    echo "<script>window.confirm('Data is Allready inserted Please go to edit to Update the subjects');
    window.location.href='subjects.php';</script>";
	}
}
?>