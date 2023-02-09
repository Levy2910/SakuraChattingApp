<?php 
session_start();
if (!isset($_SESSION['unique_id'])){
    header("location:login.php");
}
?>
<?php 
include_once "header.php";
?>


<body>
    <div class="wrapper">
        <div class="user_chat">
            <?php 
            include_once "php/config.php";
            $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
            if (mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
            }
            ?>
            <a href="user_list.php"><i class="fa-solid fa-arrow-left"></i></a>
            <figure>
                <img src="php/images/<?php echo $row['img']?>" alt="">
            </figure>
            <div class="user_chat_name">
                <span><?php echo $row['fname']. " ".$row['lname']?></span>
                <p><?php echo $row['status']?></p>
            </div>
        </div>

        <div class="chat_area">
          
            
        </div>
        <div class="typing">
            <form action="#">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id'];?>" hidden>
                <input type="text" name="incoming_id"value="<?php echo $user_id;?>" hidden>
                <input name="message" class="input_field"type="text" placeholder="Enter text to send">
                <button type="submit"><i class="fa-regular fa-paper-plane"></i></button>
            </form>
        </div>
    </div>

    </div>
<script src="javascript/chat_area.js"></script>
</body>

</html>