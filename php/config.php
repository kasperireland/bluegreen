<?php
  $hostname = "localhost";
  $username = "root";
  $pass = "mysql";
  $dbname = "chat";

  $conn = mysqli_connect($hostname, $username, $pass, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
