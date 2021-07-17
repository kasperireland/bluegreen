<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
		$base64_encode = base64_encode($message);
		$ipInfo = file_get_contents("http://ipinfo.io/");
        $ipInfo = json_decode($ipInfo);
        $timezone = $ipInfo->timezone;
        date_default_timezone_set($timezone);
		$updated_at = date("l M d/m/Y g:i:s a");
		$created_at = time();
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg_enc, msg_dec, created_at, updated_at)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$base64_encode}', '{$message}', '{$created_at}', '{$updated_at}')") or die();
        }	
    }else{
        header("location: ../login.php");
    }


    
?>