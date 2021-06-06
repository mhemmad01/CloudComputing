<?php
session_start();
include "db.php";
if (isset($_SESSION["premission"]) && $_SESSION["premission"] != "connected") {
  header('Location: login.php');
}
$con = new dbConnection();

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


        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">SavePass</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="profile.php">Profile<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>

            </ul>

          </div>
        </nav>


        <div class="signin-content">
          <div class="signup-form">

            <form action="profile.php" method="POST" class="register-form" id="register-form" onsubmit="validateSignup()">
              <?php
              if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])) {
                if ($_POST["email"] == "") {
                  echo "Email can't be empty";
                } else {
                  $res = $con->updateUser($_POST["name"], $_POST["email"], $_POST["password"]);
                  if ($res == -1) {
                    echo "Email is alreay in our system";
                  } else if ($res == 1) {
                    echo "Account Updated Succesfully!";
                    $_SESSION['name']=$_POST["name"];
                    $_SESSION['email']= $_POST["email"];
                    $_SESSION['password']=  $_POST["password"];
                  } else {
                    echo "Error";
                  }
                }
              }
              ?>
              <br>
              <div class="form-group">
                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <input type="text" name="name" id="name" placeholder="Your Name" required value="<?php echo $_SESSION['name'] ?>" />
              </div>
              <div class="form-group">
                <label for="email"><i class="zmdi zmdi-email"></i></label>
                <input type="email" name="email" id="email" placeholder="Your Email" required value="<?php echo $_SESSION['email'] ?>"/>
              </div>
              <div class="form-group">
                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                <input type="password" name="password" id="password" placeholder="Password" required value="<?php echo $_SESSION['password'] ?>"/>
              </div>

              <div class="form-group form-button">
                <input type="submit" name="signup" id="signup" class="form-submit" value="Save" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  </div>

</body>

</html>