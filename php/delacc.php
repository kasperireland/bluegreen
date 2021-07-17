<?php 
  session_start();
  include_once "config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php
   $c_update="DELETE FROM users WHERE unique_id = {$_SESSION['unique_id']}";   
    $run_update=mysqli_query($conn, $c_update);
	session_destroy();
	header("location: ../index.php");
?>