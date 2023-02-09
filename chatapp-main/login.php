<?php 
session_start();
if (isset($_SESSION['unique_id'])){
    header("location:user_list.php");
}
?>
<?php 
include_once "header.php";
?>

<body>
    <div class="wrapper">
        <div class="login form">
            <header>Login Sakura Chatting App</header>
            <form action="#">
                <div class="error_message">
                    
                </div>
                <div class="field input">
                    <label for="email">Email: </label>
                    <input name= "email" type="email" id="email" placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label for="password">Password: </label>
                    <input name="password" type="password" id="password" placeholder="Enter your new password">
                    <i class="fa-regular fa-eye"></i>
                </div>
                <div class="field submit_input">
                    <input value ="Login" type="submit" id="submit" placeholder="Continue to Chat">
                </div>
            </form>
            <div class="signup">
                <span>Not yet signed up? </span>
                <a href="index.php">Signup now</a>
            </div>
        </div>
    </div>
    <script src="javascript/passShowHide.js"></script>
    <script src="javascript/login.js"></script>
</body>

</html>