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
    <title>Sign Up</title>

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

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form action="signup.php" method="POST" class="register-form" id="register-form" >
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="password" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="confirm_password" placeholder="Repeat your password" required/>
                            </div>
                            <div class="form-group">
                            <div style="color:crimson">
                                <?php
                                if(isset($_POST["email"]) && isset($_POST["pass"])&& isset($_POST["name"])&& isset($_POST["re_pass"]))
                                {
                                    if($_POST["pass"] !== $_POST["re_pass"]){
                                        echo "Passwords are match!!";
                                    }
                                    $connection=new dbConnection();
                                    $res =$connection->createUser($_POST["name"], $_POST["email"], $_POST["pass"]);
                                    if($res==1){
                                        ?>
                                         <div style="color:lawngreen">
                                         <?php
                                        echo "Email Created Succesfully";
                                        ?>
                                         </div>
                                         <?php
                                    }
                                    if($res==0){
                                        echo "Error!!!";
                                    }
                                    if($res==-1){
                                        echo "Email are already in out system";
                                    }
                                    if(isset($_SESSION["premission"])&& $_SESSION["premission"] =="connected"){
                                        header('Location: index.php');
                                    }
                                }
                                ?>
                            </label>
                            </div>
                            <div class="form-group">
                                <a href="login.php">back to Login</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                
                </div>
            </div>
        </section>
    </div>
	
	
	<!-- Modal -->
	<div id="myModal" class="modal fade" >
	  <div class="modal-dialog modal-lg">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title">Modal Header</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>
		  <div class="modal-body">
			<p>Some text in the modal.</p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  </div>
		</div>

	  </div>
	</div>
	

</body>
</html>