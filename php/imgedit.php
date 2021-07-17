<?php 
  session_start();
  include_once "config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<html lang="en">
<head>
<title>Webnet Official Messenger</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../favicon.png" type="image/x-icon"/>
  <link rel="stylesheet" href="../styling.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

</head>
<?php 
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false">
  <div class="wrapper">
    <section class="form signup">
    <header><a href="../" class="back-icon"><i class="fas fa-arrow-left"></i></a> Settings</header>
      <form action="imgupdate.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field image">
          <label>Select Image</label>
		<img src="images/<?php echo $row['img']; ?>" onerror="this.src='../default.png'" width="100" height="100" alt="<?php echo $row['fname']?>"></a>
       <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="✎ Update">
		      </div>
      </form>
	  <!--<a href="delaccimg.php?delimg=<?php echo $row["unique_id"]?>" style="cursor:pointer;" class="btn-grad"><i class="fas fa-trash"></i> Delete Image</a>-->
    <span data-href="delaccimg.php?delimg=<?php echo $row["unique_id"]?>" style="cursor:pointer;" class="btn-grad"><i class="fas fa-trash"></i> Delete Image</span>
	</section>
  </div>
 <script src="../javascript/pass-show-hide.js"></script>
  <script src="../javascript/login.js"></script>
  <script src="../javascript/hideurlfrombrowsertaskbar.js"></script>
  <script type="text/javascript">window.addEventListener("keydown",function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==67||e.which==70||e.which==73||e.which==80||e.which==83||e.which==85||e.which==86)){e.preventDefault()}});document.keypress=function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==70||e.which==67||e.which==73||e.which==80||e.which==83||e.which==85||e.which==86)){}return false}
document.onkeydown=function(e){e=e||window.event;if(e.keyCode==123||e.keyCode==18){return false}}
document.addEventListener("contextmenu", function(e){ e.preventDefault(); }, false);</script>
</body>
</html>
