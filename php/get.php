<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
$output .= '<div class="chat outgoing"><div class="details"><p>'. base64_decode($row['msg_enc']) .'</p><a href=php/delmsg.php?id='.$row['msg_id'].'><font color=red><i class="fa fa-trash" aria-hidden="true"></i></font></a><h6><font color="gray">sent at '. $row['updated_at'] .'</font></h6></div></div>';
                }else{
                    $output .= '<div class="chat incoming"><img src="php/images/'.$row['img'].'" onerror="this.src = \'/wnchat/default.png\'" alt=""><div class="details"><p>'. base64_decode($row['msg_enc']) .'</p><h6><font color="gray">Recieve at '. $row['updated_at'] .'</font></h6></div></div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }
    