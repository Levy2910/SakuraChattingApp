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
        <div class="form signup" enctype="multipart/form-data">
            <header>Welcome to Sakura Chatting App</header>
            <form action="php/signup.php" method="post">
                <div class="error_message">
                  
                </div>

                <div class="field input">
                    <label for="first_name">First Name: </label>
                    <input type="text" id="first_name" placeholder="First Name" name="fname" required>
                </div>
                <div class="field input">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" placeholder="Last Name" name="lname" required>
                </div>
                <div class="field input">
                    <label for="email">Email: </label>
                    <input type="email" id="email" placeholder="Enter your email" name="email" required>
                </div>
                <div class="field input">
                    <label for="password">Password: </label>
                    <input type="password" id="password" placeholder="Enter your new password" name="password" required>
                    <i class="fa-regular fa-eye"></i>
                </div>
                <div class="field image_input">
                    <label for="image">Choose image: </label>
                    <input type="file" id="image" name="image" required>
                </div>
                <div class="field submit_input">
                    <input type="submit" id="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="signup">
                <span>Already signed up? </span>
                <a href="login.php">Login now</a>
            </div>
        </div>
    </div>
   
    <script src="javascript/passShowHide.js"></script>
    <script src="javascript/signup.js"></script>
</body>


</html>