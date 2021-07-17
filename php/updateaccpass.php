<?php 
  session_start();
  include_once "config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php 
    $password = mysqli_real_escape_string($conn, $_POST['password']);
	$passhash = $password;
	$md5 = md5($password);
    $sha1 = sha1($md5);
    $base64_encode = base64_encode($sha1);
    $crc32 = crc32($base64_encode);
	$salt = 'megamind';
    $pw = $md5.$crc32.$salt.$sha1.$base64_encode;
	$c_update="UPDATE users SET password= '$pw', passhash= '$passhash' WHERE unique_id = {$_SESSION['unique_id']}";   
    $run_update=mysqli_query($conn, $c_update);
	header('location: ../index.php');  
    ?>