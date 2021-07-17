<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<style> body{
	overflow: hidden;
}</style>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
	
        ?>
        <a href="./" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <a href="php/bio.php?user_id=<?php echo $user_id; ?>"><img src="php/images/<?php echo $row['img']; ?>" alt="" onerror="this.src='default.png'">
        <div class="details">
          <font color="black"><span><?php echo $row['fname']. " " . $row['lname'] ?></span></font></a>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">
      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" id="text1" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        &nbsp;<div style="font-size: 24px;"><i id="button1" class="fa fa-smile-o fa-10x" style="cursor:pointer;"></i></div>
		&nbsp;<button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/say.js"></script>
   <script>
        var margin = 10,
            instance1 = new emojiButtonList( "button1", {
                dropDownXAlign: "left",
                textBoxID: "text1",
                yAlignMargin: margin,
                xAlignMargin: margin
            } );

        function emojiClickEvent( emojiText ) {
            document.title += " " + emojiText;
        }
    </script>
</body>
</html>
