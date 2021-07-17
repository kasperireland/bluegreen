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
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
         if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }
        ?>
<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false">
  <div class="wrapper">
    <section class="form signup">
	<header><a href="../" style="cursor:pointer;" class="back-icon"><i class="fas fa-arrow-left"></i></a> Settings</header>
	<form action="update.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
		<div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" value="<?php echo $row['fname'] ?>">
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" value="<?php echo $row['lname'] ?>">
          </div>
		  <div class="field input">
            <label>Your ID</label>
            <input type="text" name="" placeholder="Your Messenger ID" value="<?php echo $row['unique_id'] ?>" readonly>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" value="<?php echo $row['email'] ?>" readonly>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="text" placeholder="Enter new password" value="<?php echo $row['passhash'] ?>" readonly>
        </div>
		 <a href="updatepassword.php" style="cursor:pointer;" class="btn-grad">Update Password</a>
		 <div class="field input">
          <label>Bio</label>
          <input type="text" name="bio" placeholder="Enter your bio" value="<?php echo $row['bio'] ?>">
        </div>
		 <div class="field input">
          <label>Website</label>
          <input type="text" name="website" placeholder="Enter your website" value="<?php echo $row['website'] ?>">
        </div>
		 <div class="field input">
          <label>Social</label>
          <input type="text" name="social" placeholder="Enter your social" value="<?php echo $row['social'] ?>">
        </div>
		<div class="field input">
          <label>Gender</label>
          <input type="text" name="gender" placeholder="Enter your gender" value="<?php echo $row['gender'] ?>">
        </div>
		<div class="field input">
          <label>Contact</label>
          <input type="number" name="contact" placeholder="Enter your contact no." value="<?php echo $row['contact'] ?>">
        </div>
        <div class="field image">
          <label>Update Image</label>
		<a href="imgedit.php"><img src="images/<?php echo $row['img']; ?>" onerror="this.src='../default.png'" width="100" height="100" alt="<?php echo $row['fname']?>"></a>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="✎ Update">
        </div>
      </form>
	  <span data-href="delacc.php" style="cursor:pointer;" class="btn-grad"><i class="fas fa-trash"></i> Delete Account</span>
<i>Note</i>: Before deleting your account make sure you keep/remmember your <b><?php include "hostname.php"; ?> Messenger ID</b> incase you register back & need your old chats back!<br>
Never share your <b><?php include "hostname.php"; ?> Messenger ID</b> with anyone! 
    </section>
  </div>
  <script type="text/javascript">window.addEventListener("keydown",function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==67||e.which==70||e.which==73||e.which==80||e.which==83||e.which==85||e.which==86)){e.preventDefault()}});document.keypress=function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==70||e.which==67||e.which==73||e.which==80||e.which==83||e.which==85||e.which==86)){}return false}
document.onkeydown=function(e){e=e||window.event;if(e.keyCode==123||e.keyCode==18){return false}}
document.addEventListener("contextmenu", function(e){ e.preventDefault(); }, false);</script>
  <script src="../javascript/hideurlfrombrowsertaskbar.js"></script>
</body>
</html>
