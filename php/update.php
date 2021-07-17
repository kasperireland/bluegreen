<?php 
  session_start();
  include_once "config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php
   $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
	$bio = mysqli_real_escape_string($conn, $_POST['bio']);
	$website = mysqli_real_escape_string($conn, $_POST['website']);
	$social = mysqli_real_escape_string($conn, $_POST['social']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$contact = mysqli_real_escape_string($conn, $_POST['contact']);

 $c_update="UPDATE users SET fname= '$fname', lname= '$lname', email= '$email', bio='$bio', website='$website', social='$social', gender='$gender', contact='$contact' WHERE unique_id = {$_SESSION['unique_id']}";   
    $run_update=mysqli_query($conn, $c_update);
	header("location: ../index.php");
?>