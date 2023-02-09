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
         <?php 
         include_once "php/config.php";
         $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
         if (mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
         }
         ?>
        <div class="user_info">
            <div class="user_info_detail">
                <figure>
                    <img src="php/images/<?php echo $row['img'] ?>" alt="">
                </figure>
                <div class="user_info_content">
                    <div class="user_info_detail_name">
                        <p><?php echo $row['fname']." ".$row['lname'];?></p>
                    </div>
                    <div class="user_info_detail_status">
                        <span><?php echo $row['status'];?></span>
                    </div>
                </div>
            </div>
            <a href="php/logout.php?logout_id=<?php echo $row['unique_id']?>"><button>Logout</button></a>
        </div>
        <div class="search_box">
            <input type="text" placeholder="Enter name to search...">
            <button><i class="fa-brands fa-searchengin"></i></button>
        </div>
        <div class="friend_list">
        
        </div>
    </div>
    <script src="javascript/user_list.js"></script>
</body>

</html>