    <?php 
  session_start();
  include_once "config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php 
       if(isset($_GET['delimg']))
       {
          $querySelect = "select img from users where unique_id = ".$_GET['delimg'];
          $ResultSelectStmt = mysqli_query($conn,$querySelect);
          $fetchRecords = mysqli_fetch_assoc($ResultSelectStmt);
          
          $fetchImgTitleName = $fetchRecords['img'];
          
          $createDeletePath = "images/".$fetchImgTitleName;
          
          if(unlink($createDeletePath))
          {
             $liveSqlQQ = "DELETE from users where img = ".$fetchRecords['img'];
             $rsDelete = mysqli_query($conn, $liveSqlQQ);   
             header('location: ../index.php');
       }
	   
	
$default_image = "../default.png";
$new_path =  time() . "default.png";

if (!copy($default_image, "images/" . $new_path)) {
    // Image failed to copy
    // Possible reason: Storage full, inodes full, no permissions
    die("Something went wrong, please try again later.");
}

$query = "UPDATE users SET img = '$new_path' WHERE unique_id = {$_SESSION['unique_id']}";
mysqli_query($conn, $query);
header("location: ../index.php");
	   }
       
    ?>
