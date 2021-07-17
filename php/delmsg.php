<?php 
  session_start();
  include_once "config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  } 
$id = $_REQUEST['id'];
$sql = mysqli_query($conn, "SELECT * FROM messages WHERE msg_id = " . $id . "");
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
    if (time() < (int) $row['created_at'] + 60) {
        $c_update = 'DELETE FROM messages WHERE msg_id = ' . $id . '';
        $run_update = mysqli_query($conn, $c_update);
    } else {
        echo "<body onload=goBack()>
<script>
function goBack() {
  window.history.back();
}
</script>";
    }
}

?>
<body onload=goBack()>
<script>
function goBack() {
  window.history.back();
}
</script>