<?php 
  session_start();
  include_once "config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<html lang="en">
<head>
<title><?php include "hostname.php"; ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../favicon.png" type="image/x-icon"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../styling.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
         if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }
        ?>
<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false">
  <div class="wrapper">
    <section class="form signup">
	<header><a href="../" style="cursor:pointer;" class="back-icon"><i class="fas fa-arrow-left"></i></a> User Info</header>
	<form action="#" method="" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
		<div class="name-details">
          <div class="field input">
		  <img src="images/<?php echo $row['img']; ?>" onerror="this.src='../default.png'" width="100" height="100" alt="<?php echo $row['fname']?>">
            <label>Name: <?php echo $row['fname'] ?> <?php echo $row['lname'] ?></label>
			<label>Email Address: <?php echo $row['email'] ?></label>
			<label>Bio: <?php echo $row['bio'] ?></label>
			<label>Website: <?php echo $row['website'] ?></label>
			<label>Social: <?php echo $row['social'] ?></label>
			<label>Gender: <?php echo $row['gender'] ?></label>
			<label>Contact: <?php echo $row['contact'] ?></label>
          </div>
        </div>
      </form>
    </section>
  </div>
  <script type="text/javascript">window.addEventListener("keydown",function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==67||e.which==70||e.which==73||e.which==80||e.which==83||e.which==85||e.which==86)){e.preventDefault()}});document.keypress=function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==70||e.which==67||e.which==73||e.which==80||e.which==83||e.which==85||e.which==86)){}return false}
document.onkeydown=function(e){e=e||window.event;if(e.keyCode==123||e.keyCode==18){return false}}
document.addEventListener("contextmenu", function(e){ e.preventDefault(); }, false);</script>
  <script src="../javascript/hideurlfrombrowsertaskbar.js"></script>
</body>
</html>
