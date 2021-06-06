<?php
include "functions.php";
session_start();

if(isset($_SESSION["premission"])&& $_SESSION["premission"] =="connected"){
  header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 


    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
	
	<!-- Validations JS -->
	<script src="js/validations.js"></script>

</head>
<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <h3 class="form-title">SavePass System</h3>

                        <figure><img src="images/signin-image.jpg" alt="sing up image" ></figure>
                        <a href="signup.php" class="signup-image-link">Create an account</a>
                        <a href="contact.php" class="signup-image-link">Contact Us</a>

                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" target="login.php" class="register-form" id="login-form" >
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Your Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                            <div style="color:crimson">
                                <?php
                                if(isset($_POST["email"]) && isset($_POST["password"]))
                                {
                                    $connection=new dbConnection();
                                    if($connection->ValidateLogin($_POST["email"], $_POST["password"])==NULL){
                                        echo "Email or Password are Incorrect!!";
                                    }
                                    if(isset($_SESSION["premission"])&& $_SESSION["premission"] =="connected"){
                                        header('Location: index.php');
                                    }
                                }
                                ?>
                            </label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

</body>
</html>